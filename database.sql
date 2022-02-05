-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 03 Şub 2022, 16:56:22
-- Sunucu sürümü: 10.3.32-MariaDB
-- PHP Sürümü: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `craoxy_minelia`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminaccount`
--

CREATE TABLE `adminaccount` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1024) NOT NULL,
  `writeDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `blogs`
--

INSERT INTO `blogs` (`id`, `postID`, `title`, `content`, `writeDate`) VALUES
(6, 19564, 'Merhaba bu bir deneme yazıdır!', 'Merhaba, scripte hoş geldin. detaylı bilgi için bana discorddan ulaşabilirsin. burakö#1337', '2022-02-01 20:11:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `firma`
--

CREATE TABLE `firma` (
  `id` int(11) NOT NULL,
  `firmaName` varchar(255) NOT NULL,
  `firmaURL` varchar(1024) NOT NULL,
  `firmaDesc` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `firma`
--

INSERT INTO `firma` (`id`, `firmaName`, `firmaURL`, `firmaDesc`) VALUES
(1, 'LeaderOS (Örnek)', 'https://i.hizliresim.com/54gfi4o.jpg', 'LeaderOS v5, 2016 yılından bu yana geliştirilen ve bize güvenen yüzlerce müşteriye sahip bir Minecraft Web Site scriptidir. Her zaman yenilikçi tasarım ve teknolojiler kullanarak yüzlerce müşterimizin sunucu yönetimini kolaylaştırıyoruz.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimda`
--

CREATE TABLE `hakkimda` (
  `id` int(11) NOT NULL,
  `hakkimda_isim` varchar(255) NOT NULL,
  `hakkimda_logo` varchar(1024) NOT NULL,
  `hakkimda_yazi` varchar(1024) NOT NULL,
  `hakkimda_url` varchar(1024) NOT NULL,
  `updateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `hakkimda`
--

INSERT INTO `hakkimda` (`id`, `hakkimda_isim`, `hakkimda_logo`, `hakkimda_yazi`, `hakkimda_url`, `updateDate`) VALUES
(1, 'İsminiz girin.', 'https://resimkutuphanesi.play.tc/library/builder.png', 'Biyografinizi giriniz.', 'https://resimkutuphanesi.play.tc/library/goldblock.png', '2022-02-01 16:09:05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `myskills`
--

CREATE TABLE `myskills` (
  `id` int(11) NOT NULL,
  `skillName` varchar(255) NOT NULL,
  `skillRate` int(3) NOT NULL,
  `skillColor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `myskills`
--

INSERT INTO `myskills` (`id`, `skillName`, `skillRate`, `skillColor`) VALUES
(17, 'asp.net', 100, '#18f727');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `discord` varchar(255) NOT NULL,
  `spotify` varchar(255) NOT NULL,
  `papara` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `social`
--

INSERT INTO `social` (`id`, `instagram`, `facebook`, `discord`, `spotify`, `papara`, `whatsapp`, `github`) VALUES
(8, '#', '#', '#', '#', '#', '#', '#');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adminaccount`
--
ALTER TABLE `adminaccount`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `firma`
--
ALTER TABLE `firma`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkimda`
--
ALTER TABLE `hakkimda`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `myskills`
--
ALTER TABLE `myskills`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adminaccount`
--
ALTER TABLE `adminaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `firma`
--
ALTER TABLE `firma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimda`
--
ALTER TABLE `hakkimda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `myskills`
--
ALTER TABLE `myskills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
