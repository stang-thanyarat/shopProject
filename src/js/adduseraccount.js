//email
function check_email(elm){
    var regex_email=/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/
    if(!elm.value.match(regex_email)){
        alert('รูปแบบ email ไม่ถูกต้อง');
    }
}

//password
function check_num(elm){
	if(elm.value.length<6 || elm.value.length>15){
		alert("จำนวนตัวอักษรหรือตัวเลขอยู่ช่วง 6-15 ตัวเท่านั้น");
	}
}

function on_change(id){
    if(id=='1'|| id=='2'){
    document.form.shopkeeper[0].checked=true;
    }else{
    document.form.admin[1].checked=true;
    }
    
    }
    on_change(0);