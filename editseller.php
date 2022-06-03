<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/addseller.css" />
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
                        <h1>แก้ไขผู้ขาย</h1>
                    </div>
                </div>
                <div class="row mai">
                    <div class="col-12">
                        <label for="seller type">ประเภทผู้ขาย :</label>
                        <input type="radio" name="seller type" class="seller type" value="บริษัท / ห้างร้าน" checked>
                        <label for="seller type">บริษัท / ห้างร้าน </label>
                        <input type="radio" name="seller type" class="seller type" value="บุคคลทั่วไป">
                        <label for="seller type">บุคคลทั่วไป</label>
                    </div>
                </div>
                <div class="row mai">
                    <div class="col">
                        <label for="seller name">ชื่อผู้ขาย :</label>
                        <input type="text" name="sellername" id="sellername" required />
                        <div class="a">*</div>
                    </div>
                </div>
                <div class="row mai">
                    <div class="col">
                        <label for="address">ที่อยู่ :</label>
                        <input type="text" name="address" id="address" required />
                        <div class="b">*</div>
                    </div>
                </div>
                <div class="row mai">
                    <div class="col">
                        <label for="tax Identification Number">เลขประจำตัวผู้เสียภาษี :</label>
                        <input type="text" name="taxidentificationnumber" id="taxidentificationnumber" required />
                        <div class="c">*</div>
                    </div>
                </div>
                <div class="row mai">
                    <div class="col">
                        <label for="website">เว็บไซต์ :</label>
                        <input type="text" name="website" id="website" />
                    </div>
                </div>
                <div class="row mai">
                    <div class="col">
                        <label for="telephone number">เบอร์โทรศัพท์ :</label>
                        <input type="text" name="telephonenumber" id="telephonenumber" onkeyup="autoTab2(this)" required />
                        <div class="e">*</div>
                    </div>
                </div>
                <div class="row mai">
                    <h5>ข้อมูลผู้ติดต่อ</h5>
                </div>
                <div class="row mai">
                    <div class="col-2">
                        <label for="first name">ชื่อ :</label>
                        <input type="text" name="firstname" id="firstname" required />
                        <div class="f">*</div>
                    </div>
                    <div class="col-2">
                        <label for="last name">นามสกุล :</label>
                        <input type="text" name="lastname" id="lastname" required />
                        <div class="g">*</div>
                    </div>
                </div>
                <div class="row mai">
                    <div class="col">
                        <label for="nickname">ชื่อเล่น :</label>
                        <input type="text" name="nickname" id="nickname" required />
                        <div class="h">*</div>
                    </div>
                </div>
                <div class="row mai">
                    <div class="col">
                        <label for="email">อีเมล :</label>
                        <input type="text" name="email" id="email" required />
                        <div class="i">*</div>
                    </div>
                </div>
                <div class="row mai">
                    <div class="col">
                        <label for="telephone number2">เบอร์โทรศัพท์ :</label>
                        <input type=text name="telephonenumber2" id="telephonenumber2" onkeyup="autoTab2(this)" required />
                        <div class="j">*</div>
                    </div>
                </div>
                <div class="row mai">
                    <div class="col">
                        <label for="idline">ไอดีไลน์ :</label>
                        <input type="text" name="idline" id="idline" />
                    </div>
                </div>
                <div class="row mai">
                    <div class="col-4">
                        บัตรประชาชน : <input type="file" accept="image/*" name="idcard" required>
                    </div>
                    <div class="k">*</div>
                    <div class="col">
                        <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                    </div>
                </div>
                <div class="row mai">
                    <div class="col-6">
                        <h5>บัญชีรับเงินของผู้ขาย</h5>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-primary1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">เพิ่มบัญชีใหม่</button>
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
                <div class="row mai">
                    <div class="col-4">
                        นามบัตร : <input type="file" accept="image/*" name="card">
                    </div>
                    <div class="col">
                        <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                    </div>
                </div>
                <div class="row mai">
                    <div class="col-4">
                        เอกสารอื่นๆ : <input type="file" accept="image/*" name="other documents">
                    </div>
                    <div class="col">
                        <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                    </div>
                </div>
                <div class="row mai">
                    <div class="col">
                        <label for="note">หมายเหตุ :&nbsp;</label>
                        <textarea name="address" cols="50" rows="5" style="vertical-align:top;"></textarea>
                    </div>
                </div>
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
<script src="./src/js/addseller.js"></script>

</html>