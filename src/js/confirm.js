$(document).ready(function () {
    localStorage.clear()
    localStorage.setItem("tableproduct", JSON.stringify({ data: [] }))
});

//เพิ่มรายการสินค้า
$("#addproduct").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableproduct"))
    const i = $('#producttable').children().length + 1
    if ($('#typeproduct').val() === "" || $('#product_name').val() === "" || $('#brand').val() === "" || $('#model').val() === "" || $('#unitprice').val() === ""
        || $('#amount').val() === "" || $('#exp_date').val() === "" || $('#addprice').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#producttable').append(`<tr id="rr${i}">
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
        typeproduct: $('#typeproduct').val(),
        listproduc: $('#product_name').val(),
        brand: $('#brand').val(),
        productmodel: $('#model').val(),
        amountproduct: $('#unitprice').val(),
        number: $('#amount').val(),
        expirationdate: $('#exp_date').val(),
        
        Prices: Number($('#unitprice').val()) * Number($('#amount').val())
    })
    localStorage.setItem("tableproduct", JSON.stringify(tableObj))
    $('#typeproduct').val("")
    $('#product_name').val("")
    $('#brand').val("")
    $('#model').val("")
    $('#unitprice').val("")
    $('#amount').val("")
    $('#exp_date').val("")
    $('#addprice').val("")

});

//แก้ไขค่าใช้จ่ายอื่นๆ
$("#editotherexpenses").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableproduct"))
    const index = localStorage.getItem('editIndex')
    tableObj.data[index - 1] = {
        list: $('#editlistother').val(),
        priceother: $('#editpriceother').val(),
    }
    localStorage.setItem("tableproduct", JSON.stringify(tableObj))
    let rows = tableObj.data
    $('#otherexpensestable').html("")
    rows.forEach((e, i) => {
        $('#otherexpensestable').append(`<tr id="rr${i + 1}">
                    <th>${e.list}</th>
                    <th>${e.priceother}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm2"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    localStorage.setItem("tableproduct", JSON.stringify(tableObj))
    localStorage.removeItem('editIndex')
    $('#editclose').click()

});

//เพิ่มค่าใช้จ่ายอื่นๆ
$("#addotherexpenses").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableproduct"))
    const i = $('#otherexpensestable').children().length + 1
    if ($('#listother').val() === "" || $('#priceother').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#otherexpensestable').append(`<tr id="rr${i}">
                    <th>${$('#listother').val()}</th>
                    <th>${$('#priceother').val()}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm2"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    $('#addclose1').click()
    tableObj.data.push({
        list: $('#listother').val(),
        priceother: $('#priceother').val(),
    })
    localStorage.setItem("tableproduct", JSON.stringify(tableObj))
    $('#listother').val("")
    $('#priceother').val("")

});

//กำหนดแถวที่จะลบ
function saveIndexDel(i) {
    localStorage.setItem('deleteIndex', i)
}
//กำหนดแถวที่จะแก้ไข พร้อมข้อมูลเริ่มต้น
function saveIndexEdit(i) {
    localStorage.setItem('editIndex', i)
    let rows = (JSON.parse(localStorage.getItem("tableproduct"))).data
    $('#editlistother').val(rows[i - 1].list)
    $('#editpriceother').val(rows[i - 1].priceother)
}

//ลบแถว
function delrow() {
    let tableObj = JSON.parse(localStorage.getItem("tableproduct"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    if (rows.length > 0) {
        rows.splice(index - 1)
    }
    $('#otherexpensestable').html("")
    rows.forEach((e, i) => {
        $('#otherexpensestable').append(`<tr id="rr${i + 1}">
                    <th>${e.list}</th>
                    <th>${e.priceother}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm2"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    tableObj.data = rows
    localStorage.setItem("tableproduct", JSON.stringify(tableObj))
    localStorage.removeItem('deleteIndex')
    $('#closedelrow').click()
}