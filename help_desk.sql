-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2014 at 12:53 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `help_desk`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE IF NOT EXISTS `chat_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL,
  `sender` varchar(20) NOT NULL,
  `message` varchar(250) NOT NULL,
  `id_chat_room` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=329 ;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `timestamp`, `sender`, `message`, `id_chat_room`) VALUES
(1, '2014-08-25 05:23:14', 'budi', 'Tes hello', 1),
(5, '2014-08-25 09:29:16', 'catur', 'halo%20juga%20boy', 1),
(6, '2014-08-25 10:27:28', 'catur1', '0dfsfd', 14),
(7, '2014-08-25 10:48:21', 'catur1', '0sfsdf%20fdsf', 14),
(8, '2014-08-25 10:48:57', 'operator_2', '0lojk', 12),
(9, '2014-08-25 11:06:28', 'catur1', '025', 14),
(10, '2014-08-25 13:59:21', 'catur1', '0aloha', 14),
(11, '2014-08-25 14:04:57', 'catur1', '0fdtf', 14),
(12, '2014-08-25 14:15:22', 'catur1', '0tes', 14),
(13, '2014-08-25 14:18:32', 'catur1', '0sfddfs', 14),
(14, '2014-08-25 14:18:57', 'catur1', '0232', 14),
(15, '2014-08-25 14:20:05', 'catur1', '0dfs%20sf', 14),
(16, '2014-08-25 14:20:51', 'catur1', '0222', 14),
(17, '2014-08-25 14:21:14', 'catur1', '0222', 14),
(18, '2014-08-25 14:21:56', 'catur1', 'x222', 14),
(19, '2014-08-25 14:23:41', 'catur1', '0dsfdsfsd%20rt', 14),
(20, '2014-08-25 14:29:23', 'catur1', '0tss', 14),
(21, '2014-08-25 14:32:05', 'catur1', '0tss dsfd sdf', 14),
(22, '2014-08-25 14:33:00', 'catur1', 'tss dsfd sdf', 14),
(23, '2014-08-25 14:33:09', 'catur1', 'tss dsfd sdf', 14),
(24, '2014-08-25 14:34:55', 'catur1', 'tsadss d00sfd sdf0', 14),
(25, '2014-08-25 14:35:06', 'catur1', 'hello bunny 10', 14),
(26, '2014-08-25 14:38:31', 'catur1', 'hello bunny 10', 14),
(27, '2014-08-25 14:45:19', 'catur1', 'hello bunny 10', 14),
(28, '2014-08-25 14:49:12', 'catur1', 'hello bunny 10', 14),
(29, '2014-08-25 15:00:10', 'catur1', 'hello bunny 10', 14),
(30, '2014-08-25 15:39:18', 'catur1', 'tes 1 2 3', 14),
(31, '2014-08-26 15:20:40', 'catur1', 'aN', 14),
(32, '2014-08-26 15:20:59', 'catur1', 'fdsdf dfs', 14),
(33, '2014-08-26 15:21:19', 'catur1', 'lklkl hj', 14),
(34, '2014-08-26 15:24:24', 'catur1', 'dfsf dsafasfd', 14),
(35, '2014-08-26 15:24:33', 'catur1', 'halo tes', 14),
(36, '2014-08-26 15:25:33', 'catur1', '123 er', 14),
(37, '2014-08-26 15:25:59', 'catur1', 'fdsfds', 14),
(38, '2014-08-26 15:26:21', 'catur1', 'fdsfds', 14),
(39, '2014-08-26 15:26:24', 'catur1', 'sd', 14),
(40, '2014-08-26 17:10:48', 'catur1', 'How are you buddy', 15),
(41, '2014-08-27 00:37:13', 'catur1', 'hallo', 15),
(42, '2014-08-27 00:39:12', 'catur1', 'iuiuiu', 14),
(43, '2014-08-27 09:33:06', 'catur1', 'tes', 15),
(44, '2014-08-27 09:40:13', 'catur1', 'dsf', 15),
(45, '2014-08-27 09:53:49', 'catur1', 'loha', 15),
(46, '2014-08-27 12:28:04', 'catur1', 'to lead a better life', 15),
(47, '2014-08-27 12:56:08', 'catur1', 'i  nwwa', 15),
(48, '2014-08-28 00:56:07', 'om_cat', 'halo', 17),
(49, '2014-08-28 01:01:59', 'om_cat', '23', 17),
(50, '2014-08-28 01:03:10', 'om_cat', 'dsf', 17),
(51, '2014-08-28 01:04:54', 'operator_2', 'fds', 17),
(52, '2014-08-28 01:05:05', 'om_cat', 'halo operator', 17),
(53, '2014-08-28 01:05:13', 'operator_2', 'halo user', 17),
(54, '2014-08-28 01:06:36', 'operator_2', 'Cekidot', 17),
(55, '2014-08-28 01:06:56', 'om_cat', 'cekibrot', 17),
(56, '2014-08-28 01:13:03', 'om_cat', 'halo', 16),
(57, '2014-08-28 01:36:29', 'operator_2', 'jlkdfg', 14),
(58, '2014-08-28 02:12:39', 'om_cat', 'dfdsf', 17),
(59, '2014-08-28 13:13:21', 'catur1', 'halo the sky is green', 15),
(60, '2014-08-28 13:15:43', 'operator_1', 'sea is blue', 15),
(61, '2014-08-28 13:56:11', 'operator_1', 'the grass was greener', 15),
(62, '2014-08-28 14:05:37', 'catur1', 'h', 15),
(63, '2014-08-28 14:06:11', 'catur1', 'o', 15),
(64, '2014-08-28 14:06:28', 'catur1', 'o', 15),
(65, '2014-08-28 14:06:53', 'catur1', 'how do you do', 15),
(66, '2014-08-28 14:07:00', 'catur1', 'how do you do%77', 15),
(67, '2014-08-28 14:07:37', 'operator_1', 'how do you dow', 15),
(68, '2014-08-28 14:07:47', 'operator_1', 'how do you doww', 15),
(69, '2014-08-28 14:08:52', 'operator_1', 'wwww', 15),
(70, '2014-08-28 14:09:09', 'operator_1', 'ccc', 15),
(71, '2014-08-28 14:10:10', 'operator_1', '%3f%3f%3f%3f', 15),
(72, '2014-08-28 14:11:14', 'operator_1', 'fddsds%3F%3F%3F', 15),
(73, '2014-08-28 14:11:38', 'operator_1', '     ', 15),
(74, '2014-08-28 14:11:55', 'operator_1', '????', 15),
(75, '2014-08-28 14:20:41', 'operator_1', 'tes', 15),
(76, '2014-08-28 14:23:08', 'catur1', 'how low?', 15),
(77, '2014-08-28 14:25:05', 'catur1', 'hello gimana kabar?', 15),
(78, '2014-08-28 14:25:32', 'operator_1', 'baik', 15),
(79, '2014-08-28 16:32:20', 'catur1', 'om', 15),
(80, '2014-08-28 16:32:26', 'catur1', '???', 15),
(81, '2014-08-28 16:32:41', 'operator_1', 'yoooo ada apa????', 15),
(82, '2014-08-30 10:19:39', 'catur1', 'halo', 14),
(83, '2014-08-30 10:19:52', 'operator_2', 'something in', 14),
(84, '2014-08-30 10:54:39', 'catur1', 'fdsfd', 14),
(85, '2014-08-30 10:55:30', 'catur1', 'dklsjfds', 14),
(86, '2014-08-30 10:56:44', 'operator_2', 'load up', 14),
(87, '2014-09-01 14:24:50', 'operator_1', 'halo', 15),
(88, '2014-09-01 14:25:01', 'catur1', 'iya?', 15),
(89, '2014-09-01 14:28:11', 'catur1', 'sdkfjdsf', 15),
(90, '2014-09-01 14:28:13', 'catur1', 'sfsaas', 15),
(91, '2014-09-01 14:28:14', 'catur1', 'sfdfsd', 15),
(92, '2014-09-01 14:28:19', 'operator_1', 'sfsf', 15),
(93, '2014-09-01 14:28:23', 'catur1', 'sfds', 15),
(94, '2014-09-01 14:28:25', 'catur1', 'sfsfd', 15),
(95, '2014-09-04 13:09:33', 'om_cat', 'ddssffffddss', 16),
(96, '2014-09-04 13:12:00', 'om_cat', 'ddssffffddss', 16),
(97, '2014-09-04 13:12:24', 'om_cat', 'ssaaffaassff', 16),
(98, '2014-09-04 13:22:43', 'om_cat', 'hhlloo', 16),
(99, '2014-09-04 13:53:04', 'om_cat', 'tteess', 16),
(100, '2014-09-04 13:55:36', 'om_cat', 'aalloo', 17),
(101, '2014-09-04 15:07:08', 'om_cat', 'oohh', 17),
(102, '2014-09-04 15:07:10', 'om_cat', 'ddssff', 17),
(103, '2014-09-04 15:07:11', 'om_cat', 'ssddff', 17),
(104, '2014-09-04 15:07:13', 'om_cat', 'eerr', 17),
(105, '2014-09-04 15:07:24', 'om_cat', 'ffddhhgg', 16),
(106, '2014-09-04 15:07:30', 'om_cat', 'ddssffddss', 16),
(107, '2014-09-04 15:08:12', 'operator_1', 'ssddff', 16),
(108, '2014-09-04 15:09:04', 'operator_1', 'ffggffdd', 16),
(109, '2014-09-04 15:19:41', 'operator_1', 'ddggssffdd', 16),
(110, '2014-09-04 15:31:42', 'om_cat', 'ddffssddff', 16),
(111, '2014-09-04 15:31:46', 'om_cat', 'ddssggssggffss', 16),
(112, '2014-09-04 15:32:55', 'om_cat', 'ddffssffdd', 16),
(113, '2014-09-04 15:33:13', 'om_cat', 'ssffggffdd', 16),
(114, '2014-09-04 15:35:36', 'om_cat', 'ddssffss', 16),
(115, '2014-09-04 15:35:44', 'om_cat', 'ddss', 16),
(116, '2014-09-04 15:35:46', 'om_cat', 'ddssffddss', 16),
(117, '2014-09-04 15:35:48', 'om_cat', 'eerr', 16),
(118, '2014-09-04 15:35:50', 'om_cat', 'ffddssffss', 16),
(119, '2014-09-04 15:43:31', 'om_cat', '33222233', 16),
(120, '2014-09-04 15:43:37', 'operator_1', '554455', 16),
(121, '2014-09-04 15:51:23', 'om_cat', 'ffddssff', 16),
(122, '2014-09-04 15:51:27', 'om_cat', 'ddffssffss', 16),
(123, '2014-09-04 16:06:04', 'om_cat', 'ddssffffdd', 16),
(124, '2014-09-04 16:06:20', 'om_cat', 'hhaalloo', 16),
(125, '2014-09-04 16:07:18', 'om_cat', 'hhaalloo', 16),
(126, '2014-09-04 16:08:40', 'om_cat', 'ddssffffssdd', 16),
(127, '2014-09-04 16:09:05', 'om_cat', 'ddssddff', 16),
(128, '2014-09-04 16:09:11', 'om_cat', 'ddddssff', 16),
(129, '2014-09-04 16:09:15', 'om_cat', 'aabbcc', 16),
(130, '2014-09-04 16:10:10', 'om_cat', 'dfs', 16),
(131, '2014-09-04 16:10:15', 'om_cat', 'sdfds?', 16),
(132, '2014-09-04 16:11:23', 'om_cat', '????!!!!1', 16),
(133, '2014-09-04 16:33:11', 'om_cat', 'sfddsf', 16),
(134, '2014-09-04 16:33:15', 'om_cat', 'sdfsdfs', 16),
(135, '2014-09-04 16:33:20', 'om_cat', 'sfaere', 16),
(136, '2014-09-04 16:33:58', 'om_cat', 'fdsfds', 16),
(137, '2014-09-04 16:34:03', 'om_cat', 'sfdfds', 16),
(138, '2014-09-04 16:34:06', 'om_cat', 'dsfds', 16),
(139, '2014-09-04 16:34:37', 'om_cat', 'dsf', 16),
(140, '2014-09-04 16:34:40', 'om_cat', 'fdsf', 16),
(141, '2014-09-04 16:36:07', 'om_cat', 'dsf', 16),
(142, '2014-09-04 16:36:13', 'om_cat', 'sfas', 16),
(143, '2014-09-04 16:36:16', 'om_cat', 'asfds', 16),
(144, '2014-09-05 00:54:08', 'operator_2', 'alo', 17),
(145, '2014-09-05 01:12:35', 'operator_2', 'dffds', 17),
(146, '2014-09-05 01:20:16', 'operator_2', 'woiiii', 17),
(147, '2014-09-05 01:21:10', 'operator_2', 'dffds', 17),
(148, '2014-09-05 01:21:17', 'operator_2', 'dsfsd', 17),
(149, '2014-09-05 01:21:18', 'operator_2', 'sdfdfs', 17),
(150, '2014-09-05 01:21:20', 'operator_2', 'sfdds', 17),
(151, '2014-09-05 01:21:23', 'operator_2', '2323', 17),
(152, '2014-09-05 01:21:25', 'operator_2', 'cvcx', 17),
(153, '2014-09-05 01:35:25', 'operator_2', 'sdfdfs', 17),
(154, '2014-09-05 01:35:37', 'operator_2', 'fdsfsdf', 17),
(155, '2014-09-05 01:39:12', 'operator_2', 'erer', 17),
(156, '2014-09-05 01:50:08', 'operator_2', 'dsfds', 17),
(157, '2014-09-05 01:50:58', 'operator_2', 'dfds', 17),
(158, '2014-09-05 01:51:21', 'operator_1', 'aloha', 16),
(159, '2014-09-05 01:53:20', 'operator_1', 'ddsfds', 16),
(160, '2014-09-05 01:53:27', 'operator_1', 'fdgfg', 16),
(161, '2014-09-05 02:06:52', 'operator_1', 'dsddfs', 16),
(162, '2014-09-05 02:06:53', 'operator_1', 'dfs', 16),
(163, '2014-09-05 02:06:54', 'operator_1', 'dsffds', 16),
(164, '2014-09-05 02:08:03', 'operator_1', 'gfdgfd', 15),
(165, '2014-09-05 02:08:05', 'operator_1', 'fgdfgd', 15),
(166, '2014-09-05 02:08:06', 'operator_1', 'fdgfd', 15),
(167, '2014-09-05 03:04:15', 'operator_1', '23', 15),
(168, '2014-09-05 03:04:26', 'operator_1', 'halo ppuiy???', 15),
(169, '2014-09-05 12:34:59', 'catur1', 'dsffd', 14),
(170, '2014-09-05 12:37:25', 'catur1', 'dfdfs', 14),
(171, '2014-09-05 14:17:42', 'catur1', 'dfsfds', 14),
(172, '2014-09-05 14:17:44', 'catur1', 'dfs', 14),
(173, '2014-09-05 14:17:46', 'catur1', 'dfs', 14),
(174, '2014-09-05 14:17:47', 'catur1', 'dsf', 14),
(175, '2014-09-05 14:22:12', 'catur1', 'fgsdgdf', 14),
(176, '2014-09-05 14:22:14', 'catur1', 'fds', 14),
(177, '2014-09-05 14:23:47', 'catur1', 'sad', 14),
(178, '2014-09-05 14:23:53', 'catur1', 'dsdsf', 14),
(179, '2014-09-05 14:56:32', 'operator_1', 'no dsfs', 15),
(180, '2014-09-05 14:56:43', 'operator_1', 'halo chatdsf', 15),
(181, '2014-09-05 14:56:58', 'catur1', 'ada apa?', 15),
(182, '2014-09-05 14:58:24', 'catur1', 'werer', 15),
(183, '2014-09-05 14:58:29', 'catur1', 'dsf', 15),
(184, '2014-09-05 14:58:32', 'catur1', 'dffds', 15),
(185, '2014-09-05 14:58:41', 'operator_1', 'ere', 15),
(186, '2014-09-05 15:02:30', 'operator_1', 'halo tes', 15),
(187, '2014-09-05 15:03:14', 'catur1', 'dsfds', 15),
(188, '2014-09-05 15:03:21', 'catur1', 'dfsdssdf', 15),
(189, '2014-09-05 15:20:43', 'om_cat', 'dsf', 16),
(190, '2014-09-05 15:52:01', 'catur1', 'dsfdsfd', 15),
(191, '2014-09-05 15:52:05', 'catur1', 'fdfds', 15),
(192, '2014-09-05 15:52:07', 'catur1', 'dfsfds', 15),
(193, '2014-09-05 15:59:10', 'catur1', 'dfs', 15),
(194, '2014-09-05 16:56:17', 'catur1', 'dsfd', 15),
(195, '2014-09-05 17:05:43', 'catur1', 'sdfdsf', 15),
(196, '2014-09-05 17:05:46', 'catur1', 'fdsf', 15),
(197, '2014-09-05 17:24:14', 'catur1', 'sdfdsf', 15),
(198, '2014-09-05 17:29:15', 'catur1', 'dsf', 15),
(199, '2014-09-05 17:29:16', 'catur1', 'fddsfsd', 15),
(200, '2014-09-05 17:29:17', 'catur1', 'fdsasdaf', 15),
(201, '2014-09-05 17:31:49', 'catur1', 'casdfs', 15),
(202, '2014-09-05 17:31:51', 'catur1', 'sdffds', 15),
(203, '2014-09-05 17:35:54', 'om_cat', 'fdsfdsfds', 16),
(204, '2014-09-05 17:35:56', 'om_cat', 'ddsdsf', 16),
(205, '2014-09-05 17:36:02', 'om_cat', 'sdfdfds', 16),
(206, '2014-09-05 17:48:23', 'operator_1', 'dsfds', 15),
(207, '2014-09-05 17:48:40', 'catur1', 'sdfsdf', 15),
(208, '2014-09-05 17:48:41', 'catur1', 'dsfdf', 15),
(209, '2014-09-05 19:11:15', 'operator_1', 'fddfdf', 15),
(210, '2014-09-05 19:11:18', 'operator_1', 'dsffds', 15),
(211, '2014-09-05 19:12:15', 'operator_1', 'tes case???', 15),
(212, '2014-09-05 21:09:31', 'operator_1', 'halooo', 15),
(213, '2014-09-05 21:09:52', 'catur1', 'yoa', 15),
(214, '2014-09-05 21:10:29', 'om_cat', 'wlcm!!!', 16),
(215, '2014-09-05 21:10:37', 'om_cat', 'wow', 16),
(216, '2014-09-05 21:10:44', 'om_cat', 'dagh', 16),
(217, '2014-09-05 21:20:31', 'om_cat', 'aodfsfss', 16),
(218, '2014-09-05 21:20:38', 'om_cat', 'dfs', 16),
(219, '2014-09-05 21:20:39', 'om_cat', 'fds', 16),
(220, '2014-09-05 21:20:40', 'om_cat', 'fds', 16),
(221, '2014-09-05 21:20:42', 'om_cat', '4', 16),
(222, '2014-09-05 21:20:44', 'om_cat', '5', 16),
(223, '2014-09-05 21:20:45', 'om_cat', '6', 16),
(224, '2014-09-05 21:20:46', 'om_cat', '7', 16),
(225, '2014-09-05 21:20:52', 'om_cat', '8', 16),
(226, '2014-09-05 21:20:53', 'om_cat', '9', 16),
(227, '2014-09-05 21:21:02', 'om_cat', '1', 16),
(228, '2014-09-05 21:21:04', 'om_cat', '2', 16),
(229, '2014-09-05 21:21:07', 'om_cat', '3', 16),
(230, '2014-09-06 02:14:56', 'operator_1', 'ya sayang', 16),
(231, '2014-09-06 02:15:01', 'operator_1', '2', 16),
(232, '2014-09-06 02:15:03', 'operator_1', '3', 16),
(233, '2014-09-06 02:52:37', 'om_cat', 'halo', 16),
(234, '2014-09-06 02:52:42', 'om_cat', 'ya??', 16),
(235, '2014-09-06 03:04:15', 'om_cat', 'sdfdfd', 16),
(236, '2014-09-06 03:04:21', 'om_cat', 'dsfdsfds', 17),
(237, '2014-09-06 03:04:39', 'om_cat', 'jsdkfd dskfsdf', 16),
(238, '2014-09-06 03:05:19', 'om_cat', 'sdfdffds', 16),
(239, '2014-09-06 03:06:28', 'om_cat', 'dsfdsfdsf', 16),
(240, '2014-09-06 03:06:30', 'om_cat', 'dfsfdsfd', 16),
(241, '2014-09-06 03:06:54', 'om_cat', 'dfsdsf', 16),
(242, '2014-09-06 03:07:32', 'om_cat', 'fdsds', 16),
(243, '2014-09-06 03:07:49', 'om_cat', 'sdfdsfds', 16),
(244, '2014-09-06 13:33:00', 'catur1', 'aloha', 14),
(245, '2014-09-06 13:33:04', 'catur1', 'dsf', 14),
(246, '2014-09-06 13:33:14', 'catur1', 'noim ce', 14),
(247, '2014-09-06 13:36:43', 'catur1', 'welcome my son.....!!!', 14),
(248, '2014-09-06 14:19:48', 'operator_2', 'dsfdsf', 14),
(249, '2014-09-06 14:19:56', 'operator_2', '2', 14),
(250, '2014-09-06 14:19:57', 'operator_2', '3', 14),
(251, '2014-09-06 14:19:59', 'operator_2', '4', 14),
(252, '2014-09-06 14:22:00', 'catur1', 'dssd', 14),
(253, '2014-09-06 14:22:28', 'catur1', 'dffds', 14),
(254, '2014-09-06 14:22:33', 'catur1', 'sddssd', 14),
(255, '2014-09-06 14:22:38', 'catur1', 'haloooo', 14),
(256, '2014-09-06 14:22:57', 'catur1', 'hallooooo', 14),
(257, '2014-09-08 17:06:01', 'catur1', 'sfda', 14),
(258, '2014-09-08 17:08:29', 'catur1', 'halooo', 14),
(259, '2014-09-09 01:52:51', 'catur1', 'hlo-hlo', 15),
(260, '2014-09-09 01:52:57', 'catur1', 'how low?', 15),
(261, '2014-09-09 01:53:28', 'catur1', 'light out', 15),
(262, '2014-09-09 01:54:05', 'catur1', 'with the light out', 14),
(263, '2014-09-09 01:54:16', 'catur1', 'it%27s less dangerous', 14),
(264, '2014-09-09 12:58:27', 'catur1', 'tes', 14),
(265, '2014-09-09 12:58:31', 'catur1', 'dsfd', 14),
(266, '2014-09-09 12:58:34', 'catur1', 'sddf', 14),
(267, '2014-09-09 12:58:45', 'catur1', 'dsfdf', 14),
(268, '2014-09-09 13:48:59', 'operator_2', 'dfsfd', 17),
(269, '2014-09-09 13:52:00', 'operator_2', 'ss', 17),
(270, '2014-09-09 14:33:30', 'om_cat', 'unsure', 17),
(271, '2014-09-09 14:33:34', 'om_cat', 'm', 17),
(272, '2014-09-09 15:46:11', 'om_cat', 'nois s', 17),
(273, '2014-09-11 00:05:09', 'catur1', 'hlaoo', 14),
(274, '2014-09-11 00:05:14', 'catur1', 'gimana kabar?', 14),
(275, '2014-09-11 00:05:24', 'catur1', '3', 14),
(276, '2014-09-11 00:05:25', 'catur1', '4', 14),
(277, '2014-09-11 00:05:26', 'catur1', '55', 14),
(278, '2014-09-11 00:05:40', 'operator_2', 'yooo', 14),
(279, '2014-09-11 14:14:19', 'catur1', 'why am i so shy', 15),
(280, '2014-09-11 14:14:57', 'catur1', 'dfs', 14),
(281, '2014-09-11 14:15:04', 'catur1', 'why am i so shy', 14),
(282, '2014-09-11 14:15:23', 'operator_2', 'aw', 14),
(283, '2014-09-11 14:15:29', 'operator_2', 'sdjf', 14),
(284, '2014-09-11 14:15:30', 'operator_2', 'df', 14),
(285, '2014-09-11 14:15:32', 'operator_2', 'dfdfs', 14),
(286, '2014-09-11 14:36:10', 'catur1', 'dsf', 15),
(287, '2014-09-11 14:36:15', 'catur1', 'sdffds', 14),
(288, '2014-09-11 14:36:19', 'catur1', 'sdffd', 14),
(289, '2014-09-11 15:23:41', 'catur1', 'hlaoooo', 14),
(290, '2014-09-11 15:23:45', 'operator_2', 'fdsfsd', 14),
(291, '2014-09-11 15:23:55', 'catur1', 'i walk a thousand miles', 14),
(292, '2014-09-11 15:23:57', 'catur1', '??', 14),
(293, '2014-09-11 15:24:08', 'catur1', 'dfskj', 14),
(294, '2014-09-17 13:55:59', 'catur1', 'halo', 15),
(295, '2014-09-17 13:56:14', 'operator_1', 'yo', 15),
(296, '2014-09-17 14:26:33', 'catur1', 'sad', 15),
(297, '2014-09-18 02:28:00', 'operator_2', 'halo', 14),
(298, '2014-09-26 17:53:37', 'operator_1', 'ass', 15),
(299, '2014-09-26 17:53:53', 'operator_1', 'aa', 15),
(300, '2014-09-26 17:54:01', 'catur1', 'w', 15),
(301, '2014-09-29 00:15:33', 'catur1', 'halo', 15),
(302, '2014-09-29 03:59:38', 'operator_1', 'undefined', 15),
(303, '2014-09-29 04:00:30', 'operator_1', '', 15),
(304, '2014-09-29 04:00:40', 'operator_1', 'undefined', 15),
(305, '2014-09-29 04:01:29', 'operator_1', 'undefined', 15),
(306, '2014-09-29 04:01:59', 'operator_1', 'tes', 15),
(307, '2014-09-29 04:13:28', 'operator_1', 'se', 15),
(308, '2014-09-29 04:14:03', 'operator_1', 'dfsdf', 15),
(309, '2014-09-29 04:14:10', 'operator_1', 'tes', 15),
(310, '2014-09-29 04:15:12', 'operator_1', 'ed', 15),
(311, '2014-09-29 04:15:41', 'catur1', 'tes', 15),
(312, '2014-09-29 04:16:31', 'catur1', 'tes', 15),
(313, '2014-09-29 04:16:41', 'catur1', 'when the music over', 15),
(314, '2014-09-29 08:03:25', 'catur1', 'spend up the light', 15),
(315, '2014-09-29 08:40:24', 'catur1', 'tom', 15),
(316, '2014-09-29 08:42:27', 'operator_1', 'tes', 15),
(317, '2014-09-29 09:03:07', 'operator_1', 'aloo', 15),
(318, '2014-09-30 17:41:46', 'catur1', 'alo', 15),
(319, '2014-09-30 17:41:50', 'catur1', 'new', 15),
(320, '2014-09-30 17:43:29', 'operator_1', 'lo', 15),
(321, '2014-09-30 18:10:39', 'catur1', 'here we are love on the end', 15),
(322, '2014-09-30 18:10:47', 'catur1', 'century of beauty and lose', 15),
(323, '2014-10-01 02:13:28', 'catur1', 'haf', 15),
(324, '2014-10-01 02:15:55', 'catur1', 'fds', 15),
(325, '2014-10-01 17:59:06', 'i%20meet%20a', '', 15),
(326, '2014-10-01 21:53:26', 'catur1', 'halo', 15),
(327, '2014-10-01 21:53:45', 'operator_1', 'yo', 15),
(328, '2014-10-10 10:54:41', 'catur1', 'ha', 15);

-- --------------------------------------------------------

--
-- Table structure for table `chat_rooms`
--

CREATE TABLE IF NOT EXISTS `chat_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_chat_timestamp` datetime NOT NULL,
  `last_chat_timestamp` datetime NOT NULL,
  `admin` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `last_op_message` datetime NOT NULL,
  `last_op_read` datetime NOT NULL,
  `last_user_message` datetime NOT NULL,
  `last_user_read` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `chat_rooms`
--

INSERT INTO `chat_rooms` (`id`, `start_chat_timestamp`, `last_chat_timestamp`, `admin`, `user`, `last_op_message`, `last_op_read`, `last_user_message`, `last_user_read`) VALUES
(1, '2014-08-13 00:00:00', '2014-08-21 00:00:00', 'catur', 'budi', '2014-09-03 17:33:49', '2014-09-03 17:33:49', '2014-09-03 17:34:36', '2014-09-03 17:34:36'),
(7, '2014-08-04 00:00:00', '2014-08-05 00:00:00', 'catur', 'tt', '2014-09-03 17:33:49', '2014-09-03 17:33:49', '2014-09-03 17:34:36', '2014-09-03 17:34:36'),
(8, '2014-08-21 16:32:13', '2014-08-21 16:32:13', 'catur4', 'budi', '2014-09-03 17:33:49', '2014-09-03 17:33:49', '2014-09-03 17:34:36', '2014-09-03 17:34:36'),
(9, '2014-08-21 16:32:26', '2014-08-21 16:32:26', 'catur', 'dfsfsf', '2014-09-03 17:33:49', '2014-09-03 17:33:49', '2014-09-03 17:34:36', '2014-09-03 17:34:36'),
(14, '2014-08-25 10:04:21', '2014-09-18 02:28:00', 'operator_2', 'catur1', '2014-09-18 02:28:00', '2014-09-19 13:04:19', '2014-09-11 15:24:08', '2014-09-18 04:32:58'),
(15, '2014-08-26 14:03:28', '2014-10-10 10:54:41', 'operator_1', 'catur1', '2014-10-01 21:53:45', '2014-10-11 13:09:37', '2014-10-10 10:54:41', '2014-10-11 12:57:39'),
(16, '2014-08-27 09:46:06', '2014-09-06 03:07:49', 'operator_1', 'om_cat', '2014-09-06 02:15:03', '2014-10-11 13:08:45', '2014-09-06 03:07:49', '2014-09-09 14:41:12'),
(17, '2014-08-27 19:34:16', '2014-09-09 15:46:11', 'operator_2', 'om_cat', '2014-09-09 13:52:00', '2014-10-01 18:53:48', '2014-09-09 15:46:11', '2014-09-09 16:03:49'),
(18, '2014-08-28 01:23:16', '2014-08-28 01:23:16', 'om_cat', 'operator_2', '2014-09-03 17:33:49', '2014-09-03 17:33:49', '2014-09-03 17:34:36', '2014-09-03 17:34:36'),
(19, '2014-08-28 01:23:20', '2014-08-28 01:23:20', 'catur1', 'operator_2', '2014-09-03 17:33:49', '2014-09-03 17:33:49', '2014-09-03 17:34:36', '2014-09-03 17:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_ticket`
--

