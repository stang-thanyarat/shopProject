<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/contract.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <script src="./src/js/contract.js"></script>
    <form name="form" action="demo_form.asp" onsubmit="return validateForm()" method="post">
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>สัญญาซื้อขาย</h1>
                    <p></p>
                    <div class="col-12">
                        <label for="contract">ฉบับที่:</label>
                        <input type="text" name="no" id="no" />
                    </div>
                    <div class="col-12">
                        <label for="contract">วันที่ทำสัญญา:</label>
                        <input type="date" name="dateContract" id="dateContract" />
                    </div>
                    <div class="col-12 ">
                        <label for="contract">นามผู้ขาย:</label>
                        <select name="owner" style="background-color: #7C904E;">
                            <option value="นาย" selected>เลือก</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="contract">จำนวนเงินที่ขาย:</label>
                        <input type="number" name="amount" id="amount" />
                    </div>
                    <div class="col-12">
                        <label for="contract">ทรัพย์ที่ขาย:</label>
                    </div>
                    <div class="col-12">
                        <textarea style="vertical-align: middle;" name="detail" cols="50" rows="5"></textarea>
                    </div>
                </div>
                <div class="row1">
                    <div class="col-12">ข้าพเจ้า xxxxxxxxx ซึ่งต่อไปในหนังสือสัญญานี้เรียกว่าผู้ขายฝ่ายหนึ่งกับ</div>
                </div>
                <div class="row1">
                    <div class="col-xl-4 col-lg-12 ">ข้าพเจ้า:
                        <select name="customerPrefix" style="background-color: #7C904E;">
                            <option value="นาย" selected>นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-12 ">ชื่อ:<input type="text" name="namecustomer" id="namecustomer"></div>
                    <div class="col-xl-4 col-lg-12 ">นามสกุล:<input type="text" name="lastamecustomer" id="lastamecustomer"></div>
                    <div class="col-xl-4 col-lg-12 ">รหัสบัตรประชาชน:<input type="text" name="idcard" id="idcard"></div>
                </div>
                <div class="row1">
                    <div class="col-12">ซึ่งต่อไปในหนังสือสัญญานี้เรียกว่าผู้ซื้อฝ่ายหนึ่ง ทั้งสองฝ่ายตกลงทำสัญญาซื้อขายทรัพย์สินมีดังข้อความต่อไปนี้</div>
                    <div class="col-12">
                        <label for="contract">ข้อ ๑ ผู้ขายได้ขาย&nbsp;</label>
                    </div>
                    <div class="col-12">
                        <textarea name="detail" cols="50" rows="5" style="vertical-align: middle;"></textarea>
                    </div>
                    <div class="col-12">ให้แก่ผู้ซื้อเป็นจำนวนเงิน xxx บาท xxxx สตางค์ (xxxxxxxx)</div>
                    <div class="col-12">และยอมส่งมอบทรัพย์สินที่ขายให้แก่ผู้ซื้อวันที่&nbsp;<span>&nbsp;<input type="date" name="saleDate"></span></div>
                    <div class="col-12">และผู้ขายได้รับราคาดังกล่าวแล้วไปจากผู้ซื้อเสร็จแล้วตั้งแต่วันที่&nbsp;<span>&nbsp;<input type="date" name="payDate"></span></div>
                    <div class="col-12">ข้อ ๒ ผู้ขายยอมสัญญาว่า ทรัพย์สินซ่งผู้ขายนำมาขายให้แก่ผู้ซื้อนี้เป็นทรัพย์สินของผู้ขายคนเดียว และไม่เคยนำไปขาย จำนำ หรือทำสัญญาผูกพันธ์ใด ๆ แก่ผู้ใดเลย</div>
                    <div class="col-12"><label for="contract"> ข้อ ๓ &nbsp;</label></div>
                    <div class="col-12"><textarea style="background-color: #7C904E; vertical-align: middle;" name="AnotherCondition" cols="50" rows="5"></textarea></div>
                    <div class="col-12">ข้อ ๔ ผู้ขายและผู้ซื้อได้ทราบข้อความในสัญญานี้ดีแล้ว จึงได้ลงลายมือชื่อไว้ในสัญญานี้เป็นหลักฐาน</div>

                </div>
                <div class="row sign">
                    <div class="col-12 d-flex justify-content-end signin">ลงชื่อ<div class="line"></div>ผู้ขาย</div>
                    <div class="col-12 d-flex justify-content-end signin">ลงชื่อ<div class="line"></div>ผู้ซื้อ</div>
                    <div class="col-12 d-flex justify-content-end signin">ลงชื่อ<div class="line"></div>พยาน</div>
                    <div class="col-12 d-flex justify-content-end signin">ลงชื่อ<div class="line"></div>พยาน</div>
                    <div class="col-12 d-flex justify-content-end signin">ลงชื่อ<div class="line"></div>พยาน</div>
                </div>
                <div class="row1">
                    <div class="col-12">๑. หากผู้ขายยังไม่ส่งมอบทรัพย์ให้ในเวลาทำสัญญา ควรจะเติมข้อความอีก ๑ ข้อว่าตราบใดที่ผู้ขายยังไม่ส่งมอบทรัพย์ให้ ยังไม่ถือว่าได้มีการซื้อขาย มิฉะนั้นผู้ซื้ออาจเสียเปรียบผู้ขาย</div>
                    <div class="col-12">๒. สัญญาซื้อขายไม่ต้องปิดอากรแสตมป์ เว้นแต่จะถือว่าสัญญานี้เป็นใบรับเงินแล้ว ถ้าสัญญาซื้อขายนี้ตั้งแต่ ๑๐ บาท ถึง ๒๐ บาท ต้องติดอากรแสตมป์ ๑๐ สตางค์ ถ้าสัญญาซื้ขายนี้เกิน ๒๐ บาท ทุก ๒๐ บาท หรือเศษของ ๒๐ บาท ต่อ ๑๐ สตางค์ ถ้าสัญญาซื้อขายต่ำกว่า ๑๐ บาท ไม่ต้องติดอากรแสตมป์</div>
                </div>
                <div class="row B">
                    <div class=" col-12 d-flex justify-content-end signin">
                        <input class="BTN" type="submit" value="บันทึก">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
</body>

</html>