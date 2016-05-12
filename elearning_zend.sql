-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2016 at 04:05 PM
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
  `desc` varchar(255) NOT NULL,
  `num_view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cato`, `category`, `image`, `desc`, `num_view`) VALUES
(2, 'php', 'cash_on_delivery_1.jpg', 'Programming Langauage', 0),
(4, 'Java', 'cash_on_delivery_1.jpg', 'programming Language', 0),
(5, 'Design', 'cash_on_delivery_1.jpg', 'web and Desktop', 0),
(7, 'shrouk', '11048708_541149749359035_6977789512309035756_n.jpg', 'ba7bk', 0),
(9, 'yasimn', '2013-04-11_00056.jpg', 'toz', 0),
(11, 'ghada', 'huawei_honor_4c-00_af79.png', 'ghada is eating ', 0),
(12, 'eman', '10300001_247322232126188_11542617683126579_n.jpg', ' gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  gooooooood  go', 0),
(13, 'ddddd', '10384699_858913177471612_7681537882074516556_n.jpg', 'ryke heoiryh kyheohy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comt` int(11) NOT NULL,
  `contain_comt` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cours` int(11) DEFAULT NULL,
  `id_mat` int(11) DEFAULT NULL
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
  `cours_desc` varchar(255) NOT NULL,
  `num_view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id_cours`, `course`, `id_cato`, `id_user`, `cours_image`, `cours_desc`, `num_view`) VALUES
(1, 'Java', 2, 1, '2.jpg', 'Java SE', 0),
(2, 'PHP', 2, 1, '1.jpg', 'Zend Framework', 0),
(3, 'Python', 2, 1, '3.jpg', 'Python Language', 0),
(4, 'Ruby', 2, 1, 'images.jpeg', 'Ruby on rails', 0),
(5, 'test admin', 2, 1, '4.jpg', 'test adding course from admin panel ', 0),
(6, 'emanphp', 12, 18, '10376260_10153403732428647_2824273180537428405_n.png', 'uitieuthoie44 hoi5hy5iy hoiehyp', 0),
(7, 'oop', 4, 18, '10384699_858913177471612_7681537882074516556_n.jpg', 'hjekt hiwhtjkwe hhoihtoi', 0),
(8, 'rrrr', 4, 18, '10384699_858913177471612_7681537882074516556_n.jpg', 'jyj5oyjkl tjtbjk gbbert', 0);

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
  `no_users` int(100) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL,
  `desc_image` varchar(255) DEFAULT NULL,
  `desc_pdf` varchar(255) DEFAULT NULL,
  `desc_ppt` varchar(255) DEFAULT NULL,
  `desc_word` varchar(255) DEFAULT NULL,
  `desc_video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id_mat`, `id_type`, `mat_pdf`, `mat_image`, `mat_word`, `mat_video`, `mat_ppt`, `state`, `lock`, `no_users`, `id_user`, `id_cours`, `desc_image`, `desc_pdf`, `desc_ppt`, `desc_word`, `desc_video`) VALUES
(1, 1, NULL, '1236215_423998537709253_1886694365_n.jpg', NULL, NULL, NULL, 1, 0, 0, 2, 1, 'desc imagedesc imagedesc imagedesc imagedesc imagedesc imagedesc image', NULL, NULL, NULL, NULL),
(4, 2, NULL, '1236215_423998537709253_1886694365_n.jpg', NULL, NULL, NULL, 1, 0, 0, 2, 1, NULL, NULL, NULL, NULL, NULL),
(5, 1, NULL, '1209304_569680859770086_1411301702_n.jpg', NULL, NULL, NULL, 1, 0, 0, 2, 1, 'good osgood osgood osgood osgood osgood osgood osgood osgood osgood osgood osgood osgood osgood osgood osgood osgood osgood osgood osgood os', '', '', '', ''),
(6, 1, NULL, '10376260_10153403732428647_2824273180537428405_n.png', NULL, NULL, NULL, 1, 0, 0, 2, 1, 'os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os os ', '', '', '', ''),
(7, 1, NULL, '11091395_1049261875097612_4782535268933226312_n.jpg', NULL, NULL, NULL, 1, 0, 0, 2, 2, 'test  addmaterialaddmaterialaddmaterialaddmaterialaddmaterialaddmaterialaddmaterialaddmaterialaddmaterialaddmaterialaddmaterialaddmaterialaddmaterialaddmaterialaddmaterial', '', '', '', ''),
(8, 2, 'OWASP Top 10 - 2013.pdf', NULL, NULL, NULL, NULL, 1, 0, 0, 2, 1, '', 'https://github.com/emyeman/-Zend_Framwork_Project.githttps://github.com/emyeman/-Zend_Framwork_Project.githttps://github.com/emyeman/-Zend_Framwork_Project.githttps://github.com/emyeman/-Zend_Framwork_Project.githttps://github.com/emyeman/-Zend_Framwork_P', '', '', ''),
(9, 2, 'OWASP Top 10 - 2013.pdf', NULL, NULL, NULL, NULL, 1, 0, 0, 2, 1, '', 'hthie hiuht4 h4oh  ', '', '', ''),
(10, 1, NULL, NULL, NULL, 'aa.MP3', NULL, 1, 0, 0, 2, 1, '', '', '', '', 'MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3MP3v'),
(11, 3, NULL, NULL, NULL, NULL, 'emanppt.pptx', 1, 0, 0, 2, 1, '', '', 'text ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext ppttext pp', '', ''),
(12, 3, NULL, NULL, 'shellscript.docx', NULL, NULL, 1, 0, 0, 2, 1, '', '', '', 'test word test word test word test word test word test word test word test word test word test word test word test word test word test word test word test word test word test word test word test word test word test word test word test word test word test ', '');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id_req` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `Type_course` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id_req`, `message`, `id_user`, `title`, `Type_course`) VALUES
(2, 'I Want Course Java', 0, 'Java', 0),
(3, 'i Want lap 3 in photoshop', 0, 'Design', 1);

-- --------------------------------------------------------

--
-- Table structure for table `typematerials`
--

CREATE TABLE IF NOT EXISTS `typematerials` (
  `id_type` int(11) NOT NULL,
  `contain_type` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typematerials`
--

INSERT INTO `typematerials` (`id_type`, `contain_type`) VALUES
(1, 'lectures'),
(2, 'Labs'),
(3, 'Readings');

-- --------------------------------------------------------

--
-- Table structure for table `typeuploads`
--

CREATE TABLE IF NOT EXISTS `typeuploads` (
  `id_up` int(11) NOT NULL,
  `contain_upload` varchar(255) NOT NULL,
  `id_type` int(11) NOT NULL,
  `no_download` int(50) DEFAULT NULL,
  `id_cours` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeuploads`
--

INSERT INTO `typeuploads` (`id_up`, `contain_upload`, `id_type`, `no_download`, `id_cours`) VALUES
(2, 'Videos', 1, 0, 1),
(3, 'Word', 2, 0, 2),
(4, 'Videos', 2, 1, 2),
(6, 'Image', 1, 8, 1),
(7, 'PPT', 1, 0, 4),
(9, 'PDF', 1, 0, 5),
(10, 'PDF', 2, 0, 6),
(11, 'Video', 3, 0, 3),
(12, 'PPT', 3, 0, 1),
(13, 'Image', 3, 0, 5),
(14, 'Image', 2, 0, 6),
(15, 'PDF', 3, 0, 1),
(16, 'Image', 2, 0, 4),
(17, 'Image', 2, 0, 2),
(18, 'Image', 2, 1, 1),
(19, 'Image', 4, 0, 2),
(20, 'Image', 1, 2, 2),
(21, 'PDF', 2, 0, 1),
(22, 'PPt', 1, 0, 1),
(23, 'Word', 3, 0, 1);

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
  `signature` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `type`, `ban_user`, `image`, `gender`, `country`, `signature`, `username`) VALUES
(2, 'teste', 'teste', 1, 0, '', '', '', '', ''),
(6, 'mmm', '66vdvd', 1, 0, 'vsdjkv', 'hdj', 'hvdbjv', '', ''),
(7, 'iiko@yahoo.com', 'c5c2b197f8413b97a1d599a630f670fa', 0, 1, 'Cute style anime wallpapers 320x480 (08).jpg', 'male', 'egy', 'kjkjk', ''),
(8, 'aa@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 'Cute style anime wallpapers 320x480 (08).jpg', 'female', 'egy', 'hghh', ''),
(9, 'xx@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, '1841441.jpg', 'male', 'egy', 'cvb', ''),
(10, 'l@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, '1582969.jpg', 'male', 'egy', 'zxcv', ''),
(11, 'q@yahoo.com', 'c4ded2b85cc5be82fa1d2464eba9a7d3', 0, 1, '1582969.jpg', 'male', 'us', 'xc', ''),
(12, 'hhh@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 'Cute style anime wallpapers 320x480 (08).jpg', 'male', 'uk', 'bnm', 'fatma'),
(13, 'bbb@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 'cool-hd-widescreen-moving-wallpapers.jpg', 'male', 'egy', 'dfg', 'basma'),
(14, 'wew@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 'images (7).jpg', 'male', 'uk', 'hkjk', 'hello'),
(15, 'kjdshfj@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 'images (7).jpg', 'male', 'egy', 'ghgjgj', 'ali'),
(16, 's@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, '1800291.jpg', 'male', 'egy', 'jdkh', 'qw'),
(17, 'basma@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 'Water-Wave-Sports-690x388.jpg', 'male', 'egy', 'xcvb', 'bn'),
(18, 'egad86@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, '557494_423997801042660_1762411113_n.jpg', 'female', 'egy', 'emyyyyyyyyyyyy', 'eman');

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
  ADD PRIMARY KEY (`id_up`),
  ADD KEY `id_cours` (`id_cours`);

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
  MODIFY `id_cato` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id_req` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `typematerials`
--
ALTER TABLE `typematerials`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `typeuploads`
--
ALTER TABLE `typeuploads`
  MODIFY `id_up` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
