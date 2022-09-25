<?php
include_once('service/auth.php');
isNotAdmin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/notification_amt.css" />
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<?php include_once('nav.php');
include_once "./database/Category.php";
$category =  new Category();
$rows = $category->fetchAll();
?>

<body>

<div class="row">
    <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
    <div class="col-11">
        <div class="row main">
            <div class="col-4">
                <h1>สินค้าใกล้หมด</h1>
            </div>
        </div>
        <div class="row mai">
            <div class="col-3">
                <label for="category"></label>
                <select name="category_id" id="category_id" style="background-color: #D4DDC6;" required>
                    <option value="all">สินค้าทั้งหมด</option>
                    <?php foreach ($rows as $row) { ?>
                        <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-4 w">
                <form>
                    <input type="text" class="btn-d" placeholder="&nbsp ชื่อสินค้า">
                    <button type="submit" class="s">
                        <img src="./src/images/search.png" width="15">
                    </button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col maa">ใบตัดหญ้า</div>
            <div class="col maaa">จำนวน 1 รายการ</div>
        </div>
        <table class="ma">
            <thead>
            <tr>
                <th>รูปภาพ</th>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>สถานะการขาย</th>
            </tr>
            <tbody id="notification_amtTable">  </tbody>

        </table>

        <!-- ลบ -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title2" id="exampleModalLabel">ลบรายการ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3>ยืนยันที่จะลบ</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary2">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>

</body>
<script src="./src/js/dailybestseller.js"></script>

</html>