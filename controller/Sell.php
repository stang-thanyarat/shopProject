<?php
include '../database/Sell.php';
include 'Redirection.php';
include '../service/upload.php';
include '../database/Bank.php';
$bank = new Bank();
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
                $path = './file/seller/id/';
                $filesname = uploadImage($_FILES['seller_card_id'], "." . $path);
                if ($filesname) {
                    $_POST['seller_card_id'] = $path . $filesname;
                } else {
                    $_POST['seller_card_id'] = '';
                }
            } else {
                $_POST['seller_card_id'] = '';
            }

            if (!empty($_FILES['seller_cardname'])) {
                $path = './file/seller/card/';
                $filesname = uploadImage($_FILES['seller_cardname'], "." . $path);
                if ($filesname) {
                    $_POST['seller_cardname'] = $path . $filesname;
                } else {
                    $_POST['seller_cardname'] = '';
                }
            } else {
                $_POST['seller_cardname'] = '';
            }

            if (!empty($_FILES['sell_documents'])) {
                $path = './file/seller/documents/';
                $filesname = uploadImage($_FILES['sell_documents'], "." . $path);
                if ($filesname) {
                    $_POST['sell_documents'] = $path . $filesname;
                } else {
                    $_POST['sell_documents'] = '';
                }
            } else {
                $_POST['sell_documents'] = '';
            }
            $_POST['seller_card_id'] = str_replace("-", "", $_POST['seller_card_id']);
            $_POST['seller_cardname'] = str_replace("-", "", $_POST['seller_cardname']);
            $_POST['sell_documents'] = str_replace("-", "", $_POST['sell_documents']);
            $employee->insert($_POST);
            $last = $employee->fetchLast();
            $lastID = $last['sell_id'];
            $banks = json_decode($_POST['bank']);
            foreach ($banks as $value) {
                $form = [];
                $form['sell_id'] =  $lastID;
                $form['bank_name'] = $value->bank;
                $form['bank_number'] =  $value->number;
                $form['bank_account'] =  $value->name;
                $employeebank->insert($form);
                $sell->insert($_POST);
            }
        }
    }
} else {

    echo "Page Not found.";
}
