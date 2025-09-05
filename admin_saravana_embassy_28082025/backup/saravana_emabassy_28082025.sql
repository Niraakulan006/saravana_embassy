

CREATE TABLE `saravana_embassy_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `agent_id` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `mobile_number` mediumtext NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_agent (id, created_date_time, creator, creator_name, bill_company_id, agent_id, name, lower_case_name, mobile_number, deleted) VALUES ('2','2025-08-28 15:10:16','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d6a67774f4449774d6a55774d7a45774d545a664d44493d','5a475a7a5a475a6d5a475a6b63773d3d','5a475a7a5a475a6d5a475a6b63773d3d','4534535345','0');


CREATE TABLE `saravana_embassy_attribute` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `attribute_id` mediumtext NOT NULL,
  `category_id` mediumtext NOT NULL,
  `attribute_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_attribute (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_name, lower_case_name, deleted) VALUES ('13','2025-08-29 10:32:05','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d6a6b774f4449774d6a55784d444d794d4456664d544d3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','6447567a64413d3d','6447567a64413d3d','0');

INSERT INTO saravana_embassy_attribute (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_name, lower_case_name, deleted) VALUES ('14','2025-09-01 15:19:50','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d4445774f5449774d6a55774d7a45354e5442664d54513d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','63326c365a513d3d','63326c365a513d3d','0');

INSERT INTO saravana_embassy_attribute (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_name, lower_case_name, deleted) VALUES ('15','2025-09-03 10:24:49','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','5533526863673d3d','6333526863673d3d','0');

INSERT INTO saravana_embassy_attribute (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_name, lower_case_name, deleted) VALUES ('16','2025-09-03 10:24:49','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449304e446c664d54593d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','5132397362335679','5932397362335679','0');

INSERT INTO saravana_embassy_attribute (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_name, lower_case_name, deleted) VALUES ('17','2025-09-03 10:24:49','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','55326c365a513d3d','63326c365a513d3d','0');


CREATE TABLE `saravana_embassy_attribute_value` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `attribute_id` mediumtext NOT NULL,
  `category_id` mediumtext NOT NULL,
  `attribute_value` mediumtext NOT NULL,
  `attribute_value_id` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_attribute_value (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_value, attribute_value_id, lower_case_name, deleted) VALUES ('20','2025-08-29 10:33:02','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d6a6b774f4449774d6a55784d444d794d4456664d544d3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4d54497a4d773d3d','4d6a6b774f4449774d6a55784d444d7a4d444e664d6a413d','4d54497a4d773d3d','0');

INSERT INTO saravana_embassy_attribute_value (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_value, attribute_value_id, lower_case_name, deleted) VALUES ('21','2025-08-29 10:37:43','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d6a6b774f4449774d6a55784d444d794d4456664d544d3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4e44497a4e44493d','4d6a6b774f4449774d6a55784d444d334e444e664d6a453d','4e44497a4e44493d','1');

INSERT INTO saravana_embassy_attribute_value (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_value, attribute_value_id, lower_case_name, deleted) VALUES ('22','2025-08-29 10:38:46','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d6a6b774f4449774d6a55784d444d794d4456664d544d3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4e445530','4d6a6b774f4449774d6a55784d444d344e445a664d6a493d','4e445530','0');

INSERT INTO saravana_embassy_attribute_value (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_value, attribute_value_id, lower_case_name, deleted) VALUES ('23','2025-09-01 15:21:47','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d4445774f5449774d6a55774d7a45354e5442664d54513d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4d7a493d','4d4445774f5449774d6a55774d7a49784e4464664d6a4d3d','4d7a493d','0');

INSERT INTO saravana_embassy_attribute_value (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_value, attribute_value_id, lower_case_name, deleted) VALUES ('24','2025-09-03 10:26:01','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4e53427a64474679','4d444d774f5449774d6a55784d4449324d444a664d6a513d','4e53427a64474679','0');

INSERT INTO saravana_embassy_attribute_value (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_value, attribute_value_id, lower_case_name, deleted) VALUES ('25','2025-09-03 10:26:01','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4e43427a64474679','4d444d774f5449774d6a55784d4449324d444a664d6a553d','4e43427a64474679','0');

INSERT INTO saravana_embassy_attribute_value (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_value, attribute_value_id, lower_case_name, deleted) VALUES ('26','2025-09-03 10:26:01','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d79427a64474679','4d444d774f5449774d6a55784d4449324d444a664d6a593d','4d79427a64474679','0');

INSERT INTO saravana_embassy_attribute_value (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_value, attribute_value_id, lower_case_name, deleted) VALUES ('27','2025-09-03 10:26:01','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449304e446c664d54593d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','643268706447553d','4d444d774f5449774d6a55784d4449324d444a664d6a633d','643268706447553d','0');

INSERT INTO saravana_embassy_attribute_value (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_value, attribute_value_id, lower_case_name, deleted) VALUES ('28','2025-09-03 10:26:01','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449304e446c664d54593d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','596d78685932733d','4d444d774f5449774d6a55784d4449324d444a664d6a673d','596d78685932733d','0');

INSERT INTO saravana_embassy_attribute_value (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_value, attribute_value_id, lower_case_name, deleted) VALUES ('29','2025-09-03 10:26:01','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4e54553d','4d444d774f5449774d6a55784d4449324d444a664d6a6b3d','4e54553d','0');

