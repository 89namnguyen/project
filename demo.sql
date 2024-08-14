DROP DATABASE IF EXISTS project;

CREATE DATABASE project CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

use project;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100),
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(100) NOT NULL,
  `created_at` date DEFAULT now(),
  `updated_at` date DEFAULT now(),
  `level` tinyint DEFAULT '0',
  PRIMARY KEY `pk_ad`(`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` NVARCHAR(100),
  `status` tinyint DEFAULT '1',
  PRIMARY KEY `pk_cate`(`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` NVARCHAR(100),
  `image` VARCHAR(100),
  `price` float,
  `sale_price` float,
  `description` text,
  `category_id` int NOT NULL,
  PRIMARY KEY `pk_prd`(`id`),
  FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `customer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` NVARCHAR(100),
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `phone` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(100) NOT NULL,
  `address` VARCHAR(100) NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY `pk_ctm`(`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` NVARCHAR(100),
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `phone` VARCHAR(100) NOT NULL UNIQUE,
  `customer_id` INT NOT NULL,
  `address` NVARCHAR(100) NULL,
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
  `customer_id` INT NOT NULL DEFAULT '1',
  `content` text ,
  `image` NVARCHAR(100),
  `date` date DEFAULT NOW(),
  `view`  int DEFAULT '1',
  PRIMARY KEY `pk_blog`(`id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT NOT NULL,
  `quantity` INT NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY `pk_ord_d`(`order_id`,`product_id`),
  FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `banner` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` NVARCHAR(100),
  `img` NVARCHAR(100),
  `link_name` NVARCHAR(100),
  `link` NVARCHAR(100),
  PRIMARY KEY `pk_ord_d`(`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `comment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer_id` INT NOT NULL,
  `content` text NOT NULL,
  `date` date DEFAULT NOW(),
  `status` tinyint DEFAULT '1',
  PRIMARY KEY `pk_cm`(`id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comment_id` INT NOT NULL,
  `customer_id` INT NOT NULL,
  `content` text NOT NULL,
  `date` date DEFAULT NOW() ,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY `fb`(`id`),
  FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`),
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

INSERT INTO `users` (name, email, password) VALUES
('Admn Roor','admin@gmail.com','$2y$10$2po3ujcIjctrt.V5ao8i..aaSbYV7oakBdBwO8It.82CYhK4wNrZW');

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(2, N'Bánh Chocopie', 1),
(3, N'Bánh Bông Lan', 1),
(4, N'Bánh Chưng', 1),
(5, N'Bánh Pía', 1),
(6, N'Bánh Dẻo', 1),
(7, N'Bánh Xèo', 1),
(8, N'Kẹo Lạc', 1),
(9, N'Kẹo Bơ', 1),
(10, N'Kẹo Gạo', 1);

INSERT INTO `customer` (`name`,`email`,`phone`,`password`,`address`) VALUES
(N'sdasd','sdsad','dsdad','dsdsd','sdasd');

INSERT INTO `blog` (`title`,`induction`,`image_title`,`customer_id`,`content`,`image`) VALUES
('Admn dsdas','admin@gmail.com','ghe-eames-nhua-co-lot-nem-1.jpg',1, N'Ghế Eames nhựa đúc có lót nệmhe-eames-nhua-co-lot-nem-1.jpgGhế nhựa Eames ST3003E là sự lựa chọn hoàn hảo cho những ai yêu thích phong cách nội thất hiện đại, thanh lịch. Với thiết kế lưng ghế uốn cong mềm mại, ôm sát cơ thể, ghế Eames mang đến sự thoải mái tối đa cho người sử dụng, ngay cả khi ngồi trong thời gian dài. Chân ghế được làm từ nhựa gia','ghe-eames-nhua-co-lot-nem-1.jpg');

INSERT INTO `product` (`id`, `name`, `image`, `price`, `sale_price`, `description`, `category_id`) VALUES
(1, N'Bánh Trung Thu Thập Cẩm', 'banh-trung-thu-thap-cam.jpg', 60000, NULL, 'Bánh Trung Thu Thập Cẩm là một món ăn đặc trưng của mùa Trung Thu, nổi tiếng với sự kết hợp của nhiều loại nhân trong một chiếc bánh. Nhân thập cẩm thường bao gồm hạt sen, đậu xanh, thịt heo, nấm đông cô, và các nguyên liệu khác, mang đến hương vị đa dạng và phong phú. Vỏ bánh mềm mại, dẻo thơm, được làm từ bột mì và mật ong, tạo nên sự hài hòa giữa vỏ và nhân. Bánh có thể được thưởng thức trong dịp Tết Trung Thu hoặc làm quà tặng cho người thân.', 1),
(2, N'Bánh Trung Thu Nhân Đậu Xanh', 'banh-trung-thu-nhan-dau-xanh.jpg', 50000, NULL, 'Bánh Trung Thu Nhân Đậu Xanh là một lựa chọn phổ biến cho mùa Trung Thu với nhân đậu xanh ngọt mịn và vỏ bánh mềm dẻo. Bánh được làm từ đậu xanh đã xay nhuyễn, kết hợp với đường và dầu thực vật để tạo ra một lớp nhân thơm ngon. Vỏ bánh được làm từ bột mì, tạo nên một lớp vỏ nhẹ nhàng, hòa quyện hoàn hảo với nhân đậu xanh. Đây là món bánh lý tưởng cho những ai yêu thích sự thanh tao và truyền thống trong dịp Tết Trung Thu.', 1),
(3, N'Bánh Chưng', 'banh-chung.jpg', 120000, NULL, 'Bánh Chưng là món ăn truyền thống của người Việt Nam trong dịp Tết Nguyên Đán. Bánh có hình vuông, được gói bằng lá dong và có nhân đậu xanh, thịt lợn, cùng với gạo nếp. Bánh Chưng tượng trưng cho đất và được chế biến kỹ lưỡng qua nhiều công đoạn để mang lại hương vị đậm đà, đặc trưng của Tết.', 2),
(4, N'Bánh Xèo', 'banh-xeo.jpg', 30000, NULL, 'Bánh Xèo là món ăn đặc sản miền Nam Việt Nam với lớp vỏ bánh mỏng, giòn rụm và nhân đầy đặn bao gồm tôm, thịt heo, giá đỗ, và các loại rau củ. Bánh được chiên vàng đều và thường được ăn kèm với rau sống và nước chấm đặc trưng. Đây là món ăn hấp dẫn và được yêu thích trong nhiều bữa tiệc và dịp lễ.', 2),
(5, N'Bánh Gạo', 'banh-gao.jpg', 15000, NULL, 'Bánh Gạo là món ăn truyền thống của người Việt, làm từ gạo nếp và được chế biến thành nhiều dạng khác nhau như bánh dày, bánh nếp. Bánh có hương vị ngọt ngào hoặc mặn tùy theo loại nhân và cách chế biến. Đây là món ăn được ưa chuộng trong các dịp lễ tết và các buổi tụ họp gia đình.', 2),
(6, N'Bánh Đậu Xanh', 'banh-dau-xanh.jpg', 20000, NULL, 'Bánh Đậu Xanh là món bánh truyền thống của Việt Nam, nổi bật với nhân đậu xanh mịn màng và vỏ bánh mềm dẻo. Bánh thường được làm từ đậu xanh đã xay nhuyễn, đường, và một ít dầu thực vật, tạo nên hương vị ngọt thanh và tinh tế. Bánh thường được dùng làm món tráng miệng hoặc quà tặng trong các dịp lễ.', 2);
