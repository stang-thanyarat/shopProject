<?php
include_once('service/auth.php');
include_once ('service/dateFormat.php');
isLaber();
function getFullRole($role)
{
    if ($role == "E") {
        return 'พนักงาน';
    }
    if ($role == "L") {
        return 'เจ้าของร้าน';
    }
    if ($role == "A") {
        return 'ผู้ดูแลระบบ';
    }
}
?>

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
<?php include_once('nav.php');
include_once 'database/Sales.php';
$sales = new Sales();
$rows = $sales->fetchAll();
?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-6">
                        <h1>ประวัติการขาย</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-11 d-flex justify-content-end">
                        <input class="dateS" type="date" name="firstdate" id="firstdate" required>
                         ถึง
                        <input class="dateE" type="date" name="lastdate" required>
                        <button type="submit" class="s"><img src="./src/images/search.png" width="20"></button>
                    </div>
                </div>
                <table class="col-9 q">
                    <tr>
                        <th width=11% >วันที่และเวลาที่ขาย</th>
                        <th width=30% >เลขที่ใบเสร็จ/ใบส่งของ</th>
                        <th width=12.5% >จำนวนรวม</th>
                        <th width=30% >ยอดรวมทั้งหมด</th>
                        <th width=16% >ช่องทางการชำระ</th>
                    </tr>
                    <tr>
                        <tbody id="salesHistory">
                        <?php foreach ($rows as $row) { ?>
                            <tr>
                                <th><?= dateFormat($row['sales_dt']) ?></th>
                                <th><?= $row['import_files'] ?></th>
                                <th><?= $row['sales_amt'] ?></th>
                                <th><?= $row['price_paid'] ?></th>
                                <th><?= $row['payment_sl'] ?></th>
                            </tr>
                        <?php } ?>
                        </tbody>
                </table>
            </div>
        </div>
    </form>
</body>

</html>