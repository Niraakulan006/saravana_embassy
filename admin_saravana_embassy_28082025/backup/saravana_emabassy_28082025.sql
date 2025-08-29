

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



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
) ENGINE=InnoDB AUTO_INCREMENT=573 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('568','2025-08-28 10:12:25','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('569','2025-08-28 10:13:14','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('570','2025-08-28 10:13:39','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('571','2025-08-28 10:14:43','2025-08-28 10:16:02','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');

INSERT INTO saravana_embassy_login (id, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('572','2025-08-28 10:16:06','0000-00-00 00:00:00','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','Windows NT DESKTOP-QI6H2EA 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','0');


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
  `admin` int(100) NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO saravana_embassy_user (id, created_date_time, creator, creator_name, bill_company_id, user_id, name, lower_case_name, mobile_number, type, role_id, role_name, email, username, password, admin, deleted) VALUES ('4','2025-08-21 18:47:36','56564e46556c38794e7a41314d6a41794e4441784d7a67784d3138774d513d3d','55334a706332396d64486468636d5636','5130394e5545464f575638794d5441344d6a41794e5441314e4451784e4638774d513d3d','4d6a45774f4449774d6a55774e6a51334d7a5a664d44453d','55334a706332396d64486468636d5636','63334a706332396d64486468636d5636','4f5467314e6a67344e7a55324e773d3d','553356775a584967515752746157343d','4d6a45774f4449774d6a55774e6a45794d5452664d44453d','553356775a584967515752746157343d','63334a706332396d64486468636d56365147647459576c734c6d4e7662513d3d','55334a706332396d64486468636d5636','51575274615734784d6a4e41','1','0');
