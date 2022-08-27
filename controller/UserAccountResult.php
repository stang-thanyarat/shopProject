<?php
include_once('../database/UserAccount.php');
if(!isset($_GET['unique_id'])&&(!isset($_GET['keyword']))){
    $product = new UserAccount();
    $rows = $product->search($_GET['keyword']);
    echo json_encode($rows);
}
else if(isset($_GET['unique_id'])&&(!isset($_GET['keyword']))){
    $product = new UserAccount();
    $rows = $product->search($_GET['keyword']);
    echo json_encode($rows);
}
else if(!isset($_GET['unique_id'])&&(isset($_GET['keyword']))){
    $product = new UserAccount();
    $rows = $product->search($_GET['keyword']);
    echo json_encode($rows);
}
else if(isset($_GET['unique_id'])&&(isset($_GET['keyword']))){
    $product = new UserAccount();
    $rows = $product->search($_GET['keyword'],$_GET['unique_id']);
    echo json_encode($rows);
}