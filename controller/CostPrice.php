<?php
include_once('../database/CostPrice.php');
if(isset($_GET['start']) && isset($_GET['end']) && $_GET['start'] != '' && $_GET['end'] != ''){
    $costprice = new CostPrice();
    $rows = $costprice->fetchBetween($_GET['start'], $_GET['end']);
    echo json_encode($rows);
}
else if((!isset($_GET['start']) && !isset($_GET['end'])) ||($_GET['start'] != '' && $_GET['end'] != '')){
    $costprice = new CostPrice();
    $rows = $costprice->fetchAll();
    echo json_encode($rows);
}
else {
    $rows = [];
}