INSERT INTO saravana_embassy_attribute_value (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_value, attribute_value_id, lower_case_name, deleted) VALUES ('30','2025-09-03 10:26:01','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4e44513d','4d444d774f5449774d6a55784d4449324d444a664d7a413d','4e44513d','0');

INSERT INTO saravana_embassy_attribute_value (id, created_date_time, creator, creator_name, bill_company_id, attribute_id, category_id, attribute_value, attribute_value_id, lower_case_name, deleted) VALUES ('31','2025-09-03 10:26:01','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d7a493d','4d444d774f5449774d6a55784d4449324d444a664d7a453d','4d7a493d','0');


CREATE TABLE `saravana_embassy_brand` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `brand_id` mediumtext NOT NULL,
  `brand_name` mediumtext NOT NULL,
  `brand_image` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_brand (id, created_date_time, creator, creator_name, bill_company_id, brand_id, brand_name, brand_image, lower_case_name, deleted) VALUES ('5','2025-08-29 10:21:03','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d6a6b774f4449774d6a55784d4449784d444e664d44553d','6247633d','brand_image_02_09_2025_10_59_32','6247633d','0');

INSERT INTO saravana_embassy_brand (id, created_date_time, creator, creator_name, bill_company_id, brand_id, brand_name, brand_image, lower_case_name, deleted) VALUES ('6','2025-09-02 10:59:39','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d4449774f5449774d6a55784d4455354d7a6c664d44593d','5247467061326c75','brand_image_02_09_2025_10_59_44','5a47467061326c75','0');

INSERT INTO saravana_embassy_brand (id, created_date_time, creator, creator_name, bill_company_id, brand_id, brand_name, brand_image, lower_case_name, deleted) VALUES ('7','2025-09-02 10:59:59','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d4449774f5449774d6a55784d4455354e546c664d44633d','516d78315a53427a64474679','brand_image_02_09_2025_10_59_58','596d78315a53427a64474679','0');

INSERT INTO saravana_embassy_brand (id, created_date_time, creator, creator_name, bill_company_id, brand_id, brand_name, brand_image, lower_case_name, deleted) VALUES ('8','2025-09-02 15:40:38','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d4449774f5449774d6a55774d7a51774d7a68664d44673d','6447567a64413d3d','NULL','6447567a64413d3d','1');

INSERT INTO saravana_embassy_brand (id, created_date_time, creator, creator_name, bill_company_id, brand_id, brand_name, brand_image, lower_case_name, deleted) VALUES ('9','2025-09-02 15:42:00','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d4449774f5449774d6a55774d7a51794d4442664d446b3d','6332526d6332526d','NULL','6332526d6332526d','0');


