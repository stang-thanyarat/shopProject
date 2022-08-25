$(document).ready(async function () {
    let url = './controller/Sell.php'
    const product = await (await fetch(url)).json()
    console.log(product);
    setUI(product)
});

function setUI(data) {
    $('#sellTable').html('')
    data.forEach(element => {
        $('#sellTable').append(`
        <tr>
        <th>${element.sell_name}</th>
        <th>${element.sell_tax_id}</th>
        <th><img src="${element.seller_cardname}" width="25"></th>
        <th>
        <button type="button" class="bgs" data-bs-toggle="modal1" data-bs-target="#exampleModal<?= $e['sell_id']; ?>"><img src="./src/images/icon-delete.png" width="25"></button>
        <a type="button" class="btn1" href="editstaff.php?id=<?= $e['sell_id']; ?>"><img src="./src/images/icon-pencil.png" width="25"></a>
        </th>
    </tr>`)

    });
}