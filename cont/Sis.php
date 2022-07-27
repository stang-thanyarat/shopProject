<?php
include 'database/Sis.php';
$sis = new Sis();
if(isset($_POST)){
    if(isset($_POST['sis_id'])){
        $sis->update($_POST);
    }else{
        $sis->insert($_POST);
    }
}