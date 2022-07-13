<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/producttype.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <title>producttype</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form action="" name="form1" id="form1">
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-12">
                        <h1>ประเภทสินค้า</h1>
                    </div>
                    <div class="col-2 mai">
                    </div>
                    <div class="col-1"  >
                        <button class="submit btn" id="addmodel_btn" type="button"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl1"><img class='add' src="./src/images/plus.png" width="25">&nbsp เพิ่มประเภทสินค้า</button>
                    </div>
                </div>
<br>
                <table  align="center" class="wh m">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ประเภทสินค้า</th>
                        <th>รายการทั้งหมด</th>
                        <th>รายการที่ขาย</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="producttypetable">

                </tbody>
                </table>
            </div>
</form>

<!--- modal เพิ่มประเภทสินค้า-->
<div class="modal fade bd-example-modal-xl1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <form name="addproducttype" method="post" id="addproducttype">
            <div class="modal-dialog modal-xl1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทสินค้า</h5>
                        <button type="button" id="addclose" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="addproducttype">&nbsp &nbsp ชื่อประเภทสินค้า : </label>
                           <select name="type" id="addproducttypename" required>
                                        <option value="" selected hidden>เลือกประเภทสินค้า</option>
                                        <option value="ใบตัดหญ้า">ใบตัดหญ้า</option>
                                        <option value="ชุดเสื้อสูบ">ชุดเสื้อสูบ</option>
                                        <option value="หัวเกียร์">หัวเกียร์</option>
                                        <option value="ใบตัดข้าว">ใบตัดข้าว</option>
                                        <option value="น็อตสกรู">น็อตสกรู</option>
                                        <option value="เชือกเอ็น">เชือกเอ็น</option>
                                        <option value="จานตัดหญ้า">จานตัดหญ้า</option>
                                        <option value="คาบู">คาบู</option>
                                        <option value="อะไหล่เครื่องพ่นปุ๋ย">อะไหล่เครื่องพ่นปุ๋ย</option>
                                        <option value="ยางกันสะเทือน">ยางกันสะเทือน</option>
                                        <option value="ปั๊มน้ำ">ปั๊มน้ำ</option>
                                        <option value="เครื่องตัดหญ้า">เครื่องตัดหญ้า</option>
                                        <option value="เมล็ดพันธุ์">เมล็ดพันธุ์</option>
                                        <option value="ยากำจัดวัชพืช">ยากำจัดวัชพืช</option>
                                        <option value="ปุ๋ยเคมี">ปุ๋ยเคมี</option>
                                    </select>
                                    <p>
                                        <p>
                        &nbsp &nbsp รายการทั้งหมด : <input type="text" id="addallproducttype"></input>
                        <p>
                        &nbsp &nbsp รายการที่ขาย : <input type="text" id="addsellproducttype"></input>
                               
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
                                            <h5 class="modal-title2" id="exampleModalLabel">ลบประเภทสินค้า</h5>
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

        <!--- modal แก้ไขประเภทสินค้า-->
<div class="modal fade bd-example-modal-xl3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <form name="editproducttype" id="editproducttype" method="post" action="">
        <div class="modal-dialog modal-xl3">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขประเภทสินค้า</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="editclose" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col leftproducttype ">
                            <label for="producttype">&nbsp &nbsp ชื่อประเภทสินค้า : </label>
                           <select name="type" id="editproducttypename" required>
                                        <option value="" selected hidden>เลือกประเภทสินค้า</option>
                                        <option value="ใบตัดหญ้า">ใบตัดหญ้า</option>
                                        <option value="ชุดเสื้อสูบ">ชุดเสื้อสูบ</option>
                                        <option value="หัวเกียร์">หัวเกียร์</option>
                                        <option value="ใบตัดข้าว">ใบตัดข้าว</option>
                                        <option value="น็อตสกรู">น็อตสกรู</option>
                                        <option value="เชือกเอ็น">เชือกเอ็น</option>
                                        <option value="จานตัดหญ้า">จานตัดหญ้า</option>
                                        <option value="คาบู">คาบู</option>
                                        <option value="อะไหล่เครื่องพ่นปุ๋ย">อะไหล่เครื่องพ่นปุ๋ย</option>
                                        <option value="ยางกันสะเทือน">ยางกันสะเทือน</option>
                                        <option value="ปั๊มน้ำ">ปั๊มน้ำ</option>
                                        <option value="เครื่องตัดหญ้า">เครื่องตัดหญ้า</option>
                                        <option value="เมล็ดพันธุ์">เมล็ดพันธุ์</option>
                                        <option value="ยากำจัดวัชพืช">ยากำจัดวัชพืช</option>
                                        <option value="ปุ๋ยเคมี">ปุ๋ยเคมี</option>
                                    </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col leftallproducttype ">
                            รายการทั้งหมด : <input type="text" id="editallproducttype">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col leftsellproducttype ">
                            รายการที่ขาย : <input type="text" id="editsellproducttype">
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="./src/js/producttype.js"></script>

</html>