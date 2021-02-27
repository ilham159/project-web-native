-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 09:55 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web1`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_library`
--

CREATE TABLE `books_library` (
  `txtid` varchar(20) NOT NULL,
  `txtname_books` varchar(100) NOT NULL,
  `txt_author` varchar(100) NOT NULL,
  `txtyears` date NOT NULL,
  `txt_stock` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_library`
--

INSERT INTO `books_library` (`txtid`, `txtname_books`, `txt_author`, `txtyears`, `txt_stock`) VALUES
('1', 'the science', 'ilham dyki', '2020-01-14', '3');

-- --------------------------------------------------------

--
-- Table structure for table `data_class_school`
--

CREATE TABLE `data_class_school` (
  `txt_id` varchar(20) NOT NULL,
  `txt_name_class` varchar(20) NOT NULL,
  `txt_name_subjects` varchar(100) NOT NULL,
  `txtnip_teachers` varchar(20) NOT NULL,
  `txtdays` varchar(20) NOT NULL,
  `txt_startclass` time NOT NULL,
  `txt_endclass` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_class_school`
--

INSERT INTO `data_class_school` (`txt_id`, `txt_name_class`, `txt_name_subjects`, `txtnip_teachers`, `txtdays`, `txt_startclass`, `txt_endclass`) VALUES
('a441', 'A 201', 'History of Indonesian', '1', 'Monday', '09:54:00', '10:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `librarys`
--

CREATE TABLE `librarys` (
  `txtid` varchar(20) NOT NULL,
  `txtbooks` varchar(100) NOT NULL,
  `txtnis_students` varchar(20) NOT NULL,
  `txtbrdt` date NOT NULL,
  `txtbrlmt` date NOT NULL,
  `amt_borrow` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarys`
--

INSERT INTO `librarys` (`txtid`, `txtbooks`, `txtnis_students`, `txtbrdt`, `txtbrlmt`, `amt_borrow`) VALUES
('1', '1', '1', '2020-01-15', '2020-01-22', '1'),
('2', '1', '2', '2020-01-15', '2020-01-15', '1');

--
-- Triggers `librarys`
--
DELIMITER $$
CREATE TRIGGER `delete_stock_book` AFTER DELETE ON `librarys` FOR EACH ROW BEGIN
	UPDATE books_library SET txt_stock=txt_stock+OLD.amt_borrow
    WHERE txtid= OLD.txtbooks;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_stock_book` AFTER INSERT ON `librarys` FOR EACH ROW BEGIN
	UPDATE books_library SET txt_stock=txt_stock-NEW.amt_borrow
    WHERE txtid= NEW.txtbooks;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `kd_superadmin` varchar(20) NOT NULL,
  `name_superadmin` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('admin','students','teachers','employees','visitors') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`kd_superadmin`, `name_superadmin`, `username`, `password`, `level`) VALUES
('1', 'ilham dyki mu\'ahfi', 'ilham', 'ilham', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `strangers`
--

CREATE TABLE `strangers` (
  `txt_identity` varchar(20) NOT NULL,
  `txtname` varchar(100) NOT NULL,
  `txtgender` varchar(1) NOT NULL,
  `txtcontact` varchar(15) NOT NULL,
  `txtemail` varchar(100) NOT NULL,
  `txt_student` varchar(100) NOT NULL,
  `txtaddress` text NOT NULL,
  `txt_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strangers`
--

INSERT INTO `strangers` (`txt_identity`, `txtname`, `txtgender`, `txtcontact`, `txtemail`, `txt_student`, `txtaddress`, `txt_info`) VALUES
('1', 'arief', 'L', '087134914141', '', 'SMK PERMATA DUNIA', 'jl.parung raya', 'want to visit man 17 for a plant thesis found in man 17');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `txtnis` varchar(20) NOT NULL,
  `txtname` varchar(100) NOT NULL,
  `txtgender` varchar(1) NOT NULL,
  `txtmajors` varchar(20) NOT NULL,
  `txtcontact` varchar(15) NOT NULL,
  `txtemail` varchar(100) NOT NULL,
  `txtaddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`txtnis`, `txtname`, `txtgender`, `txtmajors`, `txtcontact`, `txtemail`, `txtaddress`) VALUES
('1', 'ilham dyki', 'L', 'Natural Science', '089510003066', 'dykiganteng1st@gmail.com', 'jl.pedongkelan belakang rt:17/13 no.1'),
('2', 'arief budiman', 'L', 'Natural Science', '087641764712', 'ariefbdmnt@gmail.com', 'jl.parung panjang'),
('3', 'beryl boran', 'L', 'Natural Science', '089510003066', 'berylboran334@gmail.com', 'jl.waru raya no.1');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `txtnip` varchar(20) NOT NULL,
  `txtname` varchar(100) NOT NULL,
  `txtgender` varchar(1) NOT NULL,
  `txtcontact` varchar(15) NOT NULL,
  `txtemail` varchar(100) NOT NULL,
  `txtaddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`txtnip`, `txtname`, `txtgender`, `txtcontact`, `txtemail`, `txtaddress`) VALUES
('1', 'debora debian', 'P', '081241841214', 'debora332@gmail.com', 'jl.parung panjang'),
('2', 'irvan', 'L', '089274716741', 'irvanhr331@gmail.com', 'jl.meruya barat no.22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_library`
--
ALTER TABLE `books_library`
  ADD PRIMARY KEY (`txtid`),
  ADD KEY `txtname_books` (`txtname_books`);

--
-- Indexes for table `data_class_school`
--
ALTER TABLE `data_class_school`
  ADD PRIMARY KEY (`txt_id`),
  ADD KEY `txtid_students` (`txtnip_teachers`);

--
-- Indexes for table `librarys`
--
ALTER TABLE `librarys`
  ADD PRIMARY KEY (`txtid`),
  ADD KEY `fk_library_students` (`txtnis_students`),
  ADD KEY `txtbooks` (`txtbooks`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`kd_superadmin`);

--
-- Indexes for table `strangers`
--
ALTER TABLE `strangers`
  ADD PRIMARY KEY (`txt_identity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`txtnis`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`txtnip`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_class_school`
--
ALTER TABLE `data_class_school`
  ADD CONSTRAINT `fk_teachers` FOREIGN KEY (`txtnip_teachers`) REFERENCES `teachers` (`txtnip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `librarys`
--
ALTER TABLE `librarys`
  ADD CONSTRAINT `fk_books` FOREIGN KEY (`txtbooks`) REFERENCES `books_library` (`txtid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_students` FOREIGN KEY (`txtnis_students`) REFERENCES `students` (`txtnis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
