<?php
include_once 'database/Sales.php';
include_once 'Redirection.php';
$sales = new Sales();
if (isset($_POST)) {
    if ($_POST['table'] === 'product') {

        if ($_POST['form_action'] === 'update') {
            $sales->update($_POST);
            //redirection('aaa.php');

        } else if ($_POST['form_action'] === 'delete') {
            $sales->delete($_POST['sales_list_id']);
        } else if ($_POST['form_action'] === 'insert') {
            $sales->insert($_POST);
        }
    }
} else {
    echo "Page Not found.";
}
?>