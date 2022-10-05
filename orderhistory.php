<?php
include_once('service/auth.php');
isLaber();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/orderhistory.css" />
    <title>Document</title>
</head>
<?php include_once('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-12">
                        <h1>ประวัติใบสั่งซื้อ</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 c">
                        <input type="date" name="date" id="date" class="date" required />&nbsp&nbsp&nbsp
                    </div>
                    <div class="col-2 b">
                        <input type="text" class="btnd" placeholder="&nbsp ชื่อผู้ขาย" required>
                        <button type="submit" class="s"><img src="./src/images/search.png" width="15"></button>
                    </div>
                </div>
                <table class="col-11 ma">
                    <tr>
                        <th>วันที่สั่งซื้อ</th>
                        <th>ชื่อผู้ขาย</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tbody id="ordertable">
                    <?php $i = 1;
                    foreach ($rows as $row) { ?>
                        <tr>
                            <th width=10%><?= $row['datebill'] ?></th>
                            <th width=35% ><?= $row['sell_id'] ?></th>
                            <th width=20% ><?php if( $row['order_status'] == 0 ) { echo "<a type='button' onclick='wait()'><font color=#A36627>รอของ</font></a>";} else{ echo "สำเร็จ";}?></th>
                            <th>
                                <button type="button" class="bgs" onclick="del(<?=$row['order_id']?>)"><img src="./src/images/icon-delete.png" width="25"></button>
                                <button type="button" class="bgs" onclick="edit(<?=$row['order_id']?>)"><img src="./src/images/icon-pencil.png" width="25"></button>
                            </th>
                        </tr>
                    <?php $i++;
                    } ?>
                </table>
            </div>
        </div>
    </form>
</body>

<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./src/js/orderhistory.js"></script>

</html>