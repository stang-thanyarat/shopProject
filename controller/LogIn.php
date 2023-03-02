<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once 'Redirection.php';
include_once '../database/UserAccount.php';
include_once '../database/Employee.php';
$useraccount = new UserAccount();
$employee = new Employee();
if (isset($_POST)) {
    if ($_POST['table'] == 'useraccount') {
        if ($_POST['form_action'] == 'login') {
            $user = $useraccount->fetchByEmail($_POST['email']);
            if (count($user) > 0) {
                $user = $user[0];
                if (password_verify($_POST['password'], $user['account_password'])) {
                    if ($user['account_user_status'] == 0) {
                        $_SESSION['error'] = "บัญชีนี้ไม่อนุญาตให้ใช้งาน";
                        redirection('/login.php');
                    }
                    $username = $employee->fetchById($user['employee_id']);
                    if (!isset($_SESSION['vat'])) {
                        $vat = 7;
                    }else{
                        $vat = $_SESSION['vat'];
                    }
                    if (!isset($_SESSION['day_change'])) {
                        $day_change = 7;
                    }else{
                        $day_change = $_SESSION['day_change'];
                    }
                    if (!isset($_SESSION['shop_name'])) {
                        $name = "วรเชษฐ์เกษตรภัณฑ์";
                    }
                    if (isset($_SESSION['shop_name'])) {
                        $name = $_SESSION['shop_name'] ;
                    }
                    if (!isset($_SESSION['interest'])) {
                        $interest  = 2;
                    }
                    if (!isset($_SESSION['interest_month'])) {
                        $interest_month = 4;
                    }
                    if (isset($_SESSION['interest'])) {
                        $interest  = $_SESSION['interest'];
                    }
                    if (isset($_SESSION['interest_month'])) {
                        $interest_month = $_SESSION['interest_month'] ;
                    }
                    if (!isset($_SESSION['address'])) {
                        $_SESSION['address'] = 'xxxxxxxxx';
                    }
                    if (isset($_SESSION['address'])) {
                        $address = $_SESSION['address'];
                    }
                    if (!isset($_SESSION['vat_no'])) {
                        $_SESSION['vat_no'] = "xxxxxxxxxxxxx";
                    }
                    if (isset($_SESSION['vat_no'])) {
                        $vat_no = $_SESSION['vat_no'];
                    }
                    if (!isset($_SESSION['tel'])) {
                        $tel = "xxxxxxxx";
                    }
                    if (isset($_SESSION['tel'])) {
                        $tel = $_SESSION['tel'];
                    }
                    $_SESSION['vat']  = $vat;
                    $_SESSION['day_change'] = $day_change;
                    $_SESSION['shop_name'] =$name;
                    $_SESSION['interest'] = $interest;
                    $_SESSION['interest_month'] = $interest_month;
                    $_SESSION['role'] = $user['account_user_type'];
                    $_SESSION['username'] = $username['employee_firstname'] . " " . $username['employee_lastname'];
                    $_SESSION['employee_id'] = $user['employee_id'];
                    $_SESSION['tel'] =$tel ;
                    $_SESSION['vat_no']=$vat_no ;
                    $_SESSION['address']=$address  ;
                    redirection('/index.php');
                } else {
                    $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
                    redirection('/login.php');
                }
            } else {
                $_SESSION['error'] = "ไม่พบผู้ใช้";
                redirection('/login.php');
            }
        }
    }
}
