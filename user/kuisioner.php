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




if (isset($_POST["submit"])) {
    if (simpanPertanyaan1($_POST) > 0 && simpanPertanyaan2($_POST) > 0 && simpanPertanyaan3($_POST) > 0 && simpanPertanyaan4($_POST) > 0 && simpanPertanyaan5($_POST) > 0 && simpanPertanyaan6($_POST) > 0 && simpanPertanyaan7($_POST) > 0 && simpanPertanyaan8($_POST) > 0 && simpanPertanyaan9($_POST) > 0 && simpanPertanyaan10($_POST) > 0 && simpanPertanyaan11($_POST) > 0 && simpanPertanyaan12($_POST) > 0 && simpanPertanyaan13($_POST) > 0 && simpanPertanyaan14($_POST) > 0 && simpanPertanyaan15($_POST) > 0 && simpanPertanyaan16($_POST) > 0 && simpanPertanyaan17($_POST) > 0 && simpanPertanyaan18($_POST) > 0) {
        echo "
            <script>
                alert('Terimakasih Sudah Mengisi Kuisioner 🖕');
                document.location.href = 'dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Disimpan');
            </script>
        ";
    }
}



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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Kuisioner</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/1b05bcc72f.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-2"><span>User Menu</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">

                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="kuisioner.php"><i class="fa-solid fa-pencil"></i><span>Kuisioner</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?= $row["nama"] ?></span><?php echo "<img class='border rounded-circle img-profile' src='upload/" . $row['gambar'] . "''>"; ?></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                </div>
                            </div>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-1 " style="text-align: center;">SELAMAT MENGISI KUISIONER</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Kuisioner</p>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <input type="hidden" name="id_user" value="<?= $id_user ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label"><strong>1.Sebutkan sumberdana dalam pembiayaan kuliah?</strong></label><br>
                                            <?php while ($row1 = mysqli_fetch_assoc($result1)) : ?>
                                                <input type="radio" name="pert1A" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row1["id_pilihan"] ?>" <?php if (mysqli_num_rows($cek_user) > 0) : ?> <?php if ($row1["id_pilihan"] == $val1) {
                                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                                } ?> <?php endif ?>><?= $row1["pilihan_jawaban"] ?><br>

                                            <?php endwhile; ?>
                                            <div class="col-md-4">
                                                <input type="text" name="pert1Text" class="form-control" placeholder="" <?php if (mysqli_num_rows($cek_user) > 0) : ?> value="<?= $tes['jawaban'] ?>" <?php endif ?>>

                                                <span class="help-block">
                                                    Jika memilih [7] Lainnya, silahkan ketik di kotak ini
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-3"><label class="form-label"><strong>2.Jelaskan status Anda saat ini? </strong></label><br>
                                            <?php while ($row2 = mysqli_fetch_assoc($result2)) : ?>
                                                <input type="radio" name="pert2" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row2["id_pilihan"] ?>" <?php if (mysqli_num_rows($cek_user1) > 0) : ?> <?php if ($row2["id_pilihan"] == $val2) {
                                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                                } ?> <?php endif ?>><?= $row2["pilihan_jawaban"] ?><br>
                                            <?php endwhile; ?>
                                            <br>
                                        </div>
                                        <div class="mb-3"><label class="form-label"><strong>3.Dalam jangka waktu berapa lama Anda mendapatkan pekerjaan pertama Anda? </strong></label><br>
                                            <?php while ($row3 = mysqli_fetch_assoc($result3)) : ?>
                                                <input type="radio" name="pert3" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row3["id_pilihan"] ?>" <?php if (mysqli_num_rows($cek_user2) > 0) : ?> <?php if ($row3["id_pilihan"] == $val3) {
                                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                                } ?> <?php endif ?>><?= $row3["pilihan_jawaban"] ?><br>
                                            <?php endwhile; ?>
                                            <br>
                                        </div>
                                        <div class="mb-3"><label class="form-label"><strong>4.Kira-kira berapa total penghasilan pekerjaan utama anda tiap bulan?? </strong></label><br>
                                            <?php while ($row4 = mysqli_fetch_assoc($result4)) : ?>
                                                <input type="radio" name="pert4" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row4["id_pilihan"] ?>" <?php if (mysqli_num_rows($cek_user3) > 0) : ?> <?php if ($row4["id_pilihan"] == $val4) {
                                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                                } ?> <?php endif ?>><?= $row4["pilihan_jawaban"] ?><br>
                                            <?php endwhile; ?>
                                            <br>
                                        </div>
                                        <div class="mb-3"><label class="form-label"><strong>5.Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?? </strong></label><br>
                                            <?php while ($row5 = mysqli_fetch_assoc($result5)) : ?>
                                                <input type="radio" name="pert5" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row5["id_pilihan"] ?>" <?php if (mysqli_num_rows($cek_user4) > 0) : ?> <?php if ($row5["id_pilihan"] == $val5) {
                                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                                } ?> <?php endif ?>><?= $row5["pilihan_jawaban"] ?><br>
                                            <?php endwhile; ?>

                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="pert5Text" class="form-control" placeholder="" <?php if (mysqli_num_rows($cek_user4) > 0) : ?> value="<?= $tes4['jawaban'] ?>" <?php endif ?>>

                                            <span class="help-block">
                                                Jika memilih [5] Lainnya, silahkan ketik di kotak ini
                                            </span>
                                        </div><br><br>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="form-label"><strong>6.Dimana lokasi tempat Anda bekerja? </strong></label><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                Nama Instansi / Institusi / Perusahaan Tempat Kerja
                                                <input type="text" name="tempat_kerja" class="form-control" id="" placeholder="" <?php if (mysqli_num_rows($cek_user5) > 0) : ?> value="<?= $tes5['nama_instansi'] ?>" <?php endif ?> />

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                Bidang Pekerjaan
                                                <input type="text" name="bidang_kerja" class="form-control" id="" placeholder="" <?php if (mysqli_num_rows($cek_user5) > 0) : ?> value="<?= $tes5['nama_bidang_pekerjaan'] ?>" <?php endif ?> />

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                Level Tempat Kerja
                                                <select name="level_tmpt_kerja" id="level_tmpt_kerja" class="form-control" required>
                                                    <?php if (mysqli_num_rows($cek_user5) > 0) : ?>
                                                        <?php if ($tes5['level_tempat_kerja'] == 'L') : ?>
                                                            <option value='L' selected> Local</option>
                                                            <option value='I'> Internasional</option>
                                                            <option value=''>--Pilih--</option>
                                                        <?php elseif ($tes5['level_tempat_kerja'] == 'I') : ?>
                                                            <option value='L'> Local</option>
                                                            <option value='I' selected> Internasional</option>
                                                            <option value=''>--Pilih--</option>
                                                        <?php else : ?>
                                                            <option value='L'> Local</option>
                                                            <option value='I'> Internasional</option>
                                                            <option value='' selected>--Pilih--</option>
                                                        <?php endif; ?>
                                                    <?php else : ?>
                                                        <option value='L'> Local</option>
                                                        <option value='I'> Internasional</option>
                                                        <option value='' selected>--Pilih--</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" id="negara_kerja">
                                            <div class="col-md-4">
                                                Negara
                                                <input name="negara_kerja" class="form-control" <?php if (mysqli_num_rows($cek_user5a) > 0) : ?> value="<?= $tes5['negara_kerja'] ?>" <?php endif ?> />
                                            </div>
                                        </div>
                                        <div class="form-group" id="local_kerja">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Provinsi
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="provinsi" id="provinsi">
                                                            <?php if (mysqli_num_rows($cek_user5) > 0) : ?>
                                                                <option value="<?= $tes5['provinsi'] ?>"><?= $tes5['provinsi'] ?></option>
                                                            <?php else : ?>

                                                            <?php endif; ?>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group" id="">
                                            <div class="col-md-4">
                                                <font><i> Apa jabatan/posisi dalam pekerjaan Anda?</font></i>
                                                <select name="jabatan" id="jabatan" class="form-control">
                                                    <?php if ($tes5['jabatan'] == '') : ?>
                                                        <option value="" selected>Pilih Jabatan</option>
                                                        <option value="Founder">[ 1 ] Founder
                                                        <option value="Co-Founder">[ 2 ] Co-Founder
                                                        <option value="Staff">[ 3 ] Staff
                                                        <option value="Freelance/Kerja Lepas">[ 4 ] Freelance/Kerja Lepas
                                                        <?php else : ?>
                                                        <option value="<?= $tes5['jabatan'] ?>" selected><?= $tes5['jabatan'] ?></option>
                                                        <option value="Founder">[ 1 ] Founder
                                                        <option value="Co-Founder">[ 2 ] Co-Founder
                                                        <option value="Staff">[ 3 ] Staff
                                                        <option value="Freelance/Kerja Lepas">[ 4 ] Freelance/Kerja Lepas

                                                        <?php endif; ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                Tanggal Mulai Bekerja
                                                <input type="date" name="tgl_mulai_kerja" class="form-control" id="" placeholder="" value="<?= $tes5['tgl_mulai_kerja'] ?>" />
                                            </div>
                                        </div><br><br>

                                        <div class="mb-3"><label class="form-label"><strong>7.Seberapa erat hubungan antara bidang studi dengan pekerjaan anda? </strong></label><br>
                                            <?php while ($row6 = mysqli_fetch_assoc($result6)) : ?>
                                                <input type="radio" name="pert8" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row6["id_pilihan"] ?>" <?php if (mysqli_num_rows($cek_user7) > 0) : ?> <?php if ($row6["id_pilihan"] == $val8) {
                                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                                } ?> <?php endif; ?>><?= $row6["pilihan_jawaban"] ?><br>

                                            <?php endwhile; ?>
                                            <br>
                                        </div>
                                        <div class="mb-3"><label class="form-label"><strong>8.Tingkat pendidikan apa yang paling tepat / sesuai untuk pekerjaan anda saat ini? </strong></label><br>
                                            <?php while ($row7 = mysqli_fetch_assoc($result7)) : ?>
                                                <input type="radio" name="pert9" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row7["id_pilihan"] ?>" <?php if (mysqli_num_rows($cek_user8) > 0) : ?> <?php if ($row7["id_pilihan"] == $val9) {
                                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                                } ?> <?php endif; ?>><?= $row7["pilihan_jawaban"] ?><br>

                                            <?php endwhile; ?>
                                            <br>
                                        </div>
                                        <div class="mb-3"><label class="form-label"><strong>9.Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu </strong></label><br>
                                            <?php while ($row8 = mysqli_fetch_assoc($result8)) : ?>
                                                <?php if (mysqli_num_rows($cek_user9) === 0) : ?>
                                                    <input type="checkbox" name="pert10[]" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row8["id_pilihan"] ?>"><?= $row8["pilihan_jawaban"] ?><br>
                                                <?php else : ?>
                                                    <input type="checkbox" name="pert10[]" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row8["id_pilihan"] ?>" <?php if (in_array($row8["id_pilihan"], $val10)) {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        } ?>><?= $row8["pilihan_jawaban"] ?><br>
                                                <?php endif; ?>
                                            <?php endwhile; ?>

                                            <br>
                                        </div>

                                        <div class="mb-3"><label class="form-label"><strong>10.Berapa banyak perusahaan / instansi / institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama? </strong></label><br>
                                            <input type="text" name="pert11" class="form-control" <?php if (mysqli_num_rows($cek_user10) > 0) : ?> value="<?= $tes10['jawaban'] ?>" <?php endif; ?>>
                                            <span class="help-block">
                                                perusahaan / instansi / institusi
                                            </span>
                                            <br>
                                        </div><br>
                                        <div class="mb-3"><label class="form-label"><strong>11.Berapa banyak perusahaan / instansi/ institusi yang merespons lamaran anda? </strong></label><br>
                                            <input type="text" name="pert12" class="form-control" <?php if (mysqli_num_rows($cek_user11) > 0) : ?> value="<?= $tes11['jawaban'] ?>" <?php endif; ?>>

                                            <span class="help-block">
                                                perusahaan / instansi / institusi
                                            </span>
                                            <br>
                                        </div><br>
                                        <div class="mb-3"><label class="form-label"><strong>12.Berapa banyak perusahaan / instansi / institusi yang mengundang anda untuk wawancara? </strong></label><br>
                                            <input type="text" name="pert13" class="form-control" <?php if (mysqli_num_rows($cek_user12) > 0) : ?> value="<?= $tes12['jawaban'] ?>" <?php endif; ?>>
                                            <span class="help-block">
                                                perusahaan / instansi / institusi
                                            </span>
                                            <br>
                                        </div><br>
                                        <div class="mb-3"><label class="form-label"><strong>13.Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? Pilihlah Satu Jawaban. </strong></label><br>
                                            <?php while ($row9 = mysqli_fetch_assoc($result9)) : ?>
                                                <input type="radio" name="pert14" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row9["id_pilihan"] ?>" <?php if (mysqli_num_rows($cek_user13) > 0) : ?> <?php if ($row9["id_pilihan"] == $val14) {
                                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                                } ?> <?php endif; ?>><?= $row9["pilihan_jawaban"] ?><br>

                                            <?php endwhile; ?>
                                            <br>
                                            <input type="text" name="pert14Text" class="form-control" placeholder="" <?php if (mysqli_num_rows($cek_user13) > 0) : ?> value="<?= $tes13['jawaban'] ?>" <?php endif; ?>>
                                            <span class="help-block">
                                                Jika memilih [5] Lainnya, silahkan ketik di kotak ini
                                            </span>
                                            <br>
                                        </div><br>
                                        <div class="mb-3"><label class="form-label"><strong>14.Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan Bidang Ilmu Anda, mengapa anda mengambilnya? Jawaban anda mengambilnya? Jawaban bisa lebih dari satu</strong></label><br>
                                            <?php while ($row10 = mysqli_fetch_assoc($result10)) : ?>
                                                <?php if (mysqli_num_rows($cek_user14) === 0) : ?>
                                                    <input type="checkbox" name="pert15[]" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row10["id_pilihan"] ?>"><?= $row10["pilihan_jawaban"] ?><br>
                                                <?php else : ?>
                                                    <input type="checkbox" name="pert15[]" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row10["id_pilihan"] ?>" <?php if (in_array($row10["id_pilihan"], $val15)) {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        } ?>><?= $row10["pilihan_jawaban"] ?><br>
                                                <?php endif; ?>

                                            <?php endwhile; ?>
                                            <br>
                                        </div> <br>
                                        <div class="mb-3"><label class="form-label"><strong>15.Bila berwiraswasta,Usaha apa yang Anda jalankan saat ini? </strong></label><br>
                                            <input type="text" name="pert16" class="form-control" placeholder="" <?php if (mysqli_num_rows($cek_user15) > 0) : ?> value="<?= $tes15['jawaban'] ?>" <?php endif; ?>>

                                        </div><br>
                                        <div class="mb-3"><label class="form-label"><strong>16.Pertanyaan studi lanjut (Apabila F8 menjawab [4] Melanjutkan Pendidikan) </strong></label><br>
                                            <hr>
                                            Sumber Biaya :
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <select name="sumber_biaya" class="form-control">
                                                        <?php if ($tes16['sumber_biaya'] == '') : ?>
                                                            <option value="Biaya Sendiri" selected>[ 1 ] Biaya Sendiri
                                                            <option value="Beasiswa">[ 2 ] Beasiswa
                                                            <?php else : ?>
                                                            <option value="Biaya Sendiri" <?php if ($tes16['sumber_biaya'] == 'Biaya Sendiri') {
                                                                                                echo "selected";
                                                                                            } ?>>[ 1 ] Biaya Sendiri
                                                            <option value="Beasiswa" <?php if ($tes16['sumber_biaya'] == 'Beasiswa') {
                                                                                            echo "selected";
                                                                                        } ?>>[ 2 ] Beasiswa
                                                            <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div><br>
                                            Perguruan Tinggi :
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <input type="text" name="perguruan_tinggi" class="form-control" <?php if (mysqli_num_rows($cek_user16) > 0) : ?> value="<?= $tes16['perguruan_tinggi'] ?>" <?php endif; ?>>
                                                </div>
                                            </div><br>
                                            Program Studi :
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <input type="text" name="prodi" class="form-control" <?php if (mysqli_num_rows($cek_user16) > 0) : ?> value="<?= $tes16['program_studi'] ?>" <?php endif; ?>>
                                                </div>
                                            </div><br>
                                            Tanggal Masuk :
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <input type="date" name="tgl_masuk" class="form-control" <?php if (mysqli_num_rows($cek_user16) > 0) : ?> value="<?= $tes16['tanggal_masuk'] ?>" <?php endif; ?>>
                                                </div>
                                            </div><br>
                                            Alasan Melanjutkan Studi?
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <textarea name="alasan_lanjut_studi" class="form-control"><?php if (mysqli_num_rows($cek_user16) > 0) : ?> <?= $tes16['alasan'] ?> <?php endif; ?></textarea>
                                                </div>
                                            </div><br>
                                        </div><br>
                                        <div class="mb-3"><label class="form-label"><strong>17.Bila Belum Mendapatkan Pekerjaan / tidak berwirausaha / tidak melanjutkan studi, Apa kendalanya? (Apabila F8 menjawab[2] belum bekerja) </strong></label><br>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <textarea name="alasan_tidak_kerja" class="form-control"><?php if (mysqli_num_rows($cek_user17) > 0) : ?> <?= $tes17['jawaban'] ?> <?php endif; ?></textarea>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="mb-3"><label class="form-label"><strong>18.Menurut Anda, apa faktor utama dalam perkuliahan yang memberikan manfaat dalam pekerjaan Anda?</strong></label><br>
                                            <?php while ($row11 = mysqli_fetch_assoc($result11)) : ?>
                                                <input type="radio" name="pert19" style="height:20px; width:20px; vertical-align: middle;" value="<?= $row11["id_pilihan"] ?>" <?php if (mysqli_num_rows($cek_user18) > 0) : ?> <?php if ($tes18['id_pilihan_jawaban'] == $row11["id_pilihan"]) {
                                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                                } ?> <?php endif; ?>><?= $row11["pilihan_jawaban"] ?><br>


                                            <?php endwhile; ?>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <!-- create button to submit form-->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" name="submit">Simpan Hasil Kuisioner</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright ©KP Ilmu Komputer 2023</span></div>
                </div>
            </footer>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>


        <script>
            $(document).ready(function() {
                var value = $("#level_tmpt_kerja").val();

                if (value == 'L') {
                    $("#local_kerja").show();
                    $("#negara_kerja").hide();
                } else if (value == 'I') {
                    $("#negara_kerja").show();
                    $("#local_kerja").hide();
                }
            });

            $('#level_tmpt_kerja').on('change', function() {
                var value = $(this).val();

                if (value == 'L') {
                    $("#local_kerja").show();
                    $("#negara_kerja").hide();
                } else if (value == 'I') {
                    $("#negara_kerja").show();
                    $("#local_kerja").hide();
                }
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajax({
                    type: 'GET',
                    url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
                    dataType: 'json',
                    success: function(data) {
                        var html = <?php if (mysqli_num_rows($cek_user5) > 0) : ?> '<option value="<?= $tes5['provinsi'] ?>"><?= $tes5['provinsi'] ?></option>';
                    <?php else : ?>
                            '<option value="">Pilih Provinsi</option>';
                    <?php endif; ?>


                    $.each(data.provinsi, function(i, item) {
                        html += '<option value="' + item.nama + '">' + item.nama + '</option>';
                    });
                    $('#provinsi').html(html);
                    }
                });
            });
        </script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="https://kit.fontawesome.com/1b05bcc72f.js" crossorigin="anonymous"></script>

</body>

</html>