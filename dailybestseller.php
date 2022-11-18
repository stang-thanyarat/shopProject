<?php
include_once('service/auth.php');
isNotAdmin();
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
    <link rel="stylesheet" href="./src/css/dailybestseller.css" />
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
                    <h1>สินค้าขายดีประจำวัน</h1>
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
                <div class="col-3">
                    <input type="date" name="date" />
                </div>
                <div class="col-4 w">
                    <form>
                        <input type="text" name="keyword" id="keyword" class="btn-d" placeholder="&nbsp ชื่อสินค้า">
                        <button type="submit" class="s">
                            <img src="./src/images/search.png" width="15">
                        </button>
                    </form>
                </div>
            </div>
            <table class="ma">
                <thead>
                    <tr>
                        <th width="10%">ลำดับ</th>
                        <th width="10%">รูปภาพ</th>
                        <th width="30%">ชื่อสินค้า</th>
                        <th width="10%">ราคา</th>
                        <th width="10%">จำนวน</th>
                    </tr>
                <tbody id="dailybestsellerTable">  </tbody>
                   <!-- <tr>
                        <th>1</th>
                        <th><img src="./src/images/roselle.png" width="100"></th>
                        <th>กระเจี๊ยบ-อพอลโล</th>
                        <th>xx</th>
                        <th>xx</th>
                        <th>
                            <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25"></button>
                        </th>
                    </tr> -->
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