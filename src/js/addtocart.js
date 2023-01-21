//ส่วนรับรายการสินค้า

let ALL;
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
        ALL = list
        setUI(list)
    }
});

//ลบรายการสินค้าที่เลือก
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
//ส่วนชำระเงินสด
const targetElement = document.getElementById('payment_s')
const submitElement = document.getElementById('mySubmit')
targetElement.addEventListener('change', (e) => {
    if (e.target.value === 'เงินสด') {
        let payment =  $("#payment_s").val()
        $('#payment_sl').val(payment)
        submitElement.setAttribute("data-bs-target", ".bd-example-modal-sm3");
    } else if (e.target.value === 'โอนผ่านบัญชีธนาคาร') {
        let payment =  $("#payment_s").val()
        $('#payment_sl').val(payment)
        submitElement.setAttribute("data-bs-target", ".bd-example-modal-sm4");
    } else if (e.target.value === 'ผ่อนชำระ') {
        let payment =  $("#payment_s").val()
        $('#payment_sl').val(payment)
        submitElement.setAttribute("data-bs-target", ".bd-example-modal-sm5");

    }
})

//ส่วนคำนวณเงินของชำระเงินสด
$('#receivecash').keyup(()=>{
    const change = Number($('#receivecash').val()) - Number($(".all_price").val())
    if(change>=0){
        $('#change').val(change)
    }else{
        $('#change').val('')
    }
})

/*$("#payment_s").change(async function () {
    if ($("#payment_s").val() === 'เงินสด') {
        let payment =  $("#payment_s").val()
            $('#payment_s').val(payment)
            $('#payment_sl').val(payment)

    }
    else if ($("#payment_s").val() === 'โอนผ่านบัญชีธนาคาร') {
        let payment =  $("#payment_s").val()
        $('#payment_s').val(payment)
        $('#payment_sl').val(payment)
    }
    else if ($("#payment_s").val() === 'ผ่อนชำระ') {
        let payment =  $("#payment_s").val()
        $('#payment_s').val(payment)
        $('#payment_sl').val(payment)
    }
});*/

function setUI(data) {
    let allprice = 0
    let allquantity = 0
    $('#addtocartTable').html('')
    data.forEach((element, i) => {
        allprice += Number(element.price) * Number(element.quantity)
        allquantity += Number(element.quantity)
        $('#addtocartTable').append(`<tr id="rr${i + 1}">
        <th style="border-right: 1px;">${i + 1}</th>
        <th style="border-left: 1px; border-right: 1px;">
            <img class="topic_product" src="${element.product_img}">
        </th>
        <th style="border-left: 1px; border-right: 1px;">${element.product_name}</th>
        <th style="border-left: 1px; border-right: 1px;">${element.price}</th>
        <th style="border-left: 1px; border-right: 1px;">${element.quantity}</th>
        <th style="border-left: 1px; border-right: 1px;">${Number(element.price) * Number(element.quantity)}</th>
        <th style="border-left: 1px;" >
        <div class="topic_BTAJ">
            <button type="button" class="bgs" onclick="del(${element.product_id})"><img src="./src/images/icon-delete.png" width="25"></button>
        </div>
        <div class="topic_BTAJ">
        <a href="./productlist.php" class="bgs" ><img src="./src/images/icon-pencil.png" width="25" ></a>
        </div>
        </th>
    </tr>`)
        $("#allprice").text(allprice)
        $(".all_price").val(allprice)
        $("#allquantity").text(allquantity)
        $(".all_quantity").val(allquantity)
    });
    console.log(data)
}

//เพิ่มข้อมูลเข้าตาราง
/*function setUI() {
    let salesamt = 0
    let allquantity = 0
    $("#salestodatabase").submit(function (event) {
        salesamt = Number(element.price) * Number(element.quantity)
        allquantity = Number(element.quantity)
        event.preventDefault();
        localStorage.setItem("cart", JSON.stringify(tableObj))
        $('#sales_dt').val("")
        $('#product_id').val("")
        $('#sales_amt').val(salesamt)
        $('#sales_pr').val(salespr)
    });
}*/

async function loopInsert(){
    let lastID = await (await fetch('controller/GetLastIdSales.php')).text()
    let data = JSON.parse(localStorage.getItem('cart'))
    for (const e of data) {
        var formdata = new FormData();
        let objData = ALL.filter(d => d.product_id == e.id);
        console.log("objData:",objData)
        formdata.append("sales_list_id", lastID);
        formdata.append("product_id", e.id);
        formdata.append("sales_amt", e.quantity);
        formdata.append("sales_pr", objData[0].price);
        formdata.append("form_action", "insert");
        formdata.append("table", "salesdetails");
        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };
        await fetch("controller/SalesDetails.php", requestOptions)
    }
}


//ตรวจสอบพร้อมส่งข้อมูล
$("#form1").submit(async function (event)
{
    event.preventDefault();
    $('#sales').val(JSON.stringify(JSON.parse(localStorage.getItem("cart")).data))
    let response = await fetch('controller/Sales.php', {
        method: 'POST',
        body: new FormData(document.form1)
    });
    console.log(response);
    if (!response.ok) {
        console.log(response);
    } else {
        await Swal.fire({
            icon: 'success',
            text: 'การชำระเสร็จสิ้น',
            timer: 3000
        })
        console.log(await response.text());
        loopInsert()
        localStorage.clear()
        window.location.assign("productlist.php");
    }
});

$("#form2").submit(async function (event)
{
    event.preventDefault();
    $('#sales').val(JSON.stringify(JSON.parse(localStorage.getItem("cart")).data))
    let response = await fetch('controller/Sales.php', {
        method: 'POST',
        body: new FormData(document.form2)
    });
    if (!response.ok) {
        console.log(response);
    } else {
        await Swal.fire({
            icon: 'success',
            text: 'การชำระเสร็จสิ้น',
            timer: 3000
        })
        console.log(await response.text());
        loopInsert()
        //localStorage.clear()
        //window.location.assign("productlist.php");
    }
});

$("#form3").submit(async function (event)
{
    event.preventDefault();
    $('#sales').val(JSON.stringify(JSON.parse(localStorage.getItem("cart")).data))
    let response = await fetch('controller/Sales.php', {
        method: 'POST',
        body: new FormData(document.form3)
    });
    console.log(response);
    if (!response.ok) {
        console.log(response);
    } else {
        await Swal.fire({
            icon: 'success',
            text: 'การชำระเสร็จสิ้น',
            timer: 3000
        })
        console.log(await response.text());
        window.location.assign("productlist.php");
    }
});