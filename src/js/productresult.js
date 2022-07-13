$(document).ready(function () {
    localStorage.clear()
    localStorage.setItem("tableBank", JSON.stringify({ data: [] }))
});

//กำหนดแถวที่จะลบ
function saveIndexDel(i) {
    localStorage.setItem('deleteIndex', i)
}
//กำหนดแถวที่จะแก้ไข พร้อมข้อมูลเริ่มต้น
function saveIndexEdit(i) {
    localStorage.setItem('editIndex', i)
    let rows = (JSON.parse(localStorage.getItem("tableBank"))).data
    $('#editbank').val(rows[i - 1].bank)
    $('#editaccountnumber').val(rows[i - 1].number)
    $('#editaccoutname').val(rows[i - 1].name)
}

//ลบแถว
function delrow() {
    let tableObj = JSON.parse(localStorage.getItem("tableBank"))
    const index = localStorage.getItem('deleteIndex')
    let rows = tableObj.data
    if (rows.length > 0) {
        rows.splice(index, index - 1)
        $('#rr' + index).remove()
    }
    $('#banktable').html("")
    rows.forEach((e, i) => {
        $('#banktable').append(`<tr id="rr${i + 1}">
                    <th class="index-table-bank">${i + 1}</th>
                    <th>${e.bank}</th>
                    <th>${e.number}</th>
                    <th>${e.name}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl1"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    localStorage.setItem("tableBank", JSON.stringify(tableObj))
    localStorage.removeItem('deleteIndex')
    $('#closedelrow').click()
}