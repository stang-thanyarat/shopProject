<?php
include_once '../database/ProductExchange.php';
include_once 'Redirection.php';
include_once '../service/upload.php';
$productexchange = new ProductExchange();

if (isset($_POST)) {
    if ($_POST['table'] === 'productexchange') {
        $path = './file/product//';
        if ($_POST['form_action'] === 'update') {
            $productexchange->update($_POST);
        } else if ($_POST['form_action'] === 'delete') {

            $productexchange->delete($_POST['product_exchange_id']);
            
        } else if ($_POST['form_action'] === 'insert') {
            if ($_FILES['damage_proof']['size'] > 0) {
                $path = './file/product/productexchange/';
                $filesname = uploadImage($_FILES['damage_proof'], "." . $path);
                if ($filesname) {
                    $_POST['damage_proof'] = $path . $filesname;
                } else {
                    $_POST['damage_proof'] = '';
                }
            } else {
                $_POST['damage_proof'] = '';
            }
            if (empty($_POST['exchange_status'])) {
                $_POST['exchange_status'] = '0';
            } else {
                $_POST['exchange_status'] = '1';
            }
            $productexchange->insert($_POST);
            redirection( "/productexchangehistory.php" );
        }
    }
}
else{
    echo "Page Not found.";
}
?>