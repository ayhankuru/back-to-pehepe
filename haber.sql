-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Ara 2014, 03:09:42
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `haber`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fotograf`
--

CREATE TABLE IF NOT EXISTS `fotograf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `foto_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `foto_dizin` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haber`
--

CREATE TABLE IF NOT EXISTS `haber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(1000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `content` varchar(2000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `foto_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haber_kat`
--

CREATE TABLE IF NOT EXISTS `haber_kat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `haber_id` int(11) NOT NULL,
  `kat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(1000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(1000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `date`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
