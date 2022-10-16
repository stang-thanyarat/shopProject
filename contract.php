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
    <link rel="stylesheet" href="./src/css/contract.css" />
    <title>เพิ่มสัญญาซื้อขาย</title>
</head>

<?php include_once('nav.php');
include_once "./database/Employee.php";
include_once "./database/Contract.php";
$contract = new Contract();
$c= $contract->fetchAll();
$employee = new Employee();
$laber = $employee->fetchLabers();

?>

<body>
    <form action="controller/Contract.php" name="form1" id="form1" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="table" value="contract" />
        <input type="hidden" name="form_action" value="insert" />
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>สัญญาซื้อขาย</h1>
                </div>
                <div class="row">
                    <div class="col no">
                        ฉบับที่ :
                        <input type="text" name="contract_code" id="contract_code" class="bb" value="<?= count($contract->fetchAll()) + 1 ?>" />
                        <div class="a">*</div>
                    </div>
                    <div class="col datec">
                        วันที่ทำสัญญา :
                        <input type="date" name="date_contract" id="date_contract" class="bb" required />
                        <div class="b">*</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col owner">
                        นามเจ้าของร้าน :<span style="color: red; ">&nbsp&nbsp*</span>
                        <select name="employee_id" id="employee_id" class="bb selectsis" style="background-color: #D4DDC6;" required>
                            <option value="all" selected hidden>เลือกเจ้าของร้าน</option>
                            <?php foreach ($laber as $s) { ?>
                                <option value="<?= $s['employee_id'] ?>"><?= $s['employee_prefix'] ?><?= $s['employee_firstname'] ?>&nbsp&nbsp<?= $s['employee_lastname'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col number">
                        จำนวนเงินที่ขาย :
                        <input type="number" name="amount" id="amount" class="bb" />
                        <div class="d">*</div>
                    </div>
                </div>
                <div class="col ps">
                    ทรัพย์ที่ขาย : <span style="color: red; ">&nbsp*&nbsp&nbsp&nbsp&nbsp
                        <textarea name="propertysale" cols="50" rows="5" style="vertical-align:top;"></textarea>
                </div>
                <div class="row xx">ข้าพเจ้า xxxxxxxxx ซึ่งต่อไปในหนังสือสัญญานี้เรียกว่าผู้ขายฝ่ายหนึ่งกับ</div>
                <div class="row">
                    <div class="col customerp">ข้าพเจ้า :
                        <select name="customer_prefix" id="customer_prefix" style="background-color: #D4DDC6;" class="bb" required>
                            <option value="เลือกคำนำหน้า" selected hidden>เลือกคำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                        <div class="e">*</div>
                    </div>
                    <div class=" col namec">ชื่อ : <input type="text" name="customer_firstname" id="customer_firstname" class="bb" required />
                        <div class="f">*</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col lastc">นามสกุล : <input type="text" name="customer_lastname" id="customer_lastname" class="bb" required />
                        <div class="g">*</div>
                    </div>
                    <div class="col idcard">รหัสบัตรประชาชน : <input type="text" name="customer_img" id="customer_img" class="bb" required />
                        <div class="h">*</div>
                    </div>
                </div>
                <div class="row xx">ซึ่งต่อไปในหนังสือสัญญานี้เรียกว่าผู้ซื้อฝ่ายหนึ่ง ทั้งสองฝ่ายตกลงทำสัญญาซื้อขายทรัพย์สินมีดังข้อความต่อไปนี้</div>
                <div class="col ct">
                    ข้อ ๑ ผู้ขายได้ขาย : <span style="color: red; ">&nbsp*&nbsp&nbsp&nbsp&nbsp
                        <textarea name="contract" cols="50" rows="5" style="vertical-align:top;"></textarea>
                </div>
                <div class="row xx">ให้แก่ผู้ซื้อเป็นจำนวนเงิน xxx บาท xxxx สตางค์ (xxxxxxxx)</div>

                <div class="col xx">และยอมส่งมอบทรัพย์สินที่ขายให้แก่ผู้ซื้อวันที่&nbsp;<span>&nbsp;<input type="date" name="date_send" id="date_send" required></span> และผู้ขายได้รับราคาดังกล่าวแล้วไปจากผู้ซื้อเสร็จแล้วตั้งแต่วันที่
                &nbsp;<span>&nbsp;<input type="date" name="payDate"></span></div>
                <div class="row xx">ข้อ ๒ ผู้ขายยอมสัญญาว่า ทรัพย์สินซ่งผู้ขายนำมาขายให้แก่ผู้ซื้อนี้เป็นทรัพย์สินของผู้ขายคนเดียว และไม่เคยนำไปขาย จำนำ หรือทำสัญญาผูกพันธ์ใด ๆ แก่ผู้ใดเลย</div>
                <div class="col ctc">
                    ข้อ ๓ : <span style="color: red; ">&nbsp*&nbsp&nbsp&nbsp&nbsp
                        <textarea name="contract_details" id="contract_details" cols="50" rows="5" style="vertical-align:top;"></textarea>
                </div>
                <div class="row xx">ข้อ ๔ ผู้ขายและผู้ซื้อได้ทราบข้อความในสัญญานี้ดีแล้ว จึงได้ลงลายมือชื่อไว้ในสัญญานี้เป็นหลักฐาน</div>
                <div class="row">
                    <div class="col d-flex justify-content-end rr">ลงชื่อ &nbsp; &nbsp;
                        <select name="witness1" id="witness1" style="background-color: #D4DDC6;" required>
                            <option value="เลือกคำนำหน้า" selected hidden>เลือกคำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>&nbsp;&nbsp;
                        ชื่อ : &nbsp; &nbsp;<input type="text" name="name1" id="name1" required />&nbsp;&nbsp;
                        นามสกุล : &nbsp; &nbsp;<input type="text" name="lastname1" id="lastname1" required />&nbsp;&nbsp; พยานคนที่ 1
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end rr">ลงชื่อ &nbsp; &nbsp;
                        <select name="witness2" id="witness2" style="background-color: #D4DDC6;" required>
                            <option value="เลือกคำนำหน้า" selected hidden>เลือกคำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>&nbsp;&nbsp;
                        ชื่อ : &nbsp; &nbsp;<input type="text" name="name2" id="name2" required />&nbsp;&nbsp;
                        นามสกุล : &nbsp; &nbsp;<input type="text" name="lastname2" id="lastname2" required />&nbsp;&nbsp; พยานคนที่ 2
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end rr">ลงชื่อ &nbsp; &nbsp;
                        <select name="witness3" id="witness3" style="background-color: #D4DDC6;" required>
                            <option value="เลือกคำนำหน้า" selected hidden>เลือกคำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>&nbsp;&nbsp;
                        ชื่อ : &nbsp; &nbsp;<input type="text" name="name3" id="name3" required />&nbsp;&nbsp;
                        นามสกุล : &nbsp; &nbsp;<input type="text" name="lastname3" id="lastname3" required />&nbsp;&nbsp; พยานคนที่ 3
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end rrs">ลงชื่อ &nbsp; &nbsp;
                        <select name="sellerprefix" id="sellerprefix" style="background-color: #D4DDC6;" required>
                            <option value="เลือกคำนำหน้า" selected hidden>เลือกคำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>&nbsp;&nbsp;
                        ชื่อ : &nbsp; &nbsp;<input type="text" name="nameseller" id="nameseller" required />&nbsp;&nbsp;
                        นามสกุล : &nbsp; &nbsp;<input type="text" name="lastnameseller" id="lastnameseller" required />&nbsp;&nbsp; ผู้ขาย
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end rrp">ลงชื่อ &nbsp; &nbsp;
                        <select name="purchaserprefix" id="purchaserprefix" style="background-color: #D4DDC6;" required>
                            <option value="เลือกคำนำหน้า" selected hidden>เลือกคำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>&nbsp;&nbsp;
                        ชื่อ : &nbsp; &nbsp;<input type="text" name="namepurchaser" id="namepurchaser" required />&nbsp;&nbsp;
                        นามสกุล : &nbsp; &nbsp;<input type="text" name="lastnamepurchaser" id="lastnamepurchaser" required />&nbsp;&nbsp; ผู้ซื้อ
                    </div>
                </div>
                <div class="row xx">๑. หากผู้ขายยังไม่ส่งมอบทรัพย์ให้ในเวลาทำสัญญา ควรจะเติมข้อความอีก ๑ ข้อว่าตราบใดที่ผู้ขายยังไม่ส่งมอบทรัพย์ให้ ยังไม่ถือว่าได้มีการซื้อขาย มิฉะนั้นผู้ซื้ออาจเสียเปรียบผู้ขาย</div>
                <div class="row xx">๒. สัญญาซื้อขายไม่ต้องปิดอากรแสตมป์ เว้นแต่จะถือว่าสัญญานี้เป็นใบรับเงินแล้ว ถ้าสัญญาซื้อขายนี้ตั้งแต่ ๑๐ บาท ถึง ๒๐ บาท ต้องติดอากรแสตมป์ ๑๐ สตางค์ ถ้าสัญญาซื้ขายนี้เกิน ๒๐ บาท ทุก ๒๐ บาท หรือเศษของ ๒๐ บาท ต่อ ๑๐ สตางค์ ถ้าสัญญาซื้อขายต่ำกว่า ๑๐ บาท ไม่ต้องติดอากรแสตมป์</div>
                <div class="row btn-g">
                    <div class="col-2 buttom">
                        <input type="submit" class="btn-c submit" value="บันทึก" />
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules//sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./src/js/contract.js"></script>

</html>