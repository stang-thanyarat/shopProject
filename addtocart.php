<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/css/addtocart.css" />
    
    <title>addtocart</title>
    
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                <h1>รถเข็นสินค้า<h1>
                </div>
                <table class="col-11 z">
                <tr class="t">
                        <th>ลำดับ</th>
                        <th>รูปภาพ</th>
                        <th>สินค้า</th>
                        <th>ราคาต่อชิ้น</th>
                        <th>จำนวน</th>
                        <th>ราคารวม</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th><img src="./src/images/ใบตัดหญ้า1.png" width="114"></th>
                        <th>ใบตัดหญ้า มีฟัน (แบบวงเดือน) รุ่น 10X24T</th>
                        <th>105 บาท</th>
                        <th>2</th>
                        <th>210 บาท</th>
                        <th><a type="button"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1"><img class='delete' src="./src/images/icon-delete.png" width="25"></a>
                        <a type="button"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm2"><img class='pencil' src="./src/images/icon-pencil.png" width="25"></a>
                        </th>
                    </tr>
                    <tr class="t">
                        <th  colspan="2" > <select name="type"  id="type" required >
                                        <option value="cash">เงินสด</option>
                                        <option value="bank transfer">โอนผ่าบัญชีธนาคาร</option>
                                        <option value="installment">ผ่อนชำระ</option>
                                        </th>
                                        <th  colspan="6">
                                            <div class=" d-flex justify-content-end">
                                                <h5 class="a" >จำนวน 2 ชิ้น   &nbsp</h5>
                                                <h5 class="a" >ยอดรวมทั้งหมด : 210 บาท &nbsp &nbsp</h5>

                                                <button type="button"  data-bs-toggle="modal" class="r" data-bs-target=".bd-example-modal-sm3">ยืนยัน</button>
                                            </div>

                        </th>
                    </tr>
                </table>
            </div>
        </div>

                            <!-- ลบ -->
                            <div class="modal fade bd-example-modal-sm1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title2" id="exampleModalLabel">ลบรายการ</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h3>ยืนยันที่จะลบ</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary2">ตกลง</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- แก้ไขจำนวน-->

                            <div class="modal fade bd-example-modal-sm2" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title2" id="exampleModalLabel">แก้ไขจำนวน</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h3>จำนวนที่ต้องการเปลี่ยนแปลง</h3>
                                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<input type="text" name="list" id="list" required />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary2">ตกลง</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <!-- ยืนยันการซื้อ -->
                            <div class="modal fade bd-example-modal-sm3" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title2" id="exampleModalLabel">ยืนยันการซื้อ</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h3>ยืนยันที่จะซื้อ</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary2">ตกลง</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

    </form>
</body>

</html>