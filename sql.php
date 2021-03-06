<?php

CREATE TABLE `product` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name_pd` varchar(255) NOT NULL,
	`url_name_pd` varchar(255) NOT NULL,
	`image_pd` varchar(1000) NOT NULL,
	`describe_pd` varchar(1000) NOT NULL,
	`material_pd` INT NOT NULL,
	`recommended_age` INT NOT NULL,
	`ideal_for` INT NOT NULL,
	`species_pd` INT NOT NULL,
	`amount_pd` INT NOT NULL,
	`price_pd` FLOAT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `pd_species` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name_species` varchar(300) NOT NULL,
	`url_name_species` varchar(300) NOT NULL,
	`describe_species` varchar(1000) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `account` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`first_name` varchar(300) NOT NULL,
	`last_name` varchar(300) NOT NULL,
	`email` varchar(300) NOT NULL,
	`password` varchar(300) NOT NULL,
	`GT` varchar(10) NOT NULL,
	`date_of_birth` DATE NOT NULL,
	`status` INT NOT NULL,
	`classify` INT NOT NULL,
	`avatar` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `pd_comments` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_pd` INT NOT NULL,
	`id_account` INT NOT NULL,
	`comment_content` varchar(500) NOT NULL,
	`date` DATETIME NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `order_product` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_account` INT NOT NULL,
	`created_date` DATETIME NOT NULL,
	`date_of_delivery` DATE,
	`address` varchar(300) NOT NULL,
	`phone_number` varchar(300) NOT NULL,
	`pay` INT NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `order_details` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_order` INT NOT NULL,
	`id_product` INT NOT NULL,
	`amount` INT NOT NULL,
	`price_product` FLOAT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `contact` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`email_contact` varchar(255) NOT NULL,
	`content_message` varchar(255) NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `pd_recommended_age` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name_r_age` varchar(255) NOT NULL,
	`url_name_r_age` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `pd_ideal_for` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name_ideal_for` varchar(255) NOT NULL,
	`url_name_ideal` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `pd_material` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name_material` varchar(255) NOT NULL,
	`url_name_material` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `product` ADD CONSTRAINT `product_fk0` FOREIGN KEY (`material_pd`) REFERENCES `pd_material`(`id`);

ALTER TABLE `product` ADD CONSTRAINT `product_fk1` FOREIGN KEY (`recommended_age`) REFERENCES `pd_recommended_age`(`id`);

ALTER TABLE `product` ADD CONSTRAINT `product_fk2` FOREIGN KEY (`ideal_for`) REFERENCES `pd_ideal_for`(`id`);

ALTER TABLE `product` ADD CONSTRAINT `product_fk3` FOREIGN KEY (`species_pd`) REFERENCES `pd_species`(`id`);

ALTER TABLE `pd_comments` ADD CONSTRAINT `pd_comments_fk0` FOREIGN KEY (`id_pd`) REFERENCES `product`(`id`);

ALTER TABLE `pd_comments` ADD CONSTRAINT `pd_comments_fk1` FOREIGN KEY (`id_account`) REFERENCES `account`(`id`);

ALTER TABLE `order_product` ADD CONSTRAINT `order_product_fk0` FOREIGN KEY (`id_account`) REFERENCES `account`(`id`);

ALTER TABLE `order_details` ADD CONSTRAINT `order_details_fk0` FOREIGN KEY (`id_order`) REFERENCES `order_product`(`id`);

ALTER TABLE `order_details` ADD CONSTRAINT `order_details_fk1` FOREIGN KEY (`id_product`) REFERENCES `product`(`id`);






