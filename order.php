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
    <link rel="stylesheet" href="./src/css/order.css" />
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<?php
include_once('nav.php');
include_once('./database/Order.php');
$order = new Order();
if (isset($_GET['keyword']) && $_GET['keyword'] != "") {
    $rows = $order->search($_GET['keyword']);
} else {
    $rows = $order->fetchAllSell();
}
?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-11">
                        <h1>รายการใบสั่งซื้อ</h1>
                    </div>
                </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-2">
                            <input type="text" id="keyword" value="<?= $_GET['keyword'] ?? "" ?>" name="keyword" class="btnd" placeholder="&nbsp ชื่อผู้ขาย">
                            <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>
                        </div>
                        <div class="col-2">
                            <a class="submit btn" href="addorder.php"><img src="./src/images/plus.png" width="25">
                                เพิ่มใบสั่งซื้อ</a>
                        </div>
                    </div>
                    <table class="col-11 tb">
                        <tr>
                            <th width="20%">วันที่สั่งซื้อ</th>
                            <th width="53%">ชื่อผู้ขาย</th>
                            <th width="17%">สถานะ</th>
                            <th width="10%"></th>
                        </tr>
                        <?php foreach ($rows as $row) { ?>
                            <tr>
                                <th><?= $row['datebill'] ?></th>
                                <th id="text<?= $row['sell_id'] ?>"><?= $row['sell_name'] ?></th>
                                <th>
                                    <?= $row['order_status'] == 1 ? "<a type='button' onclick='wait()'><font color=#A36627>รอของ</font></a>" : "สำเร็จ" ?>
                                </th>
                                <th>
                                    <?php if ($row['order_status'] == 1) { ?>
                                        <button type="button" class="bgs" name="btDelete_click()" onclick="del(<?= $row['order_id'] ?>)"><img src="./src/images/icon-delete.png" width="25"></button>
                                        <a type="button" class="bgs" href="./editconfirm2.php?id=<?= $row['order_id']; ?>"><img src="./src/images/icon-pencil.png" width="25"></a>
                                    <?php } ?>
                                </th>
                </th>
                </tr><?php } ?>
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