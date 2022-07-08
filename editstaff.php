<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/addnewstaff.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form action="" name="form1" id="form1">
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
                        <th class="mm">กำหนดรูปแบบพนักงาน</th>
                    </tr>
                    <tr>
                        <th>
                            <div class="row-4 leftmodel">
                                <label for="employee model">รูปแบบพนักงาน :</label>
                                <select name="employee model" id="employee model" class="margin" required>
                                    <option value="employee model" selected hidden>เลือกรูปแบบพนักงาน</option>
                                    <option value="full time staff">พนักงานประจำ</option>
                                    <option value="daily staff">พนักงานรายวัน</option>
                                    <option value="temporary worker">พนักงานชั่วคราว</option>
                                </select>
                                <div class="a">*</div>
                            </div>
                            <br>
                        </th>
                    </tr>
                    <tr>
                        <th class="mm">ข้อมูลพนักงาน</th>
                    </tr>
                    <tr>
                        <th>
                            <div class="row-4 ma">
                                <label for="prefix">คำนำหน้าชื่อ : </label>
                                <select name="prefix" id="prefix" class="margin" required>
                                    <option value="noun" selected hidden>เลือกคำนำหน้า</option>
                                    <option value="Mr.">นาย</option>
                                    <option value="Mrs.">นาง</option>
                                    <option value="miss">นางสาว</option>
                                </select>
                                <div class="b">*</div>
                            </div>
                            <div class="row">
                                <div class="col leftname">
                                    <label for="firstname">ชื่อ :</label>
                                    <input name="firstname" type="text" id="firstname" class="bb" required />
                                    <div class="c">*</div>
                                </div>
                                <div class="col leftlastname">
                                    <label for="lastname">นามสกุล :</label>
                                    <input name="lastname" type="text" id="lastname" class="bb" class="bb" required />
                                    <div class="d">*</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col leftidcardnumber">
                                    <label for="idcardnumber">เลขบัตรประชาชน :</label>
                                    <input name="idcardnumber" type="text" id=idcardnumber onkeyup="autoTab(this)" class="bb" required />
                                    <div class="e">*</div>
                                </div>
                                <div class="col leftbirthday">
                                    <label for="birthday">วันเกิด :</label>
                                    <label for="birthday"></label>
                                    <input type="date" name="birthday" id="birthday" class="bb" required />
                                    <div class="f">*</div><br>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th class="mm">ข้อมูลผู้ติดต่อ</th>
                    </tr>
                    <tr>
                        <th>
                            <div class="row">
                                <div class="col leftaddress">
                                    <label for="address">ที่อยู่ :</label>
                                    <input type="text" name="address" id="address" class="bb" required />
                                    <div class="l">*</div>
                                </div>
                                <div class="col lefttelephone">
                                    <label for="telephone">โทรศัพท์ :</label>
                                    <input name="telephone" type="text" id=telephone onkeyup="autoTab2(this)" class="bb" required />
                                    <div class="g">*</div>
                                </div>
                            </div>
                            <div class="row leftemail">
                                <div class="col">
                                    <label for="email">อีเมล :</label>
                                    <input name="email" type="email" id="email" onblur='check_email(this)' class="bb" required />
                                    <div class="h">*</div>
                                </div>
                                <div class="col leftpassword">
                                    <label for="password">รหัสผ่าน :</label>
                                    <input name="password" type="password" id="password" onblur='check_num(this)' class="bb" required />
                                    <div class="i">*</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col leftn">สำเนาบัตรประชาชน :
                                    <input type="file" accept="image/*" name="copyofIDcard" class="bb" required>
                                    <div class="j">*</div>
                                </div>
                                <div class="col leftnb">สำเนาทะเบียนบ้าน :
                                    <input type="file" accept="image/*" name="Copyofhouseregistration" class="bb" required>
                                    <div class="k">*</div>
                                </div>
                                <div class="row leftpng">
                                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                                </div>
                    <tr>
                        <th class="mm">บัญชีรับเงิน</th>
                    </tr>
                    <tr>
                        <th>
                            <div class="col d-flex justify-content-end">
                                <button type="button" id="addmodel_btn" class="btn btn-primary1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">เพิ่มบัญชีใหม่</button>
                            </div>
            </div>
            <table class="wh m">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ธนาคาร</th>
                        <th>เลขบัญชี</th>
                        <th>ชื่อบัญชี</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="banktable">

                </tbody>

            </table><br>
            </th>
            </tr>
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
    </form>

    <!---modal เพิ่มบัญชีใหม่-->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form name="addbankaccount" method="post" id="addbankaccount">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มบัญชีใหม่</h5>
                        <button type="button" id="addclose" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="bank">&nbsp &nbsp ธนาคาร : </label>
                        <select name="bank" id="addbank">
                            <option value="" selected hidden>เลือกธนาคาร</option>
                            <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                            <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                            <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                            <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                        </select>
                        &nbsp &nbsp เลขบัญชี : <input type="text" id="addbanknumber"></input>
                        &nbsp &nbsp ชื่อบัญชี : <input type="text" id="addbankaccountname"></input>
                        <br>
                        <div class="modal-footer">
                            <button type="submit" id="addtable" class="btn btn-primary2">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- ลบ -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title2" id="exampleModalLabel">ลบบัญชีรับเงิน</h5>
                    <button type="button" class="btn-close" id="closedelrow" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>ยืนยันที่จะลบ</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="delrow()" class="btn btn-primary2">ตกลง</button>
                </div>
            </div>
        </div>
    </div>

    <!---modal แก้ไขบัญชีรับเงิน-->
    <div class="modal fade bd-example-modal-xl1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form name="editbankaccount" id="editbankaccount" method="post" action="">
            <div class="modal-dialog modal-xl1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขบัญชีรับเงิน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="editclose" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col leftbank ">
                                <label for="bank">ธนาคาร : </label>
                                <select name="bank" id="editbank">
                                    <option value="" selected hidden>เลือกธนาคาร</option>
                                    <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                    <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                    <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                    <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col leftanb">
                                เลขบัญชี : <input type="text" id="editaccountnumber" name="accountnumber">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col leftan">
                                ชื่อบัญชี : <input type="text" id="editaccoutname" name="accountnumber">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary2">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="./src/js/addnewstaff.js"></script>

</html>