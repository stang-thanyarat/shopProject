<?php
include_once 'database/PurchaseDetails.php';
include_once 'Redirection.php';
$purchaseDetails = new PurchaseDetails();
if (isset($_POST)) {
    if ($_POST['table'] === 'purchaseDetails') {
        if ($_POST['form_action'] === 'update') {
            $purchaseDetails->update($_POST);
            //redirection('aaa.php');
        } else if ($_POST['form_action'] === 'delete') {
            $purchaseDetails->delete($_POST['unique_id']);
        } else if ($_POST['form_action'] === 'insert') {
            $purchaseDetails->insert($_POST);
        }
    }
}else{
    echo "Page Not found.";
}
