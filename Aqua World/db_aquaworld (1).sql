-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2022 at 10:30 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_accessories`
--

INSERT INTO `tbl_accessories` (`accessories_id`, `shop_id`, `accessories_name`, `accessories_image`, `accessories_rate`, `accessories_description`, `producttype_id`) VALUES
(1, 1, 'Fish Food', 'food1.jpg', 45, 'Food For Medium Size Fishes', 15),
(2, 1, 'Pellat', 'food2.jpg', 50, 'Pellat ,Feed 2 Times a Day', 15),
(5, 1, 'Betta Food', 'food3.jpg', 80, 'Betta Food ', 15),
(6, 1, 'Vitamin Tablet', 'food4.jpg', 120, 'Vitamin Tablet for color Enhancement of fish', 15),
(7, 1, 'Fungal Solution', 'med2.jpg', 70, 'Fungal Solution for fungus protection.Use 5 Drops in 1liter of water.', 15),
(8, 1, 'Pump', 'pump.jpg', 200, 'Pump(15v),2 Opening ', 15),
(9, 1, 'Pump', 'q8.png', 1999, 'Pump(20v) with Water fall like Filters', 15),
(10, 1, 'pump', 'q7.jpg', 700, 'Pump with filter', 15),
(11, 1, 'LED Light', 'light3.jpg', 800, 'LED Lights ', 15),
(12, 1, 'LED Light', 'light2.jpg', 499, 'LED light ,duel Color', 15),
(13, 1, 'AquariumRoof', 'roof3.jpg', 700, 'Fiber Roof', 15),
(14, 1, 'Roof', 'roof2.jpg', 1500, 'Wooden Roof', 15);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_aquariumtype`
--

