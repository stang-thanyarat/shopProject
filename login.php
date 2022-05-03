<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link type="text/css" href="./src/css/login.css" rel='stylesheet' />
    <title>Document</title>
</head>

<body>
    
    <div class="row min-vh-100">
        <div class="BgLeft col-md-6">
            <div class="wrap d-md-flex inLeft no-gutter">
                <img src="./src/images/icon-head.png" class="icon" style="" />
                <h3 class="head">ร้านวรเชษฐ์เกษตรภัณฑ์</h3>
            </div>
        </div>
        <div class="BgRight col-md-6">
            <form>
                <h1 class="text-login">Login</h1>
                <label class="label" for="email">E-mail</label>
                <input class="field input" type="email" name="email" require>
                <label class="label" for="password">Password</label>
                <input class="field input" type="password" name="password" require>
                <div class="BTN">
                    <input class="field  button" type="submit" value="Login" />
                </div>

            </form>
        </div>
    </div>
</body>

</html>