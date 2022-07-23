<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/addorder2.css" />

    <title>Document</title>
</head>
<?php include('nav.php'); ?>
<body>
    <form id="form1">
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>ใบสั่งซื้อ</h1>
                    <div class="col-12 d-flex justify-content-end signin">
                        <button type="button" onclick="print()"><img class='print' src="./src/images/print.png" width="25" />&nbsp&nbsp print</button>
                    </div>
                    <p></p>
                    <div id="print">
                        <div class="col-12">
                            วันที่วางบิล:&nbsp;
                            <input type="date" name="datebill" id="datebill" required />
                            &nbsp;&nbsp;วันที่รับของ:&nbsp;
                            <input type="date" name="datereceive" id="datereceive" required />
                        </div>
                        <div class="col-12">
                            ชื่อผู้ขาย:&nbsp;
                            <select name="company" style="background-color: #7C904E;">
                                <option value="อาร์เอส อินเตอร์เทรด (2017) จำกัด" selected> อาร์เอส อินเตอร์เทรด (2017) จำกัด</option>
                            </select>
                        </div>
                        <div class="col-12 j">
                            วิธีการชำระเงิน:&nbsp;
                            <select name="payment_sl" id="payment_sl"  style="background-color: #7C904E;">
                                <option value="เงินสด" selected>เงินสด</option>
                                <option value="เครดิต">เครดิต</option>
                            </select>&nbsp;&nbsp;
                            วันที่ชำระเงิน:&nbsp;
                            <input type="date" name="payment_dt" id="payment_dt">
                        </div>
                        <div id="creditupload">
                        <div class="col-12 h">
                            สลิปธนาคาร:&nbsp; <input accept="image/*" type="file" id="bank_slip" name="bank_slip">
                        </div>
                        <div class="col-12">
                            *ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB
                        </div>
                        </div>
                        <div class="col-12">
                            หมายเหตุ:
                        </div>
                        <div class="col-12">
                            <textarea style="vertical-align: middle; background-color: #7C904E;" name="note" cols="50" rows="5" id="note"></textarea>
                        </div>
                        <div class="col-12 C">
                            รายการสินค้า
                            <div class=" col-12 d-flex justify-content-end">
                                <button type="button" class="btn2" id="addmodel_btn" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm">เพิ่มสินค้า</button>
                            </div>
                            <table class="main col-10">
                                <thead>
                                    <tr>
                                        <th width="12%">ประเภทสินค้า</th>
                                        <th width="15%">รายการสินค้า</th>
                                        <th width="8%">ยี่ห้อ</th>
                                        <th width="10%">รุ่น</th>
                                        <th width="15%">ราคาต่อหน่วย (บาท)</th>
                                        <th width="15%">จำนวน</th>
                                        <th width="15%">ราคา (บาท)</th>
                                        <th width="15%"></th>
                                    </tr>
                                </thead>
                                <tbody id="list-product">

                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 C">
                            ค่าใช้จ่ายอื่นๆ
                            <div class=" col-12 d-flex justify-content-end">
                                <button type="button" class="btn2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่ม</button>
                            </div>
                            <table class="main col-10">
                                <thead>
                                    <tr>
                                        <th width="45%">รายการ</th>
                                        <th width="45%">ราคา</th>
                                        <th width="10%"></th>
                                    </tr>
                                </thead>
                                <tbody id="list-priceother">

                                </tbody>
                            </table>
                        </div>
                        <div class="row A">
                            <div class=" col-12 d-flex justify-content-end" >
                                ยอดสุทธิ:&nbsp;&nbsp;
                                <input type="text" name="net_price" id="net_price">
                            </div>
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
    </form>
    <!---modal เพิ่มสินค้า-->
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form id="addproduct">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มสินค้า</h5>
                        <button type="button" class="close" id="addclose" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="col-12 r">
                            ประเภทสินค้า: &nbsp;
                            <select id="typeproduct" name="typeproduct" style="background-color: #7C904E;" required>
                                <option value="เลือก" selected>เลือก</option>
                            </select><br><br>
                            รายการสินค้า: &nbsp;
                            <select id="product_name" name="product_name" style="background-color: #7C904E;" required>
                                <option value="เลือก" selected>เลือก</option>
                            </select><br><br>
                            ยี่ห้อ: &nbsp;
                            <select id="brand" name="brand" style="background-color: #7C904E;" required>
                                <option value="เลือก" selected>เลือก</option>
                            </select><br><br>
                            รุ่น: &nbsp;
                            <select id="model" name="model" style="background-color: #7C904E;" required>
                                <option value="เลือก" selected>เลือก</option>
                            </select><br><br>
                            ราคาต่อหน่วย: &nbsp;<input type="number" class="u" min="0.25" step="0.25" name="unitprice" id="unitprice" required /><br><br>
                            จำนวน: &nbsp;<input type="number" class="u" min="1" name="amount" id="amount" required />

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="addtable" class="btn btn-primary1">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--- modal ค่าใช้จ่ายอื่นๆ-->
    <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form name="addprice" id="addprice" method="post">
            <div class="modal-dialog modal-sm1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มค่าใช้จ่ายอื่นๆ</h5>
                        <button type="button" id="addcloseother" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center>รายการ: &nbsp;<input type="text" name="listother" id="listother" required /><br>
                            <p></p>
                        </center>
                        <center>ราคา: &nbsp;<input type="text" name="priceother" id="priceother" required />
                            <p></p>
                        </center>

                        <div class="modal-footer">
                            <button type="submit" id="addtable2" class="btn btn-primary1">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--แก้ไขสินค้า-->
    <div class="modal fade bd-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form id="editaddproduct">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขสินค้า</h5>
                        <button type="button" id="editclose" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">


                        <div class="col-12 r">
                            ประเภทสินค้า: &nbsp;
                            <select id="edittypeproduct" name="typeproduct" style="background-color: #7C904E;" required>
                                <option value="เลือก" selected>เลือก</option>
                            </select><br><br>
                            รายการสินค้า: &nbsp;
                            <select id="editlistproduct" name="listproduct" style="background-color: #7C904E;" required>
                                <option value="เลือก" selected>เลือก</option>
                            </select><br><br>
                            ยี่ห้อ: &nbsp;
                            <select id="editbrand" name="brand" style="background-color: #7C904E;" required>
                                <option value="เลือก" selected>เลือก</option>
                            </select><br><br>
                            รุ่น: &nbsp;
                            <select id="editproductmodel" name="productmodel" style="background-color: #7C904E;" required>
                                <option value="เลือก" selected>เลือก</option>
                            </select><br><br>
                            ราคาต่อหน่วย: &nbsp;<input type="number" class="u" min="0.25" step="0.25" name="unitprice" id="editunitprice" required /><br><br>
                            จำนวน: &nbsp;<input type="number" class="u" min="1" name="amount" id="editamount" required />
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary1">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--- modal แก้ไขค่าใช้จ่ายอื่นๆ-->
    <div class="modal fade bd-example-modal-sm4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form name="addprice" id="editaddprice" method="post">
            <div class="modal-dialog modal-sm4">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขค่าใช้จ่ายอื่นๆ</h5>
                        <button type="button" id="editaddcloseother" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center>รายการ: &nbsp;<input type="text" name="listother" id="editlistother" required /><br>
                            <p></p>
                        </center>
                        <center>ราคา: &nbsp;<input type="text" name="priceother" id="editpriceother" required />
                            <p></p>
                        </center>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary1">ตกลง</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">ลบรายการ</h5>
                    <button type="button" id="closedelrow" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body1">
                    <h3>ยืนยันที่จะลบ</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="delrow()" class="btn btn-primary1">ตกลง</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ลบรายการอื่นๆ -->
    <div class="modal fade" id="exampleModalother" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ลบรายการ</h5>
                    <button type="button" id="closedelrow2" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body1">
                    <h3>ยืนยันที่จะลบ</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="delrow2()" class="btn btn-primary1">ตกลง</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="./src/js/printThis.js"></script>
<script src="./src/js/addorder2.js"></script>

</html>