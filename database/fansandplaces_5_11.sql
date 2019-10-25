-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 05-Nov-2018 às 18:24
-- Versão do servidor: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fansandplaces`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_accounttoken`
--

DROP TABLE IF EXISTS `fap_accounttoken`;
CREATE TABLE IF NOT EXISTS `fap_accounttoken` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` longtext COLLATE utf8_bin NOT NULL,
  `friendly_token` longtext COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `account_token_fk0` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_accounttoken`
--

INSERT INTO `fap_accounttoken` (`id`, `user_id`, `token`, `friendly_token`, `created_at`, `updated_at`, `status`) VALUES
(22, 63, '$2y$10$XIAoC3hAbFPmREu3x4iHveo4VOv7Vlh/x8vbcT3xzfQ6olJwi0CzO', 'eyJpdiI6IkFtZG00TjgybnpqTGVtSDExUTRlZnc9PSIsInZhbHVlIjoiK0hVelBSS1pTV0U4Ulo3bjNWK0FYUXdPWmRWMlJGaUlMQTZIajErTGpxWVNpZjArUjR1VWhcLzVKcDAxUjJESG0yb2cyWXAxdmRSUFErZWRmZmhLckliajRHUG5NM1ZxZlZvTFZldE1MTk5FPSIsIm1hYyI6ImExOThjN2VmZDQ3MGQ2ZTk1NjFmOWMxMjA0YzZkODk5OGQ2ODA4MmUzZjAyOGU5N2ExODNiZWJhZDc2MjdlMjMifQ==', '2018-06-21 17:35:04', '2018-06-22 10:38:00', 1),
(23, 64, '$2y$10$jM7q/sDhK0bSomeDMCV96eqTP499CXR6vT/PoPTwlUgOa6ahjaU8u', 'eyJpdiI6Ilc2bVdqbGtTaGEyaitEbXkxZjgxb3c9PSIsInZhbHVlIjoicE51eXRndjBiZHZTeWNKb1dOQWxYSUNkVFlDZ2tzZEFGc2Z4V3h5UXJIWmM3SVRmSlNPVlRRcmljdlwvMDVPdjFTU3VpcnRXQWxjSno1NFpIVmpwVUhQR3FjamJqVEhtakcxRmZLVGNxV05BPSIsIm1hYyI6ImIyMGJlODkxN2JhOWFmMTg5YzlkZDRhM2JmZTQxNTM1Yzk3YTBiODc2YWI0MzQxZjBkNzVjNWM5ZjBiMjZlMzkifQ==', '2018-06-22 09:59:08', '2018-06-22 11:37:55', 0),
(24, 65, '$2y$10$9DyjocPthhtFOfGvWfFWxuCBW/MIUDLIzk7oO/BVjZWZchmLhTFwK', 'eyJpdiI6IjQ2cDJZdzI0V25icEVpK2FCV2kyVWc9PSIsInZhbHVlIjoibXJ4OGp4Zko4NFVtMHlxTnJlV0R0ZVhvdE5NcWJXcW5KVHRUbDZDNzZDZjh4SlRQUnNLelFNWHJ2NWpGdkFpRlwvcGlSWHR2c3BFWERDdUFyV3hoZlZkVXdDZGpPbnZGNSsyc1NQaWZqOG84PSIsIm1hYyI6ImFiNDcwNGZmMTM5ODJlODQzNGVhNTBkYWRmYzM1MzFhODAwYTM3MmQwOGVmODliYTQ0MDVlMTdkZjViNDQwYWMifQ==', '2018-06-22 13:25:43', '2018-06-22 15:05:51', 0),
(25, 68, '$2y$10$XqA02./hov3Y5T2aKnwJuOycD/3Ecjua0vMXcVuWJaohC0Ju8ItNS', 'eyJpdiI6IllETXdFOXBpS3VReEM5TFlBeEk3dnc9PSIsInZhbHVlIjoiXC9ydzVleHVoOGNQSU1cL1kxVlhDUXVcL1ZzXC9iaWlrV0dwMmZ2eW0yeWVFc3U0eW1PY3U3Mmowc29QcklLYVJjc1Zsa2lpTGNkTTdMNFwvM2xYcXBpR2Y5Zlhyb1FGM2xjdTVTeG1FaTU4TWhYMD0iLCJtYWMiOiI3ZmI0ZTFmZTQ0YjQyMGYzMTgxMTU0ZjE5MzVjZWY0NjkyMjEyZDE0NTIwY2ZiZTkyOTA1MjI4ZmYwZjUzY2Q3In0=', '2018-06-25 13:31:51', '2018-06-25 13:35:12', 0),
(26, 69, '$2y$10$U3hYKp.ihUW25Y1j.tNZfOaFLElt4GHeeR51v2APXzyXpfqZs5PBi', 'eyJpdiI6ImhxbEdJT3NSQ3Zjdmp4QTV1MVVXaWc9PSIsInZhbHVlIjoiZUxVeE9pS2NUZG1nOGVTSE1SRUxjQnBld3ZHbkpSM1BqZEdaU2theTIrV3hRQVl4UUQ4eWV1NFBKd0ZxV2pySU50clg5ZTFPSnlzWENXWGRFaXpBSlI2WTNhR1hMVGRUbUo5WmJmRHpSdGc9IiwibWFjIjoiZTE2ZjgwNTRjOTI5YmZkYzMwMDU4YjlhNWE1ZmRhZDllMzIyYjE2ZDFlMTI0NmZmYmVlZjRkNzY5NDE2M2U0NyJ9', '2018-06-25 13:41:55', '2018-06-25 13:41:55', 1),
(27, 70, '$2y$10$bbfuvSSSpqy9wDq5.hDt6ebbWVkvjbn/mgqlyv5Ku1eG15j93K7Y6', 'eyJpdiI6IlhJcitGWGlSVW43SFo5M3lnUk95b3c9PSIsInZhbHVlIjoiNEJoTjg5a3M2Y2c4SzR0NkFPRUhlQnRNUjRadHBBTlF3UWd6YTNDYW85c1RnQmJTWDB3enpKSnF0WVJYVWJZSWUxME9VbnlPYmFJNlN5ZVFETGlxS1pPT1pGSW5oSER3Q2Q5dG9QOWxNNnM9IiwibWFjIjoiMGVmMWU5MDMzZWZmYzhmNTYxYzFjNjZhMGJhODBkMjdmMmExNmYxMGMyY2U4MjE0MTdlYTI5MjE0ZDNiZTMwYSJ9', '2018-06-28 16:35:56', '2018-06-28 16:36:31', 0),
(28, 71, '$2y$10$qVBrGw..V.N8MtSOEzSOlOI5WAOP.uS.zt4.XqgAB7Ie/3v/aC6r.', 'eyJpdiI6IlNvY2VvVlM3dllOT2UraXIwczVmaXc9PSIsInZhbHVlIjoiWnBSZ05ZMkt0ZEdyaytpSlM0alJ4SHFVVDFtWTJkRGxCN09WOXROMjByQmE1aVFoUEJnb2ZOdHlnR2pTRXI5QXlFXC94bUVSd1FxekxzUlIzSm9uRllieHNGWHVzcEtNUlF0Q1p0T215YUw4PSIsIm1hYyI6IjQ1ODBmOTZlNzNjZmU4MDIxZDJiMmQ0ZmIzNThjMjcyOTU3NTc3ODk2NmI3YTAxMDBkYWViODljYjllMzNiMGMifQ==', '2018-07-02 17:23:08', '2018-07-02 17:23:43', 0),
(29, 72, '$2y$10$NQanbfPadZd4EyLKulwonOHwlBt9a45ww1CpDfXBob9WvHgDagf9m', 'eyJpdiI6ImN4MWRpSkZKRUdPbHQzSlFvRkpBV1E9PSIsInZhbHVlIjoieVBlVkM1ZFN0cVFJVDRqUW1FWFJJckFLNVFCMGd3Y1JGSVU0aFRcL1ZMNGJHNGZmWUkydHlhR1VRRStlU2ZlTWI1a2xsUTN4aHJ4c2ZVTkZtYjBzWXQ3NU53VktVU1JlTHFDYUtDaFwvZTQrUT0iLCJtYWMiOiIzNmM2Yjk5YjdhNjExMmI5YWUzMDYzMTMyYjFlMTZmZTRmYWZkMTMyNzBlNjA5MDkyNWY0NTI3NjMxNThiMjUyIn0=', '2018-08-10 13:48:22', '2018-08-10 13:48:49', 0),
(30, 73, '$2y$10$LDqyxXWTLzTP9wKywUie9ek/oSvv/AlMBTIYIHxwA1uy9r.b8JYk6', 'eyJpdiI6IjNlcUc1ZkRYOGRnM0hSek1FanFRM0E9PSIsInZhbHVlIjoiVUprd2g4dXlGcTl0bTk3eDhaRDNIUkJnbjErXC9xVWtoMDFCV0x2RTJoR2RTTWxuaXVRYTBVV0lRTW9id2RVeFArNlBFUTJHa1RaZTBOdzlTelcrZXlSaWhZc2ZQTDVEQ0hcLzM2M0p1WHo2TT0iLCJtYWMiOiJhNzBiZDc2M2NkNWVhNjc5N2I3YjFhMjM4NjQ4Y2RmN2E5MGY0NzYxZTI1ZTk0Y2VmMDBhNjY5OGFlMTVlNTMxIn0=', '2018-09-21 16:07:51', '2018-09-21 16:07:51', 1),
(31, 74, '$2y$10$bEJNa3vr1fh1eLOquSALQ.P/q0HaQdfu7qYhQQFRTrf1UXED4cI2e', 'eyJpdiI6IndcLzdUN1pwV2JVRkhZY3JsZDVlanRRPT0iLCJ2YWx1ZSI6IlJHRmxwVXhqUWdwbXdyZkNBMjV5RHI4TjNrN0ozRm5LZW02RDRsbndWZGFWamJ0cU9XVUlJRXA3a0taVnAwSzZjeURDRWtwWW5nSVJhOUZBQ0VsZGFXalNVTUFJRUF1WXNUOEpmUmc3WlJnPSIsIm1hYyI6IjI2OTBkYmFkZDQ5MGIxZDAzMjdmNWNmNTg4ZWRiOGY5YTQwNGUxMjVhYzJjNDdjZmI4YWExNzJiNGZhN2Q2NDQifQ==', '2018-09-21 16:19:51', '2018-09-21 16:34:26', 0),
(32, 75, '$2y$10$VHJ9z/7KZy4dfY1uN7Se4uxG7oEZ1d2KDnNPSUfsO0EcOFr8EEw.2', 'eyJpdiI6Imh5RGVXNGlhd0RiZG1cL3FwdkNFQmF3PT0iLCJ2YWx1ZSI6IlVjdld0b0JzN01QZDRjaFBMbkROMDZpdVp2STVWZUZqRVlUcmw4Z1BZVmNCdjBudVwvSE5RKzFmaTQwKzlQWStRMGViV1NCWmdNNEtZTkNtcE80eU1GWjhqOEJuS3BVa1JxU1wvalZ4QmxIV009IiwibWFjIjoiM2U1NzA3ZDkwMTZjYjBiZDE4NzBlNWYwNWU0MTQyZTBiYTA2N2JjYzRiYzEwNTkyNTk4NDBkODFmM2ZhMzliMiJ9', '2018-09-28 09:50:50', '2018-09-28 11:11:15', 0),
(33, 76, '$2y$10$umNtLR8h9oHCb7YWX698nubr5yDxNAX21n7ZAKzgv5Zjp8e44YVR6', 'eyJpdiI6IlB4OUU0SmJNaTBuZ3RxcDBWcEllUnc9PSIsInZhbHVlIjoiZlVucWNGVlRnbitKTFwvY1VwWVU0QWVoOWpiTE1BXC9nTTNkMktXcFA1eENjSldIckUyQmdpVGVMam5xdk0xRnl1QnFrcEN5MDV4WWxyYWdUNjNSWkZXZ09HQnI1Slk4ZlhSYmkrU1BVWkJ4dz0iLCJtYWMiOiIzNjE2MzBiNTk0NDg1OWZjMTI5YThhZDkwYWI1M2QyODM5ZmRjYjg2OTIzN2IwNThhZTI0MzM0ZGIzNTdmZTYxIn0=', '2018-09-28 09:53:21', '2018-09-28 09:53:21', 1),
(34, 77, '$2y$10$FiGBH4G.sODxmCozTsYXlO2mq29I311nMPmnZNLQZj8wWPIaJyZ9e', 'eyJpdiI6IjMyWjR6WlhBUVdjQTdSTW13YVBzNnc9PSIsInZhbHVlIjoicFdvNlpDU254ajJzNHI3OUVtUUZJXC9JN3lLV0ZVUU1Pc2NWbkNDTUZOMThcLzN4OWtuZG5sRldNdnZtaGRtYTZnc0h4dnlXZVJiOW5iaFFLTk5LcW5QNXpxM09qa3hsNXVYYlVVbnYzSDk4dz0iLCJtYWMiOiJlNGI3NmM3MGU4M2IwODNjZTFhYzUwMWVmOGRjZTIzNDkxM2RhMTc3Njg4NTQzYzJjMTg3MmUzMDZmZmFjYjAxIn0=', '2018-09-28 10:14:01', '2018-09-28 10:14:19', 0),
(35, 78, '$2y$10$i4NnyFJh9a1ip/Z0HqKftepc/bo.gETgkotX.viQhOO3eyrX9whJC', 'eyJpdiI6IlwvWHl2RDFmOHFVcFplZUZDQVJZUGh3PT0iLCJ2YWx1ZSI6Inl2QWozK1NMYWtmMkxsdlF4YnJEdGs3eXNQaVF0MDhhNHpFaWJseE5ZSzBCellwRWhnN2VSdXBYNnd0WXVJZTVXaUduS1FCdHNQd0ptZ3dMNlJwaWJtbGpMSFdyR2hzUmJqUThMREZMcHBFPSIsIm1hYyI6ImMwZDQ0YTRhZWEyNjM0YzA4YjBmYjhjZWMyODBhODg4YWU1MzBlYzc3Mzk2YzY0MjBlNmQzNzc4OTZhNjIxYjkifQ==', '2018-09-28 10:50:01', '2018-09-28 10:56:44', 0),
(36, 79, '$2y$10$AQ29uPio7hBiuIxdZgRYOO/cilLxjw.r75kHdLje7500ms/JSAbN2', 'eyJpdiI6IlFjN203bXA3REtrSEF6XC9hcXBpSVNBPT0iLCJ2YWx1ZSI6InlNeitQMzhLdVcyRExGUk5yTkFaam9WYkF2UGpZWVk5Z0c0WThGbVwvUThIM2VodEZNTDBNMWJGZno5eVN6SzB4Zkl4MWd0czZIYkxDRmN5SEtiWjlUZnR3dlVmZTNEQkE2XC8rb250UGpYRGM9IiwibWFjIjoiNWNmMTcxY2NkYzkzMGZmNDAyMGUwODUyNzEyZWYzMzIxMDA2ZjQxMTBkYmEzOTNkNWE3MDc3NGIxMzJkOWU1YSJ9', '2018-09-28 11:14:45', '2018-09-28 11:18:14', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_beds`
--

DROP TABLE IF EXISTS `fap_beds`;
CREATE TABLE IF NOT EXISTS `fap_beds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bed_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `location` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `icon` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `image_path` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_beds`
--

INSERT INTO `fap_beds` (`id`, `bed_id`, `location`, `icon`, `image_path`, `inserted_at`, `updated_at`, `status`) VALUES
(1, 'bunk_bed', 'bedroom', 'flaticon-bunk', 'images/beds/bunk_bed.png', '2018-08-09 09:52:30', '2018-10-26 10:28:20', 1),
(2, 'double_bed', 'bedroom', 'flaticon-single-bed', 'images/beds/double_bed.png', '2018-08-09 10:33:23', '2018-10-26 10:28:20', 1),
(3, 'single_bed', 'bedroom', 'flaticon-single-bed', 'images/beds/single_bed.png', '2018-08-09 10:33:38', '2018-10-26 10:28:20', 1),
(4, 'king_bed', 'bedroom', 'flaticon-king-size-bed-with-two-pillows', 'images/beds/king_bed.png', '2018-08-09 10:33:50', '2018-10-26 10:28:20', 1),
(5, 'sofa_bed', 'common_spaces', 'flaticon-sofa-2', NULL, '2018-10-26 10:28:20', '2018-10-26 10:28:20', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_beds_name`
--

DROP TABLE IF EXISTS `fap_beds_name`;
CREATE TABLE IF NOT EXISTS `fap_beds_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bed_id` int(11) DEFAULT NULL,
  `bed_name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_beds_name`
--

INSERT INTO `fap_beds_name` (`id`, `bed_id`, `bed_name`, `lang_id`, `inserted_at`, `updated_at`) VALUES
(1, 1, 'Bunk Bed', 1, '2018-08-09 09:53:06', '2018-08-09 09:53:06'),
(2, 2, 'Double Bed', 1, '2018-08-09 10:34:00', '2018-08-09 10:34:00'),
(3, 3, 'Single Bed', 1, '2018-08-09 10:34:09', '2018-08-09 10:34:09'),
(4, 4, 'King Bed', 1, '2018-08-09 10:34:16', '2018-08-09 10:34:17'),
(5, 5, 'Sofa Bed', 1, '2018-10-26 10:33:30', '2018-10-26 10:33:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_currency`
--

DROP TABLE IF EXISTS `fap_currency`;
CREATE TABLE IF NOT EXISTS `fap_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `currency_3` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `currency_symbol` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `inserted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_currency`
--

INSERT INTO `fap_currency` (`id`, `currency_name`, `currency_3`, `currency_symbol`, `inserted_at`, `updated_at`, `status`) VALUES
(1, 'Euro', 'EUR', '€', '2018-08-07 11:22:18', '2018-08-08 09:43:47', 1),
(2, 'Dollar', 'USD', '$', '2018-09-18 16:17:10', '2018-09-18 16:17:10', 1),
(3, 'Pound', 'GBP', '£', '2018-09-28 09:35:03', '2018-09-28 09:35:03', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_host_profile`
--

DROP TABLE IF EXISTS `fap_host_profile`;
CREATE TABLE IF NOT EXISTS `fap_host_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `club` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `clubs` longtext COLLATE utf8_bin,
  `other_clubs` tinyint(4) DEFAULT NULL,
  `languages` longtext COLLATE utf8_bin,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_host_profile`
--

INSERT INTO `fap_host_profile` (`id`, `user_id`, `first_name`, `last_name`, `description`, `club`, `clubs`, `other_clubs`, `languages`, `updated_at`, `created_at`, `status`) VALUES
(3, 71, 'Cesar Correia', NULL, '<option data-tokens=\"{{$club[\'league_native\']}}\" {{( in_array($c,json_decode($profile[\'content\'][\'data\'][\'clubs\'],true) ) ? \'selected\' :\'\')}}>{{$c}}</option>', 'FC Porto', '[\"FC Porto\",\"V. Set\\u00fabal\",\"Chaves\"]', 1, '[\"en\",\"fr\",\"pt\"]', '2018-10-31 10:36:37', '2018-10-30 17:12:55', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_houses`
--

DROP TABLE IF EXISTS `fap_houses`;
CREATE TABLE IF NOT EXISTS `fap_houses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `guest_nr` text COLLATE utf8_bin,
  `property_type_id` int(11) DEFAULT NULL,
  `stay_price_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `price` float DEFAULT NULL,
  `beds` longtext COLLATE utf8_bin,
  `available_days` longtext COLLATE utf8_bin,
  `transport_provider` tinyint(4) DEFAULT NULL,
  `meals` longtext COLLATE utf8_bin,
  `night_fun` longtext COLLATE utf8_bin,
  `airport_pickup` longtext COLLATE utf8_bin,
  `visits` longtext COLLATE utf8_bin,
  `rates` longtext COLLATE utf8_bin,
  `commodities` longtext COLLATE utf8_bin,
  `installations` longtext COLLATE utf8_bin,
  `rules` longtext COLLATE utf8_bin,
  `currency_id` int(11) DEFAULT NULL,
  `form_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `form_id_UNIQUE` (`form_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_houses`
--

INSERT INTO `fap_houses` (`id`, `user_id`, `name`, `location`, `guest_nr`, `property_type_id`, `stay_price_type`, `price`, `beds`, `available_days`, `transport_provider`, `meals`, `night_fun`, `airport_pickup`, `visits`, `rates`, `commodities`, `installations`, `rules`, `currency_id`, `form_id`, `created_at`, `updated_at`, `slug`, `status`) VALUES
(44, 71, 'Rua das Searas 186 R/C Esq. Post', '4410-254', '3', 21, 'price_night', 33, '[\"double_bed\"]', '[\"2019-01-03 to 2019-01-17\"]', 1, '{\"meal_q\":\"on\",\"meal_pq\":\"on\",\"meal_price\":45}', '{\"night_q\":false}', '{\"pickup_q\":false}', '{\"visits_q\":false}', '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', '[\"kitchen\",\"washing_machine\"]', '[\"gym\"]', 'null', 1, '98f8ff6cf388128537b404f5345b820a', '2018-10-18 14:11:38', '2018-10-18 14:11:38', '5-rua-das-searas-186-rc-esq-post', 0),
(42, 71, 'ORGA', 'Porto, Portugal', '5', 21, 'price_night', 88, '[\"double_bed\"]', '\"2018-10-16, 2018-10-17, 2018-10-19, 2018-10-20, 2018-10-24, 2018-10-23, 2018-10-22\"', 1, '{\"meals_q\":\"on\",\"meals_qp\":false}', '{\"night_q\":false}', '{\"pickup_q\":false}', '{\"visits_q\":\"on\",\"visits_qp\":false}', '{\"rate_q\":\"standard_rate\",\"rates_code\":\"BG\"}', '[\"kitchen\",\"toilet\",\"washing_machine\",\"central_heat\",\"intercomunicator\",\"door_man\",\"iron\",\"wifi\",\"blow_dryer\",\"working_desk\"]', '[\"parking\",\"jacuzzi\"]', '[\"no-smoking\",\"no-parties\"]', 2, '06a1c70cd34c4f880bf9d2c078c18fac', '2018-10-03 14:47:03', '2018-10-03 15:47:44', '19-orga', 1),
(43, 71, 'Johny Tell', 'Madrid, Spain', '5', 22, 'price_night', 33, '[\"single_bed\",\"king_bed\"]', '\"2018-10-01 to 2018-10-30\"', 1, '{\"meal_q\":\"on\",\"meal_pq\":\"on\",\"meal_price\":10}', '{\"night_q\":false}', '{\"pickup_q\":false}', '{\"visits_q\":\"on\",\"visits_pq\":\"on\",\"visits_price\":44}', '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', '[\"kitchen\",\"toilet\",\"washing_machine\",\"intercomunicator\",\"door_man\",\"iron\",\"wifi\",\"cable_tv\",\"auto_check\",\"smoke_detector\"]', '[\"parking\",\"gym\",\"jacuzzi\",\"pool\"]', '[\"no-parties\",\"no-smoking\"]', 1, '73a5650df76975c22fe51caaffbb6172', '2018-10-04 11:03:19', '2018-10-04 12:03:40', '17-johny-tell', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_houses_to_approve`
--

DROP TABLE IF EXISTS `fap_houses_to_approve`;
CREATE TABLE IF NOT EXISTS `fap_houses_to_approve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_house` int(11) DEFAULT NULL,
  `house_status` int(11) DEFAULT '0',
  `user_id_approval` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_houses_to_approve`
--

INSERT INTO `fap_houses_to_approve` (`id`, `id_house`, `house_status`, `user_id_approval`, `updated_at`, `created_at`, `status`) VALUES
(23, 40, 0, NULL, '2018-10-03 13:56:13', '2018-10-03 13:56:13', 1),
(22, 39, 0, NULL, '2018-10-03 13:53:40', '2018-10-03 13:53:40', 1),
(21, 38, 0, NULL, '2018-10-03 09:56:40', '2018-10-03 09:56:40', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_house_properties`
--

DROP TABLE IF EXISTS `fap_house_properties`;
CREATE TABLE IF NOT EXISTS `fap_house_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house_commodity` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `font_icon` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_house_properties`
--

INSERT INTO `fap_house_properties` (`id`, `house_commodity`, `font_icon`, `type_id`, `created_at`, `updated_at`, `status`) VALUES
(2, 'kitchen', 'flaticon-kitchen', 1, '2018-08-10 12:00:13', '2018-10-03 11:49:45', 1),
(3, 'toilet', 'flaticon-bathtub', 1, '2018-08-10 12:00:13', '2018-10-03 11:49:45', 1),
(4, 'washing_machine', 'flaticon-washing-machine', 1, '2018-08-10 12:00:13', '2018-10-03 11:49:45', 1),
(5, 'central_heat', 'flaticon-heater', 1, '2018-08-10 12:00:13', '2018-10-03 11:49:45', 1),
(6, 'intercomunicator', NULL, 1, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(7, 'door_man', NULL, 1, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(8, 'iron', NULL, 1, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(9, 'wifi', NULL, 1, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(10, 'blow_dryer', NULL, 1, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(11, 'working_desk', NULL, 1, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(12, 'cable_tv', NULL, 1, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(13, 'crib', NULL, 1, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(14, 'auto_check', NULL, 1, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(15, 'smoke_detector', NULL, 1, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(16, 'carbon_monoxide_detector', NULL, 1, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(17, 'parking', NULL, 2, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(18, 'gym', NULL, 2, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(19, 'jacuzzi', NULL, 2, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(20, 'pool', NULL, 2, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(21, 'home', NULL, 3, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(22, 'apartment', NULL, 3, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(23, 'hotel_boutique', NULL, 3, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(24, 'bungalow', NULL, 3, '2018-08-10 12:00:13', '2018-08-17 13:58:22', 1),
(25, 'hostel', NULL, 3, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(26, 'hotel', NULL, 3, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(27, 'loft', NULL, 3, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(28, 'resort', NULL, 3, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(29, 'villa', NULL, 3, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1),
(58, 'Bedroom', 'flaticon-room', 4, '2018-10-26 15:37:42', '2018-10-26 15:38:48', 1),
(59, 'Common Spaces', 'flaticon-sofa', 4, '2018-10-26 15:37:42', '2018-10-26 15:38:48', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_house_properties_names`
--

DROP TABLE IF EXISTS `fap_house_properties_names`;
CREATE TABLE IF NOT EXISTS `fap_house_properties_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_house_properties_names`
--

INSERT INTO `fap_house_properties_names` (`id`, `name`, `property_id`, `lang_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Washing Machine', 4, 1, '2018-08-13 16:28:43', '2018-08-17 11:40:27', 1),
(2, 'Kitchen', 2, 1, '2018-08-16 17:07:00', '2018-08-16 17:07:00', 1),
(3, 'Toilet', 3, 1, '2018-08-17 11:40:27', '2018-08-17 11:40:27', 1),
(4, 'Central Heating', 5, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(5, 'Intercomunicator', 6, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(6, 'Door Man', 7, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(7, 'Iron', 8, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(8, 'Wifi', 9, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(9, 'Hair Dryer', 10, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(10, 'Work Desk', 11, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(11, 'Cable TV', 12, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(12, 'Crib', 13, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(13, 'Auto Checkin', 14, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(14, 'Smoke Detector', 15, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(15, 'Carbon Monoxide Detector', 16, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(16, 'Parking', 17, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(17, 'Gym', 18, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(18, 'Jacuzzi', 19, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(19, 'Pool', 20, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(20, 'Home', 21, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(21, 'Apartment', 22, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(22, 'Hotel Boutique', 23, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(23, 'Bungalow', 24, 1, '2018-08-17 11:46:05', '2018-08-17 13:58:26', 1),
(24, 'Hostel', 25, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(25, 'Hotel', 26, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(26, 'Loft', 27, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(27, 'Resort', 28, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(28, 'Villa', 29, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_house_properties_types`
--

DROP TABLE IF EXISTS `fap_house_properties_types`;
CREATE TABLE IF NOT EXISTS `fap_house_properties_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_type` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `icon` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_house_properties_types`
--

INSERT INTO `fap_house_properties_types` (`id`, `property_type`, `type`, `icon`, `created_at`, `updated_at`, `status`) VALUES
(1, 'commodity', 1, 'fas fa-couch', '2018-08-10 13:23:34', '2018-08-17 14:09:11', 1),
(2, 'installations', 1, 'fas fa-swimming-pool', '2018-08-10 13:23:34', '2018-08-17 14:09:11', 1),
(3, 'house_type', 2, 'fas fa-home', '2018-08-10 13:23:34', '2018-08-17 14:09:11', 1),
(4, 'division', 3, NULL, '2018-10-26 09:45:58', '2018-10-26 09:46:13', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_house_properties_type_names`
--

DROP TABLE IF EXISTS `fap_house_properties_type_names`;
CREATE TABLE IF NOT EXISTS `fap_house_properties_type_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_house_properties_type_names`
--

INSERT INTO `fap_house_properties_type_names` (`id`, `name`, `lang_id`, `type_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Commodity', 1, 1, '2018-08-10 15:11:01', '2018-08-10 15:12:33', 1),
(2, 'Property', 1, 2, '2018-08-10 15:11:01', '2018-08-10 15:12:33', 1),
(3, 'House Type', 1, 3, '2018-08-10 15:11:01', '2018-08-10 15:12:33', 1),
(4, 'Divisions', 1, 4, '2018-10-26 15:35:14', '2018-10-26 15:35:14', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_house_rules`
--

DROP TABLE IF EXISTS `fap_house_rules`;
CREATE TABLE IF NOT EXISTS `fap_house_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `inserted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_house_rules`
--

INSERT INTO `fap_house_rules` (`id`, `status`, `updated_at`, `inserted_at`) VALUES
(1, 1, '2018-08-31 09:50:11', '2018-08-31 09:50:11'),
(2, 1, '2018-08-31 09:50:11', '2018-08-31 09:50:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_house_rules_names`
--

DROP TABLE IF EXISTS `fap_house_rules_names`;
CREATE TABLE IF NOT EXISTS `fap_house_rules_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `rule_id` int(11) DEFAULT NULL,
  `lang` int(11) DEFAULT '1',
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_house_rules_names`
--

INSERT INTO `fap_house_rules_names` (`id`, `name`, `rule_id`, `lang`, `slug`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Smoking is prohibited', 1, 1, 'no-smoking', 1, '2018-08-31 09:49:49', '2018-08-31 09:49:33'),
(2, 'House parties are not allowed', 2, 1, 'no-parties', 1, '2018-08-31 09:49:33', '2018-08-31 09:49:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_languages`
--

DROP TABLE IF EXISTS `fap_languages`;
CREATE TABLE IF NOT EXISTS `fap_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(150) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `language_2` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_languages`
--

INSERT INTO `fap_languages` (`id`, `language_name`, `language_2`, `inserted_at`, `updated_at`, `status`) VALUES
(1, 'English', 'en', '2018-08-07 09:22:51', '2018-08-07 09:22:51', 1),
(2, 'Portuguese', 'pt', '2018-08-07 09:22:51', '2018-08-07 09:22:51', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_leagues_clubs`
--

DROP TABLE IF EXISTS `fap_leagues_clubs`;
CREATE TABLE IF NOT EXISTS `fap_leagues_clubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `league_native` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `club_league` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `clubs` longtext COLLATE utf8_bin,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_leagues_clubs`
--

INSERT INTO `fap_leagues_clubs` (`id`, `league_native`, `club_league`, `clubs`, `updated_at`, `created_at`, `status`) VALUES
(2, 'Liga NOS', 'liga_nos', '[\"FC Porto\",\"Braga\",\"Benfica\",\"Rio Ave\",\"Sporting\",\"Santa Clara\",\"V. Set\\u00fabal\",\"V.Guimar\\u00e3es\",\"Moreirense\",\"Belenenses\",\"SAD Mar\\u00edtimo\",\"Portimonense\",\"Feirense\",\"Chaves\",\"Boavista\",\"Tondela\",\"Nacional\",\"Desp. Aves\"]', '2018-10-30 09:48:53', '2018-10-29 18:29:52', 1),
(3, 'Premier League', 'premier_league', '[\"Arsenal\",\"Bournemouth\",\"Brighton\",\"Burnley\",\"Cardiff\",\"Chelsea\",\"Crystal Palace\",\"Everton\",\"Fulham\",\"Huddersfield\",\"Leicester\",\"Liverpool\",\"Manchester City\",\"Manchester Utd\",\"Newcastle\",\"Southampton\",\"Tottenham\",\"Watford\",\"West Ham\",\"Wolves\"]', '2018-10-30 10:52:34', '2018-10-30 10:52:34', 1),
(4, 'Ligue 1', 'ligue_1', '[\"Amiens\",\"Angers\",\"Bordeaux\",\"Caen\",\"Dijon\",\"Guingamp\",\"Lille\",\"Lyon\",\"Marseille\",\"Monaco\",\"Montpellier\",\"Nantes\",\"Nice\",\"Nimes\",\"PSG\",\"Reims\",\"Rennes\",\"St. Etienne\",\"Strasbourg\",\"Toulouse\"]', '2018-10-30 10:54:02', '2018-10-30 10:54:02', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_media`
--

DROP TABLE IF EXISTS `fap_media`;
CREATE TABLE IF NOT EXISTS `fap_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `base_path` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `mime` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `created_at` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `updated_at` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `user_uploader_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_media`
--

INSERT INTO `fap_media` (`id`, `name`, `slug`, `base_path`, `mime`, `created_at`, `updated_at`, `status`, `user_uploader_id`) VALUES
(62, 'f9d2c9fee61c5d641532370978a4d9c4.png', 'f9d2c9fee61c5d641532370978a4d9c4-png', 'images/profiles/f9d2c9fee61c5d641532370978a4d9c4.png', 'image/png', '2018-10-18 10:50:03', '2018-10-18 10:50:03', 1, 71),
(63, 'Folha1.jpg', 'folha1-jpg', 'images/profiles/Folha1.jpg', 'image/jpeg', '2018-10-18 10:52:21', '2018-10-18 10:52:21', 1, 71),
(61, 'amazing_mountain_milky_way_by_yakub_nihat-wallpaper-1366x768.jpg', 'amazing-mountain-milky-way-by-yakub-nihat-wallpaper-1366x768-jpg', 'images/profiles/amazing_mountain_milky_way_by_yakub_nihat-wallpaper-1366x768.jpg', 'image/jpeg', '2018-10-18 10:48:42', '2018-10-18 10:48:42', 1, 71),
(57, 'amazing_mountain_milky_way_by_yakub_nihat-wallpaper-1366x768.jpg', 'amazing-mountain-milky-way-by-yakub-nihat-wallpaper-1366x768-jpg', 'images/profiles/amazing_mountain_milky_way_by_yakub_nihat-wallpaper-1366x768.jpg', 'image/jpeg', '2018-10-18 10:41:45', '2018-10-18 10:41:45', 1, 71),
(58, 'f9d2c9fee61c5d641532370978a4d9c4.png', 'f9d2c9fee61c5d641532370978a4d9c4-png', 'images/profiles/f9d2c9fee61c5d641532370978a4d9c4.png', 'image/png', '2018-10-18 10:42:23', '2018-10-18 10:42:23', 1, 71),
(59, 'Folha1.html.jpg', 'folha1-html-jpg', 'images/profiles/Folha1.html.jpg', 'image/jpeg', '2018-10-18 10:45:55', '2018-10-18 10:45:55', 1, 71),
(60, 'profile-a.png', 'profile-a-png', 'images/profiles/profile-a.png', 'image/png', '2018-10-18 10:47:01', '2018-10-18 10:47:01', 1, 71),
(55, 'Semtítulo.png', 'semtitulo-png', 'images/profiles/Semtítulo.png', 'image/png', '2018-10-18 10:29:49', '2018-10-18 10:29:49', 1, 71),
(56, '43586928_1873250939459216_2057449751812505600_n.jpg', '43586928-1873250939459216-2057449751812505600-n-jpg', 'images/profiles/43586928_1873250939459216_2057449751812505600_n.jpg', 'image/jpeg', '2018-10-18 10:30:25', '2018-10-18 10:30:25', 1, 71),
(64, 'Folha1.html.jpg', 'folha1-html-jpg', 'images/profiles/Folha1.html.jpg', 'image/jpeg', '2018-10-18 10:53:06', '2018-10-18 10:53:06', 1, 71),
(65, 'index.jpg', 'index-jpg', 'images/profiles/index.jpg', 'image/jpeg', '2018-10-18 10:53:14', '2018-10-18 10:53:14', 1, 71),
(66, 'ISO45001_2018.png', 'iso45001-2018-png', 'images/profiles/ISO45001_2018.png', 'image/png', '2018-10-18 10:53:59', '2018-10-18 10:53:59', 1, 71),
(67, 'ISO45001_2018_3-Copy.png', 'iso45001-2018-3-copy-png', 'images/profiles/ISO45001_2018_3-Copy.png', 'image/png', '2018-10-18 10:55:08', '2018-10-18 10:55:08', 1, 71),
(68, 'teste.png', 'teste-png', 'images/profiles/teste.png', 'image/png', '2018-10-18 10:55:46', '2018-10-18 10:55:46', 1, 71);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_media_houses`
--

DROP TABLE IF EXISTS `fap_media_houses`;
CREATE TABLE IF NOT EXISTS `fap_media_houses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_house` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `base_path` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `mime` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `created_at` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `updated_at` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `user_uploader_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_media_houses`
--

INSERT INTO `fap_media_houses` (`id`, `name`, `id_house`, `slug`, `base_path`, `mime`, `created_at`, `updated_at`, `status`, `user_uploader_id`) VALUES
(30, 'index.jpg', '73a5650df76975c22fe51caaffbb6172', 'index-jpg', 'images/houses/73a5650df76975c22fe51caaffbb6172-index.jpg', 'image/jpeg', '2018-10-04 12:03:00', '2018-10-04 12:03:00', 1, 71),
(29, 'teste-Copy.png', '06a1c70cd34c4f880bf9d2c078c18fac', 'teste-copy-png', 'images/houses/06a1c70cd34c4f880bf9d2c078c18fac-teste-Copy.png', 'image/png', '2018-10-03 15:47:13', '2018-10-03 15:47:13', 1, 71),
(28, 'Store__1_-1.jpg', '3deb6e1b2beaac7c4f33e5d79ea38130', 'store-1-1-jpg', 'images/houses/3deb6e1b2beaac7c4f33e5d79ea38130-Store__1_-1.jpg', 'image/jpeg', '2018-09-17 16:05:28', '2018-09-17 16:05:28', 1, 71),
(27, 'maxresdefault.jpg', '3deb6e1b2beaac7c4f33e5d79ea38130', 'maxresdefault-jpg', 'images/houses/3deb6e1b2beaac7c4f33e5d79ea38130-maxresdefault.jpg', 'image/jpeg', '2018-09-17 16:05:27', '2018-09-17 16:05:27', 1, 71),
(26, 'download.jpg', '3deb6e1b2beaac7c4f33e5d79ea38130', 'download-jpg', 'images/houses/3deb6e1b2beaac7c4f33e5d79ea38130-download.jpg', 'image/jpeg', '2018-09-17 16:05:27', '2018-09-17 16:05:27', 1, 71),
(24, 'Semtítulo.png', 'ccea8c9aa893c1ee8954c1bbc1169e45', 'semtitulo-png', 'images/houses/ccea8c9aa893c1ee8954c1bbc1169e45-Semtítulo.png', 'image/png', '2018-09-17 15:45:13', '2018-09-17 15:45:13', 1, 71),
(25, 'Untitled.png', 'ccea8c9aa893c1ee8954c1bbc1169e45', 'untitled-png', 'images/houses/ccea8c9aa893c1ee8954c1bbc1169e45-Untitled.png', 'image/png', '2018-09-17 15:45:53', '2018-09-17 15:45:53', 1, 71),
(23, 'ISO45001_2018_3-Copy.png', 'ccea8c9aa893c1ee8954c1bbc1169e45', 'iso45001-2018-3-copy-png', 'images/houses/ccea8c9aa893c1ee8954c1bbc1169e45-ISO45001_2018_3-Copy.png', 'image/png', '2018-09-17 15:44:46', '2018-09-17 15:44:46', 1, 71),
(22, 'teste.png', '64390e8bd1dababaf299431034d55a3d', 'teste-png', 'images/houses/64390e8bd1dababaf299431034d55a3d-teste.png', 'image/png', '2018-09-17 14:57:31', '2018-09-17 14:57:31', 1, 71),
(21, 'index.jpg', '64390e8bd1dababaf299431034d55a3d', 'index-jpg', 'images/houses/64390e8bd1dababaf299431034d55a3d-index.jpg', 'image/jpeg', '2018-09-17 14:57:31', '2018-09-17 14:57:31', 1, 71);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_media_profile`
--

DROP TABLE IF EXISTS `fap_media_profile`;
CREATE TABLE IF NOT EXISTS `fap_media_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_media_profile`
--

INSERT INTO `fap_media_profile` (`id`, `media_id`, `user_id`, `updated_at`, `created_at`, `status`) VALUES
(15, 68, 71, '2018-10-18 09:55:46', '2018-10-18 10:29:49', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_users`
--

DROP TABLE IF EXISTS `fap_users`;
CREATE TABLE IF NOT EXISTS `fap_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_bin NOT NULL,
  `username` varchar(250) COLLATE utf8_bin NOT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `language` int(11) NOT NULL DEFAULT '1',
  `is_host` int(11) DEFAULT '0',
  `remember_token` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `privacy_policy` int(11) DEFAULT NULL,
  `terms_of_service` int(11) DEFAULT NULL,
  `marketing` int(11) DEFAULT NULL,
  `first_setup` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_users`
--

INSERT INTO `fap_users` (`id`, `name`, `username`, `email`, `password`, `language`, `is_host`, `remember_token`, `inserted_at`, `updated_at`, `status`, `privacy_policy`, `terms_of_service`, `marketing`, `first_setup`) VALUES
(73, 'cesar', 'usr1', 'usr1@gmail.com', '$2y$16$sIN7Gkwn7AoszNRTeHCwFurqTudMcDjkvKEuyzhQQ2t5qluw9Z46.', 1, 0, NULL, '2018-09-21 16:07:51', '2018-09-21 17:29:14', 0, NULL, NULL, NULL, 0),
(71, 'cesar', 'cesar', 'cesardcorreia.wcy@gmail.com', '$2y$16$LvkPLXvtCvHDes39pxOrUeJ7NDktMHZfw/HAe5i0p3nhoZuW6oZDG', 1, 1, '0AtKHBFCVpk2lteVXRUWesrgnsz3UQExTqI1zwpi1K7IGybcCUZzS3krxX86', '2018-07-02 17:23:08', '2018-10-03 09:11:30', 1, NULL, NULL, NULL, 0),
(72, 'Diogo', 'diogo', 'diogo.ferreira@wecreateyou.biz', '$2y$16$oXwAD6aScKLrpsb2XNc0XOoGyl6hnaJub81sGT0DZqdMSmCCxk1Ye', 1, 0, NULL, '2018-08-10 13:48:22', '2018-08-10 13:50:20', 1, NULL, NULL, NULL, 0),
(74, 'cesar', 'usr2', 'usr2@gmail.com', '$2y$16$ATaxZrxXCLze4kJ7oFu7QuIW.2UAxM2kcImF/A/3gdkb227toWHUG', 1, 0, NULL, '2018-09-21 16:19:51', '2018-09-21 17:28:33', 1, NULL, NULL, NULL, 0),
(75, 'cesar', 'qwert', 'test@mail.com', '$2y$16$b.az.Jk4MsUWYkKI1QupdubAe9hxf1zH29gDGFaxwRB54E2koy9AC', 1, 0, NULL, '2018-09-28 09:50:49', '2018-09-28 11:11:15', 1, 1, 1, 1, 0),
(76, 'cesar', 'cesar2', 'my@mail.com', '$2y$16$FyRtLV2Dpwzf2o.NwP6pv.Jxb1Xhf1Q2jNcYLiRNCiwtRkNRakn1y', 1, 0, NULL, '2018-09-28 09:53:21', '2018-09-28 09:53:21', 0, 1, 1, 1, 0),
(77, 'cesar', 'cesar3', 'newmail@mail.com', '$2y$16$QFyhd5PM12YPydYCw5fD8OgVz3TrlTLNy/y6IjHLdbF266xxV4lTe', 1, 0, NULL, '2018-09-28 10:14:01', '2018-09-28 10:14:19', 1, 1, 1, 1, 0),
(78, 'cesar', 'mamow', 'mamail@mail.com', '$2y$16$4UjqYQsTgnXKkxVxI.8oxuJ9zBP8WK4cJd9U/Sej/nn7zZ./fT5L.', 1, 0, NULL, '2018-09-28 10:50:01', '2018-09-28 10:56:44', 1, 1, 1, 1, 0),
(79, 'cesar', 'pop', 'pop@m.c', '$2y$16$NJSEvZ.VmFu041hSN57wFOPlY1Aum6O4xRxjsXQRBH4Lmb4WVrNXi', 1, 0, 'AD87LsANpoYExfflpLFZEDSR5rcTCYLDOKX1FqZ3GJvtxqwdgxT11QaRceWy', '2018-09-28 11:14:45', '2018-10-01 16:38:50', 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_users_currency_lang`
--

DROP TABLE IF EXISTS `fap_users_currency_lang`;
CREATE TABLE IF NOT EXISTS `fap_users_currency_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT '1',
  `language_id` int(11) DEFAULT '1',
  `insert_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_users_currency_lang`
--

INSERT INTO `fap_users_currency_lang` (`id`, `user_id`, `currency_id`, `language_id`, `insert_at`, `updated_at`) VALUES
(1, 71, 1, 1, '2018-08-07 10:17:01', '2018-10-04 10:55:00'),
(2, 74, 2, 1, '2018-09-21 17:27:22', '2018-09-21 17:27:22'),
(3, 79, 1, 1, '2018-09-28 14:16:28', '2018-09-28 14:16:28'),
(4, 78, 1, 1, '2018-09-28 14:20:43', '2018-09-28 13:21:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_users_profile`
--

DROP TABLE IF EXISTS `fap_users_profile`;
CREATE TABLE IF NOT EXISTS `fap_users_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `gender` int(11) NOT NULL DEFAULT '0',
  `languages` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `foto_path` varchar(250) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `contact` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `country` int(10) UNSIGNED DEFAULT NULL,
  `city` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `settings` longtext COLLATE utf8_bin,
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_users_profile`
--

INSERT INTO `fap_users_profile` (`id`, `first_name`, `last_name`, `description`, `gender`, `languages`, `dob`, `foto_path`, `contact`, `country`, `city`, `email`, `settings`, `inserted_at`, `updated_at`, `userid`, `status`) VALUES
(4, 'Cesar', 'Correia', 'A minha descrição.', 3, '[\"en\",\"pt\",\"es\"]', '1997-09-25', '0', '1 524 892 862', 172, 'Some Where', 'teste@gmail.com', NULL, '2018-07-13 10:17:19', '2018-10-30 17:32:15', 71, 1),
(5, 'Nome', 'Teste', 'My name is Nome', 1, NULL, NULL, '0', NULL, 172, NULL, NULL, NULL, '2018-10-02 09:05:33', '2018-10-02 09:08:49', 78, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

DROP TABLE IF EXISTS `teste`;
CREATE TABLE IF NOT EXISTS `teste` (
  `Column 1` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Column 2` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
