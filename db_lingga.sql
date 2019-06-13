-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2019 at 04:44 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lingga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblknowledge`
--

CREATE TABLE `tblknowledge` (
  `id` int(11) NOT NULL,
  `knowledge_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblknowledge`
--

INSERT INTO `tblknowledge` (`id`, `knowledge_name`) VALUES
(1, 'Website Universitas'),
(2, 'Website Pendaftaran'),
(3, 'Website Fakultas'),
(4, 'Website USM Online'),
(5, 'Website Ujian Online');

-- --------------------------------------------------------

--
-- Table structure for table `tblknowledge_child`
--

CREATE TABLE `tblknowledge_child` (
  `id` int(11) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `parrent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblknowledge_child`
--

INSERT INTO `tblknowledge_child` (`id`, `child_name`, `parrent`) VALUES
(16, 'Daftar', 2),
(17, 'FASILKOM', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblknowledge_content`
--

CREATE TABLE `tblknowledge_content` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `info_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblknowledge_content`
--

INSERT INTO `tblknowledge_content` (`id`, `content`, `info_id`) VALUES
(2, '1. kunjungin web.\r\n2. isi form.\r\n3. done.', 1),
(6, 'Satu\r\nDua\r\nTiga', 5),
(7, '1. dibelakang\r\n2. gedung rc', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tblknowledge_info`
--

CREATE TABLE `tblknowledge_info` (
  `id` int(11) NOT NULL,
  `info_name` varchar(100) NOT NULL,
  `child_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblknowledge_info`
--

INSERT INTO `tblknowledge_info` (`id`, `info_name`, `child_id`) VALUES
(1, 'Daftar Online', 16),
(5, 'Daftar Offline', 16),
(6, 'Letak Fasilkom', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `pass`, `full_name`, `level`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(2, 'user1', 'user1', 'User 1', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `knowledge_parent_id` int(11) DEFAULT NULL,
  `knowledge_parent_name` varchar(100) DEFAULT NULL,
  `knowledge_child_id` int(11) DEFAULT NULL,
  `knowledge_child_name` varchar(100) DEFAULT NULL,
  `info_name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `tgl_request` varchar(30) NOT NULL,
  `tgl_accept` varchar(30) DEFAULT NULL,
  `status_req` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`id`, `user`, `knowledge_parent_id`, `knowledge_parent_name`, `knowledge_child_id`, `knowledge_child_name`, `info_name`, `content`, `tgl_request`, `tgl_accept`, `status_req`) VALUES
(1, 2, NULL, 'Test Kecor1', NULL, 'Kecor1', 'qwert1', 'test1\r\ntest1\r\ntest1', '12-06-2019', NULL, '1'),
(2, 2, 6, NULL, NULL, 'Kecor1', 'Kecor1', 'Kecor1\r\nKecor1\r\nKecor1', '12-06-2019', NULL, '1'),
(3, 2, 6, NULL, 18, NULL, 'qwert1', 'qwert1\r\nqwert1\r\nqwert1', '12-06-2019', NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblknowledge`
--
ALTER TABLE `tblknowledge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblknowledge_child`
--
ALTER TABLE `tblknowledge_child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parrent` (`parrent`);

--
-- Indexes for table `tblknowledge_content`
--
ALTER TABLE `tblknowledge_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tblknowledge_content_ibfk_1` (`info_id`);

--
-- Indexes for table `tblknowledge_info`
--
ALTER TABLE `tblknowledge_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblknowledge`
--
ALTER TABLE `tblknowledge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblknowledge_child`
--
ALTER TABLE `tblknowledge_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblknowledge_content`
--
ALTER TABLE `tblknowledge_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblknowledge_info`
--
ALTER TABLE `tblknowledge_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblknowledge_child`
--
ALTER TABLE `tblknowledge_child`
  ADD CONSTRAINT `tblknowledge_child_ibfk_1` FOREIGN KEY (`parrent`) REFERENCES `tblknowledge` (`id`);

--
-- Constraints for table `tblknowledge_content`
--
ALTER TABLE `tblknowledge_content`
  ADD CONSTRAINT `tblknowledge_content_ibfk_1` FOREIGN KEY (`info_id`) REFERENCES `tblknowledge_info` (`id`);

--
-- Constraints for table `tblknowledge_info`
--
ALTER TABLE `tblknowledge_info`
  ADD CONSTRAINT `tblknowledge_info_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `tblknowledge_child` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
