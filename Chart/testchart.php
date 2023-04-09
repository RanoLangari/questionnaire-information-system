<?php 
require('config.php');

// Query untuk mengambil jumlah user yang sudah dan belum mengisi kuesioner
$query = "SELECT
(SELECT COUNT(*) FROM user WHERE role_id = 2) AS total_user,
COUNT(DISTINCT id_user) AS total_user_jawaban
FROM tbl_jawaban";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

// Mengisi variabel $data dengan jumlah user yang sudah dan belum mengisi kuesioner
$data = array($row['total_user'] - $row['total_user_jawaban'], $row['total_user_jawaban']);


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src='main.js'></script>
</head>
<body>
    <table class="table" style="text-align: center;">
        <thead class="table-dark">
        <tr>
            <th>Partisipasi Alumni</th>
            <th>Jumlah Alumni</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Sudah Mengisi Kuisioner</td>
            <td><?php echo $data[1]; ?></td>
        </tr>
        <tr>
            <td>Belum Mengisi Kuisioner</td>
            <td><?php echo $data[0]; ?></td>
        </tr>
        </tbody>
    </table>
<div style="min-width: 310px; height: 400px; margin: 0 auto">
    <canvas id="chart"></canvas>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <script>
    // <!-- make simple chart bar using chart js with title Responden  -->
    var ctx = document.getElementById('chart').getContext('2d');
    var ChartData = {
        labels: ['Belum Mengisi kuesioner', 'Sudah Mengisi Kuisioner'],
        datasets: [{
            label: 'Responden',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    };
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: ChartData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    
  </script>
    

</body>
</html>





