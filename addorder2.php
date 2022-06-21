<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/addorder2.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
<script src="./src/js/addorder.js"></script>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>ใบสั่งซื้อ</h1>
                    <div class="col-12 d-flex justify-content-end signin">
                        <a class="submit BTNT" href="#"><img class='print' src="./src/images/print.png" width="25">&nbsp print</a>
                    </div>
                    <p></p>
                    <div class="col-12">
                        วันที่วางบิล:&nbsp;
                        <input type="date" name="datebill" id="datebill" required/>
                        &nbsp;&nbsp;วันที่รับของ:&nbsp;
                        <input type="date" name="datereceive" id="datereceive" required/>
                    </div>
                    <div class="col-12">
                        ชื่อผู้ขาย:&nbsp;
                        <select name="company" style="background-color: #7C904E;">
                            <option value="อาร์เอส อินเตอร์เทรด (2017) จำกัด" selected> อาร์เอส อินเตอร์เทรด (2017) จำกัด</option>
                        </select>
                    </div>
                    <div class="col-12 j">
                       วิธีการชำระเงิน:&nbsp;
                        <select name="payment" onchange="location = this.value;" style="background-color: #7C904E;">
                            <option value="addorder.php">เงินสด</option>
                            <option value="เครดิต" selected>เครดิต</option>
                        </select>&nbsp;&nbsp;
                        วันที่ชำระเงิน:&nbsp;
                        <input type="date" name="datepayment">
                    </div>
                    <div class="col-12 h">
                    สลิปธนาคาร:&nbsp; <input accept="image/*" type="file" name="slip" required>
                    </div>
                    <div class="col-12">
                        *ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB
                    </div>
                    <div class="col-12">
                        หมายเหตุ:
                    </div>
                    <div class="col-12">
                        <textarea style="vertical-align: middle; background-color: #7C904E;" name="detail" cols="50" rows="5"></textarea>
                    </div>
                    <div class="col-12 C">
                    รายการสินค้า
                        <div class=" col-12 d-flex justify-content-end">
                        <button type="button" class="btn2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm" onclick="document.getElementById('id01').style.display='block'">เพิ่มสินค้า</button>
                        </div>
                        <table class="main col-10">
                            <tr>
                                <th width="12%" id="typeproduct">ประเภทสินค้า</th>
                                <th width="15%" id="listproduct">รายการสินค้า</th>
                                <th width="8%" id="brand">ยี่ห้อ</th>
                                <th width="10%" id="productmodel">รุ่น</th>
                                <th width="15%" id="unitprice">ราคาต่อหน่วย (บาท)</th>
                                <th width="15%" id="amount">จำนวน</th>
                                <th width="15%" id="price">ราคา (บาท)</th>
                                <th width="15%" id="deleteedit"></th>
                            </tr>
                            <tr>

                                <th width="12%">ใบตัดหญ้า</th>
                                <th width="15%">ใบตัดหญ้า มีฟัน (แบบวงเดือน)</th>
                                <th width="8%">-</th>
                                <th width="10%">10X24T</th>
                                <th width="15%">105.00</th>
                                <th width="15%">30</th>
                                <th width="15%">3,150.00</th>
                                <th width="15%">
                                    <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25"></button>
                                    <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm4"><img src="./src/images/icon-pencil.png" width="25"></button>
                                </th>
                            </tr>
                            <tbody id="list-product"></tbody>
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
                        </table>
                    </div>
                    <div class="row A">
                        <div class=" col-12 d-flex justify-content-end signin">
                            ยอดสุทธิ:&nbsp;&nbsp;
                            <input type="text" name="totalmoney">
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
                        <form id="addproduct" >

                            <div class="col-12 r">
                            ประเภทสินค้า: &nbsp;
                                <select id="typeproduct" style="background-color: #7C904E;" required>
                                    <option value="เลือก" selected>เลือก</option>
                                </select>
                            </div>
                            
                            <div class="col-12 r">
                            รายการสินค้า: &nbsp;
                                <select id="listproduct" style="background-color: #7C904E;" required>
                                    <option value="เลือก" selected>เลือก</option>
                                </select>
                            </div>

                            <div class="col-12 r">
                            ยี่ห้อ: &nbsp;
                                <select id="brand" style="background-color: #7C904E;" required>
                                    <option value="เลือก" selected>เลือก</option>
                                </select>
                            </div>

                            <div class="col-12 r">
                            รุ่น: &nbsp;
                                <select id="productmodel" style="background-color: #7C904E;" required>
                                    <option value="เลือก" selected>เลือก</option>
                                </select>
                            </div>

                            <center>ราคาต่อหน่วย: &nbsp;<input type="number" class="u" min="0.25" step="0.25" name="unitprice" id="unitprice" required /><br><p></p></center>
                            <center>จำนวน: &nbsp;<input type="number" class="u" min="1" name="amount" id="amount"  required /><p></p></center>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary1"  >ตกลง</button>
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
        <!--แก้ไขสินค้า-->
        <div class="modal fade bd-example-modal-sm4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm4">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขสินค้า</h5>
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
                            <center>จำนวน: &nbsp;<input type="number" class="u" min="0.25" step="0.25" name="priceproduct" id="priceproduct"  required /><p></p></center>


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