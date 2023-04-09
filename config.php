<?php

$conn = mysqli_connect("localhost", "root", "", "web_pasca");
session_start();

require 'vendor/autoload.php';
error_reporting(0);


use PhpOffice\PhpSpreadsheet\IOFactory;


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function login($data)
{
    global $conn;
    $nim = $data["nim"];
    $password = $data["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE nim = '$nim'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['role_id'] === '1') {
            $idUser = $row["id"];
            $_SESSION["admin"] = true;
            $_SESSION["id"] = $idUser;
            header("Location: ../index.php");
            exit;
        } else {
            $idUser = $row["id"];
            $_SESSION["user"] = true;
            $_SESSION["id"] = $idUser;
            header("Location: ../index.php");
            exit;
        }
    }

    return false;
}
function TambahUser($data)
{
    global $conn;
    $nim = $data["nim"];
    $password = $data["password"];
    $tahunlulus = $data["tahun_lulus"];
    $jurusan = $data["jurusan"];

    mysqli_query($conn, "INSERT INTO user VALUES('','$nim','','','$tahunlulus','','','$jurusan','','','','$password','2')");
    return mysqli_affected_rows($conn);
}

function UbahDataUser($data)
{
    global $conn;
    $id_user = $data["id"];
    $nim = $data["nim"];
    $nama = $data["nama"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $tgl_lulus = $data["tgl_lulus"];
    $ipk = $data["ipk"];
    $semester = $data["semester"];
    $program_studi = $data["program_studi"];
    $telepon = $data["telepon"];
    $email = $data["email"];
    $gambarlama = $data["gambarlama"];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE user SET
                nim = '$nim',
                nama = '$nama',
                jenis_kelamin = '$jenis_kelamin',
                tgl_lulus = '$tgl_lulus',
                ipk = '$ipk',
                semester = '$semester',
                program_studi = '$program_studi',
                telepon = '$telepon',
                email = '$email',
                gambar = '$gambar'
                WHERE id = $id_user
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar');
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'upload/' . $namaFileBaru);

    return $namaFileBaru;
}

