<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/category.css" />
    <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css" />
    <title>category</title>
</head>
<?php include('nav.php');
include_once "./database/Category.php";
include_once "./database/Product.php";
$category =  new Category();
$rows = $category->fetchAll();
?>

<body>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <div class="col">
                    <h1>ประเภทสินค้า</h1>
                </div>
                <div class="col-2 addproducttypebutton">
                    <button class="submit btn" onclick="insert()"><img src="./src/images/plus.png" width="25">&nbsp เพิ่มประเภทสินค้า</button>
                </div>
            </div>
            <table class="col-13 tbproducttype">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ประเภทสินค้า</th>
                        <th>รายการทั้งหมด</th>
                        <th>รายการที่ขาย</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="categorytable">
                    <?php $i = 1;
                    foreach ($rows as $row) { ?>
                        <tr>
                            <th width=10%><?= $i ?></th>
                            <th width=35% id="text<?=$row['category_id']?>"><?= $row['category_name'] ?></th>
                            <th width=20%><?= $category->getCount($row['category_id'], false) ?></th>
                            <th width=20%><?= $category->getCount($row['category_id'], true) ?></th>
                            <th>
                                <button type="button" class="bgs" onclick="del(<?=$row['category_id']?>)"><img src="./src/images/icon-delete.png" width="25"></button>
                                <button type="button" class="bgs" onclick="edit(<?=$row['category_id']?>)"><img src="./src/images/icon-pencil.png" width="25"></button>
                            </th>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>





</body>

<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./src/js/category.js"></script>

</html>