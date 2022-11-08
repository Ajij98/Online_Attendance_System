-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2021-02-22 15:29:58
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for oas
DROP DATABASE IF EXISTS `oas`;
CREATE DATABASE IF NOT EXISTS `oas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `oas`;


-- Dumping structure for table oas.tb_admin
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `admin_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table oas.tb_admin: ~2 rows (approximately)
DELETE FROM `tb_admin`;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` (`admin_id`, `user_name`, `email`, `phone`, `password`, `image`, `added_by`, `entry_time`) VALUES
	(1, 'a', 'a@gmail.com', '018555555', '123', 'admin_images/b095e37c86f0ca501b2e40b18a58fadelock.png', 'Mr. Maksudur Rahman', '2021-02-17 21:12:58'),
	(2, 'Irfan Uddin', 'irfanuddin@gmail.com', '01876565466', '12345', 'admin_images/7ebda80f17a5079d27f89c5985fde76dlock.png', 'a', '2021-02-22 00:51:16');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;


-- Dumping structure for table oas.tb_assign_course_teacher
DROP TABLE IF EXISTS `tb_assign_course_teacher`;
CREATE TABLE IF NOT EXISTS `tb_assign_course_teacher` (
  `course_teacher_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(255) DEFAULT NULL,
  `teacher_user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `trimester` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `dateOfAssign` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`course_teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='teacher_name,teacher_user_name,email,phone,section,trimester,course,dateOfAssign,user_name,entry_time';

-- Dumping data for table oas.tb_assign_course_teacher: ~4 rows (approximately)
DELETE FROM `tb_assign_course_teacher`;
/*!40000 ALTER TABLE `tb_assign_course_teacher` DISABLE KEYS */;
INSERT INTO `tb_assign_course_teacher` (`course_teacher_id`, `teacher_name`, `teacher_user_name`, `email`, `phone`, `section`, `trimester`, `course`, `dateOfAssign`, `added_by`, `entry_time`) VALUES
	(1, 'Mr. Maksudur Rahman', 'Maksudur Rahman', 'shahadatshanto169@gmail.com', '01865756443', '12-A', '10th', 'Networking', '2021-02-04', 'Mr. Maksudur Rahman', '2021-02-18 09:10:47'),
	(2, 'Mr. Maksudur Rahman', 'Maksudur Rahman', 'shahadatshanto169@gmail.com', '01876545643', '13-A', '9th', 'Database', '2021-02-10', 'Mr. Maksudur Rahman', '2021-02-18 09:12:30'),
	(3, 'Mr. Maksudur Rahman', 'Maksudur Rahman', 'shahadatshanto169@gmail.com', '01876657543', '14-B', '8th', 'Software Engineering', '2021-02-09', 'Mr. Maksudur Rahman', '2021-02-18 09:17:32'),
	(4, 'Emam Hossain', 'Emam', 'emamhossain@gmail.com', '01875674633', '12-B', '4th', 'OOP', '2021-02-18', 'Mr. Maksudur Rahman', '2021-02-20 19:30:48');
/*!40000 ALTER TABLE `tb_assign_course_teacher` ENABLE KEYS */;


