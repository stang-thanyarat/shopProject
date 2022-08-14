<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/employee.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<?php
include_once('database/Employee.php');
$employee = new Employee();
include_once('nav.php');
?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-12">
                        <h1>พนักงาน</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 mai">
                        <input type="text" class="btn-d" placeholder="&nbsp ชื่อ-นามสกุล">
                        <button type="submit" class="s">
                            <img src="./src/images/search.png" width="15">
                    </div>
                    <div class="col-1 w">
                        <a class="submit btn" href="addnewstaff.php"><img class='add' src="./src/images/plus.png" width="25">&nbsp เพิ่มพนักงาน</a>
                    </div>
                </div>
                <table class="ma">
                    <tr>
                        <th>ชื่อ-นามสกุล</th>
                        <th>เลขบัตรประชาชน</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>สถานะการใช้งาน</th>
                        <th></th>
                    </tr>
                    <?php foreach ($employee->fetchAll() as $e) { ?>
                        <tr>
                            <th><?= $e['employee_prefix'] . $e['employee_firstname'] . " " . $e['employee_lastname']; ?></th>
                            <th><?= $e['employee_card_id']; ?></th>
                            <th><?= $e['employee_telephone']; ?></th>
                            <th>
                                <label class="switch">
                                    <input type="checkbox" <?= $e['employee_status'] == 1 ? "checked" : ""; ?> />
                                    <span class="slider round"></span>
                                </label>
                            </th>
                            <th>
                                <button type="button" class="bgs" data-bs-toggle="modal1" data-bs-target="#exampleModal<?= $e['employee_id']; ?>"><img src="./src/images/icon-delete.png" width="25"></button>
                                <a type="button" class="btn1" href="editstaff.php?id=<?= $e['employee_id']; ?>"><img src="./src/images/icon-pencil.png" width="25"></a>
                            </th>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </form>

    <!-- ลบ -->


    <!-- ลบ -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title2" id="exampleModalLabel">ลบบัญชีรับเงิน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>ยืนยันที่จะลบ</h3>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary2">ตกลง</button>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>