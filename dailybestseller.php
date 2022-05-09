<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/dailybestseller.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-4">
                        <h1>สินค้าขายดีประจำวัน</h1>
                    </div>
                    <div class="row">
                        <div class=" col-3">
                            <label for="category"></label>
                            <select name="category" id="category">
                            </select>
                            <div class="col-4">
                                <label for="contract">วันที่ทำสัญญา:</label>
                                <input type="date" name="dateContract" />
                            </div>
                            <div class="col-1">
                                <input type="text" class="btn-d" placeholder="&nbsp ชื่อผู้ขาย">
                                <button type="submit" class="s">
                                    <img src="./src/images/search.png" width="15" alt="">
                            </div>
                        </div>
                        <table class="main">
                            <tr>
                                <th>ลำดับ</th>
                                <th>รูปภาพ</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคา</th>
                                <th>จำนวน</th>
                            </tr>
                        </table>
                    </div>
                </div>
</body>