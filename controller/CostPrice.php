<?php
include_once('../database/CostPrice.php');
if(!isset($_GET['category_id'])&&(!isset($_GET['date']))){
    $costprice = new CostPrice();
    $rows = $costprice->fetchAll();
    echo json_encode($rows);
}
else if(!isset($_GET['category_id'])&&(isset($_GET['date']))){
    $costprice = new CostPrice();
    $rows = $costprice->fetchAllDate($_GET['date']);
    echo json_encode($rows);
}
else if(isset($_GET['category_id'])&&(!isset($_GET['date']))){
    $costprice = new CostPrice();
    $rows = $costprice->fetchById($_GET['category_id']);
    echo json_encode($rows);
}
else if(isset($_GET['category_id'])&&(isset($_GET['date']))){
    $costprice = new CostPrice();
    $rows = $costprice->fetchAllDateAndId($_GET['date'],$_GET['category_id']);
    echo json_encode($rows);
}