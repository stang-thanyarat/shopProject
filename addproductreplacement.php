<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/addproductreplacement.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>addproductreplacement</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form action="controller/ProductExchange.php" name="form1" id="form1" method="POST" enctype="multipart/form-data">
        <input type="hidden" value="productexchange" name="table" />
        <input type="hidden" value="insert" name="form_action" />
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col">
                        <h1>การเปลี่ยนสินค้า</h1>
                    </div>
                </div>
                <table class="mai">
                    <tr>
                        <th>
                            <div class="row a">
                                <div class="col productr">
                                    สินค้าที่ต้องการเปลี่ยน :<font color="red">&nbsp*</font>
                                    <input name="product_name" type="text" id="product_name" class="inbox" required />
                                </div>
                            </div>
                            <div class="row a">
                                <div class="col productn">
                                    จำนวนที่เปลี่ยนสินค้า :<font color="red">&nbsp*</font>
                                    <input name="exchange_amount" type="text" id="exchange_amount" class="inbox" required />
                                </div>
                            </div>
                            <div class="row a ">
                                <div class="col ev">
                                    หลักฐานที่เสียหาย :<font color="red">&nbsp*</font>
                                    <input type="file" accept="image/*" name="damage_proof" id="damage_proof" class="inbox" required>
                                </div>
                            </div>
                            <div class="row a">
                                <div class="col">
                                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                                </div>
                            </div>
                            <div class="row a">
                                <div class="col comment">
                                    หมายเหตุ :&nbsp&nbsp&nbsp&nbsp<textarea name="note" id="note" cols="80" rows="5" class="inbox" style="vertical-align:top;"></textarea>
                                </div>
                            </div>
                            <div class="row a">
                                <div class="col status">
                                    สถานะการเปลี่ยนสินค้า :<font color="red">&nbsp*</font>
                                    <input type="radio" name="exchange_status" id="exchange_status" class="inbox" value="สำเร็จแล้ว">
                                    <label for="complete"> สำเร็จแล้ว </label>
                                    <input type="radio" name="exchange_status" id="exchange_status" class="inbox" value="รอของ">
                                    <label for="wait"> รอของ </label>
                                </div>
                            </div>
                            <div class="row a">
                                <div class="col name">
                                    ชื่อ :<font color="red">&nbsp*</font>
                                    <input name="name" type="text" id="name" class="inbox" required />
                                    <!--ดูชื่อ class และ id จากเพื่อน-->
                                </div>
                            </div>
                            <div class="row a tel">
                                <div class="col">
                                    เบอร์โทรติดต่อ :<font color="red">&nbsp*</font>
                                    <input name="tel" type="text" id="tel" class="inbox" required />
                                    <!--ดูชื่อ class และ id จากเพื่อน-->
                                </div>
                            </div>
                            <!--หาวิธีเชื่อมตัว id นี้-->
                            <div class="row a tel">
                                <div class="col">
                                    รหัสสินค้า :<font color="red">&nbsp*</font>
                                    <input name="product_id" type="text" id="product_id" class="inbox" required />
                                    <!--ดูชื่อ class และ id จากเพื่อน-->
                                </div>
                            </div>
                            
            </div>
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
    </form>
</body>
<script src="./src/js/addproductreplacement.js"></script>

</html>