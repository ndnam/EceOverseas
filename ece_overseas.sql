-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2014 at 09:40 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ece_overseas`
--

-- --------------------------------------------------------

--
-- Table structure for table `dictionary`
--

CREATE TABLE IF NOT EXISTS `dictionary` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) NOT NULL,
  `label` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `dictionary`
--

INSERT INTO `dictionary` (`id`, `type`, `label`, `value`, `position`) VALUES
(1, 1, 'True', 1, 1),
(2, 1, 'False', 0, 2),
(3, 2, 'Rejected', 0, 1),
(4, 2, 'Pending', 1, 2),
(5, 2, 'Shortlisted', 2, 3),
(6, 2, 'Confirmed', 3, 4),
(7, 2, 'Invalid', 4, 5),
(8, 3, 'Project Leader', 1, 1),
(9, 3, 'Project Support', 2, 2),
(12, 4, 'Poor', 1, 1),
(13, 4, 'Average', 2, 2),
(14, 4, 'Good', 3, 3),
(15, 5, 'S', 1, 1),
(16, 5, 'M', 2, 2),
(17, 5, 'L', 3, 3),
(18, 5, 'XL', 4, 4),
(19, 5, 'XXL', 5, 5),
(20, 5, 'XXXL', 6, 6),
(21, 5, 'XXXXL', 7, 7),
(22, 6, 'O+', 1, 1),
(23, 6, 'O-', 2, 2),
(24, 6, 'A+', 3, 3),
(25, 6, 'A-', 4, 4),
(26, 6, 'B+', 5, 5),
(27, 6, 'B-', 6, 6),
(28, 6, 'AB+', 7, 7),
(29, 6, 'AB-', 8, 8),
(30, 7, 'Private', 1, 1),
(31, 7, 'Executive', 2, 2),
(32, 7, 'Rented', 3, 3),
(33, 8, 'New', 1, 1),
(34, 8, 'Public', 2, 2),
(35, 8, 'Closed', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dict_country`
--

