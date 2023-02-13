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
    if (!isset($_SESSION['address'])) {
        $_SESSION['address'] = 'xxxxxxxxx';
    }
    else{
        $address = $_SESSION['address'];
    }
    if (!isset($_SESSION['vat_no'])) {
        $_SESSION['vat_no'] = "xxxxxxxxxxxxx";
    }
    else {
        $vat_no = $_SESSION['vat_no'];
    }
    if (!isset($_SESSION['tel'])) {
        $tel = "xxxxxxxx";
    }
    else {
        $tel = $_SESSION['tel'];
    }
    session_destroy();
    session_start();
    $_SESSION['vat']  = $vat;
    $_SESSION['day_change'] = $day_change;
    $_SESSION['tel'] = $tel;
    $_SESSION['vat_no'] = $vat_no;
    $_SESSION['address']= $address;
}
logout();