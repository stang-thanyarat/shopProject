<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="./src/css/contractsetting.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>ตั้งค่าสัญญาซื้อขาย</h1>
                    <p></p>
                    <p></p>
                    <div class="col-12">
                        <h4>นามผู้ขาย</h4><br>
                        <table class="col-5 mm">
                            <tr>
                                <th>ชื่อ-นามสกุล</th>
                                <th>สถานะการใช้งาน</th>
                            </tr>
                            <tr>
                                <th>นายสมชาย ถึงที่หมาย</th>
                                <th><label class="switch">
                                        <input type="checkbox" required>
                                        <span class="slider round"></span>
                                    </label>
                                </th>
                            </tr>
                            <tr>
                                <th>นางสมหญิง ถึงที่หมาย</th>
                                <th><label class="switch">
                                        <input type="checkbox" required>
                                        <span class="slider round"></span>
                                    </label>
                                </th>
                            </tr>
                        </table>
                    </div>
                    <p></p>
                    <p></p>
                    <h4>ตั้งค่าการคิดดอกเบี้ย</h4>
                    <div class="row">
                        <div class="col-12">เดือนที่เริ่มคิดดอกเบี้ย: &nbsp &nbsp
                            <select name="customerPrefix" style="background-color: #7C904E;">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="1">4</option>
                                <option value="2">5</option>
                                <option value="3">6</option>
                                <option value="1">7</option>
                                <option value="2">8</option>
                                <option value="3">9</option>
                                <option value="1">10</option>
                                <option value="2">11</option>
                                <option value="3">12</option>
                            </select>&nbsp &nbsp นับจากวันที่ลูกค้าซื้อสินค้า
                        </div>
                        <p></p>
                        <p></p>
                        <div class="col-12">
                            ดอกเบี้ยสูงสุดต่อปี: &nbsp &nbsp
                            <input type="text" name="interest" id="interest" required> &nbsp &nbsp ตามกฎหมาย
                        </div>
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
        </div>
</body>

</html>