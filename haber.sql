-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 Ara 2014, 00:37:14
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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `fotograf`
--

INSERT INTO `fotograf` (`id`, `foto_name`, `foto_desc`, `foto_dizin`, `date`) VALUES
(1, 'cover_1644', 'Bu Dosya admin tarafından eklendi ', './public/upload/cover_1644.gif', '2014-12-10 22:57:59'),
(2, 'cover_7353', 'Bu Dosya admin tarafından eklendi ', './public/upload/cover_7353.jpeg', '2014-12-10 23:07:58');

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `haber`
--

INSERT INTO `haber` (`id`, `baslik`, `content`, `foto_id`, `tag_id`, `date`, `aktif`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ', '\r\n Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.', 1, 1, '2014-12-10 22:57:59', 0),
(2, 'Test 545464', 'Lorem ipsum dolor sit amet, stet facer saepe mea eu. Magna exerci gloriatur has ad. Possim melius ei his. Sententiae posidonium accommodare no ius, eu qui clita tritani, pri eripuit oporteat eu. Harum recusabo te sit, sea meis argumentum ei. Vix ad assum graeci, ad mea sint petentium.\r\n\r\nId qui regione legimus constituam, pro at probo democritum. Et per accumsan elaboraret, mea ea oratio option virtute. Vix at numquam ponderum. Ex feugait tibique suavitate ius, ea vis inimicus ocurreret.\r\n\r\nSimul dictas his ut, ea pri porro idque dolore. Legere democritum mea ad, ad discere qualisque elaboraret cum. Mei ex nominati gubergren aliquando. Verterem intellegebat sed eu, agam clita propriae ei eum. Vix quem unum an, pro et audiam facilisis. In brute detracto mei, ei prima nostrum usu. Te per oblique labores accumsan, at eos reque epicurei.\r\n\r\nDuo mazim tacimates incorrupte no. Voluptaria definitiones conclusionemque ius eu, dico docendi mediocritatem pro no. Vis cu noster inimicus salutatus, ut cum alia fabellas. At per labore voluptatibus, at vim aliquam docendi scaevola, vix ad meliore definitionem. An sed vero laudem, te nisl hinc facilisi vel. Est eu albucius aliquando expetendis, choro dolor vix et.\r\n\r\nAt adhuc quaeque fabulas eam, detraxit expetendis mei ne. In quis partem vituperatoribus mea, nam ne ridens deseruisse, ad ipsum assum dicam eam. In sea graeci ceteros splendide, et pro verear commodo liberavisse. Possit recteque has ad, id inani delicata disputando sea. Verterem signiferumque usu ei, ad ius velit quaeque.', 2, 2, '2014-12-10 23:07:58', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haber_kat`
--

CREATE TABLE IF NOT EXISTS `haber_kat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `haber_id` int(11) NOT NULL,
  `kat_id` int(11) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `haber_kat`
--

INSERT INTO `haber_kat` (`id`, `haber_id`, `kat_id`, `aktif`) VALUES
(1, 1, 2, 0),
(2, 2, 3, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(1000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `baslik`, `aciklama`, `date`, `aktif`) VALUES
(2, 'Test Kategori', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wis', '2014-12-10 22:57:12', 0),
(3, 'Test 2', 'gdfgdfg', '2014-12-10 23:07:16', 0),
(4, 'test 4', 'gdfgdg', '2014-12-10 23:34:19', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `tag`
--

INSERT INTO `tag` (`id`, `content`, `date`, `aktif`) VALUES
(1, 'bla,bla,bla', '2014-12-10 22:57:59', 0),
(2, 'tst,tets,dgfgdf', '2014-12-10 23:07:58', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(1000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
