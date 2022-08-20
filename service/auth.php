<?php
session_start();

function isAdmin(){
    if(isset($_SESSION['role'])&&$_SESSION['role']!="Admin"){  //ถ้าไม่ใช่แอดมิน ให้ไปindex
        header('Location:../index.php');
    }
    else if(!isset($_SESSION['role'])){  //ถ้าไม่ได้ล็อกอิน ให้ไปcustomer
        header('Location:../customer.php');
    }
}

function isStaff(){
    if(!isset($_SESSION['role'])){  //ถ้าไม่ใช่พนักงาน ให้ไปหน้าcustomer
        header('Location:../customer.php');
    }
}

function logout(){
    session_destroy();
}