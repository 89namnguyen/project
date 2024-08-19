DROP DATABASE IF EXISTS project;

CREATE DATABASE project CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

use project;

CREATE TABLE IF NOT EXISTS `shop_info` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `logo` VARCHAR(100) NULL,
  `email` VARCHAR(100) NOT NULL,
  `title` VARCHAR(100) NULL,
  `address` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(100) NOT NULL,
  `date` date DEFAULT now(),
  `map` VARCHAR(255),
  `link_fb` VARCHAR(255) NULL,
  `link_yt` VARCHAR(255) NULL,
  `link_it` VARCHAR(255) NULL,
  `link_tt` VARCHAR(255) NULL,
  `level` tinyint DEFAULT '0',
  `status` tinyint DEFAULT '1',
  PRIMARY KEY `pk_shop_info`(`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `h_open` (
  `shop_id` INT NOT NULL AUTO_INCREMENT,
  `day` INT NOT NULL,
  `time_open` INT NOT NULL,
  `time_close` INT NOT NULL,
  PRIMARY KEY `pk_time`(`shop_id`,`day`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `article` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `content` VARCHAR(100) NULL,
  `image` VARCHAR(100) NOT NULL,
  `link_name` VARCHAR(100) NULL DEFAULT 'our cakes',
  `link` VARCHAR(100) NULL,
  `status` tinyint DEFAULT '0',
  `cate` int DEFAULT '1',
  PRIMARY KEY `banner_pk`(`id`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100),
  `shop_id` INT NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(100) NOT NULL,
  `date` date DEFAULT now(),
  `link_fb` VARCHAR(255) NULL,
  `link_yt` VARCHAR(255) NULL,
  `link_it` VARCHAR(255) NULL,
  `link_tt` VARCHAR(255) NULL,
  `level` tinyint DEFAULT '0',
  PRIMARY KEY `pk_ad`(`id`),
  FOREIGN KEY (`shop_id`) REFERENCES `shop_info` (`id`)
) ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` NVARCHAR(100),
  `icon`  NVARCHAR(100) DEFAULT 'flaticon-029-cupcake-3',
  `status` tinyint DEFAULT '1',
  PRIMARY KEY `pk_cate`(`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` NVARCHAR(100) NOT NULL,
  `induction` NVARCHAR(255),
  `image` VARCHAR(100) DEFAULT 'product-1.jpg',
  `price` float,
  `sale_price` float  DEFAULT '0',
  `description` text,
  `category_id` int NOT NULL,
  `date` date DEFAULT now(),
  `status` tinyint DEFAULT '1',
  PRIMARY KEY `pk_prd`(`id`),
  FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `customer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` NVARCHAR(100),
  `image` VARCHAR(100) DEFAULT 'comment-1.jpg',
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `phone` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(100) NOT NULL,
  `address` VARCHAR(100) NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY `pk_ctm`(`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` NVARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NULL,
  `phone` VARCHAR(100) NOT NULL,
  `customer_id` INT NOT NULL,
  `address` NVARCHAR(100) NOT NULL,
  `status` tinyint DEFAULT '0',
  `date` date DEFAULT NOW(),  
  `order_note`  NVARCHAR(100) NULL,
  PRIMARY KEY `pk_ord`(`id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `blog` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` NVARCHAR(100),
  `induction` text,
  `image_title` VARCHAR(100),
  `user_id` INT NOT NULL DEFAULT '1',
  `content` text ,
  `image` NVARCHAR(100),
  `date` date DEFAULT NOW(),
  `view`  int DEFAULT '1',
  `status` tinyint DEFAULT '1',
  PRIMARY KEY `pk_blog`(`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT NOT NULL,
  `quantity` INT NOT NULL,
  `price` float NOT NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY `pk_ord_d`(`order_id`,`product_id`),
  FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `comment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer_id` INT NOT NULL,
  `content` text NOT NULL,
  `date` date DEFAULT NOW(),
  `status` tinyint DEFAULT '1',
  `comment_id`INT NULL,
  PRIMARY KEY `pk_cm`(`id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `rating` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT NOT NULL,
  `customer_id` INT NOT NULL,
  `rate` INT NOT NULL DEFAULT '5',
  `content` text NULL,
  `date` date DEFAULT NOW() ,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY `pk_rate`(`id`),
  FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE = InnoDB;


INSERT INTO `shop_info` (`name`,`logo`,`title`,`email`,`address`,`phone`,`date`,`map`,`level`) VALUES
('Cake Cook','logo.png','The Cake Shop is a Jordanian Brand that started as a small family business. ','cakecook@gmail.com',N'250 Hoàng Quốc Việt, Cầu Giấy, Hà Nội','+84 1900 2024','2024-12-13','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6585385736685!2d105.78092597599881!3d21.04634448717301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3b4220c2bd%3A0x1c9e359e2a4f618c!2sB%C3%A1ch%20Khoa%20Aptech!5e0!3m2!1svi!2s!4v1723627878669!5m2!1svi!2s',1),
('Cake Cook2','logo.png',null,'cakecook@gmail.com',N'250 Hoàng Quốc Việt, Cầu Giấy, HCM','+84 1900 2024','2024-1-13','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6585385736685!2d105.78092597599881!3d21.04634448717301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3b4220c2bd%3A0x1c9e359e2a4f618c!2sB%C3%A1ch%20Khoa%20Aptech!5e0!3m2!1svi!2s!4v1723627878669!5m2!1svi!2s',0);

INSERT INTO `users` (`name`,`email`, `password`,`shop_id`) VALUES
('Admn Roor','admin@gmail.com','$2y$10$2po3ujcIjctrt.V5ao8i..aaSbYV7oakBdBwO8It.82CYhK4wNrZW',1);

INSERT INTO `category` (`name`, `status`) VALUES
(N'Donut', 1),
(N'Kem', 1),
(N'Dunut', 1),
(N'Kemchese', 1),
(N'Pizza', 1),
(N'Kemchia', 1),
(N'Vani', 1),
(N'Break', 1),
(N'Buffer', 1);

INSERT INTO `h_open` (`shop_id`,`day`,`time_open`,`time_close`) VALUES
(1,1,8,21),
(1,2,8,21),
(1,3,8,20),
(2,1,8,21),
(2,2,8,21),
(2,3,8,20);

INSERT INTO `customer` (`name`,`email`,`phone`,`password`,`address`) VALUES
(N'Đông','sdsad1@g.com','19001','1232','Hà Nội'),
(N'Tây','sdsad2@g.com','19002','1233','Hà Lội'),
(N'Nam','sdsad3@g.com','19003','1234','HCM'),
(N'Bắc','sdsad4@g.com','19004','1235','Sài Gòn');

INSERT INTO `blog` (`title`,`induction`,`image_title`,`user_id`,`content`,`image`) VALUES
('Admn dsdas','admin@gmail.com','ghe-eames-nhua-co-lot-nem-1.jpg',1, N'Ghế Eames nhựa đúc có lót nệmhe-eames-nhua-co-lot-nem-1.jpgGhế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch. Với thiết kế lưng ghế uốn cong mềm mại, ôm sát cơ thể, ghế Eames mang đến sự thoải mái tối đa cho người sử dụng, ngay cả khi ngồi trong thời gian dài. Chân ghế được làm từ nhựa gia','ghe-eames-nhua-co-lot-nem-1.jpg');

INSERT INTO `product` ( `name`, `image`,`induction`, `price`, `sale_price`, `description`, `category_id`) VALUES
(N'Ghế Eames nhựa đúc có lót nệm', 'product-1.jpg','Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch.', 750000, NULL, 'Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch. Với thiết kế lưng ghế uốn cong mềm mại, ôm sát cơ thể, ghế Eames mang đến sự thoải mái tối đa cho người sử dụng, ngay cả khi ngồi trong thời gian dài. Chân ghế được làm từ nhựa gia cố cứng cáp, chịu lực tốt và chống va đập hiệu quả.\r\n\r\nGhế được làm từ chất liệu nhựa PP cao cấp, có độ bền cao và dễ dàng vệ sinh. Nệm ghế được bọc da simili sang trọng, mang lại cảm giác êm ái và thoải mái khi sử dụng. Bạn có thể sử dụng trong nhiều không gian khác nhau như phòng khách, phòng ăn, phòng ngủ, quán cà phê, nhà hàng... Đây sẽ là mẫu ghế có tác dụng trang trí đẹp mắt, giúp tô điểm cho không gian của bạn thêm sang trọng và hiện đại.\r\n\r\nTHÔNG TIN CHI TIẾT SẢN PHẨM\r\n\r\nMã sản phẩm: ST3003E\r\nHướng dẫn sử dụng: Ghế cafe, ghế bàn ăn, ghế nhà hàng,...\r\nKích thước (DxRxC): 49x56x81cm (chiều cao mặt ghế 48 cm)', 1),
(N'Ghế Eames nhựa đúc có lót nệm', 'product-2.jpg','Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch.', 500000, 100000, 'Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch. Với thiết kế lưng ghế uốn cong mềm mại, ôm sát cơ thể, ghế Eames mang đến sự thoải mái tối đa cho người sử dụng, ngay cả khi ngồi trong thời gian dài. Chân ghế được làm từ nhựa gia cố cứng cáp, chịu lực tốt và chống va đập hiệu quả.\r\n\r\nGhế được làm từ chất liệu nhựa PP cao cấp, có độ bền cao và dễ dàng vệ sinh. Nệm ghế được bọc da simili sang trọng, mang lại cảm giác êm ái và thoải mái khi sử dụng. Bạn có thể sử dụng trong nhiều không gian khác nhau như phòng khách, phòng ăn, phòng ngủ, quán cà phê, nhà hàng... Đây sẽ là mẫu ghế có tác dụng trang trí đẹp mắt, giúp tô điểm cho không gian của bạn thêm sang trọng và hiện đại.\r\n\r\nTHÔNG TIN CHI TIẾT SẢN PHẨM\r\n\r\nMã sản phẩm: ST3003E\r\nHướng dẫn sử dụng: Ghế cafe, ghế bàn ăn, ghế nhà hàng,...\r\nKích thước (DxRxC): 49x56x81cm (chiều cao mặt ghế 48 cm)', 3),
(N'Ghế Eames nhựa đúc có lót nệm', 'product-3.jpg','Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch.', 70000, 40000, 'Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch. Với thiết kế lưng ghế uốn cong mềm mại, ôm sát cơ thể, ghế Eames mang đến sự thoải mái tối đa cho người sử dụng, ngay cả khi ngồi trong thời gian dài. Chân ghế được làm từ nhựa gia cố cứng cáp, chịu lực tốt và chống va đập hiệu quả.\r\n\r\nGhế được làm từ chất liệu nhựa PP cao cấp, có độ bền cao và dễ dàng vệ sinh. Nệm ghế được bọc da simili sang trọng, mang lại cảm giác êm ái và thoải mái khi sử dụng. Bạn có thể sử dụng trong nhiều không gian khác nhau như phòng khách, phòng ăn, phòng ngủ, quán cà phê, nhà hàng... Đây sẽ là mẫu ghế có tác dụng trang trí đẹp mắt, giúp tô điểm cho không gian của bạn thêm sang trọng và hiện đại.\r\n\r\nTHÔNG TIN CHI TIẾT SẢN PHẨM\r\n\r\nMã sản phẩm: ST3003E\r\nHướng dẫn sử dụng: Ghế cafe, ghế bàn ăn, ghế nhà hàng,...\r\nKích thước (DxRxC): 49x56x81cm (chiều cao mặt ghế 48 cm)', 3),
(N'Ghế Eames nhựa đúc có lót nệm', 'product-4.jpg','Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch.', 50000, 25000, 'Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch. Với thiết kế lưng ghế uốn cong mềm mại, ôm sát cơ thể, ghế Eames mang đến sự thoải mái tối đa cho người sử dụng, ngay cả khi ngồi trong thời gian dài. Chân ghế được làm từ nhựa gia cố cứng cáp, chịu lực tốt và chống va đập hiệu quả.\r\n\r\nGhế được làm từ chất liệu nhựa PP cao cấp, có độ bền cao và dễ dàng vệ sinh. Nệm ghế được bọc da simili sang trọng, mang lại cảm giác êm ái và thoải mái khi sử dụng. Bạn có thể sử dụng trong nhiều không gian khác nhau như phòng khách, phòng ăn, phòng ngủ, quán cà phê, nhà hàng... Đây sẽ là mẫu ghế có tác dụng trang trí đẹp mắt, giúp tô điểm cho không gian của bạn thêm sang trọng và hiện đại.\r\n\r\nTHÔNG TIN CHI TIẾT SẢN PHẨM\r\n\r\nMã sản phẩm: ST3003E\r\nHướng dẫn sử dụng: Ghế cafe, ghế bàn ăn, ghế nhà hàng,...\r\nKích thước (DxRxC): 49x56x81cm (chiều cao mặt ghế 48 cm)', 2),
(N'Ghế Eames nhựa đúc có lót nệm', 'product-5.jpg','Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch.', 50000, 25000, 'Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch. Với thiết kế lưng ghế uốn cong mềm mại, ôm sát cơ thể, ghế Eames mang đến sự thoải mái tối đa cho người sử dụng, ngay cả khi ngồi trong thời gian dài. Chân ghế được làm từ nhựa gia cố cứng cáp, chịu lực tốt và chống va đập hiệu quả.\r\n\r\nGhế được làm từ chất liệu nhựa PP cao cấp, có độ bền cao và dễ dàng vệ sinh. Nệm ghế được bọc da simili sang trọng, mang lại cảm giác êm ái và thoải mái khi sử dụng. Bạn có thể sử dụng trong nhiều không gian khác nhau như phòng khách, phòng ăn, phòng ngủ, quán cà phê, nhà hàng... Đây sẽ là mẫu ghế có tác dụng trang trí đẹp mắt, giúp tô điểm cho không gian của bạn thêm sang trọng và hiện đại.\r\n\r\nTHÔNG TIN CHI TIẾT SẢN PHẨM\r\n\r\nMã sản phẩm: ST3003E\r\nHướng dẫn sử dụng: Ghế cafe, ghế bàn ăn, ghế nhà hàng,...\r\nKích thước (DxRxC): 49x56x81cm (chiều cao mặt ghế 48 cm)', 2),
(N'Ghế Eames nhựa đúc có lót nệm', 'product-6.jpg','Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch.', 50000, 25000, 'Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch. Với thiết kế lưng ghế uốn cong mềm mại, ôm sát cơ thể, ghế Eames mang đến sự thoải mái tối đa cho người sử dụng, ngay cả khi ngồi trong thời gian dài. Chân ghế được làm từ nhựa gia cố cứng cáp, chịu lực tốt và chống va đập hiệu quả.\r\n\r\nGhế được làm từ chất liệu nhựa PP cao cấp, có độ bền cao và dễ dàng vệ sinh. Nệm ghế được bọc da simili sang trọng, mang lại cảm giác êm ái và thoải mái khi sử dụng. Bạn có thể sử dụng trong nhiều không gian khác nhau như phòng khách, phòng ăn, phòng ngủ, quán cà phê, nhà hàng... Đây sẽ là mẫu ghế có tác dụng trang trí đẹp mắt, giúp tô điểm cho không gian của bạn thêm sang trọng và hiện đại.\r\n\r\nTHÔNG TIN CHI TIẾT SẢN PHẨM\r\n\r\nMã sản phẩm: ST3003E\r\nHướng dẫn sử dụng: Ghế cafe, ghế bàn ăn, ghế nhà hàng,...\r\nKích thước (DxRxC): 49x56x81cm (chiều cao mặt ghế 48 cm)', 2),
(N'Ghế Eames nhựa đúc có lót nệm', 'product-7.jpg','Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch.', 50000, 25000, 'Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch. Với thiết kế lưng ghế uốn cong mềm mại, ôm sát cơ thể, ghế Eames mang đến sự thoải mái tối đa cho người sử dụng, ngay cả khi ngồi trong thời gian dài. Chân ghế được làm từ nhựa gia cố cứng cáp, chịu lực tốt và chống va đập hiệu quả.\r\n\r\nGhế được làm từ chất liệu nhựa PP cao cấp, có độ bền cao và dễ dàng vệ sinh. Nệm ghế được bọc da simili sang trọng, mang lại cảm giác êm ái và thoải mái khi sử dụng. Bạn có thể sử dụng trong nhiều không gian khác nhau như phòng khách, phòng ăn, phòng ngủ, quán cà phê, nhà hàng... Đây sẽ là mẫu ghế có tác dụng trang trí đẹp mắt, giúp tô điểm cho không gian của bạn thêm sang trọng và hiện đại.\r\n\r\nTHÔNG TIN CHI TIẾT SẢN PHẨM\r\n\r\nMã sản phẩm: ST3003E\r\nHướng dẫn sử dụng: Ghế cafe, ghế bàn ăn, ghế nhà hàng,...\r\nKích thước (DxRxC): 49x56x81cm (chiều cao mặt ghế 48 cm)', 2),
(N'Ghế Eames nhựa đúc có lót nệm', 'product-8.jpg','Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch.', 50000, 25000, 'Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch. Với thiết kế lưng ghế uốn cong mềm mại, ôm sát cơ thể, ghế Eames mang đến sự thoải mái tối đa cho người sử dụng, ngay cả khi ngồi trong thời gian dài. Chân ghế được làm từ nhựa gia cố cứng cáp, chịu lực tốt và chống va đập hiệu quả.\r\n\r\nGhế được làm từ chất liệu nhựa PP cao cấp, có độ bền cao và dễ dàng vệ sinh. Nệm ghế được bọc da simili sang trọng, mang lại cảm giác êm ái và thoải mái khi sử dụng. Bạn có thể sử dụng trong nhiều không gian khác nhau như phòng khách, phòng ăn, phòng ngủ, quán cà phê, nhà hàng... Đây sẽ là mẫu ghế có tác dụng trang trí đẹp mắt, giúp tô điểm cho không gian của bạn thêm sang trọng và hiện đại.\r\n\r\nTHÔNG TIN CHI TIẾT SẢN PHẨM\r\n\r\nMã sản phẩm: ST3003E\r\nHướng dẫn sử dụng: Ghế cafe, ghế bàn ăn, ghế nhà hàng,...\r\nKích thước (DxRxC): 49x56x81cm (chiều cao mặt ghế 48 cm)', 2),
(N'Ghế Eames nhựa đúc có lót nệm', 'product-9.jpg','Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch.', 100000, 80000, 'Ghế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch. Với thiết kế lưng ghế uốn cong mềm mại, ôm sát cơ thể, ghế Eames mang đến sự thoải mái tối đa cho người sử dụng, ngay cả khi ngồi trong thời gian dài. Chân ghế được làm từ nhựa gia cố cứng cáp, chịu lực tốt và chống va đập hiệu quả.\r\n\r\nGhế được làm từ chất liệu nhựa PP cao cấp, có độ bền cao và dễ dàng vệ sinh. Nệm ghế được bọc da simili sang trọng, mang lại cảm giác êm ái và thoải mái khi sử dụng. Bạn có thể sử dụng trong nhiều không gian khác nhau như phòng khách, phòng ăn, phòng ngủ, quán cà phê, nhà hàng... Đây sẽ là mẫu ghế có tác dụng trang trí đẹp mắt, giúp tô điểm cho không gian của bạn thêm sang trọng và hiện đại.\r\n\r\nTHÔNG TIN CHI TIẾT SẢN PHẨM\r\n\r\nMã sản phẩm: ST3003E\r\nHướng dẫn sử dụng: Ghế cafe, ghế bàn ăn, ghế nhà hàng,...\r\nKích thước (DxRxC): 49x56x81cm (chiều cao mặt ghế 48 cm)', 1);

INSERT INTO `rating` (`product_id`,`customer_id`,`rate`,`content`) VALUES
(1,2,4,N'Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài. Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài '),
(2,1,4,N'Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài. Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài '),
(3,3,4,N'Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài. Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài '),
(2,4,4,N'Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài. Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài '),
(4,1,4,N'Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài. Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài '),
(3,3,4,N'Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài. Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài '),
(1,2,4,N'Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài. Ngon VCL sẽ ủng hộ lâu dài sẽ ủng hộ lâu dài ');

CREATE TABLE IF NOT EXISTS `blog` (`title`,`induction`,`image_title`,`user_id`,`content`,`image`) VALUES
('Cooking Cajun Food','Herbs are fun and easy to grow. When harvested they make even the simplest meal seem like a gourmet delight. By using herbs in your cooking you can easily change the flavors of your recipes in many different ways, according to which herbs you add...','blog-hero.jpg',1,'The cast brass and cast stainless steel burners have the smallest burrs — by far. This will mean less chaos in the gas flow, fewer trapped particulate matter in the burner and a cleaner burning grill. The following comparison shows how the ports are formed.
Why is port formation important? Several reasons. If the hole is punched into a sheet metal burner, it leaves a large tab inside the burner that will caus e more chaos while burning. It is more apt to hold trapped food particles and grease, and is therefore more likely to burn through. (Note the Alfresco burner photo below.
Ingredients
.1 cup (240 ml) whole milk
.1 cup (240 ml) water, plus more as needed
.1 teaspoon fine sea salt
.2 tablespoons olive oil
.3/4 cup (120 g) fine polenta
.3 cups sunflower oil, plus more as needed
.7 ounces (200 g) peeled parsnips,
.1 pinch fine sea salt, plus more to taste
.2 tablespoons (30 g) unsalted butter
.1/2 tablespoon maple syrup

Directions
01.Combine all of the ingredients, kneading to form a smooth dough.
02.Allow the dough to rise, in a lightly greased, covered bowl, until it’s doubled in size,
03.about 90 minutes.
04.Gently divide the dough in half; it’ll deflate somewhat. Gently shape the dough into two oval loaves; or, for longer loaves, two 10″ to 11″ logs.
05.Place the loaves on a lightly greased or parchment-lined baking sheet. Cover and let
06.rise until very puffy, about 1 hour. Towards the end of the rising time, preheat the oven
07.to 425°F.
08.Spray the loaves with lukewarm water. Make two fairly deep diagonal slashes in each; a serrated bread knife, wielded firmly,
 Print recipe
Molded ports in cast burners seem like they would be a good idea, but there is considerable difficulty in making them uniform. Thus, it is quicker and less expensive to drill.

Fire Magic grill burner has drilled orifices Notice (from the photo on our site) the lack of extensive burring, allowing for a smooth flow of gas. Cast stainless leaves few, if any, burrs when drilled. This burner has a lifetime warranty, including against rust and burn-through.','blog-details.jpg'),
('Cooking Cajun Food','Herbs are fun and easy to grow. When harvested they make even the simplest meal seem like a gourmet delight. By using herbs in your cooking you can easily change the flavors of your recipes in many different ways, according to which herbs you add...','blog-hero.jpg',1,'The cast brass and cast stainless steel burners have the smallest burrs — by far. This will mean less chaos in the gas flow, fewer trapped particulate matter in the burner and a cleaner burning grill. The following comparison shows how the ports are formed.
Why is port formation important? Several reasons. If the hole is punched into a sheet metal burner, it leaves a large tab inside the burner that will caus e more chaos while burning. It is more apt to hold trapped food particles and grease, and is therefore more likely to burn through. (Note the Alfresco burner photo below.
Ingredients
.1 cup (240 ml) whole milk
.1 cup (240 ml) water, plus more as needed
.1 teaspoon fine sea salt
.2 tablespoons olive oil
.3/4 cup (120 g) fine polenta
.3 cups sunflower oil, plus more as needed
.7 ounces (200 g) peeled parsnips,
.1 pinch fine sea salt, plus more to taste
.2 tablespoons (30 g) unsalted butter
.1/2 tablespoon maple syrup

Directions
01.Combine all of the ingredients, kneading to form a smooth dough.
02.Allow the dough to rise, in a lightly greased, covered bowl, until it’s doubled in size,
03.about 90 minutes.
04.Gently divide the dough in half; it’ll deflate somewhat. Gently shape the dough into two oval loaves; or, for longer loaves, two 10″ to 11″ logs.
05.Place the loaves on a lightly greased or parchment-lined baking sheet. Cover and let
06.rise until very puffy, about 1 hour. Towards the end of the rising time, preheat the oven
07.to 425°F.
08.Spray the loaves with lukewarm water. Make two fairly deep diagonal slashes in each; a serrated bread knife, wielded firmly,
 Print recipe
Molded ports in cast burners seem like they would be a good idea, but there is considerable difficulty in making them uniform. Thus, it is quicker and less expensive to drill.

Fire Magic grill burner has drilled orifices Notice (from the photo on our site) the lack of extensive burring, allowing for a smooth flow of gas. Cast stainless leaves few, if any, burrs when drilled. This burner has a lifetime warranty, including against rust and burn-through.','blog-details.jpg'),
('Cooking Cajun Food','Herbs are fun and easy to grow. When harvested they make even the simplest meal seem like a gourmet delight. By using herbs in your cooking you can easily change the flavors of your recipes in many different ways, according to which herbs you add...','blog-hero.jpg',1,'The cast brass and cast stainless steel burners have the smallest burrs — by far. This will mean less chaos in the gas flow, fewer trapped particulate matter in the burner and a cleaner burning grill. The following comparison shows how the ports are formed.
Why is port formation important? Several reasons. If the hole is punched into a sheet metal burner, it leaves a large tab inside the burner that will caus e more chaos while burning. It is more apt to hold trapped food particles and grease, and is therefore more likely to burn through. (Note the Alfresco burner photo below.
Ingredients
.1 cup (240 ml) whole milk
.1 cup (240 ml) water, plus more as needed
.1 teaspoon fine sea salt
.2 tablespoons olive oil
.3/4 cup (120 g) fine polenta
.3 cups sunflower oil, plus more as needed
.7 ounces (200 g) peeled parsnips,
.1 pinch fine sea salt, plus more to taste
.2 tablespoons (30 g) unsalted butter
.1/2 tablespoon maple syrup

Directions
01.Combine all of the ingredients, kneading to form a smooth dough.
02.Allow the dough to rise, in a lightly greased, covered bowl, until it’s doubled in size,
03.about 90 minutes.
04.Gently divide the dough in half; it’ll deflate somewhat. Gently shape the dough into two oval loaves; or, for longer loaves, two 10″ to 11″ logs.
05.Place the loaves on a lightly greased or parchment-lined baking sheet. Cover and let
06.rise until very puffy, about 1 hour. Towards the end of the rising time, preheat the oven
07.to 425°F.
08.Spray the loaves with lukewarm water. Make two fairly deep diagonal slashes in each; a serrated bread knife, wielded firmly,
 Print recipe
Molded ports in cast burners seem like they would be a good idea, but there is considerable difficulty in making them uniform. Thus, it is quicker and less expensive to drill.

Fire Magic grill burner has drilled orifices Notice (from the photo on our site) the lack of extensive burring, allowing for a smooth flow of gas. Cast stainless leaves few, if any, burrs when drilled. This burner has a lifetime warranty, including against rust and burn-through.','blog-details.jpg'),
('Cooking Cajun Food','Herbs are fun and easy to grow. When harvested they make even the simplest meal seem like a gourmet delight. By using herbs in your cooking you can easily change the flavors of your recipes in many different ways, according to which herbs you add...','blog-hero.jpg',1,'The cast brass and cast stainless steel burners have the smallest burrs — by far. This will mean less chaos in the gas flow, fewer trapped particulate matter in the burner and a cleaner burning grill. The following comparison shows how the ports are formed.
Why is port formation important? Several reasons. If the hole is punched into a sheet metal burner, it leaves a large tab inside the burner that will caus e more chaos while burning. It is more apt to hold trapped food particles and grease, and is therefore more likely to burn through. (Note the Alfresco burner photo below.
Ingredients
.1 cup (240 ml) whole milk
.1 cup (240 ml) water, plus more as needed
.1 teaspoon fine sea salt
.2 tablespoons olive oil
.3/4 cup (120 g) fine polenta
.3 cups sunflower oil, plus more as needed
.7 ounces (200 g) peeled parsnips,
.1 pinch fine sea salt, plus more to taste
.2 tablespoons (30 g) unsalted butter
.1/2 tablespoon maple syrup

Directions
01.Combine all of the ingredients, kneading to form a smooth dough.
02.Allow the dough to rise, in a lightly greased, covered bowl, until it’s doubled in size,
03.about 90 minutes.
04.Gently divide the dough in half; it’ll deflate somewhat. Gently shape the dough into two oval loaves; or, for longer loaves, two 10″ to 11″ logs.
05.Place the loaves on a lightly greased or parchment-lined baking sheet. Cover and let
06.rise until very puffy, about 1 hour. Towards the end of the rising time, preheat the oven
07.to 425°F.
08.Spray the loaves with lukewarm water. Make two fairly deep diagonal slashes in each; a serrated bread knife, wielded firmly,
 Print recipe
Molded ports in cast burners seem like they would be a good idea, but there is considerable difficulty in making them uniform. Thus, it is quicker and less expensive to drill.

Fire Magic grill burner has drilled orifices Notice (from the photo on our site) the lack of extensive burring, allowing for a smooth flow of gas. Cast stainless leaves few, if any, burrs when drilled. This burner has a lifetime warranty, including against rust and burn-through.','blog-details.jpg'),
('Cooking Cajun Food','Herbs are fun and easy to grow. When harvested they make even the simplest meal seem like a gourmet delight. By using herbs in your cooking you can easily change the flavors of your recipes in many different ways, according to which herbs you add...','blog-hero.jpg',1,'The cast brass and cast stainless steel burners have the smallest burrs — by far. This will mean less chaos in the gas flow, fewer trapped particulate matter in the burner and a cleaner burning grill. The following comparison shows how the ports are formed.
Why is port formation important? Several reasons. If the hole is punched into a sheet metal burner, it leaves a large tab inside the burner that will caus e more chaos while burning. It is more apt to hold trapped food particles and grease, and is therefore more likely to burn through. (Note the Alfresco burner photo below.
Ingredients
.1 cup (240 ml) whole milk
.1 cup (240 ml) water, plus more as needed
.1 teaspoon fine sea salt
.2 tablespoons olive oil
.3/4 cup (120 g) fine polenta
.3 cups sunflower oil, plus more as needed
.7 ounces (200 g) peeled parsnips,
.1 pinch fine sea salt, plus more to taste
.2 tablespoons (30 g) unsalted butter
.1/2 tablespoon maple syrup

Directions
01.Combine all of the ingredients, kneading to form a smooth dough.
02.Allow the dough to rise, in a lightly greased, covered bowl, until it’s doubled in size,
03.about 90 minutes.
04.Gently divide the dough in half; it’ll deflate somewhat. Gently shape the dough into two oval loaves; or, for longer loaves, two 10″ to 11″ logs.
05.Place the loaves on a lightly greased or parchment-lined baking sheet. Cover and let
06.rise until very puffy, about 1 hour. Towards the end of the rising time, preheat the oven
07.to 425°F.
08.Spray the loaves with lukewarm water. Make two fairly deep diagonal slashes in each; a serrated bread knife, wielded firmly,
 Print recipe
Molded ports in cast burners seem like they would be a good idea, but there is considerable difficulty in making them uniform. Thus, it is quicker and less expensive to drill.

Fire Magic grill burner has drilled orifices Notice (from the photo on our site) the lack of extensive burring, allowing for a smooth flow of gas. Cast stainless leaves few, if any, burrs when drilled. This burner has a lifetime warranty, including against rust and burn-through.','blog-details.jpg'),
('Cooking Cajun Food','Herbs are fun and easy to grow. When harvested they make even the simplest meal seem like a gourmet delight. By using herbs in your cooking you can easily change the flavors of your recipes in many different ways, according to which herbs you add...','blog-hero.jpg',1,'The cast brass and cast stainless steel burners have the smallest burrs — by far. This will mean less chaos in the gas flow, fewer trapped particulate matter in the burner and a cleaner burning grill. The following comparison shows how the ports are formed.
Why is port formation important? Several reasons. If the hole is punched into a sheet metal burner, it leaves a large tab inside the burner that will caus e more chaos while burning. It is more apt to hold trapped food particles and grease, and is therefore more likely to burn through. (Note the Alfresco burner photo below.
Ingredients
.1 cup (240 ml) whole milk
.1 cup (240 ml) water, plus more as needed
.1 teaspoon fine sea salt
.2 tablespoons olive oil
.3/4 cup (120 g) fine polenta
.3 cups sunflower oil, plus more as needed
.7 ounces (200 g) peeled parsnips,
.1 pinch fine sea salt, plus more to taste
.2 tablespoons (30 g) unsalted butter
.1/2 tablespoon maple syrup

Directions
01.Combine all of the ingredients, kneading to form a smooth dough.
02.Allow the dough to rise, in a lightly greased, covered bowl, until it’s doubled in size,
03.about 90 minutes.
04.Gently divide the dough in half; it’ll deflate somewhat. Gently shape the dough into two oval loaves; or, for longer loaves, two 10″ to 11″ logs.
05.Place the loaves on a lightly greased or parchment-lined baking sheet. Cover and let
06.rise until very puffy, about 1 hour. Towards the end of the rising time, preheat the oven
07.to 425°F.
08.Spray the loaves with lukewarm water. Make two fairly deep diagonal slashes in each; a serrated bread knife, wielded firmly,
 Print recipe
Molded ports in cast burners seem like they would be a good idea, but there is considerable difficulty in making them uniform. Thus, it is quicker and less expensive to drill.

Fire Magic grill burner has drilled orifices Notice (from the photo on our site) the lack of extensive burring, allowing for a smooth flow of gas. Cast stainless leaves few, if any, burrs when drilled. This burner has a lifetime warranty, including against rust and burn-through.','blog-details.jpg');