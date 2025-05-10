-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2025 at 11:29 AM
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
-- Database: `neocare`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

DROP TABLE IF EXISTS `audit_log`;
CREATE TABLE IF NOT EXISTS `audit_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `record_id` int DEFAULT NULL,
  `old_values` text,
  `new_values` text,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

DROP TABLE IF EXISTS `children`;
CREATE TABLE IF NOT EXISTS `children` (
  `id` int NOT NULL AUTO_INCREMENT,
  `child_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `ward` varchar(100) DEFAULT NULL,
  `hospital_id` int DEFAULT NULL,
  `registration_number` varchar(100) DEFAULT NULL,
  `street_chairman_name` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `weight_on_birth` decimal(5,2) DEFAULT NULL,
  `height_on_birth` decimal(5,2) DEFAULT NULL,
  `twin_status` enum('twin','single') DEFAULT 'single',
  `birth_rank` int DEFAULT NULL,
  `previous_sibling_birth_date` date DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registration_number` (`registration_number`),
  KEY `parent_id` (`parent_id`),
  KEY `hospital_id` (`hospital_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `child_name`, `mother_name`, `birth_date`, `street`, `ward`, `hospital_id`, `registration_number`, `street_chairman_name`, `father_name`, `weight_on_birth`, `height_on_birth`, `twin_status`, `birth_rank`, `previous_sibling_birth_date`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Jireh Lucas ', 'Lorriane Tito', '2025-05-09', 'Masaki', 'Masaki', NULL, 'TImR000123', 'Mpotwa Amarino', 'Lucas Joseph', 2.90, 49.50, 'single', 1, '0000-00-00', NULL, '2025-05-01 19:49:25', '2025-05-01 19:49:25'),
