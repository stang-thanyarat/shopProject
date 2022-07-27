<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/css/addproduct.css" />

    <title>addproduct</title>
</head>
<?php include('nav.php'); ?>
<style>
    .error {
        color: #FF0000;
    }
</style>

<body>
    <form action="productresult.php" name="addproduct" id="addproduct" method="POST">
        <?php
        $product_typeErr = $product_nameErr = $brandErr = $modelErr = $seller_idErr = $product_img1Err = $product_dlt_unitErr = $priceErr = $product_unitErr = $notification_amtErr = "";
        $product_type = $product_name = $brand = $model = $seller_id = $product_img1 = $product_dlt_unit = $price = $product_unit = $notification_amt = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["product_type"])) {
                $product_typeErr = "กรุณาเลือกประเภทสินค้า";
            } else {
                $product_type = test_input($_POST["product_type"]);
            }

            if (empty($_POST["product_name"])) {
                $product_nameErr = "กรุณากรอกชื่อสินค้า";
            } else {
                $product_name = test_input($_POST["product_name"]);
            }

            if (empty($_POST["brand"])) {
                $brandErr = "กรุณากรอกยี่ห้อสินค้า";
            } else {
                $brand = test_input($_POST["brand"]);
            }

            if (empty($_POST["model"])) {
                $modelErr = "กรุณากรอกรุ่นสินค้า";
            } else {
                $model = test_input($_POST["model"]);
            }

            if (empty($_POST["seller_id"])) {
                $seller_idErr = "กรุณาเลือกชื่อผู้ขาย";
            } else {
                $seller_id = test_input($_POST["seller_id"]);
            }

            if (empty($_POST["product_img1"])) {
                $product_img1Err = "กรุณาใส่รูปภาพ";
            } else {
                $product_img1 = test_input($_POST["product_img1"]);
            }

            if (empty($_POST["product_dlt_unit"])) {
                $product_dlt_unitErr = "กรุณากรอกจำนวน";
            } else {
                $product_dlt_unit = test_input($_POST["product_dlt_unit"]);
            }

            if (empty($_POST["price"])) {
                $priceErr = "กรุณากรอกราคา";
            } else {
                $price = test_input($_POST["price"]);
            }

            if (empty($_POST["product_unit"])) {
                $product_unitErr = "กรุณาเลือกหน่วยนับ";
            } else {
                $product_unit = test_input($_POST["product_unit"]);
            }

            if (empty($_POST["notification_amt"])) {
                $notification_amtErr = "กรุณากรอกสินค้าคงคลังขั้นต่ำ";
            } else {
                $notification_amt = test_input($_POST["notification_amt"]);
            }

            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        } ?>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col">
                        <h1>เพิ่มสินค้า</h1>
                    </div>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <table class="mai">
                        <tr>
                            <div class="row">
                                <div class="col-11">
                                    <th>&nbsp รายละเอียดสินค้า</th>
                                </div>
                            </div>
                        </tr>
                        <tr>
                            <th>
                                <div class="row a">
                                    <div class="col">
                                        ประเภทสินค้า :<font color="red">&nbsp*</font>
                                        <select name="product_type" id="product_type" class="inbox">
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
                                        <span class="error"><?php echo $product_typeErr; ?></span>
                                    </div>
                                    <div class="col productnumber ">
                                        รหัสสินค้า :&nbsp&nbsp
                                        <label for="no." id="" class="inbox">A01
                                        </label>
                                    </div>
                                </div>

                                <div class="row a">
                                    <div class="col productname">
                                        ชื่อสินค้า :<font color="red">&nbsp*</font>
                                        <input name="product_name" type="text" id="product_name" class="inbox" />
                                        <span class="error"><?php echo $product_nameErr; ?></span>
                                    </div>
                                    <div class="col">
                                        ยี่ห้อสินค้า :<font color="red">&nbsp*</font>
                                        <input name="brand" type="text" id="brand" class="inbox" />
                                        <span class="error"><?php echo $brandErr; ?></span>
                                    </div>
                                </div>

                                <div class="row a">
                                    <div class="col productversion">
                                        รุ่นสินค้า :<font color="red">&nbsp*</font>
                                        <input name="model" type="text" id="model" class="inbox" />
                                        <span class="error"><?php echo $modelErr; ?></span>
                                    </div>
                                    <div class="col sellername">
                                        ชื่อผู้ขาย :<font color="red">&nbsp*</font>
                                        <select name="seller_id" id="seller_id" class="inbox">
                                            <option value="RS intertred(2017)">อาร์เอส อินเตอร์เทรด (2017) จำกัด</option>
                                        </select>
                                        <span class="error"><?php echo $seller_idErr; ?></span>
                                    </div>
                                </div>
                                <div class="row a">
                                    <div class="col image">
                                        รูปภาพสินค้า :<font color="red">&nbsp*</font>
                                        <input type="file" accept="image/*" name="product_img1" id="product_img1" class="inbox">
                                        <span class="error"><?php echo $product_img1Err; ?></span>
                                    </div>
                                    <div class="col productinformation">
                                        รูปรายละเอียดสินค้า :<font color="red">&nbsp*</font>
                                        <input type="file" accept="image/*" name="product_img2" id="product_img2" class="inbox">
                                    </div>
                                </div>

                                <div class="row a">
                                    <div class="col">
                                        <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                                    </div>
                                </div>

                                <div class="row a">
                                    <div class="col details">
                                        รายละเอียด :&nbsp&nbsp&nbsp
                                        <textarea name="product_detail" id="product_detail" cols="50" rows="5" class="inbox" style="vertical-align:top;">
                                    </textarea>
                                    </div>
                                    <div class="col amount">
                                        จำนวน :<font color="red">&nbsp*</font>
                                        <input name="product_dlt_unit" type="text" id="product_dlt_unit" class="inbox" /><span class="error"><?php echo $product_dlt_unitErr; ?></span>
                                    </div>
                                </div>
                                <div class="row a">
                                    <div class="col-5 unit">
                                        หน่วยนับ :<font color="red">&nbsp*</font>
                                        <select name="product_unit" id="product_unit" class="inbox">
                                            <option value="envelope">ซอง</option>
                                            <option value="bottle">ขวด</option>
                                            <option value="item">ชิ้น</option>
                                            <option value="box">กล่อง</option>
                                            <option value="machine">เครื่อง</option>
                                            <option value="bag">ถุง</option>
                                            <option value="sack">กระสอบ</option>
                                        </select>
                                        <span class="error"><?php echo $product_unit; ?></span>
                                    </div>
                                    <div class="col-3 price">
                                        ราคาขาย :<font color="red">&nbsp*</font>
                                        <input name="price" type="text" id="price" class="inbox" />
                                        <span class="error"><?php echo $price; ?></span>
                                    </div>
                                    <div class="col-2 vax">
                                        <input type="checkbox" class="vaxcheckbox">
                                        <label class="vaxcheckboxtext">ภาษีมูลค่าเพิ่ม</label>
                                    </div>
                                    <div class="col-1 costprice">
                                        <a href="costprice.php" name="cost_price" id="cost_price" type="button" class="btn-c1 reset1"><label class="label1">ดูราคาทุน</label></a>
                                    </div>
                                </div>

                                <div class="row a">
                                    <div class="col status">
                                        สถานะการขาย :&nbsp&nbsp
                                        <label class="switch">
                                            <input name="sales_status" id="sales_status" type="checkbox">
                                            <span class="slider round inbox"></span>
                                        </label>
                                    </div>
                                    <div class="col min1">
                                        สินค้าคงคลังขั้นต่ำ :<font color="red">&nbsp*</font>
                                        <input name="notification_amt" type="text" id="notification_amt" class="inbox" />
                                        <span class="error"><?php echo $notification_amt; ?></span>
                                    </div>
                                </div>

                                <div class="row a">
                                    <div class="col settingmin">
                                        <label class="checkbox">
                                            <input type="checkbox">
                                        </label>
                                        <label for="setting">&nbsp&nbsp ตั้งค่าสินค้าคงคลังขั้นต่ำล่วงหน้า</label>
                                    </div>
                                </div>

                                <div class="row a">
                                    <div class="col start">
                                        วันที่เริ่มใช้งาน :<font color="red">&nbsp*</font>
                                        <input name="lastname" type="date" id="lastname" class="inbox" />
                                    </div>
                                    <div class="col min2">
                                        สินค้าคงคลังขั้นต่ำ :<font color="red">&nbsp*</font>
                                        <input name="lastname" type="text" id="lastname" class="inbox" />
                                    </div>
                                </div>
            </div>

            <br>
            </th>
            </tr>
            </table>
            <div class="row btn-g">
                <div class="col-2">
                    <button type="reset" class="btn-c reset">ยกเลิก</button>
                </div>
                <div class="col-2">
                    <input type="submit" class="btn-c submit" value="บันทึก" />
                </div>
            </div>
        </div>
        </div>
    </form>
    </form>
</body>

</html>