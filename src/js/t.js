$(document).ready(function () {
    localStorage.clear()
    localStorage.setItem("tableBank", JSON.stringify({ data: [] }))
});

//เพิ่มบัญชี
$("#addbankaccount").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableBank"))
    const i = tableObj.data.length
    if ($('#bank_name').val() === "" || $('#bank_number').val() === "" || $('#bank_account').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#banktable').append(`<tr id="rr${i + 1}">
    <th class="index-table-bank">${i + 1}</th>
    <th>${$('#bank_name').val()}</th>
    <th>${$('#bank_number').val()}</th>
    <th>${$('#bank_account').val()}</th>
    <th>
    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
    </th>
                </tr>`)
    $('#addclose').click()
    tableObj.data.push({
        bank: $('#bank_name').val(),
        number: $('#bank_number').val(),
        name: $('#bank_account').val(),
    })
    localStorage.setItem("tableBank", JSON.stringify(tableObj))
    $('#bank_name').val("")
    $('#bank_number').val("")
    $('#bank_account').val("")
});

//แก้ไขบัญชี
$("#editbankaccount").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableBank"))
    const index = localStorage.getItem('editIndex')
    tableObj.data[index] = {
        bank: $('#editbank_name').val(),
        number: $('#editbank_number').val(),
        name: $('#editbank_account').val(),
    }
    localStorage.setItem("tableBank", JSON.stringify(tableObj))
    let rows = tableObj.data
    $('#banktable').html("")
    rows.forEach((e, i) => {
        $('#banktable').append(`<tr id="rr${i + 1}">
                    <th class="index-table-bank">${i + 1}</th>
                    <th>${e.bank}</th>
                    <th>${e.number}</th>
                    <th>${e.name}</th>
                    <th>
                    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    });
    localStorage.setItem("tableBank", JSON.stringify(tableObj))
    localStorage.removeItem('editIndex')
    $('#editclose').click()


})

//กำหนดแถวที่จะลบ บัญชี
function saveIndexDel(i) {
    localStorage.setItem('deleteIndex', i)
}
//กำหนดแถวที่จะแก้ไข พร้อมข้อมูลเริ่มต้น บัญชี
function saveIndexEdit(i) {
    localStorage.setItem('editIndex', i)
    let rows = (JSON.parse(localStorage.getItem("tableBank"))).data
    $('#editbank_name').val(rows[i].bank)
    $('#editbank_number').val(rows[i].number)
    $('#editbank_account').val(rows[i].name)
}

//ลบแถวบัญชี
function delrow() {
    let tableObj = JSON.parse(localStorage.getItem("tableBank"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    rows.splice(index, 1)
    $('#banktable').html("")
    rows.forEach((e, i) => {
        $('#banktable').append(`<tr id="rr${i + 1}">
                    <th class="index-table-bank">${i + 1}</th>
                    <th>${e.bank}</th>
                    <th>${e.number}</th>
                    <th>${e.name}</th>
                    <th>
                    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    });
    tableObj.data = rows
    localStorage.setItem("tableBank", JSON.stringify(tableObj))
    localStorage.removeItem('deleteIndex')
    $('#closedelrow').click()
}