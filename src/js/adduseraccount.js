//email
function check_email(elm) {
    var regex_email = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/
    if (!elm.value.match(regex_email)) {
        alert('รูปแบบ email ไม่ถูกต้อง');
    }
}

//password
function check_num(elm) {
    var regex_num = /^\s*\S+(\s?\S)*\s*$/
    if (elm.value.length < 6 || elm.value.length > 15&&!elm.value.match(regex_num)) {
        alert("จำนวนตัวอักษรหรือตัวเลขอยู่ช่วง 6-15 ตัวเท่านั้น");
    }
}

async function readEmail(){
    const id = document.getElementById('employee_id').value
    const employee = await(await fetch(`./controller/LoadEmail.php?id=${id}`)).json()
    const email = employee.employee_email
    document.getElementById('account_username').value = email
}

$("#form1").submit(async function (event) {
    event.preventDefault();
            $('#bank').val(JSON.stringify(JSON.parse(localStorage.getItem("tableBank")).data))
            let response = await fetch('controller/Employee.php', {
                method: 'POST',
                body: new FormData(document.form1)
            });
            console.log(response);
            if (!response.ok) {
                console.log(response);
            } else {
                await Swal.fire({
                    icon: 'success',
                    text: 'บันทึกข้อมูลเสร็จสิ้น',
                    timer: 3000
                })
                console.log(await response.text());
                window.location.assign("employee.php");
            }
});