<?php
include_once "./database/Product.php";
include_once "./database/Category.php";
include_once "./database/Sales.php";
//กรณีที่ 1 ถ้าไม่ค้นหาทั้งจาก keyword และ ตัวเลือกประเภทสินค้า จะโชว์ทั้งหมด
if(!isset($_GET['category_id'])&&(!isset($_GET['keyword']))){
    $product = new Product();
    $rows = $product->fetchAddCategory();
    $sales = new Sales();
    $s = $sales->fetchAll();
    echo json_encode($rows);
    echo json_encode($s);
}
//
else if(isset($_GET['category_id'])&&(!isset($_GET['keyword']))){
    $product = new Product();
    $rows = $product->fetchByCategoryId($_GET['category_id']);
    echo json_encode($rows);
}
else if(!isset($_GET['category_id'])&&(isset($_GET['keyword']))){
    $product = new Product();
    $rows = $product->search($_GET['keyword']);
    echo json_encode($rows);
}
else if(isset($_GET['category_id'])&&(isset($_GET['keyword']))){
    $product = new Product();
    $rows = $product->search($_GET['keyword'],$_GET['category_id']);
    echo json_encode($rows);

}
