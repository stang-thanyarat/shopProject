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
    let list = []
    let order = JSON.parse(localStorage.getItem('cart'))
    if (!order || order.length == 0 || localStorage.getItem('cart') === null) {
        $('#addtocartTable').html('<tr ><td colspan="7">ไม่มีรายการสินค้า</td></tr>')
        $('#solutionPay').prop( "disabled", true );
        $('#mySubmit').prop( "disabled", true );
    } else {
        $('#solutionPay').prop( "disabled", false );
        $('#mySubmit').prop( "disabled", false );
        for (const element of order) {
            let product = await (await fetch(`./controller/GetProduct.php?id=${element.id}`)).json()
            product.quantity = element.quantity
            list.push(product)
        }
        setUI(list)
    }
});

function del(id) {
    Swal.fire({
        title: 'คำเตือน',
        text: "คุณต้องการลบรายการสินค้าใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ยกเลิก'
    }).then(async (result) => {
        if (result.isConfirmed) {
            let order = JSON.parse(localStorage.getItem('cart'))
            order = order.filter(e => e.id != id)
            localStorage.setItem('cart', JSON.stringify(order))
            location.reload()
        }
    })
}

function setUI(data) {
    let allprice = 0
    let allquantity = 0
    $('#addtocartTable').html('')
    data.forEach((element, i) => {
        allprice += Number(element.price) * Number(element.quantity)
        allquantity += Number(element.quantity)
        $('#addtocartTable').append(`<tr id="rr${i + 1}">
        <th class="index-table-addtocart">${i + 1}</th>
        <th><img class="object" src="${element.product_img}" width="300"></th>
        <th>${element.product_name}</th>
        <th>${element.price}</th>
        <th>${element.quantity}</th>
        <th>${Number(element.price) * Number(element.quantity)}</th>
        <th>
            <button type="button" class="bgs" onclick="del(${element.product_id})"><img src="./src/images/icon-delete.png" width="25"></button>
            <a href="./productlist.php" class="bgs" ><img src="./src/images/icon-pencil.png" width="25" ></a>
        </th>
    </tr>`)
        $("#allprice").text(allprice)
        $("#cashAllPrice").val(allprice)
        $("#allquantity").text(allquantity)
    });
    console.log(data)

}

$('#receivecash').keyup(()=>{
    const change = Number($('#receivecash').val()) - Number($("#cashAllPrice").val())
    if(change>=0){
        $('#change').val(change)
    }else{
        $('#change').val('')
    }
})
