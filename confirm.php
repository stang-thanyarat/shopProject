<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/confirm.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>ใบสั่งซื้อ เลขที่01</h1>
                    <div class="col-12 d-flex justify-content-end signin">
                        <a class="submit BTNT" href="#"><img class='print' src="./src/images/print.png" width="25">&nbsp print</a>
                    </div>
                    <p></p>
                    <div class="col-12">
                        วันที่วางบิล:
                        <input type="date" name="datebill" id="datebill" />
                        วันที่รับของ:
                        <input type="date" name="datereceive" id="datereceive" />
                    </div>
                    <div class="col-12">
                        ชื่อผู้ขาย:
                        <select name="company" style="background-color: #7C904E;">
                            <option value="อาร์เอส อินเตอร์เทรด (2017) จำกัด" selected> อาร์เอส อินเตอร์เทรด (2017) จำกัด</option>
                        </select>
                    </div>
                    <div class="col-12">
                        วิธีการชำระเงิน:
                        <select name="payment" style="background-color: #7C904E;">
                            <option value="เงินสด">เงินสด</option>
                            <option value="เครดิต" selected>เครดิต</option>
                        </select>
                        <label for="contract">วันที่ชำระเงิน:</label>
                        <input type="date" name="datepayment" id="datepayment">
                    </div>
                    <div class="col-12 ">
                        ใบเสร็จ:<input type="file" accept="image/*" name="slip" required>
                        ใบส่งของ:<input type="file" accept="image/*" name="invoice" required>
                    </div>
                    <div class="col-12">
                        *ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB
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
                            <input class="BTNP" type="submit" value="เพิ่ม">
                        </div>
                        <table class="main col-10">
                            <tr>
                                <th>ประเภทสินค้า</th>
                                <th>รายการสินค้า</th>
                                <th>ยี่ห้อ</th>
                                <th>รุ่น</th>
                                <th>ราคาต่อหน่วย</th>
                                <th>จำนวน</th>
                                <th>วันหมดอายุ</th>
                                <th>ราคา</th>
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
                    <div class="col">
                        ค่าใช้จ่ายอื่นๆ
                        <table class="main col-10">
                            <tr>
                                <th>รายการ</th>
                                <th>ราคา</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>ค่าขนส่ง</th>
                                <th>200</th>
                                <th>
                                    <img src="./src/images/icon-delete.png" width="25">
                                    <img src="./src/images/icon-pencil.png" width="25">
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
                            ยอดสุทธิ:
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
    </form>
</body>

</html>