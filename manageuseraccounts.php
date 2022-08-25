<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/manageuseraccounts.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-12">
                        <h1>จัดการดูแลบัญชีผู้ใช้งาน</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 c">
                        <label for="account_user_type">ตำแหน่ง :</label>
                        <select name="account_user_type" id="account_user_type">
                            <option value="position" selected hidden>เลือกตำแหน่ง</option>
                            <option value="A">เจ้าของร้าน</option>
                            <option value="E">พนักงาน</option>
                        </select>
                    </div>
                    <div class="col-2 b">
                        <input type="text" class="btnd" placeholder="&nbsp ชื่อ-นามสกุล">
                        <button type="submit" class="s"><img src="./src/images/search.png" width="17">
                    </div>
                    <div class="col-2 a">
                        <a class="submit btn" href="adduseraccount.php"><img src="./src/images/plus.png" width="25">&nbsp เพิ่มบัญชีผู้ใช้งาน</a>
                    </div>
                </div>
                <table class="col-11 ma">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ตำแหน่ง</th>
                        <th>สถานะการใช้งาน</th>
                        <th></th>
                    </tr>
                    <tbody id='useraccountTable'></tbody>
                </table>
            </div>
        </div>

        <!-- ลบ -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title2" id="exampleModalLabel">ลบรายการ</h5>
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

    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="./src/js/useraccount.js"></script>

</html>