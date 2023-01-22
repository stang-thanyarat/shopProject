<?php
include_once('service/auth.php');
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
    <link rel="stylesheet" href="./src/css/costprice.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>costprice</title>


</head>
<?php
include_once('nav.php');
include_once "./database/CostPrice.php";
$costprice = new CostPrice();
$p = $costprice->fetchById($_GET['id']);
?>


<body>
<div class="row">
    <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
    <div class="col-11">
        <div class="row main">
            <h1>ราคาทุน</h1>
        </div>
        <div class="row main q">
            <div class="col-12 ">
                <div>
                    <h4><?= $p['product_name'];?><h4>
                </div>
                <p>
                <div>
                    <h4><?= $p['category_name'];?><h4>
                </div>
                <p>
                <div>
                    <h4><?= $p['brand'];?><h4>
                </div>
                <p>
                    <div class="title page">
                        <h4 style="display: inline;">วันที่ซื้อ :</h4>
                        &nbsp &nbsp
                        <input value="<?= isset($_GET['start']) ? $_GET['start']:'' ?>" type="date" class="l" name="start" id="start" style=" background-color: #F8E4C8;" required>
                        &nbsp ถึง &nbsp
                        <input value="<?= isset($_GET['end'])? $_GET['end'] :'' ?>" type="date" class="l" name="end" name="end" style=" background-color: #F8E4C8;" required>
                        &nbsp &nbsp &nbsp
                        <a type="submit" class=""><img src="./src/images/search.png" width="15"></a>
                    </div>
            </div>
            <!-- กราฟ-->
            <p>
            <p>
            <h6>จำนวน</h6>
            <h3 class="tt">ยอดขายสินค้า</h3>
            <div id="ChartTable"></div>
        </div>
    </div>
</div>
</body>
<script src="./src/js/costprice.js"></script>

</html>