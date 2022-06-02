<?PHP
session_start();
include("inc/conn_db.php");
include("inc/function.php");
checklogin($_SESSION['a_user']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
body {
	background-color: #173770;
}
a:link {
	color: #00F;
}
a:visited {
	color: #00F;
}
a:hover {
	color: #F00;
}
a:active {
	color: #00F;
}
</style>
<script language="JavaScript" src="gen_validatorv4.js"
    type="text/javascript" xml:space="preserve"></script>
    <script type="text/javascript">
function popup(url,name,windowWidth,windowHeight){    
	myleft=(screen.width)?(screen.width-windowWidth)/2:100;	
	mytop=(screen.height)?(screen.height-windowHeight)/2:100;	
	properties = "width="+windowWidth+",height="+windowHeight;
	properties +=",scrollbars=yes, top="+mytop+",left="+myleft;   
	window.open(url,name,properties);
}
</script>
<script>
function confirmDelete(delUrl) {
  if (confirm("คุณแน่ใจหรือไม่ว่าจะลบ")) {
    document.location = delUrl;
  }
}
</script>
</head>

<body>
<table width="973" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?PHP include('head.php') ?></td>
  </tr>
  <tr>
    <td align="center" background="body.jpg"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
     
      <tr>
        <td align="right"><?PHP include('menu.php'); ?></td>
      </tr>
       <tr>
        <td align="center"><p>&nbsp;</p>
          <form id="form1" name="form1" method="post" action="">
            <label for="textarea"></label>
            <label for="txtsearch"></label>
            <input type="text" name="txtsearch" id="txtsearch" />&nbsp;
            <input type="submit" name="button" id="button" value="ค้นหา" />
          </form></td>
      </tr>
       <tr>
        <td align="center"><p>&nbsp;</p>
          </td>
      </tr>
       <tr>
         <td align="center"><table width="800" border="0" cellspacing="0" cellpadding="5">
           <tr>
             <td width="659" align="center" bgcolor="#2A59A7"><font size="2" color="#FFFFFF">รายชื่ออาจารย์</font></td>
             <td width="33" align="center" bgcolor="#2A59A7"><font color="#FFFFFF" size="2">ดู</font></td>
             <td width="39" align="center" bgcolor="#2A59A7"><font color="#FFFFFF" size="2">แก้ไข</font></td>
             <td width="29" align="center" bgcolor="#2A59A7"><font size="2" color="#FFFFFF">ลบ</font></td>
           </tr>
             <?PHP
		  /* check ว่ามี ค่าตัวแปร $start หรือไม่ ถ้าไม่มีให้ตั้งเป็น 0
ปล. อันนี้ต้องใช้กับตัวแบ่งนะ ห้ามเอาออก*/
if(!isset($start)){
$start = 0;
}
$limit = '10'; // แสดงผลหน้าละกี่หัวข้อ

/* หาจำนวน record ทั้งหมด
ปล. อันนี้ต้องใช้กับตัวแบ่งนะ ห้ามเอาออก*/
if($_POST['txtsearch']!='')
{
	$str = "and ( k_name like '%{$_POST['txtsearch']}%' or k_lastname like '%{$_POST['txtsearch']}%'  or k_tel like '%{$_POST['txtsearch']}%'  or k_username like '%{$_POST['txtsearch']}%'                                                                 ) ";
}
$Qtotal = mysql_query("select * from teacher   where 1  $str order by t_id DESC "); //คิวรี่ คำสั่ง
$total = mysql_num_rows($Qtotal); // หาจำนวน record

/* คิวรี่ข้อมูลออกมาเพื่อแสดงผล */
$Query = mysql_query("SELECT * FROM teacher where 1 $str ORDER BY t_id DESC LIMIT $start,$limit"); //คิวรี่คำสั่ง
$totalp = mysql_num_rows($Query); // หาจำนวน record ที่เรียกออกมา
		  while($arr = mysql_fetch_array($Query)){
		
		  ?>
           <tr>
             <td ><font size="2"><?PHP echo $arr['k_sir']; ?>&nbsp;<?PHP echo $arr['k_name']; ?>&nbsp;<?PHP echo $arr['k_lastname']; ?></font></td>
             <td align="center" ><a href="detailt.php?t_id=<?PHP echo $arr['t_id']; ?>"><img src="icon-view.png" width="20" height="20" border="0" /></a></td>
             <td  align="center" ><a href="editteacher.php?t_id=<?PHP echo $arr['t_id']; ?>"><img src="Edit-icon.png" width="20" height="20" border="0" /></a></td>
             <td><a href="javascript:confirmDelete('deletet.php?t_id=<?PHP echo $arr['t_id']; ?>')"><img src="icon-delete.png" width="20" height="20" border="0" /></a></td>
           </tr>
          
           <?PHP
		   
		  }
		  ?>
           <tr>
             <td align="center" ><font size="2"><?PHP
        /* ตัวแบ่งหน้า */
$page = ceil($total/$limit); // เอา record ทั้งหมด หารด้วย จำนวนที่จะแสดงของแต่ละหน้า

/* เอาผลหาร มาวน เป็นตัวเลข เรียงกัน เช่น สมมุติว่าหารได้ 3 เอามาวลก็จะได้ 1 2 3 */
for($i=1;$i<=$page;$i++){
if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
echo "[<a href='?start=".$limit*($i-1)."&page=$i'><B>$i</B></A>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
}else{
echo "[<a href='?start=".$limit*($i-1)."&page=$i'>$i</A>]"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
}}
		?></font></td>
             <td align="center" >&nbsp;</td>
             <td  align="center" >&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
         </table></td>
       </tr>
    </table>
      <p><font size="2"><?PHP if($total == 0 ){ echo "ไม่มีรายการในระบบ";}; ?></font></p>
      <p>&nbsp;</p>
      <form id="form2" name="form2" method="post" action="savet.php">
        <table width="800" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td colspan="2" bgcolor="#2A59A7">          </td>
        </tr>
        <tr>
          <td colspan="2" align="center" bgcolor="#2A59A7"><font color="#FFFFFF" size="2">เพิ่มข้อมูลอาจารย์</font></td>
        </tr>
        <tr>
          <td width="286" align="right"><font size="2">รหัสประจำตัวอาจารย์ :</font></td>
          <td width="494"><label for="k_id"></label>
            <input type="text" name="k_id" id="k_id" /> <font size="2" color="#FF0000">*</font></td>
        </tr>
        <tr>
          <td align="right"><font size="2">นาม :</font></td>
          <td><label for="k_name"></label>
            <label for="k_sir"></label>
            <select name="k_sir" id="k_sir">
              <option value="นาย">นาย</option>
              <option value="นาง">นาง</option>
              <option value="นางสาว">นางสาว</option>
            </select></td>
        </tr>
        <tr>
          <td align="right"><font size="2">ชื่อ :</font></td>
          <td><label for="k_name"></label>
            <input type="text" name="k_name" id="k_name" />
            <font size="2" color="#FF0000">*</font></td>
        </tr>
        <tr>
          <td align="right"><font size="2">นามสกุล :</font></td>
          <td><input type="text" name="k_lastname" id="k_lastname" />
            <font size="2" color="#FF0000">*</font></td>
        </tr>
        <tr>
          <td align="right"><font size="2">ตำแหน่ง :</font></td>
          <td><label for="k_position"></label>
            <select name="k_position" id="k_position">
              <option value="">กรุณาเลือก</option>
              <?PHP
			  $sql = " select * from position ";
			  $result = mysql_query($sql);
			  while ( $row = mysql_fetch_array($result)) {
			  ?>
              <option value="<?PHP echo $row['po_id']; ?>"><?PHP echo $row['po_name']; ?></option>
              <?PHP
			  }
			  ?>
            </select> <font size="2" color="#FF0000">*</font></td>
        </tr>
        
        <tr>
          <td align="right"><font size="2">เบอร์โทรศัพท์ :</font></td>
          <td><label for="tel"></label>
            <input name="tel" type="text" id="tel" size="10" />
            <font size="2" color="#FF0000">*</font></td>
        </tr>
        
        <tr>
          <td align="right"><font size="2">ห้องทำงาน :</font></td>
          <td><input type="text" name="k_room" id="k_room" />
            <font size="2" color="#FF0000">*</font></td>
        </tr>
            <tr>
          <td align="right"><font size="2">Email :</font></td>
          <td><input name="email" type="text" id="email" size="40" />
            <font size="2" color="#FF0000">*</font></td>
        </tr>
        <tr>
          <td align="right"><font size="2">Username :</font></td>
          <td><label for="username"></label>
            <input type="text" name="username" id="username" />
            <font size="2" color="#FF0000">*</font></td>
        </tr>
        <tr>
          <td align="right"><font size="2">Password :</font></td>
          <td><label for="password"></label>
            <input type="text" name="password" id="password" />
            <font size="2" color="#FF0000">*</font></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td><input type="submit" name="button2" id="button2" value="บันทึกข้อมูล" /></td>
        </tr>
      </table>
    </form>
         <script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("form2");
  frmvalidator.addValidation("k_id","req","กรุณากรอกรหัสบุคลากร");
  frmvalidator.addValidation("k_id","numeric","รหัสบุคลากรจะต้องเป็นตัวเลขเท่านั้น");
  frmvalidator.addValidation("k_name","req","กรุณากรอกชื่อ");
  frmvalidator.addValidation("k_lastname","req","กรุณากรอกนามสกุล");
  frmvalidator.addValidation("k_room","req","กรุณากรอกห้องทำงาน");
  frmvalidator.addValidation("k_address","req","กรุณากรอกที่อยู่");
  frmvalidator.addValidation("email","req","กรุณากรอก Email "); 
  frmvalidator.addValidation("email","email","โปรดตรวจสอบรูปแบบ Email");
  frmvalidator.addValidation("tel","numeric","เบอร์โทรต้องเป็นตัวเลข");
  frmvalidator.addValidation("tel","minlen=10","เบอร์โทรต้องเป็นตัวเลข 10 ตัว");
  frmvalidator.addValidation("username","req","กรุณาตั้งชื่อ Username");
  frmvalidator.addValidation("password","req","กรุณาตั้งรหัสผ่าน");
//]]></script>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td><?PHP include('footer.php') ?></td>
  </tr>
</table>
</body>
</html>