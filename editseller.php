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
    <link rel="stylesheet" href="./src/css/editseller.css" />
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<?php
include_once('nav.php');
include_once('database/Sell.php');
include_once('database/Bank.php');
$sell = new Sell();
$e = $sell->fetchById($_GET['id']);
$bank = new Bank();
$banks = $bank->fetchBySellId($_GET['id']);
$json = '';
for ($i = 0; $i < count($banks); $i++) {
    $b = $banks[$i];
    $json .= "{
        bank: \"" . $b['bank_name'] . "\",
        number: \"" . $b['bank_number'] . "\",
        name: \"" . $b['bank_account'] . "\",
        id:\"" . $b['bank_id'] . "\"
    }";
    if ($i + 1 != count($banks)) {
        $json .= ",";
    }
}

?>

<body>
    <form action="" name="form1" id="form1">
        <input type="hidden" name="seller_card_id" value="<?= $e['seller_card_id']; ?>" />
        <input type="hidden" name="seller_cardname" value="<?= $e['seller_cardname']; ?>" />
        <input type="hidden" name="sell_documents" value="<?= $e['sell_documents']; ?>" />
        <input type="hidden" name="bank" value="" id="bank" />
        <input type="hidden" name="table" value="sell" />
        <input type="hidden" name="form_action" value="update" />
        <input type="hidden" value="<?= $_GET['id'] ?>" name="sell_id" />
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>แก้ไขผู้ขาย</h1>
                </div>
                <div class="row leftseller">
                    <div class="col">
                        <label for="sell_type">ประเภทผู้ขาย :</label>
                        <input type="radio" name="seller type" value="บริษัท / ห้างร้าน" class="bb" <?= $e['sell_type'] == "บริษัท / ห้างร้าน" ? "checked" : "" ?>>
                        <label for="seller type">บริษัท / ห้างร้าน </label>
                        <input type="radio" name="seller type" value="บุคคลทั่วไป" <?= $e['sell_type'] == "บุคคลทั่วไป" ? "checked" : "" ?>>
                        <label for="seller type">บุคคลทั่วไป</label>
                        <div class="d">*</div>
                    </div>
                    <div class="col leftsellername">
                        <label for="sell_name">ชื่อผู้ขาย :</label>
                        <input type="text" name="sell_name" id="sell_name" value="<?= $e['sell_name']; ?>" class="bb" required />
                        <div class="a">*</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col leftidentification">
                        <label for="sell_tax_id">เลขประจำตัวผู้เสียภาษี :</label>
                        <input type="text" name="sell_tax_id" id="sell_tax_id" value="<?= $e['sell_tax_id']; ?>" class="bb" required />
                        <div class="c">*</div>
                    </div>
                    <div class="col lefttelephone">
                        <label for="sell_telephone">เบอร์โทรศัพท์ :</label>
                        <input type="text" name="sell_telephone" id="sell_telephone" value="<?= $e['sell_telephone']; ?>" onkeyup="autoTab2(this)" class="bb" required />
                        <div class="e">*</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col leftaddress">
                        ที่อยู่ :<font color="red">&nbsp*</font>
                        <textarea name="sell_address" id="sell_address" cols="40" rows="5" class="cc" style="vertical-align:top;" required><?= $e['sell_address']; ?></textarea>
                    </div>
                    <div class="col leftwebsite">
                        <label for="sell_website">เว็บไซต์ :</label>
                        <input type="text" name="sell_website" id="sell_website" class="bb" value="<?= $e['sell_website']; ?>" />
                    </div>
                </div>
                <div class="row th">
                    <h5 class="tt">ข้อมูลผู้ติดต่อ</h5>
                </div>
                <div class="row">
                    <div class="col leftfirst">
                        <label for="seller_firstname">ชื่อ :</label>
                        <input type="text" name="seller_firstname" id="seller_firstname" class="bb" value="<?= $e['seller_firstname']; ?>" required />
                        <div class="f">*</div>
                    </div>
                    <div class="col leftlast">
                        <label for="seller_lastname">นามสกุล :</label>
                        <input type="text" name="seller_lastname" id="seller_lastname" class="bb" value="<?= $e['seller_lastname']; ?>" required />
                        <div class="g">*</div>
                    </div>
                </div>
                <div class="row leftnick">
                    <div class="col">
                        <label for="seller_nickname">ชื่อเล่น :</label>
                        <input type="text" name="seller_nickname" id="seller_nickname" class="bb" value="<?= $e['seller_nickname']; ?>" required />
                        <div class="h">*</div>
                    </div>
                    <div class="col leftemail">
                        <label for="seller_email">อีเมล :</label>
                        <input type="text" name="seller_email" id="seller_email" class="bb" value="<?= $e['seller_email']; ?>" required />
                        <div class="i">*</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col leftnumber2">
                        <label for="seller_telephone">เบอร์โทรศัพท์ :</label>
                        <input type="text" name="seller_telephone" id="seller_telephone" value="<?= $e['seller_telephone']; ?>" onkeyup="autoTab2(this)" class="bb" required />
                        <div class="j">*</div>
                    </div>
                    <div class="col leftidline">
                        <label for="seller_lind_id">ไอดีไลน์ :</label>
                        <input type="text" name="seller_lind_id" id="seller_lind_id" class="bb" value="<?= $e['seller_lind_id']; ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col leftfile">
                        บัตรประชาชน : <input type="file" accept="image/*" name="seller_card_id" id="seller_card_id" class="bb">
                        <div class="k">*</div>
                    </div>
                </div>
                <div class="row-3 leftpng">
                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB </h5>
                </div>
                <div class="row tb">
                    <h5 class="ttb">บัญชีรับเงินของผู้ขาย</h5>
                </div>
                <div class="row-2 ma">
                    <button type="button" id="addmodel_btn" class="btn btn-primary1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm">เพิ่มบัญชีใหม่</button>
                </div>
                <table class="mai">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ธนาคาร</th>
                            <th>เลขบัญชี</th>
                            <th>ชื่อบัญชี</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="banktable">
                        <?php $i = 0;
                        foreach ($banks as $b) { ?>
                            <tr id="rr<?= $i ?>">
                                <th class="index-table-bank"><?= $i + 1 ?></th>
                                <th><?= $b['bank_name'] ?></th>
                                <th><?= $b['bank_number'] ?></th>
                                <th><?= $b['bank_account'] ?></th>
                                <th>
                                    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(<?= $i ?>)"></button>
                                    <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl1"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(<?= $i ?>)"></button>
                                </th>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col leftfile2">
                        นามบัตร : <input type="file" accept="image/*" name="seller_cardname" id="seller_cardname" class="bb">
                    </div>
                    <div class="col leftfile3">
                        เอกสารอื่นๆ : <input type="file" accept="image/*" name="sell_documents" id="sell_documents" class="bb">
                    </div>
                </div>
                <div class="row leftpng">
                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                </div>
                <div class="row">
                    <div class="col leftnote">
                        <label for="sell_note">หมายเหตุ :&nbsp;</label>
                        <textarea name="sell_note" id="sell_note" cols="50" rows="5" style="vertical-align:top;" class="bb"><?= $e['sell_note']; ?></textarea>
                    </div>
                </div>
                <div class="row btn-g">
                    <div class="col-2">
                        <button type="reset" class="btn-c reset" onclick="javascript:window.location='sall.php';">ยกเลิก</button>
                    </div>
                    <div class="col-2">
                        <input type="submit" class="btn-c submit" value="บันทึก" />
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!---modal เพิ่มบัญชีใหม่-->
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form name="addbankaccount" method="post" id="addbankaccount">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มบัญชีใหม่</h5>
                        <button type="button" id="addclose" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <label for="bank_name">ธนาคาร : </label>
                            <select name="bank_name" id="bank_name" required style="background-color: #D4DDC6;">
                                <option value="" selected hidden>เลือกธนาคาร</option>
                                <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                            </select>
                        </div><br>
                        <div class="row">
                            เลขบัญชี : <input type="text" id="bank_number" name="bank_number" required></input>
                        </div><br>
                        <div class="row">
                            ชื่อบัญชี : <input type="text" id="bank_account" name="bank_account" required></input>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="submit" id="addtable" class="btn btn-primary2">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- ลบ -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title2" id="exampleModalLabel">ลบบัญชีรับเงิน</h5>
                    <button type="button" class="btn-close" id="closedelrow" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>ยืนยันที่จะลบ</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="delrow()" class="btn btn-primary2">ตกลง</button>
                </div>
            </div>
        </div>
    </div>

    <!---modal แก้ไขบัญชีรับเงิน-->
    <div class="modal fade bd-example-modal-xl1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form name="editbankaccount" id="editbankaccount" method="post" action="">
            <div class="modal-dialog modal-xl1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขบัญชีรับเงิน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="editclose" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col leftbank ">
                                <label for="editbank_name">ธนาคาร : </label>
                                <select name="editbank_name" id="editbank_name" style="background-color: #D4DDC6;">
                                    <option value="" selected hidden>เลือกธนาคาร</option>
                                    <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                    <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                    <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                    <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col leftanb">
                                เลขบัญชี : <input type="text" id="editbank_number" name="editbank_number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col leftan">
                                ชื่อบัญชี : <input type="text" id="editbank_account" name="editbank_account">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary2">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        localStorage.clear()
        localStorage.setItem("tableBank", JSON.stringify({
            data: [<?php echo $json; ?>]
        }))
    });
</script>
<script src="./src/js/editseller.js">
    </script>

</html>