const targetElement = document.getElementById('solutionPay')
const submitElement = document.getElementById('mySubmit')
targetElement.addEventListener('change', (e) => {
    if (e.target.value === 'cash') {
        submitElement.setAttribute("data-bs-target", ".bd-example-modal-sm3")
    } else if (e.target.value === 'bankTransfer') {
        submitElement.setAttribute("data-bs-target", ".bd-example-modal-sm4")
    } else if (e.target.value === 'installment') {
        submitElement.setAttribute("data-bs-target", ".bd-example-modal-sm5")
    }
})

$(document).ready(async function () {
    let url = './controller/Addtocart.php'
    const product = await (await fetch(url)).json()
    console.log(product);
    setUI(product)
});

function setUI(data) {
    $('#addtocartTable').html('')
    data.forEach((element, i) => {
        $('#addtocartTable').append(`<tr id="rr${i + 1}">
        <th class="index-table-addtocart">${i + 1}</th>
        <th><img src="${element.product_img}" width="25"></th>
        <th>${element.product_name}</th>
        <th>${element.price}</th>
        <th>${element.product_dlt_unit}</th>
        <th>${element.price}.${element.product_dlt_unit}</th>
        <th>
            <a  data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1"><img src="./src/images/icon-delete.png" width="25"></a>
        <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
        </th>
    </tr>`)

    });
    lost.forEach(async (e) => {
        await setStatus(e, 0)
    })
}

function setStatus(id, val) {
    if (!val) {
        const status = $("#S" + id).is(':checked');
        fetch(`./controller/SetProductStatus.php?status=${status}&id=${id}`).then(() => {
            location.reload()
        })
    }
    fetch(`./controller/SetProductStatus.php?status=${val == 0 ? false : true}&id=${id}`).then(() => {
        location.reload()
    })
}