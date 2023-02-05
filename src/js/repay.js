let AllPrice =0;

function getAllprice(price) {
    AllPrice = price
}


$(document).ready(function () {
    $("#slip_upload").hide()
    localStorage.clear()
    localStorage.setItem("tableRepay", JSON.stringify({ data: [] }))
});

//เพิ่มสินค้า
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


//กำหนดแถวที่จะลบ
function saveIndexDel(i) {
    localStorage.setItem('deleteIndex', i)
}

//กำหนดแถวที่จะแก้ไข พร้อมข้อมูลเริ่มต้น
function saveIndexEdit(i) {
    localStorage.setItem('editIndex', i)
    let rows = (JSON.parse(localStorage.getItem("tableProduct"))).data
    $('#edittypeproduct').val(rows[i - 1].type)
    $('#editlistproduct').val(rows[i - 1].list)
    $('#editbrand').val(rows[i - 1].brand)
    $('#editproductmodel').val(rows[i - 1].model)
    $('#editunitprice').val(rows[i - 1].price)
    $('#editamount').val(rows[i - 1].amount)
}

//ลบแถว
function delrow() {
    let tableObj = JSON.parse(localStorage.getItem("tableProduct"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    if (rows.length > 0) {
        rows.splice(index - 1)
    }
    $('#list-repay').html("")
    rows.forEach((e, i) => {
        $('#list-repay').append(`<tr id="rr${i + 1}">
                    <th>${e.type}</th>
                    <th>${e.list}</th>
                    <th>${e.brand}</th>
                    <th>${e.model}</th>
                    <th>${e.price}</th>
                    <th>${e.amount}</th>
                    <th>${e.allPrice}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm3"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    tableObj.data = rows
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    localStorage.removeItem('deleteIndex')
    $('#closedelrow').click()
}

//แก้ไขบัญชี
$("#editaddproduct").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableProduct"))
    const index = localStorage.getItem('editIndex')
    tableObj.data[index - 1] = {
        type: $('#edittypeproduct').val(),
        list: $('#editlistproduct').val(),
        brand: $('#editbrand').val(),
        model: $('#editproductmodel').val(),
        price: $('#editunitprice').val(),
        amount: $('#editamount').val(),
        allPrice: Number($('#editunitprice').val()) * Number($('#editamount').val())
    }
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    let rows = tableObj.data
    $('#list-repay').html("")
    rows.forEach((e, i) => {
        $('#list-repay').append(`<tr id="rr${i + 1}">
                    <th>${e.type}</th>
                    <th>${e.list}</th>
                    <th>${e.brand}</th>
                    <th>${e.model}</th>
                    <th>${e.price}</th>
                    <th>${e.amount}</th>
                    <th>${e.allPrice}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm3"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    localStorage.removeItem('editIndex')
    $('#editclose').click()

})

$("#payment_sl").change(function () {
    if ($("#payment_sl").val() === 'โอนเงิน') {
        $("#slip_upload").show()
    } else {
        $("#slip_upload").hide()
    }
});