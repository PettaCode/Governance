-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2016 at 01:08 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trust`
--

-- --------------------------------------------------------

--
-- Table structure for table `nova_categories`
--

CREATE TABLE IF NOT EXISTS `nova_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nova_categories`
--

INSERT INTO `nova_categories` (`id`, `name`, `description`) VALUES
(1, 'Nova Framework', 'This is the Description of category: Nova Framework'),
(2, 'PHP Programming', 'This is the Description of category: PHP Programming'),
(3, 'Fun', 'This is the Description for category: Fun');

-- --------------------------------------------------------

--
-- Table structure for table `nova_courses`
--

CREATE TABLE IF NOT EXISTS `nova_courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nova_courses`
--

INSERT INTO `nova_courses` (`id`, `name`, `description`) VALUES
(1, 'PHP Programming', 'This is the Description of Course: PHP Programming'),
(2, 'WebSockets and Web-Media Services', 'This is the Description of Course: WebSockets and Web-Media Services'),
(3, 'Nova Framework for Noobs', 'This is the Description of Course: Nova Framework for Noobs');

-- --------------------------------------------------------

--
-- Table structure for table `nova_course_student`
--

CREATE TABLE IF NOT EXISTS `nova_course_student` (
  `id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL,
  `course_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nova_course_student`
--

