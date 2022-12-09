-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 04:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisteminformasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `kd_user` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `Kota` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `tahun_ajaran` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`kd_user`, `nama`, `nis`, `jenis_kelamin`, `Kota`, `tanggal_lahir`, `kelas`, `semester`, `tahun_ajaran`, `gambar`) VALUES
(20, 'saipul anwar', '200631100121', '', 'Bangkalan', '2017-01-11', '12', 2, '2020', '6390705f5b942.jpg'),
(19, 'rofiqoh', '200631100122', '', 'Lamongan', '2010-01-20', '12', 1, '2020', '6390701e76ff2.jpg'),
(18, 'hafid zain', '200631100123', '', 'Pamekasan', '2015-01-21', '11', 1, '2020', '63906fd40f254.jpg'),
(17, 'adimas', '200631100124', '', 'Sidoarjo', '2015-01-14', '11', 1, '2020', '63906f7b570e3.jpg'),
(16, 'Fikri ', '200631100125', '', 'Bangkalan', '2002-01-23', '10', 1, '2020', '63906eaae067d.jpg'),
(1, 'abdurrahman al khoodhy', '200631100126', 'laki laki', 'Mojokerto', '2022-11-01', '10', 2, '2022', 'al.jpg'),
(21, 'Tri Sumiati', '200631100130', '', 'Pamekasan', '2018-01-09', '10', 1, '2020', '6390771b32f67.jpg'),
(22, 'risma', '200631100231', '', 'Bangkalan', '2012-12-12', '10', 1, '2020', '6390775148ac9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `db_pengumuman`
--

CREATE TABLE `db_pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` mediumtext NOT NULL,
  `file` varchar(50) DEFAULT NULL,
  `tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_pengumuman`
--

INSERT INTO `db_pengumuman` (`id`, `judul`, `keterangan`, `file`, `tipe`) VALUES
(1, 'Pengumuman jadwal masuk semester ganjil tahun ajaran 2023/2024', 'Dengan hormat,\r\nKami memberitahukan bahwa kegiatan pembelajaran semester ganjil tahun ajaran 2023/2024 akan dimulai dengan diadakannya pembelajaran secara tatap muka (face to face) antara siswa dan guru MA As-Salam Bangkalan. Sehubungan dengan itu, kami ingin memberitahukan beberapa hal berikut ini :\r\na.	Pembelajaran semester ganjil tahun ajaran 2023/2024 akan dimulai pada tanggal 10 Juli 2023.\r\nb.	Siswa diharapkan untuk membayar uang SPP di awal semester.\r\nc.	Siswa menyertakan surat keterangan sehat sebagai bukti bahwa mengikuti pembelajaran semester ganjil secara sehat dan tidak berada dalam pengaruh atau efek dari Virus Covid-19.\r\n\r\nKami harap siswa dapat memahami pengumuman yang sudah pihak sekolah buat demi kelancaran mekanisme pembelajaran pada sesmester ganjil tahun ajaran 2023/2024. Atas perhatiannya, kami ucapkan terima kasih.\r\n', NULL, 'p-jadwal'),
(2, 'Penerimaan siswa baru', 'PPDB adalah singkatan dari Penerimaan Peserta Didik Baru. PPDB online adalah sebuah sistem yang dirancang sebagai sumber atau pusat informasi dan pengelolaan proses selesksi penerimaan siswa baru jenjang TK, SD, SMP, SMA dan SMK ataupun sederajat. Mulai dari proses pendaftaran, proses seleksi sampai dengan pengumuman hasil selesksi berbasis Tekonologi Informasi dan Komunikasi dilakukan secara online.\r\n\r\nSeperti halnya dengan sekolah lainnya yang ada di Jawa Timur, MA As-Salam Bangkalan juga melaksanakan PPDB online. Berdasarkan hasil rapat koordinasi dengan pimpinan MA As-Salam Bangakalan, ditetapkan jadwal pendaftaran PPDB tahun ajaran 2023/2024 dapat dilihat pada link berikut:\r\n', 'pengumuman1.pdf', 'p-ppdb'),
(3, 'Pengumuman Pembayaran', 'SPP adalah Sumbangan Pembinaan Pendidikan yang dibebankan kepada siswa untuk membantu lembaga pendidikan memperlancar proses belajar mengajar. Setiap siswa yang menjalani pendidikan dari tingkat taman kanak-kanak sampai pergurusn tinggi, baik yang dikelola pemerintah ataupun swasta. Namun, hal ini tidak berlaku bagi mereka yang berpredikat khusus. Siswa yang bebas dari kewajiban membayar SPP lazimnya adalah mereka yang secara ekonomi tidak mampu ataupun siswa berprestasi.\r\n\r\nDengan demikian, setiap siswa diwajibkan untuk melunasi pembayaran SPP sesuai dengan nominal yang telah ditetapkan. Dan dihimbau untuk siswa yang memiliki tagihan SPP di semester lalu untuk segera melunasi tagihan SPP tersebut bersamaan dengan batas waktu pembayaran SPP di semester ini.\r\n', NULL, 'p-pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `level_user`) VALUES
(1, 'admin', '123', 'admin'),
(16, 'fikri', '321', 'siswa'),
(17, 'adimas', '321', 'siswa'),
(18, 'hafidz', '321', 'siswa'),
(19, 'fiqoh', '231', 'siswa'),
(20, 'anwar', '132', 'siswa'),
(21, 'mia', '123', 'siswa'),
(22, 'risma', '123', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id` int(11) NOT NULL,
  `kd_siswa` varchar(50) NOT NULL,
  `jenis_pembayaran` varchar(10) DEFAULT NULL,
  `tagihan` varchar(20) NOT NULL,
  `tgl_tagihan` date NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id`, `kd_siswa`, `jenis_pembayaran`, `tagihan`, `tgl_tagihan`, `tgl_pembayaran`, `status`, `bukti`) VALUES
(24, '200631100125', '', '250000', '2002-01-23', '0000-00-00', 'belum', ''),
(25, '200631100124', '', '300000', '2015-01-14', '0000-00-00', 'belum', ''),
(26, '200631100123', '', '300000', '2015-01-21', '0000-00-00', 'belum', ''),
(27, '200631100122', '', '400000', '2010-01-20', '0000-00-00', 'belum', ''),
(28, '200631100121', '', '400000', '2017-01-11', '0000-00-00', 'belum', ''),
(29, '200631100125', NULL, '250000', '2022-10-03', '0000-00-00', 'belum', ''),
(30, '200631100123', NULL, '300000', '2022-10-03', '0000-00-00', 'belum', ''),
(31, '200631100121', NULL, '400000', '2022-10-03', '0000-00-00', 'belum', ''),
(32, '200631100130', '', '250000', '2018-01-09', '0000-00-00', 'belum', ''),
(33, '200631100231', '', '250000', '2012-12-12', '0000-00-00', 'belum', ''),
(34, '200631100125', NULL, '25000', '2022-11-07', '0000-00-00', 'belum', ''),
(35, '200631100125', NULL, '250000', '2022-12-01', '0000-00-00', 'belum', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kd_user` (`kd_user`);

--
-- Indexes for table `db_pengumuman`
--
ALTER TABLE `db_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_siswa` (`kd_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_pengumuman`
--
ALTER TABLE `db_pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_user`
--
ALTER TABLE `data_user`
  ADD CONSTRAINT `data_user_ibfk_1` FOREIGN KEY (`kd_user`) REFERENCES `login` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `spp_ibfk_1` FOREIGN KEY (`kd_siswa`) REFERENCES `data_user` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
