<?php
include '../config.php';

if (!isset($_SESSION["admin"])) {
    header("Location: ../NotFound.php");
    exit;
}

if (isset($_POST["submit"])) {
    if (TambahUser($_POST) > 0) {
        echo "
            <script>
                alert('User berhasil ditambahkan');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('User gagal ditambahkan');
            </script>
        ";
    }
}

if (isset($_POST["AddExcel"])) {
    if (importData($_FILES['file']['tmp_name']) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
            </script>
        ";
    }
}

$id = $_SESSION["id"];
$row = query("SELECT * FROM user WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blank Page - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/1b05bcc72f.css" crossorigin="anonymous">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-2"><span>Admin Menu</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">

                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fa-sharp fa-solid fa-school"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown" data-bs-toggle="dropdown"><i class="fas fa-plus"></i>Tambah Akun</a>
                        <div class="dropdown-menu">
                            <a href="TambahData.php" class="dropdown-item"><i class="fas fa-plus"></i> Tambah User</a>
                            <a href="TambahAdmin.php" class="dropdown-item"><i class="fas fa-plus"></i> Tambah Admin</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown" data-bs-toggle="dropdown"><i class="fas fa-book-open"></i>Kuisioner</a>
                        <div class="dropdown-menu">
                            <a href="DataPertanyaan.php" class="dropdown-item"><i class="fas fa-plus"></i> Tambah Pertanyaan</a>
                            <a href="DataPIlihanjawaban.php" class="dropdown-item"><i class="fas fa-plus"></i> Tambah Pilihan Jawaban</a>
                        </div>
                    </li>
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
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="col-lg-9">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 fw-bold">Tambah User</p>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3"><label class="form-label" for="nim"><strong>NIM</strong></label><input class="form-control" type="text" id="nim" name="nim"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3"><label class="form-label" for="password"><strong>Password</strong></label><input class="form-control" type="TEXT" id="password" name="password"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3"><label class="form-label" for="tahun_lulus"><strong>Tahun Lulus</strong></label>
                                                        <select class="form-control" name="tahun_lulus" id="tahun_lulus">
                                                            <?php
                                                            $year = date('Y');
                                                            for ($i = 2000; $i <= $year; $i++) {
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="jurusan"><strong>Jurusan</strong></label>
                                                                <select class="form-control" name="jurusan" id="jurusan">
                                                                    <option value="Ilmu Linguistik">Ilmu Linguistik</option>
                                                                    <option value="Ilmu Lingkungan">Ilmu Lingkungan</option>
                                                                    <option value="ilmu Pendidikan IPS">ilmu Pendidikan IPS</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="Submit" name="submit">Tambah</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Tambah User Via Excel</p>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="file"><strong>File Excel</strong></label><input class="form-control" type="file" id="file" name="file"></div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-primary btn-sm" type="Submit" name="AddExcel">Tambah</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright ©KP Ilmu Komputer 2023</span></div>
        </div>
    </footer>
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://kit.fontawesome.com/1b05bcc72f.js" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>