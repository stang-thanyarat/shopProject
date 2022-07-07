/*ทำ method ให้เปิดหน้าต่างใหม่*/
function MemberList() {
    var width="450",
    height="200";
    var left=(screen.width/2) - width/2;
    var top=(screen.height/2) - height/2;
    var styleStr='width=600,height=200,scrollbars=yes,status=yes,left='+left+',top='+top+',screenX='+left+',screenY='+top;
    window.open("popup.html", "MemberList", styleStr);
}

/*ทำ method เพื่อรับค่ากลับมาจาก popup*/
function getMember(code,
    name,
    surname,
    email) {
    window.document.myForm.code.value=code;
    window.document.myForm.name.value=name;
    window.document.myForm.surname.value=surname;
    window.document.myForm.email.value=email;
}

//ทำ method รับค่าเมื่อมีการคลิกที่ link ใน list
function selected(code,name,surname,email){

    if (window.opener && !window.opener.closed){
    
    //เรียก method getMember ในตัวแม่ที่เรียกมันขึ้นมา เพิ่ม set ค่ากลับ
    window.opener.getMember(code,name,surname,email);
    //ปิดตัวเอง
    window.close();
    }
    }