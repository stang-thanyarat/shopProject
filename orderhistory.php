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
    <link rel="stylesheet" href="./src/css/orderhistory.css" />
    <title>Document</title>
</head>
<?php
include_once('./database/Order.php');
include_once('./database/Sell.php');
$order = new Order();
$sell = new Sell();
include_once('nav.php');
if (isset($_GET['keyword'])) {
    $rows = $order->search($_GET['keyword']);
} else {
    $rows = $order->fetchAll();
}
$rows = $order->fetchAll();
?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-12">
                        <h1>ประวัติใบสั่งซื้อ</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 c">
                        <input type="date" name="date" id="date" class="date" required />&nbsp&nbsp&nbsp
                    </div>
                    <div class="col-2 b">
                        <input type="text" class="btnd" placeholder="&nbsp ชื่อผู้ขาย" required>
                        <button type="submit" class="s"><img src="./src/images/search.png" width="15"></button>
                    </div>
                </div>
                <table class="col-11 ma">
                    <tr>
                        <th width="15%">วันที่สั่งซื้อ</th>
                        <th width="60%">ชื่อผู้ขาย</th>
                        <th width="15%">สถานะ</th>
                        <th width="20%"></th>
                    </tr>
                    <tbody id="ordertable">
                    <?php $i = 1;
                    foreach ($rows as $row) { ?>
                        <tr>
                            <th><?= $row['datebill'] ?></th>
                            <th id="text<?= $row['sell_id']?>"><?= $row['sell_name']?></th>
                            <th><?php if( $row['order_status'] == 1 ) { echo "<a type='button' onclick='wait()'><font color=#A36627>รอของ</font></a>";} else{ echo "สำเร็จ";}?></th>
                            <th>
                                <button type="button" class="bgs" onclick="del(<?=$row['order_id']?>)"><img src="./src/images/icon-delete.png" width="25"></button>
                                <a type="button" class="bgs" onclick="edit(<?=$row['order_id']?>)"><img src="./src/images/icon-pencil.png" width="25"></a>
                            </th>
                        </tr>
                    <?php $i++;
                    } ?>
                </table>
            </div>
        </div>
    </form>
</body>

<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./src/js/orderhistory.js"></script>

</html>