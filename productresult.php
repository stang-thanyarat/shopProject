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
    <script src=" ./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="./src/css/productresult.css" />

    <title>productresult</title>
</head>

<?php include_once('nav.php');
include_once "./database/Category.php";
$category =  new Category();
$rows = $category->fetchAll();

?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-12">
                        <h1>รายการสินค้าทั้งหมด</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 z">
                        <select name="category_id" id="category_id" class="g" required>
                            <option value="all">สินค้าทั้งหมด</option>
                            <?php foreach ($rows as $row) { ?>
                                <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-2 y">
                        <input name="keyword" type="text" id="keyword" class="btnd" placeholder="&nbsp ชื่อสินค้า">
                        <button type="submit" class="s"><img src="./src/images/search.png" width="15"></button>
                    </div>
                    <div class="col-1 x">
                        <a type="button" href="./addproduct.php" class="submit btn"><img src="./src/images/plus.png" width="25">&nbsp เพิ่มสินค้า</a>
                    </div>
                    <table class="col-11 q">
                        <thead>
                            <tr>
                                <th>ประเภทสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>ยี่ห้อ</th>
                                <th>รุ่น</th>
                                <th>จำนวน</th>
                                <th>คงเหลือ</th>
                                <th>ราคา</th>
                                <th>รูปภาพ</th>
                                <th>สถานะการขาย</th>
                                <th></th>
                            </tr>
                        <tbody id="productResultTable">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ลบ -->
            <div class="modal fade bd-example-modal-sm1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title2" id="exampleModalLabel">ลบรายการสินค้า</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3>ยืนยันที่จะลบ</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn1 btn-primary1">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</body>
<script src="./node_modules/sweetalert2/dist/sweetalert2.js"></script>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./src/js/productresult.js"></script>

</html>