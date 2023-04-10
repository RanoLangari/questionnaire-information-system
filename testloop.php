<?php 

require('config.php');

//mengambil id pertanyaan dari tabel pertanyaan
$query = "SELECT id_pertanyaan FROM tbl_pertanyaan WHERE tipe != 'textbox'";
$result  = mysqli_query($conn, $query);



//melakukakn perulangan dengan kondisi fetch_assoc
while($row = mysqli_fetch_assoc($result))
{
    $id_pertanyaan = $row['id_pertanyaan'];
    //tampung kedalam array
    $id_pertanyaan_array[] = $id_pertanyaan;

}

// melakukan looping dengan banyaknya looping  == banyaknya item dalam array id_pertanyaan_array
for($i = 0; $i<count($id_pertanyaan_array); $i++) 
{
    //mengambil nilai id pertanyaan dari array
    $parameter = $id_pertanyaan_array[$i];

    $sql = "SELECT pilihan_jawaban, COUNT(*) AS jumlah FROM tbl_pilihan_jawaban
    JOIN tbl_jawaban ON tbl_pilihan_jawaban.id_pilihan  = tbl_jawaban.jawaban 
    join tbl_pertanyaan on tbl_pertanyaan.id_pertanyaan = tbl_jawaban.id_pertanyaan
    WHERE tbl_pertanyaan.id_pertanyaan = $parameter AND tbl_pertanyaan.tipe != 'textbox'
    GROUP BY pilihan_jawaban";
    $result = mysqli_query($conn, $sql);

    //melakukan perulangan dengan kondisi fetch_assoc
    while($row = mysqli_fetch_assoc($result))
    {
        $pilihan_jawaban = $row['pilihan_jawaban'];
        $jumlah = $row['jumlah'];
        //tampung kedalam array
        $pilihan_jawaban_array[] = $pilihan_jawaban;
        $jumlah_array[] = $jumlah;

    }
    
}
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($id_pertanyaan_array as $idp): ?>
        <table>
            <tr>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Jumlah</th>
            </tr>
            <?php foreach($pilihan_jawaban_array as $pilihan): ?>
                <tr>
                    <td><?php echo $idp; ?></td>
                    <td><?php echo $pilihan; ?></td>
                    <td><?php echo $jumlah; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</body>
</html>