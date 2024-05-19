-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 09:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `house_no`
--

CREATE TABLE `house_no` (
  `house_no_id` int(11) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `worda_id` int(11) DEFAULT NULL,
  `kebela_id` int(11) DEFAULT NULL,
  `mender_id` int(11) DEFAULT NULL,
  `house_no` varchar(50) DEFAULT NULL,
  `house_map` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recorded_by` varchar(50) NOT NULL,
  `recorded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house_no`
--

INSERT INTO `house_no` (`house_no_id`, `region_id`, `zone_id`, `worda_id`, `kebela_id`, `mender_id`, `house_no`, `house_map`, `description`, `recorded_by`, `recorded_time`) VALUES
(24, NULL, NULL, 847, 26, 31, 'Testworda7', 'uploads/photo_2023-08-22_16-54-47.jpg', 'Testworda888', 'UserU@gmail.com', '2024-05-18 19:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `kebela`
--

CREATE TABLE `kebela` (
  `kebela_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `worda_id` int(11) NOT NULL,
  `kebela_name` varchar(255) NOT NULL,
  `kebela_map` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recorded_by` varchar(50) NOT NULL,
  `recorded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kebela`
--

INSERT INTO `kebela` (`kebela_id`, `region_id`, `zone_id`, `worda_id`, `kebela_name`, `kebela_map`, `description`, `recorded_by`, `recorded_time`) VALUES
(26, 109, 145, 847, 'Testworda3', 'uploads/photo_2023-08-22_16-54-47.jpg', 'Testworda3', 'UserU@gmail.com', '2024-05-18 19:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `mender`
--

CREATE TABLE `mender` (
  `mender_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `worda_id` int(11) NOT NULL,
  `kebela_id` int(11) NOT NULL,
  `mender_name` varchar(255) NOT NULL,
  `mender_map` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recorded_by` varchar(50) NOT NULL,
  `recorded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mender`
--

INSERT INTO `mender` (`mender_id`, `region_id`, `zone_id`, `worda_id`, `kebela_id`, `mender_name`, `mender_map`, `description`, `recorded_by`, `recorded_time`) VALUES
(31, 109, 145, 847, 26, 'Testworda5', 'uploads/photo_2023-08-22_16-54-47.jpg', 'Testworda5', 'UserU@gmail.com', '2024-05-18 19:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `region_flag` varchar(255) DEFAULT NULL,
  `region_map` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recorded_by` varchar(50) NOT NULL DEFAULT 'session',
  `recorded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `region_name`, `region_flag`, `region_map`, `description`, `recorded_by`, `recorded_time`) VALUES
(109, 'Addis Ababa (city)', 'uploads/photo_2023-08-22_16-54-47.jpg', 'uploads/Addis_Ababa_in_Ethiopia_(special_marker).svg.png', 'Addis Ababa ', 'remedanhyeredin@gmail.com', '2024-05-14 09:11:47'),
(111, 'Afar Region', 'uploads/photo_2023-08-22_17-01-47.jpg', 'uploads/Afar_in_Ethiopia.svg.png', 'Semera', 'BerketB@gmail.com', '2024-05-14 09:11:47'),
(112, 'Amhara Region', 'uploads/photo_2023-08-22_17-03-56.jpg', 'uploads/Amhara_in_Ethiopia.svg.png', 'Bahir Dar', 'remedanhyeredin@gmail.com', '2024-05-14 09:11:47'),
(113, 'Benishangul-Gumuz Region', 'uploads/photo_2023-08-22_17-05-08.jpg', 'uploads/Benishangul-Gumuz_in_Ethiopia.svg.png', 'Asosa', 'RedwanM@gmail.com', '2024-05-14 09:11:47'),
(114, 'Dire Dawa (city)', 'uploads/Flag_of_Dire_Dawa.png', 'uploads/Dire_Dawa_in_Ethiopia_(special_marker).svg.png', 'Dire Dawa', 'SalhadinH@gmail.com', '2024-05-14 09:11:47'),
(115, 'Gambela Region', 'uploads/photo_2023-08-22_17-09-04.jpg', 'uploads/Gambela_in_Ethiopia.svg.png', 'Gambela', 'remedanhyeredin@gmail.com', '2024-05-14 09:11:47'),
(116, 'Harari Region', 'uploads/photo_2023-08-22_17-11-13.jpg', 'uploads/Harari_in_Ethiopia_(special_marker).svg.png', 'Harar', 'remedanhyeredin@gmail.com', '2024-05-14 09:11:47'),
(117, 'Oromia Region', 'uploads/photo_2023-08-22_17-13-24.jpg', 'uploads/Oromia_in_Ethiopia.svg.png', 'Addis Ababa', 'remedanhyeredin@gmail.com', '2024-05-14 09:11:47'),
(118, 'Sidama Region', 'uploads/Flag_of_Sidama.svg.png', 'uploads/Sidama_Region_in_Ethiopia.svg.png', 'Hawassa', 'remedanhyeredin@gmail.com', '2024-05-14 09:11:47'),
(119, 'Somali Region', 'uploads/Flag_of_the_Somali_Region_(1994-2008,_2018-).svg.png', 'uploads/Somali_Region_Map.svg.png', 'Jijiga', 'remedanhyeredin@gmail.com', '2024-05-14 09:11:47'),
(120, 'South West Ethiopia Peoples Region', 'uploads/Flag_of_South_West_Ethiopia.svg.png', 'uploads/South_West_Region_in_Ethiopia.svg.png', 'Bonga', 'remedanhyeredin@gmail.com', '2024-05-14 09:11:47'),
(121, 'Southern Nations, Nationalities, and Peoples Region', 'uploads/snnpf.png', 'uploads/snnp.png', 'Hawassa', 'remedanhyeredin@gmail.com', '2024-05-14 09:11:47'),
(122, 'Tigray Region', 'uploads/Flag_of_the_Tigray_Region.svg.png', 'uploads/Tigray_in_Ethiopia.svg.png', 'Mekele', 'remedanhyeredin@gmail.com', '2024-05-14 09:11:47'),
(123, 'test100', 'uploads/photo_2023-08-22_16-54-47.jpg', 'uploads/photo_2023-08-22_16-54-47.jpg', 'test100', 'SalhadinH@gmail.com', '2024-05-18 19:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `temp_house_no`
--

CREATE TABLE `temp_house_no` (
  `house_no_id` int(11) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `worda_id` int(11) DEFAULT NULL,
  `kebela_id` int(11) DEFAULT NULL,
  `mender_id` int(11) DEFAULT NULL,
  `house_no` varchar(50) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recorded_by` varchar(50) NOT NULL,
  `recorded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_house_no`
--

INSERT INTO `temp_house_no` (`house_no_id`, `region_id`, `zone_id`, `worda_id`, `kebela_id`, `mender_id`, `house_no`, `map`, `description`, `recorded_by`, `recorded_time`) VALUES
(7, 109, 145, 847, 26, 31, 'Testworda8', 'uploads/photo_2023-08-22_16-54-47.jpg', 'Testworda8', 'UserU@gmail.com', '2024-05-18 19:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `temp_kebela`
--

CREATE TABLE `temp_kebela` (
  `kebela_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `worda_id` int(11) NOT NULL,
  `kebela_name` varchar(255) NOT NULL,
  `kebela_map` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recorded_by` varchar(50) NOT NULL,
  `recorded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_kebela`
--

INSERT INTO `temp_kebela` (`kebela_id`, `region_id`, `zone_id`, `worda_id`, `kebela_name`, `kebela_map`, `description`, `recorded_by`, `recorded_time`) VALUES
(11, 109, 145, 847, 'Testworda4', 'uploads/photo_2023-08-22_16-54-47.jpg', 'Testworda4', 'UserU@gmail.com', '2024-05-18 18:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `temp_mender`
--

CREATE TABLE `temp_mender` (
  `mender_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `worda_id` int(11) NOT NULL,
  `kebela_id` int(11) NOT NULL,
  `mender_name` varchar(255) NOT NULL,
  `mender_map` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recorded_by` varchar(50) NOT NULL,
  `recorded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_mender`
--

INSERT INTO `temp_mender` (`mender_id`, `region_id`, `zone_id`, `worda_id`, `kebela_id`, `mender_name`, `mender_map`, `description`, `recorded_by`, `recorded_time`) VALUES
(9, 109, 145, 847, 26, 'Testworda6', 'uploads/photo_2023-08-22_16-54-47.jpg', 'Testworda6', 'UserU@gmail.com', '2024-05-18 19:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `temp_region`
--

CREATE TABLE `temp_region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `region_flag` varchar(255) DEFAULT NULL,
  `region_map` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recorded_by` varchar(50) NOT NULL,
  `recorded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_worda`
--

CREATE TABLE `temp_worda` (
  `worda_id` int(11) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `worda_name` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recorded_by` varchar(50) NOT NULL,
  `recorded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_worda`
--

INSERT INTO `temp_worda` (`worda_id`, `region_id`, `zone_id`, `worda_name`, `map`, `description`, `recorded_by`, `recorded_time`) VALUES
(8, NULL, 145, 'TESTworda', 'uploads/photo_2023-08-22_16-54-47.jpg', 'TESTworda', 'UserU@gmail.com', '2024-05-18 18:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `temp_zone`
--

CREATE TABLE `temp_zone` (
  `zone_id` int(11) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `zone_map` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recorded_by` varchar(50) NOT NULL,
  `recorded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_super_admin` tinyint(4) NOT NULL DEFAULT 0,
  `role` varchar(20) NOT NULL DEFAULT 'contributor',
  `userimage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `date_of_birth`, `sex`, `occupation`, `education_level`, `registration_date`, `is_super_admin`, `role`, `userimage`) VALUES
(11, 'Remedan Hyeredin', 'remedanhyeredin@gmail.com', '$2y$10$SvD/guibmwxa161X.Ad7sOHBabnBc8P2Okoba6HW3mhSziCkKHKmC', '2018-03-01', 'Male', 'student', 'College/University', '2023-08-04 05:48:24', 2, 'contributor', 'uploads/1.png\r\n'),
(28, 'ADMIN', 'ADMIN@gmail.com', '$2y$10$STRREIohc2TFqfZGPUXPSO9OOw/qfBsSnSmENY5zorIsz4WxUBCdO', '2023-09-01', 'Male', 'teacher', 'Postgraduate', '2023-08-14 13:39:14', 2, 'contributor', 'uploads/Admin-Profile-Vector-PNG-Image (1).png'),
(30, 'RemedanH', 'RemedanH@gmail.com', '$2y$10$7YtAQ/QXP5f.XaSp34AEPeF3QF.chZi579V7JoI9JQQNZBi7Nt6OC', '2002-11-08', 'Male', 'Student', 'College/University', '2024-05-18 13:04:44', 0, 'contributor', 'Admin/uploads/photo_2024-05-18_15-28-28.jpg'),
(31, 'RedwanM', 'RedwanM@gmail.com', '$2y$10$0K2z2TnYmO68oM1w0oJ9.ucdTyulGS1KnsP.MZ25wlO0TAwPoWGJq', '2000-03-02', 'Male', 'Student', 'College/University', '2024-05-18 13:07:25', 2, 'contributor', 'Admin/uploads/120627579.jpg'),
(32, 'BerketB', 'BerketB@gmail.com', '$2y$10$7.eB6rTM94uErXCzcbUfKOHoWOnAyRgdOpnxNX/ceofMbPYY8PvWO', '2001-11-21', 'Male', 'Student', 'College/University', '2024-05-18 13:09:17', 1, 'contributor', 'Admin/uploads/129153741.png'),
(33, 'SalhadinH', 'SalhadinH@gmail.com', '$2y$10$I3R4/znffPRcg8mTBUgyR.BuLMsNi0Oydewl/9EYYJf9JPyTKgL4m', '2003-08-07', 'Male', 'Student', 'College/University', '2024-05-18 13:11:26', 1, 'contributor', 'Admin/uploads/photo_2024-05-18_15-28-42.jpg'),
(34, 'UserU', 'UserU@gmail.com', '$2y$10$RVFot1YSx4zNXzkqRbRMGefAM6msv7teLSRPYgT3qx70QgQMvwXKG', '2024-05-09', 'Male', 'Student', 'Postgraduate', '2024-05-18 17:02:49', 0, 'contributor', 'Admin/uploads/user-icon-jpg-28.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `worda`
--

CREATE TABLE `worda` (
  `worda_id` int(11) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `worda_name` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recorded_by` varchar(50) NOT NULL,
  `recorded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `worda`
--

INSERT INTO `worda` (`worda_id`, `region_id`, `zone_id`, `worda_name`, `map`, `description`, `recorded_by`, `recorded_time`) VALUES
(35, 113, 56, 'Asosa ', 'uploads/assosaworda.png', 'Asosa is a woreda in Benishangul-Gumuz Region, Ethiopia. Part of the Asosa Zone', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(36, 113, 56, 'Bambasi ', 'uploads/assosaworda.png', 'Bambasi is a woreda in the Benishangul-Gumuz Region of Ethiopia. Part of the Asosa Zone', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(37, 113, 56, 'Komesha', 'uploads/assosaworda.png', 'Komesha is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia. Part of the Asosa Zone,', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(38, 113, 56, 'Kurmuk ', 'uploads/assosaworda.png', 'Kurmuk is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(39, 113, 56, 'Menge', 'uploads/assosaworda.png', 'Menge is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(40, 113, 56, 'Oda Buldigilu', 'uploads/assosaworda.png', 'Oda Buldigilu is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(41, 113, 56, 'Sherkole', 'uploads/assosaworda.png', 'Sherkole is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(42, 113, 57, 'Agalo Mite ', 'uploads/mkemashi.png', 'Agalo Mite is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(43, 113, 57, 'Bolo Jiganfo', 'uploads/mkemashi.png', 'Bolo Jiganfo is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz region of Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(44, 113, 57, 'Kamashi ', 'uploads/mkemashi.png', 'Kamashi is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(45, 113, 57, 'Sirba Abbay', 'uploads/mkemashi.png', 'Sirba Abbay is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(46, 113, 57, 'Yaso', 'uploads/mkemashi.png', 'Yaso is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz region of Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(47, 113, 58, 'Bullen', 'uploads/mmetekel.png', 'Bullen is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(48, 113, 58, 'Dangur', 'uploads/mmetekel.png', 'Dangur is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(49, 113, 58, 'Dibate', 'uploads/mmetekel.png', 'Dibate is a woreda in the Benishangul-Gumuz Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(50, 113, 58, 'Guba', 'uploads/mmetekel.png', 'Guba is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(51, 113, 58, 'Mandura ', 'uploads/mmetekel.png', 'Mandura is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(52, 113, 58, 'Wenbera', 'uploads/mmetekel.png', 'Wenbera is one of the 20 Districts of Ethiopia, or woredas, in the Benishangul-Gumuz Region of Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(53, 113, 59, 'Mao-Komo', 'uploads/sp RW.png', 'Mao-Komo is a woreda in Benishangul-Gumuz Region, Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(54, 113, 59, 'Pawe', 'uploads/sp RW.png', 'Pawe is one of the 20 woredas in the Benishangul-Gumuz Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(55, 122, 60, 'Tanqua Abergele', 'uploads/cmap.png', 'Tanqua Abergele is one of the Districts of Ethiopia, or woredas, in the Tigray Region of Ethiopia', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(56, 122, 60, 'Adwa', 'uploads/cmap.png', 'Adwa is a woreda in Tigray Region, Ethiopia. Part of the Maekelay Zone, ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(57, 122, 60, 'Adwa Town', 'uploads/cmap.png', 'Adwa is a town and separate woreda in Tigray Region,', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(58, 122, 60, 'Axum', 'uploads/cmap.png', 'Axum, or Aksum, is a town in the Tigray Region of Ethiopia with a population of 66,900 residents.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(59, 122, 60, 'Kola Tembien', 'uploads/cmap.png', 'Kola Tembien is a woreda in Tigray Region, Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(60, 122, 60, 'Lailay Maychew', 'uploads/cmap.png', 'Lailay Maychew is a woreda in Tigray Region, Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(61, 122, 60, 'Mereb Lehe', 'uploads/cmap.png', 'Mereb Lehe is a woreda in Tigray Region, Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(62, 122, 60, 'Naeder Adet ', 'uploads/cmap.png', 'Naeder Adet is a woreda in Tigray Region, Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(63, 122, 60, 'Naeder Adet', 'uploads/cmap.png', 'Naeder Adet is a woreda in Tigray Region, Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(64, 122, 60, 'Tahtay Maychew', 'uploads/cmap.png', 'Tahtay Maychew is a woreda in Tigray Region, Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(65, 122, 60, 'Tanqua Millash', 'uploads/cmap.png', 'Tanqua Millash is a district in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(66, 122, 60, 'Werie Lehe', 'uploads/cmap.png', 'Werie Lehe was one of the woredas in the Tigray Region of Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(67, 122, 61, 'Adigrat', 'uploads/ermap.png', 'Adigrat is a city and separate woreda in Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(68, 122, 61, 'Atsbi Wemberta', 'uploads/ermap.png', 'Atsbi Wemberta is one of the Districts of Ethiopia, or woredas, in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(69, 122, 61, 'Ganta Afeshum', 'uploads/ermap.png', 'Ganta Afeshum is one of the Districts of Ethiopia, or woredas, in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(70, 122, 61, 'Gulomakeda', 'uploads/ermap.png', 'Gulomakeda is one of the Districts of Ethiopia, or woredas, in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(71, 122, 61, 'Hawzen', 'uploads/ermap.png', 'Hawzen is an Ethiopian District or woreda in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(72, 122, 61, 'Irob ', 'uploads/ermap.png', 'Irob is a district or woreda in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(73, 122, 61, 'Kilte Awulaelo', 'uploads/ermap.png', 'Kilte Awulaelo is one of the Districts of Ethiopia, or woredas, in the Tigray Region of Ethiopia', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(74, 122, 61, 'Saesi Tsaedaemba', 'uploads/ermap.png', 'Saesi Tsaedaemba is one of the Districts of Ethiopia, or woredas, in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(75, 122, 61, 'Wukro', 'uploads/ermap.png', 'Wukro  is a town and separate woreda in Tigray, Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(76, 122, 62, 'Dogua Tembien', 'uploads/saemap.png', 'Dogua Tembien is a woreda in Tigray Region, Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(77, 122, 62, 'Enderta ', 'uploads/saemap.png', 'Enderta is one of the Districts of Ethiopia or woredas in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(78, 122, 62, 'Hintalo Wajirat', 'uploads/saemap.png', 'Hintalo Wajirat is one of the Districts of Ethiopia or woredas in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(79, 122, 62, 'Saharti Samre', 'uploads/saemap.png', 'Saharti Samre is one of the Districts of Ethiopia, or woredas, in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(80, 122, 63, 'Alaje', 'uploads/saemap.png', 'Alaje is a District of Ethiopia, or woreda, in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(81, 122, 63, 'Alamata', 'uploads/saemap.png', 'Alamata is a woreda in Tigray Region, Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(82, 122, 63, 'Endamekoni', 'uploads/saemap.png', 'Endamekoni is one of the Districts of Ethiopia, or woredas, in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(83, 122, 63, 'Korem', 'uploads/saemap.png', 'Korem', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(84, 122, 63, 'Maychew', 'uploads/saemap.png', 'Maychew, also Maichew, is a town and woreda in the Tigray Region of Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(85, 122, 63, 'Ofla', 'uploads/saemap.png', 'Ofla is one of the Districts of Ethiopia, or woredas, in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(86, 122, 63, 'Raya Azebo', 'uploads/saemap.png', 'Raya Azebo is a district in the Tigray region of Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(87, 122, 64, 'Kafta Humera', 'uploads/wamapp.png', 'Kafta Humera is a woreda in Tigray Region, Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(88, 122, 64, 'Tsegede', 'uploads/wamapp.png', 'Tsegede is a woreda in Tigray Region, Ethiopia', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(89, 122, 64, 'Welkait ', 'uploads/wamapp.png', 'Welkait is a woreda in Western Zone, Tigray Region.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(90, 122, 65, 'Tsimbla ', 'uploads/nawmapp.png', 'Tsimbla is a woreda in Tigray Region, Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(91, 122, 65, 'Lailay Adiyabo ', 'uploads/nawmapp.png', 'Lailay Adiyabo is a woreda in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(92, 122, 65, 'Medebay', 'uploads/nawmapp.png', 'Medebay Zana is an Ethiopian District or woreda in the Tigray Region of Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(93, 122, 65, 'Sheraro ', 'uploads/nawmapp.png', 'Sheraro is a town and separate woreda in Tigray, Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(94, 122, 65, 'Shire', 'uploads/nawmapp.png', 'Shire, also known as Shire Inda Selassie, is a city and separate woreda in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(95, 122, 65, 'Tahtay Adiyabo', 'uploads/nawmapp.png', 'Tahtay Adiyabo is a woreda in the Tigray Region of Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(96, 122, 65, 'Tahtai Koraro', 'uploads/nawmapp.png', 'Tahtai Koraro is a woreda in Tigray Region, Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(97, 122, 65, 'Tselemti ', 'uploads/nawmapp.png', 'Tselemti is an Ethiopian District, or woreda, in the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(98, 122, 65, 'Tsimbla', 'uploads/nawmapp.png', 'Tsimbla is a woreda in Tigray Region, Ethiopia. ', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(99, 122, 66, 'Mekelle', 'uploads/nawmapp.png', 'Mekelle, or Mekele, is a special zone and capital of the Tigray Region of Ethiopia.', 'BerketB@gmail.com', '2024-05-15 23:41:12'),
(101, 111, 95, 'Adaar', 'uploads/afar.png', 'It is a worda in Afar Zone', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(102, 111, 95, 'Afambo', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(103, 111, 95, 'Asayita', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(104, 111, 95, 'Chifra', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(105, 111, 95, 'Dubti', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(106, 111, 95, 'Elidar', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(107, 111, 95, 'Kori', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(108, 111, 95, 'Mille', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(109, 111, 96, 'Abala', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(110, 111, 96, 'Afdera', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(111, 111, 96, 'Berhale', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(112, 111, 96, 'Bidu', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(113, 111, 96, 'Dallol', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(114, 111, 96, 'Erebti', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(115, 111, 96, 'Koneba', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(116, 111, 96, 'Megale', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(117, 111, 97, 'Amibara', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(118, 111, 97, 'Awash Fentale', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(120, 111, 97, 'Bure Mudaytu', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(122, 111, 97, 'Dulecha', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(123, 111, 97, 'Gewane', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(124, 111, 98, 'Aura', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(125, 111, 98, 'Ewa', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(126, 111, 98, 'Gulina', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(127, 111, 98, 'Teru', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(128, 111, 98, 'Yalo', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(129, 111, 99, 'Dalifage', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(130, 111, 99, 'Dewe', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(131, 111, 99, 'Hadele Ele', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(132, 111, 99, 'Simurobi Gelealo', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(133, 111, 99, 'Telalak', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(134, 111, 101, 'Argobba', 'uploads/afar.png', 'It is a worda in Afar Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(135, 112, 102, 'Ankasha Guagusa', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(136, 112, 102, 'Banja Shekudad', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(137, 112, 102, 'Dangila', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(138, 112, 102, 'Faggeta Lekoma', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(139, 112, 102, 'Guagusa Shekudad', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(140, 112, 102, 'Guangua', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(141, 112, 102, 'Jawi', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(142, 112, 103, 'Aneded', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(143, 112, 103, 'Awabel', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(144, 112, 103, 'Baso Liben', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(145, 112, 103, 'Bibugn', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(146, 112, 103, 'Debay Telatgen', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(147, 112, 103, 'Debre Elias', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(148, 112, 103, 'Debre Markos Town', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(149, 112, 103, 'Dejen', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(150, 112, 103, 'Enarj Enawga', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(151, 112, 103, 'Enbise Sar Midir', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(152, 112, 103, 'Enemay', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(153, 112, 103, 'Goncha', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(154, 112, 103, 'Goncha Siso Enese', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(155, 112, 103, 'Gozamin', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(156, 112, 103, 'Hulet Ej Enese', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(157, 112, 103, 'Machakel', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(158, 112, 103, 'Shebel Berenta', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(159, 112, 103, 'Sinan', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(160, 112, 105, 'Addi Arkay', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(161, 112, 105, 'Alefa', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(162, 112, 105, 'Beyeda', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(163, 112, 105, 'Chilga', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(164, 112, 105, 'Dabat', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(165, 112, 105, 'Debarq', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(166, 112, 105, 'Dembiya', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(167, 112, 105, 'Gondar Town', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(168, 112, 105, 'Gondar Zuria', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(169, 112, 105, 'Jan Amora', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(170, 112, 105, 'Lay Armachiho', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(171, 112, 105, 'Metemma', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(172, 112, 105, 'Mirab Armachiho', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(173, 112, 105, 'Mirab Belessa', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(174, 112, 105, 'Misraq Belessa', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(175, 112, 105, 'Qwara', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(176, 112, 105, 'Tach Armachiho', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(177, 112, 105, 'Takusa', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(178, 112, 105, 'Tegeda', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(179, 112, 105, 'Tselemt', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(180, 112, 105, 'Wegera', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(181, 112, 106, 'Angolalla Tera', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(182, 112, 106, 'Ankober', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(183, 112, 106, 'Antsokiyana Gemza', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(184, 112, 106, 'Asagirt', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(185, 112, 106, 'Basona Werana', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(186, 112, 106, 'Berehet', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(187, 112, 106, 'Debre Birhan Town', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(188, 112, 106, 'Efratana Gidim', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(189, 112, 106, 'Ensaro', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(190, 112, 106, 'Gishe', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(191, 112, 106, 'Hagere Mariamna Kesem', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(192, 112, 106, 'Kewet', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(193, 112, 106, 'Minjarna Shenkora', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(194, 112, 106, 'Menz Gera Midir', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(195, 112, 106, 'Menz Keya Gebreal', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(196, 112, 106, 'Menz Lalo Midir', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(197, 112, 106, 'Menz Mam Midir', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(198, 112, 106, 'Merhabete', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(199, 112, 106, 'Mida Woremo', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(200, 112, 106, 'Mojana Wadera', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(201, 112, 106, 'Moretna Jiru', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(202, 112, 106, 'Siyadebrina Wayu', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(203, 112, 106, 'Termaber', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(204, 112, 107, 'Bugna', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(205, 112, 107, 'Dawunt', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(206, 112, 107, 'Delanta', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(207, 112, 107, 'Gidan', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(208, 112, 107, 'Guba Lafto', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(209, 112, 107, 'Habru', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(210, 112, 107, 'Kobo', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(211, 112, 107, 'Lasta', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(212, 112, 107, 'Meket', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(213, 112, 107, 'Wadla', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(214, 112, 107, 'Weldiya Town', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(215, 112, 104, 'Artuma Fursi', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(216, 112, 104, 'Baati', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(217, 112, 104, 'Dawa Chaffa', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(218, 112, 104, 'Dawa Harewa', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(219, 112, 104, 'Jilee Dhummuugaa', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(220, 112, 104, 'Kemise Town', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(221, 112, 108, 'Debre Tabor Town', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(222, 112, 108, 'Dera', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(223, 112, 108, 'Ebenat', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(224, 112, 108, 'Farta', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(225, 112, 108, 'Fogera', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(226, 112, 108, 'Lay Gayint', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(227, 112, 108, 'Libo Kemekem', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(228, 112, 108, 'Mirab Este', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(229, 112, 108, 'Misraq Este', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(230, 112, 108, 'Simada', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(231, 112, 108, 'Tach Gayint', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(232, 112, 109, 'Abuko', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(233, 112, 109, 'Amba Sel', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(234, 112, 109, 'Debre Sina', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(235, 112, 109, 'Dessie Town', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(236, 112, 109, 'Dessie Zuria', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(237, 112, 109, 'Jama', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(238, 112, 109, 'Kalu', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(239, 112, 109, 'Kelela', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(240, 112, 109, 'Kombolcha Town', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(241, 112, 109, 'Kutaber', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(242, 112, 109, 'Legahida', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(243, 112, 109, 'Legambo', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(244, 112, 109, 'Mekdela', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(245, 112, 109, 'Mehal Sayint', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(246, 112, 109, 'Sayint Tehuledere', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(247, 112, 109, 'Tenta', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(248, 112, 109, 'Wegde', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(249, 112, 109, 'Were Babu', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(250, 112, 109, 'Were Ilu', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(251, 112, 110, 'Abergele', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(252, 112, 110, 'Dehana', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(253, 112, 110, 'Gazbibla', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(254, 112, 110, 'Sehala', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(255, 112, 110, 'Soqota', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(256, 112, 110, 'Soqota Town', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(257, 112, 110, 'Zikuala', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(258, 112, 111, 'Bahir Dar Zuria', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(259, 112, 111, 'Bure', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(260, 112, 111, 'Dega Damot', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(261, 112, 111, 'Debub Achefer', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(262, 112, 111, 'Dembecha', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(263, 112, 111, 'Jabi Tehnan', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(264, 112, 111, 'Finote Selam Town', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(265, 112, 111, 'Kuarit', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(266, 112, 111, 'Mecha', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(267, 112, 111, 'Sekela', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(268, 112, 111, 'Semien Achefer', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(269, 112, 111, 'Wemberma', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(270, 112, 111, 'Yilmana Densa', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(272, 112, 112, 'Bahir Dar', 'uploads/am.png', 'It is a worda in Amhara Zone', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(273, 115, 113, 'Abwobo', 'uploads/ga.png', 'It is a worda found in Gambela region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(274, 115, 113, 'Dimma', 'uploads/ga.png', 'It is a worda found in Gambela region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(275, 115, 113, 'Gambela', 'uploads/ga.png', 'It is a worda found in Gambela region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(276, 115, 113, 'Gog', 'uploads/ga.png', 'It is a worda found in Gambela region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(277, 115, 113, 'Jor', 'uploads/ga.png', 'It is a worda found in Gambela region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(278, 115, 114, 'Akobo', 'uploads/ga.png', 'It is a worda found in Gambela region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(279, 115, 114, 'Jikaw', 'uploads/ga.png', 'It is a worda found in Gambela region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(280, 115, 114, 'Lare', 'uploads/ga.png', 'It is a worda found in Gambela region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(281, 115, 114, 'Wentawo', 'uploads/ga.png', 'It is a worda found in Gambela region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(282, 115, 115, 'Godere', 'uploads/ga.png', 'It is a worda found in Gambela region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(283, 115, 115, 'Mengesh', 'uploads/ga.png', 'It is a worda found in Gambela region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(284, 115, 116, 'Itang', 'uploads/ga.png', 'It is a worda found in Gambela region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(285, 116, 73, 'Amir-Nur Woreda', 'uploads/harr.png', 'It is a woreda found in Harari region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(286, 116, 73, 'Abadir Woreda', 'uploads/harr.png', 'It is a woreda found in Harari region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(287, 116, 73, 'Shenkor Woreda', 'uploads/harr.png', 'It is a woreda found in Harari region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(288, 116, 73, 'Jin\'Eala Woreda', 'uploads/harr.png', 'It is a woreda found in Harari region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(289, 116, 73, 'Aboker Woreda', 'uploads/harr.png', 'It is a woreda found in Harari region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(290, 116, 73, 'Hakim Woreda', 'uploads/harr.png', 'It is a woreda found in Harari region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(291, 116, 74, 'Sofi Woreda', 'uploads/harr.png', 'It is a woreda found in Harari region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(292, 116, 74, 'Erer Woreda', 'uploads/harr.png', 'It is a woreda found in Harari region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(293, 116, 74, 'Dire-Teyara Woreda', 'uploads/harr.png', 'It is a woreda found in Harari region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(294, 117, 75, 'Aminya', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(295, 117, 75, 'Aseko', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(296, 117, 75, 'Asella Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(297, 117, 75, 'Bale Gasegar', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(298, 117, 75, 'Batu Dugda', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(299, 117, 75, 'Chole', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(300, 117, 75, 'Digeluna Tijo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'SalhadinH@gmail.com', '2024-05-15 23:41:12'),
(301, 117, 75, 'Diksis', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(302, 117, 75, 'Dodota', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(303, 117, 75, 'Enkelo Wabe', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(304, 117, 75, 'Gololcha', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(305, 117, 75, 'Guna', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(306, 117, 75, 'Hitosa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(307, 117, 75, 'Jeju', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(308, 117, 75, 'Limuna Bilbilo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(309, 117, 75, 'Lude Hitosa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(310, 117, 75, 'Merti', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(311, 117, 75, 'Munesa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(312, 117, 75, 'Robe', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(313, 117, 75, 'Seru', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(314, 117, 75, 'Sire', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(315, 117, 75, 'Sherka', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(316, 117, 75, 'Sude', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(317, 117, 75, 'Tena', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(318, 117, 75, 'Tiyo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(319, 117, 76, 'Agarfa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(320, 117, 76, 'Berbere', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(321, 117, 76, 'Dawe Kachen', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(322, 117, 76, 'Dawe Serara', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(323, 117, 76, 'Delo Menna', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(324, 117, 76, 'Dinsho', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(325, 117, 76, 'Gasera', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(326, 117, 76, 'Ginir', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(327, 117, 76, 'Goba', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(328, 117, 76, 'Goba Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(329, 117, 76, 'Gololcha', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(330, 117, 76, 'Goro', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(331, 117, 76, 'Guradamole', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(332, 117, 76, 'Harena Buluk', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(333, 117, 76, 'Legehida', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(334, 117, 76, 'Meda Welabu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(335, 117, 76, 'Raytu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(336, 117, 76, 'Robe Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(337, 117, 76, 'Seweyna', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(338, 117, 76, 'Sinana', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(339, 117, 77, 'Abaya', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(340, 117, 77, 'Arero', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(341, 117, 77, 'Bule Hora', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(342, 117, 77, 'Dillo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(343, 117, 77, 'Dire', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(344, 117, 77, 'Dugda Dawa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(345, 117, 77, 'Gelana', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(346, 117, 77, 'Gomole', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(347, 117, 77, 'Malka Soda', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(348, 117, 77, 'Miyu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(349, 117, 77, 'MoyaleTeltele', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(350, 117, 77, 'Yabelo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(351, 117, 78, 'Bedele', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(352, 117, 79, 'Babile', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(353, 117, 79, 'Badeno', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(354, 117, 79, 'Chinaksen', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(355, 117, 79, 'Dadar', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(356, 117, 79, 'Fedis', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(357, 117, 79, 'Girawa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(358, 117, 79, 'Gola Oda', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(359, 117, 79, 'Goro Gutu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(360, 117, 79, 'Gursum', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(361, 117, 79, 'Haro Maya', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(362, 117, 79, 'Jarso', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(363, 117, 79, 'Kersa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(364, 117, 79, 'Kombolcha', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(365, 117, 79, 'Kurfa Chele', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(366, 117, 79, 'Malka Balo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(367, 117, 79, 'Meyumuluke', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(368, 117, 79, 'Meta', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(369, 117, 79, 'Midega Tola', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(370, 117, 80, 'Adaa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(371, 117, 80, 'Adami Tullu and Jido Kombolcha', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(372, 117, 80, 'Batu town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(373, 117, 80, 'Bishoftu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(374, 117, 80, 'Bora', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(375, 117, 80, 'Boset', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(376, 117, 80, 'Dugda', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(377, 117, 80, 'Fentale', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(378, 117, 80, 'GimbichuLiben', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(379, 117, 80, 'Lome', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(380, 117, 80, 'Nannawa Adama', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(381, 117, 81, 'Bonaya Boshe', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(382, 117, 81, 'Diga', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(383, 117, 81, 'Gida Kiremu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(384, 117, 81, 'Gobu Seyo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(385, 117, 81, 'Gudeya Bila', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(386, 117, 81, 'Guto Gida', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(387, 117, 81, 'Haro Limmu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(388, 117, 81, 'Ibantu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(389, 117, 81, 'Jimma', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(390, 117, 81, 'Arjo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(391, 117, 81, 'Leka Dulecha', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(392, 117, 81, 'Limmu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(393, 117, 81, 'Nekemte', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(394, 117, 81, 'Nunu Kumba', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(395, 117, 81, 'Sasiga', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(396, 117, 81, 'Sibu Sire', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(397, 117, 81, 'Wama Hagalo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(398, 117, 81, 'Wayu Tuka', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(399, 117, 82, 'Adola', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(400, 117, 82, 'Adola Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(401, 117, 82, 'Ana Sora', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(402, 117, 82, 'Bore', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(403, 117, 82, 'Dima', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(404, 117, 82, 'Girja', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12');
INSERT INTO `worda` (`worda_id`, `region_id`, `zone_id`, `worda_name`, `map`, `description`, `recorded_by`, `recorded_time`) VALUES
(405, 117, 82, 'Hambela Wamena', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(406, 117, 82, 'Harenfema', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(407, 117, 82, 'Kercha', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(408, 117, 82, 'Liben', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(409, 117, 82, 'Negele Borana', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(410, 117, 82, 'Odo Shakiso', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(411, 117, 82, 'Uraga', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(412, 117, 82, 'Wadera', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(413, 117, 83, 'Abay Chomen', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(414, 117, 83, 'Abe Dongoro', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(415, 117, 83, 'Amuru', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(416, 117, 83, 'Guduru', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(417, 117, 83, 'Hababo Guduru', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(418, 117, 83, 'Horo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(419, 117, 83, 'Jardega Jarte', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(420, 117, 83, 'Jimma Genete', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(421, 117, 83, 'Jimma Rare', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(422, 117, 83, 'Shambu Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(423, 117, 84, 'Ale', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(424, 117, 84, 'Alge Sache', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(425, 117, 84, 'Bedele Zuria', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(426, 117, 84, 'Bedele Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(427, 117, 84, 'Bicho', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(428, 117, 84, 'Bilo Nopha', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(429, 117, 84, 'Borecha', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(430, 117, 84, 'Bure', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(431, 117, 84, 'Chewaka', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(432, 117, 84, 'Chora', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(433, 117, 84, 'Dabo Hana', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(434, 117, 84, 'Darimu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(435, 117, 84, 'Dega', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(436, 117, 84, 'Didessa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(437, 117, 84, 'Didu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(438, 117, 84, 'Doreni', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(439, 117, 84, 'Gechi', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(440, 117, 84, 'Huka Halu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(441, 117, 84, 'Hurumu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(442, 117, 84, 'Mako', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(443, 117, 84, 'Metu Zuria', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(444, 117, 84, 'Metu Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(445, 117, 84, 'Nono Sele', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(446, 117, 84, 'Supena Sodo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(447, 117, 84, 'Yayu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(448, 117, 85, 'Agaro Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(449, 117, 85, 'Chora Botor', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(450, 117, 85, 'Dedo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(451, 117, 85, 'Gera', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(452, 117, 85, 'Gomma', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(453, 117, 85, 'Guma', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(454, 117, 85, 'Kersa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(455, 117, 85, 'Limmu Sakka', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(456, 117, 85, 'Limmu Kosa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(457, 117, 85, 'Mana', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(458, 117, 85, 'Omo Nada', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(459, 117, 85, 'Seka Chekorsa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(460, 117, 85, 'Setema', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(461, 117, 85, 'Shebe Senbo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(462, 117, 85, 'Sigmo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(463, 117, 85, 'Sokoru', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(464, 117, 85, 'Tiro Afeta', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(465, 117, 86, 'Anfillo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(466, 117, 86, 'Dale Sedi', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(467, 117, 86, 'Dale Wabera', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(468, 117, 86, 'Dembidolo Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(469, 117, 86, 'Gawo Kebe', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(470, 117, 86, 'Gidami', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(471, 117, 86, 'Hawa Gelan', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(472, 117, 86, 'Jimma Horo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(473, 117, 86, 'Lalo Kile', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(474, 117, 86, 'Sayo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(475, 117, 86, 'Yemalogi Welele', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(476, 117, 87, 'Abichu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(477, 117, 87, 'Aleltu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(478, 117, 87, 'Degem', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(479, 117, 87, 'Dera', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(480, 117, 87, 'Fiche Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(481, 117, 87, 'Gerar Jarso', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(482, 117, 87, 'Hidabu Abote', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(483, 117, 87, 'Jido', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(484, 117, 87, 'Kembibit', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(485, 117, 87, 'Kuyu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(486, 117, 87, 'Liban', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(487, 117, 87, 'Wara Jarso', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(488, 117, 87, 'Wuchale', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(489, 117, 87, 'Yaya Gulele', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(490, 117, 88, 'Amaya', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(491, 117, 88, 'Becho', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(492, 117, 88, 'Dawo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(493, 117, 88, 'Elu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(494, 117, 88, 'Goro', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(495, 117, 88, 'Kersana Malima', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(496, 117, 88, 'Seden Sodo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(497, 117, 88, 'Sodo Dacha', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(498, 117, 88, 'Tole', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(499, 117, 88, 'Waliso', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(500, 117, 88, 'Waliso Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(501, 117, 88, 'Wanchi', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(502, 117, 89, 'Adaba', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(503, 117, 89, 'Arsi Negele', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(504, 117, 89, 'Dodola', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(505, 117, 89, 'Gedeb Asasa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(506, 117, 89, 'Kofele', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(507, 117, 89, 'Kokosa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(508, 117, 89, 'Kore', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(509, 117, 89, 'Naannawa Shashamane', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(510, 117, 89, 'Nensebo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(511, 117, 89, 'Seraro', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(512, 117, 89, 'Shala', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(513, 117, 89, 'Shashamane Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(514, 117, 90, 'Bule Hora', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(515, 117, 91, 'Badessa Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(516, 117, 91, 'Boke', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(517, 117, 91, 'Char char', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(518, 117, 91, 'Chiro Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(519, 117, 91, 'Daru labu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(520, 117, 91, 'Doba', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(521, 117, 91, 'Gamachis', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(522, 117, 91, 'Guba Koricha', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(523, 117, 91, 'Habro', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(524, 117, 91, 'Kuni', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(525, 117, 91, 'Masela', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(526, 117, 91, 'Mieso', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(527, 117, 91, 'Nannawa Chiro', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(528, 117, 91, 'Tulo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(529, 117, 92, 'Abuna Ginde Beret', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(530, 117, 92, 'Adda Berga', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(531, 117, 92, 'Ambo Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(532, 117, 92, 'Bako Tibe', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(533, 117, 92, 'Cheliya', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(534, 117, 92, 'Dano', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(535, 117, 92, 'Dendi', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(536, 117, 92, 'Dire Enchini', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(537, 117, 92, 'Ejerie', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(538, 117, 92, 'Elfata', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(539, 117, 92, 'Ginde Beret', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(540, 117, 92, 'Gurraacha Enchini', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(541, 117, 92, 'Jeldu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(542, 117, 92, 'Jibat', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(543, 117, 92, 'Meta Robi', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(544, 117, 92, 'Midakegn', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(545, 117, 92, 'Naannawa Ambo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(546, 117, 92, 'NonoToke Kutaye', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(547, 117, 93, 'Ayra', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(548, 117, 93, 'Babo Gambela', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(549, 117, 93, 'Begi', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(550, 117, 93, 'Boji Chokorsa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(551, 117, 93, 'Boji Dirmaji', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(552, 117, 93, 'Genji', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(553, 117, 93, 'Gimbi', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(554, 117, 93, 'Gimbi Town', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(555, 117, 93, 'Guliso', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(556, 117, 93, 'Haru', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(557, 117, 93, 'Homa', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(558, 117, 93, 'Jarso', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(559, 117, 93, 'Kondala', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(560, 117, 93, 'Kiltu Kara', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(561, 117, 93, 'Lalo Asabi', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(562, 117, 93, 'Mana Sibu', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(563, 117, 93, 'Nejo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(564, 117, 93, 'Nole Kaba', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(565, 117, 93, 'Sayo Nole', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(566, 117, 93, 'Yubdo', 'uploads/oromia.jpg', 'It is a worda in Oromia region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(567, 109, 94, 'Akaki', 'uploads/aa.png', 'It is a worda in Addis Ababa', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(568, 109, 94, 'Bereh', 'uploads/aa.png', 'It is a worda in Addis Ababa', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(569, 109, 94, 'Burayu Town', 'uploads/aa.png', 'It is a worda in Addis Ababa', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(570, 109, 94, 'Holeta Town', 'uploads/aa.png', 'It is a worda in Addis Ababa', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(571, 109, 94, 'Koye Feche', 'uploads/aa.png', 'It is a worda in Addis Ababa', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(572, 109, 94, 'Mulo', 'uploads/aa.png', 'It is a worda in Addis Ababa', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(573, 109, 94, 'Sebeta Hawas', 'uploads/aa.png', 'It is a worda in Addis Ababa', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(574, 109, 94, 'Sendafa Town', 'uploads/aa.png', 'It is a worda in Addis Ababa', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(575, 109, 94, 'Sululta', 'uploads/aa.png', 'It is a worda in Addis Ababa', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(576, 109, 94, 'Walmara', 'uploads/aa.png', 'It is a worda in Addis Ababa', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(577, 117, 156, 'Jimma', 'uploads/oromia.jpg', 'Jimma', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(578, 118, 117, 'Aleta Chuko', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(579, 118, 117, 'Aleta Wondo', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(580, 118, 117, 'Arbegona', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(581, 118, 117, 'Aroresa', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(582, 118, 117, 'Hawassa Zuria', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(583, 118, 117, 'Bensa', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(584, 118, 117, 'Bona Zuria', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(585, 118, 117, 'Boricha', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(586, 118, 117, 'Bursa', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(587, 118, 117, 'Chere', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(588, 118, 117, 'Dale', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(589, 118, 117, 'Dara', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(590, 118, 117, 'Gorche', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(591, 118, 117, 'Hawassa', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(592, 118, 117, 'Hula', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(593, 118, 117, 'Loko Abaya', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(594, 118, 117, 'Malga', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(595, 118, 117, 'Shebedino', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(596, 118, 117, 'Wonsho', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(597, 118, 117, 'Wondo Genet', 'uploads/si.png', 'It is a worda in Sidama region', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(598, 119, 118, 'Afder', 'uploads/so.png', 'It is a worda in Somali', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(599, 119, 118, 'Bare', 'uploads/so.png', 'It is a worda in Somali', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(600, 119, 118, 'Chereti', 'uploads/so.png', 'It is a worda in Somali', 'RedwanM@gmail.com', '2024-05-15 23:41:12'),
(601, 119, 118, 'Dolobay', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(602, 119, 118, 'Elekere', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(603, 119, 118, 'God', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(604, 119, 118, 'Harge', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(605, 119, 118, 'lleIligdheere', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(606, 119, 118, 'Mirab Imi', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(607, 119, 118, 'Raaso', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(608, 119, 118, 'Qooxle', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(609, 119, 125, 'Hudet', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(610, 119, 125, 'Moyale', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(611, 119, 125, 'Mubaarak', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(612, 119, 125, 'Qadhaadhumo', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(613, 119, 119, 'Boh', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(614, 119, 119, 'Danot', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(615, 119, 119, 'Daratole', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(616, 119, 119, 'Gal-Hamur', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(617, 119, 119, 'Geladin', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(618, 119, 119, 'Lehel-Yucub', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(619, 119, 119, 'Warder', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(620, 119, 120, 'Fiq', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(621, 119, 120, 'Lagahida', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(622, 119, 120, 'Mayaa-muluqo', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(623, 119, 120, 'Qubi', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(624, 119, 120, 'Salahad', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(625, 119, 120, 'Waangaay', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(626, 119, 120, 'Xamaro', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(627, 119, 120, 'Yaxoob', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(628, 119, 121, 'Awbare', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(629, 119, 121, 'Babille', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(630, 119, 121, 'Goljano', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(631, 119, 121, 'Gursum', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(632, 119, 121, 'Harawo', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(633, 119, 121, 'Haroorayso', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(634, 119, 121, 'Harshin', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(635, 119, 121, 'Jijiga', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(636, 119, 121, 'Kebri Beyah special woreda', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(637, 119, 121, 'Qooraan/Mulla', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(638, 119, 121, 'Shabeeley', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(639, 119, 121, 'Wajale special woreda', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(640, 119, 121, 'Tuli Guled', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(641, 119, 122, 'Araarso', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(642, 119, 122, 'Awaare', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(643, 119, 122, 'Bilcil buur', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(644, 119, 122, 'Bir-qod', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(645, 119, 122, 'Daroor', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(646, 119, 122, 'Degehabur', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(647, 119, 122, 'Dhagaxmadow', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(648, 119, 122, 'Dig', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(649, 119, 122, 'Gunagado', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(650, 119, 122, 'Misraq Gashamo', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(651, 119, 122, 'Yoocaale', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(652, 119, 123, 'Boodaley', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(653, 119, 123, 'Ceel-Ogadeen', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(654, 119, 123, 'Debeweyin', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(655, 119, 123, 'Higloley', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(656, 119, 123, 'Kebri Dahar special woreda', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(657, 119, 123, 'Kudunbuur', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(658, 119, 123, 'Laas-dhankayre', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(659, 119, 123, 'Marsin', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(660, 119, 123, 'Shekosh', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(661, 119, 123, 'Shilavo', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(662, 119, 124, 'Bokolmayo', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(663, 119, 124, 'Deka Softi', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(664, 119, 124, 'Dolo Odo', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(665, 119, 124, 'Filtu', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(666, 119, 124, 'Goro Bekeksa', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(667, 119, 124, 'Guradamole', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(668, 119, 124, 'Kersa Dula', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(669, 119, 126, 'Ayun', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(670, 119, 126, 'Dihun', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(671, 119, 126, 'Elweyne', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(672, 119, 126, 'Gerbo', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(673, 119, 126, 'Hararey/Xaraarey', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(674, 119, 126, 'Hora-shagax', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(675, 119, 126, 'Segeg', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(676, 119, 127, 'Abaaqoorow', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(677, 119, 127, 'Adadle', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(678, 119, 127, 'Beercaano', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(679, 119, 127, 'Danan', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(680, 119, 127, 'Elele', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(681, 119, 127, 'Ferfer', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(682, 119, 127, 'Gode special woreda', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(683, 119, 127, 'Imiberi', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(684, 119, 127, 'Kelafo', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(685, 119, 127, 'Mustahil', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(686, 119, 128, 'Adigala', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(687, 119, 128, 'Afdem', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(688, 119, 128, 'Ayesha', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(689, 119, 128, 'Bike', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(690, 119, 128, 'Dambel', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(691, 119, 128, 'Erer', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(692, 119, 128, 'Gablalu', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(693, 119, 128, 'Mieso', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(694, 119, 128, 'Shinile', 'uploads/so.png', 'It is a worda in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(695, 120, 67, 'Debub Bench', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(696, 120, 67, 'Guraferda', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(697, 120, 67, 'Mizan Aman Town', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(698, 120, 67, 'Semien Bench', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(699, 120, 67, 'Shay Bench', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(700, 120, 67, 'Gidi Bench', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(701, 120, 67, 'Sheko', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(702, 120, 67, 'Former woredas (Bench Meinit)', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(703, 120, 68, 'Gena BosaIsara', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(704, 120, 68, 'Loma', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(705, 120, 68, 'Mareka', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(706, 120, 68, 'Tocha', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(707, 120, 68, 'Former woredas (Isara TochaL oma Bosa Mareka Gena)', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(708, 120, 69, 'Bita', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(709, 120, 69, 'Bonga Town', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(710, 120, 69, 'Chena', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(711, 120, 69, 'Cheta', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(712, 120, 69, 'Decha', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(713, 120, 69, 'Gesha', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(714, 120, 69, 'Gewata', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(715, 120, 69, 'Ginbo', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(716, 120, 69, 'Menjiwo', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(717, 120, 69, 'SayilemTelo', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(718, 120, 70, 'Anderacha', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(719, 120, 70, 'Masha', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(720, 120, 70, 'Yeki', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(721, 120, 70, 'Former woredas (Masha Anderacha)', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(722, 120, 71, 'Maji', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(723, 120, 71, 'Surma', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(724, 120, 71, 'Bero', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(725, 120, 71, 'Meinit Goldiya', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(726, 120, 71, 'Meinit Shasha', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(727, 120, 71, 'Gachit', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(728, 120, 71, 'Gori Gesha', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(729, 120, 72, 'Konta', 'uploads/saannp.png', 'It is one of the worda in South West region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(730, 121, 134, 'Arba Minch Town', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(731, 121, 134, 'Arba Minch Zuria', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(732, 121, 134, 'Bonke', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(733, 121, 134, 'Boreda', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(734, 121, 134, 'Chencha', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(735, 121, 134, 'Deramalo', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(736, 121, 134, 'Dita', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(737, 121, 134, 'Garda Marta', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(738, 121, 134, 'Geressie Zuriya', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(739, 121, 134, 'Geressie Town', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(740, 121, 134, 'Gacho Baba', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(741, 121, 134, 'Kamba Zuriya', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(742, 121, 134, 'Kamba Town', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(743, 121, 134, 'Kucha', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(744, 121, 134, 'Kucha Alfa', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(745, 121, 134, 'Mirab Abaya', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(746, 121, 134, 'Qogota', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(747, 121, 134, 'Selamber Town', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(748, 121, 135, 'BuleDila Town', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(749, 121, 135, 'Dila Zuria', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(750, 121, 135, 'Gedeb', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(751, 121, 135, 'Kochere', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(752, 121, 135, 'Wenago', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(753, 121, 135, 'Yirgachefe', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(754, 121, 136, 'Abeshge', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(755, 121, 136, 'Butajira Town', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(756, 121, 136, 'Cheha', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(757, 121, 136, 'Endegagn', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(758, 121, 136, 'Enemorina Eaner', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(759, 121, 136, 'Ezha', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(760, 121, 136, 'Geta', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(761, 121, 136, 'Gumer', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(762, 121, 136, 'Kebena', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(763, 121, 136, 'Kokir Gedebano', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(764, 121, 136, 'Mareko', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(765, 121, 136, 'Meskane', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(766, 121, 136, 'Muhor Na Aklil', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(767, 121, 136, 'Soddo', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(768, 121, 136, 'Welkite Town', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(769, 121, 137, 'Ana Lemo', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(770, 121, 137, 'Duna', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(771, 121, 137, 'Gibe', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(772, 121, 137, 'Gomibora', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(773, 121, 137, 'Hosaena Town', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(774, 121, 137, 'Limo', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(775, 121, 137, 'Mirab Badawacho', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(776, 121, 137, 'Misha', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(777, 121, 137, 'Misraq Badawacho', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(778, 121, 137, 'Shashogo', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(779, 121, 137, 'Soro', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(780, 121, 138, 'Angacha', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(781, 121, 138, 'Damboya', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(782, 121, 138, 'Doyogena', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(783, 121, 138, 'Durame Town', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(784, 121, 138, 'Hadero Tunto', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(785, 121, 138, 'Kacha Bira', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(786, 121, 138, 'Kedida Gamela', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(787, 121, 138, 'Tembaro', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(788, 121, 139, 'Alicho Werero', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(789, 121, 139, 'Dalocha', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12');
INSERT INTO `worda` (`worda_id`, `region_id`, `zone_id`, `worda_name`, `map`, `description`, `recorded_by`, `recorded_time`) VALUES
(790, 121, 139, 'Lanfro', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(791, 121, 139, 'Mirab Azernet Berbere', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(792, 121, 139, 'Misraq Azernet Berbere', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(793, 121, 139, 'Sankurra', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(794, 121, 139, 'Silte', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(795, 121, 139, 'Wulbareg', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(796, 121, 140, 'Bako Gazer', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(797, 121, 140, 'Bena Tsemay', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(798, 121, 140, 'Dasenech', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(799, 121, 140, 'Debub Ari', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(800, 121, 140, 'Gelila', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(801, 121, 140, 'Hamer', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(802, 121, 140, 'Kuraz', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(803, 121, 140, 'Male', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(804, 121, 140, 'Nyangatom', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(805, 121, 140, 'Selamago', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(806, 121, 140, 'Semen Ari', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(807, 121, 141, 'Abala Abaya', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(808, 121, 141, 'Bayra Koysha', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(809, 121, 141, 'Areka (town)', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(810, 121, 141, 'Bale Hawassa (town)', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(811, 121, 141, 'Boditi (town)', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(812, 121, 141, 'Boloso Bombe', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(813, 121, 141, 'Boloso Sore', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(814, 121, 141, 'Damot Gale', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(815, 121, 141, 'Damot Pulasa', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(816, 121, 141, 'Damot Sore', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(817, 121, 141, 'Damot Weyde', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(818, 121, 141, 'Diguna Fango', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(819, 121, 141, 'Gesuba (town)', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(820, 121, 141, 'Gununo (town)', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(821, 121, 141, 'Hobicha', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(822, 121, 141, 'Humbo', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(823, 121, 141, 'Kawo Koysha', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(824, 121, 141, 'Kindo Didaye', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(825, 121, 141, 'Kindo Koysha', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(826, 121, 141, 'Offa', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(827, 121, 141, 'Wolaita Sodo (town)', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(828, 121, 141, 'Tebela (town)', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(829, 121, 141, 'Sodo Zuria', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(830, 121, 142, 'Demba Gofa', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(831, 121, 142, 'Geze Gofa', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(832, 121, 142, 'Melokoza', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(833, 121, 142, 'Melo Gada', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(834, 121, 142, 'Oyda', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(835, 121, 142, 'Sawla (town)', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(836, 121, 142, 'Uba Debretsehay', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(837, 121, 142, 'Zala', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(838, 121, 143, 'Halaba Zuria', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(839, 121, 143, 'Kulito (town)', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(840, 121, 144, 'Alle', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(841, 121, 144, 'Amaro', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(842, 121, 144, 'Basketo', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(843, 121, 144, 'Burji', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(844, 121, 144, 'Derashe', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(845, 121, 144, 'Yem', 'uploads/snn.png', 'It is one of the worda in SNNPR region', 'remedanhyeredin@gmail.com', '2024-05-15 23:41:12'),
(847, NULL, 145, 'TESTworda2', 'uploads/photo_2023-08-22_16-54-47.jpg', 'TESTworda2', 'UserU@gmail.com', '2024-05-18 18:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_id` int(11) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `zone_map` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `recorded_by` varchar(50) NOT NULL,
  `recorded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zone_id`, `zone_name`, `region_id`, `zone_map`, `description`, `recorded_by`, `recorded_time`) VALUES
(56, 'Asosa', 113, 'uploads/MapASSOSA.png', ' This Zone was named after the Assosa Sultanate', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(57, 'Kamashi', 113, 'uploads/MapASSOSA.png', ' It covers part of the southern bank of the Abay.', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(58, 'Metekel', 113, 'uploads/MapASSOSA.png', 'It is bordered on the south and southwest by Kamashi,', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(59, 'Special Zones', 113, 'uploads/sp RW.png', 'Special zones', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(60, 'Central Zone', 122, 'uploads/tzmap.png', 'The Central Zone is a zone in the Tigray Region of Ethiopia.', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(61, 'Eastern Zone', 122, 'uploads/tzmap.png', 'The Eastern Zone is a zone in the Tigray Region of Ethiopia.', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(62, 'South Eastern Zone	', 122, 'uploads/tzmap.png', 'The South Eastern Zone is a zone in the Tigray Region of Ethiopia.', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(63, 'Southern Zone', 122, 'uploads/tzmap.png', 'The Southern Zone is a zone in the Tigray Region of Ethiopia.', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(64, 'Western Zone', 122, 'uploads/tzmap.png', 'The Western Zone is a zone in the Tigray Region of Ethiopia.', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(65, 'North Western Zone', 122, 'uploads/tzmap.png', 'The North Western Zone is a zone in Tigray Region of Ethiopia.', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(66, 'Special Zones	', 122, 'uploads/tzmap.png', 'Special Zones	\r\n', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(67, 'Bench Sheko', 120, 'uploads/saannp.png', 'Bench Sheko is a zone in the South West Ethiopia Peoples Region of Ethiopia.', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(68, 'Dawro', 120, 'uploads/saannp.png', 'Dawro is a zone in the South West Region of Ethiopia.', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(69, 'Keffa', 120, 'uploads/saannp.png', 'Keffa or Kaffa, is a zone in the South West Region of Ethiopia. The administrative center is Bonga.', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(70, 'Sheka', 120, 'uploads/saannp.png', 'Sheka is a zone in the South West Region of Ethiopia.', 'RedwanM@gmail.com', '2024-05-15 14:31:17'),
(71, 'West Omo', 120, 'uploads/saannp.png', 'West Omo or Mirab Omo is a Zone in the Ethiopian South West Ethiopia Peoples Region.', 'absalat@gmail.com', '2024-05-15 14:31:17'),
(72, 'Special woredas', 120, 'uploads/saannp.png', 'Special woredas', 'absalat@gmail.com', '2024-05-15 14:31:17'),
(73, 'Urban', 116, 'uploads/harr.png', 'It is one of the zone in Harrari', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(74, 'Rural', 116, 'uploads/harr.png', 'It is one of the zone in Harrari', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(75, 'Arsi Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromiayes', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(76, 'Bale Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(77, 'Borena Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(78, 'Buno Bedele Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(79, 'East Hararghe Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(80, 'East Shewa Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(81, 'East Welega Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(82, 'Guji Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(83, 'Horo Guduru Welega Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(84, 'Illu Aba Bora Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(85, 'Jimma Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(86, 'Kelam Welega Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(87, 'North Shewa Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(88, 'Southwest Shewa Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(89, 'West Arsi Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(90, 'West Guji Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(91, 'West Hararghe Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(92, 'West Shewa Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(93, 'West Welega Zone', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(94, 'Oromia Special Zone Surrounding Finfinne', 117, 'uploads/oromia.jpg', 'It is one of the zone in Oromia', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(95, 'Awsi Rasu', 111, 'uploads/Ethiopia_Afar_Zone1.png', ' Asayita is the largest town. Awash river is located.', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(96, 'Kilbet Rasu', 111, 'uploads/Ethiopia_Afar_Zone_2.png', 'Dallol depression is located at there.\r\n', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(97, 'Gabi Rasu', 111, 'uploads/Ethiopia_Afar_Zone_3.png', 'The zone covers territory of the former Gobaad sultanate.', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(98, 'Fanti Rasu', 111, 'uploads/Ethiopia_Afar_Zone_4.png', 'It is one of the zone in Afar', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(99, 'Hari Rasu', 111, 'uploads/Ethiopia_Afar_Zone_5.png', 'It is one of the zone in Afar', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(100, 'Mahi Rasu', 111, 'uploads/afar.png', 'It is one of the zone in Afar', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(101, 'Argobba (special woreda)', 111, 'uploads/afar.png', 'It is one of the zone in Afar', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(102, 'Agew Awi', 112, 'uploads/am.png', 'It is one of the zone in Amhara', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(103, 'East Gojjam', 112, 'uploads/am.png', 'It is one of the zone in Amhara', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(104, 'Oromia zone', 112, 'uploads/am.png', 'It is one of the zone in Amhara', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(105, 'North Gondar', 112, 'uploads/am.png', 'It is one of the zone in Amhara', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(106, 'North Shewa', 112, 'uploads/am.png', 'It is one of the zone in Amhara', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(107, 'North Wollo', 112, 'uploads/am.png', 'It is one of the zone in Amhara', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(108, 'South Gondar', 112, 'uploads/am.png', 'It is one of the zone in Amhara', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(109, 'South Wollo', 112, 'uploads/am.png', 'It is one of the zone in Amhara', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(110, 'Wag Hemra', 112, 'uploads/am.png', 'It is one of the zone in Amhara', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(111, 'West Gojjam', 112, 'uploads/am.png', 'It is one of the zone in Amhara', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(112, 'Bahir Dar (special zone)', 112, 'uploads/am.png', 'It is one of the zone in Amhara', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(113, 'Anyuak Zone', 115, 'uploads/ga.png', 'It is one of the zone in Gambella', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(114, 'Nuer Zone', 115, 'uploads/ga.png', 'It is one of the zone in Gambella', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(115, 'Mezhenger Zone', 115, 'uploads/ga.png', 'It is one of the zone in Gambella', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(116, 'Special woredas', 115, 'uploads/ga.png', 'It is one of the zone in Gambella', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(117, 'Sidama Zone', 118, 'uploads/si.png', 'Their are districts in the Sidama region', 'ADMIN@gmail.com', '2024-05-15 14:31:17'),
(118, 'Afder Zone', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(119, 'Dollo Zone (formerly Warder)', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(120, 'Erer Zone', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(121, 'Fafan Zone (formerly Jigjiga)', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(122, 'Jarar Zone (formerly Degehabur)', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(123, 'Korahe Zone', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(124, 'Liben Zone', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(125, 'Dhawa Zone', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(126, 'Nogob Zone (formerly Fiq)', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(127, 'Shabelle Zone (formerly Godey)', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(128, 'Sitti Zone (formerly Shinile)', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(129, 'Degehabur Special Zone (special zone)', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(130, 'Gode Special Zone (special zone)', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(131, 'Harawo Special Zone (special zone)', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(132, 'Kebri Beyah Special Zone (special zone)', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(133, 'Tog Wajale Special Zone (special zone)', 119, 'uploads/so.png', 'It is one of the zone in Somali', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(134, 'Gamo Zone', 121, 'uploads/snn.png', 'It is one of the zone in SNNP', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(135, 'Gedeo Zone', 121, 'uploads/snn.png', 'It is one of the zone in SNNP', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(136, 'Gurage Zone', 121, 'uploads/snn.png', 'It is one of the zone in SNNP', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(137, 'Hadiya Zone', 121, 'uploads/snn.png', 'It is one of the zone in SNNP', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(138, 'Kembata Tembaro Zone', 121, 'uploads/snn.png', 'It is one of the zone in SNNP', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(139, 'Silte Zone', 121, 'uploads/snn.png', 'It is one of the zone in SNNP', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(140, 'South Omo Zone', 121, 'uploads/snn.png', 'It is one of the zone in SNNP', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(141, 'Wolayita Zone', 121, 'uploads/snn.png', 'It is one of the zone in SNNP', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(142, 'Gofa Zone', 121, 'uploads/snn.png', 'It is one of the zone in SNNP', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(143, 'Halaba Zone', 121, 'uploads/snn.png', 'It is one of the zone in SNNP', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(144, 'Special woredas', 121, 'uploads/snn.png', 'It is one of the zone in SNNP', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(145, 'Addis Ketema sub-city', 109, 'uploads/Addis_Ketema_(Addis_Ababa_Map).png', ' Merkato, Africas largest marketplace ', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(146, 'Akaky Kaliti sub-city', 109, 'uploads/Akaky_Kaliti_(Addis_Ababa_Map).png', 'Many industries are found in this sub-city.\r\n', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(147, 'Arada sub-city', 109, 'uploads/Arada_(Addis_Ababa_Map).png', ' Arada is one of the oldest parts of Addis Ababa .\r\n', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(148, 'Bole sub-city', 109, 'uploads/Bole_(Addis_Ababa_Map).png', 'International Airport is located at there.\r\n', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(149, 'Gullele sub-city', 109, 'uploads/Gullele_(Addis_Ababa_Map).png', 'It is one of the sub city in Addis Ababa', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(150, 'Kirkos sub-city', 109, 'uploads/Kirkos_(Addis_Ababa_Map).png', 'African union headquarters is located.\r\n', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(151, 'Kolfe Keranio sub-city', 109, 'uploads/Kolfe_Keranio_(Addis_Ababa_Map).png', 'It is one of the sub city in Addis Ababa', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(152, 'Lideta sub-city', 109, 'uploads/Lideta_(Addis_Ababa_Map).png', 'It is one of the sub city in Addis Ababa', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(153, 'Nifas Silk-Lafto sub-city', 109, 'uploads/Nifas_Silk-Lafto_(Addis_Ababa_Map).png', 'The district is located in the southwestern suburb of the city.', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(154, 'Yeka sub-city', 109, 'uploads/Yeka_(Addis_Ababa_Map).png', 'It is one of the sub city in Addis Ababa', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(155, 'Lemi-Kura sub-city', 109, 'uploads/aa.png', 'The new(recent) subcity.', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17'),
(156, 'Jimma Zone', 117, 'uploads/oromia.jpg', 'Jimma Zone', 'remedanhyeredin@gmail.com', '2024-05-15 14:31:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `house_no`
--
ALTER TABLE `house_no`
  ADD PRIMARY KEY (`house_no_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `worda_id` (`worda_id`),
  ADD KEY `kebela_id` (`kebela_id`),
  ADD KEY `mender_id` (`mender_id`);

--
-- Indexes for table `kebela`
--
ALTER TABLE `kebela`
  ADD PRIMARY KEY (`kebela_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `worda_id` (`worda_id`);

--
-- Indexes for table `mender`
--
ALTER TABLE `mender`
  ADD PRIMARY KEY (`mender_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `worda_id` (`worda_id`),
  ADD KEY `kebela_id` (`kebela_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `temp_house_no`
--
ALTER TABLE `temp_house_no`
  ADD PRIMARY KEY (`house_no_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `worda_id` (`worda_id`),
  ADD KEY `kebela_id` (`kebela_id`),
  ADD KEY `mender_id` (`mender_id`);

--
-- Indexes for table `temp_kebela`
--
ALTER TABLE `temp_kebela`
  ADD PRIMARY KEY (`kebela_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `worda_id` (`worda_id`);

--
-- Indexes for table `temp_mender`
--
ALTER TABLE `temp_mender`
  ADD PRIMARY KEY (`mender_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `worda_id` (`worda_id`),
  ADD KEY `kebela_id` (`kebela_id`);

--
-- Indexes for table `temp_region`
--
ALTER TABLE `temp_region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `temp_worda`
--
ALTER TABLE `temp_worda`
  ADD PRIMARY KEY (`worda_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `temp_zone`
--
ALTER TABLE `temp_zone`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `worda`
--
ALTER TABLE `worda`
  ADD PRIMARY KEY (`worda_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `region_id` (`region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `house_no`
--
ALTER TABLE `house_no`
  MODIFY `house_no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kebela`
--
ALTER TABLE `kebela`
  MODIFY `kebela_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mender`
--
ALTER TABLE `mender`
  MODIFY `mender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `temp_house_no`
--
ALTER TABLE `temp_house_no`
  MODIFY `house_no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `temp_kebela`
--
ALTER TABLE `temp_kebela`
  MODIFY `kebela_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `temp_mender`
--
ALTER TABLE `temp_mender`
  MODIFY `mender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `temp_region`
--
ALTER TABLE `temp_region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `temp_worda`
--
ALTER TABLE `temp_worda`
  MODIFY `worda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `temp_zone`
--
ALTER TABLE `temp_zone`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `worda`
--
ALTER TABLE `worda`
  MODIFY `worda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=848;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `house_no`
--
ALTER TABLE `house_no`
  ADD CONSTRAINT `house_no_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`),
  ADD CONSTRAINT `house_no_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`),
  ADD CONSTRAINT `house_no_ibfk_3` FOREIGN KEY (`worda_id`) REFERENCES `worda` (`worda_id`),
  ADD CONSTRAINT `house_no_ibfk_4` FOREIGN KEY (`kebela_id`) REFERENCES `kebela` (`kebela_id`),
  ADD CONSTRAINT `house_no_ibfk_5` FOREIGN KEY (`mender_id`) REFERENCES `mender` (`mender_id`);

--
-- Constraints for table `kebela`
--
ALTER TABLE `kebela`
  ADD CONSTRAINT `kebela_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`),
  ADD CONSTRAINT `kebela_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`),
  ADD CONSTRAINT `kebela_ibfk_3` FOREIGN KEY (`worda_id`) REFERENCES `worda` (`worda_id`);

--
-- Constraints for table `mender`
--
ALTER TABLE `mender`
  ADD CONSTRAINT `mender_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`),
  ADD CONSTRAINT `mender_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`),
  ADD CONSTRAINT `mender_ibfk_3` FOREIGN KEY (`worda_id`) REFERENCES `worda` (`worda_id`),
  ADD CONSTRAINT `mender_ibfk_4` FOREIGN KEY (`kebela_id`) REFERENCES `kebela` (`kebela_id`);

--
-- Constraints for table `temp_house_no`
--
ALTER TABLE `temp_house_no`
  ADD CONSTRAINT `temp_house_no_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`),
  ADD CONSTRAINT `temp_house_no_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`),
  ADD CONSTRAINT `temp_house_no_ibfk_3` FOREIGN KEY (`worda_id`) REFERENCES `worda` (`worda_id`),
  ADD CONSTRAINT `temp_house_no_ibfk_4` FOREIGN KEY (`kebela_id`) REFERENCES `kebela` (`kebela_id`),
  ADD CONSTRAINT `temp_house_no_ibfk_5` FOREIGN KEY (`mender_id`) REFERENCES `mender` (`mender_id`);

--
-- Constraints for table `temp_kebela`
--
ALTER TABLE `temp_kebela`
  ADD CONSTRAINT `temp_kebela_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`),
  ADD CONSTRAINT `temp_kebela_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`),
  ADD CONSTRAINT `temp_kebela_ibfk_3` FOREIGN KEY (`worda_id`) REFERENCES `worda` (`worda_id`);

--
-- Constraints for table `temp_mender`
--
ALTER TABLE `temp_mender`
  ADD CONSTRAINT `temp_mender_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`),
  ADD CONSTRAINT `temp_mender_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`),
  ADD CONSTRAINT `temp_mender_ibfk_3` FOREIGN KEY (`worda_id`) REFERENCES `worda` (`worda_id`),
  ADD CONSTRAINT `temp_mender_ibfk_4` FOREIGN KEY (`kebela_id`) REFERENCES `kebela` (`kebela_id`);

--
-- Constraints for table `temp_worda`
--
ALTER TABLE `temp_worda`
  ADD CONSTRAINT `temp_worda_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`),
  ADD CONSTRAINT `temp_worda_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`);

--
-- Constraints for table `temp_zone`
--
ALTER TABLE `temp_zone`
  ADD CONSTRAINT `temp_zone_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`);

--
-- Constraints for table `worda`
--
ALTER TABLE `worda`
  ADD CONSTRAINT `worda_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`),
  ADD CONSTRAINT `worda_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`zone_id`);

--
-- Constraints for table `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `zone_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
