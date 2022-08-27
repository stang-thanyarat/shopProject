<?php
include_once('../database/Product.php');
if(!isset($_GET['category_id'])&&(!isset($_GET['keyword']))){
    $product = new Product();
    $rows = $product->fetchAddCategory();
    echo json_encode($rows);
}
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
