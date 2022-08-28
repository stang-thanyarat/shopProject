<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/changeproduct.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>ตั้งค่าการเปลี่ยนสินค้า</h1>
                    <table class="main col-10">
                        <tr>
                            <th>ระยะเวลาที่รับเปลี่ยนสินค้า &nbsp<input type="text" name="vat" id="vat" required> &nbsp วัน</th>
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
        </div>
    </form>
</body>

</html>