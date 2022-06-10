<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/budget.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>งบการเงิน</h1>
                </div>
                <div class="t">
                    <div class="m">
                    <h6>งบแสดงฐานะการเงิน</h6>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="g "><img src="./src/images/download.png " width="15">&nbsp; ดาวน์โหลด</button>
                        <button type="submit" class="g"><img src="./src/images/print.png" width="15">&nbsp; print</button>
                    </div>
                </div>
                <div class="row main q">
                    <div class="col-12 a">
                        <input type="date" name="firstdate" required>&nbsp ถึง &nbsp<input type="date" name="lastdate" required>
                        <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>
                    </div>
                    <div class="col-12 b">
                        <h3>งบแสดงฐานะการเงิน</h3>
                    </div>
                    <div class="col-12 b">
                        <h4>ร้านวรเชษฐ์เกษตรภัณฑ์</h4>
                    </div>
                    <div class="col-12 b">
                        <h5>14 ธันวาคม 2564</h5>
                    </div>
                    <div class="row p">
                        <div class="d-flex justify-content-end">
                            จำนวน(บาท)
                        </div>
                    </div>
                    <p></p>
                    <div class="row f">
                        <div class="col">
                            <h5>สินทรัพย์</h5>
                        </div>
                    </div>
                    <p></p>
                    <div class="row ">
                        <div class="col y">
                            <h6>รวม สินทรัพย์</h6>
                        </div>
                        <div class="col">
                            1,000,000
                        </div>
                    </div>
                    <div class="row f">
                        <div class="col">
                            <h5>หนี้สิน+ทุน</h5>
                        </div>
                    </div>
                    <p></p>
                    <div class="row">
                        <div class="col y">
                            <h6>รวม หนี้สิน+ทุน</h6>
                        </div>
                        <div class="col">
                            250,000
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>