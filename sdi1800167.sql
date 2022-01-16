-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 12:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdi1800167`
--

CREATE DATABASE sdi1800167;

USE sdi1800167;


-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'France'),
(2, 'Germany'),
(3, 'Italy');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `greekDepts_id` int(11) NOT NULL COMMENT 'foreign key to greekDepts'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `greekDepts_id`) VALUES
(1, 'greek language', 1),
(2, 'organic chemistry', 3),
(3, 'modern history', 2);

-- --------------------------------------------------------

--
-- Table structure for table `foreigndepts`
--

CREATE TABLE `foreigndepts` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `foreignUnis_id` int(11) NOT NULL COMMENT 'foreign key to foreignUnis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foreigndepts`
--

INSERT INTO `foreigndepts` (`id`, `name`, `foreignUnis_id`) VALUES
(1, 'chemistry', 1),
(2, 'history', 2),
(3, 'modern languages', 3);

-- --------------------------------------------------------

--
-- Table structure for table `foreignunis`
--

CREATE TABLE `foreignunis` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `countries_id` int(11) NOT NULL COMMENT 'foreign key to countries'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foreignunis`
--

INSERT INTO `foreignunis` (`id`, `name`, `countries_id`) VALUES
(1, 'Sorbonne', 1),
(2, 'Universität München', 2),
(3, 'Bologna', 3);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `eduLevel` enum('under','master','phd') DEFAULT NULL,
  `identity` varchar(50) DEFAULT NULL,
  `diploma` varchar(50) DEFAULT NULL,
  `certificate` varchar(50) DEFAULT NULL,
  `status` enum('saved','waiting','accepted','rejected','pending') NOT NULL,
  `rejectReason` mediumtext DEFAULT NULL,
  `users_id` int(11) NOT NULL COMMENT 'foreign key to users',
  `foreignDepts_id` int(11) DEFAULT NULL COMMENT 'foreign key to foreignDepts',
  `greekDepts_id` int(11) DEFAULT NULL COMMENT 'foreign key to greekDepts'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `eduLevel`, `identity`, `diploma`, `certificate`, `status`, `rejectReason`, `users_id`, `foreignDepts_id`, `greekDepts_id`) VALUES
(1, 'under', NULL, NULL, NULL, 'saved', NULL, 1, NULL, NULL),
(2, 'under', NULL, NULL, NULL, 'accepted', NULL, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `form_has_courses`
--

CREATE TABLE `form_has_courses` (
  `forms_id` int(11) NOT NULL,
  `courses_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `greekdepts`
--

CREATE TABLE `greekdepts` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `greekUnis_id` int(11) NOT NULL COMMENT 'foreign key to greekUnis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `greekdepts`
--

INSERT INTO `greekdepts` (`id`, `name`, `greekUnis_id`) VALUES
(1, 'modern languages', 1),
(2, 'history', 1),
(3, 'chemistry', 2);

-- --------------------------------------------------------

--
-- Table structure for table `greekunis`
--

CREATE TABLE `greekunis` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `greekunis`
--

INSERT INTO `greekunis` (`id`, `name`) VALUES
(1, 'EKPA'),
(2, 'APTH');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `birthDay` int(11) NOT NULL,
  `birthMonth` int(11) NOT NULL,
  `birthYear` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `address`, `gender`, `birthDay`, `birthMonth`, `birthYear`, `email`, `phone`, `username`, `password`, `isAdmin`) VALUES
(1, 'Acel', 'Moulin ', 'rue lecoubre 1', 'm', 10, 11, 1999, 'acel@gmail.com', '1234567890', 'acel1', '12345', 0),
(2, 'Lukas', 'Müller', 'Hofgraben 12', 'm', 8, 3, 1998, 'Lukas@gmail.com', '9876543211', 'Lukas', '12345', 0),
(3, 'Maria', 'Nikolopoulou', 'Athinas 10', 'f', 3, 8, 1990, 'maria@gmail.com', '1234567899', 'maria', '12345', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foreigndepts`
--
ALTER TABLE `foreigndepts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foreignunis`
--
ALTER TABLE `foreignunis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_has_courses`
--
ALTER TABLE `form_has_courses`
  ADD PRIMARY KEY (`forms_id`,`courses_id`);

--
-- Indexes for table `greekdepts`
--
ALTER TABLE `greekdepts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `greekunis`
--
ALTER TABLE `greekunis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foreigndepts`
--
ALTER TABLE `foreigndepts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foreignunis`
--
ALTER TABLE `foreignunis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `greekdepts`
--
ALTER TABLE `greekdepts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `greekunis`
--
ALTER TABLE `greekunis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
