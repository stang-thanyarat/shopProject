<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/css/productreplacementhistory.css" />
    <title>productreplacementhistory</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-3">
                        <h1>การเปลี่ยนสินค้า</h1>
                    </div>
                    <div class="col-4 datetodate">
                        <input type="date" name="since" id="since"> &nbsp&nbspถึง&nbsp&nbsp
                        <input type="date" name="until" id="until">
                        <button type="submit" class="s"><img src="./src/images/search.png" width="17.5"></button>
                    </div>
                    <div class="col-3 addpdr d-flex justify-content-end signin">
                        <a type="button" href="./addproductreplacement.php" class="submit btn"><img class='plus' src="./src/images/plus.png" width="30">&nbsp เพิ่ม </a>
                    </div>
                    <table class="col-11 pdrtb">
                        <tr>
                            <th name="exchange_date" id="exchange_date">วันที่เปลี่ยนสินค้า</th>
                            <th name="exchange_time" id="exchange_time">เวลา</th>
                            <th name="product_name" id="product_name">ชื่อสินค้า</th>
                            <th name="exchange_amount" id="exchange_amount">จำนวน</th>
                            <th name="exchange_status" id="exchange_status">สถานะการขาย</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th name="exchange_date" id="exchange_date">05/11/2021</th>
                            <th name="exchange_time" id="exchange_time">12:30</th>
                            <th name="product_name" id="product_name">เครื่องตัดหญ้า</th>
                            <th name="exchange_amount" id="exchange_amount">1</th>
                            <th name="exchange_status" id="exchange_status">รอของ</th>
                            <th>
                                <a type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1"><img src="./src/images/icon-delete.png" width="25">
                                    <a type="button" href="./editproductreplacement.php"><img src="./src/images/icon-pencil.png" width="25">
                            </th>
                        </tr>
                        <th name="exchange_date" id="exchange_date">23/01/2021</th>
                        <th name="exchange_time" id="exchange_time">16:40</th>
                        <th name="product_name" id="product_name">เครื่องปั๊มน้ำ</th>
                        <th name="exchange_amount" id="exchange_amount">1</th>
                        <th name="exchange_status" id="exchange_status">สำเร็จแล้ว</th>
                    </table>
                </div>
            </div>
    </form>

    <!-- ลบ -->
    <div class="modal fade bd-example-modal-sm1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title2" id="exampleModalLabel">ลบประเภทสินค้า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>ยืนยันที่จะลบ</h3>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn1 btn-primary1">ตกลง</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>