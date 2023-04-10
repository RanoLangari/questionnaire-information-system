-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 05:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_pasca`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jawaban`
--

CREATE TABLE `tbl_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `id_pilihan_jawaban` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jawaban`
--

INSERT INTO `tbl_jawaban` (`id_jawaban`, `id_user`, `id_pertanyaan`, `id_pilihan_jawaban`, `jawaban`) VALUES
(1490, 14, 12, 33, ''),
(1497, 14, 24, NULL, ''),
(1498, 14, 25, NULL, ''),
(1499, 14, 26, NULL, ''),
(1501, 14, 29, NULL, ''),
(1502, 14, 31, NULL, '                  '),
(1512, 14, 13, 25, NULL),
(1521, 14, 15, 45, NULL),
(1532, 14, 33, 160, NULL),
(1534, 14, 16, 52, 'malas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `nama_instansi` varchar(255) DEFAULT NULL,
  `nama_bidang_pekerjaan` varchar(255) DEFAULT NULL,
  `level_tempat_kerja` varchar(255) DEFAULT NULL,
  `negara_kerja` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `tgl_mulai_kerja` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `id_user`, `id_pertanyaan`, `nama_instansi`, `nama_bidang_pekerjaan`, `level_tempat_kerja`, `negara_kerja`, `provinsi`, `jabatan`, `tgl_mulai_kerja`) VALUES
