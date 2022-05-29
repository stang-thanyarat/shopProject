<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/productreplacement.css" />
    <title>productreplacement</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-lg-5">
                        <h1>การเปลี่ยนสินค้า</h1>
                    </div>
                </div>
                <div class="row-4 ma">
                                <label for="birthday">วันเกิด :</label>
                                <label for="birthday"></label>
                                <input type="date" name="birthday" id="birthday" required />
                            </div>
                <div class="col-12 d-flex justify-content-end signin">
                    <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>&nbsp &nbsp
                    <div class="col-3">
                        <a class="submit BTNC" href="#"><img class='add' src="./src/images/plus.png" width="50">เพิ่ม</a>
                    </div>
                </div>
                <table class="main col-10">
                    <tr>
                        <th>วันที่เปลี่ยนสินค้า</th>
                        <th>เวลา</th>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>สถานะการขาย</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>05/11/2021</th>
                        <th>12:30</th>
                        <th>เครื่องตัดหญ้า</th>
                        <th>1</th>
                        <th>รอของ</th>
                        <th><img src="./src/images/icon-delete.png" width="25">
                            <img src="./src/images/icon-pencil.png" width="25">
                        </th>
                    </tr>
                    <th>23/01/2021</th>
                        <th>16:40</th>
                        <th>เครื่องปั๊มน้ำ</th>
                        <th>1</th>
                        <th>สำเร็จแล้ว</th>
                </table>
            </div>
        </div>
    </form>
</body>

</html>