-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 01:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ntma_stud`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_files`
--

CREATE TABLE `students_files` (
  `id` bigint(20) NOT NULL,
  `year` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `profile_file_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_files`
--

INSERT INTO `students_files` (`id`, `year`, `name`, `email`, `address`, `age`, `birthday`, `gender`, `course`, `status`, `profile_file_data`) VALUES
(1, '2020', 'Taylor Swift', 'taylor@yahoo.com', 'Manila, Philippines', '22', '2000-10-05', 'Female', 'BSME', 'Active', '4782-Databases-_-MySQLIntroduction (2).pdf'),
(10198, '2007', 'Alyanna Cruz', 'alyanac.@gmail.com', 'Mamatid Cabuyao, Laguna', '27', '1996-01-29', 'Female', 'BSMT', 'Alumni', '5039-Databases-_-MySQLIntroduction (1).pdf,8102-Databases-_-MySQLIntroduction (2).pdf,6048-Databases-_-MySQLIntroduction.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students_files`
--
ALTER TABLE `students_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students_files`
--
ALTER TABLE `students_files`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10199;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
