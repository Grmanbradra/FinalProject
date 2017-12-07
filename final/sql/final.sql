-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 01:50 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `id_degree` int(1) NOT NULL COMMENT 'key ของ degree',
  `name_degree` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table degree เก็บระดับความยาก';

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`id_degree`, `name_degree`) VALUES
(1, 'Beginner'),
(2, 'Middle'),
(3, 'Advanced');

-- --------------------------------------------------------

--
-- Table structure for table `file_data`
--

CREATE TABLE `file_data` (
  `id_file` int(10) NOT NULL COMMENT 'key table ของ file_data',
  `name_file` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อหนังสือ',
  `author_file` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผู้แต่ง',
  `year_file` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ปีที่พิมพ์',
  `path_file` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่อยู่ไฟล์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='table เก็บข้อมูลไฟล์เอกสาร';

-- --------------------------------------------------------

--
-- Table structure for table `key_category`
--

CREATE TABLE `key_category` (
  `id_key` int(10) NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `key_category`
--

INSERT INTO `key_category` (`id_key`, `keyword`) VALUES
(1, 'Discrete Structures'),
(2, 'Human Computer Interaction'),
(3, 'calculus'),
(4, 'Data Communication'),
(5, 'Security'),
(6, 'Digital Systems'),
(7, 'Arduino'),
(8, 'CPU'),
(9, 'Harddisk'),
(10, 'windows'),
(11, 'Linux'),
(12, 'Unix'),
(13, 'Oracle'),
(14, 'MySQL'),
(15, 'Microsoft SQL Server'),
(16, 'C'),
(17, 'PHP'),
(18, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `key_degree`
--

CREATE TABLE `key_degree` (
  `id_key_degree` int(3) NOT NULL COMMENT 'key ของ table ',
  `keyword_degree` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำที่บอกที่ระดับนั้นๆ',
  `id_degree` int(1) NOT NULL COMMENT 'key ของ degree'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางเก็บ key ที่บอกถึงระดับ';

--
-- Dumping data for table `key_degree`
--

INSERT INTO `key_degree` (`id_key_degree`, `keyword_degree`, `id_degree`) VALUES
(1, 'Foundational', 1),
(2, 'Foundations', 1),
(3, 'Basic', 1),
(4, 'Introduction', 1),
(5, 'Basis', 1),
(6, 'moderate', 2),
(7, 'medium', 2),
(8, 'middle', 2),
(9, 'high', 3),
(10, 'maximum', 3),
(11, 'optimum', 3);

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE `main_category` (
  `digit_main` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'key ของหมวดหลัก',
  `name_main` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อหมวดหลัก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='เก็บชื่อหมวดหลัก';

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`digit_main`, `name_main`) VALUES
('000', 'General Knowledge'),
('010', 'System Software'),
('020', 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `ref_category`
--

CREATE TABLE `ref_category` (
  `id_ref_cate` int(10) NOT NULL COMMENT 'key ของ ref หมวดหมู่',
  `digit_main` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'key ของหมวดหลัก',
  `digit_sub` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'key ของหมวดรอง',
  `id_key` int(10) NOT NULL COMMENT 'key ของ keyword'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ref เก็บคีย์ที่เกี่ยวกับหมวดหมู่';

--
-- Dumping data for table `ref_category`
--

INSERT INTO `ref_category` (`id_ref_cate`, `digit_main`, `digit_sub`, `id_key`) VALUES
(1, '000', '001', 1),
(2, '000', '001', 2),
(3, '000', '001', 3),
(4, '000', '002', 4),
(5, '000', '002', 5),
(6, '000', '002', 6),
(7, '000', '003', 7),
(8, '000', '003', 8),
(9, '000', '003', 9),
(10, '010', '011', 10),
(11, '010', '011', 11),
(12, '010', '011', 12),
(13, '010', '012', 13),
(14, '010', '012', 14),
(15, '010', '012', 15),
(16, '020', '021', 16),
(17, '020', '021', 17),
(18, '020', '021', 18);

-- --------------------------------------------------------

--
-- Table structure for table `ref_file`
--

CREATE TABLE `ref_file` (
  `id_file` int(10) NOT NULL COMMENT 'คีย์ของตารางไฟล์',
  `id_ref_cate` int(10) NOT NULL COMMENT 'คีย์ของตาราง ref หมวดหมู่',
  `id_degree` int(1) NOT NULL COMMENT 'คีย์ตารางระดับ',
  `id_user` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางนี้เก็บข้อมูลหมวดหมู่ของไฟล์';

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `digit_main` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'key รองที่เชื่อมกับ table หมวดหลัก',
  `digit_sub` varchar(3) COLLATE utf8_unicode_ci NOT NULL COMMENT 'key หลัก หมวดรอง',
  `name_sub` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อหมวดรอง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`digit_main`, `digit_sub`, `name_sub`) VALUES
('000', '001', 'Computer Science'),
('000', '002', 'Information Technology'),
('000', '003', 'Hardware'),
('010', '011', 'Operating System'),
('010', '012', 'Database System'),
('020', '021', 'Programming Language');

-- --------------------------------------------------------

--
-- Table structure for table `ีuser`
--

CREATE TABLE `ีuser` (
  `id_user` int(6) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_user` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `date_user` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`id_degree`);

--
-- Indexes for table `file_data`
--
ALTER TABLE `file_data`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `key_category`
--
ALTER TABLE `key_category`
  ADD PRIMARY KEY (`id_key`);

--
-- Indexes for table `key_degree`
--
ALTER TABLE `key_degree`
  ADD PRIMARY KEY (`id_key_degree`),
  ADD KEY `id_degree` (`id_degree`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`digit_main`);

--
-- Indexes for table `ref_category`
--
ALTER TABLE `ref_category`
  ADD PRIMARY KEY (`id_ref_cate`),
  ADD KEY `digit_main` (`digit_main`),
  ADD KEY `digit_sub` (`digit_sub`),
  ADD KEY `id_key` (`id_key`);

--
-- Indexes for table `ref_file`
--
ALTER TABLE `ref_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`digit_sub`),
  ADD KEY `digit_main` (`digit_main`);

--
-- Indexes for table `ีuser`
--
ALTER TABLE `ีuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `id_degree` int(1) NOT NULL AUTO_INCREMENT COMMENT 'key ของ degree', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `file_data`
--
ALTER TABLE `file_data`
  MODIFY `id_file` int(10) NOT NULL AUTO_INCREMENT COMMENT 'key table ของ file_data';
--
-- AUTO_INCREMENT for table `key_category`
--
ALTER TABLE `key_category`
  MODIFY `id_key` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `key_degree`
--
ALTER TABLE `key_degree`
  MODIFY `id_key_degree` int(3) NOT NULL AUTO_INCREMENT COMMENT 'key ของ table ', AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ref_category`
--
ALTER TABLE `ref_category`
  MODIFY `id_ref_cate` int(10) NOT NULL AUTO_INCREMENT COMMENT 'key ของ ref หมวดหมู่', AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `ีuser`
--
ALTER TABLE `ีuser`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `key_degree`
--
ALTER TABLE `key_degree`
  ADD CONSTRAINT `key_degree_ibfk_1` FOREIGN KEY (`id_degree`) REFERENCES `degree` (`id_degree`);

--
-- Constraints for table `ref_category`
--
ALTER TABLE `ref_category`
  ADD CONSTRAINT `ref_category_ibfk_1` FOREIGN KEY (`digit_main`) REFERENCES `main_category` (`digit_main`),
  ADD CONSTRAINT `ref_category_ibfk_2` FOREIGN KEY (`digit_sub`) REFERENCES `sub_category` (`digit_sub`),
  ADD CONSTRAINT `ref_category_ibfk_3` FOREIGN KEY (`id_key`) REFERENCES `key_category` (`id_key`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`digit_main`) REFERENCES `main_category` (`digit_main`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
