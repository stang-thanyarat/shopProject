<?php
if (!isset($_SESSION)) {
    session_start();
};

function logout()
{

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
        $name = "ร้าน ABC";
    }
    if (isset($_SESSION['shop_name'])) {
        $name = $_SESSION['shop_name'] ;
    }
    if (!isset($_SESSION['interest'])) {
        $interest  = 15;
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
    session_destroy();
    session_start();
    $_SESSION['vat']  = $vat;
    $_SESSION['day_change'] = $day_change;
    $_SESSION['shop_name'] =$name;
    $_SESSION['interest'] = $interest;
    $_SESSION['interest_month'] = $interest_month;
    $_SESSION['tel'] =$tel ;
    $_SESSION['vat_no']=$vat_no ;
    $_SESSION['address']=$address  ;
}
logout();