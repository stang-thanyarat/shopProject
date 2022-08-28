<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="./src/css/salesgraph.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                <div class="t">
                    <div class="m">
                    <h6>สรุปยอดขาย</h6>
                    </div>
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
                    <canvas id="myChart" height="300"  ></canvas>
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
    </form>
</body>

</html>