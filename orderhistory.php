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
                    <div class="col-lg-5">
                        <h1>ประวัติใบสั่งซื้อ</h1>
                    </div>
                    <div class="row m">
                        <div class="col-12 d-flex justify-content-end signin">
                            <label for="date"></label>
                            <input type="date" name="date" id="date" required />&nbsp
                            <form>
                                <input type="text" class="btnd" placeholder="&nbsp ชื่อผู้ขาย" required>
                                <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>
                            </form>
                        </div>

                    </div>
                    <table class="main col-10">
                        <tr>
                            <th  width="15%">วันที่สั่งซื้อ</th>
                            <th  width="60%">ชื่อผู้ขาย</th>
                            <th  width="15%"></th>
                            <th  width="10%"></th>
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
                    <p></p>
                </div>
            </div>
    </form>
</body>

</html>