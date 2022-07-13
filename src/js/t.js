$(document).ready(function () {
    localStorage.clear()
    localStorage.setItem("tableproduct", JSON.stringify({ data: [] }))
});

//เพิ่มรายการสินค้า
$("#addproduct").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableproduct"))
    const i = $('#producttable').children().length + 1
    if ($('#addtypeproduct').val() === "" || $('#addlistproduct').val() === "" || $('#addbrand').val() === "" || $('#addproductmodel').val() === "" || $('#addamountproduct').val() === ""
        || $('#addnumber').val() === "" || $('#addexpirationdate').val() === "" || $('#addprice').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#producttable').append(`<tr id="rr${i}">
                    <th>${$('#addtypeproduct').val()}</th>
                    <th>${$('#addlistproduct').val()}</th>
                    <th>${$('#addbrand').val()}</th>
                    <th>${$('#addproductmodel').val()}</th>
                    <th>${$('#addamountproduct').val()}</th>
                    <th>${$('#addnumber').val()}</th>
                    <th>${$('#addexpirationdate').val()}</th>
                    <th>${$('#addprice').val()}</th>
                
                </tr>`)
    $('#addclose').click()
    tableObj.data.push({
        typeproduct: $('#addtypeproduct').val(),
        listproduc: $('#addlistproduct').val(),
        brand: $('#addbrand').val(),
        productmodel: $('#addproductmodel').val(),
        amountproduct: $('#addamountproduct').val(),
        number: $('#addnumber').val(),
        expirationdate: $('#addexpirationdate').val(),
        prices: $('#addprice').val()
    })
    localStorage.setItem("tableproduct", JSON.stringify(tableObj))
    $('#addtypeproduct').val("")
    $('#addlistproduct').val("")
    $('#addbrand').val("")
    $('#addproductmodel').val("")
    $('#addamountproduct').val("")
    $('#addnumber').val("")
    $('#addexpirationdate').val("")
    $('#addprice').val("")

});

//เพิ่มค่าใช้จ่ายอื่นๆ
$("#addotherexpenses").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableproduct"))
    const i = $('#otherexpensestable').children().length + 1
    if ($('#addlist').val() === "" || $('#addpriceother').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#otherexpensestable').append(`<tr id="rr${i}">
                    <th>${$('#addlist').val()}</th>
                    <th>${$('#addpriceother').val()}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl1"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    $('#addclose1').click()
    tableObj.data.push({
        list: $('#addlist').val(),
        priceother: $('#addpriceother').val(),
    })
    localStorage.setItem("tableproduct", JSON.stringify(tableObj))
    $('#addlist').val("")
    $('#addpriceother').val("")

});

//แก้ไขค่าใช้จ่ายอื่นๆ
$("#addotherexpenses").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableproduct"))
    const index = localStorage.getItem('editIndex')
    tableObj.data[index - 1] = {
        list: $('#addlist').val(),
        priceother: $('#addpriceother').val(),
    }
    localStorage.setItem("tableproduct", JSON.stringify(tableObj))
    let rows = tableObj.data
    $('#otherexpensestable').html("")
    rows.forEach((e, i) => {
        $('#otherexpensestable').append(`<tr id="rr${i + 1}">
        <th class="index-table-bank">${i + 1}</th>
                    <th>${e.list}</th>
                    <th>${e.priceother}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl1"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    localStorage.setItem("tableproduct", JSON.stringify(tableObj))
    localStorage.removeItem('editIndex')
    $('#editclose').click()

});

//กำหนดแถวที่จะลบ
function saveIndexDel(i) {
    localStorage.setItem('deleteIndex', i)
}
//กำหนดแถวที่จะแก้ไข พร้อมข้อมูลเริ่มต้น
function saveIndexEdit(i) {
    localStorage.setItem('editIndex', i)
    let rows = (JSON.parse(localStorage.getItem("tableproduct"))).data
    $('#addlist').val(rows[i - 1].list)
    $('#addpriceother').val(rows[i - 1].priceother)
}

//ลบแถว
function delrow() {
    let tableObj = JSON.parse(localStorage.getItem("tableproduct"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    if (rows.length > 0) {
        rows.splice(index, index - 1)
        $('#rr' + index).remove()
    }
    $('#otherexpensestable').html("")
    rows.forEach((e, i) => {
        $('#otherexpensestable').append(`<tr id="rr${i + 1}">
                    <th>${e.list}</th>
                    <th>${e.priceother}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl1"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    localStorage.setItem("tableproduct", JSON.stringify(tableObj))
    localStorage.removeItem('deleteIndex')
    $('#closedelrow').click()
}