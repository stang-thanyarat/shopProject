$("#category_id").change(async function () {
    let url = `./controller/ProductResult.php?category_id=${$("#category_id").val()}`
    if ($("#keyword").val() !== "") {
        url += `&keyword=${$("#keyword").val()}`
    }
    const product = await (await fetch(url)).json()
    setUI(product)
});

$("#keyword").keyup(async function () {
    let url = `./controller/ProductResult.php?keyword=${$("#keyword").val()}`
    if ($("#category_id").val() !== "") {
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
        $('#productResultTable').append(`
        <tr>
        <th>${element.category_name}</th>
        <th>${element.product_name}</th>
        <th>${element.brand}</th>
        <th>${element.model}</th>
        <th>${element.product_dlt_unit}</th>
        <th>${element.product_rm_unit}</th>
        <th>${element.price}</th>
        <th><img src="${element.product_img}" width="25"></th>
        <th>
            <label class="switch">
                <input type="checkbox" id="S${element.product_id}" ${element.sales_status == 1 ? "checked" : ""} onchange="setStatus(${element.product_id})">
                <span class="slider round"></span>
            </label>
        </th>
        <th>
            <a type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1"><img src="./src/images/icon-delete.png" width="25"></a>
            <a type="button" href="./editproduct.php"><img src="./src/images/icon-pencil.png" width="25"></a>
        </th>
    </tr>`)

    });
}

async function setStatus(id){
    const status = $("#S"+id).is(':checked');
    console.log(await (await fetch(`./controller/SetProductStatus.php?status=${status}&id=${id}`)))
}