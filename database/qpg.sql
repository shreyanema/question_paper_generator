-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 09:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qpg`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(25) NOT NULL,
  `class` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class`) VALUES
(1, 'BCA'),
(3, 'BSC'),
(12, 'BCOM'),
(13, 'BBA'),
(14, 'BA');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `counter_ai_id` int(200) NOT NULL,
  `counter_id` int(200) NOT NULL,
  `counter_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`counter_ai_id`, `counter_id`, `counter_status`) VALUES
(131, 129, 'whatever'),
(132, 130, 'whatever'),
(133, 131, 'whatever'),
(134, 132, 'whatever'),
(135, 133, 'whatever'),
(136, 134, 'whatever'),
(137, 135, 'whatever'),
(138, 136, 'whatever'),
(139, 137, 'whatever'),
(140, 138, 'whatever'),
(141, 139, 'whatever'),
(142, 140, 'whatever'),
(143, 141, 'whatever'),
(144, 142, 'whatever'),
(145, 143, 'whatever'),
(146, 144, 'whatever'),
(147, 145, 'whatever'),
(148, 146, 'whatever'),
(149, 147, 'whatever'),
(150, 148, 'count');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `que_id` int(25) NOT NULL,
  `image_add` text NOT NULL,
  `image_option_1` text NOT NULL,
  `image_option_2` text NOT NULL,
  `image_option_3` text NOT NULL,
  `image_option_4` text NOT NULL,
  `imagehin_add` text NOT NULL,
  `imagehin_option_1` text NOT NULL,
  `imagehin_option_2` text NOT NULL,
  `imagehin_option_3` text NOT NULL,
  `imagehin_option_4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`que_id`, `image_add`, `image_option_1`, `image_option_2`, `image_option_3`, `image_option_4`, `imagehin_add`, `imagehin_option_1`, `imagehin_option_2`, `imagehin_option_3`, `imagehin_option_4`) VALUES
