<?php
include_once 'database/Sis.php';
include_once 'Redirection.php';
$sis = new Sis();
if (isset($_POST)) {
    if ($_POST['table'] === 'sis') {
        if ($_POST['form_action'] === 'update') {
            $sis->update($_POST);
            //redirection('aaa.php');
        } else if ($_POST['form_action'] === 'delete') {
            $sis->delete($_POST['sis_id']);
        } else if ($_POST['form_action'] === 'insert') {
            $sis->insert($_POST);
        }
    }
}else{
    echo "Page Not found.";
}
