<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="./src/css/edituseraccount.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form name="form">
        <div class="row main">
            <div class="row">
                <h1>แก้ไขบัญชีผู้ใช้งาน</h1>
            </div>
            <div class="row top">
                <div class="col-lg-4 col-md-12">
                    <label for="employee_id">ชื่อพนักงาน :</label>
                    <select name="employee_id" id="employee_id" class="bb" required>
                        <option value="" selected hidden>เลือกพนักงาน</option>
                    </select>
                    <div class="a">*</div>
                </div>
                <div class="col leftposition">
                    <label for="account_user_type">ตำแหน่ง :</label>
                    <input type="radio" name="account_user_type" value="L" class="bb" checked>
                    <label for="account_user_type">เจ้าของร้าน </label>&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="account_user_type" value="E">
                    <label for="account_user_type">พนักงาน</label>
                    <div class="j">*</div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-lg-3 login leftemail">
                    <label for="email">อีเมล :</label>
                    <input name="email" id="email" type="email" onblur='check_email(this)' class="bb" required />
                    <div class="d">*</div>
                </div>
                <div class="col-lg-4 login leftpassword">
                    <label for="password">รหัสผ่าน :</label>
                    <input name="password" id="password" type="password" onblur='check_num(this)' class="bb" required />
                    <div class="e">*</div>
                </div>
                <div class="col-lg-4 leftstatus">
                    <label for="account_user_status">สถานะการใช้งาน :</label>
                    <label class="switch bb">
                        <input type="checkbox" id="account_user_status">
                        <span class="slider round"></span>
                    </label>
                    <div class="h">*</div>
                </div>
            </div>
            <div class="row btn-g">
                <div class="col-lg-2 col-md-12">
                    <button type="reset" class="btn-c reset">ยกเลิก</button>
                </div>
                <div class="col-lg-10 col-md-12">
                    <input type="submit" class="btn-c submit" value="บันทึก" />
                </div>
            </div>
    </form>
</body>
<script src="./src/js/adduseraccount.js"></script>

</html>