function UbahDataAdmin($data)
{
    global $conn;
    $id = $data["id"];
    $Username = $data["nama"];
    $gambarlama = $data["gambarlama"];

    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE user SET
                nama = '$Username',
                gambar = '$gambar'
                WHERE id = $id
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function UbahPasswordAdmin($data)
{
    global $conn;
    $id = $data["id"];
    $oldPass = $data["oldPass"];
    $pass = $data["newPass"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);
    $password = $row["pass"];
    if (password_verify($oldPass, $password)) {
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $query = "UPDATE user 
                SET
                pass = '$password'
                WHERE id = $id
                ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    echo "<script>
                alert('Password lama tidak sesuai');
            </script>";
    return false;
}

function UbahDataAlumni($data)
{
    global $conn;
    $id = $data["id"];
    $nim = $data["nim"];
    $pass = $data["password"];

    $query = "UPDATE user SET
                nim = '$nim',
                pass = '$pass'
                WHERE id = $id
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function HapusDataAlumni($data)
{
    global $conn;
    $id = $data["id"];

    $query = "DELETE FROM user WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function importData($data)
{
    global $conn;
    $fileName = $_FILES['file']['tmp_name'];
    $spreadsheet = IOFactory::load($fileName);
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
    for ($i = 1; $i < count($sheetData); $i++) {
        $nim = $sheetData[$i]['0'];
        $nama = $sheetData[$i]['1'];
        $jenis_kelamin = $sheetData[$i]['2'];
        $tgl_lulus = $sheetData[$i]['3'];
        $ipk = $sheetData[$i]['4'];
        $semester = $sheetData[$i]['5'];
        $password = $sheetData[$i]['6'];
        $query = "INSERT INTO user VALUES('','$nim','$nama','$jenis_kelamin','$tgl_lulus','$ipk','$semester','','','','','$password','2')";
        mysqli_query($conn, $query);
    }
    return mysqli_affected_rows($conn);
}


function TambahAdmin($data)
{
    global $conn;
    $Username = strtolower(stripslashes($data["username"]));
    $Password = mysqli_real_escape_string($conn, $data["password"]);
    $Password2 = mysqli_real_escape_string($conn, $data["con_pas"]);

    // cek Username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT nim FROM user WHERE nim = '$Username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar');
            </script>";
        return false;
    }

    // cek konfirmasi Password
    if ($Password !== $Password2) {
        echo "<script>
                alert('konfirmasi Password tidak sesuai');
            </script>";
        return false;
    }

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('','$Username','','','','','','','','','','$Password','1')");

    return mysqli_affected_rows($conn);
}



function TambahPertanyaan($data)
{
    global $conn;
    $pertanyaan = $data["pertanyaan"];
    $tipe = $data["tipe"];

    $query = "INSERT INTO tbl_pertanyaan VALUES('','$pertanyaan','$tipe')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function UbahPertanyaan($data)
{
    global $conn;
    $id = $data["id_pertanyaan"];
    $pertanyaan = $data["pertanyaan"];
    $tipe = $data["tipe"];

    $query = "UPDATE tbl_pertanyaan SET
                pertanyaan = '$pertanyaan',
                tipe = '$tipe'
                WHERE id_pertanyaan = $id
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function HapusPertanyaan($data)
{
    global $conn;
    $id = $data["id_pertanyaan"];

    $query = "DELETE FROM tbl_pertanyaan WHERE id_pertanyaan = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function TambahPilihanJawaban($data)
{
    global $conn;
    $id_pertanyaan = $data["pertanyaan"];
    $pilihan_jawaban = $data["pilihan_jawaban"];

    $query = "INSERT INTO tbl_pilihan_jawaban VALUES('','$id_pertanyaan','$pilihan_jawaban')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function UbahPilihanJawaban($data)
{
    global $conn;
    $OpsiLama = $data["OpsiLama"];
    $OpsiBaru = $data["OpsiBaru"];

    $result = mysqli_query($conn, "SELECT id_pilihan FROM tbl_pilihan_jawaban WHERE id_pilihan = '$OpsiLama'");
    $row = mysqli_fetch_assoc($result);
    $id_pilihan = $row["id_pilihan"];

    $query = "UPDATE tbl_pilihan_jawaban SET
                pilihan_jawaban = '$OpsiBaru'
                WHERE id_pilihan = $id_pilihan";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function HapusPilihanJawaban($data)
{
    global $conn;
    $OpsiLama = $data["OpsiLama"];

    $result = mysqli_query($conn, "SELECT id_pilihan FROM tbl_pilihan_jawaban WHERE id_pilihan = '$OpsiLama'");
    $row = mysqli_fetch_assoc($result);
    $id_pilihan = $row["id_pilihan"];

    $query = "DELETE FROM tbl_pilihan_jawaban WHERE id_pilihan = $id_pilihan";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function simpanPertanyaan1($data)
{
    global $conn;
    $idPertanyaan1 = 12;
    $Jawaban1 = $data['pert1A'];
    $jawabanText1 = $data['pert1Text'];
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan1'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        if ($Jawaban1 === "36") {
            mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan1',36,'$jawabanText1')");
            return 1;
        }
        mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan1','$Jawaban1',NULL)");
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET id_pilihan_jawaban = '$Jawaban1', jawaban = '$jawabanText1'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan1'");
        return 1;
    }
}

function simpanPertanyaan2($data)
{
    global $conn;
    $idPertanyaan2 = 13;
    $Jawaban2 = $data['pert2'];
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan2'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan2','$Jawaban2',NULL)");
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET id_pilihan_jawaban = '$Jawaban2'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan2'");
        return 1;
    }
}

function simpanPertanyaan3($data)
{
    global $conn;
    $idPertanyaan3 = 14;
    $Jawaban3 = $data['pert3'];
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan3'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan3','$Jawaban3',NULL)");
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET id_pilihan_jawaban = '$Jawaban3'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan3'");
        return 1;
    }
}

function simpanPertanyaan4($data)
{
    global $conn;
    $idPertanyaan4 = 15;
    $Jawaban4 = $data['pert4'];
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan4'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan4','$Jawaban4',NULL)");
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET id_pilihan_jawaban = '$Jawaban4'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan4'");
        return 1;
    }
}

function simpanPertanyaan5($data)
{
    global $conn;
    $idPertanyaan5 = 16;
    $jawaban5 = $data['pert5'];
    $jawaban5Text = $data['pert5Text'];
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan5'");

    if (mysqli_num_rows($cek_kuisioner) === 0) {
        if ($jawaban5 === "52") {
            mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan5',52,'$jawaban5Text')");
            return 1;
        } else {
            mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan5','$jawaban5',NULL)");
            return 1;
        }
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET 
        id_pilihan_jawaban = '$jawaban5',
        jawaban = '$jawaban5Text'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan5'");
        return 1;
    }
}


function simpanPertanyaan6($data)
{
    global $conn;
    $id_user = $data['id_user'];
    $idPertanyaan = 17;
    $tempat_kerja = $data['tempat_kerja'];
    $bidang_kerja = $data['bidang_kerja'];
    $level_tmpt_kerja = $data['level_tmpt_kerja'];
    $negara_kerja = $data['negara_kerja'];
    $provinsi = $data['provinsi'];
    $jabatan = $data['jabatan'];
    $tgl_mulai_kerja = $data['tgl_mulai_kerja'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_lokasi WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        mysqli_query($conn, "INSERT INTO tbl_lokasi VALUES(NULL, '$id_user', '$idPertanyaan','$tempat_kerja','$bidang_kerja','$level_tmpt_kerja','$negara_kerja','$provinsi','$jabatan','$tgl_mulai_kerja')");
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_lokasi
        SET
        nama_instansi = '$tempat_kerja',
        nama_bidang_pekerjaan = '$bidang_kerja',
        level_tempat_kerja = '$level_tmpt_kerja',
        negara_kerja = '$negara_kerja',
        provinsi = '$provinsi',
        jabatan = '$jabatan',
        tgl_mulai_kerja = '$tgl_mulai_kerja'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan'");
        return 1;
    }
}



function simpanPertanyaan8($data)
{
    global $conn;
    $idPertanyaan8 = 21;
    $Jawaban8 = $data['pert8'];
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan8'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan8','$Jawaban8',NULL)");
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET id_pilihan_jawaban = '$Jawaban8'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan8'");
        return 1;
    }
}

