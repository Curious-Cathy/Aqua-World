-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2021 at 07:24 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_aquaworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accessories`
--

CREATE TABLE `tbl_accessories` (
  `accessories_id` int(100) NOT NULL auto_increment,
  `shop_id` int(50) NOT NULL,
  `accessories_name` varchar(100) NOT NULL,
  `accessories_image` varchar(100) NOT NULL,
  `accessories_rate` int(100) NOT NULL,
  `accessories_description` varchar(100) NOT NULL,
  `producttype_id` int(100) NOT NULL,
  PRIMARY KEY  (`accessories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_accessories`
--

INSERT INTO `tbl_accessories` (`accessories_id`, `shop_id`, `accessories_name`, `accessories_image`, `accessories_rate`, `accessories_description`, `producttype_id`) VALUES
(7, 9, 'Pumb(15V)', 'fish25.jfif', 750, '15V pumb with Filter', 15),
(8, 9, 'Fish Food', 'backblack.jpg', 50, 'Samll pellats for small fishs like guppies', 15),
(9, 9, 'Cleaning Medicine', 'sea2.png', 150, 'Use 1 drop with each 2 liters of water', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aquariumtype`
--

CREATE TABLE `tbl_aquariumtype` (
  `atype_id` int(11) NOT NULL auto_increment,
  `shop_id` int(11) NOT NULL,
  `producttype_id` int(11) NOT NULL,
  `atype_name` varchar(100) NOT NULL,
  `atype_rate` int(11) NOT NULL,
  `atype_image` varchar(100) NOT NULL,
  PRIMARY KEY  (`atype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_aquariumtype`
--

INSERT INTO `tbl_aquariumtype` (`atype_id`, `shop_id`, `producttype_id`, `atype_name`, `atype_rate`, `atype_image`) VALUES
(4, 2, 0, 'gybg', 555, '1625017004895.jpg'),
(5, 9, 0, 'Boul(small)', 100, 'sea2.png'),
(6, 9, 0, 'Boul(large)', 150, 'bluee.jpg'),
(7, 9, 0, 'Fully Automatic Tank', 2500, 'fish25.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL auto_increment,
  `complainttype_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_details` varchar(3000) NOT NULL,
  `complaint_status` int(11) NOT NULL default '0',
  `complaint_reply` varchar(2000) NOT NULL,
  PRIMARY KEY  (`complaint_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complainttype_id`, `user_id`, `complaint_date`, `complaint_details`, `complaint_status`, `complaint_reply`) VALUES
(1, 10, 16, '2021-12-27', 'aaaa', 1, 'ok'),
(2, 10, 16, '2021-12-27', 'Wrong item', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(11) NOT NULL auto_increment,
  `complainttype_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`complainttype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(10, 'Wrong item delivry'),
(11, 'Unsatisfied Product'),
(13, 'Damaged item'),
(14, 'Item not deliverd yet'),
(15, 'Poor quality'),
(18, 'Wrong item delivry'),
(20, 'Froad attitude');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL auto_increment,
  `district_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(28, 'Kasaragod'),
(29, 'Kannur'),
(30, 'Wayanad'),
(31, 'Kozhikode'),
(32, 'Malappuram'),
(33, 'Palakkad'),
(34, 'Thrissur'),
(35, 'Ernakulam'),
(36, 'Idukki'),
(37, 'Kottayam'),
(38, 'Alappuzha'),
(39, 'Pathanamthitta'),
(40, 'Kollam'),
(41, 'Thiruvananthapuram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL auto_increment,
  `feedback_details` varchar(1000) NOT NULL,
  `feedback_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_fish`
--

CREATE TABLE `tbl_fish` (
  `fish_id` int(11) NOT NULL auto_increment,
  `fishtype_id` int(11) NOT NULL,
  `fish_name` varchar(100) NOT NULL,
  `fish_price` int(11) NOT NULL,
  `fish_image` varchar(100) NOT NULL,
  `fish_description` varchar(100) NOT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY  (`fish_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_fish`
--

INSERT INTO `tbl_fish` (`fish_id`, `fishtype_id`, `fish_name`, `fish_price`, `fish_image`, `fish_description`, `shop_id`) VALUES
(2, 9, 'Carp', 1000, 'Screenshot (3).png', 'Red color with 15cm size', 2),
(3, 9, 'white molly', 150, 'Screenshot (4).png', 'White color', 2),
(4, 11, 'full red guppy', 150, 'Screenshot (2).png', 'red 1 , month old', 2),
(7, 11, 'white Guppy', 150, 'Screenshot (1).png', 'white ,1 month old', 6),
(8, 11, 'golden guppy', 13342, 'Screenshot (2).png', 'golden color', 6),
(9, 10, 'Platty', 140, 'Screenshot (3).png', 'Short body', 6),
(10, 9, 'effe', 0, '1625017004895.jpg', 'ff', 0),
(11, 19, 'Fighter', 150, 'violet.jpg', 'Red color,1 month old\r\n', 9),
(12, 26, 'Full red guppy', 200, 'ang.png', 'Full body red,dosel,with out ear', 9),
(14, 23, 'Black Mora', 60, 'IMG_20210627_230828.jpg', 'Juvanile size', 9),
(15, 22, 'Gold Fish', 100, 'fish24.jfif', 'Dumbo gold', 9),
(16, 22, 'Goldie', 50, 'q4.jpg', 'Gold with White', 9),
(19, 22, 'Gold', 150, 'goldyyy.jpg', 'gold with white', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fishtype`
--

CREATE TABLE `tbl_fishtype` (
  `fishtype_id` int(11) NOT NULL auto_increment,
  `fishtype_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`fishtype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_fishtype`
--

INSERT INTO `tbl_fishtype` (`fishtype_id`, `fishtype_name`) VALUES
(11, 'Guppy'),
(17, 'Half Moon Fighter'),
(18, 'Koi Guppy'),
(19, 'Full Moon Fighter'),
(20, 'Koi Carp'),
(21, 'Parrot Fish'),
(22, 'Gold Fish'),
(23, 'Blackmora'),
(24, 'Gost Fish'),
(25, 'Oscar'),
(26, 'Full Red Guppy'),
(27, 'Platinum Red Big Ear Guppy'),
(28, 'Platty'),
(29, 'Sward Tail Platty'),
(30, 'Black Shark');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL auto_increment,
  `fish_id` int(11) NOT NULL,
  `gallery_image` varchar(100) NOT NULL,
  PRIMARY KEY  (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `fish_id`, `gallery_image`) VALUES
(1, 3, '1637940946610.jpg'),
(3, 7, '1637992160733.jpg'),
(4, 4, 'Screenshot (6).png'),
(5, 9, 'Screenshot (6).png'),
(6, 3, 'q10.jpg'),
(7, 4, 'fish.jpg'),
(8, 14, 'q4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL auto_increment,
  `district_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `district_id`, `place_name`) VALUES
(10, 35, 'Thripunithura'),
(12, 35, 'Thiruvankulam'),
(13, 35, 'Kochi'),
(16, 35, 'Chottanikkara'),
(17, 35, 'Aluva'),
(18, 35, 'Kothamangalam'),
(19, 35, 'Muvattupuzha'),
(20, 34, '	Chavakkad'),
(21, 34, 'Kodungallur'),
(22, 34, 'Mukundapuram'),
(23, 34, 'Thalapilly'),
(24, 36, 'Painavu'),
(25, 36, 'Devikulam'),
(26, 36, ' Peerumade'),
(27, 36, 'Thodupuzha'),
(28, 36, 'Udumbanchola'),
(29, 28, '	Kanhangad'),
(30, 28, 'Kasaragod'),
(31, 28, '	Nileshwar'),
(32, 28, '	Manjeshwar'),
(33, 28, 'Uppala'),
(34, 28, '	Trikaripur'),
(35, 28, 'Kumbla'),
(36, 28, '	Bandadka'),
(37, 28, '	Cheruvathur'),
(38, 28, 'Vellarikkundu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plants`
--

CREATE TABLE `tbl_plants` (
  `plants_id` int(11) NOT NULL auto_increment,
  `shop_id` int(11) NOT NULL,
  `producttype_id` int(11) NOT NULL,
  `plants_name` varchar(100) NOT NULL,
  `plants_rate` int(11) NOT NULL,
  `plants_image` varchar(100) NOT NULL,
  PRIMARY KEY  (`plants_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_plants`
--

INSERT INTO `tbl_plants` (`plants_id`, `shop_id`, `producttype_id`, `plants_name`, `plants_rate`, `plants_image`) VALUES
(6, 9, 14, 'Pabba Aquarium Grass Seed', 65, 'IMG_20210627_230811.jpg'),
(7, 9, 14, 'Christmas Moss', 250, '6596f963dc7651266ecffd466a79f0f0.jpg'),
(8, 9, 14, 'Red Hygrophila', 180, 'IMG_20210627_230853.jpg'),
(9, 9, 14, 'Anubias Barteri', 150, 'â¬fish15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `producttype_id` int(11) NOT NULL auto_increment,
  `product_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`producttype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`producttype_id`, `product_name`) VALUES
(12, 'Stones'),
(14, 'Aquarium Plants'),
(15, 'Accesories'),
(16, 'Fishes'),
(17, 'Aquarium ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productbooking`
--

CREATE TABLE `tbl_productbooking` (
  `pbooking_id` int(11) NOT NULL auto_increment,
  `atype_id` int(11) NOT NULL default '0',
  `stype_id` int(11) NOT NULL default '0',
  `plants_id` int(11) NOT NULL default '0',
  `booking_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `booking_todate` date NOT NULL,
  `booking_status` int(100) NOT NULL default '0',
  `user_id` int(11) NOT NULL,
  `booking_pstatus` int(11) NOT NULL,
  `fish_id` int(11) NOT NULL default '0',
  `accessories_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pbooking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_productbooking`
--

INSERT INTO `tbl_productbooking` (`pbooking_id`, `atype_id`, `stype_id`, `plants_id`, `booking_date`, `quantity`, `totalamount`, `booking_todate`, `booking_status`, `user_id`, `booking_pstatus`, `fish_id`, `accessories_id`) VALUES
(1, 0, 0, 0, '2021-11-27', 8, 1200, '0000-00-00', 0, 0, 1, 3, 0),
(3, 2, 0, 0, '2021-12-03', 3, 4500, '2021-12-23', 0, 0, 1, 0, 0),
(7, 0, 2, 0, '2021-12-14', 2, 2000, '2021-12-23', 1, 10, 1, 0, 0),
(8, 0, 3, 0, '2021-12-14', 2, 68, '2021-12-10', 1, 10, 1, 0, 0),
(10, 0, 0, 1, '2021-12-14', 2, 100, '2022-01-08', 1, 10, 1, 0, 0),
(11, 0, 0, 0, '2021-12-19', 4, 400, '2021-12-31', 0, 16, 1, 15, 0),
(12, 5, 0, 0, '2021-12-19', 2, 200, '2021-12-23', 0, 16, 1, 0, 0),
(13, 0, 0, 0, '2021-12-19', 1, 60, '2021-12-22', 0, 16, 1, 14, 0),
(14, 0, 0, 7, '2021-12-26', 0, 0, '0000-00-00', 2, 11, 2, 0, 0),
(15, 0, 0, 7, '2021-12-26', 1, 250, '0000-00-00', 0, 11, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(11) NOT NULL auto_increment,
  `place_id` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_contact` varchar(100) NOT NULL,
  `shop_address` varchar(100) NOT NULL,
  `shop_email` varchar(100) NOT NULL,
  `shop_proof` varchar(100) NOT NULL,
  `shop_licence` varchar(100) NOT NULL,
  `shop_logo` varchar(100) NOT NULL,
  `shop_status` int(11) NOT NULL,
  `shop_uname` varchar(100) NOT NULL,
  `shop_password` varchar(100) NOT NULL,
  PRIMARY KEY  (`shop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `place_id`, `shop_name`, `shop_contact`, `shop_address`, `shop_email`, `shop_proof`, `shop_licence`, `shop_logo`, `shop_status`, `shop_uname`, `shop_password`) VALUES
(9, 12, 'Joel Vinodh', '9745883662', 'Vellanam house kavaleeswaram road Thiruvankulam p/o ernakulam', 'joelvinodh@gmail.com', 'Screenshot (6).png', '1637992160733.jpg', '1625017004895.jpg', 1, 'joelvinodh', 'joel'),
(10, 21, 'Anooj P Dave', '9994579276', 'Padattil house ', 'anooj@gmail.com', '1621180173759.jpg', '1621337244985.jpg', '1623123031639.jpg', 1, 'anooj', 'anooj'),
(11, 31, 'Ansu Jose', '9746278537', 'Puttanpurakkal House Vennikulam', 'ansu@gmail.com', '1637992160733.jpg', '1621180173759.jpg', '1621337244985.jpg', 1, 'ansu', 'ansu'),
(12, 27, 'Vignesh K P', '7305673562', 'Mukkadakal House', 'vignesh@gmail.com', '1623123031639.jpg', '1623123031639.jpg', '1623123031639.jpg', 1, 'vignesh', 'vignesh'),
(13, 12, 'Sanjay', '7306614719', 'sanjayam house thiruvankulam ', 'sanjay@gmail.com', 'payment.jpg', 'shop.jpg', '1637940946610.jpg', 0, 'sanjay', 'sanjay');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stonetype`
--

CREATE TABLE `tbl_stonetype` (
  `stype_id` int(11) NOT NULL auto_increment,
  `shop_id` int(11) NOT NULL,
  `producttype_id` int(11) NOT NULL,
  `stype_name` varchar(100) NOT NULL,
  `stype_rate` int(11) NOT NULL,
  `stype_image` varchar(100) NOT NULL,
  PRIMARY KEY  (`stype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_stonetype`
--

INSERT INTO `tbl_stonetype` (`stype_id`, `shop_id`, `producttype_id`, `stype_name`, `stype_rate`, `stype_image`) VALUES
(2, 6, 0, 'Black perl', 1000, ''),
(3, 6, 0, 'Black perl', 34, ''),
(4, 6, 2, 'white', 1000, ''),
(5, 6, 2, 'red', 150, '1623123031639.jpg'),
(6, 0, 2, 'silvarado', 150, '1637940946610.jpg'),
(7, 9, 12, 'Liveonce White Aquarium', 140, 'â¬fish6.jpg'),
(8, 9, 12, 'Maalavya Glass Pebbles', 549, 'bluee.jpg'),
(9, 9, 12, 'Dragon Rock', 1299, 'backblack.jpg'),
(10, 9, 12, 'Dragon Rock', 1299, 'backblack.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(100) NOT NULL,
  `user_contact` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_uname` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_picture` varchar(100) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_address`, `user_email`, `user_uname`, `user_password`, `place_id`, `user_picture`) VALUES
(11, 'Vimal Das V', '9772883432', 'Cherakkal house Mulanthuruthi p/o Ernakulam', 'vimal@gmail.com', 'vimal', 'vimal', 10, 'Screenshot (6).png'),
(12, 'Sujith Kumar', '9745564332', 'Tamarakulam house ', 'sujith@gmail.com', 'sujith', 'sujith', 32, '1625017004895.jpg'),
(14, 'Athul Bhasi', '7406172825', 'Palathinkal House', 'athul@gmail.com', 'athul', 'athul', 26, '1621337244985.jpg'),
(15, 'Sanjay Raj', '9745883785', 'Padattu house', 'sanjay', 'sanjay', 'sanjay', 22, '1623123031639.jpg'),
(16, 'Akshay K J', '7306724536', 'Vattaparambil house Kavaleeswram Road Thiruvankulam P/O Ernakulam', 'akshay@gmail.com', 'akshay', 'akshay', 12, '1637992160733.jpg'),
(17, 'Akhil', '7306614719', 'Vattaparabil house', 'akhil@gmial.com', 'akshil', 'akhil', 12, '1637940946610.jpg');
