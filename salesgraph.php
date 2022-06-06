<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/salesgraph.css" />
    <title>Document</title>
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>การขาย</h1>
                </div>
                <div class="row main t">
                    <h5>สรุปยอดขาย</h5>
                </div>
                <div class="row main q">
                    <div class="col-12 a">
                        <select name="categoryproduct" style="background-color: #7C904E;" required>
                            <option value="ประเภทสินค้า" selected>ประเภทสินค้า</option>
                        </select>
                        <input type="date" name="firstdate" required>
                    </div>
                    <p></p>
                    <h3>ยอดขายสินค้า</h3>
                </div>
            </div>
        </div>
    </form>
</body>

</html>