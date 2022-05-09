<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/dailybestseller.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row main">
            <div class="col-4">
                <h1>สินค้าขายดีประจำวัน</h1>
            </div>
            <div class="row" >
                <div class=" col-3">
                <label for="position"></label>
                <select name="position" id="position">
                    <option value="1" selected>เลือกประเภทสินค้า</option>
                    <option value="2">ชุดเสื้อสูบ</option>
                    <option value="3">หัวเกียร์</option>
                    <option value="4">ใบตัดหญ้า</option>
                    <option value="5">ใบตัดข้าว</option>
                    <option value="6">นอตสกรู</option>
                    <option value="7">เชือกเอ็น</option>
                    <option value="8">จาตัดหญ้า</option>
                    <option value="9">คาบู</option>
                    <option value="10">อะไหล่เครื่องพ่นปุ๋ย/เมล็ด</option>
                    <option value="11">ยางกันสะเทือน</option>
                    <option value="12">ปั๊มน้ำ</option>
                    <option value="13">เครื่องตัดหญ้า</option>
                    <option value="14">เมล็ดพันธุ์</option>
                    <option value="15">ยากำจัดวัชพืช</option>
                    <option value="16">ปุ๋ยเคมี</option>
                </select>
                <div class="col-4">
                    <label for="contract">วันที่ทำสัญญา:</label>
                    <input type="date" name="dateContract" />
                </div>
                <div class="col-1">
                    <input type="text" class="btn-d" placeholder="&nbsp ชื่อผู้ขาย">
                    <button type="submit" class="s">
                        <img src="./src/images/search.png" width="15" alt="">
                </div>
            </div>
            <table class="main">
                <tr>
                    <th>ลำดับ</th>
                    <th>รูปภาพ</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                </tr>
            </table>
</body>