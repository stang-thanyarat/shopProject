<?php
include 'database/Bank.php';
$bank = new Bank();
if (isset($_POST)) {
    if (isset($_POST['bank_id'])) {
        $bank->update($_POST);
    } else {
        $bank->insert($_POST);
    }
}
