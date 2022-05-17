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
        <div class="row main">
            <div class="col-lg-5">
                <h1>สัญญาซื้อขาย</h1>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end signin">
                        <input type="text" class="btnd" placeholder="&nbsp ชื่อ-นามสกุล">
                        <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>
                    <div class="col-3">
                        <a class="submit BTNC" href="#"><img class='add' src="./src/images/arrow.png" width="50">กลับไปยังหน้าขาย</a>
                    </div>
                </div>
        <table class="main col-10">
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
                    <th>26/12/2021</th>
                    <th>A01</th>
                    <th>
                        <div class="r">
                        <a class="submit BTNP" href="#"><img class='confirm'>สมชาย พักดี</a>
                        </div>
                    </th>
                    <th>220</th>
                    <th>0</th>
                    <th><img src="./src/images/pdf.png" width="25"></th>
                    <th>แนบไฟล์ &nbsp<img src="./src/images/upload.png" width="25"></th>
                    <th><img src="./src/images/print.png" width="25"></th>
                    <th><img src="./src/images/icon-pencil.png" width="25"></th>
                </tr>
        </table>
</body>