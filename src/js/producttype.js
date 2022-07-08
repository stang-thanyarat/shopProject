$(document).ready(function () {
    localStorage.clear()
    localStorage.setItem("tableProducttype", JSON.stringify({ data: [] }))
});

//เพิ่มประเภทสินค้า
$("#addproducttype").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableProducttype"))
    const i = $('#producttypetable').children().length + 1
    if ($('#producttype').val() === "" || $('#allproducttype').val() === "" || $('#sellproducttype').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#producttypetable').append(`<tr id="rr${i}">
                    <th>${$('#producttype').val()}</th>
                    <th>${$('#allproducttype').val()}</th>
                    <th>${$('#sellproducttype').val()}</th>
                    <th  colspan="2">
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl2"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl3"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    $('#addclose').click()
    tableObj.data.push({
        producttype: $('#producttype').val(),
        all: $('#allproducttype').val(),
        sell: $('#sellproducttype').val(),
    })
    localStorage.setItem("tableProducttype", JSON.stringify(tableObj))
    $('#producttype').val("")
    $('#allproducttype').val("")
    $('#sellproducttype').val("")

});