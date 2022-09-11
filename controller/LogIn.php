<?php
session_start();
include '../database/UserAccount.php';
include 'Redirection.php';
include_once '../database/Employee.php';


$useraccount = new UserAccount();
$employee = new Employee();
if (isset($_POST)) {
    if ($_POST['table'] === 'useraccount') {
        if ($_POST['form_action'] === 'login') {
            $user = $useraccount->fetchByEmail($_POST['email']);
            if (count($user) > 0) {
                $user = $user[0];
                if (password_verify($_POST['password'], $user['account_password'])) {
                    if ($user['account_user_status'] == 0) {
                        $_SESSION['error'] = "บัญชีนี้ไม่อนุญาตให้ใช้งาน";
                        redirection('../login.php');
                    }
                    $username = $employee->fetchById($user['employee_id']);
                    $_SESSION['role'] = $user['account_user_type'];
                    $_SESSION['username'] = $username['employee_firstname'] . " " . $username['employee_lastname'];
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
