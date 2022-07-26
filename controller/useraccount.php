<?php
include 'database/UserAccount.php';
$useraccount = new UserAccount();
if (isset($_POST)) {
    if (isset($_POST['unique_id'])) {
        $useraccount->update($_POST);
    } else {
        $useraccount->insert($_POST);
    }
}
