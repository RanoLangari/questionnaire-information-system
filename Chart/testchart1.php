<?php 

require('../config.php');

$query = "SELECT pilihan_jawaban, COUNT(*) AS jumlah FROM tbl_jawaban
JOIN tbl_pilihan_jawaban ON tbl_jawaban.jawaban = tbl_pilihan_jawaban.id_pilihan
join tbl_pertanyaan on tbl_pertanyaan.id_pertanyaan = tbl_jawaban.id_pertanyaan
WHERE tbl_pertanyaan.id_pertanyaan = 14
GROUP BY pilihan_jawaban";  

$query1 = "SELECT pilihan_jawaban, COUNT(*) AS jumlah FROM tbl_jawaban
JOIN tbl_pilihan_jawaban ON tbl_jawaban.jawaban = tbl_pilihan_jawaban.id_pilihan
join tbl_pertanyaan on tbl_pertanyaan.id_pertanyaan = tbl_jawaban.id_pertanyaan
WHERE tbl_pertanyaan.id_pertanyaan = 12
GROUP BY pilihan_jawaban";

$query2 = "SELECT pilihan_jawaban, COUNT(*) AS jumlah FROM tbl_jawaban
JOIN tbl_pilihan_jawaban ON tbl_jawaban.jawaban = tbl_pilihan_jawaban.id_pilihan
join tbl_pertanyaan on tbl_pertanyaan.id_pertanyaan = tbl_jawaban.id_pertanyaan
WHERE tbl_pertanyaan.id_pertanyaan = 13
GROUP BY pilihan_jawaban";

$query3 = "SELECT pilihan_jawaban, COUNT(*) AS jumlah FROM tbl_jawaban
JOIN tbl_pilihan_jawaban ON tbl_jawaban.jawaban = tbl_pilihan_jawaban.id_pilihan
join tbl_pertanyaan on tbl_pertanyaan.id_pertanyaan = tbl_jawaban.id_pertanyaan
WHERE tbl_pertanyaan.id_pertanyaan = 15
GROUP BY pilihan_jawaban";

$query4 = "SELECT pilihan_jawaban, COUNT(*) AS jumlah FROM tbl_jawaban
JOIN tbl_pilihan_jawaban ON tbl_jawaban.jawaban = tbl_pilihan_jawaban.id_pilihan
join tbl_pertanyaan on tbl_pertanyaan.id_pertanyaan = tbl_jawaban.id_pertanyaan
WHERE tbl_pertanyaan.id_pertanyaan = 16
GROUP BY pilihan_jawaban";


$result = mysqli_query($conn, $query);
$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);
$result4 = mysqli_query($conn, $query4);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = array($row['pilihan_jawaban'], $row['jumlah']);
}

$data1 = array();
while ($row = mysqli_fetch_assoc($result1)) {
  $data1[] = array($row['pilihan_jawaban'], $row['jumlah']);
}

$data2 = array();
while ($row = mysqli_fetch_assoc($result2)) {
  $data2[] = array($row['pilihan_jawaban'], $row['jumlah']);
}

$data3 = array();
while ($row = mysqli_fetch_assoc($result3)) {
  $data3[] = array($row['pilihan_jawaban'], $row['jumlah']);
}

