<?php
function Connection()
{
    /*เซิร์ฟ shop_pj ทดสอบด้วย xampp*/
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shop_pj";

    /*เซิร์ฟ หลัก*/
    /* $servername = "localhost";
     $username = "elnvento_AgrStore";
     $password = "@grSt0re6502";
     $database = "elnvento_AgrStore";*/

    /*เซิร์ฟ รอง*/
    /*$servername = "localhost";
    $username = "root";
    $password = "shopproject";
    $database = "shop_pj";*/

    /*เซิร์ฟ ฟรี*/
    /*$servername = "localhost";
     $username = "id20383590_root";
     $password = "Admin-argo-1";
     $database = "id20383590_shopproject";*/

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->query("SET NAMES UTF8");
        return $conn;
    } catch (PDOException $e) {
        throw new Exception("Connection failed: " . $e->getMessage());
    }
}
