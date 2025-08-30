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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;