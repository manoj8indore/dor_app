-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2025 at 10:25 AM
-- Server version: 10.5.29-MariaDB
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qdhoyrlz_dorman_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_vehicle`
--

CREATE TABLE `add_vehicle` (
  `id` int(11) NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `start_year` int(11) NOT NULL,
  `end_year` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `add_vehicle`
--

INSERT INTO `add_vehicle` (`id`, `make`, `model`, `start_year`, `end_year`, `link`, `created_at`, `updated_at`) VALUES
(1, 'chrys', 'city', 2008, 2012, 'https://nevaloss-portfolio.com/dorman_app/toyota_img.jpeg', '2023-09-14 13:48:21', '2023-09-14 13:48:21'),
(2, 'grandcherokee', 'city', 2005, 2007, 'https://nevaloss-portfolio.com/dorman_app/ford_img.jpg', '2023-09-30 08:55:24', '2023-09-30 08:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '123456', '2023-09-06 08:12:26', '2023-09-06 08:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `array_command`
--

CREATE TABLE `array_command` (
  `id` int(11) NOT NULL,
  `array_id` varchar(255) NOT NULL,
  `cmd` varchar(255) NOT NULL,
  `response` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `array_command`
--

INSERT INTO `array_command` (`id`, `array_id`, `cmd`, `response`, `created_at`) VALUES
(1, '1', 'atz', '', '2024-03-07 12:54:36'),
(2, '1', 'atz', '', '2024-03-07 12:55:30'),
(3, '1', 'atrv', '', '2024-03-07 14:06:51'),
(4, '1', 'atl1', '', '2024-03-07 14:06:51'),
(5, '1', 'ate1', '', '2024-03-07 14:08:17'),
(6, '1', 'atsp6', '', '2024-03-07 14:09:20'),
(7, '1', 'atdp', '', '2024-03-07 14:09:20'),
(8, '1', 'atcaf0', '', '2024-03-07 14:11:19'),
(9, '1', 'atar', '', '2024-03-07 14:11:19'),
(10, '1', 'atat0', '', '2024-03-07 14:12:17'),
(11, '1', 'ath1', '', '2024-03-07 14:12:17'),
(12, '1', 'ats0', '', '2024-03-07 14:13:20'),
(13, '1', 'atsh740', '', '2024-03-07 14:13:20'),
(14, '1', 'atcf4C0', '', '2024-03-07 14:14:13'),
(15, '1', 'atcm4C0', '', '2024-03-07 14:14:13'),
(16, '1', 'atcfc1', '', '2024-03-07 14:15:19'),
(17, '1', 'atfcsh740', '', '2024-03-07 14:15:19'),
(18, '1', 'atfcsd30', '', '2024-03-07 14:16:16'),
(19, '1', 'atfcsm1', '', '2024-03-07 14:16:16'),
(20, '1', 'atr1', '', '2024-03-07 14:17:14'),
(21, '1', 'ate1', '', '2024-03-07 14:17:14'),
(22, '1', 'atat1', '', '2024-03-07 14:18:30'),
(23, '1', 'atst05', '', '2024-03-07 14:18:30'),
(24, '1', '023e', '', '2024-03-08 09:47:36'),
(25, '1', '0322F190', '', '2024-03-08 09:47:36'),
(26, '1', '023e', '', '2024-03-08 09:49:45'),
(27, '1', '0322F100', '', '2024-03-08 09:49:45'),
(28, '1', '0322F132', '', '2024-03-08 09:51:37'),
(29, '1', '023e', '', '2024-03-08 09:51:37'),
(30, '1', '021002', '', '2024-03-08 09:51:37'),
(31, '2', 'r_n', '', '2024-03-09 16:30:34'),
(32, '2', '100B340044000020', '', '2024-03-09 16:25:55'),
(33, '2', '2100000002000000', '', '2024-03-09 16:25:55'),
(34, '2', '1082360100000412', '', '2024-03-09 16:25:55'),
(35, '2', '21000C000C000C00', '', '2024-03-09 16:25:55'),
(36, '2', '220C1BF1EBCC04C0', '', '2024-03-09 16:25:55'),
(37, '2', '236CF011CC4B476B', '', '2024-03-09 16:28:05'),
(38, '2', '2480C64F6B816A82', '', '2024-03-09 16:28:05'),
(39, '2', '256B83C65F6B84C6', '', '2024-03-09 16:28:05'),
(40, '2', '264D6B85FC034E6A', '', '2024-03-09 16:33:26'),
(41, '2', '27866B87126CF013', '', '2024-03-09 16:33:26'),
(42, '2', '28CC00091A886930', '', '2024-03-09 16:33:26'),
(43, '2', '290434FB4C3310C6', '', '2024-03-09 16:33:26'),
(44, '2', '2A505BF87900F9C6', '', '2024-03-09 16:33:26'),
(45, '2', '2B705BFA4C3210C6', '', '2024-03-09 16:33:26'),
(46, '2', '2C987B0170790171', '', '2024-03-09 16:35:45'),
(47, '2', '2DC6087B017C7901', '', '2024-03-09 16:35:45'),
(48, '2', '2E7DC6555B3F585B', '', '2024-03-09 16:35:45'),
(49, '2', '2F3F1A80202B1980', '', '2024-03-09 16:35:45'),
(50, '2', '208608E6306B7004', '', '2024-03-09 16:35:45'),
(51, '2', '2130F98604198036', '', '2024-03-09 16:36:55'),
(52, '2', '22CC7D43E3F00000', '', '2024-03-09 16:37:19'),
(53, '3', '10823602146CF014', '', '2024-03-09 16:45:18'),
(54, '3', '21EEF01418A84018', '', '2024-03-09 16:45:18'),
(55, '3', '22ABF0146E713204', '', '2024-03-09 16:45:18'),
(56, '3', '2330E61A80CD0174', '', '2024-03-09 16:45:18'),
(57, '3', '24F601467B014AF6', '', '2024-03-09 16:45:18'),
(58, '3', '25014A27F5378608', '', '2024-03-09 16:45:18'),
(59, '3', '26E6306B700430F9', '', '2024-03-09 16:45:18'),
(60, '3', '27337B0146200220', '', '2024-03-09 16:47:47'),
(61, '3', '28B5C6555B3F585B', '', '2024-03-09 16:47:47'),
(62, '3', '293F1988CE01641F', '', '2024-03-09 16:47:47'),
(63, '3', '2A014401EF1E0161', '', '2024-03-09 16:47:47'),
(64, '3', '2B08EAB6016C8100', '', '2024-03-09 16:47:47'),
(65, '3', '2C27E36AF010E630', '', '2024-03-09 16:47:47'),
(66, '3', '2D6B700430F9C601', '', '2024-03-09 16:50:16'),
(67, '3', '2E7B0144E689C110', '', '2024-03-09 16:50:16'),
(68, '3', '2F2710C1242710C1', '', '2024-03-09 16:50:16'),
(69, '3', '20232712C1252712', '', '2024-03-09 16:50:16'),
(70, '3', '211A88209E1BF015', '', '2024-03-09 16:50:16'),
(71, '3', '220AEE8AE68C0000', '', '2024-03-09 16:50:16'),
(72, '4', '108236036B00EE8A', '', '2024-03-09 16:55:29'),
(73, '4', '2120AE4D3210A7A7', '', '2024-03-09 16:55:29'),
(74, '4', '22C6055BFD4FFB20', '', '2024-03-09 16:55:29'),
(75, '4', '23FC4FFB80F8D6FD', '', '2024-03-09 16:55:29'),
(76, '4', '24C6005BFD4FFB20', '', '2024-03-09 16:55:29'),
(77, '4', '25FC4FFB80F8D6FD', '', '2024-03-09 16:55:29'),
(78, '4', '26CC00200434FD4C', '', '2024-03-09 16:55:29'),
(79, '4', '273210CC00200434', '', '2024-03-09 16:55:29'),
(80, '4', '28FD4D3210A7A7A7', '', '2024-03-09 16:55:29'),
(81, '4', '29C6035BFD4FFB20', '', '2024-03-09 17:00:11'),
(82, '4', '2AFC4FFB80F8D6FD', '', '2024-03-09 17:00:11'),
(83, '4', '2BA68A5AFD4FFB20', '', '2024-03-09 17:00:11'),
(84, '4', '2CFC4FFB80F896FD', '', '2024-03-09 17:00:11'),
(85, '4', '2DE68B5BFD4FFB20', '', '2024-03-09 17:00:11'),
(86, '4', '2EFC4FFB80F8D6FD', '', '2024-03-09 17:00:11'),
(87, '4', '2F2006FB8036F820', '', '2024-03-09 17:00:11'),
(88, '4', '2096A7A7A7A7A786', '', '2024-03-09 17:00:11'),
(89, '4', '21081A80C6005BFD', '', '2024-03-09 17:00:11'),
(90, '4', '224FFB20FC4F0000', '', '2024-03-09 17:00:11'),
(91, '5', '10823604FB80F8D6', '', '2024-03-09 17:04:01'),
(92, '5', '21FD6B300430EDCC', '', '2024-03-09 17:04:01'),
(93, '5', '2200200434FD4C32', '', '2024-03-09 17:04:01'),
(94, '5', '23101A8020D50000', '', '2024-03-09 17:04:01'),
(95, '5', '2400000000000000', '', '2024-03-09 17:04:01'),
(96, '5', '2500000000000000', '', '2024-03-09 17:05:45'),
(97, '5', '2600000000000000', '', '2024-03-09 17:05:45'),
(98, '5', '2700000000000000', '', '2024-03-09 17:05:45'),
(99, '5', '2800000000000000', '', '2024-03-09 17:05:45'),
(100, '5', '2900000000000000', '', '2024-03-09 17:05:45'),
(101, '5', '2A00000000000000', '', '2024-03-09 17:09:55'),
(102, '5', '2B00000000000000', '', '2024-03-09 17:09:55'),
(103, '5', '2C00000000000000', '', '2024-03-09 17:09:55'),
(104, '5', '2D00000000000000', '', '2024-03-09 17:09:55'),
(105, '5', '2E00000000000000', '', '2024-03-09 17:09:55'),
(106, '5', '2F00000000000000', '', '2024-03-09 17:09:55'),
(107, '5', '2000000000000000', '', '2024-03-09 17:09:55'),
(108, '5', '2100000000000000', '', '2024-03-09 17:09:55'),
(109, '5', '2200000000000000', '', '2024-03-09 17:09:55'),
(110, '6', 'atst03', '', '2024-03-09 17:14:13'),
(111, '6', '0137', '', '2024-03-09 17:14:13'),
(112, '6', '100A3101FF010004', '', '2024-03-09 17:16:16'),
(113, '6', '2178CF8FAB000000', '', '2024-03-09 17:16:16'),
(114, '7', '0210010000000000', '', '2024-03-09 17:20:07'),
(115, '7', '0210030000000000', '', '2024-03-09 17:20:07'),
(116, '7', '023E000000000000', '', '2024-03-09 17:20:07'),
(117, '8', 'atz', '', '2024-03-11 15:36:53'),
(118, '8', 'atz1', '', '2024-03-11 15:36:53'),
(119, '8', 'atrv', '', '2024-03-11 15:36:53'),
(120, '8', 'atl1', '', '2024-03-11 15:36:53'),
(121, '8', 'ate1', '', '2024-03-11 15:36:53'),
(122, '8', 'atsp6', '', '2024-03-11 15:40:06'),
(123, '8', 'atdp', '', '2024-03-11 15:40:06'),
(124, '8', 'atcaf0', '', '2024-03-11 15:40:06'),
(125, '8', 'atar', '', '2024-03-11 15:40:06'),
(126, '8', 'atat0', '', '2024-03-11 15:40:06'),
(127, '8', 'ath1', '', '2024-03-11 15:40:06'),
(128, '8', 'ats0', '', '2024-03-11 15:43:53'),
(129, '8', 'atsh740', '', '2024-03-11 15:43:53'),
(130, '8', 'atcf4C0', '', '2024-03-11 15:43:53'),
(131, '8', 'atcm4C0', '', '2024-03-11 15:43:53'),
(132, '8', 'atcfc1', '', '2024-03-11 15:43:53'),
(133, '8', 'atfcsh740', '', '2024-03-11 15:43:53'),
(134, '8', 'atfcsd30', '', '2024-03-11 15:43:53'),
(135, '8', 'atfcsm1', '', '2024-03-11 15:43:53'),
(136, '8', 'atr1', '', '2024-03-11 15:43:53'),
(137, '8', 'ate1', '', '2024-03-11 15:47:16'),
(138, '8', 'atat1', '', '2024-03-11 15:47:16'),
(139, '8', 'atst05', '', '2024-03-11 15:47:16'),
(140, '8', '023e01', '', '2024-03-11 15:47:16'),
(141, '8', '021003', '', '2024-03-11 15:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_response`
--

