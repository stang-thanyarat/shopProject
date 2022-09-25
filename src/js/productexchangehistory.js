$(function (){
    $("#product_name").autocomplete({
        source: "./controller/ProductExchangeList.php",
        minLength : 2
    });
});
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
    $('#productExchangeTable').html('')
    data.forEach(element => {
        console.log(element)
        $('#productExchangeTable').append(`
        <tr> 
                        <th>${element.exchange_date}</th>
                        <th>${element.exchange_time}</th>
                        <th>${element.product_name || $("#product_id option:selected").text()}</th>
                        <th>${element.exchange_amount}</th>
                        <th>${element.exchange_status}</th>
                        <th>
            <a  data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1"><img src="./src/images/icon-delete.png" width="25"></a>
            <a  href="./editproductexchange.php?id=${element.product_id}"><img src="./src/images/icon-pencil.png" width="25"></a>
        </th>
    </tr>`)

    });
}