<?php
include 'database/AddtoCart.php';
$addtocart = new AddtoCart();
if($_GET['email']){
    echo json_encode($sell->emailCheck($_GET['email']));
}else {
    echo "Page Not found.";
}
?>