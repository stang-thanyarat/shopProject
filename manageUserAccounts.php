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
    <form>
        <div class="row main">
            <div class="col-lg-6">
                <h1>จัดการดูแลบัญชีผู้ใช้งาน</h1>
            </div>
            <div class="col-lg-6">
                <label for="position">ตำแหน่ง :</label>
                <select name="position" id="position">
                    <option value="volvo" selected>ตำแหน่ง</option>
                    <option value="saab">เจ้าของร้าน</option>
                    <option value="opel">ผู้ดูแลระบบ</option>
                </select>
            </div>
            <div>
                
            </div>
        </div>
        <table class="main ">
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>ตำแหน่ง</th>
                <th>สถานะการใช้งาน</th>
                <th></th>
            </tr>
        </table>
</body>