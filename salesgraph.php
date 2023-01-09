<?php
include_once('service/auth.php');
isLaber();
function getFullRole($role)
{
    if ($role == "E") {
        return 'พนักงาน';
    }
    if ($role == "L") {
        return 'เจ้าของร้าน';
    }
    if ($role == "A") {
        return 'ผู้ดูแลระบบ';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/salesgraph.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>

</head>
<?php include_once('nav.php');
include_once "./database/Category.php";
$category =  new Category();
$rows = $category->fetchAll();
$product =  new Product();
$rows = $category->fetchAll();
?>

<body>
    <div class="row">
        <div class="col-1 Nbar min-vh-100"><?php include_once('bar.php'); ?></div>
        <div class="col-11">
            <div class="row main">
                <h1>การขาย</h1>
            </div>
            <div class="row">
                <div class="col">
                    <h5 class="tt">สรุปยอดขาย</h5>
                    <div class="th"></div>
                </div>
            </div>
            <div class="row q">
                <div class="col-1">
                    <select name="category_id" id="category_id" class="sizeselect" style="background-color: #D4DDC6;" required>
                        <option value="all">สินค้าทั้งหมด</option>
                        <?php foreach ($rows as $row) { ?>
                            <option value="<?= $row['category_id'] ?>"><?= $row['category_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-1 date">
                    <input type="date" class="sizeselect" required>
                </div>
            </div>
            <p></p>
            <h3 class="tt">ยอดขายสินค้า</h3>
            <div class="row">
                <canvas id="myChart" height="300"></canvas>
                <script>
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['เมล็ดคะน้า', 'เมล็ดพริก', 'เมล็ดข้าวโพด', 'เมล็ดกระเจี๊ยบเขียว', 'เมล็ดมะเขือ', 'เมล็ดถั่วฝักยาว'],
                            datasets: [{
                                label: 'ยอดขายสินค้า',
                                data: [20, 17, 23, 35, 22, 28],
                                backgroundColor: [
                                    'rgb(180, 180, 180)',
                                    'rgb(180, 180, 180)',
                                    'rgb(180, 180, 180)',
                                    'rgb(180, 180, 180)',
                                    'rgb(180, 180, 180)',
                                    'rgb(180, 180, 180)'
                                ],
                                borderColor: [
                                    'rgb(120, 120, 120)',
                                    'rgb(120, 120, 120)',
                                    'rgb(120, 120, 120)',
                                    'rgb(120, 120, 120)',
                                    'rgb(120, 120, 120)',
                                    'rgb(120, 120, 120)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            indexAxis: 'y',
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</body>

</html>