(60, 14, 17, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pertanyaan`
--

CREATE TABLE `tbl_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tipe` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pertanyaan`
--

INSERT INTO `tbl_pertanyaan` (`id_pertanyaan`, `pertanyaan`, `tipe`) VALUES
(12, 'Sebutkan sumberdana dalam pembiayaan kuliah? (bukan ketika Studi Lanjut)', 'radio'),
(13, 'Jelaskan status Anda saat ini? ', 'radio'),
(14, 'Dalam jangka waktu berapa Anda mendapatkan pekerjaan pertama Anda? ', 'radio'),
(15, 'Kira-kira berapa total penghasilan pekerjaan utama anda tiap bulan? ', 'radio'),
(16, 'Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?', 'radio'),
(17, 'Dimana lokasi tempat Anda bekerja?', 'textbox'),
(18, 'Nama Instansi/Institusi/Perusahaan Tempat Kerja', 'textbox'),
(19, 'Bidang Pekerjaan ', 'textbox'),
(20, 'Kapan anda mulai bekerja?', 'textbox'),
(21, 'Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?', 'radio'),
(22, 'Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?', 'radio'),
(23, 'Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu', 'checkbox'),
(24, 'Berapa banyak perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', 'textbox'),
(25, 'Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda? ', 'textbox'),
(26, 'Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara? ', 'textbox'),
(27, 'Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? Pilihlah Satu Jawaban', 'dropdown'),
(28, 'Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan Bidang Ilmu Anda, mengapa anda mengambilnya?  Jawaban bisa lebih dari satu :', 'checkbox'),
(29, 'Bila berwiraswasta,Usaha apa yang Anda jalankan saat ini?\r\n(Apabila menjawab [3] Wiraswasta)', 'textbox'),
(30, 'Pertanyaan studi lanjut (Apabila menjawab [4] Melanjutkan Pendidikan) ', 'textbox'),
(31, 'Bila Belum Mendapatkan Pekerjaan/tidak berwirausaha/tidak melanjutkan studi, Apa kendalanya? (Apabila menjawab[2] belum bekerja)', 'textbox'),
(33, 'Menurut Anda, apa faktor utama dalam perkuliahan yang memberikan manfaat dalam pekerjaan Anda?', 'radio'),
(34, 'Saran anda untuk perbaikan proses pembelajaran pada Program Studi pada Pascasarjana UNDANA', 'textbox');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pilihan_jawaban`
--

CREATE TABLE `tbl_pilihan_jawaban` (
  `id_pilihan` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `pilihan_jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pilihan_jawaban`
--

INSERT INTO `tbl_pilihan_jawaban` (`id_pilihan`, `id_pertanyaan`, `pilihan_jawaban`) VALUES
(24, 13, '[1] Bekerja (full time/part time)'),
(25, 13, '[2] Belum memungkinkan bekerja'),
(30, 12, '[1] Biaya Sendiri / Keluarga'),
(31, 12, ' [2] Beasiswa ADIK'),
(32, 12, '[3] Beasiswa BIDIKMISI'),
(33, 12, ' [4] Beasiswa PPA'),
(34, 12, '[5] Beasiswa AFIRMASI'),
(35, 12, ' [6] Beasiswa Perusahaan/Swasta'),
(36, 12, ' [7] Lainnya'),
(37, 13, '[3] Wiraswasta'),
(38, 13, '[4] Melanjutkan Pendidikan'),
(39, 13, '[5] Tidak Kerja tetapi sedang mencari kerja'),
(42, 15, 'Dibawah 1 Juta'),
(43, 15, '1 s/d 3 Juta'),
(44, 15, '3 s/d 5 Juta'),
(45, 15, 'Lebih dari 5 Juta '),
(47, 16, '[1] Instansi pemerintah (termasuk BUMN)'),
(49, 16, '[2] Organisasi non-profit/Lembaga Swadaya Masyarakat'),
(50, 16, '[3] Perusahaan swasta'),
(51, 16, '[4] Wiraswasta/perusahaan sendiri'),
(52, 16, '[5] Lainnya'),
(53, 17, '-'),
(55, 18, '-'),
(56, 20, '-'),
(57, 21, '[1] Sangat Erat'),
(58, 21, '[2] Erat'),
(59, 21, '[3] Cukup Erat'),
(60, 21, '[4] Kurang Erat'),
(63, 21, '[5] Tidak Sama Sekali'),
(64, 22, '[1] Setingkat Lebih Tinggi'),
(65, 22, '[2] Tingkat yang Sama'),
(66, 22, '[3] Setingkat Lebih Rendah'),
(67, 22, '[4] Tidak Perlu Pendidikan Tinggi'),
(68, 23, 'Melalui iklan di koran/majalah, brosur'),
(69, 23, 'Melamar ke perusahaan tanpa mengetahui lowongan yang ada'),
(70, 23, 'Pergi ke bursa/pameran kerja'),
(71, 23, 'Mencari lewat internet/iklan online/milis'),
(72, 23, 'Dihubungi oleh perusahaan'),
(73, 23, 'Menghubungi Kemenakertrans'),
(74, 23, 'Menghubungi agen tenaga kerja komersial/swasta'),
(75, 23, 'Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas'),
(76, 23, 'Menghubungi kantor kemahasiswaan/hubungan alumni'),
(77, 23, 'Membangun jejaring (network) sejak masih kuliah'),
(78, 23, 'Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)'),
(79, 23, 'Membangun bisnis sendiri'),
(80, 23, 'Melalui penempatan kerja atau magang'),
(81, 23, 'Bekerja di tempat yang sama dengan tempat kerja semasa kuliah'),
(82, 23, 'Lainnya'),
(83, 24, '-'),
(84, 25, '-'),
(85, 26, '-'),
(86, 27, '[1] Tidak'),
(87, 27, '[2] Tidak, tapi saya sedang menunggu hasil lamaran kerja'),
(88, 27, '[3] Ya, saya akan mulai bekerja dalam 2 minggu ke depan'),
(89, 27, '[4] Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan'),
(90, 27, ' [5] Lainnya'),
(91, 28, 'Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.'),
(92, 28, 'Saya belum mendapatkan pekerjaan yang lebih sesuai.'),
(93, 28, 'Di pekerjaan ini saya memeroleh prospek karir yang baik.'),
(94, 28, 'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya.'),
(95, 28, 'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.'),
(96, 28, 'Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini.'),
(97, 28, 'Pekerjaan saya saat ini lebih aman/terjamin/secure'),
(98, 28, 'Pekerjaan saya saat ini lebih menarik'),
(99, 28, 'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll.'),
(100, 28, 'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.'),
(101, 28, 'Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.'),
(102, 28, 'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.'),
(103, 28, 'Lainnya'),
(104, 29, '-'),
(105, 30, '-'),
(106, 30, '-'),
(107, 30, '-'),
(108, 30, '-'),
(109, 31, '-'),
(145, 19, '-'),
(146, 14, '[1]Sebelum Lulus'),
(147, 14, '[2] 0 s/d 6 bulan setelah lulus'),
(148, 14, '[3] Lebih dari 6 bulan setelah lulus'),
(149, 33, 'Mata kuliah pengendalian mutu\r\n'),
(150, 33, 'Diskusi'),
(155, 33, 'Demonstrasi'),
(159, 33, 'Praktikum'),
(160, 33, 'Tugas akhir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studi_lanjut`
--

CREATE TABLE `tbl_studi_lanjut` (
  `id_studi_lanjut` int(11) NOT NULL,
  `id_user` int(50) NOT NULL,
  `id_pertanyaan` int(50) NOT NULL,
  `sumber_biaya` varchar(255) NOT NULL,
  `perguruan_tinggi` varchar(255) NOT NULL,
  `program_studi` varchar(255) NOT NULL,
  `tanggal_masuk` varchar(50) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_studi_lanjut`
--

INSERT INTO `tbl_studi_lanjut` (`id_studi_lanjut`, `id_user`, `id_pertanyaan`, `sumber_biaya`, `perguruan_tinggi`, `program_studi`, `tanggal_masuk`, `alasan`) VALUES
(26, 14, 30, 'Biaya Sendiri', '', '', '', '                  ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tgl_lulus` varchar(255) NOT NULL,
  `ipk` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `program_studi` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nim`, `nama`, `jenis_kelamin`, `tgl_lulus`, `ipk`, `semester`, `program_studi`, `telepon`, `email`, `gambar`, `pass`, `role_id`) VALUES
(12, '2006080040', '', '', '', '', '', 'Ilmu Linguistik', '', '', '64147e47b1031.jpg', '2006080040', 2),
(13, 'Administrator', 'Administrator', '', '', '', '', '', '', '', '640f03481a21a.jpg', 'admin', 1),
(14, '2006080053', 'RanoLangari', '', '', '3', '8', 'Ilmu Lingkungan', '0813371845348', 'langarirano@gmail.com', '642f1c5a84bfa.jpg', '2006080053', 2),
(15, '2006080011', '', '', '2000', '', '', 'Ilmu Lingkungan', '', '', '', '2006080011', 2),
(17, '2006080057', 'Dono', 'Laki-Laki', '2016-01-04', '4.00', '8', 'Ilmu Lingkungan', '085552113456', 'donokasinoindro@gmail.com', '640ddbb508e51.jpg', '2006080057', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`),
  ADD KEY `jawaban` (`id_pilihan_jawaban`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `tbl_pilihan_jawaban`
--
ALTER TABLE `tbl_pilihan_jawaban`
  ADD PRIMARY KEY (`id_pilihan`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `tbl_studi_lanjut`
--
ALTER TABLE `tbl_studi_lanjut`
  ADD PRIMARY KEY (`id_studi_lanjut`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1554;

--
-- AUTO_INCREMENT for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_pilihan_jawaban`
--
ALTER TABLE `tbl_pilihan_jawaban`
  MODIFY `id_pilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `tbl_studi_lanjut`
--
ALTER TABLE `tbl_studi_lanjut`
  MODIFY `id_studi_lanjut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2546;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD CONSTRAINT `tbl_jawaban_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `tbl_pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_jawaban_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_jawaban_ibfk_3` FOREIGN KEY (`id_pilihan_jawaban`) REFERENCES `tbl_pilihan_jawaban` (`id_pilihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD CONSTRAINT `tbl_lokasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lokasi_ibfk_2` FOREIGN KEY (`id_pertanyaan`) REFERENCES `tbl_pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pilihan_jawaban`
--
ALTER TABLE `tbl_pilihan_jawaban`
  ADD CONSTRAINT `tbl_pilihan_jawaban_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `tbl_pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_studi_lanjut`
--
ALTER TABLE `tbl_studi_lanjut`
  ADD CONSTRAINT `tbl_studi_lanjut_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_studi_lanjut_ibfk_2` FOREIGN KEY (`id_pertanyaan`) REFERENCES `tbl_pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
