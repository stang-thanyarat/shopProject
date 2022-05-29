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
    <form name="addnewstaff" onsubmit="return validateForm()" id="form1" name="form1" method="post" action="">
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col">
                        <h1>การเปลี่ยนสินค้า</h1>
                    </div>
                </div>
                            <div class="row-4 ma">
                                <label for="product">สินค้าที่ต้องการเปลี่ยน :</label>
                                <input name="product" type="text" id="product" required />
                            </div>
                            <div class="row-4 ma">
                                <label for="sum">จำนวนที่เปลี่ยนสินค้า :</label>
                                <input name="sum" type="text" id="sum" required />
                                </div>
                                <div class="row ma">
                                <div class="col">
                                หลักฐานที่เสียหาย : <input type="file" accept="image/*" name="evidence" required>
                                </div>
                                 <div class="col">
                                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                                </div>
                                <br>
                                <div class="row mai">
                                    <div class="col">
                                    <label for="note">หมายเหตุ :&nbsp;</label>
                                    <textarea name="note" cols="50" rows="5" style="vertical-align:top;"></textarea>
                                </div>
                                <br>
                                <div class="row mai">
                                    <div class="col-12">
                                        <label for="status">สถานะการเปลี่ยนสินค้า :      </label> 
                                        <input type="radio" name="complete" class="complete" value="สำเร็จแล้ว" >     
                                        <label for="complete">  สำเร็จแล้ว </label>
                                        <input type="radio" name="wait" class="wait" value="รอของ" checked >
                                        <label for="wait">  รอของ </label>
                                        <div class="row-4 ma">
                                        <div class="col-12">
                                        <label for="name">ชื่อ :</label>
                                                <input name="name" type="text" id="name" required />
                                                </div>
                                        <div class="row ma">
                                        <div class="col-12">
                                         <label for="tel">เบอร์โทรติดต่อ :</label>
                                                <input name="tel" type="text" id="ะtel" required />
                                                </div>
                                    </div>
                    <div class="row btn-g">
                    <div class="col-2">
                        <button type="reset" class="btn-c reset" >ยกเลิก</button>
                    </div>
                    <div class="col-2">
                        <input type="submit" class="btn-c submit"  value="บันทึก" />
                    </div>
    </form>
</body>
<script src="./src/js/addproductreplacement.js"></script>

</html>