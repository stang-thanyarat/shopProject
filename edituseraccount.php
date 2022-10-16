<?php
include_once('service/auth.php');
isAdmin();
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
    <link rel="stylesheet" href="./src/css/edituseraccount.css" />
    <title>Document</title>
</head>
<?php
include_once('nav.php');
include_once('database/UserAccount.php');
include_once('database/Employee.php');
$useraccount = new UserAccount();
$employee = new Employee();
$rows = $useraccount->fetchById($_GET['id']);
$e = $employee->fetchById($_GET['id']);
?>

<body>
<form action="controller/UserAccount.php" name="form1" id="form1" method="POST">
    <input type="hidden" value="useraccount" name="table" />
    <input type="hidden" value="update" name="form_action" />
    <input type="hidden" value="<?= $_GET['id'] ?>" name="unique_id" />
    <div class="row main">

        <div class="row main">
            <div class="row">
                <h1>แก้ไขบัญชีผู้ใช้งาน</h1>
            </div>
            <div class="row top">
                <div class="col-lg-4 col-md-4">
                    <label for="employee_id">ชื่อพนักงาน:</label>
                    <select  class="bb" required onchange="readEmail()" style="background-color: #D4DDC6;">
                        <option value="" selected hidden>เลือกพนักงาน</option>
                        <?php foreach ($rows as $row) { ?>
                            <option value="<?= $row['employee_id'] ?>" <?= $row['employee_id'] == $row['employee_id'] ? "selected" : '' ?>><?= $row['employee_prefix'] ?> <?= $row['employee_firstname'] ?> <?= $row['employee_lastname'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="a">*</div>
                </div>
                <div class="col leftposition">
                    <label for="account_user_type">ตำแหน่ง : </label>
                    <input type="radio" name="account_user_type" value="L" class="bb" checked>
                    <label for="account_user_type">เจ้าของร้าน </label>&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="account_user_type" value="E">
                    <label for="account_user_type">พนักงาน</label>
                    <div class="j">*</div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-lg-3 login leftemail">
                    <label for="email">อีเมล :</label>
                    <input name = "account_username" id = "account_username" type = "email" onblur = 'check_email(this)' class = "bb" value = "<?= $rows['account_username']; ?>" required />
                    <div class="d">*</div>
                </div>
                <div class="col-lg-4 login leftpassword">
                    <label for="password">รหัสผ่าน :</label>
                    <input  name = "account_password" id = "account_password" type = "password" onblur = 'check_num(this)' class = "bb" value = "<?= $rows['account_password']; ?> " required />
                    <div class="e">*</div>
                </div>
                <div class="col-lg-4 leftstatus">
                    <label for="account_user_status">สถานะการใช้งาน :</label>
                    <label class="switch bb">
                        <input type="checkbox" id="account_user_status">
                        <span class="slider round"></span>
                    </label>
                    <div class="h">*</div>
                </div>
            </div>
            <div class="row btn-g">
                <div class="col-lg-2 col-md-4">
                    <button type="reset" class="btn-c reset" onclick="javascript:window.location='manageuseraccounts.php';">ยกเลิก</button>
                </div>
                <div class="col-lg-10 col-md-4">
                    <input type="submit" class="btn-c submit" value="บันทึก" />
                </div>
            </div>
    </form>
</body>
<script src="./src/js/edituseraccount.js"></script>

</html>