function simpanPertanyaan9($data)
{
    global $conn;
    $idPertanyaan9 = 22;
    $Jawaban9 = $data['pert9'];
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan9'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan9','$Jawaban9',NULL)");
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET id_pilihan_jawaban = '$Jawaban9'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan9'");
        return 1;
    }
}

function simpanPertanyaan10($data)
{
    global $conn;
    $idPertanyaan10 = 23;
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan10'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        foreach ($data['pert10'] as $pert10) {
            mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan10','$pert10',NULL)");
        }
        return 1;
    } else {
        mysqli_query($conn, "DELETE FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan10'");
        foreach ($data['pert10'] as $pert10) {
            mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan10','$pert10',NULL)");
        }
        return 1;
    }
}


function simpanPertanyaan11($data)
{
    global $conn;
    $idPertanyaan11 = 24;
    $Jawaban11 = $data["pert11"];
    $id_user = $data["id_user"];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan11'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan11',NULL,'$Jawaban11')");
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET jawaban = '$Jawaban11'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan11'");
        return 1;
    }
}

function simpanPertanyaan12($data)
{
    global $conn;
    $idPertanyaan12 = 25;
    $Jawaban12 = $data['pert12'];
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan12'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan12',NULL,'$Jawaban12')");
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET jawaban = '$Jawaban12'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan12'");
        return 1;
    }
}

function simpanPertanyaan13($data)
{
    global $conn;
    $idPertanyaan13 = 26;
    $Jawaban13 = $data['pert13'];
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan13'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan13',NULL,'$Jawaban13')");
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET 
        jawaban = '$Jawaban13'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan13'");
        return 1;
    }
}

