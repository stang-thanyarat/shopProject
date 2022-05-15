<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/addnewstaff.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col">
                        <h1>เพิ่มพนักงานใหม่</h1>
                    </div>
                </div>
                <table class="mai">
                    <tr>
                        <th>กำหนดรูปแบบพนักงาน</th>
                    </tr>
                    <tr>
                        <th>
                            <div class="row-4 ma">
                                <label for="employee model">รูปแบบพนักงาน :</label>
                                <select name="employee model" id="employee model">
                                    <option value="full time staff" selected>พนักงานประจำ</option>
                                    <option value="daily staff">พนักงานรายวัน</option>
                                    <option value="temporary worker">พนักงานชั่วคราว</option>
                                </select>
                            </div>
                            <br>
                        </th>
                    </tr>
                </table>
                <br>
                <table class="mai">
                    <tr>
                        <th>ข้อมูลพนักงาน</th>
                    </tr>
                    <tr>
                        <th>
                            <div class="row-4 ma">
                                <label for="prefix">คำนำหน้าชื่อ:</label>
                                <select name="prefix" id="prefix">
                                    <option value="Mr." selected>เลือกคำนำหน้า</option>
                                    <option value="Mr.">นาย</option>
                                    <option value="Mrs.">นาง</option>
                                    <option value="miss">นางสาว</option>
                                </select>
                            </div>
                            <div class="row-4 ma">
                                <label for="name">ชื่อ :</label>
                                <input name="name" type="text" />
                            </div>
                            <div class="row-4 ma">
                                <label for="lastname">นามสกุล :</label>
                                <input name="lastname" type="text" />
                            </div>
                            <div class="row-4 ma">
                                <label for="address">ที่อยู่ :&nbsp;</label>
                                <textarea name="address" cols="50" rows="5" style="vertical-align:top;"></textarea>
                            </div>
                            <div class="row-4 ma">
                                <label for="birthday">วันเกิด :</label>
                                <label for="birthday"></label>
                                <input type="date" name="birthday" />
                            </div>
                            <div class="row-4 ma">
                                <label for="ID card numbe">เลขบัตรประชาชน :</label>
                                <input name="ID card numbe" type="text" />
                            </div>
                            <div class="row ma">
                                <h5>ข้อมูลผู้ติดต่อ</h5>
                            </div>
                            <div class="row-4 ma">
                                <label for="telephone">โทรศัพท :</label>
                                <input name="telephone" type="text" />
                            </div>
                            <div class="row-4 ma">
                                <label for="email">อีเมล :</label>
                                <input name="email" type="text" />
                            </div>
                            <div class="row-4 ma">
                                <label for="email">รหัสผ่าน :</label>
                                <input name="email" type="email" />
                            </div>
                            <div class="row ma">
                                <div class="col">
                                    สำเนาบัตรประชาชน : <input type='file' name='Copy of ID card' />
                                    <input type='submit' value="ยืนยัน" />
                                </div>
                                <div class="col">
                                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                                </div>
                            </div>
                            <div class="row ma">
                                <div class="col">
                                    สำเนาทะเบียนบ้าน : <input type='file' name='Copy of house registration' />
                                    <input type='submit' value="ยืนยัน" />
                                </div>
                                <div class="col">
                                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                                </div>
                            </div>
                            <div class="row ma">
                                <div class="col">
                                    <h5>บัญชีรับเงิน</h5>
                                </div>
                                <div class="col">
                                    <h5 style="color: #A36627">เพิ่มบัญชีใหม่</h5>
                                </div>
                            </div>
                            <table class="mm">
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
                            <br>
                </table>

                <div class="row btn-g">
                    <div class="col-2">
                        <button type="reset" class="btn-c reset">ยกเลิก</button>
                    </div>
                    <div class="col-2">
                        <input type="submit" class="btn-c submit" value="บันทึก" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>