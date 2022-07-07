<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/searchstatistics.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-10">
                        <h1>สถิติการค้นหาโดยคำค้นหา</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 left">
                        <button class="buttom re" type="reset">รีเซต</button>
                    </div>
                </div>
                <table class="table col-10">
                    <tr>
                        <th>ลำดับ</th>
                        <th>คำค้น</th>
                        <th>จำนวนครั้งค้นหา</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>ใบตัดหญ้า</th>
                        <th>5</th>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th>ข้าวโพด</th>
                        <th>3</th>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>