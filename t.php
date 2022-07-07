<html>
<head>
<title></title>
</head>
<body>

<!--ทำ ฟอร์ม ให้กรอกข้อมูล -->
<form id="myForm" name="myForm" method="post" action="" >
<fieldset>
<legend>Main Form</legend><br />

<table>
<tr>
<td>Code</td>
<td><input name="code" width="10" readonly="true" style="background-color:#CCCCCC" size="16"/>&nbsp;
<!-- ทำปุ่มให้คลิก เพิ่มให้เปิดหน้าต่าง popup ขึ้นมา โดยใช้ javascript -->
<input type="button" value="Popup" onclick="MemberList();"/>
</td>
</tr>
<tr>
<td>First Name</td>
<td><input id="name" name="name"/></td>
</tr>
<tr>
<td>SurName</td>
<td><input id="surname" name="surname"></td>
</tr>
<tr>
<td>E-mail</td>
<td><input id="email" name="email"/></td>
</tr>
<tr>
<td colspan="2">
<!-- Button-->
<input type="submit" value="Save" />
<input type="reset" value="Cancel" />
</td>
</tr>
</table>

<form action="save.php" method="POST" onsubmit="return confirm('ยืนยันการส่งข้อมูล ??')">
    ชื่อ <input type="text" name="name">
    <input type="submit" value="ตกลง">
</form>

</fieldset>
</form>
</body>
</html>