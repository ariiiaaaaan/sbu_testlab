-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2015 at 01:42 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `body` text,
  `type` enum('blog','news','tutorials','other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `adress` text NOT NULL,
  `date` date NOT NULL,
  `body` text NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `highlight` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL,
  `body` text,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `researchareas` text,
  `interests` text,
  `tel` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `position` text,
  `pinterest` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photots`
--

CREATE TABLE IF NOT EXISTS `photots` (
  `id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `research_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `researchs`
--

CREATE TABLE IF NOT EXISTS `researchs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `publisher` text,
  `date` date DEFAULT NULL,
  `page` varchar(100) DEFAULT NULL,
  `path` varchar(200) NOT NULL,
  `abstract` text,
  `keyword` text,
  `refrences` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag_blog`
--

CREATE TABLE IF NOT EXISTS `tag_blog` (
  `tag_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photots`
--
ALTER TABLE `photots`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `event_id_2` (`event_id`), ADD UNIQUE KEY `member_id_2` (`member_id`), ADD KEY `article_id` (`research_id`), ADD KEY `content_id` (`content_id`), ADD KEY `event_id` (`event_id`), ADD KEY `member_id` (`member_id`), ADD KEY `article_id_2` (`research_id`), ADD KEY `content_id_2` (`content_id`);

--
-- Indexes for table `researchs`
--
ALTER TABLE `researchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_blog`
--
ALTER TABLE `tag_blog`
  ADD KEY `tag_id` (`tag_id`), ADD KEY `blog_id` (`content_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photots`
--
ALTER TABLE `photots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `researchs`
--
ALTER TABLE `researchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `photots`
--
ALTER TABLE `photots`
ADD CONSTRAINT `photots_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`),
ADD CONSTRAINT `photots_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
ADD CONSTRAINT `photots_ibfk_3` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
ADD CONSTRAINT `photots_ibfk_4` FOREIGN KEY (`research_id`) REFERENCES `researchs` (`id`);

--
-- Constraints for table `tag_blog`
--
ALTER TABLE `tag_blog`
ADD CONSTRAINT `tag_blog_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
ADD CONSTRAINT `tag_blog_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
