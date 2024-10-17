-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 02:33 PM
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
-- Database: `brgy_information_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `blotter_tbls`
--

CREATE TABLE `blotter_tbls` (
  `blotter_id` bigint(20) UNSIGNED NOT NULL,
  `res_id` bigint(20) UNSIGNED DEFAULT NULL,
  `blotter_transactionCode` text DEFAULT NULL,
  `blotter_respondents` text DEFAULT NULL,
  `blotter_brgyCaseNum` text DEFAULT NULL,
  `blotter_for` text DEFAULT NULL,
  `blotter_complaint` text DEFAULT NULL,
  `blotter_resolution` text DEFAULT NULL,
  `blotter_complaintMade` date DEFAULT NULL,
  `blotter_filedDate` date DEFAULT NULL,
  `blotter_status` varchar(255) DEFAULT NULL,
  `blotter_reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blotter_tbls`
--

INSERT INTO `blotter_tbls` (`blotter_id`, `res_id`, `blotter_transactionCode`, `blotter_respondents`, `blotter_brgyCaseNum`, `blotter_for`, `blotter_complaint`, `blotter_resolution`, `blotter_complaintMade`, `blotter_filedDate`, `blotter_status`, `blotter_reason`, `created_at`, `updated_at`) VALUES
(1, 2, 'LCN30-ZNA63-UTV29-RAI79-OQQ29-SDL57', 'theo', NULL, NULL, 'test complaint', 'test resolution', '2024-06-18', NULL, 'rejected', 'test reject', '2024-06-18 06:51:00', '2024-06-18 20:40:58'),
(2, 1, 'DVM30-PXJ94-FQB19-ZAJ79-JWU56-VOT29', 'Fire Lord Ozai', '555', 'test for 1', 'For Taking All Of The Nation\'s Kingdom,\r\nWiping Out The Airbenders,\r\nKilling His Own Son,\r\nAbusing His Own Wife', 'Hopefulle He Changed or He Dies', '2024-06-20', '2024-06-20', 'ready to pick up', NULL, '2024-06-18 18:52:46', '2024-06-18 20:38:06'),
(3, 2, 'PUJ97-POK25-TLS90-FBH55-NQX51-MMG65', 'Test Name', '123456789', '123123', 'Test Complaints', 'Test Resolution', '2024-06-19', '2024-06-20', 'ready to pick up', NULL, '2024-06-18 22:11:29', '2024-06-18 22:15:17'),
(4, 2, 'SQI61-XCA12-FBG93-NBB40-JJX77-PSP67', 'test', NULL, NULL, 'test', 'test', '2024-06-20', NULL, 'pending', NULL, '2024-06-20 10:04:08', '2024-06-20 10:04:08'),
(5, 2, 'GAL82-AXN48-VBW09-ROS62-CZO51-PFU82', 'testtest', NULL, NULL, 'testest', 'testest', '2024-06-20', NULL, 'pending', NULL, '2024-06-20 10:20:58', '2024-06-20 10:20:58'),
(6, 2, 'ZIS70-HUU03-XEU43-PIY80-GKQ13-YDK13', 'rqw', NULL, NULL, 'qwe', 'qwewe', '2024-06-21', NULL, 'pending', NULL, '2024-06-21 09:38:21', '2024-06-21 09:38:21'),
(7, 2, 'QRV60-UWY93-RKG13-OWH57-KEI22-RRI75', 'c', NULL, NULL, 'c', 'c', '2024-06-21', NULL, 'pending', NULL, '2024-06-21 11:15:43', '2024-06-21 11:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_certificate_tbls`
--

CREATE TABLE `brgy_certificate_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `res_id` bigint(20) UNSIGNED NOT NULL,
  `cert_transactionCode` text NOT NULL,
  `cert_purpose` text NOT NULL,
  `cert_dateIssued` date NOT NULL,
  `cert_pickUpDate` date NOT NULL,
  `certStatus` varchar(255) NOT NULL DEFAULT 'pending',
  `certReason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brgy_certificate_tbls`
--

INSERT INTO `brgy_certificate_tbls` (`id`, `res_id`, `cert_transactionCode`, `cert_purpose`, `cert_dateIssued`, `cert_pickUpDate`, `certStatus`, `certReason`, `created_at`, `updated_at`) VALUES
(1, 2, 'LTO54-PNR02-SZJ25-EAR93-NAF73-AHS40', 'test purpose', '2024-06-19', '2024-06-19', 'ready to pick up', NULL, '2024-06-19 10:04:52', '2024-06-19 10:08:18'),
(2, 2, 'ZJG96-QQU69-IGD01-BKW01-DGA96-GMK70', 'test', '2024-06-19', '2024-06-19', 'ready to pick up', NULL, '2024-06-19 10:45:57', '2024-06-19 10:46:50'),
(3, 2, 'PBQ05-NKE39-YWW41-ULP37-NPZ16-TPV56', 'test purpose', '2024-06-20', '2024-06-20', 'ready to pick up', NULL, '2024-06-20 00:24:59', '2024-06-20 00:33:27'),
(4, 13, 'MUP23-PCY20-OTJ26-FZD54-YRH53-FUR76', 'Money To Hunt Demons', '2024-06-20', '2024-06-20', 'ready to pick up', NULL, '2024-06-20 08:13:39', '2024-06-20 09:18:01'),
(5, 2, 'ITX13-UEE86-AHM59-GHP44-FUN32-BRH11', 'test walk in', '2024-06-20', '2024-06-21', 'ready to pick up', NULL, '2024-06-20 09:36:00', '2024-06-21 01:41:06'),
(6, 2, 'GSL59-RKK35-YBE67-BSC65-OOQ93-IVT30', 'qwerty', '2024-06-21', '2024-06-21', 'ready to pick up', NULL, '2024-06-21 00:07:57', '2024-06-21 09:02:42'),
(7, 2, 'FOV15-AEU20-YSX58-LIX07-EIW31-BDI60', 'uwaaaaahh', '2024-06-21', '2024-07-16', 'ready to pick up', NULL, '2024-06-21 09:18:45', '2024-07-15 22:18:04'),
(8, 2, 'GVS17-TUX62-WOI12-NMZ10-MRV19-VMA62', '0', '2024-06-21', '2024-06-23', 'rejected', 'qwe', '2024-06-21 11:17:18', '2024-06-22 02:12:13'),
(9, 2, 'XTI26-VGS98-OTP02-UNT31-EJP90-PDG84', 'reales testing mic test', '2024-06-30', '2024-07-26', 'ready to pick up', NULL, '2024-06-30 00:29:47', '2024-07-26 01:41:20'),
(10, 2, 'SEP25-VGF74-EBH48-PUX59-NQF42-FXO43', 'qwerrtyujq', '2024-07-14', '2024-07-15', 'processed', NULL, '2024-07-13 17:32:44', '2024-07-15 21:47:12'),
(11, 2, 'RJW46-GEO08-YOT67-SVN32-OCV78-XBR66', 'qweqweqwe', '2024-07-26', '2024-07-27', 'processed', NULL, '2024-07-26 01:42:37', '2024-07-26 01:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_clearance_tbls`
--

