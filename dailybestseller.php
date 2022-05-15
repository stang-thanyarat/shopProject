<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/manageUserAccounts.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <div class="col">
                    <h1>สินค้าขายดีประจำวัน</h1>
                </div>
            </div>
            <div class="row ma">
                <div class="col-2">
                    <label for="category"></label>
                    <select name="category" id="category">
                        <option value="category" selected>เลือกประเภทสินค้า</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="date"></label>
                    <input type="date" name="date" />
                </div>
                <div class="col-2">
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
                    <th>ลำดับ</th>
                    <th>รูปภาพ</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th></th>
                </tr>
                <tr>
                    <th>1</th>
                    <th><img src="./src/images/roselle.png" width="100"></th>
                    <th>กระเจี๊ยบ-อพอลโล</th>
                    <th>xx</th>
                    <th>xx</th>
                    <th>
                        <img src="./src/images/icon-delete.png" width="25">
                        <img src="./src/images/icon-pencil.png" width="25">
                    </th>
                </tr>
                <tr>
                    <th>2</th>
                    <th><img src="./src/images/sweetbasil.png" width="100"></th>
                    <th>กะเพรา-SL</th>
                    <th>xx</th>
                    <th>xx</th>
                    <th>
                        <img src="./src/images/icon-delete.png" width="25">
                        <img src="./src/images/icon-pencil.png" width="25">
                    </th>
                </tr>
            </table>
        </div>
    </div>
</body>