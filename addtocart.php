<?php
include_once('service/auth.php');
isNotAdmin();
function getFullRole($role)
{
    if ($role == "E") {
        return 'พนักงาน';
    }
    if ($role == "L") {
        return 'เจ้าของร้าน';
    }
    if ($role == "A") {
        return 'ผู้ดูแลระบบ';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/addtocart.css" />
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <title>addtocart</title>
</head>
<?php include_once('nav.php'); ?>
<!--
    ยังไม่ได้เปลี่ยนชื่อ และ id ให้ตรงกับ word และ database
-->

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col">
                        <h1>รถเข็นสินค้า<h1>
                    </div>
                    <table class="z">
                        <tr class="t">
                            <th width="5%">ลำดับ</th>
                            <th width="10%">รูปภาพ</th>
                            <th width="40%">สินค้า</th>
                            <th width="15%">ราคาต่อชิ้น</th>
                            <th width="10%">จำนวน</th>
                            <th width="15%">ราคารวม</th>
                            <th width="5%"></th>
                        </tr>
                        <tbody id="addtocartTable">  </tbody>
                        <tr class="t">
                            <th colspan="2"> <select name="type" id="solutionPay" required>
                                    <option value="" selected hidden>เลือกประเภทการชำระ</option>
                                    <option value="cash">เงินสด</option>
                                    <option value="bankTransfer">โอนผ่านบัญชีธนาคาร</option>
                                    <option value="installment">ผ่อนชำระ</option>
                            </th>
                            <th colspan="6">
                                <div class=" d-flex justify-content-end">
                                    <h5 class="a">จำนวน 2 ชิ้น &nbsp</h5>
                                    <h5 class="a">ยอดรวมทั้งหมด : 210 บาท &nbsp &nbsp</h5>
                                    <button type="button" id="mySubmit" class="r" data-bs-toggle="modal">ยืนยัน</button>
                                </div>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>

                    <!-- ลบ -->
                    <div class="modal fade bd-example-modal-sm1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title2" id="exampleModalLabel">ลบรายการสินค้า</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h3>ยืนยันที่จะลบ</h3>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary1">ตกลง</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- แก้ไขจำนวน-->
                    <div class="modal fade bd-example-modal-sm2" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title2" id="exampleModalLabel">แก้ไขรายการสินค้า</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="exp">
                                        วันหมดอายุ :&nbsp<font color="red">&nbsp*</font>
                                        <input type="date" name="list" id="list" class="inbox" required />
                                    </div>

                                    <div class="amount">
                                        จำนวน : <font color="red">&nbsp*</font>
                                        <input type="text" name="amount" id="amount" class="inbox" required />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary1">ตกลง</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ยืนยันการซื้อแบบเงินสด -->
                    <div class="modal fade bd-example-modal-sm3" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title2" id="exampleModalLabel">รับเงินสด</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col allprice">
                                            ยอดรวมทั้งหมด :<font color="red">&nbsp*</font>
                                            <input type="text" id="" class="inbox" required />
                                            &nbsp&nbspบาท
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col receivecash">
                                            เงินที่รับมา :<font color="red">&nbsp*</font>
                                            <input type="text" id="" class="inbox" required />
                                            &nbsp&nbspบาท
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col change">
                                            เงินทอน :&nbsp&nbsp&nbsp
                                            <input type="text" id="" class="inbox">
                                            &nbsp&nbspบาท
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary1">ตกลง</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ยืนยันการซื้อแบบโอนผ่านธนาคาร -->
                    <div class="modal fade bd-example-modal-sm4" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title2" id="exampleModalLabel">แนบในสลิปธนาคาร</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col importfile">
                                            แนบในสลิปธนาคาร : <input type="file" class="inbox" id="" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col notice">
                                            <label class="noticetext">*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col detail">
                                            หมายเหตุ : <input type="note" class="inbox" id="">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary1">ตกลง</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ยืนยันการซื้อแบบผ่อนชำระ -->
                    <div class="modal fade bd-example-modal-sm5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title2" id="exampleModalLabel">กรอกรหัสเจ้าของร้าน</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col email">
                                            E-mail : <input type="text" name="email" id="email" class="btnd inbox" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col password">
                                            รหัสผ่าน : <input type="text" name="password" id="password" class="btnd inbox" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary1">ยืนยัน</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ยืนยันการซื้อแบบผ่อนชำระ(ต่อ 1) -->
                    <div class="modal fade bd-example-modal-sm6" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title2" id="exampleModalLabel">กรอกรหัสเจ้าของร้าน</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col email">
                                            กรอกรหัสบัตรประชาชน : <input type="text" name="email" id="email" class="btnd inbox" required />
                                        </div>
                                        <div class="col-1">
                                            <button type="button" class="l"><img src="./src/images/search.png" width="16"></button>&nbsp &nbsp
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary1">ยืนยัน</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ยืนยันการซื้อแบบผ่อนชำระ(ต่อ 2) -->
                    <div class="modal fade bd-example-modal-sm7" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title2" id="exampleModalLabel">กรอกรหัสเจ้าของร้าน</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col email">
                                            E-mail : <input type="text" name="email" id="email" class="btnd inbox" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col password">
                                            รหัสผ่าน : <input type="text" name="password" id="password" class="btnd inbox" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary1">ยืนยัน</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </form>
</body>
<script src="./src/js/addtocart.js"></script>

</html>
<!-- 
    แก้ ui ที่ต่อจากกดยืนยันการผ่อนชำระ
    เพิ่มการเชื่อมต่อทั้งข้อมูลและ modal
-->