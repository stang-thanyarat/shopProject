<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/sall.css" />
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
                        <h1>พนักงาน</h1>
                    </div>
                    <div class="col-3">
                        <input type="text" class="btn-d" placeholder="&nbsp ชื่อ-นามสกุล">
                        <button type="submit" class="s">
                            <img src="./src/images/search.png" width="15">
                    </div>
                    <div class="col-1">
                        <a class="submit btn" href="#"><img class='add' src="./src/images/plus.png" width="25" alt="">&nbsp เพิ่มพนักงาน</a>
                    </div>
                </div>
                <table class="main">
                    <tr>
                        <th>ชื่อ-นามสกุล</th>
                        <th>เลขบัตรประชาชน</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>สถานะการใช้งาน</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>นางสายสมร ใจดี</th>
                        <th>1235698745656</th>
                        <th>061-4398626</th>
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
                    <tr>
                        <th>นายสมศักดิ์ ดีใจ</th>
                        <th>1235684849752</th>
                        <th>061-9785136</th>
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