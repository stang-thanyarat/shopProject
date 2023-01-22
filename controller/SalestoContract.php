<?php
include_once('../database/Contract.php');
if(!isset($_GET['keyword'])){
    $contract = new Contract();
    $rows = [];
}
else if(isset($_GET['keyword'])){
    $contract = new Contract();
    $rows = $contract->searchBycopyID($_GET['keyword']);
    echo json_encode($rows);
}