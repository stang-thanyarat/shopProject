<?php
include 'database/Employee.php';
include 'Redirection.php';
$employee = new Employee();
if (isset($_POST)) {
    if ($_POST['table'] === 'employee') {

        if ($_POST['form_action'] === 'update') {

            $employee->update($_POST);

            //redirection('aaa.php');

        } else if ($_POST['form_action'] === 'delete') {

            $employee->delete($_POST['employee_id']);
        } else if ($_POST['form_action'] === 'insert') {

            $employee->insert($_POST);
        }
    }
} else {

    echo "Page Not found.";
}
