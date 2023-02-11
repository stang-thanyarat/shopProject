//ส่วนรับรายการสินค้า
let ALL;
$(document).ready(async function () {
    $('#pay_C').hide()
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
/*
$('#mySubmit').click(async()=>{
    const submitElement = document.getElementById('mySubmit')
    if ($('#payment_s').val() === 'เงินสด') {
        let payment =  $("#payment_s").val()
        $('#payment_sl').val(payment)
        submitElement.setAttribute("data-bs-target", ".cash-form");
    } else if ($('#payment_s').val() === 'โอนผ่านบัญชีธนาคาร') {
        let payment =  $("#payment_s").val()
        $('#payment_sl').val(payment)
        submitElement.setAttribute("data-bs-target", ".transfer-form");
    } else if ($('#payment_s').val() === 'ผ่อนชำระ') {
        let route = (await (await fetch('./controller/GetRolesSales.php')).text()).trim()
        if(route !== "L") {
            fetch('./controller/LogOutAndClear.php').then(()=>{
                window.location ="./login.php"
            })
        }else{
            submitElement.setAttribute("data-bs-target", ".search-costumer-form");
        }
    }

})

 */

//ส่วนชำระเงินสด
const targetElement = document.getElementById('payment_s')
const submitElement = document.getElementById('mySubmit')
targetElement.addEventListener('change', async (e) =>  {
    if (e.target.value === 'เงินสด') {
        let payment =  $("#payment_s").val()
        $('#payment_sl').val(payment)
        submitElement.setAttribute("data-bs-target", ".cash-form");
    } else if (e.target.value === 'โอนผ่านบัญชีธนาคาร') {
        let payment =  $("#payment_s").val()
        $('#payment_sl').val(payment)
        submitElement.setAttribute("data-bs-target", ".transfer-form");
    } else if (e.target.value === 'ผ่อนชำระ') {
        let route = (await (await fetch('./controller/GetRolesSales.php')).text()).trim()
        if(route !== "L") {
            //window.location ="./controller/LogOut.php"
            fetch('./controller/LogOutAndClear.php').then(()=>{
                window.location ="./login.php"
            })

        }else{
            submitElement.setAttribute("data-bs-target", ".search-costumer-form");
        }
    }
})


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
            <img class="topic_product" style="width: 325px; height: 325px;" src="${element.product_img}">
        </th>
        <th style="border-left: 1px; border-right: 1px;">${element.product_name}</th>
        <th style="border-left: 1px; border-right: 1px;">${element.price}</th>
        <th style="border-left: 1px; border-right: 1px;">${element.quantity}</th>
        <th style="border-left: 1px; border-right: 1px;">${Number(element.price) * Number(element.quantity)}</th>
        <th style="border-left: 1px;" >
        <div class="topic_BTAJ">
            <button type="button" class="bgs" onclick="del(${element.product_id})"><img src="./src/images/icon-delete.png" class="delete" width="30"></button>
        </div>
        <div class="topic_BTAJ">
            <a href="./productlist.php" class="bgs" ><img src="./src/images/icon-pencil.png" class="edit" width="30"></a>
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
        formdata.append("sales_pr", objData[0].price * e.quantity);
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

///form1
//เงินสด
//ส่วนคำนวณเงินของชำระเงินสด
$('#receivecash').keyup(()=>{
    const change = Number($('#receivecash').val()) - Number($(".all_price").val())
    if(change>=0){
        $('#change').val(change)
        $('#pay_C').show()
    }else{
        $('#change').val('')
        $('#pay_C').hide()
    }
})

//ตรวจสอบพร้อมส่งข้อมูล form1
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
        loopInsert()
        Swal.fire({
            icon: 'success',
            text: 'บันทึกข้อมูลเสร็จสิ้น',
            timer: 3000
        }).then(async () => {
            localStorage.clear()
            let lastID = await (await fetch('controller/GetLastIdSales.php')).text()
            window.location = './service/PDF/template/receipt.php?id='+lastID
            //window.location = 'productlist.php'
        })
    }
});

///form2
//โอนผ่านบัญชีธนาคาร
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
        loopInsert()
        Swal.fire({
            icon: 'success',
            text: 'บันทึกข้อมูลเสร็จสิ้น',
            timer: 3000
        }).then(() => {
            localStorage.clear()
            window.location = './index.php'
        })
    }
});

///form3
//การผ่อนชำระ
//คีย์ข้อมูลลูกค้าเพื่อตรวจสอบ
$("#search").click(async function () {
    let url = `./controller/SalestoContract.php`
    if($("#keyword").val() !== "" ){
        url += `?keyword=${$("#keyword").val()}`
    }
    else if ($("#keyword").val() === "" ) {
        url += `?keyword=${$("#keyword").val("")}`
    }
    const keyword = await (await fetch(url)).json()
    if(keyword.length >0){
        setU(keyword)
    }else{
        $('#salestocontracttable').html('<br><center><h3>ไม่พบรายการการผ่อนชำระ</h3></center>')
        $('#next-add').attr("href",'./addcontract.php')
    }

});

//ส่วนแสดงผลข้อมูลลูกค้า
async function star() {
    let url = './controller/SalestoContract.php'
    const keyword = await(await fetch(url)).json()
    console.log(keyword);
    setU(keyword)
}

$(document).ready(function () {
    star()
});

function setU(keyword) {
    let c = 0
    let table = `<table class="col-11 salestocontracttable">
                    <tr>
                        <th width=15%>ลำดับ</th>
                        <th width=15%>วันที่ทำสัญญา</th>
                        <th width=10%>วันที่ครบกำหนดชำระ</th>
                        <th width=15%>สถานะ</th>
                        <th width=15%>คงค้าง</th>
                    </tr>
                    <tbody>`
    keyword.forEach((element, i) => {
        $('#next-add').attr("href",`./addcontract.php?cardID=${element.customer_img}`)
        c++
        table += `<tr id="rr${i + 1}">
        <th class="index-table-bank">${i + 1}</th>
        <th>${element.date_contract}</th>
        <th>${element.date_due}</th>
        <th>${element.outstanding}</th>
        <th>${element.slip_img}</th>
    </tr>`
    })
        table+='</tbody></table>`'
    $('#salestocontracttable').html(table)
}

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
        loopInsert()
        //localStorage.clear()
        window.location.assign("productlist.php");
    }
});