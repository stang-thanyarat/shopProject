$("#category_id").change(async function () {
    if ($("#category_id").val() !== "all") {
        let url = `./controller/DailyBestSeller.php?category_id=${$("#category_id").val()}`
        if ($("#keyword").val() !== "") {
            url += `&keyword=${$("#keyword").val()}`
        }
        const product = await (await fetch(url)).json()
        setUI(product)
    } else {
        let url = './controller/DailyBestSeller.php'
        if ($("#keyword").val() !== "") {
            url += `?keyword=${$("#keyword").val()}`
        }
        const product = await (await fetch(url)).json()

        setUI(product)
    }
});

$("#keyword").keyup(async function () {
    let url = `./controller/DailyBestSeller.php?keyword=${$("#keyword").val()}`
    if ($("#category_id").val() !== "" && $("#category_id").val() !== "all") {
        url += `&category_id=${$("#category_id").val()}`
    }
    const product = await (await fetch(url)).json()
    setUI(product)
});

async function start() {
    let url = './controller/DailyBestSeller.php'
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
    $('#dailybestsellerTable').html('')
    data.forEach((element, i) => {
        c++
        $('#dailybestsellerTable').append(`<tr id="rr${i + 1}">
        <th class="index-table-bank">${i + 1}</th>
        <th><img src="${element.product_img}" width="400"></th>
        <th>${element.product_name}</th>
        <th>${element.price}</th>
        <th>${element.product_dlt_unit}</th>
    </tr>`)
    });
    if (c <= 0) {
        $('#no-let').show()
        $("#tb-let").hide()
    } else {
        $("#tb-let").show()
        $('#no-let').hide()
    }
}