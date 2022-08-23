<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/sall.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<?php
include_once('database/Sell.php');
$sell = new Sell();
include_once('nav.php');
if (isset($_GET['keyword'])) {
    $rows = $sell->search($_GET['keyword']);
} else {
    $rows = $sell->fetchAll();
}
?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-12">
                        <h1>ผู้ขาย</h1>
                    </div>
                </div>
                <div class="row">
                    <form action="sall.php" method="GET">
                        <div class="col-2 mai">
                            <input type="text" name="keyword" class="btn-d" placeholder="&nbsp ชื่อผู้ขาย"></input>
                            <button type="submit" class="s">
                                <img src="./src/images/search.png" width="15">
                            </button>
                        </div>
                        <div class="col-1 w">
                            <a class="submit btn" href="addseller.php"><img class='add' src="./src/images/plus.png" width="25" alt="">&nbsp เพิ่มผู้ขาย</a>
                        </div>
                    </form>
                </div>
                <table class="ma">
                    <tr>
                        <th>ชื่อผู้ขาย</th>
                        <th>เลขประจำตัวผู้เสียภาษี</th>
                        <th>นามบัตร</th>
                        <th></th>
                    </tr>
                    <?php foreach ($rows as $e) { ?>
                        <tr>
                            <th><?= $e['sell_name']; ?></th>
                            <th><?= $e['sell_tax_id']; ?></th>
                            <th><img src="<?= $e['seller_cardname']; ?>" /></th>
                            <th>
                                <button type="button" class="bgs" data-bs-toggle="modal1" data-bs-target="#exampleModal<?= $e['sell_id']; ?>"><img src="./src/images/icon-delete.png" width="25"></button>
                                <a type="button" class="btn1" href="editstaff.php?id=<?= $e['sell_id']; ?>"><img src="./src/images/icon-pencil.png" width="25"></a>
                            </th>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </form>

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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</html>