<?php
include_once('../database/CostPrice.php');
    $costprice = new CostPrice();
    $rows = $costprice->fetchBetween($_GET['product_id'],$_GET['start'], $_GET['end']);
    echo json_encode($rows);

