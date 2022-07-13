$(document).ready(function () {
    localStorage.clear()
    localStorage.setItem("tableProducttype", JSON.stringify({ data: [] }))
});

//เพิ่มประเภทสินค้า
$("#addproducttype").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableProducttype"))
    const i = $('#producttypetable').children().length + 1
    if ($('#addproducttypename').val() === "" || $('#addallproducttype').val() === "" || $('#addsellproducttype').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#producttypetable').append(`<tr id="rr${i}">
                    <th class="index-table-producttype">${i}</th>
                    <th>${$('#addproducttypename').val()}</th>
                    <th>${$('#addallproducttype').val()}</th>
                    <th>${$('#addsellproducttype').val()}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl3"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    $('#addclose').click()
    tableObj.data.push({
        producttype: $('#addproducttypename').val(),
        all: $('#addallproducttype').val(),
        sell: $('#addsellproducttype').val(),
    })
    localStorage.setItem("tableProducttype", JSON.stringify(tableObj))
    $('#addproducttypename').val("")
    $('#addallproducttype').val("")
    $('#addsellproducttype').val("")

});

//แก้ไขบัญชี
$("#editproducttype").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableProducttype"))
    const index = localStorage.getItem('editIndex')
    tableObj.data[index - 1] = {
        producttype: $('#editproducttypename').val(),
        all: $('#editallproducttype').val(),
        sell: $('#editsellproducttype').val(),
    }
    localStorage.setItem("tableProducttype", JSON.stringify(tableObj))
    let rows = tableObj.data
    $('#producttypetable').html("")
    rows.forEach((e, i) => {
        $('#producttypetable').append(`<tr id="rr${i + 1}">
                    <th class="index-table-producttype">${i + 1}</th>
                    <th>${e.producttype}</th>
                    <th>${e.all}</th>
                    <th>${e.sell}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl3"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    localStorage.setItem("tableProducttype", JSON.stringify(tableObj))
    localStorage.removeItem('editIndex')
    $('#editclose').click()


})

//กำหนดแถวที่จะลบ
function saveIndexDel(i) {
    localStorage.setItem('deleteIndex', i)
}
//กำหนดแถวที่จะแก้ไข พร้อมข้อมูลเริ่มต้น
function saveIndexEdit(i) {
    localStorage.setItem('editIndex', i)
    let rows = (JSON.parse(localStorage.getItem("tableProducttype"))).data
    $('#editproducttypename').val(rows[i - 1].producttype)
    $('#editallproducttype').val(rows[i - 1].all)
    $('#editsellproducttype').val(rows[i - 1].sell)
}

//ลบแถว
function delrow() {
    let tableObj = JSON.parse(localStorage.getItem("tableProducttype"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    if (rows.length > 0) {
        rows.splice(index - 1)

    }
    $('#producttypetable').html("")
    rows.forEach((e, i) => {
        $('#producttypetable').append(`<tr id="rr${i + 1}">
                    <th class="index-table-producttype">${i + 1}</th>
                    <th>${e.producttype}</th>
                    <th>${e.all}</th>
                    <th>${e.sell}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl3"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    tableObj.data = rows
    localStorage.setItem("tableProducttype", JSON.stringify(tableObj))
    localStorage.removeItem('deleteIndex')
    $('#closedelrow').click()
}