CREATE TABLE `saravana_embassy_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `category_id` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `type` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `cover_image` mediumtext NOT NULL,
  `mobile_cover_image` mediumtext NOT NULL,
  `category_status` int(11) NOT NULL COMMENT '1 = Enabled,\r\n2 = Disabled',
  `meta_title` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `ordering` int(11) NOT NULL,
  `category_url` mediumtext NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, name, lower_case_name, type, description, cover_image, mobile_cover_image, category_status, meta_title, meta_keywords, meta_description, ordering, category_url, deleted) VALUES ('10','2025-08-28 11:38:19','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','6447567a64476c755a773d3d','6447567a64476c755a773d3d','NULL','','category_cover_image_02_09_2025_10_57_23.webp','NULL','1','NULL','NULL','NULL','1','6447567a64476c755a773d3d','0');

INSERT INTO saravana_embassy_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, name, lower_case_name, type, description, cover_image, mobile_cover_image, category_status, meta_title, meta_keywords, meta_description, ordering, category_url, deleted) VALUES ('11','2025-08-28 12:37:07','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d6a67774f4449774d6a55784d6a4d334d4464664d54453d','5532467959585a68626d45675257316959584e7a65584d3d','6332467959585a68626d45675a57316959584e7a65584d3d','NULL','','category_cover_image_02_09_2025_10_56_51.webp','NULL','1','5a475a7a5a47593d','NULL','5a484e6d6332526d63773d3d','2','6332467959585a68626d45745a57316959584e7a65584d3d','0');

INSERT INTO saravana_embassy_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, name, lower_case_name, type, description, cover_image, mobile_cover_image, category_status, meta_title, meta_keywords, meta_description, ordering, category_url, deleted) VALUES ('12','2025-08-28 14:58:58','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d6a67774f4449774d6a55774d6a55344e5468664d54493d','5a475a7a5a47593d','5a475a7a5a47593d','','','.webp','','1','','','','3','','1');

INSERT INTO saravana_embassy_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, name, lower_case_name, type, description, cover_image, mobile_cover_image, category_status, meta_title, meta_keywords, meta_description, ordering, category_url, deleted) VALUES ('13','2025-09-03 10:24:03','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','5257786c59335279623235705979424a6447567463773d3d','5a57786c5933527962323570597942706447567463773d3d','NULL','','category_cover_image_03_09_2025_10_24_02.webp','NULL','1','5257786c59335279623235705979424a6447567463773d3d','5257786c59335279623235705979424a6447567463773d3d','5257786c59335279623235705979424a6447567463773d3d','3','5a57786c5933527962323570597931706447567463773d3d','0');


CREATE TABLE `saravana_embassy_company` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `company_id` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `gst_number` mediumtext NOT NULL,
  `address` mediumtext NOT NULL,
  `city` mediumtext NOT NULL,
  `district` mediumtext NOT NULL,
  `state` mediumtext NOT NULL,
  `pincode` mediumtext NOT NULL,
  `mobile_number` mediumtext NOT NULL,
  `others_city` mediumtext NOT NULL,
  `primary_company` int(100) NOT NULL,
  `logo` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_company (id, created_date_time, creator, creator_name, company_id, name, lower_case_name, email, gst_number, address, city, district, state, pincode, mobile_number, others_city, primary_company, logo, deleted) VALUES ('2','2025-08-21 17:44:14','56564e46556c38794e7a41314d6a41794e4441784d7a67784d3138774d513d3d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','5532467959585a68626d45675257316959584e7a65513d3d','6332467959585a68626d45675a57316959584e7a65513d3d','6332467959585a68626d466c62574a6863334e355147647459576c734c6d4e7662513d3d','4d7a4e4251555647567a51304d4464454d56704c','63326c325957746863326c7a','','566d6c796457526f645735685a324679','5647467461577767546d466b64513d3d','4e6a49324d54497a','4f546b354f546b354f546b354f513d3d','','1','logo_02_09_2025_11_10_29.webp','0');


CREATE TABLE `saravana_embassy_customer` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `customer_type` mediumtext NOT NULL,
  `customer_id` mediumtext NOT NULL,
  `customer_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `address` mediumtext NOT NULL,
  `city` mediumtext NOT NULL,
  `district` mediumtext NOT NULL,
  `state` mediumtext NOT NULL,
  `country` mediumtext NOT NULL,
  `pincode` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `mobile_number` mediumtext NOT NULL,
  `others_city` mediumtext NOT NULL,
  `customer_details` mediumtext NOT NULL,
  `name_mobile_city` mediumtext NOT NULL,
  `wallet` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `drafted` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_customer (id, created_date_time, creator, creator_name, bill_company_id, customer_type, customer_id, customer_name, lower_case_name, address, city, district, state, country, pincode, password, mobile_number, others_city, customer_details, name_mobile_city, wallet, email, drafted, deleted) VALUES ('6','2025-08-30 09:55:53','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','3','4d7a41774f4449774d6a55774f5455314e544e664d44593d','5a3246755a584e6f63773d3d','5a3246755a584e6f63773d3d','4d5463784c7a49794c4342724c6d46356557467463475679645731686243427a64484a6c5a585173494774686448526861586c68634856795957303d','5132686c626d64686248426864485231','5132686c626d64686248426864485231','5647467461577767546d466b64513d3d','','4e6a49324d444178','','4d4467324e6a63324d5459794e773d3d','Chengalpattu','5a3246755a584e6f637a7869636a34784e7a45764d6a49734947737559586c35595731775a584a316257467349484e30636d566c6443776761324630644746706557467764584a6862547869636a3544614756755a3246736347463064485538596e492b5132686c626d646862484268644852314b455270633351754b547869636a3555595731706243424f5957523150474a795069424e62324a70624755674f6941774f4459324e7a59784e6a4933','5a3246755a584e6f6379416f4d4467324e6a63324d5459794e796b674c534244614756755a324673634746306448553d','0','5a3246755a584e6f6133567459584a6a5a3273354e30426e625746706243356a62773d3d','','0');

INSERT INTO saravana_embassy_customer (id, created_date_time, creator, creator_name, bill_company_id, customer_type, customer_id, customer_name, lower_case_name, address, city, district, state, country, pincode, password, mobile_number, others_city, customer_details, name_mobile_city, wallet, email, drafted, deleted) VALUES ('15','2025-09-02 16:41:52','NULL','5a3246755a584e6f','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','3','4d4449774f5449774d6a55774e4451784e544a664d54553d','5a3246755a584e6f','5a3246755a584e6f','4d5463784c7a49794c4342724c6d46356557467463475679645731686243427a64484a6c5a585173494774686448526861586c68634856795957303d','53326c7362476c3562323979','53324675626d6c35595774316257467961513d3d','5647467461577767546d466b64513d3d','5357356b6157453d','4e6a49324d444178','51575274615734784d6a4e41','4f4459324e7a59784e6a49334e513d3d','','5a3246755a584e6f50474a79506a45334d5338794d6977676179356865586c686258426c636e567459577767633352795a5756304c4342725958523059576c3559584231636d467450474a79506b74706247787065573976636a7869636a354c5957357561586c686133567459584a704943684561584e304c696b38596e492b5647467461577767546d466b64547869636a3467545739696157786c49446f674f4459324e7a59784e6a49334e513d3d','5a3246755a584e6f494367344e6a59334e6a45324d6a63314b53417449457470624778706557397663673d3d','0','5a3246755a584e6f6133567459584a6a5a3273354e30426e625746706243356a6232303d','','0');


CREATE TABLE `saravana_embassy_home_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `updated_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `position_name` mediumtext NOT NULL,
  `banner_image` mediumtext NOT NULL,
  `banner_position` mediumtext NOT NULL,
  `banner_category_id` mediumtext NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_home_banner (id, created_date_time, updated_date_time, creator, creator_name, position_name, banner_image, banner_position, banner_category_id, deleted) VALUES ('1','2025-08-30 12:36:33','2025-08-30 12:46:59','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','Desktop','desktop_home_banner_30_08_2025_12_39_13,desktop_home_banner_30_08_2025_12_39_33,desktop_home_banner_30_08_2025_12_46_56','2,1,3',',,','0');

INSERT INTO saravana_embassy_home_banner (id, created_date_time, updated_date_time, creator, creator_name, position_name, banner_image, banner_position, banner_category_id, deleted) VALUES ('2','2025-08-30 12:40:36','2025-08-30 12:40:36','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','Mobile','mobile_home_banner_30_08_2025_12_40_31','1','','0');


