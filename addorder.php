<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/addorder.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
   
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>ใบสั่งซื้อ</h1>
                    <div class="col-12 d-flex justify-content-end signin">
                        <a class="submit BTNT" href="#"><img class='print' src="./src/images/print.png" width="25">&nbsp print</a>
                    </div>
                    <p></p>
                    <div class="col-12">
                        วันที่วางบิล:
                        <input type="date" name="datebill" id="datebill" required />
                        วันที่รับของ:
                        <input type="date" name="datereceive" id="datereceive" required />
                    </div>
                    <div class="col-12">
                        ชื่อผู้ขาย:
                        <select name="company" style="background-color: #7C904E;">
                            <option value="อาร์เอส อินเตอร์เทรด (2017) จำกัด" selected> อาร์เอส อินเตอร์เทรด (2017) จำกัด</option>
                        </select>
                    </div>
                    <div class="col-12">
                        วิธีการชำระเงิน:
                        <select name="payment" style="background-color: #7C904E;">
                            <option value="เงินสด" selected>เงินสด</option>
                            <option value="เครดิต">เครดิต</option>
                        </select>
                        วันที่ชำระเงิน:
                        <input type="date" name="datepayment">
                    </div>
                    <div class="col-12">
                        หมายเหตุ:
                    </div>
                    <div class="col-12">
                        <textarea style="vertical-align: middle; background-color: #7C904E;" name="detail" cols="50" rows="5"></textarea>
                    </div>
                    <div class="col-12 C">
                        รายการสินค้า
                        <div class=" col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">เพิ่มสินค้า</button>
                        </div>
                        <table class="main col-10">
                            <tr>
                                <th>ประเภทสินค้า</th>
                                <th>รายการสินค้า</th>
                                <th>ยี่ห้อ</th>
                                <th>รุ่น</th>
                                <th>ราคาต่อหน่วย</th>
                                <th>จำนวน</th>
                                <th>ราคา</th>
                                <th></th>
                            </tr>
                            <tbody id="list-product"></tbody>
                        </table>
                    </div>
                    <div class="col-12 C">
                        ค่าใช้จ่ายอื่นๆ
                        <div class=" col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">เพิ่ม</button>
                        </div>
                        <table class="main col-10">
                            <tr>
                                <th>รายการ</th>
                                <th>ราคา</th>
                                <th></th>
                            </tr>
                        </table>
                    </div>
                    <div class="row A">
                        <div class=" col-12 d-flex justify-content-end signin">
                            ยอดสุทธิ:
                            <input type="text" name="totalmoney">
                        </div>
                    </div>
                    <div class="row B">
                        <div class=" col-12 d-flex justify-content-end signin">
                            <input class="BTNC" type="submit" value="ยกเลิก">
                            <input class="BTN" type="submit" value="บันทึก">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---modal เพิ่มสินค้า-->
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มสินค้า</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addproduct" >
                            <table class="col">
                                <tr>
                                    <th>ประเภทสินค้า</th>
                                    <th>รายการสินค้า</th>
                                    <th>ยี่ห้อ</th>
                                    <th>รุ่น</th>
                                    <th>จำนวน</th>
                                    <th>ราคา</th>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="col-12 r">
                                            <select id="typeproduct" style="background-color: #7C904E;" required>
                                                <option value="เลือก" selected>เลือก</option>
                                            </select>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="col-12 r">
                                            <select name="listproduct" style="background-color: #7C904E;" required>
                                                <option value="เลือก" selected>เลือก</option>
                                            </select>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="col-12 r">
                                            <select name="brand" style="background-color: #7C904E;" required>
                                                <option value="เลือก" selected>เลือก</option>
                                            </select>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="col-12 r">
                                            <select name="productmodel" style="background-color: #7C904E;" required>
                                                <option value="เลือก" selected>เลือก</option>
                                            </select>
                                        </div>
                                    </th>
                                    <th><input type="number" min="1" name="amountproduct" id="amountproduct" width="3px" required  /></th>
                                    <th><input type="number" min="0.25" step="0.25" name="priceproduct" id="priceproduct" width="3px" required /></th>
                                </tr>
                            </table>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary1">ตกลง</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--- modal ค่าใช้จ่ายอื่นๆ-->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มค่าใช้จ่ายอื่นๆ</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="addproduct" method="post" action="">
                            <table class="col">
                                <tr>
                                    <th>รายการ</th>
                                    <th>ราคา</th>
                                </tr>
                                <tr>
                                    <th><input type="text" name="list" id="list" required /></th>
                                    <th><input type="text" name="priceother" id="priceother" required /></th>
                                </tr>
                            </table>
                            <div class="modal-footer">
                        <button type="submit" class="btn btn-primary1">ตกลง</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>