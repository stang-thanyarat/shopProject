<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/productresult.css" />
    <title>productresult</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-lg-5">
                        <h1>รายการสินค้าทั้งหมด</h1>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end signin">
                    <input type="text" class="btnd" placeholder="&nbsp ชื่อสินค้า">
                    <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>&nbsp &nbsp
                    <div class="col-3">
                        <a class="submit BTNC" href="#"><img class='add' src="./src/images/plus.png" width="50">เพิ่มสินค้า</a>
                    </div>
                </div>
                <table class="main col-10">
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
                        <th>เมล็ดพันธุ์</th>
                        <th>กระเจี๊ยบ-อพอลโล</th>
                        <th>Seedline</th>
                        <th>-</th>
                        <th>1 ซอง</th>
                        <th>25 ซอง</th>
                        <th>20</th>
                        <th><img src="./src/images/images1.png" width="25"></th>
                        <th>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </th>
                        <th><img src="./src/images/icon-delete.png" width="25">
                            <img src="./src/images/icon-pencil.png" width="25">
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>

</html>