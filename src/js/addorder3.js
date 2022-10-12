$(document).ready(function () {
    $("#creditupload").hide()
    localStorage.clear()
    localStorage.setItem("tableProduct", JSON.stringify({data: []}))
    localStorage.setItem("tablePrice", JSON.stringify({data: []}))
});

//เพิ่มสินค้า
$("#addproduct").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableProduct"))
    const i = tableObj.data.length
    if ($('#product_name').val() === "" || $('#unitprice').val() === "" || $('#amount').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#list-product').append(`<tr id="rr${i}">
                    <th>${$('#product_name').val() || $("#product_id option:selected").text()}</th>
                    <th>${$('#unitprice').val()}</th>
                    <th>${$('#amount').val()}</th>
                    <th>${Number($('#unitprice').val()) * Number($('#amount').val())}</th>
                    <th>
                        <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    $('#addclose').click()
    tableObj.data.push({
        list: $('#product_name').val(),
        price: $('#unitprice').val(),
        amount: $('#amount').val(),
        allPrice: Number($('#unitprice').val()) * Number($('#amount').val())
    })
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    $('#product_name').val("")
    $('#unitprice').val("")
    $('#amount').val("")
});


//กำหนดแถวที่จะลบ
function saveIndexDel(i) {
    localStorage.setItem('deleteIndex', i)
}

//กำหนดแถวที่จะแก้ไข พร้อมข้อมูลเริ่มต้น
function saveIndexEdit(i) {
    localStorage.setItem('editIndex', i)
    let rows = (JSON.parse(localStorage.getItem("tableProduct"))).data
    $('#editproduct_name').val(rows[i].list)
    $('#editunitprice').val(rows[i].price)
    $('#editamount').val(rows[i].amount)
}

//ลบแถว
function delrow() {
    let tableObj = JSON.parse(localStorage.getItem("tableProduct"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    rows.splice(index, 1)
    $('#list-product').html("")
    rows.forEach((e, i) => {
        $('#list-product').append(`<tr id="rr${i + 1}">
                    <th>${e.list}</th>
                    <th>${e.price}</th>
                    <th>${e.amount}</th>
                    <th>${e.allPrice}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
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
    tableObj.data[index] = {
        list: $('#editproduct_name').val() || $("#editproduct_id option:selected").text(),
        price: $('#editunitprice').val(),
        amount: $('#editamount').val(),
        allPrice: Number($('#editunitprice').val()) * Number($('#editamount').val())
    }
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    let rows = tableObj.data
    $('#list-product').html("")
    rows.forEach((e, i) => {
        $('#list-product').append(`<tr id="rr${i + 1}">
                    <th>${e.list}</th>
                    <th>${e.price}</th>
                    <th>${e.amount}</th>
                    <th>${e.allPrice}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    });
    localStorage.setItem("tableProduct", JSON.stringify(tableObj))
    localStorage.removeItem('editIndex')
    $('#editclose').click()

})


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
    rows.splice(index, 1)
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
        $("#creditupload").show()
    } else {
        $("#creditupload").hide()
    }
});