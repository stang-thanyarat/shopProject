<?php
include_once('service/auth.php');
isLaber();
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
    <link rel="stylesheet" href="./src/css/orderhistory.css"/>
    <title>Document</title>
</head>
<?php
include_once('nav.php');
include_once('./controller/OrderKeyword.php');
$rows = getdata();
?>

<body>
<form>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <div class="col-6">
                    <h1>ประวัติใบสั่งซื้อ</h1>
                </div>
            </div>
            <div class="row mai">
                <div class="col-3 searchdate">
                    <input type="date" value="<?= $_GET['date'] ?? "" ?>" name="date" id="date" class="date"/>&nbsp&nbsp&nbsp
                </div>
                <div class="col-3 box">
                    <input type="text" class="btnd" value="<?= $_GET['keyword'] ?? "" ?>" name="keyword" id="keyword" placeholder="&nbsp ชื่อผู้ขาย">
                    <button type="submit" class="search"><img src="./src/images/search.png" width="20"></button>
                </input>
                </div>
            </div>
            <div class="ordertable">
            <table class="col-11">
                <tr>
                    <th width="15%">วันที่ชำระ</th>
                    <th width="60%">ชื่อผู้ขาย</th>
                    <th width="15%">สถานะ</th>
                </tr>
                <tbody id="ordertable">
                <?php $i = 1;
                foreach ($rows as $row) {
                    if ($row['order_status'] == 0) {
                        ?>
                        <tr>
                            <th><?= $row['payment_dt'] ?></th>
                            <th id="text<?= $row['sell_id'] ?>"><?= $row['sell_name'] ?></th>
                            <th>สำเร็จ</th>
                        </tr>
                        <?php $i++;
                    }
                } ?>
            </table>
            </div>
        </div>
    </div>
</form>
</body>

<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./src/js/orderhistory.js"></script>

</html>