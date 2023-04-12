-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 09 Oca 2015, 16:07:13
-- Sunucu sürümü: 5.5.40-cll
-- PHP Sürümü: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `musterii_etutsistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `branslar`
--

CREATE TABLE IF NOT EXISTS `branslar` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bransi` text COLLATE utf8_turkish_ci NOT NULL,
  `idogretmen` int(11) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dosya`
--

CREATE TABLE IF NOT EXISTS `dosya` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `dosyaad` text NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `genelayarlar`
--

CREATE TABLE IF NOT EXISTS `genelayarlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etutistek` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `izinler`
--

CREATE TABLE IF NOT EXISTS `izinler` (
  `izid` int(11) NOT NULL AUTO_INCREMENT,
  `izogretmenid` int(11) NOT NULL,
  `bastarih` text COLLATE utf8_turkish_ci NOT NULL,
  `sontarih` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`izid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE IF NOT EXISTS `kullanici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullaniciadi` text COLLATE utf8_turkish_ci NOT NULL,
  `adsoyad` text COLLATE utf8_turkish_ci NOT NULL,
  `sifre` text COLLATE utf8_turkish_ci NOT NULL,
  `sinif` text COLLATE utf8_turkish_ci NOT NULL,
  `ipadresi` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` text COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(11) NOT NULL,
  `resim` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kullaniciadi`, `adsoyad`, `sifre`, `sinif`, `ipadresi`, `tarih`, `yetki`, `resim`) VALUES
(1, 'ekonomikhost', 'Demo', 'e10adc3949ba59abbe56e057f20f883e', '', '127.0.0.1', '', 1, ''),
(2, 'ogretmen', 'Demo Öğretmen', 'e10adc3949ba59abbe56e057f20f883e', '', '', '01/09/2015 03:49:33', 2, 'yuklenenler/kullanici/de9621d4c6fa69ce8aaa90f00e9110c5_'),
(3, 'ogrenci', 'Demo Öğrenci', 'e10adc3949ba59abbe56e057f20f883e', '1A', '', '01/09/2015 03:50:09', 3, 'yuklenenler/kullanici/2175f8c5cd9604f6b1e576b252d4c86e_');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `liste`
--

CREATE TABLE IF NOT EXISTS `liste` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `ogrenci` text COLLATE utf8_turkish_ci NOT NULL,
  `sinif` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` text COLLATE utf8_turkish_ci NOT NULL,
  `saat` text COLLATE utf8_turkish_ci NOT NULL,
  `yoklama` int(11) NOT NULL,
  `ogretmen` text COLLATE utf8_turkish_ci NOT NULL,
  `konusu` text COLLATE utf8_turkish_ci NOT NULL,
  `icerigi` text COLLATE utf8_turkish_ci NOT NULL,
  `istekmi` int(11) NOT NULL,
  `onayi` int(11) NOT NULL,
  `yapildimi` int(11) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE IF NOT EXISTS `mesajlar` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `ogrencikim` int(11) NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `konu` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `okunma` int(11) NOT NULL,
  `yoneticioku` int(11) NOT NULL,
  `gonderilen` int(11) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odevkontrol`
--

CREATE TABLE IF NOT EXISTS `odevkontrol` (
  `kontrolid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ogrenciid` int(11) NOT NULL,
  `sinif` text COLLATE utf8_turkish_ci NOT NULL,
  `konu` text COLLATE utf8_turkish_ci NOT NULL,
  `verilist` text COLLATE utf8_turkish_ci NOT NULL,
  `teslimt` text COLLATE utf8_turkish_ci NOT NULL,
  `kontrol` int(11) NOT NULL,
  `ogretmenid` int(11) NOT NULL,
  `odevid` int(11) NOT NULL,
  PRIMARY KEY (`kontrolid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odevler`
--

CREATE TABLE IF NOT EXISTS `odevler` (
  `odevid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sinif` text COLLATE utf8_turkish_ci NOT NULL,
  `ogretmeni` text COLLATE utf8_turkish_ci NOT NULL,
  `sorucozum` int(11) NOT NULL,
  `odevkonu` text COLLATE utf8_turkish_ci NOT NULL,
  `odevicerik` text COLLATE utf8_turkish_ci NOT NULL,
  `verilistarih` text COLLATE utf8_turkish_ci NOT NULL,
  `teslimtarih` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`odevid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevular`
--

CREATE TABLE IF NOT EXISTS `randevular` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `tarih` text CHARACTER SET latin1 NOT NULL,
  `saat` text CHARACTER SET latin1 NOT NULL,
  `konu` text COLLATE utf8_turkish_ci NOT NULL,
  `katilim` int(11) NOT NULL,
  `limiti` int(11) NOT NULL,
  `sinif` varchar(225) COLLATE utf8_turkish_ci NOT NULL,
  `ogretmen` text CHARACTER SET latin1 NOT NULL,
  `onay` int(11) NOT NULL,
  `yap` int(11) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
