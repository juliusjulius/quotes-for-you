-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 31, 2019 at 08:25 PM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `last_name`, `address`, `email`, `gender`) VALUES
(46, 'aaa', 'aaa', 'aa', 'a', 'a'),
(47, 'sss', 'sss', 'ss', 'ss', 's'),
(48, 'sss', 'sss', 'ss', 'ss', 's'),
(49, 'ss', 'ss', 's', 's', 's'),
(50, 'ssqqq', 'ssqq', 'sqq', 'sqq', 's'),
(51, 'c', 'c', 'e', 'pcbg', 'f'),
(52, 'a', 'aa', 'asfdfgfdf', 'saasdffrd', 'd'),
(53, 'd', 'd', 'd', 'dvbnbvbv', 's'),
(55, 'qqq', 'qqq', 'qqq', 'qq', 'q'),
(56, 'Julius', 'Julius', 'Julius', 'Julius', 'j'),
(57, 's', 's', 's', 'sdfvfvfhgthvffgbbgd', 'r'),
(58, 'xsx', 'xs', 'xs', 'xdfdsd', 'd'),
(59, 'xsx', 'xs', 'xs', 'xdfdsdcvb', 'd'),
(60, 'd', 'd', 'dd', 'dddddddddddddddddddddds', 's'),
(61, 'xx', 'xx', 'ccd', 'xsdfghjk', 'k'),
(62, 'sssss', 's', 's', 'uizujhjtz', 'Z'),
(63, 'bbh', 'b', 'b', 'hghgffbbfv', 'Z'),
(64, 'dsd', 'ssd', 'sedd', 'dfdegf@ds.sk', 'M'),
(65, 's', 's', 's', 's@ss.sk', 'Z'),
(66, 'seee', 'seed', 'sdewww', 'sdf@ss.sk', 'Z'),
(67, 's', 's', 's', 'skisdi@fmfs.sk', 'M'),
(68, 'd', 'dd', 'dd', 'dmdkdm@ddkd.sk', 'I'),
(69, 'aaa', 'aa', 'ass@.dsa', 'ass@ss.sk', 'Z'),
(70, 'slslsl', 'lslsls', 'lsllsls', 'email@ddd.sk', 'I'),
(71, 'ssdd', 'ss', 'ss', 'sjisjis@skks.sk', 'Z'),
(72, 'aaa', 'sss', 'ss', 'sdd@dkd.sk', 'M'),
(73, 'Igor', 'Igor', 'Igor', 'Igor@igor.igor', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `data_of_registration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `data_of_registration`) VALUES
(55, 'qqqq', '$2y$10$N/uTZ/luurb/k3aEvfUGqexzU76tOBGce4zyA9Kedy5utTXBP6aQG', '2019-12-28 09:22:27'),
(54, 'qqqqqqqq', '$2y$10$YQ/6IO/kk3ChtE3sbAEApOM37LlcpRSFFgSVoaDZoPc08obYJS1iW', '2019-12-28 09:22:14'),
(53, 'juuulo', '$2y$10$4O2.V1EaHgOCNiPthNxvfu2rfJulWMLpskexqMaXUTQo/OiksUOwi', '2019-12-27 14:03:32'),
(52, 'a', '$2y$10$6cid4IjtkqGhySovHz6MhOtaKyGE/SLAC8OF.JMS1r9Zu9Ix8niWq', '2019-12-27 13:59:34'),
(51, 'qpdvg', '$2y$10$BTjdfUVNFkGQUCp4C2ocgu7zb1MzbWIve7LDub3joSLni9OM74Rqa', '2019-12-27 13:55:50'),
(50, 'qqq', '$2y$10$nCaDz37QK102MKErlQS7LeFg5jPXHDbiEJos8UtB6CC72OjiS9.Jm', '2019-12-27 12:31:21'),
(49, 'ss', '$2y$10$JGms52xZ/YQXA1YmkhRhwO/l9EjsRGGw0NpIzw7hAIWNqzt1RQOJ.', '2019-12-27 12:30:59'),
(48, 'sssdddd', '$2y$10$FArIJP3oFdzeJvRsF3WpPe2yjReulatPtZPvBeUnm2xDFm1sf8c7u', '2019-12-27 12:24:35'),
(47, 'sss', '$2y$10$6BTzvR/6SJC0Ah62XFdlI.Loq3d6adPyxS5so4GcZi7oSZG3hQtY2', '2019-12-27 12:18:06'),
(46, 'aaaa', '$2y$10$jDH1fZuI1pxJpVDVPTZa4OcKZ9UKgdBoz6XdnP4f8EaLFj9EcMnH.', '2019-12-27 11:33:24'),
(45, 'aaaa', '$2y$10$ooMwPGBYSpMi0yQLpVLI6eP8R2MOHeTxImNfORtcJqeXPViBMgyMC', '2019-12-27 09:55:56'),
(56, 'Julius', '$2y$10$1A9DrDf1YJl0jpmVgyTgM.04rCxcHmDtCklhru5ZpzgliHGdA3IMe', '2019-12-28 10:42:22'),
(57, 's', '$2y$10$EPOXs.zPEQ2ROPQ8/q45JOu.CqxtDOIeHduhzSaH8a/wiCGXtMOly', '2019-12-28 13:02:25'),
(58, 'xsxs', '$2y$10$Ze3oYl2M4d/iBHyZAP8JpuFmT/3UYbDZJob7MFCMRC1yEZ/HRHBTu', '2019-12-28 13:11:27'),
(59, 'xsxscdd', '$2y$10$llvNkpNmYr8hEMiygVujue1v6Hvk6FtXCWgo2cq8TL7X9j6JoqRlO', '2019-12-28 13:12:02'),
(60, 'ddddddddddddds', '$2y$10$8PH4ZlOtszcInznixjvh6OK2m6ykEOwC5IjtsKo7fnjHzVLKxmSJG', '2019-12-28 13:14:26'),
(61, 'xxxcxsdd', '$2y$10$tILxAiL9exK53TZbOFx/jeswNJNYLczimupLFKuOK0Mh5q65Ia/Ua', '2019-12-28 13:16:18'),
(62, 'sssssserrer', '$2y$10$ODFI9hMtLTGnQ4tu0sefhepRL8x5g2px/1IJuvR.9nGUH/5Xks55.', '2019-12-28 13:25:28'),
(63, 'ddfdfvbb', '$2y$10$mBnOZR1Eec4eFMBFb53R7OImIpTzCn8NvYv7yhB6tELp07qt4n5Ku', '2019-12-28 13:46:50'),
(64, 'ddddddds', '$2y$10$E/4LgoqM5KFVlMwFecfOieHm7.DiNNA4yIOHxZ8p9Er7KuegGv4.e', '2019-12-28 14:01:52'),
(65, 'sssss', '$2y$10$0sDkqqUlsBkk7pciEmTLbe5d8m27zVTpFnS5aqicxcbXUzOroVYaO', '2019-12-28 16:47:42'),
(66, 'sssssnjgjj', '$2y$10$Um6WFDepw0CHTR0yvxLClunb3n5pxatpB8cPmftsViKTPMM7fdFpi', '2019-12-28 16:50:36'),
(67, 'Juliusssd', '$2y$10$I6cw9NWWdAvddIds0jeMk.F6fAuwyUPieefV6ltofPJkMjr6XMxhO', '2019-12-28 23:09:30'),
(68, 'Julsiondffff', '$2y$10$gw3PbOyKa/NnqthvImLRAO95z5gx7FtlYSDR.hrlBrR0WAT7vzRoW', '2019-12-28 23:12:20'),
(69, 'aaaaaaa', '$2y$10$zC/lRjhAVMDa66tDB/ttauC/fR7VC8KVdH65jm4FIMeVOeGiyJ4fO', '2019-12-28 23:35:51'),
(70, 'pappappa', '$2y$10$oCS/ukD8u4r7L46Qj1/X7uvmlBj9XUq7CGbTNvv80CNTP3sN7EmeW', '2019-12-29 23:15:01'),
(71, 'ccccc', '$2y$10$1guXnz0w8ZjNuFBqAQVVNeXwo.fVOTR3kjtmQS6NlYMJO5wms9bwm', '2019-12-30 16:17:26'),
(72, 'ssssada', '$2y$10$10TrTLI3N5T9kKHGMZDQquVnEczYzGZpab.VszD0YGm7lYmF9eYR.', '2019-12-31 13:25:34'),
(73, 'Igor', '$2y$10$yXFJNxQHf3D42z2AeXhMEOCCVr.ooz3CtRDrDymrNJI74WuqR0fGy', '2019-12-31 16:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `type` enum('mudrost','pokora','alkohol','other') NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_slovak_ci NOT NULL,
  `author` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `date`, `type`, `text`, `author`) VALUES
(1, 'Julius', '2019-12-30 15:26:41.367507', 'alkohol', 'Alkohol zamota hlavu', 'Stano'),
(2, 'Julius', '2019-12-30 15:26:41.367507', 'alkohol', 'skúšam mäkčene', 'Ivan'),
(3, 'Julius', '2019-12-31 09:16:31.398522', 'alkohol', 'Alkohol velmi zamota hlavu\r\nAlkohol velmi zamota hlavu\r\nAlkohol velmi zamota hlavu', 'Andrej Janko'),
(4, 'Julius', '2019-12-31 09:16:31.398522', 'alkohol', 'Alkohol velmi zamota hlavu Alkohol velmi zamota hlavu Alkohol velmi zamota hlavu Alkohol velmi zamota hlavu Alkohol velmi zamota hlavu Alkohol velmi zamota hlavu Alkohol velmi zamota hlavu Alkohol velmi zamota hlavu Alkohol velmi zamota hlavu\r\nAlkohol velmi zamota hlavu\r\nAlkohol velmi zamota hlavu', 'Andrej Janko'),
(5, 'Julius', '2019-12-31 16:02:27.180764', 'alkohol', 'aaaaaaaa', 'aaaaaa'),
(6, 'Julius', '2019-12-31 16:02:59.752461', 'alkohol', 'ddd', 'dd'),
(7, 'Julius', '2019-12-31 16:03:05.225193', 'alkohol', 'ddd', 'dsds'),
(8, 'Julius', '2019-12-31 16:03:43.514824', 'alkohol', 'ddd', 'dd'),
(9, 'Julius', '2019-12-31 05:29:19.218304', 'pokora', 'Pokora znamená prijať realitu bez toho, aby sme sa ju snažili oklamať.\r\n', 'Jaroslav Melega'),
(10, 'Julius', '2019-12-31 05:29:19.218304', 'pokora', 'V nešťastí sa ukáže múdrosť, v šťastí pokora, v biede trpezlivosť a vo smrti bohatstvo.\r\n', 'Friedrich Schiller'),
(11, 'Julius', '2019-12-31 18:29:28.078486', 'mudrost', 'Aj pod otrhaným klobúkom často múdra hlava býva.', 'Slovenské príslovia'),
(12, 'Julius', '2019-12-31 18:29:48.552341', 'mudrost', 'Ak chceš byť múdrym, nauč sa rozumne spytovať, pozorne počúvať, pokojne odpovedať, a keď nemáš čo povedať, prestaň hovoriť.', 'Johann Kaspar Lavater'),
(13, 'Julius', '2019-12-31 18:30:10.462625', 'mudrost', 'Je múdre učiť sa aj od nepriateľov.', 'Publius Ovidius Naso');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `post_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
