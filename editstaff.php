<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/editstaff.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
                        <h1>แก้ไขพนักงาน</h1>
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
                                <select name="employee model" id="employee model" required>
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
                                <select name="prefix" id="prefix" required>
                                    <option value="Mr." selected>เลือกคำนำหน้า</option>
                                    <option value="Mr.">นาย</option>
                                    <option value="Mrs.">นาง</option>
                                    <option value="miss">นางสาว</option>
                                </select>
                            </div>
                            <div class="row-4 ma">
                                <label for="name">ชื่อ :</label>
                                <input name="name" type="text" id="name" required />
                            </div>
                            <div class="row-4 ma">
                                <label for="lastname">นามสกุล :</label>
                                <input name="lastname" type="text" id="lastname" required />
                            </div>
                            <div class="row-4 ma">
                                <label for="address">ที่อยู่ :&nbsp;</label>
                                <textarea name="address" id="address" cols="50" rows="5" style="vertical-align:top;" required></textarea>
                            </div>
                            <div class="row-4 ma">
                                <label for="birthday">วันเกิด :</label>
                                <label for="birthday"></label>
                                <input type="date" name="birthday" id="birthday" required />
                            </div>
                            <div class="row-4 ma">
                                <label for="ID card numbe">เลขบัตรประชาชน :</label>
                                <input name="idcardnumber" type="text" id=idcardnumber onkeyup="autoTab(this)" required />
                            </div>
                            <div class="row ma">
                                <h5>ข้อมูลผู้ติดต่อ</h5>
                            </div>
                            <div class="row-4 ma">
                                <label for="telephone">โทรศัพท :</label>
                                <input name="telephone" type="text" id=telephone onkeyup="autoTab2(this)" required />
                            </div>
                            <div class="row-4 ma">
                                <label for="email">อีเมล :</label>
                                <input name="email" type="email" id="email" required />
                            </div>
                            <div class="row-4 ma">
                                <label for="password">รหัสผ่าน :</label>
                                <input name="password" type="password" id="password" required />
                            </div>
                            <div class="row ma">
                                <div class="col">
                                    สำเนาบัตรประชาชน : <input type="file" accept="image/*" name="copyofidcard" required>
                                </div>
                                <div class="col">
                                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                                </div>
                            </div>
                            <div class="row ma">
                                <div class="col">
                                    สำเนาทะเบียนบ้าน : <input type="file" accept="image/*" name="copyofhouseregistration" required>
                                </div>
                                <div class="col">
                                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                                </div>
                            </div>
                            <div class="row ma">
                                <div class="col-10">
                                    <h5>บัญชีรับเงิน</h5>
                                </div>
                                <div class=" col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">เพิ่มบัญชีใหม่</button>
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
        <!---modal เพิ่มบัญชีใหม่-->
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มบัญชีใหม่</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="addbankaccount" method="post" action="">
                            <table class="mmm">
                                <tr>
                                    <th>#</th>
                                    <th>ธนาคาร</th>
                                    <th>เลขบัญชี</th>
                                    <th>ชื่อบัญชี</th>

                                </tr>
                                <tr>
                                    <th><input type="text" name="no" required></th>
                                    <th><input type="text" name="bankname" required></th>
                                    <th><input type="text" name="accountnumber" required></th>
                                    <th><input type="text" name="accountname" required></th>
                                </tr>
                            </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary3">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="./src/js/checkmobilenumber.js"></script>

</html>