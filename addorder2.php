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
                        <label for="contract">วันที่วางบิล:</label>
                        <input type="date" name="datebill" id="datebill" required/>
                        <label for="contract">วันที่รับของ:</label>
                        <input type="date" name="datereceive" id="datereceive" required/>
                    </div>
                    <div class="col-12">
                        <label for="contract">ชื่อผู้ขาย:</label>
                        <select name="company" style="background-color: #7C904E;">
                            <option value="อาร์เอส อินเตอร์เทรด (2017) จำกัด" selected> อาร์เอส อินเตอร์เทรด (2017) จำกัด</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="contract">วิธีการชำระเงิน:</label>
                        <select name="payment" style="background-color: #7C904E;">
                            <option value="เงินสด">เงินสด</option>
                            <option value="เครดิต" selected>เครดิต</option>
                        </select>
                        <label for="contract">วันที่ชำระเงิน:</label>
                        <input type="date" name="datepayment">
                    </div>
                    <div class="col-12">
                        สลิปธนาคาร: <input accept="image/*" type="file" name="slip" required>
                    </div>
                    <div class="col-12">
                        *ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB
                    </div>
                    <div class="col-12">
                        <label for="contract">หมายเหตุ:</label>
                    </div>
                    <div class="col-12">
                        <textarea style="vertical-align: middle; background-color: #7C904E;" name="detail" cols="50" rows="5"></textarea>
                    </div>
                    <div class="col-12 C">
                        <label for="contract">รายการสินค้า</label>
                        <div class=" col-12 d-flex justify-content-end signin">
                            <input class="BTNP" type="submit" value="เพิ่มสินค้า">
                        </div>
                        <table class="main col-10">
                            <tr>
                                <th>ประเภทสินค้า</th>
                                <th>รายการสินค้า</th>
                                <th>ยี่ห้อ</th>
                                <th>รุ่น</th>
                                <th>ราคาต่อหน่วย</th>
                                <th>จำนวน</th>
                                <th>ราคา</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>ใบตัดหญ้า</th>
                                <th>ใบตัดหญ้า มีฟัน (แบบวงเดือน)</th>
                                <th>-</th>
                                <th>10X24T</th>
                                <th>105</th>
                                <th>30</th>
                                <th>3,150</th>
                                <th>
                                    <img src="./src/images/icon-delete.png" width="25">
                                    <img src="./src/images/icon-pencil.png" width="25">
                                </th>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12 C">
                        <label for="contract">ค่าใช้จ่ายอื่นๆ</label>
                        <div class=" col-12 d-flex justify-content-end signin">
                            <input class="BTNP" type="submit" value="เพิ่ม">
                        </div>
                        <table class="main col-10">
                            <tr>
                                <th>รายการ</th>
                                <th>ราคา</th>
                                <th></th>
                            </tr>
                        </table>
                    </div>
                    <div class="row A">
                        <div class=" col-12 d-flex justify-content-end signin">
                            <label for="contract">ยอดสุทธิ:</label>
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
    </form>
</body>

</html>