INSERT INTO `nova_course_student` (`id`, `student_id`, `course_id`) VALUES
(1, 1, 1),
(4, 3, 1),
(5, 3, 3),
(6, 4, 1),
(7, 4, 3),
(8, 1, 2),
(9, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nova_family_relations`
--

CREATE TABLE IF NOT EXISTS `nova_family_relations` (
  `id` int(10) NOT NULL,
  `name_relation` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nova_family_relations`
--

INSERT INTO `nova_family_relations` (`id`, `name_relation`, `created_at`, `updated_on`) VALUES
(1, 'Mother', NULL, '2016-11-04 10:29:35'),
(2, 'Father', NULL, '2016-11-04 10:29:35'),
(3, 'Husband', NULL, '2016-11-04 17:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `nova_family_relation_joins`
--

CREATE TABLE IF NOT EXISTS `nova_family_relation_joins` (
  `id` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `family_id` int(10) NOT NULL,
  `secondUserID` int(10) NOT NULL,
  `relationID` int(10) NOT NULL,
  `updatedON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nova_family_relation_joins`
--

INSERT INTO `nova_family_relation_joins` (`id`, `userID`, `family_id`, `secondUserID`, `relationID`, `updatedON`) VALUES
(1, 4, 1, 5, 1, '2016-11-04 10:38:24'),
(2, 4, 1, 6, 2, '2016-11-04 11:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `nova_family_tree_groups`
--

CREATE TABLE IF NOT EXISTS `nova_family_tree_groups` (
  `treeID` int(10) NOT NULL,
  `familyName` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nova_family_tree_groups`
--

INSERT INTO `nova_family_tree_groups` (`treeID`, `familyName`, `created_at`, `updated_at`) VALUES
(1, 'happy house', '2016-11-04 10:28:46', '2016-11-04 10:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `nova_forms`
--

CREATE TABLE IF NOT EXISTS `nova_forms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `created_group_account_id` int(11) NOT NULL,
  `created_customer_id` varchar(36) NOT NULL,
  `created` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1=draft, 2= queue 3 = procee 4 = complete',
  `modified_customer_id` varchar(40) DEFAULT NULL,
  `modified_employee_id` varchar(50) DEFAULT NULL,
  `deleted` int(10) DEFAULT NULL,
  `deleted_customer_id` varchar(50) DEFAULT NULL,
  `deleted_employee_id` varchar(44) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nova_forms_details`
--

CREATE TABLE IF NOT EXISTS `nova_forms_details` (
  `id` int(11) NOT NULL,
  `form_name` varchar(255) NOT NULL,
  `form_skug` varchar(240) NOT NULL,
  `form_description` text NOT NULL,
  `form_action` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nova_forms_details`
--

INSERT INTO `nova_forms_details` (`id`, `form_name`, `form_skug`, `form_description`, `form_action`, `created_at`, `updated_at`) VALUES
(1, 'Birth certificate', 'birth', 'Birth certificate related works', 'new,edit,renew', '2016-11-04 09:14:40', '0000-00-00 00:00:00'),
(2, 'Death Certificate', 'dc', 'Death certificate available through here.', 'new,lost', '', '2016-11-04 14:59:21'),
(3, 'vehicle Registration ', 'vechical', 'In Case on new Vehicle registration you can follow up through this form.', 'new', '', '2016-11-04 15:04:38'),
(4, 'Driving Licence', 'vechical', 'Apply for your Driving Licence and you can also track your application status.', 'track,new,edit', '', '2016-11-04 15:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `nova_form_store`
--

CREATE TABLE IF NOT EXISTS `nova_form_store` (
  `id` int(10) NOT NULL,
  `form_type` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_of` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `name_of_mother` varchar(255) NOT NULL,
  `name_of_father` varchar(255) NOT NULL,
  `name_of_husband` varchar(255) NOT NULL,
  `name_of_wife` varchar(255) NOT NULL,
  `name_of_gaurd` varchar(255) NOT NULL,
  `hospital_id` int(10) NOT NULL,
  `register_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nova_group_accounts`
--

CREATE TABLE IF NOT EXISTS `nova_group_accounts` (
  `id` int(11) NOT NULL,
  `group_account_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `created_employee_id` int(11) DEFAULT NULL,
  `created_customer_id` varchar(36) DEFAULT NULL,
  `created_merchant_id` int(11) DEFAULT NULL,
  `created_webpage_view_history_id` bigint(20) NOT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_employee_id` int(11) DEFAULT NULL,
  `deleted_customer_id` varchar(36) DEFAULT NULL,
  `deleted_merchant_id` int(11) DEFAULT NULL,
  `deleted_webpage_view_history_id` bigint(20) DEFAULT NULL,
  `group_account_type` tinyint(4) DEFAULT NULL COMMENT 'account type 1 - 5 for management system organization',
  `account_expiry` datetime DEFAULT NULL,
  `account_stat_1` varchar(255) DEFAULT NULL,
  `account_stat_2` varchar(255) DEFAULT NULL,
  `is_enable_detail_pensions` int(2) NOT NULL COMMENT '0- disable, 1-enable',
  `attachment1` longtext,
  `version_control` decimal(8,2) DEFAULT '1.00',
  `xero_contact_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `nova_group_account_to_approved_customer_users`
--

CREATE TABLE IF NOT EXISTS `nova_group_account_to_approved_customer_users` (
  `id` int(11) NOT NULL,
  `group_account_id` int(11) NOT NULL,
  `customer_id` varchar(36) NOT NULL,
  `group_account_category_id` int(11) DEFAULT NULL COMMENT 'If implemented to limit per category type',
  `created` datetime NOT NULL,
  `created_employee_id` int(11) DEFAULT NULL,
  `created_customer_id` varchar(36) DEFAULT NULL,
  `created_webpage_view_history_id` bigint(20) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_employee_id` int(11) DEFAULT NULL,
  `deleted_customer_id` varchar(36) DEFAULT NULL,
  `deleted_webpage_view_history_id` bigint(20) DEFAULT NULL,
  `admin` tinyint(2) DEFAULT '1' COMMENT '0=no,1=yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `nova_log_datas`
--

CREATE TABLE IF NOT EXISTS `nova_log_datas` (
  `id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nova_log_datas`
--

INSERT INTO `nova_log_datas` (`id`, `form_id`, `action`, `user_id`, `note`, `updated_at`) VALUES
(1, 1, 'draft', 2, 'on plocess', '2016-11-01 00:00:00'),
(2, 1, 'reject', 1, 'unwanted', '2016-11-01 02:00:00'),
(3, 2, 'Created', 6, NULL, '2016-11-01 03:09:18'),
(4, 3, 'Created', 5, 'Created', '2016-11-01 00:09:00'),
(5, 2, 'Viewed', 3, 'Vies the data', '2016-11-02 10:37:22'),
(6, 7, 'Viewed', 5, '', '2016-11-02 10:34:00'),
(7, 8, 'Queue', 4, 'Test', '2016-11-02 13:00:00'),
(8, 9, 'viewed', 5, 'Good', '2016-11-02 13:42:00'),
(9, 10, 'Queue', 4, 'Test', '2016-11-02 14:42:36'),
(10, 10, 'Approved', 5, 'Date Fixed', '2016-11-03 04:14:22'),
(11, 11, 'Viewed', 4, 'Test', '2016-11-03 04:19:00'),
(12, 12, 'viewed', 5, 'tested', '2016-11-03 04:43:00'),
(13, 13, 'Queue', 4, 'Test', '2016-11-03 05:19:00'),
(14, 14, 'Viewed', 5, 'Created', '2016-11-03 07:25:00'),
(15, 15, 'Queue', 4, 'Test', '2016-11-03 08:22:00'),
(16, 15, 'Viewed', 5, 'ok', '2016-11-03 09:24:00'),
(17, 16, 'Queue', 4, 'Test', '2016-11-04 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nova_options`
--

CREATE TABLE IF NOT EXISTS `nova_options` (
  `id` int(11) NOT NULL,
  `group` varchar(100) NOT NULL,
  `item` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nova_options`
--

INSERT INTO `nova_options` (`id`, `group`, `item`, `value`) VALUES
(1, 'app', 'name', 'CodePack'),
(2, 'app', 'color_scheme', 'blue'),
(3, 'mail', 'driver', 'smtp'),
(4, 'mail', 'host', ''),
(5, 'mail', 'port', '587'),
(6, 'mail', 'from.address', 'admin@novaframework.dev'),
(7, 'mail', 'from.name', 'The Nova Staff'),
(8, 'mail', 'encryption', 'tls'),
(9, 'mail', 'username', 'admin'),
(10, 'mail', 'password', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `nova_password_reminders`
--

CREATE TABLE IF NOT EXISTS `nova_password_reminders` (
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nova_posts`
--

CREATE TABLE IF NOT EXISTS `nova_posts` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nova_posts`
--

INSERT INTO `nova_posts` (`id`, `author_id`, `category_id`, `title`, `content`) VALUES
(1, 2, 1, 'Short introduction into Nova ORM', 'This is a short introduction into Nova ORM'),
(2, 2, 2, 'IF THEN ELSE or DO WHILE? A second approach', 'When to use IF THEN ELSE and when to use DO WHILE, to optimize your code.'),
(3, 1, 1, 'How to install Nova Framework in five minutes', 'There we describe the recommended method to install Nova Framework.'),
(4, 3, 2, 'A new lightweight ORM called SweetORM', 'Tom from Netherlands written a shiny little ORM, colloquially called Daddy Snail, err... SweetORM. '),
(5, 1, 1, 'Nova Framework downloads? over 1000000!', 'This month, Nova Framework downloads reached a tool about 1000000.'),
(6, 1, 3, 'Funny Dogs', 'Nope! Nothing there, but if you ask Jim, maybe he can show you some photos...'),
(7, 2, 2, 'Develop a Video-Chat for your website!', 'There are described methods to build a Video-Chat using WebSockets and other Browser native Services.');

-- --------------------------------------------------------

--
-- Table structure for table `nova_profiles`
--

CREATE TABLE IF NOT EXISTS `nova_profiles` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nova_profiles`
--

INSERT INTO `nova_profiles` (`id`, `user_id`, `country`) VALUES
(1, 1, 'Italy'),
(2, 2, 'UK'),
(3, 3, 'USA'),
(4, 4, 'UK'),
(5, 5, 'Australia');

-- --------------------------------------------------------

--
-- Table structure for table `nova_roles`
--

CREATE TABLE IF NOT EXISTS `nova_roles` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(40) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nova_roles`
--

INSERT INTO `nova_roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Root', 'root', 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.', '2016-06-05 01:48:00', '2016-06-05 01:48:00'),
(2, 'Administrator', 'administrator', 'Full access to create, edit, and update companies, and orders.', '2016-06-05 01:48:00', '2016-06-05 01:48:00'),
(3, 'Manager', 'manager', 'Ability to create new companies and orders, or edit and update any existing ones.', '2016-06-05 01:48:00', '2016-06-05 01:48:00'),
(4, 'Company Manager', 'company-manager', 'Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences.', '2016-06-05 01:48:00', '2016-06-05 01:48:00'),
(5, 'User', 'user', 'A standard user that can have a licence assigned to them. No administrative features.', '2016-06-05 01:48:00', '2016-06-05 01:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `nova_sessions`
--

CREATE TABLE IF NOT EXISTS `nova_sessions` (
  `id` varchar(255) NOT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nova_students`
--

CREATE TABLE IF NOT EXISTS `nova_students` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nova_students`
--

INSERT INTO `nova_students` (`id`, `username`, `realname`, `email`) VALUES
(1, 'john', 'John Doe', 'john.doe@novaframwork.dev'),
(2, 'jane', 'Jane Doe', 'jane.doe@novaframwork.dev'),
(3, 'tom', 'Tom Wayne', 'tom.mcdonald@novaframwork.dev'),
(4, 'maria', 'Maria Carey', 'maria.carey@novaframework.dev');

-- --------------------------------------------------------

--
-- Table structure for table `nova_users`
--

CREATE TABLE IF NOT EXISTS `nova_users` (
  `id` int(11) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `activation_code` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `group_account_id` int(10) NOT NULL,
  `family_id` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nova_users`
--

INSERT INTO `nova_users` (`id`, `role_id`, `username`, `password`, `realname`, `email`, `active`, `activation_code`, `remember_token`, `group_account_id`, `family_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$10$MZpxcVZpwTCCotIkkfPP5O1sDC7GiKzD9klh4MoM/aE44YaVm4Xga', 'Karthi SRV', 'admin@novaframework.dev', 1, NULL, 'ogiEjt3vfhzJMmOxeuY0vI7IK2MUAFl8ZB1UjAohoHIy9q9kXafIhQLUmLcZ', 0, NULL, '2016-06-03 10:15:00', '2016-11-04 18:04:05'),
(2, 2, 'marcus', '$2y$10$B1Q7LNu2xuIcFJ1lAotb5O93kkvUfFdOzUZhTmSdkQZ.6woLmgu3S', 'Marcus Spears', 'marcus@novaframework.dev', 1, NULL, NULL, 0, NULL, '2016-06-03 10:19:00', '2016-06-03 10:19:00'),
(3, 3, 'michael', '$2y$10$klop7YxFoZOVqDq3hA7efeKEz4csFhAelfwP8M4s1ROlgpkBx9qVW', 'Michael White', 'michael@novaframework.dev', 1, NULL, NULL, 0, NULL, '2016-06-03 10:20:00', '2016-06-05 14:22:19'),
(4, 5, 'john', '$2y$10$WzBPFMiFeJ2XK9eW34zEgelSJI3R1TVrOWbjVDxFXDeMQxoh8asYK', 'John Kennedy', 'john@novaframework.dev', 1, NULL, 'WHzD9IfQr59NkUanO8M3eOHOw5vkBOfJuhpYwsal2P1slIHvkYHKrcgBdS2a', 0, 1, '2016-06-03 10:21:00', '2016-11-04 18:12:41'),
(5, 5, 'mary', '$2y$10$z4bRYEcnoHOR.GuObWTATuH/x1lto.2wUJ1RxCYWOmfjay2LnTd8W', 'Mark Black', 'mark@novaframework.dev', 1, NULL, '271oZYitnK1JJB8p1vxt6i8jwjU95NkXrch3yxuaurHXiVAEmVkOg6cZeaj8', 0, 1, '2016-06-03 10:22:00', '2016-11-04 12:47:53'),
(6, 5, 'selvam', '$2y$10$z4bRYEcnoHOR.GuObWTATuH/x1lto.2wUJ1RxCYWOmfjay2LnTd8W', 'selvam', 'selvam@colour.com', 1, NULL, 'He6fvCeE3wNA3B1eybTspxfx7mYH5zpj6FnwG6kFMGTTk9IhldARVfXlv2HR', 0, 1, '0000-00-00 00:00:00', '2016-11-04 11:37:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nova_categories`
--
ALTER TABLE `nova_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_courses`
--
ALTER TABLE `nova_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_course_student`
--
ALTER TABLE `nova_course_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_family_relation_joins`
--
ALTER TABLE `nova_family_relation_joins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_family_tree_groups`
--
ALTER TABLE `nova_family_tree_groups`
  ADD PRIMARY KEY (`treeID`);

--
-- Indexes for table `nova_forms`
--
ALTER TABLE `nova_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_forms_details`
--
ALTER TABLE `nova_forms_details`
  ADD PRIMARY KEY (`id`,`form_name`);

--
-- Indexes for table `nova_group_accounts`
--
ALTER TABLE `nova_group_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_group_account_to_approved_customer_users`
--
ALTER TABLE `nova_group_account_to_approved_customer_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_log_datas`
--
ALTER TABLE `nova_log_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_options`
--
ALTER TABLE `nova_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_password_reminders`
--
ALTER TABLE `nova_password_reminders`
  ADD KEY `email` (`email`), ADD KEY `token` (`token`);

--
-- Indexes for table `nova_posts`
--
ALTER TABLE `nova_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_profiles`
--
ALTER TABLE `nova_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_roles`
--
ALTER TABLE `nova_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_sessions`
--
ALTER TABLE `nova_sessions`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `nova_students`
--
ALTER TABLE `nova_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nova_users`
--
ALTER TABLE `nova_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nova_categories`
--
ALTER TABLE `nova_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nova_courses`
--
ALTER TABLE `nova_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nova_course_student`
--
ALTER TABLE `nova_course_student`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `nova_family_relation_joins`
--
ALTER TABLE `nova_family_relation_joins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nova_family_tree_groups`
--
ALTER TABLE `nova_family_tree_groups`
  MODIFY `treeID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nova_forms`
--
ALTER TABLE `nova_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nova_forms_details`
--
ALTER TABLE `nova_forms_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nova_group_accounts`
--
ALTER TABLE `nova_group_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nova_group_account_to_approved_customer_users`
--
ALTER TABLE `nova_group_account_to_approved_customer_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nova_log_datas`
--
ALTER TABLE `nova_log_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `nova_options`
--
ALTER TABLE `nova_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `nova_posts`
--
ALTER TABLE `nova_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `nova_profiles`
--
ALTER TABLE `nova_profiles`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nova_roles`
--
ALTER TABLE `nova_roles`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nova_students`
--
ALTER TABLE `nova_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nova_users`
--
ALTER TABLE `nova_users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
