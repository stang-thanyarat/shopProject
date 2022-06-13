<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/confirm.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
<script src="./src/js/confirm.js"></script>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>แก้ใบสั่งซื้อ เลขที่01</h1>
                    <div class="col-12 d-flex justify-content-end signin">
                        <a class="submit BTNT" href="#"><img class='print' src="./src/images/print.png" width="25">&nbsp print</a>
                    </div>
                    <p></p>
                    <div class="col-12">
                        วันที่วางบิล:&nbsp;
                        <input type="date" name="datebill" id="datebill" />
                        &nbsp;วันที่รับของ:&nbsp;
                        <input type="date" name="datereceive" id="datereceive" />
                    </div>
                    <div class="col-12">
                        ชื่อผู้ขาย:&nbsp;
                        <select name="company" style="background-color: #7C904E;">
                            <option value="อาร์เอส อินเตอร์เทรด (2017) จำกัด" selected> อาร์เอส อินเตอร์เทรด (2017) จำกัด</option>
                        </select>
                    </div>
                    <div class="col-12" >
                        วิธีการชำระเงิน:&nbsp;
                        <select name="payment" onchange="location = this.value;" style="background-color: #7C904E;">
                            <option value="cash"selected>เงินสด</option>
                            <option value="confirm2.php" >เครดิต</option>
                        </select>
                        &nbsp;วันที่ชำระเงิน:&nbsp;
                        <input type="date" name="datepayment" id="datepayment">
                    </div>
                    <div class="col-12">
                        หมายเหตุ:
                    </div>
                    <div class="col-12">
                        <textarea style="vertical-align: middle; background-color: #7C904E;" name="detail" cols="50" rows="5" ></textarea>
                    </div>
                    <div class="col-12 C">
                        รายการสินค้า
                        <div class=" col-12 d-flex justify-content-end">
                        <button type="button" class="btn2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm">เพิ่มสินค้า</button>
                        </div>
                        <table class="main col-10">
                            <tr>
                                <th width="12%">ประเภทสินค้า</th>
                                <th width="15%">รายการสินค้า</th>
                                <th width="8%">ยี่ห้อ</th>
                                <th width="8%">รุ่น</th>
                                <th width="12%">ราคาต่อหน่วย</th>
                                <th width="15%">จำนวน</th>
                                <th width="15%">วันหมดอายุ</th>
                                <th width="15%">ราคา</th>
                            </tr>
                            <tr>
                                <th>ใบตัดหญ้า</th>
                                <th>ใบตัดหญ้า มีฟัน (แบบวงเดือน)</th>
                                <th>-</th>
                                <th>10X24T</th>
                                <th>105</th>
                                <th>35</th>
                                <th>10/10/2030</th>
                                <th>3,675</th>
                            </tr>
                            <tr>
                                <th>ใบตัดหญ้า</th>
                                <th>ใบตัดหญ้า มีฟัน (แบบวงเดือน)</th>
                                <th>-</th>
                                <th>10X30T</th>
                                <th>110</th>
                                <th>20</th>
                                <th>10/10/2030</th>
                                <th>2,200</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>ยอดรวม</th>
                                <th>55</th>
                                <th></th>
                                <th>5,875</th>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12 C">
                        ค่าใช้จ่ายอื่นๆ
                        <div class=" col-12 d-flex justify-content-end">
                            <button type="button" class="btn2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่ม</button>
                        </div>
                        <table class="main col-10">
                            <tr>
                                <th width="45%">รายการ</th>
                                <th width="45%">ราคา</th>
                                <th width="10%"></th>
                            </tr>
                            <tr>
                                <th>ค่าขนส่ง</th>
                                <th>200</th>
                                <th>
                                <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25"></button>
                                <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm2"><img src="./src/images/icon-pencil.png" width="25"></button>
                                </th>
                            </tr>
                            <tr>
                                <th>ยอดรวม</th>
                                <th>200</th>
                            </tr>
                        </table>
                    </div>
                    <div class="row A">
                        <div class=" col-12 d-flex justify-content-end signin">
                            ยอดสุทธิ:&nbsp;&nbsp;
                            <input type="text" name="totalmoney" id="totalmoney">
                        </div>
                    </div>
                    <div class="row B">
                        <div class=" col-12 d-flex justify-content-end signin">
                            <input class="BTNC" type="submit" value="ยกเลิก">
                            <input class="BTN" type="submit" value="บันทึก">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---modal เพิ่มสินค้า-->
        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มสินค้า</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addproduct">

                            <div class="col-12 r">
                            ประเภทสินค้า: &nbsp;
                                <select id="typeproduct" style="background-color: #7C904E;" required>
                                    <option value="เลือก" selected>เลือก</option>
                                </select>
                            </div>
                            
                            <div class="col-12 r">
                            รายการสินค้า: &nbsp;
                                <select name="listproduct" style="background-color: #7C904E;" required>
                                    <option value="เลือก" selected>เลือก</option>
                                </select>
                            </div>

                            <div class="col-12 r">
                            ยี่ห้อ: &nbsp;
                                <select name="brand" style="background-color: #7C904E;" required>
                                    <option value="เลือก" selected>เลือก</option>
                                </select>
                            </div>

                            <div class="col-12 r">
                            รุ่น: &nbsp;
                                <select name="productmodel" style="background-color: #7C904E;" required>
                                    <option value="เลือก" selected>เลือก</option>
                                </select>
                            </div>

                            <center>ราคาต่อหน่วย: &nbsp;<input type="number" class="u" min="1" name="amountproduct" id="amountproduct" width="5%" required /><br><p></p></center>
                            <center>วันหมดอายุ: &nbsp;<input type="date" class="u" name="expirationdate" id="expirationdate"  required /><p></p></center>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary1">ตกลง</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--- modal ค่าใช้จ่ายอื่นๆ-->
        <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มค่าใช้จ่ายอื่นๆ</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="addproduct" method="post" action="">
                           
                        <center>รายการ: &nbsp;<input type="text" name="list" id="list" required /><br><p></p></center>
                        <center>ราคา: &nbsp;<input type="text" name="priceother" id="priceother" required /><p></p></center>
                               
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary1">ตกลง</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--- modal ค่าใช้จ่ายอื่นๆ-->
        <div class="modal fade bd-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm2">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขค่าใช้จ่ายอื่นๆ</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="addproduct" method="post" action="">
                           
                        <center>รายการ: &nbsp;<input type="text" name="list" id="list" required /><br><p></p></center>
                        <center>ราคา: &nbsp;<input type="text" name="priceother" id="priceother" required /><p></p></center>
                               
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary1">ตกลง</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ลบ -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ลบรายการ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body1">
                        <h3>ยืนยันที่จะลบ</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary1">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>