CREATE TABLE `brgy_clearance_tbls` (
  `bcl_id` bigint(20) UNSIGNED NOT NULL,
  `res_id` bigint(20) UNSIGNED NOT NULL,
  `bcl_transactionCode` text NOT NULL,
  `bcl_purpose` text NOT NULL,
  `bcl_dateIssued` text NOT NULL,
  `bcl_pickUpDate` text NOT NULL,
  `bcl_status` text NOT NULL,
  `bcl_reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brgy_clearance_tbls`
--

INSERT INTO `brgy_clearance_tbls` (`bcl_id`, `res_id`, `bcl_transactionCode`, `bcl_purpose`, `bcl_dateIssued`, `bcl_pickUpDate`, `bcl_status`, `bcl_reason`, `created_at`, `updated_at`) VALUES
(5, 2, 'DJC21-TZI71-YHS51-ZNL36-SLP76-UMX31', 'test clearance', '2024-06-20', '2024-06-21 08:01:30', 'ready to pick up', NULL, '2024-06-20 09:49:04', '2024-06-21 00:01:30'),
(6, 2, 'YAJ22-AGR37-FAG46-DYC23-LEX49-FVF84', 'test test purpose purpose', '2024-06-21', '2024-06-22', 'processed', NULL, '2024-06-21 00:08:30', '2024-06-22 02:21:51'),
(7, 2, 'OOD16-NTU50-EAT16-QYW50-YUM84-DUY26', 'o', '2024-06-21', '2024-06-23', 'cancelled', NULL, '2024-06-21 11:16:14', '2024-06-21 11:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_officials_tbls`
--

CREATE TABLE `brgy_officials_tbls` (
  `of_id` bigint(20) UNSIGNED NOT NULL,
  `res_id` bigint(20) UNSIGNED NOT NULL,
  `of_position` varchar(30) DEFAULT NULL,
  `of_date` date DEFAULT NULL,
  `of_status` varchar(15) DEFAULT NULL,
  `of_picture` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brgy_officials_tbls`
--

INSERT INTO `brgy_officials_tbls` (`of_id`, `res_id`, `of_position`, `of_date`, `of_status`, `of_picture`, `created_at`, `updated_at`) VALUES
(1, 2, 'Barangay Captain', '2024-07-02', 'Active', 'profilePictures/1715678881.jpg', '2024-07-02 07:42:59', '2024-07-02 07:42:59'),
(2, 1, 'Secretary', '2024-07-02', 'Active', 'profilePictures/1715677623.jpg', '2024-07-02 07:43:51', '2024-07-02 07:43:51'),
(3, 3, 'Treasurer', '2024-07-02', 'Active', 'profilePictures/1715688032.jpg', '2024-07-02 07:43:51', '2024-07-02 07:43:51'),
(4, 7, 'Barangay Kagawad', '2024-07-02', 'Active', 'profilePictures/1716372049.jpg', '2024-07-02 07:46:22', '2024-07-02 07:46:22'),
(5, 8, 'Barangay Kagawad', '2024-07-02', 'Active', 'profilePictures/18z7KUggte8Z11mPnHGLCSFmQe5CFbzzHOrmzIBf.jpg', '2024-07-02 07:43:51', '2024-07-02 07:43:51'),
(6, 9, 'SK Chairman', '2024-07-02', 'Active', 'profilePictures/EAUuOJV4yGMTZf2eZmWpI8tLvhye7YDH0F0mas56.jpg', '2024-07-02 07:50:35', '2024-07-02 07:50:35'),
(7, 10, 'SK Councilor', '2024-07-02', 'Active', 'profilePictures/Esvzcb2xfLw6RLonXNfyTAU9KVkGp40dCf8B39Ec.jpg', '2024-07-02 07:43:51', '2024-07-02 07:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `business_brgy_clearance_tbls`
--

CREATE TABLE `business_brgy_clearance_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `res_id` bigint(20) UNSIGNED NOT NULL,
  `bc_transactionCode` text NOT NULL,
  `bc_businessName` text NOT NULL,
  `bc_businessAddress` text NOT NULL,
  `bc_businessType` text NOT NULL,
  `bc_businessNature` text NOT NULL,
  `bc_dateIssued` text NOT NULL,
  `bc_pickUpDate` text NOT NULL,
  `bc_status` text NOT NULL,
  `bc_reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_brgy_clearance_tbls`
--

INSERT INTO `business_brgy_clearance_tbls` (`id`, `res_id`, `bc_transactionCode`, `bc_businessName`, `bc_businessAddress`, `bc_businessType`, `bc_businessNature`, `bc_dateIssued`, `bc_pickUpDate`, `bc_status`, `bc_reason`, `created_at`, `updated_at`) VALUES
(1, 1, 'ALY87-OTZ24-PPD80-DXK68-LSJ53-LKI47', 'Era Store', 'asdfasd', 'asdas', 'asdasd', '2024-05-30', '2024-06-18 10:18:57', 'ready to pick up', NULL, '2024-05-30 08:52:12', '2024-06-18 02:18:57'),
(2, 2, 'CQT88-DRE11-GOS42-IPR18-DNK25-JHD01', 'R-Tech', 'Ward II', 'Technology Business', 'We sell variety of gadgets such as phone, and many more', '2024-06-17', '2024-06-18', 'rejected', 'Bankrupt', '2024-06-17 06:15:31', '2024-06-17 20:01:39'),
(3, 2, 'LJK99-JUQ98-PHN06-EVX76-XTQ47-NXQ23', 'tst', 'tst', 'tst', 'tst', '2024-06-20', '2024-06-20', 'cancelled', NULL, '2024-06-20 10:29:17', '2024-06-28 20:07:04'),
(4, 2, 'DGR66-RBX14-ZKL10-QPH37-TIN31-UXS67', 'b', 'b', 'b', 'b', '2024-06-21', '2024-06-22 07:24:54', 'ready to pick up', NULL, '2024-06-21 11:15:10', '2024-06-21 23:24:54'),
(5, 2, 'PEF19-WNH60-IIM90-JSE36-XET84-ORB13', 'testB', 'testB Add', 'Test Type B', 'test nature B', '2024-07-14', '2024-07-18', 'pending', NULL, '2024-07-14 01:34:52', '2024-07-14 01:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbls`
--

CREATE TABLE `employee_tbls` (
  `em_id` varchar(255) NOT NULL,
  `em_fname` text NOT NULL,
  `em_lname` text NOT NULL,
  `em_email` text NOT NULL,
  `em_password` text NOT NULL,
  `em_address` text NOT NULL,
  `em_contact` text NOT NULL,
  `em_position` text NOT NULL,
  `em_picture` text NOT NULL,
  `em_status` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_tbls`
--

INSERT INTO `employee_tbls` (`em_id`, `em_fname`, `em_lname`, `em_email`, `em_password`, `em_address`, `em_contact`, `em_position`, `em_picture`, `em_status`, `created_at`, `updated_at`) VALUES
('W2-11111111-24', 'Ryzo', 'Ngalis', 'ryry@gmail.com', '$2y$12$Qog8QGKDDcLOYSSzj.kL3Ox0l74qvg/UMcLENAjKX8NhZuAlxBsZ2', 'ward II', '09082563658', 'System Admin', 'profilePictures/G2EqsxEFGc9q1nRL9r83decjUTkov2mN1v3IKGSl.png', 'active', '2024-06-21 11:33:11', '2024-06-21 11:49:56'),
('W2-11223344-24', 'Ryzosss', 'Ngalis', 'ngalis@gmail.com', '$2y$12$CUx42ZHh4E2ExmztUarxVuAmL2CXD4.K6I3cUASSMNfXFW2I9/S5K', 'shdifhsdfi', '24654564654', 'sjdfkjsdk', 'profilePictures/1719001978.jpg', NULL, '2024-04-18 00:27:38', '2024-06-21 12:32:58'),
('W2-11223355-24', 'Stiles', 'Stilinski', 'Stiles@gmail.com', '$2y$12$Y1/YVP0vhjQMIs9zQ4/vtercfCZABSKBxJhc1VMn/gg8kkldyre16', 'Ward II Minglanilla Cebu', '09084065084', 'Treasurer', 'profilePictures/0RRO1hQrssyGfobRH0B0SWFUnB0Ydwdao9RRYXQ8.jpg', 'active', '2024-06-19 22:26:51', '2024-06-21 13:02:17'),
('W2-12345655-24', 'fg', 'sdf', 'adfs@gmail.com', '$2y$12$RORSCSz6jflkDAp2/qfGE.L/8ZgF2RkMVDEzu5oHIquXxa3.3yPMi', 'dfgdf', '12345678910', 'dfgdfg', 'profilePictures/1GDmgX18zDgefSlZgtF8J7so0VUwBdf5pGK99XOe.jpg', NULL, '2024-05-01 23:43:15', '2024-05-01 23:43:15'),
('W2-12345678-21', 'Darren', 'Reales', 'realesdarren@gmail.com', '$2y$12$Fm81LguZwAuXda391sVPpeftah60JOfgal3PL.Tf1Yn3qpXgCw6.K', 'Poblacion Ward 2 Minglanilla Cebu', '09075269843', 'Barangay Captain', 'profilePictures/1720967364.jpeg', 'active', '2024-04-17 19:53:26', '2024-07-14 06:29:25'),
('W2-12345679-24', 'Emma', 'Watson', 'emma@gmail.com', '$2y$12$3omcmOGyB3fQWAdvPVnyb.3modDJ1PpcqExeoIOEaWv4w/o4tuGYW', 'Ward 2', '09584639568', 'Barangay Health Worker', 'profilePictures/iZzk62sMUDo0VtMnHHSMSySd24lsxVBSnHawcXcD.jpg', 'active', '2024-07-17 16:45:40', '2024-07-17 16:50:05'),
('W2-12345699-24', 'Christian', 'Tabelon', 'onichan@gmail.com', '$2y$12$H9SYwb6qYdoJ6JrH0FgN5OYbLk5VKrgqM1PELOccDhsShvm90w74a', 'Poblacion Ward II Minglanilla Cebu', '09080405061', 'Secretary', 'profilePictures/1718991190.jpeg', 'active', '2024-04-19 22:44:56', '2024-06-21 13:03:11'),
('W2-22222222-24', 'Scott', 'Mccall', 'scooter@gmail.com', '$2y$12$uKfkfGB/tP6Au6EwNAvxnuff1Afh3FjivpO.jmo1MR/gSbISRmBI6', 'ward II', '09075289634', 'Tanod', 'profilePictures/6I2y6deBDvEC2dVKoMPoDexh8XkULUvJrrXFbtN3.jpg', 'archived', '2024-06-21 12:43:36', '2024-06-21 13:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_tbls`
--

CREATE TABLE `medicine_tbls` (
  `med_id` bigint(20) UNSIGNED NOT NULL,
  `em_id` varchar(20) NOT NULL,
  `med_ndc` varchar(30) DEFAULT NULL,
  `med_prod` varchar(30) DEFAULT NULL,
  `med_desc` varchar(30) DEFAULT NULL,
  `med_qtBox` int(11) DEFAULT NULL,
  `med_count` int(11) DEFAULT NULL,
  `med_datePurchases` date DEFAULT NULL,
  `med_dateExpiration` date DEFAULT NULL,
  `med_remarks` varchar(30) DEFAULT NULL,
  `med_status` varchar(15) NOT NULL DEFAULT 'Available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_12_122405_add_two_factor_columns_to_users_table', 1),
(5, '2024_04_12_122423_create_personal_access_tokens_table', 1),
(6, '2024_04_18_031701_create_employee_tbls_table', 2),
(7, '2024_05_02_051215_create_resident_tbls_table', 3),
(8, '2024_05_02_052612_create_resident_tbls_table', 4),
(9, '2024_05_15_165542_create_certificate_tbls_table', 5),
(10, '2024_05_15_171216_create_certificate_tbls_table', 6),
(11, '2024_05_15_172427_create_requirements_tbls_table', 7),
(12, '2024_05_15_174606_add_req_name_to_requirements_tbls', 8),
(13, '2024_05_15_180519_add_req_name_to_requirements_tbls', 9),
(14, '2024_05_15_181129_add_price_to_certificate_tbls', 10),
(15, '2024_05_15_183353_add_res_id_to_requirements_tbls', 11),
(16, '2024_05_15_184920_create_transaction_tbls_table', 12),
(17, '2024_05_15_185225_create_transaction_tbls_table', 13),
(18, '2024_05_23_165303_create_brgy_certificate_tbls_table', 14),
(19, '2024_05_30_095844_add_cert_status_to_brgy_certificate_tbls', 15),
(20, '2024_05_30_100025_add_status_reasons_to_brgy_certificate_tbls', 16),
(21, '2024_05_30_100527_add_suffix_to_name_column_in_resident_tbls', 17),
(22, '2024_05_30_130614_create_business_brgy_clearance_tbls_table', 18),
(23, '2024_05_30_160414_create_brgy_clearance_tbls_table', 19),
(24, '2024_06_13_144352_create_blotter_tbls_table', 20),
(25, '2024_06_13_150604_create_blotter_tbls_table', 21),
(26, '2024_06_13_150759_create_transaction_tbls_table', 22),
(27, '2024_06_18_132211_drop_blotter_complainants_column_from_blotter_tbls_table', 23),
(28, '2024_06_18_142923_add_status_to_blotter_tbls', 24),
(29, '2024_06_19_032616_add_reason_to_blotter_tbls', 25),
(30, '2024_06_19_175933_drop_foreign_keys_from_transaction_tbls', 26),
(31, '2024_06_19_180047_drop_and_recreate_brgy_certificate_tbls', 26),
(32, '2024_06_19_181602_recreate_foreign_keys_in_transaction_tbls', 27),
(33, '2024_06_19_184055_drop_transaction_tbls_table', 28),
(34, '2024_06_19_184304_create_transaction_tbls_table', 29),
(35, '2024_06_20_092827_create_revenue_tbls_table', 30),
(36, '2024_06_20_101734_add_total_receive_to_revenue_tbls', 31),
(37, '2024_06_20_110515_alter_rev_verification_column_in_revenue_tbls_table', 32),
(38, '2024_06_20_151628_add_person_status_to_resident_tbls', 33),
(39, '2024_06_21_203811_add_status_to_employee_tbls', 34),
(40, '2024_06_28_051239_create_schedule_tbls_table', 35),
(41, '2024_07_02_071506_create_brgy_officials_tbls_table', 36),
(42, '2024_07_21_080809_create_medicine_tbls_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resident_tbls`
--

CREATE TABLE `resident_tbls` (
  `res_id` bigint(20) UNSIGNED NOT NULL,
  `res_picture` text NOT NULL,
  `res_household` text NOT NULL,
  `res_dateReg` date NOT NULL,
  `res_fname` text NOT NULL,
  `res_mname` text NOT NULL,
  `res_lname` text NOT NULL,
  `res_suffix` varchar(255) DEFAULT NULL,
  `res_bplace` text NOT NULL,
  `res_bdate` date NOT NULL,
  `res_civil` text NOT NULL,
  `res_sex` text NOT NULL,
  `res_purok` text NOT NULL,
  `res_sitio` varchar(15) DEFAULT NULL,
  `res_voters` text NOT NULL,
  `res_email` text NOT NULL,
  `res_contact` text NOT NULL,
  `res_citizen` text NOT NULL,
  `res_address` text NOT NULL,
  `res_occupation` text NOT NULL,
  `res_personStatus` varchar(15) DEFAULT NULL,
  `res_status` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resident_tbls`
--

INSERT INTO `resident_tbls` (`res_id`, `res_picture`, `res_household`, `res_dateReg`, `res_fname`, `res_mname`, `res_lname`, `res_suffix`, `res_bplace`, `res_bdate`, `res_civil`, `res_sex`, `res_purok`, `res_sitio`, `res_voters`, `res_email`, `res_contact`, `res_citizen`, `res_address`, `res_occupation`, `res_personStatus`, `res_status`, `created_at`, `updated_at`) VALUES
(1, 'profilePictures/1715677623.jpg', '5', '2001-08-09', 'tabs', 'tabelon', 'chan', 'Jr.', 'fosuh', '2001-08-22', 'Annulled', 'Male', 'Mahogany', 'Premier', 'Yes', 'Avatar@gmail.com', '09085271427', 'earth nation', 'earthern kingdom', 'Saviour of the Failures', 'Alive', 'archive', '2024-05-02 00:24:35', '2024-07-15 22:20:44'),
(2, 'profilePictures/1715678881.jpg', '7', '2010-08-09', 'Darren', 'Dejan', 'Reales', 'null', 'Simbajon, Tabunok', '2001-08-09', 'Single', 'Male', 'Tambis', 'San Vicente', 'Yes', 'realesdarren@gmail.com', '09055255254', 'Filipino', 'Tagaytay Vito, Minglanilla Cebu', 'N/A', 'Alive', 'active', '2024-05-02 02:05:46', '2024-06-21 05:29:57'),
(3, 'profilePictures/1715688032.jpg', '6', '2002-08-09', 'Stiles', 'Scott', 'Stilinski', NULL, 'Minglanilla', '2001-08-09', 'Married', 'Male', 'Tugas', NULL, 'No', 'QWERTY@gmail.com', '12345678910', 'Filipino', 'Vito Minglanilla', 'Janitor', NULL, NULL, '2023-05-01 20:26:46', '2024-05-14 04:00:32'),
(4, 'profilePictures/F0SMMcTgGCr7ft6xVlizafTLwSNr3JH1REN1mfvg.jpg', '100', '2024-05-04', 'Miles', 'Rio', 'Morales', NULL, 'Harlem', '2002-02-27', 'Single', 'Male', 'Guyabano', NULL, 'Yes', 'moralesmiles@gmail.com', '09323192845', 'puerto rican', 'harlem, new york', 'Spiderman', NULL, 'archive', '2024-05-03 21:29:19', '2024-06-21 05:30:16'),
(5, 'profilePictures/ktLnNlNeR1iYJLfY7WrHA7akRyjGEYvJhdtBApFb.jpg', '2', '2024-05-04', 'Vallyn', 'Gail', 'Isabelo', NULL, 'Minglanilla', '2010-02-14', 'Married', 'Female', 'Guyabano', NULL, 'Yes', 'gailvalsabelo@gmail.com', '09467721863', 'Filipino', 'Minglanilla Homes, Tungkil', 'Housewife', NULL, 'archive', '2024-05-03 21:32:51', '2024-06-21 04:31:44'),
(6, 'profilePictures/raVGCWgfR6vuM44ni4sjwxu2aK4mV9oT5ZM10jFS.jpg', '6', '2024-05-04', 'Gilbert', 'Lapinid', 'Canedo', NULL, 'Mohon', '2002-06-01', 'Single', 'Male', 'Tambis', NULL, 'Yes', 'canedobert@gmail.com', '09326785544', 'Filipino', 'Mohon Talisay City', 'Student', NULL, NULL, '2024-05-03 21:36:56', '2024-05-03 21:36:56'),
(7, 'profilePictures/1716372049.jpg', '5', '2024-05-04', 'Ryzo Mitchell', 'Fernandez', 'Ngalis', NULL, 'Minglanilla', '2002-11-27', 'Single', 'Male', 'Lubi', NULL, 'Yes', 'ryryryngalis@gmail.com', '09320820504', 'Filipino', 'Lower Calajoan, Minglanilla Cebu', 'N/A', NULL, NULL, '2024-05-03 21:49:22', '2024-05-22 02:00:50'),
(8, 'profilePictures/18z7KUggte8Z11mPnHGLCSFmQe5CFbzzHOrmzIBf.jpg', '1', '2024-05-04', 'Ralph', 'Makazo', 'Arko', NULL, 'Balamban', '2024-05-08', 'Married', 'Male', 'Mansinitas', NULL, 'Yes', 'test@gmail.com', '09647227229', 'Filipino', 'Balamban Cebu', 'N/A', NULL, NULL, '2024-05-03 21:57:26', '2024-05-03 21:57:26'),
(9, 'profilePictures/EAUuOJV4yGMTZf2eZmWpI8tLvhye7YDH0F0mas56.jpg', '5', '2011-11-11', 'Elmo', 'Wakabii', 'Kakamura', NULL, 'Minglanilla', '2002-11-27', 'Single', 'Male', 'Tugas', NULL, 'Yes', 'wakabiielmo@gmail.com', '09227652378', 'Filipino', 'Minglanilla Cebu', 'N/A', NULL, NULL, '2024-05-03 22:04:57', '2024-05-03 22:04:57'),
(10, 'profilePictures/Esvzcb2xfLw6RLonXNfyTAU9KVkGp40dCf8B39Ec.jpg', '7', '2024-05-04', 'Maki', 'Oni', 'Oze', 'null', 'Tokyo', '2013-01-01', 'Single', 'Female', 'Ipil-ipil', 'Ompot', 'Yes', 'makioze@gmail.com', '09762237676', 'Japanese', 'Tokyo, Japan', 'N/A', 'Alive', 'archive', '2024-05-03 22:09:16', '2024-06-21 04:29:48'),
(11, 'profilePictures/gdSh00gLgTBgUiDYaFdh7oQMtQErv5B26tyvB5kK.jpg', '5', '2024-05-04', 'Ian Christian', 'Tabelon', 'Tarega', NULL, 'Naga', '1987-01-01', 'Single', 'Male', 'Tugas', NULL, 'Yes', 'iantabelon@gmail.com', '09776541123', 'Filipino', 'Naga City, Cebu', 'N/A', NULL, NULL, '2024-05-03 22:11:12', '2024-05-03 22:11:12'),
(12, 'profilePictures/PLZTFGf6BmfPVfyh5BVjPaSzfx0tGoPy4JMAOV1r.jpg', '2', '2001-11-11', 't', 't', 't', NULL, 't', '2001-11-11', 'Annulled', 'Female', 'Tambis', NULL, 'No', 'tt@gmail.com', '12345678910', 't', 't', 't', NULL, NULL, '2024-05-12 20:57:33', '2024-05-12 20:57:33'),
(13, 'profilePictures/plvhlIJtkliGmGQWhT5OQNe8ha6yvA9k9LQF42OG.jpg', '1', '2023-07-07', 'Dante', 'Tony', 'Redgrave', 'III', 'Simbajon, Tabunok', '1978-06-09', 'Single', 'Male', 'Tugas', 'Larrobis', 'Yes', 'tonyredgrave@gmail.com', '09085263984', 'Filipino', 'Poblacion Ward II Minglanilla Cebu', 'Devil Hunter', 'Alive', 'active', '2024-06-20 07:41:10', '2024-06-20 08:05:08'),
(14, 'profilePictures/5YVAzRTMvsvmEAtKBoIkztUgH9jkjaNRWWU5wJ5h.jpg', '3', '2023-09-09', 'Vergil', 'Tony', 'Redgrave', 'II', 'Simbajon Tabunok', '1943-08-09', 'Widowed', 'Male', 'Tambis', 'Premier', 'Yes', 'vergil@gmail.com', '09362845639', 'Filipino', 'Poblacion Ward II Minglanilla Cebu', 'Devil Hunter', 'Alive', 'active', '2024-06-20 07:49:40', '2024-06-20 07:49:40'),
(15, 'profilePictures/WnS8UbJJG62mgySO8jDVIttgFMWpdHRsjCdU3YTD.jpg', '1', '2023-06-22', 'Kratos', 'Of', 'Sparta', 'II', 'test', '2001-08-09', 'Single', 'Male', 'Guyabano', 'Ompot', 'Yes', 'kratos@gmail.com', '09056325412', 'Filipino', 'test', 'test', 'Alive', 'archive', '2024-06-21 03:58:03', '2024-06-21 23:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `revenue_tbls`
--

CREATE TABLE `revenue_tbls` (
  `rev_id` bigint(20) UNSIGNED NOT NULL,
  `rev_type` text DEFAULT NULL,
  `rev_amount` double DEFAULT NULL,
  `rev_amountReceive` double DEFAULT NULL,
  `rev_verification` varchar(10) NOT NULL,
  `rev_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revenue_tbls`
--

INSERT INTO `revenue_tbls` (`rev_id`, `rev_type`, `rev_amount`, `rev_amountReceive`, `rev_verification`, `rev_date`, `created_at`, `updated_at`) VALUES
(1, 'front service/Certifications', 132, 120, 'No', '2024-06-20', '2024-06-20 03:06:01', '2024-06-20 03:06:01'),
(2, 'front service/Certifications', 132, 132, 'Yes', '2024-06-20', '2024-06-20 03:06:22', '2024-06-20 03:06:22'),
(3, 'front service/Certifications', 116, 116, 'Yes', '2024-06-21', '2024-06-20 23:49:35', '2024-06-20 23:49:35'),
(4, 'front service/Certifications', 148, 148, 'Yes', '2024-06-22', '2024-06-21 23:25:19', '2024-06-21 23:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_tbls`
--

CREATE TABLE `schedule_tbls` (
  `sched_id` bigint(20) UNSIGNED NOT NULL,
  `em_id` varchar(20) NOT NULL,
  `sched_title` varchar(30) DEFAULT NULL,
  `sched_description` text DEFAULT NULL,
  `sched_date` datetime DEFAULT NULL,
  `sched_type` varchar(15) DEFAULT NULL,
  `sched_status` varchar(15) DEFAULT NULL,
  `sched_picture` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule_tbls`
--

INSERT INTO `schedule_tbls` (`sched_id`, `em_id`, `sched_title`, `sched_description`, `sched_date`, `sched_type`, `sched_status`, `sched_picture`, `created_at`, `updated_at`) VALUES
(1, 'W2-12345699-24', 'Fiesta', 'A Mass Celebration For The Barangay\'s Patron Saint. This June 29, 2024 - 10:30 AM, at purok Ipil-ipil chapel. ', '2024-06-29 00:00:00', 'public', 'ongoing', 'profilePictures/1718991190.jpeg', '2024-06-28 05:42:44', '2024-06-28 05:42:44'),
(2, 'W2-12345699-24', 'Test1', 'test1', '2024-07-14 13:27:36', 'private', 'Completed', 'profilePictures/1719001978.jpg', '2024-07-14 05:43:20', '2024-07-14 05:43:20'),
(3, 'W2-12345699-24', 'test2', 'test2', '2024-06-30 00:00:00', 'public', 'ongoing', 'profilePictures/1719001978.jpg', '2024-06-28 07:09:18', '2024-06-28 07:09:18'),
(4, 'W2-12345699-24', 'Fiesta', 'Fiesta dri qweqerwerqwe', '2024-07-17 00:00:00', 'public', 'ongoing', 'profilePictures/15954545221151.jpg', '2024-07-10 05:15:02', '2024-07-10 05:15:02'),
(5, 'W2-12345699-24', 'Blood donation', 'qwerqwerqwerwqerqwerqwer', '2024-07-14 00:00:00', 'public', 'ongoing', 'profilePictures/12598454522121212.jpg', '2024-07-10 05:15:02', '2024-07-10 05:15:02'),
(6, 'W2-12345678-21', 'Meeting', 'Mag meeting ta karon about sa chu chu chu', '2024-07-14 13:18:10', 'private', 'ongoing', 'profilePictures/1715677623.jpg', '2024-07-14 05:18:10', '2024-07-14 05:18:10'),
(7, 'W2-12345678-21', 'Feeding Program', 'Manghatag ug pakaon sa katawhan', '2024-07-14 13:18:10', 'public', 'ongoing', 'profilePictures/1715677623.jpg', '2024-07-14 05:18:10', '2024-07-14 05:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tlxgxZGpj7S81KtWoc21mytYBV32g6ktU6KnStHJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSjFrTjkzcFl6WDNBY082S2dwbkMxem1EdWZ0blZNSnhZT1B1T3czWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vZmZpY2lhbHMiO319', 1725021173),
('U1OeDQIgecuVDeVx7AdIi2q1RBSVy9eqDXtQFwEy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZE1DeWNHaURic0IyU3MzdE5kcTEySEhXeGRsa3dDVW5mVWQ5SGxDUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1724927180);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tbls`
--

CREATE TABLE `transaction_tbls` (
  `tr_id` bigint(20) UNSIGNED NOT NULL,
  `cert_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bcl_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `blotter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tr_residenceCertNum` text DEFAULT NULL,
  `tr_orNum` text DEFAULT NULL,
  `tr_amountPaid` decimal(10,2) DEFAULT NULL,
  `tr_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_tbls`
--

INSERT INTO `transaction_tbls` (`tr_id`, `cert_id`, `bcl_id`, `business_id`, `blotter_id`, `tr_residenceCertNum`, `tr_orNum`, `tr_amountPaid`, `tr_date`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, NULL, '15', '15', '15.00', '2024-06-21', '2024-06-19 10:46:14', '2024-06-19 10:46:14'),
(2, 3, NULL, NULL, NULL, '11', '123456', '25.00', '2024-06-19', '2024-06-20 00:25:48', '2024-06-20 00:25:48'),
(5, 4, NULL, NULL, NULL, '5151', '5151', '50.00', '2024-06-21', '2024-06-20 08:14:07', '2024-06-20 08:14:07'),
(6, NULL, 5, NULL, NULL, '1717', '1717', '1717.00', '2024-06-21', '2024-06-20 09:49:38', '2024-06-20 09:49:38'),
(7, 5, NULL, NULL, NULL, '123', '123', '123.00', '2024-06-21', '2024-06-21 01:40:18', '2024-06-21 01:40:18'),
(8, 6, NULL, NULL, NULL, '123', '123', '123.00', '2024-06-22', '2024-06-21 09:02:15', '2024-06-21 09:02:15'),
(9, 7, NULL, NULL, NULL, '12345', '77', '28.00', '2024-06-30', '2024-06-21 23:12:36', '2024-06-21 23:13:27'),
(10, 7, NULL, NULL, NULL, '11', '626', '4.00', '2024-06-29', '2024-06-21 23:12:37', '2024-06-21 23:12:37'),
(11, NULL, NULL, 4, NULL, '152', '152', '25.00', '2024-06-22', '2024-06-21 23:24:40', '2024-06-21 23:24:40'),
(12, NULL, 6, NULL, NULL, '123', '312', '25.00', '2024-06-22', '2024-06-22 02:21:51', '2024-06-22 02:21:51'),
(13, 9, NULL, NULL, NULL, '1231', '123', '25.00', '2024-07-16', '2024-07-15 21:17:47', '2024-07-15 21:17:47'),
(14, 10, NULL, NULL, NULL, '23', '23', '23.00', '2024-07-16', '2024-07-15 21:47:12', '2024-07-15 21:47:12'),
(15, 11, NULL, NULL, NULL, '11', '11', '11.00', '2024-07-27', '2024-07-26 01:45:03', '2024-07-26 01:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blotter_tbls`
--
ALTER TABLE `blotter_tbls`
  ADD PRIMARY KEY (`blotter_id`),
  ADD KEY `blotter_tbls_res_id_foreign` (`res_id`);

--
-- Indexes for table `brgy_certificate_tbls`
--
ALTER TABLE `brgy_certificate_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brgy_certificate_tbls_res_id_foreign` (`res_id`);

--
-- Indexes for table `brgy_clearance_tbls`
--
ALTER TABLE `brgy_clearance_tbls`
  ADD PRIMARY KEY (`bcl_id`),
  ADD KEY `brgy_clearance_tbls_res_id_foreign` (`res_id`);

--
-- Indexes for table `brgy_officials_tbls`
--
ALTER TABLE `brgy_officials_tbls`
  ADD PRIMARY KEY (`of_id`),
  ADD KEY `brgy_officials_tbls_res_id_foreign` (`res_id`);

--
-- Indexes for table `business_brgy_clearance_tbls`
--
ALTER TABLE `business_brgy_clearance_tbls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_brgy_clearance_tbls_res_id_foreign` (`res_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `employee_tbls`
--
ALTER TABLE `employee_tbls`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_tbls`
--
ALTER TABLE `medicine_tbls`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `medicine_tbls_em_id_foreign` (`em_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `resident_tbls`
--
ALTER TABLE `resident_tbls`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `revenue_tbls`
--
ALTER TABLE `revenue_tbls`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `schedule_tbls`
--
ALTER TABLE `schedule_tbls`
  ADD PRIMARY KEY (`sched_id`),
  ADD KEY `schedule_tbls_em_id_foreign` (`em_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaction_tbls`
--
ALTER TABLE `transaction_tbls`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `transaction_tbls_cert_id_foreign` (`cert_id`),
  ADD KEY `transaction_tbls_bcl_id_foreign` (`bcl_id`),
  ADD KEY `transaction_tbls_business_id_foreign` (`business_id`),
  ADD KEY `transaction_tbls_blotter_id_foreign` (`blotter_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blotter_tbls`
--
ALTER TABLE `blotter_tbls`
  MODIFY `blotter_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brgy_certificate_tbls`
--
ALTER TABLE `brgy_certificate_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `brgy_clearance_tbls`
--
ALTER TABLE `brgy_clearance_tbls`
  MODIFY `bcl_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brgy_officials_tbls`
--
ALTER TABLE `brgy_officials_tbls`
  MODIFY `of_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `business_brgy_clearance_tbls`
--
ALTER TABLE `business_brgy_clearance_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_tbls`
--
ALTER TABLE `medicine_tbls`
  MODIFY `med_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resident_tbls`
--
ALTER TABLE `resident_tbls`
  MODIFY `res_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `revenue_tbls`
--
ALTER TABLE `revenue_tbls`
  MODIFY `rev_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule_tbls`
--
ALTER TABLE `schedule_tbls`
  MODIFY `sched_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction_tbls`
--
ALTER TABLE `transaction_tbls`
  MODIFY `tr_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blotter_tbls`
--
ALTER TABLE `blotter_tbls`
  ADD CONSTRAINT `blotter_tbls_res_id_foreign` FOREIGN KEY (`res_id`) REFERENCES `resident_tbls` (`res_id`) ON DELETE CASCADE;

--
-- Constraints for table `brgy_certificate_tbls`
--
ALTER TABLE `brgy_certificate_tbls`
  ADD CONSTRAINT `brgy_certificate_tbls_res_id_foreign` FOREIGN KEY (`res_id`) REFERENCES `resident_tbls` (`res_id`) ON DELETE CASCADE;

--
-- Constraints for table `brgy_clearance_tbls`
--
ALTER TABLE `brgy_clearance_tbls`
  ADD CONSTRAINT `brgy_clearance_tbls_res_id_foreign` FOREIGN KEY (`res_id`) REFERENCES `resident_tbls` (`res_id`) ON DELETE CASCADE;

--
-- Constraints for table `brgy_officials_tbls`
--
ALTER TABLE `brgy_officials_tbls`
  ADD CONSTRAINT `brgy_officials_tbls_res_id_foreign` FOREIGN KEY (`res_id`) REFERENCES `resident_tbls` (`res_id`) ON DELETE CASCADE;

--
-- Constraints for table `business_brgy_clearance_tbls`
--
ALTER TABLE `business_brgy_clearance_tbls`
  ADD CONSTRAINT `business_brgy_clearance_tbls_res_id_foreign` FOREIGN KEY (`res_id`) REFERENCES `resident_tbls` (`res_id`) ON DELETE CASCADE;

--
-- Constraints for table `medicine_tbls`
--
ALTER TABLE `medicine_tbls`
  ADD CONSTRAINT `medicine_tbls_em_id_foreign` FOREIGN KEY (`em_id`) REFERENCES `employee_tbls` (`em_id`) ON DELETE CASCADE;

--
-- Constraints for table `schedule_tbls`
--
ALTER TABLE `schedule_tbls`
  ADD CONSTRAINT `schedule_tbls_em_id_foreign` FOREIGN KEY (`em_id`) REFERENCES `employee_tbls` (`em_id`);

--
-- Constraints for table `transaction_tbls`
--
ALTER TABLE `transaction_tbls`
  ADD CONSTRAINT `transaction_tbls_bcl_id_foreign` FOREIGN KEY (`bcl_id`) REFERENCES `brgy_clearance_tbls` (`bcl_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_tbls_blotter_id_foreign` FOREIGN KEY (`blotter_id`) REFERENCES `blotter_tbls` (`blotter_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_tbls_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `business_brgy_clearance_tbls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_tbls_cert_id_foreign` FOREIGN KEY (`cert_id`) REFERENCES `brgy_certificate_tbls` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
