<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/expiredproduct.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <div class="col">
                    <h1>สินค้าหมดอายุ</h1>
                </div>
            </div>
            <div class="row ma">
                <div class="col-3">
                    <label for="category"></label>
                    <select name="category" id="category">
                        <option value="category" selected>เลือกประเภทสินค้า</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="expires within">หมดอายุภายใน :</label>
                    <label for="expires"></label>
                    <input type="date" name="expires" />
                </div>
                <div class="col-4">
                    <form>
                        <input type="text" class="btn-d" placeholder="&nbsp ชื่อสินค้า">
                        <button type="submit" class="s">
                            <img src="./src/images/search.png" width="15">
                        </button>
                    </form>
                </div>
            </div>
            <table class="mai">
                <tr>
                    <th>รูปภาพ</th>
                    <th>ชื่อสินค้า</th>
                    <th>วันที่ได้รับของ</th>
                    <th>วันที่หมดอายุ</th>
                    <th>ราคา</th>
                    <th>คงคลัง</th>
                    <th>จำนวน</th>
                    <th></th>
                </tr>
                <tr>
                    <th><img src="./src/images/3.png" width="100"></th>
                    <th>กวางตุ้งใบ-อัมรินทร์</th>
                    <th>20/01/2016</th>
                    <th>20/01/2016</th>
                    <th>20</th>
                    <th>25 ซอง</th>
                    <th>10 ซอง</th>
                    <th>
                        <button type="submit" class="bgs"><img src="./src/images/icon-delete.png" width="25"></button>
                    </th>
                </tr>
                <tr>
                    <th><img src="./src/images/4.png" width="100"></th>
                    <th>กวางตุ้งดอก-ยอดสุวรรณ</th>
                    <th>20/01/2016</th>
                    <th>20/01/2020</th>
                    <th>20</th>
                    <th>25 ซอง</th>
                    <th>5 ซอง</th>
                    <th>
                        <button type="submit" class="bgs"><img src="./src/images/icon-delete.png" width="25"></button>
                    </th>
                </tr>
            </table>
        </div>
    </div>
</body>