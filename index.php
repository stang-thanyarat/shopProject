<?php
include_once('service/auth.php');
isLogin();
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
                <div class="col-6">
                    <h1>ร้านวรเชษฐ์เกษตรภัณฑ์</h1>
                </div>
            </div>
            <div class="row mai">
                <div class="col-5">
                    <h3>ยินดีต้อนรับ</h3>
                    <?php if (getRole() == 'E' || getRole() == 'L') { ?>
                    <div class="line"></div>
                    <div class="col-4">
                        <button type="button" class="button" onclick="javascript:window.location='dailybestseller.php';">&nbsp
                            สินค้าขายดี &nbsp
                        </button>
                    </div>
                    <div class="col-4">
                        <button type="button" class="button" onclick="javascript:window.location='expiredproduct.php';">&nbsp
                            สินค้าหมดอายุ &nbsp&nbsp
                        </button>
                    </div>
                    <?php if (getRole() == 'L') { ?>
                        <div class="col-4">
                            <button type="button" class="button" onclick="javascript:window.location='searchstatistics.php'" ;>&nbsp
                                สถิติการค้นหา &nbsp
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="button" onclick="javascript:window.location='productsearchstatistics.php';">&nbsp
                                สถิติการค้นหาโดยประเภทสินค้า &nbsp
                            </button>
                        </div><?php } ?>
                </div>
                <div class="col-6 scoreboard">
                    <div class="textboard">
                        <label class="result">ข้อมูลสรุป&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</label>
                        <input type="date" name="Summary" id="Summary" required>
                        &nbsp;-&nbsp;
                        <input type="date" name="Summary" id="Summary" required>
                        <button type="submit" class="search"><img src="./src/images/search.png" width="13"></button>
                    </div>
                    <div class="board">
                        <label class="col-5">
                            <div class="topicdata">ยอดขาย</div>
                            <div class="topicdata">ต้นทุนขาย + ค่าใช้จ่าย</div>
                            <div class="topicdata">กำไรสุทธิ</div>
                        </label>
                        <label class="col-2">
                            <div class="data">0.00</div>
                            <div class="data">0.00</div>
                            <div class="data">0.00</div>
                        </label>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>