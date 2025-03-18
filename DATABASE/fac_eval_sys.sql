-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 02:44 PM
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
-- Database: `fac_eval_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `no` int(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `sys_default` varchar(20) NOT NULL,
  `eval_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`no`, `year`, `semester`, `sys_default`, `eval_status`) VALUES
(1, '2020-2021', '1st', 'No', 'Starting'),
(2, '2021-2022', '2nd', 'No', 'Starting'),
(3, '2022-2023', '1st', 'No', 'Starting'),
(4, '2023-2024', '2nd', 'Yes', 'Starting');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `no` int(20) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  `Set` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`no`, `course`, `year_level`, `Set`) VALUES
(1, 'BS in Information Technology', '4', 'A'),
(2, 'BS in Information Technology', '4', 'B'),
(3, 'BS in Information Technology', '4', 'C'),
(4, 'BS in Information Technology', '4', 'D'),
(5, 'Associate in Information Technology', '1', 'A'),
(6, 'Associate in Information Technology', '1', 'B'),
(7, 'Associate in Information Technology', '2', 'A'),
(8, 'Associate in Information Technology', '2', 'B'),
(9, 'BSIT -Business Analytics', '1', 'A'),
(10, 'BSIT -Business Analytics', '2', 'A'),
(11, 'BSIT -Business Analytics', '3', 'A'),
(12, 'BSIT -Business Analytics', '4', 'A'),
(13, 'Associate in Information Technology', '3', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_management`
--

CREATE TABLE `classroom_management` (
  `no` int(20) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classroom_management`
--

INSERT INTO `classroom_management` (`no`, `question`) VALUES
(1, 'The instructor starts the class on time and ends on time.'),
(2, 'The instructor demonstrated interest and enthusiasm in the subject.'),
(3, 'The instructor encourages students to analyze ideas and to think critically.'),
(4, 'The instructor encouraged questions and discussion when appropriate.'),
(5, 'The instructor advises students as to how to prepare for exams or quizzes.'),
(6, 'The instructor reminds students of test dates and assignment deadlines.'),
(7, 'The instructor announces availability for consultation.'),
(8, 'The instructor offers to help students with their problems regarding their subjects.'),
(9, 'The instructor responds appropriately to student inquiries.'),
(10, 'try'),
(12, 'ika 11');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `no` int(20) NOT NULL,
  `criteria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`no`, `criteria`) VALUES
(1, ' planning_and_lesson_implementation'),
(2, ' classroom_management'),
(3, ' interpersonal_skills');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `no` int(20) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`no`, `department`) VALUES
(1, 'BSIT -Business Analytics'),
(2, 'BS in Information Technology'),
(3, 'Associate in Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `no` int(20) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `f_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`no`, `faculty_id`, `firstname`, `lastname`, `subject`, `email`, `f_password`) VALUES
(2, '1002', 'Paul', 'Sebando', 'Fundamentals of Programming', 'paul@gmail.com', 'c1572d05424d0ecb2a65ec6a82aeacbf'),
(3, '1003', 'Carol', 'Estacio', 'Web Development', 'car@gmail.com', '3afc79b597f88a72528e864cf81856d2'),
(4, '1004', 'Sheila', 'Ibanga', 'Information & Security Assuarance 1', 'sheil@gmail.com', 'fc2921d9057ac44e549efaf0048b2512');

-- --------------------------------------------------------

--
-- Table structure for table `fac_students`
--

CREATE TABLE `fac_students` (
  `no` int(255) NOT NULL,
  `stud_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fac_students`
--

INSERT INTO `fac_students` (`no`, `stud_id`, `firstname`, `lastname`, `subject`, `class`, `password`) VALUES
(1, '2020-01363', ' Julie', ' Jaspe', 'Information & Security Assuarance 1\r\n', ' BSIT 4-D', 'fbb960affdccf9d29376b29ba389bde1'),
(5, '2020-01367', ' Ae', ' Zee', 'Information & Security Assuarance 1', ' BSIT 4-D', '1ed1789020e1d8015ba5e5f0fc61e933');

-- --------------------------------------------------------

--
-- Table structure for table `interpersonal_skills`
--

CREATE TABLE `interpersonal_skills` (
  `no` int(20) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interpersonal_skills`
--

INSERT INTO `interpersonal_skills` (`no`, `question`) VALUES
(1, 'The instructor projects genuine concern, and interest in the needs of students.'),
(2, 'The instructor provides encouragement and proper motivation.'),
(3, 'The instructor provides encouragement and proper motivation.'),
(4, 'The instructor projects confidence at all times.\r\n'),
(5, 'ika 5');

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `no` int(20) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`no`, `question`) VALUES
(1, 'jhgf'),
(2, 'jhgf'),
(3, 'hvhg'),
(4, 'ika 5'),
(5, 'ika 5'),
(6, 'try'),
(7, 'try'),
(8, 'ika 8'),
(9, 'ika 11'),
(10, 'ika 5'),
(11, 'ika 9'),
(12, ''),
(13, '');

-- --------------------------------------------------------

--
-- Table structure for table `planning_and_lesson_implementation`
--

CREATE TABLE `planning_and_lesson_implementation` (
  `no` int(20) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `planning_and_lesson_implementation`
--

INSERT INTO `planning_and_lesson_implementation` (`no`, `question`) VALUES
(1, 'The course objectives were explained clearly at the beginning of the course.'),
(2, 'The instructor organized course material effectively.'),
(3, 'The grading criteria were explained clearly at the beginning of the course.'),
(4, 'The instructor explains exactly what is expected from students - this includes modules, quizzes, exams, and class participation.'),
(5, 'The instructor provided appropriate feedback about your output throughout the course.'),
(6, ' The instructor gives additional references to understand the topics discussed in class.'),
(7, 'The instructor maximizes student involvement and constructive interaction are apparent throughout the period.'),
(11, 'ika 8');

-- --------------------------------------------------------

--
-- Table structure for table `ques_criteria1`
--

CREATE TABLE `ques_criteria1` (
  `no` int(20) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ques_criteria1`
--

INSERT INTO `ques_criteria1` (`no`, `question`) VALUES
(1, 'question1'),
(2, 'ques2'),
(3, 'nbhf'),
(4, 'jky');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `no` int(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`no`, `code`, `subject`) VALUES
(1, 'IT 411', 'Capstone 1'),
(2, 'IT 123', 'Networking 2'),
(3, 'IT 124', 'Networking 1'),
(4, 'IT 256', 'Information Security & Assurance 1'),
(5, 'IT 257', 'Information Security & Assurance 2'),
(6, 'IT 117', 'Web Development'),
(7, 'CS001', 'Fundamentals of Programming'),
(8, 'CS002', 'Quantitative Research '),
(9, 'IT 115', 'C Programming'),
(11, 'IT 118', 'System Architecture & Development 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `classroom_management`
--
ALTER TABLE `classroom_management`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `fac_students`
--
ALTER TABLE `fac_students`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `interpersonal_skills`
--
ALTER TABLE `interpersonal_skills`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `planning_and_lesson_implementation`
--
ALTER TABLE `planning_and_lesson_implementation`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `ques_criteria1`
--
ALTER TABLE `ques_criteria1`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `classroom_management`
--
ALTER TABLE `classroom_management`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fac_students`
--
ALTER TABLE `fac_students`
  MODIFY `no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `interpersonal_skills`
--
ALTER TABLE `interpersonal_skills`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `planning_and_lesson_implementation`
--
ALTER TABLE `planning_and_lesson_implementation`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ques_criteria1`
--
ALTER TABLE `ques_criteria1`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `no` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
