<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/addproducttype.css" />
    <title>addproducttype</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-12">
                        <h1>ประเภทสินค้า</h1>
                    </div>
                    <div class="col-2 mai">
                    </div>
                    <div class="col-1">
                        <a class="submit btn" href="#"><img class='add' src="./src/images/plus.png" width="25">&nbsp เพิ่มประเภทสินค้า</a>
                    </div>
                </div>
                <table class="ma">
                    <tr>
                    <th>ประเภทสินค้า</th>
                        <th>รายการทั้งหมด</th>
                        <th>รายการที่ขาย</th>
                        <th></th>
                    </tr>
                    <tr>
                    <th>เมล็ดพันธุ์</th>
                        <th>10</th>
                        <th>7</th>
                        <th><img src="./src/images/icon-delete.png" width="25">
                            <img src="./src/images/icon-pencil.png" width="25">
                        </th>
                    </tr>
                </table>
            </div>
</body>