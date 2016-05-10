-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2016 at 11:50 AM
-- Server version: 5.6.28-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning_zend`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_cato` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `desc` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cato`, `category`, `image`, `desc`) VALUES
(2, 'php', NULL, ''),
(3, 'mysql', NULL, ''),
(4, 'program', NULL, 'program');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comt` int(11) NOT NULL,
  `contain_comt` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id_cours` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `id_cato` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cours_image` varchar(255) DEFAULT NULL,
  `cours_desc` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id_cours`, `course`, `id_cato`, `id_user`, `cours_image`, `cours_desc`) VALUES
(1, 'php', 4, 2, NULL, 'phphphphph');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `id_mat` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `mat_pdf` varchar(255) DEFAULT NULL,
  `mat_image` varchar(255) DEFAULT NULL,
  `mat_word` varchar(255) DEFAULT NULL,
  `mat_video` varchar(255) DEFAULT NULL,
  `mat_ppt` varchar(255) DEFAULT NULL,
  `state` tinyint(1) NOT NULL,
  `lock` tinyint(1) NOT NULL,
  `no_users` int(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cato` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id_mat`, `id_type`, `mat_pdf`, `mat_image`, `mat_word`, `mat_video`, `mat_ppt`, `state`, `lock`, `no_users`, `id_user`, `id_cato`, `id_cours`) VALUES
(1, 1, NULL, 'pic3.jpg', NULL, NULL, NULL, 1, 0, 0, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id_req` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cours` int(11) DEFAULT NULL,
  `id_mat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `typematerials`
--

CREATE TABLE IF NOT EXISTS `typematerials` (
  `id_type` int(11) NOT NULL,
  `contain_type` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typematerials`
--

INSERT INTO `typematerials` (`id_type`, `contain_type`) VALUES
(1, 'lectures'),
(2, 'Labs'),
(4, 'Readings');

-- --------------------------------------------------------

--
-- Table structure for table `typeuploads`
--

CREATE TABLE IF NOT EXISTS `typeuploads` (
  `id_up` int(11) NOT NULL,
  `contain_upload` varchar(255) NOT NULL,
  `id_type` int(11) NOT NULL,
  `no_download` int(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeuploads`
--

INSERT INTO `typeuploads` (`id_up`, `contain_upload`, `id_type`, `no_download`) VALUES
(2, 'Videos', 1, 0),
(3, 'Word', 2, 0),
(4, 'Videos', 2, 0),
(6, 'Image', 1, 0),
(7, 'PPt', 1, 0),
(9, 'PDf', 1, 0),
(10, 'PDF', 2, 0),
(12, 'Image', 2, 0),
(13, 'Video', 4, 0),
(14, 'PPT', 4, 0),
(19, 'PDF', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(32) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `ban_user` tinyint(1) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` varchar(100) NOT NULL,
  `country` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `type`, `ban_user`, `image`, `gender`, `country`, `signature`) VALUES
(2, 'teste', 'teste', 1, 0, '', '', '', ''),
(6, 'mmm', '66vdvd', 1, 0, 'vsdjkv', 'hdj', 'hvdbjv', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cato`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comt`),
  ADD KEY `id_cours` (`id_cours`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `id_cato` (`id_cato`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id_mat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_user_3` (`id_user`),
  ADD KEY `id_sub` (`id_cours`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_cours` (`id_cours`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id_req`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `typematerials`
--
ALTER TABLE `typematerials`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `typeuploads`
--
ALTER TABLE `typeuploads`
  ADD PRIMARY KEY (`id_up`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cato` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id_req` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `typematerials`
--
ALTER TABLE `typematerials`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `typeuploads`
--
ALTER TABLE `typeuploads`
  MODIFY `id_up` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
