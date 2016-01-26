-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2016 at 06:23 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertise_master`
--

CREATE TABLE IF NOT EXISTS `advertise_master` (
`ad_id` int(10) unsigned NOT NULL,
  `ad_url` text NOT NULL,
  `ad_file_path` text NOT NULL,
  `ad_position` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertise_master`
--

INSERT INTO `advertise_master` (`ad_id`, `ad_url`, `ad_file_path`, `ad_position`, `status`) VALUES
(1, 'index.php?route=outlets&option=view', 'outlet.jpg', 'bottom', 1),
(2, 'index.php?route=company&option=view', 'pay_way.jpg', 'bottom', 1),
(3, '#', '770237banner_right.jpg', 'top', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE IF NOT EXISTS `category_master` (
`category_id` int(11) unsigned NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `position` varchar(10) NOT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`category_id`, `category_name`, `position`, `status`) VALUES
(7, 'Men', 'first', 1),
(8, 'Women', 'first', 1),
(9, 'Kids', 'first', 1),
(10, 'Accessories', 'last', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_master`
--

CREATE TABLE IF NOT EXISTS `member_master` (
`member_id` int(11) unsigned NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `zip_code` varchar(150) NOT NULL,
  `join_date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `uniq_code` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_master`
--

INSERT INTO `member_master` (`member_id`, `first_name`, `last_name`, `email`, `password`, `dob`, `gender`, `contact_no`, `city`, `state`, `zip_code`, `join_date`, `status`, `uniq_code`) VALUES
(1, 'Shashangka', 'Shekhar', 'shashangka@gmail.com', '123', '0000-00-00', 'm', '0192915253', 'dhaka', 'dhaka', '1205', '2014-04-12 03:12:36', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
`id` int(10) unsigned NOT NULL,
  `pr_order_id` int(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `pr_order_id`, `description`) VALUES
(2, 2, '<tr><td><img class="cart_thumb" src="../pr_thumb_small/small_2136456500_4101046576573365_1086487543_o.jpg" width="40" /></td><td><p>Panjabi</p></td><td class="cart_total_price"><b>1780</b></td><td class="cart_total_price"><b>1</b></td><td class="cart_total_price"><b>1780</b></td></tr>'),
(3, 3, '<tr><td><img class="cart_thumb" src="../pr_thumb_small/small_1995269560990182.jpg" width="40" /></td><td><p>Formal Shirt</p></td><td class="cart_total_price"><b>1870</b></td><td class="cart_total_price"><b>2</b></td><td class="cart_total_price"><b>3740</b></td></tr><tr><td><img class="cart_thumb" src="../pr_thumb_small/small_4394476439_40104229699908386_1815501478_o.jpg" width="40" /></td><td><p>Fatua</p></td><td class="cart_total_price"><b>2660</b></td><td class="cart_total_price"><b>1</b></td><td class="cart_total_price"><b>2660</b></td></tr><tr><td><img class="cart_thumb" src="../pr_thumb_small/small_2398468512_400976479913708_2079385142_o.jpg" width="40" /></td><td><p>Cotton print Saree</p></td><td class="cart_total_price"><b>2550</b></td><td class="cart_total_price"><b>1</b></td><td class="cart_total_price"><b>2550</b></td></tr>'),
(4, 4, '<tr><td><img class="cart_thumb" src="../pr_thumb_small/small_1995269560990182.jpg" width="40" /></td><td><p>Formal Shirt</p></td><td class="cart_total_price"><b>1870</b></td><td class="cart_total_price"><b>1</b></td><td class="cart_total_price"><b>1870</b></td></tr>'),
(5, 1, '<tr><td><img class="cart_thumb" src="../pr_thumb_small/small_2136456500_4101046576573365_1086487543_o.jpg" width="40" /></td><td><p>Panjabi</p></td><td class="cart_total_price"><b>1780</b></td><td class="cart_total_price"><b>3</b></td><td class="cart_total_price"><b>5340</b></td></tr><tr><td><img class="cart_thumb" src="../pr_thumb_small/small_1995269560990182.jpg" width="40" /></td><td><p>Formal Shirt</p></td><td class="cart_total_price"><b>1870</b></td><td class="cart_total_price"><b>1</b></td><td class="cart_total_price"><b>1870</b></td></tr>');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE IF NOT EXISTS `order_master` (
`order_id` int(10) unsigned NOT NULL,
  `totalQty` int(11) NOT NULL,
  `order_total` float NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact` varchar(150) NOT NULL,
  `street` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `zip` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `order_ip` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `totalQty`, `order_total`, `name`, `email`, `contact`, `street`, `city`, `state`, `zip`, `address`, `order_ip`, `date`, `status`) VALUES
(1, 4, 7210, 'Shashangka Shekhar Mandal', 'shashangka@yahoo.com', '01929515253', 'Dhaka', 'Dhaka', 'Shekhartek', '1500', 'Dhaka', '103.250.68.3', '2014-04-22 07:41:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_master`
--

CREATE TABLE IF NOT EXISTS `page_master` (
`page_id` int(11) unsigned NOT NULL,
  `page_name` varchar(150) NOT NULL,
  `page_content` text NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_master`
--

INSERT INTO `page_master` (`page_id`, `page_name`, `page_content`, `date`, `status`) VALUES
(1, 'Company', '<p>Company description goes here.</p>', '2014-04-01 00:00:00', 1),
(2, 'Address', '<p><span style="font-family: lucida sans unicode,lucida grande,sans-serif;"><span style="color: #ff8c00;">2/1 block a lalmatia , 1207 Dhaka, Bangladesh</span><br /> <br /> sales@eCommerce.com<br /> +88 0288078978</span></p>', '2014-04-03 00:00:00', 1),
(3, 'Outlets', '<p><span style="font-family: lucida sans unicode,lucida grande,sans-serif;">2/1 block a lalmatia , 1207 Dhaka, Bangladesh<br /> <br /> sales@eCommerce.com<br /> +88 0288800789</span></p>', '2014-04-03 00:00:00', 1),
(4, 'Privacy Policy', '<p>\r\n	<span style="font-family:lucida sans unicode,lucida grande,sans-serif;">Privacy Policy</span></p>\r\n', '2014-04-02 00:00:00', 1),
(5, 'Terms of use', '<p>\r\n	<span style="font-family:lucida sans unicode,lucida grande,sans-serif;">Terms of use</span></p>\r\n', '2014-04-02 00:00:00', 1),
(6, 'Help', '<p>\r\n	<span style="font-family:lucida sans unicode,lucida grande,sans-serif;">Help</span></p>\r\n', '2014-04-02 00:00:00', 1),
(7, 'Customer service', '<p>\r\n	<span style="font-family:lucida sans unicode,lucida grande,sans-serif;">Customer service</span></p>\r\n', '2014-04-02 00:00:00', 1),
(8, 'How to order', '<div>\r\n	<span style="font-size:14px;"><span style="font-family:lucida sans unicode,lucida grande,sans-serif;">We have taken every step to ensure that your shopping experience at <a href="http://www.banglarshova.com">banglarshova.com</a> is as convenient and intuitive as possible.&nbsp;</span></span></div>\r\n<div>\r\n	<span style="font-size:14px;"><span style="font-family:lucida sans unicode,lucida grande,sans-serif;">If you have any comments or feedback for us, we greatly appreciate hearing from you and value your opinions.&nbsp;</span></span></div>\r\n<div>\r\n	<span style="font-size:14px;"><span style="font-family:lucida sans unicode,lucida grande,sans-serif;">Please email us at sales@banglarshova.com</span></span></div>\r\n', '2014-04-02 00:00:00', 1),
(9, 'FAQs', '<div>FAQ''S Goes here</div>', '2014-04-03 00:00:00', 1),
(10, 'Home', '<p><span style="font-size:14px;"><span style="font-family:lucida sans unicode,lucida grande,sans-serif;">We are a fashion design house, manufacturer and retailer of fashion wear, fashion accessories, home textiles, handicraft, and hand loom based products of Bangladesh. The initiative primarily targeted young generation of Dhaka city, and within a short span of time became popular among upper middle class young professionals and students of Bangladesh. Utilizing traditional hand loom skills, artisan resources and Banglar Shova&#39;s own innovative design and presentation, Kay Banglar Shova has become one of the leading brands in the fashion sector of Bangladesh.</span></span></p>\r\n', '2014-04-03 00:00:00', 1),
(11, 'Shipping', 'Shipping', '2014-04-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE IF NOT EXISTS `product_master` (
`product_id` int(11) unsigned NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `product_title` varchar(150) NOT NULL,
  `product_image` text NOT NULL,
  `product_thumb_image` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_color` varchar(150) NOT NULL,
  `product_fabric` varchar(150) NOT NULL,
  `product_price` float NOT NULL,
  `product_special_tag` text NOT NULL,
  `posted_date` datetime NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_sub_category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`product_id`, `product_code`, `product_title`, `product_image`, `product_thumb_image`, `product_desc`, `product_color`, `product_fabric`, `product_price`, `product_special_tag`, `posted_date`, `product_category_id`, `product_sub_category_id`, `status`) VALUES
(1, '', 'Cotton print Saree', '3230412041_400976233247066_1099521166_o.jpg', 'small_3230412041_400976233247066_1099521166_o.jpg', '', 'White', 'Cotton', 1360, '', '2014-04-10 01:37:21', 8, 15, 1),
(2, '', 'Boishakhi Silk Saree', '4805468512_400976479913708_20793851142_o.jpg', 'small_4805468512_400976479913708_20793851142_o.jpg', '<p><span style="color: #333333; font-family: Helvetica, Arial, ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 12px; line-height: 15.359999656677246px;">Boishakhi Silk Saree</span></p>', 'White', 'Cotton', 2000, '', '2014-04-10 01:40:15', 8, 15, 1),
(3, '', 'Boishakhi Silk Saree', '987468512_4009764794913708_20793851142_o.jpg', 'small_987468512_4009764794913708_20793851142_o.jpg', '', 'White', 'Sillk', 2000, '', '2014-04-10 01:42:03', 8, 15, 1),
(4, '', 'Cotton print Saree', '2398468512_400976479913708_2079385142_o.jpg', 'small_2398468512_400976479913708_2079385142_o.jpg', '', 'White', 'Cotton', 2550, '', '2014-04-10 01:43:23', 8, 15, 1),
(5, '', 'Cotton print Saree', '1567476439_401029699908386_1815501478_o.jpg', 'small_1567476439_401029699908386_1815501478_o.jpg', '', 'Red Green', 'Cotton', 2000, '', '2014-04-10 01:44:36', 8, 15, 1),
(6, '', 'Cotton print Saree', '3834595671469111_400972609914095_1088553484_o.jpg', 'small_3834595671469111_400972609914095_1088553484_o.jpg', '', 'Red ', 'Cotton', 2000, '', '2014-04-10 01:45:57', 8, 15, 1),
(7, '', 'Formal Shirt', '1995269560990182.jpg', 'small_1995269560990182.jpg', '', 'Stipe', 'Cotton', 1870, '', '2014-04-10 01:50:40', 7, 13, 1),
(8, '', 'Fatua', '4394476439_40104229699908386_1815501478_o.jpg', 'small_4394476439_40104229699908386_1815501478_o.jpg', '', 'White', '', 2660, '', '2014-04-10 01:56:16', 8, 18, 1),
(9, '', 'Kameez', '2898476439_401042429699908386_1815501478_o.jpg', 'small_2898476439_401042429699908386_1815501478_o.jpg', '', 'Red ', 'Cotton', 2870, '', '2014-04-10 02:02:07', 8, 17, 1),
(10, '', 'Kameez', '473476439_2401029699908386_1815501478_o.jpg', 'small_473476439_2401029699908386_1815501478_o.jpg', '', 'Cream', '', 2780, '', '2014-04-10 02:01:32', 8, 17, 1),
(11, '', 'Panjabi', '2136456500_4101046576573365_1086487543_o.jpg', 'small_2136456500_4101046576573365_1086487543_o.jpg', '', 'Dim Green', 'Cotton', 1780, '', '2014-04-10 02:04:39', 7, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider_master`
--

CREATE TABLE IF NOT EXISTS `slider_master` (
`slider_id` int(10) unsigned NOT NULL,
  `image_path` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_master`
--

INSERT INTO `slider_master` (`slider_id`, `image_path`, `status`) VALUES
(1, 's_1.jpg', 1),
(2, 's_2.jpg', 1),
(3, 's_3.jpg', 1),
(4, 's_4.jpg', 1),
(5, 'The_Art_of_Facebook.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_master`
--

CREATE TABLE IF NOT EXISTS `sub_category_master` (
`sub_category_id` int(11) unsigned NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category_master`
--

INSERT INTO `sub_category_master` (`sub_category_id`, `parent_category_id`, `sub_category_name`, `status`) VALUES
(9, 7, 'Long Punjabi', 1),
(10, 7, 'Short Punjabi', 1),
(11, 7, 'Exclusive Punjabi', 1),
(12, 7, 'Fotua', 1),
(13, 7, 'Formal Shirt', 1),
(14, 10, 'Scarf', 1),
(15, 8, 'Saree', 1),
(16, 9, 'Boy Shirt', 1),
(17, 8, 'Salwar Kameez', 1),
(18, 8, 'Tops/Fotua', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`id` int(11) NOT NULL,
  `product_id_array` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `mc_gross` varchar(255) NOT NULL,
  `payment_currency` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `txn_type` varchar(255) NOT NULL,
  `payer_status` varchar(255) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_state` varchar(255) NOT NULL,
  `address_zip` varchar(255) NOT NULL,
  `address_country` varchar(255) NOT NULL,
  `address_status` varchar(255) NOT NULL,
  `notify_version` varchar(255) NOT NULL,
  `verify_sign` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `mc_currency` varchar(255) NOT NULL,
  `mc_fee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
`user_id` int(11) unsigned NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_created` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `user_name`, `user_password`, `user_created`, `status`) VALUES
(1, 'admin', '0000', '2014-04-02 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise_master`
--
ALTER TABLE `advertise_master`
 ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `member_master`
--
ALTER TABLE `member_master`
 ADD PRIMARY KEY (`member_id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `page_master`
--
ALTER TABLE `page_master`
 ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `slider_master`
--
ALTER TABLE `slider_master`
 ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `sub_category_master`
--
ALTER TABLE `sub_category_master`
 ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `txn_id` (`txn_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertise_master`
--
ALTER TABLE `advertise_master`
MODIFY `ad_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
MODIFY `category_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `member_master`
--
ALTER TABLE `member_master`
MODIFY `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
MODIFY `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `page_master`
--
ALTER TABLE `page_master`
MODIFY `page_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
MODIFY `product_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `slider_master`
--
ALTER TABLE `slider_master`
MODIFY `slider_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sub_category_master`
--
ALTER TABLE `sub_category_master`
MODIFY `sub_category_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
MODIFY `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
