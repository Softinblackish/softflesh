

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