(59, 'QPG118.png', '', '', '', '', 'QPG119.png', '', '', '', ''),
(60, 'QPG120.png', '', '', '', '', 'QPG121.png', '', '', '', ''),
(73, '', '', '', '', '', '', '', '', '', ''),
(79, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(25) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level`) VALUES
(1, 'Easy'),
(2, 'Moderate'),
(3, 'Difficult');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `que_id` int(25) NOT NULL,
  `option_1` text CHARACTER SET utf8 NOT NULL,
  `option_2` text CHARACTER SET utf8 NOT NULL,
  `option_3` text CHARACTER SET utf8 NOT NULL,
  `option_4` text CHARACTER SET utf8 NOT NULL,
  `option_hin_1` text CHARACTER SET utf8 NOT NULL,
  `option_hin_2` text CHARACTER SET utf8 NOT NULL,
  `option_hin_3` text CHARACTER SET utf8 NOT NULL,
  `option_hin_4` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`que_id`, `option_1`, `option_2`, `option_3`, `option_4`, `option_hin_1`, `option_hin_2`, `option_hin_3`, `option_hin_4`) VALUES
(64, 'najsk', 'bhshj', 'bjksa', 'hdj', 'फ़ीडबैक सबमिट करें.111', 'फ़ीडबैक सबमिट करें.222', 'फ़ीडबैक सबमिट करें. 333', 'फ़ीडबैक सबमिट करें.444'),
(73, 'True', 'False', '', '', '', '', '', ''),
(74, 'jkjui', 'njknkjn', 'ghfghui876jtyrgf', 'ghu765ghjiuy', '', '', '', ''),
(75, 'kjkjk56468', 'dfghj', 'sjkgfs', 'djhfj', '', '', '', ''),
(76, 'jdnskj,m', 'fkjd', 'fhcjhek', 'hjk', '', '', '', ''),
(79, 'True', 'False', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `que_id` int(25) NOT NULL,
  `class_id` int(25) NOT NULL,
  `sub_id` int(25) NOT NULL,
  `unit_id` int(25) NOT NULL,
  `section_id` int(25) NOT NULL,
  `level_id` int(25) NOT NULL,
  `question` text CHARACTER SET utf8 NOT NULL,
  `hindi_trans` int(10) NOT NULL,
  `img_status` int(10) NOT NULL,
  `added_by` int(25) NOT NULL,
  `activity_status` int(25) NOT NULL,
  `question_hin` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`que_id`, `class_id`, `sub_id`, `unit_id`, `section_id`, `level_id`, `question`, `hindi_trans`, `img_status`, `added_by`, `activity_status`, `question_hin`) VALUES
(59, 1, 1, 2, 4, 1, 'dfjkgnfdkjb,nmn v,c', 1, 1, 1, 1, 'हमें अपने विचार बताएं – फ़ीडबैक सबमिट करें. भाषा बदलें: नेपाली, मराठी, हिन्दी, বাংলা .'),
(60, 1, 1, 1, 5, 1, 'mkldsmklma.ml', 1, 1, 1, 1, 'कोरोनावायरस यह एक ऐसा संक्रमण है जिसमें व्यक्ति को सर्दी-जुकाम और सांस लेने जैसी समस्या हो सकती है। यदि किसी व्यक्ति को कोरोना हुआ है तो वायरस उस व्यक्ति से दूसरे व्यक्ति में बहुत जल्दी ट्रांसफर होता है इस'),
(64, 1, 1, 1, 1, 1, 'slkajflkgjhjkl88980klklkmm.,m.', 1, 2, 1, 1, 'hjkl.liuotyughu8796'),
(73, 1, 1, 1, 2, 1, 'asdfghjkl;poiuytrewqhjkl;\'fghjklghjkfghjk[]\\\r\n\';lkjhghjkl;huijjh,gh', 2, 2, 1, 1, ''),
(74, 1, 1, 1, 1, 1, 'sdfghjklkjhgbnjkiuytrfghbjnkmliouyhgsdfghjkl', 2, 2, 1, 1, ''),
(75, 1, 1, 1, 1, 1, 'sdgjghjhkj', 2, 2, 1, 1, ''),
(76, 1, 1, 1, 1, 1, 'fkjdflhekfjlfjown,mn,mjnkjbkjkmnb,nm,jhkjhjmm', 2, 2, 1, 1, ''),
(79, 1, 1, 1, 2, 1, 'knliofjkkdgnd,mgn,d', 2, 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(25) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section`) VALUES
(1, 'Multiple Choice Questions'),
(2, 'True  and False'),
(3, 'Fill in the blanks'),
(4, 'Short Question'),
(5, 'Long Question');

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `sub_id` int(25) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `sub_code` int(25) NOT NULL,
  `paper` varchar(50) NOT NULL,
  `class_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`sub_id`, `sub`, `sub_code`, `paper`, `class_id`) VALUES
(1, 'Cloud  Computing', 784552, 'PAPER I', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(25) NOT NULL,
  `unit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(5, 'V');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(25) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `useremail`, `username`, `password`, `type`) VALUES
(1, 'shreya@gmail.com', 'User', '123456', 'user'),
(2, 'master@gmail.com', 'Admin', '456789', 'master');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`counter_ai_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD KEY `que_id` (`que_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`que_id`),
  ADD KEY `que_id` (`que_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`que_id`),
  ADD KEY `class_id` (`class_id`,`sub_id`,`unit_id`,`section_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `counter_ai_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `que_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub`
--
ALTER TABLE `sub`
  MODIFY `sub_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`que_id`) REFERENCES `questions` (`que_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`que_id`) REFERENCES `questions` (`que_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `sub` (`sub_id`),
  ADD CONSTRAINT `questions_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`),
  ADD CONSTRAINT `questions_ibfk_4` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`),
  ADD CONSTRAINT `questions_ibfk_5` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`),
  ADD CONSTRAINT `questions_ibfk_6` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sub`
--
ALTER TABLE `sub`
  ADD CONSTRAINT `sub_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
