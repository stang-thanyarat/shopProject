<?php
include 'database/PurchaseDetails.php';
$purchaseDetails = new PurchaseDetails();
if(isset($_POST)){
    if(isset($_POST['unique_id'])){
        $purchaseDetails->update($_POST);
    }else{
        $purchaseDetails->insert($_POST);
    }
}