$(document).ready(function () {
    localStorage.clear()
    localStorage.setItem("tableRepay", JSON.stringify({ data: [] }))
});

//เพิ่มสินค้า
$("#addrepay").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableRepay"))
    const i = $('#list-repay').children().length + 1
    if ($('#typeproduct').val() === "" || $('#listproduct').val() === "" || $('#brand').val() === "" || $('#productmodel').val() === "" || $('#unitprice').val() === "" || $('#amount').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#list-repay').append(`<tr id="rr${i}">
                    <th>${$('#repaymentdate').val()}</th>
                    <th>${$('#payment').val()}</th>
                    <th>${$('#slip').val()}</th>
                    <th>${$('#paymentamount').val()}</th>
                    <th>${$('#deduct').val()}</th>
                    <th>${$('#lessinterest').val()}</th>
                    <th>${$('#outstanding').val()}</th>
                    
                </tr>`)
    $('#addclose').click()
    tableObj.data.push({
        repay: $('#repaymentdate').val(),
        pay: $('#payment').val(),
        slip: $('#slip').val(),
        payAmount: $('#paymentamount').val(),
        deduct: $('#deduct').val(),
        lessinterest: $('#lessinterest').val(),
        outstanding: $('#outstanding').val(),
        //outstanding: Number($('#paymentamount').val()) - Number($('#deduct').val()) - Number($('#lessinterest').val())
    })
    localStorage.setItem("tableRepay", JSON.stringify(tableObj))
    $('#repaymentdate').val("")
    $('#payment').val("")
    $('#slip').val("")
    $('#paymentamount').val("")
    $('#deduct').val("")
    $('#lessinterest').val("")
    $('#outstanding').val("")
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