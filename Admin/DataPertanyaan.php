<?php 
require('../config.php');

if(!isset($_SESSION['admin'])){
    header('Location: ../index.php');
}
$id = $_SESSION["id"];
$row = query("SELECT * FROM user WHERE id = $id")[0];

if(isset($_POST["TambahPertanyaan"])){
    if(TambahPertanyaan($_POST) > 0){
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
            </script>
        ";
    }
}

if(isset($_POST["HapusPertanyaan"])){
    if(HapusPertanyaan($_POST) > 0){
        echo "
            <script>
                alert('Data Berhasil Dihapus');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Dihapus');
            </script>
        ";
    }
}

if(isset($_POST["UbahPertanyaan"])){
    if(UbahPertanyaan($_POST) > 0){
        echo "
            <script>
                alert('Data Berhasil Diubah');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data Gagal Diubah');
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

                    <li class="nav-item"><a class="nav-link" href="dashboard.php">
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
                        <a href="#" class="nav-link dropdown active" data-bs-toggle="dropdown"><i
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"
                        style="margin-top: 20px;">
                        Tambah Data
                    </button>
                    <div class="card shadow" style="margin-top: 25px;">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Data Pertanyaan</p>
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
                                            <th>Pertanyaan</th>
                                            <th>Tipe</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $user = mysqli_query($conn, "SELECT * FROM tbl_pertanyaan");
                                        foreach($user as $rows) : ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$rows["pertanyaan"]?></td>
                                            <td><?=$rows["tipe"]?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#edit<?=$rows["id_pertanyaan"]?>">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapus<?=$rows["id_pertanyaan"]?>">Hapus</button>
                                                
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                            
                                            <!-- Modal Edit Data -->
                                            <div class="modal fade" id="edit<?=$rows["id_pertanyaan"]?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form method="post" action="">

                                                            <!-- Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">UBAH DATA</h4>
                                                            </div>
                                                            <!-- Body -->
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_pertanyaan" value="<?=$rows["id_pertanyaan"]?>" hidden>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="mb-3"><label class="form-label" for="pertanyaan"><strong>Pertanyaan</strong></label>
                                                                            <input class="form-control" type="text" name="pertanyaan" value="<?=$rows["pertanyaan"]?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="mb-3"><label class="form-label" for="tipe"><strong>Tipe</strong></label>
                                                                            <select name="tipe" class="form-select" aria-label="Default select example">
                                                                                <option value="textbox">Textbox</option>
                                                                                <option value="checkbox">Checkbox</option>
                                                                                <option value="radio">Radio</option>
                                                                                <option value="dropdown">Dropdown</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                                    style="border-radius: 0;">Batal</button>
                                                                <button type="submit" class="btn btn-primary" name="UbahPertanyaan"
                                                                    style="border-radius: 0;">Ubah</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Edit Data -->
                                            <!-- Modal hapus Data -->
                                            <div class="modal fade" id="hapus<?= $rows["id_pertanyaan"]; ?>">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form method="post">

                                                            <!-- Header -->
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">HAPUS pertanyaan <strong>"<?=$rows['pertanyaan'] ?>"</strong>
                                                                </h5>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                Anda yakin ingin menghapus Pertanyaan ini?
                                                                <input type="hidden" name="id_pertanyaan" value="<?= $rows['id_pertanyaan']; ?>">
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                                    style="border-radius: 0;">Batal</button>
                                                                <button type="submit" class="btn btn-danger" name="HapusPertanyaan"
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
        <!-- Modal tambah Data -->
        <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">TAMBAH DATA</h4>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pertanyaan</label>
                            <textarea name="pertanyaan" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="tipe"><strong>Tipe</strong></label>
                                    <select name="tipe" class="form-select" aria-label="Default select example">
                                        <option value="textbox">Textbox</option>
                                        <option value="checkbox">Checkbox</option>
                                        <option value="radio">Radio</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="TambahPertanyaan" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end tambah data modal -->
    <script src="https://kit.fontawesome.com/1b05bcc72f.js" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>