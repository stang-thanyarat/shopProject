<?php
session_start();
include '../database/UserAccount.php';
include 'Redirection.php';
$useraccount = new UserAccount();
if (isset($_POST)) {
    if ($_POST['table'] === 'useraccount') {
        if ($_POST['form_action'] === 'login') {
            $user = $useraccount->fetchByEmail($_POST['email']);
            if (count($user) > 0) {
                if (password_verify($_POST['password'], $user['account_password'])) {
                    $_SESSION['role'] = $user['account_user_type'];
                    redirection('../index.php');
                } else {
                    $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
                    redirection('../login.php');
                }
            } else {
                $_SESSION['error'] = "ไม่พบผู้ใช้";
                redirection('../login.php');
            }
        }
    }
}
