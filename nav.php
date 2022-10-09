<?php if (!isset($_SESSION)) {
    session_start();
}

include_once('service/auth.php');
include_once('database/product.php');
isLogin();
$product = new Product();
$lost = $product->fetchLost();
?>
<html>
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css"/>
<link rel="stylesheet" href="./src/css/nav.css"/>
<nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #A36627;">
    <div class="container-fluid">
        <a class="navbar-brand nav-link" href="index.php"> หน้าแรก &nbsp;</a>
        <a style="display: flex;width: 80%;margin-left: -6rem;margin-top: -0.5rem;" href="notification_amt.php">
            <?php if(count($lost)>0){?><span namt="btbell" class="bell"><?=count($lost)?></span><?php }?>
            <img class='print' src="./src/images/bell.png" width="25">
        </a>
        <a herf="#"><img src=""/></a>
        <div class="d-flex">
            <button onclick="logout()"
                    style="background: transparent; border: none;"><?= $_SESSION['role'] !== 'A' ? $_SESSION['username'] : 'ผู้ดูแลระบบ' ?></button>
        </div>
    </div>
    </div>
</nav>
<script src="./node_modules//sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./src/js/nav.js"></script>

</html>