CREATE TABLE IF NOT EXISTS `dict_country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `callcode` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=540 ;

--
-- Dumping data for table `dict_country`
--

INSERT INTO `dict_country` (`id`, `code`, `name`, `callcode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AX', 'Åland Islands', 358),
(3, 'AL', 'Albania', 355),
(4, 'DZ', 'Algeria', 213),
(5, 'AS', 'American Samoa', 1684),
(6, 'AD', 'Andorra', 376),
(7, 'AO', 'Angola', 244),
(8, 'AI', 'Anguilla', 1264),
(9, 'AQ', 'Antarctica', 672),
(10, 'AG', 'Antigua and Barbuda', 1268),
(11, 'AR', 'Argentina', 54),
(12, 'AM', 'Armenia', 374),
(13, 'AW', 'Aruba', 297),
(14, 'AU', 'Australia', 61),
(15, 'AT', 'Austria', 43),
(16, 'AZ', 'Azerbaijan', 994),
(17, 'BS', 'Bahamas', 1242),
(18, 'BH', 'Bahrain', 973),
(19, 'BD', 'Bangladesh', 880),
(20, 'BB', 'Barbados', 1246),
(21, 'BY', 'Belarus', 375),
(22, 'BE', 'Belgium', 32),
(23, 'BZ', 'Belize', 501),
(24, 'BJ', 'Benin', 229),
(25, 'BM', 'Bermuda', 1441),
(26, 'BT', 'Bhutan', 975),
(27, 'BO', 'Bolivia', 591),
(28, 'BA', 'Bosnia and Herzegovina', 387),
(29, 'BW', 'Botswana', 267),
(30, 'BV', 'Bouvet Island', 0),
(31, 'BR', 'Brazil', 55),
(32, 'IO', 'British Indian Ocean Territory', 0),
(33, 'BN', 'Brunei Darussalam', 673),
(34, 'BG', 'Bulgaria', 359),
(35, 'BF', 'Burkina Faso', 226),
(36, 'BI', 'Burundi', 257),
(37, 'KH', 'Cambodia', 855),
(38, 'CM', 'Cameroon', 237),
(39, 'CA', 'Canada', 1),
(40, 'CV', 'Cape Verde', 238),
(41, 'KY', 'Cayman Islands', 1345),
(42, 'CF', 'Central African Republic', 236),
(43, 'TD', 'Chad', 235),
(44, 'CL', 'Chile', 56),
(45, 'CN', 'China', 86),
(46, 'CX', 'Christmas Island', 61),
(47, 'CC', 'Cocos (Keeling) Islands', 61),
(48, 'CO', 'Colombia', 57),
(49, 'KM', 'Comoros', 269),
(50, 'CG', 'Congo', 242),
(51, 'CD', 'Congo,The Democratic Republic of The', 243),
(52, 'CK', 'Cook Islands', 682),
(53, 'CR', 'Costa Rica', 506),
(54, 'CI', 'Cote D''ivoire', 0),
(55, 'HR', 'Croatia', 385),
(56, 'CU', 'Cuba', 53),
(57, 'CY', 'Cyprus', 357),
(58, 'CZ', 'Czech Republic', 420),
(59, 'DK', 'Denmark', 45),
(60, 'DJ', 'Djibouti', 253),
(61, 'DM', 'Dominica', 1767),
(62, 'DO', 'Dominican Republic', 1809),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'FK', 'Falkland Islands (Malvinas)', 500),
(71, 'FO', 'Faroe Islands', 298),
(72, 'FJ', 'Fiji', 679),
(73, 'FI', 'Finland', 358),
(74, 'FR', 'France', 33),
(75, 'GF', 'French Guiana', 0),
(76, 'PF', 'French Polynesia', 689),
(77, 'TF', 'French Southern Territories', 0),
(78, 'GA', 'Gabon', 241),
(79, 'GM', 'Gambia', 220),
(80, 'GE', 'Georgia', 995),
(81, 'DE', 'Germany', 49),
(82, 'GH', 'Ghana', 233),
(83, 'GI', 'Gibraltar', 350),
(84, 'GR', 'Greece', 30),
(85, 'GL', 'Greenland', 299),
(86, 'GD', 'Grenada', 1473),
(87, 'GP', 'Guadeloupe', 0),
(88, 'GU', 'Guam', 1671),
(89, 'GT', 'Guatemala', 501),
(90, 'GG', 'Guernsey', 0),
(91, 'GN', 'Guinea', 224),
(92, 'GW', 'Guinea-bissau', 245),
(93, 'GY', 'Guyana', 592),
(94, 'HT', 'Haiti', 509),
(95, 'HM', 'Heard Island and Mcdonald Islands', 0),
(96, 'VA', 'Holy See (Vatican City State)', 39),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran,Islamic Republic of', 91),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IM', 'Isle of Man', 44),
(107, 'IL', 'Israel', 972),
(108, 'IT', 'Italy', 39),
(109, 'JM', 'Jamaica', 1976),
(110, 'JP', 'Japan', 81),
(111, 'JE', 'Jersey', 0),
(112, 'JO', 'Jordan', 962),
(113, 'KZ', 'Kazakhstan', 7),
(114, 'KE', 'Kenya', 254),
(115, 'KI', 'Kiribati', 686),
(116, 'KP', 'Korea,Democratic People''s Republic of', 850),
(117, 'KR', 'Korea,Republic of', 82),
(118, 'KW', 'Kuwait', 965),
(119, 'KG', 'Kyrgyzstan', 996),
(120, 'LA', 'Lao People''s Democratic Republic', 856),
(121, 'LV', 'Latvia', 371),
(122, 'LB', 'Lebanon', 961),
(123, 'LS', 'Lesotho', 266),
(124, 'LR', 'Liberia', 231),
(125, 'LY', 'Libyan Arab Jamahiriya', 218),
(126, 'LI', 'Liechtenstein', 423),
(127, 'LT', 'Lithuania', 370),
(128, 'LU', 'Luxembourg', 352),
(129, 'MO', 'Macao', 853),
(130, 'MK', 'Macedonia,The Former Yugoslav Republic of', 389),
(131, 'MG', 'Madagascar', 261),
(132, 'MW', 'Malawi', 265),
(133, 'MY', 'Malaysia', 60),
(134, 'MV', 'Maldives', 960),
(135, 'ML', 'Mali', 223),
(136, 'MT', 'Malta', 356),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 0),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 262),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia,Federated States of', 691),
(144, 'MD', 'Moldova,Republic of', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'ME', 'Montenegro', 382),
(148, 'MS', 'Montserrat', 1664),
(149, 'MA', 'Morocco', 212),
(150, 'MZ', 'Mozambique', 258),
(151, 'MM', 'Myanmar', 95),
(152, 'NA', 'Namibia', 264),
(153, 'NR', 'Nauru', 674),
(154, 'NP', 'Nepal', 977),
(155, 'NL', 'Netherlands', 31),
(156, 'AN', 'Netherlands Antilles', 599),
(157, 'NC', 'New Caledonia', 687),
(158, 'NZ', 'New Zealand', 64),
(159, 'NI', 'Nicaragua', 505),
(160, 'NE', 'Niger', 227),
(161, 'NG', 'Nigeria', 234),
(162, 'NU', 'Niue', 683),
(163, 'NF', 'Norfolk Island', 672),
(164, 'MP', 'Northern Mariana Islands', 1670),
(165, 'NO', 'Norway', 47),
(166, 'OM', 'Oman', 968),
(167, 'PK', 'Pakistan', 92),
(168, 'PW', 'Palau', 680),
(169, 'PS', 'Palestinian Territory,Occupied', 0),
(170, 'PA', 'Panama', 507),
(171, 'PG', 'Papua New Guinea', 675),
(172, 'PY', 'Paraguay', 595),
(173, 'PE', 'Peru', 51),
(174, 'PH', 'Philippines', 63),
(175, 'PN', 'Pitcairn', 870),
(176, 'PL', 'Poland', 48),
(177, 'PT', 'Portugal', 351),
(178, 'PR', 'Puerto Rico', 1),
(179, 'QA', 'Qatar', 974),
(180, 'RE', 'Reunion', 0),
(181, 'RO', 'Romania', 40),
(182, 'RU', 'Russian Federation', 7),
(183, 'RW', 'Rwanda', 250),
(184, 'SH', 'Saint Helena', 290),
(185, 'KN', 'Saint Kitts and Nevis', 1869),
(186, 'LC', 'Saint Lucia', 1758),
(187, 'PM', 'Saint Pierre and Miquelon', 508),
(188, 'VC', 'Saint Vincent and The Grenadines', 1784),
(189, 'WS', 'Samoa', 685),
(190, 'SM', 'San Marino', 378),
(191, 'ST', 'Sao Tome and Principe', 239),
(192, 'SA', 'Saudi Arabia', 966),
(193, 'SN', 'Senegal', 221),
(194, 'RS', 'Serbia', 381),
(195, 'SC', 'Seychelles', 248),
(196, 'SL', 'Sierra Leone', 232),
(197, 'SG', 'Singapore', 65),
(198, 'SK', 'Slovakia', 421),
(199, 'SI', 'Slovenia', 386),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia and The South Sandwich Islands', 0),
(204, 'ES', 'Spain', 34),
(205, 'LK', 'Sri Lanka', 94),
(206, 'SD', 'Sudan', 249),
(207, 'SR', 'Suriname', 597),
(208, 'SJ', 'Svalbard and Jan Mayen', 0),
(209, 'SZ', 'Swaziland', 268),
(210, 'SE', 'Sweden', 46),
(211, 'CH', 'Switzerland', 41),
(212, 'SY', 'Syrian Arab Republic', 0),
(213, 'TW', 'Taiwan,Province of China', 886),
(214, 'TJ', 'Tajikistan', 992),
(215, 'TZ', 'Tanzania,United Republic of', 255),
(216, 'TH', 'Thailand', 66),
(217, 'TL', 'Timor-leste', 670),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad and Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 993),
(225, 'TC', 'Turks and Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 0),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VE', 'Venezuela', 58),
(237, 'VN', 'Viet Nam', 84),
(238, 'VG', 'Virgin Islands,British', 0),
(239, 'VI', 'Virgin Islands,U.S.', 0),
(240, 'WF', 'Wallis and Futuna', 681),
(241, 'EH', 'Western Sahara', 0),
(242, 'YE', 'Yemen', 967),
(243, 'ZM', 'Zambia', 260),
(244, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `familymember`
--

CREATE TABLE IF NOT EXISTS `familymember` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `studentId` int(10) unsigned NOT NULL COMMENT 'Student ID',
  `relationship` varchar(50) NOT NULL COMMENT 'Relationship',
  `fullname` varchar(100) NOT NULL COMMENT 'Full Name',
  `age` int(10) NOT NULL COMMENT 'Age',
  `occupation` varchar(100) NOT NULL COMMENT 'Occupation',
  `monthlyIncome` int(15) NOT NULL COMMENT 'Monthly Income',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modified',
  PRIMARY KEY (`id`),
  KEY `studentId` (`studentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `familymember`
--

INSERT INTO `familymember` (`id`, `studentId`, `relationship`, `fullname`, `age`, `occupation`, `monthlyIncome`, `created`, `modified`) VALUES
(1, 1, 'Mother', '123', 31, '123', 300000, '2014-03-15 02:30:24', '2014-03-15 02:30:24'),
(2, 1, 'Mother', '123', 31, '123', 300000, '2014-03-18 03:49:52', '2014-03-18 03:49:52'),
(3, 1, 'Mother', '123', 31, '123', 300000, '2014-03-18 14:31:02', '2014-03-18 14:31:02'),
(4, 2, 'Father', 'ABC', 44, 'Engineer', 400000, '2014-03-18 14:36:37', '2014-03-18 14:36:37'),
(5, 3, 'Mother', '123', 31, 'Policewoman', 300000, '2014-03-18 14:40:23', '2014-03-18 14:40:23'),
(7, 4, 'Mother', '123', 31, 'Policewoman', 300000, '2014-03-25 02:52:29', '2014-04-02 07:27:40'),
(8, 4, 'Father', 'NDT', 44, 'Engineer', 10000, '2014-03-28 15:43:08', '2014-04-02 07:27:40'),
(9, 4, 'Brother', 'ALKS', 32, 'Law Enforcer', 0, '2014-03-28 15:56:21', '2014-04-02 07:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(100) NOT NULL COMMENT 'Name',
  `city` varchar(50) NOT NULL COMMENT 'City/County',
  `country` varchar(50) NOT NULL COMMENT 'Country',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `city`, `country`, `created`, `modified`) VALUES
(1, 'Hong Xuan Kindergarten', 'Hue', 'Vietnam', '2014-03-03 14:50:11', '2014-03-03 14:50:11'),
(2, 'Yunnan', 'Yunnan', 'China', '2014-03-03 14:50:11', '2014-03-03 14:50:11'),
(3, 'Location 1', 'City 1', 'Country 1', '2014-03-20 15:04:25', '2014-03-20 15:04:25'),
(10, 'Location 5', 'City 5', 'Country 5', '2014-03-21 01:23:44', '2014-03-21 01:23:44'),
(13, 'Location &', 'City 7', 'Country 5', '2014-03-21 02:11:03', '2014-03-21 02:11:03'),
(14, 'Location &', 'City 7', 'Country 7', '2014-03-21 02:11:04', '2014-03-21 02:11:04'),
(15, 'Location &', 'City 7', 'Country 7', '2014-03-21 02:11:04', '2014-03-21 02:11:04'),
(16, 'Location 6', 'City 6', 'Country 6', '2014-03-21 03:04:40', '2014-03-21 03:04:40'),
(17, 'Location 8', 'City 8', 'Country 8', '2014-03-21 03:09:10', '2014-03-21 03:09:10'),
(18, 'Location 9', 'City 9', 'Country 9', '2014-03-21 03:16:08', '2014-03-21 03:16:08'),
(19, 'Location 10', 'City 10', 'Country 10', '2014-03-25 08:40:06', '2014-03-25 08:40:06'),
(20, 'Ngee Ann Polytechnic', 'Singapore', 'Singapore', '2014-04-02 03:51:30', '2014-04-02 03:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `medicalinfo`
--

CREATE TABLE IF NOT EXISTS `medicalinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `studentId` int(10) unsigned NOT NULL COMMENT 'Student ID',
  `heartProblem` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Heart Problem',
  `fits` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Fits',
  `faintingSpell` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Fainting Spell',
  `diabetes` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Diabetes',
  `asthma` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Asthma',
  `migraine` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Migraine',
  `visionProblem` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Vision Problem',
  `colorBlind` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Color Blind',
  `earProblem` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Ear Problem',
  `fractures` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Fractures',
  `dislocations` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Dislocations',
  `carrierStatus` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Carrier Status',
  `otherMedicalHistory` varchar(500) DEFAULT NULL COMMENT 'Others',
  `currentMedications` varchar(500) DEFAULT NULL COMMENT 'Current Medication',
  `otherMedicalConditions` varchar(500) DEFAULT NULL COMMENT 'Other Medical Conditions',
  `physicalDisabilities` varchar(500) DEFAULT NULL COMMENT 'Physical Disabilities',
  `allergies` varchar(500) DEFAULT NULL COMMENT 'Allergies',
  `vegetarian` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Vegetarian',
  `halal` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Halal',
  `noSeafood` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'No Seafood',
  `noBeef` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'No Beef',
  `otherFoodRestrictions` varchar(500) DEFAULT NULL COMMENT 'Others',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modified',
  PRIMARY KEY (`id`),
  KEY `studentId` (`studentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `medicalinfo`
--

INSERT INTO `medicalinfo` (`id`, `studentId`, `heartProblem`, `fits`, `faintingSpell`, `diabetes`, `asthma`, `migraine`, `visionProblem`, `colorBlind`, `earProblem`, `fractures`, `dislocations`, `carrierStatus`, `otherMedicalHistory`, `currentMedications`, `otherMedicalConditions`, `physicalDisabilities`, `allergies`, `vegetarian`, `halal`, `noSeafood`, `noBeef`, `otherFoodRestrictions`, `created`, `modified`) VALUES
(1, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, '', '', '', '', 'Pollen', 1, 0, 1, 0, '', '2014-03-15 02:30:24', '2014-03-15 02:30:24'),
(2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '', '', 'Bee', 1, 1, 0, 0, '', '2014-03-18 14:36:37', '2014-03-18 14:36:37'),
(3, 3, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, '', '', '', '', '', 0, 0, 0, 0, '', '2014-03-18 14:40:23', '2014-03-18 14:40:23'),
(4, 4, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 'Does near-sighted count as a medical condition?', 'I''m just filling some stuff here', '', '', 'Pollen', 1, 1, 1, 1, '', '2014-03-25 02:52:29', '2014-03-27 14:17:12'),
(8, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, '', '2014-03-31 15:03:52', '2014-03-31 15:03:52'),
(9, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, '2014-03-31 15:03:52', '2014-03-31 15:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `nextofkin`
--

CREATE TABLE IF NOT EXISTS `nextofkin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `studentId` int(10) unsigned NOT NULL COMMENT 'Student ID',
  `fullName` varchar(100) NOT NULL COMMENT 'Full Name',
  `relationship` varchar(50) NOT NULL COMMENT 'Relationship',
  `mobilePhone` varchar(20) DEFAULT NULL COMMENT 'Mobile Phone',
  `officePhone` varchar(20) DEFAULT NULL COMMENT 'Office Phone',
  `homePhone` varchar(20) DEFAULT NULL COMMENT 'Home Phone',
  `email` varchar(50) DEFAULT NULL COMMENT 'Email',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modified',
  PRIMARY KEY (`id`),
  KEY `studentId` (`studentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `nextofkin`
--

INSERT INTO `nextofkin` (`id`, `studentId`, `fullName`, `relationship`, `mobilePhone`, `officePhone`, `homePhone`, `email`, `created`, `modified`) VALUES
(1, 1, 'NDN', 'Father', '123458', '', '', '', '2014-03-15 02:30:24', '2014-03-15 02:30:24'),
(2, 2, 'ABC', 'Father', '123458', '', '', '', '2014-03-18 14:36:37', '2014-03-18 14:36:37'),
(3, 3, 'ABC', 'Father', '123458', '', '', '', '2014-03-18 14:40:23', '2014-03-18 14:40:23'),
(4, 4, 'ABC', 'Brother', '123458', '', '', 'na@na.com', '0000-00-00 00:00:00', '2014-04-02 07:27:40'),
(6, 6, 'ABC', '', '', '', '', '', '2014-03-31 15:03:52', '2014-04-01 06:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `pasttrip`
--

CREATE TABLE IF NOT EXISTS `pasttrip` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `studentId` int(10) unsigned NOT NULL COMMENT 'Student ID',
  `programName` varchar(100) NOT NULL COMMENT 'Program Name',
  `country` int(10) unsigned NOT NULL COMMENT 'Country',
  `duration` varchar(50) NOT NULL COMMENT 'Duration',
  `capacity` varchar(50) NOT NULL COMMENT 'In what capacity (Participant / Student Leader / Others)',
  `isSubsidized` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Subsidized By NP?',
  `amount` float DEFAULT '0' COMMENT 'Amount',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modified',
  PRIMARY KEY (`id`),
  KEY `studentId` (`studentId`),
  KEY `pastrip_country_fk` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pasttrip`
--

INSERT INTO `pasttrip` (`id`, `studentId`, `programName`, `country`, `duration`, `capacity`, `isSubsidized`, `amount`, `created`, `modified`) VALUES
(1, 1, 'ABC', 340, '1 month', 'Leader', 1, 10000, '0000-00-00 00:00:00', '2014-03-15 02:30:24'),
(2, 4, 'Program name', 340, '2 months', 'Leader', 1, 900, '2014-03-25 02:52:29', '2014-04-02 07:27:32'),
(4, 4, 'Some make up name', 340, '16 months', 'Participant', 1, 0, '2014-03-28 14:02:48', '2014-04-02 07:27:32'),
(5, 4, 'CBA', 337, '16 months', 'Participant', 0, 0, '2014-03-28 14:04:04', '2014-04-02 07:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(100) NOT NULL COMMENT 'Title',
  `status` int(11) NOT NULL DEFAULT '1',
  `description` varchar(500) NOT NULL COMMENT 'Description',
  `locationId` int(10) unsigned DEFAULT NULL COMMENT 'Location ID',
  `startDate` date NOT NULL COMMENT 'Start Date',
  `endDate` date NOT NULL COMMENT 'End Date',
  `teamSize` int(10) unsigned NOT NULL COMMENT 'Team Size',
  `deadline` date NOT NULL COMMENT 'Application Deadline',
  `createdBy` int(10) unsigned NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modified',
  PRIMARY KEY (`id`),
  KEY `locationid` (`locationId`),
  KEY `project_createdBy_fk_idx` (`createdBy`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `status`, `description`, `locationId`, `startDate`, `endDate`, `teamSize`, `deadline`, `createdBy`, `created`, `modified`) VALUES
(1, 'Sample project #1', 2, 'This is a sample project, #1', 1, '2014-03-17', '2014-03-31', 30, '2014-03-17', 1, '0000-00-00 00:00:00', '2014-03-31 02:25:33'),
(2, 'Sample Project 2', 2, 'This is another sample project', 2, '2014-03-12', '2014-03-26', 12, '2014-03-04', 1, '2014-03-12 06:51:50', '2014-03-24 09:18:11'),
(3, 'Sample Project 3', 2, 'Sample project #3', 1, '2014-03-20', '2014-03-13', 123, '2014-03-13', 1, '2014-03-20 08:23:53', '2014-03-31 02:25:33'),
(10, 'Sample Project 4', 2, 'This is sample project #4', 1, '2014-03-21', '2014-03-28', 10, '2014-03-20', 1, '2014-03-21 01:28:18', '2014-03-31 02:25:33'),
(12, 'Sample Project 5', 1, 'This is sample project #5', 1, '2014-03-21', '2014-03-28', 10, '2014-03-14', 1, '2014-03-21 01:36:34', '2014-03-24 09:18:13'),
(25, 'Sample Project #9', 3, 'Sample Project #9', 17, '2014-03-21', '2014-03-28', 12, '2014-03-13', 1, '2014-03-21 03:16:08', '2014-03-25 07:36:55'),
(26, 'Sample Project 10', 1, 'Sample Project 10', 19, '2014-03-25', '2014-03-31', 12, '2014-03-24', 1, '2014-03-25 08:40:06', '2014-03-25 08:40:06'),
(27, 'NP 1', 1, 'Just testing project creating feature', 20, '2014-04-02', '2014-04-16', 2, '2014-04-01', 1, '2014-04-02 05:42:09', '2014-04-02 05:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `projectstaff`
--

CREATE TABLE IF NOT EXISTS `projectstaff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `projectId` int(10) unsigned NOT NULL COMMENT 'Project ID',
  `staffId` int(10) unsigned NOT NULL COMMENT 'Staff ID',
  `role` int(30) unsigned NOT NULL DEFAULT '1' COMMENT 'Role',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modified',
  PRIMARY KEY (`id`),
  KEY `projectid` (`projectId`),
  KEY `staffid` (`staffId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `projectstaff`
--

INSERT INTO `projectstaff` (`id`, `projectId`, `staffId`, `role`, `created`, `modified`) VALUES
(13, 1, 2, 1, '2014-03-19 14:39:21', '2014-03-25 08:31:20'),
(14, 25, 2, 1, '2014-03-25 01:25:39', '2014-03-25 01:25:39'),
(15, 25, 1, 2, '2014-03-25 02:25:16', '2014-03-25 07:58:55'),
(19, 25, 5, 2, '2014-03-25 07:58:43', '2014-03-25 07:58:43'),
(20, 1, 1, 2, '2014-03-25 08:13:37', '2014-03-25 08:31:21'),
(22, 1, 5, 1, '2014-03-25 08:31:43', '2014-03-25 08:32:38'),
(23, 26, 2, 1, '2014-03-25 08:40:06', '2014-03-25 08:40:06'),
(30, 10, 5, 1, '2014-04-01 01:38:35', '2014-04-01 01:38:35'),
(33, 10, 2, 1, '2014-04-01 01:43:58', '2014-04-02 05:26:54'),
(34, 2, 2, 1, '2014-04-02 05:24:20', '2014-04-02 05:26:54'),
(35, 3, 2, 1, '2014-04-02 05:24:20', '2014-04-02 05:26:54'),
(36, 12, 2, 1, '2014-04-02 05:24:20', '2014-04-02 05:26:54'),
(38, 27, 2, 1, '2014-04-02 05:42:09', '2014-04-02 05:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `initial` varchar(10) NOT NULL COMMENT 'Initial',
  `fullName` varchar(100) NOT NULL COMMENT 'Full Name',
  `email` varchar(255) NOT NULL COMMENT 'Email',
  `phone` varchar(20) NOT NULL COMMENT 'Phone',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modified',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `initial`, `fullName`, `email`, `phone`, `created`, `modified`) VALUES
(1, 'tcc', 'Tan Chin Chye', 'tcc@np.edu.sg', '64607014', '2014-03-03 14:54:29', '2014-03-03 14:58:47'),
(2, 'ndn', 'Nguyen Danh Nam', 'ndnam@gmail.com', '12345678', '2014-03-03 14:54:29', '2014-03-03 14:55:05'),
(5, 'ndn', 'Nguyen Danh N', 'ndnam@ndn.com', '12345678', '2014-03-24 08:32:10', '2014-03-24 08:32:10'),
(6, '', 'Staff1', 'staff1@staff.com', '123456789', '2014-03-31 15:14:46', '2014-04-02 06:46:12'),
(7, '', '', '', '', '2014-04-02 05:22:45', '2014-04-02 05:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `firstName` varchar(50) DEFAULT NULL COMMENT 'Full Name (exactly as Passport)',
  `familyName` varchar(50) DEFAULT NULL COMMENT 'Family Name',
  `gender` smallint(1) unsigned DEFAULT '1' COMMENT 'Gender',
  `studentNumber` varchar(10) DEFAULT NULL COMMENT 'Student No.',
  `school` varchar(50) DEFAULT NULL COMMENT 'School',
  `course` varchar(50) DEFAULT NULL COMMENT 'Course',
  `level` varchar(10) DEFAULT NULL COMMENT 'Level',
  `birthday` date DEFAULT NULL COMMENT 'Birthday',
  `race` varchar(50) DEFAULT NULL COMMENT 'Race',
  `religion` varchar(50) DEFAULT NULL COMMENT 'Religion',
  `nationality` varchar(50) DEFAULT NULL COMMENT 'Nationality',
  `isPR` tinyint(1) DEFAULT '0' COMMENT 'Is Singapore PR?',
  `nricNumber` varchar(10) DEFAULT NULL COMMENT 'NRIC Number (For Singaporean / PR)',
  `passportNumber` varchar(50) DEFAULT NULL COMMENT 'Passport Number',
  `issuingCountry` int(10) unsigned DEFAULT NULL COMMENT 'Issuing Country',
  `issuingDate` date DEFAULT NULL COMMENT 'Issuing Date',
  `expiryDate` date DEFAULT NULL COMMENT 'Expiry Date',
  `tshirtSize` int(10) DEFAULT '2' COMMENT 'T-Shirt Size',
  `bloodGroup` int(10) DEFAULT NULL COMMENT 'Blood Group',
  `swimmingAbility` int(10) DEFAULT '2' COMMENT 'Swimming Ability',
  `homeAddress` varchar(200) DEFAULT NULL COMMENT 'Home Address',
  `postalCode` varchar(10) DEFAULT NULL COMMENT 'Postal Code',
  `housingType` int(10) DEFAULT '1' COMMENT 'Housing Type',
  `personalEmail` varchar(50) DEFAULT NULL COMMENT 'Personal Email',
  `mobilePhone` varchar(20) DEFAULT NULL COMMENT 'Mobile Phone',
  `homePhone` varchar(20) DEFAULT NULL COMMENT 'Home Phone',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modified',
  PRIMARY KEY (`id`),
  KEY `issuingCountry_FK_idx` (`issuingCountry`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstName`, `familyName`, `gender`, `studentNumber`, `school`, `course`, `level`, `birthday`, `race`, `religion`, `nationality`, `isPR`, `nricNumber`, `passportNumber`, `issuingCountry`, `issuingDate`, `expiryDate`, `tshirtSize`, `bloodGroup`, `swimmingAbility`, `homeAddress`, `postalCode`, `housingType`, `personalEmail`, `mobilePhone`, `homePhone`, `created`, `modified`) VALUES
(1, 'Nam', 'Nguyen Danh', 1, 'S1234', 'SoE', 'ECE', '1.5', '2014-03-19', 'Asian', 'None', 'Vietnamese', 1, 'G1451343M', 'B5322433', 532, '2014-03-03', '2014-03-25', 3, 3, 3, 'Kismis Ave', '10000', 2, 'ndnam93@gmail.com', '12345679', '12345679', '0000-00-00 00:00:00', '2014-03-18 14:31:02'),
(2, 'Nam', 'Nguyen Danh', 1, 'S1234', 'SoE', 'ECE', '1.5', '2014-03-19', 'Asian', 'None', 'Vietnamese', 0, 'G1451343M', 'B5322433', 532, '2014-03-03', '2014-03-25', 3, 3, 3, 'Block 92 Kismis Ave', '10000', 2, 'ndnam93@gmail.com', '12345679', '12345679', '2014-03-18 14:36:37', '2014-03-18 14:36:37'),
(3, 'Nam', 'Nguyen Danh', 1, 'S1234', 'SoE', 'ECE', '1.5', '2014-03-19', 'Asian', 'None', 'Vietnamese', 0, 'G1451343M', 'B5322433', 532, '2014-03-03', '2014-03-25', 3, 3, 3, 'Kismis Ave', '10000', 2, 'ndnam93@gmail.com', '12345679', '12345679', '2014-03-18 14:40:23', '2014-03-18 14:40:23'),
(4, 'Nam', 'Nguyen Danh', 1, 'S1234', 'SOE', 'ECE', '1.5', '2014-03-19', 'Asian', 'None', 'Vietnamese', 1, 'G1451343M', 'B5322433', 518, '2014-03-03', '2014-03-25', 2, 3, 3, 'Kismis', '1000000000', 2, 'ndnam93@gmail.com', '12345679', '12345679689758456342', '2014-03-25 02:52:29', '2014-04-02 07:27:20'),
(6, 'Nam', '', 1, '', '', '', '', '0000-00-00', '', '', '', 0, '', '', 492, '0000-00-00', '0000-00-00', 2, 1, 2, '', '', 1, '', '', '', '2014-03-31 15:03:52', '2014-04-01 06:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `studentapplication`
--

CREATE TABLE IF NOT EXISTS `studentapplication` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `status` int(10) DEFAULT '1',
  `studentId` int(10) unsigned NOT NULL COMMENT 'Student ID',
  `projectId` int(10) unsigned NOT NULL COMMENT 'Project ID',
  `usingPsea` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Using PSEA',
  `support` varchar(500) DEFAULT NULL COMMENT 'Supporting Statements',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modified',
  PRIMARY KEY (`id`),
  KEY `studentid` (`studentId`),
  KEY `projectid` (`projectId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `studentapplication`
--

INSERT INTO `studentapplication` (`id`, `status`, `studentId`, `projectId`, `usingPsea`, `support`, `created`, `modified`) VALUES
(1, 3, 4, 1, 0, 'Choose me', '2014-03-25 02:52:29', '2014-03-25 08:03:12'),
(2, 1, 4, 2, 0, 'Don''t care about the others', '2014-03-25 02:52:29', '2014-03-25 02:52:29'),
(4, 1, 4, 10, 1, 'I will rock!', '2014-03-25 02:52:29', '2014-03-31 05:05:15'),
(5, 1, 6, 10, 1, '', '2014-04-01 06:40:08', '2014-04-01 06:40:08'),
(6, 1, 6, 2, 0, '', '2014-04-01 06:41:19', '2014-04-01 06:41:19'),
(7, 1, 6, 1, 0, '', '2014-04-01 06:41:25', '2014-04-01 06:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `studentcca`
--

CREATE TABLE IF NOT EXISTS `studentcca` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `studentId` int(10) unsigned NOT NULL COMMENT 'Student ID',
  `isInNP` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Is in Ngee Ann Polytechnic',
  `period` varchar(50) NOT NULL COMMENT 'Period',
  `organization` varchar(100) NOT NULL COMMENT 'Organization',
  `position` varchar(100) NOT NULL COMMENT 'Position',
  `description` varchar(500) DEFAULT NULL COMMENT 'Description',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Modified',
  PRIMARY KEY (`id`),
  KEY `studentId` (`studentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `studentcca`
--

INSERT INTO `studentcca` (`id`, `studentId`, `isInNP`, `period`, `organization`, `position`, `description`, `created`, `modified`) VALUES
(1, 1, 1, '2012-2013', 'Ngee Ann', 'Leader', '', '2014-03-15 02:30:24', '2014-03-15 02:30:24'),
(2, 1, 1, '2012-2013', 'Ngee Ann', 'Leader', '', '2014-03-18 07:46:36', '2014-03-18 07:46:36'),
(3, 3, 1, '2012-2013', 'Ngee Ann', 'Leader', '', '2014-03-18 14:40:23', '2014-03-18 14:40:23'),
(4, 4, 1, '2012-2013', 'Ngee Ann', 'Advisor', '', '2014-03-25 02:52:29', '2014-04-02 07:27:32'),
(5, 4, 0, '2010-2011', 'Ngee Ann', 'Leader', '', '2014-03-28 02:58:21', '2014-04-02 07:27:32'),
(7, 4, 0, '3 months', 'Ngee Ann', 'Leader', 'Just Testing', '2014-03-28 13:46:53', '2014-04-02 07:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `accountType` int(10) unsigned NOT NULL,
  `studentId` int(10) unsigned DEFAULT NULL,
  `staffId` int(10) unsigned DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `FK_user_staff_idx` (`staffId`),
  KEY `F_user_student_idx` (`studentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `accountType`, `studentId`, `staffId`, `created`, `modified`) VALUES
(1, 'ndnam', NULL, '$2a$13$trCKuat8ft49m5EY3poNQepqYzeWRCmFweVqGHCbOHk0t8V2Vqo62', 1, NULL, 2, '2014-03-24 03:48:19', '2014-03-24 03:48:19'),
(2, 'nam', NULL, '$2a$13$PZw8redfV8xBkK7Jz4fgK.9dZUyEq.n7fkdZCGHKnb5FCW8hWtZ22', 1, NULL, 7, '2014-03-24 07:30:12', '2014-04-02 05:22:45'),
(6, 'ndnndn', NULL, '$2a$13$/In0UuTAkUV83RWrxzqUb.B8AyRTC6Q2tptT/N9rfNzXmQOSEMb6i', 1, NULL, 5, '2014-03-24 08:32:11', '2014-03-24 08:32:11'),
(8, 'ndn', NULL, '$2a$13$jHZMOZY1p2Lz6XMbQxZeueIx5j.uuMUN79Z2PIdniIo/Puslayxm.', 2, 4, NULL, '2014-03-27 08:48:59', '2014-03-27 08:48:59'),
(9, 'student1', NULL, '$2a$13$kW.i0cdefiZ1iurfvTGWzeTC4TIlD8NRkmGI.1zb67GvoOc67d/N6', 2, 6, NULL, '2014-03-31 08:57:13', '2014-03-31 15:03:52'),
(10, 'staff1', NULL, '$2a$13$kW.i0cdefiZ1iurfvTGWzeTC4TIlD8NRkmGI.1zb67GvoOc67d/N6', 1, NULL, 6, '2014-03-31 08:57:13', '2014-03-31 15:14:46'),
(11, 'tcc', NULL, '$2a$13$kW.i0cdefiZ1iurfvTGWzeTC4TIlD8NRkmGI.1zb67GvoOc67d/N6', 1, NULL, 1, '2014-04-01 08:31:58', '2014-04-01 08:31:58');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `familymember`
--
ALTER TABLE `familymember`
  ADD CONSTRAINT `familymember_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicalinfo`
--
ALTER TABLE `medicalinfo`
  ADD CONSTRAINT `medicalhistory_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nextofkin`
--
ALTER TABLE `nextofkin`
  ADD CONSTRAINT `nextofkin_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasttrip`
--
ALTER TABLE `pasttrip`
  ADD CONSTRAINT `pastrip_country_fk` FOREIGN KEY (`country`) REFERENCES `dict_country` (`id`),
  ADD CONSTRAINT `pasttrip_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_createdBy_fk` FOREIGN KEY (`createdBy`) REFERENCES `staff` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`locationId`) REFERENCES `location` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `projectstaff`
--
ALTER TABLE `projectstaff`
  ADD CONSTRAINT `projectstaff_ibfk_3` FOREIGN KEY (`projectId`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projectstaff_ibfk_4` FOREIGN KEY (`staffId`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `issuingCountry_FK` FOREIGN KEY (`issuingCountry`) REFERENCES `dict_country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `studentapplication`
--
ALTER TABLE `studentapplication`
  ADD CONSTRAINT `studentapplication_ibfk_10` FOREIGN KEY (`projectId`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentapplication_ibfk_9` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `studentcca`
--
ALTER TABLE `studentcca`
  ADD CONSTRAINT `studentcca_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_staff` FOREIGN KEY (`staffId`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `F_user_student` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
