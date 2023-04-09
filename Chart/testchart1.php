<?php

require('../config.php');

$query = mysqli_query($conn, "SELECT pilihan_jawaban, COUNT(*) AS jumlah FROM tbl_jawaban
        JOIN tbl_pilihan_jawaban ON tbl_jawaban.id_pilihan_jawaban = tbl_pilihan_jawaban.id_pilihan
        join tbl_pertanyaan on tbl_pertanyaan.id_pertanyaan = tbl_jawaban.id_pertanyaan
        WHERE tbl_pertanyaan.id_pertanyaan = 14
        GROUP BY pilihan_jawaban");
$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = array($row['pilihan_jawaban'], $row['jumlah']);
}

$query1 = mysqli_query($conn, "SELECT pilihan_jawaban, COUNT(*) AS jumlah FROM tbl_jawaban
        JOIN tbl_pilihan_jawaban ON tbl_jawaban.id_pilihan_jawaban = tbl_pilihan_jawaban.id_pilihan
        join tbl_pertanyaan on tbl_pertanyaan.id_pertanyaan = tbl_jawaban.id_pertanyaan
        WHERE tbl_pertanyaan.id_pertanyaan = 12
        GROUP BY pilihan_jawaban");
$data1 = array();
while ($row = mysqli_fetch_assoc($query1)) {
    $data1[] = array($row['pilihan_jawaban'], $row['jumlah']);
}

$query2 = mysqli_query($conn, "SELECT pilihan_jawaban, COUNT(*) AS jumlah FROM tbl_jawaban
        JOIN tbl_pilihan_jawaban ON tbl_jawaban.id_pilihan_jawaban = tbl_pilihan_jawaban.id_pilihan
        join tbl_pertanyaan on tbl_pertanyaan.id_pertanyaan = tbl_jawaban.id_pertanyaan
        WHERE tbl_pertanyaan.id_pertanyaan = 15
        GROUP BY pilihan_jawaban");
$data2 = array();
while ($row = mysqli_fetch_assoc($query2)) {
    $data2[] = array($row['pilihan_jawaban'], $row['jumlah']);
}

$query4 = mysqli_query($conn, "SELECT pilihan_jawaban, COUNT(*) AS jumlah FROM tbl_jawaban
        JOIN tbl_pilihan_jawaban ON tbl_jawaban.id_pilihan_jawaban = tbl_pilihan_jawaban.id_pilihan
        join tbl_pertanyaan on tbl_pertanyaan.id_pertanyaan = tbl_jawaban.id_pertanyaan
        WHERE tbl_pertanyaan.id_pertanyaan = 16
        GROUP BY pilihan_jawaban");

$data4 = array();
while ($row = mysqli_fetch_assoc($query4)) {
    $data4[] = array($row['pilihan_jawaban'], $row['jumlah']);
}




$query5a = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM user WHERE role_id = 2");
$query5b = mysqli_query($conn, "SELECT id_user, COUNT(DISTINCT id_user) AS jumlah FROM tbl_jawaban");
$data5a = mysqli_fetch_assoc($query5a);
$data5b = mysqli_fetch_assoc($query5b);

$query6 = mysqli_query($conn, "SELECT pilihan_jawaban, COUNT(*) AS jumlah FROM tbl_jawaban
            JOIN tbl_pilihan_jawaban ON tbl_jawaban.id_pilihan_jawaban = tbl_pilihan_jawaban.id_pilihan
            join tbl_pertanyaan on tbl_pertanyaan.id_pertanyaan = tbl_jawaban.id_pertanyaan
            WHERE tbl_pertanyaan.id_pertanyaan = 21
            GROUP BY pilihan_jawaban");

$data6 = array();
while ($row = mysqli_fetch_assoc($query6)) {
    $data6[] = array($row['pilihan_jawaban'], $row['jumlah']);
}


$query7 = mysqli_query($conn, "SELECT pilihan_jawaban, COUNT(*) AS jumlah FROM tbl_jawaban
            JOIN tbl_pilihan_jawaban ON tbl_jawaban.id_pilihan_jawaban = tbl_pilihan_jawaban.id_pilihan
            join tbl_pertanyaan on tbl_pertanyaan.id_pertanyaan = tbl_jawaban.id_pertanyaan
            WHERE tbl_pertanyaan.id_pertanyaan = 22
            GROUP BY pilihan_jawaban");

$data7 = array();
while ($row = mysqli_fetch_assoc($query7)) {
    $data7[] = array($row['pilihan_jawaban'], $row['jumlah']);
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

    <div class="Q1">
        <button style="margin-top: 50px; margin-left: 50px;" id="download-btn">Download</button>
        <h1 style="text-align: center;"> <b>JENIS PERUSAHAAN TEMPAT ALUMNI BEKERJA SAAT INI</b> </h1>
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
    </div>
    <br>
    <div class="Q2">

        <h1 style="text-align: center;"> <b>WAKTU TUNGGU ALUMNI MENDAPATKAN PEKERJAAN PERTAMA</b> </h1>
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
            <canvas id="myChart" style="margin-bottom: 20px;"></canvas>
        </div>
    </div>
    <br>
    <div class="Q3">

        <h1 style="text-align: center;"> <b>PARTISIPASI ALUMNI MENGISI KUISIONER</b> </h1>
        <table>
            <tr>
                <th>Total User</th>
                <th>Total User Yang Mengisi Kuisioner</th>
            </tr>
            <tr>
                <td><?php echo $data5a['jumlah']; ?></td>
                <td><?php echo $data5b['jumlah']; ?></td>
            </tr>
        </table>
        <br>
        <canvas id="myChart5" style="margin-bottom: 20px;"></canvas>
    </div>
    <br>
    <div class="Q4">

        <h1 style="text-align: center;"> <b>KESELARASAN HORISONTAL</b> </h1>
        <table>
            <tr>
                <th>Keselarasan Horisontal</th>
                <th>Jumlah Jawaban</th>
            </tr>
            <?php foreach ($data6 as $d) { ?>
                <tr>
                    <td><?php echo $d[0]; ?></td>
                    <td><?php echo $d[1]; ?></td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <canvas id="myChart6" style="margin-bottom: 20px;"></canvas>
    </div>
    <br>
    <div class="Q5">

        <h1 style="text-align: center;"> <b>KESELARASAN VERTIKAL</b> </h1>
        <table>
            <tr>
                <th>Keselarasan Vertikal</th>
                <th>Jumlah Jawaban</th>
            </tr>
            <?php foreach ($data7 as $d) { ?>
                <tr>
                    <td><?php echo $d[0]; ?></td>
                    <td><?php echo $d[1]; ?></td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <canvas id="myChart7" style="margin-bottom: 20px;"></canvas>
    </div>
    <br>
    <div class="Q6">
        <h1 style="text-align: center;"> <b>BESARAN GAJI/PENGHASILAN ALUMNI PERBULAN</b> </h1>
        <table>
            <tr>
                <th>BESARAN GAJI/PENGHASILAN</th>
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
        <canvas id="myChart3" style="margin-bottom: 20px;"></canvas>
    </div>

    <br>
    <div class="Q7">
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
        <h1 style="text-align: center;"> <b>SUMBER DANA DALAM PEMBIAYAAN</b> </h1>
        <canvas id="myChart1" style="margin-bottom: 20px;"></canvas>
    </div>
    <br>


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
                labels: data.map(function(d) {
                    return d[0];
                }),
                datasets: [{
                    label: 'Jumlah Jawaban',
                    data: data.map(function(d) {
                        return d[1];
                    }),
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
                labels: data1.map(function(d) {
                    return d[0];
                }),
                datasets: [{
                    label: 'Jumlah Jawaban',
                    data: data1.map(function(d) {
                        return d[1];
                    }),
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
        var data2$data2 = <?php echo json_encode($data2); ?>;
        // Membuat chart menggunakan Chart.js
        var ctx = document.getElementById('myChart3').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data2$data2.map(function(d) {
                    return d[0];
                }),
                datasets: [{
                    label: 'Jumlah Jawaban',
                    data: data2$data2.map(function(d) {
                        return d[1];
                    }),
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
                labels: data4.map(function(d) {
                    return d[0];
                }),
                datasets: [{
                    label: 'Jumlah Jawaban',
                    data: data4.map(function(d) {
                        return d[1];
                    }),
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
        var ctx = document.getElementById('myChart5').getContext('2d');
        var label = ["Jumlah Alumni", "Jumlah Alumni Yang Mengisi Kuesioner"];
        var data = [<?php echo $data5a['jumlah']; ?>, <?php echo $data5b['jumlah']; ?>];
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: label,
                datasets: [{
                    label: 'Jumlah Alumni',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
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
        var data6 = <?php echo json_encode($data6); ?>;
        // Membuat chart menggunakan Chart.js
        var ctx = document.getElementById('myChart6').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data6.map(function(d) {
                    return d[0];
                }),
                datasets: [{
                    label: 'Jumlah Jawaban',
                    data: data6.map(function(d) {
                        return d[1];
                    }),
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
        var data7 = <?php echo json_encode($data7); ?>;
        // Membuat chart menggunakan Chart.js
        var ctx = document.getElementById('myChart7').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data7.map(function(d) {
                    return d[0];
                }),
                datasets: [{
                    label: 'Jumlah Jawaban',
                    data: data7.map(function(d) {
                        return d[1];
                    }),
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