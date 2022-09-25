<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/productexchangehistory.css" />
    <title>productexchangehistory</title>
</head>
<?php include('nav.php');
include_once "./database/Product.php";
include_once "./database/ProductExchange.php";
?>

<body>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <div class="col-3">
                    <h1>การเปลี่ยนสินค้า</h1>
                </div>
                <div class="col-4 datetodate">
                    <input type="date" name="since" id="since"> &nbsp&nbspถึง&nbsp&nbsp
                    <input type="date" name="until" id="until">
                    <button type="button" class="s"><img src="./src/images/search.png" width="17.5"></button>
                </div>
                <div class="col-3 addpdr d-flex justify-content-end signin">
                    <a type="button" href="./addproductexchange.php" class="submit btn"><img class='plus' src="./src/images/plus.png" width="30">&nbsp เพิ่ม </a>
                </div>
                <table class="col-11 pdrtb">
                    <thead>
                    <tr>
                        <th>วันที่เปลี่ยนสินค้า</th>
                        <th>เวลา</th>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>สถานะการขาย</th>
                        <th></th>
                    </tr>
                    <tbody id="productExchangeTable">
                    </tbody>
                </table>
            </div>
        </div>
        </div>

        <!-- ลบ -->
        <div class="modal fade bd-example-modal-sm1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title2" id="exampleModalLabel">ลบประเภทสินค้า</h5>
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

</body>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/jquery-ui/dist/jquery-ui.min.js"></script>
<script src="./src/js/productexchangehistory.js"></script>
</html>