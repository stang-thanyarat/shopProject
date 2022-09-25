<?php
include_once '../database/ProductExchange.php';
include_once 'Redirection.php';
include_once '../service/upload.php';
$productexchange = new ProductExchange();

if (isset($_POST)) {
    if ($_POST['table'] === 'productexchange') {

        if ($_POST['form_action'] === 'update') {
            $productexchange->update($_POST);
        } else if ($_POST['form_action'] === 'delete') {

            $productexchange->delete($_POST['product_exchange_id']);
            
        } else if ($_POST['form_action'] === 'insert') {

            if (!empty($_FILES['damage_proof'])) {
                $filesname = uploadImage($_FILES['damage_proof'], '../file/productexchange/');
                if ($filesname) {
                    $_POST['damage_proof'] = $filesname;
                } else {
                    $_POST['damage_proof'] = '';
                }
            } else {
                $_POST['damage_proof'] = '';
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