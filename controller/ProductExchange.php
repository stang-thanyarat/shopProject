<?php
include 'database/ProductExchange.php';
$productexchange = new ProductExchange();
if(isset($_POST)){
    if(isset($_POST['product_exchange_id'])){
        $product->update($_POST);
    }else{
        $product->insert($_POST);
    }  
}