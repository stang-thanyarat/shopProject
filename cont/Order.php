<?php
include 'database/Order.php';
$order = new Order();
if(isset($_POST)){
    if(isset($_POST['order_id'])){
        $order->update($_POST);
    }else{
        $order->insert($_POST);
    }
}