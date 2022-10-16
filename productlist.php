<?php
include_once('service/auth.php');
isNotAdmin();
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
    <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css"></link>
    <link rel="stylesheet" href="./src/css/productlist.css" />

    <title>productlist</title>

</head>
<?php include_once('nav.php');
include_once "./database/Category.php";
$category =  new Category();
$product =  new Product();
$rows = $category->fetchAll();
$p = $product->fetchAll();
?>

<body>

        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-6 topic_productlist">
                        <h1>รายการสินค้า</h1>
                    </div>
                        <div class="col-3 u">
                            <input name="keyword" id="keyword" type="text" class="btnd" placeholder="&nbsp ชื่อสินค้า">
                            <button  class="l"><img src="./src/images/search.png" width="20"></button>
                        </div>
                    <div class="col-2 m">
                        <select name="category_id" id="category_id" class="n" required>
                            <option value="all">สินค้าทั้งหมด</option>
                            <?php foreach ($rows as $row) { ?>
                                <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-2 d-flex justify-content-end a">
                        <a href="./addtocart.php" ><img src="./src/images/cart.png" width="52.5"/></a>
                    </div>
                </div>
                <table class="col-11 q">
                    <thead>
                        <tr class="topic_category">
                            <th colspan="3">
                                <h5 class="z">รายการสินค้าทั้งหมด</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="productlistTable">
                    <?php
                    $i = 0;
                    echo '<tr>';
                            foreach($p as $p){
                            $i++;?>
                    <th>
                        <div class="row-4 topic_product">
                            <?=$p['product_name']?> <?php if( $p['model'] == 0 ) { echo "";} else{ echo $p['model'];}?>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <img src="<?=$p['product_img']?>" class="img_position">
                            </div>
                            <div class="col-5">
                                <div class="aa">
                                    <p class="fitcontent">ราคา&nbsp&nbsp <?=$p['price']?> &nbsp&nbspบาท</p>
                                    <p class="fitcontent">คงเหลือ&nbsp&nbsp <?=$p['product_rm_unit']?> &nbsp&nbspใบ</p>
                                    <p><button onclick="addToCart()">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </div>
                    </th>
                    <?php if($i == 3) { // three items in a row. Edit this to get more or less items on a row
                    echo '</tr><tr>';
                        $i = 0;}
                        }
                        echo '</tr>'; ?>
                    </tbody>
                </table>
            </div>
        </div>

</body>

<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src=" ./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./src/js/productlist.js"></script>

</html>