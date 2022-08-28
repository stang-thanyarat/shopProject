<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
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
                    <div class="col-6 topic_productlist">
                        <h1>รายการสินค้า</h1>
                    </div>
                    <div class="col-3 u">
                        <input name="keyword" id="keyword" type="text" class="btnd" placeholder="&nbsp ชื่อสินค้า">
                        <button type="submit" class="l"><img src="./src/images/search.png" width="20"></button>
                    </div>
                    <div class="col-2 m">
                        <select name="category_name" id="category_name" class="n" required>
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
                    <div class="col-2 d-flex justify-content-end a">
                        <a href="./addtocart.php" type="button"><img src="./src/images/cart.png" width="52.5"></a>
                    </div>
                </div>
                <table class="col-11 q">
                    <tr class="topic_category">
                        <th colspan="3">
                            <h5 class="z">ใบตัดหญ้า</h5>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="row-4 topic_product">
                                ใบตัดหญ้า มีฟัน (แบบวงเดือน) รุ่น 10X30T
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <img src="./src/images/ใบตัดหญ้า02.png" class="img_position">
                                </div>
                                <div class="col-5">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row-4 topic_product">
                                ใบตัดหญ้า มีฟัน (แบบวงเดือน) รุ่น 10X30T
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <img src="./src/images/ใบตัดหญ้า02.png" class="img_position">
                                </div>
                                <div class="col-5">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row-4 topic_product">
                                ใบตัดหญ้า ไม่มีฟัน รุ่น 10X16T
                            </div>
                            <div class="row">
                                <div class="col-7">&nbsp&nbsp&nbsp&nbsp
                                    <img src="./src/images/ใบตัดหญ้า03.png" class="img_position">
                                </div>
                                <div class="col-5">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                    <tr>
                        <th>
                            <div class="row-4 topic_product">
                                ใบตัดหญ้า ไม่มีฟัน รุ่น 10X20T
                            </div>
                            <div class="row">
                                <div class="col-7">&nbsp&nbsp&nbsp&nbsp
                                    <img src="./src/images/ใบตัดหญ้า04.png" class="img_position">
                                </div>
                                <div class="col-5">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row-4 topic_product">
                                ใบตัดหญ้า ไม่มีฟัน รุ่น 10X24T
                            </div>
                            <div class="row">
                                <div class="col-7">&nbsp&nbsp&nbsp&nbsp
                                    <img src="./src/images/ใบตัดหญ้า05.png" class="img_position">
                                </div>
                                <div class="col-5">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row-4 topic_product">
                                ใบสามเหลี่ยมใหญ่
                            </div>
                            <div class="row">
                                <div class="col-7">&nbsp&nbsp&nbsp&nbsp
                                    <img src="./src/images/ใบตัดหญ้า06.png" class="img_position">
                                </div>
                                <div class="col-5">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="row-4 topic_product">
                                ใบสามเหลี่ยมใหญ่เล็ก
                            </div>
                            <div class="row">
                                <div class="col-7">&nbsp&nbsp&nbsp&nbsp
                                    <img src="./src/images/ใบตัดหญ้า07.png" class="img_position">
                                </div>
                                <div class="col-5">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </form>

    <!---เพิ่มไปยังรถเข็น-->
    <form action="addtocart.php" method="get">
        <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มไปยังรถเข็น</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="editclose" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="exp">
                            วันหมดอายุ :&nbsp<font color="red">&nbsp*</font>
                            <input type="date" name="list" id="list" class="inbox" />
                        </div>
                        <div class="amount">
                            จำนวน : <font color="red">&nbsp*</font>
                            <input type="text" name="amount" id="amount" class="inbox" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary1">ตกลง</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <!--- modal แก้ไขวันหมดอายุ-->
    <div class="modal fade bd-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form name="editstatus" id="editstatus" method="post" action="">
            <div class="modal-dialog modal-sm2">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขวันหมดอายุ และจำนวน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="editclose" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <center>

                            วันหมดอายุ: &nbsp;<input type="date" name="mfg" id="mfg" required />
                            &nbspถึง&nbsp<input type="date" name="exp" id="exp" required /><br>
                            <p></p>

                        </center>

                        <center>จำนวน: &nbsp;<input type="text" name="amount" id="amount" required />
                            <p></p>
                        </center>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary1">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


</body>

</html>