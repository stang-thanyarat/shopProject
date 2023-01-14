<?php
include_once('service/auth.php');
isLaber();
function getFullRole($role)
{
    if ($role == "E") {
        return 'พนักงาน';
    }
    if ($role == "L") {
        return 'เจ้าของร้าน';
    }
    if ($role == "A") {
        return 'ผู้ดูแลระบบ';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/budget.css"/>
    <title>Document</title>
</head>
<?php include_once('nav.php'); ?>

<body>
<form>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <h1>งบการเงิน</h1>
            </div>
            <div class="row">
                <div class="col">
                    <h5 class="tt">งบแสดงฐานะการเงิน</h5>
                    <div class="th"></div>
                    <div class="d-flex flex-row-reverse ttt">
                        <button type="button" onclick="dowloadClick()" class="g "><img src="./src/images/download.png " width="15">&nbsp;
                            ดาวน์โหลด
                        </button>
                        <button type="button" class="g" onclick="dowloadClick()"><img src="./src/images/print.png" width="15">&nbsp; print
                        </button>
                    </div>
                </div>
            </div>
            <!--
                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="g "><img src="./src/images/download.png " width="15">&nbsp; ดาวน์โหลด</button>
                    <button type="submit" class="g"><img src="./src/images/print.png" width="15">&nbsp; print</button>
                </div>-->

            <div class="row main q">
                <div class="col-12 a">
                    <input type="date" name="firstdate" required>&nbsp ถึง &nbsp<input type="date" name="lastdate"
                                                                                       required>
                    <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>
                </div>
                    <div class="content" id="content">
                        <div class="col-12 b">
                            งบแสดงฐานะการเงิน
                        </div>
                        <div class="col-12 b">
                            <h4>ร้านวรเชษฐ์เกษตรภัณฑ์</h4>
                        </div>

                        <br>
                        <!--<div class="col-12 b">
                                <h5>14 ธันวาคม 2564</h5>
                            </div>-->
                        <div class="row">
                            <div class="col">
                                <h5 class="tp">จำนวน(บาท)</h5>
                                <div class="ttp"></div>
                            </div>
                        </div>
                        <p></p>
                        <div class="row f">
                            <div class="col">
                                <h4 class="c">สินทรัพย์</h4>
                            </div>
                        </div>
                        <p></p>
                        <div class="row ">
                            <div class="col y">
                                <h5 class="cb">รวม สินทรัพย์</h5>
                            </div>
                            <div class="col d-flex justify-content-around">
                                1,000,000.00
                            </div>
                        </div>
                        <br>
                        <div class="row f">
                            <div class="col">
                                <h4 class="c">หนี้สิน+ทุน</h4>
                            </div>
                        </div>
                        <p></p>
                        <div class="row">
                            <div class="col y">
                                <h5 class="cb">รวม หนี้สิน+ทุน</h5>
                            </div>
                            <div class="col d-flex justify-content-around">
                                250,000.00
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

<script src="./src/js/budget.js"></script>

</html>