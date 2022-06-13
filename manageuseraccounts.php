<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/manageuseraccounts.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-6">
                        <h1>จัดการดูแลบัญชีผู้ใช้งาน</h1>
                    </div>
                </div>
                <div class="row c">
                    <div class="col-3">
                        <label for="position">ตำแหน่ง :</label>
                        <select name="position" id="position">
                            <option value="position" selected>ตำแหน่ง</option>
                            <option value="shopkeeper">เจ้าของร้าน</option>
                            <option value="admin">ผู้ดูแลระบบ</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="text" class="btn-d" placeholder="&nbsp ชื่อผู้ขาย">
                        <button type="submit" class="s">
                            <img src="./src/images/search.png" width="15">
                    </div>
                    <div class="col-3">
                        <a class="submit btn" href="adduseraccount.php"><img class='add' src="./src/images/plus.png" width="25">&nbsp เพิ่มบัญชีผู้ใช้งาน</a>
                    </div>
                </div>
                <table class="ma">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ตำแหน่ง</th>
                        <th>สถานะการใช้งาน</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>สมหญิง</th>
                        <th>ถึงที่หมาย</th>
                        <th>เจ้าของร้าน</th>
                        <th><label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </th>
                        <th>
                            <button type="submit" class="bgs"><img src="./src/images/icon-delete.png" width="25"></button>
                            <button type="submit" class="bgs"><img src="./src/images/icon-pencil.png" width="25"></button>
                        </th>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th>สมชาย</th>
                        <th>ถึงที่หมาย</th>
                        <th>เจ้าของร้าน</th>
                        <th>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </th>
                        <th>
                            <button type="submit" class="bgs"><img src="./src/images/icon-delete.png" width="25"></button>
                            <button type="submit" class="bgs"><img src="./src/images/icon-pencil.png" width="25"></button>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>