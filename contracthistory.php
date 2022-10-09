<?php
include_once('service/auth.php');
include_once ('service/dateFormat.php');
isLaber();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/contracthistory.css" />
    <title>สัญญาซื้อขาย</title>
</head>

<?php include_once('nav.php');
include_once "./database/Contract.php";
$contract =  new Contract();
if (isset($_GET['keyword'])) {
    $rows = $contract->searchByName($_GET['keyword']);
} else {
    $rows = $contract->fetchAll();
}
?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-11">
                        <h1>สัญญาซื้อขาย</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 y">
                        <input name="keyword" type="text" id="keyword" class="btnd" placeholder="&nbsp ชื่อ-นามสกุล">
                        <button type="submit" class="s"><img src="./src/images/search.png" width="15"></button>
                    </div>
                    <div class="col-2 x">
                        <a type="button" href="./productlist.php" class="submit btn s1"><img src="./src/images/arrow.png" width="25">กลับไปยังหน้าขาย</a>
                    </div>
                    <div class="col-1 v">
                        <a type="button" href="./contract.php" class="submit btn s2"><img src="./src/images/plus.png" width="25">&nbsp;เพิ่ม</a>
                    </div>
                    <table class="col-11 q">
                        <tr>
                            <th width=10%>วันที่ทำสัญญา</th>
                            <th width=10%>เลขที่สัญญา</th>
                            <th width=20%>ชื่อ-นามสกุล</th>
                            <th width=10%>มูลค่าสินค้าทั้งหมด</th>
                            <th width=10%>ยอดคงเหลือ</th>
                            <th width=10%>ใบส่งของ</th>
                            <th width=10%>ไฟล์สัญญา</th>
                            <th width=10%>พิมพ์</th>
                            <th width=10%></th>
                        </tr>
                        <tbody id="contracttable">
                            <?php
                            foreach ($rows as $row) { ?>
                                <tr>
                                    <th width=10%><?= dateFormat($row['date_contract']) ?></th>
                                    <th width=10%><?= $row['contract_code'] ?></th>
                                    <th width=20%>
                                        <div class="r">
                                            <a class="submit BTNP" href="repay.php"><img class='confirm'>
                                                <?= $row['customer_prefix'] ?> <?= $row['customer_firstname'] ?> <?= $row['customer_lastname'] ?>
                                            </a>
                                        </div>
                                    </th>
                                    <th width=10%></th>
                                    <th width=10%></th>
                                    <th width=5%><img src="./src/images/pdf.png" width="25"></th>
                                    <th width=5%><input type="file" accept="image/*" name="contractfile" width="10px"></th>
                                    <th width=10%><img src="./src/images/print.png" width="25"></th>
                                    <th>
                                        <button type="button" class="bgs" onclick="javascript:window.location='solvecontract.php';" onclick="edit(<?= $row['contract_code'] ?>)"><img src="./src/images/icon-pencil.png" width="25"></button>
                                    </th>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</body>

</html>