<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/repay.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-lg-5">
                        <h1>ชำระหนี้</h1>
                    </div>
                </div>
                <div class="row c">
                    <div class="col-xl-6">ชื่อ-นามสกุล:สมชาย พักดี </div>
                    <div class="col-xl-6">รหัสบัตรประชาชน:1234567890345</div>
                </div>
                <div class="row c">
                    <div class="col-xl-6">วันที่ทำสัญญา:26/12/2021</div>
                    <div class="col-xl-6">วันที่ครบกำหนด:26/03/2022</div>
                </div>
                <div class="row c">
                    <div class="col-xl-6">เงินต้น:220 บาท</div>
                </div>
                <div class="row c">
                    <div class="col-xl-6 ">คงค้าง:0 บาท</div>
                    <div class="col-xl-6 ">ดอกเบี้ย:0 บาท</div>
                </div>
                <div class="row B">
                <div class=" col-12 d-flex justify-content-end">
                            <button type="button" class="btn1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm">เพิ่ม</button>
                </div>
                </div>
                <table class="main col-10">
                    <tr>
                        <th>วันที่ชำระ</th>
                        <th>วิธีการชำระ</th>
                        <th>ไฟล์แนบ</th>
                        <th>ยอดที่ชำระ</th>
                        <th>หักเงินต้น</th>
                        <th>หักดอกเบี้ย</th>
                        <th>คงค้าง</th>
                    </tr>
                    <tr>
                        <th>02/01/2022</th>
                        <th>เงินสด</th>
                        <th></th>
                        <th>100</th>
                        <th>100</th>
                        <th></th>
                        <th>120</th>
                    </tr>
                    <tr>
                        <th>26/02/2022</th>
                        <th>โอนเงิน</th>
                        <th><img src="./src/images/picture.png" width="25"></th>
                        <th>120</th>
                        <th>120</th>
                        <th></th>
                        <th>0</th>
                    </tr>
                </table>
                <p></p>
                <div class="row B">
                    <div class=" col-12 d-flex justify-content-end signin">
                        <input class="BTNC" type="submit" value="ยกเลิก">
                        <input class="BTNE" type="submit" value="หมดหนี้">
                        <input class="BTN" type="submit" value="บันทึก" onclick="javascript:window.location='contracthistory.php';">
                    </div>
                </div>
            </div>
        </div>

        <!---modal เพิ่มการชำระหนี้-->
        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มการชำระหนี้</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addrepay" >
                                        <div class="col-12 p">
                                        วันที่ชำระ: &nbsp;
                                            <input type="date" class="t" name="repaymentdate" id="repaymentdate" required/>
                                        </div>
                                    
                                        <div class="col-12 p">
                                        วิธีการชำระ: &nbsp;
                                            <select name="payment" style="background-color: #7C904E;" required>
                                                <option value="เลือก" selected>เลือก</option>
                                                <option value="เงินสด" >เงินสด</option>
                                                <option value="โอนเงิน" >โอนเงิน</option>
                                            </select>
                                        </div>
                                        
                                            <div class="col-12 r">
                                            ไฟล์แนบ: &nbsp;
                                                <input accept="image/*" type="file" name="slip" required/>
                                            </div>
                                     
                                     ยอดที่ชำระ: &nbsp;<div class="col-12 p"> <input type="number" class="u" min="0.25" step="0.25" name="paymentamount" id="paymentamount"  required /></div>
                                     หักเงินต้น: &nbsp;<div class="col-12 p"> <input type="number" class="u" min="0.25" step="0.25" name="deduct" id="deduct"required /></div>
                                     หักดอกเบี้ย: &nbsp;<div class="col-12 p"> <input type="number" class="u" min="0.25" step="0.25" name="lessinterest" id="lessinterest"required /></div>
                                     คงค้าง: &nbsp;<div class="col-12 p"> <input type="number" class="u" min="0.25" step="0.25" name="outstanding" id="outstanding"required /></div>
                              
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary1">ตกลง</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>