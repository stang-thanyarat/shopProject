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
                        <button class="submit btn" id="addmodel_btn" type="button"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl1"><img class='add' src="./src/images/plus.png" width="25">&nbsp เพิ่มประเภทสินค้า</button>
                    </div>
                </div>

                <table class="wh m">
                <thead>
                    <tr>
                    <th>ประเภทสินค้า</th>
                        <th>รายการทั้งหมด</th>
                        <th>รายการที่ขาย</th>
                        <th  colspan="2">ลบ หรือ แก้ไข</th>
                        </tr>
                </thead>
                <tbody id="producttypetable">

                </tbody>
                </table>
            </div>

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
                        <label for="producttype">&nbsp &nbsp ชื่อประเภทสินค้า : </label>
                           <select name="type" id="producttype" required>
                                        <option value="" selected hidden>เลือกประเภทสินค้า</option>
                                        <option value="lawn mower blade">ใบตัดหญ้า</option>
                                        <option value="kit">ชุดเสื้อสูบ</option>
                                        <option value="gear knob">หัวเกียร์</option>
                                        <option value="rice cutting blade">ใบตัดข้าว</option>
                                        <option value="screw nut">น็อตสกรู</option>
                                        <option value="string">เชือกเอ็น</option>
                                        <option value="disc lawn mower">จานตัดหญ้า</option>
                                        <option value="kaboo">คาบู</option>
                                        <option value="Fertilizer Sprayer Parts">อะไหล่เครื่องพ่นปุ๋ย</option>
                                        <option value="suspension rubber">ยางกันสะเทือน</option>
                                        <option value="water pump">ปั๊มน้ำ</option>
                                        <option value="lawn mower">เครื่องตัดหญ้า</option>
                                        <option value="seed">เมล็ดพันธุ์</option>
                                        <option value="herbicide">ยากำจัดวัชพืช</option>
                                        <option value="chemical fertilizer">ปุ๋ยเคมี</option>
                                    </select>
                                    <p>
                                        <p>
                        &nbsp &nbsp รายการทั้งหมด : <input type="text" id="allproducttype"></input>
                        <p>
                        &nbsp &nbsp รายการที่ขาย : <input type="text" id="sellproducttype"></input>
                               
                        <div class="modal-footer">
                            <button type="submit" id="addtable" class="btn btn-primary2">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <!-- ลบ -->
<div class="modal fade bd-example-modal-xl2" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <!--- modal แก้ไขประเภทสินค้า-->
<div class="modal fade bd-example-modal-xl3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl3">
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="./src/js/producttype.js"></script>

</html>