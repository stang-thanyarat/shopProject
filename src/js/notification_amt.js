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
    $('#notification_amtTable').html('')
    data.forEach((element,i) => {
        console.log(element)
        $('#notification_amtTable').append(`<tr id="rr${i + 1}">
        <th><img src="${element.product_img}" width="25"></th>
        <th>${element.product_name}</th>
        <th>${element.price}</th>
        <th>${element.product_rm_unit}</th>
        <th>
            <label class="switch">
                <input  type="checkbox" id="S${element.product_id}" onchange="setStatus(${element.product_id})" ${element.product_rm_unit == 1 ? 'checked' : ''} ${element.sales_status == 1 && element.product_rm_unit > 0 ? "checked" : ""} >
                <span class="slider round"></span>
            </label>
        </th>
        <th>
            <a  type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25"></a>
        </th>
    </tr>`)

    });
}
