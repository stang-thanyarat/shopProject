<?php
include 'database/UserAccount.php';
include 'Redirection.php';
$useraccount = new UserAccount();
if (isset($_POST)) {
    if ($_POST['table'] === 'useraccount') {

        if ($_POST['form_action'] === 'update') {

            $useraccount->update($_POST);

            //redirection('aaa.php');

        } else if ($_POST['form_action'] === 'delete') {

            $useraccount->delete($_POST['unique_id']);
        } else if ($_POST['form_action'] === 'insert') {

            $useraccount->insert($_POST);
        }
    }
} else {

    echo "Page Not found.";
}
