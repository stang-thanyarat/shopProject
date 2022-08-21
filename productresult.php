<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/css/productresult.css" />

    <title>productresult</title>
</head>
<?php include('nav.php'); ?>
<!--
    เปลี่ยนชื่อ และ id แล้ว แต่จะใส่แทรกเพื่อเก็บข้อมูลหรือแสดงผลต้องรอ
-->
<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-12">
                        <h1>รายการสินค้าทั้งหมด</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 z">
                        <select name="category_name" id="category_name" class="g">
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
                    <div class="col-2 y">
                        <input name="product_name" type="text" id="product_name" class="btnd" placeholder="&nbsp ชื่อสินค้า">
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
                            <tr>
                                <th name="category_name" id="category_name">เมล็ดพันธุ์</th>
                                <th name="product_name" id="product_name">กระเจี๊ยบ-อพอลโล</th>
                                <th name="brand" id="brand">Seedline</th>
                                <th name="model" id="model">-</th>
                                <th name="product_dlt_unit" id="product_dlt_unit">1 ซอง</th>
                                <th name="product_rm_unit" id="product_rm_unit">25 ซอง</th>
                                <th name="price" id="price">20</th>
                                <th name="product_img1" id="product_img1"><img src="./src/images/images1.png" width="25"></th>
                                <th name="sales_status" id="sales_status">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </th>
                                <th>
                                    <a type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1"><img src="./src/images/icon-delete.png" width="25"></a>
                                    <a type="button" href="./editproduct.php"><img src="./src/images/icon-pencil.png" width="25"></a>
                                </th>
                            </tr>
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
<script src="./src/js/productresult.js"></script>

</html>