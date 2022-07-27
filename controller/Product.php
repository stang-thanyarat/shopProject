<?php
include 'database/Product.php';
$product = new Product();
if(isset($_POST)){
    if(isset($_POST['product_id'])){
        $product->update($_POST);
    }else{
        $product->insert($_POST);
    }  
}