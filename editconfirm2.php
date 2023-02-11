<?php
include_once('service/auth.php');
isLaber();
function getFullRole($role)
{
    if ($role == "E") {
        return 'พนักงาน';
    }
    if ($role == "L") {
        return 'เจ้าของร้าน';
    }
    if ($role == "A") {
        return 'ผู้ดูแลระบบ';
    }
}

if(!isset($_GET['id'])){
    echo "not found.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/confirm2.css" />
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<?php
include_once "./database/Order.php";
include_once "./database/OrderDetails.php";
include_once "./database/OtherPrice.php";
include_once "./database/Sell.php";
include_once "./database/Product.php";
$sell = new Sell();
$product = new Product();
$order = new Order();
$orderdetails = new OrderDetails();
$otherprice = new OtherPrice();
$sells = $sell->fetchAll();
$products = $product->fetchAll();
$o = $order->fetchById($_GET['id']);
$od = $orderdetails->fetchByODId($_GET['id']);
$op = $otherprice->fetchById($_GET['id']);
if(!$o){
    echo "not found.";
    exit;
}

include_once('nav.php');
$json = '';
for ($i = 0; $i < count($od); $i++) {
    $b = $od[$i];
    $json .= "{
        list: " . $b['product_id'] . ",
        price: " . $b['order_pr'] . ",
        amount: " . $b['order_amt'] . ",
        expdate:\"" . "" . "\",
        allprice:" . ($b['order_pr']*$b['order_amt']) . ",
        id:\"" . $b['unique_id'] . "\"
    }";
    if ($i + 1 != count($od)) {
        $json .= ",";
    }
}
?>

