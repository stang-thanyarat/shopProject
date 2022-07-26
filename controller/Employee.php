<?php
include 'database/Employee.php';
$employee = new Employee();
if (isset($_POST)) {
    if (isset($_POST['employee_id'])) {
        $employee->update($_POST);
    } else {
        $employee->insert($_POST);
    }
}
