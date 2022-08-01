<?php
include 'database/Contract.php';
include 'Redirection.php';
$contract = new Contract();
if (isset($_POST)) {
    if ($_POST['table'] === 'contract') {
        if ($_POST['form_action'] === 'update') {
            $contract->update($_POST);
            //redirection('aaa.php');
        } else if ($_POST['form_action'] === 'delete') {
            $contract->delete($_POST['contract_code']);
        } else if ($_POST['form_action'] === 'insert') {
            $contract->insert($_POST);
        }
    }
}else{
    echo "Page Not found.";
}
