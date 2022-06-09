<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link type="text/css" href="./src/css/login.css" rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <title>Document</title>
</head>

<body>

    <div class="row min-vh-100">
        <div class="BgLeft col-md-6">
            <div class="wrap d-md-flex inLeft no-gutter">
                <img src="./src/images/icon-head.png" class="icon" width="150"/>
                <h3 class="head">ร้านวรเชษฐ์เกษตรภัณฑ์</h3>
            </div>
        </div>
        <div class="BgRight col-md-6">
        <form action="#" method="post" id="login1" onsubmit="return errorCheck1()">
                <h1 class="text-login">Login</h1>
                <label class="label" for="email">E-mail</label>
                <input class="field input" type="email" id="email" name="email" onblur='check_email(this)' required>
                <label class="label" for="password">Password</label>
                <div class="d-flex">
                    <input class="field input" type="password" id="password" name="password" onblur='check_num(this)' required>
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                </div>
                <div class="BTN">
                    <input class="field button" type="submit" value="Login" />
                </div>
            </form>
        </div>
    </div>
</body>
<script src="./src/js/login.js"></script>
</html>