<?php 
require('../config.php');

if(!isset($_SESSION['admin'])){
    header('Location: ../index.php');
}
$id = $_SESSION["id"];
$row = query("SELECT * FROM user WHERE id = $id")[0];

if(isset($_POST["UbahDataAlumni"]))
{
    if(UbahDataAlumni($_POST) > 0)
    {
        echo "
            <script>
                alert('Data Berhasil Diubah');
            </script>
        ";
    }
    else
    {
        echo "
            <script>
                alert('Data Gagal Diubah');
            </script>
        ";
    }
}

if(isset($_POST["HapusDataAlumni"]))
{
    if(HapusDataAlumni($_POST) > 0)
    {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
            </script>
        ";
    }
    else
    {
        echo "
            <script>
                alert('Data Gagal Dihapus');
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blank Page - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/1b05bcc72f.css" crossorigin="anonymous">
    <style>
        .modal {
        background-color: rgba(255, 255, 255, 1) !important;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-2"><span>Admin Menu</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">

                    <li class="nav-item"><a class="nav-link active" href="dashboard.php">
                    <i class="fa-sharp fa-solid fa-school"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i
                                class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown" data-bs-toggle="dropdown"><i
                                class="fas fa-plus"></i>Tambah Akun</a>
                        <div class="dropdown-menu">
                            <a href="TambahData.php" class="dropdown-item"><i
                                class="fas fa-plus"></i> Tambah User</a>
                            <a href="TambahAdmin.php" class="dropdown-item"><i
                                class="fas fa-plus"></i> Tambah Admin</a>
                       </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown" data-bs-toggle="dropdown"><i
                                class="fas fa-book-open"></i>Kuisioner</a>
                        <div class="dropdown-menu">
                            <a href="DataPertanyaan.php" class="dropdown-item"><i
                                class="fas fa-plus"></i> Tambah Pertanyaan</a>
                            <a href="DataPilihanJawaban.php" class="dropdown-item"><i
                                class="fas fa-plus"></i> Tambah Pilihan Jawaban</a>
                       </div>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                    aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                        class="d-none d-lg-inline me-2 text-gray-600 small"><?=$row["nama"]?></span><?php echo "<img class='border rounded-circle img-profile' src='upload/".$row['gambar']."''>";?></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                        class="dropdown-item" href="profile.php"><i
                                            class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="../logout.php"><i
                                            class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                </div>
                            </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-1">Selamat Datang <?=$row["nama"]?></h3>
                    <div class="card shadow" style="margin-top: 50px;">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Data User</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <label class="form-label">Show&nbsp;<select
                                                class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label
                                            class="form-label"><input type="search" class="form-control form-control-sm"
                                                aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $user = mysqli_query($conn, "SELECT * FROM user WHERE role_id = 2");
                                        foreach($user as $rows) : ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$rows["nim"]?></td>
                                            <td><?=$rows["pass"]?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#edit<?=$rows["id"]?>">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapus<?=$rows["id"]?>">Hapus</button>
                                                
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                            
                                            <!-- Modal Edit Data -->
                                            <div class="modal fade" id="edit<?=$rows["id"]?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form method="post" action="">

                                                            <!-- Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">UBAH DATA</h4>
                                                            </div>
                                                            <!-- Body -->
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="<?=$rows["id"]?>" hidden>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="mb-3"><label class="form-label" for="nim"><strong>NIM</strong></label><input
                                                                                class="form-control" type="text" id="nim" name="nim" value="<?=$rows['nim']?>"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="mb-3"><label class="form-label"
                                                                                for="password"><strong>Password</strong></label><input class="form-control"
                                                                                type="TEXT" id="password" name="password" value="<?=$rows['pass']?>"></div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                                    style="border-radius: 0;">Batal</button>
                                                                <button type="submit" class="btn btn-primary" name="UbahDataAlumni"
                                                                    style="border-radius: 0;">Ubah</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Edit Data -->
                                            <!-- Modal hapus Data -->
                                            <div class="modal fade" id="hapus<?= $rows["id"]; ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form method="post">

                                                            <!-- Header -->
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">HAPUS DATA
                                                                    <?=$rows['nim'] ?> -
                                                                </h5>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                Anda yakin ingin menghapus data ini?
                                                                <input type="hidden" name="id" value="<?= $rows['id']; ?>">
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                                    style="border-radius: 0;">Batal</button>
                                                                <button type="submit" class="btn btn-danger" name="HapusDataAlumni"
                                                                    style="border-radius: 0;">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal hapus Data -->
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

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
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://kit.fontawesome.com/1b05bcc72f.js" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>