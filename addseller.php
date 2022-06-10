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
                        <h1>เพิ่มผู้ขาย</h1>
                    </div>
                </div>
                <div class="row leftseller">
                    <div class="col">
                        <label for="seller type">ประเภทผู้ขาย :</label>
                        <input type="radio" name="seller type" value="บริษัท / ห้างร้าน" class="bb" checked>
                        <label for="seller type">บริษัท / ห้างร้าน </label>
                        <input type="radio" name="seller type" value="บุคคลทั่วไป">
                        <label for="seller type">บุคคลทั่วไป</label>
                        <div class="d">*</div>
                    </div>
                    <div class="col leftsellername">
                        <label for="seller name">ชื่อผู้ขาย :</label>
                        <input type="text" name="sellername" id="sellername" class="bb" required />
                        <div class="a">*</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col leftidentification">
                        <label for="tax Identification Number">เลขประจำตัวผู้เสียภาษี :</label>
                        <input type="text" name="taxidentificationnumber" id="taxidentificationnumber" class="bb" required />
                        <div class="c">*</div>
                    </div>
                    <div class="col leftaddress">
                        <label for="address">ที่อยู่ :</label>
                        <input type="text" name="address" id="address" class="bb" required />
                        <div class="b">*</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col lefttelephone">
                        <label for="telephone number">เบอร์โทรศัพท์ :</label>
                        <input type="text" name="telephonenumber" id="telephonenumber" onkeyup="autoTab2(this)" class="bb" required />
                        <div class="e">*</div>
                    </div>
                    <div class="col leftwebsite">
                        <label for="website">เว็บไซต์ :</label>
                        <input type="text" name="website" id="website" class="bb" />
                    </div>
                </div>
                <div class="row th">
                    <h5 class="tt">ข้อมูลผู้ติดต่อ</h5>
                </div>
                <div class="row">
                    <div class="col leftfirst">
                        <label for="first name">ชื่อ :</label>
                        <input type="text" name="firstname" id="firstname" class="bb" required />
                        <div class="f">*</div>
                    </div>
                    <div class="col leftlast">
                        <label for="last name">นามสกุล :</label>
                        <input type="text" name="lastname" id="lastname" class="bb" required />
                        <div class="g">*</div>
                    </div>
                </div>
                <div class="row leftnick">
                    <div class="col">
                        <label for="nickname">ชื่อเล่น :</label>
                        <input type="text" name="nickname" id="nickname" class="bb" required />
                        <div class="h">*</div>
                    </div>
                    <div class="col leftemail">
                        <label for="email">อีเมล :</label>
                        <input type="text" name="email" id="email" class="bb" required />
                        <div class="i">*</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col leftnumber2">
                        <label for="telephone number2">เบอร์โทรศัพท์ :</label>
                        <input type="text" name="telephonenumber2" id="telephonenumber2" onkeyup="autoTab2(this)" class="bb" required />
                        <div class="j">*</div>
                    </div>
                    <div class="col leftidline">
                        <label for="idline">ไอดีไลน์ :</label>
                        <input type="text" name="idline" id="idline" class="bb" />
                    </div>
                </div>
                <div class="row">
                    <div class="col leftfile">
                        บัตรประชาชน : <input type="file" accept="image/*" name="slip" class="bb" required>
                        <div class="k">*</div>
                    </div>
                    <div class="row leftpng">
                        <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 tb">
                        <h5 class="ttb">บัญชีรับเงินของผู้ขาย</h5>
                    </div>
                    <div class="row-2 ma">
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
                <div class="row">
                    <div class="col leftfile2">
                        นามบัตร : <input type="file" accept="image/*" name="card" class="bb">
                    </div>
                    <div class="col leftfile3">
                        เอกสารอื่นๆ : <input type="file" accept="image/*" name="other documents" class="bb">
                    </div>
                    <div class="row leftpng">
                        <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col leftnote">
                        <label for="note">หมายเหตุ :&nbsp;</label>
                        <textarea name="note" cols="50" rows="5" style="vertical-align:top;" class="bb"></textarea>
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