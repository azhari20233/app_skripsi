-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 10:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_bkad`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(9) NOT NULL,
  `tgl` date NOT NULL,
  `bulan` varchar(22) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_pg` int(9) NOT NULL,
  `hadir` varchar(11) NOT NULL,
  `sakit` varchar(11) NOT NULL,
  `izin` varchar(11) NOT NULL,
  `tanpa_ket` varchar(11) NOT NULL,
  `tgl_sakit` varchar(25) NOT NULL,
  `tgl_ijin` varchar(25) NOT NULL,
  `tgl_tk` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `tgl`, `bulan`, `tahun`, `id_pg`, `hadir`, `sakit`, `izin`, `tanpa_ket`, `tgl_sakit`, `tgl_ijin`, `tgl_tk`) VALUES
(4, '2023-02-03', 'Januari', 2023, 4, '30', '1', '2', '0', '12', '22 & 23', '-'),
(5, '2023-02-03', 'Januari', 2023, 1, '31', '0', '0', '0', '-', '-', '-'),
(6, '2023-02-03', 'Januari', 2023, 3, '30', '0', '1', '0', '-', '20', '-'),
(7, '2023-02-03', 'Januari', 2023, 2, '30', '0', '1', '0', '-', '11', '-'),
(8, '2023-02-03', 'Januari', 2023, 5, '31', '0', '0', '0', '-', '-', '-'),
(9, '0000-00-00', '$bulan', 0000, 0, '$hadir', '$sakit', '$izin', '$tanpa_ket', '$tgl_sakit', '$tgl_ijin', '$tgl_tk'),
(11, '2023-07-09', 'Januari', 2023, 14, '30', '0', '0', '0', '-', '-', '-'),
(12, '2023-07-02', 'Februari', 2023, 13, '25', '2', '1', '2', '10-11', '15', '20-21'),
(13, '2023-07-09', 'Maret', 2023, 18, '30', '0', '0', '0', '-', '-', '-'),
(14, '2023-07-09', 'April', 2023, 20, '27', '0', '3', '0', '-', '10-11-12', '-'),
(15, '2023-07-09', 'Mei', 2023, 15, '30', '0', '0', '0', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `absen_pegawai`
--

CREATE TABLE `absen_pegawai` (
  `id` int(11) NOT NULL,
  `id_pg` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `absen` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen_pegawai`
--

INSERT INTO `absen_pegawai` (`id`, `id_pg`, `tanggal`, `absen`) VALUES
(1, 12, '2023-08-12', 1),
(2, 13, '2023-07-14', 1),
(3, 12, '2023-07-13', 1),
(5, 12, '2023-07-14', 1),
(6, 13, '2023-07-15', 1),
(7, 12, '2023-07-15', 1),
(8, 12, '2023-07-16', 1),
(9, 26, '2023-07-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(9) NOT NULL,
  `id_pg` int(9) NOT NULL,
  `tgl_aw` date NOT NULL,
  `tgl_ak` date NOT NULL,
  `lama_cuti` varchar(5) NOT NULL,
  `keterangan` varchar(199) NOT NULL,
  `ket_cuti` varchar(210) NOT NULL,
  `no_cuti` varchar(11) NOT NULL,
  `status_cuti` varchar(55) NOT NULL,
  `file_cuti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_pg`, `tgl_aw`, `tgl_ak`, `lama_cuti`, `keterangan`, `ket_cuti`, `no_cuti`, `status_cuti`, `file_cuti`) VALUES
(3, 1, '2023-01-02', '2023-01-09', '7', 'Opname Dirumah Sakit', 'Di Izinkan', '2881', 'Disetujui Atasan', '9923Muhammad.Azhari.Surat.Magang.PDF'),
(4, 4, '2023-02-01', '2023-02-08', '8', 'Opname Dirumah Sakit', 'Surat Sedang Di Proses Atasan', '8305', 'Surat Sedang Diproses Atasan', '2216pengantar.pdf'),
(5, 3, '2023-02-03', '2023-02-06', '3', 'Acara Pernikahan Keluarga', 'Surat Sedang Di Proses Atasan', '2093', 'Surat Sedang Diproses Atasan', '3791pengantar.pdf'),
(6, 2, '2023-02-06', '2023-02-09', '4', 'Sakit', 'Surat Sedang Di Proses Atasan', '5940', 'Surat Sedang Diproses Atasan', '2551pengantar.pdf'),
(7, 13, '2023-02-06', '2023-02-11', '6', 'Opname Dirumah Sakit', 'Surat Sedang Di Proses Atasan', '3241', 'Surat Sedang Diproses Atasan', '8074pengantar.pdf'),
(8, 12, '2023-07-10', '2023-07-14', '5', 'acara keluarga', 'Surat Sedang Di Proses Atasan', '7997', 'Surat Sedang Diproses Atasan', '4942surat.cuti.pegawai.docx'),
(10, 12, '2023-07-16', '2023-07-16', '30', 'acara keluarga 2', 'Surat Sedang Di Proses Atasan', '9355', 'Surat Sedang Diproses Atasan', '5813HASIL.SEMINAR.PROPOSAL.19630606.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(9) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `no_slip` varchar(12) NOT NULL,
  `bulan` varchar(12) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_absensi` int(9) NOT NULL,
  `gaji_bersih` varchar(11) NOT NULL,
  `gajipok` varchar(11) NOT NULL,
  `tunjangan` varchar(11) NOT NULL,
  `potongan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `tgl_gaji`, `no_slip`, `bulan`, `tahun`, `id_absensi`, `gaji_bersih`, `gajipok`, `tunjangan`, `potongan`) VALUES
(24, '2022-12-31', '9o6R41047T', 'Januari', 2022, 4, '4500000', '2500000', '2000000', '0'),
(25, '2023-02-03', 'B1LgbbK9dp', 'Februari', 2023, 5, '4500000', '1500000', '2500000', '0'),
(26, '2023-02-03', 'V5zCTNyiKy', 'Maret', 2023, 7, '2850000', '1200000', '1200000', '0'),
(27, '2023-02-03', '3q52lrXslk', 'Januari', 2023, 6, '23450000', '3000000', '20000000', '0'),
(28, '2023-02-03', '2ymzkye8t9', 'Januari', 2023, 8, '3900000', '1200000', '2200000', '0'),
(29, '2023-07-02', 'MScQxYSJS0', 'Februari', 2023, 12, '16000000', '4500000', '10000000', '300000'),
(30, '2023-07-02', 'tkSrFFVC8p', 'Januari', 2023, 11, '11500000', '3000000', '7500000', '0'),
(31, '2023-07-09', 'ISu0dQNsxu', 'Maret', 2023, 13, '3000000', '2000000', '1000000', '0'),
(32, '2023-07-09', 'Ke48kRqbKk', 'April', 2023, 14, '3000000', '2000000', '1000000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(9) NOT NULL,
  `nama_jabatan` varchar(85) NOT NULL,
  `gajipok` varchar(13) NOT NULL,
  `tunjangan` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gajipok`, `tunjangan`) VALUES
(4, 'Sekretaris', '4500000', '10000000'),
(7, 'Kepala Badan Keuangan dan Aset Daerah Kabupaten Tapin', '5000000', '20000000'),
(8, 'Staff', '2000000', '1000000'),
(9, 'Sub Bagian Umum & Kepegawaian', '3000000', '7500000'),
(10, 'Sub Bagian Keuangan', '3000000', '7500000'),
(11, 'Sub Bagian Perencanaan & Pelaporan', '3000000', '7500000'),
(12, 'Kabid Anggaran', '3000000', '6500000'),
(13, 'Kabid Perbendaharaan', '3000000', '6500000'),
(14, 'Kabid Akuntansi dan Pelaporan', '3000000', '6500000'),
(15, 'Kabid Pengelolaan Barang Milik Daerah', '3000000', '6500000'),
(16, 'Kasubid Anggaran I', '2500000', '5000000'),
(17, 'Kasubid Anggaran II', '2500000', '5000000'),
(18, 'Kasubid Pembendaharaan I', '2500000', '5000000'),
(19, 'Kasubid Pembendaharaan II', '2500000', '5000000'),
(20, 'Kasubid Pembukuan', '2500000', '5000000'),
(21, 'Kasubid Pelaporan  Keuangan', '2500000', '5000000'),
(22, 'Kasubid Penata Usahaan', '2500000', '5000000'),
(23, 'Kasubid Pemeliharaan & Pengamanan', '2500000', '5000000');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `lokasi_kegiatan` varchar(255) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `waktu_kegiatan` time NOT NULL,
  `tujuan_kegiatan` varchar(255) NOT NULL,
  `nip` varchar(55) NOT NULL,
  `no_surat` varchar(10) NOT NULL,
  `ket_kegiatan` varchar(55) NOT NULL,
  `status_kegiatan` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `lokasi_kegiatan`, `tgl_kegiatan`, `waktu_kegiatan`, `tujuan_kegiatan`, `nip`, `no_surat`, `ket_kegiatan`, `status_kegiatan`) VALUES
