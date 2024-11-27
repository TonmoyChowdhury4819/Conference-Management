-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 05:50 AM
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
-- Database: `conferencedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 'Admin Chy', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1, '2022-09-15 10:33:32', '2022-09-15 10:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `conferenceadmin`
--

CREATE TABLE `conferenceadmin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_id` int(11) NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conferenceadmin`
--

INSERT INTO `conferenceadmin` (`id`, `name`, `title`, `short_name`, `conference_id`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(4, 'Tonmoy Chowdhury', 'Big Data, IoT & Machine Learning', 'BIM', 11, 'tonmoy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'conferenceadmin', '2022-09-27 10:43:40', '2022-09-27 10:43:40'),
(5, 'Munira Akter Moni', '4th Industrial Revolution', '4IR', 12, 'munira.moni1999@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'conferenceadmin', '2022-10-02 20:51:33', '2022-10-02 20:51:33'),
(12, 'tusty', 'Smart city next-gen social networks system based on software reconstruction model and cognitive computing', 'SNAM', 13, 'tusty@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'conferenceadmin', '2022-10-07 23:14:59', '2022-10-07 23:14:59'),
(13, 'Ramisa', 'bscj,.lc,', 'nig', 14, 'ramisa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'conferenceadmin', '2022-11-10 09:34:58', '2022-11-10 09:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `submission_deadline` date NOT NULL,
  `acceptance` date NOT NULL,
  `camera_ready` date NOT NULL,
  `registration` date NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`id`, `title`, `short_name`, `url`, `description`, `start_date`, `end_date`, `submission_deadline`, `acceptance`, `camera_ready`, `registration`, `admin_id`, `created_at`, `updated_at`) VALUES
(11, 'Big Data, IoT & Machine Learning', 'BIM', 'https://www.test.com', 'In this digital era, Internet of Things [IoT], big data and computer networks are dedicated to provide new innovative contributions focused towards the development and deployment of wide range of intelligent and networked information systems. Smart IoT and big data platform allows the networked devices to communicate along with the core values of volume, variety and velocity which in turn leads to the integration of Big data and IoT with advanced machine learning and other advanced techniques. This International Conference on Computer networks, Big Data and IoT [ICCBI 2021] will provide an interdisciplinary platform to bring together scientists, researchers and academicians to present and exchange the ideas of the latest research works and results related to IoT, big data and computer networking topics.', '2022-12-21', '2022-12-31', '2022-11-10', '2022-11-30', '2022-12-10', '2022-12-31', 4, '2022-11-09 20:09:18', '2022-11-09 20:09:18'),
(12, '4th Industrial Revolution', '4IR', 'https://www.4ir.com', 'International Conference on 4IR for the Emerging Future\" will be held during 4-5 November at The Institution of Engineers, Bangladesh (IEB), Dhaka organized by the Science and Technology Sub-Committee of Bangladesh Awami League.  With the insertion of the 4th industrial revolution (4IR) and dramatic transformation in human lifestyle to be fancied, Bangladesh is progressing rapidly and has become the role model of sustainable economic and social growth through digitization. This conference provides a unique opportunity for professionals, scientists, engineers, educators, researchers and students to share their views and thoughts on both the innovative drives of the government to 4IR and exploring emerging technologies that can lead to accomplish a smart Bangladesh by 2041 and implement a hundred-year Delta Plan. While be conducting in a hybrid mode, the talents meet-up from home and abroad will provide unique opportunities to brainstorm on the processes of transformation from the modest to the imagined peak.', '2022-12-21', '2022-12-29', '2022-10-13', '2022-10-31', '2022-11-10', '2022-12-29', 5, '2022-10-07 16:29:30', '2022-10-07 16:29:30'),
(13, 'Smart city next-gen social networks system based on software reconstruction model and cognitive computing', 'SNAM', 'https://www.researchgate.net', 'Social network structure modeling is the basis of other fields of social network research, aiming to build a reasonable social network structure model. However, due to privacy protection and many other reasons, it is almost impossible to obtain all the data needed to construct the social network structure model, so it is necessary to study the use of incomplete data to construct the social network structure model. Although there are many methods to construct social network structure model, there are some problems. The research shows that human social group behavior shows some specific behavior patterns, and there are many corresponding structures and changes within the group. The main means adopted by smart city is information and communication technology to study, plan and sense multiple key information of urban internal operation system, that is, it can intelligently interact with different needs of public security, urban services, people’s livelihood, environmental protection, industrial and commercial projects. The key lies in the adoption of high-end information sensing means, so that the city can operate and manage intelligently, improve the quality of life of urban people, and promote social harmony and long-term development. Therefore, this paper studies the next generation social network system of smart city based on software reconfiguration model and cognitive computing. We design the model based on the improvement of the traditional social networks to obtain the efficient representation and combine the software reconstruction model to improve the robustness. Through comparing the model with the state-of-the-art methods, the performance of the model is validated.', '2022-12-24', '2022-12-31', '2022-11-10', '2022-11-30', '2022-12-10', '2022-12-29', 12, '2022-11-09 22:31:05', '2022-11-09 22:31:05'),
(14, 'bscj,.lc,', 'nig', 'https://www.sway.com', 'dsgrh,khugjh', '2022-11-10', '2022-11-10', '2022-11-10', '2022-11-10', '2022-11-10', '2022-11-10', 13, '2022-11-10 09:39:14', '2022-11-10 09:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) UNSIGNED NOT NULL,
  `conference_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `conference_id`, `admin_id`, `title`, `abstract`, `keyword`, `scopes`, `file`, `created_at`, `updated_at`) VALUES
(1, 11, 4, 'Privacy Protection Using Machine Learning for Spam SMS Filtration', 'With technological advancements and increment in content based advertisement, the use of Short Message Service (SMS) on phones has increased to such a significant level that devices are sometimes flooded with a number of spam SMS. These spam messages can lead to loss of private data as well. There are many content-based machine learning techniques which have proven to be effective in filtering spam emails. Modern day researchers have used some stylistic features of text messages to classify them to be ham or spam. SMS spam detection can be greatly influenced by the presence of known words, phrases, abbreviations and idioms. This paper aims to compare different classifying techniques on different datasets collected from previous research works, and evaluate them on the basis of their accuracies, precision, recall and CAP Curve. The comparison has been performed between traditional machine learning techniques and deep learning methods.', '\'performance metrics\', \'accuracy\', \'precision\', \'recall\', \'f1-score\', \'cap-curve\'', 'ML', '1668287127.pdf', '2022-11-12 15:05:27', '2022-11-12 15:05:27'),
(2, 12, 5, 'A Comparative Study of Spam SMS Detection using Machine Learning Classifiers', 'With technological advancements and increment in content based advertisement, the use of Short Message Service (SMS) on phones has increased to such a significant level that devices are sometimes flooded with a number of spam SMS. These spam messages can lead to loss of private data as well. There are many content-based machine learning techniques which have proven to be effective in filtering spam emails. Modern day researchers have used some stylistic features of text messages to classify them to be ham or spam. SMS spam detection can be greatly influenced by the presence of known words, phrases, abbreviations and idioms. This paper aims to compare different classifying techniques on different datasets collected from previous research works, and evaluate them on the basis of their accuracies, precision, recall and CAP Curve. The comparison has been performed between traditional machine learning techniques and deep learning methods.', 'Spam SMS, Detection, Machine Learning Classifiers, Neural Networks.', 'NLP', '1668287610.pdf', '2022-11-12 15:13:30', '2022-11-12 15:13:30'),
(3, 13, 12, 'Epidemic forecasting based onmobility patterns: anapproach andexperimental evaluation onCOVID‑19 Data', 'During an epidemic, decision-makers in public health need accurate predictions of the future case numbers, in order to control the spread of new cases and allow eﬃcient resource planning for hospital needs and capacities. In particular, considering that infectious diseases are spread through human-human transmissions, the analysis of spatio-temporal mobility data can play a fundamental role to enable epidemic forecasting. This paper presents the design and implementation of a predictive approach, based on spatial analysis and regressive models, to discover spatio-temporal predictive epidemic patterns from mobility and infection data. The experimental evaluation, performed on mobility and COVID-19 data collected in the city of Chicago, is aimed to assess the eﬀectiveness of the approach in a real-world scenario.', 'COVID-19· Epidemic forecasting· Predictive models', 'Machine Learning', '1668401312.pdf', '2022-11-13 22:48:32', '2022-11-13 22:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_29_102908_create_reviewers_table', 1),
(6, '2022_10_07_212914_create_scopes_table', 2),
(7, '2022_10_11_084301_create_reviewers_table', 3),
(8, '2022_11_11_145050_create_files_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviewers`
--

CREATE TABLE `reviewers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conference_id` int(11) NOT NULL,
  `paper_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'reviewer',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviewers`
--

INSERT INTO `reviewers` (`id`, `conference_id`, `paper_id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(14, 11, 1, 'Fulan', 'fulan@gmail.com', '123456', 'reviewer', '2022-11-13 16:12:50', '2022-11-13 16:12:50'),
(15, 11, 1, 'Abbas', 'abbas@gmail.com', '123456', 'reviewer', '2022-11-13 16:12:50', '2022-11-13 16:12:50'),
(16, 12, 2, 'Mulan', 'mulan@gmail.com', '123456', 'reviewer', '2022-11-13 16:13:05', '2022-11-13 16:13:05'),
(17, 12, 2, 'Payel', 'payel@gmail.com', '123456', 'reviewer', '2022-11-13 16:34:24', '2022-11-13 16:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `conference_id` int(11) NOT NULL,
  `paper_id` int(11) UNSIGNED NOT NULL,
  `relevance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contribution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `structure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `standard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studymethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relevanceclarity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyphrases` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discussion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `admin_id`, `conference_id`, `paper_id`, `relevance`, `contribution`, `structure`, `standard`, `studymethod`, `relevanceclarity`, `abstract`, `keyphrases`, `discussion`, `reference`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 12, 2, 'Excellent', 'Good', 'Excellent', 'Excellent', 'Good', 'Good', 'Excellent', 'Good', 'Good', 'Good', 'Nice Work...', 'Yes_no_changes', '2022-11-13 17:44:23', '2022-11-13 17:44:23'),
(2, 5, 12, 2, 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'Good', 'The conference was a success because of its practical focus. Well-done.', 'Yes_no_changes', '2022-11-13 19:38:03', '2022-11-13 19:38:03'),
(3, 4, 11, 1, 'Good', 'Good', 'Good', 'Excellent', 'Excellent', 'Good', 'Good', 'Good', 'Good', 'Excellent', 'well done.', 'Yes_with_minor_revisions', '2022-11-13 20:09:16', '2022-11-13 20:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `scopes`
--

CREATE TABLE `scopes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scopes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scopes`
--

INSERT INTO `scopes` (`id`, `scopes`, `conference_id`, `created_at`, `updated_at`) VALUES
(1, 'Machine Learning', 12, '2022-10-11 08:22:24', '2022-10-11 08:22:24'),
(2, 'IoT', 12, '2022-10-11 08:22:24', '2022-10-11 08:22:24'),
(3, 'NLP', 12, '2022-10-11 08:22:24', '2022-10-11 08:22:24'),
(5, 'IoT', 11, '2022-11-09 14:18:46', '2022-11-09 14:18:46'),
(6, 'ML', 11, '2022-11-09 14:18:46', '2022-11-09 14:18:46'),
(7, 'Data Communication and Computer Networks', 13, '2022-11-09 16:36:37', '2022-11-09 16:36:37'),
(8, 'Wireless Communication', 13, '2022-11-09 16:36:37', '2022-11-09 16:36:37'),
(9, 'Cloud Computing', 13, '2022-11-09 16:36:37', '2022-11-09 16:36:37'),
(11, 'ML', 14, '2022-11-10 03:39:37', '2022-11-10 03:39:37'),
(12, 'Machine Learning', 13, '2022-11-14 04:44:51', '2022-11-14 04:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salutation` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `country`, `salutation`, `status`, `first_name`, `last_name`, `address`, `gender`, `email`, `password`, `role`, `is_approved`, `created_at`, `updated_at`) VALUES
(8, 'Bangladesh', 'Mr', 'Government', 'Pritam', 'Chawkroborty', 'Kotowali,Chittagong', 'Male', 'pritam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Author', 1, '2022-09-28 14:37:18', '2022-09-28 14:37:18'),
(9, 'Bangladesh', 'Mr', 'Student', 'sdfghjk', 'xcvbnm', 'Karachi', 'Female', 'n@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Author', 1, '2022-09-28 17:50:49', '2022-09-28 17:50:49'),
(10, 'Bangladesh', 'Mr', 'Student', 'Amit', 'Chowdhury', 'Chandgaon', 'Male', 'amit@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Author', 1, '2022-10-01 14:42:03', '2022-10-01 14:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conferenceadmin`
--
ALTER TABLE `conferenceadmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `conference_id` (`conference_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `short_name` (`short_name`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `fk_shortname` (`short_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_conference_id_foreign` (`conference_id`),
  ADD KEY `fk_scpes` (`scopes`),
  ADD KEY `fk_admin_id` (`admin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviewers`
--
ALTER TABLE `reviewers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reviewers_email_unique` (`email`),
  ADD KEY `paper_id` (`paper_id`),
  ADD KEY `conference_id` (`conference_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_paper` (`paper_id`),
  ADD KEY `fk_conference` (`conference_id`),
  ADD KEY `FK_reviews` (`admin_id`);

--
-- Indexes for table `scopes`
--
ALTER TABLE `scopes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scopes_conference_id_foreign` (`conference_id`),
  ADD KEY `scopes` (`scopes`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conferenceadmin`
--
ALTER TABLE `conferenceadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scopes`
--
ALTER TABLE `scopes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conferences`
--
ALTER TABLE `conferences`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`admin_id`) REFERENCES `conferenceadmin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `conferenceadmin` (`conference_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_shortname` FOREIGN KEY (`short_name`) REFERENCES `conferenceadmin` (`short_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_title` FOREIGN KEY (`title`) REFERENCES `conferenceadmin` (`title`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_conference_id_foreign` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`),
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `conferenceadmin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_scpes` FOREIGN KEY (`scopes`) REFERENCES `scopes` (`scopes`);

--
-- Constraints for table `reviewers`
--
ALTER TABLE `reviewers`
  ADD CONSTRAINT `conference_id` FOREIGN KEY (`conference_id`) REFERENCES `files` (`conference_id`),
  ADD CONSTRAINT `paper_id` FOREIGN KEY (`paper_id`) REFERENCES `files` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews` FOREIGN KEY (`admin_id`) REFERENCES `files` (`admin_id`),
  ADD CONSTRAINT `fk_conference` FOREIGN KEY (`conference_id`) REFERENCES `files` (`conference_id`),
  ADD CONSTRAINT `fk_paper` FOREIGN KEY (`paper_id`) REFERENCES `files` (`id`);

--
-- Constraints for table `scopes`
--
ALTER TABLE `scopes`
  ADD CONSTRAINT `scopes_conference_id_foreign` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
