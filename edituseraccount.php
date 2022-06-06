<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/edituseraccount.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <div class="row main">
        <form >
            <div class="row">
                <h1>แก้ไขบัญชีผู้ใช้งาน</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <label for="prefix">คำนำหน้าชื่อ:</label>
                    <select name="prefix" id="prefix">
                    <option value="noun" selected>เลือกคำนำหน้า</option>
                        <option value="Mr.">นาย</option>
                        <option value="Mrs.">นาง</option>
                        <option value="miss">นางสาว</option>
                    </select>
                    <div class="a">*</div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <label for="firstname">ชื่อ :</label>
                    <input name="firstname" id="firstname" type="text" required />
                    <div class="b">*</div>
                </div>
                <br>
                <div class="col-lg-4 col-md-12">
                    <label for="lastname">นามสกุล :</label>
                    <input name="lastname" id="lastname" type="text" required />
                    <div class="c">*</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 login">
                    <label for="email">อีเมล :</label>
                    <input name="email" id="email" type="email" onblur='check_email(this)' required />
                    <div class="d">*</div>
                </div>
                <div class="col-lg-8 login">
                    <label for="password">รหัสผ่าน :</label>
                    <input name="password" id="password" type="password" onblur='check_num(this)' required />
                    <div class="e">*</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <label for="position">ตำแหน่ง :</label>
                    <input type="radio" name="position" value="shopkeeper" checked>เจ้าของร้าน
                    <input type="radio" name="position" value="admin" id="admin">
                    <label for="admin">ผู้ดูแลระบบ</label>
                </div>
                <div class="col-lg-4">
                    <label for="position">สถานะการใช้งาน :</label>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
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
    </div>
    </form>
</body>
<script src="./src/js/adduseraccount.js"></script>

</html>