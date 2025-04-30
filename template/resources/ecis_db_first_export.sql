-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 27, 2025 at 05:46 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `auditlogs`
--

DROP TABLE IF EXISTS `auditlogs`;
CREATE TABLE IF NOT EXISTS `auditlogs` (
  `log_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `device_info` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

DROP TABLE IF EXISTS `children`;
CREATE TABLE IF NOT EXISTS `children` (
  `child_id` int NOT NULL AUTO_INCREMENT,
  `registration_number` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `address` text,
  `village` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `registered_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`child_id`),
  UNIQUE KEY `registration_number` (`registration_number`),
  KEY `registered_by` (`registered_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `childvaccinations`
--

DROP TABLE IF EXISTS `childvaccinations`;
CREATE TABLE IF NOT EXISTS `childvaccinations` (
  `vaccination_id` int NOT NULL AUTO_INCREMENT,
  `child_id` int NOT NULL,
  `vaccine_id` int NOT NULL,
  `scheduled_date` date NOT NULL,
  `administered_date` date DEFAULT NULL,
  `status` enum('pending','completed','missed') DEFAULT 'pending',
  `administered_by` int DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`vaccination_id`),
  KEY `child_id` (`child_id`),
  KEY `vaccine_id` (`vaccine_id`),
  KEY `administered_by` (`administered_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `growthrecords`
--

DROP TABLE IF EXISTS `growthrecords`;
CREATE TABLE IF NOT EXISTS `growthrecords` (
  `record_id` int NOT NULL AUTO_INCREMENT,
  `child_id` int NOT NULL,
  `checkup_date` date NOT NULL,
  `weight_kg` decimal(5,2) DEFAULT NULL,
  `height_cm` decimal(5,2) DEFAULT NULL,
  `head_circumference_cm` decimal(5,2) DEFAULT NULL,
  `recorded_by` int DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`record_id`),
  KEY `child_id` (`child_id`),
  KEY `recorded_by` (`recorded_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offlineaccesslogs`
--

DROP TABLE IF EXISTS `offlineaccesslogs`;
CREATE TABLE IF NOT EXISTS `offlineaccesslogs` (
  `log_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `child_id` int DEFAULT NULL,
  `action` enum('check_vaccine','update_record','request_info') NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `ussd_session_id` varchar(50) DEFAULT NULL,
  `input_text` text,
  `response_text` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`),
  KEY `child_id` (`child_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
CREATE TABLE IF NOT EXISTS `reminders` (
  `reminder_id` int NOT NULL AUTO_INCREMENT,
  `child_id` int NOT NULL,
  `vaccination_id` int DEFAULT NULL,
  `reminder_type` enum('sms','email','mobile_push','ussd') NOT NULL,
  `scheduled_time` timestamp NOT NULL,
  `sent_time` timestamp NULL DEFAULT NULL,
  `status` enum('pending','sent','failed') DEFAULT 'pending',
  `recipient_phone` varchar(20) DEFAULT NULL,
  `recipient_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`reminder_id`),
  KEY `child_id` (`child_id`),
  KEY `vaccination_id` (`vaccination_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','doctor','nurse','parent') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

DROP TABLE IF EXISTS `vaccines`;
CREATE TABLE IF NOT EXISTS `vaccines` (
  `vaccine_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `recommended_age_days` int NOT NULL,
  `booster_required` tinyint(1) DEFAULT '0',
  `booster_interval_days` int DEFAULT NULL,
  PRIMARY KEY (`vaccine_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
