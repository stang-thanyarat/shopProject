<?php
include_once('service/auth.php');
isLaber();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/order.css"/>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
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
?>

<body>
<form>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <div class="col-12">
                    <h1>รายการใบสั่งซื้อ</h1>
                </div>
                <div class="row">
                    <div class="col-2 z">
                        <input type="text" id="keyword" name="keyword" class="btnd" placeholder="&nbsp ชื่อผู้ขาย">
                        <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>
                    </div>
                    <div class="col-2 y">
                        <a class="submit btn" href="addorder2.php"><img src="./src/images/plus.png" width="25">
                            เพิ่มใบสั่งซื้อ</a>
                    </div>
                </div>
                <table class="col-11 tb">
                    <tr>
                        <th width="15%">วันที่สั่งซื้อ</th>
                        <th width="60%">ชื่อผู้ขาย</th>
                        <th width="15%">สถานะ</th>
                        <th width="20%"></th>
                    </tr>
                    <tbody id="ordertable">
                    <?php
                    foreach ($rows

                    as $row) { ?>
                    <tr>
                        <th><?= $row['datebill'] ?></th>
                        <th id="text<?= $row['sell_id'] ?>"><?= $row['sell_name'] ?></th>
                        <th>
                            <?php if ($row['order_status'] == 1) {
                                echo "<a type='button' onclick='wait()'><font color=#A36627>รอของ</font></a>";
                            } else {
                                echo "สำเร็จ";
                            } ?>
                        </th>
                        <th>
                            <button type="button" class="bgs" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    onclick="del(<?= $row['order_id'] ?>)"><img
                                        src="./src/images/icon-delete.png" width="25"></button>
                            <a type="button" class="bgs"
                               href="./editconfirm2.php?id=<?= $row['order_id']; ?>"><img
                                        src="./src/images/icon-pencil.png" width="25"></a>
            </div>
            </th>

            </tr>
            <?php
            } ?>
            </table>
            <p></p>
        </div>
    </div>
    <!-- ลบ -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ลบรายการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body1">
                    <h3>ยืนยันที่จะลบ</h3>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary1">ตกลง</button>
                </div>
            </div>
        </div>
    </div>
</form>
</body>

<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./src/js/order.js"></script>

</html>