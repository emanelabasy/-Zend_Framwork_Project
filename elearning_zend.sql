-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2016 at 11:18 AM
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
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cato`, `category`) VALUES
(3, 'mysql'),
(2, 'php');

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
  `id_type` int(11) NOT NULL,
  `cours_pdf` varchar(255) DEFAULT NULL,
  `cours_image` varchar(255) DEFAULT NULL,
  `cours_word` varchar(255) DEFAULT NULL,
  `cours_video` varchar(255) DEFAULT NULL,
  `cours_ppt` varchar(255) DEFAULT NULL,
  `state` tinyint(1) NOT NULL,
  `lock` tinyint(1) NOT NULL,
  `no_users` int(100) NOT NULL,
  `no_download` int(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cato` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id_req` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sub` int(11) DEFAULT NULL,
  `id_cours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `id_sub` int(11) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `id_cato` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `typecourses`
--

CREATE TABLE IF NOT EXISTS `typecourses` (
  `id_type` int(11) NOT NULL,
  `contain_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `image` varchar(255) NOT NULL,
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
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_user_3` (`id_user`),
  ADD KEY `id_sub` (`id_sub`),
  ADD KEY `id_type` (`id_type`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id_req`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `id_cato` (`id_cato`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `typecourses`
--
ALTER TABLE `typecourses`
  ADD PRIMARY KEY (`id_type`);

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
  MODIFY `id_cato` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id_req` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `typecourses`
--
ALTER TABLE `typecourses`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