CREATE TABLE `saravana_embassy_login` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `login_date_time` mediumtext NOT NULL,
  `logout_date_time` mediumtext NOT NULL,
  `ip_address` mediumtext NOT NULL,
  `browser` mediumtext NOT NULL,
  `os_detail` mediumtext NOT NULL,
  `type` mediumtext NOT NULL,
  `user_id` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=597 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('568','2025-08-28 10:12:25','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('569','2025-08-28 10:13:14','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('570','2025-08-28 10:13:39','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('571','2025-08-28 10:14:43','2025-08-28 10:16:02','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('572','2025-08-28 10:16:06','2025-08-28 10:23:19','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('573','2025-08-28 10:23:20','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('574','2025-08-28 12:17:53','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('575','2025-08-29 09:19:08','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('576','2025-08-30 09:18:39','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('577','2025-09-01 12:24:45','2025-09-01 16:10:03','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('578','2025-09-01 16:10:06','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('579','2025-09-01 16:51:31','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('580','2025-09-02 09:18:09','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('581','2025-09-02 10:50:55','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('582','2025-09-02 11:10:18','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('583','2025-09-02 15:44:36','2025-09-02 15:44:36','::1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Customer','4d4449774f5449774d6a55774d7a51304d7a5a664d544d3d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('584','2025-09-02 15:48:46','2025-09-02 15:48:46','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Customer','4d4449774f5449774d6a55774d7a51344e445a664d54513d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('585','2025-09-02 16:05:13','2025-09-02 16:05:13','::1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Customer','4d4449774f5449774d6a55774d7a51344e445a664d54513d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('586','2025-09-02 16:05:26','2025-09-02 16:05:26','::1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Customer','4d4449774f5449774d6a55774d7a51344e445a664d54513d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('587','2025-09-02 16:06:07','2025-09-02 16:19:09','::1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Customer','4d4449774f5449774d6a55774d7a51344e445a664d54513d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('588','2025-09-02 16:19:21','2025-09-02 16:23:12','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Customer','4d4449774f5449774d6a55774d7a51344e445a664d54513d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('589','2025-09-02 16:23:42','2025-09-02 16:23:56','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Customer','4d4449774f5449774d6a55774d7a51344e445a664d54513d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('590','2025-09-02 16:30:05','2025-09-02 16:37:46','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Customer','4d4449774f5449774d6a55774d7a51344e445a664d54513d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('591','2025-09-02 16:37:55','2025-09-02 16:40:57','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Customer','4d4449774f5449774d6a55774d7a51344e445a664d54513d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('592','2025-09-02 16:41:52','2025-09-02 16:41:52','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Customer','4d4449774f5449774d6a55774e4451784e544a664d54553d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('593','2025-09-03 09:21:52','2025-09-03 14:47:25','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('594','2025-09-03 10:54:31','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('595','2025-09-03 15:40:31','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('596','2025-09-04 10:13:48','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');


CREATE TABLE `saravana_embassy_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` mediumtext NOT NULL,
  `content` mediumtext NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_mail (id, type, content, deleted) VALUES ('1','Registration','<!DOCTYPE html>
<html>

<head>
    <title>OTP Email</title>
</head>

<body>
    <h2>Your One-Time Password (OTP)</h2>
    <p>Hello,</p>
    <p>Please use the OTP below to proceed:</p>
    <div style="font-size:24px; font-weight:bold;">{OTP}</div>
    <p>This OTP will expire in 10 minutes.</p>
    <p>Regards,
        <br>{COMPANY}</p>
</body>

</html>','0');

INSERT INTO saravana_embassy_mail (id, type, content, deleted) VALUES ('2','Forgot_password','<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Password Reset OTP</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 0; }
        .container { background: #ffffff; max-width: 600px; margin: 30px auto; padding: 30px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .header { background-color: #d32f2f; color: white; padding: 20px; font-size: 22px; text-align: center; border-radius: 8px 8px 0 0; }
        .otp-box { font-size: 30px; font-weight: bold; color: #333; text-align: center; background: #f0f0f0; padding: 15px; margin: 20px 0; border-radius: 6px; letter-spacing: 3px; }
        .content { font-size: 16px; color: #444; line-height: 1.6; }
        .footer { font-size: 12px; color: #999; text-align: center; margin-top: 30px; }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">Reset Your Password</div>
        <div class="content">
            <p>Hello,</p>
            <p>We received a request to reset your password. Please use the OTP below to continue:</p>
            <div class="otp-box">{OTP}</div>
            <p>This code is valid for the next 10 minutes. If you didn’t request this, you can safely ignore this email.</p>
            <p>Regards,
                <br><strong>{COMPANY}</strong></p>
        </div>
    </div>
</body>

</html>','0');

INSERT INTO saravana_embassy_mail (id, type, content, deleted) VALUES ('3','Registration_success','<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Welcome to {COMPANY}</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: auto; background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .header { background-color: #4CAF50; color: white; text-align: center; padding: 20px; font-size: 24px; border-radius: 8px 8px 0 0; }
        .content { font-size: 16px; color: #444; line-height: 1.6; }
        .highlight { color: #4CAF50; font-weight: bold; }
        .footer { font-size: 12px; color: #999; text-align: center; margin-top: 30px; }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">Welcome to {COMPANY}!</div>
        <div class="content">
            <p>Hello <span class="highlight">{USER_NAME}</span>,</p>
            <p>Thank you for registering with <strong>{COMPANY}</strong>.</p>
            <p>We’re excited to have you on board. You can now explore our wide range of products and enjoy our exclusive deals.</p>
            <p>If you have any questions, feel free to contact us anytime.</p>
            <p>Happy Shopping!
                <br><strong>Team {COMPANY}</strong></p>
        </div>
    </div>
</body>

</html>','0');

INSERT INTO saravana_embassy_mail (id, type, content, deleted) VALUES ('4','Newsletter_subscribe','<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Subscription Confirmed</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 30px auto; background: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
        .header { background-color: #2196F3; color: #ffffff; text-align: center; padding: 20px; font-size: 22px; border-radius: 8px 8px 0 0; }
        .content { font-size: 16px; color: #444; line-height: 1.6; }
        .highlight { font-weight: bold; color: #2196F3; }
        .footer { font-size: 12px; color: #888; text-align: center; margin-top: 30px; }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">You're Subscribed!</div>
        <div class="content">
            <p>Hello <span class="highlight">{USER_EMAIL}</span>,</p>
            <p>Thank you for subscribing to the <strong>{COMPANY} Newsletter</strong>.</p>
            <p>We’ll keep you updated with our latest products, offers, and exciting announcements.</p>
            <p>Warm regards,
                <br><strong>Team {COMPANY}</strong></p>
        </div>
    </div>
</body>

</html>','0');


CREATE TABLE `saravana_embassy_meta_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `updated_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `meta_file_name` mediumtext NOT NULL,
  `meta_title` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_meta_tags (id, created_date_time, updated_date_time, creator, creator_name, meta_file_name, meta_title, meta_keywords, meta_description, deleted) VALUES ('1','2025-08-30 12:41:21','2025-08-30 12:41:28','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','login_page','6247396e6157346764476c306247553d','6247396e6157346761325635643239795a484d3d','6247396e61573467625756305953426b5a584e6a','0');

INSERT INTO saravana_embassy_meta_tags (id, created_date_time, updated_date_time, creator, creator_name, meta_file_name, meta_title, meta_keywords, meta_description, deleted) VALUES ('2','2025-09-02 09:23:54','2025-09-02 09:23:54','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','register_page','556d566e61584e305a5849676347466e5a513d3d','636d566e61584e305a58496761325635643239795a413d3d','636d566e61584e305a5849675a47567a59773d3d','0');

INSERT INTO saravana_embassy_meta_tags (id, created_date_time, updated_date_time, creator, creator_name, meta_file_name, meta_title, meta_keywords, meta_description, deleted) VALUES ('3','2025-09-02 09:24:21','2025-09-02 09:24:21','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','home','534739745a5342775957646c494852706447786c','614739745a5342725a586c3362334a6b63773d3d','614739745a53426b5a584e6a','0');


CREATE TABLE `saravana_embassy_otp_send_phone_numbers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send_date` date NOT NULL,
  `phone_number` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `otp_number` mediumtext NOT NULL,
  `otp_send_count` int(11) NOT NULL,
  `ip_address` mediumtext NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21270 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `saravana_embassy_product` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `product_id` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `url` mediumtext NOT NULL,
  `category_id` mediumtext NOT NULL,
  `brand_id` mediumtext NOT NULL,
  `product_type` mediumtext NOT NULL,
  `hsn_code` mediumtext NOT NULL,
  `product_tax` mediumtext NOT NULL,
  `video_url` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `meta_title` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `multiple_images` mediumtext NOT NULL,
  `ordering` mediumtext NOT NULL,
  `product_status` int(11) NOT NULL COMMENT '1 = Enabled,\r\n2 = Disabled',
  `views` mediumtext NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_product (id, created_date_time, creator, creator_name, bill_company_id, product_id, name, lower_case_name, url, category_id, brand_id, product_type, hsn_code, product_tax, video_url, description, meta_title, meta_keywords, meta_description, multiple_images, ordering, product_status, views, deleted) VALUES ('9','2025-08-30 11:02:09','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d7a41774f4449774d6a55784d5441794d446c664d446b3d','6432467a61476c755a79427459574e6f6157356c','6432467a61476c755a79427459574e6f6157356c','6432467a61476c755a79317459574e6f6157356c','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4d6a6b774f4449774d6a55784d4449784d444e664d44553d','3','4e4455324e773d3d','18%','NULL','5a4739755a513d3d','64476c306247567a','61325635643239795a484d3d','5a47567a59773d3d','multiple_image_30_08_2025_11_01_34$$$multiple_image_30_08_2025_11_01_40','1','1','','0');

INSERT INTO saravana_embassy_product (id, created_date_time, creator, creator_name, bill_company_id, product_id, name, lower_case_name, url, category_id, brand_id, product_type, hsn_code, product_tax, video_url, description, meta_title, meta_keywords, meta_description, multiple_images, ordering, product_status, views, deleted) VALUES ('10','2025-09-03 10:29:26','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449354d6a5a664d54413d','556d566b62576c7549485232','636d566b62576c7549485232','636d566b62576c754c585232','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d6a6b774f4449774d6a55784d4449784d444e664d44553d','3','4e4455324e773d3d','18%','NULL','556d566b62576c7549485232','556d566b62576c7549485232','556d566b62576c7549485232','556d566b62576c7549485232','multiple_image_03_09_2025_10_56_25','1','1','','0');

INSERT INTO saravana_embassy_product (id, created_date_time, creator, creator_name, bill_company_id, product_id, name, lower_case_name, url, category_id, brand_id, product_type, hsn_code, product_tax, video_url, description, meta_title, meta_keywords, meta_description, multiple_images, ordering, product_status, views, deleted) VALUES ('11','2025-09-03 10:31:12','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d444d784d544e664d54453d','556d566d636d6c6e5a584a6864473979','636d566d636d6c6e5a584a6864473979','636d566d636d6c6e5a584a6864473979','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d4449774f5449774d6a55784d4455354e546c664d44633d','3','','18%','NULL','556d566d636d6c6e5a584a6864473979','556d566d636d6c6e5a584a6864473979','556d566d636d6c6e5a584a6864473979','556d566d636d6c6e5a584a6864473979','multiple_image_03_09_2025_10_56_38','2','1','','0');


CREATE TABLE `saravana_embassy_product_combination` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `product_combination_id` mediumtext NOT NULL,
  `product_id` mediumtext NOT NULL,
  `category_id` mediumtext NOT NULL,
  `attribute_id` mediumtext NOT NULL,
  `attribute_id_value` mediumtext NOT NULL,
  `quantity` mediumtext NOT NULL,
  `actual_price` mediumtext NOT NULL,
  `attribute_status` mediumtext NOT NULL,
  `is_default` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=933 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_product_combination (id, created_date_time, creator, creator_name, bill_company_id, product_combination_id, product_id, category_id, attribute_id, attribute_id_value, quantity, actual_price, attribute_status, is_default, deleted) VALUES ('923','2025-08-30 11:02:09','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','NULL','4d7a41774f4449774d6a55784d5441794d446c664d446b3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4d6a6b774f4449774d6a55784d444d794d4456664d544d3d','4d6a6b774f4449774d6a55784d444d344e445a664d6a493d','2','45','0','1','1');

INSERT INTO saravana_embassy_product_combination (id, created_date_time, creator, creator_name, bill_company_id, product_combination_id, product_id, category_id, attribute_id, attribute_id_value, quantity, actual_price, attribute_status, is_default, deleted) VALUES ('924','2025-08-30 13:06:27','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','NULL','4d7a41774f4449774d6a55784d5441794d446c664d446b3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4d6a6b774f4449774d6a55784d444d794d4456664d544d3d','4d6a6b774f4449774d6a55784d444d7a4d444e664d6a413d','3','55','0','0','1');

INSERT INTO saravana_embassy_product_combination (id, created_date_time, creator, creator_name, bill_company_id, product_combination_id, product_id, category_id, attribute_id, attribute_id_value, quantity, actual_price, attribute_status, is_default, deleted) VALUES ('925','2025-08-30 13:17:15','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','NULL','4d7a41774f4449774d6a55784d5441794d446c664d446b3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4d6a6b774f4449774d6a55784d444d794d4456664d544d3d','4d6a6b774f4449774d6a55784d444d7a4d444e664d6a413d','33','55','0','0','1');

INSERT INTO saravana_embassy_product_combination (id, created_date_time, creator, creator_name, bill_company_id, product_combination_id, product_id, category_id, attribute_id, attribute_id_value, quantity, actual_price, attribute_status, is_default, deleted) VALUES ('926','2025-08-30 13:18:42','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','NULL','4d7a41774f4449774d6a55784d5441794d446c664d446b3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4d6a6b774f4449774d6a55784d444d794d4456664d544d3d','4d6a6b774f4449774d6a55784d444d344e445a664d6a493d','22','45','available','1','0');

INSERT INTO saravana_embassy_product_combination (id, created_date_time, creator, creator_name, bill_company_id, product_combination_id, product_id, category_id, attribute_id, attribute_id_value, quantity, actual_price, attribute_status, is_default, deleted) VALUES ('927','2025-08-30 15:28:07','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','NULL','4d7a41774f4449774d6a55784d5441794d446c664d446b3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4d6a6b774f4449774d6a55784d444d794d4456664d544d3d','4d6a6b774f4449774d6a55784d444d7a4d444e664d6a413d','13','55','available','0','0');

INSERT INTO saravana_embassy_product_combination (id, created_date_time, creator, creator_name, bill_company_id, product_combination_id, product_id, category_id, attribute_id, attribute_id_value, quantity, actual_price, attribute_status, is_default, deleted) VALUES ('928','2025-09-03 10:29:26','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','NULL','4d444d774f5449774d6a55784d4449354d6a5a664d54413d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d,4d444d774f5449774d6a55784d4449304e446c664d54593d,4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449324d444a664d7a453d,4d444d774f5449774d6a55784d4449324d444a664d6a673d,4d444d774f5449774d6a55784d4449324d444a664d6a593d','2','12000','available','1','0');

INSERT INTO saravana_embassy_product_combination (id, created_date_time, creator, creator_name, bill_company_id, product_combination_id, product_id, category_id, attribute_id, attribute_id_value, quantity, actual_price, attribute_status, is_default, deleted) VALUES ('929','2025-09-03 10:29:26','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','NULL','4d444d774f5449774d6a55784d4449354d6a5a664d54413d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d,4d444d774f5449774d6a55784d4449304e446c664d54593d,4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449324d444a664d7a413d,4d444d774f5449774d6a55784d4449324d444a664d6a633d,4d444d774f5449774d6a55784d4449324d444a664d6a553d','2','20000','available','0','0');

INSERT INTO saravana_embassy_product_combination (id, created_date_time, creator, creator_name, bill_company_id, product_combination_id, product_id, category_id, attribute_id, attribute_id_value, quantity, actual_price, attribute_status, is_default, deleted) VALUES ('930','2025-09-03 10:29:26','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','NULL','4d444d774f5449774d6a55784d4449354d6a5a664d54413d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d,4d444d774f5449774d6a55784d4449304e446c664d54593d,4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449324d444a664d6a6b3d,4d444d774f5449774d6a55784d4449324d444a664d6a673d,4d444d774f5449774d6a55784d4449324d444a664d6a513d','2','30000','available','0','0');

INSERT INTO saravana_embassy_product_combination (id, created_date_time, creator, creator_name, bill_company_id, product_combination_id, product_id, category_id, attribute_id, attribute_id_value, quantity, actual_price, attribute_status, is_default, deleted) VALUES ('931','2025-09-03 10:31:12','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','NULL','4d444d774f5449774d6a55784d444d784d544e664d54453d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d,4d444d774f5449774d6a55784d4449304e446c664d54593d,4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449324d444a664d7a453d,4d444d774f5449774d6a55784d4449324d444a664d6a673d,4d444d774f5449774d6a55784d4449324d444a664d6a553d','3','15000','available','1','0');

INSERT INTO saravana_embassy_product_combination (id, created_date_time, creator, creator_name, bill_company_id, product_combination_id, product_id, category_id, attribute_id, attribute_id_value, quantity, actual_price, attribute_status, is_default, deleted) VALUES ('932','2025-09-03 10:31:12','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','NULL','4d444d774f5449774d6a55784d444d784d544e664d54453d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d,4d444d774f5449774d6a55784d4449304e446c664d54593d,4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449324d444a664d6a6b3d,4d444d774f5449774d6a55784d4449324d444a664d6a633d,4d444d774f5449774d6a55784d4449324d444a664d6a513d','3','25000','available','0','0');


CREATE TABLE `saravana_embassy_product_query` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `query_id` mediumtext NOT NULL,
  `product_id` mediumtext NOT NULL,
  `question` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_product_query (id, created_date_time, creator, creator_name, bill_company_id, query_id, product_id, question, lower_case_name, deleted) VALUES ('5','2025-09-01 13:23:42','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d4445774f5449774d6a55774d54497a4e444a664d44553d','4d7a41774f4449774d6a55784d5441794d446c664d446b3d','64326876494746795a5342356233556764326876494746795a5342356233567a','64326876494746795a5342356233556764326876494746795a5342356233567a','0');

INSERT INTO saravana_embassy_product_query (id, created_date_time, creator, creator_name, bill_company_id, query_id, product_id, question, lower_case_name, deleted) VALUES ('6','2025-09-01 13:23:42','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d4445774f5449774d6a55774d54497a4e444e664d44593d','4d7a41774f4449774d6a55784d5441794d446c664d446b3d','61473933494746795a5342356233556761473933494746795a53423562335668','61473933494746795a5342356233556761473933494746795a53423562335668','0');


CREATE TABLE `saravana_embassy_product_variety` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `product_variety_id` mediumtext NOT NULL,
  `product_id` mediumtext NOT NULL,
  `category_id` mediumtext NOT NULL,
  `attribute_id` mediumtext NOT NULL,
  `attribute_id_value` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=763 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('746','2025-08-30 11:02:09','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d7a41774f4449774d6a55784d5441794d446c664e7a5132','4d7a41774f4449774d6a55784d5441794d446c664d446b3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4d6a6b774f4449774d6a55784d444d794d4456664d544d3d','4d6a6b774f4449774d6a55784d444d344e445a664d6a493d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('747','2025-08-30 13:06:27','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d7a41774f4449774d6a55774d5441324d6a64664e7a5133','4d7a41774f4449774d6a55784d5441794d446c664d446b3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4d6a6b774f4449774d6a55784d444d794d4456664d544d3d','4d6a6b774f4449774d6a55784d444d7a4d444e664d6a413d','1');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('748','2025-08-30 15:28:07','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d7a41774f4449774d6a55774d7a49344d4464664e7a5134','4d7a41774f4449774d6a55784d5441794d446c664d446b3d','4d6a67774f4449774d6a55784d544d344d546c664d54413d','4d6a6b774f4449774d6a55784d444d794d4456664d544d3d','4d6a6b774f4449774d6a55784d444d7a4d444e664d6a413d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('749','2025-09-03 10:29:26','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449354d6a5a664e7a5135','4d444d774f5449774d6a55784d4449354d6a5a664d54413d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d','4d444d774f5449774d6a55784d4449324d444a664d6a593d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('750','2025-09-03 10:29:26','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449354d6a5a664e7a5577','4d444d774f5449774d6a55784d4449354d6a5a664d54413d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d','4d444d774f5449774d6a55784d4449324d444a664d6a553d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('751','2025-09-03 10:29:26','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449354d6a5a664e7a5578','4d444d774f5449774d6a55784d4449354d6a5a664d54413d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d','4d444d774f5449774d6a55784d4449324d444a664d6a513d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('752','2025-09-03 10:29:26','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449354d6a5a664e7a5579','4d444d774f5449774d6a55784d4449354d6a5a664d54413d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54593d','4d444d774f5449774d6a55784d4449324d444a664d6a673d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('753','2025-09-03 10:29:26','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449354d6a5a664e7a557a','4d444d774f5449774d6a55784d4449354d6a5a664d54413d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54593d','4d444d774f5449774d6a55784d4449324d444a664d6a633d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('754','2025-09-03 10:29:26','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449354d6a5a664e7a5530','4d444d774f5449774d6a55784d4449354d6a5a664d54413d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449324d444a664d7a453d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('755','2025-09-03 10:29:26','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449354d6a5a664e7a5531','4d444d774f5449774d6a55784d4449354d6a5a664d54413d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449324d444a664d7a413d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('756','2025-09-03 10:29:26','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d4449354d6a64664e7a5532','4d444d774f5449774d6a55784d4449354d6a5a664d54413d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449324d444a664d6a6b3d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('757','2025-09-03 10:31:12','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d444d784d544e664e7a5533','4d444d774f5449774d6a55784d444d784d544e664d54453d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d','4d444d774f5449774d6a55784d4449324d444a664d6a553d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('758','2025-09-03 10:31:12','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d444d784d544e664e7a5534','4d444d774f5449774d6a55784d444d784d544e664d54453d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54553d','4d444d774f5449774d6a55784d4449324d444a664d6a513d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('759','2025-09-03 10:31:12','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d444d784d544e664e7a5535','4d444d774f5449774d6a55784d444d784d544e664d54453d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54593d','4d444d774f5449774d6a55784d4449324d444a664d6a673d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('760','2025-09-03 10:31:12','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d444d784d544e664e7a5977','4d444d774f5449774d6a55784d444d784d544e664d54453d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54593d','4d444d774f5449774d6a55784d4449324d444a664d6a633d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('761','2025-09-03 10:31:12','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d444d784d544e664e7a5978','4d444d774f5449774d6a55784d444d784d544e664d54453d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449324d444a664d7a453d','0');

INSERT INTO saravana_embassy_product_variety (id, created_date_time, creator, creator_name, bill_company_id, product_variety_id, product_id, category_id, attribute_id, attribute_id_value, deleted) VALUES ('762','2025-09-03 10:31:12','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','4e54557a4d7a52684e7a41324d7a4d794d7a6b325a4459304e4467324e4459344e6a4d325a4455324d7a593d','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d444d774f5449774d6a55784d444d784d544e664e7a5979','4d444d774f5449774d6a55784d444d784d544e664d54453d','4d444d774f5449774d6a55784d4449304d444e664d544d3d','4d444d774f5449774d6a55784d4449304e446c664d54633d','4d444d774f5449774d6a55784d4449324d444a664d6a6b3d','0');


CREATE TABLE `saravana_embassy_promo_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `discount_code_id` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `price` mediumtext NOT NULL,
  `expiry_date` date NOT NULL,
  `minimum_order_amount` double NOT NULL,
  `discount_upto_value` double NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_promo_code (id, created_date_time, creator, creator_name, discount_code_id, name, lower_case_name, price, expiry_date, minimum_order_amount, discount_upto_value, deleted) VALUES ('3','2025-08-28 16:06:41','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','4d6a67774f4449774d6a55774e4441324e4446664d444d3d','6447567a64476c755a773d3d','6447567a64476c755a773d3d','10','0000-00-00','2000','0','1');

INSERT INTO saravana_embassy_promo_code (id, created_date_time, creator, creator_name, discount_code_id, name, lower_case_name, price, expiry_date, minimum_order_amount, discount_upto_value, deleted) VALUES ('4','2025-08-28 16:09:10','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','4d6a67774f4449774d6a55774e4441354d5446664d44513d','5532467959585a68626d45675257316959584e7a','6332467959585a68626d45675a57316959584e7a','5%','2025-08-30','2000','3000','0');

INSERT INTO saravana_embassy_promo_code (id, created_date_time, creator, creator_name, discount_code_id, name, lower_case_name, price, expiry_date, minimum_order_amount, discount_upto_value, deleted) VALUES ('5','2025-08-28 16:13:13','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','4d6a67774f4449774d6a55774e44457a4d544e664d44553d','6447567a64476c755a773d3d','6447567a64476c755a773d3d','10','2025-09-04','100','0','0');


CREATE TABLE `saravana_embassy_role` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `role_id` mediumtext NOT NULL,
  `role_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `type` mediumtext NOT NULL,
  `admin` mediumtext NOT NULL,
  `access_pages` mediumtext NOT NULL,
  `access_page_actions` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `saravana_embassy_role_permission` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `role_permission_id` mediumtext NOT NULL,
  `role_id` mediumtext NOT NULL,
  `module` mediumtext NOT NULL,
  `module_actions` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `saravana_embassy_user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `user_id` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `mobile_number` mediumtext NOT NULL,
  `type` mediumtext NOT NULL,
  `role_id` mediumtext NOT NULL,
  `role_name` mediumtext NOT NULL,
  `email` mediumtext NOT NULL,
  `username` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `is_technician` mediumtext NOT NULL,
  `admin` int(100) NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_user (id, created_date_time, creator, creator_name, bill_company_id, user_id, name, lower_case_name, mobile_number, type, role_id, role_name, email, username, password, is_technician, admin, deleted) VALUES ('4','2025-08-21 18:47:36','56564e46556c38794e7a41314d6a41794e4441784d7a67784d3138774d513d3d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','63334a706332396d64486468636d5636','4f5467314e6a67344e7a55324e773d3d','553356775a584967515752746157343d','4d6a45774f4449774d6a55774e6a45794d5452664d44453d','553356775a584967515752746157343d','63334a706332396d64486468636d56365147647459576c734c6d4e7662513d3d','55334a706332396d64486468636d5636','51575274615734784d6a4e41','','1','0');
