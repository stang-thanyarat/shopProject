<?php
include_once('../database/UserAccount.php');
if(!isset($_GET['type'])&&(!isset($_GET['keyword']))){
    $product = new UserAccount();
    $rows = $product->fetchAddEmployee();
    echo json_encode($rows);
}
else if(isset($_GET['type'])&&(!isset($_GET['keyword']))){
    $product = new UserAccount();
    $rows = $product->findByType($_GET['type']);
    echo json_encode($rows);
}
else if(!isset($_GET['type'])&&(isset($_GET['keyword']))){
    $product = new UserAccount();
    $rows = $product->search($_GET['keyword']);
    echo json_encode($rows);
}
else if(isset($_GET['type'])&&(isset($_GET['keyword']))){
    $product = new UserAccount();
    $rows = $product->search($_GET['keyword'],$_GET['type']);
    echo json_encode($rows);
}