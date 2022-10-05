<?php
include_once '../database/Order.php';
include_once 'Redirection.php';
$order = new Order();
if (isset($_POST)) {
    if ($_POST['table'] === 'order') {
        if ($_POST['form_action'] === 'update') {
            //เชคการอัพโหลดรูป
            if ($_FILES['employee_card_id_copy']['size'] > 0) {
                $path = './file/employee/id/';
                if (file_exists($_POST['employee_card_id_copy'])) {
                    unlink($_POST['employee_card_id_copy']);
                }
                $filesname = $path . uploadImage($_FILES['employee_card_id_copy'], "." . $path);
                if ($filesname) {
                    $employee->updateimage('employee_card_id_copy', $filesname, $_POST['employee_id']);
                }
            }

            if ($_FILES['employee_address_copy']['size'] > 0) {
                $path = './file/employee/address/';
                if (file_exists($_POST['employee_address_copy'])) {
                    unlink($_POST['employee_address_copy']);
                }
                $filesname = $path . uploadImage($_FILES['employee_address_copy'], "." . $path);
                if ($filesname) {
                    $employee->updateimage('employee_address_copy',$filesname,$_POST['employee_id']);
                }
            }
            
            $order->update($_POST);
            //อัพโหลด
            if (isset($_FILES['employee_card_id_copy'])) {
                $path = './file/employee/id/';
                $filesname = uploadImage($_FILES['employee_card_id_copy'], "." . $path);
                if ($filesname) {
                    $_POST['employee_card_id_copy'] = $path . $filesname;
                } else {
                    $_POST['employee_card_id_copy'] = '';
                }
            } else {
                $_POST['employee_card_id_copy'] = '';
            }

            if (isset($_FILES['employee_address_copy'])) {
                $path = './file/employee/address/';
                $filesname = uploadImage($_FILES['employee_address_copy'], "." . $path);
                if ($filesname) {
                    $_POST['employee_address_copy'] = $path . $filesname;
                } else {
                    $_POST['employee_address_copy'] = '';
                }
            } else {
                $_POST['employee_address_copy'] = '';
            }
        }
    }
} else {
    echo "Page Not found.";
}