INSERT INTO `pd_species`(`id`, `name_species`, `url_name_species`, `describe_species`) VALUES ('1','Vehicles and remote control cars', 'vehicles-and-remote-control-cars',
'Remote control toys have long been popular gifts for tech-savvy kids, and are more engaging than ever since toy makers have started using Android, Windows and iOS devices as a control system');
INSERT INTO `pd_species`(`id`, `name_species`, `url_name_species`, `describe_species`) VALUES ('2','Stuffed Animals & Plush Toys', 'bup-be-and-thu-nhoi-bong','m?? h??nh
ph???ng theo h??nh d??ng c???a con ng?????i v?? th?????ng l??m ????? ch??i c???a tr??? em');
INSERT INTO `pd_species`(`id`, `name_species`, `url_name_species`, `describe_species`) VALUES ('3','action figure', 'action-figure','lo???i m??y c??
th??? th???c hi???n nh???ng c??ng vi???c m???t c??ch t??? ?????ng b???ng s??? ??i???u khi???n c???a m??y t??nh ho???c c??c vi m???ch
??i???n t??? ???????c l???p tr??nh.');

INSERT INTO `pd_ideal_for`(`id`, `name_ideal_for`, `url_name_ideal`) VALUES ('1','Boys', 'boys');
INSERT INTO `pd_ideal_for`(`id`, `name_ideal_for`, `url_name_ideal`) VALUES ('2','Girls', 'girls');
INSERT INTO `pd_ideal_for`(`id`, `name_ideal_for`, `url_name_ideal`) VALUES ('3','Boys And Girls', 'boys-and-girls');

INSERT INTO `pd_material`(`id`, `name_material`, `url_name_material`) VALUES ('1','plassic', 'plassic');
INSERT INTO `pd_material`(`id`, `name_material`, `url_name_material`) VALUES ('2','wood', 'wood');
INSERT INTO `pd_material`(`id`, `name_material`, `url_name_material`) VALUES ('3','fabric', 'fabric');
INSERT INTO `pd_material`(`id`, `name_material`, `url_name_material`) VALUES ('4','metal', 'metal');

INSERT INTO `pd_recommended_age`(`id`, `name_r_age`, `url_name_r_age`) VALUES ('1','0 to 2 Years', '0-to-2-years');
INSERT INTO `pd_recommended_age`(`id`, `name_r_age`, `url_name_r_age`) VALUES ('2','3 to 4 Years', '3-to-4-years');
INSERT INTO `pd_recommended_age`(`id`, `name_r_age`, `url_name_r_age`) VALUES ('3','4 to 5 Years', '4-to-5-years');
INSERT INTO `pd_recommended_age`(`id`, `name_r_age`, `url_name_r_age`) VALUES ('4','5 to 7 Years', '5-to-7-years');
INSERT INTO `pd_recommended_age`(`id`, `name_r_age`, `url_name_r_age`) VALUES ('5','8 to 11 Years', '8-to-11-years');
INSERT INTO `pd_recommended_age`(`id`, `name_r_age`, `url_name_r_age`) VALUES ('6','12 Years & Up', '12-years-and-up');

INSERT INTO `account` (`first_name`, `last_name`, `email`, `password`, `GT`, `date_of_birth`, `status`,
`classify`, `avatar`) VALUES ('Nguy???n Ho??ng', 'Nh???t', 'nhnhut.18it4@sict.udn.vn',
'e10adc3949ba59abbe56e057f20f883e', 'Nam', '2000-9-2', '1', '1', '');
INSERT INTO `account` (`first_name`, `last_name`, `email`, `password`, `GT`, `date_of_birth`, `status`,
`classify`, `avatar`) VALUES ('Ho??ng Minh', 'B??nh', 'hmbinh.18it4@sict.udn.vn',
'e10adc3949ba59abbe56e057f20f883e', 'Nam', '2000-8-5', '1', '0', '');
INSERT INTO `account` (`first_name`, `last_name`, `email`, `password`, `GT`, `date_of_birth`, `status`,
`classify`, `avatar`) VALUES ('Nguy???n Ho??ng', 'H???i', 'nhhai.18it4@sict.udn.vn',
'e10adc3949ba59abbe56e057f20f883e', 'Nam', '2000-4-7', '1', '0', '');
INSERT INTO `account` (`first_name`, `last_name`, `email`, `password`, `GT`, `date_of_birth`, `status`,
`classify`, `avatar`) VALUES ('L?? Th??? Ki???u', 'Oanh', 'ltkoanh.18it4@sict.udn.vn',
'e10adc3949ba59abbe56e057f20f883e', 'N???', '2000-1-2', '1', '0', '');
INSERT INTO `account` (`first_name`, `last_name`, `email`, `password`, `GT`, `date_of_birth`, `status`,
`classify`, `avatar`) VALUES ('Ph???m Ph??', 'Th???nh', 'ppthinh.18it4@sict.udn.vn',
'e10adc3949ba59abbe56e057f20f883e', 'Nam', '2000-5-9', '1', '0', '');

INSERT INTO `account` (`first_name`, `last_name`, `email`, `password`, `GT`, `date_of_birth`, `status`,
`classify`, `avatar`) VALUES ('Nguy???n Y???n', 'Nhi', 'nynhi.18it4@sict.udn.vn',
'e10adc3949ba59abbe56e057f20f883e', 'N???', '2000-6-3', '1', '0', '');
INSERT INTO `account` (`first_name`, `last_name`, `email`, `password`, `GT`, `date_of_birth`, `status`,
`classify`, `avatar`) VALUES ('Nguy???n Th??? Tr??m', 'Em', 'nttem.18it4@sict.udn.vn',
'e10adc3949ba59abbe56e057f20f883e', 'N???', '2000-7-2', '1', '0', '');
INSERT INTO `account` (`first_name`, `last_name`, `email`, `password`, `GT`, `date_of_birth`, `status`,
`classify`, `avatar`) VALUES ('Tr????ng Quang', 'Nh??', 'tqnha.18it4@sict.udn.vn',
'e10adc3949ba59abbe56e057f20f883e', 'Nam', '2000-8-3', '1', '0', '');



INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'M??y bay tr???c th??ng c???u th????ng ', 'may-bay-truc-thang-cuu-thuong', 'product1.jpg,product1-1.jpg,product1-2.jpg,product1-3.jpg,product1-4.jpg,product1-5.jpg', 'M??y bay
tr???c th??ng c???u th????ng Alpha ????? ch??i ??? Polesie Toys mang k??ch th?????c thu nh??? c???a m??y bay tr???c th??ng
c???u th????ng trong th???c t???. S???n ph???m s??? mang l???i ni???m vui cho c??c b??, gi??p b?? t?????ng t?????ng nh???p vai
l??m ch?? phi c??ng tr???c th??ng c???u th????ng', '1', '4', '1', '1', '20', '220.14');
INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'Car Model Assembly GE-684', 'car-model-assembly-ge-684', 'product2.jpg,product2-1.jpg,product2-2.jpg,product2-3.jpg,product2-4.jpg,product2-5.jpg,product2-6.jpg,product2-7.jpg', 'Quanzhou
Lucky Star Light Industrial Artcrafts Co., Ltd. Was founded in Oct, 2001. It is headquartered in Quanzhou
city, Fujian province with supporting offices in Chenghai city, Guangdong province and Yiwu city', '1', '4', '1', '1', '20', '280.65');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'Xe ????? Ch??i M?? H??nh M??y X??c Cho B??', 'xe-do-choi-mo-hinh-may-xuc-cho-be', 'product3.jpg,product3-1.jpg,product3-2.jpg,product3-3.jpg,product3-4.jpg,product3-5.jpg,product3-6.jpg,product3-7.jpg,product3-8.jpg', 'Xe ?????
Ch??i M?? H??nh M??y X??c Cho B?? ???????c l??m t??? c??c th??nh ph???n v???t li???u ch???t l?????ng t???t c?? ????? b???n cao, v???t
li???u ch???ng ??n m??n, th??n thi???n v???i m??i tr?????ng, an to??n cho s???c kh???e c???a ng?????i d??ng.', '1', '4', '1', '1', '20', '295.78') , (NULL, 'M?? H??nh Xe ????? Ch??i (5 Xe)', 'mo-hinh-xe-do-choi-5-xe', 'product4.jpg,product4-1.jpg,product4-2.jpg,product4-3.jpg,product4-4.jpg,product4-5.jpg,product4-6.jpg,product4-7.jpg,product4-8.jpg', 'Due to the difference between different
monitors, the picture may not be reflecting the actual the item, please consider this before the
purchase.\r\n Please allow 1-3 cm tolerance due to manual measurement.', '1', '3', '1', '1', '20', '280.46');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'M?? H??nh ????? Ch??i Xe ???i', 'mo-hinh-do-choi-xe-ui', 'product5.jpg,product5-1.jpg,product5-2.jpg,product5-3.jpg,product5-4.jpg,product5-5.jpg,product5-6.jpg,product5-7.jpg,product5-8.jpg', 'The colourful box
packaged,it is good ideal as gift for your kid Good quality,environmental material safe and health for
children To attractive children attentin,improve children aknowledge', '4', '4', '1', '1', '20', '275.44'), (NULL, 'Xe
????? Ch??i ??i???u Khi???n Xiaomi', 'xe-do-choi-dieu-khien-xiaomi', 'product6.jpg,product6-1.jpg,product6-2.jpg,product6-3.jpg,product6-4.jpg,product6-5.jpg,product6-6.jpg,product6-7.jpg,product6-8.jpg,product6-9.jpg', 'xe ????? Ch??i ??i???u Khi???n Xiaomi l?? m??n ????? ch??i tuy???t v???i cho
b??, gi??p k??ck th??ch th??? gi??c c??ng nh?? t??nh s??ng t???o, t??? m??? c???a b??, gi??p b?? ph??t tri???n tr?? th??ng minh ngay c???
khi ??ang ch??i B?? c?? th??? l???p r??p m???t chi???c xe t???i l???n t??? nh???ng m???nh nh???, ??i kh??m ph?? nh???ng ??i???u ch??a
bi???t.', '1', '4', '1', '1', '20', '290.99');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, '????? Ch??i Xe Leo T?????ng', 'do-choi-xe-leo-tuong', 'product7.jpg,product7-1.jpg,product7-2.jpg,product7-3.jpg,product7-4.jpg,product7-5.jpg,product7-6.jpg,product7-7.jpg,product7-8.jpg,product7-9.jpg', 'his super cool RC
climbing car is perfect gift for children over 3 years old. It\'s anti-gravity, infrared remote controlled by
transmitter and can drive almost anywhere, on ground, tilted planum, vertical wall even ceiling. You will
definitely enjoy it with lots of fun.', '1', '4', '1', '1', '20', '310.33'), (NULL, 'Xe ?????a H??nh RTR RC Off-road', 'xe-dia-hinh-rtr-rc-off-road',
'product8.jpg,product8-1.jpg,product8-2.jpg,product8-3.jpg,product8-4.jpg,product8-5.jpg,product8-6.jpg,product8-7.jpg,product8-8.jpg,product8-9.jpg', 'H??? th???ng v?? tuy???n 2CH 2.4Ghz, ch???ng nhi???u t???m xa, cho kho???ng c??ch ??i???u khi???n kho???ng
80m H??? th???ng truy???n ?????ng 4WD H??? th???ng ?????c l???p b???n b??nh. Xe ch???y ??m ??i, gi???m x??c hi???u qu???. C??
b??nh r??ng kim lo???i tr?????c v?? sau.', '1', '5', '1', '1', '20', '290.11');


INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'Robot Th??ng Minh ??i???u Khi???n B???ng Gi???ng N??i', 'robot-thong-minh-dieu-khien-bang-giong-noi',
'product9.jpg,product9-1.jpg,product9-2.jpg,product9-3.jpg,product9-4.jpg,product9-5.jpg,product9-6.jpg,product9-7.jpg,product9-8.jpg,product9-9.jpg', '827 Intelligent Robot with exquisite craftsmanship, excellent appearance and perfect
qualityhas been empowered with multiple functions, such as Auto display,Program, Recording, English,
Science, Story, Save money, Tongue twister, Colorful light ', '1', '4', '1', '1', '20', '274.22'), (NULL, '????? Ch??i
Robot Th??ng Minh Kaizhi Y6', 'do-choi-robot-thong-minh-kaizhi-y6', 'product10.jpg,product10-1.jpg,product10-2.jpg,product10-3.jpg,product10-4.jpg,product10-5.jpg,product10-6.jpg,product10-7.jpg,product10-8.jpg', 'control, touchable control, sound control. It assists and
accompany kids to explore new things with fun and curiosity. With those amazing functions, 827
Intelligent Robotwill be dramatically welcome among child and provide unprecedented delight for
children. Come ', '1', '3', '3', '1', '20', '290.36');



INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'Xe T??ng M?? H??nh ??i???u Khi???n T??? Xa Yu Line Yh4101A', 'xe-tang-mo-hinh-dieu-khien-tu-xa-yu-line-yh4101a',
'product11.jpg,product11-1.jpg,product11-2.jpg,product11-3.jpg,product11-4.jpg,product11-5.jpg,product11-6.jpg,product11-7.jpg', 'Xe T??ng M?? H??nh ??i???u Khi???n T??? Xa Yu Line Yh4101A thu???c d??ng xe ??i???u khi???n t??? xa

v???i t??? l??? 1:20 v?? t???n s??? k??nh 4.0 ???????c l??m t??? ch???t li???u nh???a ABS b???o v??? m??i tr?????ng, l?? ch???t li???u an
to??n, kh??ng g??y ?????c h???i v???i m??i tr?????ng. ', '1', '6', '1', '1', '20', '210.30');
INSERT INTO `pd_comments` (`id`, `id_pd`, `id_account`, `comment_content`, `status`) VALUES (NULL,
'1', '1', '????? Ch??i T???t Ch???t l?????ng cao l???m ((:', '0');


INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'Nh?? b??p b?? Ng??i nh?? thu nh??? l???p gh??p Happiness ', 'nha-bup-be-ngoi-nha-thu-nho-lap-ghep-happiness',
'product30.jpg,product30-1.jpg,product30-2.jpg,product30-3.jpg,product30-4.jpg,product30-5.jpg,product30-6.jpg,product30-7.jpg,product30-8.jpg,product30-9.jpg', '????y s??? l?? m???t m??n qu?? th???t 
d??? th????ng d??nh t???ng cho ng?????i m?? b???n y??u qu?? ho???c ch??nh b???n c?? th??? t??? th?????ng cho m??nh nh???ng ph??t gi??y th?? gi??n b??n b??n l??m vi???c. Ch???t li???u m?? h??nh ho??n to??n b???ng g??? nh???, v???i, gi???y v?? 
silicon ????? c??c b???n c?? th??? t??? tay l???p gh??p nh???ng m?? h??nh m?? m??nh y??u th??ch.', '2', '3', '2', '2', '20', '274.22');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'M?? h??nh nh?? l???p gh??p Ti???m hoa Robotime', 'mo-hinh-nha-lap-ghep-tiem-hoa-robotime',
'product32.jpg,product32-1.jpg,product32-2.jpg,product32-3.jpg,product32-4.jpg,product32-5.jpg,product32-6.jpg,product32-7.jpg,product32-8.jpg,product32-9.jpg', '????y s??? l?? m???t m??n qu?? th???t 
d??? th????ng d??nh t???ng cho ng?????i m?? b???n y??u qu?? ho???c ch??nh b???n c?? th??? t??? th?????ng cho m??nh nh???ng ph??t gi??y th?? gi??n b??n b??n l??m vi???c. Ch???t li???u m?? h??nh ho??n to??n b???ng g??? nh???, v???i, gi???y v?? 
silicon ????? c??c b???n c?? th??? t??? tay l???p gh??p nh???ng m?? h??nh m?? m??nh y??u th??ch.', '2', '3', '2', '2', '20', '290.22');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'Nh?? b??p b?? l???p gh??p Dorami HongDaC009', 'nha-bup-be-lap-ghe-dorami-hongdacc009',
'product27.jpg,product27-1.jpg,product27-2.jpg,product27-3.jpg,product27-4.jpg,product27-5.jpg,product27-6.jpg,product27-7.jpg,product27-8.jpg,product27-9.jpg', 'N???u b???n ??ang t??m ki???m m???t m??n qu?? ????? t???ng b???n b?? ho???c ng?????i th??n nh??n d???p ?????c bi??t, ????y l?? m???t s??? l???a ch???n tuy???t v???i cho b???n
Nh?? b??p b?? l???p gh??p DIY  Doll douse ???????c l??m b???i ch??nh c??c b???n theo s??ch h?????ng d???n t???ng b?????c -DIY Doll  house l?? m?? h??nh thu nh??? c???a ng??i nh?? th???c s???, d??? th????ng v?? xinh ?????p, theo ty l???
 1:24', '2', '3', '2', '2', '20', '110.22');
 
INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'Nh?? b??p b?? Ng??i nh?? thu nh??? l???p gh??p Sweet World', 'nha-bup-be-ngoi-nha-thu-nho-lap-ghep-sweet-world',
'product29.jpg,product29-1.jpg,product29-2.jpg,product29-3.jpg,product29-4.jpg,product29-5.jpg,product29-6.jpg,product29-7.jpg,product29-8.jpg,product29-9.jpg', 'N???u b???n ??ang t??m ki???m m???t m??n qu?? ????? t???ng b???n b?? ho???c ng?????i th??n nh??n d???p ?????c bi??t, ????y l?? m???t s??? l???a ch???n tuy???t v???i cho b???n
Nh?? b??p b?? l???p gh??p DIY  Doll douse ???????c l??m b???i ch??nh c??c b???n theo s??ch h?????ng d???n t???ng b?????c -DIY Doll  house l?? m?? h??nh thu nh??? c???a ng??i nh?? th???c s???, d??? th????ng v?? xinh ?????p, theo ty l???
 1:24', '2', '3', '2', '2', '20', '110.22');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'Nh?? b??p b?? Ng??i nh?? thu nh??? l???p gh??p Kitten Diary', 'nha-bup-be-ngoi-nha-thu-nho-lap-ghep-kitten-diary',
'product29.jpg,product29-1.jpg,product29-2.jpg,product29-3.jpg,product29-4.jpg,product29-5.jpg,product29-6.jpg,product29-7.jpg,product29-8.jpg,product29-9.jpg', 'Ch???t li???u m?? h??nh ho??n to??n 
b???ng g??? nh???, v???i, gi???y v?? silicon an to??n v???i m??i tr?????ng v?? con ng?????i, v???t nu??i ????? c??c b???n c?? th??? t??? tay l???p gh??p nh???ng m?? h??nh m?? m??nh y??u th??ch. ????y s??? l?? m???t m??n qu?? th???t d??? 
th????ng d??nh t???ng cho ng?????i m?? b???n y??u qu?? ho???c ch??nh b???n c?? th??? t??? th?????ng cho m??nh nh???ng ph??t gi??y th?? gi??n b??n b??n l??m vi???c.', '2', '3', '2', '2', '20', '150.12');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'ebba Lil Benny Phant, Pink Plush', 'ebba-lil-benny-phant,-pink-plush',
'product15.jpg,product15-1.jpg,product15-2.jpg,product15-3.jpg,product15-4.jpg,product15-5.jpg,product15-6.jpg,product15-7.jpg,product15-8.jpg,product15-9.jpg', 'bba Lil Benny Phantom 
characters have wonderful super-soft plush that is perfect for snuggling. L.E. Phants are in a seated position and wear an endearing expression on their face. Each piece is constructed 
using top quality materials for durability and softness.', '3', '1', '2', '2', '20', '172.72');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'GUND Nayla Cockapoo Dog Stuffed Animal Plush, 10.5"', 'gund-nayla-cockapoo-dog-stuffed-animal-plush,-10.5',
'product14.jpg,product14-1.jpg,product14-2.jpg,product14-3.jpg,product14-4.jpg,product14-5.jpg,product14-6.jpg,product14-7.jpg,product14-8.jpg,product14-9.jpg', 'GUND is proud to present 
Nayla ??? a cute and cuddly Cockapoo that???s sure to become any plush lover???s best friend. Features accurate details that are sure to please fans of poodles and cocker spaniels alike! 
Our Designer Pups line features realistic plush versions of popular hybrid breeds', '3', '1', '2', '2', '20', '165.72');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'GUND Snuffles Teddy Bear Stuffed Animal Plush, White, 10', 'gund-snuffles-teddy-bear-stuffed-animal-plush-white-10',
'product16.jpg,product16-1.jpg,product16-2.jpg,product16-3.jpg,product16-4.jpg,product16-5.jpg,product16-6.jpg,product16-7.jpg,product16-8.jpg,product16-9.jpg', 'GUND is proud to present 
one of our oldest and most beloved teddy bears ??? Snuffles! The best-selling GUND teddy bear of all-time, Snuffles features a unique crescent design that lets him look into your 
eyes with every hug. First debuting in 1980, generations of Snuffles fans have collected, grown up with, loved, and passed on their beloved bears. This white version makes the perfect 
addition to any Snuffles collection', '3', '1', '2', '2', '20', '155.72');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'Melissa & Doug Zephyr Dragon Stuffed Animal', 'melissa-and-doug-zephyz-dragon-stuffed-animal',
'product17.jpg,product17-1.jpg,product17-2.jpg,product17-3.jpg,product17-4.jpg,product17-5.jpg,product17-6.jpg,product17-7.jpg,product17-8.jpg,product17-9.jpg', 'Colorful Zephyr Dragon 
has shiny purple wings that look like they could fly at any moment! A perfect stuffed animal to inspire flights of fantasy, this enchanting toy is sure to be the toast of the kingdom. 
From classic wooden toys to crafts, pretend play, and games, Melissa & Doug products provide a launch pad to ignite imagination and a sense of wonder in all children so they can discover 
themselves, their passions, and their purpose. ', '3', '1', '2', '2', '20', '164.72');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'GUND Pusheen Snackables Donut Plush Stuffed Animal Cat, 9.5"', 'gund-pusheen-snackables-donut-plush-stuffed-animal-cat-9.5',
'product13.jpg,product13-1.jpg,product13-2.jpg,product13-3.jpg,product13-4.jpg,product13-5.jpg,product13-6.jpg,product13-7.jpg,product13-8.jpg,product13-9.jpg', 'PUSHEEN WITH PINK FROSTED 
DONUT SNACKABLE PLUSH: Pusheen loves to snack! This classic upright Pusheen plush toy features the kitty satisfying her sweet tooth with a frosted donut. THE PERFECT GIFT: 
Our plush dolls, teddy bears & stuffed animals make perfect gifts for birthdays, baby showers, baptisms, Easter, Valentine is Day & more! A perfect gift for any Pusheen or 
cat lover!', '3', '2', '2', '2', '20', '155.22');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, 'WowWee Pinkfong Baby Shark Official Song Puppet with Tempo Control - Baby Shark', 'wowwee-pinkfong-baby-shark-official-song-puppet-with-tempo-control-baby-shark',
'product12.jpg,product12-1.jpg,product12-2.jpg,product12-3.jpg,product12-4.jpg,product12-5.jpg,product12-6.jpg,product12-7.jpg,product12-8.jpg,product12-9.jpg', 'Move the mouth of the puppet to start playing the entire hit baby shark song! (Full-length English version)
Control the Tempo! Move the shark???s mouth faster or slower to change the speed of the song! Soft plush fabric (spot cleaning Only) Batteries included Each character sold separately
Produced by WowWee for pinkfong, official creator of the global hit baby shark!', '3', '2', '2', '2', '20', '146.22');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, '????? Ch??i M?? H??nh C?? S???u Ch??u M??? Schleich 14727', 'do-choi-mo-hinh-ca-sau-chau-my-schleich-14727',
'product36.jpg,product36-1.jpg,product36-2.jpg,product36-3.jpg,product36-4.jpg,product36-5.jpg,product36-6.jpg,product36-7.jpg,product36-8.jpg,product36-9.jpg', '????? Ch??i M?? H??nh C?? S???u 
Ch??u M??? Schleich 14727 ???????c l??m t??? nh???a cao c???p tu??n th??? c??c quy ?????nh ch??u ??u (EN71) v?? ?????t ti??u chu???n qu???c t??? IS0 8124 n??n ho??n to??n kh??ng ch???a c??c ch???t ?????c h???i g??y h???i cho tr???. S???n ph???m c?? thi???t k??? an to??n, b??? m???t nh???n kh??ng g??c c???nh v?? kh??ng l??m tr???y x?????c da b?? khi c???m, n???m.', 
'1', '3', '1', '3', '20', '148.22');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, '????? Ch??i M?? H??nh Hot Toys Cosb(S) - War Machine Mark III - 252', 'do-choi-mo-hinh-hot-toys-cosb(s)-war-machine-mark-iii-252',
'product44.jpg,product44-1.jpg,product44-2.jpg,product44-3.jpg,product44-4.jpg,product44-5.jpg,product44-6.jpg,product44-7.jpg,product44-8.jpg,product44-9.jpg', '????? Ch??i M?? H??nh Hot Toys Cosb(S) - War Machine Mark III - 252 l?? ????? ch??i m?? ph???ng d??ng v??? nh??n v???t War Machine Mark III l?? m???t si??u anh h??ng xu???t hi???n trong truy???n tranh ???????c xu???t b???n b???i Marvel Comics. S???n ph???m c?? k??ch th?????c nh??? g???n, ti???n l???i ????? mang theo ????? ch??i b??n m??nh trong nh???ng chuy???n ??i xa.', 
'1', '3', '1', '3', '20', '111.22');

