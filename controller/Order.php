<?php
include 'database/Order.php';
include 'Redirection.php';
$order = new Order();
if (isset($_POST)) {
    if ($_POST['table'] === 'order') {
        if ($_POST['form_action'] === 'update') {
            $order->update($_POST);
            //redirection('aaa.php');
        } else if ($_POST['form_action'] === 'delete') {
            $order->delete($_POST['order_id']);
        } else if ($_POST['form_action'] === 'insert') {
            $order->insert($_POST);
        }
    }
}else{
    echo "Page Not found.";
}
