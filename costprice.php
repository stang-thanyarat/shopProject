<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/costprice.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>costprice</title>
    
    
</head>
<?php include('nav.php'); ?>

<body>
    <form>
        <div class="row">
            <div class="col-1 Nbar min-vh-100"><?php include('bar.php'); ?></div>
            <div class="col-11">
                <div class="row main">
                    <h1>ราคาทุน</h1>
                </div>
                <div class="row main q">
                    <div class="col-12 ">
                        <div>
                       <h4> ชื่อสินค้า : &nbsp กะเพรา-SL<h4>
                        </div>
                        <p>
                        <div>
                        <h4>ประเภทสินค้า : &nbsp เมล็ดพันธุ์<h4>
                        </div>
                        <p>
                        <div>
                        <h4>ยี่ห้อสินค้า : &nbsp SEEDLINE<h4>
                        </div>
                        <p>
                        <div class="title page">
                        <h4 style="display: inline;">วันที่ซื้อ :</h4>
                        &nbsp &nbsp
                        <input type="date" class="l" name="firstdate" style=" background-color: #F8E4C8;" required>
                        &nbsp ถึง &nbsp
                        <input type="date" class="l" name="lastdate" style=" background-color: #F8E4C8;" required>
                        &nbsp &nbsp &nbsp
                        <a type="submit" class=""><img src="./src/images/search.png" width="15"></a>
                        </div>
                    </div>

                    <!-- กราฟ-->
                    <p><p>
                    <h6>จำนวน</h6>
                    <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>
                        <script>
                             var xValues = [1,2,3,4,5,6,7,8,9,10,11,12];
                            var yValues = [15,15,20,20,20,20,20,20,20,25,25,10];

                        new Chart("myChart", {
                              type: "line",
                              data: {
                                labels: xValues,
                                datasets: [{
                                  fill: false,
                                  lineTension: 0,
                                  backgroundColor: "rgba(0,0,255,1.0)",
                                  borderColor: "rgba(0,0,255,0.1)",
                                  data: yValues
                                }]
                              },
                              options: {
                                legend: {display: false},
                                scales: {
                                  yAxes: [{ticks: {min: 0, max:40}}],
                                
                                }
                              }
                            });
                                </script><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>&nbsp&nbsp&nbsp&nbspวันที่
                                <script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1/12','2/12','3/12','4/12','5/12','6/12','7/12','8/12','9/12','10/12','11/12','12/12'],
        datasets: [{
            label: 'ยอดขายสินค้า',
            data: [15,15,20,20,20,20,20,20,20,25,25,10],
            backgroundColor: [
                'rgb(180, 180, 180)',
                'rgb(180, 180, 180)',
                'rgb(180, 180, 180)',
                'rgb(180, 180, 180)',
                'rgb(180, 180, 180)',
                'rgb(180, 180, 180)',
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
                'rgb(120, 120, 120)',
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
    options: 
    { scales: {
                  yAxes: [{ticks: {min: 0, max:40}}],
                                
                   }
    }
});
</script>

                </div>
            </div>
        </div>
    </form>
</body>

</html>