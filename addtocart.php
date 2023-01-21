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

<body>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
        <div class="col-11">
            <!-- หัวข้อหลัก -->
            <div class="row main">
                <div class="col">
                    <h1>รถเข็นสินค้า<h1>
                </div>
            </div>
            <!--ตาราง-->
            <!--เนื้อหา-->
            <table class="col-11 tablesales">
                <thead>
                <tr class="t">
                    <th width="5%" style="border-right: 1px; ">ลำดับ</th>
                    <th width="10%" style="border-left: 1px; border-right: 1px;">รูปภาพ</th>
                    <th width="30%" style="border-left: 1px; border-right: 1px; ">สินค้า</th>
                    <th width="15%" style="border-left: 1px; border-right: 1px; ">ราคาต่อชิ้น</th>
                    <th width="15%" style="border-left: 1px; border-right: 1px; ">จำนวน</th>
                    <th width="15%" style="border-left: 1px; border-right: 1px; ">ราคารวม</th>
                    <th width="10%" style="border-left: 1px; "></th>
                </tr>
                </thead>
                <tbody id="addtocartTable"></tbody>
                <tbody>
                <tr class="t">
                    <th colspan="2" style="border-right: 1px">
                        <select name="payment_s" id="payment_s" required>
                            <option value="เลือกประเภทการชำระ" selected hidden>เลือกประเภทการชำระ</option>
                            <option value="เงินสด">เงินสด</option>
                            <option value="โอนผ่านบัญชีธนาคาร">โอนผ่านบัญชีธนาคาร</option>
                            <option value="ผ่อนชำระ">ผ่อนชำระ</option>
                        </select>
                    </th>
                    <th colspan="6" style="border-left: 1px">
                        <div class=" d-flex justify-content-end">
                            <h5 class="a">จำนวน <span id="allquantity">0</span> ชิ้น &nbsp</h5>
                            <h5 class="a">ยอดรวมทั้งหมด : <span id="allprice">0</span> บาท &nbsp &nbsp</>
                            <button type="button" id="mySubmit" class="r" data-bs-toggle="modal">ยืนยัน</button>
                        </div>
                    </th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

<!-- ยืนยันการซื้อแบบเงินสด -->
<div class="modal fade bd-example-modal-sm3" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="controller/Sales.php" name="form1" id="form1" method="POST" enctype="multipart/form-data">
        <input type="hidden" value="sales" name="table" />
        <input type="hidden" value="insert" name="form_action" />
        <input type="hidden" id="payment_sl" name="payment_sl" value="เงินสด" />
        <input type="hidden" id="employee_id" name="employee_id" value="<?=$_SESSION['employee_id']?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title2" id="exampleModalLabel">รับเงินสด</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col allprice">
                            จำนวนทั้งหมด :<font color="red">&nbsp*</font>
                            <input type="text" name="all_quantity" class="inbox all_quantity" required />
                            &nbsp&nbspชิ้น
                        </div>
                    </div>
                    <div class="row">
                        <div class="col allprice">
                            ยอดรวมทั้งหมด :<font color="red">&nbsp*</font>
                            <input type="text" name="all_price" class="inbox all_price" required />
                            &nbsp&nbspบาท
                        </div>
                    </div>
                    <div class="row">
                        <div class="col receivecash">
                            เงินที่รับมา :<font color="red">&nbsp*</font>
                            <input type="text" id="receivecash" class="inbox" required />
                            &nbsp&nbspบาท
                        </div>
                    </div>
                    <div class="row">
                        <div class="col change">
                            เงินทอน :&nbsp&nbsp&nbsp
                            <input type="text" id="change" class="inbox">
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
</form>

<!-- ยืนยันการซื้อแบบโอนผ่านธนาคาร -->
<div class="modal fade bd-example-modal-sm4" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="controller/Sales.php" name="form2" id="form2" method="POST" enctype="multipart/form-data">
        <input type="hidden" value="sales" name="table" />
        <input type="hidden" value="insert" name="form_action" />
        <input type="hidden" id="payment_sl" name="payment_sl" value="โอนผ่านบัญชีธนาคาร" />
        <input type="hidden" id="employee_id" name="employee_id" value="<?=$_SESSION['employee_id']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title2" id="exampleModalLabel">แนบในสลิปธนาคาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col allprice">
                        จำนวนทั้งหมด :<font color="red">&nbsp*</font>
                        <input type="text" name="all_quantity" class="inbox all_quantity" required />
                        &nbsp&nbspชิ้น
                    </div>
                </div>
                <div class="row">
                    <div class="col allprice">
                        ยอดรวมทั้งหมด :<font color="red">&nbsp*</font>
                        <input type="text" name="all_price" class="inbox all_price" required />
                        &nbsp&nbspบาท
                    </div>
                </div>
                <div class="row">
                    <div class="col importfile">
                        แนบในสลิปธนาคาร : <input type="file" class="inbox" id="import_files" name="import_files" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col notice">
                        <label class="noticetext">*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col detail">
                        หมายเหตุ : <input type="note" class="inbox" id="note" name="note">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary1">ตกลง</button>
            </div>
        </div>
    </div>
</div>
</form>

<!-- ยืนยันการซื้อแบบผ่อนชำระ -->
<div class="modal fade bd-example-modal-sm5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="controller/Sales.php" name="form3" id="form3" method="POST">
        <input type="hidden" value="sales" name="table" />
        <input type="hidden" value="insert" name="form_action" />
        <input type="hidden" id="payment_sl" name="payment_sl" value="ผ่อนชำระ" />
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
</body>
<script src="./src/js/addtocart.js"></script>

</html>