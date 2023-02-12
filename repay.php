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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/repay.css" />
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<?php
include_once('nav.php');
include_once ('./database/Contract.php');
include_once ('./database/DebtPaymentDetails.php');
$c = new Contract();
$pay = new DebtPaymentDetails();
$rows = $c->fetchById($_GET['id']);
$rowa = $pay->fetchById($_GET['id']);
//var_dump($rows);
//exit();
/*$json = '';
for ($i = 0; $i < count($$rows); $i++) {
    $cd = $$rows[$i];
    $json .= "{
        bank: \"" . $cd['repayment_date'] . "\",
        number: \"" . $cd['payment'] . "\",
        name: \"" . $cd['slip_img'] . "\",
        id:\"" . $cd['payment_amount'] . "\"
        id:\"" . $cd['deduct_principal'] . "\"
        id:\"" . $cd['less_interest'] . "\"
        id:\"" . $cd['outstanding'] . "\"
    }";
    if ($i + 1 != count($$rows)) {
        $json .= ",";
    }
}*/
?>

<body>
    <form action="controller/DebtPaymentDetails.php" name="form1" id="form1" method="POST" enctype="multipart/form-data">
        <input type="hidden" value="debt" name="table" />
        <input type="hidden" value="update" name="form_action" />
        <input type="hidden" value="<?= $_GET['id'] ?>" name="unique_id" />
        <input type="hidden" value="contract_code" name="contract_code" id="contract_code" />
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-lg-5">
                        <h1>ชำระหนี้</h1>
                    </div>
                </div>
                <div class="row c">
                    <div class="col-xl-6">ชื่อ-นามสกุล&nbsp;: <b><?= $rows['customer_prefix'] ?> <?= $rows['customer_firstname'] ?> <?= $rows['customer_lastname'] ?></b></div>
                    <div class="col-xl-6">รหัสบัตรประชาชน&nbsp;: <b><?= $rows['customer_img'] ?></b></div>
                </div>
                <div class="row c">
                    <div class="col-xl-6">วันที่ทำสัญญา&nbsp;: <b><?= $rows['date_contract'] ?></b></div>
                    <div class="col-xl-6">วันที่ครบกำหนด&nbsp;: <b><?= $rows['date_due'] ?></b></div>
                </div>
                <div class="row c">
                    <div class="col-xl-6">เงินต้น&nbsp;: <b><?= $rows['deduct_principal'] ?></b></div>
                </div>
                <div class="row c">
                    <div class="col-xl-6 ">คงค้าง&nbsp;: <b><?= $rows['less_interest'] ?></b></div>
                    <div class="col-xl-6 ">ดอกเบี้ย&nbsp;: <b><?= $rows['outstanding'] ?> %</b></div>
                </div>
                <div class="row B">
                    <div class=" col-12 d-flex justify-content-end">
                        <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm">เพิ่ม</button>
                    </div>
                </div>
                <table class="main col-10">
                    <thead>
                        <tr>
                            <th width="10%">วันที่ชำระ</th>
                            <th width="10%">วิธีการชำระ</th>
                            <th width="10%">ไฟล์แนบ</th>
                            <th width="10%">ยอดที่ชำระ</th>
                            <th width="10%">หักเงินต้น</th>
                            <th width="10%">หักดอกเบี้ย</th>
                            <th width="10%">คงค้าง</th>
                        </tr>
                    </thead>
                    <tbody id="list-repay">
                    <?php foreach ($rowa as $r){ ?>
                        <tr>
                            <th><?= $r['repayment_date'] ?></th>
                            <th><?= $r['payment'] ?></th>
                            <th><?= $r['slip_img'] ?></th>
                            <th><?= $r['payment_amount'] ?></th>
                            <th><?= $r['deduct_principal'] ?></th>
                            <th><?= $r['less_interest'] ?></th>
                            <th><?= $r['outstanding'] ?></th>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                <div class="row btn-g">
                    <div class="col-2 mm">
                        <button type="reset" class="btn-c reset" onclick="javascript:window.location='contracthistory.php';">ยกเลิก</button>
                    </div>
                    <div class="col-2 mm">
                        <input type="submit" class="btn-c outdebt" value="หมดหนี้" />
                    </div>
                    <div class="col-2 mm">
                        <input type="submit" class="btn-c submit" value="บันทึก" /> 
                    </div>
                </div>
        </div>
    </form>
    <!---modal เพิ่มการชำระหนี้-->
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <form id="addrepay">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มการชำระหนี้</h5>
                        <button type="button" id="addclose" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-12 p">
                            วันที่ชำระ: &nbsp;
                            <input type="date" class="t" name="repaymentdate" id="repaymentdate" required />
                        </div>

                        <div class="col-12 p">
                            วิธีการชำระ: &nbsp;
                            <select name="payment_sl" id="payment_sl" style="background-color: #7C904E;">
                                <option value="เงินสด">เงินสด</option>
                                <option value="โอนเงิน">โอนเงิน</option>
                            </select>
                        </div>
                        <div class="col-12 r" id="slip_upload">
                            ไฟล์แนบ: &nbsp;
                            <input accept="image/*" type="file" name="slip" id="slip" />
                        </div>

                        ยอดที่ชำระ: &nbsp;<div class="col-12 p"> <input type="number" class="u" min="0.25" step="0.25" name="paymentamount" id="paymentamount" required /></div>
                        หักเงินต้น: &nbsp;<div class="col-12 p"> <input type="number" class="u" min="0.25" step="0.25" name="deduct" id="deduct" required /></div>
                        หักดอกเบี้ย: &nbsp;<div class="col-12 p"> <input type="number" class="u" min="0" step="0.25" name="lessinterest" id="lessinterest" required /></div>
                        คงค้าง: &nbsp;<div class="col-12 p"> <input type="number" class="u" min="0.25" step="0.25" name="outstanding" id="outstanding" required /></div>

                        <div class="modal-footer">
                            <button type="submit" id="addrepay" class="btn btn-primary1">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./src/js/repay.js"></script>
<script> getAllprice(<?=$rows['less_interest']?>) </script>
</html>