INSERT INTO `product` (`id`, `name_pd`, `url_name_pd`, `image_pd`, `describe_pd`, `material_pd`, `recommended_age`, `ideal_for`, `species_pd`, `amount_pd`, `price_pd`) VALUES (NULL, '????? Ch??i M?? H??nh Funko Pop Star Wars Rogue One - C2-B5 - 10464', 'do-choi-mo-hinh-funko-pop-star-wars-rogue-one-c2-b5-10464',
'product45.jpg,product45-1.jpg,product45-2.jpg,product45-3.jpg,product45-4.jpg,product45-5.jpg,product45-6.jpg,product45-7.jpg,product45-8.jpg,product45-9.jpg', '????? Ch??i M?? H??nh Funko Pop Star Wars Rogue One - C2-B5 - 10464 l?? ????? ch??i m?? ph???ng d??ng v??? nh??n v???t C2-B5 m???t ng?????i m??y v??i h??nh d??ng l?? m???t. S???n ph???m c?? k??ch th?????c nh??? g???n, ti???n l???i ????? mang theo ????? ch??i b??n m??nh trong nh???ng chuy???n ??i xa. C?? r???t nhi???u m???u nh??n v???t, t??? nh??n v???t Disney cho ?????n nh???ng movie hay game hot nh???t hi???n nay.', 
'1', '3', '3', '3', '20', '250.22');


