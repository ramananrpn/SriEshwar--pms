-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2017 at 03:41 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srieshwar_pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_no`) VALUES
('2012-2016'),
('2013-2017'),
('2014-2018'),
('2016-2020'),
('2015-2019'),
('2012 - 2023 ');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `project_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`project_category`) VALUES
('Institution Development'),
('Society Oriented'),
('Faculty Research'),
('Industry Sponsored'),
('Multi-Disciplinary');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` varchar(10) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `batch_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `batch_no`) VALUES
('CSE01', 'CSE', '2015-2019'),
('EEE03', 'EEE', '2016-2020');

-- --------------------------------------------------------

--
-- Table structure for table `login_users`
--

CREATE TABLE `login_users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_users`
--

INSERT INTO `login_users` (`username`, `password`) VALUES
('Arulkumar', '123456'),
('Bharathi', '123456'),
('kupu', '123456'),
('navaneeethaaaa', '123456'),
('Naveen', '123456'),
('pmsadmin', '123456'),
('Ramanan', '123456'),
('Sampath', '123456'),
('Sathish kupurasuu', '123456'),
('secedean', '123456'),
('seceprincipal', '123456'),
('sidhar', '123456'),
('staff', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `proj_id` varchar(50) NOT NULL,
  `batch_no` varchar(100) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `sec` varchar(5) NOT NULL,
  `project_category` varchar(100) NOT NULL,
  `project_title` varchar(100) NOT NULL,
  `domain_name` varchar(100) NOT NULL,
  `project_guide` varchar(100) NOT NULL,
  `Abstract` longtext NOT NULL,
  `com_so_far` varchar(10) NOT NULL,
  `estimated_budget` varchar(100) NOT NULL,
  `expected_outcome` varchar(100) NOT NULL,
  `sem1_zero_rev` text NOT NULL,
  `sem1_rev1` varchar(100) NOT NULL,
  `sem1_competition` text NOT NULL,
  `sem1_rev1_pic` varchar(100) NOT NULL,
  `sem1_rev2` varchar(100) NOT NULL,
  `sem1_rev2_pic` varchar(100) NOT NULL,
  `sem1_rev3` varchar(100) NOT NULL,
  `sem1_rev3_pic` varchar(100) NOT NULL,
  `sem1_competion_won` text NOT NULL,
  `creator` varchar(50) NOT NULL,
  `project_status` varchar(100) NOT NULL,
  `sem2_rev1` varchar(50) NOT NULL,
  `sem2_rev1_pic` varchar(100) NOT NULL,
  `sem2_competition` text NOT NULL,
  `sem2_rev2` varchar(50) NOT NULL,
  `sem2_rev2_pic` varchar(100) NOT NULL,
  `sem2_rev3` varchar(50) NOT NULL,
  `sem2_rev3_pic` varchar(100) NOT NULL,
  `com_zero` text NOT NULL,
  `com_one_sem1` text NOT NULL,
  `com_two_sem1` text NOT NULL,
  `com_three_sem1` text NOT NULL,
  `com_one_sem2` text NOT NULL,
  `com_two_sem2` text NOT NULL,
  `com_three_sem2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`proj_id`, `batch_no`, `dept_name`, `sec`, `project_category`, `project_title`, `domain_name`, `project_guide`, `Abstract`, `com_so_far`, `estimated_budget`, `expected_outcome`, `sem1_zero_rev`, `sem1_rev1`, `sem1_competition`, `sem1_rev1_pic`, `sem1_rev2`, `sem1_rev2_pic`, `sem1_rev3`, `sem1_rev3_pic`, `sem1_competion_won`, `creator`, `project_status`, `sem2_rev1`, `sem2_rev1_pic`, `sem2_competition`, `sem2_rev2`, `sem2_rev2_pic`, `sem2_rev3`, `sem2_rev3_pic`, `com_zero`, `com_one_sem1`, `com_two_sem1`, `com_three_sem1`, `com_one_sem2`, `com_two_sem2`, `com_three_sem2`) VALUES
('PMS-01', '2013-2017', 'ece', 'A', 'Institution Development', '546kjh', 'php', 'shdaj', '0hjsajkdhakjsdhakdjhakdjhakjdhiadhwkajhsuasnmbscjbchmzsbcjshsbszcbjhjsajkdhakjsdhakdjhakdjhakjdhiadhwkajhsuasnmbscjbchmzsbcjshsbszcbjhjsajkdhakjsdhakdjhakdjhakjdhiadhwkajhsuasnmbscjbchmzsbcjshsbszcbjhjsajkdhakjsdhakdjhakdjhakjdhiadhwkajhsuasnmbscjbchmzsbcjshsbszcbj', '50', '5', '123sd', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-010', '2012-2016', 'cse', 'A', 'Institution Development', '', 'php', 'dfg', 'fghjk', '25', 's', 'fg', 'good', 'bad', '', '13.jpg', 'good', '17.jpg', 'bad', '17.jpg', '', 'Arulkumar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-011', '2013-2017', 'cse', 'A', 'Institution Development', 'fgh', 'php', 'fgh', 'gh', '50', 'gh', 'gh', 'good', 'Satisfied', '', '123.jpg', '', '', '', '', '', 'Arulkumar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-012', '2013-2017', 'cse', 'A', 'Faculty Research', 'gh', 'php', 'ghj', 'hjk', '25', 'fgh', 'ghj', '', '0', '', '', '', '', '', '', '', 'Arulkumar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-013', '2012-2016', 'cse', 'A', 'Institution Development', 'gh', 'php', 'fgh', 'fgh', '25', 'gh', 'sdfs', '', '0', '', '', '', '', '', '', '', 'Arulkumar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-014', '2012-2016', 'eee', 'A', 'Society Oriented', 's', 'php', 'yt', 'tfghjk', '25', 's', 'd', '', '0', '', '', '', '', '', '', '', 'Sathish kupurasuu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-015', '2012-2016', 'ece', 'A', 'Institution Development', 'g', 'php', 'sadas', 'fghj', '50', 'sd', 'ss', '', '0', '', '', '', '', '', '', '', 'Sathish kupurasuu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-016', '2013-2017', 'eee', 'B', 'Institution Development', 'c', 'php', 's', 'gvbh', '25', 'hj', 'g', '', '0', '', '', '', '', '', '', '', 'Sathish kupurasuu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-017', '2013-2017', 'eee', 'B', 'Institution Development', 'c', 'php', 's', 'gvbh', '25', 'hj', 'g', '', '0', '', '', '', '', '', '', '', 'Sathish kupurasuu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-018', '2012-2016', 'cse', 'A', 'Institution Development', 'fgh', 'php', 'gh', 'gh', '50', 'gh', 'gh', 'good', 'satis', '', '14.jpg', 'satis', '18.jpg', 'satis', '18.jpg', '', 'Ramanan', '12', 'good', '18.jpg', '', 'satis', '17.jpg', 'satis', '18.jpg', '', '', '', '', '', '', ''),
('PMS-019', '2012-2016', 'cse', 'A', 'Institution Development', 'gh', 'php', 'fg', 'gghj', '25', 'gh', 'gh', '', 'good', '', '18.jpg', 'satis', '18.jpg', '', '', '', 'Ramanan', 'partially complted', 'satis', 'ab.png', '', 'good', '18.jpg', 'good', '13.jpg', '', '', '', '', '', '', ''),
('PMS-02', '2014-2018', 'mech', 'A', 'Faculty Research', 'sda', 'php', 'sad', 'hjsajkdhakjsdhakdjhakdjhakjdhiadhwkajhsuasnmbscjbchmzsbcjshsbszcbjhjsajkdhakjsdhakdjhakdjhakjdhiadhwkajhsuasnmbscjbchmzsbcjshsbszcbj', '50', 'sd', 'sad', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-020', '2012-2016', 'cse', 'A', 'Institution Development', 'fgh', 'php', 'kabim kubam', 'fgh', '25', 's', 'sdfs', '', 'good', '', '456.jpg', 'good', '18.jpg', 'good', '18.jpg', '', 'Ramanan', 'sd', 'satisfied', '18.jpg', '', 'good', '18.jpg', 'good', 'ab.png', '', '', '', '', '', '', ''),
('PMS-021', '2013-2017', 'cse', 'A', 'Institution Development', 'dcrvftgyhj', 'php', 'kabim kubam', 'fg', '25', 's', 'j', 'bad', 'satis', '', 'ab.png', 'good', '18.jpg', '', '', '', 'Ramanan', 'ssad', 'good', '18.jpg', 'das', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-03', '2014-2018', 'ece', 'A', 'Society Oriented', 'sda', 'java', 'sadas', 'sad', '50', '12sda', 'das', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-04', '2012-2016', 'cse', 'A', 'Institution Development', '123', 'php', 'dssd', 'ksjdahkjdhakdjhksjdahkjdhakdjhksjdahkjdhakdjhksjdahkjdhakdjhksjdahkjdhakdjhksjdahkjdhakdjhksjdahkjdhakdjhksjdahkjdhakdjhksjdahkjdhakdjhksjdahkjdhakdjhksjdahkjdhakdjhksjdahkjdhakdjh', '25', 'asj', 'sjk', 'bad', '0', '', '', '', '', '', '', '', 'Arulkumar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-05', '', 'ece', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', 'Arulkumar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-06', '2013-2017', 'ece', 'B', 'Society Oriented', '5s46', 'php', 'kabim kubam', 'sajgdaj', '25', '2', 'nsba', '', '0', '', '', '', '', '', '', '', 'Arulkumar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-07', '2012-2016', 'cse', 'A', 'Institution Development', 'zzz', 'php', 'aaa', 'aadafghaja', '25', '11111', 'bmmm', 'satisfied', 'satisfied', '', '17.jpg', 'satisfied', '13.jpg', '', '', '', 'Arulkumar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-08', '2016-2020', 'eee', 'A', 'Faculty Research', 'cfgvhj', 'php', 'uijslk', 'shkjd', '75', '513', '23', 'good', '0', '', '', '', '', '', '', '', 'Arulkumar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-09', '2013-2017', 'eee', 'A', 'Institution Development', '132', 'php', 'gh', 'fgh', '25', 'fgh', 'sdfs', '', '0', '', '', '', '', '', '', '', 'Arulkumar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-22', '2012-2016', 'cse', 'A', 'Multi-Disciplinary', 'dcrvftgyhj', 'php', 'kabim kubam', 'frghj', '25', 'gh', 'HAi', '', 'satis', '', '18.jpg', 'good', 'ab.png', 'satis', '17.jpg', '', 'Ramanan', '123', 'good', 'ab.png', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-23', '2015-2019', 'cse', 'C', 'Society Oriented', 'Farmahead', 'php', 'Mr. ArulKumar', 'ABOUT US\r\nAgriculture and technology, two extremes of sustainable development in their element. FarmAhead is a combination of these focus in making as a super power. It matches towards excellence in hassle-free dealership of agricultural goods and first hand counselling of experts on agriculture. This one step towards betterment of farmers leads to betterment of agriculture,in turn a better WORLD...!', '75', 'Rs.9000', 'Reat time web application', '', '', '', '', '', '', '', '', '', 'Bharathi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('PMS-24', '2015-2019', 'mech', 'A', 'Society Oriented', 'Solar Pump', 'php', 'Arulkumar', 'This is the simple Abstract...', '75%', 'Rs.5000', 'As a Product', 'satisfied', 'good', '', 'home.png', 'good', 'kk.jpg', 'good', 'login.png', '', 'Arulkumar', 'In Progress', 'good', 'IMG-20170419-WA0004.jpg', 'None', 'satisfied', 'aa..png', 'good', 'Untitled.png', 'Improve more', 'Better than Zeroth review', 'Better than 1st Review', 'Better than 2nd review', 'Improve tools used', '', ''),
('PMS-25', '2012-2016', 'ece', 'A', 'Society Oriented', 'Trail', 'java', 'Arulkumar', 'sassasassssasashkn\r\nsassasassssasashknsassasassssasashknsassasassssasashknsassasassssasashknsassasassssasashknsassasassssasashknsassasassssasashkn\r\nsassasassssasashknsassasassssasashknsassasassssasashkn\r\nvsassasassssasashknvsassasassssasashkn\r\nvsassasassssasashknv\r\n\r\nvsassasassssasashknv\r\n\r\nvsassasassssasashknsassasassssasashknsassasassssasashknsassasassssasashkn\r\nsassasassssasashknsassasassssasashkn', '100%', 'Rs.10000', 'Product', 'good', 'satisfied', '', 'Screenshot (1).png', 'satisfied', 'Screenshot (2).png', 'good', 'Screenshot (3).png', '', 'Arulkumar', 'In Progress', 'satisfied', 'Screenshot (4).png', 'SDDDDD', 'good', 'Screenshot (6).png', 'bad', 'Screenshot (11).png', 'fghjk', 'asdfghjkl', 'sdgfhj', 'dsdfafafda', 'dafaafa', 'faf', 'SSS');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sno` int(11) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `section` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sno`, `batch`, `dept`, `section`) VALUES
(1, '2014-2018', 'CSE', 'CSE A'),
(2, '2014-2018', 'CSE', 'CSE B'),
(3, '2014-2018', 'CSE', 'CSE C');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`username`, `password`) VALUES
('Sathish', '15cs140'),
('Ramanan', '15cs125'),
('Naveen', '15cs089');

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `proj_id` varchar(50) NOT NULL,
  `Team_members` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`proj_id`, `Team_members`) VALUES
('PMS-01', 'sgad\r\nasda\r\ndas\r\ndad\r\na'),
('PMS-010', 'fghjk'),
('PMS-011', 'ghj'),
('PMS-012', 'ghj'),
('PMS-013', 'dhg'),
('PMS-014', 'jdkls\r\ndds'),
('PMS-015', 'dfghjklm,;.'),
('PMS-016', 'gh'),
('PMS-017', 'gh'),
('PMS-018', 'ghj'),
('PMS-019', 'gh'),
('PMS-02', 'sahgdajsdh\r\nfsd\r\nsfds\r\n'),
('PMS-020', 'fgh'),
('PMS-021', 'fgh'),
('PMS-03', 'sajbd\r\nads'),
('PMS-04', 'hgadasjd\r\nasa\r\nas'),
('PMS-05', ''),
('PMS-06', 'sdda\r\nsaad\r\ns'),
('PMS-07', 'ertyu\r\nghj'),
('PMS-08', 'hgjk'),
('PMS-09', 'hjk'),
('PMS-22', 'ghj'),
('PMS-23', 'Ramanan [15cs125]\r\nSuryaBharathi [15cs152]\r\nSuryan Saravanan [15cs153]'),
('PMS-24', 'Sathish\r\nRamanan\r\nNavaneethakrishnan'),
('PMS-25', 'Sathish');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_users`
--
ALTER TABLE `login_users`
  ADD PRIMARY KEY (`username`(20));

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`proj_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`proj_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
