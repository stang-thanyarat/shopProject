<?php
include 'database/OrderDetail.php';
$orderDetails = new OrderDetails();
if(isset($_POST)){
    if(isset($_POST['unique_id'])){
        $orderDetails->update($_POST);
    }else{
        $orderDetails->insert($_POST);
    }
}