<?php

use function Composer\Autoload\includeFile;

include_once('service/auth.php');
isNotAdmin();
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
    <link rel="stylesheet" href="./src/css/bankslip.css" />
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>


</head>
<?php
include_once('nav.php');
include_once "./database/Sales.php";
$sales =  new Sales();
$rows = $sales->fetchAll();
?>

<body>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
        <div class="col-11">
            <!-- หัวข้อหลัก -->
            <div class="row main">
                <div class="col">
                    <h1>แนบสลิปธนาคาร<h1>
                </div>
            </div>
            <div class="row">
                <?php foreach ($rows as $row) { ?>
                    <div class="col-6 importfile">
                        แนบใบสลิปธนาคาร : <input type="file" class="im" id="import_files" name="import_files" /> 
                        <?php if (!isset($row['import_files'])) { ?><!--อันนี้เค้าจะลองทำเหมือนสัญญาซื้อขายแต่อัพโหลดไฟล์ไม่ขึ้น-->
                            <button type="button" onclick="setID(<?= $row['sales'] ?>)" class="btn btn-primary1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm"><img src="./src/images/cloud-upload-alt.png" width="25">
                            </button>
                        <?php } else { ?>
                            <a href="<?= $row['import_files'] ?>">ดู</a>
                        <?php } ?>
                    </div>
            </div>
            <div class="row">
                <div class="col-6 notice">
                    <h6><span style="color: red; ">&nbsp*</span>ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-6 detail">
                    <label for="note">หมายเหตุ :&nbsp;</label>
                    <textarea id="note" name="note" cols="40" rows="4" style="vertical-align:top;" class="bb"></textarea>
                </div>
            </div>
        </div><?php } ?>


    <!---modal แนบสลิปธนาคาร-->
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form name="addbankslip" method="post" action="./controller/bankslip.php" enctype="multipart/form-data">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แนบสลิปธนาคาร</h5>
                        <button type="button" id="addclose" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="form_action" value="upload">
                            <input type="hidden" name="import_files" id='import_files'>
                            <div class="col ">
                                แนบสลิปธนาคาร : <input type="file" name="import_files" required>
                                <div class="k">*</div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <h6><span style="color: red; ">&nbsp*</span>ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h6>
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
</body>
<script src="./src/js/bankslip.js"></script>
<script>
    window.onload = () => document.querySelector('.btn-close > span').remove()
</script>

</html>