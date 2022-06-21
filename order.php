<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/order.css" />
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
                    <div class="col-lg-5">
                        <h1>ใบสั่งซื้อ</h1>
                    </div>
                    <div class="row m">
                        <div class="col-12 d-flex justify-content-end ">
                            <form>
                                <input type="text" class="btnd" placeholder="&nbsp ชื่อผู้ขาย" required>
                                <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>
                            </form>&nbsp &nbsp
                            <div class="col-3">
                                <a class="submit BTNC" href="addorder.php"><img class='add' src="./src/images/plus.png" width="25"> เพิ่มใบสั่งซื้อ</a>
                            </div>
                        </div>

                    </div>
                    <table class="main col-10">
                        <tr>
                            <th width="15%">วันที่สั่งซื้อ</th>
                            <th width="60%">ชื่อผู้ขาย</th>
                            <th width="15%"></th>
                            <th width="10%"></th>
                        </tr>
                        <tr>
                            <th>14 ธ.ค. 2564</th>
                            <th> อาร์เอส อินเตอร์เทรด (2017) จำกัด</th>
                            <th>
                                <div class="r">
                                    <a class="submit BTNP" href="confirm.php"><img class='confirm'>รับของ</a>
                                </div>
                            </th>
                            <th>
                            <button type="button" class="btn1 " data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25"></button>
                            <button type="button" class="btn1 " onclick="javascript:window.location='editconfirm.php';"><img src="./src/images/icon-pencil.png" width="25"></button>
                            </th>
                        </tr>


                    </table>
                    <p></p>
                </div>
            </div>
            <!-- ลบ -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ลบรายการ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body1">
                        <h3>ยืนยันที่จะลบ</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary1">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>