CREATE TABLE `multiple_response` (
  `id` int(11) NOT NULL,
  `cmd_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `cmd_multi` varchar(255) NOT NULL,
  `result_to_show` text NOT NULL,
  `next_cmd` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `multiple_response`
--

INSERT INTO `multiple_response` (`id`, `cmd_id`, `vehicle_id`, `cmd_multi`, `result_to_show`, `next_cmd`, `created_at`, `updated_at`) VALUES
(1, 19, 2, 'NO DATA', 'Please Insert Valid Key', '22C124', '2023-10-13 11:41:31', '2023-10-13 11:41:31'),
(2, 19, 2, '??', 'Please Insert Valid Key', '22C124', '2023-10-13 11:41:31', '2023-10-13 11:41:31'),
(3, 19, 2, 'C124', 'Valid Key', '10', '2023-10-13 11:42:22', '2023-10-13 11:42:22'),
(4, 23, 2, '33', 'Authentification Failed .... Retry', '3F', '2023-10-13 11:45:35', '2023-10-13 11:45:35'),
(5, 23, 2, '55', 'Please Wait ... 10 Minutes, Mode Enabled', '22C115', '2023-10-13 11:45:35', '2023-10-13 11:45:35'),
(6, 23, 2, 'AA', 'Authorization Done', 'NA', '2023-10-13 11:45:35', '2023-10-13 11:45:35'),
(7, 28, 2, '0400', 'Ignition Off and Ignition On with the Same Key.', 'NA', '2023-10-13 11:49:29', '2023-10-13 11:49:29'),
(8, 28, 2, '0401', 'First Key Programmed. Remove the First Key and Turn Ignition on with Second key.', 'NA', '2023-10-13 11:49:29', '2023-10-13 11:49:29'),
(9, 28, 2, '0402', 'Second Key Programmed. Remove the Second Key and Turn Ignition on with Third key.', 'NA', '2023-10-13 11:49:29', '2023-10-13 11:49:29'),
(10, 28, 2, '0403', 'Third Key Programmed. Remove the Third Key and Turn Ignition on with Fourth key.', 'NA', '2023-10-13 11:49:29', '2023-10-13 11:49:29'),
(11, 28, 2, '0404', 'All Keys Programmed. Remove the Dongle from the OBD-II Port.', 'NA', '2023-10-13 11:49:29', '2023-10-13 11:49:29'),
(12, 14, 2, 'NO DATA', 'test', 'atshC460F1', '2023-10-13 11:41:31', '2023-10-13 11:41:31'),
(13, 14, 2, 'C124', 'test1', '22C124', '2023-10-13 11:41:31', '2023-10-13 11:41:31'),
(14, 16, 2, 'NO DATA', 'test2', 'atshC410F1', '2023-10-13 11:41:31', '2023-10-13 11:41:31'),
(15, 16, 2, 'C124', 'test3', '22C124', '2023-10-13 11:41:31', '2023-10-13 11:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `textfile_vehicle`
--

CREATE TABLE `textfile_vehicle` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `apk` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `textfile_vehicle`
--

INSERT INTO `textfile_vehicle` (`id`, `name`, `apk`, `status`, `created`) VALUES
(1, 'chrys', 'chrys.apk', 1, '2024-03-01 07:24:37'),
(2, 'grandcherokee', 'grandcherokee.apk', 1, '2024-03-01 07:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `upload_textfile`
--

CREATE TABLE `upload_textfile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text_file` varchar(255) NOT NULL,
  `vehicle_id` varchar(255) NOT NULL,
  `log_category` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `upload_textfile`
--

INSERT INTO `upload_textfile` (`id`, `name`, `text_file`, `vehicle_id`, `log_category`, `created_at`) VALUES
(10, 'ford', 'review_screen_text.txt', 'ford', '', '04-03-2024 05:28:pm'),
(53, 'Grandcherokee', 'response_11-03-2024-09-50-43.txt', 'Grandcherokee', 'readpin', '11-03-2024 07:20:pm'),
(54, 'Grandcherokee', 'response_11-03-2024-10-06-12.txt', 'Grandcherokee', 'readpin', '11-03-2024 07:36:pm'),
(55, 'Grandcherokee', 'response_11-03-2024-11-11-23.txt', 'Grandcherokee', 'addkeyfob', '11-03-2024 08:41:pm'),
(56, 'Grandcherokee', 'response_11-03-2024-11-12-55.txt', 'Grandcherokee', 'addkeyfob', '11-03-2024 08:42:pm'),
(57, 'Grandcherokee', 'response_12-03-2024-10-14-11.txt', 'Grandcherokee', 'readpin', '12-03-2024 07:44:pm'),
(58, 'Chrys', 'response_12-03-2024-10-21-58.txt', 'Chrys', 'readpin', '12-03-2024 07:51:pm'),
(59, 'Grandcherokee', 'response_15-03-2024-11-29-53.txt', 'Grandcherokee', 'readpin', '15-03-2024 08:59:pm'),
(60, 'Grandcherokee', 'response_15-03-2024-11-49-06.txt', 'Grandcherokee', 'readpin', '15-03-2024 09:19:pm'),
(61, 'Chrys', 'response_18-03-2024-09-35-59.txt', 'Chrys', 'readpin', '18-03-2024 07:06:pm'),
(62, 'Chrys', 'response_18-03-2024-09-40-34.txt', 'Chrys', 'readpin', '18-03-2024 07:10:pm'),
(63, 'Chrys', 'response_18-03-2024-09-41-54.txt', 'Chrys', 'readpin', '18-03-2024 07:11:pm'),
(64, 'Chrys', 'response_17-05-2025-14-03-29.txt', 'Chrys', 'readpin', '17-05-2025 02:03:pm'),
(65, 'Chrys', 'abcd.txt', 'Chrys', 'readpin', '23-05-2025 04:09:pm'),
(67, 'Chrys', 'abcd2.txt', 'Chrys', 'readpin', '26-05-2025 02:03:pm'),
(68, 'Chrys', 'abcd3.txt', 'Chrys', 'readpin', '26-05-2025 03:18:pm'),
(69, 'Chrys', 'abcd4.txt', 'Chrys', 'readpin', '26-05-2025 06:50:pm'),
(70, 'Chrys', 'abcd5.txt', 'Chrys', 'readpin', '26-05-2025 06:56:pm');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_array`
--

CREATE TABLE `vehicle_array` (
  `id` int(11) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `array_name` varchar(255) NOT NULL,
  `delay` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicle_array`
--

INSERT INTO `vehicle_array` (`id`, `vehicle`, `array_name`, `delay`, `created_at`) VALUES
(1, 'chrys,grandcherokee', 'chrys_array', '500', '2024-03-07 12:54:00'),
(2, 'chrys,grandcherokee', 'chrys_array_after_seed_key', '100', '2024-03-07 13:07:43'),
(3, 'chrys,grandcherokee', 'block2', '100', '2024-03-09 16:38:16'),
(4, 'chrys,grandcherokee', 'block3', '100', '2024-03-09 16:51:06'),
(5, 'chrys,grandcherokee', 'block4', '100', '2024-03-09 17:00:57'),
(6, 'chrys,grandcherokee', 'third_step_first_block', '200', '2024-03-09 17:10:41'),
(7, 'chrys,grandcherokee', 'third_block_completed', '200', '2024-03-09 17:18:34'),
(8, 'chrys,grandcherokee', 'Read_key_fob_1', '250', '2024-03-11 15:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_response`
--

CREATE TABLE `vehicle_response` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `cmd_no` varchar(50) NOT NULL,
  `cmd` varchar(50) NOT NULL,
  `response` varchar(255) NOT NULL,
  `delay` varchar(50) NOT NULL,
  `cmd_to_redirect` varchar(255) NOT NULL,
  `check_response` varchar(255) NOT NULL,
  `message_display` text NOT NULL,
  `img_show` varchar(50) NOT NULL,
  `skip_check_response` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicle_response`
--

INSERT INTO `vehicle_response` (`id`, `vehicle_id`, `cmd_no`, `cmd`, `response`, `delay`, `cmd_to_redirect`, `check_response`, `message_display`, `img_show`, `skip_check_response`, `created_at`, `updated_at`) VALUES
(1, 2, '1', 'atz', 'ELM327', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:19:32', '2023-10-13 12:19:32'),
(2, 2, '2', 'atl1', 'ok', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:19:32', '2023-10-13 12:19:32'),
(3, 2, '3', 'atsp1', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:26:33', '2023-10-13 12:26:33'),
(4, 2, '4', 'atdp', 'PWM', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:26:33', '2023-10-13 12:26:33'),
(5, 2, '5', 'atal', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:28:39', '2023-10-13 12:28:39'),
(6, 2, '6', 'atar', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:28:39', '2023-10-13 12:28:39'),
(7, 2, '7', 'atm0', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:30:37', '2023-10-13 12:30:37'),
(8, 2, '8', 'ath1', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:30:37', '2023-10-13 12:30:37'),
(9, 2, '9', 'atr1', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:32:29', '2023-10-13 12:32:29'),
(10, 2, '10', 'ate1', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:32:29', '2023-10-13 12:32:29'),
(11, 2, '11', 'atrv', 'V', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:34:26', '2023-10-13 12:34:26'),
(13, 2, '13', 'atshC4C0f1', 'OK', '500', 'NA', 'false', 'Insert original key and turn on ignition', 'true', 'false', '2023-10-13 12:36:29', '2023-10-13 12:36:29'),
(14, 2, '14', '22C104', 'NA', '500', 'NA', 'true', '', 'false', 'false', '2023-10-13 12:36:29', '2023-10-13 12:36:29'),
(15, 2, '15', 'atshC460F1', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:38:35', '2023-10-13 12:38:35'),
(16, 2, '16', '22C104', 'NA', '500', 'NA', 'true', '', 'false', 'false', '2023-10-13 12:38:35', '2023-10-13 12:38:35'),
(17, 2, '17', 'atshC410F1', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:40:57', '2023-10-13 12:40:57'),
(18, 2, '18', '22C104', 'C1 04', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:40:57', '2023-10-13 12:40:57'),
(19, 2, '19', '22C124', 'NA', '500', 'NA', 'true', '', 'false', 'false', '2023-10-13 12:43:57', '2023-10-13 12:43:57'),
(20, 2, '20', '10', '10', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:43:57', '2023-10-13 12:43:57'),
(21, 2, '21', '3F', '3F', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:47:06', '2023-10-13 12:47:06'),
(22, 2, '22', 'B1019C', '9C', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:47:06', '2023-10-13 12:47:06'),
(23, 2, '23', '22C115', 'NA', '2000', 'NA', 'true', 'Erase and learn', 'false', 'false', '2023-10-13 12:49:37', '2023-10-13 12:49:37'),
(24, 2, '24', 'B1003901', 'B1', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:49:37', '2023-10-13 12:49:37'),
(25, 2, '25', '22C104', 'C1', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:51:18', '2023-10-13 12:51:18'),
(26, 2, '26', 'B1F01000', 'B1', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:51:18', '2023-10-13 12:51:18'),
(27, 2, '27', '20', '20', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 12:53:14', '2023-10-13 12:53:14'),
(28, 2, '28', '22C104', 'NA', '1000', 'NA', 'true', '', 'false', 'false', '2023-10-13 12:53:14', '2023-10-13 12:53:14'),
(29, 1, '1', 'atz', '327', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:08:11', '2023-10-13 13:08:11'),
(30, 1, '2', 'atl1', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:08:11', '2023-10-13 13:08:11'),
(31, 1, '3', 'atsp6', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:10:18', '2023-10-13 13:10:18'),
(32, 1, '4', 'atdp', 'CAN', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:10:18', '2023-10-13 13:10:18'),
(33, 1, '5', 'atcan0', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:11:59', '2023-10-13 13:11:59'),
(34, 1, '6', 'atcaf0', 'OK', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:11:59', '2023-10-13 13:11:59'),
(35, 1, '7', 'atar', 'OK', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:16:14', '2023-10-13 13:16:14'),
(36, 1, '8', 'atat0', 'OK', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:16:14', '2023-10-13 13:16:14'),
(37, 1, '9', 'ath1', 'OK', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:18:32', '2023-10-13 13:18:32'),
(38, 1, '10', 'ats0', 'OK', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:18:32', '2023-10-13 13:18:32'),
(39, 1, '11', 'atsh750', 'OK', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:21:04', '2023-10-13 13:21:04'),
(40, 1, '12', 'atm0', 'OK', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:21:04', '2023-10-13 13:21:04'),
(41, 1, '13', 'atrv', 'V', '1000', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:24:46', '2023-10-13 13:24:46'),
(42, 1, '14', 'ate0', 'OK', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:24:46', '2023-10-13 13:24:46'),
(43, 1, '15', '40013e', 'CAN', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:32:38', '2023-10-13 13:32:38'),
(44, 1, '16', '40022164', 'CAN', '500', 'NA', 'false', '', 'false', 'false', '2023-10-13 13:32:38', '2023-10-13 13:32:38'),
(45, 1, '17', '40033B6210', 'CAN', '500', 'NA', 'false', 'Ready to Learn, Press Lock and Unlock Button and then press Unlock button.', 'true', 'false', '2023-10-13 13:34:54', '2023-10-13 13:34:54'),
(46, 1, '18', '40022164', '39', '500', 'NA', 'false', 'Keyfob 1 Learned', 'false', 'false', '2023-10-13 13:34:54', '2023-10-13 13:34:54'),
(47, 1, '19', '40022164', '3A', '500', 'NA', 'false', 'Keyfob 2 Learned', 'false', 'false', '2023-10-13 13:37:57', '2023-10-13 13:37:57'),
(48, 1, '20', '40022164', '3B', '500', 'NA', 'false', 'Keyfob 3 Learned', 'false', 'false', '2023-10-13 13:37:57', '2023-10-13 13:37:57'),
(49, 1, '21', '40022164', '3C', '500', 'NA', 'false', 'Keyfob 4 Learned', 'false', 'false', '2023-10-13 13:39:26', '2023-10-13 13:39:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_vehicle`
--
ALTER TABLE `add_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `array_command`
--
ALTER TABLE `array_command`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiple_response`
--
ALTER TABLE `multiple_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textfile_vehicle`
--
ALTER TABLE `textfile_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_textfile`
--
ALTER TABLE `upload_textfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_array`
--
ALTER TABLE `vehicle_array`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_response`
--
ALTER TABLE `vehicle_response`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_vehicle`
--
ALTER TABLE `add_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `array_command`
--
ALTER TABLE `array_command`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `multiple_response`
--
ALTER TABLE `multiple_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `textfile_vehicle`
--
ALTER TABLE `textfile_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `upload_textfile`
--
ALTER TABLE `upload_textfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `vehicle_array`
--
ALTER TABLE `vehicle_array`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_response`
--
ALTER TABLE `vehicle_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
