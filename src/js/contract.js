function validateForm() {
    if (document.getElementById('namecustomer').value == "") {
        alert('กรุณากรอกข้อมูล');
        return false;
    }
}

//บัตรประชาชน

function checkID(id) {
    if (id.length != 13) return false;
    for (i = 0, sum = 0; i < 12; i++)
        sum += parseFloat(id.charAt(i)) * (13 - i); if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12)))
        return false; return true;
}

$("#form1").submit(async function (event) {
    event.preventDefault();
    if (!checkID(document.form1.customer_img.value)) {
        alert('ระบุหมายเลขประจำตัวประชาชนไม่ถูกต้อง');
        return
    } else {

        event.preventDefault();
        document.form1.witness1 = JSON.stringify({
            prefix: document.form1['witness1_prefix'],
            name: document.form1['witness1_name'],
            lastname: document.form1['witness1_lastname'],
        })
        document.form1.witness2 = JSON.stringify({
            prefix: document.form1['witness2_prefix'],
            name: document.form1['witness2_name'],
            lastname: document.form1['witness2_lastname'],
        })
        document.form1.witness3 = JSON.stringify({
            prefix: document.form1['witness3_prefix'],
            name: document.form1['witness3_name'],
            lastname: document.form1['witness3_lastname'],
        })
        let response = await fetch('controller/Contract.php', {
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
            //window.location.assign("contract.php");
        }
    }
});