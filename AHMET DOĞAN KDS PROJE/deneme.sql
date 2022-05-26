-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 05 Oca 2022, 14:56:52
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `deneme`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cinsiyet`
--

DROP TABLE IF EXISTS `cinsiyet`;
CREATE TABLE IF NOT EXISTS `cinsiyet` (
  `c_id` int(1) NOT NULL,
  `c_ad` varchar(5) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `cinsiyet`
--

INSERT INTO `cinsiyet` (`c_id`, `c_ad`) VALUES
(1, 'Kadın'),
(2, 'Erkek');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktor`
--

DROP TABLE IF EXISTS `doktor`;
CREATE TABLE IF NOT EXISTS `doktor` (
  `d_id` bigint(11) NOT NULL,
  `d_ad` varchar(9) COLLATE utf8_turkish_ci NOT NULL,
  `d_soyad` varchar(9) COLLATE utf8_turkish_ci NOT NULL,
  `d_tel` bigint(10) NOT NULL,
  `hastane_id` int(2) NOT NULL,
  `unvan_id` int(1) NOT NULL,
  `uzman_id` int(1) NOT NULL,
  `c_id` int(1) NOT NULL,
  PRIMARY KEY (`d_id`),
  KEY `unvan_id` (`unvan_id`),
  KEY `uzman_id` (`uzman_id`),
  KEY `c_id` (`c_id`),
  KEY `hastane_id` (`hastane_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `doktor`
--

INSERT INTO `doktor` (`d_id`, `d_ad`, `d_soyad`, `d_tel`, `hastane_id`, `unvan_id`, `uzman_id`, `c_id`) VALUES
(15140247352, 'FİDAN', 'ATUĞ', 5363948304, 3, 4, 5, 1),
(16168021566, 'SADETTİN', 'KIRAL', 5361813159, 3, 1, 1, 2),
(16672515148, 'SİNEM', 'YILDIRAN', 5516788607, 2, 3, 5, 1),
(17281965942, 'HACİRE', 'ER', 5517135438, 2, 3, 5, 1),
(18292461058, 'SEDA', 'GÜNDOĞDU', 5518611464, 2, 3, 1, 1),
(22535687020, 'MAHMUT', 'DİNLER', 5365405135, 1, 1, 1, 2),
(25432074030, 'NURAN ', 'KANTAR', 5516847808, 2, 1, 5, 1),
(26266628154, 'ZEYNEL ', 'SAVCI ', 5519656809, 1, 5, 2, 2),
(26764529472, 'SELMAN', 'AKÇE', 5361157192, 3, 1, 5, 2),
(27367158694, 'DURDANE', 'NAMLI', 5516963404, 3, 1, 4, 1),
(28255569608, 'HABİP', 'ÇETİN', 5363675938, 3, 3, 1, 2),
(28936457026, 'EZGİCAN', 'ERTAŞ', 5360543221, 3, 2, 3, 1),
(31958103796, 'ERHAN', 'AYDINÖZ', 5513677625, 1, 5, 3, 2),
(33241890482, 'ZİNNET', 'NAĞAŞ', 5516485472, 1, 3, 1, 1),
(35677270142, 'MEHMET', 'KAYA', 5368731785, 2, 1, 1, 2),
(36181207570, 'ORHAN ', 'KÖSEN', 5361773267, 1, 4, 4, 2),
(49540549594, 'NADYE', 'AKPINAR', 5365437694, 1, 2, 3, 1),
(66061287804, 'NERİMAN', 'TENGİZ', 5519416489, 2, 1, 4, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `evre`
--

DROP TABLE IF EXISTS `evre`;
CREATE TABLE IF NOT EXISTS `evre` (
  `evre_id` int(1) NOT NULL,
  PRIMARY KEY (`evre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `evre`
--

INSERT INTO `evre` (`evre_id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hasta`
--

DROP TABLE IF EXISTS `hasta`;
CREATE TABLE IF NOT EXISTS `hasta` (
  `h_id` bigint(11) NOT NULL,
  `h_ad` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `h_soyad` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `h_tel` bigint(10) DEFAULT NULL,
  `kan_id` int(1) DEFAULT NULL,
  `c_id` int(1) DEFAULT NULL,
  PRIMARY KEY (`h_id`),
  KEY `kan_id` (`kan_id`,`c_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hasta`
--

INSERT INTO `hasta` (`h_id`, `h_ad`, `h_soyad`, `h_tel`, `kan_id`, `c_id`) VALUES
(11111111111, 'Ege', 'DİNCER', 5315313131, 3, 2),
(11458987508, 'Emine', 'KAYAN', 5319136461, 2, 1),
(14012517630, 'Niyazi', 'ÖRS', 5316180228, 2, 2),
(14464139350, 'Gökhan', 'ATCI', 5312596607, 5, 2),
(14578963254, 'Müslüm', 'DOĞRU', 5326547895, 3, 1),
(15352141462, 'Barış', 'SOYSAL', 5316138971, 5, 2),
(16112378920, 'Ebru', 'AĞCA', 5314282095, 5, 1),
(18329368886, 'Mehmet Aydın', 'BÖLEK', 5317317200, 1, 2),
(18517258074, 'İbrahim Edhem', 'SÜZEN', 5312492208, 1, 2),
(21728263898, 'Mesut', 'AKKUŞ', 5313008621, 5, 2),
(23699197646, 'Şengül', 'ÖZTÜRK', 5317220934, 2, 1),
(24326173828, 'Eda', 'ÖZTÜRK', 5314909237, 7, 1),
(26342611544, 'Asena', 'GÜZEL', 5311122068, 7, 1),
(31832198702, 'Tuana Su', 'AKSOY', 5311900301, 1, 1),
(31886205418, 'Mehmet Ali ', 'ORUÇ', 5364615530, 6, 2),
(32453097610, 'Barış', 'ÇINAR', 5314607793, 6, 2),
(33749214148, 'Beyzanur', 'ŞAHİN', 5319779735, 5, 1),
(34837831636, 'Bircan', 'AKMEHMET', 5315850562, 6, 2),
(37594109918, 'Betül', 'ALTUNTAŞ', 5446750062, 1, 1),
(39304677762, 'Revşen', 'UYSAL', 5444919265, 2, 1),
(42649573774, 'Osman Can', 'GÜRDAP', 5447252797, 8, 2),
(43225546922, 'Hayru Nisa', 'BAĞLAMA', 5314342433, 7, 1),
(43573150536, 'Yusuf', 'ERONAT', 5313026194, 3, 2),
(45645645698, 'Elif', 'DENEME', 5305248567, 2, 1),
(45678912345, 'Hasan', 'KOŞAN', 5469874535, 3, 2),
(47895412359, 'Ahmet', 'DENEME', 5312597865, 6, 2),
(54337170752, 'Hikmet Barış', 'OĞUZ', 5319302314, 7, 2),
(54565177066, 'Beyza Nur', 'ÖZTÜRK', 5316996345, 7, 1),
(59566095296, 'Enes Furkan', 'YAVUZ', 5440450754, 7, 2),
(60370480222, 'Esra', 'ŞENCANOĞLU', 5310511206, 1, 1);

--
-- Tetikleyiciler `hasta`
--
DROP TRIGGER IF EXISTS `hasta_ad_soyad_harf`;
DELIMITER $$
CREATE TRIGGER `hasta_ad_soyad_harf` BEFORE INSERT ON `hasta` FOR EACH ROW SET 
new.h_ad=
concat(upper(substring(new.h_ad,1,1)), lower(substring(new.h_ad,2))), new.h_soyad=Upper(new.h_soyad)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastane`
--

DROP TABLE IF EXISTS `hastane`;
CREATE TABLE IF NOT EXISTS `hastane` (
  `hastane_id` int(2) NOT NULL,
  `hastane_ad` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`hastane_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hastane`
--

INSERT INTO `hastane` (`hastane_id`, `hastane_ad`) VALUES
(1, 'Medical Park Hastanesi'),
(2, 'Acıbadem Hastanesi'),
(3, 'Medipol Hastanesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kangrubu`
--

DROP TABLE IF EXISTS `kangrubu`;
CREATE TABLE IF NOT EXISTS `kangrubu` (
  `kan_id` int(1) NOT NULL,
  `kan_ad` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kangrubu`
--

INSERT INTO `kangrubu` (`kan_id`, `kan_ad`) VALUES
(1, '0+'),
(2, '0-'),
(3, 'AB+'),
(4, 'AB-'),
(5, 'A+'),
(6, 'A-'),
(7, 'B+'),
(8, 'B-');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kanserturu`
--

DROP TABLE IF EXISTS `kanserturu`;
CREATE TABLE IF NOT EXISTS `kanserturu` (
  `ktur_id` int(2) NOT NULL,
  `ktur_ad` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ktur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kanserturu`
--

INSERT INTO `kanserturu` (`ktur_id`, `ktur_ad`) VALUES
(1, 'Rahim Ağzı Kanseri'),
(2, 'Yumurtalık Kanseri'),
(3, 'Lenf Kanseri'),
(4, 'Mide Kanseri'),
(5, 'Akciğer Kanseri'),
(6, 'Pankreas Kanseri'),
(7, 'Meme Kanseri'),
(8, 'Prostat Kanseri'),
(9, 'Kolon Kanseri'),
(10, 'Deri Kanseri');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `muayene`
--

DROP TABLE IF EXISTS `muayene`;
CREATE TABLE IF NOT EXISTS `muayene` (
  `m_id` int(2) NOT NULL,
  `d_id` bigint(11) NOT NULL,
  `h_id` bigint(11) NOT NULL,
  `ted_id` int(1) NOT NULL,
  `evre_id` int(1) NOT NULL,
  `ktur_id` int(1) NOT NULL,
  `m_tarih` date NOT NULL,
  PRIMARY KEY (`m_id`),
  KEY `d_id` (`d_id`),
  KEY `h_id` (`h_id`),
  KEY `ted_id` (`ted_id`),
  KEY `evre_id` (`evre_id`),
  KEY `ktur_id` (`ktur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `muayene`
--

INSERT INTO `muayene` (`m_id`, `d_id`, `h_id`, `ted_id`, `evre_id`, `ktur_id`, `m_tarih`) VALUES
(1, 18292461058, 31886205418, 5, 3, 3, '2021-01-10'),
(2, 27367158694, 15352141462, 3, 1, 10, '2021-12-15'),
(3, 16672515148, 43573150536, 5, 2, 4, '2021-08-20'),
(4, 25432074030, 16112378920, 3, 4, 1, '2021-09-24'),
(6, 31958103796, 18517258074, 2, 4, 5, '2021-06-30'),
(7, 66061287804, 26342611544, 1, 3, 1, '2021-10-22'),
(8, 33241890482, 33749214148, 4, 2, 4, '2021-04-27'),
(9, 17281965942, 14464139350, 3, 4, 8, '2021-07-24'),
(10, 26266628154, 32453097610, 4, 1, 10, '2021-03-03'),
(11, 16168021566, 60370480222, 3, 1, 6, '2021-02-21'),
(12, 49540549594, 11458987508, 2, 3, 1, '2021-08-06'),
(13, 15140247352, 18329368886, 2, 3, 6, '2021-12-01'),
(14, 22535687020, 43225546922, 3, 4, 3, '2021-10-04'),
(15, 36181207570, 23699197646, 1, 2, 7, '2021-07-30'),
(16, 26764529472, 34837831636, 4, 1, 9, '2021-05-30'),
(17, 35677270142, 54337170752, 3, 1, 10, '2021-03-09'),
(18, 28255569608, 24326173828, 3, 4, 7, '2021-05-27'),
(19, 28936457026, 54565177066, 3, 4, 4, '2021-12-17'),
(21, 31958103796, 14012517630, 3, 2, 10, '2021-01-21'),
(22, 66061287804, 39304677762, 2, 1, 10, '2021-08-14'),
(23, 33241890482, 37594109918, 2, 2, 6, '2021-09-30'),
(24, 17281965942, 59566095296, 1, 4, 3, '2021-07-14'),
(25, 49540549594, 42649573774, 4, 3, 6, '2021-04-10'),
(26, 15140247352, 11111111111, 1, 1, 1, '2021-11-10'),
(27, 17281965942, 11111111111, 3, 3, 4, '2021-10-13'),
(28, 16672515148, 11111111111, 2, 3, 2, '2021-11-19'),
(29, 25432074030, 14578963254, 3, 3, 5, '2021-04-10'),
(30, 28255569608, 33749214148, 2, 2, 2, '2021-02-10'),
(31, 66061287804, 14012517630, 4, 3, 5, '2021-05-18'),
(32, 36181207570, 23699197646, 4, 4, 5, '2021-05-22'),
(33, 28936457026, 11111111111, 3, 3, 5, '2021-05-25'),
(34, 49540549594, 18517258074, 1, 4, 7, '2021-03-14'),
(35, 22535687020, 45678912345, 3, 3, 5, '2021-10-29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tedavi`
--

DROP TABLE IF EXISTS `tedavi`;
CREATE TABLE IF NOT EXISTS `tedavi` (
  `ted_id` int(1) NOT NULL,
  `ted_ad` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ted_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tedavi`
--

INSERT INTO `tedavi` (`ted_id`, `ted_ad`) VALUES
(1, 'Cerrahi Tedavi'),
(2, 'Radyoterapi Tedavisi'),
(3, 'Hormon Tedavisi'),
(4, 'Kemoterapi Tedavisi'),
(5, 'Biyolojik Tedavi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `unvan`
--

DROP TABLE IF EXISTS `unvan`;
CREATE TABLE IF NOT EXISTS `unvan` (
  `unvan_id` int(1) NOT NULL,
  `unvan_ad` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`unvan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `unvan`
--

INSERT INTO `unvan` (`unvan_id`, `unvan_ad`) VALUES
(1, 'Doktor'),
(2, 'Uzman Doktor'),
(3, 'Yardımcı Doçent Doktor'),
(4, 'Doçent Doktor'),
(5, 'Profesör Doktor');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uzman`
--

DROP TABLE IF EXISTS `uzman`;
CREATE TABLE IF NOT EXISTS `uzman` (
  `uzman_id` int(1) NOT NULL,
  `uzman_ad` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`uzman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uzman`
--

INSERT INTO `uzman` (`uzman_id`, `uzman_ad`) VALUES
(1, 'Jinekolojik Onkoloji'),
(2, 'Radyolojik Onkoloji'),
(3, 'Cerrahi Onkoloji'),
(4, 'Medikal Onkoloji'),
(5, 'Pediatrik Onkoloji');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

DROP TABLE IF EXISTS `yonetici`;
CREATE TABLE IF NOT EXISTS `yonetici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`id`, `ad`, `sifre`) VALUES
(1, 'ahmet', 'sifre');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `doktor`
--
ALTER TABLE `doktor`
  ADD CONSTRAINT `doktor_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `cinsiyet` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doktor_ibfk_2` FOREIGN KEY (`unvan_id`) REFERENCES `unvan` (`unvan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doktor_ibfk_3` FOREIGN KEY (`uzman_id`) REFERENCES `uzman` (`uzman_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doktor_ibfk_4` FOREIGN KEY (`hastane_id`) REFERENCES `hastane` (`hastane_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `hasta`
--
ALTER TABLE `hasta`
  ADD CONSTRAINT `hasta_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `cinsiyet` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasta_ibfk_2` FOREIGN KEY (`kan_id`) REFERENCES `kangrubu` (`kan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `muayene`
--
ALTER TABLE `muayene`
  ADD CONSTRAINT `muayene_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `doktor` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `muayene_ibfk_2` FOREIGN KEY (`h_id`) REFERENCES `hasta` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `muayene_ibfk_3` FOREIGN KEY (`ted_id`) REFERENCES `tedavi` (`ted_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `muayene_ibfk_4` FOREIGN KEY (`evre_id`) REFERENCES `evre` (`evre_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `muayene_ibfk_5` FOREIGN KEY (`ktur_id`) REFERENCES `kanserturu` (`ktur_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
