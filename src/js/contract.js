function validateForm()
{
    if(document.getElementById('namecustomer').value == "")
    {
        alert('กรุณากรอกข้อมูล');
        return false;
    }
}