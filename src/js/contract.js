function validateForm()
{
    if(document.getElementById('namecustomer').value == "")
    {
        alert('กรุณากรอกข้อมูล');
        return false;
    }
}

//บัตรประชาชน

function checkID(id)
{
if(id.length != 13) return false;
for(i=0, sum=0; i < 12; i++)
sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
return false; return true;}

function checkForm()
{ if(!checkID(document.form1.idcard.value))
alert('รหัสประชาชนไม่ถูกต้อง');
else alert('รหัสประชาชนถูกต้อง เชิญผ่านได้');}