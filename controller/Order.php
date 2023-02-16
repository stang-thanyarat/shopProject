<?php
include_once '../database/Order.php';
include_once '../service/upload.php';
include_once 'Redirection.php';
$order = new Order();
if (isset($_POST)) {
    if ($_POST['table'] === 'order') {
        if ($_POST['form_action'] === 'update') {
            //เชคการอัพโหลดรูป
            if ($_FILES['bank_slip']['size'] > 0) {
                $path = './file/order/bank_slip/';
                if (file_exists($_POST['bank_slip'])) {
                    unlink($_POST['bank_slip']);
                }
                $filesname = $path . uploadImage($_FILES['bank_slip'], "." . $path);
                if ($filesname) {
                    $order->updateimage('bank_slip', $filesname, $_POST['order_id']);
                }
            }
            $order->update($_POST);
            Redirection("/order.php");
        }
        else if ($_POST['form_action'] === 'updateconfirm') {
            //เชคการอัพโหลดรูป
            if ($_FILES['receipt']['size'] > 0) {
                $path = './file/order/receipt/';
                if (file_exists($_POST['receipt'])) {
                    unlink($_POST['receipt']);
                }
                $filesname = $path . uploadImage($_FILES['receipt'], "." . $path);
                if ($filesname) {
                    $order->updateimage('receipt', $filesname, $_POST['order_id']);
                }
            }
            if ($_FILES['invoice']['size'] > 0) {
                $path = './file/order/invoice/';
                if (file_exists($_POST['invoice'])) {
                    unlink($_POST['invoice']);
                }
                $filesname = $path . uploadImage($_FILES['invoice'], "." . $path);
                if ($filesname) {
                    $order->updateimage('invoice', $filesname, $_POST['order_id']);
                }
            }
                    if (empty($_POST['order_status'])) {
                        $_POST['order_status'] = '1';
                    } else {
                        $_POST['order_status'] = '0';
                    }
                    $order->updateconfirm($_POST);
                    Redirection("/order.php");
                } else if ($_POST['form_action'] === 'delete') {
                    if (file_exists($_POST['bank_slip'])) {
                        unlink($_POST['bank_slip']);
                    }
                    if (file_exists($_POST['receipt'])) {
                        unlink($_POST['receipt']);
                    }
                    if (file_exists($_POST['invoice'])) {
                        unlink($_POST['invoice']);
                    }
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
                }
                $order->insert($_POST);
                Redirection("/order.php");
            }
        }
else {
    echo "Page Not found.";
}