-- Dumping structure for table oas.tb_attendance
DROP TABLE IF EXISTS `tb_attendance`;
CREATE TABLE IF NOT EXISTS `tb_attendance` (
  `attendance_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) DEFAULT NULL,
  `trimester` varchar(255) DEFAULT NULL,
  `course_title` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `attendance` varchar(255) DEFAULT NULL,
  `attendance_date` varchar(255) DEFAULT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COMMENT='section,trimester,course_title,student_id,attendance,attendance_date,teacher_name,entry_time';

-- Dumping data for table oas.tb_attendance: ~27 rows (approximately)
DELETE FROM `tb_attendance`;
/*!40000 ALTER TABLE `tb_attendance` DISABLE KEYS */;
INSERT INTO `tb_attendance` (`attendance_id`, `section`, `trimester`, `course_title`, `student_id`, `attendance`, `attendance_date`, `teacher_name`, `entry_time`) VALUES
	(1, '12-A', '10th', 'Networking', 'CSE 012 05953', 'present', '2021-02-01', 'Maksudur Rahman', '2021-02-18 10:00:04'),
	(2, '12-A', '10th', 'Networking', 'CSE 012 05934', 'present', '2021-02-01', 'Maksudur Rahman', '2021-02-18 10:00:04'),
	(3, '12-A', '10th', 'Networking', 'CSE 012 05935', 'absent', '2021-02-01', 'Maksudur Rahman', '2021-02-18 10:00:04'),
	(4, '12-A', '10th', 'Networking', 'CSE 012 05953', 'present', '2021-02-02', 'Maksudur Rahman', '2021-02-18 10:08:02'),
	(5, '12-A', '10th', 'Networking', 'CSE 012 05934', 'absent', '2021-02-02', 'Maksudur Rahman', '2021-02-18 10:08:02'),
	(6, '12-A', '10th', 'Networking', 'CSE 012 05935', 'present', '2021-02-02', 'Maksudur Rahman', '2021-02-18 10:08:02'),
	(7, '12-A', '10th', 'Networking', 'CSE 012 05953', 'present', '2021-02-03', 'Maksudur Rahman', '2021-02-18 10:08:27'),
	(8, '12-A', '10th', 'Networking', 'CSE 012 05934', 'present', '2021-02-03', 'Maksudur Rahman', '2021-02-18 10:08:27'),
	(9, '12-A', '10th', 'Networking', 'CSE 012 05935', 'present', '2021-02-03', 'Maksudur Rahman', '2021-02-18 10:08:27'),
	(10, '13-A', '9th', 'Database', 'CSE 013 05943', 'present', '2021-02-01', 'Maksudur Rahman', '2021-02-18 10:09:20'),
	(11, '13-A', '9th', 'Database', 'CSE 013 05945', 'present', '2021-02-01', 'Maksudur Rahman', '2021-02-18 10:09:20'),
	(12, '13-A', '9th', 'Database', 'CSE 013 05947', 'absent', '2021-02-01', 'Maksudur Rahman', '2021-02-18 10:09:20'),
	(13, '13-A', '9th', 'Database', 'CSE 013 05943', 'absent', '2021-02-02', 'Maksudur Rahman', '2021-02-18 10:09:50'),
	(14, '13-A', '9th', 'Database', 'CSE 013 05945', 'present', '2021-02-02', 'Maksudur Rahman', '2021-02-18 10:09:50'),
	(15, '13-A', '9th', 'Database', 'CSE 013 05947', 'present', '2021-02-02', 'Maksudur Rahman', '2021-02-18 10:09:50'),
	(19, '12-A', '10th', 'Networking', 'CSE 012 05953', 'present', '2021-02-04', 'Maksudur Rahman', '2021-02-18 12:26:21'),
	(20, '12-A', '10th', 'Networking', 'CSE 012 05934', 'present', '2021-02-04', 'Maksudur Rahman', '2021-02-18 12:26:21'),
	(21, '12-A', '10th', 'Networking', 'CSE 012 05935', 'present', '2021-02-04', 'Maksudur Rahman', '2021-02-18 12:26:21'),
	(22, '12-A', '10th', 'Networking', 'CSE 012 05953', 'present', '2021-02-05', 'Maksudur Rahman', '2021-02-18 17:09:49'),
	(23, '12-A', '10th', 'Networking', 'CSE 012 05934', 'absent', '2021-02-05', 'Maksudur Rahman', '2021-02-18 17:09:49'),
	(24, '12-A', '10th', 'Networking', 'CSE 012 05935', 'present', '2021-02-05', 'Maksudur Rahman', '2021-02-18 17:09:49'),
	(25, '12-A', '10th', 'Networking', 'CSE 012 05953', 'absent', '2021-02-06', 'Maksudur Rahman', '2021-02-20 19:15:45'),
	(26, '12-A', '10th', 'Networking', 'CSE 012 05934', 'absent', '2021-02-06', 'Maksudur Rahman', '2021-02-20 19:15:45'),
	(27, '12-A', '10th', 'Networking', 'CSE 012 05935', 'present', '2021-02-06', 'Maksudur Rahman', '2021-02-20 19:15:45'),
	(28, '12-A', '10th', 'Networking', 'CSE 012 05953', 'present', '2021-02-07', 'Maksudur Rahman', '2021-02-21 07:57:16'),
	(29, '12-A', '10th', 'Networking', 'CSE 012 05934', 'present', '2021-02-07', 'Maksudur Rahman', '2021-02-21 07:57:16'),
	(30, '12-A', '10th', 'Networking', 'CSE 012 05935', 'present', '2021-02-07', 'Maksudur Rahman', '2021-02-21 07:57:16');
/*!40000 ALTER TABLE `tb_attendance` ENABLE KEYS */;


-- Dumping structure for table oas.tb_course
DROP TABLE IF EXISTS `tb_course`;
CREATE TABLE IF NOT EXISTS `tb_course` (
  `course_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `course_title` varchar(255) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table oas.tb_course: ~4 rows (approximately)
DELETE FROM `tb_course`;
/*!40000 ALTER TABLE `tb_course` DISABLE KEYS */;
INSERT INTO `tb_course` (`course_id`, `course_title`, `course_code`, `user_name`, `entry_time`) VALUES
	(1, 'Networking', 'CSE 423', 'Mr. Maksudur Rahman', '2021-02-17 16:39:53'),
	(2, 'Database', 'CSE 442', 'Mr. Maksudur Rahman', '2021-02-17 16:45:08'),
	(3, 'Software Engineering', 'CSE 332', 'Mr. Maksudur Rahman', '2021-02-17 16:45:42'),
	(4, 'OOP', 'CSE 223', 'Mr. Maksudur Rahman', '2021-02-17 21:59:38');
/*!40000 ALTER TABLE `tb_course` ENABLE KEYS */;


-- Dumping structure for table oas.tb_section
DROP TABLE IF EXISTS `tb_section`;
CREATE TABLE IF NOT EXISTS `tb_section` (
  `section_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table oas.tb_section: ~7 rows (approximately)
DELETE FROM `tb_section`;
/*!40000 ALTER TABLE `tb_section` DISABLE KEYS */;
INSERT INTO `tb_section` (`section_id`, `section`, `user_name`, `entry_time`) VALUES
	(1, '12-A', 'Mr. Maksudur Rahman', '2021-02-17 21:12:01'),
	(3, '12-B', 'Mr. Maksudur Rahman', '2021-02-17 16:14:24'),
	(4, '13-A', 'Mr. Maksudur Rahman', '2021-02-17 16:14:34'),
	(5, '13-B', 'Mr. Maksudur Rahman', '2021-02-17 16:14:47'),
	(6, '14-A', 'Mr. Maksudur Rahman', '2021-02-17 16:14:58'),
	(7, '14-B', 'Mr. Maksudur Rahman', '2021-02-17 16:15:11'),
	(8, '15-A', 'Mr. Maksudur Rahman', '2021-02-17 16:15:46');
/*!40000 ALTER TABLE `tb_section` ENABLE KEYS */;


-- Dumping structure for table oas.tb_student
DROP TABLE IF EXISTS `tb_student`;
CREATE TABLE IF NOT EXISTS `tb_student` (
  `s_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table oas.tb_student: ~6 rows (approximately)
DELETE FROM `tb_student`;
/*!40000 ALTER TABLE `tb_student` DISABLE KEYS */;
INSERT INTO `tb_student` (`s_id`, `name`, `email`, `phone`, `address`, `section`, `student_id`, `image`, `user_name`, `entry_time`) VALUES
	(1, 'Md Belal Uddin', 'belal@gmail.com', '01876765453', 'Chittagong', '12-A', 'CSE 012 05953', 'student_images/deed32d0c8b12851705f6e63582c6561profile.png', 'Mr. Maksudur Rahman', '2021-02-18 09:35:50'),
	(2, 'Jahed Hasan', 'jahed@gmail.com', '01876545474', 'Feni', '12-A', 'CSE 012 05934', 'student_images/3cd89618698ee85ff70b7ae62998fadaprofile.png', 'Mr. Maksudur Rahman', '2021-02-18 09:37:06'),
	(3, 'Shahadat Santo', 'santo@gmail.com', '01876565439', 'Comilla', '12-A', 'CSE 012 05935', 'student_images/dd7de02e51921464dafd31f6e34e4c89profile.png', 'Mr. Maksudur Rahman', '2021-02-18 09:37:58'),
	(4, 'Abir Mahmud', 'abir@gmail.com', '01876565433', 'Noakhali', '13-A', 'CSE 013 05943', 'student_images/56c33ca38a54771898bee6d4cb3dfe0cpost.png', 'Mr. Maksudur Rahman', '2021-02-18 09:39:11'),
	(5, 'Rifat', 'rifat@gmail.com', '01876545433', 'Chittagong', '13-A', 'CSE 013 05945', 'student_images/1fb40c57568b82a5ee3f34c34beca2d6post.png', 'Mr. Maksudur Rahman', '2021-02-18 09:39:56'),
	(6, 'Forhad Uddin', 'forhad@gmai.com', '01876545476', 'Chittagong', '13-A', 'CSE 013 05947', 'student_images/03cbf9a71668173435c4cb1d385fa825post.png', 'Mr. Maksudur Rahman', '2021-02-18 09:40:47');
/*!40000 ALTER TABLE `tb_student` ENABLE KEYS */;


-- Dumping structure for table oas.tb_teacher
DROP TABLE IF EXISTS `tb_teacher`;
CREATE TABLE IF NOT EXISTS `tb_teacher` (
  `teacher_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table oas.tb_teacher: ~2 rows (approximately)
DELETE FROM `tb_teacher`;
/*!40000 ALTER TABLE `tb_teacher` DISABLE KEYS */;
INSERT INTO `tb_teacher` (`teacher_id`, `name`, `email`, `phone`, `address`, `qualification`, `image`, `user_name`, `password`, `added_by`, `entry_time`) VALUES
	(1, 'Mr Maksudur Rahman', 'maksudurrahman@gmail.com', '01876765433', 'Comilla', 'M.Sc. In CSE', 'teacher_images/16f0bc1cc6e5b4c0d8d5f43031169ec6feedback.png', 'Maksudur Rahman', '123', 'Mr. Maksudur Rahman', '2021-02-22 01:25:57'),
	(3, 'Emam Hossain', 'emamhossain@gmail.com', '01876565433', 'Chittagong', 'M.Sc. In CSE', 'teacher_images/16a808f1c7d76b1873477b8b59627e21profile.png', 'Emam', '12345', 'Mr. Maksudur Rahman', '2021-02-20 19:29:22');
/*!40000 ALTER TABLE `tb_teacher` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
