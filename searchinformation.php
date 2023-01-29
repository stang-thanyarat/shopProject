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
    <link rel="stylesheet" href="./src/css/searchinformation.css" />
    <title>Document</title>
</head>
<?php
include_once('nav.php');
include_once('./database/Category.php');
$category = New Category();
$rows = $category->fetchAll();
?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>ค้นหาข้อมูลการซื้อสินค้า </h1>
                    <div>
                        เลขที่ใบเสร็จ :&nbsp &nbsp
                        <input type="text" class="btnd" id="keyword" name="keyword" placeholder="&nbsp ค้นหาเลขที่ใบเสร็จ" >
                        <button type="button" id="BT" name="BT" class="s"><img src="./src/images/search.png" width="13"></button>
                    </div>
                    <table class="main col-10">
                        <thead>
                        <tr class="h">
                            <th>ลำดับ</th>
                            <th>รูปภาพ</th>
                            <th>สินค้า</th>
                            <th>ราคาต่อชิ้น</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                            <th>สถานะการเปลี่ยนสินค้า</th>
                        </tr>
                        </thead>
                        <tbody id="searchTable">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="./src/js/searchinformation.js"></script>
</html>