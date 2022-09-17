<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/order.css" />
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<?php
include_once('./database/Order.php');
$order = new Order();
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
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-12">
                        <h1>ใบสั่งซื้อ</h1>
                    </div>
                    <div class="row">
                        <div class="col-2 z">
                            <input type="text" class="btnd" placeholder="&nbsp ชื่อผู้ขาย">
                            <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>
                        </div>
                        <div class="col-2 y">
                            <a class="submit btn" href="addorder2.php"><img src="./src/images/plus.png" width="25"> เพิ่มใบสั่งซื้อ</a>
                        </div>
                    </div>
                    <table class="col-11 tb">
                        <tr>
                            <th width="15%">วันที่สั่งซื้อ</th>
                            <th width="60%">ชื่อผู้ขาย</th>
                            <th width="15%"></th>
                            <th width="10%"></th>
                        </tr>
                        <tr>
                            <th>14 ธ.ค. 2564</th>
                            <th> อาร์เอส อินเตอร์เทรด (2017) จำกัด</th>
                            <th>
                                <div class="r">
                                    <a class="BTNP" href="confirm2.php"><img class='confirm'>รับของ</a>
                                </div>
                            </th>
                            <th>
                                <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25"></button>
                                <button type="button" class="btn1" onclick="javascript:window.location='editconfirm.php';"><img src="./src/images/icon-pencil.png" width="25"></button>
                            </th>
                        </tr>


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

</html>