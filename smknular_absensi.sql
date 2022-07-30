-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2022 at 12:39 PM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smknular_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `tgl`, `jam_masuk`, `jam_pulang`, `keterangan`, `id_pegawai`) VALUES
(9, '2022-06-24', '14:10:33', '14:10:43', 'Masuk Telat dan Pulang Awal', 2),
(10, '2022-06-27', '12:02:00', '12:02:10', 'Masuk Telat dan Pulang Awal', 2),
(12, '2022-07-01', '05:58:53', '00:00:00', 'Masuk Awal', 12367),
(13, '2022-07-01', '05:59:22', '00:00:00', 'Masuk Awal', 12359),
(14, '2022-07-01', '06:04:39', '00:00:00', 'Masuk Awal', 12372),
(15, '2022-07-05', '12:37:53', '00:00:00', 'Masuk Telat', 12359),
(16, '2022-07-05', '12:44:04', '00:00:00', 'Masuk Telat', 12368),
(17, '2022-07-05', '16:47:10', '00:00:00', 'Masuk Telat', 12366),
(18, '2022-07-05', '17:02:54', '00:00:00', 'Masuk Telat', 12361),
(26, '2022-07-14', '10:06:13', '00:00:00', 'Masuk Awal', 12359);

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tj_transport` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tj_transport`, `uang_makan`) VALUES
(1, 'Kepala Sekolah', '4000000', '600000', '400000'),
(2, 'Wakil kepala', '2500000', '300000', '200000'),
(3, 'Admin', '2200000', '300000', '200000'),
(4, 'TU', '2500000', '300000', '200000'),
(5, 'Guru', '4000000', '500000', '200000'),
(6, 'Operator Dapodik', '2000000', '100000', '50000'),
(7, 'BP/BK', '2000000', '100000', '50000'),
(8, 'KASIR', '1000000', '100000', '50000'),
(9, 'SATPAM', '1000000', '0', '0'),
(10, 'Kepala TU', '2000000', '100000', '50000'),
(11, 'Kepala Perpustakaan', '2000000', '100000', '50000'),
(12, 'OB', '900000', '0', '0'),
(13, 'Toolman', '1000000', '0', '0'),
(14, 'KA PRODI', '1000000', '100000', '50000'),
(15, 'Bendahara', '1000000', '100000', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_kehadiran` int(200) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `nik` int(16) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_kehadiran`, `bulan`, `nik`, `nama_pegawai`, `jenis_kelamin`, `nama_jabatan`, `hadir`, `sakit`, `alpha`) VALUES
(41, '062022', 4321, 'bendahara', 'Laki-Laki', 'Bendahara', 2, 3, 0),
(42, '062022', 1123, 'geral', 'Laki-Laki', 'Admin', 2, 0, 0),
(43, '062022', 124, 'susi', 'Perempuan', 'TU', 2, 0, 0),
(49, '062022', 1111, 'rahma', 'Perempuan', 'Guru', 2, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` int(16) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(32) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `username`, `password`, `jenis_kelamin`, `jabatan`, `no_rekening`, `tanggal_masuk`, `status`, `photo`, `hak_akses`) VALUES
(12359, 12345, 'tetem taemin', 'tetem', '202cb962ac59075b964b07152d234b70', 'Laki-Laki', 'OB', '1234567 BCA', '2017-03-12', 'Karyawan Tetap', 'pegawai-220701-2e1a2d317a.jpg', 2),
(12360, 19040094, 'Arvella', 'arvella', '81dc9bdb52d04dc20036dbd8313ed055', 'Perempuan', 'Admin', '140900 CIMB', '2017-04-12', 'Karyawan Tetap', 'pegawai-220701-8c36d5bf8c.jpg', 1),
(12361, 135887, 'H. HARUN, SE,.M.M.Pd', 'harun', '81dc9bdb52d04dc20036dbd8313ed055', 'Laki-Laki', 'Kepala Sekolah', '129090 BCA', '2016-07-19', 'Karyawan Tetap', 'pegawai-220701-904ae8cda5.jpg', 2),
(12362, 19050, 'Dra. Hj. SITI JAMILAH', 'jamilah', '81dc9bdb52d04dc20036dbd8313ed055', 'Perempuan', 'Wakil kepala', '90080 BCA', '2017-07-01', 'Karyawan Tetap', 'pegawai-220701-a64d57aa92.jpg', 2),
(12363, 19050, 'SUDARYONO, S. Ag', 'sudaryono', '81dc9bdb52d04dc20036dbd8313ed055', 'Perempuan', 'Guru', '129099 BCA', '2017-07-01', 'Karyawan Tidak Tetap', 'pegawai-220701-8b2a3e9d30.jpg', 2),
(12364, 19030, 'AHMAD ROZI, S.Pd', 'rozi', '81dc9bdb52d04dc20036dbd8313ed055', 'Laki-Laki', 'Guru', '129098 BCA', '2017-07-01', 'Karyawan Tidak Tetap', 'pegawai-220701-4c3233a073.jpg', 2),
(12365, 19044, 'ROJULI, S. Pd', 'rojuli', '81dc9bdb52d04dc20036dbd8313ed055', 'Laki-Laki', 'Guru', '140988 BCA', '2017-07-04', 'Karyawan Tetap', 'pegawai-220701-e805d4c5ab.jpg', 2),
(12366, 190340, 'INAYAH, S. Psi', 'inayah', '81dc9bdb52d04dc20036dbd8313ed055', 'Perempuan', 'BP/BK', '129999 BCA', '2017-07-07', 'Karyawan Tetap', 'pegawai-220701-2d6eea9e99.jpg', 2),
(12367, 19856, 'KHULAESOH, S.pd.', 'khulaesoh', '81dc9bdb52d04dc20036dbd8313ed055', 'Perempuan', 'BP/BK', '128888 BCA', '2017-07-17', 'Karyawan Tidak Tetap', 'pegawai-220701-eb7f5ce1cc.jpg', 2),
(12368, 146533, 'ISTIANAWATI, Shi, Spd.', 'istiana', '81dc9bdb52d04dc20036dbd8313ed055', 'Perempuan', 'BP/BK', '140977 BCA', '2017-07-01', 'Karyawan Tidak Tetap', 'pegawai-220701-5612b5f332.jpg', 2),
(12369, 15672, 'HARTATI, SE.', 'hartati', '81dc9bdb52d04dc20036dbd8313ed055', 'Perempuan', 'Kepala TU', '7890442 BCA', '2017-07-01', 'Karyawan Tetap', 'pegawai-220701-125a3ee3dc.jpg', 2),
(12370, 176534, 'SATRIO', 'satrio', '81dc9bdb52d04dc20036dbd8313ed055', 'Laki-Laki', 'TU', '128777 BCA', '2017-08-01', 'Karyawan Tidak Tetap', 'pegawai-220701-d719d8b61d.jpg', 2),
(12371, 134556, 'RAFIQ SIDQI', 'rafiq', '81dc9bdb52d04dc20036dbd8313ed055', 'Laki-Laki', 'Toolman', '129078 BCA', '2017-07-01', 'Karyawan Tidak Tetap', 'pegawai-220701-ce01740aee.jpg', 1),
(12372, 55678, 'Fairuz', 'fairuz', '81dc9bdb52d04dc20036dbd8313ed055', 'Laki-Laki', 'Admin', '66677785 BCA', '2017-07-12', 'Karyawan Tidak Tetap', 'pegawai-220701-45c19c670c.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'pegawai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id` int(128) NOT NULL,
  `nik` int(128) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(128) NOT NULL,
  `konfirmasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`id`, `nik`, `tanggal`, `keterangan`, `konfirmasi`) VALUES
(1, 1111, '2022-06-29', 'Sakit', 'Diizinkan'),
(2, 55678, '2022-07-01', 'sariawan bibir pecah pecah panas dalam', 'Diizinkan'),
(3, 12345, '2022-07-14', 'Sakit', 'Belum Dikonfirmasi'),
(4, 135887, '2022-07-20', 'ke abudabi', 'Belum Dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` tinyint(1) NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `start`, `finish`, `keterangan`) VALUES
(1, '09:00:00', '11:00:00', 'Masuk'),
(2, '09:00:00', '11:00:00', 'Pulang');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama`, `longitude`, `latitude`) VALUES
(1, 'Poltek', '109.1072801574728', '-6.868490717375114');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_kehadiran` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12373;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
