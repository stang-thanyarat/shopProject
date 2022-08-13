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

            $employee->update($_POST);

            //redirection('aaa.php');

        } else if ($_POST['form_action'] === 'delete') {

            $employee->delete($_POST['employee_id']);

        } else if ($_POST['form_action'] === 'insert') {
            if (!empty($_FILES['employee_card_id_copy'])) {
                $filesname = uploadImage($_FILES['employee_card_id_copy'], '../file/employee/id/');
                if ($filesname) {
                    $_POST['employee_card_id_copy'] = $filesname;
                } else {
                    $_POST['employee_card_id_copy'] = '';
                }
            } else {
                $_POST['employee_card_id_copy'] = '';
            }

            if (!empty($_FILES['employee_address_copy'])) {
                $filesname = uploadImage($_FILES['employee_address_copy'], '../file/employee/address/');
                if ($filesname) {
                    $_POST['employee_address_copy'] = $filesname;
                } else {
                    $_POST['employee_address_copy'] = '';
                }
            } else {
                $_POST['employee_address_copy'] = '';
            }
            $_POST['employee_card_id'] = str_replace("-", "", $_POST['employee_card_id']);
            $_POST['employee_telephone'] = str_replace("-", "", $_POST['employee_telephone']);
            
            
            //print_r($_POST);
            $employee->insert($_POST);
            $last = $employee->fetchLast();
            $lastID = $last['employee_id'];
            
        }
    }
} else {

    echo "Page Not found.";
}