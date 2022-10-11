$("#category_id").change(async function () {
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
        console.log(product);
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

$(document).ready(async function () {
    let url = './controller/ProductResult.php'
    const product = await (await fetch(url)).json()
    console.log(product);
    setUI(product)
});

function setUI(data) {
    $('#productResultTable').html('')
    data.forEach(element => {
        if (element.product_rm_unit == 0) {
            lost.push(element.product_id)
        }
        $('#productResultTable').append(`
        <tr>
        <th>${element.category_name || $("#category_id option:selected").text()}</th>
        <th>${element.product_name}</th>
        <th>${element.brand}</th>
        <th>${element.model}</th>
        <th>${element.product_dlt_unit}</th>
        <th>${element.product_rm_unit}</th>
        <th>${element.price}</th>
        <th><img src="${element.product_img}" width="25"></th>
        <th>
            <label class="switch">
                <input ${element.product_rm_unit == 0 ? 'disabled' : ''} type="checkbox" id="S${element.product_id}" ${element.sales_status == 1 && element.product_rm_unit > 0 ? "checked" : ""} onchange="setStatus(${element.product_id})">
                <span class="slider round"></span>
            </label>
        </th>
        <th>
            <a  data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1"><img src="./src/images/icon-delete.png" width="25"></a>
            <a  href="./editproduct.php?id=${element.product_id}"><img src="./src/images/icon-pencil.png" width="25"></a>
        </th>
    </tr>`)

    });
    lost.forEach(async (e) => {
        await setStatus(e, 0)
    })
}

async function setStatus(id, val) {
    if (!val) {
        const status = $("#S" + id).is(':checked');
        await (await fetch(`./controller/SetProductStatus.php?status=${status}&id=${id}`))
        return
    }
    await (await fetch(`./controller/SetProductStatus.php?status=${val == 0 ? false : true}&id=${id}`))
}