<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/css/productlist.css" />
    
    <title>productlist</title>
    
</head>
<?php include('nav.php'); ?>

<body>
<script src="./src/js/productlist.js"></script>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-lg-5">
                        <div class="title page">
                            <h1 style="display: inline;">รายการสินค้า</h1>&nbsp &nbsp &nbsp
                            <input type="text" class="btnd" placeholder="&nbsp ชื่อสินค้า">
                    <button type="button" class="s"><img src="./src/images/search.png" width="13"></button>&nbsp &nbsp
                    <select name="type" id="type" required>
                                        <option value="seed.">ใบตัดหญ้า</option>
                                        <option value="seed.">ชุดเสื้อสูบ</option>
                                        <option value="Mrs.">หัวเกียร์</option>
                                        <option value="miss">ใบตัดหญ้า</option>
                                        <option value="miss">ใบตัดข้าว</option>
                                        <option value="miss">นอตสกรู</option>
                                        <option value="miss">เชือกเอ็น</option>
                                        <option value="miss">จานตัดหญ้า</option>
                                        <option value="miss">คาบู</option>
                                        <option value="miss">อะไหล่เครื่องพ่นปุ๋ย</option>
                                        <option value="miss">เมล็ด</option>
                                        <option value="miss">ยางกันสะเทือน</option>
                                        <option value="miss">ปั๊มน้ำ</option>
                                        <option value="miss">เครื่องตัดหญ้า</option>
                                        <option value="miss">เมล็ดพันธุ์</option>
                                        <option value="miss">ยากำจัดวัชพืช</option>
                                        <option value="miss">ปุ๋ยเคมี</option>
                                    </select>
                            </div>
                    </div>
                </div>
                    <div class="col-11 d-flex justify-content-end signin">
                        <div class="col-1">
                        <a href="./addtocart.php"  type="button" class="right"><img src="./src/images/cart.png" width="50"></a>
                        </div>
                    </div>
                <table class="main col-11">
                <tr class="t">
                        <td align="left" colspan="3"><p><h5>ใบตัดหญ้า</h5><p></td>
                    </tr>
                    <tr >
                        <th><p>

                            <div>ใบตัดหญ้า มีฟัน (แบบวงเดือน) รุ่น 10X24T</div>

                            <img src="./src/images/ใบตัดหญ้า1.png" width="200">

                            <div>
                                <p>ราคา&nbsp &nbsp บาท</p>
                                <p>คงเหลือ&nbsp &nbsp ใบ</p>
                            </div>

                            <div class="title page">
                                <button type="button" class="right" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button>
                                <button type="button" class="right" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm2"><img class='pencil' src="./src/images/icon-pencil.png" width="25"></button>
                            </div>

                        <p></th>
                        <th><p>
                            
                            <div>ใบตัดหญ้า มีฟัน (แบบวงเดือน) รุ่น 10X30T</div>

                            <img src="./src/images/ใบตัดหญ้า2.png" width="200">

                            <div>
                                <p>ราคา&nbsp &nbsp บาท</p>
                                <p>คงเหลือ&nbsp &nbsp ใบ</p>
                            </div>

                            <div class="title page">
                                <button type="button" class="right" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button>
                                <button type="button" class="right"data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm2"><img class='pencil' src="./src/images/icon-pencil.png" width="25"></button>
                            </div>

                        <p></th>
                        <th><p>

                        <div>ใบตัดหญ้า ไม่มีฟัน รุ่น 10X16T</div>

                        <img src="./src/images/ใบตัดหญ้า3.png" width="200">

                            <div>
                                <p>ราคา&nbsp &nbsp บาท</p>
                                <p>คงเหลือ&nbsp &nbsp ใบ</p>
                            </div>
                            
                            <div class="title page">
                                <button type="button" class="right" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button>
                                <button type="button" class="right" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm2"><img class='pencil' src="./src/images/icon-pencil.png" width="25"></button>
                            </div>

                        <p></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </table>
            </div>
        </div>

        <!--- modal เพิ่มไปยังรถเข็น-->
        <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มไปยังรถเข็น</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="productlist" method="post" action="">
                           
                        <center>วันหมดอายุ: &nbsp;<input type="date" name="list" id="list" required />&nbspถึง&nbsp<input type="date" name="list" id="list" required /><br><p></p></center>
                        <center>จำนวน: &nbsp;<input type="text" name="priceother" id="priceother" required /><p></p></center>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary1">ตกลง</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--- modal แก้ไขวันหมดอายุ-->
        <div class="modal fade bd-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขวันหมดอายุ</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="productlist" method="post" action="">
                           
                        <center>วันหมดอายุ: &nbsp;<input type="date" name="list" id="list" required />&nbspถึง&nbsp<input type="date" name="list" id="list" required /><br><p></p></center>
                        <center>จำนวน: &nbsp;<input type="text" name="priceother" id="priceother" required /><p></p></center>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary1">ตกลง</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
</body>
</html>