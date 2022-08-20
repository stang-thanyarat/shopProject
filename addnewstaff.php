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
    <form action="controller/Employee.php" name="form1" id="form1" method="POST" enctype="multipart/form-data">
        <input type="hidden" value="employee" name="table" />
        <input type="hidden" value="insert" name="form_action" />
        <input type="hidden" id="bank" name="bank" />
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col">
                        <h1>เพิ่มพนักงาน</h1>
                    </div>
                </div>
                <table class="mai">
                    <tr>
                        <th class="mm">กำหนดรูปแบบพนักงาน</th>
                    </tr>
                    <tr>
                        <th>
                            <div class="row">
                                <div class="col-4 leftmodel">
                                    <label for="employee_model">รูปแบบพนักงาน :</label>
                                    <select name="employee_model" id="employee_model" class="margin" required>
                                        <option value="เลือกรูปแบบพนักงาน" selected hidden>เลือกรูปแบบพนักงาน</option>
                                        <option value="พนักงานประจำ">พนักงานประจำ</option>
                                        <option value="พนักงานรายวัน">พนักงานรายวัน</option>
                                        <option value="พนักงานชั่วคราว">พนักงานชั่วคราว</option>
                                    </select>
                                    <div class="a">*</div>
                                </div>
                                <div class="col-4 leftstartwork">
                                    <label for="employee_startwork_dt">วันที่เข้าทำงาน :</label>
                                    <input type="date" name="employee_startwork_dt" id="employee_startwork_dt" class="bb" required />
                                    <div class="q">*</div><br>
                                </div>
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
                                <label for="employee_prefix">คำนำหน้าชื่อ : </label>
                                <select name="employee_prefix" id="employee_prefix" class="margin" required>
                                    <option value="เลือกคำนำหน้า" selected hidden>เลือกคำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                                <div class="b">*</div>
                            </div>
                            <div class="row">
                                <div class="col leftname">
                                    <label for="employee_firstname">ชื่อ :</label>
                                    <input name="employee_firstname" type="text" id="employee_firstname" class="bb" required />
                                    <div class="c">*</div>
                                </div>
                                <div class="col leftlastname">
                                    <label for="employee_lastname">นามสกุล :</label>
                                    <input name="employee_lastname" type="text" id="employee_lastname" class="bb" class="bb" required />
                                    <div class="d">*</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col leftidcardnumber">
                                    <label for="employee_card_id">เลขบัตรประชาชน :</label>
                                    <input name="employee_card_id" type="text" id=employee_card_id onkeyup="autoTab(this)" class="bb" required />
                                    <div class="e">*</div>
                                </div>
                                <div class="col leftbirthday">
                                    <label for="employee_birthday">วันเกิด :</label>
                                    <input type="date" name="employee_birthday" id="employee_birthday" class="bb" required />
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
                                ที่อยู่ :&nbsp&nbsp&nbsp
                                    <textarea name="employee_address" id="employee_address" cols="50" rows="5" class="bb" style="vertical-align:top;"></textarea>
                                    <div class="l">*</div>
                                </div>
                                <div class="col lefttelephone">
                                    <label for="employee_telephone">โทรศัพท์ :</label>
                                    <input name="employee_telephone" type="text" id=employee_telephone onkeyup="autoTab2(this)" class="bb" required />
                                    <div class="g">*</div>
                                </div>
                            </div>
                            <div class="row leftemail">
                                <div class="col">
                                    <label for="employee_email">อีเมล :</label>
                                    <input name="employee_email" type="email" id="employee_email" onblur='check_email(this)' class="bb" required />
                                    <div class="h">*</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col leftn">สำเนาบัตรประชาชน :
                                    <input type="file" accept="image/*" id="employee_card_id_copy" name="employee_card_id_copy" class="bb" required>
                                    <div class="j">*</div>
                                </div>
                                <div class="col leftnb">สำเนาทะเบียนบ้าน :
                                    <input type="file" accept="image/*" id="employee_address_copy" name="employee_address_copy" class="bb" required>
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
                                <button type="button" id="addmodel_btn" class="btn btn-primary1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm">เพิ่มบัญชีใหม่</button>
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
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form name="addbankaccount" method="post" id="addbankaccount">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มบัญชีใหม่</h5>
                        <button type="button" id="addclose" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <label for="bank">ธนาคาร : </label>
                            <select name="bank_name" id="bank_name" required>
                                <option value="" selected hidden>เลือกธนาคาร</option>
                                <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                            </select>
                        </div><br>
                        <div class="row">
                            เลขบัญชี : <input type="text" id="bank_number" name="bank_number" required></input>
                        </div><br>
                        <div class="row">
                            ชื่อบัญชี : <input type="text" id="bank_account" name="bank_account" required></input>
                        </div>
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
                                <label for="editbank_name">ธนาคาร : </label>
                                <select name="editbank_name" id="editbank_name">
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
                                เลขบัญชี : <input type="text" id="editbank_number" name="editbank_number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col leftan">
                                ชื่อบัญชี : <input type="text" id="editbank_account" name="editbank_account">
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