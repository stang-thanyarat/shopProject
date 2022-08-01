<?php
function Connection(){
$servername = "localhost";
$username = "root";
$password = "";
$database = "shop_pj";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn; 
} catch(PDOException $e) {
  throw new ("Connection failed: " . $e->getMessage());
}
}
?>