<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/css/addproduct.css" />

    <title>addproduct</title>
</head>
<?php include('nav.php'); ?>

<body>
        <form name="addproduct" onsubmit="return validateForm()" id="form1" name="form1" method="post" action="">
            <div class="row">
                <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
                <div class="col-11">
                    <div class="row main">
                        <div class="col">
                        <h1>เพิ่มสินค้า</h1>
                        </div>
                    </div>
                    <table class="mai">
                    <tr >
                        <div class="row">
                            <div class="col-11">
                                <th>&nbsp รายละเอียดสินค้า</th>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <th>
                            <div class="row a">
                                <div class="col">
                                    <label for="type">ประเภทสินค้า :</label>
                                    <select name="type" id="type" class="inbox" required>
                                        <option value="lawn mower blade">ใบตัดหญ้า</option>
                                        <option value="kit">ชุดเสื้อสูบ</option>
                                        <option value="gear knob">หัวเกียร์</option>
                                        <option value="rice cutting blade">ใบตัดข้าว</option>
                                        <option value="screw nut">น็อตสกรู</option>
                                        <option value="string">เชือกเอ็น</option>
                                        <option value="disc lawn mower">จานตัดหญ้า</option>
                                        <option value="kaboo">คาบู</option>
                                        <option value="Fertilizer Sprayer Parts">อะไหล่เครื่องพ่นปุ๋ย</option>
                                        <option value="suspension rubber">ยางกันสะเทือน</option>
                                        <option value="water pump">ปั๊มน้ำ</option>
                                        <option value="lawn mower">เครื่องตัดหญ้า</option>
                                        <option value="seed">เมล็ดพันธุ์</option>
                                        <option value="herbicide">ยากำจัดวัชพืช</option>
                                        <option value="chemical fertilizer">ปุ๋ยเคมี</option>
                                    </select>
                                </div>
                                <div class="col productnumber ">
                                    <label for="no.">รหัสสินค้า :&nbsp</label><label for="no." class="inbox">A01</label>
                                </div>
                            </div>

                            <div class="row a">
                                <div class="col productname">
                                    <label for="address">ชื่อสินค้า :</label>
                                    <input name="lastname" type="text" id="lastname" class="inbox" required />
                                </div>
                                <div class="col">
                                    <label for="birthday">ยี่ห้อสินค้า :</label>
                                    <input name="lastname" type="text" id="lastname" class="inbox" required />
                                </div>
                            </div>

                            <div class="row a">
                                <div class="col productversion">
                                <label for="birthday">รุ่นสินค้า :</label>
                                    <input name="lastname" type="text" id="lastname" class="inbox" required />
                                </div>
                                <div class="col sellername">
                                    <label for="">ชื่อผู้ขาย :</label>
                                    <select name="type" id="type" class="inbox" required>
                                        <option value="RS intertred(2017)">อาร์เอส อินเตอร์เทรด (2017) จำกัด</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row a">
                                <div class="col image">
                                    รูปภาพสินค้า : <input type="file" accept="image/*" name="copyofIDcard" class="inbox" required>
                                </div>
                                <div class="col productinformation">
                                    รูปรายละเอียดสินค้า : <input type="file" accept="image/*" name="Copyofhouseregistration" class="inbox" required>
                                </div>
                            </div>

                            <div class="row a">
                                <div class="col">
                                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                                </div>
                            </div>

                            <div class="row a">
                                <div class="col details">
                                <label for="note">รายละเอียด :</label>
                                        <textarea name="note" cols="50" rows="5"class="inbox" style="vertical-align:top;"></textarea>
                                </div>
                                <div class="col amount">
                                    <label for="birthday">จำนวน :</label>
                                    <input name="lastname" type="text" id="lastname" class="inbox" required />
                                </div>
                            </div>
                            <div class="row a">
                                <div class="col-5 unit">
                                    <label for="type">หน่วยนับ :</label>
                                    <select name="type" id="type" class="inbox" required>
                                        <option value="envelope">ซอง</option>
                                        <option value="bottle">ขวด</option>
                                        <option value="item">ชิ้น</option>
                                        <option value="box">กล่อง</option>
                                        <option value="machine">เครื่อง</option>
                                        <option value="bag">ถุง</option><option value="sack">กระสอบ</option>
                                    </select>
                                </div>
                                <div class="col-3 price">
                                    <label for="birthday">ราคาขาย :</label>
                                    <input name="lastname" type="text" id="lastname" class="inbox" required />
                                </div>
                                <div class="col-2 vax">
                                <input type="checkbox" class="vaxcheckbox">
                                    <label class="checkbox"></label>
                                        ภาษีมูลค่าเพิ่ม
                                </div>
                                    <div class="col-1 costprice">
                                        <button type="button" class="btn-c1 reset1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">ดูราคาทุน</button>
                                </div>
                            </div>

                            <div class="row a">
                                <div class="col status">
                                    สถานะการขาย : 
                                    <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round inbox"></span>
                                    </label>
                                </div>
                                <div class="col min1">
                                    <label for="birthday">สินค้าคงคลังขั้นต่ำ :</label>
                                    <input name="lastname" type="text" id="lastname" class="inbox" required />
                                </div>
                            </div>
            
                            <div class="row a">
                                <div class="col settingmin">
                                    <label class="checkbox" >
                                    <input type="checkbox" >
                                    </label>
                                    <label for="setting">&nbsp&nbspตั้งค่าสินค้าคงคลังขั้นต่ำล่วงหน้า</label>
                                </div>
                            </div>

                            <div class="row a">
                                <div class="col start">
                                    <label for="date">วันที่เริ่มใช้งาน :</label>
                                    <input name="lastname" type="date" id="lastname" class="inbox" required /></div>
                                <div class="col min2">
                                    <label for="birthday">สินค้าคงคลังขั้นต่ำ :</label>
                                    <input name="lastname" type="text" id="lastname" class="inbox" required /></div>
                                </div>
                            </div>
                            <br>
                        </th>
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
        </form>
</body>

<script src="./src/js/addproduct.js"></script>
</html>