-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2019 at 03:04 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `eid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_name`, `password`, `eid`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `name`) VALUES
(1, 'building1'),
(2, 'building2');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`) VALUES
(6, 'jhjkhjkj', 'manu@gmail.com', 'jhkkkj', 'gfghghhjj'),
(7, 'Rehan', 'rehan@gmail.com', 'hlo', 'hey'),
(8, '', '', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(13, 'B.tech'),
(14, 'M.Tech'),
(15, 'BCA'),
(16, 'MCA'),
(20, 'test'),
(21, 'testing'),
(22, 'dep');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `description`, `date`, `start_time`, `end_time`) VALUES
(1, 'Parents Meeting', 'Parents Teacher Meeting', '', '', ''),
(2, 'CX', 'asdasdasdasd', '2019-06-15', '13:00', '23:00'),
(3, 'asd', 'asdasdasdasd', '2019-06-14', '', ''),
(4, 'asd', 'asdasdasdasd', '2019-06-14', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `name`, `description`, `date`, `start_time`, `end_time`) VALUES
(1, 'Parents Meeting', 'Parents Meeting', '2019-06-22', '14:00', '17:00'),
(2, 'asdaaa', 'asdasdasdasd', '2019-06-12', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(9) NOT NULL,
  `name` varchar(20) NOT NULL,
  `seats` int(9) NOT NULL,
  `building_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `seats`, `building_id`) VALUES
(1, 'room1', 30, 2),
(2, 'room1', 25, 1),
(3, 'room3', 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `semester_name` varchar(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `semester_name`, `department_id`) VALUES
(1, '1st', 13),
(2, '2nd', 13),
(3, '3rd', 13),
(4, '4th', 13),
(6, '5th', 14),
(7, '6th', 15),
(8, '7th', 15),
(9, '8th', 15);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `department_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `pic` varchar(255) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `name`, `eid`, `password`, `mob`, `address`, `department_id`, `sem_id`, `dob`, `pic`, `gender`, `status`, `date`) VALUES
(1, 'Manu', 'manu@gmail.com', 'manu', 9891142743, 'Punjab', 13, 1, '1995-07-22', '20141011_164534-1.jpg', 'f', 'ON', '2016-05-22'),
(2, 'Neeru', 'neeru@gmail.com', 'neeru', 9876541234, 'Noida', 13, 2, '1994-12-29', '20151118_105435.jpg', 'f', 'ON', '2016-05-22'),
(3, 'Nandni', 'nandni@gmail.com', 'nandni', 7696303090, 'Punjab', 13, 3, '1995-07-11', 'DSC_0015_1.JPG', 'f', 'OFF', '2016-05-22'),
(4, 'Japleen', 'japleen@gmail.com', 'japleen', 3265897896, 'Noida', 13, 4, '1999-12-06', '20151118_105529.jpg', 'f', 'OFF', '2016-05-22'),
(5, 'Ria', 'ria@gmail.com', 'ria', 9874563214, 'jalandhar', 14, 6, '1997-12-02', '20151118_000454.jpg', 'f', 'OFF', '2016-05-22'),
(6, 'Neha', 'neha@gmail.com', 'neha', 7894561234, 'Ludhiana', 15, 7, '1994-12-05', 'DSC_0033.JPG', 'f', 'OFF', '2016-05-22'),
(7, 'Parul', 'parul@gmail.com', 'parul', 9874563131, 'Gurgaon', 15, 8, '1993-12-01', 'DSC_0042.JPG', 'f', 'ON', '2016-05-22'),
(9, 'Rakesh', 'rakesh@gmail.com', 'rakesh', 9874566544, 'Shimla', 15, 9, '0091-12-02', 'DSC_0048.JPG', 'm', 'OFF', '2016-05-22'),
(10, 'Myra', 'myra@gmail.com', 'myra', 9874123654, 'Punjab', 15, 10, '1995-11-23', 'DSC_0061.JPG', 'f', 'OFF', '2016-05-22'),
(11, 'Dazy', 'dazy@gmail.com', 'dazy', 7894563214, 'Banglore', 16, 11, '1994-02-14', 'IMG_20160117_140446.jpg', 'f', 'OFF', '2016-05-22'),
(12, 'Aman', 'aman@gmail.com', 'aman', 7894563258, 'Mansa', 16, 12, '1993-05-23', 'IMG_20160214_104030-1.jpg', 'f', 'ON', '2016-05-22'),
(13, 'Zahid', 'champthe20@gmail.com', '123', 337845216, 'Address ', 13, 3, '1994-06-29', 'abc', 'm', 'ON', '2019-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(20) DEFAULT NULL,
  `sem_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `sem_id`, `department_id`) VALUES
