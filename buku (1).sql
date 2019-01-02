-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2019 at 01:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelompokc`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` char(10) NOT NULL,
  `judul` varchar(40) NOT NULL,
  `pengarang` varchar(40) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `jenis` enum('komputer','lainnya','','') NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `judul`, `pengarang`, `penerbit`, `jenis`, `level`) VALUES
('001', 'Pemograman web untuk praktisi', 'james renaldi', 'Andi Offset', 'komputer', 'pemula, menengah, mahir'),
('002', 'kecenderungan masyarakat 2018', 'Bison Panggarebu', 'Gramedia', 'lainnya', 'menengah, mahir'),
('003', 'Database MySql dengan Xampp', 'Edward Matta hati', 'Andi Offset', 'komputer', 'pemula, menengah, mahir'),
('004', 'Kepanikan berujung senyuman', 'Lia Anita sari', 'Tiga Serangkai', 'komputer', 'pemula'),
('005', 'matrikulasi image processing', 'Andriana', 'Andi Offset', 'komputer', 'pemula, menengah, mahir'),
('006', 'Trik Menjadi Pengusaha Hebat', 'Roziki ', 'Gramedia', 'komputer', 'menengah, mahir'),
('007', 'Harry potter deathly hallows', 'JK ROWLING', 'Tiga Serangkai', 'lainnya', 'menengah'),
('008', 'Buku Panduan Melukis', 'Leonardo da Vinci', 'Andi Offset', 'lainnya', 'mahir'),
('009', 'Belajar Visual basic', 'Rudi Hartono', 'Gramedia', 'komputer', 'pemula, menengah, mahir'),
('010', 'Cara Membuat Batik', 'Nyonya Meneer', 'Tiga Serangkai', 'lainnya', 'menengah'),
('011', 'Meraih Mimpi', 'Kahitna', 'Gramedia', 'lainnya', 'mahir'),
('012', 'belajar AUTO CAD 2000', 'Sandhika gallih', 'Gramedia', 'komputer', 'pemula');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
