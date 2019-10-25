-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 04-Jan-2019 às 12:43
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
-- Estrutura da tabela `fap_checkout_processes`
--

DROP TABLE IF EXISTS `fap_checkout_processes`;
CREATE TABLE IF NOT EXISTS `fap_checkout_processes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `house_id` int(11) DEFAULT NULL,
  `guest_nr` int(11) DEFAULT NULL,
  `guests_info` longtext COLLATE utf8_bin,
  `user_address_id` int(11) DEFAULT NULL,
  `checkout_status` int(11) DEFAULT NULL,
  `visits` longtext COLLATE utf8_bin,
  `night_activities` longtext COLLATE utf8_bin,
  `airport_transport` longtext COLLATE utf8_bin,
  `transport` longtext COLLATE utf8_bin,
  `meals` longtext COLLATE utf8_bin,
  `rates` text COLLATE utf8_bin,
  `price` float DEFAULT NULL,
  `cleaning_fee` float DEFAULT NULL,
  `currency` int(11) DEFAULT NULL,
  `checkout_id` text COLLATE utf8_bin,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=337 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_checkout_processes`
--

INSERT INTO `fap_checkout_processes` (`id`, `user_id`, `house_id`, `guest_nr`, `guests_info`, `user_address_id`, `checkout_status`, `visits`, `night_activities`, `airport_transport`, `transport`, `meals`, `rates`, `price`, `cleaning_fee`, `currency`, `checkout_id`, `check_in`, `check_out`, `created_at`, `updated_at`, `status`) VALUES
(328, 71, 57, 2, NULL, NULL, 1, '{\"status\":true,\"callback\":\"App\\\\Http\\\\Controllers\\\\Houses\\\\HouseController::get_house_visit_price\",\"price\":5}', NULL, NULL, NULL, NULL, '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', 5, 25, 1, '3E61-A581-D100', '2018-12-28', '2018-12-29', '2018-12-28 15:05:15', '2018-12-28 15:05:15', 1),
(329, 71, 57, 2, NULL, NULL, 1, '{\"status\":true,\"callback\":\"App\\\\Http\\\\Controllers\\\\Houses\\\\HouseController::get_house_visit_price\",\"price\":5}', NULL, NULL, NULL, NULL, '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', 5, 25, 1, '52E7-7455-94C5', '2018-12-28', '2018-12-29', '2018-12-28 15:05:24', '2018-12-28 15:05:24', 1),
(330, 71, 57, 2, NULL, NULL, 1, '{\"status\":true,\"callback\":\"App\\\\Http\\\\Controllers\\\\Houses\\\\HouseController::get_house_visit_price\",\"price\":5}', NULL, NULL, NULL, NULL, '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', 5, 25, 1, 'C767-E772-CF36', '2018-12-28', '2018-12-29', '2018-12-28 15:07:10', '2018-12-28 15:07:10', 1),
(331, 71, 57, 5, '{\"first_name_captain\":null,\"last_name_captain\":null,\"country_captain\":null,\"first_name_guests\":{\"1\":\"Cesar\",\"2\":\"Cesar\",\"3\":\"Cesar\",\"4\":\"cesar\"},\"last_name_guests\":{\"1\":\"Correia\",\"2\":\"Correia\",\"3\":\"Correia\",\"4\":\"correia\"},\"country_guests\":{\"1\":\"Portugal\",\"2\":\"Portugal\",\"3\":\"Portugal\",\"4\":\"Portugal\"},\"email_guests\":{\"1\":\"alyatek@gmail.com\",\"2\":\"alyatek@gmail.com\",\"3\":\"alyatek@gmail.com\",\"4\":\"cesardcorreia.wcy@gmail.com\"}}', NULL, 1, '{\"status\":true,\"callback\":\"App\\\\Http\\\\Controllers\\\\Houses\\\\HouseController::get_house_visit_price\",\"price\":5}', NULL, NULL, NULL, NULL, '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', 5, 25, 1, '3DA6-64D4-2A2A', '2018-12-28', '2018-12-29', '2018-12-28 15:07:20', '2018-12-28 15:07:34', 1),
(332, 71, 57, 5, NULL, NULL, 1, '{\"status\":true,\"callback\":\"App\\\\Http\\\\Controllers\\\\Houses\\\\HouseController::get_house_visit_price\",\"price\":5}', NULL, NULL, NULL, NULL, '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', 5, 25, 1, '06AC-AF3F-3095', '2018-12-28', '2018-12-29', '2018-12-28 15:09:15', '2018-12-28 15:09:15', 1),
(333, 71, 57, 5, '{\"first_name_captain\":\"Cesar\",\"last_name_captain\":\"Correia\",\"country_captain\":\"Portugal\",\"first_name_guests\":{\"1\":\"cesar\",\"2\":\"Cesar\",\"3\":\"cesar\",\"4\":\"cesar\"},\"last_name_guests\":{\"1\":\"correia\",\"2\":\"Correia\",\"3\":\"correia\",\"4\":\"correia\"},\"country_guests\":{\"1\":\"Portugal\",\"2\":\"Portugal\",\"3\":\"Portugal\",\"4\":\"Portugal\"},\"email_guests\":{\"1\":\"cesardcorreia.wcy@gmail.com\",\"2\":\"suporte.cliente04@wecreateyou.biz\",\"3\":\"cesardcorreia.wcy@gmail.com\",\"4\":\"cesardcorreia.wcy@gmail.com\"}}', NULL, 1, '{\"status\":true,\"callback\":\"App\\\\Http\\\\Controllers\\\\Houses\\\\HouseController::get_house_visit_price\",\"price\":5}', NULL, NULL, NULL, NULL, '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', 5, 25, 1, '89A5-99FC-6713', '2018-12-28', '2018-12-29', '2018-12-28 15:25:28', '2018-12-28 15:25:44', 1),
(334, 71, 57, 5, NULL, NULL, 1, '{\"status\":true,\"callback\":\"App\\\\Http\\\\Controllers\\\\Houses\\\\HouseController::get_house_visit_price\",\"price\":5}', NULL, NULL, NULL, NULL, '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', 5, 25, 1, '6CAF-FFFA-1673', '2018-12-28', '2018-12-29', '2018-12-28 15:26:01', '2018-12-28 15:26:01', 1),
(335, 71, 57, 2, '{\"first_name_captain\":\"Cesar\",\"last_name_captain\":\"Correia\",\"country_captain\":\"Portugal\",\"first_name_guests\":{\"1\":\"cesar\"},\"last_name_guests\":{\"1\":\"correia\"},\"country_guests\":{\"1\":\"Portugal\"},\"email_guests\":{\"1\":\"cesardcorreia.wcy@gmail.com\"}}', NULL, 1, NULL, '{\"status\":true,\"callback\":\"App\\\\Http\\\\Controllers\\\\Houses\\\\HouseController::get_house_night_fun_price\",\"price\":5}', NULL, NULL, NULL, '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', 5, 25, 1, '8063-51C5-8BF4', '2018-12-28', '2018-12-30', '2018-12-28 16:45:05', '2018-12-28 16:45:37', 1),
(336, 71, 56, 2, '{\"first_name_captain\":\"Cesar\",\"last_name_captain\":\"Correia\",\"country_captain\":\"Portugal\",\"first_name_guests\":{\"1\":\"Cesar\"},\"last_name_guests\":{\"1\":\"Correia\"},\"country_guests\":{\"1\":\"Portugal\"},\"email_guests\":{\"1\":\"alyatek@gmail.com\"}}', NULL, 1, NULL, NULL, NULL, NULL, '{\"status\":true,\"callback\":\"App\\\\Http\\\\Controllers\\\\Houses\\\\HouseController::get_house_meals_price\",\"price\":9}', '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', 10, 25, 1, '3CA7-A011-7FC6', '2019-03-04', '2019-03-12', '2018-12-28 17:29:39', '2018-12-28 17:30:08', 1),
(326, 71, 57, 2, NULL, NULL, 1, '{\"status\":true,\"callback\":\"App\\\\Http\\\\Controllers\\\\Houses\\\\HouseController::get_house_visit_price\",\"price\":5}', NULL, NULL, NULL, NULL, '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', 5, 25, 1, '6442-13E4-5155', '2018-12-28', '2018-12-29', '2018-12-28 15:04:27', '2018-12-28 15:04:27', 1),
(327, 71, 57, 2, NULL, NULL, 1, '{\"status\":true,\"callback\":\"App\\\\Http\\\\Controllers\\\\Houses\\\\HouseController::get_house_visit_price\",\"price\":5}', NULL, NULL, NULL, NULL, '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', 5, 25, 1, 'BC0E-A925-E566', '2018-12-28', '2018-12-29', '2018-12-28 15:04:27', '2018-12-28 15:04:27', 1);

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
  `description` longtext COLLATE utf8_bin,
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
(3, 71, 'Cesar Correia', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'FC Porto', '[\"FC Porto\",\"V. Set\\u00fabal\",\"Chaves\"]', 1, '[\"en\",\"fr\",\"pt\"]', '2018-11-09 18:43:18', '2018-10-30 17:12:55', 1);

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
  `description` longtext COLLATE utf8_bin,
  `property_type_id` int(11) DEFAULT NULL,
  `stay_price_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `price` float DEFAULT NULL,
  `beds` longtext COLLATE utf8_bin,
  `available_days` longtext COLLATE utf8_bin,
  `available_days_full` longtext COLLATE utf8_bin,
  `transport_provider` tinyint(4) DEFAULT NULL,
  `meals` longtext COLLATE utf8_bin,
  `night_fun` longtext COLLATE utf8_bin,
  `airport_pickup` longtext COLLATE utf8_bin,
  `visits` longtext COLLATE utf8_bin,
  `rates` longtext COLLATE utf8_bin,
  `commodities` longtext COLLATE utf8_bin,
  `installations` longtext COLLATE utf8_bin,
  `cleaning_fee` longtext COLLATE utf8_bin,
  `shared_space` int(11) DEFAULT NULL,
  `rules` longtext COLLATE utf8_bin,
  `currency_id` int(11) DEFAULT NULL,
  `form_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `form_id_UNIQUE` (`form_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_houses`
--

INSERT INTO `fap_houses` (`id`, `user_id`, `name`, `location`, `guest_nr`, `description`, `property_type_id`, `stay_price_type`, `price`, `beds`, `available_days`, `available_days_full`, `transport_provider`, `meals`, `night_fun`, `airport_pickup`, `visits`, `rates`, `commodities`, `installations`, `cleaning_fee`, `shared_space`, `rules`, `currency_id`, `form_id`, `created_at`, `updated_at`, `slug`, `status`) VALUES
(55, 71, 'House with Shared Space', 'Location', '4', '{\"ops\":[{\"insert\":\"The Description\\n\\nHello!\\n\"}]}', 24, 'price_night', 80, '[{\"type\":\"bed_king\",\"room\":\"0\"},{\"type\":\"bed_sofa\",\"room\":\"1\"}]', '[\"2019-03-01 to 2019-03-31\",\"2019-04-01 to 2019-04-30\"]', NULL, 1, '{\"meal_q\":\"on\",\"meal_pq\":\"on\",\"meal_price\":20}', '{\"night_q\":\"on\",\"night_pq\":\"on\",\"night_price\":20.5}', '{\"pickup_q\":\"on\",\"pickup_pq\":\"on\",\"pickup_price\":20.5}', '{\"visits_q\":\"on\",\"visits_pq\":\"on\",\"visits_price\":20}', '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', '[\"kitchen\",\"toilet\",\"washing_machine\",\"central_heat\",\"intercomunicator\",\"door_man\",\"iron\",\"wifi\",\"blow_dryer\",\"working_desk\",\"cable_tv\",\"crib\",\"auto_check\",\"smoke_detector\",\"carbon_monoxide_detector\"]', '[\"parking\",\"gym\",\"jacuzzi\",\"pool\"]', '25', 1, '[\"no-parties\"]', 1, 'cce6c64af1e187076d05a9f3bccddcd5', '2018-11-26 17:27:46', '2018-12-14 12:25:58', '0-house-with-shared-space', 1),
(56, 71, 'undefined', '8888', '7', '{\"ops\":[{\"insert\":\"\\n\"}]}', 29, 'price_night', 10, '[{\"type\":\"bed_bunk\",\"room\":\"0\"}]', '[\"2018-12-04 to 2018-12-31\",\"2018-12-01 to 2019-03-31\",\"2019-05-02 to 2019-05-22\"]', NULL, 1, '{\"meal_q\":\"on\",\"meal_pq\":\"on\",\"meal_price\":9}', '{\"night_q\":\"on\",\"night_pq\":\"on\",\"night_price\":44}', '{\"pickup_q\":\"on\",\"pickup_pq\":\"on\",\"pickup_price\":12}', '{\"visits_q\":\"on\",\"visits_pq\":\"on\",\"visits_price\":19}', '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', '[\"kitchen\",\"toilet\",\"washing_machine\",\"central_heat\",\"intercomunicator\",\"door_man\",\"iron\",\"wifi\",\"blow_dryer\",\"working_desk\",\"cable_tv\",\"crib\",\"auto_check\",\"smoke_detector\",\"carbon_monoxide_detector\"]', '[\"parking\",\"gym\",\"jacuzzi\",\"pool\"]', '25', 1, '[\"no-smoking\",\"no-parties\"]', 1, 'b6fe213fbcdcf81e7005452584fb9d2a', '2018-11-28 10:25:59', '2018-12-14 12:25:58', '13-undefined', 1),
(57, 71, 'House with all', 'madrid', '8', '{\"ops\":[{\"insert\":\"A description\"},{\"attributes\":{\"header\":1},\"insert\":\"\\n\"}]}', 21, 'price_night', 5, '[{\"type\":\"bed_king\",\"room\":\"0\"}]', '[\"2018-12-05 to 2018-12-31\"]', NULL, 1, '{\"meal_q\":\"on\",\"meal_pq\":\"on\",\"meal_price\":5}', '{\"night_q\":\"on\",\"night_pq\":\"on\",\"night_price\":5}', '{\"pickup_q\":\"on\",\"pickup_pq\":\"on\",\"pickup_price\":5}', '{\"visits_q\":\"on\",\"visits_pq\":\"on\",\"visits_price\":5}', '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', '[\"kitchen\",\"toilet\",\"washing_machine\",\"central_heat\",\"intercomunicator\",\"door_man\",\"iron\",\"wifi\",\"blow_dryer\",\"working_desk\",\"cable_tv\",\"crib\",\"auto_check\",\"smoke_detector\",\"carbon_monoxide_detector\"]', '[\"parking\",\"gym\",\"jacuzzi\",\"pool\"]', '25', 0, '[\"no-parties\"]', 1, 'f694ed89515fe8d44eb966903637f56b', '2018-12-05 11:17:43', '2018-12-25 16:01:12', '5-house-with-all', 1),
(58, 71, 'House Validated', 'Madrid', '1', '{\"ops\":[{\"attributes\":{\"color\":\"#000000\",\"background\":\"#ffffff\"},\"insert\":\"Lorem ipsum dolor sit amet.\"},{\"insert\":\"\\n\"},{\"attributes\":{\"color\":\"#000000\",\"background\":\"#ffffff\"},\"insert\":\"Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"},{\"insert\":\"\\n\"}]}', 21, 'price_night', 80, '[{\"type\":\"bed_king\",\"room\":\"0\"},{\"type\":\"bed_bunk\",\"room\":\"0\"}]', '[\"2018-12-27 to 2018-12-28\",\"2019-01-01 to 2019-01-31\"]', NULL, 1, '{\"meals_q\":\"on\",\"meals_qp\":false}', '{\"night_q\":\"on\",\"night_pq\":\"on\",\"night_price\":90}', '{\"pickup_q\":\"on\",\"pickup_qp\":false}', '{\"visits_q\":false}', '{\"rate_q\":\"standard_rate\",\"rates_code\":\"PT\"}', '[\"toilet\",\"central_heat\",\"door_man\"]', '[\"parking\",\"jacuzzi\"]', '25', 1, '[\"no-smoking\"]', 1, '3916fb8ed225a653092449aed7a5dc47', '2018-12-27 13:09:57', '2018-12-27 17:54:50', '1-house-validated', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_houses_dates_ranges`
--

DROP TABLE IF EXISTS `fap_houses_dates_ranges`;
CREATE TABLE IF NOT EXISTS `fap_houses_dates_ranges` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `house_id` int(11) DEFAULT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `params` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fap_houses_dates_ranges`
--

INSERT INTO `fap_houses_dates_ranges` (`id`, `house_id`, `from`, `to`, `params`, `created_at`, `updated_at`, `status`) VALUES
(10, 56, '2018-12-04', '2018-12-31', NULL, '2018-11-28 10:25:59', '2018-11-28 10:25:59', 1),
(8, 55, '2019-03-01', '2019-03-31', NULL, '2018-11-26 17:27:46', '2018-11-26 17:27:46', 1),
(3, 53, '2018-12-19', '2018-12-29', NULL, '2018-11-20 12:56:26', '2018-11-20 12:56:26', 1),
(9, 55, '2019-04-01', '2019-04-30', NULL, '2018-11-26 17:27:46', '2018-11-26 17:27:46', 1),
(6, 54, '2019-01-01', '2019-01-31', NULL, '2018-11-20 14:44:08', '2018-11-20 14:44:08', 1),
(7, 54, '2019-02-05', '2019-02-12', NULL, '2018-11-20 14:44:08', '2018-11-20 14:44:08', 1),
(11, 56, '2018-12-01', '2019-03-31', NULL, '2018-11-28 10:25:59', '2018-11-28 10:25:59', 1),
(12, 56, '2019-05-02', '2019-05-22', NULL, '2018-11-28 10:25:59', '2018-11-28 10:25:59', 1),
(13, 57, '2018-12-05', '2018-12-31', NULL, '2018-12-05 11:17:43', '2018-12-05 11:17:43', 1),
(14, 58, '2018-12-27', '2018-12-28', NULL, '2018-12-27 13:09:57', '2018-12-27 13:09:57', 1),
(15, 58, '2019-01-01', '2019-01-31', NULL, '2018-12-27 13:09:57', '2018-12-27 13:09:57', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_houses_to_approve`
--

INSERT INTO `fap_houses_to_approve` (`id`, `id_house`, `house_status`, `user_id_approval`, `updated_at`, `created_at`, `status`) VALUES
(35, 58, 0, NULL, '2018-12-27 13:09:57', '2018-12-27 13:09:57', 1),
(34, 57, 0, NULL, '2018-12-05 11:17:43', '2018-12-05 11:17:43', 1),
(33, 56, 0, NULL, '2018-11-28 10:25:59', '2018-11-28 10:25:59', 1),
(32, 55, 0, NULL, '2018-11-26 17:27:46', '2018-11-26 17:27:46', 1),
(31, 54, 0, NULL, '2018-11-20 14:44:08', '2018-11-20 14:44:08', 1),
(30, 53, 0, NULL, '2018-11-20 12:56:26', '2018-11-20 12:56:26', 1),
(29, 50, 0, NULL, '2018-11-19 14:57:27', '2018-11-19 14:57:27', 1),
(28, 49, 0, NULL, '2018-11-19 13:10:58', '2018-11-19 13:10:58', 1),
(27, 48, 0, NULL, '2018-11-16 17:47:45', '2018-11-16 17:47:45', 1),
(26, 47, 0, NULL, '2018-11-14 17:15:44', '2018-11-14 17:15:44', 1),
(25, 46, 0, NULL, '2018-11-09 15:26:54', '2018-11-09 15:26:54', 1),
(24, 45, 0, NULL, '2018-11-09 15:20:25', '2018-11-09 15:20:25', 1),
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
  `properties` longtext COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_house_properties`
--

INSERT INTO `fap_house_properties` (`id`, `house_commodity`, `font_icon`, `type_id`, `created_at`, `updated_at`, `status`, `properties`) VALUES
(2, 'kitchen', 'flaticon-kitchen', 1, '2018-08-10 12:00:13', '2018-10-03 11:49:45', 1, NULL),
(3, 'toilet', 'flaticon-bathtub', 1, '2018-08-10 12:00:13', '2018-10-03 11:49:45', 1, NULL),
(4, 'washing_machine', 'flaticon-washing-machine', 1, '2018-08-10 12:00:13', '2018-10-03 11:49:45', 1, NULL),
(5, 'central_heat', 'flaticon-heater', 1, '2018-08-10 12:00:13', '2018-10-03 11:49:45', 1, NULL),
(6, 'intercomunicator', 'flaticon-intercom', 1, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(7, 'door_man', 'flaticon-professions-and-jobs', 1, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(8, 'iron', 'flaticon-iron', 1, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(9, 'wifi', 'flaticon-wifi', 1, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(10, 'blow_dryer', 'flaticon-hair-dryer', 1, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(11, 'working_desk', 'flaticon-desk', 1, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(12, 'cable_tv', 'flaticon-tv', 1, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(13, 'crib', 'flaticon-crib', 1, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(14, 'auto_check', 'flaticon-padlock', 1, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(15, 'smoke_detector', 'flaticon-smoke-detector-1', 1, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(16, 'carbon_monoxide_detector', 'flaticon-smoke-detector', 1, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(17, 'parking', 'flaticon-garage', 2, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(18, 'gym', 'flaticon-barbell', 2, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(19, 'jacuzzi', 'flaticon-jacuzzi', 2, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(20, 'pool', 'flaticon-swimming', 2, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(21, 'home', 'flaticon-home', 3, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(22, 'apartment', 'flaticon-apartment-building', 3, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(23, 'hotel_boutique', 'flaticon-resort', 3, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(24, 'bungalow', 'flaticon-bungalow', 3, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(25, 'hostel', 'flaticon-house', 3, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(26, 'hotel', 'flaticon-hotel', 3, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(27, 'loft', 'flaticon-room', 3, '2018-08-10 12:00:13', '2018-11-21 11:57:37', 1, NULL),
(28, 'resort', NULL, 3, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1, NULL),
(29, 'villa', NULL, 3, '2018-08-10 12:00:13', '2018-08-10 12:00:13', 1, NULL),
(58, 'bedroom', 'flaticon-room', 4, '2018-10-26 15:37:42', '2018-11-08 14:39:57', 1, '{\"bed_single\":{\"icon\":\"flaticon-single-bed\",\"ammount\":1},\"bed_king\":{\"ammount\":1,\"icon\":\"flaticon-king-size-bed-with-two-pillows\"},\"bed_bunk\":{\"ammount\":1,\"icon\":\"flaticon-bunk\"}}'),
(59, 'common_spaces', 'flaticon-sofa', 4, '2018-10-26 15:37:42', '2018-11-08 12:25:40', 1, '{\"bed_sofa\":{\"icon\":\"flaticon-sofa-1\",\"ammount\":1}}');

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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(28, 'Villa', 29, 1, '2018-08-17 11:46:05', '2018-08-17 11:46:36', 1),
(29, 'Bedroom', 58, 1, '2018-11-08 10:51:58', '2018-11-08 10:51:58', 1),
(30, 'Common Spaces', 59, 1, '2018-11-08 10:51:58', '2018-11-08 12:25:55', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_media_houses`
--

INSERT INTO `fap_media_houses` (`id`, `name`, `id_house`, `slug`, `base_path`, `mime`, `created_at`, `updated_at`, `status`, `user_uploader_id`) VALUES
(37, 'Ranch-style-neutral-renovation.jpg', 'efbd78866307d9f6c88a47f675e5cee4', 'ranch-style-neutral-renovation-jpg', 'images/houses/efbd78866307d9f6c88a47f675e5cee4-Ranch-style-neutral-renovation.jpg', 'image/jpeg', '2018-11-14 17:16:25', '2018-11-14 17:16:25', 1, 71),
(36, 'simple-house-design1.jpg', '20f33dfadf6a9e46dcb1397e57fbd353', 'simple-house-design1-jpg', 'images/houses/20f33dfadf6a9e46dcb1397e57fbd353-simple-house-design1.jpg', 'image/jpeg', '2018-11-09 15:27:40', '2018-11-09 15:27:40', 1, 71),
(35, 'garden-house-lawn-462358.jpg', '20f33dfadf6a9e46dcb1397e57fbd353', 'garden-house-lawn-462358-jpg', 'images/houses/20f33dfadf6a9e46dcb1397e57fbd353-garden-house-lawn-462358.jpg', 'image/jpeg', '2018-11-09 15:27:37', '2018-11-09 15:27:37', 1, 71),
(34, '3c82af95de11f4060696da871c59385a-495x330.jpg', 'c82a8c9591c0b7b748fe41968beaf5f6', '3c82af95de11f4060696da871c59385a-495x330-jpg', 'images/houses/c82a8c9591c0b7b748fe41968beaf5f6-3c82af95de11f4060696da871c59385a-495x330.jpg', 'image/jpeg', '2018-11-09 15:20:22', '2018-11-09 15:20:22', 1, 71),
(33, '1427751434340.jpeg', 'c82a8c9591c0b7b748fe41968beaf5f6', '1427751434340-jpeg', 'images/houses/c82a8c9591c0b7b748fe41968beaf5f6-1427751434340.jpeg', 'image/jpeg', '2018-11-09 15:19:14', '2018-11-09 15:19:14', 1, 71),
(32, '25FLOATING-INYT2-articleLarge.jpg', 'c82a8c9591c0b7b748fe41968beaf5f6', '25floating-inyt2-articlelarge-jpg', 'images/houses/c82a8c9591c0b7b748fe41968beaf5f6-25FLOATING-INYT2-articleLarge.jpg', 'image/jpeg', '2018-11-09 15:19:10', '2018-11-09 15:19:10', 1, 71),
(31, 'Store__1_-1.jpg', '73a5650df76975c22fe51caaffbb6172', 'store-1-1-jpg', 'images/houses/3deb6e1b2beaac7c4f33e5d79ea38130-Store__1_-1.jpg', 'image/jpeg', NULL, NULL, 1, 71),
(30, 'index.jpg', '73a5650df76975c22fe51caaffbb6172', 'index-jpg', 'images/houses/73a5650df76975c22fe51caaffbb6172-index.jpg', 'image/jpeg', '2018-10-04 12:03:00', '2018-10-04 12:03:00', 1, 71),
(29, 'teste-Copy.png', '06a1c70cd34c4f880bf9d2c078c18fac', 'teste-copy-png', 'images/houses/06a1c70cd34c4f880bf9d2c078c18fac-teste-Copy.png', 'image/png', '2018-10-03 15:47:13', '2018-10-03 15:47:13', 1, 71),
(28, 'Store__1_-1.jpg', '3deb6e1b2beaac7c4f33e5d79ea38130', 'store-1-1-jpg', 'images/houses/3deb6e1b2beaac7c4f33e5d79ea38130-Store__1_-1.jpg', 'image/jpeg', '2018-09-17 16:05:28', '2018-09-17 16:05:28', 1, 71),
(27, 'maxresdefault.jpg', '3deb6e1b2beaac7c4f33e5d79ea38130', 'maxresdefault-jpg', 'images/houses/3deb6e1b2beaac7c4f33e5d79ea38130-maxresdefault.jpg', 'image/jpeg', '2018-09-17 16:05:27', '2018-09-17 16:05:27', 1, 71),
(26, 'download.jpg', '3deb6e1b2beaac7c4f33e5d79ea38130', 'download-jpg', 'images/houses/3deb6e1b2beaac7c4f33e5d79ea38130-download.jpg', 'image/jpeg', '2018-09-17 16:05:27', '2018-09-17 16:05:27', 1, 71),
(24, 'Semtítulo.png', 'ccea8c9aa893c1ee8954c1bbc1169e45', 'semtitulo-png', 'images/houses/ccea8c9aa893c1ee8954c1bbc1169e45-Semtítulo.png', 'image/png', '2018-09-17 15:45:13', '2018-09-17 15:45:13', 1, 71),
(25, 'Untitled.png', 'ccea8c9aa893c1ee8954c1bbc1169e45', 'untitled-png', 'images/houses/ccea8c9aa893c1ee8954c1bbc1169e45-Untitled.png', 'image/png', '2018-09-17 15:45:53', '2018-09-17 15:45:53', 1, 71),
(23, 'ISO45001_2018_3-Copy.png', 'ccea8c9aa893c1ee8954c1bbc1169e45', 'iso45001-2018-3-copy-png', 'images/houses/ccea8c9aa893c1ee8954c1bbc1169e45-ISO45001_2018_3-Copy.png', 'image/png', '2018-09-17 15:44:46', '2018-09-17 15:44:46', 1, 71),
(22, 'teste.png', '64390e8bd1dababaf299431034d55a3d', 'teste-png', 'images/houses/64390e8bd1dababaf299431034d55a3d-teste.png', 'image/png', '2018-09-17 14:57:31', '2018-09-17 14:57:31', 1, 71),
(21, 'index.jpg', '64390e8bd1dababaf299431034d55a3d', 'index-jpg', 'images/houses/64390e8bd1dababaf299431034d55a3d-index.jpg', 'image/jpeg', '2018-09-17 14:57:31', '2018-09-17 14:57:31', 1, 71),
(38, 'tasteful-interiors-tiny-house-15.jpg', 'efbd78866307d9f6c88a47f675e5cee4', 'tasteful-interiors-tiny-house-15-jpg', 'images/houses/efbd78866307d9f6c88a47f675e5cee4-tasteful-interiors-tiny-house-15.jpg', 'image/jpeg', '2018-11-14 17:16:26', '2018-11-14 17:16:26', 1, 71),
(39, 'hillhouse-interiors-design-15.jpg', 'efbd78866307d9f6c88a47f675e5cee4', 'hillhouse-interiors-design-15-jpg', 'images/houses/efbd78866307d9f6c88a47f675e5cee4-hillhouse-interiors-design-15.jpg', 'image/jpeg', '2018-11-14 17:16:28', '2018-11-14 17:16:28', 1, 71),
(40, 'garden-house-lawn-462358.jpg', '771ee74ccef5401913458d750945de97', 'garden-house-lawn-462358-jpg', 'images/houses/771ee74ccef5401913458d750945de97-garden-house-lawn-462358.jpg', 'image/jpeg', '2018-11-16 17:47:41', '2018-11-16 17:47:41', 1, 71),
(41, 'tasteful-interiors-tiny-house-15.jpg', '771ee74ccef5401913458d750945de97', 'tasteful-interiors-tiny-house-15-jpg', 'images/houses/771ee74ccef5401913458d750945de97-tasteful-interiors-tiny-house-15.jpg', 'image/jpeg', '2018-11-16 17:47:41', '2018-11-16 17:47:41', 1, 71),
(42, '3c82af95de11f4060696da871c59385a-495x330.jpg', 'cfb56ab75050184ce29446e54b7ca99c', '3c82af95de11f4060696da871c59385a-495x330-jpg', 'images/houses/cfb56ab75050184ce29446e54b7ca99c-3c82af95de11f4060696da871c59385a-495x330.jpg', 'image/jpeg', '2018-11-19 13:10:56', '2018-11-19 13:10:56', 1, 71),
(43, '1427751434340.jpeg', 'e9df25774b5882771dd40e34c77314af', '1427751434340-jpeg', 'images/houses/e9df25774b5882771dd40e34c77314af-1427751434340.jpeg', 'image/jpeg', '2018-11-21 15:31:23', '2018-11-21 15:31:23', 1, 71),
(44, '25FLOATING-INYT2-articleLarge.jpg', 'e9df25774b5882771dd40e34c77314af', '25floating-inyt2-articlelarge-jpg', 'images/houses/e9df25774b5882771dd40e34c77314af-25FLOATING-INYT2-articleLarge.jpg', 'image/jpeg', '2018-11-21 15:31:27', '2018-11-21 15:31:27', 1, 71),
(45, 'facebook@2x.png', 'e9df25774b5882771dd40e34c77314af', 'facebook-2x-png', 'images/houses/e9df25774b5882771dd40e34c77314af-facebook@2x.png', 'image/png', '2018-11-21 15:31:32', '2018-11-21 15:31:32', 1, 71),
(46, 'instagram@2x(1).png', 'e9df25774b5882771dd40e34c77314af', 'instagram-2x-1-png', 'images/houses/e9df25774b5882771dd40e34c77314af-instagram@2x(1).png', 'image/png', '2018-11-21 15:31:47', '2018-11-21 15:31:47', 1, 71),
(47, 'garden-house-lawn-462358.jpg', '842522e9f6ded6c756a8988e69d0b7d1', 'garden-house-lawn-462358-jpg', 'images/houses/842522e9f6ded6c756a8988e69d0b7d1-garden-house-lawn-462358.jpg', 'image/jpeg', '2018-11-21 15:51:57', '2018-11-21 15:51:57', 1, 71),
(48, '3c82af95de11f4060696da871c59385a-495x330.jpg', '842522e9f6ded6c756a8988e69d0b7d1', '3c82af95de11f4060696da871c59385a-495x330-jpg', 'images/houses/842522e9f6ded6c756a8988e69d0b7d1-3c82af95de11f4060696da871c59385a-495x330.jpg', 'image/jpeg', '2018-11-21 15:52:03', '2018-11-21 15:52:03', 1, 71),
(49, '1427751434340.jpeg', '842522e9f6ded6c756a8988e69d0b7d1', '1427751434340-jpeg', 'images/houses/842522e9f6ded6c756a8988e69d0b7d1-1427751434340.jpeg', 'image/jpeg', '2018-11-21 15:52:06', '2018-11-21 15:52:06', 1, 71),
(50, '25FLOATING-INYT2-articleLarge.jpg', '842522e9f6ded6c756a8988e69d0b7d1', '25floating-inyt2-articlelarge-jpg', 'images/houses/842522e9f6ded6c756a8988e69d0b7d1-25FLOATING-INYT2-articleLarge.jpg', 'image/jpeg', '2018-11-21 15:52:08', '2018-11-21 15:52:08', 1, 71),
(51, 'Ranch-style-neutral-renovation.jpg', '842522e9f6ded6c756a8988e69d0b7d1', 'ranch-style-neutral-renovation-jpg', 'images/houses/842522e9f6ded6c756a8988e69d0b7d1-Ranch-style-neutral-renovation.jpg', 'image/jpeg', '2018-11-21 15:52:10', '2018-11-21 15:52:10', 1, 71),
(52, 'e5af2baeeef0b74231006-Copy.jpg', '842522e9f6ded6c756a8988e69d0b7d1', 'e5af2baeeef0b74231006-copy-jpg', 'images/houses/842522e9f6ded6c756a8988e69d0b7d1-e5af2baeeef0b74231006-Copy.jpg', 'image/jpeg', '2018-11-21 15:52:14', '2018-11-21 15:52:14', 1, 71),
(53, '1427751434340.jpeg', 'b69dd5589b231e5f040f3532a7fc460c', '1427751434340-jpeg', 'images/houses/b69dd5589b231e5f040f3532a7fc460c-1427751434340.jpeg', 'image/jpeg', '2018-11-21 15:52:43', '2018-11-21 15:52:43', 1, 71),
(54, 'Ranch-style-neutral-renovation.jpg', 'b69dd5589b231e5f040f3532a7fc460c', 'ranch-style-neutral-renovation-jpg', 'images/houses/b69dd5589b231e5f040f3532a7fc460c-Ranch-style-neutral-renovation.jpg', 'image/jpeg', '2018-11-21 15:52:47', '2018-11-21 15:52:47', 1, 71),
(55, 'Semtítulo.png', 'b69dd5589b231e5f040f3532a7fc460c', 'semtitulo-png', 'images/houses/b69dd5589b231e5f040f3532a7fc460c-Semtítulo.png', 'image/png', '2018-11-21 15:52:47', '2018-11-21 15:52:47', 1, 71),
(56, 'simple-house-design1.jpg', 'b69dd5589b231e5f040f3532a7fc460c', 'simple-house-design1-jpg', 'images/houses/b69dd5589b231e5f040f3532a7fc460c-simple-house-design1.jpg', 'image/jpeg', '2018-11-21 15:52:49', '2018-11-21 15:52:49', 1, 71),
(57, 'tasteful-interiors-tiny-house-15.jpg', 'b69dd5589b231e5f040f3532a7fc460c', 'tasteful-interiors-tiny-house-15-jpg', 'images/houses/b69dd5589b231e5f040f3532a7fc460c-tasteful-interiors-tiny-house-15.jpg', 'image/jpeg', '2018-11-21 15:52:49', '2018-11-21 15:52:49', 1, 71),
(58, 'tasteful-interiors-tiny-house-15.jpg', 'b69dd5589b231e5f040f3532a7fc460c', 'tasteful-interiors-tiny-house-15-jpg', 'images/houses/b69dd5589b231e5f040f3532a7fc460c-tasteful-interiors-tiny-house-15.jpg', 'image/jpeg', '2018-11-21 15:52:51', '2018-11-21 15:52:51', 1, 71),
(59, '25FLOATING-INYT2-articleLarge.jpg', 'b69dd5589b231e5f040f3532a7fc460c', '25floating-inyt2-articlelarge-jpg', 'images/houses/b69dd5589b231e5f040f3532a7fc460c-25FLOATING-INYT2-articleLarge.jpg', 'image/jpeg', '2018-11-21 15:52:53', '2018-11-21 15:52:53', 1, 71),
(60, 'Semtítulo.png', 'b69dd5589b231e5f040f3532a7fc460c', 'semtitulo-png', 'images/houses/b69dd5589b231e5f040f3532a7fc460c-Semtítulo.png', 'image/png', '2018-11-21 15:52:56', '2018-11-21 15:52:56', 1, 71),
(61, '25FLOATING-INYT2-articleLarge.jpg', '6910581b37741f88ea95500d8c383d9c', '25floating-inyt2-articlelarge-jpg', 'images/houses/6910581b37741f88ea95500d8c383d9c-25FLOATING-INYT2-articleLarge.jpg', 'image/jpeg', '2018-11-21 15:54:01', '2018-11-21 15:54:01', 1, 71),
(62, '3c82af95de11f4060696da871c59385a-495x330.jpg', '6910581b37741f88ea95500d8c383d9c', '3c82af95de11f4060696da871c59385a-495x330-jpg', 'images/houses/6910581b37741f88ea95500d8c383d9c-3c82af95de11f4060696da871c59385a-495x330.jpg', 'image/jpeg', '2018-11-21 15:54:01', '2018-11-21 15:54:01', 1, 71),
(63, '1427751434340.jpeg', '6910581b37741f88ea95500d8c383d9c', '1427751434340-jpeg', 'images/houses/6910581b37741f88ea95500d8c383d9c-1427751434340.jpeg', 'image/jpeg', '2018-11-21 15:54:02', '2018-11-21 15:54:02', 1, 71),
(64, 'e5af2baeeef0b74231006-Copy.jpg', '6910581b37741f88ea95500d8c383d9c', 'e5af2baeeef0b74231006-copy-jpg', 'images/houses/6910581b37741f88ea95500d8c383d9c-e5af2baeeef0b74231006-Copy.jpg', 'image/jpeg', '2018-11-21 15:54:02', '2018-11-21 15:54:02', 1, 71),
(65, '1427751434340.jpeg', '991262902679e4dab4b8490882770f21', '1427751434340-jpeg', 'images/houses/991262902679e4dab4b8490882770f21-1427751434340.jpeg', 'image/jpeg', '2018-11-21 15:56:47', '2018-11-21 15:56:47', 1, 71),
(66, '3c82af95de11f4060696da871c59385a-495x330.jpg', '991262902679e4dab4b8490882770f21', '3c82af95de11f4060696da871c59385a-495x330-jpg', 'images/houses/991262902679e4dab4b8490882770f21-3c82af95de11f4060696da871c59385a-495x330.jpg', 'image/jpeg', '2018-11-21 15:56:49', '2018-11-21 15:56:49', 1, 71),
(67, '25FLOATING-INYT2-articleLarge.jpg', '991262902679e4dab4b8490882770f21', '25floating-inyt2-articlelarge-jpg', 'images/houses/991262902679e4dab4b8490882770f21-25FLOATING-INYT2-articleLarge.jpg', 'image/jpeg', '2018-11-21 15:56:52', '2018-11-21 15:56:52', 1, 71),
(68, 'Imagem1.png', '991262902679e4dab4b8490882770f21', 'imagem1-png', 'images/houses/991262902679e4dab4b8490882770f21-Imagem1.png', 'image/png', '2018-11-21 15:56:54', '2018-11-21 15:56:54', 1, 71),
(69, '3c82af95de11f4060696da871c59385a-495x330.jpg', '737b9eac17f425f1f2faa0f6f48dd099', '3c82af95de11f4060696da871c59385a-495x330-jpg', 'images/houses/737b9eac17f425f1f2faa0f6f48dd099-3c82af95de11f4060696da871c59385a-495x330.jpg', 'image/jpeg', '2018-11-21 15:58:47', '2018-11-21 15:58:47', 1, 71),
(70, 'e5af2baeeef0b74231006-Copy.jpg', 'edab32877bde9fd8c3d72c7045aedac0', 'e5af2baeeef0b74231006-copy-jpg', 'images/houses/edab32877bde9fd8c3d72c7045aedac0-e5af2baeeef0b74231006-Copy.jpg', 'image/jpeg', '2018-11-21 15:59:41', '2018-11-21 15:59:41', 1, 71),
(71, '1427751434340.jpeg', 'edab32877bde9fd8c3d72c7045aedac0', '1427751434340-jpeg', 'images/houses/edab32877bde9fd8c3d72c7045aedac0-1427751434340.jpeg', 'image/jpeg', '2018-11-21 15:59:43', '2018-11-21 15:59:43', 1, 71),
(72, '25FLOATING-INYT2-articleLarge.jpg', 'edab32877bde9fd8c3d72c7045aedac0', '25floating-inyt2-articlelarge-jpg', 'images/houses/edab32877bde9fd8c3d72c7045aedac0-25FLOATING-INYT2-articleLarge.jpg', 'image/jpeg', '2018-11-21 15:59:45', '2018-11-21 15:59:45', 1, 71),
(73, '3c82af95de11f4060696da871c59385a-495x330.jpg', 'edab32877bde9fd8c3d72c7045aedac0', '3c82af95de11f4060696da871c59385a-495x330-jpg', 'images/houses/edab32877bde9fd8c3d72c7045aedac0-3c82af95de11f4060696da871c59385a-495x330.jpg', 'image/jpeg', '2018-11-21 15:59:47', '2018-11-21 15:59:47', 1, 71),
(74, 'teste-Copy.png', '0edf1af3bb35920f5dae68e44717ff81', 'teste-copy-png', 'images/houses/0edf1af3bb35920f5dae68e44717ff81-teste-Copy.png', 'image/png', '2018-11-21 16:00:19', '2018-11-21 16:00:19', 1, 71),
(75, 'facebook@2x.png', '0edf1af3bb35920f5dae68e44717ff81', 'facebook-2x-png', 'images/houses/0edf1af3bb35920f5dae68e44717ff81-facebook@2x.png', 'image/png', '2018-11-21 16:00:23', '2018-11-21 16:00:23', 1, 71),
(76, 'instagram@2x(1).png', '0edf1af3bb35920f5dae68e44717ff81', 'instagram-2x-1-png', 'images/houses/0edf1af3bb35920f5dae68e44717ff81-instagram@2x(1).png', 'image/png', '2018-11-21 16:00:26', '2018-11-21 16:00:26', 1, 71),
(77, 'Untitled.png', '0edf1af3bb35920f5dae68e44717ff81', 'untitled-png', 'images/houses/0edf1af3bb35920f5dae68e44717ff81-Untitled.png', 'image/png', '2018-11-21 16:00:52', '2018-11-21 16:00:52', 1, 71),
(78, 'Untitled4.png', 'b1781c07d9baf0031945adec0f4fb298', 'untitled4-png', 'images/houses/b1781c07d9baf0031945adec0f4fb298-Untitled4.png', 'image/png', '2018-11-21 16:02:27', '2018-11-21 16:02:27', 1, 71),
(79, 'Untitled-Copy.png', 'b1781c07d9baf0031945adec0f4fb298', 'untitled-copy-png', 'images/houses/b1781c07d9baf0031945adec0f4fb298-Untitled-Copy.png', 'image/png', '2018-11-21 16:02:28', '2018-11-21 16:02:28', 1, 71),
(80, 'teste.png', 'b1781c07d9baf0031945adec0f4fb298', 'teste-png', 'images/houses/b1781c07d9baf0031945adec0f4fb298-teste.png', 'image/png', '2018-11-21 16:02:31', '2018-11-21 16:02:31', 1, 71),
(81, 'tasteful-interiors-tiny-house-15.jpg', 'b1781c07d9baf0031945adec0f4fb298', 'tasteful-interiors-tiny-house-15-jpg', 'images/houses/b1781c07d9baf0031945adec0f4fb298-tasteful-interiors-tiny-house-15.jpg', 'image/jpeg', '2018-11-21 16:02:34', '2018-11-21 16:02:34', 1, 71),
(82, 'Untitled.png', 'cc7f1e68eb48d1a341c9c19da3c78fc1', 'untitled-png', 'images/houses/cc7f1e68eb48d1a341c9c19da3c78fc1-Untitled.png', 'image/png', '2018-11-21 16:04:49', '2018-11-21 16:04:49', 1, 71),
(83, 'architecture-beautiful-exterior-106399.jpg', 'c42c5fd5f9c985d0602715ce3edc72e1', 'architecture-beautiful-exterior-106399-jpg', 'images/houses/c42c5fd5f9c985d0602715ce3edc72e1-architecture-beautiful-exterior-106399.jpg', 'image/jpeg', '2018-11-21 16:08:01', '2018-11-21 16:08:01', 1, 71),
(84, 'architecture-beautiful-exterior-106399.jpg', '84cb88865297cab24d34366ac91f59e7', 'architecture-beautiful-exterior-106399-jpg', 'images/houses/84cb88865297cab24d34366ac91f59e7-architecture-beautiful-exterior-106399.jpg', 'image/jpeg', '2018-11-21 16:08:59', '2018-11-21 16:08:59', 1, 71),
(85, 'architecture-beautiful-exterior-106399.jpg', '273d0c559f9c851bab0b9fd63cf90999', 'architecture-beautiful-exterior-106399-jpg', 'images/houses/273d0c559f9c851bab0b9fd63cf90999-architecture-beautiful-exterior-106399.jpg', 'image/jpeg', '2018-11-21 16:14:59', '2018-11-21 16:14:59', 1, 71),
(86, 'architecture-beautiful-exterior-106399.jpg', '5511ea6a11370e68496b50edd031845c', 'architecture-beautiful-exterior-106399-jpg', 'images/houses/5511ea6a11370e68496b50edd031845c-architecture-beautiful-exterior-106399.jpg', 'image/jpeg', '2018-11-22 17:44:46', '2018-11-22 17:44:46', 1, 71),
(87, 'architecture-beautiful-exterior-106399.jpg', 'cce6c64af1e187076d05a9f3bccddcd5', 'architecture-beautiful-exterior-106399-jpg', 'images/houses/cce6c64af1e187076d05a9f3bccddcd5-architecture-beautiful-exterior-106399.jpg', 'image/jpeg', '2018-11-26 17:28:30', '2018-11-26 17:28:30', 1, 71),
(88, 'clifton-house-project-architecture_dezeen_hero-1.jpg', 'cce6c64af1e187076d05a9f3bccddcd5', 'clifton-house-project-architecture-dezeen-hero-1-jpg', 'images/houses/cce6c64af1e187076d05a9f3bccddcd5-clifton-house-project-architecture_dezeen_hero-1.jpg', 'image/jpeg', '2018-11-26 17:28:34', '2018-11-26 17:28:34', 1, 71),
(89, 'pexels-photo-323780.jpeg', 'b6fe213fbcdcf81e7005452584fb9d2a', 'pexels-photo-323780-jpeg', 'images/houses/b6fe213fbcdcf81e7005452584fb9d2a-pexels-photo-323780.jpeg', 'image/jpeg', '2018-11-28 10:25:52', '2018-11-28 10:25:52', 1, 71),
(90, 'pexels-photo-323780.jpeg', 'f694ed89515fe8d44eb966903637f56b', 'pexels-photo-323780-jpeg', 'images/houses/f694ed89515fe8d44eb966903637f56b-pexels-photo-323780.jpeg', 'image/jpeg', '2018-12-05 11:17:39', '2018-12-05 11:17:39', 1, 71),
(91, 'clifton-house-project-architecture_dezeen_hero-1.jpg', '99e3b157821e5f85450d61fa5c04e73d', 'clifton-house-project-architecture-dezeen-hero-1-jpg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-clifton-house-project-architecture_dezeen_hero-1.jpg', 'image/jpeg', '2018-12-21 11:20:55', '2018-12-21 11:20:55', 1, 71),
(92, 'clifton-house-project-architecture_dezeen_hero-1.jpg', '99e3b157821e5f85450d61fa5c04e73d', 'clifton-house-project-architecture-dezeen-hero-1-jpg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-clifton-house-project-architecture_dezeen_hero-1.jpg', 'image/jpeg', '2018-12-21 11:21:29', '2018-12-21 11:21:29', 1, 71),
(93, 'architecture-beautiful-exterior-106399.jpg', '99e3b157821e5f85450d61fa5c04e73d', 'architecture-beautiful-exterior-106399-jpg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-architecture-beautiful-exterior-106399.jpg', 'image/jpeg', '2018-12-21 11:21:29', '2018-12-21 11:21:29', 1, 71),
(94, 'pexels-photo-323780.jpeg', '99e3b157821e5f85450d61fa5c04e73d', 'pexels-photo-323780-jpeg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-pexels-photo-323780.jpeg', 'image/jpeg', '2018-12-21 11:21:30', '2018-12-21 11:21:30', 1, 71),
(95, 'clifton-house-project-architecture_dezeen_hero-1.jpg', '99e3b157821e5f85450d61fa5c04e73d', 'clifton-house-project-architecture-dezeen-hero-1-jpg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-clifton-house-project-architecture_dezeen_hero-1.jpg', 'image/jpeg', '2018-12-21 11:21:33', '2018-12-21 11:21:33', 1, 71),
(96, 'pexels-photo-323780.jpeg', '99e3b157821e5f85450d61fa5c04e73d', 'pexels-photo-323780-jpeg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-pexels-photo-323780.jpeg', 'image/jpeg', '2018-12-21 11:21:33', '2018-12-21 11:21:33', 1, 71),
(97, 'architecture-beautiful-exterior-106399.jpg', '99e3b157821e5f85450d61fa5c04e73d', 'architecture-beautiful-exterior-106399-jpg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-architecture-beautiful-exterior-106399.jpg', 'image/jpeg', '2018-12-21 11:21:35', '2018-12-21 11:21:35', 1, 71),
(98, 'architecture-beautiful-exterior-106399.jpg', '99e3b157821e5f85450d61fa5c04e73d', 'architecture-beautiful-exterior-106399-jpg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-architecture-beautiful-exterior-106399.jpg', 'image/jpeg', '2018-12-21 11:21:38', '2018-12-21 11:21:38', 1, 71),
(99, 'clifton-house-project-architecture_dezeen_hero-1.jpg', '99e3b157821e5f85450d61fa5c04e73d', 'clifton-house-project-architecture-dezeen-hero-1-jpg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-clifton-house-project-architecture_dezeen_hero-1.jpg', 'image/jpeg', '2018-12-21 11:21:38', '2018-12-21 11:21:38', 1, 71),
(100, 'pexels-photo-323780.jpeg', '99e3b157821e5f85450d61fa5c04e73d', 'pexels-photo-323780-jpeg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-pexels-photo-323780.jpeg', 'image/jpeg', '2018-12-21 11:21:42', '2018-12-21 11:21:42', 1, 71),
(101, 'clifton-house-project-architecture_dezeen_hero-1.jpg', '99e3b157821e5f85450d61fa5c04e73d', 'clifton-house-project-architecture-dezeen-hero-1-jpg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-clifton-house-project-architecture_dezeen_hero-1.jpg', 'image/jpeg', '2018-12-21 11:21:47', '2018-12-21 11:21:47', 1, 71),
(102, 'pexels-photo-323780.jpeg', '99e3b157821e5f85450d61fa5c04e73d', 'pexels-photo-323780-jpeg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-pexels-photo-323780.jpeg', 'image/jpeg', '2018-12-21 11:21:48', '2018-12-21 11:21:48', 1, 71),
(103, 'architecture-beautiful-exterior-106399.jpg', '99e3b157821e5f85450d61fa5c04e73d', 'architecture-beautiful-exterior-106399-jpg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-architecture-beautiful-exterior-106399.jpg', 'image/jpeg', '2018-12-21 11:21:48', '2018-12-21 11:21:48', 1, 71),
(104, 'clifton-house-project-architecture_dezeen_hero-1.jpg', '99e3b157821e5f85450d61fa5c04e73d', 'clifton-house-project-architecture-dezeen-hero-1-jpg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-clifton-house-project-architecture_dezeen_hero-1.jpg', 'image/jpeg', '2018-12-21 11:22:06', '2018-12-21 11:22:06', 1, 71),
(105, 'pexels-photo-323780.jpeg', '99e3b157821e5f85450d61fa5c04e73d', 'pexels-photo-323780-jpeg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-pexels-photo-323780.jpeg', 'image/jpeg', '2018-12-21 11:22:06', '2018-12-21 11:22:06', 1, 71),
(106, 'architecture-beautiful-exterior-106399.jpg', '99e3b157821e5f85450d61fa5c04e73d', 'architecture-beautiful-exterior-106399-jpg', 'images/houses/99e3b157821e5f85450d61fa5c04e73d-architecture-beautiful-exterior-106399.jpg', 'image/jpeg', '2018-12-21 11:22:07', '2018-12-21 11:22:07', 1, 71),
(107, 'clifton-house-project-architecture_dezeen_hero-1.jpg', '3916fb8ed225a653092449aed7a5dc47', 'clifton-house-project-architecture-dezeen-hero-1-jpg', 'images/houses/3916fb8ed225a653092449aed7a5dc47-clifton-house-project-architecture_dezeen_hero-1.jpg', 'image/jpeg', '2018-12-27 13:09:54', '2018-12-27 13:09:54', 1, 71);

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
-- Estrutura da tabela `fap_orders_payments`
--

DROP TABLE IF EXISTS `fap_orders_payments`;
CREATE TABLE IF NOT EXISTS `fap_orders_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `checkout_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `completed` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_orders_payments`
--

INSERT INTO `fap_orders_payments` (`id`, `order_id`, `checkout_id`, `payment_method`, `completed`, `created_at`, `updated_at`, `status`) VALUES
(1, NULL, '4423-EA61-6BD3', 2, 0, '2018-12-14 10:58:06', '2018-12-14 10:58:06', 1),
(2, NULL, '1684-6FFB-47F5', 2, 0, '2018-12-17 10:10:17', '2018-12-17 10:10:17', 1),
(3, NULL, '1337-EFB2-1F8A', 2, 0, '2018-12-18 10:46:05', '2018-12-18 10:46:05', 1),
(4, NULL, '8C4B-A2BD-4C72', 2, 0, '2018-12-21 10:57:18', '2018-12-21 10:57:18', 1);

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
(71, 'cesar', 'cesar', 'cesardcorreia.wcy@gmail.com', '$2y$16$LvkPLXvtCvHDes39pxOrUeJ7NDktMHZfw/HAe5i0p3nhoZuW6oZDG', 1, 1, 'GyuIBKJW5bNX2naPddZcY4f8tne9jdZUOzZQeFb7WNbbIE9tIowAGtzyIeVj', '2018-07-02 17:23:08', '2018-12-28 16:00:15', 1, NULL, NULL, NULL, 0),
(72, 'Diogo', 'diogo', 'diogo.ferreira@wecreateyou.biz', '$2y$16$oXwAD6aScKLrpsb2XNc0XOoGyl6hnaJub81sGT0DZqdMSmCCxk1Ye', 1, 0, NULL, '2018-08-10 13:48:22', '2018-08-10 13:50:20', 1, NULL, NULL, NULL, 0),
(74, 'cesar', 'usr2', 'usr2@gmail.com', '$2y$16$ATaxZrxXCLze4kJ7oFu7QuIW.2UAxM2kcImF/A/3gdkb227toWHUG', 1, 0, NULL, '2018-09-21 16:19:51', '2018-09-21 17:28:33', 1, NULL, NULL, NULL, 0),
(75, 'cesar', 'qwert', 'test@mail.com', '$2y$16$b.az.Jk4MsUWYkKI1QupdubAe9hxf1zH29gDGFaxwRB54E2koy9AC', 1, 0, NULL, '2018-09-28 09:50:49', '2018-09-28 11:11:15', 1, 1, 1, 1, 0),
(76, 'cesar', 'cesar2', 'my@mail.com', '$2y$16$FyRtLV2Dpwzf2o.NwP6pv.Jxb1Xhf1Q2jNcYLiRNCiwtRkNRakn1y', 1, 0, NULL, '2018-09-28 09:53:21', '2018-09-28 09:53:21', 0, 1, 1, 1, 0),
(77, 'cesar', 'cesar3', 'newmail@mail.com', '$2y$16$QFyhd5PM12YPydYCw5fD8OgVz3TrlTLNy/y6IjHLdbF266xxV4lTe', 1, 0, NULL, '2018-09-28 10:14:01', '2018-09-28 10:14:19', 1, 1, 1, 1, 0),
(78, 'cesar', 'mamow', 'mamail@mail.com', '$2y$16$4UjqYQsTgnXKkxVxI.8oxuJ9zBP8WK4cJd9U/Sej/nn7zZ./fT5L.', 1, 0, NULL, '2018-09-28 10:50:01', '2018-09-28 10:56:44', 1, 1, 1, 1, 0),
(79, 'cesar', 'pop', 'pop@m.c', '$2y$16$NJSEvZ.VmFu041hSN57wFOPlY1Aum6O4xRxjsXQRBH4Lmb4WVrNXi', 1, 0, 'AD87LsANpoYExfflpLFZEDSR5rcTCYLDOKX1FqZ3GJvtxqwdgxT11QaRceWy', '2018-09-28 11:14:45', '2018-10-01 16:38:50', 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fap_users_addresses`
--

DROP TABLE IF EXISTS `fap_users_addresses`;
CREATE TABLE IF NOT EXISTS `fap_users_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `address_1` text COLLATE utf8_bin,
  `address_2` text COLLATE utf8_bin,
  `city` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `zip` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `state_region` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created_at` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `updated_at` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `fap_users_addresses`
--

INSERT INTO `fap_users_addresses` (`id`, `user_id`, `first_name`, `last_name`, `address_1`, `address_2`, `city`, `zip`, `state_region`, `country_id`, `created_at`, `updated_at`, `status`) VALUES
(10, 71, 'Cesar', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', 'porto', 1, '2018-12-13 10:56:58', '2018-12-13 10:56:58', 1),
(9, 71, 'Cesar', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', 'porto', 1, '2018-12-13 10:51:59', '2018-12-13 10:51:59', 1),
(8, 71, 'Cesar', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', 'porto', 1, '2018-12-13 10:49:50', '2018-12-13 10:49:50', 1),
(7, 71, 'Cesar', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', 'porto', 1, '2018-12-13 10:37:09', '2018-12-13 10:37:09', 1),
(6, 71, 'Cesar', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', 'porto', 1, '2018-12-13 10:18:30', '2018-12-13 10:18:30', 1),
(11, 71, 'Cesar', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', 'porto', 1, '2018-12-13 11:03:37', '2018-12-13 11:03:37', 1),
(12, 71, 'Cesar', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', 'qwert', 21, '2018-12-13 16:49:53', '2018-12-13 16:49:53', 1),
(13, 71, 'Cesar', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', 'qwert', 1, '2018-12-13 16:51:03', '2018-12-13 16:51:03', 1),
(14, 71, 'Cesar', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', 'qwert', 1, '2018-12-13 16:53:13', '2018-12-13 16:53:13', 1),
(15, 71, 'Cesar', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', 'qwqwww', 1, '2018-12-13 16:57:16', '2018-12-13 16:57:16', 1),
(16, 71, 'Cesar', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', '1', 1, '2018-12-13 17:00:35', '2018-12-13 17:00:35', 1),
(17, 71, 'Cesar', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', '7', 1, '2018-12-13 17:04:13', '2018-12-13 17:04:13', 1),
(18, 71, 'Cesar Correia', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', 's', 1, '2018-12-14 10:43:16', '2018-12-14 10:43:16', 1),
(19, 71, 'Cesar Correia', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', '1', 1, '2018-12-14 10:51:47', '2018-12-14 10:51:47', 1),
(20, 71, 'Cesar Correia', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', '4', 4, '2018-12-17 10:09:52', '2018-12-17 10:09:52', 1),
(21, 71, 'Cesar Correia', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', '21', 1, '2018-12-17 10:20:59', '2018-12-17 10:20:59', 1),
(22, 71, 'Cesar Correia', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', '8', 9, '2018-12-18 10:46:01', '2018-12-18 10:46:01', 1),
(23, 71, 'Cesar Correia', 'Correia', 'Rua das Searas 186 R/C Esq. Post', NULL, 'Canelas V N Gaia', '4410-254', '1', 8, '2018-12-21 10:57:04', '2018-12-21 10:57:04', 1);

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
(1, 71, 1, 1, '2018-08-07 10:17:01', '2018-11-23 12:54:22'),
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
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_11_20_115947_houses_dates_ranges', 1),
(2, '2018_11_20_123122_fap_houses_dates_ranges', 2);

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