(1, 'Monitoring Pemograman', 'Kantor Gubernur Kalimantan Selatan', '2023-01-02', '09:00:00', 'Evaluasi', '197006161990031002', '0995', 'Surat Telah Diterima dan Disetujui', 'Disetujui Atasan'),
(2, 'Sosialisasi dan ekspose', 'Tapin Utara', '2022-09-05', '15:33:00', 'Sosialisasi', '19625367231', '4566', 'Surat Sedang Di Proses Atasan', 'Surat Sedang Diproses Atasan'),
(3, 'Rapat KUA PPAS Perubahan', '', '2022-08-06', '14:58:00', 'Rapat KUA', '19780530 2006', '5636', 'Surat Sedang Di Proses Atasan', 'Surat Sedang Diproses Atasan'),
(4, 'Monitoring Evaluasi Pengendalian Dan Pelaporan Pelaksanaan', 'Tapin Utara', '2022-11-17', '09:30:00', 'Evaluasi', '198745218 021', '0953', 'Surat Sedang Di Proses Atasan', 'Surat Sedang Diproses Atasan'),
(5, 'Acara Peresmian Gedung Baru', 'Tapin Utara', '2022-02-09', '10:00:00', 'Perkenalan Gedung Baru', '1124354542334', '9501', 'Surat Sedang Di Proses Atasan', 'Surat Sedang Diproses Atasan');