CREATE TABLE IF NOT EXISTS `data_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `tanggal_buka` date NOT NULL,
  `tanggal_tutup` date DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `instansi` varchar(75) NOT NULL,
  `jenis_kasus` varchar(40) NOT NULL,
  `level_penanganan` varchar(100) NOT NULL DEFAULT 'Operator',
  `deskripsi` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `data_ticket`
--

INSERT INTO `data_ticket` (`id`, `user`, `tanggal_buka`, `tanggal_tutup`, `status`, `instansi`, `jenis_kasus`, `level_penanganan`, `deskripsi`) VALUES
(7, 'ahmad', '2014-09-13', '0000-00-00', 'buka', 'Dinas Perumahan dan Permukiman', 'Perangkat lunak dan OS', 'Servis Lapangan', 'Kerusakan router karena petir'),
(8, 'Car', '2014-09-15', '2014-09-21', 'tutup', 'Dinas Kesehatan', 'Perangkat lunak jaringan', 'Admin Jaringan', ' dsf'),
(9, 'Adi S', '2014-09-15', '0000-00-00', 'buka', 'Dinas Bina Marga', 'Perangkat lunak dan OS', 'Operator', 'Tidak menginstall os yang direkomendasikan'),
(10, 'Rahmat', '2014-09-17', '0000-00-00', 'buka', 'Badan Kesatuan Bangsa Politik dan Perlindungan Masyarakat', 'Perangkat lunak jaringan', 'Admin Jaringan', 'Salah setting ip'),
(11, 'Rozak', '2014-09-17', '0000-00-00', 'buka', 'Dinas Pencegah Pemadam Kebakaran', 'Saran', 'Operator', 'Saran tentang tampilan, kontras warna.'),
(12, 'Dea', '2014-09-17', '2014-09-18', 'tutup', 'Sekretariat DPRD', 'Perangkat lunak jaringan', 'Operator', ''),
(13, 'Willy Sa', '2014-09-16', '2014-09-17', 'tutup', 'Rumah Sakit Umum Daerah Dr. Pirngadi', 'Perangkat lunak jaringan', 'Admin Jaringan', 'Kesalahan set subnet pada server DHCP lokal dan kesalahan routing static IP'),
(14, 'Takeshi', '2014-09-17', '0000-00-00', 'buka', 'Dinas Pertamanan', 'Perangkat fisik jaringan', 'Operator', 'Tes'),
(15, 'Tasaka', '2014-09-17', '2014-09-17', 'tutup', 'Dinas Pendidikan', 'Saran', 'Operator', 'Aplikasi dibwore kan'),
(16, 'Rahmat Kartolo', '2014-09-17', '2014-09-17', 'tutup', 'Dinas Bina Marga', 'Browser Pengguna', 'Operator', 'Refresh'),
(17, 'Deani', '2014-09-17', '2014-09-17', 'tutup', 'Dinas Perumahan dan Permukiman', 'Browser Pengguna', 'Operator', 'sua embuh...'),
(18, 'roger', '2014-09-19', '0000-00-00', 'buka', 'Rumah Sakit Umum Daerah Dr. Pirngadi', 'Perangkat fisik jaringan', 'Servis Lapangan', 'sd'),
(19, 'ahmad', '2014-09-19', '2014-09-20', 'tutup', 'Dinas Kesehatan', 'Penggunaan Aplikasi', 'Operator', 'selesai'),
(20, 'ahmad sas', '2014-10-03', '0000-00-00', 'buka', 'Dinas Pendidikan', 'Perangkat lunak jaringan', 'Servis Lapangan', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(30) NOT NULL,
  `text` varchar(256) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unread',
  `from_gateway` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `sender`, `text`, `date`, `status`, `from_gateway`) VALUES
(140, '+6281260931206', 'Dasar anak nakal tes s gayeway\r\nOK', '2014-09-24 16:05:56', 'unread', 0),
(143, '+6281260931206', 'Awww\r\n', '2014-09-24 16:20:19', 'unread', 0),
(144, '+6281260931206', 'Barangkali..\r\n', '2014-09-24 16:20:55', 'unread', 0),
(145, 'TELKOMSEL', 'Selamat, Anda mendapatkan bonus OprLain sebesar 15SMS. Bonus berlaku berbatas waktu, cek *889# scr berkala. Info: www.telkomsel.com\r\nOK\r\n+CMTI: "SM",', '2014-09-24 16:21:19', 'unread', 0),
(146, 'TELKOMSEL', 'Selamat, Anda mendapatkan bonus Tsel sebesar 85SMS. Bonus berlaku berbatas waktu, cek *889# scr berkala. Info: www.telkomsel.com\r\n', '2014-09-24 16:21:20', 'unread', 0),
(151, '+6281260931206', 'Tes<br/>Jkk', '2014-09-24 18:12:51', 'unread', 0),
(152, '+6282111133448', 'Suehatttt... Tur... Kumaha medan\r\n', '2014-09-24 16:35:09', 'unread', 0),
(153, '+6285861786388', 'Dt 5', '2014-09-24 15:57:04', 'unread', 0),
(154, '+6281397750248', 'ok..tks!? sukses', '2014-09-26 17:51:15', 'unread', 0),
(155, '+6281397750248', 'acem..!)!?', '2014-09-27 17:37:09', 'unread', 0),
(156, '+6285861786388', 'Loo', '2014-09-28 16:12:23', 'unread', 0);

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE IF NOT EXISTS `instansi` (
  `id_unit_organisasi` int(11) NOT NULL,
  `id_urusan` int(11) NOT NULL,
  `id_bidang_urusan` int(11) NOT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `id_organisasi` int(11) DEFAULT NULL,
  `nama_instansi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_unit_organisasi`, `id_urusan`, `id_bidang_urusan`, `id_bidang`, `id_organisasi`, `nama_instansi`) VALUES
(104, 1, 1, 4, 1, 'Dinas Pendidikan'),
(105, 1, 2, 4, 1, 'Dinas Kesehatan'),
(106, 1, 2, 4, 2, 'Rumah Sakit Umum Daerah Dr. Pirngadi'),
(107, 1, 3, 3, 1, 'Dinas Bina Marga'),
(108, 1, 4, 3, 1, 'Dinas Perumahan dan Permukiman'),
(109, 1, 4, 3, 2, 'Dinas Pencegah Pemadam Kebakaran'),
(110, 1, 5, 3, 1, 'Dinas Tata Ruang dan Tata Bangunan'),
(111, 1, 6, 4, 1, 'Badan Perencanaan Pembangunan Daerah'),
(112, 1, 7, 3, 1, 'Dinas Perhubungan'),
(113, 1, 8, 3, 1, 'Badan Lingkungan Hidup'),
(114, 1, 8, 3, 2, 'Dinas Pertamanan'),
(115, 1, 8, 3, 3, 'Dinas Kebersihan'),
(116, 1, 10, 4, 1, 'Dinas Kependudukan dan Catatan Sipil'),
(117, 1, 12, 4, 1, 'Badan Pemberdayaan Perempuan dan Keluarga Berencana'),
(118, 1, 13, 4, 1, 'Pelaksana Harian Badan Narkotika Kota'),
(119, 1, 13, 4, 2, 'Badan Penanggulangan Bencana Daerah'),
(120, 1, 14, 4, 1, 'Dinas Sosial dan Tenaga Kerja'),
(121, 1, 15, 2, 1, 'Dinas Koperasi Usaha Mikro Kecil dan Menengah'),
(122, 1, 16, 2, 1, 'Badan Penanaman Modal'),
(123, 1, 16, 2, 2, 'Badan Pelayanan Perijinan Terpadu'),
(124, 1, 17, 2, 1, 'Dinas Kebudayaan dan Pariwisata'),
(125, 1, 18, 4, 1, 'Dinas Pemuda dan Olahraga'),
(126, 1, 19, 4, 1, 'Badan Kesatuan Bangsa Politik dan Perlindungan Masyarakat'),
(127, 1, 19, 4, 2, 'Satuan Polisi Pamong Praja'),
(128, 1, 20, NULL, 1, 'Walikota dan Wakil Walikota'),
(129, 1, 20, 4, 2, 'Dewan Perwakilan Rakyat Daerah'),
(130, 1, 20, 4, 3, 'Sekretariat Daerah'),
(131, 1, 20, 4, 4, 'Sekretariat DPRD'),
(132, 1, 20, 2, 5, 'Dinas Pendapatan'),
(133, 1, 20, 4, 6, 'Badan Penelitian dan Pengembangan'),
(134, 1, 20, 4, 7, 'Inspektorat '),
(135, 1, 20, 4, 8, 'Badan Kepegawaian Daerah'),
(136, 1, 20, 2, 9, 'Badan Pengelola Keuangan Daerah'),
(137, 1, 20, 4, 10, 'Kantor Pendidikan dan Pelatihan '),
(138, 1, 20, 1, 11, 'Kantor Sandi Daerah'),
(139, 1, 20, 4, 12, 'Sekretariat Dewan Pengurus Korpri'),
(140, 1, 20, 1, 13, 'Kecamatan Medan Belawan'),
(141, 1, 20, 1, 14, 'Kecamatan Medan Labuhan'),
(142, 1, 20, 1, 15, 'Kecamatan Medan Kota'),
(143, 1, 20, 1, 16, 'Kecamatan Medan Timur'),
(144, 1, 20, 1, 17, 'Kecamatan Medan Helvetia'),
(145, 1, 20, 1, 18, 'Kecamatan Medan Marelan'),
(146, 1, 20, 1, 19, 'Kecamatan Medan Denai'),
(147, 1, 20, 1, 20, 'Kecamatan Medan Area'),
(148, 1, 20, 1, 21, 'Kecamatan Medan Baru'),
(149, 1, 20, 1, 22, 'Kecamatan Medan Polonia'),
(150, 1, 20, 1, 23, 'Kecamatan Medan Tembung'),
(151, 1, 20, 1, 24, 'Kecamatan Medan Perjuangan'),
(152, 1, 20, 1, 25, 'Kecamatan Medan Barat'),
(153, 1, 20, 1, 26, 'Kecamatan Medan Tuntungan'),
(154, 1, 20, 1, 27, 'Kecamatan Medan Selayang'),
(155, 1, 20, 1, 28, 'Kecamatan Medan Petisah'),
(156, 1, 20, 1, 29, 'Kecamatan Medan Johor'),
(157, 1, 20, 1, 30, 'Kecamatan Medan Maimun'),
(158, 1, 20, 1, 31, 'Kecamatan Medan Deli'),
(159, 1, 20, 1, 32, 'Kecamatan Medan Amplas'),
(160, 1, 20, 1, 33, 'Kecamatan Medan Sunggal'),
(161, 1, 21, 2, 1, 'Badan Ketahanan Pangan'),
(162, 1, 22, 4, 1, 'Badan Pemberdayaan Masyarakat'),
(163, 1, 24, 4, 1, 'Kantor Arsip'),
(164, 1, 25, 1, 1, 'Dinas Komunikasi dan Informatika'),
(165, 1, 26, 4, 1, 'Kantor Perpustakaan'),
(166, 2, 1, 2, 1, 'Dinas Pertanian dan Kelautan'),
(167, 2, 7, 2, 1, 'Dinas Perindustrian dan Perdagangan'),
(168, 1, 20, 4, 34, 'Bagian Administrasi Kesejahteraan Rakyat'),
(169, 1, 20, 1, 35, 'Bagian Administrasi Pembangunan'),
(170, 1, 20, 2, 36, 'Bagian Administrasi Perekonomian'),
(171, 1, 20, 2, 37, 'Bagian Hubungan Kerjasama'),
(172, 1, 20, 4, 38, 'Bagian Agama dan Pendidikan'),
(173, 1, 20, 4, 39, 'Bagian Administrasi Pemerintahan Umum'),
(174, 1, 20, 1, 40, 'Bagian Umum'),
(175, 1, 20, 1, 41, 'Bagian Hubungan Masyarakat'),
(176, 1, 20, 4, 42, 'Bagian Hukum'),
(177, 1, 20, 4, 43, 'Bagian Organisasi dan Tata Laksana'),
(178, 1, 20, 2, 44, 'Bagian Administrasi Sumber Daya Alam'),
(179, 1, 20, 1, 45, 'Bagian Perlengkapan dan Aset'),
(180, 1, 20, 1, 46, 'Bagian Administrasi Kemasyarakatan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kasus`
--

