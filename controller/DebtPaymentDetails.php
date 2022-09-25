<?php
include_once 'database/DebtPaymentDetails.php';
include_once 'Redirection.php';
$debtPaymentDetails = new DebtPaymentDetails();
if (isset($_POST)) {
    if ($_POST['table'] === 'debtPaymentDetails') {
        if ($_POST['form_action'] === 'update') {
            $debtPaymentDetails->update($_POST);
            //redirection('aaa.php');
        } else if ($_POST['form_action'] === 'delete') {
            $debtPaymentDetails->delete($_POST['unique_id']);
        } else if ($_POST['form_action'] === 'insert') {
            $debtPaymentDetails->insert($_POST);
        }
    }
}else{
    echo "Page Not found.";
}
