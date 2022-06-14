<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/css/producttype.css" />
    <title>producttype</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-12">
                        <h1>ประเภทสินค้า</h1>
                    </div>
                    <div class="col-2 mai">
                    </div>
                    <div class="col-1">
                        <a class="submit btn"  type="button"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm2"><img class='add' src="./src/images/plus.png" width="25">&nbsp เพิ่มประเภทสินค้า</a>
                    </div>
                </div>
                <table class="ma">
                    <tr>
                    <th>ประเภทสินค้า</th>
                        <th>รายการทั้งหมด</th>
                        <th>รายการที่ขาย</th>
                        <th  colspan="2">ลบ หรือ แก้ไข</th>
                    </tr>
                    <tr>
                    <th>เมล็ดพันธุ์</th>
                        <th>10</th>
                        <th>7</th>
                        <th><a type="button"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1"><img src="./src/images/icon-delete.png" width="25">
                        </th>
                        <th>
                        <a type="button"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm3"><img src="./src/images/icon-pencil.png" width="25">
                        </th>
                    </tr>
                </table>
            </div>

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
                                            <button type="submit" class="btn btn-primary2">ตกลง</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!--- modal เพิ่มประเภทสินค้า-->
<div class="modal fade bd-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทสินค้า</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="productlist" method="post" action="">
                           
                        <center>ชื่อประเภทสินค้า: &nbsp;<input type="text" name="list" id="list" required /><br><p></p></center>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary1">ตกลง</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--- modal แก้ไขประเภทสินค้า-->
<div class="modal fade bd-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขประเภทสินค้า</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="productlist" method="post" action="">
                           
                        <center>ชื่อประเภทสินค้า: &nbsp;<input type="text" name="list" id="list" required /><br><p></p></center>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary1">ตกลง</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


</body>
</html>