-- --------------------------------------------------------

--
-- Table structure for table `kenaikan_jabatan`
--

CREATE TABLE `kenaikan_jabatan` (
  `id_kenaikan` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `jabatan_baru` varchar(255) NOT NULL,
  `golongan_baru` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kenaikan_jabatan`
--

INSERT INTO `kenaikan_jabatan` (`id_kenaikan`, `nip`, `bidang`, `jabatan_baru`, `golongan_baru`) VALUES
(1, '197006161990031002', 'anggaran', 'staff', 'eselon IIA'),
(5, '197406262005011005', 'asd', 'ads', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` int(9) NOT NULL,
  `tgl_m` date NOT NULL,
  `id_pg` int(9) NOT NULL,
  `no_sk` varchar(55) NOT NULL,
  `tgl_sk` date NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `new_jabatan` varchar(55) NOT NULL,
  `ket_mutasi` varchar(155) NOT NULL,
  `file_p` varchar(200) NOT NULL,
  `status_mutasi` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `tgl_m`, `id_pg`, `no_sk`, `tgl_sk`, `tujuan`, `new_jabatan`, `ket_mutasi`, `file_p`, `status_mutasi`) VALUES
(19, '2023-01-01', 3, 'no./2/SK/M/2022', '2023-01-02', 'Diskominfo Banjarbaru', 'Sekretaris', 'Surat Disetujui', '2069Muhammad.Azhari.Surat.Magang.PDF', 'Disetujui Atasan'),
(20, '2023-02-03', 4, 'no./2/SK/M/2022', '2023-02-03', 'Mutasi Jabatan', 'Kepala Bidang Akuntansi Dan Pelaporan', 'Sedang Diproses Atasan', '5743mutasi.pdf', 'Sedang Diproses Atasan'),
(21, '2023-02-03', 1, 'no./2/SK/M/2022', '2023-02-03', 'Mutasi Jabatan', 'Kepala Bidang Pengelolaan Barang Milik Daerah', 'Sedang Diproses Atasan', '2029mutasi.pdf', 'Sedang Diproses Atasan'),
(22, '2023-02-03', 2, 'no./2/SK/M/2022', '2023-02-06', 'Diskominfo Banjarbaru', 'Sekretaris', 'Sedang Diproses Atasan', '7571mutasi.pdf', 'Sedang Diproses Atasan'),
(23, '2023-02-03', 5, 'no./2/SK/M/2022', '2023-02-06', 'BADAN KEUANGAN DAN ASET DAERAH KABUPATEN TAPIN', 'Kepala Sub Bagian Keuangan', 'Sedang Diproses Atasan', '4549mutasi.pdf', 'Sedang Diproses Atasan'),
(24, '2023-07-09', 17, '101/2023/BKAD', '2023-07-03', 'Kantor Koni Tapin', 'Staff', 'Sedang Diproses Atasan', '6471surat.mutasi.pegawai.docx', 'Sedang Diproses Atasan');

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` int(11) NOT NULL,
  `id_pg` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `id_pg`, `username`, `password`, `level`) VALUES
(1, NULL, 'admin', 'admin', 'admin'),
(2, NULL, 'atasan', 'atasan', 'atasan'),
(3, 12, 'pegawai', 'pegawai', 'pegawai'),
(4, 13, 'pegawai2', 'pegawai', 'pegawai'),
(8, 26, '197406042009041333', '197406042009041333', 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `id_pg` int(9) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama_lengkap` varchar(120) NOT NULL,
  `id_jabatan` int(9) NOT NULL,
  `jenis_kelamin` varchar(35) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tempat_lahir` varchar(120) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_rumah` varchar(200) NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `file_foto` varchar(255) DEFAULT NULL,
  `pegawai` enum('asn','non asn') NOT NULL,
  `golongan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pegawai`
