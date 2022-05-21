<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/salehistory.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <h1>ประวัติการขาย</h1>
                <div class="col-12 d-flex justify-content-end signin">
                    <input type="date" name="firstdate">&nbsp ถึง &nbsp<input type="date" name="lastdate">
                    <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>
                </div>
                <table class="main col-10">
                    <tr>
                        <th>วันที่ขาย</th>
                        <th>เวลา</th>
                        <th>เลขที่ใบเสร็จ/ใบส่งของ</th>
                        <th>จำนวนรวม</th>
                        <th>ยอดรวมทั้งหมด</th>
                        <th>ช่องทางการชำระ</th>
                    </tr>
                    <tr>
                        <th>05/11/2021</th>
                        <th>12:30</th>
                        <th><button type="submit" class="s"><img src="./src/images/pdf.png" width="25"></button></th>
                        <th>2</th>
                        <th>210</th>
                        <th>เงินสด</th>
                    </tr>
                    <tr>
                        <th>05/11/2021</th>
                        <th>12:30</th>
                        <th><button type="submit" class="s"><img src="./src/images/pdf.png" width="25"></button></th>
                        <th>2</th>
                        <th>210</th>
                        <th>โอนเงิน</th>
                    </tr>
                    <tr>
                        <th>26/12/2021</th>
                        <th>14:30</th>
                        <th><button type="submit" class="s"><img src="./src/images/pdf.png" width="25"></button></th>
                        <th>2</th>
                        <th>230</th>
                        <th>เงินสด</th>
                    </tr>
                    <tr>
                        <th>25/06/2022</th>
                        <th>16:30</th>
                        <th><button type="submit" class="s"><img src="./src/images/pdf.png" width="25"></button></th>
                        <th>10</th>
                        <th>3,220</th>
                        <th>สัญญาซื้อขาย</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>