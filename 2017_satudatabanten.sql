/*
Navicat MariaDB Data Transfer

Source Server         : MariaDB PHP5.6
Source Server Version : 100125
Source Host           : localhost:3308
Source Database       : 2017_satudatabanten

Target Server Type    : MariaDB
Target Server Version : 100125
File Encoding         : 65001

Date: 2017-12-13 13:49:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for about
-- ----------------------------
DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(5000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of about
-- ----------------------------
INSERT INTO `about` VALUES ('1', 'Tentang Kami', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas scelerisque vel arcu et pulvinar. Integer non felis nulla. Duis sed felis pellentesque, mattis nisi at, imperdiet urna. Aliquam mi diam, lobortis eu vehicula eget, scelerisque vitae lacus. Praesent consectetur ligula tristique interdum porta. Aliquam erat volutpat. Sed efficitur enim magna. Vestibulum sagittis ipsum sit amet imperdiet condimentum.\r\n\r\nSuspendisse eget tincidunt neque, pulvinar convallis lorem. Integer volutpat luctus lacus tincidunt venenatis. Fusce nec porttitor erat. Vivamus vulputate sodales blandit. Maecenas pharetra libero justo, ut vestibulum elit aliquet nec. Sed odio lectus, molestie a auctor id, eleifend sed nibh. Aliquam pellentesque iaculis consequat. Nullam et sem diam. Ut at eros dui. Mauris bibendum porttitor tortor, at sagittis tortor iaculis a. Praesent vitae pretium enim, at efficitur erat. Nullam tincidunt ut lectus sed viverra. </p><p>Praesent quis mollis tortor.\r\n\r\nSed egestas, urna at tincidunt feugiat, felis ipsum posuere turpis, nec auctor ligula ex eget nunc. Aenean interdum vulputate suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quam nisl, semper et eros id, lacinia ultrices felis. Fusce porta velit eget arcu commodo, non efficitur neque fringilla. Vestibulum a tincidunt est, eget eleifend lorem. Morbi volutpat bibendum dui. Praesent turpis nisi, vestibulum ut auctor ac, pulvinar eget nulla. Donec eleifend ex commodo, tempor libero non, bibendum turpis. Ut malesuada tempor ante, ut elementum ipsum gravida eget. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut id purus dolor. Vivamus eget placerat nisi. Etiam eu pretium urna. Mauris venenatis nisl vel elit malesuada rhoncus. Nam eu laoreet leo.\r\n\r\nMaecenas porta eu nulla quis volutpat. Aenean pretium massa vitae metus fringilla, a dignissim enim auctor. Etiam sit amet rutrum tellus. Pellentesque porttitor a dui nec pharetra. Proin sed posuere tellus, a pretium erat. </p><p>Donec nibh metus, consequat sed metus non, porttitor vestibulum nisl. Nulla feugiat nibh sed velit semper porta. Vestibulum et est arcu. Curabitur vitae lectus eu felis interdum eleifend nec pellentesque tellus.\r\n\r\nEtiam ullamcorper, magna eget vestibulum ultrices, ligula dolor volutpat elit, a posuere risus leo at lectus. Cras quis sapien ac mi ultricies ultrices nec consequat orci. Ut eget lectus at purus consectetur elementum nec sit amet nunc. Etiam laoreet tincidunt mi, ac semper magna. Phasellus iaculis libero in libero consequat, a accumsan urna viverra. Suspendisse mollis ligula a iaculis ultricies. </p><p>Nulla quis nisl ut nulla condimentum dictum sit amet ut enim. Fusce sed nunc consectetur, venenatis libero ut, vulputate lacus. Phasellus posuere pharetra nulla, in accumsan libero condimentum eget. Aenean rutrum hendrerit felis eget vestibulum. Fusce sapien diam, viverra eget ornare eget, pellentesque quis enim. Donec vel ante eu metus dignissim tempus. Aliquam vehicula neque eget felis scelerisque, eu malesuada ligula faucibus. Sed ultrices diam ex, quis lacinia lorem posuere eu.</p>', 'about.jpg', '2017-12-04 13:59:28', '2017-12-06 09:33:35');

-- ----------------------------
-- Table structure for back_menus
-- ----------------------------
DROP TABLE IF EXISTS `back_menus`;
CREATE TABLE `back_menus` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_parent_id` int(11) DEFAULT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `menu_url` varchar(255) DEFAULT NULL,
  `menu_sort` int(11) DEFAULT NULL,
  `menu_icon` varchar(255) DEFAULT NULL,
  `menu_create_date` datetime DEFAULT NULL,
  `menu_create_by` int(11) DEFAULT NULL,
  `menu_update_date` datetime DEFAULT NULL,
  `menu_update_by` int(11) DEFAULT NULL,
  `menu_status` int(11) DEFAULT NULL,
  `menu_log_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of back_menus
-- ----------------------------
INSERT INTO `back_menus` VALUES ('1', '0', 'Beranda', 'javascript:void(0);', '1', 'fa fa-dashboard', '2017-10-24 17:07:34', '1', null, null, '1', null);
INSERT INTO `back_menus` VALUES ('2', '1', 'Dasbor', 'home/dashboard', '1', 'fa fa-chevron-circle-right', '2017-10-24 17:07:34', '1', null, null, '1', null);
INSERT INTO `back_menus` VALUES ('3', '0', 'Dataset', 'dataset', '2', 'fa fa-cogs', '2017-10-24 17:07:34', '1', null, null, '1', null);
INSERT INTO `back_menus` VALUES ('4', '0', 'Data Master', 'javascript:void(0);', '3', 'fa fa-database', '2017-10-24 17:07:34', '1', null, null, '1', null);
INSERT INTO `back_menus` VALUES ('5', '4', 'Organisasi', 'master/organizations', '1', 'fa fa-chevron-circle-right', '2017-10-24 17:07:34', '1', null, null, '1', null);
INSERT INTO `back_menus` VALUES ('6', '4', 'Grup', 'master/groups', '2', 'fa fa-chevron-circle-right', '2017-10-24 17:07:34', '1', null, null, '1', null);
INSERT INTO `back_menus` VALUES ('7', '0', 'Pengaturan', 'javascript:void(0);', '4', 'fa fa-sliders', '2017-10-24 17:07:34', '1', null, null, '1', null);
INSERT INTO `back_menus` VALUES ('8', '7', 'Aplikasi', 'setting/applications', '1', 'fa fa-chevron-circle-right', '2017-10-24 17:07:34', '1', null, null, '1', null);
INSERT INTO `back_menus` VALUES ('9', '7', 'Akses', 'setting/accesses', '2', 'fa fa-chevron-circle-right', '2017-10-24 17:07:34', '1', null, null, '1', null);
INSERT INTO `back_menus` VALUES ('10', '7', 'Pengguna', 'setting/users', '3', 'fa fa-chevron-circle-right', '2017-10-24 17:07:34', '1', null, null, '1', null);
INSERT INTO `back_menus` VALUES ('11', '7', 'Tentang ', 'setting/about', '4', 'fa fa-chevron-circle-right', '2017-10-24 17:07:34', '1', null, null, '1', null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_11_13_042837_laratrust_setup_tables', '1');
INSERT INTO `migrations` VALUES ('7', '2017_11_08_053023_create_laravel_opd_table', '2');

-- ----------------------------
-- Table structure for opd
-- ----------------------------
DROP TABLE IF EXISTS `opd`;
CREATE TABLE `opd` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunker` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunker_sinjab` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kunker_simral` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `levelunker` int(11) NOT NULL,
  `njab` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npej` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT '0',
  `_rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `opd_id_unique` (`id`),
  KEY `opd__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`),
  KEY `opd_kunker_index` (`kunker`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of opd
-- ----------------------------
INSERT INTO `opd` VALUES ('431467DF-EFC2-4032-AE05-2405FF01D982', '000400000000000', 'Dinas Pendidikan dan Kebudayaan', '', '', '1', 'Kepala', 'Hendra', '5', '6', null, '2017-12-13 06:37:59', '2017-12-13 06:37:59');
INSERT INTO `opd` VALUES ('EFD924FF-F03B-4AF5-83DE-0E14B1EB2525', '000101000000000', 'Asisten Pemerintahan dan Kesejahteraan Rakyat', '', '', '2', 'Sekretaris', 'Linda', '2', '3', 'F9739A54-809D-474E-9DDA-9C8C524AB7E3', '2017-12-13 06:44:52', '2017-12-13 06:44:52');
INSERT INTO `opd` VALUES ('F9739A54-809D-474E-9DDA-9C8C524AB7E3', '000100000000000', 'Sekretariat Daerah', '', '', '1', 'Kepala', 'Joko', '1', '4', null, '2017-12-13 06:25:01', '2017-12-13 06:25:01');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'read-home', '1', 'Read Home', 'Read Home', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('2', 'read-dashboard', '2', 'Read Dashboard', 'Read Dashboard', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('3', 'read-datasets', '3', 'Read Datasets', 'Read Datasets', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('4', 'create-datasets', '3', 'Create Datasets', 'Create Datasets', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('5', 'update-datasets', '3', 'Update Datasets', 'Update Datasets', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('6', 'delete-datasets', '3', 'Delete Datasets', 'Delete Datasets', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('7', 'read-master', '4', 'Read Master', 'Read Master', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('8', 'read-organizations', '5', 'Read Organizations', 'Read Organizations', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('9', 'create-organizations', '5', 'Create Organizations', 'Create Organizations', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('10', 'update-organizations', '5', 'Update Organizations', 'Update Organizations', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('11', 'delete-organizations', '5', 'Delete Organizations', 'Delete Organizations', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('12', 'read-groups', '6', 'Read Groups', 'Read Groups', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('13', 'create-groups', '6', 'Create Groups', 'Create Groups', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('14', 'update-groups', '6', 'Update Groups', 'Update Groups', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('15', 'delete-groups', '6', 'Delete Groups', 'Delete Groups', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('16', 'read-setting', '7', 'Read Setting', 'Read Setting', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('17', 'read-applications', '8', 'Read Applications', 'Read Applications', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('18', 'update-applications', '8', 'Update Applications', 'Update Applications', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('19', 'delete-applications', '8', 'Delete Applications', 'Delete Applications', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('20', 'create-accesses', '9', 'Create Accesses', 'Create Accesses', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('21', 'read-accesses', '9', 'Read Accesses', 'Read Accesses', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('22', 'update-accesses', '9', 'Update Accesses', 'Update Accesses', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('23', 'delete-accesses', '9', 'Delete Accesses', 'Delete Accesses', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('24', 'create-users', '10', 'Create Users', 'Create Users', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('25', 'read-users', '10', 'Read Users', 'Read Users', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('26', 'update-users', '10', 'Update Users', 'Update Users', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('27', 'delete-users', '10', 'Delete Users', 'Delete Users', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('28', 'create-about', '11', 'Create About', 'Create About', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('29', 'read-about', '11', 'Read About', 'Read About', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('30', 'update-about', '11', 'Update About', 'Update About', '2017-11-13 05:11:53', '2017-11-13 05:11:53');
INSERT INTO `permissions` VALUES ('31', 'delete-about', '11', 'Delete About', 'Delete About', '2017-11-13 05:11:53', '2017-11-13 05:11:53');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('1', '1');
INSERT INTO `permission_role` VALUES ('1', '2');
INSERT INTO `permission_role` VALUES ('1', '13');
INSERT INTO `permission_role` VALUES ('2', '1');
INSERT INTO `permission_role` VALUES ('2', '2');
INSERT INTO `permission_role` VALUES ('2', '13');
INSERT INTO `permission_role` VALUES ('3', '1');
INSERT INTO `permission_role` VALUES ('3', '2');
INSERT INTO `permission_role` VALUES ('3', '13');
INSERT INTO `permission_role` VALUES ('4', '1');
INSERT INTO `permission_role` VALUES ('4', '2');
INSERT INTO `permission_role` VALUES ('4', '13');
INSERT INTO `permission_role` VALUES ('5', '1');
INSERT INTO `permission_role` VALUES ('5', '2');
INSERT INTO `permission_role` VALUES ('5', '13');
INSERT INTO `permission_role` VALUES ('6', '1');
INSERT INTO `permission_role` VALUES ('6', '2');
INSERT INTO `permission_role` VALUES ('6', '13');
INSERT INTO `permission_role` VALUES ('7', '1');
INSERT INTO `permission_role` VALUES ('7', '2');
INSERT INTO `permission_role` VALUES ('7', '13');
INSERT INTO `permission_role` VALUES ('8', '1');
INSERT INTO `permission_role` VALUES ('8', '2');
INSERT INTO `permission_role` VALUES ('8', '13');
INSERT INTO `permission_role` VALUES ('9', '1');
INSERT INTO `permission_role` VALUES ('9', '2');
INSERT INTO `permission_role` VALUES ('9', '13');
INSERT INTO `permission_role` VALUES ('10', '1');
INSERT INTO `permission_role` VALUES ('10', '2');
INSERT INTO `permission_role` VALUES ('10', '13');
INSERT INTO `permission_role` VALUES ('11', '1');
INSERT INTO `permission_role` VALUES ('11', '2');
INSERT INTO `permission_role` VALUES ('11', '13');
INSERT INTO `permission_role` VALUES ('12', '1');
INSERT INTO `permission_role` VALUES ('12', '2');
INSERT INTO `permission_role` VALUES ('12', '13');
INSERT INTO `permission_role` VALUES ('13', '1');
INSERT INTO `permission_role` VALUES ('13', '2');
INSERT INTO `permission_role` VALUES ('13', '13');
INSERT INTO `permission_role` VALUES ('14', '1');
INSERT INTO `permission_role` VALUES ('14', '2');
INSERT INTO `permission_role` VALUES ('14', '13');
INSERT INTO `permission_role` VALUES ('15', '1');
INSERT INTO `permission_role` VALUES ('15', '2');
INSERT INTO `permission_role` VALUES ('15', '13');
INSERT INTO `permission_role` VALUES ('16', '1');
INSERT INTO `permission_role` VALUES ('17', '1');
INSERT INTO `permission_role` VALUES ('18', '1');
INSERT INTO `permission_role` VALUES ('19', '1');
INSERT INTO `permission_role` VALUES ('20', '1');
INSERT INTO `permission_role` VALUES ('21', '1');
INSERT INTO `permission_role` VALUES ('22', '1');
INSERT INTO `permission_role` VALUES ('23', '1');
INSERT INTO `permission_role` VALUES ('24', '1');
INSERT INTO `permission_role` VALUES ('25', '1');
INSERT INTO `permission_role` VALUES ('26', '1');
INSERT INTO `permission_role` VALUES ('27', '1');
INSERT INTO `permission_role` VALUES ('28', '1');
INSERT INTO `permission_role` VALUES ('29', '1');
INSERT INTO `permission_role` VALUES ('30', '1');
INSERT INTO `permission_role` VALUES ('31', '1');

-- ----------------------------
-- Table structure for permission_user
-- ----------------------------
DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user` (
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permission_user
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `log_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'superadministrator', 'Superadministrator', 'Superadministrator', '2017-11-13 05:11:53', '1', '2017-11-13 05:11:53', '1', '1', null);
INSERT INTO `roles` VALUES ('2', 'administrator', 'Administrator', 'Administrator', '2017-11-13 05:11:53', '1', '2017-11-13 05:11:53', '1', '1', null);
INSERT INTO `roles` VALUES ('3', 'user', 'User', 'User', '2017-11-13 05:11:53', '1', '2017-11-13 05:11:53', '1', '1', null);
INSERT INTO `roles` VALUES ('13', 'operator', 'operator', 'operator', '2017-11-25 04:15:43', '1', '2017-11-25 04:51:36', '1', '1', null);

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1', 'App\\User');
INSERT INTO `role_user` VALUES ('2', '2', 'App\\User');
INSERT INTO `role_user` VALUES ('3', '3', 'App\\User');
INSERT INTO `role_user` VALUES ('3', '4', 'App\\User');
INSERT INTO `role_user` VALUES ('1', '7', 'App\\User');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_code` varchar(255) DEFAULT NULL,
  `setting_name` varchar(255) DEFAULT NULL,
  `setting_value` varchar(255) DEFAULT NULL,
  `setting_create_by` int(11) DEFAULT NULL,
  `setting_create_date` datetime DEFAULT NULL,
  `setting_update_by` int(11) DEFAULT NULL,
  `setting_update_date` datetime DEFAULT NULL,
  `setting_status` int(11) DEFAULT NULL,
  `setting_log_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'CFG001', 'Footer', 'Copyright © 2017 <a href=\"\">Satu Data Banten</a> Developed By <a href=\"mkitech.co.di\">PT. Mediatama Kreasi Informatika</a>', '1', '2017-11-10 10:39:31', null, null, '1', null);
INSERT INTO `settings` VALUES ('2', 'CF001', 'Footer', 'Copyright &copy; 2017 <a href=\"\">Satu Data Banten</a> Developed By <a href=\"mkitech.co.di\">PT. Mediatama Kreasi Informatika</a>', '1', '2017-11-10 10:39:31', null, null, '1', '1');
INSERT INTO `settings` VALUES ('3', 'CF001', 'Footer', 'Copyright &copy; 2017 <a href=\"\">Satu Data Banten</a> Developed By <a href=\"mkitech.co.di\">PT. Mediatama Kreasi Informatika</a>', '1', '2017-11-10 10:39:31', null, null, '0', '1');
INSERT INTO `settings` VALUES ('4', 'CFG001', 'Footer', 'Copyright © 2017 <a href=\"\">Satu Data Banten</a> Developed By <a href=\"mkitech.co.di\">PT. Mediatama Kreasi Informatika</a>', '1', '2017-11-10 10:39:31', null, null, '1', '1');
INSERT INTO `settings` VALUES ('5', 'CFG001', 'Footer', 'Copyright © 2017 <a href=\"\">Satu Data Banten</a> Developed By <a href=\"mkitech.co.di\">PT. Mediatama Kreasi Informatika</a>', '1', '2017-11-10 10:39:31', null, null, '0', '1');
INSERT INTO `settings` VALUES ('6', 'CFG001', 'Footer', 'Copyright © 2017 <a href=\"\">Satu Data Banten</a> Developed By <a href=\"mkitech.co.di\">PT. Mediatama Kreasi Informatika</a>', '1', '2017-11-10 10:39:31', null, null, '1', '1');
INSERT INTO `settings` VALUES ('7', 'CFG001', 'Footer', 'Copyright © 2017 <a href=\"\">Satu Data Banten</a> Developed By <a href=\"mkitech.co.di\">PT. Mediatama Kreasi Informatika</a>', '1', '2017-11-10 10:39:31', null, null, '0', '1');
INSERT INTO `settings` VALUES ('8', 'CFG001', 'Footer', 'Copyright © 2017 <a href=\"\">Satu Data Banten</a> Developed By <a href=\"mkitech.co.di\">PT. Mediatama Kreasi Informatika</a>', '1', '2017-11-10 10:39:31', null, null, '1', '1');
INSERT INTO `settings` VALUES ('9', 'CFG001', 'Footer', 'Copyright © 2017 <a href=\"\">Satu Data Banten</a> Developed By <a href=\"mkitech.co.di\">PT. Mediatama Kreasi Informatika</a>', '1', '2017-11-10 10:39:31', null, null, '0', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `log_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Superadministrator', 'superadministrator@app.com', '001', '$2y$10$IbkXquXCKuHVSKAc53UZ9OOQ/u1w14HXED/wcYWyuYF/AVrzJw2/W', 'v0iEutUFykTx0DMNIL7moubDl5xZt5XPTFAZ9XRE8U0bqw7HS0CsfRlRQ4FW', '1', '2017-11-13 05:11:53', '7', '2017-11-25 08:24:29', '1', null);
INSERT INTO `users` VALUES ('2', 'Administrator', 'administrator@app.com', '002', '$2y$10$IbkXquXCKuHVSKAc53UZ9OOQ/u1w14HXED/wcYWyuYF/AVrzJw2/W', 'I0SPFstS7c3YvQhgzlSsanN9GIAXImzKyvOuZWeQQUZk9881K7aI7nneZeBj', '1', '2017-11-13 05:11:53', '1', '2017-11-13 05:11:53', '1', null);
INSERT INTO `users` VALUES ('3', 'User', 'user@app.com', '003', '$2y$10$IbkXquXCKuHVSKAc53UZ9OOQ/u1w14HXED/wcYWyuYF/AVrzJw2/W', 'hkoNWCglw7eIaUOPtfw05YwSP6QQzv25dldjtlkwy1rjnLMFS9ixCVkq4tpL', '1', '2017-11-13 05:11:53', '1', '2017-11-13 05:11:53', '1', null);
INSERT INTO `users` VALUES ('4', 'Cru User', 'cru_user@app.com', '004', '$2y$10$IbkXquXCKuHVSKAc53UZ9OOQ/u1w14HXED/wcYWyuYF/AVrzJw2/W', 'TmQT1FqLQQ', '1', '2017-11-13 05:11:53', '1', '2017-11-19 08:40:55', '1', null);
INSERT INTO `users` VALUES ('7', 'Indra Laksmana', 'laksmana.d.indra@gmail.com', '005', '$2y$10$IbkXquXCKuHVSKAc53UZ9OOQ/u1w14HXED/wcYWyuYF/AVrzJw2/W', 'uJw7eLRRNptKFJfrZ3QR0MBjsY7wbVKoW6uNgtrSDxCEcQJAaHg7t30s88RX', '1', '2017-11-25 07:36:35', '7', '2017-11-25 08:25:20', '1', null);

-- ----------------------------
-- View structure for view_permission_roles
-- ----------------------------
DROP VIEW IF EXISTS `view_permission_roles`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_permission_roles` AS SELECT 
roles.id,
roles.display_name,(SELECT
COUNT(back_menus.menu_id)
FROM
back_menus
INNER JOIN permissions ON permissions.menu_id = back_menus.menu_id
INNER JOIN permission_role ON permissions.id = permission_role.permission_id
WHERE permission_role.role_id = roles.id) AS total_permissions,
roles.status,
roles.created_at,
(CASE roles.status WHEN 1 THEN 'Aktif' ELSE 'Non-Aktif' END) AS status_name
FROM roles ;

-- ----------------------------
-- View structure for view_settings
-- ----------------------------
DROP VIEW IF EXISTS `view_settings`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_settings` AS SELECT
settings.setting_id,
settings.setting_code,
settings.setting_name,
settings.setting_value,
settings.setting_create_by,
settings.setting_create_date,
settings.setting_update_by,
settings.setting_update_date,
settings.setting_status,
CASE settings.setting_status 
WHEN 1 THEN 'Aktif' ELSE 'Non-Aktif'
END AS setting_status_name,
settings.setting_log_id
FROM
settings
WHERE settings.setting_log_id IS NULL ;

-- ----------------------------
-- View structure for view_users
-- ----------------------------
DROP VIEW IF EXISTS `view_users`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_users` AS SELECT
users.id,
users.nik,
users.`name`,
users.email,
users.`password`,
users.remember_token,
users.created_by,
users.created_at,
users.updated_by,
users.updated_at,
users.`status`,
CASE users.`status` WHEN 1 THEN 'Aktif' ELSE 'Non-Aktif' END AS status_name,
roles.`id` AS role_id,
roles.`name` AS role_name
FROM
users 
LEFT JOIN role_user ON role_user.user_id = users.id
LEFT JOIN roles ON role_user.role_id = roles.id ;
