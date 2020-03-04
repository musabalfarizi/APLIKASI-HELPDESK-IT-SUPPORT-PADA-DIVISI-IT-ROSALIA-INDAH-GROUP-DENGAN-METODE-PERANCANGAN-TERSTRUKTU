-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2015 at 03:46 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `magama`
--

CREATE TABLE IF NOT EXISTS `magama` (
`id_agama` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mjeniswo`
--

CREATE TABLE IF NOT EXISTS `mjeniswo` (
`id_jeniswo` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mkaryawan`
--

CREATE TABLE IF NOT EXISTS `mkaryawan` (
`id_karyawan` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempatlahir` varchar(100) NOT NULL,
  `tgllahir` date NOT NULL,
  `kelamin` enum('P','W') NOT NULL,
  `id_agama` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `tglmasuk` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msoftware`
--

CREATE TABLE IF NOT EXISTS `msoftware` (
`id_software` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mstatus`
--

CREATE TABLE IF NOT EXISTS `mstatus` (
`id_status` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tlevel`
--

CREATE TABLE IF NOT EXISTS `tlevel` (
`id_level` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `entity` varchar(25) NOT NULL,
  `limit` smallint(6) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `issuper` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE IF NOT EXISTS `tuser` (
`id_user` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `namafull` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `entity` varchar(25) NOT NULL,
  `host` varchar(50) NOT NULL,
  `lastin` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `lastout` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `aktif` tinyint(1) NOT NULL,
  `id_level` int(11) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xcontactus`
--

CREATE TABLE IF NOT EXISTS `xcontactus` (
`id_contact` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `terbaca` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xorder`
--

CREATE TABLE IF NOT EXISTS `xorder` (
`id_order` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `tgl` date NOT NULL,
  `pemesan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `company` varchar(100) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `id_jeniswo` int(11) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `id_status` int(11) NOT NULL,
  `read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xorderpro`
--

CREATE TABLE IF NOT EXISTS `xorderpro` (
`id_orderpro` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `tgl` date NOT NULL,
  `pemesan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `company` varchar(100) NOT NULL,
  `software` varchar(100) NOT NULL,
  `request` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `id_status` int(11) NOT NULL,
  `terbaca` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `magama`
--
ALTER TABLE `magama`
 ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `mjeniswo`
--
ALTER TABLE `mjeniswo`
 ADD PRIMARY KEY (`id_jeniswo`);

--
-- Indexes for table `mkaryawan`
--
ALTER TABLE `mkaryawan`
 ADD PRIMARY KEY (`id_karyawan`), ADD KEY `id_agama` (`id_agama`);

--
-- Indexes for table `msoftware`
--
ALTER TABLE `msoftware`
 ADD PRIMARY KEY (`id_software`);

--
-- Indexes for table `mstatus`
--
ALTER TABLE `mstatus`
 ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tlevel`
--
ALTER TABLE `tlevel`
 ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `xcontactus`
--
ALTER TABLE `xcontactus`
 ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `xorder`
--
ALTER TABLE `xorder`
 ADD PRIMARY KEY (`id_order`), ADD KEY `id_jeniswo` (`id_jeniswo`,`id_status`);

--
-- Indexes for table `xorderpro`
--
ALTER TABLE `xorderpro`
 ADD PRIMARY KEY (`id_orderpro`), ADD KEY `id_status` (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `magama`
--
ALTER TABLE `magama`
MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mjeniswo`
--
ALTER TABLE `mjeniswo`
MODIFY `id_jeniswo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mkaryawan`
--
ALTER TABLE `mkaryawan`
MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `msoftware`
--
ALTER TABLE `msoftware`
MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mstatus`
--
ALTER TABLE `mstatus`
MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tlevel`
--
ALTER TABLE `tlevel`
MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `xcontactus`
--
ALTER TABLE `xcontactus`
MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `xorder`
--
ALTER TABLE `xorder`
MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `xorderpro`
--
ALTER TABLE `xorderpro`
MODIFY `id_orderpro` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
