-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 01:09 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahihi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `status`, `level`, `created_at`, `updated_at`) VALUES
(27, 'admin', 'admin', '520d216df49a852e6f1c1b5517a41a10', 1, 0, '2015-10-06 19:28:10', '2022-09-29 03:28:57'),
(40, 'admin', 'admin', 'deb46309adb0fea100841b89ad1f5313', 1, 0, '2022-04-05 01:34:07', '2022-08-15 14:06:31'),
(41, 'thai', 'thai', '1aafcfcd9efdd2e7ac43e80ce77bba79', 1, 0, '2022-08-08 01:58:47', '2022-10-12 01:30:11'),
(42, 'CongHoaXaHoiChuNghiaVietNam', 'VietNam', '616f454a79410d54779c5757432cc1ee', 1, 0, '2022-10-17 06:57:49', '2022-10-17 07:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt_cat` text COLLATE utf8_unicode_ci NOT NULL,
  `content_cat` text COLLATE utf8_unicode_ci NOT NULL,
  `cat_alias` text COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `status_cat` int(11) NOT NULL,
  `sort_order` bigint(20) NOT NULL,
  `category_avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `banner_category` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `name`, `excerpt_cat`, `content_cat`, `cat_alias`, `admin_id`, `parent_id`, `status_cat`, `sort_order`, `category_avatar`, `banner_category`, `created_at`, `updated_at`) VALUES
(582, 'Tin t???c du l???ch', '', '???? N???ng m???t ??i???m ?????n du l???ch, tham quan, ngh??? d?????ng l?? t?????ng c???a nhi???u [...]', 'tin-tuc-du-lich', 27, 0, 0, 0, '[]', '[]', '2022-10-06 01:58:56', '2022-10-06 02:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `cat_new`
--

CREATE TABLE `cat_new` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cat_new_alias` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `the_tu_khoa` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `the_gioi_thieu` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status_cat_new` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_new`
--

INSERT INTO `cat_new` (`id`, `name`, `cat_new_alias`, `admin_id`, `parent_id`, `content`, `the_tu_khoa`, `the_gioi_thieu`, `status_cat_new`, `view`, `created_at`, `updated_at`) VALUES
(53, 'Gi???i thi???u', 'con', 27, 53, '', '', '', 1, 0, '2022-10-06 03:28:26', '2022-10-06 03:30:43'),
(54, 'gi???i thi???u', 'gioi_thieu', 27, 54, '', '', '', 1, 0, '2022-10-06 03:31:34', '2022-10-06 04:50:54'),
(55, 'Gi???i thi???u', 'gioi-thieu-1', 27, 55, '', '', '', 1, 0, '2022-10-06 04:51:12', '2022-10-06 08:01:23'),
(56, 'bvlq trang ch???', 'bvlq-trang-chu', 27, 0, '', '', '', 1, 0, '2022-10-06 08:10:59', '2022-10-06 08:10:59'),
(57, 'Gi???i thi???u 1', 'gioi-thieu-1', 27, 0, '', '', '', 1, 0, '2022-10-06 08:11:41', '2022-10-06 08:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `name_color` varchar(255) NOT NULL,
  `ma_mau` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`name_color`, `ma_mau`, `id`, `created_at`, `updated_at`) VALUES
('#0000a0', '', 1, '2019-06-22', '2019-06-22'),
('#239c69', '', 2, '2019-06-22', '2019-06-22'),
('#ff0000', '', 3, '2019-06-22', '2019-06-22'),
('#ffffff', '', 6, '2019-06-22', '2019-06-22'),
('#008000', '', 7, '2019-06-22', '2019-06-22'),
('#f8f5ed', '', 9, '2019-06-28', '2019-06-28'),
('#ecdcd7', '', 10, '2019-06-28', '2019-06-28'),
('#000000', '', 11, '2019-06-28', '2019-06-28'),
('#f0875a', '', 12, '2019-06-28', '2019-06-28'),
('#f8cdd8', '', 13, '2019-06-28', '2019-06-28'),
('#e4c6af', '', 14, '2019-06-28', '2019-06-28'),
('#ecccd2', '', 15, '2019-06-28', '2019-06-28'),
('#99b2d5', '', 16, '2019-06-28', '2019-06-28'),
('#9f1027', '', 17, '2019-06-28', '2019-06-28'),
('#394150', '', 18, '2019-06-28', '2019-06-28'),
('#e8d0d9', '', 19, '2019-06-28', '2019-06-28'),
('#e9cb6e', '', 20, '2019-06-28', '2019-06-28'),
('#f1a359', '', 21, '2019-06-28', '2019-06-28'),
('#ac7670', '', 22, '2019-06-28', '2019-06-28'),
('#ca4f52', '', 23, '2019-06-28', '2019-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_cm` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment_body` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_cm`, `id`, `user_id`, `comment_body`, `created_at`, `updated_at`) VALUES
(68, 873, 0, 'hahahah 1 mk anh ch???p h??tssssssssss\r\n', '2022-10-12 09:24:15', '2022-10-12 09:24:15'),
(76, 872, 0, '??i l??? ????nh ch???t', '2022-10-14 03:40:11', '2022-10-14 03:40:11'),
(87, 870, 0, 'Xin l???i em v?? nh???ng g?? ???? qua', '2022-10-15 04:43:26', '2022-10-15 04:43:26'),
(88, 1, 0, 'Xin l???i em v?? nh???ng g?? ???? qua', '2022-10-16 08:45:59', '2022-10-16 08:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `counter_ips`
--

CREATE TABLE `counter_ips` (
  `ip` varchar(15) NOT NULL,
  `visit` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `counter_values`
--

CREATE TABLE `counter_values` (
  `id` bigint(11) NOT NULL,
  `day_id` bigint(11) NOT NULL,
  `day_value` bigint(11) NOT NULL,
  `yesterday_id` bigint(11) NOT NULL,
  `yesterday_value` bigint(11) NOT NULL,
  `week_id` bigint(11) NOT NULL,
  `week_value` bigint(11) NOT NULL,
  `month_id` bigint(11) NOT NULL,
  `month_value` bigint(11) NOT NULL,
  `year_id` bigint(11) NOT NULL,
  `year_value` bigint(11) NOT NULL,
  `all_value` bigint(11) NOT NULL,
  `record_date` datetime NOT NULL,
  `record_value` bigint(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `counter_values`
--

INSERT INTO `counter_values` (`id`, `day_id`, `day_value`, `yesterday_id`, `yesterday_value`, `week_id`, `week_value`, `month_id`, `month_value`, `year_id`, `year_value`, `all_value`, `record_date`, `record_value`, `created_at`, `updated_at`) VALUES
(0, 246, 1, 245, 0, 36, 1, 9, 1, 0, 2019, 1, '0000-00-00 00:00:00', 1, '2019-09-04', '2019-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `dat_mua`
--

CREATE TABLE `dat_mua` (
  `id` bigint(20) NOT NULL,
  `ho_ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dt` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `noi_dung` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dinh_dang_field`
--

CREATE TABLE `dinh_dang_field` (
  `id` int(11) NOT NULL,
  `ten_dinh_dang` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dinh_dang_field`
--

INSERT INTO `dinh_dang_field` (`id`, `ten_dinh_dang`, `mo_ta`, `admin_id`, `created_at`, `updated_at`) VALUES
(6, 'Banner', '????y l?? ki???u ?????nh d???ng banner', 28, '2019-08-17', '2019-08-19'),
(7, 'text', '????y l?? ki??u d???nh d???ng text', 28, '2019-08-17', '2019-08-17'),
(8, 'Images', '????y l?? ki???u ?????nh d???ng images', 28, '2019-08-19', '2019-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` bigint(20) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image_field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_dinhdang` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `mo_ta` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `id_vitri` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `name`, `content`, `image_field`, `home_alias`, `id_dinhdang`, `created_at`, `updated_at`, `mo_ta`, `status`, `admin_id`, `id_vitri`) VALUES
(141, '', '<img alt="" src="/public/uploads/images/logo-binh-minh.png"" />', '', '', 7, '2022-09-28', '2022-10-24', 'logo', 1, 41, 2),
(144, '', 'D???CH V??? CHO THU?? XE M??Y ???? N???NG B??NH MINH', '', '', 7, '2022-09-28', '2022-09-28', 'dvctxm_h1_p1', 1, 27, 3),
(145, '', '<strong>CH??? T??? 80K/NG??Y</strong>', '', '', 7, '2022-09-28', '2022-09-28', 'gia_tien', 1, 27, 4),
(146, '', '<span style="color:rgb(33, 37, 41); font-family:-apple-system,blinkmacsystemfont,segoe ui,roboto,helvetica neue,arial,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol">B??nh Minh l?? c??ng ty cho <strong>thu?? xe m??y ???? N???ng</strong></span><span style="color:rgb(33, 37, 41); font-family:-apple-system,blinkmacsystemfont,segoe ui,roboto,helvetica neue,arial,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol">&nbsp;h??ng ?????u v???i h??n 5 n??m ho???t ?????ng v?? cung c???p d???ch v??? uy t??n cho h??n 10.000 kh??ch du l???ch. B??nh Minh ???? cung c???p d???ch v??? cho thu?? xe m??y v???i gi?? th??nh ph?? h???p, xe c??? ??a d???ng v?? s??? h??? tr??? nhi???t t??nh ????? h?????ng ?????n tr???i nghi???m t???t nh???t cho m???i kh??ch du l???ch. H??y xem ngay nh???ng n???i dung sau ????y ????? c?? s??? chu???n b??? t???t nh???t cho chuy???n du l???ch nh??:</span>', '', '', 7, '2022-09-28', '2022-09-28', 'tt_tt', 1, 27, 5),
(149, '', 'CHO THU?? XE G???N M??Y ??? ???? N???NG', '', '', 7, '2022-10-24', '2022-10-24', 'CHO THU?? XE G???N M??Y ??? ???? N???NG', 1, 41, 7),
(150, '', '<i><b>Nh???ng lo???i xe m??y m?? B??nh Minh ??ang cho thu?? (xe g???n m??y v?? tay ga)</b></i>', '', '', 7, '2022-10-24', '2022-10-24', '<i><b>Nh???ng lo???i xe m??y m?? B??nh Minh ??ang cho thu?? (xe g???n m??y v?? tay ga)</b></i>', 1, 41, 8),
(151, '', 'CHO THU?? XE G???N M??Y ??? ???? N???NG', '', '', 7, '2022-10-24', '2022-10-24', 'CHO THU?? XE G???N M??Y ??? ???? N???NG', 1, 41, 9);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'menu_1', '[{"text":"TRANG CH???","href":"/","icon":"","target":"_self","title":""},{"text":"GI???I THI???U","href":"/gioi-thieu","icon":"","target":"_self","title":""},{"text":"TIN T???C DU L???CH","href":"/tin-tuc-du-lich","icon":"","target":"_self","title":""},{"text":"BLOG THU?? XE","href":"/blog-thue-xe","icon":"","target":"_self","title":"","children":[{"text":"T???NG H???P ?????A CH??? THU?? XE M??Y","href":"/tonghopdiachithuexemay","icon":"","target":"_self","title":""},{"text":"THU?? XE M??Y ???? N???NG","href":"/thuexemaydanang","icon":"","target":"_self","title":""}]},{"text":"LI??N H???","href":"/lien-he","icon":"","target":"_self","title":""}]', '0000-00-00 00:00:00', '2022-10-06 03:42:05'),
(2, 'menu_2', '[{"text":"Nh??n s??? ","href":"/nhan-su-1","icon":"","target":"_self","title":""},{"text":"Ngh??? s??? ki???n","href":"/nghe-su-kien","icon":"","target":"_self","title":""},{"text":"Tuy???n d???ng","href":"/tuyen-dung","icon":"","target":"_self","title":""}]', '0000-00-00 00:00:00', '2019-09-12 02:48:23'),
(3, 've_chung_toi_footer', '[{"text":"S??N DULUX ","href":"/son dulux","icon":"","target":"_self","title":"","children":[{"text":"Dulux N???i Th???t","href":"/dulux-noi-that","icon":"","target":"_top","title":""},{"text":"Dulux Ngo???i Th???t ","href":"/dulux-ngoai-that","icon":"","target":"_top","title":""},{"text":"L??t Dulux Ch???ng Ki???m ","href":"/lot-dulux-chong-kiem","icon":"","target":"_self","title":""},{"text":"B??? Tr??t Dulux","href":"/bo-tret-dulux","icon":"","target":"_self","title":""}]},{"text":"S??N MAXILITE ","href":"","icon":"","target":"_self","title":"","children":[{"text":"Maxilite n???i th???t ","href":"/Maxilite-noi-that","icon":"","target":"_self","title":""},{"text":"Maxilite ngo???i th???t","href":"/Maxilite-ngoai-that","icon":"","target":"_self","title":""},{"text":"L??t Maxilite ch???ng ki???m","href":"/lot-maxilite-chong-kiem","icon":"","target":"_self","title":""},{"text":"B??? Tr??t Maxilite","href":"/bo-tret- maxilite","icon":"","target":"_self","title":""}]},{"text":"S??N JOTUN ","href":"/son-jotun","icon":"","target":"_self","title":"","children":[{"text":"JOTUN n???i th???t ","href":"/jotun-noi-that","icon":"","target":"_self","title":""},{"text":"JOTUN ngo???i th???t","href":"/jotun-ngoai-that","icon":"","target":"_self","title":""},{"text":"L??t JOTUN ch???ng ki???m","href":"/lot-jotun-chong-kiem","icon":"","target":"_self","title":""},{"text":"B??? tr??t JOTUN ","href":"/bo-tret-jotun","icon":"","target":"_self","title":""}]},{"text":"S??N SIKA ","href":"/son-sika","icon":"","target":"_self","title":"","children":[{"text":"S??n Sika n???i th???t ","href":"/son-sika-noi-that","icon":"","target":"_self","title":""},{"text":"B??? Tr??t sika ","href":"/bo-tret-sika","icon":"","target":"_self","title":""},{"text":"S??n sika ngo???i th???t ","href":"/son-sika-ngoai-that","icon":"","target":"_self","title":""},{"text":"L??t Sika ch???ng ki???m ","href":"/lot-sika-chong-kiem","icon":"","target":"_self","title":""}]}]', '0000-00-00 00:00:00', '2022-07-07 13:39:28'),
(4, 'danh_muc_san_pham_footer', '[{"text":"Tr???n Th???ch Cao","href":"/tran-thach-cao","icon":"","target":"_self","title":"tran-thach-cao"},{"text":"S??n Nh??","href":"/son-nha","icon":"","target":"_self","title":"son-nha"},{"text":"Gi??y D??n T?????ng","href":"/giay-dan-tuong","icon":"","target":"_self","title":"giay-dan-tuong"},{"text":"Tr???n Nh??m","href":"/tran-nhom","icon":"","target":"_self","title":"tran-nhom"},{"text":"Tr???n Nh???a","href":"/tran-nhua","icon":"","target":"_self","title":"tran-nhua"},{"text":"Tr???n Suy??n S??ng","href":"/tran-suyen-sang","icon":"","target":"_self","title":"tran-suyen-sang"}]', '0000-00-00 00:00:00', '2022-03-29 07:18:46'),
(5, 'menu_mobile', '[{"text":"TRANG CH???","href":"/","icon":"","target":"_self","title":""},{"text":"GI???I THI???U","href":"/gioithieu","icon":"","target":"_self","title":""},{"text":"TIN T???C DU L???CH","href":"/tintucdulich","icon":"","target":"_self","title":""},{"text":"BLOG THU?? XE","href":"/blogthuexe","icon":"","target":"_self","title":"","children":[{"text":"T???NG H???P ?????A CH??? THU?? XE M??Y","href":"/tonghopdiachithuexemay","icon":"","target":"_self","title":""},{"text":"THU?? XE M??Y ???? N???NG","href":"/thuexemaydanang","icon":"","target":"_self","title":""}]},{"text":"LI??N H???","href":"/gioi-thieu-ve-tong-kho-son-dulux-sai-gon","icon":"","target":"_self","title":""}]', '0000-00-00 00:00:00', '2022-10-04 07:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `menus_item`
--

CREATE TABLE `menus_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menus_id` bigint(20) NOT NULL,
  `cat_id_show` int(11) NOT NULL,
  `menus_alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menus_item_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menus_item_id_parent` int(11) NOT NULL,
  `status_menusitem` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus_item`
--

INSERT INTO `menus_item` (`id`, `name`, `menus_id`, `cat_id_show`, `menus_alias`, `menus_item_url`, `menus_item_id_parent`, `status_menusitem`, `created_at`, `updated_at`) VALUES
(7, '?????a ch???', 2, 0, 'dia-chi-cong-ty', 'dia-chi-cong-ty', 0, 1, '2016-03-04 03:34:37', '2016-03-07 17:56:21'),
(8, 'Gi???i thi???u', 2, 0, 'gioi-thieu-cong-ty', '', 0, 1, '2016-03-04 03:34:42', '2016-03-07 17:56:21'),
(11, 'Gi???y b???o h??? h??n qu???c', 1, 0, 'giay-bao-ho-han-quoc', '', 1, 1, '2016-03-04 11:30:41', '2016-03-07 17:55:55'),
(12, 'V???i th???y tinh H??n Qu???c', 1, 0, 'vai-thuy-tinh-han-quoc', 'vai-thuy-tinh-han-quoc', 1, 1, '2016-03-04 12:38:38', '2016-03-07 17:55:55'),
(13, 'D??y ??ai an to??n H??n Qu???c', 1, 0, 'day-dai-an-toan-han-quoc', 'khamphukhoa168.com', 1, 1, '2016-03-04 13:37:58', '2016-03-07 17:55:55'),
(20, 'Trang ch???', 2, 0, '/', '', 0, 1, '2016-03-06 19:58:56', '2016-03-07 17:56:21'),
(21, 'Li??n h???', 2, 0, 'lien-he', 'lien-he', 0, 1, '2016-03-06 20:02:44', '2016-03-07 17:56:21'),
(33, 'Thi???t b??? an to??n lao ?????ng', 1, 0, 'thiet-bi-an-toan-lao-dong', 'thiet-bi-an-toan-lao-dong', 15, 1, '2016-03-07 19:07:01', '2016-03-07 19:07:01'),
(34, 'S???n ph???m kh??c', 1, 0, 'san-pham-khac', '', 1, 1, '2016-03-16 00:03:10', '2016-03-16 00:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_09_26_091251_create_contents_table', 1),
('2015_09_28_100830_create_admin_table', 2),
('2015_09_28_101255_create_user_table', 3),
('2015_09_28_102234_create_admin_table', 4),
('2015_09_29_045146_create_cat_table', 5),
('2015_09_29_045234_create_product_table', 5),
('2015_09_29_045312_create_transaction_table', 5),
('2015_09_29_045340_create_order_table', 5),
('2015_10_23_080452_create_menus_table', 6),
('2015_10_23_080620_create_menu_item_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `name` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `news_excerpt` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `new_alias` longtext NOT NULL,
  `cat_new_id` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `the_tu_khoa` longtext NOT NULL,
  `the_gioi_thieu` longtext NOT NULL,
  `status_new` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `image_list` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `news_excerpt`, `new_alias`, `cat_new_id`, `admin_id`, `content`, `the_tu_khoa`, `the_gioi_thieu`, `status_new`, `view`, `image_list`, `created_at`, `updated_at`) VALUES
(114, 'gi???i thi???u', '', 'gioi-thieu', '55', 27, '<div class="gioi_thieu">\r\n<div class="container">\r\n<div class="name_tt_gt">\r\n<h3>Gi???i Thi???u</h3>\r\n</div>\r\n\r\n<div class="tt_tt_gt">????? c?? m???t chuy???n du l???ch ho??n h???o nh?? mong mu???n ngo??i vi???c l??n k??? ho???ch ?????t ph??ng kh??ch s???n, l???ch tr??nh tham quan, vui ch??i, ?????a ??i???m ??n u???ng,??? th?? m???t trong nh???ng ??i???u b???n kh??ng th??? kh??ng chu???n b??? tr?????c ???? l?? ph????ng ti???n ??i l???i. Vi???c l???a ch???n ph????ng ti???n ??i l???i l?? m???t y???u t??? v?? c??ng quan tr???ng trong chuy???n ??i c???a b???n.</div>\r\n\r\n<div class="tt_tt_gt">?????n v???i th??nh ph??? bi???n ???? N???ng xinh ?????p, c?? r???t nhi???u ph????ng ti???n cho b???n l???a ch???n : taxi, xe bu??t, xe ?? t??, xe m??y, xe ??i???n,??? Tuy nhi??n, ??i???u b???n quan t??m l?? ph????ng ti???n n??o gi??p b???n di chuy???n ti???n l???i v?? ti???t ki???m chi ph?? nh???t!</div>\r\n\r\n<div class="name_tt_gt">\r\n<h3>D???ch v??? B??nh Minh</h3>\r\n</div>\r\n\r\n<div class="tt_tt_gt">Hi???u ???????c t??m l?? ????, ch??ng t??i D???ch v??? cho thu?? xe m??y B??nh Minh chuy??n <strong>cho thu?? xe m??y t???i ???? N???ng</strong>, cho thu?? xe ?? t?? ch???t l?????ng v?? gi?? r??? v???i ti??u ch?? ???Lu??n mang l???i s??? h??i l??ng cho kh??ch h??ng??? ch??ng t??i lu??n ph???c v??? kh??ch h??ng theo ph????ng ch??m ???G???i ????u c?? ??????? v???i th??? t???c ??? ????n gi???n, nhanh ch??ng???.</div>\r\n\r\n<div class="tt_tt_gt">?????n v???i th??nh ph??? bi???n ???? N???ng xinh ?????p, c?? r???t nhi???u ph????ng ti???n cho b???n l???a ch???n : taxi, xe bu??t, xe ?? t??, xe m??y, xe ??i???n,??? Tuy nhi??n, ??i???u b???n quan t??m l?? ph????ng ti???n n??o gi??p b???n di chuy???n ti???n l???i v?? ti???t ki???m chi ph?? nh???t!</div>\r\n\r\n<div class="table_tt_bgdvtxmdntnb">\r\n<div class="bgthuexe"><strong>B???ng gi?? thu?? xe m??y c???a d???ch v??? cho thu?? xe m??y B??nh Minh</strong></div>\r\n\r\n<table class="table table-bordered">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="2">Lo???i xe</td>\r\n			<td>1 ng??y</td>\r\n			<td>2 ng??y</td>\r\n			<td>3 ng??y</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="4">\r\n			<div class="td_rieng">\r\n			<p>Xe tay ga</p>\r\n			</div>\r\n			</td>\r\n			<td>Air Blade, Lead, Vision ?????i m???i</td>\r\n			<td>160.000??</td>\r\n			<td>150.000??</td>\r\n			<td>140.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Air Blade 2012</td>\r\n			<td>150.000??</td>\r\n			<td>140.000??</td>\r\n			<td>130.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nouvo LX, Attila Elizabeth</td>\r\n			<td>150.000??</td>\r\n			<td>140.000??</td>\r\n			<td>130.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Attila Victoria</td>\r\n			<td>150.000??</td>\r\n			<td>140.000??</td>\r\n			<td>130.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="3">\r\n			<div class="td_rieng">\r\n			<p>Xe g???n m??y</p>\r\n			</div>\r\n			</td>\r\n			<td>Wave RSX, Wave S</td>\r\n			<td>120.000??</td>\r\n			<td>110.000??</td>\r\n			<td>100.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jupiter</td>\r\n			<td>120.000??</td>\r\n			<td>110.000??</td>\r\n			<td>100.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sirius</td>\r\n			<td>120.000??</td>\r\n			<td>110.000??</td>\r\n			<td>100.000??</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<div class="tt_tt_gt">Ngo??i ra, D???ch v??? cho thu?? xe B??nh Minh c??n cho thu?? ?? t?? v???i c??c d??ng xe 4 ch???, 7 ch???, nh?? Mazda 3, Elantra, Innova, Fortuner,??? v???i m???c gi?? ph???i ch??ng nh???m ????p ???ng nhu c???u c???a kh??ch h??ng.</div>\r\n\r\n<div class="tt_tt_gt">V???i ?????i xe ???????c ?????u t?? ?????i m???i, ch???t l?????ng, ???????c b???o tr?? th?????ng xuy??n v?? ?????i ng?? nh??n vi??n nhi???t t??nh, s???n s??ng t?? v???n cho b???n v??? ???????ng ??i, kh??ch s???n gi?? r???, ?????a ??i???m tham quan, ??n u???ng, giao xe nhanh ch??ng, ch??ng t??i cam k???t lu??n cung c???p d???ch v??? thu?? xe ch???t l?????ng, uy t??n ?????n v???i kh??ch h??ng. Ch??ng t??i t??? h??o l?? ?????a ch??? thu?? xe m??y v?? ?? t?? uy t??n ???????c gi???i thi???u nhi???u nh???t b???i c??c b???n tr??? c?? kinh nghi???m du l???ch ???? N???ng.<br />\r\nH??y c??ng c??ng ty thu?? xe B??nh Minh kh??m ph?? m???i n???o ???????ng ???? N???ng!</div>\r\n\r\n<div class="anh_pgt"><img alt="" src="./public/img/anh_phan_gioi_thieu.jpg" /></div>\r\n\r\n<div class="tt_tt_gt">Cho thu?? xe m??y B??nh Minh chuy??n cho thu?? xe m??y t???i kh??ch s???n ???? N???ng uy t??n, xe ?????i m???i, gi?? r???, giao xe nhanh, mi???n ph??, th??? t???c ????n gi???n.</div>\r\n</div>\r\n</div>\r\n', '', '', 1, 0, '[]', '2022-10-05 09:50:00', '2022-10-06 08:00:47'),
(117, 'Nh???ng lo???i xe m??y m?? b??nh minh ??ang cho thu??', '', 'nhung-loai-xe-may-ma-binh-minh-dang-cho-thue', '56', 27, '', '', '', 0, 0, '[]', '2022-10-06 08:13:37', '2022-10-06 08:14:03'),
(118, 'b???ng gi?? chi ti???t', '', 'bang-gia-chi-tiet', '56', 27, '', '', '', 1, 0, '[]', '2022-10-06 08:14:20', '2022-10-06 08:14:20'),
(119, 'th??? t???c quan tr???ng nh???t ?????nh ph???i n???m', '', 'thu-tuc-quan-trong-nhat-dinh-phai-nam', '56', 27, '', '', '', 1, 0, '[]', '2022-10-06 08:14:55', '2022-10-06 08:14:55'),
(120, 'Nh???ng l??u ??', '', 'nhung-luu-y', '56', 27, '', '', '', 1, 0, '[]', '2022-10-06 08:15:19', '2022-10-06 08:15:19'),
(115, '??i???m ?????n', '', 'diem-den', '57', 27, 'Test t??', '', '', 1, 0, '[]', '2022-10-06 03:41:04', '2022-10-06 08:12:04'),
(116, 'Nh???ng lo???i xe m??y m?? b??nh minh ??ang cho thu??', '', 'nhung-loai-xe-may-ma-binh-minh-dang-cho-thue', '56', 27, '', '', '', 1, 0, '[]', '2022-10-06 08:13:31', '2022-10-06 08:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ma_tien` varchar(11) NOT NULL,
  `ky_hieu` varchar(255) NOT NULL,
  `gia_tien_chuyen_doi` bigint(20) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `name`, `ma_tien`, `ky_hieu`, `gia_tien_chuyen_doi`, `created_at`, `updated_at`) VALUES
(1, 'Vi???t nam ?????ng ', 'Vnd', '??', 1, '2019-06-20', '2019-06-22'),
(2, '???? la m??? ', 'usd', '$', 23000, '2019-06-20', '2019-06-22'),
(6, 'Euro', 'euro', '???', 30000, '2019-06-22', '2019-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_alias` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cat_khoa_chinh` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `cat_id_1` int(11) NOT NULL,
  `cat_id_2` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` bigint(255) NOT NULL,
  `price_old` int(11) NOT NULL,
  `don_hang` int(11) NOT NULL,
  `loai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_san_pham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tieu_chuan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `xuat_xu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyen_mai` date NOT NULL,
  `nhap_khau_va_phan_phoi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_two` text COLLATE utf8_unicode_ci NOT NULL,
  `the_tu_khoa` longtext COLLATE utf8_unicode_ci NOT NULL,
  `the_gioi_thieu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status_product` tinyint(1) DEFAULT NULL,
  `image_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_list` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image_lien_quan` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image_list_1` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image_list_2` longtext COLLATE utf8_unicode_ci NOT NULL,
  `view` bigint(20) NOT NULL,
  `admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `port_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_alias`, `excerpt`, `cat_id`, `cat_khoa_chinh`, `cat_id_1`, `cat_id_2`, `admin_id`, `name`, `link`, `tag`, `price`, `price_old`, `don_hang`, `loai`, `ma_san_pham`, `tieu_chuan`, `xuat_xu`, `khuyen_mai`, `nhap_khau_va_phan_phoi`, `content`, `color`, `size`, `content_two`, `the_tu_khoa`, `the_gioi_thieu`, `status_product`, `image_link`, `image_list`, `image_lien_quan`, `image_list_1`, `image_list_2`, `view`, `admin`, `created_at`, `updated_at`, `port_id`) VALUES
(1, 'phan-mem-tra-cuu-tuyen-xe-buyt-tren-dien-thoai-tai-da-nang', '', '-582-', '582', 0, 0, 27, 'Ph???n m???m tra c???u tuy???n xe buyt tr??n ??i???n tho???i t???i ???? N???ng', '', '', 0, 0, 0, '', '', '', '', '0000-00-00', '', '<div class="all_the" style="box-sizing: border-box; margin: 0px; padding: 0px;">\r\n<div class="mota_ttdl" style="box-sizing: border-box; margin: 20px 0px; padding: 0px; text-align: center;">\r\n<div class="about_mota_tt" style="box-sizing: border-box; margin: 10px 0px; padding: 0px; text-align: left;"><a href="http://localhost/binhminh/tintucdulich#" style="box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(0, 0, 0); text-decoration-line: none; font-family: -apple-system, BlinkMacSystemFont, ">Hi???n nay, t???i ???? N???ng ??ang m??? r???ng v?? ph??t tri???n nhi???u tuy???n xe bu??t [...]</a></div>\r\n</div>\r\n</div>\r\n', '', '', '', '', 'Hi???n nay, t???i ???? N???ng ??ang m??? r???ng v?? ph??t tri???n nhi???u tuy???n xe bu??t [...]', 1, '', '[]', '', '', '', 0, 'admin', '2022-10-01 03:59:10', '2022-10-03 04:16:52', 0),
(870, 'choi-gi-o-da-nang-1-ngay-lich-trinh-di-het-da-nang-trong-ngay-chi-tiet', '', '-582-', '582', 0, 0, 27, 'Ch??i G?? ??? ???? N???ng 1 Ng??y? L???ch Tr??nh ??i H???t ???? N???ng Trong Ng??y Chi Ti???t', '', '', 0, 0, 0, '', '', '', '', '0000-00-00', '', '???? N???ng m???t ??i???m ?????n du l???ch, tham quan, ngh??? d?????ng l?? t?????ng c???a nhi???u [...]', '', '', '', '', '???? N???ng m???t ??i???m ?????n du l???ch, tham quan, ngh??? d?????ng l?? t?????ng c???a nhi???u [...]', 1, '', '[]', '', '', '', 0, 'admin', '2022-10-03 04:35:40', '2022-10-03 07:04:43', 0),
(871, 'fv', '', '-582-', '582', 0, 0, 27, 'test', '', '', 0, 0, 0, '', '', '', '', '0000-00-00', '', '<div class="gioi_thieu">\r\n<div class="container">\r\n<div class="name_tt_gt">\r\n<h3>&nbsp;</h3>\r\n</div>\r\n\r\n<div class="tt_tt_gt">????? c?? m???t chuy???n du l???ch ho??n h???o nh?? mong mu???n ngo??i vi???c l??n k??? ho???ch ?????t ph??ng kh??ch s???n, l???ch tr??nh tham quan, vui ch??i, ?????a ??i???m ??n u???ng,??? th?? m???t trong nh???ng ??i???u b???n kh??ng th??? kh??ng chu???n b??? tr?????c ???? l?? ph????ng ti???n ??i l???i. Vi???c l???a ch???n ph????ng ti???n ??i l???i l?? m???t y???u t??? v?? c??ng quan tr???ng trong chuy???n ??i c???a b???n.</div>\r\n\r\n<div class="tt_tt_gt">?????n v???i th??nh ph??? bi???n ???? N???ng xinh ?????p, c?? r???t nhi???u ph????ng ti???n cho b???n l???a ch???n : taxi, xe bu??t, xe ?? t??, xe m??y, xe ??i???n,??? Tuy nhi??n, ??i???u b???n quan t??m l?? ph????ng ti???n n??o gi??p b???n di chuy???n ti???n l???i v?? ti???t ki???m chi ph?? nh???t!</div>\r\n\r\n<div class="name_tt_gt">\r\n<h3>D???ch v??? B??nh Minh</h3>\r\n</div>\r\n\r\n<div class="tt_tt_gt">Hi???u ???????c t??m l?? ????, ch??ng t??i D???ch v??? cho thu?? xe m??y B??nh Minh chuy??n <strong>cho thu?? xe m??y t???i ???? N???ng</strong>, cho thu?? xe ?? t?? ch???t l?????ng v?? gi?? r??? v???i ti??u ch?? ???Lu??n mang l???i s??? h??i l??ng cho kh??ch h??ng??? ch??ng t??i lu??n ph???c v??? kh??ch h??ng theo ph????ng ch??m ???G???i ????u c?? ??????? v???i th??? t???c ??? ????n gi???n, nhanh ch??ng???.</div>\r\n\r\n<div class="tt_tt_gt">?????n v???i th??nh ph??? bi???n ???? N???ng xinh ?????p, c?? r???t nhi???u ph????ng ti???n cho b???n l???a ch???n : taxi, xe bu??t, xe ?? t??, xe m??y, xe ??i???n,??? Tuy nhi??n, ??i???u b???n quan t??m l?? ph????ng ti???n n??o gi??p b???n di chuy???n ti???n l???i v?? ti???t ki???m chi ph?? nh???t!</div>\r\n\r\n<div class="table_tt_bgdvtxmdntnb">\r\n<div class="bgthuexe"><strong>B???ng gi?? thu?? xe m??y c???a d???ch v??? cho thu?? xe m??y B??nh Minh</strong></div>\r\n\r\n<table class="table table-bordered">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="2">Lo???i xe</td>\r\n			<td>1 ng??y</td>\r\n			<td>2 ng??y</td>\r\n			<td>3 ng??y</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="4">\r\n			<div class="td_rieng">\r\n			<p>Xe tay ga</p>\r\n			</div>\r\n			</td>\r\n			<td>Air Blade, Lead, Vision ?????i m???i</td>\r\n			<td>160.000??</td>\r\n			<td>150.000??</td>\r\n			<td>140.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Air Blade 2012</td>\r\n			<td>150.000??</td>\r\n			<td>140.000??</td>\r\n			<td>130.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nouvo LX, Attila Elizabeth</td>\r\n			<td>150.000??</td>\r\n			<td>140.000??</td>\r\n			<td>130.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Attila Victoria</td>\r\n			<td>150.000??</td>\r\n			<td>140.000??</td>\r\n			<td>130.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="3">\r\n			<div class="td_rieng">\r\n			<p>Xe g???n m??y</p>\r\n			</div>\r\n			</td>\r\n			<td>Wave RSX, Wave S</td>\r\n			<td>120.000??</td>\r\n			<td>110.000??</td>\r\n			<td>100.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jupiter</td>\r\n			<td>120.000??</td>\r\n			<td>110.000??</td>\r\n			<td>100.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sirius</td>\r\n			<td>120.000??</td>\r\n			<td>110.000??</td>\r\n			<td>100.000??</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<div class="tt_tt_gt">Ngo??i ra, D???ch v??? cho thu?? xe B??nh Minh c??n cho thu?? ?? t?? v???i c??c d??ng xe 4 ch???, 7 ch???, nh?? Mazda 3, Elantra, Innova, Fortuner,??? v???i m???c gi?? ph???i ch??ng nh???m ????p ???ng nhu c???u c???a kh??ch h??ng.</div>\r\n\r\n<div class="tt_tt_gt">V???i ?????i xe ???????c ?????u t?? ?????i m???i, ch???t l?????ng, ???????c b???o tr?? th?????ng xuy??n v?? ?????i ng?? nh??n vi??n nhi???t t??nh, s???n s??ng t?? v???n cho b???n v??? ???????ng ??i, kh??ch s???n gi?? r???, ?????a ??i???m tham quan, ??n u???ng, giao xe nhanh ch??ng, ch??ng t??i cam k???t lu??n cung c???p d???ch v??? thu?? xe ch???t l?????ng, uy t??n ?????n v???i kh??ch h??ng. Ch??ng t??i t??? h??o l?? ?????a ch??? thu?? xe m??y v?? ?? t?? uy t??n ???????c gi???i thi???u nhi???u nh???t b???i c??c b???n tr??? c?? kinh nghi???m du l???ch ???? N???ng.<br />\r\nH??y c??ng c??ng ty thu?? xe B??nh Minh kh??m ph?? m???i n???o ???????ng ???? N???ng!</div>\r\n\r\n<div class="anh_pgt"><img alt="" src="./public/img/anh_phan_gioi_thieu.jpg" /></div>\r\n\r\n<div class="tt_tt_gt">Cho thu?? xe m??y B??nh Minh chuy??n cho thu?? xe m??y t???i kh??ch s???n ???? N???ng uy t??n, xe ?????i m???i, gi?? r???, giao xe nhanh, mi???n ph??, th??? t???c ????n gi???n.</div>\r\n</div>\r\n</div>\r\n', '', '', '', '', '', 1, '', '[]', '', '', '', 0, 'admin', '2022-10-03 07:01:11', '2022-10-06 03:38:33', 0),
(872, 'loi-khuyen-khi-di-choi-khong-ru-thai', '', '-582-', '582', 0, 0, 27, 'L???i khuy??n khi ??i ch??i kh??ng r??? Th??i', '', '', 0, 0, 0, '', '', '', '', '0000-00-00', '', 'H??y c?????i ??i v?? mai kh??ng c?????i ???????c n???a ????u!!!!<br />\r\nTu bi con t?? hiu<br />\r\nkakaka<br />\r\n&nbsp;', '', '', '', '', 'cho 1 l???i khuy??n', 1, '', '[]', '', '', '', 0, 'thai', '2022-10-03 07:41:54', '2023-03-05 06:43:28', 0),
(873, 'test2', '', '-582-', '582', 0, 0, 27, 'test2', '', '', 0, 0, 0, '', '', '', '', '0000-00-00', '', '<div class="gioi_thieu">\r\n<div class="container">\r\n<div class="name_tt_gt">\r\n<h3>&nbsp;</h3>\r\n</div>\r\n\r\n<div class="tt_tt_gt">????? c?? m???t chuy???n du l???ch ho??n h???o nh?? mong mu???n ngo??i vi???c l??n k??? ho???ch ?????t ph??ng kh??ch s???n, l???ch tr??nh tham quan, vui ch??i, ?????a ??i???m ??n u???ng,??? th?? m???t trong nh???ng ??i???u b???n kh??ng th??? kh??ng chu???n b??? tr?????c ???? l?? ph????ng ti???n ??i l???i. Vi???c l???a ch???n ph????ng ti???n ??i l???i l?? m???t y???u t??? v?? c??ng quan tr???ng trong chuy???n ??i c???a b???n.</div>\r\n\r\n<div class="tt_tt_gt">?????n v???i th??nh ph??? bi???n ???? N???ng xinh ?????p, c?? r???t nhi???u ph????ng ti???n cho b???n l???a ch???n : taxi, xe bu??t, xe ?? t??, xe m??y, xe ??i???n,??? Tuy nhi??n, ??i???u b???n quan t??m l?? ph????ng ti???n n??o gi??p b???n di chuy???n ti???n l???i v?? ti???t ki???m chi ph?? nh???t!</div>\r\n\r\n<div class="name_tt_gt">\r\n<h3>D???ch v??? B??nh Minh</h3>\r\n</div>\r\n\r\n<div class="tt_tt_gt">Hi???u ???????c t??m l?? ????, ch??ng t??i D???ch v??? cho thu?? xe m??y B??nh Minh chuy??n <strong>cho thu?? xe m??y t???i ???? N???ng</strong>, cho thu?? xe ?? t?? ch???t l?????ng v?? gi?? r??? v???i ti??u ch?? ???Lu??n mang l???i s??? h??i l??ng cho kh??ch h??ng??? ch??ng t??i lu??n ph???c v??? kh??ch h??ng theo ph????ng ch??m ???G???i ????u c?? ??????? v???i th??? t???c ??? ????n gi???n, nhanh ch??ng???.</div>\r\n\r\n<div class="tt_tt_gt">?????n v???i th??nh ph??? bi???n ???? N???ng xinh ?????p, c?? r???t nhi???u ph????ng ti???n cho b???n l???a ch???n : taxi, xe bu??t, xe ?? t??, xe m??y, xe ??i???n,??? Tuy nhi??n, ??i???u b???n quan t??m l?? ph????ng ti???n n??o gi??p b???n di chuy???n ti???n l???i v?? ti???t ki???m chi ph?? nh???t!</div>\r\n\r\n<div class="table_tt_bgdvtxmdntnb">\r\n<div class="bgthuexe"><strong>B???ng gi?? thu?? xe m??y c???a d???ch v??? cho thu?? xe m??y B??nh Minh</strong></div>\r\n\r\n<table class="table table-bordered">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="2">Lo???i xe</td>\r\n			<td>1 ng??y</td>\r\n			<td>2 ng??y</td>\r\n			<td>3 ng??y</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="4">\r\n			<div class="td_rieng">\r\n			<p>Xe tay ga</p>\r\n			</div>\r\n			</td>\r\n			<td>Air Blade, Lead, Vision ?????i m???i</td>\r\n			<td>160.000??</td>\r\n			<td>150.000??</td>\r\n			<td>140.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Air Blade 2012</td>\r\n			<td>150.000??</td>\r\n			<td>140.000??</td>\r\n			<td>130.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nouvo LX, Attila Elizabeth</td>\r\n			<td>150.000??</td>\r\n			<td>140.000??</td>\r\n			<td>130.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Attila Victoria</td>\r\n			<td>150.000??</td>\r\n			<td>140.000??</td>\r\n			<td>130.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="3">\r\n			<div class="td_rieng">\r\n			<p>Xe g???n m??y</p>\r\n			</div>\r\n			</td>\r\n			<td>Wave RSX, Wave S</td>\r\n			<td>120.000??</td>\r\n			<td>110.000??</td>\r\n			<td>100.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Jupiter</td>\r\n			<td>120.000??</td>\r\n			<td>110.000??</td>\r\n			<td>100.000??</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sirius</td>\r\n			<td>120.000??</td>\r\n			<td>110.000??</td>\r\n			<td>100.000??</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<div class="tt_tt_gt">Ngo??i ra, D???ch v??? cho thu?? xe B??nh Minh c??n cho thu?? ?? t?? v???i c??c d??ng xe 4 ch???, 7 ch???, nh?? Mazda 3, Elantra, Innova, Fortuner,??? v???i m???c gi?? ph???i ch??ng nh???m ????p ???ng nhu c???u c???a kh??ch h??ng.</div>\r\n\r\n<div class="tt_tt_gt">V???i ?????i xe ???????c ?????u t?? ?????i m???i, ch???t l?????ng, ???????c b???o tr?? th?????ng xuy??n v?? ?????i ng?? nh??n vi??n nhi???t t??nh, s???n s??ng t?? v???n cho b???n v??? ???????ng ??i, kh??ch s???n gi?? r???, ?????a ??i???m tham quan, ??n u???ng, giao xe nhanh ch??ng, ch??ng t??i cam k???t lu??n cung c???p d???ch v??? thu?? xe ch???t l?????ng, uy t??n ?????n v???i kh??ch h??ng. Ch??ng t??i t??? h??o l?? ?????a ch??? thu?? xe m??y v?? ?? t?? uy t??n ???????c gi???i thi???u nhi???u nh???t b???i c??c b???n tr??? c?? kinh nghi???m du l???ch ???? N???ng.<br />\r\nH??y c??ng c??ng ty thu?? xe B??nh Minh kh??m ph?? m???i n???o ???????ng ???? N???ng!</div>\r\n\r\n<div class="anh_pgt"><img alt="" src="./public/img/anh_phan_gioi_thieu.jpg" /></div>\r\n\r\n<div class="tt_tt_gt">Cho thu?? xe m??y B??nh Minh chuy??n cho thu?? xe m??y t???i kh??ch s???n ???? N???ng uy t??n, xe ?????i m???i, gi?? r???, giao xe nhanh, mi???n ph??, th??? t???c ????n gi???n.</div>\r\n</div>\r\n</div>\r\n', '', '', '', 'test2', 'test2', 1, '', '[]', '', '', '', 0, 'thai', '2022-10-04 10:25:20', '2023-03-05 06:42:52', 0),
(876, 'tin-tuc-du-lich', '', '-584-', '', 0, 0, 27, 'gi???i thi???u', '', '', 0, 0, 0, '', '', '', '', '0000-00-00', '', '<div class="gioi_thieu">\r\n    <div class="container">\r\n        <div class="name_tt_gt">\r\n            <h3 class="text-center">Gi???i Thi???u</h3>\r\n        </div>\r\n        \r\n        <div class="tt_tt_gt">\r\n            ????? c?? m???t chuy???n du l???ch ho??n h???o nh?? mong mu???n ngo??i vi???c l??n k??? ho???ch ?????t ph??ng kh??ch s???n, l???ch tr??nh tham quan, vui ch??i, ?????a ??i???m ??n u???ng,??? th?? m???t trong nh???ng ??i???u b???n kh??ng th??? kh??ng chu???n b??? tr?????c ???? l?? ph????ng ti???n ??i l???i. Vi???c l???a ch???n ph????ng ti???n ??i l???i l?? m???t y???u t??? v?? c??ng quan tr???ng trong chuy???n ??i c???a b???n.\r\n        </div>\r\n\r\n        <div class="tt_tt_gt">\r\n            ?????n v???i th??nh ph??? bi???n ???? N???ng xinh ?????p, c?? r???t nhi???u ph????ng ti???n cho b???n l???a ch???n : taxi, xe bu??t, xe ?? t??, xe m??y, xe ??i???n,??? Tuy nhi??n, ??i???u b???n quan t??m l??  ph????ng ti???n n??o gi??p b???n di chuy???n ti???n l???i v?? ti???t ki???m chi ph?? nh???t!\r\n        </div>\r\n\r\n        <div class="name_tt_gt">\r\n            <h3 class="text-center">D???ch v??? B??nh Minh</h3>\r\n        </div>\r\n        \r\n        <div class="tt_tt_gt">\r\n            Hi???u ???????c t??m l?? ????, ch??ng t??i D???ch v??? cho thu?? xe m??y B??nh Minh chuy??n <b>cho thu?? xe m??y t???i ???? N???ng</b>, cho thu?? xe ?? t?? ch???t l?????ng v?? gi?? r??? v???i ti??u ch?? ???Lu??n mang l???i s??? h??i l??ng cho kh??ch h??ng??? ch??ng t??i lu??n ph???c v??? kh??ch h??ng  theo ph????ng ch??m ???G???i ????u c?? ??????? v???i th??? t???c ??? ????n gi???n, nhanh ch??ng???.\r\n        </div>\r\n\r\n        <div class="tt_tt_gt">\r\n            ?????n v???i th??nh ph??? bi???n ???? N???ng xinh ?????p, c?? r???t nhi???u ph????ng ti???n cho b???n l???a ch???n : taxi, xe bu??t, xe ?? t??, xe m??y, xe ??i???n,??? Tuy nhi??n, ??i???u b???n quan t??m l??  ph????ng ti???n n??o gi??p b???n di chuy???n ti???n l???i v?? ti???t ki???m chi ph?? nh???t!\r\n        </div>\r\n\r\n        <div class="table_tt_bgdvtxmdntnb">\r\n            <div class="bgthuexe">\r\n                <b>B???ng gi?? thu?? xe m??y c???a d???ch v??? cho thu?? xe m??y B??nh Minh</b>\r\n            </div>\r\n\r\n              <table class="table table-bordered">\r\n                <tbody> \r\n                  <tr>\r\n                    <td colspan="2">Lo???i xe</td>\r\n                    <td>1 ng??y</td>\r\n                    <td>2 ng??y</td>\r\n                    <td>3 ng??y</td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td rowspan="4">\r\n                      <div class="td_rieng">\r\n                        <p>Xe tay ga</p>\r\n                      </div>\r\n                    </td>\r\n                    <td>Air Blade, Lead, Vision ?????i m???i</td>\r\n                    <td>160.000??</td>\r\n                    <td>150.000??</td>\r\n                    <td>140.000??</td>\r\n                  </tr> \r\n                  <tr>\r\n                    <td>Air Blade 2012</td>\r\n                    <td>150.000??</td>\r\n                    <td>140.000??</td>\r\n                    <td>130.000??</td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td>Nouvo LX, Attila Elizabeth</td>\r\n                    <td>150.000??</td>\r\n                    <td>140.000??</td>\r\n                    <td>130.000??</td>\r\n                  </tr>\r\n                  <tr>  \r\n                    <td>Attila Victoria</td>\r\n                    <td>150.000??</td>\r\n                    <td>140.000??</td>\r\n                    <td>130.000??</td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td rowspan="3">\r\n                      <div class="td_rieng">\r\n                        <p>Xe g???n m??y</p>\r\n                      </div>\r\n                    </td>\r\n                    <td>Wave RSX, Wave S</td>\r\n                    <td>120.000??</td>\r\n                    <td>110.000??</td>\r\n                    <td>100.000??</td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td>Jupiter</td>\r\n                    <td>120.000??</td>\r\n                    <td>110.000??</td>\r\n                    <td>100.000??</td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td>Sirius</td>\r\n                    <td>120.000??</td>\r\n                    <td>110.000??</td>\r\n                    <td>100.000??</td>\r\n                  </tr>\r\n                </tbody>\r\n              </table> \r\n        </div>\r\n\r\n        <div class="tt_tt_gt">\r\n            Ngo??i ra, D???ch v??? cho thu?? xe B??nh Minh c??n cho thu?? ?? t?? v???i c??c d??ng xe 4 ch???, 7 ch???, nh?? Mazda 3, Elantra, Innova, Fortuner,??? v???i m???c gi?? ph???i ch??ng nh???m ????p ???ng nhu c???u c???a kh??ch h??ng.\r\n        </div>\r\n\r\n        <div class="tt_tt_gt">\r\n            V???i ?????i xe ???????c ?????u t?? ?????i m???i, ch???t l?????ng, ???????c b???o tr?? th?????ng xuy??n v?? ?????i ng?? nh??n vi??n nhi???t t??nh, s???n s??ng t?? v???n  cho b???n v??? ???????ng ??i, kh??ch s???n gi?? r???, ?????a ??i???m tham quan, ??n u???ng, giao xe nhanh ch??ng, ch??ng t??i cam k???t lu??n cung c???p d???ch v??? thu?? xe ch???t l?????ng, uy t??n ?????n v???i kh??ch h??ng. Ch??ng t??i t??? h??o l?? ?????a ch??? thu?? xe m??y  v?? ?? t?? uy t??n ???????c gi???i thi???u nhi???u nh???t b???i c??c b???n tr??? c?? kinh nghi???m du l???ch ???? N???ng.<br>\r\n            H??y c??ng c??ng ty thu?? xe B??nh Minh kh??m ph?? m???i n???o ???????ng ???? N???ng!\r\n        </div>\r\n\r\n        <div class="anh_pgt">\r\n            <img src="./public/img/anh_phan_gioi_thieu.jpg" alt="">\r\n        </div>\r\n\r\n        <div class="tt_tt_gt">\r\n            Cho thu?? xe m??y B??nh Minh chuy??n cho thu?? xe m??y t???i kh??ch s???n ???? N???ng uy t??n, xe ?????i m???i, gi?? r???, giao xe nhanh, mi???n ph??, th??? t???c ????n gi???n.\r\n        </div>\r\n    </div>\r\n</div>', '', '', '', '', '', 0, '', '[]', '', '', '', 0, 'admin', '2022-10-05 04:10:36', '2022-10-05 06:50:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply_comment`
--

CREATE TABLE `reply_comment` (
  `id_reply` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL,
  `id_cm` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment_reply` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reply_comment`
--

INSERT INTO `reply_comment` (`id_reply`, `id`, `id_cm`, `user_id`, `comment_reply`, `created_at`, `updated_at`) VALUES
(8, 872, 76, 0, 'Ngh?? m l?? i', '2022-10-14 09:01:40', '2022-10-14 09:01:40'),
(9, 1, 77, 0, '????u', '2022-10-14 09:18:18', '2022-10-14 09:18:18'),
(10, 1, 77, 0, '????y', '2022-10-14 10:16:57', '2022-10-14 10:16:57'),
(11, 1, 74, 0, 'hahha\r\n', '2022-10-15 02:59:22', '2022-10-15 02:59:22'),
(12, 1, 74, 0, 'tha', '2022-10-15 02:59:48', '2022-10-15 02:59:48'),
(13, 1, 77, 0, 'th??i', '2022-10-15 03:00:00', '2022-10-15 03:00:00'),
(16, 1, 77, 0, 'ng??o', '2022-10-15 03:13:54', '2022-10-15 03:13:54'),
(17, 870, 82, 0, 'hhaha', '2022-10-15 03:58:14', '2022-10-15 03:58:14'),
(18, 870, 83, 0, 'hahah', '2022-10-15 04:01:28', '2022-10-15 04:01:28'),
(22, 870, 85, 0, 'ngvhgfhgf', '2022-10-15 04:08:56', '2022-10-15 04:08:56'),
(23, 870, 85, 0, '592222323', '2022-10-15 04:09:05', '2022-10-15 04:09:05'),
(24, 870, 78, 0, 'em xin kl???i', '2022-10-15 04:13:45', '2022-10-15 04:13:45'),
(26, 870, 86, 0, 'hihi', '2022-10-15 04:25:17', '2022-10-15 04:25:17'),
(27, 1, 88, 0, 'l??m g?? c?? c??i g?? cho  m xin', '2022-10-16 08:46:18', '2022-10-16 08:46:18'),
(28, 1, 88, 0, 'Th?? c??? xin t???m v???y', '2022-10-16 08:46:35', '2022-10-16 08:46:35'),
(29, 873, 68, 0, 'haha tr??? tr??u', '2022-10-16 08:47:48', '2022-10-16 08:47:48'),
(30, 870, 87, 0, 'xbcjzdscb,', '2022-10-25 03:58:10', '2022-10-25 03:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name_size` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name_size`, `created_at`, `updated_at`) VALUES
(1, 'images', '2019-07-01', '2019-08-17'),
(2, 'text', '2019-07-01', '2019-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `son`
--

CREATE TABLE `son` (
  `id` bigint(10) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `son`
--

INSERT INTO `son` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'son_admin 55555', '2019-03-30 10:01:54', '2019-03-30 10:01:54'),
(3, 'aaaaaa', '2019-03-30 09:26:26', '0000-00-00 00:00:00'),
(4, 'bbbbbbbbbb', '2019-03-30 09:26:26', '0000-00-00 00:00:00'),
(5, 'aaaaaa', '2019-03-30 09:26:28', '0000-00-00 00:00:00'),
(6, 'bbbbbbbbbb', '2019-03-30 09:26:28', '0000-00-00 00:00:00'),
(7, '222222222', '2019-03-30 09:49:45', '2019-03-30 09:49:45'),
(8, '999999999911', '2019-03-30 10:02:30', '2019-03-30 10:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `tin_nhan`
--

CREATE TABLE `tin_nhan` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` bigint(20) NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `security` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '0982992985', '', '520d216df49a852e6f1c1b5517a41a10', '2022-03-17 02:52:02', '2022-03-17 02:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `vi_tri_field`
--

CREATE TABLE `vi_tri_field` (
  `id` int(11) NOT NULL,
  `ten_vi_tri` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `stt` int(11) NOT NULL,
  `mo_ta` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vi_tri_field`
--

INSERT INTO `vi_tri_field` (`id`, `ten_vi_tri`, `admin_id`, `stt`, `mo_ta`, `created_at`, `updated_at`) VALUES
(143, 'phone', 27, 1, '', '2019-09-24', '2019-10-08'),
(144, 'email', 27, 2, '', '2019-09-24', '2019-10-08'),
(145, 'logo', 27, 6, '', '2019-09-24', '2019-10-08'),
(146, 'gioi thieu', 27, 7, '', '2019-09-24', '2019-10-08'),
(147, 'img-phone', 27, 8, '', '2019-09-24', '2019-10-08'),
(148, 'banner', 27, 9, '', '2019-09-24', '2019-10-08'),
(149, 'banner', 27, 10, '', '2019-09-24', '2019-10-08'),
(150, 'banner', 27, 11, '', '2019-09-24', '2019-10-08'),
(151, 't??n c??ng ty', 27, 12, '', '2019-09-24', '2019-10-08'),
(152, '?????a ch???', 27, 13, '', '2019-09-24', '2019-10-08'),
(153, 'so dt', 27, 14, '', '2019-09-24', '2019-10-08'),
(154, 'mail', 27, 15, '', '2019-09-24', '2019-10-08'),
(155, 't??n web', 27, 16, '', '2019-09-24', '2019-10-08'),
(156, 'b???n ?????', 27, 17, '', '2019-10-08', '2019-10-08'),
(157, 'mxh', 27, 18, '', '2019-10-09', '2019-10-09'),
(158, 'mxh', 27, 19, '', '2019-10-09', '2019-10-09'),
(159, 'mxh', 27, 20, '', '2019-10-09', '2019-10-09'),
(160, 'mxh', 27, 21, '', '2019-10-09', '2019-10-09'),
(161, 'images', 27, 3, '', '2019-10-09', '2019-10-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_new`
--
ALTER TABLE `cat_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_cm`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_prd` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `counter_ips`
--
ALTER TABLE `counter_ips`
  ADD UNIQUE KEY `ip` (`ip`);

--
-- Indexes for table `counter_values`
--
ALTER TABLE `counter_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_mua`
--
ALTER TABLE `dat_mua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dinh_dang_field`
--
ALTER TABLE `dinh_dang_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus_item`
--
ALTER TABLE `menus_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_comment`
--
ALTER TABLE `reply_comment`
  ADD PRIMARY KEY (`id_reply`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `son`
--
ALTER TABLE `son`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tin_nhan`
--
ALTER TABLE `tin_nhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vi_tri_field`
--
ALTER TABLE `vi_tri_field`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=583;
--
-- AUTO_INCREMENT for table `cat_new`
--
ALTER TABLE `cat_new`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_cm` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `dat_mua`
--
ALTER TABLE `dat_mua`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dinh_dang_field`
--
ALTER TABLE `dinh_dang_field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menus_item`
--
ALTER TABLE `menus_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=877;
--
-- AUTO_INCREMENT for table `reply_comment`
--
ALTER TABLE `reply_comment`
  MODIFY `id_reply` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `son`
--
ALTER TABLE `son`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vi_tri_field`
--
ALTER TABLE `vi_tri_field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
