<?php
include_once 'database/OrderDetail.php';
include_once 'Redirection.php';
$orderDetails = new OrderDetails();
if (isset($_POST)) {
    if ($_POST['table'] === 'orderDetails') {
        if ($_POST['form_action'] === 'update') {
            $orderDetails->update($_POST);
            //redirection('aaa.php');
        } else if ($_POST['form_action'] === 'delete') {
            $orderDetails->delete($_POST['unique_id']);
        } else if ($_POST['form_action'] === 'insert') {
            $orderDetails->insert($_POST);
        }
    }
}else{
    echo "Page Not found.";
}