INSERT INTO `order_product` (`id`, `id_account`, `created_date`, `date_of_delivery`, `address`,
`phone_number`, `pay`) VALUES (NULL, '1', '2019-07-11 00:00:00', NULL, '1 / ??. NG?? QUY???N / Q.S??N
TR?? / TP.???? N???NG', '01284645528', '0');
INSERT INTO `order_details` (`id`, `id_order`, `id_product`, `amount`) VALUES (NULL, '1', '1', '1');
INSERT INTO `order_product` (`id`, `id_account`, `created_date`, `date_of_delivery`, `address`,
`phone_number`, `pay`) VALUES (NULL, '2', '2019-07-12 00:00:00', NULL, 'S??? 35 / Q.Thanh ????o So??i',
'012465484', '0');
INSERT INTO `order_details` (`id`, `id_order`, `id_product`, `amount`) VALUES (NULL, '2', '6', '2');

INSERT INTO `pd_comments` (`id`, `id_pd`, `id_account`, `comment_content`, `status`) VALUES (NULL,
'1', '2', '????? d??ng ?????p, in r?? n??t, ??p c???n th???n, c???t g??c nh???n an to??n cho tr???. M??nh mua d???y Ti???ng Anh cho
tr??? M???m Non r???t th??ch. ???ng h??? shop l??u d??i. Mong shop c?? th??m nhi???u sp cho gi???ng d???y Ti???ng Anh cho
tr???', '0');
INSERT INTO `pd_comments` (`id`, `id_pd`, `id_account`, `comment_content`, `status`) VALUES (NULL,
'2', '3', 'D??ng s???n ph???m ????? ch??i th??ng minh n??y b???n th??n m th???y ??ang r???t ???????c quan t??m. M??nh c??ng
mu???n t??m cho con m??nh nh???ng s???n ph???m ph?? h???p cho ????? tu???i. C???m ??n nh??n vi??n shop ???? t?? v???n r???t
nhi???t t??nh ????? m??nh mua nh???ng s???n ph???m ??ng ?? nh???t', '0');
INSERT INTO `pd_comments` (`id`, `id_pd`, `id_account`, `comment_content`, `status`) VALUES (NULL,
'3', '4', 'Ch??? shop c?? t??m nhi???t t??nh v?? y??u tr??? ???', '0');
INSERT INTO `pd_comments` (`id`, `id_pd`, `id_account`, `comment_content`, `status`) VALUES (NULL,
'4', '5', 'Ba m??? c?? th??? cho b?? tham kh???o clip l???p gh??p robot Victorion t???i ????y ???, c??c chi ti???t c???c d??? th??o l???p
v?? s??? l?????ng t???i shop kh??ng c??n nhi???u ???', '0');
INSERT INTO `pd_comments` (`id`, `id_pd`, `id_account`, `comment_content`, `status`) VALUES (NULL,
'5', '2', 'Set 12 b?? Pony size 7 cm clear stock gi?? ch??? 155k freeship . ?????m b???o c??c b?? g??i s??? th??ch m?? ?????y.
', '0');
INSERT INTO `pd_comments` (`id`, `id_pd`, `id_account`, `comment_content`, `status`) VALUES (NULL,
'6', '1', 'Bao g???m 12 n??ng Pony xinh ?????p, nh??? nh???n xinh x???n v???i c??c ki???u t???o d??ng kh??c nhau, m??u s???c
sinh ?????ng s??? l?? m??n qu?? tuy???t v???i cho t???t c??? c??c con!', '0');
INSERT INTO `pd_comments` (`id`, `id_pd`, `id_account`, `comment_content`, `status`) VALUES (NULL,
'7', '4', 'Nhi???u ba m??? inbox h???i shop k??ch th?????c th???t c???a b???n robot t???ng, r???i li???u b?? c?? ch??i ??c kh??ng ',
'0');


?>