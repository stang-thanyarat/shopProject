<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/salessummary.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>การขาย</h1>
                        <h6><div class="m">สรุปยอดขาย</div>
                            <div class="d-flex flex-row-reverse">
                            <button type="submit" class="g "><img src="./src/images/download.png " width="15">&nbsp ดาวน์โหลด</button>
                            <button type="submit" class="g"><img src="./src/images/print.png" width="15">&nbsp print</button>
                            </div>
                        </h6>
                    <h5>ภาพรวมการขายสินค้า</h5>
                    <button type="submit" class="btne"><img src="./src/images/sale.png " width="35">&nbsp <h3>ยอดขาย</h3></button> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button type="submit" class="btne"><img src="./src/images/list.png" width="35">&nbsp <h3>รายการขาย</h3></button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>