<body>
<body>
<form action="controller/Order.php" name="form1" id="form1" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="table" value="order" />
    <input type="hidden" name="form_action" value="update" />
    <input type="hidden" value="<?= $_GET['id'] ?>" name="order_id" />
    <input type="hidden" value="<?= $_GET['id'] ?>" name="product_id" />
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <div class="col-4 topic">
                    <h1>ใบสั่งซื้อ</h1>
                </div>
                <div class="col-5 d-flex justify-content-end signin status">
                    <div class="col-5">
                        <label class="font">สถานะใบสั่งซื้อ &nbsp;&nbsp;:</label>
                            <input name="order_status" id="order_status" type="checkbox" >
                    </div>
                </div>
                <div class="col-1 printt font">
                    <button type="button" onclick="print()"><img src="./src/images/print.png" width="25"/>&nbsp&nbsp
                        print
                    </button>
                </div>
                <p></p>
                <div class="pay">
                    <div class="row">
                        <div class="col datebill">
                            วันที่วางบิล : &nbsp;
                            <?= $o['datebill']; ?>
                        </div>
                        <div class="col">
                            &nbsp;&nbsp;วันที่รับของ : &nbsp;
                            <?= $o['datereceive']; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col company">
                            ชื่อผู้ขาย : &nbsp;
                            <select name="sell_id" id="sell_id" class="inbox" style="background-color: #D4DDC6;" >
                                <?php foreach ($sells as $s) { ?>
                                    <option value="<?= $s['sell_id'] ?>" <?= $s['sell_id'] == $s['sell_id'] ? "selected" : '' ?>><?= $s['sell_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col note">
                        <label for="note">หมายเหตุ : &nbsp;</label>
                        <textarea name="note" id="note" cols="50" rows="5" style="vertical-align:top;" class="bb"  value="<?= $o['note']; ?>"></textarea>
                    </div>
                    <div class="row x">
                        <div class="col">
                            ใบเสร็จ : &nbsp;<input type="file" accept="image/*" name="slip">
                        </div>
                        <div class="col f">
                            ใบส่งของ : &nbsp;<input type="file" accept="image/*" name="invoice">
                        </div>
                    </div>
                    <div class="col-12 C">
                        รายการสินค้า
                        <div class=" col-12 d-flex justify-content-end">
                            <button type="button" class="btn2" id="addmodel_btn" data-bs-toggle="modal"
                                    data-bs-target=".bd-example-modal-lg">เพิ่มสินค้า
                            </button>
                        </div>
                        <table class="main col-10">
                            <thead>
                            <tr>
                                <th width="5%">ลำดับ</th>
                                <th width="25%">รายการสินค้า</th>
                                <th width="15%">ราคาต่อหน่วย (บาท)</th>
                                <th width="15%">จำนวน</th>
                                <th width="15%">ราคา (บาท)</th>
                                <th width="15%">วันหมดอายุ</th>
                                <th width="10%"></th>
                            </tr>
                            </thead>
                            <tbody id="list-product">
                            <?php $i = 0;
                            foreach ($od as $b) { ?>
                                <tr id="rr<?= $i ?>">
                                    <th class="index-table-bank"><?= $i + 1 ?></th>
                                    <th id="text<?= $b['product_id'] ?>"><?= $b['product_name'] ?></th>
                                    <th><?= $b['order_pr'] ?></th>
                                    <th><?= $b['order_amt'] ?></th>
                                    <th><?= $b['order_amt']*$b['order_pr'] ?></th>
                                    <th></th>
                                    <th>
                                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel(<?= $i ?>)"></button>
                                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit(<?= $i ?>)"></button>
                                    </th>
                                </tr>
                                <?php $i++;
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 C">
                        ค่าใช้จ่ายอื่นๆ
                        <div class=" col-12 d-flex justify-content-end">
                            <button type="button" class="btn2" data-bs-toggle="modal"
                                    data-bs-target=".bd-example-modal-sm1">เพิ่ม
                            </button>
                        </div>
                        <table class="main col-10">
                            <thead>
                            <tr>
                                <th width="5%">ลำดับ</th>
                                <th width="45%">รายการ</th>
                                <th width="40%">ราคา</th>
                                <th width="10%"></th>
                            </tr>
                            </thead>
                            <tbody id="list-priceother">
                            <?php  foreach ($op as $b) { ?>
                                <tr id="rr<?= $i ?>">
                                    <th class="index-table-bank"><?= $i + 1 ?></th>
                                    <th><?= $b['listother'] ?></th>
                                    <th><?= $b['priceother'] ?></th>
                                    <th>
                                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./src/images/icon-delete.png" width="25" onclick="saveIndexDel1(<?= $i ?>)"></button>
                                        <button type="button" class="bgs" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl1"><img src="./src/images/icon-pencil.png" width="25" onclick="saveIndexEdit1(<?= $i ?>)"></button>
                                    </th>
                                </tr>
                                <?php
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row A">
                        <div class=" col-12 d-flex justify-content-end">
                            ยอดสุทธิ : &nbsp;&nbsp;
                            <input type="text" name="net_price" id="net_price">
                        </div>
                    </div>

                    <div class="row btn-g">
                        <div class="col-2">
                            <button type="reset" class="btn-c reset">ยกเลิก</button>
                        </div>
                        <div class="col-2">
                            <input type="submit" class="btn-c submit" value="บันทึก"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!--เพิ่มสินค้า-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <form id="addproduct" name="addproduct">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มสินค้า</h5>
                    <button type="button" class="close" id="addclose" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 r">
                        <div> ชื่อสินค้า &nbsp;&nbsp;:&nbsp;&nbsp;
                            <select class="" id="product_id" name="product_id" style="background-color: #D4DDC6;" >
                                <option value="all" selected hidden>เลือกสินค้า</option>
                                <?php foreach ($products as $p) {  ?>
                                    <option value="<?= $p['product_id'] ?>"><?= $p['product_name'] ?>
                                        &nbsp;<?= $p['brand'] ?>&nbsp;&nbsp;<?= $p['model'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="q"> ราคาต่อหน่วย &nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="number" class="u" min="0.25" step="0.25" name="order_pr" id="order_pr"
                                   required/>
                        </div>
                        <div class="s"> จำนวน &nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="number" class="u" min="1" name="order_amt" id="order_amt" required/>
                        </div>
                        <div class="s"> วันหมดอายุ &nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="date" class="u" min="1" name="exp_date" id="exp_date" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="addtable" class="btn btn-primary1">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!--แก้ไขสินค้า-->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <form id="editaddproduct" name="editaddproduct">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขสินค้า</h5>
                    <button type="button" class="close" id="editclose" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 r">
                        <div> ชื่อสินค้า &nbsp;&nbsp;:&nbsp;&nbsp;
                            <select class="" id="editproduct_id" name="editproduct_id"
                                    style="background-color: #D4DDC6;" >
                                <?php foreach ($products as $p) {  ?>
                                    <option value="<?= $p['product_id'] ?>" <?= $_GET['id']==$p['product_id']?"selected":"" ?>><?= $p['product_name'] ?>
                                        &nbsp;<?= $p['brand'] ?>&nbsp;&nbsp;<?= $p['model'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="q"> ราคาต่อหน่วย &nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="number" class="u" min="0.25" step="0.25" name="editorder_pr"
                                   id="editorder_pr" required/>
                        </div>
                        <div class="s"> จำนวน &nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="number" class="u" min="1" name="editorder_amt" id="editorder_amt" required/>
                        </div>
                        <div class="s"> วันหมดอายุ &nbsp;&nbsp;:&nbsp;&nbsp;
                            <input type="date" class="u" min="1" name="editexp_date" id="editexp_date" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary1">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!--ค่าใช้จ่ายอื่นๆ-->
<div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <form name="addprice" id="addprice" method="post">
        <div class="modal-dialog modal-sm1">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มค่าใช้จ่ายอื่นๆ</h5>
                    <button type="button" id="addcloseother" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>รายการ: &nbsp;<input type="text" name="listother" id="listother" required/><br>
                        <p></p>
                    </center>
                    <center>ราคา: &nbsp;<input type="text" name="priceother" id="priceother" required/>
                        <p></p>
                    </center>

                    <div class="modal-footer">
                        <button type="submit" id="addtable2" class="btn btn-primary1">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!--แก้ไขค่าใช้จ่ายอื่นๆ-->
<div class="modal fade bd-example-modal-sm4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <form name="addprice" id="editaddprice" method="post">
        <div class="modal-dialog modal-sm4">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขค่าใช้จ่ายอื่นๆ</h5>
                    <button type="button" id="editaddcloseother" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>รายการ: &nbsp;<input type="text" name="listother" id="editlistother" required/><br>
                        <p></p>
                    </center>
                    <center>ราคา: &nbsp;<input type="text" name="priceother" id="editpriceother" required/>
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
<!-- ลบ -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ลบรายการ</h5>
                <button type="button" id="closedelrow" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body1">
                <h3>ยืนยันที่จะลบ</h3>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="delrow()" class="btn btn-primary1">ตกลง</button>
            </div>
        </div>
    </div>
</div>

<!-- ลบรายการอื่นๆ -->
<div class="modal fade" id="exampleModalother" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ลบรายการ</h5>
                <button type="button" id="closedelrow2" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body1">
                <h3>ยืนยันที่จะลบ</h3>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="delrow2()" class="btn btn-primary1">ตกลง</button>
            </div>
        </div>
    </div>
</div>
</body>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#slipupload").hide()
        localStorage.clear()
        localStorage.setItem("tablePrice", JSON.stringify({data: []}))
        localStorage.setItem("tableProduct", JSON.stringify({
            data: [<?php echo $json; ?>]
        }))
    });
</script>
<script src="./src/js/confirm2.js"></script>

</html>