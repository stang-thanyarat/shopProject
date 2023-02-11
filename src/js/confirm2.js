$(document).ready(function () {
    $("#slipupload").hide()
    localStorage.clear()
    localStorage.setItem("tableProduct", JSON.stringify({ data: [] }))
    localStorage.setItem("tablePrice", JSON.stringify({ data: [] }))
});

$("#addrepay").submit( async function (event) {
    event.preventDefault();
    if ($('#paymentamount').val() === "" || $('#payment_sl').val() === "" || $('#deduct').val() === "" || $('#lessinterest').val() === "" || $('#lessinterest').val() === "" || $('#outstanding').val() === "") {
        return
    }
    let lastID = await (await fetch('controller/GetLastIdContract.php')).text()
    var formdata1 = new FormData();
    formdata1.append("contract_code", lastID);
    formdata1.append("payment_amount", $('#paymentamount').val());
    formdata1.append("payment", $('#payment_sl').val());
    formdata1.append("deduct_principal", $('#deduct').val());
    formdata1.append("less_interest", $('#lessinterest').val());
    formdata1.append("outstanding", $('#outstanding').val());
    formdata1.append("form_action", "insert");
    formdata1.append("table", "debtPaymentDetails");
    var requestOptions = {
        method: 'POST',
        body: formdata1,
        redirect: 'follow'
    };
    await fetch("controller/DebtPaymentDetails.php", requestOptions)
    //location.reload()
});
//เพิ่มสินค้า
$("#addproduct").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableProduct"))
    const i = tableObj.data.length
    if ($('#typeproduct').val() === "" || $('#product_name').val() === "" || $('#brand').val() === "" || $('#model').val() === "" || $('#unitprice').val() === "" || $('#amount').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#list-product').append(`<tr id="rr${i}">
                    <th>${$('#typeproduct').val()}</th>
                    <th>${$('#product_name').val()}</th>
                    <th>${$('#brand').val()}</th>
                    <th>${$('#model').val()}</th>
                    <th>${$('#unitprice').val()}</th>
                    <th>${$('#amount').val()}</th>
                    <th>${$('#exp_date').val()}</th>
                    <th>${Number($('#unitprice').val()) * Number($('#amount').val())}</th>
                </tr>`)
    $('#addclose').click()
    tableObj.data.push({
        type: $('#typeproduct').val(),
        list: $('#product_name').val(),
        brand: $('#brand').val(),
        model: $('#model').val(),
        price: $('#unitprice').val(),
        amount: $('#amount').val(),
        amount: $('#exp_date').val(),
        allPrice: Number($('#unitprice').val()) * Number($('#amount').val())
    })
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    $('#typeproduct').val("")
    $('#product_name').val("")
    $('#brand').val("")
    $('#model').val("")
    $('#unitprice').val("")
    $('#amount').val("")
    $('#exp_date').val("")
});



//เพิ่มรายการอื่นๆ
$("#addprice").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tablePrice"))
    const i = tableObj.data.length
    if ($('#listother').val() === "" || $('#priceother').val() === "") {
        $('#addtable2').blur()
        return
    }
    $('#list-priceother').append(`<tr id="rr${i}">
                    <th>${$('#listother').val()}</th>
                    <th>${$('#priceother').val()}</th>
                    <th>
                        <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModalother"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel1(${i})"></button>
                        <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm4"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit1(${i})"></button>
                    </th>
                </tr>`)
    $('#addcloseother').click()
    tableObj.data.push({
        listOther: $('#listother').val(),
        priceOther: $('#priceother').val(),

    })
    localStorage.setItem("tablePrice", JSON.stringify(tableObj))
    $('#listother').val("")
    $('#priceother').val("")

});

//กำหนดแถวที่จะลบ
function saveIndexDel1(i) {
    localStorage.setItem('deleteIndex', i)
}

//กำหนดแถวที่จะแก้ไข พร้อมข้อมูลเริ่มต้น
function saveIndexEdit1(i) {
    localStorage.setItem('editIndex', i)
    let rows = (JSON.parse(localStorage.getItem("tablePrice"))).data
    $('#editlistother').val(rows[i].listOther)
    $('#editpriceother').val(rows[i].priceOther)
}

//ลบแถว
function delrow2() {
    let tableObj = JSON.parse(localStorage.getItem("tablePrice"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    rows.splice(index , 1)
    $('#list-priceother').html("")
    rows.forEach((e, i) => {
        $('#list-priceother').append(`<tr id="rr${i + 1}">
                    <th>${e.listOther}</th>
                    <th>${e.priceOther}</th>
                    <th>
                    <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModalother"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel1(${i})"></button>
                    <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm4"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit1(${i})"></button>
                    </th>
                </tr>`)
    });
    tableObj.data = rows
    localStorage.setItem("tablePrice", JSON.stringify(tableObj))
    localStorage.removeItem('deleteIndex')
    $('#closedelrow2').click()
}

//แก้ไข
$("#editaddprice").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tablePrice"))
    const index = localStorage.getItem('editIndex')
    tableObj.data[index] = {
        listOther: $('#editlistother').val(),
        priceOther: $('#editpriceother').val(),
    }
    localStorage.setItem("tablePrice", JSON.stringify(tableObj))
    let rows = tableObj.data
    $('#list-priceother').html("")
    rows.forEach((e, i) => {
        $('#list-priceother').append(`<tr id="rr${i + 1}">
        <th>${e.listOther}</th>
        <th>${e.priceOther}</th>
        <th>
        <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModalother"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel1(${i})"></button>
        <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm4"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit1(${i})"></button>
        </th>
        </tr>`)
    });
    localStorage.setItem("tablePrice", JSON.stringify(tableObj))
    localStorage.removeItem('editIndex')
    $('#editaddcloseother').click()

})

$("#payment_sl").change(function () {
    if ($("#payment_sl").val() === 'เครดิต') {
        $("#slipupload").show()
    } else {
        $("#slipupload").hide()
    }
});

async function loopproduct() {
    let lastID = await (await fetch('controller/GetLastIdOrder.php')).text()
    var formdata = new FormData();
    formdata.append("order_id", $("#order_id").val());
    formdata.append("product_id", $("#product_id").val());
    formdata.append("order_amt", $("#order_amt").val());
    formdata.append("order_pr", $("#order_pr").val());
    formdata.append("listother", $("#listother").val());
    formdata.append("priceother", $("#priceother").val());
    formdata.append("form_action", "update");
    formdata.append("table", "orderdetails");
    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };
    await fetch("controller/OrderDetails.php", requestOptions)
}

//ตรวจสอบพร้อมส่งข้อมูล
$("#form1").submit(async function (event) {
    event.preventDefault();
    let response = await fetch('controller/Order.php', {
        method: 'POST',
        body: new FormData(document.form1)
    });
    console.log(response);
    if (!response.ok) {
        console.log(response);
    } else {
        loopproduct()
        await Swal.fire({
            icon: 'success',
            text: 'บันทึกข้อมูลเสร็จสิ้น',
        })
        console.log(await response.text());
        window.location.assign("order.php");
    }

});