(1, 'PHP', 1, 13),
(2, 'Core PHP', 1, 13),
(3, 'Advance PHP', 1, 13),
(4, 'Cake PHP', 4, 13),
(5, 'Codeginter', 6, 14),
(6, 'Java', 7, 15),
(7, 'Advance Java', 8, 15),
(8, 'Core Java', 9, 15),
(9, 'OOPS', 10, 15),
(10, 'Wordpress', 11, 16),
(11, 'Joomla', 12, 16),
(12, 'Mgento', 1, 13),
(13, 'Data Structure', 1, 13),
(14, 'Discrete', 1, 13),
(18, 'testingSub', 2, 16),
(19, 'testingSubject', 2, 15),
(20, 'Statistics', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `eid`, `password`, `mob`, `address`, `department_id`) VALUES
(31, 'asad', 'admin', 'admin', 0, 'street12', 13),
(33, 'asad', 'admin1223', 'admin', 0, 'street123', 14),
(34, 'sana', 'admin1', 'admin', 0, 'street123', 13),
(35, 'Ali', 'ali@gmail.com', '123', 3345781254, 'address', 13),
(36, 'Muhammad Ahkam', 'muhammadahkamahmad@gmail.com', '123', 3350320313, 'address', 13);

-- --------------------------------------------------------

--
-- Table structure for table `timeschedule`
--

CREATE TABLE `timeschedule` (
  `timeschedule_id` int(11) NOT NULL,
  `subject_id` int(9) NOT NULL,
  `time_id` int(9) NOT NULL,
  `date` varchar(40) DEFAULT NULL,
  `day` int(1) NOT NULL,
  `room_id` int(9) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `sub_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeschedule`
--

INSERT INTO `timeschedule` (`timeschedule_id`, `subject_id`, `time_id`, `date`, `day`, `room_id`, `teacher_id`, `sub_id`) VALUES
(43, 1, 1, '2019-08-08', 1, 2, 31, 34),
(44, 20, 4, '2019-08-08', 3, 3, 36, NULL),
(45, 12, 4, '2019-08-08', 5, 2, 34, NULL),
(46, 20, 2, '2019-08-08', 4, 2, 36, NULL),
(47, 4, 6, '2019-08-08', 6, 2, 36, NULL),
(48, 5, 3, '2019-08-08', 5, 3, 36, NULL),
(49, 1, 5, '2019-08-08', 4, 2, 36, NULL),
(50, 14, 9, '2019-08-08', 4, 2, 36, NULL),
(51, 8, 9, '2019-08-08', 2, 1, 36, NULL),
(52, 2, 4, '2019-08-08', 1, 3, 36, NULL),
(53, 12, 10, '2019-08-08', 7, 3, 36, NULL),
(54, 20, 5, '2019-08-08', 7, 2, 36, NULL),
(55, 1, 9, '2019-08-08', 5, 1, 36, NULL),
(56, 1, 1, '2019-08-08', 4, 1, 36, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `id` int(2) NOT NULL,
  `normal_time` varchar(50) NOT NULL,
  `friday_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`id`, `normal_time`, `friday_time`) VALUES
(1, '08:30 - 09:20', '08:30 - 09:15'),
(2, '09:20 - 10:10', '09:15 - 10:10'),
(3, '10:10 - 11:00', '10:00 - 10:45'),
(4, '11:00 - 11:50', '10:45 - 11:30'),
(5, '11:50 - 12:40', '11:30 - 12:15'),
(6, '12:40 - 01:30', '12:15 - 01:00'),
(7, '01:30 - 02:20', '02:30 - 03:15'),
(8, '02:20 - 03:10', '03:15 - 04:00'),
(9, '03:10 - 04:00', '04:00 - 04:45'),
(10, '04:00 - 04:50', '04:45 - 05:30');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `uid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`uid`, `uname`) VALUES
(1, 'testing institute'),
(2, 'Sir Syed University Of Eng. & Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `eid` (`eid`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);
ALTER TABLE `department` ADD FULLTEXT KEY `course_name` (`department_name`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id` (`building_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`),
  ADD KEY `course_id` (`department_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`),
  ADD UNIQUE KEY `eid` (`eid`);
ALTER TABLE `student` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `course_id` (`department_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `eid` (`eid`);
ALTER TABLE `teacher` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `timeschedule`
--
ALTER TABLE `timeschedule`
  ADD PRIMARY KEY (`timeschedule_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `time_id` (`time_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `FK_subID` (`sub_id`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `timeschedule`
--
ALTER TABLE `timeschedule`
  MODIFY `timeschedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE;

--
-- Constraints for table `timeschedule`
--
ALTER TABLE `timeschedule`
  ADD CONSTRAINT `FK_subID` FOREIGN KEY (`sub_id`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `timeschedule_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