(2, 'Job Lucas ', 'Lorriane Tito', '2031-06-16', 'Masaki', 'Masaki', NULL, 'TImR000124', 'Mpotwa Amarino', 'Lucas Joseph', 2.90, 49.50, 'single', 1, '2028-06-16', NULL, '2025-05-02 01:49:13', '2025-05-02 01:49:13'),
(3, 'Mary Lucas ', 'Lorriane Tito', '2035-06-16', 'Masaki', 'Masaki', NULL, 'TImR000126', NULL, 'Lucas Joseph', 2.90, 49.50, 'single', NULL, NULL, NULL, '2025-05-02 01:59:20', '2025-05-05 07:00:10'),
(4, 'Metro', 'Mother', '2025-05-15', 'Masaki', 'Masaki', 3, 'TImR000127', 'Mpotwa Amarino', 'father', 2.90, 49.50, 'single', 3, '2025-05-05', NULL, '2025-05-05 10:13:35', '2025-05-05 10:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `child_medical_records`
--

DROP TABLE IF EXISTS `child_medical_records`;
CREATE TABLE IF NOT EXISTS `child_medical_records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `child_id` int NOT NULL,
  `vaccination_date` date NOT NULL,
  `vaccine_id` int NOT NULL,
  `age` int DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `observations` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `child_id` (`child_id`),
  KEY `vaccine_id` (`vaccine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `child_medical_records`
--

INSERT INTO `child_medical_records` (`id`, `child_id`, `vaccination_date`, `vaccine_id`, `age`, `weight`, `height`, `observations`, `created_at`) VALUES
(1, 4, '2025-05-06', 21, 2, 23.00, 6.00, 'nothing', '2025-05-05 12:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE IF NOT EXISTS `hospitals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(100) NOT NULL,
  `hospital_address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `hospital_email` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `license_number` varchar(50) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `license_number` (`license_number`),
  UNIQUE KEY `hospital_email` (`hospital_email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `hospital_name`, `hospital_address`, `phone_number`, `hospital_email`, `region`, `district`, `license_number`, `website`, `created_at`, `updated_at`) VALUES
(2, 'Hope Health Hospital', 'Ubungo , Dar es salaam', '0677112273', 'info@hopehealth.co.tz', 'Dar es Salaam', 'Dar es Salaam', 'HOSP-003-2023', 'https://mbeyaspecialistclinic.com', '2025-04-28 12:50:28', '2025-04-29 06:45:39'),
(3, 'BOCHI HOSPITAL', 'Mbezi Kwa Msuguli , Dar es salaam', '0677112273', 'bochihospital@gmail.com', 'Dar es Salaam', 'Ubungo', 'HOSP-007-2025', 'https://bochi.com', '2025-05-02 01:54:50', '2025-05-02 01:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
CREATE TABLE IF NOT EXISTS `reminders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `message` text NOT NULL,
  `reminder_date` date NOT NULL,
  `sent` tinyint(1) DEFAULT '0',
  `child_id` int DEFAULT NULL,
  `vaccine_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `child_id` (`child_id`),
  KEY `vaccine_id` (`vaccine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('super_admin','hospital_admin','doctor','nurse','parent') NOT NULL,
  `hospital_id` int DEFAULT NULL,
  `license_number` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `ward` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `street_chairman_name` varchar(100) DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `license_number` (`license_number`),
  KEY `hospital_id` (`hospital_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `hospital_id`, `license_number`, `phone_number`, `address`, `ward`, `street`, `street_chairman_name`, `specialization`, `is_active`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@neocare.com', 'password', 'super_admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(2, 'Hospital Admin', 'admin@neocarehospital.com', 'password', 'hospital_admin', NULL, NULL, '+255712345678', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-04-28 12:04:42', '2025-04-28 12:04:42'),
(3, 'joseph nestory lucas', 'lucasscrew16@gmail.com', '$2y$10$Onv5doA/idx/vhzDBI9Y5.vHNmPZKiDjDEHs0IOG1Zq6u9ZFIePdm', 'hospital_admin', 2, NULL, '0758507862', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-04-29 11:47:31', '2025-04-29 11:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_schedule`
--

DROP TABLE IF EXISTS `vaccination_schedule`;
CREATE TABLE IF NOT EXISTS `vaccination_schedule` (
  `id` int NOT NULL AUTO_INCREMENT,
  `child_id` int NOT NULL,
  `vaccine_id` int NOT NULL,
  `scheduled_date` date NOT NULL,
  `administered_date` date DEFAULT NULL,
  `status` enum('pending','completed','missed') DEFAULT 'pending',
  `administered_by` int DEFAULT NULL,
  `remarks` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `child_id` (`child_id`),
  KEY `vaccine_id` (`vaccine_id`),
  KEY `administered_by` (`administered_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

DROP TABLE IF EXISTS `vaccines`;
CREATE TABLE IF NOT EXISTS `vaccines` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vaccine_name` varchar(100) NOT NULL,
  `child_age` varchar(50) NOT NULL,
  `vaccine_type` varchar(100) NOT NULL,
  `description` text,
  `recommended_dose` varchar(100) DEFAULT NULL,
  `side_effects` text,
  `is_mandatory` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vaccine_name` (`vaccine_name`,`child_age`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`id`, `vaccine_name`, `child_age`, `vaccine_type`, `description`, `recommended_dose`, `side_effects`, `is_mandatory`, `created_at`, `updated_at`) VALUES
(1, 'BCG', 'At birth', 'Live attenuated', 'Protects against tuberculosis', 'Single dose', 'Mild swelling or soreness at injection site', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(3, 'Hepatitis B', 'At birth', 'Recombinant', 'Protects against Hepatitis B', 'First dose', 'Mild fever or soreness at injection site', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(4, 'Pentavalent 1', '6 weeks', 'Combination', 'Protects against Diphtheria, Tetanus, Pertussis, Hepatitis B, and Hib', 'First dose', 'Fever, swelling at injection site', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(5, 'PCV 1', '6 weeks', 'Conjugate', 'Pneumococcal conjugate vaccine', 'First dose', 'Mild fever, irritability', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(6, 'Rotavirus 1', '6 weeks', 'Live attenuated', 'Protects against rotavirus diarrhea', 'First dose', 'Mild diarrhea or irritability', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(7, 'IPV 1', '14 weeks', 'Inactivated', 'Inactivated polio vaccine', 'First dose', 'Mild fever or soreness', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(8, 'Pentavalent 2', '10 weeks', 'Combination', 'Second dose', 'Second dose', 'Fever, swelling at injection site', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(9, 'PCV 2', '10 weeks', 'Conjugate', 'Second dose', 'Second dose', 'Mild fever, irritability', 1, '2025-04-28 12:04:39', '2025-04-29 10:54:30'),
(10, 'Rotavirus 2', '10 weeks', 'Live attenuated', 'Second dose', 'Second dose', 'Mild diarrhea or irritability', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(11, 'Pentavalent 3', '14 weeks', 'Combination', 'Third dose', 'Third dose', 'Fever, swelling at injection site', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(12, 'PCV 3', '14 weeks', 'Conjugate', 'Third dose', 'Third dose', 'Mild fever, irritability', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(13, 'IPV 2', '14 weeks', 'Inactivated', 'Second dose', 'Second dose', 'Mild fever or soreness', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(14, 'Measles-Rubella 1', '9 months', 'Live attenuated', 'Protects against measles and rubella', 'First dose', 'Fever, mild rash', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(15, 'Yellow Fever', '9 months', 'Live attenuated', 'Protects against yellow fever', 'Single dose', 'Mild fever, headache', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(16, 'Measles-Rubella 2', '18 months', 'Live attenuated', 'Second dose', 'Second dose', 'Fever, mild rash', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(17, 'DPT Booster 1', '18 months', 'Combination', 'Diphtheria, Tetanus, Pertussis booster', 'First booster', 'Fever, swelling at injection site', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(18, 'OPV Booster', '18 months', 'Live attenuated', 'Polio booster', 'Booster dose', 'Rarely, mild diarrhea', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(19, 'DPT Booster 2', '5 years', 'Combination', 'Second booster', 'Second booster', 'Fever, swelling at injection site', 1, '2025-04-28 12:04:39', '2025-04-28 12:04:39'),
(21, 'BBQ', '6 weeks', 'Live attandance', 'volatile', 'First dose', 'headache', 1, '2025-04-29 07:45:52', '2025-04-29 07:45:52');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD CONSTRAINT `audit_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `children_ibfk_2` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reminders_ibfk_2` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reminders_ibfk_3` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `vaccination_schedule`
--
ALTER TABLE `vaccination_schedule`
  ADD CONSTRAINT `vaccination_schedule_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vaccination_schedule_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccines` (`id`),
  ADD CONSTRAINT `vaccination_schedule_ibfk_3` FOREIGN KEY (`administered_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
