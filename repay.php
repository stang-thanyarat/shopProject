<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/repay.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row main">
            <div class="col-lg-5">
                <h1>ชำระหนี้</h1>
            </div>
        </div>
        <div class="row c">
            <div class="col-xl-6">ชื่อ-นามสกุล:xxxxxx xxxxxx </div>  <div class="col-xl-6">รหัสบัตรประชาชน:xxxxxxxxxxxxxxxx</div>
        </div>
        <div class="row c">
            <div class="col-xl-6">วันที่ทำสัญญา:xx/xx/xxxx</div>  <div class="col-xl-6">วันที่ครบกำหนด:xx/xx/xxxx</div>
        </div>
        <div class="row c">
            <div class="col-xl-6">เงินต้น:xxx บาท</div>
        </div>
        <div class="row c">
            <div class="col-xl-6 ">คงค้าง:xxx บาท</div>  <div class="col-xl-6 ">ดอกเบี้ย:xxx บาท</div>
        </div>
        <div class="row B">
            <div class=" col-12 d-flex justify-content-end signin">
                <input class="BTNP" type="submit" value="เพิ่ม">
            </div>
        </div>
        <table class="main col-10">
            <tr>
                <th>วันที่ชำระ</th>
                <th>วิธีการชำระ</th>
                <th>ชื่อ-นามสกุล</th>
                <th>ไฟล์แนบ</th>
                <th>ยอดที่ชำระ</th>
                <th>หักเงินต้น</th>
                <th>หักดอกเบี้ย</th>
                <th>คงค้าง</th>
            </tr>
        </table>
        <p></p>
        <div class="row B">
            <div class=" col-12 d-flex justify-content-end signin">
                <input class="BTNC" type="submit" value="ยกเลิก">
                <input class="BTN" type="submit" value="บันทึก">
            </div>
        </div>
</body>