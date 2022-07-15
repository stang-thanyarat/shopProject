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
                    <div class="col-3">
                        <h1>รายการสินค้า</h1>
                    </div>
                    <div class="col-1 u">
                        <input type="text" class="btnd" placeholder="&nbsp ชื่อสินค้า">
                    </div>
                    <div class="col-1 s">
                        <button type="button" class="l"><img src="./src/images/search.png" width="16"></button>&nbsp &nbsp
                    </div>
                    <div class="col-2 m">
                        <select name="type" id="producttype" class="n" required>
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
                    <div class="col-4 d-flex justify-content-end a">
                        <a href="./addtocart.php" type="button"><img src="./src/images/cart.png" width="45"></a>
                    </div>
                </div>
                <table class="col-11 q">
                    <tr class="t">
                        <th colspan="3">
                            <h5 class="z">ใบตัดหญ้า</h5>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="row-4">
                                <div class="x">ใบตัดหญ้า มีฟัน (แบบวงเดือน) รุ่น 10X24T</div>
                            </div>
                            <div class="row">
                                <div class="col-6">&nbsp&nbsp&nbsp&nbsp
                                    <img src="./src/images/ใบตัดหญ้า01.png" width="200">
                                </div>
                                <div class="col-6">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row-4">
                                <div class="x">ใบตัดหญ้า มีฟัน (แบบวงเดือน) รุ่น 10X30T</div>
                            </div>
                            <div class="row">
                                <div class="col-6">&nbsp&nbsp&nbsp&nbsp
                                    <img src="./src/images/ใบตัดหญ้า02.png" width="200">
                                </div>
                                <div class="col-6">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row-4">
                                <div class="x">ใบตัดหญ้า ไม่มีฟัน รุ่น 10X16T</div>
                            </div>
                            <div class="row">
                                <div class="col-6">&nbsp&nbsp&nbsp&nbsp
                                    <img src="./src/images/ใบตัดหญ้า03.png" width="200">
                                </div>
                                <div class="col-6">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                    <tr>
                        <th>
                            <div class="row-4">
                                <div class="x">ใบตัดหญ้า ไม่มีฟัน รุ่น 10X20T</div>
                            </div>
                            <div class="row">
                                <div class="col-6">&nbsp&nbsp&nbsp&nbsp
                                    <img src="./src/images/ใบตัดหญ้า04.png" width="200">
                                </div>
                                <div class="col-6">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row-4">
                                <div class="x">ใบตัดหญ้า ไม่มีฟัน รุ่น 10X24T</div>
                            </div>
                            <div class="row">
                                <div class="col-6">&nbsp&nbsp&nbsp&nbsp
                                    <img src="./src/images/ใบตัดหญ้า05.png" width="200">
                                </div>
                                <div class="col-6">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row-4">
                                <div class="x">ใบสามเหลี่ยมใหญ่</div>
                            </div>
                            <div class="row">
                                <div class="col-6">&nbsp&nbsp&nbsp&nbsp
                                    <img src="./src/images/ใบตัดหญ้า06.png" width="200">
                                </div>
                                <div class="col-6">
                                    <p class="aa">ราคา&nbsp&nbsp&nbsp บาท</p>
                                    <p>คงเหลือ&nbsp ใบ</p>
                                    <p><button type="button" class="aa" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">เพิ่มไปยังรถเข็น</button></p>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="row-4">
                                <div class="x">ใบสามเหลี่ยมใหญ่เล็ก</div>
                            </div>
                            <div class="row">
                                <div class="col-6">&nbsp&nbsp&nbsp&nbsp
                                    <img src="./src/images/ใบตัดหญ้า07.png" width="200">
                                </div>
                                <div class="col-6">
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

        <!--- modal เพิ่มไปยังรถเข็น-->
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
                        <form name="productlist" method="post" action="">

                            <center>วันหมดอายุ: &nbsp;<input type="date" name="list" id="list" required /><br>
                                <p></p>
                            </center>
                            <center>จำนวน: &nbsp;<input type="text" name="amount" id="amount" required />
                                <p></p>
                            </center>

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
                                <button type="submit" class="btn btn-primary2">ตกลง</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </form>
</body>

</html>