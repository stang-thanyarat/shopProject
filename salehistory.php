<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/salehistory.css" />
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
                        <h1>ประวัติการขาย</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 datetodate">
                        <input type="date" name="firstdate" id="firstdate" required>&nbsp ถึง &nbsp<input type="date" name="lastdate" required>
                        <button type="submit" class="s"><img src="./src/images/search.png" width="20"></button>
                    </div>
                </div>
                <table class="col-11 q">
                    <tr>
                        <th>วันที่ขาย</th>
                        <th>เวลา</th>
                        <th>เลขที่ใบเสร็จ/ใบส่งของ</th>
                        <th>จำนวนรวม</th>
                        <th>ยอดรวมทั้งหมด</th>
                        <th>ช่องทางการชำระ</th>
                    </tr>
                    <tr>
                        <th>05 พ.ย. 2564</th>
                        <th>12:30</th>
                        <th><button type="submit" class="s"><img src="./src/images/pdf.png" width="25"></button></th>
                        <th>2</th>
                        <th>210.00</th>
                        <th>เงินสด</th>
                    </tr>
                    <tr>
                        <th>05 พ.ย. 2564</th>
                        <th>12:30</th>
                        <th><button type="submit" class="s"><img src="./src/images/pdf.png" width="25"></button></th>
                        <th>2</th>
                        <th>210.00</th>
                        <th>โอนเงิน</th>
                    </tr>
                    <tr>
                        <th>26 ธ.ค. 2564</th>
                        <th>14:30</th>
                        <th><button type="submit" class="s"><img src="./src/images/pdf.png" width="25"></button></th>
                        <th>2</th>
                        <th>230.00</th>
                        <th>เงินสด</th>
                    </tr>
                    <tr>
                        <th>25 มิ.ย. 2565</th>
                        <th>16:30</th>
                        <th><button type="submit" class="s"><img src="./src/images/pdf.png" width="25"></button></th>
                        <th>10</th>
                        <th>3,220.00</th>
                        <th>สัญญาซื้อขาย</th>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>

</html>