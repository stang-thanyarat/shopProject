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
    <link rel="stylesheet" href="./src/css/budget.css" />
    <title>Document</title>
</head>
<?php
include_once('nav.php');
include_once('./database/Budget.php');
$budget = new Budget();
$b = $budget->AllBG();
?>

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
                            <button type="button" onclick="loadPDF()" class="g "><img src="./src/images/download.png " width="25">&nbsp;
                                ดาวน์โหลด
                            </button>
                        </div>
                    </div>
                    <div class="row main q">
                        <div class="col-12 a">วันที่ขาย : 
                            <input type="date" value="<?= date('Y-m-d') ?>" id="firstdate" name="firstdate" required>&nbsp
                            ถึง &nbsp<input type="date" value="<?= date('Y-m-d') ?>" id="lastdate" name="lastdate" required>
                            <button type="submit" class="s" id="search" name="search"><img src="./src/images/search.png" width="13"></button>
                        </div>
                        <div class="row f">
                            <div class="col-12">
                                <h4>สินทรัพย์</h4>
                            </div>
                        </div>
                        <div class="t">
                            <table class="table1">
                                <tr>
                                    <th width='10%'></th>
                                    <th width='50%'>รวม สินทรัพย์</th>
                                    <th width='25%' style="text-align: end;">10000 </th>
                                    <th width='10%'>บาท</th>

                                </tr>
                                <tr>
                                    <th></th>
                                    <th>&nbsp&nbsp&nbsp&nbspสินค้าที่พร้อมขาย</th>
                                    <th style="text-align: end;"><?= $budget->AllBG();?> </th>
                                    <th>บาท</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>&nbsp&nbsp&nbsp&nbspเงินที่ได้รับแล้ว</th>
                                    <th style="text-align: end;">10000</th>
                                    <th>บาท</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>&nbsp&nbsp&nbsp&nbspเงินที่ยังไม่ได้รับ</th>
                                    <th style="text-align: end;">10000</th>
                                    <th>บาท</th>
                                </tr>

                            </table>
                        </div>
                        <div class="row f">
                            <div class="col-12">
                                <h4 class="c">หนี้สิน+ทุน</h4>
                            </div>
                        </div>
                        <div class="t">
                            <table class="table1">
                                <tr>
                                    <th width='10%'></th>
                                    <th width='50%' >รวม หนี้สิน+ทุน</th>
                                    <th width='25%' style="text-align: end;">10000</th>
                                    <th width='10%'>บาท</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>&nbsp&nbsp&nbsp&nbspทุน</th>
                                    <th width='25%' style="text-align: end;">10000</th>
                                    <th>บาท</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>&nbsp&nbsp&nbsp&nbspหนี้สิน(เงินสด)</th>
                                    <th width='25%' style="text-align: end;">10000</th>
                                    <th>บาท</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>&nbsp&nbsp&nbsp&nbspหนี้สิน(เครดิต)</th>
                                    <th width='25%' style="text-align: end;">10000</th>
                                    <th>บาท</th>
                                </tr>

                            </table>
                        </div>
                        <!--- <div class="row ">
                        <div class="col y">
                            <h5 class="cb">รวม สินทรัพย์</h5>
                        </div>
                        <div class="col d-flex justify-content-around">
                            1,000,000.00
                        </div>
                    </div>
                    <div class="mam">
                        <div class="row">
                            <div class="col">สินค้าที่พร้อมขาย</div>
                            <div class="col mamm">
                                <span id="price" class="price" name="price">0</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">เงินที่ได้รับแล้ว</div>
                            <div class="col mamm">
                                <span id="pricesales" class="pricesales" name="pricesales">0</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">เงินที่ยังไม่ได้รับ</div>
                            <div class="col mamm">
                                1,000,000.00
                            </div>
                        </div>
                    </div>
                        <br>
                        
                        <p></p>
                        <div class="row">
                            <div class="col y">
                                <h5 class="cb">รวม หนี้สิน+ทุน</h5>
                            </div>
                            <div class="col kk">
                                250,000.00
                            </div>
                        </div>
                        <div class="mam">
                            <div class="row">
                                <div class="col">ทุน</div>
                                <div class="col mamm">
                                    
                                    <span id="all_price_odr" class="all_price_odr" name="all_price_odr">0</span>
                                </div>
                            </div>
                            <div class="mam">
                                <div class="row">
                                    <div class="col">หนี้สิน(เครดิต)</div>
                                    <div class="col mamm">
                                        <?= $b['all_price_odr'] ?>
                                        <span id="all_price_odr" class="all_price_odr" name="all_price_odr">0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">หนี้สิน(เครดิต)</div>
                                <div class="col mamm">
                                    1,000,000.00
                                </div>
                            </div>
                        </div>--->
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./src/js/budget.js"></script>

</html>