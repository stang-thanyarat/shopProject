<?php
include 'database/Contract.php';
$contract = new Contract();
if(isset($_POST)){
    if(isset($_POST['contract_code'])){
        $contract->update($_POST);
    }else{
        $contract->insert($_POST);
    }
}