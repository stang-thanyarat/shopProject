$(document).ready(function () {
    localStorage.clear()
    localStorage.setItem("tableCategory", JSON.stringify({ data: [] }))
});

//ส่วนตรง name="category_id" id="category_id"> ส่วนนี้คือ PK ของตาราง Category อาจจะมีการเปลี่ยนแปลงได้ทั้งตำแหน่งและหน้าที่

//ส่วนของ category_name คือ ชื่อประเภทสินค้า ณ ตอนนี้ยังใส่แทนในส่วนของแก้ไขไม่ได้ เพราะ ชื่อ และ id ซ้ำกันจึงไม่แสดงผลจากการแก้ไข ณ ตอนนี้เปลี่ยนไปแค่เพิ่มประเภทสินค้าที่สามารถทำให้ ชื่อ และ id ตรงกันได้ จึงใช้ชื่อตัวแทน ที่ทำการเชื่อมระหว่าง producttype.php กับ producttype.js ไว้ชั่วคราว อาจจะมีการเพิ่มลงใน database ด้วย

//เพิ่มประเภทสินค้า
$("#addproducttype").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableCategory"))
    const i = tableObj.data.length
    if ($('#category_name').val() === "" || $('#addallproducttype').val() === "" || $('#addsellproducttype').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#categorytable').append(`<tr id="rr${i + 1}">
    <th class="index-table-producttype name="category_id" id="category_id">${i + 1}</th> 
    <th>${$('#category_name').val()}</th>
    <th>${$('#addallproducttype').val()}</th>
    <th>${$('#addsellproducttype').val()}</th>
    <th>
    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl3"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
    </th>
                </tr>`)
    $('#addclose').click()
    tableObj.data.push({
        producttype: $('#category_name').val(),
        all: $('#addallproducttype').val(),
        sell: $('#addsellproducttype').val(),
    })
    localStorage.setItem("tableCategory", JSON.stringify(tableObj))
    $('#category_name').val("")
    $('#addallproducttype').val("")
    $('#addsellproducttype').val("")
});

//แก้ไขบัญชี
$("#editproducttype").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableCategory"))
    const index = localStorage.getItem('editIndex')
    tableObj.data[index] = {
        producttype: $('#editproducttypename').val(),
        all: $('#editallproducttype').val(),
        sell: $('#editsellproducttype').val(),
    }
    localStorage.setItem("tableCategory", JSON.stringify(tableObj))
    let rows = tableObj.data
    $('#categorytable').html("")
    rows.forEach((e, i) => {
        $('#categorytable').append(`<tr id="rr${i + 1}">
                    <th class="index-table-producttype" name="category_id" id="category_id">${i + 1}</th>
                    <th>${e.producttype}</th>
                    <th>${e.all}</th>
                    <th>${e.sell}</th>
                    <th>
                    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl3"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    });
    localStorage.setItem("tableCategory", JSON.stringify(tableObj))
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
    let rows = (JSON.parse(localStorage.getItem("tableCategory"))).data
    $('#editproducttypename').val(rows[i].producttype)
    $('#editallproducttype').val(rows[i].all)
    $('#editsellproducttype').val(rows[i].sell)
}

//ลบแถว
function delrow() {
    let tableObj = JSON.parse(localStorage.getItem("tableCategory"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    rows.splice(index, 1)
    $('#categorytable').html("")
    rows.forEach((e, i) => {
        $('#categorytable').append(`<tr id="rr${i + 1}">
                    <th class="index-table-bank">${i + 1}</th>
                    <th>${e.producttype}</th>
                    <th>${e.all}</th>
                    <th>${e.sell}</th>
                    <th>
                    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl3"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    });
    tableObj.data = rows
    localStorage.setItem("tableCategory", JSON.stringify(tableObj))
    localStorage.removeItem('deleteIndex')
    $('#closedelrow').click()
}