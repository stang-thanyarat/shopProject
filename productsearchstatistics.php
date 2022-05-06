<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/productsearchstatistics.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row main">
            <div class="col-lg-10">
                <h1>สถิติการค้นหาโดยประเภทสินค้า</h1>
            </div>
            <div class="col-lg-1">
                <input class="buttom re" type="submit" value="รีเซต"/>
            </div>
        </div>
        <table class="main">
            <tr>
                <th>ลำดับ</th>
                <th>ประเภทสินค้า</th>
                <th>จำนวนครั้งค้นหา</th>
            </tr>
        </table>
</body>