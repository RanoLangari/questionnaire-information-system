<?php

// error_reporting(0);

require('../config.php');

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
}
$id_user = $_SESSION["id"];
$row = query("SELECT * FROM user WHERE id = $id_user")[0];

// Query untuk mengambil pilihan jawaban dari pertanyaan 12 dari tabel pilihan jawaban
$query1 = "SELECT * FROM tbl_pilihan_jawaban WHERE id_pertanyaan = 12";
$result1 = mysqli_query($conn, $query1);

// Query untuk mengambil pilihan jawaban dari pertanyaan 13 dari tabel pilihan jawaban
$query2 = "SELECT * FROM tbl_pilihan_jawaban WHERE id_pertanyaan = 13";
$result2 = mysqli_query($conn, $query2);

// Query untuk mengambil pilihan jawaban dari pertanyaan 14 dari tabel pilihan jawaban
$query3 = "SELECT * FROM tbl_pilihan_jawaban WHERE id_pertanyaan = 14";
$result3 = mysqli_query($conn, $query3);

// Query untuk mengambil pilihan jawaban dari pertanyaan 15 dari tabel pilihan jawaban
$query4 = "SELECT * FROM tbl_pilihan_jawaban WHERE id_pertanyaan = 15";
$result4 = mysqli_query($conn, $query4);

// Query untuk mengambil pilihan jawaban dari pertanyaan 16 dari tabel pilihan jawaban
$query5 = "SELECT * FROM tbl_pilihan_jawaban WHERE id_pertanyaan = 16";
$result5 = mysqli_query($conn, $query5);

// Query untuk mengambil pilihan jawaban dari pertanyaan 21 dari tabel pilihan jawaban
$query6 = "SELECT * FROM tbl_pilihan_jawaban WHERE id_pertanyaan = 21";
$result6 = mysqli_query($conn, $query6);

// Query untuk mengambil pilihan jawaban dari pertanyaan 22 dari tabel pilihan jawaban
$query7 = "SELECT * FROM tbl_pilihan_jawaban WHERE id_pertanyaan = 22";
$result7 = mysqli_query($conn, $query7);

// Query untuk mengambil pilihan jawaban dari pertanyaan 23 dari tabel pilihan jawaban
$query8 = "SELECT * FROM tbl_pilihan_jawaban WHERE id_pertanyaan = 23";
$result8 = mysqli_query($conn, $query8);

// Query untuk mengambil pilihan jawaban dari pertanyaan 27 dari tabel pilihan jawaban
$query9 = "SELECT * FROM tbl_pilihan_jawaban WHERE id_pertanyaan = 27";
$result9 = mysqli_query($conn, $query9);

// Query untuk mengambil pilihan jawaban dari pertanyaan 28 dari tabel pilihan jawaban
$query10 = "SELECT * FROM tbl_pilihan_jawaban WHERE id_pertanyaan = 28";
$result10 = mysqli_query($conn, $query10);

// Query untuk mengambil pilihan jawaban dari pertanyaan 33 dari tabel pilihan jawaban
$query11 = "SELECT * FROM tbl_pilihan_jawaban WHERE id_pertanyaan = 33";
$result11 = mysqli_query($conn, $query11);




// 1
$cek_user = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 12");
$tes = mysqli_fetch_assoc($cek_user);
if (mysqli_num_rows($cek_user) > 0) {
    if ($tes['id_pilihan_jawaban'] != NULL) {
        $val1 = $tes['id_pilihan_jawaban'];
    }
}


// 2
$cek_user1 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 13");
$tes1 = mysqli_fetch_assoc($cek_user1);
if (mysqli_num_rows($cek_user1) > 0) {
    if ($tes1['id_pilihan_jawaban'] != NULL) {
        $val2 = $tes1['id_pilihan_jawaban'];
    }
}

// 3
$cek_user2 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 14");
$tes2 = mysqli_fetch_assoc($cek_user2);
if (mysqli_num_rows($cek_user2) > 0) {
    if ($tes2['id_pilihan_jawaban'] != NULL) {
        $val3 = $tes2['id_pilihan_jawaban'];
    }
}

// 4
$cek_user3 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 15");
$tes3 = mysqli_fetch_assoc($cek_user3);
if (mysqli_num_rows($cek_user3) > 0) {
    if ($tes3['id_pilihan_jawaban'] != NULL) {
        $val4 = $tes3['id_pilihan_jawaban'];
    }
}

// 5
$cek_user4 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 16");
$tes4 = mysqli_fetch_assoc($cek_user4);
if (mysqli_num_rows($cek_user4) > 0) {
    if ($tes4['id_pilihan_jawaban'] != NULL) {
        $val5 = $tes4['id_pilihan_jawaban'];
    }
}

//6 
$cek_user5 = mysqli_query($conn, "SELECT * FROM tbl_lokasi WHERE id_user = $id_user and id_pertanyaan = 17");
$cek_user5a = mysqli_query($conn, "SELECT * FROM tbl_lokasi WHERE id_user = $id_user and id_pertanyaan = 17 and negara_kerja IS NOT NULL");
$tes5 = mysqli_fetch_assoc($cek_user5);

//8
$cek_user7 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 21");
$tes7 = mysqli_fetch_assoc($cek_user7);
if (mysqli_num_rows($cek_user7) > 0) {
    if ($tes7['id_pilihan_jawaban'] != NULL) {
        $val8 = $tes7['id_pilihan_jawaban'];
    }
}

//9
$cek_user8 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 22");
$tes8 = mysqli_fetch_assoc($cek_user8);
if (mysqli_num_rows($cek_user8) > 0) {
    if ($tes8['id_pilihan_jawaban'] != NULL) {
        $val9 = $tes8['id_pilihan_jawaban'];
    }
}

//10
$cek_user9 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 23");
while ($tes9 = mysqli_fetch_assoc($cek_user9)) {
    $val10[] = $tes9['id_pilihan_jawaban'];
}

//11
$cek_user10 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 24");
$tes10 = mysqli_fetch_assoc($cek_user10);

//12
$cek_user11 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 25");
$tes11 = mysqli_fetch_assoc($cek_user11);

//13
$cek_user12 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 26");
$tes12 = mysqli_fetch_assoc($cek_user12);

//14
$cek_user13 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 27");
$tes13 = mysqli_fetch_assoc($cek_user13);
if (mysqli_num_rows($cek_user13) > 0) {
    if ($tes13['id_pilihan_jawaban'] != NULL) {
        $val14 = $tes13['id_pilihan_jawaban'];
    } else {
        $val14 = 0;
    }
}

//15
$cek_user14 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 28");
while ($tes14 = mysqli_fetch_assoc($cek_user14)) {
    $val15[] = $tes14['id_pilihan_jawaban'];
}

//16
$cek_user15 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 29");
$tes15 = mysqli_fetch_assoc($cek_user15);


//17
$cek_user16 = mysqli_query($conn, "SELECT * FROM tbl_studi_lanjut WHERE id_user = $id_user and id_pertanyaan = 30");
$tes16 = mysqli_fetch_assoc($cek_user16);

//18
$cek_user17 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 31");
$tes17 = mysqli_fetch_assoc($cek_user17);

//19
$cek_user18 = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = $id_user and id_pertanyaan = 33");
$tes18 = mysqli_fetch_assoc($cek_user18);
if (mysqli_num_rows($cek_user18) > 0) {
    if ($tes18['id_pilihan_jawaban'] != NULL) {
        $val19 = $tes18['id_pilihan_jawaban'];
    }
}
