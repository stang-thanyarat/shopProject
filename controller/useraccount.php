<?php
include '../database/UserAccount.php';
include 'Redirection.php';
$useraccount = new UserAccount();
if (isset($_POST)) {
    if ($_POST['table'] === 'useraccount') {
        if ($_POST['form_action'] === 'update') {

            $useraccount->update($_POST);

        } else if ($_POST['form_action'] === 'delete') {

            $useraccount->delete($_POST['unique_id']);
        } else if ($_POST['form_action'] === 'insert') {
            if (empty($_POST['account_user_status'])) {
                $_POST['account_user_status'] = '0';
            } else {
                $_POST['account_user_status'] = '1';
            }
            $_POST[]= $a;
            $useraccount->insert($_POST);
        }
    }
} else {
    echo "Page Not found.";
}