$data4 = array();
while ($row = mysqli_fetch_assoc($result4)) {
  $data4[] = array($row['pilihan_jawaban'], $row['jumlah']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <title>Document</title>
</head>
<body>

        <table>
            <tr>
                <th>Pilihan Jawaban</th>
                <th>Jumlah Jawaban</th>
            </tr>
            <?php foreach ($data as $d) { ?>
            <tr>
                <td><?php echo $d[0]; ?></td>
                <td><?php echo $d[1]; ?></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <div>
            <button id="download-btn">Download</button>
            <canvas id="myChart" style="margin-bottom: 20px;"></canvas>
        </div>
        <br>
        <table>
            <tr>
                <th>Pilihan Jawaban</th>
                <th>Jumlah Jawaban</th>
            </tr>
            <?php foreach ($data1 as $d) { ?>
            <tr>
                <td><?php echo $d[0]; ?></td>
                <td><?php echo $d[1]; ?></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <canvas id="myChart1" style="margin-bottom: 20px;"></canvas>
        <br>
        <table>
            <tr>
                <th>Pilihan Jawaban</th>
                <th>Jumlah Jawaban</th>
            </tr>
            <?php foreach ($data2 as $d) { ?>
            <tr>
                <td><?php echo $d[0]; ?></td>
                <td><?php echo $d[1]; ?></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <canvas id="myChart2" style="margin-bottom: 20px;"></canvas>
        <br>
        <table>
            <tr>
                <th>Pilihan Jawaban</th>
                <th>Jumlah Jawaban</th>
            </tr>
            <?php foreach ($data3 as $d) { ?>
            <tr>
                <td><?php echo $d[0]; ?></td>
                <td><?php echo $d[1]; ?></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <canvas id="myChart3" style="margin-bottom: 20px;"></canvas>
        <br>
        <table>
            <tr>
                <th>Pilihan Jawaban</th>
                <th>Jumlah Jawaban</th>
            </tr>
            <?php foreach ($data4 as $d) { ?>
            <tr>
                <td><?php echo $d[0]; ?></td>
                <td><?php echo $d[1]; ?></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <canvas id="myChart4" style="margin-bottom: 20px;"></canvas>
        <br>
<canvas id="myChart2" style="margin-bottom: 20px;"></canvas>
<canvas id="myChart3" style="margin-bottom: 20px;"></canvas>
<canvas id="myChart4" style="margin-bottom: 20px;"></canvas>
<script>
    document.getElementById("download-btn").addEventListener("click", downloadChart);
    function downloadChart() {
        var canvas = document.getElementById("myChart");
        var img = canvas.toDataURL("image/png", 1.0);
        var doc = new jsPDF('p', 'mm', 'a4');
        doc.addImage(img, 'PNG', 10, 10, 190, 100);
        doc.save('chart.pdf');
    }


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
// Membuat variabel data yang berisi data dari PHP
var data = <?php echo json_encode($data); ?>;
// Membuat chart menggunakan Chart.js
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data.map(function(d) { return d[0]; }),
        datasets: [{
            label: 'Jumlah Jawaban',
            data: data.map(function(d) { return d[1]; }),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
// Membuat variabel data yang berisi data dari PHP
var data1 = <?php echo json_encode($data1); ?>;
// Membuat chart menggunakan Chart.js
var ctx = document.getElementById('myChart1').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data1.map(function(d) { return d[0]; }),
        datasets: [{
            label: 'Jumlah Jawaban',
            data: data1.map(function(d) { return d[1]; }),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>
// Membuat variabel data yang berisi data dari PHP
var data2 = <?php echo json_encode($data2); ?>;
// Membuat chart menggunakan Chart.js
var ctx = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data2.map(function(d) { return d[0]; }),
        datasets: [{
            label: 'Jumlah Jawaban',
            data: data2.map(function(d) { return d[1]; }),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
// Membuat variabel data yang berisi data dari PHP
var data3 = <?php echo json_encode($data3); ?>;
// Membuat chart menggunakan Chart.js
var ctx = document.getElementById('myChart3').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data3.map(function(d) { return d[0]; }),
        datasets: [{
            label: 'Jumlah Jawaban',
            data: data3.map(function(d) { return d[1]; }),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
// Membuat variabel data yang berisi data dari PHP
var data4 = <?php echo json_encode($data4); ?>;
// Membuat chart menggunakan Chart.js
var ctx = document.getElementById('myChart4').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data4.map(function(d) { return d[0]; }),
        datasets: [{
            label: 'Jumlah Jawaban',
            data: data4.map(function(d) { return d[1]; }),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>



</body>
</html>