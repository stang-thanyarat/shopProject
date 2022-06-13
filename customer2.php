<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/customer2.css" />
    <title>Document</title>
</head>
<?php include('nav2.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-9 a">
                <h5 class="b"></h5>ประเภทสินค้า</h5>
            </div>
            <div class="col d-flex justify-content-end">
            <button type="submit" class="back"><img src="./src/images/back-button.png" width="40"></button>
            </div>
        </div>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar2.php'); ?></div>
            <div class="col-8" style="margin-left: 5rem;">
                <div class="row">
                    <div class="col-2" style="margin-right: 2rem;">
                        <br>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./src/images/roselle.png" width="200">
                                </div>
                                <div class="carousel-item">
                                    <img src="./src/images/roselle.png" width="200">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>
                    <div class="col-7"><br>
                        <div class="d-flex justify-content-between">
                            <p class="c">ข้าวโพด-โกลเด้น2โทน</p>
                            <font size="4">฿20</font>
                        </div>

                        ประเภทสินค้า : เมล็ดพันธ์ <br>
                        ยี่ห้อ : Seed Line(ซีดไลน์) <br>
                        คงเหลือ : 25 ซอง <br><br>
                        <ul>
                            <li>เมล็ดพันธ์ุ ข้าวโพดหวานลูกผสม โกลเด้น 2 โทน</li>
                            <li> ตราซีดไลน์หากยังไม่ได้ปลูกทันที ควรเก็บไว้ในที่แห้ง เย็น ไม่ถูกแสงแดด
                                เมื่อเปิดซองแล้ว ควรรีบใช้เพาะปลูกโดยเร็ว
                                บรรจุซองละ : 50 เมล็ด</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>