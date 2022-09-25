<?php
include_once ('./controller/Redirection.php');
if (!isset($_SESSION)) {
    session_start();
};

function isAdmin()
{
    if (isset($_SESSION['role']) && $_SESSION['role'] != "A") {  //ถ้าไม่ใช่แอดมิน ให้ไปindex
        redirection('/index.php');
    } else if (!isset($_SESSION['role'])) {  //ถ้าไม่ได้ล็อกอิน ให้ไปcustomer
        redirection('/customer.php');
    }
}

function isNotAdmin(){
    if (isset($_SESSION['role']) && $_SESSION['role'] == "A") {  //ถ้าใช่แอดมิน ให้ไปindex
        redirection('/index.php');
    } else if (!isset($_SESSION['role'])) {  //ถ้าไม่ได้ล็อกอิน ให้ไปcustomer
        redirection('/customer.php');
    }
}


function isLaber()
{
    if (isset($_SESSION['role']) && $_SESSION['role'] != "L") {  //ถ้าไม่ใช่แอดมิน ให้ไปindex
        redirection('/index.php');
    } else if (!isset($_SESSION['role'])) {  //ถ้าไม่ได้ล็อกอิน ให้ไปcustomer
        redirection('/customer.php');
    }
}

function isEmployee()
{
    if (isset($_SESSION['role']) && $_SESSION['role'] != "E") {  //ถ้าไม่ใช่แอดมิน ให้ไปindex
        redirection('/index.php');
    } else if (!isset($_SESSION['role'])) {  //ถ้าไม่ได้ล็อกอิน ให้ไปcustomer
        redirection('/customer.php');
    }
}

function isLogin()
{
    if (!isset($_SESSION['role'])) {  //ถ้าไม่ได้ล็อกอิน ให้ไปcustomer
        redirection('/customer.php');
    }
}

function getRole()
{
    if (!isset($_SESSION['role'])) {
        redirection('/customer.php');
    } else {
        return $_SESSION['role'];
    }
}


function logout()
{
    session_destroy();
}
