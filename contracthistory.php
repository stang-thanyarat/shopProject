<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <div class="col-12">
                        <h1>สัญญาซื้อขาย</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 y">
                        <input name="keyword" type="text" id="keyword" class="btnd" placeholder="&nbsp ชื่อสินค้า">
                        <button type="submit" class="s"><img src="./src/images/search.png" width="15"></button>
                    </div>
                    <div class="col-2 x">
                        <a type="button" href="./productlist.php" class="submit btn"><img src="./src/images/arrow.png" width="25">กลับไปยังหน้าขาย</a>
                    </div>
                </div>
                <table class="col-11 q">
                    <tr>
                        <th>วันที่ทำสัญญา</th>
                        <th>เลขที่สัญญา</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>มูลค่าสินค้าทั้งหมด</th>
                        <th>ยอดคงเหลือ</th>
                        <th>ใบส่งของ</th>
                        <th>ไฟล์สัญญา</th>
                        <th>พิมพ์</th>
                        <th></th>
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
                        <th><a type="button" class="btn1" onclick="javascript:window.location='solvecontract.php';"><img src="./src/images/icon-pencil.png" width="25"></a></th>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>

</html>