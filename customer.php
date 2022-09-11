<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/customer.css" />
    <title>Document</title>
</head>
<?php include('nav2.php'); ?>

<body>
    <form>
        <div class="col a">
            <h5 class="b">ประเภทสินค้า</h5>
        </div>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar2.php'); ?></div>
            <div class="col-11">
                <div class="col main row-5" style="margin-top:20px;">
                    <?php for ($i = 0; $i < 15; $i++) { ?>
                        <a href="customer2.php" class="button" style="margin:10px;">
                            <span style="font-size: large; ">กระเจี๊ยบ-อพอลโล </span><br><br>
                            <img src="./src/images/roselle.png" width="130"><br>
                            <div class="d-flex justify-content-end">
                                <span style="font-size: medium; ">฿20</span>
                            </div>
                            <div class="d-flex justify-content-end">
                                <span style="font-size: medium; ">คงเหลือ 25 ซอง</span>
                            </div>
                        </a>
                    <?php } ?>
                </div>
    </form>
</body>

</html>