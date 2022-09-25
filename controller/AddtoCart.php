<?php
include_once 'database/AddtoCart.php';
include_once 'Redirection.php';
$addtocart = new AddtoCart();
if (isset($_POST)) {
    if ($_POST['table'] === 'product') {

        if ($_POST['form_action'] === 'update') {
            $addtocart->update($_POST);
            //redirection('aaa.php');

        } else if ($_POST['form_action'] === 'delete') {
            $addtocart->delete($_POST['product_id']);
        } else if ($_POST['form_action'] === 'insert') {
            $addtocart->insert($_POST);
        }
    }
} else {
    echo "Page Not found.";
}
?>