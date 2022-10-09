<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="./src/css/login.css" rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <title>Document</title>
</head>

<body>
    <div class="row min-vh-100">
        <div class="BgLeft col-md-6">
            <div class="wrap d-md-flex inLeft no-gutter">
                <img src="./src/images/icon-head.png" class="icon" width="150" />
                <h3 class="head">ร้านวรเชษฐ์เกษตรภัณฑ์</h3>
            </div>
        </div>
        <div class="BgRight col-md-6">

            <form action="./controller/Login.php" method="post" id="login">
                <input type="hidden" name="table" value="useraccount" />
                <input type="hidden" name="form_action" value="login" />
                <?php
                if (!isset($_SESSION)) {
                    session_start();
                };
                if (isset($_SESSION['error'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['error'] ?>
                    </div>
                    <br>
                <?php }
                session_destroy(); ?>
                <h1 class="text-login">Login</h1>
                <label class="label" for="email">E-mail</label>
                <input class="field input" type="email" id="email" name="email" required>
                <label class="label" for="password">Password</label>
                <div class="d-flex">
                    <input class="field input" type="password" id="password" name="password" required>
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                </div>
                <div class="BTN">
                    <input name="btLogin_click()" class="field button" type="submit" value="Login" />
                </div>
            </form>
        </div>
    </div>
</body>
<script src="./src/js/login.js"></script>

</html>