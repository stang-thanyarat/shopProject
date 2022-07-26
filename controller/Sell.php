<?php
include 'database/Sell.php';
$sell = new Sell();
if(isset($_POST)){
    if(isset($_POST['sell_id'])){
        $sell->update($_POST);
    }else{
        $sell->insert($_POST);
    }
}