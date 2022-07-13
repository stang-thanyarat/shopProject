$(document).ready(function () {
    localStorage.clear()
    localStorage.setItem("tableBank", JSON.stringify({ data: [] }))
});

//บัตรประชาชน
function autoTab(obj) {
    var pattern = new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้
    var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
    var returnText = new String("");
    var obj_l = obj.value.length;
    var obj_l2 = obj_l - 1;
    for (i = 0; i < pattern.length; i++) {
        if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
            returnText += obj.value + pattern_ex;
            obj.value = returnText;
        }
    }
    if (obj_l >= pattern.length) {
        obj.value = obj.value.substr(0, pattern.length);
    }

    let id = document.form1.idcardnumber.value.split(/ /)[0].replace(/[^\d]/g, '')

}

//เช็คเลข13หลัก
function checkID(id) {
    if (id.length != 13) return false;
    for (i = 0, sum = 0; i < 12; i++) {
        sum += parseInt(id.charAt(i)) * (13 - i);
    }
    let mod = sum % 11;
    let check = (11 - mod) % 10;
    if (check == parseInt(id.charAt(12))) {
        return true;
    }
    return false;
}

//ตรวจสอบพร้อมส่งข้อมูล
$("#form1").submit(function (event) {
    event.preventDefault();
    if (!checkID(id))
        alert('รหัสประชาชนไม่ถูกต้อง');
    if (!phonenumber(document.form1.telephone.value))
        alert('เบอร์โทรศัพท์ไม่ถูกต้อง');
    if (JSON.parse(localStorage.getItem("tableBank")).data.length <= 0)
        alert('กรุณากรอกข้อมูลบัญชีธนาคาร');
})

//เบอร์โทรศัพท์
function autoTab2(obj) {
    var pattern = new String("___-_______");
    var pattern_ex = new String("-");
    var returnText = new String("");
    var obj_l = obj.value.length;
    var obj_l2 = obj_l - 1;
    for (i = 0; i < pattern.length; i++) {
        if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
            returnText += obj.value + pattern_ex;
            obj.value = returnText;
        }
    }
    if (obj_l >= pattern.length) {
        obj.value = obj.value.substr(0, pattern.length);
    }

}

//เช็คอีเมล
function check_email(elm) {
    var regex_email = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/
    if (!elm.value.match(regex_email)) {
        alert('รูปแบบ email ไม่ถูกต้อง');
    }
}

//เช็คจำนวนรหัสผ่าน
function check_num(elm) {
    if (elm.value.length < 6 || elm.value.length > 15) {
        alert("จำนวนตัวอักษหรือตัวเลขอยู่ช่วง 6-15 ตัวเท่านั้น");
    }
}

//ตรวจสอบเบอร์โทรศัพท์
function phonenumber(inputtxt) {
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if (inputtxt.match(phoneno)) {
        return true;
    }
    return false;
}

//แก้ไขบัญชี
$("#editbankaccount").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableBank"))
    const index = localStorage.getItem('editIndex')
    tableObj.data[index - 1] = {
        bank: $('#editbank').val(),
        number: $('#editaccountnumber').val(),
        name: $('#editaccoutname').val(),
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
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndex(${i + 1})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl1"><img src="./src/images/icon-pencil.png" width="25"></button>
                    </th>
                </tr>`)
    });
    localStorage.setItem("tableBank", JSON.stringify(tableObj))
    localStorage.removeItem('editIndex')
    $('#editclose').click()


})

//เพิ่มบัญชี
$("#addbankaccount").submit(function (event) {
    event.preventDefault();
    let tableObj = JSON.parse(localStorage.getItem("tableBank"))
    const i = $('#banktable').children().length + 1
    if ($('#addbank').val() === "" || $('#addbanknumber').val() === "" || $('#addbankaccountname').val() === "") {
        $('#addtable').blur()
        return
    }
    $('#banktable').append(`<tr id="rr${i}">
                    <th class="index-table-bank">${i}</th>
                    <th>${$('#addbank').val()}</th>
                    <th>${$('#addbanknumber').val()}</th>
                    <th>${$('#addbankaccountname').val()}</th>
                    <th>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(${i})"></button>
                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl1"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(${i})"></button>
                    </th>
                </tr>`)
    $('#addclose').click()
    tableObj.data.push({
        bank: $('#addbank').val(),
        number: $('#addbanknumber').val(),
        name: $('#addbankaccountname').val(),
    })
    localStorage.setItem("tableBank", JSON.stringify(tableObj))
    $('#addbank').val("")
    $('#addbanknumber').val("")
    $('#addbankaccountname').val("")

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
        rows.splice(index - 1)
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
    tableObj.data = rows
    localStorage.setItem("tableBank", JSON.stringify(tableObj))
    localStorage.removeItem('deleteIndex')
    $('#closedelrow').click()
}