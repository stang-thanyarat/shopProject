<?php
include '../database/Sell.php';
include 'Redirection.php';
include '../service/upload.php';
$sell = new Sell();
if (isset($_POST)) {
    if ($_POST['table'] === 'sell') {

        if ($_POST['form_action'] === 'update') {
            $sell->update($_POST);
            //redirection('aaa.php');

        } else if ($_POST['form_action'] === 'delete') {
            $sell->delete($_POST['sell_id']);
        } else if ($_POST['form_action'] === 'insert') {

            if (!empty($_FILES['seller_card_id'])) {
                $filesname = uploadImage($_FILES['seller_card_id'], '../file/seller/id/');
                if ($filesname) {
                    $_POST['seller_card_id'] = $filesname;
                } else {
                    $_POST['seller_card_id'] = '';
                }
            } else {
                $_POST['seller_card_id'] = '';
            }

            if (!empty($_FILES['seller_cardname'])) {
                $filesname = uploadImage($_FILES['seller_cardname'], '../file/seller/card/');
                if ($filesname) {
                    $_POST['seller_cardname'] = $filesname;
                } else {
                    $_POST['seller_cardname'] = '';
                }
            } else {
                $_POST['seller_cardname'] = '';
            }

            if (!empty($_FILES['sell_documents'])) {
                $filesname = uploadImage($_FILES['sell_documents'], '../file/seller/documents/');
                if ($filesname) {
                    $_POST['sell_documents'] = $filesname;
                } else {
                    $_POST['sell_documents'] = '';
                }
            } else {
                $_POST['sell_documents'] = '';
            }
            $sell->insert($_POST);
        }
    }
} else {

    echo "Page Not found.";
}
