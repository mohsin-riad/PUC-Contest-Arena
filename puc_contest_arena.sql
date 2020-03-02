-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 05:50 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puc_contest_arena`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '12345'),
('mohsinriad', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `username` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`username`, `password`) VALUES
('coach1', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `contest_info`
--

CREATE TABLE `contest_info` (
  `c_id` varchar(10) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `contest_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest_info`
--

INSERT INTO `contest_info` (`c_id`, `c_name`, `contest_date`) VALUES
('c-36', 'PUC Team Selection 2020', '2020-01-21'),
('c-72', 'NGPC  2019 (2019)', '2019-12-19'),
('c-78', 'ICPC reginal replay 2019', '2019-12-12'),
('c-87', 'PUC Skill devs 2020 (single)', '2020-01-30'),
('c-96', 'PUC CSE FEST 2019', '2019-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `member_reg`
--

CREATE TABLE `member_reg` (
  `m_id` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `real_name` varchar(30) DEFAULT NULL,
  `university` varchar(30) NOT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `b_date` date DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `image` varchar(250) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_reg`
--

INSERT INTO `member_reg` (`m_id`, `username`, `real_name`, `university`, `gender`, `b_date`, `email`, `image`, `password`) VALUES
('m-14', 'ikram', 'ikram asif', 'premier university', 'male', '2019-12-02', 'ikram@yahoo.com', '02bf8c38c1c4b3e717b4502f65f078df.jpg', '12345'),
('m-35', 'prama', 'srabosthy das prama', 'premier university', 'female', '1998-12-13', 'srabosthydasprama@gmail.com', '1e82243ac8a2697cbcb098f4b86871c8.jpg', '12345'),
('m-36', 'irfan', 'irfan khan', 'iiuc', 'male', '2019-12-03', 'irfan@gmail.com', 'cc582d92dcb2ad109464cd24bc5a754b.JPG', '12345'),
('m-46', 'nayeem', 'hossain mohd. nayeem', 'PCIU', 'male', '2019-12-03', 'nayeem@gmail.com', 'c68a37e788d0bc96b2db0f65a7c4d391.JPG', '12345'),
('m-47', ' morteen', 'mohsin riad', 'premier university', 'male', '2019-12-05', 'morteen1997@gmail.com', '49b7014479b5aba7e18c6a88846fb5fd.JPG', '12345'),
('m-59', 'tonmoy', 'tonmoy barua', 'premier university', 'male', '2019-05-13', 'tonmoy@yahoo.com', '6484f1b57010b224d6dd7af3c52d1b65.jpg', '12345'),
('m-70', 'mujib', 'mujibur rahman', 'premier university', 'male', '2019-07-17', 'mujibur@gmail.com', 'dc648f936fd60187f299e29a14928257.jpg', '12345'),
('m-74', 'razy', 'maaz al razy', 'Chittagong University', 'male', '2019-12-03', 'maazalrazy@yahoo.com', 'f78c6194d6dd6b7ec34e3b05845a068c.JPG', '12345'),
('m-81', 'swapneel', 'swapneel chakma', 'AUST', 'male', '2019-12-01', 'swapneel@ymail.com', 'a16b6748b1ba4f2439cb956d996756cb.jpg', '12345'),
('m-84', 'minhaz', 'minhaz uddin', 'premier university', 'others', '2019-12-14', 'minhaz@gmail.com', '75cb9acd57109a9aa08c62a21a636982.jpg', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `t_id` varchar(20) NOT NULL,
  `t_name` varchar(20) DEFAULT NULL,
  `m_id1` varchar(30) DEFAULT NULL,
  `m_id2` varchar(30) DEFAULT NULL,
  `m_id3` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`t_id`, `t_name`, `m_id1`, `m_id2`, `m_id3`) VALUES
('t-25', 'puc_optimizers', 'ikram', 'irfan', 'razy'),
('t-57', 'puc_plastic_coders', 'nayeem', 'swapneel', 'minhaz'),
('t-64', 'puc_inferno', ' morteen', 'tonmoy', 'mujib');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `contest_info`
--
ALTER TABLE `contest_info`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `member_reg`
--
ALTER TABLE `member_reg`
  ADD PRIMARY KEY (`m_id`,`username`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`t_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `fk_teams` FOREIGN KEY (`m_id1`) REFERENCES `member_reg` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teams1` FOREIGN KEY (`m_id2`) REFERENCES `member_reg` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teams2` FOREIGN KEY (`m_id3`) REFERENCES `member_reg` (`m_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
