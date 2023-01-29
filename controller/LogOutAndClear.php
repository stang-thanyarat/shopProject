<?php
if (!isset($_SESSION)) {
    session_start();
}

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
session_destroy();
session_start();

$_SESSION['vat']  = $vat;
$_SESSION['day_change'] = $day_change;
$_SESSION['error']  = "กรุณาเข้าสู่ระบบในฐานะเจ้าของร้านก่อนใช้งานฟังก์ชันนี้";
