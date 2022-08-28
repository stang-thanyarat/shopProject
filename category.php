<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/category.css" />
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <title>category</title>
</head>
<?php include('nav.php');
include_once "./database/Category.php";
include_once "./database/Product.php";
$category =  new Category();
$rows = $category->fetchAll();
$product = new Product();
?>

<body>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <div class="col">
                    <h1>ประเภทสินค้า</h1>
                </div>
                <div class="col-2 addproducttypebutton">
                    <button class="submit btn" id="addmodel_btn" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl1"><img src="./src/images/plus.png" width="25">&nbsp เพิ่มประเภทสินค้า</button>
                </div>
            </div>
            <table class="col-13 tbproducttype">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ประเภทสินค้า</th>
                        <th>รายการทั้งหมด</th>
                        <th>รายการที่ขาย</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="categorytable">
                    <?php $i = 1;
                    foreach ($rows as $row) { ?>
                        <tr>
                            <th><?= $i ?></th>
                            <th><?= $row['category_name'] ?></th>
                            <th><?= $product->countCategoryId($row['category_id'], false) ?></th>
                            <th><?= $product->countCategoryId($row['category_id'], true) ?></th>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>

        <!--- modal เพิ่มประเภทสินค้า-->
        <form action="controller/Category.php" method="POST" name="form1" id="form1" enctype="multipart/form-data">
            <input type="hidden" value="category" name="table" />
            <input type="hidden" value="insert" name="form_action" />
            <input type="hidden" id="category" name="category" />
            <div class="modal fade bd-example-modal-xl1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl1">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทสินค้า</h5>
                            <button type="button" id="addclose" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="addproducttypename">
                                    <label for="category_name">ชื่อประเภทสินค้า : </label>
                                    <font color="red">&nbsp*</font>
                                    <input type="text" name="category_name" id="category_name" class="inbox" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="addtable" class="btn1 btn-primary1">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- ลบ -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title2" id="exampleModalLabel">ลบประเภทสินค้า</h5>
                        <button type="button" class="btn-close" id="closedelrow" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <h3>ยืนยันที่จะลบ</h3>
                    </div>

                    <div class="modal-footer">
                        <button type="button" onclick="delrow()" class="btn1 btn-primary1">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>

        <!--- modal แก้ไขประเภทสินค้า-->
        <div class="modal fade bd-example-modal-xl3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <form name="editproducttype" id="editproducttype" method="post" action="">
                <div class="modal-dialog modal-xl3">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">แก้ไขประเภทสินค้า</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" id="editclose" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col leftproducttype">
                                    ชื่อประเภทสินค้า :<font color="red">&nbsp*</font>
                                    <select name="category_name" id="editproducttypename" class="inbox" required>
                                        <option value="" selected hidden>เลือกประเภทสินค้า</option>
                                        <option value="ใบตัดหญ้า">ใบตัดหญ้า</option>
                                        <option value="ชุดเสื้อสูบ">ชุดเสื้อสูบ</option>
                                        <option value="หัวเกียร์">หัวเกียร์</option>
                                        <option value="ใบตัดข้าว">ใบตัดข้าว</option>
                                        <option value="น็อตสกรู">น็อตสกรู</option>
                                        <option value="เชือกเอ็น">เชือกเอ็น</option>
                                        <option value="จานตัดหญ้า">จานตัดหญ้า</option>
                                        <option value="คาบู">คาบู</option>
                                        <option value="อะไหล่เครื่องพ่นปุ๋ย">อะไหล่เครื่องพ่นปุ๋ย</option>
                                        <option value="ยางกันสะเทือน">ยางกันสะเทือน</option>
                                        <option value="ปั๊มน้ำ">ปั๊มน้ำ</option>
                                        <option value="เครื่องตัดหญ้า">เครื่องตัดหญ้า</option>
                                        <option value="เมล็ดพันธุ์">เมล็ดพันธุ์</option>
                                        <option value="ยากำจัดวัชพืช">ยากำจัดวัชพืช</option>
                                        <option value="ปุ๋ยเคมี">ปุ๋ยเคมี</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col leftallproducttype">
                                    รายการทั้งหมด :<font color="red">&nbsp*</font>
                                    <input type="text" name="editallproducttype" id="editallproducttype" class="inbox">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col leftsellproducttype">
                                    รายการที่ขาย :<font color="red">&nbsp*</font>
                                    <input type="text" name="editsellproducttype" id="editsellproducttype" class="inbox">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn1 btn-primary1">ตกลง</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
</body>

<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src=" ./src/js/category.js"></script>

</html>