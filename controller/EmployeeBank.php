<?php
include_once 'database/EmployeeBank.php';
$employeebank = new EmployeeBank();

if (isset($_POST)) {
    if ($_POST['table'] === 'employeebank') {

        if ($_POST['form_action'] === 'update') {

            $bank->update($_POST);

        } else if ($_POST['form_action'] === 'delete') {

            $bank->delete($_POST['bank_id']);
        } else if ($_POST['form_action'] === 'insert') {

            $bank->insert($_POST);
        }
    }
} else {

    echo "Page Not found.";
}
