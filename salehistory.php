<?php
include_once('service/auth.php');
include_once('service/dateFormat.php');
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
    <link rel="stylesheet" href="./src/css/salehistory.css"/>
    <title>Document</title>
</head>
<?php include_once('nav.php');
include_once 'database/Sales.php';
$sales = new Sales();
if (isset($_GET['start']) && isset($_GET['end']) && $_GET['start'] != '' && $_GET['end'] != '') {
    $rows = $sales->fetchBetween($_GET['start'], $_GET['end']);
} else if ((!isset($_GET['start']) && !isset($_GET['end'])) ||($_GET['start'] != '' && $_GET['end'] != '')) {
    $rows = $sales->fetchAll();
} else {
    $rows = [];
}
?>

<body>
<div class="row">
    <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
    <div class="col-11">
        <div class="row main">
            <div class="col-6">
                <h1>ประวัติการขาย</h1>
            </div>
        </div>
        <form action="salehistory.php" method="get">
            <div class="row">
                <div class="col-5 datetodate">
                    <input value="<?= isset($_GET['start']) ? $_GET['start']:'' ?>" class="dateS" type="date" name="start" id="firstdate">
                    ถึง&nbsp&nbsp
                    <input value="<?= isset($_GET['end'])? $_GET['end'] :'' ?>" class="star" type="date" name="end">
                    <button type="submit" class="s"><img src="./src/images/search.png" width="20"></button>
                </div>
                    <div class="col-1 d-flex justify-content-end BT">
                    <button type="button" onclick="window.location= 'salehistory.php'" class="btn-c reset">ล้างข้อมูล</button>
                </div>
            </div>
        </form>
        <?php if (count($rows) > 0) { ?>
            <table class="col-11 saletable">
                <tr>
                    <th width=30%>วันที่และเวลาที่ขาย</th>
                    <th width=15%>เลขที่ใบเสร็จ/ใบส่งของ</th>
                    <th width=15%>จำนวนรวม</th>
                    <th width=15%>ยอดรวมทั้งหมด</th>
                    <th width=25%>ช่องทางการชำระ</th>
                </tr>
                <tr>
                    <tbody id="salesHistory">
                    <?php foreach ($rows as $row) { ?>
                        <tr>
                            <th><?= $row['sales_dt'] ?></th>
                            <th><?= $row['sales_list_id'] ?></th>
                            <th><?= $row['all_quantity'] ?></th>
                            <th><?= $row['all_price']?></th>
                            <th><?= $row['payment_sl'] ?></th>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        <?php } else {
            echo "<h3>ไม่พบข้อมูล</h3>";
        } ?>
    </div>
</div>
</form>
</body>

</html>