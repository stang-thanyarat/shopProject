<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/searchinformation.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>ค้นหาข้อมูลการซื้อสินค้า </h1>
                    <div>
                        เลขที่ใบเสร็จ :&nbsp &nbsp<input type="text" class="btnd" placeholder="&nbsp เลขที่ใบเสร็จ" required>
                        <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>
                    </div>
                    <table class="main col-10">
                        <tr class="h">
                            <th>ลำดับ</th>
                            <th>รูปภาพ</th>
                            <th>สินค้า</th>
                            <th>ราคาต่อชิ้น</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th><img src="./src/images/1.png" width="100"></th>
                            <th>เครื่องตัดหญ้าสะพายบ่า 4 จังหวะ 50ซี.ซี. UMK450T U2TT (จานยาว)</th>
                            <th>9,490 บาท</th>
                            <th>1</th>
                            <th>9,490 บาท</th>
                            <th><input class="BTN" type="submit" value="เปลี่ยนสินค้า"></th>
                        </tr>
                        <tr>
                            <th>2</th>
                            <th><img src="./src/images/2.png" width="100"></th>
                            <th> กระเจี๊ยบ-อพอลโล</th>
                            <th>20 บาท</th>
                            <th>1</th>
                            <th>20 บาท</th>
                            <th></th>
                        </tr>
                        <tr class="h">
                            <th colspan="8">จำนวน 3 ชิ้น ยอดรวมทั้งหมด : 9,510 บาท</ะ>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </form>
</body>

</html>