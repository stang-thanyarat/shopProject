<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/productlist.css" />
    
    <title>productlist</title>
    
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <div class="col-lg-5">
                        <div class="title page">
                            <h1 style="display: inline;">รายการสินค้า</h1>&nbsp &nbsp &nbsp
                            <input type="text" class="btnd" placeholder="&nbsp ชื่อสินค้า">
                    <button type="submit" class="s"><img src="./src/images/search.png" width="13"></button>&nbsp &nbsp
                    <select name="type" id="type" required>
                                        <option value="seed.">ใบตัดหญ้า</option>
                                        <option value="seed.">ชุดเสื้อสูบ</option>
                                        <option value="Mrs.">หัวเกียร์</option>
                                        <option value="miss">ใบตัดหญ้า</option>
                                        <option value="miss">ใบตัดข้าว</option>
                                        <option value="miss">นอตสกรู</option>
                                        <option value="miss">เชือกเอ็น</option>
                                        <option value="miss">จานตัดหญ้า</option>
                                        <option value="miss">คาบู</option>
                                        <option value="miss">อะไหล่เครื่องพ่นปุ๋ย</option>
                                        <option value="miss">เมล็ด</option>
                                        <option value="miss">ยางกันสะเทือน</option>
                                        <option value="miss">ปั๊มน้ำ</option>
                                        <option value="miss">เครื่องตัดหญ้า</option>
                                        <option value="miss">เมล็ดพันธุ์</option>
                                        <option value="miss">ยากำจัดวัชพืช</option>
                                        <option value="miss">ปุ๋ยเคมี</option>
                                    </select>
                            </div>
                    </div>
                </div>
                    <div class="col-11 d-flex justify-content-end signin">
                        <div class="col-1">
                        <button type="submit" class="right"><img src="./src/images/cart.png" width="50"></a>
                        </div>
                    </div>
                <table class="main col-11">
                <tr bgcolor="lightgreen">
                        <td align="left" colspan="3"><p><h5>ใบตัดหญ้า</h5><p></td>
                    </tr>
                    <tr >
                        <th><p>

                            <div>ใบตัดหญ้า มีฟัน (แบบวงเดือน) รุ่น 10X24T</div>

                            <img src="./src/images/ใบตัดหญ้า1.png" width="200">

                            <div>
                                <p>ราคา&nbsp &nbsp บาท</p>
                                <p>คงเหลือ&nbsp &nbsp ใบ</p>
                            </div>

                            <div><button type="submit" align="right">เพิ่มไปยังรถเข็น
                            </div>

                        <p></th>
                        <th><p>
                            
                            <div>ใบตัดหญ้า มีฟัน (แบบวงเดือน) รุ่น 10X30T</div>

                            <img src="./src/images/ใบตัดหญ้า2.png" width="200">

                            <div>
                                <p>ราคา&nbsp &nbsp บาท</p>
                                <p>คงเหลือ&nbsp &nbsp ใบ</p>
                            </div>

                            <div><button type="submit" align="right">เพิ่มไปยังรถเข็น
                            </div>

                        <p></th>
                        <th><p>

                        <div>ใบตัดหญ้า ไม่มีฟัน รุ่น 10X16T</div>

                        <img src="./src/images/ใบตัดหญ้า3.png" width="200">

                            <div>
                                <p>ราคา&nbsp &nbsp บาท</p>
                                <p>คงเหลือ&nbsp &nbsp ใบ</p>
                            </div>
                            
                            <div><button type="submit" align="right">เพิ่มไปยังรถเข็น
                            </div>

                        <p></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</body>

</html>