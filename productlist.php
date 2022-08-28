<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css"></link>
    <link rel="stylesheet" href="./src/css/productlist.css" />

    <title>productlist</title>

</head>
<?php include('nav.php');
include_once "./database/Category.php";
$category =  new Category();
$rows = $category->fetchAll();
?>

<body>

        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-6 topic_productlist">
                        <h1>รายการสินค้า</h1>
                    </div>
                        <div class="col-3 u">
                            <input name="keyword" id="keyword" type="text" class="btnd" placeholder="&nbsp ชื่อสินค้า">
                            <button  class="l"><img src="./src/images/search.png" width="20"></button>
                        </div>
                    <div class="col-2 m">
                        <select name="category_id" id="category_id" class="n" required>
                            <option value="all">ทั้งหมด</option>
                            <?php foreach ($rows as $row) { ?>
                                <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-2 d-flex justify-content-end a">
                        <a href="./addtocart.php" type="button"><img src="./src/images/cart.png" width="52.5"></a>
                    </div>
                </div>
                <table class="col-11 q">
                    <thead>
                        <tr class="topic_category">
                            <th colspan="3">
                                <h5 class="z">ใบตัดหญ้า</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    <!---เพิ่มไปยังรถเข็น-->
    <form action="addtocart.php" method="get">
        <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มไปยังรถเข็น</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="editclose" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="exp">
                            วันหมดอายุ :&nbsp<font color="red">&nbsp*</font>
                            <input type="date" name="list" id="list" class="inbox" />
                        </div>
                        <div class="amount">
                            จำนวน : <font color="red">&nbsp*</font>
                            <input type="text" name="amount" id="amount" class="inbox" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary1">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--- modal แก้ไขวันหมดอายุ-->
    <div class="modal fade bd-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form name="editstatus" id="editstatus" method="post" action="">
            <div class="modal-dialog modal-sm2">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขวันหมดอายุ และจำนวน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="editclose" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <center>

                            วันหมดอายุ: &nbsp;<input type="date" name="mfg" id="mfg" required />
                            &nbspถึง&nbsp<input type="date" name="exp" id="exp" required /><br>
                            <p></p>

                        </center>

                        <center>จำนวน: &nbsp;<input type="text" name="amount" id="amount" required />
                            <p></p>
                        </center>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary1">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


</body>

<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src=" ./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./src/js/productlist.js"></script>

</html>