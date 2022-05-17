<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/vat.css" />
    <title>Document</title>
</head>
<?php include('nav.php');?>
<body>
    <form class="content">
        <div class="row main">
            <h1>ตั้งค่าภาษีมูลค่าเพิ่ม</h1>
            <table class="main col-10">
            <tr>
                <th>ภาษีมูลค่าเพิ่ม &nbsp<input type="text" name="vat"> &nbsp %</th>
            </tr>
            </table>
            <div class="row B">
            <div class=" col-12 d-flex justify-content-end signin">
                <input class="BTNC" type="submit" value="ยกเลิก">
                <input class="BTN" type="submit" value="บันทึก">
            </div>
        </div>
        </div>
    </form>
</body>

</html>