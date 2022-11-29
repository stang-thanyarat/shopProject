$("#category_id").change(async function () {
    $('#cat').text($("#category_id option:selected").text())
    if ($("#category_id").val() !== "all") {
        let url = `./controller/ProductResult.php?category_id=${$("#category_id").val()}`
        if ($("#keyword").val() !== "") {
            url += `&keyword=${$("#keyword").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    } else {
        let url = './controller/ProductResult.php'
        if ($("#keyword").val() !== "") {
            url += `?keyword=${$("#keyword").val()}`
        }
        const product = await (await fetch(url)).json()

        setUI(product)
    }
});

$("#keyword").keyup(async function () {
    let url = `./controller/ProductResult.php?keyword=${$("#keyword").val()}`
    if ($("#category_id").val() !== "" && $("#category_id").val() !== "all") {
        url += `&category_id=${$("#category_id").val()}`
    }
    const product = await (await fetch(url)).json()
    setUI(product)
});

async function start() {
    let url = './controller/ProductResult.php'
    const product = await (await fetch(url)).json()
    console.log(product);
    $('#cat').text($("#category_id option:selected").text())
    $('#no-let').hide()
    setUI(product)
}

$(document).ready(function () {
    start()
});

function setUI(data) {
    let c = 0
    $('#notification_amtTable').html('')
    data.forEach((element, i) => {
        if (element.product_rm_unit <= 5 && element.sales_status == 1) {
            c++
            $('#notification_amtTable').append(`<tr id="rr${i}">
        <th><img src="${element.product_img}" width="350"></th>
        <th>${element.product_name}</th>
        <th>${element.price}</th>
        <th>${element.product_rm_unit}</th>
        <th>
            <label class="switch">
            <input type="checkbox" id="${element.product_id}" ${element.sales_status == 1 && element.product_rm_unit > 0 ? "checked" : ""} ${element.sales_status == 0 ? 'disabled' : ''} onchange="setStatus(${element.product_id})">
            <span class="slider round"></span>
    </label></th>
    </tr>`)
        }
    });
    if (c <= 0) {
        $('#no-let').show()
        $("#tb-let").hide()
        $("#num-list").text('')
        $("#cat").hide()
    } else {
        $("#tb-let").show()
        $("#num-list").text(`จำนวน ${c} รายการ`)
        $("#cat").show()
        $('#no-let').hide()
    }
}


async function setStatus(id, val) {
    if (!val) {
        const status = $("#S" + id).is(':checked');
        fetch(`./controller/SetProductStatus.php?status=${status}&id=${id}`).then(() => {
            setTimeout(() => window.location.reload(), 500)
        })
        return
    }
    fetch(`./controller/SetProductStatus.php?status=${val == 0 ? false : true}&id=${id}`)
        .then(() => {
            setTimeout(() => window.location.reload(), 500)
        })
}

/*function setUI(data) {
    $('#notification_amtTable').html('')
    data.forEach((element,i) => {
        console.log(element)
        $('#notification_amtTable').append(`<tr id="rr${i + 1}">
        <th class="index-table-bank">${i + 1}</th>
        <th><img src="${element.product_img}" width="25"></th>
        <th>${element.product_name}</th>
        <th>${element.price}</th>
        <th>${element.product_dlt_unit}</th>
        <th>
            <a  type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25"></a>
        </th>
    </tr>`)

    });
} */
