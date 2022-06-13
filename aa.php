<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/aa.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-6 aa">
                        <h1>ร้านวรเชษฐ์เกษตรภัณฑ์</h1>
                    </div>
                    <div class="row br">
                        <h5>ยินดีตอนรับ ผู้ใช้งานระบบ</h5>
                    </div>
                    <div class="row">
                        <div class="col br">
                            <label for="Summary">ข้อมูลสรุป :</label>
                            <label for="Summary"></label>
                            <input type="date" name="Summary" id="Summary" required> - <input type="date" name="Summary" id="Summary" required>
                            <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>
                        </div>
                    </div>
                    <div class="row br">
                        <div class="col-10 box1">
                            <h6 class="t">ยอดขาย&nbsp | &nbspต้นทุนขาย + ค่าใช้จ่าย</h6>
                        </div>
                        <div class="col-2 box2">
                            <h6 class="t">กำไรสุทธิ</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 n">0.00</div>
                        <div class="col-6 nnn">0.00</div>
                        <div class="col-2 nn">0.00</div>
                    </div>
                    <div class="line br"></div>
                    <div class="row br">
                        <div class="col-2">
                            <a button type="stubmit" class="a" href="dailybestseller.php">&nbsp สินค้าขายดี &nbsp </a>
                        </div>
                        <div class="col-2">
                            <a button type="stubmit" class="b" href="expiredproduct.php">&nbsp สินค้าหมดอายุ &nbsp </a>
                        </div>
                        <div class="col-2">
                            <a button type="stubmit" class="c" href="searchstatistics.php">&nbsp สถิติการค้นหา &nbsp </a>
                        </div>
                        <div class="col-5">
                            <a button type="stubmit" class="d" href="productsearchstatistics.php">&nbsp สถิติการค้นหาโดยประเภทสินค้า &nbsp </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>