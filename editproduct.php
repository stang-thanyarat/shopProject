<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/css/editproduct.css" />

    <title>editproduct</title>
</head>
<?php include('nav.php'); ?>

<body>
        <form name="editproduct" onsubmit="return validateForm()" id="form1" name="form1" method="post" action="">
            <div class="row">
                <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
                <div class="col-11">
                    <div class="row main">
                        <div class="col">
                        <h1>แก้ไขสินค้า</h1>
                        </div>
                    </div>
                    <table class="mai">

                    <tr>
                        <th> รายละเอียดสินค้า </th>
                    </tr>

                    <tr>
                        <th>
                            <div class="row-4 ma">
                                <label for="type">ประเภทสินค้า:</label>
                                    <select name="type" id="type" required>
                                        <option value="seed.">เมล็ดพันธุ์</option>
                                        <option value="Mrs.">นาง</option>
                                        <option value="miss">นางสาว</option>
                                    </select>
                            </div>
                            <div class="row-4 ma">
                                <label for="no.">รหัสสินค้า : </label><label for="no."> A01</label>
                            </div>
                            <div class="row-4 ma">
                                <label for="lastname">ชื่อสินค้า :</label>
                                    <input name="lastname" type="text" id="lastname" required />
                            </div>
                            <div class="row-4 ma">
                                <label for="address">ยี่ห้อสินค้า :</label>
                                    <input name="lastname" type="text" id="lastname" required />
                            </div>
                            <div class="row-4 ma">
                                <label for="birthday">รุ่นสินค้า :</label>
                                    <input name="lastname" type="text" id="lastname" required />
                            </div>
                            <div class="row-4 ma">
                                <label for="ID card numbe">ชื่อผู้ขาย :</label>
                                    <select name="type" id="type" required>
                                        <option value="seed.">อาร์เอส อินเตอร์เทรด (2017) จำกัด</option>
                                        <option value="Mrs.">นาง</option>
                                        <option value="miss">นางสาว</option>
                                    </select>
                            </div>
                            <div class="row ma">
                                <div class="col">
                                    รูปภาพสินค้า : <input type="file" accept="image/*" name="copyofIDcard" required>
                                </div>
                                <div class="col">
                                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                                </div>
                            </div>
                            <div class="row ma">
                                <div class="col">
                                    รูปรายละเอียดสินค้า : <input type="file" accept="image/*" name="Copyofhouseregistration" required>
                                </div>
                                <div class="col">
                                    <h5>*ประเภทไฟล์ที่ยอมรับ: .jpg, .jpeg, .png ขนาดไฟล์ไม่เกิน 8 MB</h5>
                                </div>
                            </div>
                            <div class="row-4 ma">
                                <div class="col">
                                    <label for="note">รายละเอียด :&nbsp;</label>
                                        <textarea name="note" cols="50" rows="5" style="vertical-align:top;"></textarea>
                                </div>
                            </div>
                            <div class="row-4 ma">
                                <label for="birthday">จำนวน :</label>
                                    <input name="lastname" type="text" id="lastname" required />
                            </div>
                            <div class="row-4 ma">
                                <label for="type">หน่วยนับ:</label>
                                    <select name="type" id="type" required>
                                        <option value="seed.">ซอง</option>
                                        <option value="Mrs.">ขวด</option>
                                        <option value="miss">ชิ้น</option>
                                    </select>
                            </div>
                            <div class="row ma">
                                <div class="col">
                                    <label for="birthday">ราคาขาย :</label>
                                        <input name="lastname" type="text" id="lastname" required />
                                </div>
                                <div class="col-1">
                                    <label class="checkbox">
                                        <input type="checkbox">
                                    </label>
                                ภาษีมูลค่าเพิ่ม
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-primary1" data-bs-toggle="modal" data-bs-target=".    bd-example-modal-xl">ดูราคาทุน</button>
                                </div>
                            </div>
                            <div class="row-4 ma">
                                สถานะการขาย : 
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="row-4 ma">
                                <label for="birthday">สินค้าคงคลังขั้นต่ำ :</label>
                                    <input name="lastname" type="text" id="lastname" required />
                            </div>
                            <div class="row-4 ma">
                                    <label class="checkbox">
                                        <input type="checkbox">
                                    </label>
                                <label for="setting">ตั้งค่าสินค้าคงคลังขั้นต่ำล่วงหน้า </label>
                            </div>
                            <div class="row-4 ma">
                                <label for="date">วันที่เริ่มใช้งาน :</label>
                                    <input name="lastname" type="date" id="lastname" required />
                            </div>
                            <div class="row-4 ma">
                                <label for="birthday">สินค้าคงคลังขั้นต่ำ :</label>
                                    <input name="lastname" type="text" id="lastname" required />
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

<script src="./src/js/editproduct.js"></script>
</html>