<?php
include 'database/DebtPaymentDetails.php';
$debtPaymentDetails = new DebtPaymentDetails();
if(isset($_POST)){
    if(isset($_POST['unique_id'])){
        $debtPaymentDetails->update($_POST);
    }else{
        $debtPaymentDetails->insert($_POST);
    }
}