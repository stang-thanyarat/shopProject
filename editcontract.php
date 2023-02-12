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
    <link rel="stylesheet" href="./src/css/editcontract.css" />
    <title>Document</title>
</head>
<?php include_once('nav.php');
include_once "database/Contract.php";
include_once "database/Employee.php";
include_once './service/datetimeDisplay.php';
$contract = new Contract();
$c = $contract->fetchById($_GET['id']);
$employee = new Employee();
$laber = $employee->fetchLabers();


?>

<body>
    <form action="controller/Contract.php" name="form1" id="form1" method="POST" enctype="multipart/form-data">
        <input type="hidden" value="contract" name="table" />
        <input type="hidden" value="update" name="form_action" />
        <input type="hidden" value="<?= $_GET['id'] ?>" name="contract_code" />
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>สัญญาซื้อขาย</h1>
                </div>
                <div class="row">
                    <div class="col no">
                        ฉบับที่ :
                        <b class="bb"><?= $c['contract_code']; ?></b>
                    </div>
                    <div class="col datec">
                        วันที่ทำสัญญา :
                        <b class="bb"><?= dateTimeDisplay($c['date_contract']) ?></b>
                    </div>
                </div>
                <div class="row-3 xx">ข้าพเจ้า <select name="employee_id" id="employee_id" class="bb selectsis" style="background-color: #D4DDC6;" required>
                        <option value="all" selected hidden>เลือกเจ้าของร้าน</option>
                        <?php $count = 1;
                        foreach ($laber as $s) {
                            $count++; ?>
                            <option value="<?= $s['employee_id']; ?>" <?= $s['employee_id'] == $s['employee_id'] ? "selected" : '' ?>><?= $s['employee_prefix'] ?><?= $s['employee_firstname'] ?>
                                &nbsp&nbsp<?= $s['employee_lastname'] ?></option>
                        <?php } ?>
                    </select> ซึ่งต่อไปในหนังสือสัญญานี้เรียกว่าผู้ขายฝ่ายหนึ่งกับ
                </div>
                <div class="row">
                    <div class="col customerp">ข้าพเจ้า :
                        <select name="customer_prefix" id="customer_prefix" style="background-color: #D4DDC6;" class="bb" required>
                            <option value="เลือกคำนำหน้า" selected hidden>เลือกคำนำหน้า</option>
                            <option value="นาย" <?= $c['customer_prefix'] == "นาย" ? "selected" : '' ?>>นาย</option>
                            <option value="นาง" <?= $c['customer_prefix'] == "นาง" ? "selected" : '' ?>>นาง</option>
                            <option value="นางสาว" <?= $c['customer_prefix'] == "นางสาว" ? "selected" : '' ?>>นางสาว
                            </option>
                        </select>
                        <div class="e">*</div>
                    </div>
                    <div class=" col namec">ชื่อ : <input type="text" name="customer_firstname" id="customer_firstname" class="bb" value="<?= $c['customer_firstname']; ?>" required />
                        <div class="f">*</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col lastc">นามสกุล : <input type="text" name="customer_lastname" id="customer_lastname" class="bb" value="<?= $c['customer_lastname']; ?>" required />
                        <div class="g">*</div>
                    </div>
                    <div class="col idcard">รหัสบัตรประชาชน : <input type="text" name="customer_img" id="customer_img" class="bb" value="<?= $c['customer_img']; ?>" required />
                        <div class="h">*</div>
                    </div>
                </div>

                <div class="row xx">ซึ่งต่อไปในหนังสือสัญญานี้เรียกว่าผู้ซื้อฝ่ายหนึ่ง
                    ทั้งสองฝ่ายตกลงทำสัญญาซื้อขายทรัพย์สินมีดังข้อความต่อไปนี้
                </div>
                <div class="col ct">
                    ข้อ 1 ผู้ขายได้ขาย : <span style="color: red; ">&nbsp*&nbsp&nbsp&nbsp&nbsp</span>
                        <textarea id="product_detail" name="product_detail" cols="50" rows="5" style="vertical-align:top;"><?= $c['product_detail']; ?></textarea>
                </div>
                <div class="row-1 xx">ให้แก่ผู้ซื้อเป็นจำนวนเงิน <b class="baht"><?= $c['baht']; ?></b> บาท <b class="stang"><?= $c['baht']; ?></b> สตางค์ (<b class="stangt"><?= $c['stangt']; ?></b>)
                </div>
                <div class="col-12 xx">และยอมส่งมอบทรัพย์สินที่ขายให้แก่ผู้ซื้อวันที่&nbsp;<b><?= dateTimeDisplay($c['date_send']) ?></b>
                    และผู้ขายได้รับราคาดังกล่าวแล้วไปจากผู้ซื้อเสร็จแล้วตั้งแต่วันที่ <b><?= dateTimeDisplay($c['price_send'])?></b>
                </div>

                <div class="row xx">ข้อ 2 ผู้ขายยอมสัญญาว่า
                    ทรัพย์สินซ่งผู้ขายนำมาขายให้แก่ผู้ซื้อนี้เป็นทรัพย์สินของผู้ขายคนเดียว และไม่เคยนำไปขาย จำนำ
                    หรือทำสัญญาผูกพันธ์ใด ๆ แก่ผู้ใดเลย
                </div>
                <div class="col ctc">
                    ข้อ 3 : <span style="color: red; ">&nbsp*&nbsp&nbsp&nbsp&nbsp</span>
                        <textarea name="contract_details" id="contract_details" cols="50" rows="5" style="vertical-align:top;"><?= $c['contract_details']; ?></textarea>
                </div>
                <div class="row xx">ข้อ 4 ผู้ขายและผู้ซื้อได้ทราบข้อความในสัญญานี้ดีแล้ว
                    จึงได้ลงลายมือชื่อไว้ในสัญญานี้เป็นหลักฐาน
                </div>
                <div class="row xx">1. หากผู้ขายยังไม่ส่งมอบทรัพย์ให้ในเวลาทำสัญญา ควรจะเติมข้อความอีก 1
                    ข้อว่าตราบใดที่ผู้ขายยังไม่ส่งมอบทรัพย์ให้ ยังไม่ถือว่าได้มีการซื้อขาย
                    มิฉะนั้นผู้ซื้ออาจเสียเปรียบผู้ขาย
                </div>
                <div class="row xx">2. สัญญาซื้อขายไม่ต้องปิดอากรแสตมป์ เว้นแต่จะถือว่าสัญญานี้เป็นใบรับเงินแล้ว
                    ถ้าสัญญาซื้อขายนี้ตั้งแต่ 10 บาท ถึง 20 บาท ต้องติดอากรแสตมป์ 10 สตางค์ ถ้าสัญญาซื้ขายนี้เกิน 20 บาท ทุก
                    20 บาท หรือเศษของ 20 บาท ต่อ 10 สตางค์ ถ้าสัญญาซื้อขายต่ำกว่า 10 บาท ไม่ต้องติดอากรแสตมป์
                </div>
                <div class="row btn-g">
                    <div class="col-2 buttom">
                        <input type="submit" class="btn-c submit" value="บันทึก" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules//sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./src/js/editcontract.js"></script>

</html>