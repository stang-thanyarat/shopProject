<?php
include_once '../controller/Redirection.php';
session_start();

function isAdmin(){
    if(isset($_SESSION['role'])&&$_SESSION['role']!="A"){  //ถ้าไม่ใช่แอดมิน ให้ไปindex
       redirection('../index.php');
    }
    else if(!isset($_SESSION['role'])){  //ถ้าไม่ได้ล็อกอิน ให้ไปcustomer
        redirection('../customer.php');
    }
}

function isStaff(){
    if(!isset($_SESSION['role'])){  //ถ้าไม่ใช่พนักงาน ให้ไปหน้าcustomer
        redirection('../customer.php');
    }
}

function logout(){
    session_destroy();
}