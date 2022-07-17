-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 12:50 AM
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
-- Database: `sbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `caramengatasi`
--

CREATE TABLE `caramengatasi` (
  `idsolusi` varchar(20) CHARACTER SET latin1 NOT NULL,
  `caramengatasi` varchar(1000) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caramengatasi`
--

INSERT INTO `caramengatasi` (`idsolusi`, `caramengatasi`) VALUES
('S1', 'Jangan menggunakan smartphone ketika bermain di cas, terutama saat penggunaan batterai yang berat. Hal ini dapat memberi beban berlebih kepada IC Power.'),
('S2', 'Cara mengatasi touch screen erorr di smartphone android yang paling cepat dan sederhana adalah restart smartphone seperti biasa, kemudian tunggu beberapa detik untuk bisa dihidupkan Kembali.'),
('S3', 'Cara pertama untuk mengatasi masalah smartphone mati total yaitu dengan megisi dayanya terlebih dahulu selama beberapa waktu untuk mengetahui kondisi baterai smartphone. Bila smartphone tidak Kembali menyalah bisa jadi masalahnya ada pada kabel atau adaptornya, sebaiknya coba mengisi daya dengan kabel dan adaptor lain yang satu tipe.'),
('S4', 'Jika Connector charge smartphone kotor,sudah pasti harus dibersihkan terlebih dahulu. Connector kotor ini dapat menyebabkan proses pengisian daya jadi tidak berjalan sama sekali.'),
('S5', 'Flickering yaitu keadaan layar smartphone yang dipadati garis-garis. Garis bergerak dari atas ke dasar maupun menyamping. Untuk mencegah LCD rusak,harus menjauhi panas serta sinar yang berlebihan.'),
('S6', 'Matikan smartphone dengan menekan tombol power selama beberapa saat, setelah smartphone mati, lepas baterai jika smartphone tersebut tidak menggunakan baterai  tanam, dan juga bisa mencabut kartu SIM dan MicroSD. Setelah itu diamkan selama beberapaa saat agar proses restart berjalan maksimal.'),
('S7', 'Dalam kondisi normal baterai yang baru kita isi penuh rata-rata-rata dapat bertahan lebih dari 8 jam dalam pemakaian normal, jika kurang dari 8 jam baterai android cepat kosong dapat dikatakan baterai drop atau bocor. Jika kondisi fisik sudah terlihat menggembung maka bisa dipastikan bahwa baterai telah bocor dan patut untuk diganti. ');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` varchar(20) NOT NULL,
  `gejala` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`idgejala`, `gejala`) VALUES
('G1', 'Smartphone hidup mati sendiri '),
('G10', 'Bug sistem, yang membuat smartphone tidak bisa menyala (hanya getar)'),
('G11', 'Port smartphone kotor'),
('G12', 'Arus listrik tidak stabil '),
('G13', 'Mengubah Isi Script di dalam Folder Sistem'),
('G14', 'Baterai menggembung '),
('G2', 'Tidak bisa menekan menu sesuai keinginan '),
('G3', 'Smartphone tidak bisa dihidupkan sama sekali'),
('G4', 'Tidak bisa di charge '),
('G5', 'LCD blank / hanya cahaya putih '),
('G6', 'Smartphone tiba-tiba restart sendiri dan hanya bisa hidup sampai logo / merek Smartphone'),
('G7', 'Smartphone tiba-tiba mati padahal isi baterai masih ada'),
('G8', 'Smartphone tidak bisa di charger'),
('G9', 'Terdapat garis pada layar');

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `idgejala` varchar(20) CHARACTER SET latin1 NOT NULL,
  `idkerusakan` varchar(20) CHARACTER SET latin1 NOT NULL,
  `idsolusi` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keputusan`
--

INSERT INTO `keputusan` (`idgejala`, `idkerusakan`, `idsolusi`) VALUES
('G2', 'K2', 'S2'),
('G3', 'K3', 'S3'),
('G4', 'K4', 'S4'),
('G5', 'K5', 'S5'),
('G6', 'K6', 'S6'),
('G7', 'K7', 'S7'),
('G8', 'K1', 'S1'),
('G9', 'K2', 'S2'),
('G10', 'K3', 'S3'),
('G11', 'K4', 'S4'),
('G12', 'K5', 'S5'),
('G13', 'K6', 'S6'),
('G1', 'K1', 'S1'),
('G14', 'K7', 'S7');

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `idkerusakan` varchar(20) NOT NULL,
  `namakerusakan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`idkerusakan`, `namakerusakan`) VALUES
('K1', 'IC Power'),
('K2', 'Display/Touch Screen'),
('K3', 'Mati Total'),
('K4', 'Connector Charge'),
('K5', 'Connector LCD'),
('K6', 'Bootlop'),
('K7', 'Baterai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `nama`) VALUES
('U001', 'admin', 'admin', 'admin'),
('12', 'edojahat123', 'edojahat123', 'edo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caramengatasi`
--
ALTER TABLE `caramengatasi`
  ADD PRIMARY KEY (`idsolusi`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD KEY `idgejala` (`idgejala`),
  ADD KEY `idkerusakan` (`idkerusakan`),
  ADD KEY `idsolusi` (`idsolusi`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`idkerusakan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD CONSTRAINT `keputusan_ibfk_1` FOREIGN KEY (`idgejala`) REFERENCES `gejala` (`idgejala`),
  ADD CONSTRAINT `keputusan_ibfk_2` FOREIGN KEY (`idkerusakan`) REFERENCES `kerusakan` (`idkerusakan`),
  ADD CONSTRAINT `keputusan_ibfk_3` FOREIGN KEY (`idsolusi`) REFERENCES `caramengatasi` (`idsolusi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
