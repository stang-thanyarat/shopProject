<?php
include_once('../database/CostPrice.php');
if(isset($_GET['product_id'])&&(isset($_GET['start']))&&(isset($_GET['end']))){
    $costprice = new CostPrice();
    $rows = $costprice->fetchBetween($_GET['product_id'],$_GET['start'], $_GET['end']);
    echo json_encode($rows);
}


