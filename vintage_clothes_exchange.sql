-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2023 at 10:33 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vintage_clothes_exchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `mens_top`
--

CREATE TABLE `mens_top` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `item_condition` int(11) NOT NULL,
  `price` float NOT NULL,
  `size` varchar(255) NOT NULL,
  `type` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mens_top`
--

INSERT INTO `mens_top` (`id`, `seller`, `title`, `image`, `gender`, `item_condition`, `price`, `size`, `type`) VALUES
(1, 1, 'Blue T-shirt', 'https://content.moss.co.uk/images/original/966644723_04.jpg', 'MENS', 2, 324, 'S', 0),
(2, 1, 'Stripy T', 'https://assets.soulz.lt/fit-in/1200x/image/1559282292-front-120191_01326652-50442-1.jpg', 'MENS', 2, 9.99, 'XS', 0),
(13, 19, 'Green Billabong T-shirt', 'https://surfwax.lt/20780-large_default/billabong-unison-t-shirt.jpg', 'MENS', 3, 23.99, 'L', 0),
(14, 19, 'Carhartt Tshirt', 'https://media.gq.com/photos/5f297d3c14d41e25f81a6886/master/w_1280%2Cc_limit/Carhartt-K87-workwear-pocket-T-shirt.jpg', 'MENS', 2, 30, 'M', 0),
(15, 19, 'Cool Graphic Tee', 'https://www.apetogentleman.com/wp-content/uploads/2022/10/graphic-tees-men-1.jpg', 'MENS', 1, 42.5, 'XS', 0),
(16, 19, 'Knitted Warm Jumper', 'https://www.solvawoollenmill.co.uk/content/images/thumbs/0003004_mens-shooting-jumper-derby-tweed.jpeg', 'MENS', 0, 40.95, 'XL', 1),
(17, 19, 'Hooped Jumper', 'https://cdn.shopify.com/s/files/1/0529/6019/8849/products/Plumstead-mens-crew-neck-jumper-dark-navy-and-ecru_600x.jpg?v=1677756270', 'MENS', 1, 34, 'L', 1),
(18, 1, 'White Cable Knit', 'https://hips.hearstapps.com/hmg-prod/images/best-mens-knitwear-1-1601561248.jpg', 'MENS', 3, 99.99, 'XL', 1),
(19, 21, 'plain ol\' t-shirt', 'https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2Fe6%2F85%2Fe6853ffa53b93ec09bc8c5694324d05639c6ee54.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BDESCRIPTIVESTILLLIFE%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]', 'UNISEX', 1, 8, 'L', 0),
(20, 3, 'Plain White Tee', 'https://cdn.shopify.com/s/files/1/0027/1987/5125/products/Whitetee_800x.jpg?v=1533652395', 'UNISEX', 1, 3, 'XL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mens_trousers`
--

