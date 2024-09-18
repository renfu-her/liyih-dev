-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2023 年 07 月 12 日 05:11
-- 伺服器版本： 5.7.27-30
-- PHP 版本： 7.3.31-buster

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `liyih`
--
CREATE DATABASE IF NOT EXISTS `liyih` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `liyih`;

-- --------------------------------------------------------

--
-- 資料表結構 `abouts`
--

CREATE TABLE `abouts` (
  `abouts_no` int(10) NOT NULL,
  `abouts_name` varchar(30) NOT NULL,
  `abouts_name_en` varchar(1024) NOT NULL,
  `abouts_sort` int(10) NOT NULL,
  `abouts_hide` varchar(10) NOT NULL,
  `abouts_content` longtext NOT NULL,
  `abouts_content_en` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `abouts`
--

INSERT INTO `abouts` (`abouts_no`, `abouts_name`, `abouts_name_en`, `abouts_sort`, `abouts_hide`, `abouts_content`, `abouts_content_en`) VALUES
(1, '關於我們', 'About', 1, '1', '<p><span style=\"color: #1e87b0;\"><strong><span style=\"font-size: 18pt;\">30年經驗，專業工廠生產</span></strong></span></p>\r\n<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">勵億塑膠股份有限公司」旗下專門提供食品包裝袋批發、零售服務的品牌。勵億塑膠專門生產品質優良的軟性積層包裝材料，為各種不同產業提供高品質的包裝。</span></p>\r\n<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">勵億塑膠</span><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">秉持誠信、專業、永續經營的理念，以多年專業的食品塑膠袋生產經驗，獲得許多知名食品大廠指定愛用，如：統一、全家、義美、乖乖&hellip;&hellip;等口碑品牌。</span></p>\r\n<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">精袋師承襲勵億塑膠</span><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">超過30年的食品包裝袋製造經驗，自產自銷一條龍服務，專門提供品質優越、價格實惠的各式精美食品包裝袋。</span></p>\r\n<p><span style=\"font-family: 微軟正黑體; font-size: 14pt; color: #1e87b0;\"><span style=\"font-size: 18pt;\"><strong>品質優越， SGS逐年檢驗</strong></span><br /></span></p>\r\n<p>勵億塑膠 工廠經過ISO 22000、HACCP食品安全管制系統認證，全系列產品使用環保無溶劑貼合，並且每年固定送檢通過SGS檢驗，確保符合食品法規，同時符合八大重金屬與甲苯、二甲苯、醋酸乙酯(EAC)等標準量測值，在食品包裝安全方面絕對值得您信賴！</p>\r\n<p>勵億塑膠擁有最齊全、符合食品法規的軟性包裝袋，總樣式超過100種，皆由台灣優秀生產團隊設計製造，創新開模生產各式造型塑膠袋，同時在食品塑膠袋的安全、密封強韌、耐裝、耐摩擦、耐穿刺、柔軟度調整、易撕順手度方面，精袋師 (勵億塑膠) 都擁有無可比擬的好品質。</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '<p>&nbsp;<span style=\"font-size: 18pt; color: #1e87b0;\"><strong><span style=\"font-family: arial, helvetica, sans-serif;\">As a soft flexible packaging supplier for more than 30 years</span></strong></span></p>\r\n<p><span style=\"font-size: 14pt; font-family: arial, helvetica, sans-serif;\">We offer a complete range of plastic bags and laminate printing film rolls for customers worldwide.&nbsp; </span></p>\r\n<p><span style=\"font-size: 14pt; font-family: arial, helvetica, sans-serif;\">We have our own production line starting from raw&nbsp;</span><span style=\"font-size: 14pt; font-family: arial, helvetica, sans-serif;\">material selection, gravure printing process, </span></p>\r\n<p><span style=\"font-size: 14pt; font-family: arial, helvetica, sans-serif;\">solvent-free/dry lamination process, double-side inspection,</span></p>\r\n<p><span style=\"font-size: 14pt; font-family: arial, helvetica, sans-serif;\">slitting process, and bag-making workhouse all in one factory and make sure that </span></p>\r\n<p><span style=\"font-size: 14pt; font-family: arial, helvetica, sans-serif;\">our quality and reliable bags and packing materials and services are on schedule for</span></p>\r\n<p><span style=\"font-size: 14pt; font-family: arial, helvetica, sans-serif;\">our customers and our deliveries are on time as promised.</span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),
(9, '相關認證', 'Relevant Certification', 3, '1', '<p><img src=\"/photo/37058af4f797ff3242306264852ddff9.jpg\" width=\"350\" /></p>', '<p><img src=\"/photo/6d6adcf0aca7902bba829535d08ff601.jpg\" width=\"350\" /></p>'),
(8, '服務項目', 'Service Items', 2, '1', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `banner`
--

CREATE TABLE `banner` (
  `banner_no` int(10) NOT NULL,
  `banner_sort` int(10) NOT NULL,
  `banner_hide` varchar(10) NOT NULL,
  `banner_class` varchar(50) DEFAULT NULL,
  `banner_pic_b` varchar(100) DEFAULT NULL,
  `banner_pic_s` varchar(100) DEFAULT NULL,
  `banner_pic_b_mob` varchar(100) DEFAULT NULL,
  `banner_pic_s_mob` varchar(100) DEFAULT NULL,
  `banner_title` varchar(500) DEFAULT NULL,
  `banner_link` varchar(200) DEFAULT NULL,
  `banner_href` varchar(100) DEFAULT NULL,
  `banner_date` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `banner`
--

INSERT INTO `banner` (`banner_no`, `banner_sort`, `banner_hide`, `banner_class`, `banner_pic_b`, `banner_pic_s`, `banner_pic_b_mob`, `banner_pic_s_mob`, `banner_title`, `banner_link`, `banner_href`, `banner_date`) VALUES
(6, 0, '1', '中文版', '1120509113040.jpg', '1120509113040_s.jpg', '', '', 'banner', '', '無超連結', '2023-05-09 23:30:40'),
(7, 0, '1', '英文版', '1120509113053.jpg', '1120509113053_s.jpg', '', '', 'banner', '', '無超連結', '2023-05-09 23:30:53');

-- --------------------------------------------------------

--
-- 資料表結構 `banner2`
--

CREATE TABLE `banner2` (
  `banner2_no` int(10) NOT NULL,
  `banner2_sort` int(10) NOT NULL,
  `banner2_hide` varchar(10) NOT NULL,
  `banner2_pic_b` varchar(100) DEFAULT NULL,
  `banner2_pic_s` varchar(100) DEFAULT NULL,
  `banner2_pic_b_mob` varchar(100) DEFAULT NULL,
  `banner2_pic_s_mob` varchar(100) DEFAULT NULL,
  `banner2_title` varchar(500) DEFAULT NULL,
  `banner2_link` varchar(200) DEFAULT NULL,
  `banner2_href` varchar(100) DEFAULT NULL,
  `banner2_date` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `banner2`
--

INSERT INTO `banner2` (`banner2_no`, `banner2_sort`, `banner2_hide`, `banner2_pic_b`, `banner2_pic_s`, `banner2_pic_b_mob`, `banner2_pic_s_mob`, `banner2_title`, `banner2_link`, `banner2_href`, `banner2_date`) VALUES
(1, 2, '1', '1120507050747.jpg', '1120507050747_s.jpg', '', '', '首頁輪播(英)', '', '無超連結', '2023-05-07 17:07:47'),
(2, 1, '1', '1120508080340.jpg', '1120508080340_s.jpg', '', '', '首頁輪播(英)2', '', '無超連結', '2023-05-08 20:03:40');

-- --------------------------------------------------------

--
-- 資料表結構 `download`
--

CREATE TABLE `download` (
  `download_no` int(10) NOT NULL,
  `download_title` varchar(200) DEFAULT NULL,
  `download_file` varchar(500) DEFAULT NULL,
  `download_sort` int(10) DEFAULT NULL,
  `download_class` varchar(1000) DEFAULT NULL,
  `download_pic_b` varchar(256) DEFAULT NULL,
  `download_pic_s` varchar(256) DEFAULT NULL,
  `download_hide` varchar(10) DEFAULT NULL,
  `download_edituser` varchar(50) DEFAULT NULL,
  `download_edittime` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `download`
--

INSERT INTO `download` (`download_no`, `download_title`, `download_file`, `download_sort`, `download_class`, `download_pic_b`, `download_pic_s`, `download_hide`, `download_edituser`, `download_edittime`) VALUES
(29, 'HTF22C00835-MOPP+VMPET+CPP', 'HTF22C00835-MOPP+VMPET+CPP.pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-06-05 16:46:26'),
(25, '20220812-HACCP認證證書(20220829~20250829)', '20220812-HACCP認證證書(20220829~20250829).pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-06-05 16:44:44'),
(26, '20220812-ISO22000-2018認證證書(20220829~20250829)', '20220812-ISO22000-2018認證證書(20220829~20250829).pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-06-05 16:45:11'),
(27, 'HTF22C00829-CPP', 'HTF22C00829-CPP.pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-06-05 16:45:32'),
(28, 'HTF22C00831-LLDPE', 'HTF22C00831-LLDPE.pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-06-05 16:45:58'),
(24, 'MOPP/CPP SGS檢驗報告', 'HTF22C00834-MOPP+CPP.pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-05-26 08:32:08'),
(23, 'OPP/CPP SGS檢驗報告', 'HTF22C00838-OPP+CPP.pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-05-26 08:31:46'),
(30, 'HTF22C00836-NY+CPP', 'HTF22C00836-NY+CPP.pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-06-05 16:46:52'),
(31, 'HTF22C00839-PET+AL+CPP', 'HTF22C00839-PET+AL+CPP.pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-06-05 16:47:11'),
(32, 'HTF22C00841-PET+CPP', 'HTF22C00841-PET+CPP.pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-06-05 16:47:31'),
(33, 'HTF22C00842-PET+VMCPP', 'HTF22C00842-PET+VMCPP.pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-06-05 16:47:49'),
(34, 'HTF22C00843-PET+VMPET+CPP', 'HTF22C00843-PET+VMPET+CPP.pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-06-05 16:48:11'),
(35, 'HTF22C00844-PET+VMPET+LLDPE', 'HTF22C00844-PET+VMPET+LLDPE.pdf', 0, '中文版', NULL, NULL, '1', 'liyih', '2023-06-05 16:48:32');

-- --------------------------------------------------------

--
-- 資料表結構 `goods_class`
--

CREATE TABLE `goods_class` (
  `goods_class_no` int(10) NOT NULL,
  `goods_class_name` varchar(30) NOT NULL,
  `goods_class_name_en` varchar(200) NOT NULL,
  `goods_class_sort` int(10) NOT NULL,
  `goods_class_hide` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `goods_class`
--

INSERT INTO `goods_class` (`goods_class_no`, `goods_class_name`, `goods_class_name_en`, `goods_class_sort`, `goods_class_hide`) VALUES
(4, '立體吐司袋/自動吹氣袋', 'Toast and wicket bread bag', 1, '1'),
(3, '三封袋', 'Three Side-sealing Bags', 2, '1'),
(5, '背封袋 / G背封袋', 'Back-Sealing Bags (Pillow Bag)', 3, '1'),
(6, '夾鏈袋 / 站立夾鏈袋', 'Standing Zipper Bags', 6, '1'),
(35, '手提鑽石型夾鏈立袋', 'Diamond shape zipper bag', 9, '1'),
(34, '五邊封立袋', 'Quad seal bag (five side seal coffee bag)', 4, '1'),
(33, '高溫滅菌袋', 'Retort Pouch', 5, '1'),
(36, '造型袋', 'Unique shape bag', 10, '1'),
(37, '側封袋', 'Side gusset bag', 3, '1'),
(38, '複合材料自動捲', 'Laminate automatic packaging film rolls (roll stocks)', 11, '1'),
(39, '封口膜', 'Lidding sealing films', 12, '1'),
(40, '三邊封夾鏈', 'Three side sealed / flat zipper pouch (press to lock bag)', 7, '1'),
(41, '站立袋', 'Stand up pouch', 8, '1'),
(42, '易撕袋', 'Easy-Tear Bag ', 13, '1'),
(43, '口袋型夾鏈', ' Pocket type (tearing) zipper', 16, '1'),
(44, '易撕夾鏈(立)袋', '易撕夾鏈(立)袋', 0, '1'),
(45, '雷射易撕夾鏈(立)袋', '雷射易撕夾鏈(立)袋', 0, '1'),
(46, '上下開口夾鏈(立)袋', '上下開口夾鏈(立)袋', 0, '1'),
(47, '飲料袋', '飲料袋', 0, '1');

-- --------------------------------------------------------

--
-- 資料表結構 `goods_item`
--

CREATE TABLE `goods_item` (
  `goods_item_no` int(10) NOT NULL,
  `goods_item_title` varchar(200) DEFAULT NULL,
  `goods_item_title_en` varchar(500) DEFAULT NULL,
  `goods_item_sort` int(10) DEFAULT NULL,
  `goods_item_money` varchar(50) DEFAULT NULL,
  `goods_item_class` varchar(1000) DEFAULT NULL,
  `goods_item_model` varchar(20) DEFAULT NULL,
  `goods_item_pic_b` varchar(256) DEFAULT NULL,
  `goods_item_pic_s` varchar(256) DEFAULT NULL,
  `goods_item_hide` varchar(10) DEFAULT NULL,
  `goods_item_home` varchar(10) DEFAULT NULL,
  `goods_item_edituser` varchar(50) DEFAULT NULL,
  `goods_item_edittime` varchar(30) DEFAULT NULL,
  `goods_item_content` longtext,
  `goods_item_content_en` longtext,
  `goods_item_description` longtext,
  `goods_item_description_en` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `goods_item`
--

INSERT INTO `goods_item` (`goods_item_no`, `goods_item_title`, `goods_item_title_en`, `goods_item_sort`, `goods_item_money`, `goods_item_class`, `goods_item_model`, `goods_item_pic_b`, `goods_item_pic_s`, `goods_item_hide`, `goods_item_home`, `goods_item_edituser`, `goods_item_edittime`, `goods_item_content`, `goods_item_content_en`, `goods_item_description`, `goods_item_description_en`) VALUES
(15, '空白鋁箔折角袋', '空白鋁箔折角袋', 4, NULL, '5', NULL, '1120509105429.jpg', '1120509105429_s.jpg', '1', '1', 'liyih', '2023-06-07 14:20:22', '<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">適合 阻隔光線 水氣及氧氣</span></p>\r\n<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">&nbsp;</span></p>', '<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">空白鋁箔折角袋內容說明</span></p>', '空白鋁箔折角袋簡述', '空白鋁箔折角袋簡述'),
(11, '空白三封袋', 'three side-sealing bags', 8, NULL, '3', NULL, '1120509094324.jpg', '1120509094324_s.jpg', '1', '1', 'liyih', '2023-06-08 15:51:52', '<p><span style=\"font-size: 14pt;\">三面封袋又可稱為扁平袋，它是一種可以作為填充和密封的包裝的形式, 這種袋型可以採用多種不同阻隔的材質做成. 在眾多行業與零售商裡是一款常常會看見會應用在包裝經典商品裡的理想包裝選擇. 三封袋最大的優勢在於方便性極高,使用上簡單而且價格親民, 也因此三封面袋是很多食品商在選擇單份或隨身攜帶之產品的最佳包裝選擇了. 三面封袋的結構很簡單, 有著3面密封和1個開口處用於填充，給使用者放入此包裝並<strong>使用封口機封住填充處, </strong>以保持產品的新鮮度. 三封袋的變化很大, 它可以搭配與多種懸掛孔及易撕角甚至也可以搭配夾鏈式開口易於打開重複使用.</span></p>\r\n<p><span style=\"font-size: 14pt;\"><strong>這個袋型</strong><strong>廣泛運用在：</strong>耐用的真空密封食品/生鮮水產品/肉類加工製品/冷凍食品/醬料/素食品/茶包/濾掛咖啡/調理食品/美容用品/面膜袋/電子產品/化學品/各式藥品/補充包等等的都是可以採用三面封包裝來呈現產品.</span></p>', '<p>商品內容說明</p>', '商品簡述', '商品簡述'),
(12, '高低空白吐司立體', 'High and low blank toast stereo', 1, NULL, '4', NULL, '1120509095445.jpg', '1120509095445_s.jpg', '1', '1', 'liyih', '2023-06-05 15:15:48', '<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">立體吐司袋為特殊裁切工法 跟傳統摺角吐司袋比較 </span></p>\r\n<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">由於立體袋將袋底摺角裁切並熱封 整體袋型展現立體形狀且圖案可連成一體 較為美觀 </span></p>\r\n<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">並且無傳統摺角袋的三角脆弱易破之缺點 整體袋邊封口強度提高 使吐司入袋後 不破包 大大的確包品質 提高包裝的安全性設計 </span></p>\r\n<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">易於站立</span><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">CPP材質袋面平整 適合站立擺放於架上</span></p>\r\n<p>&nbsp;</p>', '<p>商品內容說明</p>', '立體角設計，易於站立。', '立體角設計，易於站立。'),
(13, '空白折角背封袋', '空白折角背封袋', 2, NULL, '5', NULL, '1120509104714.jpg', '1120509104714_s.jpg', '1', '1', 'liyih', '2023-06-07 14:20:10', '<p>背封袋又稱作枕頭袋或中封袋, 是包裝行業的專用詞彙. 它是由正面包覆至背面的包裝袋, 在袋體背面進行封邊的袋型, 主要熱封於袋子背面中間處. 此袋型可增加容量, 是一款挺度佳、防濕阻氣性很好的流行袋型之一.</p>\r\n<p><strong>背面袋具有廣泛應用於:</strong>食品包裝、餅乾、一般糖果、袋裝泡麵、冷凍生鮮食品、生活用品等包裝範圍.</p>\r\n<p>市面上很多磚塊型的米袋包裝與豆類、粉類、五穀雜糧、南北雜貨都是常態性的使用背封袋來做包裝與設計, 背封袋也同時可達到抽真空的效果呦! 另一種常態性的使用背封袋就是單1份量、單個包裝, 由於現在人很講求少份量飲食與小包裝的需求提供給小朋友使用, 此包裝不僅輕巧也攜帶便利, 更同時能適當的控制飲食上的攝取與飲食習慣, 因此在食品的包裝袋型中是一款很重要的袋類代表!</p>\r\n<p>在製作背封袋時, 可以依據客戶的需求提供有易撕角的背封袋, 也可以加上手提把/墨西哥帽洞或是圓洞等的吊掛型式, 但有需要注意的是背封袋是無法打圓角的.</p>\r\n<p>適用有內襯的包裝袋 呈現立體感</p>\r\n<p>可依需求</p>\r\n<p>組合阻隔性材質 亦可內放脫氧劑及乾燥劑</p>\r\n<p>組合NY貼合LLDPE材質時 亦可抽真空</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">空白折角背封袋說明</span></p>', '空白折角背封袋簡述', '空白折角背封袋簡述'),
(14, '空白折角袋', '空白折角袋', 3, NULL, '5', NULL, '1120509105138.jpg', '1120509105138_s.jpg', '1', '1', 'liyih', '2023-06-07 14:20:16', '<p>背封袋又稱作枕頭袋或中封袋, 是包裝行業的專用詞彙. 它是由正面包覆至背面的包裝袋, 在袋體背面進行封邊的袋型, 主要熱封於袋子背面中間處. 此袋型可增加容量, 是一款挺度佳、防濕阻氣性很好的流行袋型之一.</p>\r\n<p><strong>背面袋具有廣泛應用於:</strong>食品包裝、餅乾、一般糖果、袋裝泡麵、冷凍生鮮食品、生活用品等包裝範圍.</p>\r\n<p>市面上很多磚塊型的米袋包裝與豆類、粉類、五穀雜糧、南北雜貨都是常態性的使用背封袋來做包裝與設計, 背封袋也同時可達到抽真空的效果呦! 另一種常態性的使用背封袋就是單1份量、單個包裝, 由於現在人很講求少份量飲食與小包裝的需求提供給小朋友使用, 此包裝不僅輕巧也攜帶便利, 更同時能適當的控制飲食上的攝取與飲食習慣, 因此在食品的包裝袋型中是一款很重要的袋類代表!</p>\r\n<p>在製作背封袋時, 可以依據客戶的需求提供有易撕角的背封袋, 也可以加上手提把/墨西哥帽洞或是圓洞等的吊掛型式, 但有需要注意的是背封袋是無法打圓角的.</p>', '<p>空白折角袋內容說明</p>', '空白折角袋簡述', '空白折角袋簡述'),
(16, '茶葉袋', '茶葉袋', 5, NULL, '5', NULL, '1120509110559.jpg', '1120509110559_s.jpg', '1', '1', 'liyih', '2023-06-06 15:44:22', '<p>適合有帶茶梗的茶葉</p>\r\n<p>材質具韌性 亦可抽真空&nbsp;</p>\r\n<p>可依需求組合阻隔性材質 亦可內放脫氧劑及乾燥劑</p>\r\n<p>&nbsp;</p>', '<p>茶葉袋內容說明</p>\r\n<p>&nbsp;</p>', '茶葉袋簡述', '茶葉袋簡述'),
(17, '棉紙真空袋', '棉紙真空袋', 6, NULL, '5', NULL, '1120509110821.jpg', '1120509110821_s.jpg', '1', '1', 'liyih', '2023-06-06 15:43:35', '<p><span style=\"font-family: 微軟正黑體; font-size: 12pt;\">整體 質感及挺度佳</span></p>\r\n<p><span style=\"font-size: 12pt;\">可依需求</span><span style=\"font-size: 12pt;\">組合阻隔性材質 亦可內放脫氧劑及乾燥劑</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp;</span></p>\r\n<p>&nbsp;</p>', '', '棉紙真空袋簡述', '棉紙真空袋簡述'),
(18, '磚形米袋', '磚形米袋', 7, NULL, '5', NULL, '1120509111123.jpg', '1120509111123_s.jpg', '1', '1', 'liyih', '2023-06-07 14:20:28', '<p><span style=\"font-family: 微軟正黑體;\"><span style=\"font-size: 18.6667px;\">NY材質&sbquo;材質軟 耐穿刺 可抽真空包裝&bull;</span></span></p>\r\n<p><span style=\"font-family: 微軟正黑體;\"><span style=\"font-size: 18.6667px;\">對氧氣及水蒸氣之阻絕性佳 使內容物保鮮保存期限增長防止變質&nbsp;</span></span></p>\r\n<p><span style=\"font-family: 微軟正黑體;\"><span style=\"font-size: 18.6667px;\">撕開小縫可微波解凍 亦可隔水加熱 (不可加鍋蓋或用於壓力鍋及殺菌釜)上邊有易撕邊設計</span></span></p>\r\n<p>&nbsp;</p>', '<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">磚形米袋內容說明</span></p>', '磚形米袋簡述', '磚形米袋簡述'),
(19, '牛皮紙系列', '牛皮紙系列', 9, NULL, '6', NULL, '1120509111332.jpg', '1120509111332_s.jpg', '1', '1', 'admin', '2023-05-11 13:23:10', '<p>牛皮紙系列內容說明</p>', '<p>牛皮紙系列內容說明</p>', '牛皮紙系列簡述', '牛皮紙系列簡述'),
(20, '半鋁箔', '半鋁箔', 9, NULL, '6', NULL, '1120509111515.jpg', '1120509111515_s.jpg', '1', '1', 'liyih', '2023-06-07 14:19:11', '<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">半鋁箔內容說明</span></p>', '<p><span style=\"font-family: 微軟正黑體; font-size: 14pt;\">半鋁箔內容說明</span></p>', '半鋁箔簡述', '半鋁箔簡述'),
(21, '台灣名產', '台灣名產', 9, NULL, '6', NULL, '1120509111747.jpg', '1120509111747_s.jpg', '1', '1', 'liyih', '2023-06-08 15:54:22', '<p><span style=\"font-size: 14pt;\">站立夾鏈袋是一個有站立能力的三面袋. 有搭配夾鏈式設計, 方便重複使用. 簡單來說站立夾鏈袋就是三封袋加有底部空間製造完成的袋型設計, 這款包裝的大面積外觀設計可以增加消費者的注意力也同時展現出更具有賣相的吸引力. 袋型簡約美觀是可以很容易地在貨架上易於陳列看到的, 且較不佔空間的袋子. 站立夾鏈袋是各行各業在包裝選擇上不可缺席的袋型, 它幾乎是所有行業會使用的包裝方式. 目前幾乎是所有食品市場無法欠缺的包裝選擇之一, 因為站立夾鏈袋的設計再封口處很牢固,而且有基本的防潮功能, 可以讓內容物的保存期限延長. 站立夾鏈袋的頂部位置也可以方便設計並加工製造出客戶需求的吊孔吊掛在貨架上讓產品的能見度提升!</span></p>\r\n<p><span style=\"font-size: 14pt;\"><strong>站立夾鏈袋目前幾乎都是</strong><strong>廣泛的運用在</strong>包裝糖果, 餅乾, 五穀雜糧, 豆類,肉鬆, 粉末, 飲料, 咖啡豆, 茶飲包, 調味醬, 藥膳燉包,洗潔劑補充包等等..</span></p>', '<p>立袋加上夾鏈，可重複使用</p>', '站立夾鏈袋', '站立夾鏈袋'),
(22, '複合材料自動捲', '複合材料自動捲', 0, NULL, '38', NULL, '1120629094921.jpg', '1120629094921_s.jpg', '1', '1', 'liyih', '2023-06-29 09:49:21', '<p>自動積層包裝膜與封口膜是依特定需求指定，由各式不同材質組成，以提供良好阻隔的成品.</p>\r\n<p>此產品為整捲印刷膠膜,<u>由於此產品</u>需要配合客戶自動化需求,需要搭配有自動包裝機台或代包工廠的自動包裝機器來使用.</p>\r\n<p>自動包裝膜的優勢是能提供大數量的快速包裝需求而提高生產效率,省下製成袋子的時間和成本,所以往往自動包裝捲在價格上也比較便宜實惠。我們高品質的自動包裝捲,可以搭配各式不同的材質組合,例如:電鍍膜捲,鋁箔膜捲,透明膜捲等等一應俱全, 這些都是我們自動包裝捲的主要產品!</p>\r\n<p>這些包裝膜常常廣泛運用在: 零食類/咖啡類/餅乾類/麵包麵條澱粉類/冷凍食品與調理食品類/醫藥及個人用品類,化妝品以及試用包等各產業都是通用的.</p>', '', '3 複合材料自動捲', '4 複合材料自動捲'),
(23, '封口膜', '封口膜', 0, NULL, '39', NULL, '1120629102350.jpg', '1120629102350_s.jpg', '1', '1', 'liyih', '2023-06-29 10:23:50', '<p>在食品包裝裡, 我們能提供各大食品廠、餐飲業及餐飲外送平台, 醫療器材封裝, 冷凍鮮食</p>\r\n<p>盒與容器等的封口膜.&nbsp; 在競爭激烈的時代中讓專業的封口包裝客户能創造出最大的競爭力!</p>\r\n<p>封口膜的種類很多樣化, 其主要的是針對PET與PP材質的容器與飲料杯皆有良好的熱</p>\r\n<p>封效果並可以確保客户產品滴水不漏.</p>\r\n<p><strong>封口膜廣泛運用在: </strong>PP環保杯、PE優格盒、奶精球、手搖飲料杯、PET豆腐盒, PP茶碗蒸碗,</p>\r\n<p>保麗龍杯、紙杯等等在市面上各式不同形狀的容器皆可密封. 我們可提供塑膠膜、紙膜、易封</p>\r\n<p>膜、透明膜、鋁箔膜、電鍍膜及霧面膜等各種不同材質與尺寸的封口膜.</p>', '', '', ''),
(24, '側封袋', '側封袋', 0, NULL, '37', NULL, '1120629100041.jpg', '1120629100041_s.jpg', '1', '1', 'liyih', '2023-06-29 10:00:41', '<p>折腰背封/側封袋也被稱之為G背封/G側封袋，簡單的講就是袋體背面或是側面進行熱封的包裝袋，其實這款袋型與背封袋是相同的袋子, 唯一的差別在於這款袋子有著向內折進去兩處而形成的四方體積袋型, 這款折腰背封/側封袋主要是提升了袋子的側邊厚度增加容量，並能提供內容物更服帖於包裝的袋型,並且讓整個包裝整體更為符貼更方正讓整個袋型在展示櫃上陳列出完美又美觀的展示效果!</p>\r\n<p>這款袋型很廣泛的應用範在: 市面上咖啡袋、茶葉袋最常見的袋型，也是文創商品包裝的最佳選擇，食品(粉末、塊狀)、寵物飼料、乾糧、五穀物、米、蜜餞、糖果、餅乾等一般糖果、袋裝泡麵、袋裝乳製品等均採用此類包裝形式。</p>\r\n<p>折腰背封/側封袋與其他包裝袋型相比, 熱封邊並沒有很多面. 通常折腰背封/側封袋是在袋子背面中間或側邊面進行熱封邊的, 因此也降低熱封處口開裂的機率, 而該袋型其正背面與側邊都可以設計圖文，整體包裝上的正面圖案也較完整,美觀. 此袋型還能搭配透氣閥與束帶並能增加折腰背封/側封袋的功能性.</p>\r\n<p>&nbsp;</p>', '', '', ''),
(26, '五面封袋', 'Quad sealed bag (five side sealed bag) ', 0, NULL, '34', NULL, '1120607015733.jpg', '1120607015733_s.jpg', '1', '1', 'liyih', '2023-06-29 09:25:34', '<p>五面封袋是一款可以做四面設計的袋型，這款袋子方正硬挺、開口成四方型，與同材積的袋型相比，內容量增加約35%、可以提供最大開口方便裝填產品。它有腰身與背封袋、折腰背封(側封)袋的差別是少了背後或側邊的那條熱封線，此袋型是直接熱封五個邊。這款袋型的外觀較有挺度、呈現更美觀簡潔、側邊更立體。五面封袋的一般型為獨特K模封底，五面封袋也可以加工裝上夾鏈、透氣閥、打手提把、易撕角、吊孔等讓產品更多元化。裝填好產品可以直立展示，陳列時也不佔空間。近10年來歐美先進國家已經普遍大量使用，是一個很好的袋型選項。</p>\r\n<p><strong>這款袋型廣泛的應用在</strong><strong>:</strong> 咖啡粉/豆袋、茶葉袋、真空包裝、乾貨、餅乾、糖果外袋、沖泡飲品外袋、袋裝泡麵、寵物飼料、乾糧、五穀物、米等包裝。</p>', '', '', ''),
(27, '手提鑽石型夾鏈立袋', 'Diamond shape zipper bag', 0, NULL, '35', NULL, '1120607020335.jpg', '1120607020335_s.jpg', '1', '1', 'liyih', '2023-06-29 09:25:10', '<p><strong>手提鑽石型夾鏈立袋</strong>是一款底部平整造型、兩側有特殊斜角站立設計的袋型, 可讓內部容量最大化且易於站立, 在袋子頂部有手提功能方便攜帶拿取! 此袋型具有良好的展示性、在陳列時增加產品的美觀、時尚的流行感。 手提鑽石型夾鏈立袋的袋身也可以有氣孔, 這些氣孔可以讓氣體流動避免內容物腐敗。 另外手提鑽石型夾鏈立袋也可增加雷射切割線方便撕口、保持撕口的平整性。</p>\r\n<p>這款鑽石型夾鏈立袋光滑平整, 也很<strong>廣泛的應用在:</strong> 生菜蔬果、水果、熟食品、烤雞、中藥材、生乳吐司、五穀雜糧、堅果等等熟食品, 可依照客戶需求放入各式各樣的新鮮熟食皆可適用。</p>', '', '', ''),
(28, '造型袋', 'Unique shape bag', 0, NULL, '36', NULL, '1120607021734.jpg', '1120607021734_s.jpg', '1', '1', 'liyih', '2023-06-29 09:24:49', '<p>袋子不是只有方形或長方形, 袋子也可以製作成各式各樣的圖形, 例如:卡通圖形或瓶罐圖形等等的創意造型, 這些不按牌理設計的特殊袋形更能增加產品的吸引感, 具有廣告的吸睛效果! 這款特殊造型袋我們又稱作造型袋。 造型袋都是根據客戶的需求量身訂製打造的, 也因為是獨有的造型包裝袋, 相對的在成本上會比較高。 造型袋在製作過程裡, 不管是熱封燙刀及製袋的刀模都是獨一無二的, 而且都是一次性的使用的. <strong>造型袋</strong><strong>廣泛的應用在:</strong> 糖果、餅乾、口香糖、健康食品膠囊/錠、節慶商品、各式乾貨 補充包、美容面膜等產品包裝。</p>', '', '', ''),
(29, '飲料袋', '飲料袋', 0, NULL, '47', NULL, '1120629090454.jpg', '1120629090454_s.jpg', '1', '0', 'liyih', '2023-06-29 09:04:54', '', '', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `mail`
--

CREATE TABLE `mail` (
  `no` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL COMMENT '公司名稱',
  `department` varchar(200) DEFAULT NULL COMMENT '部門單位',
  `mail` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `objects` varchar(200) DEFAULT NULL,
  `message` longtext,
  `date` datetime DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `member_no` int(8) NOT NULL,
  `member_id` varchar(32) NOT NULL DEFAULT '',
  `member_pw` varchar(200) NOT NULL DEFAULT '',
  `member_power` varchar(32) NOT NULL DEFAULT '',
  `member_name` varchar(32) NOT NULL DEFAULT '',
  `member_date` varchar(32) NOT NULL DEFAULT '',
  `member_ip` varchar(32) NOT NULL DEFAULT '',
  `member_memo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`member_no`, `member_id`, `member_pw`, `member_power`, `member_name`, `member_date`, `member_ip`, `member_memo`) VALUES
(116, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', '0', '(不可刪除)', '2023-06-13 12:12:07', '124.109.124.50', NULL),
(122, 'liyih', '5962e5ecd51d930b73fffe955849696160c23d21b6f5c6cb752a7bccc520ba5e', '0', '操作人員', '2023-06-29 10:23:32', '210.242.90.96', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `news_no` int(10) NOT NULL,
  `news_title` varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  `news_title_en` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `news_pic_s` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `news_pic_b` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `news_click` int(11) DEFAULT NULL,
  `news_home` int(10) DEFAULT NULL,
  `news_content` longtext CHARACTER SET utf8,
  `news_content_en` longtext CHARACTER SET utf8,
  `news_postwho` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `news_time` varchar(20) DEFAULT NULL,
  `news_ckpost` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `uppics`
--

CREATE TABLE `uppics` (
  `uppics_no` int(11) NOT NULL,
  `uppics_ing` varchar(20) DEFAULT NULL COMMENT '所屬no',
  `uppics_class` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '所屬類別',
  `uppics_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '中文名稱',
  `uppics_name_en` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '英文名稱',
  `uppics_pic_b` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '大圖',
  `uppics_pic_s` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '小圖',
  `uppics_sort` int(11) DEFAULT NULL COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `uppics`
--

INSERT INTO `uppics` (`uppics_no`, `uppics_ing`, `uppics_class`, `uppics_name`, `uppics_name_en`, `uppics_pic_b`, `uppics_pic_s`, `uppics_sort`) VALUES
(13, '12', 'goods', NULL, NULL, '1120509095539.jpg', '1120509095539_s.jpg', 4),
(49, '11', 'goods', NULL, NULL, '1120510125712.jpg', '1120510125712_s.jpg', 0),
(50, '11', 'goods', NULL, NULL, '1120510125717.jpg', '1120510125717_s.jpg', 0),
(10, '12', 'goods', NULL, NULL, '1120509095519.jpg', '1120509095519_s.jpg', 2),
(11, '12', 'goods', NULL, NULL, '1120509095527.jpg', '1120509095527_s.jpg', 1),
(17, '12', 'goods', NULL, NULL, '1120509095941.jpg', '1120509095941_s.jpg', 6),
(14, '12', 'goods', NULL, NULL, '1120509095543.jpg', '1120509095543_s.jpg', 3),
(16, '12', 'goods', NULL, NULL, '1120509095858.jpg', '1120509095858_s.jpg', 5),
(18, '13', 'goods', NULL, NULL, '1120509104914.jpg', '1120509104914_s.jpg', 1),
(19, '13', 'goods', NULL, NULL, '1120509104919.jpg', '1120509104919_s.jpg', 2),
(20, '13', 'goods', NULL, NULL, '1120509104924.jpg', '1120509104924_s.jpg', 3),
(21, '13', 'goods', NULL, NULL, '1120509104928.jpg', '1120509104928_s.jpg', 4),
(22, '14', 'goods', NULL, NULL, '1120509105610.jpg', '1120509105610_s.jpg', 0),
(23, '14', 'goods', NULL, NULL, '1120509105614.jpg', '1120509105614_s.jpg', 0),
(24, '15', 'goods', NULL, NULL, '1120509105807.jpg', '1120509105807_s.jpg', 0),
(25, '15', 'goods', NULL, NULL, '1120509105811.jpg', '1120509105811_s.jpg', 0),
(26, '15', 'goods', NULL, NULL, '1120509105816.jpg', '1120509105816_s.jpg', 0),
(36, '16', 'goods', NULL, NULL, '1120509110449.jpg', '1120509110449_s.jpg', 1),
(33, '16', 'goods', NULL, NULL, '1120509110436.jpg', '1120509110436_s.jpg', 2),
(34, '16', 'goods', NULL, NULL, '1120509110441.jpg', '1120509110441_s.jpg', 3),
(35, '16', 'goods', NULL, NULL, '1120509110445.jpg', '1120509110445_s.jpg', 4),
(32, '16', 'goods', NULL, NULL, '1120509110153.jpg', '1120509110153_s.jpg', 5),
(37, '16', 'goods', NULL, NULL, '1120509110453.jpg', '1120509110453_s.jpg', 6),
(38, '17', 'goods', NULL, NULL, '1120509110902.jpg', '1120509110902_s.jpg', 1),
(39, '17', 'goods', NULL, NULL, '1120509110907.jpg', '1120509110907_s.jpg', 2),
(44, '20', 'goods', NULL, NULL, '1120509111526.jpg', '1120509111526_s.jpg', 0),
(41, '18', 'goods', NULL, NULL, '1120509111141.jpg', '1120509111141_s.jpg', 0),
(42, '18', 'goods', NULL, NULL, '1120509111146.jpg', '1120509111146_s.jpg', 0),
(43, '18', 'goods', NULL, NULL, '1120509111154.jpg', '1120509111154_s.jpg', 0),
(45, '20', 'goods', NULL, NULL, '1120509111531.jpg', '1120509111531_s.jpg', 0),
(46, '21', 'goods', NULL, NULL, '1120509111759.jpg', '1120509111759_s.jpg', 1),
(47, '21', 'goods', NULL, NULL, '1120509111804.jpg', '1120509111804_s.jpg', 2),
(48, '21', 'goods', NULL, NULL, '1120509111810.jpg', '1120509111810_s.jpg', 3),
(51, '11', 'goods', NULL, NULL, '1120510125721.jpg', '1120510125721_s.jpg', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `webinfo`
--

CREATE TABLE `webinfo` (
  `no` int(11) NOT NULL,
  `conpany` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `conpany_en` varchar(500) CHARACTER SET utf8 NOT NULL,
  `keywords` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `keywords_en` varchar(2048) CHARACTER SET utf8 NOT NULL,
  `description` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `description_en` varchar(2048) CHARACTER SET utf8 NOT NULL,
  `runtxt` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `share_pic` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '社群分享預設圖',
  `tel` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `tel2` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `fax` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `send_email` varchar(1024) CHARACTER SET utf8 DEFAULT NULL COMMENT '接收系統mail',
  `servicetime` text CHARACTER SET utf8 COMMENT '服務時間',
  `line` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `include_head` longtext CHARACTER SET utf8,
  `include_body` longtext CHARACTER SET utf8,
  `include_footer` longtext CHARACTER SET utf8
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `webinfo`
--

INSERT INTO `webinfo` (`no`, `conpany`, `conpany_en`, `keywords`, `keywords_en`, `description`, `description_en`, `runtxt`, `share_pic`, `tel`, `tel2`, `fax`, `address`, `email`, `send_email`, `servicetime`, `line`, `include_head`, `include_body`, `include_footer`) VALUES
(1, '勵億塑膠股份有限公司', 'LIYIH PLASTICS CO.,LTD', '食品包裝袋批發,軟性積層包裝材料,三封袋,吐司袋,背封袋,站立夾鏈袋,便利袋,咖啡袋,茶葉袋,夾鏈袋, 背封袋,小袋，小包,五邊封袋,G背封,鋁箔袋,夾鏈袋,真空袋,', 'wholesale for food packaging bags, soft flexible laminated packaging materials, three side-sealing bags, toast bags, back-sealing bags (pillow bag), standing zipper bags, convenience bags, One-way degassing valve coffee bag, tea bags,zipper pouches,pillow bag, sachet, quad seal bag, gusset bag, aluminum foil bag, reusable zipper pouches, vacuum bag', '勵億塑膠專門生產品質優良的軟性積層包裝材料，旗下專門提供食品包裝袋批發、零售服務的品牌，獲得許多知名食品大廠指定愛用，如：統一、全家、義美、乖乖……等口碑品牌。', 'We dedicate to providing high-quality FDA food standards packaging bags and printed packaging film-rolls for automatic packing machines. We accept any OEM and ODM orders for wholesale, distributors and retailers. We have long established a strong relationship with Taiwan’s top 10’s ranked mega food companies.', NULL, '1120412020916.jpg', NULL, '', NULL, NULL, NULL, 'amiwu2012@gmail.com; sale66@liyih.com.tw', NULL, NULL, '', '', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`abouts_no`);

--
-- 資料表索引 `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_no`);

--
-- 資料表索引 `banner2`
--
ALTER TABLE `banner2`
  ADD PRIMARY KEY (`banner2_no`);

--
-- 資料表索引 `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`download_no`);

--
-- 資料表索引 `goods_class`
--
ALTER TABLE `goods_class`
  ADD PRIMARY KEY (`goods_class_no`);

--
-- 資料表索引 `goods_item`
--
ALTER TABLE `goods_item`
  ADD PRIMARY KEY (`goods_item_no`);

--
-- 資料表索引 `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`no`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_no`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_no`);

--
-- 資料表索引 `uppics`
--
ALTER TABLE `uppics`
  ADD PRIMARY KEY (`uppics_no`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `abouts`
--
ALTER TABLE `abouts`
  MODIFY `abouts_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `banner2`
--
ALTER TABLE `banner2`
  MODIFY `banner2_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `download`
--
ALTER TABLE `download`
  MODIFY `download_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `goods_class`
--
ALTER TABLE `goods_class`
  MODIFY `goods_class_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `goods_item`
--
ALTER TABLE `goods_item`
  MODIFY `goods_item_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mail`
--
ALTER TABLE `mail`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `member_no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `news_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `uppics`
--
ALTER TABLE `uppics`
  MODIFY `uppics_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