function simpanPertanyaan14($data)
{
    global $conn;
    $idPertanyaan14 = 27;
    $Jawaban14 = $data['pert14'];
    $jawaban14Text = $data['pert14Text'];
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan14'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        if ($Jawaban14 === "90") {
            mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan14','$Jawaban14','$jawaban14Text')");
            return 1;
        } else {
            mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan14','$Jawaban14',NULL)");
            return 1;
        }
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET     
        id_pilihan_jawaban = '$Jawaban14',
        jawaban = '$jawaban14Text'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan14'");
        return 1;
    }
}

function simpanPertanyaan15($data)
{
    global $conn;
    $idPertanyaan15 = 28;
    $Jawaban15 = $data['pert15'];
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan15'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        foreach ($Jawaban15 as $key) {
            mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan15','$key',NULL)");
        }
        return 1;
    } else {
        mysqli_query($conn, "DELETE FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan15'");
        foreach ($Jawaban15 as $key) {
            mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan15','$key',NULL)");
        }
        return 1;
    }
}

function simpanPertanyaan16($data)
{
    global $conn;
    $idPertanyaan16 = 29;
    $Jawaban16 = $data['pert16'];
    $id_user = $data['id_user'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan16'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        mysqli_query($conn, "INSERT INTO tbl_jawaban VALUES(NULL, '$id_user', '$idPertanyaan16',NULL,'$Jawaban16')");
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET
        jawaban = '$Jawaban16'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan16'");
        return 1;
    }
}

function simpanPertanyaan17($data)
{
    global $conn;
    $idPertanyaan17 = 30;
    $id_user = $data['id_user'];
    $sumber_biaya = $data['sumber_biaya'];
    $perguruan_tinggi = $data['perguruan_tinggi'];
    $prodi = $data['prodi'];
    $tgl_masuk = $data['tgl_masuk'];
    $alasan_lanjut_studi = $data['alasan_lanjut_studi'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_studi_lanjut WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan17'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        $query = "INSERT INTO tbl_studi_lanjut VALUES (NULL, '$id_user', '$idPertanyaan17', '$sumber_biaya', '$perguruan_tinggi', '$prodi', '$tgl_masuk', '$alasan_lanjut_studi')";
        mysqli_query($conn, $query);
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_studi_lanjut
        SET
        sumber_biaya = '$sumber_biaya',
        perguruan_tinggi = '$perguruan_tinggi',
        program_studi = '$prodi',
        tanggal_masuk = '$tgl_masuk',
        alasan = '$alasan_lanjut_studi'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan17'");
        return 1;
    }
}

function simpanPertanyaan18($data)
{
    global $conn;
    $idPertanyaan18 = 31;
    $id_user = $data['id_user'];
    $alasan_tidak_kerja = $data['alasan_tidak_kerja'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan18'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        $query = "INSERT INTO tbl_jawaban VALUES (NULL, '$id_user', '$idPertanyaan18', NULL, '$alasan_tidak_kerja')";
        mysqli_query($conn, $query);
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET
        jawaban = '$alasan_tidak_kerja'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan18'");
        return 1;
    }
}

function simpanPertanyaan19($data)
{
    global $conn;
    $idPertanyaan19 = 33;
    $id_user = $data['id_user'];
    $jawaban = $data['pert19'];

    $cek_kuisioner = mysqli_query($conn, "SELECT * FROM tbl_jawaban WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan19'");
    if (mysqli_num_rows($cek_kuisioner) === 0) {
        $query = "INSERT INTO tbl_jawaban VALUES(NULL,'$id_user','$idPertanyaan19','$jawaban',NULL)";
        mysqli_query($conn, $query);
        return 1;
    } else {
        mysqli_query($conn, "UPDATE tbl_jawaban
        SET
        id_pilihan_jawaban = '$jawaban'
        WHERE id_user = '$id_user' AND id_pertanyaan = '$idPertanyaan19'");
        return 1;
    }
}
