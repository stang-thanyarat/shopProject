<?php
include_once '../database/Order.php';
include_once '../service/upload.php';
include_once 'Redirection.php';
$order = new Order();
if (isset($_POST)) {
    if ($_POST['table'] === 'order') {
        if ($_POST['form_action'] === 'update') {
            //เชคการอัพโหลดรูป
            if ($_FILES['delivery_notice']['size'] > 0) {
                $path = './file/order/deliverynotice/';
                if (file_exists($_POST['delivery_notice'])) {
                    unlink($_POST['delivery_notice']);
                }
                $filesname = $path . uploadImage($_FILES['delivery_notice'], "." . $path);
                if ($filesname) {
                    $order->updateimage('delivery_notice', $filesname,$_POST['order_id']);
                }
            }
            if ($_FILES['receipt']['size'] > 0) {
                $path = './file/order/receipt/';
                if (file_exists($_POST['receipt'])) {
                    unlink($_POST['receipt']);
                }
                $filesname = $path . uploadImage($_FILES['receipt'], "." . $path);
                if ($filesname) {
                    $order->updateimage('receipt', $filesname,$_POST['order_id']);
                }
            }
            if (empty($_POST['order_status'])) {
                $_POST['order_status'] = '0';
            } else {
                $_POST['order_status'] = '1';
            }
            $order->update($_POST);
            Redirection("/order.php");
        } else if ($_POST['form_action'] === 'delete') {
            $order->delete($_POST['order_id']);
        } else if ($_POST['form_action'] === 'insert') {
            //อัพโหลด
            if (isset($_FILES['bankslip'])) {
                $path = './file/order/bankslip/';
                $filesname = uploadImage($_FILES['bankslip'], "." . $path);
                if ($filesname) {
                    $_POST['bankslip'] = $path . $filesname;
                } else {
                    $_POST['bankslip'] = '';
                }
            } else {
                $_POST['bankslip'] = '';
            }
            if (empty($_POST['order_status'])) {
                $_POST['order_status'] = '0';
            } else {
                $_POST['order_status'] = '1';
            }
        }
        $order->insert($_POST);
        Redirection("/order.php");
    }
} else {
    echo "Page Not found.";
}