CREATE TABLE `mens_trousers` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `item_condition` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mens_trousers`
--

INSERT INTO `mens_trousers` (`id`, `seller`, `title`, `size`, `image`, `gender`, `item_condition`, `price`, `type`) VALUES
(14, 1, 'Ankle Swingers', 'Waist: 32\",  Leg: 32\"', 'https://martinvalen.com/17600-large_default/men-s-trousers-pants-light-fabric-striped-beige.jpg', 'MENS', 1, 39, 2),
(17, 1, 'Chequered Tight', 'Waist: 28\",  Leg: 28\"', 'https://cdn.shopify.com/s/files/1/1831/8531/products/image_36305d31-de13-49e8-ae71-98f73552c94f_large.jpg?v=161858146933', 'MENS', 0, 39, 2),
(18, 1, 'White Ones', 'Waist: 30\",  Leg: 34\"', 'https://media.paulsmith.com/dam/products/w_500,c_scale/q_80/MODEL/ECOM/M1R/M1R-252X-H01685-02/M1R-252X-H01685-02_1.jpg', 'MENS', 2, 99.99, 2),
(19, 3, 'Air Jordan Trousers', 'Waist: 31\",  Leg: 30\"', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/ad501889-a4db-49f2-97b7-c6d55ca037a0/jordan-essentials-utility-trousers-cVmVHg.png', 'UNISEX', 2, 200, 2),
(20, 3, 'Brownie Trousers', 'Waist: 30\",  Leg: 28\"', 'https://ggshop1-cdnms.azureedge.net/media/4215/brownies-trousers.jpg', 'UNISEX', 3, 28.99, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `item_condition` int(11) NOT NULL,
  `price` float NOT NULL,
  `size` float NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`id`, `seller`, `title`, `image`, `gender`, `item_condition`, `price`, `size`, `type`) VALUES
(1, 4, 'Formal Leather Shoes', 'https://cdn.shopify.com/s/files/1/0419/1525/products/1024x1024-Men-Executive-BlackCoffee-052722-Flatlay.jpg?v=1653682287', 'MENS', 2, 4, 4, 3),
(14, 21, 'Street Sneaks', 'https://cdn.shopify.com/s/files/1/0872/3376/products/otbt-201-alstead-dove-gre7-social-02.jpg?v=1626960030', 'WOMENS', 3, 59.9, 7, 3),
(15, 21, 'Pikolino - whatever that is', 'https://www.pikolinos.com/on/demandware.static/-/Sites-master-catalog-pikolinos/default/dw87fcc7d0/images/products/W6B/6944C1/21-mesi_w6b-6944c1_pk-river_list.jpg', 'WOMENS', 1, 89.99, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`) VALUES
(0, 'T-Shirt'),
(1, 'Jumper'),
(2, 'Trousers'),
(3, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `credit` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `credit`) VALUES
(1, 'tom', 'tom', 68.76),
(3, 'user1', 'user1', 0),
(4, 'The-one-and-only', '1', 100.01),
(19, 'Charlie', 'Charlie', 0),
(20, 'Juste', 'juste', 0),
(21, 'dave', 'dave', 0);

-- --------------------------------------------------------

--
-- Table structure for table `womens_top`
--

CREATE TABLE `womens_top` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `item_condition` float NOT NULL,
  `price` float NOT NULL,
  `size` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `womens_top`
--

INSERT INTO `womens_top` (`id`, `seller`, `title`, `image`, `gender`, `item_condition`, `price`, `size`, `type`) VALUES
(1, 1, 'womans tshirt', 'https://assets.vogue.com/photos/5f1a3e4c21b4d28a24fe9db9/1:1/w_1013,h_1013,c_limit/Hanes%20Slide.jpg', 'WOMENS', 3, 7, 9, 0),
(9, 20, 'Colorful', 'https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1670409991-fairislejumperboden-1670409980.png?crop=0.8625792811839323xw:1xh;center,top&resize=480:*', 'WOMENS', 1, 35, 10, 1),
(10, 20, 'Knit Wear', 'https://media.fatface.com/s/Fat_Face/978834_Teal-Blue_PLP_1?%24prod-tile-lge%24&fmt=auto&%24prod-tile-lge%24', 'WOMENS', 0, 29.49, 14, 1),
(11, 20, 'Street Cats Graphic T-shirt', 'https://ih1.redbubble.net/image.785374828.2310/ssrco,slim_fit_t_shirt,womens,e0e1dd:064437a66d,front,square_product,600x600.u5.jpg', 'WOMENS', 0, 9.99, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `womens_trousers`
--

CREATE TABLE `womens_trousers` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `item_condition` int(11) NOT NULL,
  `price` float NOT NULL,
  `type` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `womens_trousers`
--

INSERT INTO `womens_trousers` (`id`, `seller`, `title`, `size`, `image`, `gender`, `item_condition`, `price`, `type`) VALUES
(1, 1, 'Nice Trousers', 6, 'https://i00.eu/img/171/1024x1024/90m3ise0/133421.jpg', 'WOMENS', 2, 44, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mens_top`
--
ALTER TABLE `mens_top`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller` (`seller`);

--
-- Indexes for table `mens_trousers`
--
ALTER TABLE `mens_trousers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `womens_top`
--
ALTER TABLE `womens_top`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `womens_trousers`
--
ALTER TABLE `womens_trousers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mens_top`
--
ALTER TABLE `mens_top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mens_trousers`
--
ALTER TABLE `mens_trousers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `womens_top`
--
ALTER TABLE `womens_top`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `womens_trousers`
--
ALTER TABLE `womens_trousers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mens_top`
--
ALTER TABLE `mens_top`
  ADD CONSTRAINT `mens_top_ibfk_1` FOREIGN KEY (`seller`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
