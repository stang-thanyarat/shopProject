<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/addtocart.css" />
    
    <title>addtocart</title>
    
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                <h1>รถเข็นสินค้า<h1>
                </div>
                <table class="main col-11">
                <tr bgcolor="lightgreen">
                        <th>ลำดับ</th>
                        <th>รูปภาพ</th>
                        <th>สินค้า</th>
                        <th>ราคาต่อชิ้น</th>
                        <th>จำนวน</th>
                        <th>ราคารวม</th>
                        <th  colspan="2">ลบ หรือ แก้ไข</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th><img src="./src/images/ใบตัดหญ้า1.png" width="114"></th>
                        <th>ใบตัดหญ้า มีฟัน (แบบวงเดือน) รุ่น 10X24T</th>
                        <th>105 บาท</th>
                        <th>2</th>
                        <th>210 บาท</th>
                        <th><a class="submit btn" href="#"><img class='delete' src="./src/images/icon-delete.png" width="25"></a>
                        </th>
                        <th><a class="submit btn" href="#"><img class='delete' src="./src/images/icon-pencil.png" width="25"></a>
                        </th>
                    </tr>
                    <tr bgcolor="lightgreen">
                        <th  colspan="2"> <select name="type" id="type" required>
                                        <option value="seed.">เงินสด</option>
                                        <option value="Mrs.">โอนผ่าบัญชีธนาคาร</option>
                                        <option value="miss">ผ่อนชำระ</option>
                                        </th>
                                        <th  colspan="6">
                                            <div class="title page">
                                                <h5 style="display: inline;">จำนวน 2 ชิ้น   &nbsp</h5>
                                                <h5 style="display: inline;">ยอดรวมทั้งหมด : 210 บาท &nbsp &nbsp</h5>
                                                <button type="submit" align="right">ยืนยัน</a>
                                            </div>

                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>

</html>