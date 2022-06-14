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
                    <div class="col-lg-5">
                    <div class="title page">
                        <h1 style="display: inline;">การเปลี่ยนสินค้า</h1>        
                        &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
                        <input type="date" name="birthday" id="birthday" required /> &nbsp  ถึง &nbsp  <input type="date" name="birthday" id="birthday" required />
                        
                    </div>
                    </div>
                <div class="col-12 d-flex justify-content-end signin">
                    <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>&nbsp &nbsp
                    <div class="col-3">
                        <a class="submit BTNC"><img class='add' src="./src/images/plus.png" width="50">เพิ่ม</a>
                    </div>
                </div>
                <table class="main col-10">
                    <tr>
                        <th>วันที่เปลี่ยนสินค้า</th>
                        <th>เวลา</th>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>สถานะการขาย</th>
                        <th  colspan="2">ลบ หรือ แก้ไข</th>
                    </tr>
                    <tr>
                        <th>05/11/2021</th>
                        <th>12:30</th>
                        <th>เครื่องตัดหญ้า</th>
                        <th>1</th>
                        <th>รอของ</th>
                        <th><a type="button"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1"><img src="./src/images/icon-delete.png" width="25">
                        </th>
                        <th>
                        <a type="button"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm3"><img src="./src/images/icon-pencil.png" width="25">
                        </th>
                    </tr>
                    <th>23/01/2021</th>
                        <th>16:40</th>
                        <th>เครื่องปั๊มน้ำ</th>
                        <th>1</th>
                        <th>สำเร็จแล้ว</th>
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
                                            <button type="submit" class="btn btn-primary2">ตกลง</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


</body>

</html>