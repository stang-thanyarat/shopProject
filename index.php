<?php
include_once('service/auth.php');
if (!isset($_SESSION)) {
    session_start();
}
function getFullRole($role)
{
    if ($role == "E") {
        return 'พนักงาน';
    }
    if ($role == "L") {
        return 'เจ้าของร้าน';
    }
    if ($role == "A") {
        return 'ผู้ดูแลระบบ';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/aa.css" />
    <title>Document</title>
</head>
<?php include_once('nav.php'); ?>

<body>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <div class="col-6 aa">
                    <h1>ร้านวรเชษฐ์เกษตรภัณฑ์</h1>
                </div>
                <div class="row brr">
                    <h5>ยินดีตอนรับ :  <?= $_SESSION['role'] !== 'A' ? $_SESSION['username'] : 'Admin' ?> ตำแหน่ง : <?= getFullRole($_SESSION['role']) ?></h5>
                </div>
                <?php if (getRole() == 'E' || getRole() == 'L') { ?>
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
                            <button type="stubmit" class="a" onclick="javascript:window.location='dailybestseller.php';">&nbsp สินค้าขายดี &nbsp </button>
                        </div>
                        <div class="col-2">
                            <button type="stubmit" class="b" onclick="javascript:window.location='expiredproduct.php';">&nbsp สินค้าหมดอายุ &nbsp&nbsp </button>
                        </div>
                        <?php if (getRole() == 'L') { ?><div class="col-2">
                                <button type="stubmit" class="c" onclick="javascript:window.location='searchstatistics.php'" ;>&nbsp สถิติการค้นหา &nbsp </button>
                            </div>
                            <div class="col-5">
                                <button type="stubmit" class="d" onclick="javascript:window.location='productsearchstatistics.php';">&nbsp สถิติการค้นหาโดยประเภทสินค้า &nbsp </button>
                            </div><?php } ?>
                    </div><?php } ?>
            </div>
        </div>
    </div>
</body>

</html>