--

INSERT INTO `t_pegawai` (`id_pg`, `nip`, `nama_lengkap`, `id_jabatan`, `jenis_kelamin`, `agama`, `status`, `tempat_lahir`, `tanggal_lahir`, `alamat_rumah`, `no_telpon`, `file_foto`, `pegawai`, `golongan`) VALUES
(12, '197006161990031002', 'DR. H. SUFIANSYAH, M.AP', 7, 'Laki-laki', 'Islam', 'KAWIN', 'Banjarmasin', '1975-06-10', 'Jl.Pembangunan', '08524767654', '8541kaban.PNG', 'asn', ''),
(13, '197406262005011005', 'HARIS FADHILAH, SE, MM', 4, 'Laki-laki', 'Islam', 'KAWIN', 'Banua Halat', '1978-01-10', 'Jl.Penghulu', '0813478976', '3740sekretaris.PNG', 'asn', ''),
(14, '197406042009041003', 'ABDUL RAZAK, S.KOM', 9, 'Laki-laki', 'Islam', 'KAWIN', 'Rantau', '1970-03-05', 'Jl.Rangda Malingkung', '08124765871', '1539pa.razak.PNG', 'asn', ''),
(15, '199408152020122005', 'RIDA AHYANI, SE', 8, 'Perempuan', 'Islam', 'KAWIN', 'Martapura', '1982-02-01', 'Jl.Haur Kuning', '085234786577', '7150rida.PNG', 'asn', ''),
(16, '199406152020122014', 'FITRI NORKOMARIAHYUSTIN, S.Ak', 8, 'Perempuan', 'Islam', 'KAWIN', 'Kandangan', '1993-08-11', 'Jl.Lokpaikat', '085298832169', '1511yustin.PNG', 'asn', ''),
(17, '199709202020121007', 'MUHAMMAD ZAINI, A.Md.Ak', 8, 'Laki-laki', 'Islam', 'BELUM KAWIN', 'Banjarmasin', '1994-06-09', 'Jl.Kesehatan', '08136558972', '4788zai.PNG', 'asn', ''),
(21, '197609032000121006', 'ZAINAL ABIDIN, SKM', 17, 'Laki-laki', 'Islam', 'KAWIN', 'Rantau', '1977-11-09', 'Jl.Mtq', '08525677412', '6731pa.zainal.PNG', 'asn', ''),
(26, '197406042009041333', 'Imam SP', 7, 'Laki-laki', 'Islam', 'BELUM KAWIN', 'Banjarmasin', '2023-07-16', 'Banjarmasin', '2323323232323', '2841afifah.PNG', 'asn', '12');

-- --------------------------------------------------------

--
-- Table structure for table `t_pensiun`
--

CREATE TABLE `t_pensiun` (
  `id_pensiun` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_pensiun` date NOT NULL,
  `alamat_pensiun` text NOT NULL,
  `pangkat_gol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pensiun`
--

INSERT INTO `t_pensiun` (`id_pensiun`, `nip`, `no_surat`, `tgl_surat`, `tgl_pensiun`, `alamat_pensiun`, `pangkat_gol`) VALUES
(3, '197006161990031002', '22', '2023-06-30', '2022-06-30', '22', '22'),
(4, '197006161990031002', '222', '2023-06-20', '2023-06-21', '22', '222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_pegawai` (`id_pg`);

--
-- Indexes for table `absen_pegawai`
--
ALTER TABLE `absen_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `id_pg` (`id_pg`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `kenaikan_jabatan`
--
ALTER TABLE `kenaikan_jabatan`
  ADD PRIMARY KEY (`id_kenaikan`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`),
  ADD KEY `id_pg` (`id_pg`,`new_jabatan`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`id_pg`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `t_pensiun`
--
ALTER TABLE `t_pensiun`
  ADD PRIMARY KEY (`id_pensiun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `absen_pegawai`
--
ALTER TABLE `absen_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kenaikan_jabatan`
--
ALTER TABLE `kenaikan_jabatan`
  MODIFY `id_kenaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id_pg` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `t_pensiun`
--
ALTER TABLE `t_pensiun`
  MODIFY `id_pensiun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