CREATE TABLE IF NOT EXISTS `jenis_kasus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kasus` varchar(50) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `jenis_kasus`
--

INSERT INTO `jenis_kasus` (`id`, `kasus`, `priority`) VALUES
(1, 'Perangkat fisik jaringan', 1),
(2, 'Perangkat lunak jaringan', 2),
(3, 'Browser Pengguna', 3),
(4, 'Kritik', 5),
(5, 'Saran', 6),
(6, 'OS Pengguna', 4),
(7, 'Penggunaan Aplikasi', 0),
(8, 'Lainnya', 100);

-- --------------------------------------------------------

--
-- Table structure for table `level_penanganan`
--

CREATE TABLE IF NOT EXISTS `level_penanganan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `level_penanganan`
--

INSERT INTO `level_penanganan` (`id`, `nama`) VALUES
(1, 'Operator'),
(2, 'Teknisi'),
(3, 'Admin Jaringan'),
(4, 'Servis Lapangan');

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `at_id` int(11) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `msg` varchar(256) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `from_gateway` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`id`, `at_id`, `receiver`, `msg`, `date`, `status`, `from_gateway`) VALUES
(1, 0, '+6281573179267', 'Halo ma gimana kabar? Ini aku lagi ngetes sms gateway #catur', '2014-09-24 21:13:41', 'sent', 1),
(2, 0, '+6282111133448', 'baik2 saja.....\r\npingin ke pulau jawa.. jauh.... mahal hehehe', '2014-09-24 21:13:41', 'sent', 1),
(3, 0, '+6281397750248', 'tes lagi...', '2014-09-27 17:37:25', 'sent', 1),
(4, 0, '+6282111133448', 'ghgh', '2014-09-27 20:08:51', 'sent', 1),
(5, 0, '+6281260931206', 'tes lagi', '2014-09-27 20:10:31', 'sent', 1),
(6, 0, '+6285861786388', 'I''m nervous', '2014-09-27 20:21:09', 'sent', 1),
(7, 0, '+6285861786388', 'How I do it?', '2014-09-27 21:59:46', 'sent', 1),
(8, 0, '+6285861786388', 'Can I?', '2014-09-27 21:59:58', 'sent', 1),
(9, 0, '+6281260931206', 'halo', '2014-09-28 15:57:30', 'sent', 1),
(10, 0, '6281397750248', 'halo', '2014-09-28 15:58:12', 'sent', 1),
(11, 0, '6281397750248', 'halo', '2014-09-28 15:58:24', 'sent', 1),
(12, 0, '+6285861786388', 'halo', '2014-09-28 15:59:39', 'sent', 1),
(13, 0, '+6285861786388', 'halo 12', '2014-09-28 15:59:54', 'sent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tanggal`
--

