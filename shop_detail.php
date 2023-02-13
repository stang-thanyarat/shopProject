<?php
include_once('service/auth.php');
isAdmin();
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
    <link rel="stylesheet" href="./src/css/vat.css" />
    <title>Document</title>
</head>
<?php
if (!isset($_SESSION)) {
    session_start();
};
if (!isset($_SESSION['address'])) {
    $_SESSION['address'] = 'xxxxxxxxx';
}
if (isset($_POST['address'])) {
    $_SESSION['address'] = $_POST['address'];
}
if (!isset($_SESSION['vat_no'])) {
    $_SESSION['vat_no'] = "xxxxxxxxxxxxx";
}
if (isset($_POST['vat_no'])) {
    $_SESSION['vat_no'] = $_POST['vat_no'];
}
if (!isset($_SESSION['tel'])) {
    $_SESSION['tel'] = "xxxxxxxx";
}
if (isset($_POST['tel'])) {
    $_SESSION['tel'] = $_POST['tel'];
}
include_once('nav.php'); ?>

<body>
<form method="post" action="shop_detail.php">
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <h1>ตั้งค่าข้อมูลร้านค้า</h1>
                <table class="main col-10">
                    <tr>
                        <th>ที่อยู่ &nbsp<input type="text" name="address" id="address" value="<?= $_SESSION['address']; ?>" required> &nbsp </th>
                    </tr>
                    <tr>
                        <th>เลขประจำตัวผู้เสียภาษี  &nbsp<input type="text" name="vat_no" id="vat_no" value="<?= $_SESSION['vat_no']; ?>" required> &nbsp </th>
                    </tr>
                    <tr>
                        <th>เบอร์โทรติดต่อ &nbsp<input type="text" name="tel" id="tel" value="<?= $_SESSION['tel']; ?>" required> &nbsp </th>
                    </tr>
                </table>
                <div class="row btn-g">
                    <div class="col-2">
                        <!--<button type="reset" class="btn-c reset">ยกเลิก</button>-->
                    </div>
                    <div class="col-2">
                        <input type="submit" class="btn-c submit" value="บันทึก" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>

</html>