<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/manageUserAccounts.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <div class="col">
                    <h1>เพิ่มผู้ขาย</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="seller type">ประเภทผู้ขาย :</label>
                    <input type="radio" name="seller type" class="seller type" value="บริษัท / ห้างร้าน" checked>
                    <label for="seller type">บริษัท / ห้างร้าน </label>
                    <input type="radio" name="seller type" class="seller type" value="บุคคลทั่วไป">
                    <label for="seller type">บุคคลทั่วไป</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="seller name">ชื่อผู้ขาย :</label>
                    <input type="text" name="seller name" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="address">ที่อยู่ :</label>
                    <input type="text" name="address" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="tax Identification Number">เลขประจำตัวผู้เสียภาษี :</label>
                    <input type="text" name="tax Identification Number" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="website">เว็บไซต์ :</label>
                    <input type="text" name="website" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="telephone number">เบอร์โทรศัพท์ :</label>
                    <input type="text" name="telephone number" />
                </div>
            </div>
            <div class="row">
                <h5>ข้อมูลผู้ติดต่อ</h5>
            </div>
            <div class="row">
                <div class="col">
                    <label for="first name">ชื่อ :</label>
                    <input type="text" name="first name" />
                </div>
                <div class="col">
                    <label for="last name">นามสกุล :</label>
                    <input type="text" name="last name" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="nickname">ชื่อเล่น :</label>
                    <input type="text" name="nickname" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="email">อีเมล :</label>
                    <input type="text" name="email" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="telephone number2">เบอร์โทรศัพท์ :</label>
                    <input type="text" name="telephone number2" />
                </div>
            </div>
            <div class="row">
                <h5>เพิ่มเติมอื่นๆ</h5>
            </div>
            <div class="row-5">
                <div class="col">
                    บัตรประชาชน : <input type='file' name='ID card' />
                    <input type='submit' value="ยืนยัน" />
                </div>
                <div class="col">
                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5>บัญชีรับเงินของผู้ขาย</h5>
                </div>
                <div class="col">
                    <h5>เพิ่มบัญชีใหม่</h5>
                </div>
            </div>
            <table class="mai">
                <tr>
                    <th>#</th>
                    <th>ธนาคาร</th>
                    <th>เลขบัญชี</th>
                    <th>ชื่อบัญชี</th>
                    <th></th>
                </tr>
                <tr>
                    <th>1</th>
                    <th>ธนาคารกรุงไทย</th>
                    <th>1234567089</th>
                    <th>ปณวัตร์ ศรีโชติ</th>
                    <th>
                        <img src="./src/images/icon-delete.png" width="25">
                        <img src="./src/images/icon-pencil.png" width="25">
                    </th>
                </tr>
            </table>
            <div class="row-5">
                <div class="col">
                    นามบัตร : <input type='file' name='card' />
                    <input type='submit' value="ยืนยัน" />
                </div>
                <div class="col">
                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                </div>
            </div>
            <div class="row-5">
                <div class="col">
                    เอกสารอื่นๆ : <input type='file' name='other documents' />
                    <input type='submit' value="ยืนยัน" />
                </div>
                <div class="col">
                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                </div>
            </div>
            <div class="col">
                <label for="note">หมายเหตุ :&nbsp;</label>
                <textarea name="detail" cols="50" rows="5" style="vertical-align: middle;"></textarea>
            </div>
            <div class="row ">
                <div class="col-2">
                    <button type="reset" class="btn-c reset">ยกเลิก</button>
                </div>
                <div class="col-2">
                    <input type="submit" class="btn-c submit" value="บันทึก" />
                </div>
            </div>
        </div>
    </div>
</body>