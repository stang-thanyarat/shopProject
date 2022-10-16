<?php
include_once('service/auth.php');
isNotAdmin();
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./src/css/editproduct.css" />

    <title>editproduct</title>
</head>
<?php
include_once('nav.php');
//เริ่มทำแก้ไข//
include_once('database/Product.php');
include_once('database/Category.php');
include_once "./database/Sell.php";
include_once('controller/Redirection.php');
$product = new Product();
$category = new Category();
$sell = new Sell();
if (!isset($_GET['id'])) {
    redirection('/productresult.php');
}
$p = $product->fetchById($_GET['id']);
$rows = $category->fetchAll();
$sells = $sell->fetchAll();
//เริ่มทำแก้ไข//
?>

<body>
<form action="controller/Product.php" name="form1" id="form1" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="product_img" value="<?= $p['product_img']; ?>" />
        <input type="hidden" name="product_detail_img" value="<?= $p['product_detail_img']; ?>" />
        <input type="hidden" value="product" name="table" />
        <input type="hidden" value="update" name="form_action" />
        <input type="hidden" value="<?= $_GET['id'] ?>" name="product_id" />

        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col">
                        <h1>แก้ไขสินค้า</h1>
                    </div>
                </div>
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
                                    ประเภทสินค้า :<span style="color: red; ">&nbsp*</span>
                                    <select name="category_id" id="category_id" class="inbox" style="background-color: #D4DDC6;" required>
                                        <option value="" selected hidden>เลือกประเภทสินค้า</option>
                                        <?php foreach ($rows as $row) { ?>
                                            <option value="<?= $row['category_id'] ?>" <?= $p['category_id'] == $row['category_id'] ? "selected" : '' ?>><?= $row['category_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!--<div class="col productnumber ">
                                    รหัสสินค้า :&nbsp&nbsp
                                    <label for="no." id="" class="inbox">A01
                                    </label>
                                </div>-->
                            </div>

                            <div class="row a">
                                <div class="col productname">
                                    ชื่อสินค้า :<span style="color: red; ">&nbsp*</span>
                                    <input name="product_name" type="text" id="product_name" class="inbox" value="<?= $p['product_name']; ?>" required />
                                </div>
                                <div class="col">
                                    ยี่ห้อสินค้า :<span style="color: red; ">&nbsp*</span>
                                    <input name="brand" type="text" id="brand" class="inbox" value="<?= $p['brand']; ?>" />
                                </div>
                            </div>

                            <div class="row a">
                                <div class="col productversion">
                                    รุ่นสินค้า :<span style="color: red; ">&nbsp*</span>
                                    <input name="model" type="text" id="model" class="inbox" value="<?= $p['model']; ?>" />
                                </div>
                                <div class="col sellername">
                                    ชื่อผู้ขาย :<span style="color: red; ">&nbsp*</span>
                                    <select name="sell_id" id="sell_id" class="inbox" style="background-color: #D4DDC6;" required>
                                        <?php foreach ($sells as $s) { ?>
                                        <option value="<?= $s['sell_id'] ?>" <?= $s['sell_id'] == $s['sell_id'] ? "selected" : '' ?>><?= $s['sell_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row a">
                                <div class="col image">
                                    รูปภาพสินค้า :<span style="color: red; ">&nbsp*</span>
                                    <input type="file" accept="image/*" name="product_img1" id="product_img1" class="inbox" value="<?= $p['product_img']; ?>">
                                </div>
                                <div class="col productinformation">
                                    รูปรายละเอียดสินค้า :<span style="color: red; ">&nbsp*</span>
                                    <input type="file" accept="image/*" name="product_img2" id="product_img2" class="inbox" value="<?= $p['product_detail_img']; ?>">
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
                                    <?= $p['product_detail']; ?>
                                    </textarea>
                                </div>
                                <div class="col amount">
                                    จำนวน :<span style="color: red; ">&nbsp*</span>
                                    <input name="product_dlt_unit" type="text" id="product_dlt_unit" class="inbox" value="<?= $p['product_dlt_unit']; ?>" required />
                                </div>
                            </div>
                            <div class="row a">
                                <div class="col-5 unit">
                                    หน่วยนับ :<span style="color: red; ">&nbsp*</span>
                                    <select name="product_unit" id="product_unit" class="inbox" style="background-color: #D4DDC6;" required>
                                        <option value="ซอง" <?= $p['product_unit'] == "ซอง" ? "selected" : '' ?>>ซอง</option>
                                        <option value="ขวด" <?= $p['product_unit'] == "ขวด" ? "selected" : '' ?>>ขวด</option>
                                        <option value="ชิ้น" <?= $p['product_unit'] == "ชิ้น" ? "selected" : '' ?>>ชิ้น</option>
                                        <option value="กล่อง" <?= $p['product_unit'] == "กล่อง" ? "selected" : '' ?>>กล่อง</option>
                                        <option value="เครื่อง" <?= $p['product_unit'] == "เครื่อง" ? "selected" : '' ?>>เครื่อง</option>
                                        <option value="ถุง" <?= $p['product_unit'] == "ถุง" ? "ถุง" : '' ?>>ถุง</option>
                                        <option value="กระสอบ" <?= $p['product_unit'] == "กระสอบ" ? "selected" : '' ?>>กระสอบ</option>
                                    </select>

                                </div>
                                <div class="col-3 price">
                                    ราคาขาย :<span style="color: red; ">&nbsp*</span>
                                    <input name="price" type="text" id="price" class="inbox" value="<?= $p['price']; ?>" required />
                                </div>
                                <div class="col-2 vax">
                                    <input type="checkbox" class="vaxcheckbox" name="vat"  <?=$p['vat']==1?"checked":''; ?>/>
                                    <label class="vaxcheckboxtext" >ภาษีมูลค่าเพิ่ม</label>
                                </div>
                            </div>

                            <div class="row a">
                                <div class="col-5 min1">
                                    สินค้าคงคลังขั้นต่ำ :<span style="color: red; ">&nbsp*</span>
                                    <input name="notification_amt" type="text" id="notification_amt" class="inbox" value="<?= $p['notification_amt']; ?>" />
                                    <!--notification_amt = notification amount-->
                                </div>
                                <div class="col-3 costprice">
                                    ราคาทุน :<span style="color: red; ">&nbsp*</span>
                                    <input name="cost_price" type="text" id="cost_price" class="inbox" value="<?= $p['cost_price']; ?>" required />
                                </div>
                                <div class="col-2 watchcostprice">
                                    <a type="button" href="costprice.php" class="button btn">ดูราคาทุน</a>
                                </div>
                            </div>
                            <div class="row a">
                                <div class="col settingmin">
                                    <input name="set_n_amt" id="set_n_amt" type="checkbox" <?= $p['set_n_amt'] == 0 ? "" : "checked" ?> />
                                    <label for="set_n_amt">ตั้งค่าสินค้าคงคลังขั้นต่ำล่วงหน้า</label>
                                </div>
                            </div>
                            <div class="row a" id="post">
                                <div class="col start">
                                    วันที่เริ่มใช้งาน :<span style="color: red; ">&nbsp*</span>
                                    <input name="date_n_amt" type="date" id="date_n_amt" class="inbox" value="<?= $p['date_n_amt']; ?>" />
                                </div>
                                <div class="col min2">
                                    สินค้าคงคลังขั้นต่ำ :<span style="color: red; ">&nbsp*</span>
                                    <input name="notification_amt2" type="text" id="notification_amt2" class="inbox" value="<?= $p['notification_amt2']; ?>" />
                                </div>
                            </div>
            </div>
            <br>
            </th>
            </tr>
            </table>
            <div class="row btn-g">
                <div class="col-2">
                    <button type="button" onclick="window.location= 'productresult.php'" class="btn-c reset">กลับ</button>
                </div>
                <div class="col-2">
                    <input type="submit" class="btn-c submit" value="บันทึก" />
                </div>
            </div>
        </div>
        </div>
    </form>
</body>
<script src="./src/js/editproduct.js"></script>
<script>
    $(document).ready(function() {
        if (<?= $p['set_n_amt'] ?> == 0) {
            $('#post').hide()
        } else {
            $('#post').show()
        }
    });
</script>

</html>