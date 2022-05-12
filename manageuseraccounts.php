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
                    <h1>จัดการดูแลบัญชีผู้ใช้งาน</h1>
                </div>
            </div>
            <div class="row min-vw-100 ma">
                <div class="col-2">
                    <label for="position">ตำแหน่ง :</label>
                    <select name="position" id="position">
                        <option value="position" selected>ตำแหน่ง</option>
                        <option value="shopkeeper">เจ้าของร้าน</option>
                        <option value="admin">ผู้ดูแลระบบ</option>
                    </select>
                </div>
                <div class="col-3">
                    <form>
                        <input type="text" class="btn-d" placeholder="&nbsp ชื่อ-นามสกุล">
                        <button type="submit" class="s">
                            <img src="./src/images/search.png" width="15" alt="">
                        </button>
                    </form>
                </div>
                <div class="col-3">
                    <a class="submit btn-c" href="#"><img class='add' src="./src/images/plus.png" width="25"> เพิ่มบัญชีผู้ใช้งาน</a>
                </div>
            </div>
            <table class="mai">
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
                        <img src="./src/images/icon-delete.png" width="25">
                        <img src="./src/images/icon-pencil.png" width="25">
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
                        <img src="./src/images/icon-delete.png" width="25">
                        <img src="./src/images/icon-pencil.png" width="25">
                    </th>
                </tr>
            </table>
        </div>
    </div>
</body>