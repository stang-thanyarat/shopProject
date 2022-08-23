<?php
include '../database/Employee.php';
include 'Redirection.php';
include '../service/upload.php';
include '../database/Employeebank.php';
$employeebank = new Employeebank();
$employee = new Employee();
if (isset($_POST)) {
    if ($_POST['table'] === 'employee') {

        if ($_POST['form_action'] === 'update') {

            //เชคการอัพโหลดรูป
            if (!empty($_FILES['employee_card_id_copy'])) {
                unlink('../file/employee/id/' . $_POST['employee_card_id_copy']);
                $filesname = uploadImage($_FILES['employee_card_id_copy'], '../file/employee/id/');
                if ($filesname) {
                    $_POST['employee_card_id_copy'] = $filesname;
                } else {
                    $_POST['employee_card_id_copy'] = '';
                }
            }
            if (!empty($_FILES['employee_address_copy'])) {
                unlink('../file/employee/address/' . $_POST['employee_address_copy']);
                $filesname = uploadImage($_FILES['employee_address_copy'], '../file/employee/address/');
                if ($filesname) {
                    $_POST['employee_address_copy'] = $filesname;
                } else {
                    $_POST['employee_address_copy'] = '';
                }
            }

            $banks = json_decode($_POST['bank']);

            // remove bank and edit
            $recBack = $employeebank->fetchByEmployeeId($_POST['employee_id']);
            foreach ($recBack as $r) {
                $f = false;
                foreach ($banks as $value) {
                    $f = ($r->bank_id == $value->id);
                }
                if (!$f) {
                    $employeebank->delete($r->bank_id);
                } else {
                    $form = [];
                    $form['bank_id'] =  $r->bank_id;
                    $form['employee_id'] =  $_POST['employee_id'];
                    $form['bank_name'] = $value->bank;
                    $form['bank_number'] =  $value->number;
                    $form['bank_account'] =  $value->name;
                    $employeebank->update($form);
                }
            }
            // insert bank to edit
            foreach ($banks as $value) {
                if ($value->id == -1) {
                    $form = [];
                    $form['employee_id'] =  $_POST['employee_id'];
                    $form['bank_name'] = $value->bank;
                    $form['bank_number'] =  $value->number;
                    $form['bank_account'] =  $value->name;
                    $employeebank->insert($form);
                }
            }

            $employee->update($_POST);
        } else if ($_POST['form_action'] === 'delete') {
            $employee->delete($_POST['employee_id']);
        } else if ($_POST['form_action'] === 'insert') {
            //อัพโหลด
            if (!empty($_FILES['employee_card_id_copy'])) {
                $path = './file/employee/id/';
                    $filesname = uploadImage($_FILES['employee_card_id_copy'], ".".$path );
                if ($filesname) {
                    $_POST['employee_card_id_copy'] = $path.$filesname;
                } else {
                    $_POST['employee_card_id_copy'] = '';
                }
                
            } else {
                $_POST['employee_card_id_copy'] = '';
            }

            if (!empty($_FILES['employee_address_copy'])) {
                $path = './file/employee/address/';
                $filesname = uploadImage($_FILES['employee_address_copy'], ".".$path );
                if ($filesname) {
                    $_POST['employee_address_copy'] = $path.$filesname;
                } else {
                    $_POST['employee_address_copy'] = '';
                }
            } else {
                $_POST['employee_address_copy'] = '';
            }
            $_POST['employee_card_id'] = str_replace("-", "", $_POST['employee_card_id']);
            $_POST['employee_telephone'] = str_replace("-", "", $_POST['employee_telephone']);
            $employee->insert($_POST);
            $last = $employee->fetchLast();
            $lastID = $last['employee_id'];
            $banks = json_decode($_POST['bank']);
            foreach ($banks as $value) {
                $form = [];
                $form['employee_id'] =  $lastID;
                $form['bank_name'] = $value->bank;
                $form['bank_number'] =  $value->number;
                $form['bank_account'] =  $value->name;
                $employeebank->insert($form);
            }
        }
    }
} else {
    echo "Page Not found.";
}
