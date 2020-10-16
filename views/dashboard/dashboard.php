<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>
    <?php include("../base.php"); ?>

    <div id="info">
        <div class="canvas2" style=" padding:10px; width:184px;"><center><small>CLIENTES</small><br> <h3>5</h3></center></div>
        <div class="canvas2" style=" padding:10px; width:184px;"><center><small>SUPLIDORES</small> <br> <h3>10</h3></center></div>
        <div class="canvas2" style=" padding:10px; width:184px;"><center><small>VENTAS <br> <h3>300</h3></center></div>
        <div class="canvas2" style=" padding:10px; width:184px;"> <center><?php echo date("d/m/y")?> <br> <h3><?php echo date("l");?></h3> </center></div>
    </div>
<div id="graficos">
    <div class="canvas">
        <canvas id="myChart"></canvas>
    </div>
    <div class="canvas"  >
        <canvas id="myChart2"></canvas>
    </div>
    <div class="canvas"  >
        <canvas id="myChart3"></canvas>
    </div>
    <div class="canvas"  >
        <canvas id="myChart4"></canvas>
    </div>
</div>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(87, 220, 200)',
            borderColor: 'rgb(14, 68, 76)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>

<script>
    var ctx2 = document.getElementById('myChart2').getContext('2d');
    new Chart(ctx2, {
        type: 'polarArea',
        data: {
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(87, 220, 200)',
            borderColor: 'rgb(14, 68, 76)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }],
    },
    
    options: {}
});

</script>
<script>
    var ctx3 = document.getElementById('myChart3').getContext('2d');
var myBarChart = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(87, 220, 200)',
            borderColor: 'rgb(14, 68, 76)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }]
    },
    options: {}
});
</script>

<script>
    var ctx4 = document.getElementById('myChart4').getContext('2d');
    var myLineChart = new Chart(ctx4, {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My First dataset',
            borderColor: 'rgb(14, 68, 76)',
            data: [50, 10, 30, 2, 20, 3, 25]
        }]
    },
    options: {}
});
</script>

</body>
</html>
    
