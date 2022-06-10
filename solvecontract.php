<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/solvecontract.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <script src="./src/js/contract.js"></script>
    <form name="form1" action="" onsubmit="checkForm(); return false;">
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>แก้ไขสัญญาซื้อขาย</h1>
                    <p></p>
                    <div class="col-6">
                        <div class="col-12">
                            ฉบับที่: &nbsp;
                            <input type="text" name="no" id="no" />
                        </div>
                        <div class="col-12">
                            วันที่ทำสัญญา:&nbsp;
                            <input type="date" name="dateContract" id="dateContract" required />
                        </div>
                        <div class="col-12 ">
                            นามผู้ขาย:&nbsp;
                            <select name="owner" style="background-color: #7C904E;">
                                <option value="นาย" selected>เลือก</option>
                            </select>
                        </div>
                        <div class="col-12">
                            จำนวนเงินที่ขาย:&nbsp;
                            <input type="number" name="amount" id="amount" />
                        </div>
                        <div class="col-12">
                            ทรัพย์ที่ขาย:&nbsp;
                        </div>
                        <div class="col-12">
                            <textarea style="vertical-align: middle;" name="detail" cols="50" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row1">
                            <div class="col-12">ข้าพเจ้า xxxxxxxxx ซึ่งต่อไปในหนังสือสัญญานี้เรียกว่าผู้ขายฝ่ายหนึ่งกับ</div>
                        </div>
                        <div class="row1">
                            <div class="col-xl-12 col-lg-12 ">ข้าพเจ้า:&nbsp;
                                <select name="customerPrefix" style="background-color: #7C904E;" required>
                                    <option value="นาย" selected>นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 ">ชื่อ:&nbsp; &nbsp;<input type="text" name="namecustomer" id="namecustomer" required /></div>
                            <div class="col-xl-12 col-lg-12 ">นามสกุล:&nbsp; &nbsp;<input type="text" name="lastamecustomer" id="lastamecustomer" required /></div>
                            <div class="col-xl-12 col-lg-12 ">รหัสบัตรประชาชน:&nbsp; &nbsp;<input type="text" name="idcard" id="idcard" required /></div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row1">
                        <div class="col-12">ซึ่งต่อไปในหนังสือสัญญานี้เรียกว่าผู้ซื้อฝ่ายหนึ่ง ทั้งสองฝ่ายตกลงทำสัญญาซื้อขายทรัพย์สินมีดังข้อความต่อไปนี้</div>
                        <div class="col-12">
                            <label for="contract">ข้อ ๑ ผู้ขายได้ขาย&nbsp;</label>
                        </div>
                        <div class="col-12">
                            <textarea name="detail" cols="50" rows="5" style="vertical-align: middle;"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="col-12">ให้แก่ผู้ซื้อเป็นจำนวนเงิน xxx บาท xxxx สตางค์ (xxxxxxxx)</div>
                            <div class="col-12">และยอมส่งมอบทรัพย์สินที่ขายให้แก่ผู้ซื้อวันที่&nbsp;<span>&nbsp;<input type="date" name="saleDate" required></span></div>
                            <div class="col-12">และผู้ขายได้รับราคาดังกล่าวแล้วไปจากผู้ซื้อเสร็จแล้วตั้งแต่วันที่&nbsp;<span>&nbsp;<input type="date" name="payDate" required></span></div>
                            <div class="col-12">ข้อ ๒ ผู้ขายยอมสัญญาว่า ทรัพย์สินซ่งผู้ขายนำมาขายให้แก่ผู้ซื้อนี้เป็นทรัพย์สินของผู้ขายคนเดียว และไม่เคยนำไปขาย จำนำ หรือทำสัญญาผูกพันธ์ใด ๆ แก่ผู้ใดเลย</div>
                            <div class="col-12"><label for="contract"> ข้อ ๓ &nbsp;</label></div>
                            <div class="col-12"><textarea style="background-color: #7C904E; vertical-align: middle;" name="AnotherCondition" cols="50" rows="5"></textarea></div>
                            <div class="col-12">ข้อ ๔ ผู้ขายและผู้ซื้อได้ทราบข้อความในสัญญานี้ดีแล้ว จึงได้ลงลายมือชื่อไว้ในสัญญานี้เป็นหลักฐาน</div>

                        </div>
                        <div class="row sign">
                            <div class="col-6">
                                <div class="col-12 d-flex justify-content-start signin t">ลงชื่อ<div class="line"></div>พยาน</div>
                                <div class="col-12 d-flex justify-content-start signin t">ลงชื่อ<div class="line"></div>พยาน</div>
                                <div class="col-12 d-flex justify-content-start signin t">ลงชื่อ<div class="line"></div>พยาน</div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 d-flex justify-content-end signin">ลงชื่อ<div class="line"></div>ผู้ขาย</div>
                                <div class="col-12 d-flex justify-content-end signin">ลงชื่อ<div class="line"></div>ผู้ซื้อ</div>
                            </div>
                        </div>
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