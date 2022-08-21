<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/contracthistory.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-lg-5">
                        <h1>สัญญาซื้อขาย</h1>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end signin">
                    <input type="text" class="btnd" placeholder="&nbsp ชื่อ-นามสกุล">
                    <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>&nbsp &nbsp
                    <div class="col-3">
                        <a class="submit BTNC" href="#"><img class="add" src="./src/images/arrow.png" width="35">กลับไปยังหน้าขาย</a>
                    </div>
                </div>
                <table class="main col-10">
                    <tr>
                        <th width="12%">วันที่ทำสัญญา</th>
                        <th width="8%">เลขที่สัญญา</th>
                        <th width="15%">ชื่อ-นามสกุล</th>
                        <th width="12%">มูลค่าสินค้าทั้งหมด</th>
                        <th width="8%">ยอดคงเหลือ</th>
                        <th width="8%">ใบส่งของ</th>
                        <th width="8%">ไฟล์สัญญา</th>
                        <th width="8%">พิมพ์</th>
                        <th width="5%"></th>
                    </tr>
                    <tr>
                        <th>26 ธ.ค. 2564 </th>
                        <th>A01</th>
                        <th>
                            <div class="r">
                                <a class="submit BTNP" href="repay.php"><img class='confirm'>สมชาย พักดี</a>
                            </div>
                        </th>
                        <th>220.00</th>
                        <th>0.00</th>
                        <th><img src="./src/images/pdf.png" width="25"></th>
                        <th><input type="file" accept="image/*" name="contractfile" width="10px" required></th>
                        <th><img src="./src/images/print.png" width="25"></th>
                        <th><button type="button" class="btn1" onclick="javascript:window.location='solvecontract.php';"><img src="./src/images/icon-pencil.png" width="25"></button></th>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>

</html>