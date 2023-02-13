<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['shop_name'])) {
    $_SESSION['shop_name'] = "ร้าน ABC";
}
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./src/css/nav2.css" />

<body>
    <form>
        <div class="navbar">
            <a class="n" href="customer.php" style="font-size: 24px;"><?=$_SESSION['shop_name']?></a>
            <form method="GET" action="customer.php"><div class="m" ><input style="font-size: 18pt;" name="keyword" type="text" class="d" placeholder="&nbsp ชื่อสินค้า"/><button type="submit" style="background: transparent; border: 0;"><i  class="fa fa-fw fa-search" style="font-size: 18pt;"></i> </button></div></form>
            <a href="login.php"><i class="fa fa-fw fa-user"></i> Login</a>
        </div>
    </form>
</body>

</html>