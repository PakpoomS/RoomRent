-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2018 at 05:53 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room`
--

-- --------------------------------------------------------

--
-- Table structure for table `depart`
--

CREATE TABLE `depart` (
  `id_Depart` int(100) NOT NULL,
  `name_Depart` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depart`
--

INSERT INTO `depart` (`id_Depart`, `name_Depart`) VALUES
(1, 'รัฐวิสาหกิจ'),
(10, 'ความมั่นคง');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id_Group` int(11) NOT NULL COMMENT 'รันออโต้ ไอดีกลุ่มฝ่าย',
  `name_Group` varchar(100) NOT NULL COMMENT 'ชื่อกลุ่มฝ่าย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id_Group`, `name_Group`) VALUES
(1, 'admin'),
(2, 'ฝ่ายประชาสัมพันธ์'),
(3, 'ฝ่ายธุรการ'),
(4, 'ฝ่ายการเงิน'),
(6, 'ฝ่ายบัญชี');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_Login` int(11) NOT NULL COMMENT 'รันออโต้ ไอดีผู้ใช้',
  `id_Prefix` int(5) NOT NULL COMMENT 'ไอดีคำนำหน้า ใช้จอย',
  `Fname` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `Lname` varchar(100) NOT NULL COMMENT 'สกุล',
  `id_Group` int(5) NOT NULL COMMENT 'กลุ่มฝ่าย',
  `id_depart` int(11) DEFAULT NULL COMMENT 'หน่วยงาน',
  `Login_status` int(5) NOT NULL COMMENT 'สถานะ 1=Admin  2=User',
  `UserID` varchar(50) NOT NULL COMMENT 'ID ผู้ใช้',
  `Pass` varchar(50) NOT NULL COMMENT 'Pass ผู้ใช้',
  `Telephone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_Login`, `id_Prefix`, `Fname`, `Lname`, `id_Group`, `id_depart`, `Login_status`, `UserID`, `Pass`, `Telephone`) VALUES
(1, 1, 'สมชาย', 'เข็มกลัด', 1, 1, 1, 'admin', 'admin', '0837731300'),
(8, 1, '123', '123', 0, 13, 2, '123', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id_Meeting` int(11) NOT NULL COMMENT 'รันออโต้ ไอดีวาระการประชุม',
  `date_S` datetime NOT NULL COMMENT 'วันที่จอง',
  `date_F` datetime NOT NULL COMMENT 'วันที่สิ้นสุด',
  `topics` varchar(200) NOT NULL COMMENT 'หัวข้อเรื่องการประชุม',
  `id_Room` int(5) NOT NULL COMMENT 'ไอดีห้องประชุม จอยเอาชื่อห้องมาแสดง',
  `id_Group` int(5) NOT NULL COMMENT 'ไอดีฝ่าย จอยเอาชื่อกลุ่มฝ่ายมาแสดง',
  `status_M` int(5) NOT NULL COMMENT 'สถานะห้อง จะมี 1=จอง และ 2=ยืนยันการจอง',
  `id_Login` int(5) NOT NULL COMMENT 'ไอดีคนที่ลอกอินเข้ามา จอยเอาชื่อมาแสดงเป็นคนที่จอง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id_Meeting`, `date_S`, `date_F`, `topics`, `id_Room`, `id_Group`, `status_M`, `id_Login`) VALUES
(1, '2018-10-12 22:38:00', '2018-10-13 22:38:00', 'จองไว้ดู', 10, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pass_register`
--

CREATE TABLE `pass_register` (
  `passID` int(10) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `GroupName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pass_register`
--

INSERT INTO `pass_register` (`passID`, `Pass`, `GroupName`) VALUES
(1, 'admin1', 'Admin'),
(2, 'user123', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE `prefix` (
  `id_Prefix` int(11) NOT NULL COMMENT 'รันออโต้ ไอดีคำนำหน้า ใช้จอย',
  `name_Prefix` varchar(20) NOT NULL COMMENT 'คำนำหน้า เช่น นาย นางสาว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prefix`
--

INSERT INTO `prefix` (`id_Prefix`, `name_Prefix`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'นางสาว');

-- --------------------------------------------------------

--
-- Table structure for table `room_meeting`
--

CREATE TABLE `room_meeting` (
  `id_Room` int(11) NOT NULL COMMENT 'รันออโต้ ไอดีห้องประชุม',
  `name_Room` varchar(100) NOT NULL COMMENT 'ชื่อห้องประชุม',
  `capacity` int(20) NOT NULL COMMENT 'ความจุของห้องประชุม จุได้กี่ที่',
  `Size` int(5) DEFAULT NULL COMMENT 'ขนาดห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_meeting`
--

INSERT INTO `room_meeting` (`id_Room`, `name_Room`, `capacity`, `Size`) VALUES
(1, 'ห้องประชุมบานบุรี', 120, 1),
(2, 'ห้องประชุมวิเชียรมาศ', 100, 2),
(3, 'ห้องประชุมใหญ่', 100, 1),
(10, 'ห้องใหม่', 50, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `depart`
--
ALTER TABLE `depart`
  ADD PRIMARY KEY (`id_Depart`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id_Group`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_Login`),
  ADD UNIQUE KEY `Pass` (`id_Login`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id_Meeting`);

--
-- Indexes for table `pass_register`
--
ALTER TABLE `pass_register`
  ADD PRIMARY KEY (`passID`);

--
-- Indexes for table `prefix`
--
ALTER TABLE `prefix`
  ADD PRIMARY KEY (`id_Prefix`);

--
-- Indexes for table `room_meeting`
--
ALTER TABLE `room_meeting`
  ADD PRIMARY KEY (`id_Room`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `depart`
--
ALTER TABLE `depart`
  MODIFY `id_Depart` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id_Group` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รันออโต้ ไอดีกลุ่มฝ่าย', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_Login` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รันออโต้ ไอดีผู้ใช้', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id_Meeting` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รันออโต้ ไอดีวาระการประชุม', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pass_register`
--
ALTER TABLE `pass_register`
  MODIFY `passID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prefix`
--
ALTER TABLE `prefix`
  MODIFY `id_Prefix` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รันออโต้ ไอดีคำนำหน้า ใช้จอย', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_meeting`
--
ALTER TABLE `room_meeting`
  MODIFY `id_Room` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รันออโต้ ไอดีห้องประชุม', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
