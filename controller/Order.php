<?php
include_once '../database/Order.php';
include_once 'Redirection.php';
$order = new Order();
if (isset($_POST)) {
    if ($_POST['table'] === 'order') {
        if ($_POST['form_action'] === 'update') {
            //เชคการอัพโหลดรูป
            if ($_FILES['delivery_notice']['size'] > 0) {
                $path = './file/employee/id/';
                if (file_exists($_POST['delivery_notice'])) {
                    unlink($_POST['delivery_notice']);
                }
                $filesname = $path . uploadImage($_FILES['delivery_notice'], "." . $path);
                if ($filesname) {
                    $employee->updateimage('delivery_notice', $filesname, $_POST['order_id']);
                }
            }

            if ($_FILES['receipt']['size'] > 0) {
                $path = './file/employee/address/';
                if (file_exists($_POST['receipt'])) {
                    unlink($_POST['receipt']);
                }
                $filesname = $path . uploadImage($_FILES['receipt'], "." . $path);
                if ($filesname) {
                    $employee->updateimage('receipt',$filesname,$_POST['order_id']);
                }
            }
            
            $order->update($_POST);
            //อัพโหลด
            if (isset($_FILES['delivery_notice'])) {
                $path = './file/employee/id/';
                $filesname = uploadImage($_FILES['delivery_notice'], "." . $path);
                if ($filesname) {
                    $_POST['delivery_notice'] = $path . $filesname;
                } else {
                    $_POST['delivery_notice'] = '';
                }
            } else {
                $_POST['delivery_notice'] = '';
            }

            if (isset($_FILES['receipt'])) {
                $path = './file/employee/address/';
                $filesname = uploadImage($_FILES['receipt'], "." . $path);
                if ($filesname) {
                    $_POST['receipt'] = $path . $filesname;
                } else {
                    $_POST['receipt'] = '';
                }
            } else {
                $_POST['receipt'] = '';
            }
        }
    }
} else {
    echo "Page Not found.";
}
