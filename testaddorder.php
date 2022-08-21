<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/addorder.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <div class="w3-container">
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">เพิ่มสินค้า</button>

        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:300px">

                <div class="w3-center"><br>
                    <h5>เพิ่มสินค้า</h5><span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                </div>

                <form class="w3-container" action="test.php" >
                    <div class="w3-section">
                        <label><b>ประเภทสินค้า</b></label>
                        <select id="typeproduct" name="typeproduct" style="background-color: #7C904E;" required>
                            <option value="เลือก" selected>เลือก</option>
                        </select><br><br>

                        <label><b>รายการสินค้า</b></label>
                        <select name="listproduct" style="background-color: #7C904E;" required>
                            <option value="เลือก" selected>เลือก</option>
                        </select><br><br>

                        <label><b>ยี่ห้อ</b></label>
                        <select name="brand" style="background-color: #7C904E;" required>
                            <option value="เลือก" selected>เลือก</option>
                        </select><br><br>

                        <label><b>รุ่น</b></label>
                        <select name="productmodel" style="background-color: #7C904E;" required>
                            <option value="เลือก" selected>เลือก</option>
                        </select><br><br>

                        <label><b>ราคาต่อหน่วย</b></label>
                        <input type="number" class="u" min="0.25" step="0.25" name="priceproduct" id="priceproduct" required /><br><br>

                        <label><b>จำนวน</b></label>
                        <input type="number" class="u" min="1" name="amountproduct" id="amountproduct" required />

                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">ตกลง</button>
                    </div>
                </form>

                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">ยกเลิก</button>
                </div>

            </div>
        </div>
    </div>

</body>

</html>