<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/orderhistory.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-12">
                        <h1>ประวัติใบสั่งซื้อ</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 c">
                        <input type="date" name="date" id="date" class="date" required />&nbsp&nbsp&nbsp
                    </div>
                    <div class="col-2 b">
                        <input type="text" class="btnd" placeholder="&nbsp ชื่อผู้ขาย" required>
                        <button type="submit" class="s"><img src="./src/images/search.png" width="15"></button>
                    </div>
                </div>
                <table class="col-11 ma">
                    <tr>
                        <th>วันที่สั่งซื้อ</th>
                        <th>ชื่อผู้ขาย</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>14 ธ.ค. 2564</th>
                        <th> อาร์เอส อินเตอร์เทรด (2017) จำกัด</th>
                        <th>รับของแล้ว</th>
                        <th>
                            <img src="./src/images/icon-delete.png" width="25">
                            <img src="./src/images/icon-pencil.png" width="25">
                        </th>
                    </tr>
                    <tr>
                        <th>13 ธ.ค. 2564</th>
                        <th>ซีดไลน์ จำกัด</th>
                        <th>รับของแล้ว</th>
                        <th>
                            <img src="./src/images/icon-delete.png" width="25">
                            <img src="./src/images/icon-pencil.png" width="25">
                        </th>
                    </tr>

                </table>
            </div>
        </div>
    </form>
</body>

</html>