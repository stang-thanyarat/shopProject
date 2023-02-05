<?php
include_once('../database/Budget.php');
if(!isset($_GET['firstdate'])&&(!isset($_GET['lastdate']))){
    $budget = new Budget();
    echo $budget->AllBG();
}
else if(isset($_GET['firstdate'])&&(isset($_GET['lastdate']))){
    $budget = new Budget();
    $rows = $budget->fetchBetween($_GET['firstdate'],$_GET['lastdate']);
    echo json_encode($rows);
}
