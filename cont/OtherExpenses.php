<?php
include 'database/OtherExpenses.php';
$otherExpenses = new OtherExpenses();
if(isset($_POST)){
    if(isset($_POST['unique_id'])){
        $otherExpenses->update($_POST);
    }else{
        $otherExpenses->insert($_POST);
    }
}