INSERT INTO `tbl_aquariumtype` (`atype_id`, `shop_id`, `producttype_id`, `atype_name`, `atype_rate`, `atype_image`) VALUES
(1, 1, 18, 'Boul', 100, 'q9.jpg'),
(2, 1, 18, 'Hard Glass Bouls', 150, 'aqua6.jpg'),
(3, 1, 18, 'Fish Tank', 1100, 'aqua1.jpg'),
(4, 1, 18, 'Full Set Fish Tank', 2500, 'aqua2.jpg'),
(5, 1, 18, 'Curved Tanks', 1500, 'aqua3.png'),
(6, 1, 18, 'Circular Tanks', 20000, 'aqua7.jpg'),
(7, 1, 18, 'Jar Tanks', 1500, 'aqua5.jpg'),
(8, 1, 18, 'Square Tanks', 2000, 'aqua4.jpg');

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
(1, 11, 1, '2022-01-03', 'Quality of Product is bad', 1, 'Sorry for the issue'),
(2, 16, 1, '2022-01-03', 'Leak in fish packed packet', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(11) NOT NULL auto_increment,
  `complainttype_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`complainttype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(10, 'Wrong item delivry'),
(11, 'Unsatisfied Product'),
(13, 'Damaged item'),
(14, 'Item not deliverd yet'),
(15, 'Poor quality'),
(16, 'Packing isuues');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL auto_increment,
  `district_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

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
(42, 'Thiruvananthapuram');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_details`, `feedback_date`, `user_id`) VALUES
(1, 'Delivery was quite good and product was well packed', '2022-01-03', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_fish`
--

INSERT INTO `tbl_fish` (`fish_id`, `fishtype_id`, `fish_name`, `fish_price`, `fish_image`, `fish_description`, `shop_id`) VALUES
(1, 1, 'Full Moon  Betta', 150, 'betta2.jpg', 'Full Moon Dumbo ear red Betta, 2months old', 1),
(2, 1, 'Full Moon Betta', 200, 'betta4.jpeg', 'Full Moon Dumbo ear white Betta, 3months old', 1),
(4, 1, 'Full Moon Dumbo Betta', 250, 'betta9.jpg', 'Full Moon Dumbo ear red Betta, Juvanile size', 1),
(5, 1, 'Galexy Koi Betta', 750, 'betta12.jpg', 'Galexy Koi betta', 1),
(7, 1, 'HB Red Betta', 850, 'betta16.jpg', 'HB Red Betta ,Hibread,pure quality,\r\n4 monts old', 1),
(8, 1, 'HB Blue Betta', 599, 'betta5.jpg', 'HB Blue Betta,Hibread,Stable ,3 monts old', 1),
(9, 1, 'Fin Tail Betta', 500, 'betta10.png', 'Fin Tail Betta,3 month', 1),
(10, 1, 'Blue Moon Betta', 250, 'betta8.jpg', 'Blue Moon Betta,3 months', 1),
(11, 1, 'Half Moon Betta', 250, 'betta3.jpg', 'Blue Moon Betta,4 weeks old', 1),
(12, 1, 'Fighter', 250, 'betta7.jpg', 'Ordinary Betta ,2 months old', 1),
(13, 1, 'Wild  Betta', 699, 'betta11.jpg', 'Wild Betta,Sparkles in Light', 1),
(14, 1, 'Half Moon Betta', 150, 'betta1.jpg', 'Half Moon Betta,yeallow mix with black ,5 weeks old', 1),
(15, 2, 'Gold Fish', 60, 'gold1.jpg', 'Juvanile size', 1),
(16, 2, '', 70, 'gold2.jpg', 'Gold Fish,2 months', 1),
(17, 2, 'White Gold', 80, 'gold4.jpg', 'White Gold ,2 months', 1),
(18, 2, 'Belli Gold', 200, 'gold7.jpg', 'Belli gold,imported,2 months old', 1),
(19, 2, 'White Belli Gold', 250, 'gold5.jpg', 'White Belli Gold,2 Months old', 1),
(20, 2, 'Gold', 150, 'gold8.jpg', 'Gold ,2 Months old', 1),
(22, 1, 'Belli Gold', 200, 'gold6.jpg', 'Belli Gold ,2 months', 1),
(24, 2, 'Gold', 60, 'gold3.jpg', 'Juvanile size', 1),
(25, 2, 'Gold', 80, 'gold9.jpg', 'Orange white mix color,2 months', 1),
(26, 2, 'Koi Karp', 5000, 'gold12.jpg', 'Koi karp, Japanise ', 1),
(27, 3, 'Golden ', 150, 'Ã¢ÂÂ¬fish15.jpg', '150 with Pair', 1),
(28, 2, 'Japanise yellow carp', 2500, 'gold14.jpg', 'Japanise yellow carp,impoeted', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fishtype`
--

CREATE TABLE `tbl_fishtype` (
  `fishtype_id` int(11) NOT NULL auto_increment,
  `fishtype_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`fishtype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_fishtype`
--

INSERT INTO `tbl_fishtype` (`fishtype_id`, `fishtype_name`) VALUES
(1, 'Betta Fish'),
(2, 'Gold Fish'),
(3, 'Guppy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL auto_increment,
  `fish_id` int(11) NOT NULL,
  `gallery_image` varchar(100) NOT NULL,
  PRIMARY KEY  (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_gallery`
--


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
(1, 1, 14, 'Pabba Aquarium Grass Seed', 75, 'plants5.jpg'),
(3, 1, 14, 'Christmas Moss', 100, 'plants.jpg'),
(4, 1, 14, 'red flora', 150, 'plants8.jpg'),
(5, 1, 14, 'Flotting plant', 200, 'plants7.jpg'),
(6, 1, 14, 'Anabus', 199, 'plants10.jpg'),
(7, 1, 14, 'Hydrosa', 199, 'plants4.jpg'),
(8, 1, 14, 'Colosam', 100, 'plants6.jpg'),
(9, 1, 14, 'Plastic plant', 100, 'plants2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `producttype_id` int(11) NOT NULL auto_increment,
  `product_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`producttype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`producttype_id`, `product_name`) VALUES
(12, 'Stones'),
(14, 'Aquarium Plants'),
(15, 'Accesories'),
(18, 'Aquarium ');

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
  `booking_status` int(100) NOT NULL default '0',
  `user_id` int(11) NOT NULL,
  `booking_pstatus` int(11) NOT NULL,
  `fish_id` int(11) NOT NULL default '0',
  `accessories_id` int(11) NOT NULL default '0',
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY  (`pbooking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_productbooking`
--

INSERT INTO `tbl_productbooking` (`pbooking_id`, `atype_id`, `stype_id`, `plants_id`, `booking_date`, `quantity`, `totalamount`, `booking_status`, `user_id`, `booking_pstatus`, `fish_id`, `accessories_id`, `shop_id`) VALUES
(5, 6, 0, 0, '2022-01-03', 1, 20000, 1, 1, 1, 0, 0, 0),
(6, 4, 0, 0, '2022-01-03', 1, 2500, 1, 1, 1, 0, 0, 0),
(8, 4, 0, 0, '2022-01-03', 1, 2500, 2, 1, 2, 0, 0, 0),
(9, 0, 0, 3, '2022-01-03', 1, 100, 1, 1, 1, 0, 0, 0),
(10, 2, 0, 0, '2022-01-03', 1, 150, 1, 1, 1, 0, 0, 0),
(11, 0, 1, 0, '2022-01-03', 1, 1000, 1, 1, 1, 0, 0, 0),
(12, 0, 3, 0, '2022-01-03', 1, 60, 1, 1, 1, 0, 0, 0),
(13, 0, 4, 0, '2022-01-03', 1, 150, 2, 1, 2, 0, 0, 0),
(14, 0, 0, 0, '2022-01-03', 1, 1999, 2, 1, 1, 0, 9, 0),
(15, 0, 0, 0, '2022-01-03', 1, 499, 1, 1, 1, 0, 12, 0),
(16, 0, 0, 0, '2022-01-03', 1, 60, 1, 1, 2, 15, 0, 0),
(17, 0, 0, 0, '2022-01-03', 1, 750, 2, 1, 1, 5, 0, 0),
(18, 2, 0, 0, '2022-01-03', 1, 150, 1, 1, 1, 0, 0, 0),
(19, 4, 0, 0, '2022-01-03', 1, 2500, 2, 1, 1, 0, 0, 0),
(20, 6, 0, 0, '2022-01-03', 1, 20000, 1, 1, 1, 0, 0, 0),
(21, 0, 0, 0, '2022-01-03', 1, 150, 2, 1, 1, 1, 0, 0),
(22, 0, 0, 0, '2022-01-03', 1, 5000, 1, 1, 1, 26, 0, 0),
(23, 7, 0, 0, '2022-01-03', 1, 1500, 0, 1, 1, 0, 0, 0),
(24, 8, 0, 0, '2022-01-03', 1, 2000, 0, 1, 1, 0, 0, 0),
(25, 0, 0, 4, '2022-01-03', 1, 150, 0, 1, 1, 0, 0, 0),
(26, 0, 0, 5, '2022-01-03', 1, 200, 1, 1, 1, 0, 0, 0),
(27, 0, 5, 0, '2022-01-03', 1, 80, 2, 1, 2, 0, 0, 0),
(28, 0, 8, 0, '2022-01-03', 1, 100, 2, 1, 1, 0, 0, 0),
(29, 0, 0, 0, '2022-01-03', 1, 1500, 1, 1, 1, 0, 14, 0),
(30, 0, 0, 0, '2022-01-03', 1, 800, 0, 1, 1, 0, 11, 0),
(31, 0, 0, 0, '2022-01-03', 1, 250, 0, 1, 1, 19, 0, 0),
(32, 0, 0, 0, '2022-01-07', 2, 160, 0, 1, 1, 17, 0, 0),
(33, 0, 0, 0, '2022-01-07', 1, 80, 0, 1, 1, 17, 0, 0),
(34, 0, 0, 0, '2022-01-07', 1, 200, 0, 1, 1, 2, 0, 0),
(35, 0, 0, 0, '2022-01-08', 1, 150, 0, 1, 1, 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `place_id`, `shop_name`, `shop_contact`, `shop_address`, `shop_email`, `shop_proof`, `shop_licence`, `shop_logo`, `shop_status`, `shop_uname`, `shop_password`) VALUES
(1, 12, 'Vishnu K Mohan', '7306614720', 'Bettamart aquariums Hill Palace road Ernakulam', 'vishnu@gmail.com', 'lic6.png', 'lic6.png', 'logo4.png', 1, 'vishnu', 'Vishnu123'),
(2, 13, 'Sreehari K S', '9846180135', 'Aquata Store Kochi Marine drive Ernakulam', 'sreehari@gmail.com', 'lic2.jpg', 'lic2.jpg', 'logo3.jpg', 1, 'sreehari', 'Sreehariks123'),
(3, 21, 'Ansu Jose', '9846180110', 'Lorem Aquariums Kodungallur Thrissur', 'ansu@gmail.com', 'lic.jpg', 'lic.jpg', 'logo2.jpg', 2, 'ansu', 'Ansujose123'),
(4, 23, 'Amal Krishna', '9745883432', 'Wholefish stores Thrissur', 'amal@gmail.com', 'lic3.jpg', 'lic3.jpg', 'logo5.jpg', 0, 'amal', 'Amalkrishna123'),
(5, 19, 'Anooj P Dave', '9846000128', 'Aquamart  Muvattupuzha Ernakulam', 'anooj@gmail.com', 'lic4.jpg', 'lic4.jpg', 'logo1.jpg', 0, 'anooj', 'Anoojp123');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_stonetype`
--

INSERT INTO `tbl_stonetype` (`stype_id`, `shop_id`, `producttype_id`, `stype_name`, `stype_rate`, `stype_image`) VALUES
(1, 1, 12, 'Arranged Stones', 1000, 'stone3.jpg'),
(2, 1, 12, 'silvarado', 899, 'stone2.jpg'),
(3, 1, 12, 'White Stones', 60, 'q6.webp'),
(4, 1, 12, 'Glass Stones', 150, 'stone5.jpg'),
(5, 1, 12, 'Colored Stones', 80, 'stone1.jpeg'),
(6, 1, 12, 'Black perl', 80, 'stone2.jpeg'),
(7, 1, 12, 'Colored Stones', 90, 'stone9.jpg'),
(8, 1, 12, 'Pink Stones', 100, 'stone8.jpg'),
(9, 1, 12, 'Arranged Stones', 1500, 'stone7.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_address`, `user_email`, `user_uname`, `user_password`, `place_id`, `user_picture`) VALUES
(1, 'Akshay ', '7306614719', 'Vattaparambil (H) Kavaleeswaram road Thiruvankulam p/o', 'akshay@gmail.com', 'Akshay', 'Akshaykj123', 12, 'face21.jpg'),
(2, 'Vignesh K P', '9847039091', 'Vallanam house Thripunithura Ernakulam', 'vignesh@gmail.com', 'vignesh', 'Vigneshkp123', 12, 'face24.jpg'),
(3, 'Sujith Kumar', '9846180128', 'Padattu(H) kochi Ernakulam', 'sujith@gmail.com', 'sujith', 'Sujithkumar123', 13, 'face17.jpg'),
(4, 'Vimal Das V', '7406172825', 'Mukkadakal(H) Aluva Ernakulam', 'vimal@gmail.com', 'vimal', 'Vimaldasv123', 17, 'face18.jpg'),
(5, 'Joel Vinodh', '7306715718', 'Kezhakkemuri (H) Chavakkad Thrissur', 'joel@gmail.com', 'joel', 'Joelvinodh123', 20, 'face13.jpg');