CREATE TABLE IF NOT EXISTS `tanggal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tanggal`
--

INSERT INTO `tanggal` (`id`, `tanggal`) VALUES
(1, '2014-08-21 15:31:52'),
(2, '2014-08-21 15:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `unsent_outbox`
--

CREATE TABLE IF NOT EXISTS `unsent_outbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver` varchar(20) NOT NULL,
  `msg` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `last_login` timestamp NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `full_name`, `password`, `level`, `email`, `last_login`) VALUES
(1, 'catur', '', 'iKZcU6Vb8BTJzwnpCRL/j1RQ9wm6puhWbALDl1soUwxRoLDX6ChjmRDz3dsNEpiTvVO2uOOZH3n+X7QLPcnH0g==', 'administrator', 'ctrbudisantoso@gmail.com', '2014-08-26 17:36:34'),
(2, 'catur1', '', '0JrGseGULha6C9xQbhIlGO3TMndGbvdorM5mDA+4SqavSQ+0ESvQcHplZCyRY1kTP35xSoZosmQqZRc5821zVQ==', 'user', 'ctrbudisantoso@gmail.com', '2014-10-11 06:06:44'),
(3, 'operator_1', '', 'nNmHBQpcO9rsOgAAlsRtcjZj6HUdeKlGuy7eRkWLlfjaU5sqwnHNkLj3e9wcdjhBCSlZNWfc2JqkllwPEf3mfg==', 'operator', 'op@example.com', '2014-10-18 21:56:30'),
(4, 'operator_2', '', 'RQgA0DftrMtkFPC+oVDkJJ2IcMUnnkdcMT4dym7sexGUBopqXDjnn4V95EaOxUMOVyF/vky+yb7GXG0PgE5afw==', 'operator', 'coperator@os.net', '2014-09-23 21:57:11'),
(5, 'om_cat', '', 'NFXiJg0v8J7hQaaSovw6ICDssa9Lj+WZMzGjYKz4maiePYjB8RRjPb6bnNaMqWR3DWXzpySUztVZxgwxA0xqTw==', 'user', 'cs@gfg.com', '2014-09-19 07:16:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
