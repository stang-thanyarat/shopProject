<?php session_start();?>
<html>
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css" />
<nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #A36627;">
    <div class="container-fluid" >
        <a class="navbar-brand nav-bell" href="index.php"> หน้าแรก<img class='print' src="./src/images/bell.png" width="25"></a>
        <a herf="#"><img src="" /></a>
        <div class="d-flex">
            <button onclick="logout()" style="background: transparent; border: none;"><?= $_SESSION['username'];?></button>
        </div>
    </div>
    </div>
</nav>
<script src="./node_modules//sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./src/js/nav.js"></script>
</html>
