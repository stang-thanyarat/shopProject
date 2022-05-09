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
        <div class="row main">
            <div class="col-6">
                <h1>ผู้ขาย</h1>
            </div>
            <div class="col-3">
                <input type="text" class="btn-d" placeholder="&nbsp ชื่อผู้ขาย">
                <button type="submit" class="s">
                        <img src="./src/images/search.png" width="15" alt="">
            </div>
            <div class="col-1">
                <a class="submit btn" href="#"><img class='add' src="./src/images/plus.png" width="25" alt="">&nbsp เพิ่มผู้ขาย</a>
            </div>
        </div>
        <table class="main">
            <tr>
                <th>ชื่อผู้ขาย</th>
                <th>เลขประจำตัวผู้เสียภาษี</th>
                <th>นามบัตร</th>
                <th></th>
            </tr>
        </table>
</body>