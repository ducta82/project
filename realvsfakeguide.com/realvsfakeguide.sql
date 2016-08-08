/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : realvsfakeguide

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2016-07-28 15:27:10
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `wp_commentmeta`
-- ----------------------------
DROP TABLE IF EXISTS `wp_commentmeta`;
CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_commentmeta
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_comments`
-- ----------------------------
DROP TABLE IF EXISTS `wp_comments`;
CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_comments
-- ----------------------------
INSERT INTO `wp_comments` VALUES ('2', '90', 'asdasd', 'asd@aksjdbas.com', '', '127.0.0.1', '2016-07-19 09:08:02', '2016-07-19 09:08:02', 'asdasdwawdawdawda', '0', '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0', '', '0', '0');
INSERT INTO `wp_comments` VALUES ('3', '110', 'asdasd', 'askdnas@kasd.com', '', '127.0.0.1', '2016-07-22 10:31:40', '2016-07-22 10:31:40', 'asdawawd', '0', '0', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0', '', '0', '0');
INSERT INTO `wp_comments` VALUES ('4', '110', 'asdasdasdas', 'askdnas@kasd.comas', '', '127.0.0.1', '2016-07-22 10:34:15', '2016-07-22 10:34:15', 'qweqweqweqweqwe', '0', '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0', '', '0', '0');
INSERT INTO `wp_comments` VALUES ('5', '110', 'aaaaaaaaaa', 'askdnas@gmail.com', '', '127.0.0.1', '2016-07-22 10:35:11', '2016-07-22 10:35:11', 'laksnd', '0', '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0', '', '4', '0');
INSERT INTO `wp_comments` VALUES ('6', '108', 'tester 1', 'test1@gmail.com', '', '127.0.0.1', '2016-07-27 10:08:32', '2016-07-27 10:08:32', 'test', '0', '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '', '0', '0');

-- ----------------------------
-- Table structure for `wp_es_deliverreport`
-- ----------------------------
DROP TABLE IF EXISTS `wp_es_deliverreport`;
CREATE TABLE `wp_es_deliverreport` (
  `es_deliver_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `es_deliver_sentguid` varchar(255) NOT NULL,
  `es_deliver_emailid` int(10) unsigned NOT NULL,
  `es_deliver_emailmail` varchar(255) NOT NULL,
  `es_deliver_sentdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `es_deliver_status` varchar(25) NOT NULL,
  `es_deliver_viewdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `es_deliver_sentstatus` varchar(25) NOT NULL DEFAULT 'Sent',
  `es_deliver_senttype` varchar(25) NOT NULL DEFAULT 'Instant Mail',
  PRIMARY KEY (`es_deliver_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_es_deliverreport
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_es_emaillist`
-- ----------------------------
DROP TABLE IF EXISTS `wp_es_emaillist`;
CREATE TABLE `wp_es_emaillist` (
  `es_email_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `es_email_name` varchar(255) NOT NULL,
  `es_email_mail` varchar(255) NOT NULL,
  `es_email_status` varchar(25) NOT NULL DEFAULT 'Unconfirmed',
  `es_email_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `es_email_viewcount` varchar(100) NOT NULL,
  `es_email_group` varchar(255) NOT NULL DEFAULT 'Public',
  `es_email_guid` varchar(255) NOT NULL,
  PRIMARY KEY (`es_email_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_es_emaillist
-- ----------------------------
INSERT INTO `wp_es_emaillist` VALUES ('1', 'Admin', 'labkuroky@gmail.com', 'Confirmed', '2016-07-23 03:22:22', '0', 'Public', 'tlksbd-gfqzjk-gjsbyo-yrdvqm-cutnax');
INSERT INTO `wp_es_emaillist` VALUES ('2', 'Example', 'a.example@example.com', 'Confirmed', '2016-07-23 03:22:22', '0', 'Public', 'fakspl-dwbext-fuomwh-pvtich-epltmf');
INSERT INTO `wp_es_emaillist` VALUES ('3', '', 'asdasd@gmail.com', 'Unconfirmed', '2016-07-23 03:50:34', '0', 'Public', 'vhobas-iuozmr-jlyebo-uqlzpw-gdfumc');

-- ----------------------------
-- Table structure for `wp_es_notification`
-- ----------------------------
DROP TABLE IF EXISTS `wp_es_notification`;
CREATE TABLE `wp_es_notification` (
  `es_note_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `es_note_cat` text,
  `es_note_group` varchar(255) NOT NULL,
  `es_note_templ` int(10) unsigned NOT NULL,
  `es_note_status` varchar(10) NOT NULL DEFAULT 'Enable',
  PRIMARY KEY (`es_note_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_es_notification
-- ----------------------------
INSERT INTO `wp_es_notification` VALUES ('1', ' ##Demo## -- ##Fashion## -- ##Handbags## -- ##Sunglasses## -- ##Uncategorized## ', 'Public', '1', 'Enable');

-- ----------------------------
-- Table structure for `wp_es_pluginconfig`
-- ----------------------------
DROP TABLE IF EXISTS `wp_es_pluginconfig`;
CREATE TABLE `wp_es_pluginconfig` (
  `es_c_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `es_c_fromname` varchar(255) NOT NULL,
  `es_c_fromemail` varchar(255) NOT NULL,
  `es_c_mailtype` varchar(255) NOT NULL,
  `es_c_adminmailoption` varchar(255) NOT NULL,
  `es_c_adminemail` varchar(255) NOT NULL,
  `es_c_adminmailsubject` varchar(255) NOT NULL,
  `es_c_adminmailcontant` text,
  `es_c_usermailoption` varchar(255) NOT NULL,
  `es_c_usermailsubject` varchar(255) NOT NULL,
  `es_c_usermailcontant` text,
  `es_c_optinoption` varchar(255) NOT NULL,
  `es_c_optinsubject` varchar(255) NOT NULL,
  `es_c_optincontent` text,
  `es_c_optinlink` varchar(255) NOT NULL,
  `es_c_unsublink` varchar(255) NOT NULL,
  `es_c_unsubtext` text,
  `es_c_unsubhtml` text,
  `es_c_subhtml` text,
  `es_c_message1` text,
  `es_c_message2` text,
  PRIMARY KEY (`es_c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_es_pluginconfig
-- ----------------------------
INSERT INTO `wp_es_pluginconfig` VALUES ('1', 'Admin', 'labkuroky@gmail.com', 'WP HTML MAIL', 'YES', 'labkuroky@gmail.com', 'Real Vs Fake Guide New email subscription', 'Hi Admin, \r\n\r\nWe have received a request to subscribe new email address to receive emails from our website. \r\n\r\nEmail: ###EMAIL### \r\nName : ###NAME### \r\n\r\nThank You\r\nReal Vs Fake Guide', 'YES', 'Real Vs Fake Guide Welcome to our newsletter', 'Hi ###NAME###, \r\n\r\nWe have received a request to subscribe this email address to receive newsletter from our website. \r\n\r\nThank You\r\nReal Vs Fake Guide \r\n\r\n No longer interested email from Real Vs Fake Guide?. Please <a href=\\\'###LINK###\\\'>click here</a> to unsubscribe', 'Double Opt In', 'Real Vs Fake Guide confirm subscription', 'Hi ###NAME###, \r\n\r\nA newsletter subscription request for this email address was received. Please confirm it by <a href=\\\'###LINK###\\\'>clicking here</a>.\r\n\r\nIf you still cannot subscribe, please click this link : \r\n ###LINK### \r\n\r\nThank You\r\nReal Vs Fake Guide', 'http://realvsfakeguide.local/?es=optin&db=###DBID###&email=###EMAIL###&guid=###GUID###', 'http://realvsfakeguide.local/?es=unsubscribe&db=###DBID###&email=###EMAIL###&guid=###GUID###', 'No longer interested email from Real Vs Fake Guide?. Please <a href=\\\'###LINK###\\\'>click here</a> to unsubscribe', 'Thank You, You have been successfully unsubscribed. ', 'Thank You, You have been successfully subscribed to our newsletter.', 'Oops.. This subscription cant be completed, sorry. The email address is blocked or already subscribed. Thank you.', 'Oops.. We are getting some technical error. Please try again or contact admin.');

-- ----------------------------
-- Table structure for `wp_es_sentdetails`
-- ----------------------------
DROP TABLE IF EXISTS `wp_es_sentdetails`;
CREATE TABLE `wp_es_sentdetails` (
  `es_sent_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `es_sent_guid` varchar(255) NOT NULL,
  `es_sent_qstring` varchar(255) NOT NULL,
  `es_sent_source` varchar(255) NOT NULL,
  `es_sent_starttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `es_sent_endtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `es_sent_count` int(10) unsigned NOT NULL,
  `es_sent_preview` text,
  `es_sent_status` varchar(25) NOT NULL DEFAULT 'Sent',
  `es_sent_type` varchar(25) NOT NULL DEFAULT 'Instant Mail',
  `es_sent_subject` varchar(255) NOT NULL,
  PRIMARY KEY (`es_sent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_es_sentdetails
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_es_templatetable`
-- ----------------------------
DROP TABLE IF EXISTS `wp_es_templatetable`;
CREATE TABLE `wp_es_templatetable` (
  `es_templ_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `es_templ_heading` varchar(255) NOT NULL,
  `es_templ_body` text,
  `es_templ_status` varchar(25) NOT NULL DEFAULT 'Published',
  `es_email_type` varchar(100) NOT NULL DEFAULT 'Static Template',
  PRIMARY KEY (`es_templ_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_es_templatetable
-- ----------------------------
INSERT INTO `wp_es_templatetable` VALUES ('1', 'New post published ###POSTTITLE###', 'Hello ###NAME###,\r\n\r\nWe have published new blog in our website. ###POSTTITLE###\r\n###POSTDESC###\r\nYou may view the latest post at ###POSTLINK###\r\nYou received this e-mail because you asked to be notified when new updates are posted.\r\n\r\nThanks & Regards\r\nAdmin', 'Published', 'Dynamic Template');
INSERT INTO `wp_es_templatetable` VALUES ('2', 'Post notification ###POSTTITLE###', 'Hello ###EMAIL###,\r\n\r\nWe have published new blog in our website. ###POSTTITLE###\r\n###POSTIMAGE###\r\n###POSTFULL###\r\nYou may view the latest post at ###POSTLINK###\r\nYou received this e-mail because you asked to be notified when new updates are posted.\r\n\r\nThanks & Regards\r\nAdmin', 'Published', 'Dynamic Template');
INSERT INTO `wp_es_templatetable` VALUES ('3', 'Hello World Newsletter', '<strong style=\"color: #990000\"> Email Subscribers</strong><p>Email Subscribers plugin has options to send newsletters to subscribers. It has a separate page with HTML editor to create a HTML newsletter. Also have options to send notification email to subscribers when new posts are published to your blog. Separate page available to include and exclude categories to send notifications. Using plugin Import and Export options admins can easily import registered users and commenters to subscriptions list.</p> <strong style=\"color: #990000\">Plugin Features</strong><ol> <li>Send notification email to subscribers when new posts are published.</li> <li>Subscription box.</li><li>Double opt-in and single opt-in facility for subscriber.</li> <li>Email notification to admin when user signs up (Optional).</li> <li>Automatic welcome mail to subscriber (Optional).</li> <li>Unsubscribe link in the mail.</li> <li>Import/Export subscriber emails.</li> <li>HTML editor to compose newsletter.</li> </ol> <p>Plugin live demo and video tutorial available on the official website. Check official website for more information.</p> <strong>Thanks & Regards</strong><br>Admin', 'Published', 'Static Template');

-- ----------------------------
-- Table structure for `wp_links`
-- ----------------------------
DROP TABLE IF EXISTS `wp_links`;
CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_links
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_options`
-- ----------------------------
DROP TABLE IF EXISTS `wp_options`;
CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB AUTO_INCREMENT=502 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_options
-- ----------------------------
INSERT INTO `wp_options` VALUES ('1', 'siteurl', 'http://realvsfakeguide.local', 'yes');
INSERT INTO `wp_options` VALUES ('2', 'home', 'http://realvsfakeguide.local', 'yes');
INSERT INTO `wp_options` VALUES ('3', 'blogname', 'Real Vs Fake Guide', 'yes');
INSERT INTO `wp_options` VALUES ('4', 'blogdescription', 'Just another WordPress site', 'yes');
INSERT INTO `wp_options` VALUES ('5', 'users_can_register', '0', 'yes');
INSERT INTO `wp_options` VALUES ('6', 'admin_email', 'labkuroky@gmail.com', 'yes');
INSERT INTO `wp_options` VALUES ('7', 'start_of_week', '1', 'yes');
INSERT INTO `wp_options` VALUES ('8', 'use_balanceTags', '0', 'yes');
INSERT INTO `wp_options` VALUES ('9', 'use_smilies', '1', 'yes');
INSERT INTO `wp_options` VALUES ('10', 'require_name_email', '1', 'yes');
INSERT INTO `wp_options` VALUES ('11', 'comments_notify', '1', 'yes');
INSERT INTO `wp_options` VALUES ('12', 'posts_per_rss', '6', 'yes');
INSERT INTO `wp_options` VALUES ('13', 'rss_use_excerpt', '0', 'yes');
INSERT INTO `wp_options` VALUES ('14', 'mailserver_url', 'mail.example.com', 'yes');
INSERT INTO `wp_options` VALUES ('15', 'mailserver_login', 'login@example.com', 'yes');
INSERT INTO `wp_options` VALUES ('16', 'mailserver_pass', 'password', 'yes');
INSERT INTO `wp_options` VALUES ('17', 'mailserver_port', '110', 'yes');
INSERT INTO `wp_options` VALUES ('18', 'default_category', '1', 'yes');
INSERT INTO `wp_options` VALUES ('19', 'default_comment_status', 'open', 'yes');
INSERT INTO `wp_options` VALUES ('20', 'default_ping_status', 'open', 'yes');
INSERT INTO `wp_options` VALUES ('21', 'default_pingback_flag', '1', 'yes');
INSERT INTO `wp_options` VALUES ('22', 'posts_per_page', '3', 'yes');
INSERT INTO `wp_options` VALUES ('23', 'date_format', 'F j, Y', 'yes');
INSERT INTO `wp_options` VALUES ('24', 'time_format', 'g:i a', 'yes');
INSERT INTO `wp_options` VALUES ('25', 'links_updated_date_format', 'F j, Y g:i a', 'yes');
INSERT INTO `wp_options` VALUES ('26', 'comment_moderation', '', 'yes');
INSERT INTO `wp_options` VALUES ('27', 'moderation_notify', '1', 'yes');
INSERT INTO `wp_options` VALUES ('28', 'permalink_structure', '/%postname%/', 'yes');
INSERT INTO `wp_options` VALUES ('29', 'rewrite_rules', 'a:86:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:12:\"robots\\.txt$\";s:18:\"index.php?robots=1\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:27:\"comment-page-([0-9]{1,})/?$\";s:38:\"index.php?&page_id=6&cpage=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";s:27:\"[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\"[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\"[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"([^/]+)/embed/?$\";s:37:\"index.php?name=$matches[1]&embed=true\";s:20:\"([^/]+)/trackback/?$\";s:31:\"index.php?name=$matches[1]&tb=1\";s:40:\"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:35:\"([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:28:\"([^/]+)/page/?([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&paged=$matches[2]\";s:35:\"([^/]+)/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&cpage=$matches[2]\";s:24:\"([^/]+)(?:/([0-9]+))?/?$\";s:43:\"index.php?name=$matches[1]&page=$matches[2]\";s:16:\"[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:26:\"[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:46:\"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:22:\"[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";}', 'yes');
INSERT INTO `wp_options` VALUES ('30', 'hack_file', '0', 'yes');
INSERT INTO `wp_options` VALUES ('31', 'blog_charset', 'UTF-8', 'yes');
INSERT INTO `wp_options` VALUES ('32', 'moderation_keys', '', 'no');
INSERT INTO `wp_options` VALUES ('33', 'active_plugins', 'a:4:{i:0;s:37:\"acf-options-page/acf-options-page.php\";i:1;s:29:\"acf-repeater/acf-repeater.php\";i:2;s:30:\"advanced-custom-fields/acf.php\";i:3;s:36:\"contact-form-7/wp-contact-form-7.php\";}', 'yes');
INSERT INTO `wp_options` VALUES ('34', 'category_base', '', 'yes');
INSERT INTO `wp_options` VALUES ('35', 'ping_sites', 'http://rpc.pingomatic.com/', 'yes');
INSERT INTO `wp_options` VALUES ('36', 'comment_max_links', '2', 'yes');
INSERT INTO `wp_options` VALUES ('37', 'gmt_offset', '0', 'yes');
INSERT INTO `wp_options` VALUES ('38', 'default_email_category', '1', 'yes');
INSERT INTO `wp_options` VALUES ('39', 'recently_edited', 'a:3:{i:0;s:96:\"D:\\www\\wordpress_project\\2016\\realvsfakeguide.com/wp-content/plugins/acf-options-page/readme.txt\";i:1;s:106:\"D:\\www\\wordpress_project\\2016\\realvsfakeguide.com/wp-content/plugins/acf-options-page/acf-options-page.php\";i:2;s:0:\"\";}', 'no');
INSERT INTO `wp_options` VALUES ('40', 'template', 'realvsfakeguide', 'yes');
INSERT INTO `wp_options` VALUES ('41', 'stylesheet', 'realvsfakeguide', 'yes');
INSERT INTO `wp_options` VALUES ('42', 'comment_whitelist', '', 'yes');
INSERT INTO `wp_options` VALUES ('43', 'blacklist_keys', '', 'no');
INSERT INTO `wp_options` VALUES ('44', 'comment_registration', '', 'yes');
INSERT INTO `wp_options` VALUES ('45', 'html_type', 'text/html', 'yes');
INSERT INTO `wp_options` VALUES ('46', 'use_trackback', '0', 'yes');
INSERT INTO `wp_options` VALUES ('47', 'default_role', 'subscriber', 'yes');
INSERT INTO `wp_options` VALUES ('48', 'db_version', '36686', 'yes');
INSERT INTO `wp_options` VALUES ('49', 'uploads_use_yearmonth_folders', '1', 'yes');
INSERT INTO `wp_options` VALUES ('50', 'upload_path', '', 'yes');
INSERT INTO `wp_options` VALUES ('51', 'blog_public', '0', 'yes');
INSERT INTO `wp_options` VALUES ('52', 'default_link_category', '2', 'yes');
INSERT INTO `wp_options` VALUES ('53', 'show_on_front', 'page', 'yes');
INSERT INTO `wp_options` VALUES ('54', 'tag_base', '', 'yes');
INSERT INTO `wp_options` VALUES ('55', 'show_avatars', '1', 'yes');
INSERT INTO `wp_options` VALUES ('56', 'avatar_rating', 'G', 'yes');
INSERT INTO `wp_options` VALUES ('57', 'upload_url_path', '', 'yes');
INSERT INTO `wp_options` VALUES ('58', 'thumbnail_size_w', '205', 'yes');
INSERT INTO `wp_options` VALUES ('59', 'thumbnail_size_h', '205', 'yes');
INSERT INTO `wp_options` VALUES ('60', 'thumbnail_crop', '1', 'yes');
INSERT INTO `wp_options` VALUES ('61', 'medium_size_w', '300', 'yes');
INSERT INTO `wp_options` VALUES ('62', 'medium_size_h', '300', 'yes');
INSERT INTO `wp_options` VALUES ('63', 'avatar_default', 'mystery', 'yes');
INSERT INTO `wp_options` VALUES ('64', 'large_size_w', '1024', 'yes');
INSERT INTO `wp_options` VALUES ('65', 'large_size_h', '1024', 'yes');
INSERT INTO `wp_options` VALUES ('66', 'image_default_link_type', '', 'yes');
INSERT INTO `wp_options` VALUES ('67', 'image_default_size', '', 'yes');
INSERT INTO `wp_options` VALUES ('68', 'image_default_align', '', 'yes');
INSERT INTO `wp_options` VALUES ('69', 'close_comments_for_old_posts', '', 'yes');
INSERT INTO `wp_options` VALUES ('70', 'close_comments_days_old', '14', 'yes');
INSERT INTO `wp_options` VALUES ('71', 'thread_comments', '1', 'yes');
INSERT INTO `wp_options` VALUES ('72', 'thread_comments_depth', '5', 'yes');
INSERT INTO `wp_options` VALUES ('73', 'page_comments', '', 'yes');
INSERT INTO `wp_options` VALUES ('74', 'comments_per_page', '50', 'yes');
INSERT INTO `wp_options` VALUES ('75', 'default_comments_page', 'newest', 'yes');
INSERT INTO `wp_options` VALUES ('76', 'comment_order', 'asc', 'yes');
INSERT INTO `wp_options` VALUES ('77', 'sticky_posts', 'a:0:{}', 'yes');
INSERT INTO `wp_options` VALUES ('78', 'widget_categories', 'a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('79', 'widget_text', 'a:0:{}', 'yes');
INSERT INTO `wp_options` VALUES ('80', 'widget_rss', 'a:0:{}', 'yes');
INSERT INTO `wp_options` VALUES ('81', 'uninstall_plugins', 'a:1:{s:37:\"front-end-publishing/fepublishing.php\";s:12:\"fep_rollback\";}', 'no');
INSERT INTO `wp_options` VALUES ('82', 'timezone_string', '', 'yes');
INSERT INTO `wp_options` VALUES ('83', 'page_for_posts', '31', 'yes');
INSERT INTO `wp_options` VALUES ('84', 'page_on_front', '6', 'yes');
INSERT INTO `wp_options` VALUES ('85', 'default_post_format', '0', 'yes');
INSERT INTO `wp_options` VALUES ('86', 'link_manager_enabled', '0', 'yes');
INSERT INTO `wp_options` VALUES ('87', 'finished_splitting_shared_terms', '1', 'yes');
INSERT INTO `wp_options` VALUES ('88', 'site_icon', '0', 'yes');
INSERT INTO `wp_options` VALUES ('89', 'medium_large_size_w', '768', 'yes');
INSERT INTO `wp_options` VALUES ('90', 'medium_large_size_h', '0', 'yes');
INSERT INTO `wp_options` VALUES ('91', 'initial_db_version', '36686', 'yes');
INSERT INTO `wp_options` VALUES ('92', 'wp_user_roles', 'a:6:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:68:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:9:\"edit_wiki\";b:1;s:14:\"edit_wiki_page\";b:1;s:15:\"edit_wiki_pages\";b:1;s:22:\"edit_others_wiki_pages\";b:1;s:18:\"publish_wiki_pages\";b:1;s:16:\"delete_wiki_page\";b:1;s:24:\"delete_others_wiki_pages\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:41:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:9:\"edit_wiki\";b:1;s:14:\"edit_wiki_page\";b:1;s:15:\"edit_wiki_pages\";b:1;s:22:\"edit_others_wiki_pages\";b:1;s:18:\"publish_wiki_pages\";b:1;s:16:\"delete_wiki_page\";b:1;s:24:\"delete_others_wiki_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:17:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:9:\"edit_wiki\";b:1;s:14:\"edit_wiki_page\";b:1;s:15:\"edit_wiki_pages\";b:1;s:22:\"edit_others_wiki_pages\";b:1;s:18:\"publish_wiki_pages\";b:1;s:16:\"delete_wiki_page\";b:1;s:24:\"delete_others_wiki_pages\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:12:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:9:\"edit_wiki\";b:1;s:14:\"edit_wiki_page\";b:1;s:15:\"edit_wiki_pages\";b:1;s:22:\"edit_others_wiki_pages\";b:1;s:18:\"publish_wiki_pages\";b:1;s:16:\"delete_wiki_page\";b:1;s:24:\"delete_others_wiki_pages\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:9:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;s:9:\"edit_wiki\";b:1;s:14:\"edit_wiki_page\";b:1;s:15:\"edit_wiki_pages\";b:1;s:22:\"edit_others_wiki_pages\";b:1;s:18:\"publish_wiki_pages\";b:1;s:16:\"delete_wiki_page\";b:1;s:24:\"delete_others_wiki_pages\";b:1;}}s:11:\"wiki_editor\";a:2:{s:4:\"name\";s:11:\"Wiki Editor\";s:12:\"capabilities\";a:7:{s:4:\"read\";b:1;s:9:\"edit_wiki\";b:1;s:14:\"edit_wiki_page\";b:1;s:15:\"edit_wiki_pages\";b:1;s:22:\"edit_others_wiki_pages\";b:1;s:16:\"delete_wiki_page\";b:1;s:24:\"delete_others_wiki_pages\";b:1;}}}', 'yes');
INSERT INTO `wp_options` VALUES ('93', 'widget_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('94', 'widget_recent-posts', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('95', 'widget_recent-comments', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('96', 'widget_archives', 'a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('97', 'widget_meta', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('98', 'sidebars_widgets', 'a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:2:{i:0;s:12:\"categories-2\";i:1;s:10:\"archives-2\";}s:13:\"array_version\";i:3;}', 'yes');
INSERT INTO `wp_options` VALUES ('99', 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('100', 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('101', 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('102', 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('103', 'cron', 'a:4:{i:1469713594;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1469756815;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1469757648;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}s:7:\"version\";i:2;}', 'yes');
INSERT INTO `wp_options` VALUES ('107', '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.5.3.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.5.3.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-4.5.3-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-4.5.3-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"4.5.3\";s:7:\"version\";s:5:\"4.5.3\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.4\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1469687059;s:15:\"version_checked\";s:5:\"4.5.3\";s:12:\"translations\";a:0:{}}', 'yes');
INSERT INTO `wp_options` VALUES ('112', '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1469687068;s:7:\"checked\";a:4:{s:15:\"realvsfakeguide\";s:5:\"1.0.0\";s:13:\"twentyfifteen\";s:3:\"1.5\";s:14:\"twentyfourteen\";s:3:\"1.7\";s:13:\"twentysixteen\";s:3:\"1.2\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}', 'yes');
INSERT INTO `wp_options` VALUES ('113', '_transient_random_seed', '42de409addaa0cb645148eaf0f2cdde4', 'yes');
INSERT INTO `wp_options` VALUES ('116', 'can_compress_scripts', '1', 'yes');
INSERT INTO `wp_options` VALUES ('123', 'recently_activated', 'a:7:{s:37:\"front-end-publishing/fepublishing.php\";i:1469421824;s:33:\"wordpress-wiki/wordpress-wiki.php\";i:1469421719;s:25:\"wp-user-frontend/wpuf.php\";i:1469421466;s:75:\"recent-posts-widget-with-thumbnails/recent-posts-widget-with-thumbnails.php\";i:1469417707;s:39:\"email-subscribers/email-subscribers.php\";i:1469250546;s:29:\"wp-subscribe/wp-subscribe.php\";i:1469244097;s:27:\"wp-pagenavi/wp-pagenavi.php\";i:1469177759;}', 'yes');
INSERT INTO `wp_options` VALUES ('141', 'acf_version', '4.4.8', 'yes');
INSERT INTO `wp_options` VALUES ('144', 'theme_mods_twentysixteen', 'a:2:{s:18:\"nav_menu_locations\";a:1:{s:8:\"main-nav\";i:5;}s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1468808523;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}', 'yes');
INSERT INTO `wp_options` VALUES ('145', 'current_theme', 'realvsfakeguide', 'yes');
INSERT INTO `wp_options` VALUES ('146', 'theme_mods_realvsfaceguide', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:1:{s:8:\"main-nav\";i:5;}s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1468808517;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}', 'yes');
INSERT INTO `wp_options` VALUES ('147', 'theme_switched', '', 'yes');
INSERT INTO `wp_options` VALUES ('156', 'nav_menu_options', 'a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}', 'yes');
INSERT INTO `wp_options` VALUES ('161', 'theme_mods_realvsfakeguide', 'a:2:{i:0;b:0;s:18:\"nav_menu_locations\";a:2:{s:8:\"main-nav\";i:5;s:11:\"mobile_menu\";i:6;}}', 'yes');
INSERT INTO `wp_options` VALUES ('167', '_transient_realvsfaceguild_categories', '1', 'yes');
INSERT INTO `wp_options` VALUES ('202', 'widget_random_post', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('239', 'widget_recent-posts-widget-with-thumbnails', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('292', 'wpcf7', 'a:2:{s:7:\"version\";s:5:\"4.4.2\";s:13:\"bulk_validate\";a:4:{s:9:\"timestamp\";i:1469184197;s:7:\"version\";s:5:\"4.4.2\";s:11:\"count_valid\";i:1;s:13:\"count_invalid\";i:0;}}', 'yes');
INSERT INTO `wp_options` VALUES ('322', 'widget_wp_subscribe', 'a:2:{i:2;a:16:{s:7:\"service\";s:10:\"feedburner\";s:13:\"feedburner_id\";s:0:\"\";s:17:\"mailchimp_api_key\";s:0:\"\";s:17:\"mailchimp_list_id\";s:0:\"\";s:22:\"mailchimp_double_optin\";s:1:\"0\";s:14:\"aweber_list_id\";s:0:\"\";s:18:\"include_name_field\";s:1:\"0\";s:5:\"title\";s:56:\"Get more stuff like this<br/> <span>in your inbox</span>\";s:4:\"text\";s:0:\"\";s:16:\"name_placeholder\";s:16:\"Enter your name \";s:17:\"email_placeholder\";s:16:\"Enter your email\";s:11:\"button_text\";s:9:\"Subscribe\";s:15:\"success_message\";s:26:\"Thank you for subscribing.\";s:13:\"error_message\";s:21:\"Something went wrong.\";s:26:\"already_subscribed_message\";s:32:\"This email is already subscribed\";s:11:\"footer_text\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('326', 'email-subscribers', '2.9', 'yes');
INSERT INTO `wp_options` VALUES ('329', 'widget_email-subscribers', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('330', 'es_c_cronurl', 'http://realvsfakeguide.local/?es=cron&guid=dwpyku-pyocve-vakwpe-ifcsgz-srajpf', 'yes');
INSERT INTO `wp_options` VALUES ('331', 'es_cron_mailcount', '50', 'yes');
INSERT INTO `wp_options` VALUES ('332', 'es_cron_adminmail', 'Hi Admin, \r\n\r\nCron URL has been triggered successfully on ###DATE### for the mail ###SUBJECT###. And it sent mail to ###COUNT### recipient. \r\n\r\nThank You', 'yes');
INSERT INTO `wp_options` VALUES ('333', 'es_c_sentreport_subject', 'Newsletter Sent Report', 'yes');
INSERT INTO `wp_options` VALUES ('334', 'es_c_sentreport', 'Hi Admin,\r\n\r\nMail has been sent successfully to ###COUNT### email(s). Please find the details below.\r\n\r\nUnique ID : ###UNIQUE### \r\nStart Time: ###STARTTIME### \r\nEnd Time: ###ENDTIME### \r\nFor more information, Login to your Dashboard and go to Sent Mails menu in Email Subscribers. \r\n\r\nThank You. \r\n', 'yes');
INSERT INTO `wp_options` VALUES ('335', 'es_c_post_image_size', 'full', 'yes');
INSERT INTO `wp_options` VALUES ('363', '_site_transient_timeout_browser_6cec41836a02a95621586fbbfaf7cecf', '1470018428', 'yes');
INSERT INTO `wp_options` VALUES ('364', '_site_transient_browser_6cec41836a02a95621586fbbfaf7cecf', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:12:\"50.0.2661.94\";s:10:\"update_url\";s:28:\"http://www.google.com/chrome\";s:7:\"img_src\";s:49:\"http://s.wordpress.org/images/browsers/chrome.png\";s:11:\"img_src_ssl\";s:48:\"https://wordpress.org/images/browsers/chrome.png\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'yes');
INSERT INTO `wp_options` VALUES ('372', '_site_transient_timeout_poptags_40cd750bba9870f18aada2478b24840a', '1469428269', 'yes');
INSERT INTO `wp_options` VALUES ('373', '_site_transient_poptags_40cd750bba9870f18aada2478b24840a', 'a:100:{s:6:\"widget\";a:3:{s:4:\"name\";s:6:\"widget\";s:4:\"slug\";s:6:\"widget\";s:5:\"count\";s:4:\"5981\";}s:4:\"post\";a:3:{s:4:\"name\";s:4:\"Post\";s:4:\"slug\";s:4:\"post\";s:5:\"count\";s:4:\"3695\";}s:6:\"plugin\";a:3:{s:4:\"name\";s:6:\"plugin\";s:4:\"slug\";s:6:\"plugin\";s:5:\"count\";s:4:\"3648\";}s:5:\"admin\";a:3:{s:4:\"name\";s:5:\"admin\";s:4:\"slug\";s:5:\"admin\";s:5:\"count\";s:4:\"3163\";}s:5:\"posts\";a:3:{s:4:\"name\";s:5:\"posts\";s:4:\"slug\";s:5:\"posts\";s:5:\"count\";s:4:\"2824\";}s:9:\"shortcode\";a:3:{s:4:\"name\";s:9:\"shortcode\";s:4:\"slug\";s:9:\"shortcode\";s:5:\"count\";s:4:\"2439\";}s:7:\"sidebar\";a:3:{s:4:\"name\";s:7:\"sidebar\";s:4:\"slug\";s:7:\"sidebar\";s:5:\"count\";s:4:\"2240\";}s:6:\"google\";a:3:{s:4:\"name\";s:6:\"google\";s:4:\"slug\";s:6:\"google\";s:5:\"count\";s:4:\"2110\";}s:7:\"twitter\";a:3:{s:4:\"name\";s:7:\"twitter\";s:4:\"slug\";s:7:\"twitter\";s:5:\"count\";s:4:\"2070\";}s:4:\"page\";a:3:{s:4:\"name\";s:4:\"page\";s:4:\"slug\";s:4:\"page\";s:5:\"count\";s:4:\"2060\";}s:6:\"images\";a:3:{s:4:\"name\";s:6:\"images\";s:4:\"slug\";s:6:\"images\";s:5:\"count\";s:4:\"2009\";}s:8:\"comments\";a:3:{s:4:\"name\";s:8:\"comments\";s:4:\"slug\";s:8:\"comments\";s:5:\"count\";s:4:\"1949\";}s:5:\"image\";a:3:{s:4:\"name\";s:5:\"image\";s:4:\"slug\";s:5:\"image\";s:5:\"count\";s:4:\"1883\";}s:11:\"woocommerce\";a:3:{s:4:\"name\";s:11:\"woocommerce\";s:4:\"slug\";s:11:\"woocommerce\";s:5:\"count\";s:4:\"1814\";}s:8:\"facebook\";a:3:{s:4:\"name\";s:8:\"Facebook\";s:4:\"slug\";s:8:\"facebook\";s:5:\"count\";s:4:\"1717\";}s:3:\"seo\";a:3:{s:4:\"name\";s:3:\"seo\";s:4:\"slug\";s:3:\"seo\";s:5:\"count\";s:4:\"1600\";}s:9:\"wordpress\";a:3:{s:4:\"name\";s:9:\"wordpress\";s:4:\"slug\";s:9:\"wordpress\";s:5:\"count\";s:4:\"1559\";}s:6:\"social\";a:3:{s:4:\"name\";s:6:\"social\";s:4:\"slug\";s:6:\"social\";s:5:\"count\";s:4:\"1428\";}s:7:\"gallery\";a:3:{s:4:\"name\";s:7:\"gallery\";s:4:\"slug\";s:7:\"gallery\";s:5:\"count\";s:4:\"1337\";}s:5:\"links\";a:3:{s:4:\"name\";s:5:\"links\";s:4:\"slug\";s:5:\"links\";s:5:\"count\";s:4:\"1293\";}s:5:\"email\";a:3:{s:4:\"name\";s:5:\"email\";s:4:\"slug\";s:5:\"email\";s:5:\"count\";s:4:\"1252\";}s:7:\"widgets\";a:3:{s:4:\"name\";s:7:\"widgets\";s:4:\"slug\";s:7:\"widgets\";s:5:\"count\";s:4:\"1123\";}s:5:\"pages\";a:3:{s:4:\"name\";s:5:\"pages\";s:4:\"slug\";s:5:\"pages\";s:5:\"count\";s:4:\"1110\";}s:6:\"jquery\";a:3:{s:4:\"name\";s:6:\"jquery\";s:4:\"slug\";s:6:\"jquery\";s:5:\"count\";s:4:\"1014\";}s:9:\"ecommerce\";a:3:{s:4:\"name\";s:9:\"ecommerce\";s:4:\"slug\";s:9:\"ecommerce\";s:5:\"count\";s:4:\"1009\";}s:5:\"media\";a:3:{s:4:\"name\";s:5:\"media\";s:4:\"slug\";s:5:\"media\";s:5:\"count\";s:4:\"1008\";}s:5:\"video\";a:3:{s:4:\"name\";s:5:\"video\";s:4:\"slug\";s:5:\"video\";s:5:\"count\";s:3:\"942\";}s:5:\"login\";a:3:{s:4:\"name\";s:5:\"login\";s:4:\"slug\";s:5:\"login\";s:5:\"count\";s:3:\"932\";}s:7:\"content\";a:3:{s:4:\"name\";s:7:\"content\";s:4:\"slug\";s:7:\"content\";s:5:\"count\";s:3:\"926\";}s:3:\"rss\";a:3:{s:4:\"name\";s:3:\"rss\";s:4:\"slug\";s:3:\"rss\";s:5:\"count\";s:3:\"919\";}s:4:\"ajax\";a:3:{s:4:\"name\";s:4:\"AJAX\";s:4:\"slug\";s:4:\"ajax\";s:5:\"count\";s:3:\"919\";}s:10:\"responsive\";a:3:{s:4:\"name\";s:10:\"responsive\";s:4:\"slug\";s:10:\"responsive\";s:5:\"count\";s:3:\"862\";}s:10:\"javascript\";a:3:{s:4:\"name\";s:10:\"javascript\";s:4:\"slug\";s:10:\"javascript\";s:5:\"count\";s:3:\"849\";}s:10:\"buddypress\";a:3:{s:4:\"name\";s:10:\"buddypress\";s:4:\"slug\";s:10:\"buddypress\";s:5:\"count\";s:3:\"807\";}s:8:\"security\";a:3:{s:4:\"name\";s:8:\"security\";s:4:\"slug\";s:8:\"security\";s:5:\"count\";s:3:\"800\";}s:10:\"e-commerce\";a:3:{s:4:\"name\";s:10:\"e-commerce\";s:4:\"slug\";s:10:\"e-commerce\";s:5:\"count\";s:3:\"794\";}s:7:\"youtube\";a:3:{s:4:\"name\";s:7:\"youtube\";s:4:\"slug\";s:7:\"youtube\";s:5:\"count\";s:3:\"777\";}s:5:\"share\";a:3:{s:4:\"name\";s:5:\"Share\";s:4:\"slug\";s:5:\"share\";s:5:\"count\";s:3:\"771\";}s:5:\"photo\";a:3:{s:4:\"name\";s:5:\"photo\";s:4:\"slug\";s:5:\"photo\";s:5:\"count\";s:3:\"767\";}s:4:\"spam\";a:3:{s:4:\"name\";s:4:\"spam\";s:4:\"slug\";s:4:\"spam\";s:5:\"count\";s:3:\"766\";}s:4:\"feed\";a:3:{s:4:\"name\";s:4:\"feed\";s:4:\"slug\";s:4:\"feed\";s:5:\"count\";s:3:\"755\";}s:4:\"link\";a:3:{s:4:\"name\";s:4:\"link\";s:4:\"slug\";s:4:\"link\";s:5:\"count\";s:3:\"749\";}s:8:\"category\";a:3:{s:4:\"name\";s:8:\"category\";s:4:\"slug\";s:8:\"category\";s:5:\"count\";s:3:\"721\";}s:9:\"analytics\";a:3:{s:4:\"name\";s:9:\"analytics\";s:4:\"slug\";s:9:\"analytics\";s:5:\"count\";s:3:\"716\";}s:5:\"embed\";a:3:{s:4:\"name\";s:5:\"embed\";s:4:\"slug\";s:5:\"embed\";s:5:\"count\";s:3:\"702\";}s:3:\"css\";a:3:{s:4:\"name\";s:3:\"CSS\";s:4:\"slug\";s:3:\"css\";s:5:\"count\";s:3:\"699\";}s:6:\"photos\";a:3:{s:4:\"name\";s:6:\"photos\";s:4:\"slug\";s:6:\"photos\";s:5:\"count\";s:3:\"697\";}s:4:\"form\";a:3:{s:4:\"name\";s:4:\"form\";s:4:\"slug\";s:4:\"form\";s:5:\"count\";s:3:\"697\";}s:6:\"slider\";a:3:{s:4:\"name\";s:6:\"slider\";s:4:\"slug\";s:6:\"slider\";s:5:\"count\";s:3:\"693\";}s:6:\"search\";a:3:{s:4:\"name\";s:6:\"search\";s:4:\"slug\";s:6:\"search\";s:5:\"count\";s:3:\"679\";}s:6:\"custom\";a:3:{s:4:\"name\";s:6:\"custom\";s:4:\"slug\";s:6:\"custom\";s:5:\"count\";s:3:\"667\";}s:9:\"slideshow\";a:3:{s:4:\"name\";s:9:\"slideshow\";s:4:\"slug\";s:9:\"slideshow\";s:5:\"count\";s:3:\"648\";}s:5:\"stats\";a:3:{s:4:\"name\";s:5:\"stats\";s:4:\"slug\";s:5:\"stats\";s:5:\"count\";s:3:\"625\";}s:6:\"button\";a:3:{s:4:\"name\";s:6:\"button\";s:4:\"slug\";s:6:\"button\";s:5:\"count\";s:3:\"625\";}s:4:\"menu\";a:3:{s:4:\"name\";s:4:\"menu\";s:4:\"slug\";s:4:\"menu\";s:5:\"count\";s:3:\"616\";}s:5:\"theme\";a:3:{s:4:\"name\";s:5:\"theme\";s:4:\"slug\";s:5:\"theme\";s:5:\"count\";s:3:\"606\";}s:9:\"dashboard\";a:3:{s:4:\"name\";s:9:\"dashboard\";s:4:\"slug\";s:9:\"dashboard\";s:5:\"count\";s:3:\"603\";}s:7:\"comment\";a:3:{s:4:\"name\";s:7:\"comment\";s:4:\"slug\";s:7:\"comment\";s:5:\"count\";s:3:\"601\";}s:4:\"tags\";a:3:{s:4:\"name\";s:4:\"tags\";s:4:\"slug\";s:4:\"tags\";s:5:\"count\";s:3:\"598\";}s:10:\"categories\";a:3:{s:4:\"name\";s:10:\"categories\";s:4:\"slug\";s:10:\"categories\";s:5:\"count\";s:3:\"590\";}s:6:\"mobile\";a:3:{s:4:\"name\";s:6:\"mobile\";s:4:\"slug\";s:6:\"mobile\";s:5:\"count\";s:3:\"586\";}s:10:\"statistics\";a:3:{s:4:\"name\";s:10:\"statistics\";s:4:\"slug\";s:10:\"statistics\";s:5:\"count\";s:3:\"575\";}s:3:\"ads\";a:3:{s:4:\"name\";s:3:\"ads\";s:4:\"slug\";s:3:\"ads\";s:5:\"count\";s:3:\"573\";}s:6:\"editor\";a:3:{s:4:\"name\";s:6:\"editor\";s:4:\"slug\";s:6:\"editor\";s:5:\"count\";s:3:\"562\";}s:4:\"user\";a:3:{s:4:\"name\";s:4:\"user\";s:4:\"slug\";s:4:\"user\";s:5:\"count\";s:3:\"562\";}s:5:\"users\";a:3:{s:4:\"name\";s:5:\"users\";s:4:\"slug\";s:5:\"users\";s:5:\"count\";s:3:\"546\";}s:4:\"list\";a:3:{s:4:\"name\";s:4:\"list\";s:4:\"slug\";s:4:\"list\";s:5:\"count\";s:3:\"543\";}s:12:\"social-media\";a:3:{s:4:\"name\";s:12:\"social media\";s:4:\"slug\";s:12:\"social-media\";s:5:\"count\";s:3:\"540\";}s:7:\"plugins\";a:3:{s:4:\"name\";s:7:\"plugins\";s:4:\"slug\";s:7:\"plugins\";s:5:\"count\";s:3:\"526\";}s:12:\"contact-form\";a:3:{s:4:\"name\";s:12:\"contact form\";s:4:\"slug\";s:12:\"contact-form\";s:5:\"count\";s:3:\"525\";}s:6:\"simple\";a:3:{s:4:\"name\";s:6:\"simple\";s:4:\"slug\";s:6:\"simple\";s:5:\"count\";s:3:\"520\";}s:9:\"affiliate\";a:3:{s:4:\"name\";s:9:\"affiliate\";s:4:\"slug\";s:9:\"affiliate\";s:5:\"count\";s:3:\"518\";}s:9:\"multisite\";a:3:{s:4:\"name\";s:9:\"multisite\";s:4:\"slug\";s:9:\"multisite\";s:5:\"count\";s:3:\"518\";}s:7:\"picture\";a:3:{s:4:\"name\";s:7:\"picture\";s:4:\"slug\";s:7:\"picture\";s:5:\"count\";s:3:\"516\";}s:7:\"contact\";a:3:{s:4:\"name\";s:7:\"contact\";s:4:\"slug\";s:7:\"contact\";s:5:\"count\";s:3:\"489\";}s:3:\"api\";a:3:{s:4:\"name\";s:3:\"api\";s:4:\"slug\";s:3:\"api\";s:5:\"count\";s:3:\"479\";}s:9:\"marketing\";a:3:{s:4:\"name\";s:9:\"marketing\";s:4:\"slug\";s:9:\"marketing\";s:5:\"count\";s:3:\"472\";}s:4:\"shop\";a:3:{s:4:\"name\";s:4:\"shop\";s:4:\"slug\";s:4:\"shop\";s:5:\"count\";s:3:\"472\";}s:8:\"pictures\";a:3:{s:4:\"name\";s:8:\"pictures\";s:4:\"slug\";s:8:\"pictures\";s:5:\"count\";s:3:\"464\";}s:3:\"url\";a:3:{s:4:\"name\";s:3:\"url\";s:4:\"slug\";s:3:\"url\";s:5:\"count\";s:3:\"461\";}s:10:\"navigation\";a:3:{s:4:\"name\";s:10:\"navigation\";s:4:\"slug\";s:10:\"navigation\";s:5:\"count\";s:3:\"453\";}s:4:\"html\";a:3:{s:4:\"name\";s:4:\"html\";s:4:\"slug\";s:4:\"html\";s:5:\"count\";s:3:\"446\";}s:6:\"events\";a:3:{s:4:\"name\";s:6:\"events\";s:4:\"slug\";s:6:\"events\";s:5:\"count\";s:3:\"441\";}s:10:\"newsletter\";a:3:{s:4:\"name\";s:10:\"newsletter\";s:4:\"slug\";s:10:\"newsletter\";s:5:\"count\";s:3:\"435\";}s:8:\"tracking\";a:3:{s:4:\"name\";s:8:\"tracking\";s:4:\"slug\";s:8:\"tracking\";s:5:\"count\";s:3:\"428\";}s:8:\"calendar\";a:3:{s:4:\"name\";s:8:\"calendar\";s:4:\"slug\";s:8:\"calendar\";s:5:\"count\";s:3:\"428\";}s:4:\"meta\";a:3:{s:4:\"name\";s:4:\"meta\";s:4:\"slug\";s:4:\"meta\";s:5:\"count\";s:3:\"426\";}s:10:\"shortcodes\";a:3:{s:4:\"name\";s:10:\"shortcodes\";s:4:\"slug\";s:10:\"shortcodes\";s:5:\"count\";s:3:\"425\";}s:5:\"flash\";a:3:{s:4:\"name\";s:5:\"flash\";s:4:\"slug\";s:5:\"flash\";s:5:\"count\";s:3:\"422\";}s:4:\"news\";a:3:{s:4:\"name\";s:4:\"News\";s:4:\"slug\";s:4:\"news\";s:5:\"count\";s:3:\"415\";}s:3:\"tag\";a:3:{s:4:\"name\";s:3:\"tag\";s:4:\"slug\";s:3:\"tag\";s:5:\"count\";s:3:\"415\";}s:11:\"advertising\";a:3:{s:4:\"name\";s:11:\"advertising\";s:4:\"slug\";s:11:\"advertising\";s:5:\"count\";s:3:\"411\";}s:6:\"upload\";a:3:{s:4:\"name\";s:6:\"upload\";s:4:\"slug\";s:6:\"upload\";s:5:\"count\";s:3:\"408\";}s:9:\"thumbnail\";a:3:{s:4:\"name\";s:9:\"thumbnail\";s:4:\"slug\";s:9:\"thumbnail\";s:5:\"count\";s:3:\"407\";}s:7:\"sharing\";a:3:{s:4:\"name\";s:7:\"sharing\";s:4:\"slug\";s:7:\"sharing\";s:5:\"count\";s:3:\"406\";}s:6:\"paypal\";a:3:{s:4:\"name\";s:6:\"paypal\";s:4:\"slug\";s:6:\"paypal\";s:5:\"count\";s:3:\"406\";}s:8:\"lightbox\";a:3:{s:4:\"name\";s:8:\"lightbox\";s:4:\"slug\";s:8:\"lightbox\";s:5:\"count\";s:3:\"405\";}s:7:\"profile\";a:3:{s:4:\"name\";s:7:\"profile\";s:4:\"slug\";s:7:\"profile\";s:5:\"count\";s:3:\"404\";}s:8:\"linkedin\";a:3:{s:4:\"name\";s:8:\"linkedin\";s:4:\"slug\";s:8:\"linkedin\";s:5:\"count\";s:3:\"401\";}s:12:\"notification\";a:3:{s:4:\"name\";s:12:\"notification\";s:4:\"slug\";s:12:\"notification\";s:5:\"count\";s:3:\"401\";}}', 'yes');
INSERT INTO `wp_options` VALUES ('378', 'usp_options', 'a:52:{s:8:\"usp_name\";s:4:\"show\";s:9:\"usp_email\";s:4:\"show\";s:7:\"usp_url\";s:4:\"hide\";s:9:\"usp_title\";s:4:\"show\";s:8:\"usp_tags\";s:4:\"hide\";s:12:\"usp_category\";s:4:\"show\";s:11:\"usp_content\";s:4:\"show\";s:11:\"usp_captcha\";s:4:\"hide\";s:10:\"usp_images\";s:4:\"show\";s:16:\"usp_form_version\";s:6:\"custom\";s:14:\"usp_include_js\";i:1;s:15:\"usp_display_url\";s:0:\"\";s:10:\"categories\";a:6:{i:0;s:1:\"7\";i:1;s:1:\"8\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"4\";i:5;s:1:\"1\";}s:6:\"author\";s:1:\"1\";s:15:\"number-approved\";i:-1;s:12:\"redirect-url\";s:0:\"\";s:15:\"success-message\";s:39:\"Success! Thank you for your submission.\";s:13:\"error-message\";s:116:\"There was an error. Please ensure that you have added a title, some content, and that you have uploaded only images.\";s:16:\"usp_form_content\";s:0:\"\";s:13:\"titles_unique\";i:1;s:16:\"usp_email_alerts\";i:1;s:17:\"usp_email_address\";s:19:\"labkuroky@gmail.com\";s:19:\"email_alert_subject\";s:0:\"\";s:19:\"email_alert_message\";s:0:\"\";s:14:\"usp_use_cat_id\";s:0:\"\";s:12:\"usp_question\";s:7:\"1 + 1 =\";s:12:\"usp_response\";s:1:\"2\";s:19:\"usp_featured_images\";i:1;s:14:\"upload-message\";s:38:\"Please select your image(s) to upload.\";s:15:\"usp_add_another\";s:0:\"\";s:10:\"min-images\";i:0;s:10:\"max-images\";i:1;s:15:\"min-image-width\";i:0;s:16:\"min-image-height\";i:0;s:15:\"max-image-width\";i:1500;s:16:\"max-image-height\";i:1500;s:19:\"auto_display_images\";s:6:\"before\";s:17:\"auto_image_markup\";s:130:\"<a href=\"%%full%%\"><img src=\"%%thumb%%\" width=\"%%width%%\" height=\"%%height%%\" alt=\"%%title%%\" style=\"display:inline-block\" /></a> \";s:18:\"auto_display_email\";s:6:\"before\";s:17:\"auto_email_markup\";s:43:\"<p><a href=\"mailto:%%email%%\">Email</a></p>\";s:16:\"auto_display_url\";s:7:\"disable\";s:15:\"auto_url_markup\";s:32:\"<p><a href=\"%%url%%\">URL</a></p>\";s:13:\"version_alert\";i:0;s:15:\"default_options\";i:0;s:10:\"usp_casing\";i:0;s:14:\"usp_use_author\";i:0;s:11:\"usp_use_url\";i:0;s:11:\"usp_use_cat\";i:0;s:19:\"usp_richtext_editor\";i:0;s:16:\"disable_required\";i:0;s:17:\"enable_shortcodes\";i:0;s:19:\"disable_ip_tracking\";i:0;}', 'yes');
INSERT INTO `wp_options` VALUES ('394', 'wpuf_version', '2.3.13', 'yes');
INSERT INTO `wp_options` VALUES ('397', 'wpuf_general', '', 'yes');
INSERT INTO `wp_options` VALUES ('398', 'wpuf_dashboard', '', 'yes');
INSERT INTO `wp_options` VALUES ('399', 'wpuf_profile', '', 'yes');
INSERT INTO `wp_options` VALUES ('400', 'wpuf_payment', '', 'yes');
INSERT INTO `wp_options` VALUES ('401', 'wpuf_support', '', 'yes');
INSERT INTO `wp_options` VALUES ('402', '_transient_timeout_wpuf_addons', '1469463222', 'no');
INSERT INTO `wp_options` VALUES ('403', '_transient_wpuf_addons', '[{\"title\":\"BuddyPress Profile Integration\",\"desc\":\"Want to use BuddyPress profile fields in frontend registration form? It is really simple and easy to use. Just assign the fields while making the registration form.\",\"thumbnail\":\"https:\\/\\/wedevs-com-wedevs.netdna-ssl.com\\/wp-content\\/uploads\\/2013\\/08\\/BuddyPress-Profile-Integration.jpg\",\"class\":\"WPUF_BP_Profile\",\"url\":\"https:\\/\\/wedevs.com\\/products\\/wp-user-frontend-pro\\/buddypress-profile-integration\\/\"},{\"title\":\"Paid Memberships Pro\",\"desc\":\"Want to use Paid Memberships Pro with frontend posting feature? Here is the add-on you can use with WP User Frontend Pro. It is easy to configure and use.\",\"thumbnail\":\"https:\\/\\/wedevs-com-wedevs.netdna-ssl.com\\/wp-content\\/uploads\\/2013\\/08\\/Paid-Memberships-Pro.jpg\",\"class\":\"WPUF_Pm_Pro\",\"url\":\"https:\\/\\/wedevs.com\\/products\\/wp-user-frontend-pro\\/paid-memberships-pro\\/\"},{\"title\":\"Comments Manager\",\"desc\":\"Want to let the authors manage comments on their own post? Now you can! Just install this add-on along with WP User Frontend Pro- The famous frontend plugin.\",\"thumbnail\":\"https:\\/\\/wedevs-com-wedevs.netdna-ssl.com\\/wp-content\\/uploads\\/2013\\/11\\/Frontend-Comment-Manager.jpg\",\"class\":\"WPUF_Comments\",\"url\":\"https:\\/\\/wedevs.com\\/products\\/wp-user-frontend-pro\\/comments-manager\\/\"},{\"title\":\"User Listing & Profile\",\"desc\":\"Want to built a user directory plugin with custom profile and searching feature? It has all these features along with limiting visibility of profile data.\",\"thumbnail\":\"https:\\/\\/wedevs-com-wedevs.netdna-ssl.com\\/wp-content\\/uploads\\/2014\\/05\\/User-Listing-Profile.jpg\",\"class\":\"WPUF_User_Listing\",\"url\":\"https:\\/\\/wedevs.com\\/products\\/wp-user-frontend-pro\\/user-listing-profile\\/\"},{\"title\":\"User Analytics\",\"desc\":\"This add-on for WP User Frontend collects user IP address, country, timezone, browser and operating system information when the user submit a new post.\",\"thumbnail\":\"https:\\/\\/wedevs-com-wedevs.netdna-ssl.com\\/wp-content\\/uploads\\/2014\\/08\\/User-Analytics.jpg\",\"class\":\"WPUF_User_Analytics\",\"url\":\"https:\\/\\/wedevs.com\\/products\\/wp-user-frontend-pro\\/user-analytics\\/\"},{\"title\":\"Mailchimp Add-On\",\"desc\":\"If you are looking for a solution to add users to mailchimp upon registration, then this is the must have plugin. It is simple, easy, minimal configuration.\",\"thumbnail\":\"https:\\/\\/wedevs-com-wedevs.netdna-ssl.com\\/wp-content\\/uploads\\/2014\\/05\\/Mailchimp.jpg\",\"class\":\"WPUF_Mailchimp\",\"url\":\"https:\\/\\/wedevs.com\\/products\\/wp-user-frontend-pro\\/mailchimp\\/\"},{\"title\":\"Mailpoet Add-On\",\"desc\":\"Looking for a solution to add newly registered users to MailPoet subscribers? This add-on is your key to the power! It works with MailPoet (Wysija) plugin.\",\"thumbnail\":\"https:\\/\\/wedevs-com-wedevs.netdna-ssl.com\\/wp-content\\/uploads\\/2014\\/05\\/MailPoet.jpg\",\"class\":\"WPUF_Mailpoet\",\"url\":\"https:\\/\\/wedevs.com\\/products\\/wp-user-frontend-pro\\/mailpoet\\/\"}]', 'no');
INSERT INTO `wp_options` VALUES ('416', 'widget_wiki_user_contrib', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('423', 'fep_messages', 'a:16:{s:23:\"unsaved_changes_warning\";s:41:\"You have unsaved changes. Proceed anyway?\";s:20:\"confirmation_message\";s:13:\"Are you sure?\";s:16:\"media_lib_string\";s:12:\"Choose Image\";s:20:\"required_field_error\";s:38:\"You missed one or more required fields\";s:18:\"general_form_error\";s:45:\"Your submission has errors. Please try again!\";s:17:\"title_short_error\";s:22:\"The title is too short\";s:16:\"title_long_error\";s:21:\"The title is too long\";s:19:\"article_short_error\";s:24:\"The article is too short\";s:18:\"article_long_error\";s:23:\"The article is too long\";s:15:\"bio_short_error\";s:20:\"The bio is too short\";s:14:\"bio_long_error\";s:19:\"The bio is too long\";s:28:\"too_many_article_links_error\";s:44:\"There are too many links in the article body\";s:24:\"too_many_bio_links_error\";s:35:\"There are too many links in the bio\";s:18:\"too_few_tags_error\";s:45:\"You haven\'t added the required number of tags\";s:19:\"too_many_tags_error\";s:23:\"There are too many tags\";s:20:\"featured_image_error\";s:35:\"You need to choose a featured image\";}', 'yes');
INSERT INTO `wp_options` VALUES ('428', 'category_children', 'a:0:{}', 'yes');
INSERT INTO `wp_options` VALUES ('433', '_site_transient_update_plugins', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1469687066;s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:2:{s:30:\"advanced-custom-fields/acf.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"21367\";s:4:\"slug\";s:22:\"advanced-custom-fields\";s:6:\"plugin\";s:30:\"advanced-custom-fields/acf.php\";s:11:\"new_version\";s:5:\"4.4.8\";s:3:\"url\";s:53:\"https://wordpress.org/plugins/advanced-custom-fields/\";s:7:\"package\";s:71:\"https://downloads.wordpress.org/plugin/advanced-custom-fields.4.4.8.zip\";}s:36:\"contact-form-7/wp-contact-form-7.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:3:\"790\";s:4:\"slug\";s:14:\"contact-form-7\";s:6:\"plugin\";s:36:\"contact-form-7/wp-contact-form-7.php\";s:11:\"new_version\";s:5:\"4.4.2\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/contact-form-7/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/contact-form-7.4.4.2.zip\";}}}', 'yes');
INSERT INTO `wp_options` VALUES ('449', '_site_transient_timeout_browser_83271fd20a6687ffcd0d1b6f7ad13cdd', '1470040094', 'yes');
INSERT INTO `wp_options` VALUES ('450', '_site_transient_browser_83271fd20a6687ffcd0d1b6f7ad13cdd', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:7:\"Firefox\";s:7:\"version\";s:4:\"38.0\";s:10:\"update_url\";s:23:\"http://www.firefox.com/\";s:7:\"img_src\";s:50:\"http://s.wordpress.org/images/browsers/firefox.png\";s:11:\"img_src_ssl\";s:49:\"https://wordpress.org/images/browsers/firefox.png\";s:15:\"current_version\";s:2:\"16\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'yes');
INSERT INTO `wp_options` VALUES ('455', '_site_transient_timeout_browser_8621df93bc649392fd92029726a85c8a', '1470217568', 'yes');
INSERT INTO `wp_options` VALUES ('456', '_site_transient_browser_8621df93bc649392fd92029726a85c8a', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:13:\"51.0.2704.103\";s:10:\"update_url\";s:28:\"http://www.google.com/chrome\";s:7:\"img_src\";s:49:\"http://s.wordpress.org/images/browsers/chrome.png\";s:11:\"img_src_ssl\";s:48:\"https://wordpress.org/images/browsers/chrome.png\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'yes');
INSERT INTO `wp_options` VALUES ('467', '_transient_timeout_plugin_slugs', '1469700139', 'no');
INSERT INTO `wp_options` VALUES ('468', '_transient_plugin_slugs', 'a:4:{i:0;s:30:\"advanced-custom-fields/acf.php\";i:1;s:37:\"acf-options-page/acf-options-page.php\";i:2;s:29:\"acf-repeater/acf-repeater.php\";i:3;s:36:\"contact-form-7/wp-contact-form-7.php\";}', 'no');
INSERT INTO `wp_options` VALUES ('472', '_site_transient_timeout_available_translations', '1469625160', 'yes');
INSERT INTO `wp_options` VALUES ('473', '_site_transient_available_translations', 'a:81:{s:2:\"ar\";a:8:{s:8:\"language\";s:2:\"ar\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-14 10:53:34\";s:12:\"english_name\";s:6:\"Arabic\";s:11:\"native_name\";s:14:\"العربية\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.3/ar.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ar\";i:2;s:3:\"ara\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:16:\"المتابعة\";}}s:3:\"ary\";a:8:{s:8:\"language\";s:3:\"ary\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-04-13 14:44:00\";s:12:\"english_name\";s:15:\"Moroccan Arabic\";s:11:\"native_name\";s:31:\"العربية المغربية\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.5.2/ary.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ar\";i:3;s:3:\"ary\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:16:\"المتابعة\";}}s:2:\"az\";a:8:{s:8:\"language\";s:2:\"az\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-06-18 20:18:13\";s:12:\"english_name\";s:11:\"Azerbaijani\";s:11:\"native_name\";s:16:\"Azərbaycan dili\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.2/az.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"az\";i:2;s:3:\"aze\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:5:\"Davam\";}}s:3:\"azb\";a:8:{s:8:\"language\";s:3:\"azb\";s:7:\"version\";s:5:\"4.4.2\";s:7:\"updated\";s:19:\"2015-12-11 22:42:10\";s:12:\"english_name\";s:17:\"South Azerbaijani\";s:11:\"native_name\";s:29:\"گؤنئی آذربایجان\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.4.2/azb.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"az\";i:3;s:3:\"azb\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continue\";}}s:5:\"bg_BG\";a:8:{s:8:\"language\";s:5:\"bg_BG\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-27 08:19:49\";s:12:\"english_name\";s:9:\"Bulgarian\";s:11:\"native_name\";s:18:\"Български\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/bg_BG.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"bg\";i:2;s:3:\"bul\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:12:\"Напред\";}}s:5:\"bn_BD\";a:8:{s:8:\"language\";s:5:\"bn_BD\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-06-01 06:39:12\";s:12:\"english_name\";s:7:\"Bengali\";s:11:\"native_name\";s:15:\"বাংলা\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.2/bn_BD.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"bn\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:23:\"এগিয়ে চল.\";}}s:5:\"bs_BA\";a:8:{s:8:\"language\";s:5:\"bs_BA\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-04-19 23:16:37\";s:12:\"english_name\";s:7:\"Bosnian\";s:11:\"native_name\";s:8:\"Bosanski\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.2/bs_BA.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"bs\";i:2;s:3:\"bos\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:7:\"Nastavi\";}}s:2:\"ca\";a:8:{s:8:\"language\";s:2:\"ca\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-22 04:43:03\";s:12:\"english_name\";s:7:\"Catalan\";s:11:\"native_name\";s:7:\"Català\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.3/ca.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ca\";i:2;s:3:\"cat\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continua\";}}s:3:\"ceb\";a:8:{s:8:\"language\";s:3:\"ceb\";s:7:\"version\";s:5:\"4.4.3\";s:7:\"updated\";s:19:\"2016-02-16 15:34:57\";s:12:\"english_name\";s:7:\"Cebuano\";s:11:\"native_name\";s:7:\"Cebuano\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.4.3/ceb.zip\";s:3:\"iso\";a:2:{i:2;s:3:\"ceb\";i:3;s:3:\"ceb\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:7:\"Padayun\";}}s:5:\"cs_CZ\";a:8:{s:8:\"language\";s:5:\"cs_CZ\";s:7:\"version\";s:5:\"4.4.2\";s:7:\"updated\";s:19:\"2016-02-11 18:32:36\";s:12:\"english_name\";s:5:\"Czech\";s:11:\"native_name\";s:12:\"Čeština‎\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.4.2/cs_CZ.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"cs\";i:2;s:3:\"ces\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:11:\"Pokračovat\";}}s:2:\"cy\";a:8:{s:8:\"language\";s:2:\"cy\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-01 14:29:56\";s:12:\"english_name\";s:5:\"Welsh\";s:11:\"native_name\";s:7:\"Cymraeg\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.3/cy.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"cy\";i:2;s:3:\"cym\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Parhau\";}}s:5:\"da_DK\";a:8:{s:8:\"language\";s:5:\"da_DK\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-28 11:16:44\";s:12:\"english_name\";s:6:\"Danish\";s:11:\"native_name\";s:5:\"Dansk\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/da_DK.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"da\";i:2;s:3:\"dan\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:12:\"Forts&#230;t\";}}s:12:\"de_DE_formal\";a:8:{s:8:\"language\";s:12:\"de_DE_formal\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-30 18:59:13\";s:12:\"english_name\";s:15:\"German (Formal)\";s:11:\"native_name\";s:13:\"Deutsch (Sie)\";s:7:\"package\";s:71:\"https://downloads.wordpress.org/translation/core/4.5.3/de_DE_formal.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"de\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:10:\"Fortfahren\";}}s:14:\"de_CH_informal\";a:8:{s:8:\"language\";s:14:\"de_CH_informal\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-04-12 20:03:25\";s:12:\"english_name\";s:23:\"(Switzerland, Informal)\";s:11:\"native_name\";s:21:\"Deutsch (Schweiz, Du)\";s:7:\"package\";s:73:\"https://downloads.wordpress.org/translation/core/4.5.2/de_CH_informal.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"de\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Weiter\";}}s:5:\"de_CH\";a:8:{s:8:\"language\";s:5:\"de_CH\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-26 10:08:23\";s:12:\"english_name\";s:20:\"German (Switzerland)\";s:11:\"native_name\";s:17:\"Deutsch (Schweiz)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/de_CH.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"de\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:10:\"Fortfahren\";}}s:5:\"de_DE\";a:8:{s:8:\"language\";s:5:\"de_DE\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-02 11:53:27\";s:12:\"english_name\";s:6:\"German\";s:11:\"native_name\";s:7:\"Deutsch\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/de_DE.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"de\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Weiter\";}}s:2:\"el\";a:8:{s:8:\"language\";s:2:\"el\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-26 19:02:02\";s:12:\"english_name\";s:5:\"Greek\";s:11:\"native_name\";s:16:\"Ελληνικά\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.3/el.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"el\";i:2;s:3:\"ell\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:16:\"Συνέχεια\";}}s:5:\"en_CA\";a:8:{s:8:\"language\";s:5:\"en_CA\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-26 19:24:51\";s:12:\"english_name\";s:16:\"English (Canada)\";s:11:\"native_name\";s:16:\"English (Canada)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/en_CA.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"en\";i:2;s:3:\"eng\";i:3;s:3:\"eng\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continue\";}}s:5:\"en_ZA\";a:8:{s:8:\"language\";s:5:\"en_ZA\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-04-28 11:29:02\";s:12:\"english_name\";s:22:\"English (South Africa)\";s:11:\"native_name\";s:22:\"English (South Africa)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.2/en_ZA.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"en\";i:2;s:3:\"eng\";i:3;s:3:\"eng\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continue\";}}s:5:\"en_NZ\";a:8:{s:8:\"language\";s:5:\"en_NZ\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-21 22:55:40\";s:12:\"english_name\";s:21:\"English (New Zealand)\";s:11:\"native_name\";s:21:\"English (New Zealand)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/en_NZ.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"en\";i:2;s:3:\"eng\";i:3;s:3:\"eng\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continue\";}}s:5:\"en_GB\";a:8:{s:8:\"language\";s:5:\"en_GB\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-21 22:23:41\";s:12:\"english_name\";s:12:\"English (UK)\";s:11:\"native_name\";s:12:\"English (UK)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/en_GB.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"en\";i:2;s:3:\"eng\";i:3;s:3:\"eng\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continue\";}}s:5:\"en_AU\";a:8:{s:8:\"language\";s:5:\"en_AU\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-21 21:28:52\";s:12:\"english_name\";s:19:\"English (Australia)\";s:11:\"native_name\";s:19:\"English (Australia)\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/en_AU.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"en\";i:2;s:3:\"eng\";i:3;s:3:\"eng\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continue\";}}s:2:\"eo\";a:8:{s:8:\"language\";s:2:\"eo\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-29 13:59:02\";s:12:\"english_name\";s:9:\"Esperanto\";s:11:\"native_name\";s:9:\"Esperanto\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.3/eo.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"eo\";i:2;s:3:\"epo\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Daŭrigi\";}}s:5:\"es_MX\";a:8:{s:8:\"language\";s:5:\"es_MX\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-01 14:26:32\";s:12:\"english_name\";s:16:\"Spanish (Mexico)\";s:11:\"native_name\";s:19:\"Español de México\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/es_MX.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_VE\";a:8:{s:8:\"language\";s:5:\"es_VE\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-23 19:36:14\";s:12:\"english_name\";s:19:\"Spanish (Venezuela)\";s:11:\"native_name\";s:21:\"Español de Venezuela\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/es_VE.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_AR\";a:8:{s:8:\"language\";s:5:\"es_AR\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-15 15:42:15\";s:12:\"english_name\";s:19:\"Spanish (Argentina)\";s:11:\"native_name\";s:21:\"Español de Argentina\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/es_AR.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_GT\";a:8:{s:8:\"language\";s:5:\"es_GT\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-04-13 12:43:00\";s:12:\"english_name\";s:19:\"Spanish (Guatemala)\";s:11:\"native_name\";s:21:\"Español de Guatemala\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.2/es_GT.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_PE\";a:8:{s:8:\"language\";s:5:\"es_PE\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-04-16 17:35:43\";s:12:\"english_name\";s:14:\"Spanish (Peru)\";s:11:\"native_name\";s:17:\"Español de Perú\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.2/es_PE.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_CL\";a:8:{s:8:\"language\";s:5:\"es_CL\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-01 14:32:46\";s:12:\"english_name\";s:15:\"Spanish (Chile)\";s:11:\"native_name\";s:17:\"Español de Chile\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/es_CL.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_CO\";a:8:{s:8:\"language\";s:5:\"es_CO\";s:7:\"version\";s:6:\"4.3-RC\";s:7:\"updated\";s:19:\"2015-08-04 06:10:33\";s:12:\"english_name\";s:18:\"Spanish (Colombia)\";s:11:\"native_name\";s:20:\"Español de Colombia\";s:7:\"package\";s:65:\"https://downloads.wordpress.org/translation/core/4.3-RC/es_CO.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"es\";i:2;s:3:\"spa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"es_ES\";a:8:{s:8:\"language\";s:5:\"es_ES\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-21 19:09:44\";s:12:\"english_name\";s:15:\"Spanish (Spain)\";s:11:\"native_name\";s:8:\"Español\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/es_ES.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"es\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:2:\"et\";a:8:{s:8:\"language\";s:2:\"et\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-04-12 11:11:25\";s:12:\"english_name\";s:8:\"Estonian\";s:11:\"native_name\";s:5:\"Eesti\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.2/et.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"et\";i:2;s:3:\"est\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Jätka\";}}s:2:\"eu\";a:8:{s:8:\"language\";s:2:\"eu\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-30 11:41:42\";s:12:\"english_name\";s:6:\"Basque\";s:11:\"native_name\";s:7:\"Euskara\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.3/eu.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"eu\";i:2;s:3:\"eus\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Jarraitu\";}}s:5:\"fa_IR\";a:8:{s:8:\"language\";s:5:\"fa_IR\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-06-20 14:58:27\";s:12:\"english_name\";s:7:\"Persian\";s:11:\"native_name\";s:10:\"فارسی\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.2/fa_IR.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"fa\";i:2;s:3:\"fas\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:10:\"ادامه\";}}s:2:\"fi\";a:8:{s:8:\"language\";s:2:\"fi\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-26 09:08:24\";s:12:\"english_name\";s:7:\"Finnish\";s:11:\"native_name\";s:5:\"Suomi\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.3/fi.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"fi\";i:2;s:3:\"fin\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:5:\"Jatka\";}}s:5:\"fr_CA\";a:8:{s:8:\"language\";s:5:\"fr_CA\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-13 12:55:08\";s:12:\"english_name\";s:15:\"French (Canada)\";s:11:\"native_name\";s:19:\"Français du Canada\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/fr_CA.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"fr\";i:2;s:3:\"fra\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuer\";}}s:5:\"fr_FR\";a:8:{s:8:\"language\";s:5:\"fr_FR\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-20 09:10:22\";s:12:\"english_name\";s:15:\"French (France)\";s:11:\"native_name\";s:9:\"Français\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/fr_FR.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"fr\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuer\";}}s:5:\"fr_BE\";a:8:{s:8:\"language\";s:5:\"fr_BE\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-22 06:33:34\";s:12:\"english_name\";s:16:\"French (Belgium)\";s:11:\"native_name\";s:21:\"Français de Belgique\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/fr_BE.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"fr\";i:2;s:3:\"fra\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuer\";}}s:2:\"gd\";a:8:{s:8:\"language\";s:2:\"gd\";s:7:\"version\";s:5:\"4.3.4\";s:7:\"updated\";s:19:\"2015-09-24 15:25:30\";s:12:\"english_name\";s:15:\"Scottish Gaelic\";s:11:\"native_name\";s:9:\"Gàidhlig\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.3.4/gd.zip\";s:3:\"iso\";a:3:{i:1;s:2:\"gd\";i:2;s:3:\"gla\";i:3;s:3:\"gla\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:15:\"Lean air adhart\";}}s:5:\"gl_ES\";a:8:{s:8:\"language\";s:5:\"gl_ES\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-28 21:28:18\";s:12:\"english_name\";s:8:\"Galician\";s:11:\"native_name\";s:6:\"Galego\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/gl_ES.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"gl\";i:2;s:3:\"glg\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:3:\"haz\";a:8:{s:8:\"language\";s:3:\"haz\";s:7:\"version\";s:5:\"4.4.2\";s:7:\"updated\";s:19:\"2015-12-05 00:59:09\";s:12:\"english_name\";s:8:\"Hazaragi\";s:11:\"native_name\";s:15:\"هزاره گی\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.4.2/haz.zip\";s:3:\"iso\";a:1:{i:3;s:3:\"haz\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:10:\"ادامه\";}}s:5:\"he_IL\";a:8:{s:8:\"language\";s:5:\"he_IL\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-26 15:19:37\";s:12:\"english_name\";s:6:\"Hebrew\";s:11:\"native_name\";s:16:\"עִבְרִית\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/he_IL.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"he\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"המשך\";}}s:5:\"hi_IN\";a:8:{s:8:\"language\";s:5:\"hi_IN\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-22 11:01:09\";s:12:\"english_name\";s:5:\"Hindi\";s:11:\"native_name\";s:18:\"हिन्दी\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/hi_IN.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"hi\";i:2;s:3:\"hin\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:12:\"जारी\";}}s:2:\"hr\";a:8:{s:8:\"language\";s:2:\"hr\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-28 10:01:58\";s:12:\"english_name\";s:8:\"Croatian\";s:11:\"native_name\";s:8:\"Hrvatski\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.3/hr.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"hr\";i:2;s:3:\"hrv\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:7:\"Nastavi\";}}s:5:\"hu_HU\";a:8:{s:8:\"language\";s:5:\"hu_HU\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-21 18:58:51\";s:12:\"english_name\";s:9:\"Hungarian\";s:11:\"native_name\";s:6:\"Magyar\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/hu_HU.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"hu\";i:2;s:3:\"hun\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:10:\"Folytatás\";}}s:2:\"hy\";a:8:{s:8:\"language\";s:2:\"hy\";s:7:\"version\";s:5:\"4.4.2\";s:7:\"updated\";s:19:\"2016-02-04 07:13:54\";s:12:\"english_name\";s:8:\"Armenian\";s:11:\"native_name\";s:14:\"Հայերեն\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.4.2/hy.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"hy\";i:2;s:3:\"hye\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:20:\"Շարունակել\";}}s:5:\"id_ID\";a:8:{s:8:\"language\";s:5:\"id_ID\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-29 09:14:16\";s:12:\"english_name\";s:10:\"Indonesian\";s:11:\"native_name\";s:16:\"Bahasa Indonesia\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/id_ID.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"id\";i:2;s:3:\"ind\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Lanjutkan\";}}s:5:\"is_IS\";a:8:{s:8:\"language\";s:5:\"is_IS\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-21 19:10:05\";s:12:\"english_name\";s:9:\"Icelandic\";s:11:\"native_name\";s:9:\"Íslenska\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/is_IS.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"is\";i:2;s:3:\"isl\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Áfram\";}}s:5:\"it_IT\";a:8:{s:8:\"language\";s:5:\"it_IT\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-26 09:12:51\";s:12:\"english_name\";s:7:\"Italian\";s:11:\"native_name\";s:8:\"Italiano\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/it_IT.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"it\";i:2;s:3:\"ita\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Continua\";}}s:2:\"ja\";a:8:{s:8:\"language\";s:2:\"ja\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-21 20:05:02\";s:12:\"english_name\";s:8:\"Japanese\";s:11:\"native_name\";s:9:\"日本語\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.3/ja.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"ja\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"続ける\";}}s:5:\"ka_GE\";a:8:{s:8:\"language\";s:5:\"ka_GE\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-15 07:32:48\";s:12:\"english_name\";s:8:\"Georgian\";s:11:\"native_name\";s:21:\"ქართული\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/ka_GE.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ka\";i:2;s:3:\"kat\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:30:\"გაგრძელება\";}}s:5:\"ko_KR\";a:8:{s:8:\"language\";s:5:\"ko_KR\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-23 09:09:28\";s:12:\"english_name\";s:6:\"Korean\";s:11:\"native_name\";s:9:\"한국어\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/ko_KR.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ko\";i:2;s:3:\"kor\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"계속\";}}s:5:\"lt_LT\";a:8:{s:8:\"language\";s:5:\"lt_LT\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-22 09:14:39\";s:12:\"english_name\";s:10:\"Lithuanian\";s:11:\"native_name\";s:15:\"Lietuvių kalba\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/lt_LT.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"lt\";i:2;s:3:\"lit\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Tęsti\";}}s:5:\"mk_MK\";a:8:{s:8:\"language\";s:5:\"mk_MK\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-05-12 13:55:28\";s:12:\"english_name\";s:10:\"Macedonian\";s:11:\"native_name\";s:31:\"Македонски јазик\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.2/mk_MK.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"mk\";i:2;s:3:\"mkd\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:16:\"Продолжи\";}}s:2:\"mr\";a:8:{s:8:\"language\";s:2:\"mr\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-05-16 06:42:31\";s:12:\"english_name\";s:7:\"Marathi\";s:11:\"native_name\";s:15:\"मराठी\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.2/mr.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"mr\";i:2;s:3:\"mar\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:25:\"सुरु ठेवा\";}}s:5:\"ms_MY\";a:8:{s:8:\"language\";s:5:\"ms_MY\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-28 05:36:22\";s:12:\"english_name\";s:5:\"Malay\";s:11:\"native_name\";s:13:\"Bahasa Melayu\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/ms_MY.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ms\";i:2;s:3:\"msa\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Teruskan\";}}s:5:\"my_MM\";a:8:{s:8:\"language\";s:5:\"my_MM\";s:7:\"version\";s:6:\"4.1.12\";s:7:\"updated\";s:19:\"2015-03-26 15:57:42\";s:12:\"english_name\";s:17:\"Myanmar (Burmese)\";s:11:\"native_name\";s:15:\"ဗမာစာ\";s:7:\"package\";s:65:\"https://downloads.wordpress.org/translation/core/4.1.12/my_MM.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"my\";i:2;s:3:\"mya\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:54:\"ဆက်လက်လုပ်ဆောင်ပါ။\";}}s:5:\"nb_NO\";a:8:{s:8:\"language\";s:5:\"nb_NO\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-11 07:19:28\";s:12:\"english_name\";s:19:\"Norwegian (Bokmål)\";s:11:\"native_name\";s:13:\"Norsk bokmål\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/nb_NO.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"nb\";i:2;s:3:\"nob\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Fortsett\";}}s:5:\"nl_NL\";a:8:{s:8:\"language\";s:5:\"nl_NL\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-15 10:43:48\";s:12:\"english_name\";s:5:\"Dutch\";s:11:\"native_name\";s:10:\"Nederlands\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/nl_NL.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"nl\";i:2;s:3:\"nld\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Doorgaan\";}}s:12:\"nl_NL_formal\";a:8:{s:8:\"language\";s:12:\"nl_NL_formal\";s:7:\"version\";s:5:\"4.4.3\";s:7:\"updated\";s:19:\"2016-01-20 13:35:50\";s:12:\"english_name\";s:14:\"Dutch (Formal)\";s:11:\"native_name\";s:20:\"Nederlands (Formeel)\";s:7:\"package\";s:71:\"https://downloads.wordpress.org/translation/core/4.4.3/nl_NL_formal.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"nl\";i:2;s:3:\"nld\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Doorgaan\";}}s:5:\"nn_NO\";a:8:{s:8:\"language\";s:5:\"nn_NO\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-23 11:56:46\";s:12:\"english_name\";s:19:\"Norwegian (Nynorsk)\";s:11:\"native_name\";s:13:\"Norsk nynorsk\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/nn_NO.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"nn\";i:2;s:3:\"nno\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Hald fram\";}}s:3:\"oci\";a:8:{s:8:\"language\";s:3:\"oci\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-25 15:00:30\";s:12:\"english_name\";s:7:\"Occitan\";s:11:\"native_name\";s:7:\"Occitan\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.5.3/oci.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"oc\";i:2;s:3:\"oci\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Contunhar\";}}s:5:\"pl_PL\";a:8:{s:8:\"language\";s:5:\"pl_PL\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-23 08:13:15\";s:12:\"english_name\";s:6:\"Polish\";s:11:\"native_name\";s:6:\"Polski\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/pl_PL.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"pl\";i:2;s:3:\"pol\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Kontynuuj\";}}s:2:\"ps\";a:8:{s:8:\"language\";s:2:\"ps\";s:7:\"version\";s:6:\"4.1.12\";s:7:\"updated\";s:19:\"2015-03-29 22:19:48\";s:12:\"english_name\";s:6:\"Pashto\";s:11:\"native_name\";s:8:\"پښتو\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/translation/core/4.1.12/ps.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ps\";i:2;s:3:\"pus\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:19:\"دوام ورکړه\";}}s:5:\"pt_BR\";a:8:{s:8:\"language\";s:5:\"pt_BR\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-30 23:41:16\";s:12:\"english_name\";s:19:\"Portuguese (Brazil)\";s:11:\"native_name\";s:20:\"Português do Brasil\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/pt_BR.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"pt\";i:2;s:3:\"por\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"pt_PT\";a:8:{s:8:\"language\";s:5:\"pt_PT\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-22 08:39:06\";s:12:\"english_name\";s:21:\"Portuguese (Portugal)\";s:11:\"native_name\";s:10:\"Português\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/pt_PT.zip\";s:3:\"iso\";a:1:{i:1;s:2:\"pt\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuar\";}}s:5:\"ro_RO\";a:8:{s:8:\"language\";s:5:\"ro_RO\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-28 05:26:21\";s:12:\"english_name\";s:8:\"Romanian\";s:11:\"native_name\";s:8:\"Română\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/ro_RO.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ro\";i:2;s:3:\"ron\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Continuă\";}}s:5:\"ru_RU\";a:8:{s:8:\"language\";s:5:\"ru_RU\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-26 13:55:57\";s:12:\"english_name\";s:7:\"Russian\";s:11:\"native_name\";s:14:\"Русский\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/ru_RU.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ru\";i:2;s:3:\"rus\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:20:\"Продолжить\";}}s:5:\"sk_SK\";a:8:{s:8:\"language\";s:5:\"sk_SK\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-05-29 09:53:12\";s:12:\"english_name\";s:6:\"Slovak\";s:11:\"native_name\";s:11:\"Slovenčina\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.2/sk_SK.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"sk\";i:2;s:3:\"slk\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:12:\"Pokračovať\";}}s:5:\"sl_SI\";a:8:{s:8:\"language\";s:5:\"sl_SI\";s:7:\"version\";s:5:\"4.4.2\";s:7:\"updated\";s:19:\"2015-11-26 00:00:18\";s:12:\"english_name\";s:9:\"Slovenian\";s:11:\"native_name\";s:13:\"Slovenščina\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.4.2/sl_SI.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"sl\";i:2;s:3:\"slv\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:8:\"Nadaljuj\";}}s:2:\"sq\";a:8:{s:8:\"language\";s:2:\"sq\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-23 09:08:48\";s:12:\"english_name\";s:8:\"Albanian\";s:11:\"native_name\";s:5:\"Shqip\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.3/sq.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"sq\";i:2;s:3:\"sqi\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"Vazhdo\";}}s:5:\"sr_RS\";a:8:{s:8:\"language\";s:5:\"sr_RS\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-04-10 08:00:57\";s:12:\"english_name\";s:7:\"Serbian\";s:11:\"native_name\";s:23:\"Српски језик\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.2/sr_RS.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"sr\";i:2;s:3:\"srp\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:14:\"Настави\";}}s:5:\"sv_SE\";a:8:{s:8:\"language\";s:5:\"sv_SE\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-23 10:13:40\";s:12:\"english_name\";s:7:\"Swedish\";s:11:\"native_name\";s:7:\"Svenska\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/sv_SE.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"sv\";i:2;s:3:\"swe\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:9:\"Fortsätt\";}}s:2:\"th\";a:8:{s:8:\"language\";s:2:\"th\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-30 10:22:26\";s:12:\"english_name\";s:4:\"Thai\";s:11:\"native_name\";s:9:\"ไทย\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.3/th.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"th\";i:2;s:3:\"tha\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:15:\"ต่อไป\";}}s:2:\"tl\";a:8:{s:8:\"language\";s:2:\"tl\";s:7:\"version\";s:5:\"4.4.2\";s:7:\"updated\";s:19:\"2015-11-27 15:51:36\";s:12:\"english_name\";s:7:\"Tagalog\";s:11:\"native_name\";s:7:\"Tagalog\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.4.2/tl.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"tl\";i:2;s:3:\"tgl\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:10:\"Magpatuloy\";}}s:5:\"tr_TR\";a:8:{s:8:\"language\";s:5:\"tr_TR\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-26 08:25:58\";s:12:\"english_name\";s:7:\"Turkish\";s:11:\"native_name\";s:8:\"Türkçe\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/tr_TR.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"tr\";i:2;s:3:\"tur\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:5:\"Devam\";}}s:5:\"ug_CN\";a:8:{s:8:\"language\";s:5:\"ug_CN\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-06-22 12:27:05\";s:12:\"english_name\";s:6:\"Uighur\";s:11:\"native_name\";s:9:\"Uyƣurqə\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.3/ug_CN.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"ug\";i:2;s:3:\"uig\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:26:\"داۋاملاشتۇرۇش\";}}s:2:\"uk\";a:8:{s:8:\"language\";s:2:\"uk\";s:7:\"version\";s:5:\"4.5.3\";s:7:\"updated\";s:19:\"2016-07-20 19:27:06\";s:12:\"english_name\";s:9:\"Ukrainian\";s:11:\"native_name\";s:20:\"Українська\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.5.3/uk.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"uk\";i:2;s:3:\"ukr\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:20:\"Продовжити\";}}s:2:\"vi\";a:8:{s:8:\"language\";s:2:\"vi\";s:7:\"version\";s:5:\"4.4.2\";s:7:\"updated\";s:19:\"2015-12-09 01:01:25\";s:12:\"english_name\";s:10:\"Vietnamese\";s:11:\"native_name\";s:14:\"Tiếng Việt\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/translation/core/4.4.2/vi.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"vi\";i:2;s:3:\"vie\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:12:\"Tiếp tục\";}}s:5:\"zh_TW\";a:8:{s:8:\"language\";s:5:\"zh_TW\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-04-12 09:08:07\";s:12:\"english_name\";s:16:\"Chinese (Taiwan)\";s:11:\"native_name\";s:12:\"繁體中文\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.2/zh_TW.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"zh\";i:2;s:3:\"zho\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"繼續\";}}s:5:\"zh_CN\";a:8:{s:8:\"language\";s:5:\"zh_CN\";s:7:\"version\";s:5:\"4.5.2\";s:7:\"updated\";s:19:\"2016-04-17 03:29:01\";s:12:\"english_name\";s:15:\"Chinese (China)\";s:11:\"native_name\";s:12:\"简体中文\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.5.2/zh_CN.zip\";s:3:\"iso\";a:2:{i:1;s:2:\"zh\";i:2;s:3:\"zho\";}s:7:\"strings\";a:1:{s:8:\"continue\";s:6:\"继续\";}}}', 'yes');
INSERT INTO `wp_options` VALUES ('476', '_site_transient_timeout_theme_roots', '1469688863', 'yes');
INSERT INTO `wp_options` VALUES ('477', '_site_transient_theme_roots', 'a:4:{s:15:\"realvsfakeguide\";s:7:\"/themes\";s:13:\"twentyfifteen\";s:7:\"/themes\";s:14:\"twentyfourteen\";s:7:\"/themes\";s:13:\"twentysixteen\";s:7:\"/themes\";}', 'yes');
INSERT INTO `wp_options` VALUES ('478', '_transient_timeout_feed_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1469732138', 'no');
INSERT INTO `wp_options` VALUES ('479', '_transient_timeout_feed_mod_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1469732138', 'no');
INSERT INTO `wp_options` VALUES ('480', '_transient_feed_mod_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1469688938', 'no');
INSERT INTO `wp_options` VALUES ('481', '_transient_timeout_feed_d117b5738fbd35bd8c0391cda1f2b5d9', '1469732140', 'no');
INSERT INTO `wp_options` VALUES ('482', '_transient_timeout_feed_mod_d117b5738fbd35bd8c0391cda1f2b5d9', '1469732140', 'no');
INSERT INTO `wp_options` VALUES ('483', '_transient_feed_mod_d117b5738fbd35bd8c0391cda1f2b5d9', '1469688940', 'no');
INSERT INTO `wp_options` VALUES ('484', '_transient_timeout_feed_b9388c83948825c1edaef0d856b7b109', '1469732141', 'no');
INSERT INTO `wp_options` VALUES ('485', '_transient_feed_b9388c83948825c1edaef0d856b7b109', 'a:4:{s:5:\"child\";a:1:{s:0:\"\";a:1:{s:3:\"rss\";a:1:{i:0;a:6:{s:4:\"data\";s:3:\"\n	\n\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:7:\"version\";s:3:\"2.0\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:1:{s:0:\"\";a:1:{s:7:\"channel\";a:1:{i:0;a:6:{s:4:\"data\";s:117:\"\n		\n		\n		\n		\n		\n		\n				\n\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n\n	\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:7:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"WordPress Plugins » View: Popular\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:45:\"https://wordpress.org/plugins/browse/popular/\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"WordPress Plugins » View: Popular\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:8:\"language\";a:1:{i:0;a:5:{s:4:\"data\";s:5:\"en-US\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 28 Jul 2016 06:29:03 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:9:\"generator\";a:1:{i:0;a:5:{s:4:\"data\";s:25:\"http://bbpress.org/?v=1.1\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"item\";a:30:{i:0;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:14:\"Duplicate Post\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:55:\"https://wordpress.org/plugins/duplicate-post/#post-2646\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Wed, 05 Dec 2007 17:40:03 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"2646@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:22:\"Clone posts and pages.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:4:\"Lopo\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:1;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:18:\"WordPress Importer\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:60:\"https://wordpress.org/plugins/wordpress-importer/#post-18101\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 20 May 2010 17:42:45 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"18101@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:101:\"Import posts, pages, comments, custom fields, categories, tags and more from a WordPress export file.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:14:\"Brian Colinger\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:2;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"Google Analytics by MonsterInsights\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:71:\"https://wordpress.org/plugins/google-analytics-for-wordpress/#post-2316\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Fri, 14 Sep 2007 12:15:27 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"2316@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:113:\"Connect Google Analytics with WordPress by adding your Google Analytics tracking code. Get the stats that matter.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:11:\"Syed Balkhi\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:3;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:24:\"Jetpack by WordPress.com\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:49:\"https://wordpress.org/plugins/jetpack/#post-23862\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 20 Jan 2011 02:21:38 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"23862@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:107:\"Increase your traffic, view your stats, speed up your site, and protect yourself from hackers with Jetpack.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:10:\"Automattic\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:4;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:26:\"Page Builder by SiteOrigin\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:59:\"https://wordpress.org/plugins/siteorigin-panels/#post-51888\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 11 Apr 2013 10:36:42 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"51888@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:111:\"Build responsive page layouts using the widgets you know and love using this simple drag and drop page builder.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:11:\"Greg Priday\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:5;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:19:\"Google XML Sitemaps\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:64:\"https://wordpress.org/plugins/google-sitemap-generator/#post-132\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Fri, 09 Mar 2007 22:31:32 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"132@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:105:\"This plugin will generate a special XML sitemap which will help search engines to better index your blog.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:14:\"Arne Brachhold\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:6;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:21:\"Really Simple CAPTCHA\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:62:\"https://wordpress.org/plugins/really-simple-captcha/#post-9542\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Mon, 09 Mar 2009 02:17:35 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"9542@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:138:\"Really Simple CAPTCHA is a CAPTCHA module intended to be called from other plugins. It is originally created for my Contact Form 7 plugin.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:16:\"Takayuki Miyoshi\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:7;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:22:\"Advanced Custom Fields\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:64:\"https://wordpress.org/plugins/advanced-custom-fields/#post-25254\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 17 Mar 2011 04:07:30 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"25254@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:68:\"Customise WordPress with powerful, professional and intuitive fields\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:12:\"elliotcondon\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:8;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:14:\"W3 Total Cache\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:56:\"https://wordpress.org/plugins/w3-total-cache/#post-12073\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Wed, 29 Jul 2009 18:46:31 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"12073@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:132:\"Easy Web Performance Optimization (WPO) using caching: browser, page, object, database, minify and content delivery network support.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:16:\"Frederick Townes\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:9;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:19:\"All in One SEO Pack\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:59:\"https://wordpress.org/plugins/all-in-one-seo-pack/#post-753\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Fri, 30 Mar 2007 20:08:18 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"753@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:150:\"The most downloaded plugin for WordPress (almost 30 million downloads). Use All in One SEO Pack to automatically optimize your site for Search Engines\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:8:\"uberdose\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:10;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:9:\"Yoast SEO\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:54:\"https://wordpress.org/plugins/wordpress-seo/#post-8321\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 01 Jan 2009 20:34:44 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"8321@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:114:\"Improve your WordPress SEO: Write better content and have a fully optimized WordPress site using Yoast SEO plugin.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:13:\"Joost de Valk\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:11;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:18:\"Wordfence Security\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:51:\"https://wordpress.org/plugins/wordfence/#post-29832\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Sun, 04 Sep 2011 03:13:51 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"29832@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:150:\"Secure your website with the Wordfence security plugin for WordPress.  Wordfence provides free enterprise-class WordPress security, protecting your we\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:9:\"Wordfence\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:12;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:16:\"TinyMCE Advanced\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:57:\"https://wordpress.org/plugins/tinymce-advanced/#post-2082\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Wed, 27 Jun 2007 15:00:26 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"2082@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:71:\"Enables the advanced features of TinyMCE, the WordPress WYSIWYG editor.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:10:\"Andrew Ozz\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:13;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:14:\"WP Super Cache\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:55:\"https://wordpress.org/plugins/wp-super-cache/#post-2572\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Mon, 05 Nov 2007 11:40:04 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"2572@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:73:\"A very fast caching engine for WordPress that produces static html files.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:16:\"Donncha O Caoimh\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:14;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:14:\"Contact Form 7\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:55:\"https://wordpress.org/plugins/contact-form-7/#post-2141\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 02 Aug 2007 12:45:03 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"2141@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:54:\"Just another contact form plugin. Simple but flexible.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:16:\"Takayuki Miyoshi\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:15;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:15:\"NextGEN Gallery\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:56:\"https://wordpress.org/plugins/nextgen-gallery/#post-1169\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Mon, 23 Apr 2007 20:08:06 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"1169@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:121:\"The most popular WordPress gallery plugin and one of the most popular plugins of all time with over 15 million downloads.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:9:\"Alex Rabe\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:16;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:21:\"Regenerate Thumbnails\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:62:\"https://wordpress.org/plugins/regenerate-thumbnails/#post-6743\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Sat, 23 Aug 2008 14:38:58 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"6743@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:76:\"Allows you to regenerate your thumbnails after changing the thumbnail sizes.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:25:\"Alex Mills (Viper007Bond)\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:17;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:11:\"Hello Dolly\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:52:\"https://wordpress.org/plugins/hello-dolly/#post-5790\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 29 May 2008 22:11:34 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"5790@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:150:\"This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:14:\"Matt Mullenweg\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:18;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:7:\"Akismet\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:46:\"https://wordpress.org/plugins/akismet/#post-15\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Fri, 09 Mar 2007 22:11:30 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:33:\"15@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:98:\"Akismet checks your comments against the Akismet Web service to see if they look like spam or not.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:14:\"Matt Mullenweg\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:19;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:11:\"WP-PageNavi\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:51:\"https://wordpress.org/plugins/wp-pagenavi/#post-363\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Fri, 09 Mar 2007 23:17:57 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:34:\"363@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:49:\"Adds a more advanced paging navigation interface.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:11:\"Lester Chan\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:20;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:11:\"WooCommerce\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:53:\"https://wordpress.org/plugins/woocommerce/#post-29860\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Mon, 05 Sep 2011 08:13:36 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"29860@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:97:\"WooCommerce is a powerful, extendable eCommerce plugin that helps you sell anything. Beautifully.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:9:\"WooThemes\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:21;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:16:\"Disable Comments\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:58:\"https://wordpress.org/plugins/disable-comments/#post-26907\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Fri, 27 May 2011 04:42:58 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"26907@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:134:\"Allows administrators to globally disable comments on their site. Comments can be disabled according to post type. Multisite friendly.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:10:\"Samir Shah\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:22;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:18:\"WP Multibyte Patch\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:60:\"https://wordpress.org/plugins/wp-multibyte-patch/#post-28395\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 14 Jul 2011 12:22:53 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"28395@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:71:\"Multibyte functionality enhancement for the WordPress Japanese package.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:13:\"plugin-master\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:23;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:33:\"Google Analytics Dashboard for WP\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:75:\"https://wordpress.org/plugins/google-analytics-dashboard-for-wp/#post-50539\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Sun, 10 Mar 2013 17:07:11 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"50539@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:127:\"Displays Google Analytics reports in your WordPress Dashboard. Inserts the latest Google Analytics tracking code in your pages.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:10:\"Alin Marcu\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:24;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:27:\"Black Studio TinyMCE Widget\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:69:\"https://wordpress.org/plugins/black-studio-tinymce-widget/#post-31973\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 10 Nov 2011 15:06:14 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"31973@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:39:\"The visual editor widget for Wordpress.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:12:\"Marco Chiesi\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:25;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:35:\"UpdraftPlus WordPress Backup Plugin\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:53:\"https://wordpress.org/plugins/updraftplus/#post-38058\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Mon, 21 May 2012 15:14:11 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"38058@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:148:\"Backup and restoration made easy. Complete backups; manual or scheduled (backup to S3, Dropbox, Google Drive, Rackspace, FTP, SFTP, email + others).\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:14:\"David Anderson\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:26;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:30:\"Clef Two-Factor Authentication\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:48:\"https://wordpress.org/plugins/wpclef/#post-47509\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 27 Dec 2012 01:25:57 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"47509@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:139:\"Modern two-factor that people love to use: strong authentication without passwords or tokens; single sign on/off; magical login experience.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:9:\"Dave Ross\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:27;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:46:\"iThemes Security (formerly Better WP Security)\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:60:\"https://wordpress.org/plugins/better-wp-security/#post-21738\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Fri, 22 Oct 2010 22:06:05 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"21738@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:146:\"Take the guesswork out of WordPress security. iThemes Security offers 30+ ways to lock down WordPress in an easy-to-use WordPress security plugin.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:7:\"iThemes\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:28;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:10:\"Duplicator\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:52:\"https://wordpress.org/plugins/duplicator/#post-26607\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Mon, 16 May 2011 12:15:41 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"26607@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:88:\"Duplicate, clone, backup, move and transfer an entire site from one location to another.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:10:\"Cory Lamle\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}i:29;a:6:{s:4:\"data\";s:30:\"\n			\n			\n			\n			\n			\n			\n					\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";s:5:\"child\";a:2:{s:0:\"\";a:5:{s:5:\"title\";a:1:{i:0;a:5:{s:4:\"data\";s:11:\"Meta Slider\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:51:\"https://wordpress.org/plugins/ml-slider/#post-49521\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:7:\"pubDate\";a:1:{i:0;a:5:{s:4:\"data\";s:31:\"Thu, 14 Feb 2013 16:56:31 +0000\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:4:\"guid\";a:1:{i:0;a:5:{s:4:\"data\";s:36:\"49521@https://wordpress.org/plugins/\";s:7:\"attribs\";a:1:{s:0:\"\";a:1:{s:11:\"isPermaLink\";s:5:\"false\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}s:11:\"description\";a:1:{i:0;a:5:{s:4:\"data\";s:131:\"Easy to use WordPress Slider plugin. Create responsive slideshows with Nivo Slider, Flex Slider, Coin Slider and Responsive Slides.\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}s:32:\"http://purl.org/dc/elements/1.1/\";a:1:{s:7:\"creator\";a:1:{i:0;a:5:{s:4:\"data\";s:11:\"Matcha Labs\";s:7:\"attribs\";a:0:{}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}}}s:27:\"http://www.w3.org/2005/Atom\";a:1:{s:4:\"link\";a:1:{i:0;a:5:{s:4:\"data\";s:0:\"\";s:7:\"attribs\";a:1:{s:0:\"\";a:3:{s:4:\"href\";s:46:\"https://wordpress.org/plugins/rss/view/popular\";s:3:\"rel\";s:4:\"self\";s:4:\"type\";s:19:\"application/rss+xml\";}}s:8:\"xml_base\";s:0:\"\";s:17:\"xml_base_explicit\";b:0;s:8:\"xml_lang\";s:0:\"\";}}}}}}}}}}}}s:4:\"type\";i:128;s:7:\"headers\";a:12:{s:6:\"server\";s:5:\"nginx\";s:4:\"date\";s:29:\"Thu, 28 Jul 2016 06:55:41 GMT\";s:12:\"content-type\";s:23:\"text/xml; charset=UTF-8\";s:10:\"connection\";s:5:\"close\";s:4:\"vary\";s:15:\"Accept-Encoding\";s:25:\"strict-transport-security\";s:11:\"max-age=360\";s:7:\"expires\";s:29:\"Thu, 28 Jul 2016 07:04:03 GMT\";s:13:\"cache-control\";s:0:\"\";s:6:\"pragma\";s:0:\"\";s:13:\"last-modified\";s:31:\"Thu, 28 Jul 2016 06:29:03 +0000\";s:15:\"x-frame-options\";s:10:\"SAMEORIGIN\";s:4:\"x-nc\";s:11:\"HIT lax 250\";}s:5:\"build\";s:14:\"20160727092825\";}', 'no');
INSERT INTO `wp_options` VALUES ('486', '_transient_timeout_feed_mod_b9388c83948825c1edaef0d856b7b109', '1469732141', 'no');
INSERT INTO `wp_options` VALUES ('487', '_transient_feed_mod_b9388c83948825c1edaef0d856b7b109', '1469688941', 'no');
INSERT INTO `wp_options` VALUES ('488', '_transient_timeout_dash_88ae138922fe95674369b1cb3d215a2b', '1469732141', 'no');
INSERT INTO `wp_options` VALUES ('489', '_transient_dash_88ae138922fe95674369b1cb3d215a2b', '<div class=\"rss-widget\"><ul><li><a class=\'rsswidget\' href=\'https://wordpress.org/news/2016/07/wordpress-4-6-release-candidate/\'>WordPress 4.6 Release Candidate</a> <span class=\"rss-date\">July 27, 2016</span><div class=\"rssSummary\">The release candidate for WordPress 4.6 is now available. We’ve made a few refinements since releasing Beta 4 a week ago. RC means we think we’re done, but with millions of users and thousands of plugins and themes, it’s possible we’ve missed something. We hope to ship WordPress 4.6 on Tuesday, August 16, but we need [&hellip;]</div></li></ul></div><div class=\"rss-widget\"><ul><li><a class=\'rsswidget\' href=\'http://blog.wordpress.tv/2016/07/28/matt-gibbs-diving-into-commercial-plugin-development/\'>WordPress.tv Blog: Matt Gibbs: Diving Into Commercial Plugin Development</a></li><li><a class=\'rsswidget\' href=\'https://wptavern.com/cory-miller-and-matt-danner-launch-new-business-podcast\'>WPTavern: Cory Miller and Matt Danner Launch New Business Podcast</a></li><li><a class=\'rsswidget\' href=\'https://wptavern.com/wordpress-for-android-5-6-adds-screen-to-invite-new-users-expands-reader-to-include-related-posts\'>WPTavern: WordPress for Android 5.6 Adds Screen to Invite New Users, Expands Reader to Include Related Posts</a></li></ul></div><div class=\"rss-widget\"><ul><li class=\"dashboard-news-plugin\"><span>Popular Plugin:</span> Google Analytics Dashboard for WP&nbsp;<a href=\"plugin-install.php?tab=plugin-information&amp;plugin=google-analytics-dashboard-for-wp&amp;_wpnonce=f162feb5cd&amp;TB_iframe=true&amp;width=600&amp;height=800\" class=\"thickbox open-plugin-details-modal\" aria-label=\"Install Google Analytics Dashboard for WP\">(Install)</a></li></ul></div>', 'no');

-- ----------------------------
-- Table structure for `wp_postmeta`
-- ----------------------------
DROP TABLE IF EXISTS `wp_postmeta`;
CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2960 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_postmeta
-- ----------------------------
INSERT INTO `wp_postmeta` VALUES ('1', '2', '_wp_page_template', 'default');
INSERT INTO `wp_postmeta` VALUES ('4', '2', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('5', '2', '_wp_trash_meta_time', '1468806609');
INSERT INTO `wp_postmeta` VALUES ('6', '2', '_wp_desired_post_slug', 'sample-page');
INSERT INTO `wp_postmeta` VALUES ('7', '6', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('8', '6', '_edit_lock', '1469618583:1');
INSERT INTO `wp_postmeta` VALUES ('9', '6', '_wp_page_template', 'templates/home.php');
INSERT INTO `wp_postmeta` VALUES ('10', '8', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('11', '8', '_edit_lock', '1468913362:1');
INSERT INTO `wp_postmeta` VALUES ('12', '8', '_wp_page_template', 'templates/temp-tip-and-trick.php');
INSERT INTO `wp_postmeta` VALUES ('13', '10', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('14', '10', '_edit_lock', '1469417824:1');
INSERT INTO `wp_postmeta` VALUES ('15', '10', '_wp_page_template', 'templates/temp-write-for-us.php');
INSERT INTO `wp_postmeta` VALUES ('16', '12', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('17', '12', '_edit_lock', '1469171564:1');
INSERT INTO `wp_postmeta` VALUES ('18', '12', '_wp_page_template', 'templates/temp-about.php');
INSERT INTO `wp_postmeta` VALUES ('19', '14', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('20', '14', '_wp_page_template', 'default');
INSERT INTO `wp_postmeta` VALUES ('21', '14', '_edit_lock', '1469169767:1');
INSERT INTO `wp_postmeta` VALUES ('22', '16', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('23', '16', '_edit_lock', '1469174409:1');
INSERT INTO `wp_postmeta` VALUES ('24', '16', '_wp_page_template', 'default');
INSERT INTO `wp_postmeta` VALUES ('25', '18', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('26', '18', '_edit_lock', '1469241490:1');
INSERT INTO `wp_postmeta` VALUES ('27', '18', '_wp_page_template', 'templates/temp-contact.php');
INSERT INTO `wp_postmeta` VALUES ('32', '21', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('33', '21', '_menu_item_menu_item_parent', '24');
INSERT INTO `wp_postmeta` VALUES ('34', '21', '_menu_item_object_id', '18');
INSERT INTO `wp_postmeta` VALUES ('35', '21', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('36', '21', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('37', '21', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('38', '21', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('39', '21', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('41', '22', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('42', '22', '_menu_item_menu_item_parent', '24');
INSERT INTO `wp_postmeta` VALUES ('43', '22', '_menu_item_object_id', '16');
INSERT INTO `wp_postmeta` VALUES ('44', '22', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('45', '22', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('46', '22', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('47', '22', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('48', '22', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('50', '23', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('51', '23', '_menu_item_menu_item_parent', '24');
INSERT INTO `wp_postmeta` VALUES ('52', '23', '_menu_item_object_id', '14');
INSERT INTO `wp_postmeta` VALUES ('53', '23', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('54', '23', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('55', '23', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('56', '23', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('57', '23', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('59', '24', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('60', '24', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('61', '24', '_menu_item_object_id', '12');
INSERT INTO `wp_postmeta` VALUES ('62', '24', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('63', '24', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('64', '24', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('65', '24', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('66', '24', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('68', '25', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('69', '25', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('70', '25', '_menu_item_object_id', '10');
INSERT INTO `wp_postmeta` VALUES ('71', '25', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('72', '25', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('73', '25', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('74', '25', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('75', '25', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('77', '26', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('78', '26', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('79', '26', '_menu_item_object_id', '8');
INSERT INTO `wp_postmeta` VALUES ('80', '26', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('81', '26', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('82', '26', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('83', '26', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('84', '26', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('86', '27', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('87', '27', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('88', '27', '_menu_item_object_id', '6');
INSERT INTO `wp_postmeta` VALUES ('89', '27', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('90', '27', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('91', '27', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('92', '27', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('93', '27', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('95', '28', '_menu_item_type', 'taxonomy');
INSERT INTO `wp_postmeta` VALUES ('96', '28', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('97', '28', '_menu_item_object_id', '2');
INSERT INTO `wp_postmeta` VALUES ('98', '28', '_menu_item_object', 'category');
INSERT INTO `wp_postmeta` VALUES ('99', '28', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('100', '28', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('101', '28', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('102', '28', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('104', '29', '_menu_item_type', 'taxonomy');
INSERT INTO `wp_postmeta` VALUES ('105', '29', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('106', '29', '_menu_item_object_id', '3');
INSERT INTO `wp_postmeta` VALUES ('107', '29', '_menu_item_object', 'category');
INSERT INTO `wp_postmeta` VALUES ('108', '29', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('109', '29', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('110', '29', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('111', '29', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('113', '30', '_menu_item_type', 'taxonomy');
INSERT INTO `wp_postmeta` VALUES ('114', '30', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('115', '30', '_menu_item_object_id', '4');
INSERT INTO `wp_postmeta` VALUES ('116', '30', '_menu_item_object', 'category');
INSERT INTO `wp_postmeta` VALUES ('117', '30', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('118', '30', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('119', '30', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('120', '30', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('122', '31', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('123', '31', '_edit_lock', '1469177373:1');
INSERT INTO `wp_postmeta` VALUES ('124', '31', '_wp_page_template', 'templates/temp-blog.php');
INSERT INTO `wp_postmeta` VALUES ('125', '33', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('126', '33', '_menu_item_menu_item_parent', '24');
INSERT INTO `wp_postmeta` VALUES ('127', '33', '_menu_item_object_id', '31');
INSERT INTO `wp_postmeta` VALUES ('128', '33', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('129', '33', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('130', '33', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('131', '33', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('132', '33', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('134', '35', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('135', '35', 'field_578c3df7c3b92', 'a:14:{s:3:\"key\";s:19:\"field_578c3df7c3b92\";s:5:\"label\";s:11:\"banner_text\";s:4:\"name\";s:11:\"banner_text\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('137', '35', 'position', 'normal');
INSERT INTO `wp_postmeta` VALUES ('138', '35', 'layout', 'default');
INSERT INTO `wp_postmeta` VALUES ('139', '35', 'hide_on_screen', '');
INSERT INTO `wp_postmeta` VALUES ('140', '35', '_edit_lock', '1469248957:1');
INSERT INTO `wp_postmeta` VALUES ('141', '35', 'field_578c3e1a96117', 'a:14:{s:3:\"key\";s:19:\"field_578c3e1a96117\";s:5:\"label\";s:12:\"banner_title\";s:4:\"name\";s:12:\"banner_title\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}');
INSERT INTO `wp_postmeta` VALUES ('197', '6', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('198', '6', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('207', '6', 'guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('209', '44', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('210', '44', 'field_578c921429399', 'a:13:{s:3:\"key\";s:19:\"field_578c921429399\";s:5:\"label\";s:15:\"Blog categories\";s:4:\"name\";s:15:\"blog_categories\";s:4:\"type\";s:8:\"repeater\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:10:\"sub_fields\";a:9:{i:0;a:12:{s:3:\"key\";s:19:\"field_578c93a41eae9\";s:5:\"label\";s:8:\"Category\";s:4:\"name\";s:8:\"category\";s:4:\"type\";s:8:\"taxonomy\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:8:\"taxonomy\";s:8:\"category\";s:10:\"field_type\";s:6:\"select\";s:10:\"allow_null\";s:1:\"0\";s:15:\"load_save_terms\";s:1:\"0\";s:13:\"return_format\";s:6:\"object\";s:8:\"order_no\";i:0;}i:1;a:13:{s:3:\"key\";s:19:\"field_578d82fae3ed5\";s:5:\"label\";s:16:\"guild_item_thumb\";s:4:\"name\";s:16:\"guild_item_thumb\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:1;}i:2;a:13:{s:3:\"key\";s:19:\"field_578d8368e3ed6\";s:5:\"label\";s:16:\"guild_item_title\";s:4:\"name\";s:16:\"guild_item_title\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:2;}i:3;a:12:{s:3:\"key\";s:19:\"field_578d8376e3ed7\";s:5:\"label\";s:18:\"guild_item_content\";s:4:\"name\";s:18:\"guild_item_content\";s:4:\"type\";s:8:\"textarea\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:9:\"maxlength\";s:3:\"120\";s:4:\"rows\";s:0:\"\";s:10:\"formatting\";s:2:\"br\";s:8:\"order_no\";i:3;}i:4;a:13:{s:3:\"key\";s:19:\"field_578d8381e3ed8\";s:5:\"label\";s:15:\"guild_item_link\";s:4:\"name\";s:15:\"guild_item_link\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:4;}i:5;a:13:{s:3:\"key\";s:19:\"field_57907900d06a0\";s:5:\"label\";s:17:\"guild_item_thumb2\";s:4:\"name\";s:17:\"guild_item_thumb2\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:5;}i:6;a:13:{s:3:\"key\";s:19:\"field_5790790ad06a1\";s:5:\"label\";s:17:\"guild_item_title2\";s:4:\"name\";s:17:\"guild_item_title2\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:6;}i:7;a:12:{s:3:\"key\";s:19:\"field_57907918d06a2\";s:5:\"label\";s:19:\"guild_item_content2\";s:4:\"name\";s:19:\"guild_item_content2\";s:4:\"type\";s:8:\"textarea\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:9:\"maxlength\";s:3:\"120\";s:4:\"rows\";s:0:\"\";s:10:\"formatting\";s:2:\"br\";s:8:\"order_no\";i:7;}i:8;a:13:{s:3:\"key\";s:19:\"field_57907923d06a3\";s:5:\"label\";s:16:\"guild_item_link2\";s:4:\"name\";s:16:\"guild_item_link2\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:8;}}s:7:\"row_min\";s:1:\"0\";s:9:\"row_limit\";s:1:\"3\";s:6:\"layout\";s:3:\"row\";s:12:\"button_label\";s:7:\"Add Row\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('212', '44', 'position', 'normal');
INSERT INTO `wp_postmeta` VALUES ('213', '44', 'layout', 'default');
INSERT INTO `wp_postmeta` VALUES ('214', '44', 'hide_on_screen', '');
INSERT INTO `wp_postmeta` VALUES ('215', '44', '_edit_lock', '1469086622:1');
INSERT INTO `wp_postmeta` VALUES ('225', '6', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('226', '6', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('227', '6', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('228', '6', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('229', '6', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('230', '6', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('231', '6', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('232', '6', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('233', '6', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('234', '6', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('235', '6', '_guild_item_thumb', 'field_578c8ef88a376');
INSERT INTO `wp_postmeta` VALUES ('236', '6', 'guild_item_link', '');
INSERT INTO `wp_postmeta` VALUES ('237', '6', '_guild_item_link', 'field_578c8f19bbabb');
INSERT INTO `wp_postmeta` VALUES ('238', '6', 'guild_item_content', '');
INSERT INTO `wp_postmeta` VALUES ('239', '6', '_guild_item_content', 'field_578c8f2f32eff');
INSERT INTO `wp_postmeta` VALUES ('240', '48', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('241', '48', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('242', '48', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('243', '48', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('244', '48', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('245', '48', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('246', '48', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('247', '48', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('248', '48', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('249', '48', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('250', '48', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('251', '48', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('252', '48', 'guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('253', '48', '_guild_item_thumb', 'field_578c8ef88a376');
INSERT INTO `wp_postmeta` VALUES ('254', '48', 'guild_item_link', '');
INSERT INTO `wp_postmeta` VALUES ('255', '48', '_guild_item_link', 'field_578c8f19bbabb');
INSERT INTO `wp_postmeta` VALUES ('256', '48', 'guild_item_content', '');
INSERT INTO `wp_postmeta` VALUES ('257', '48', '_guild_item_content', 'field_578c8f2f32eff');
INSERT INTO `wp_postmeta` VALUES ('260', '49', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('261', '49', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('262', '49', 'blog_categories_1_category', '2');
INSERT INTO `wp_postmeta` VALUES ('263', '49', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('264', '49', 'blog_categories_2_category', '2');
INSERT INTO `wp_postmeta` VALUES ('265', '49', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('266', '49', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('267', '49', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('268', '50', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('269', '50', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('270', '50', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('271', '50', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('272', '50', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('273', '50', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('274', '50', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('275', '50', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('277', '35', 'field_578cab33b0485', 'a:14:{s:3:\"key\";s:19:\"field_578cab33b0485\";s:5:\"label\";s:22:\"bar_write_for_us_title\";s:4:\"name\";s:22:\"bar_write_for_us_title\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:2;}');
INSERT INTO `wp_postmeta` VALUES ('279', '35', 'field_578cab39e272e', 'a:14:{s:3:\"key\";s:19:\"field_578cab39e272e\";s:5:\"label\";s:21:\"bar_write_for_us_text\";s:4:\"name\";s:21:\"bar_write_for_us_text\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:3;}');
INSERT INTO `wp_postmeta` VALUES ('281', '35', 'field_578cab4b108c1', 'a:14:{s:3:\"key\";s:19:\"field_578cab4b108c1\";s:5:\"label\";s:21:\"bar_write_for_us_link\";s:4:\"name\";s:21:\"bar_write_for_us_link\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:4;}');
INSERT INTO `wp_postmeta` VALUES ('283', '51', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('284', '51', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('285', '51', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('286', '51', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('287', '51', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('288', '51', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('289', '51', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('290', '51', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('291', '51', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('292', '51', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('293', '51', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('294', '51', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('295', '51', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('296', '51', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('297', '51', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('298', '51', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('299', '51', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('300', '51', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('301', '6', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('302', '6', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('303', '6', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('304', '6', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('305', '6', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('306', '6', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('308', '52', '_wp_attached_file', '2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('309', '52', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:339;s:6:\"height\";i:250;s:4:\"file\";s:19:\"2016/07/layer20.png\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:19:\"layer20-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:19:\"layer20-300x221.png\";s:5:\"width\";i:300;s:6:\"height\";i:221;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('310', '53', '_wp_attached_file', '2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('311', '53', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:359;s:6:\"height\";i:250;s:4:\"file\";s:19:\"2016/07/guild-1.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:19:\"guild-1-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:19:\"guild-1-300x209.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:209;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('312', '54', '_wp_attached_file', '2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('313', '54', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:340;s:6:\"height\";i:250;s:4:\"file\";s:19:\"2016/07/blog3-1.png\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:19:\"blog3-1-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:19:\"blog3-1-300x221.png\";s:5:\"width\";i:300;s:6:\"height\";i:221;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('314', '55', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('315', '55', '_edit_lock', '1469691440:1');
INSERT INTO `wp_postmeta` VALUES ('318', '57', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('319', '57', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('320', '57', 'blog_categories_0_guild_item_thumb', '52');
INSERT INTO `wp_postmeta` VALUES ('321', '57', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('322', '57', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('323', '57', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('324', '57', 'blog_categories_0_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('325', '57', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('326', '57', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('327', '57', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('328', '57', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('329', '57', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('330', '57', 'blog_categories_1_guild_item_thumb', '53');
INSERT INTO `wp_postmeta` VALUES ('331', '57', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('332', '57', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('333', '57', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('334', '57', 'blog_categories_1_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('335', '57', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('336', '57', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('337', '57', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('338', '57', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('339', '57', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('340', '57', 'blog_categories_2_guild_item_thumb', '54');
INSERT INTO `wp_postmeta` VALUES ('341', '57', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('342', '57', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('343', '57', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('344', '57', 'blog_categories_2_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('345', '57', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('346', '57', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('347', '57', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('348', '57', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('349', '57', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('350', '57', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('351', '57', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('352', '57', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('353', '57', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('354', '57', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('355', '57', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('356', '57', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('357', '57', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('358', '57', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('359', '57', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('360', '6', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('361', '6', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('362', '6', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('363', '6', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('364', '6', 'blog_categories_0_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('365', '6', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('366', '6', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('367', '6', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('368', '6', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('369', '6', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('370', '6', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('371', '6', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('372', '6', 'blog_categories_1_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('373', '6', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('374', '6', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('375', '6', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('376', '6', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('377', '6', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('378', '6', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('379', '6', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('380', '6', 'blog_categories_2_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('381', '6', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('382', '6', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('383', '6', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('384', '58', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('385', '58', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('386', '58', 'blog_categories_0_guild_item_thumb', '52');
INSERT INTO `wp_postmeta` VALUES ('387', '58', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('388', '58', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('389', '58', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('390', '58', 'blog_categories_0_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('391', '58', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('392', '58', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('393', '58', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('394', '58', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('395', '58', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('396', '58', 'blog_categories_1_guild_item_thumb', '53');
INSERT INTO `wp_postmeta` VALUES ('397', '58', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('398', '58', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('399', '58', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('400', '58', 'blog_categories_1_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('401', '58', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('402', '58', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('403', '58', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('404', '58', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('405', '58', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('406', '58', 'blog_categories_2_guild_item_thumb', '54');
INSERT INTO `wp_postmeta` VALUES ('407', '58', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('408', '58', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('409', '58', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('410', '58', 'blog_categories_2_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('411', '58', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('412', '58', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('413', '58', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('414', '58', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('415', '58', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('416', '58', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('417', '58', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('418', '58', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('419', '58', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('420', '58', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('421', '58', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('422', '58', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('423', '58', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('424', '58', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('425', '58', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('427', '59', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('428', '59', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('429', '59', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('430', '59', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('431', '59', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('432', '59', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('433', '59', 'blog_categories_0_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('434', '59', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('435', '59', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('436', '59', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('437', '59', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('438', '59', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('439', '59', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('440', '59', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('441', '59', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('442', '59', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('443', '59', 'blog_categories_1_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('444', '59', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('445', '59', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('446', '59', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('447', '59', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('448', '59', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('449', '59', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('450', '59', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('451', '59', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('452', '59', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('453', '59', 'blog_categories_2_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('454', '59', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('455', '59', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('456', '59', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('457', '59', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('458', '59', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('459', '59', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('460', '59', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('461', '59', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('462', '59', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('463', '59', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('464', '59', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('465', '59', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('466', '59', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('467', '59', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('468', '59', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('469', '60', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('470', '60', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('471', '60', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('472', '60', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('473', '60', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('474', '60', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('475', '60', 'blog_categories_0_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('476', '60', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('477', '60', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('478', '60', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('479', '60', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('480', '60', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('481', '60', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('482', '60', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('483', '60', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('484', '60', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('485', '60', 'blog_categories_1_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('486', '60', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('487', '60', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('488', '60', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('489', '60', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('490', '60', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('491', '60', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('492', '60', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('493', '60', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('494', '60', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('495', '60', 'blog_categories_2_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('496', '60', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('497', '60', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('498', '60', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('499', '60', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('500', '60', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('501', '60', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('502', '60', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('503', '60', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('504', '60', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('505', '60', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('506', '60', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('507', '60', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('508', '60', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('509', '60', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('510', '60', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('511', '61', '_wp_attached_file', '2016/07/essentials-arnette-skylight_g4.jpg');
INSERT INTO `wp_postmeta` VALUES ('512', '61', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:363;s:6:\"height\";i:250;s:4:\"file\";s:42:\"2016/07/essentials-arnette-skylight_g4.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:42:\"essentials-arnette-skylight_g4-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:42:\"essentials-arnette-skylight_g4-300x207.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:207;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('513', '62', '_wp_attached_file', '2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('514', '62', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:360;s:6:\"height\";i:250;s:4:\"file\";s:44:\"2016/07/popular-adidas-sunglasses-284811.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:44:\"popular-adidas-sunglasses-284811-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:44:\"popular-adidas-sunglasses-284811-300x208.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:208;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('515', '63', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('516', '63', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('517', '63', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('518', '63', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('519', '63', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('520', '63', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('521', '63', 'blog_categories_0_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('522', '63', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('523', '63', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('524', '63', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('525', '63', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('526', '63', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('527', '63', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/essentials-arnette-skylight_g4.jpg');
INSERT INTO `wp_postmeta` VALUES ('528', '63', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('529', '63', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('530', '63', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('531', '63', 'blog_categories_1_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('532', '63', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('533', '63', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('534', '63', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('535', '63', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('536', '63', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('537', '63', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('538', '63', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('539', '63', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('540', '63', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('541', '63', 'blog_categories_2_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('542', '63', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('543', '63', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('544', '63', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('545', '63', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('546', '63', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('547', '63', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('548', '63', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('549', '63', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('550', '63', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('551', '63', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('552', '63', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('553', '63', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('554', '63', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('555', '63', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('556', '63', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('557', '64', '_wp_attached_file', '2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('558', '64', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:360;s:6:\"height\";i:250;s:4:\"file\";s:20:\"2016/07/img_3641.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:20:\"img_3641-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:20:\"img_3641-300x208.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:208;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('559', '65', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('560', '65', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('561', '65', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('562', '65', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('563', '65', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('564', '65', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('565', '65', 'blog_categories_0_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('566', '65', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('567', '65', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('568', '65', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('569', '65', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('570', '65', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('571', '65', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('572', '65', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('573', '65', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('574', '65', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('575', '65', 'blog_categories_1_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('576', '65', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('577', '65', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('578', '65', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('579', '65', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('580', '65', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('581', '65', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('582', '65', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('583', '65', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('584', '65', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('585', '65', 'blog_categories_2_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('586', '65', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('587', '65', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('588', '65', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('589', '65', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('590', '65', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('591', '65', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('592', '65', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('593', '65', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('594', '65', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('595', '65', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('596', '65', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('597', '65', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('598', '65', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('599', '65', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('600', '65', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('601', '66', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('603', '66', 'position', 'normal');
INSERT INTO `wp_postmeta` VALUES ('604', '66', 'layout', 'no_box');
INSERT INTO `wp_postmeta` VALUES ('605', '66', 'hide_on_screen', '');
INSERT INTO `wp_postmeta` VALUES ('606', '66', '_edit_lock', '1469615009:1');
INSERT INTO `wp_postmeta` VALUES ('607', '66', 'field_578d8e7eb0199', 'a:13:{s:3:\"key\";s:19:\"field_578d8e7eb0199\";s:5:\"label\";s:12:\"lastest_news\";s:4:\"name\";s:12:\"lastest_news\";s:4:\"type\";s:8:\"repeater\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:10:\"sub_fields\";a:3:{i:0;a:13:{s:3:\"key\";s:19:\"field_578d8efd7ca0d\";s:5:\"label\";s:22:\"lastest_news_item_link\";s:4:\"name\";s:22:\"lastest_news_item_link\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:0;}i:1;a:13:{s:3:\"key\";s:19:\"field_578d8f0c7ca0e\";s:5:\"label\";s:23:\"lastest_news_item_title\";s:4:\"name\";s:23:\"lastest_news_item_title\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:1;}i:2;a:13:{s:3:\"key\";s:19:\"field_578d8f1e7ca0f\";s:5:\"label\";s:23:\"lastest_news_item_thumb\";s:4:\"name\";s:23:\"lastest_news_item_thumb\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:2;}}s:7:\"row_min\";s:1:\"0\";s:9:\"row_limit\";s:1:\"4\";s:6:\"layout\";s:5:\"table\";s:12:\"button_label\";s:7:\"Add Row\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('609', '66', 'rule', 'a:5:{s:5:\"param\";s:13:\"page_template\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:18:\"templates/home.php\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('610', '67', '_wp_attached_file', '2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('611', '67', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:340;s:6:\"height\";i:250;s:4:\"file\";s:19:\"2016/07/blog2-1.png\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:19:\"blog2-1-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:19:\"blog2-1-300x221.png\";s:5:\"width\";i:300;s:6:\"height\";i:221;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('612', '68', '_wp_attached_file', '2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('613', '68', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:340;s:6:\"height\";i:250;s:4:\"file\";s:19:\"2016/07/blog4-1.png\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:19:\"blog4-1-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:19:\"blog4-1-300x221.png\";s:5:\"width\";i:300;s:6:\"height\";i:221;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('614', '69', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('615', '69', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('616', '69', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('617', '69', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('618', '69', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('619', '69', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('620', '69', 'blog_categories_0_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('621', '69', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('622', '69', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('623', '69', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('624', '69', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('625', '69', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('626', '69', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('627', '69', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('628', '69', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('629', '69', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('630', '69', 'blog_categories_1_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('631', '69', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('632', '69', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('633', '69', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('634', '69', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('635', '69', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('636', '69', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('637', '69', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('638', '69', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('639', '69', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('640', '69', 'blog_categories_2_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('641', '69', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('642', '69', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('643', '69', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('644', '69', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('645', '69', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('646', '69', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('647', '69', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('648', '69', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('649', '69', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('650', '69', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('651', '69', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('652', '69', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('653', '69', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('654', '69', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('655', '69', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('656', '69', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('657', '69', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('658', '69', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('659', '69', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('660', '69', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('661', '69', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('662', '69', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('663', '69', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('664', '69', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('665', '69', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('666', '69', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('667', '69', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('668', '69', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('669', '69', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('670', '69', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('671', '69', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('672', '69', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('673', '69', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('674', '69', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('675', '69', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('676', '69', 'lastest_news_3_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('677', '69', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('678', '69', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('679', '69', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('680', '69', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('681', '69', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('682', '6', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('683', '6', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('684', '6', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('685', '6', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('686', '6', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('687', '6', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('688', '6', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('689', '6', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('690', '6', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('691', '6', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('692', '6', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('693', '6', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('694', '6', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('695', '6', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('696', '6', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('697', '6', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('698', '6', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('699', '6', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('700', '6', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('701', '6', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('702', '6', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('703', '6', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('704', '6', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('705', '6', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('706', '6', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('707', '6', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('708', '70', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('709', '70', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('710', '70', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('711', '70', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('712', '70', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('713', '70', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('714', '70', 'blog_categories_0_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('715', '70', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('716', '70', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('717', '70', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('718', '70', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('719', '70', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('720', '70', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('721', '70', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('722', '70', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('723', '70', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('724', '70', 'blog_categories_1_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('725', '70', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('726', '70', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('727', '70', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('728', '70', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('729', '70', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('730', '70', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('731', '70', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('732', '70', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('733', '70', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('734', '70', 'blog_categories_2_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('735', '70', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('736', '70', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('737', '70', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('738', '70', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('739', '70', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('740', '70', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('741', '70', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('742', '70', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('743', '70', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('744', '70', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('745', '70', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('746', '70', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('747', '70', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('748', '70', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('749', '70', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('750', '70', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('751', '70', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('752', '70', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('753', '70', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('754', '70', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('755', '70', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('756', '70', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('757', '70', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('758', '70', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('759', '70', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('760', '70', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('761', '70', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('762', '70', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('763', '70', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('764', '70', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('765', '70', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('766', '70', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('767', '70', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('768', '70', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('769', '70', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('770', '70', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('771', '70', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('772', '70', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('773', '70', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('774', '70', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('775', '70', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('776', '71', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('777', '71', 'field_578d97e263117', 'a:14:{s:3:\"key\";s:19:\"field_578d97e263117\";s:5:\"label\";s:24:\"about_real_and_face_logo\";s:4:\"name\";s:24:\"about_real_and_face_logo\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('778', '71', 'field_578d97f963118', 'a:13:{s:3:\"key\";s:19:\"field_578d97f963118\";s:5:\"label\";s:24:\"about_real_and_face_text\";s:4:\"name\";s:24:\"about_real_and_face_text\";s:4:\"type\";s:8:\"textarea\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";s:4:\"rows\";s:0:\"\";s:10:\"formatting\";s:2:\"br\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}');
INSERT INTO `wp_postmeta` VALUES ('780', '71', 'position', 'normal');
INSERT INTO `wp_postmeta` VALUES ('781', '71', 'layout', 'no_box');
INSERT INTO `wp_postmeta` VALUES ('782', '71', 'hide_on_screen', '');
INSERT INTO `wp_postmeta` VALUES ('783', '71', '_edit_lock', '1468925577:1');
INSERT INTO `wp_postmeta` VALUES ('784', '71', 'field_578d980cec212', 'a:13:{s:3:\"key\";s:19:\"field_578d980cec212\";s:5:\"label\";s:11:\"about_group\";s:4:\"name\";s:11:\"about_group\";s:4:\"type\";s:8:\"repeater\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:10:\"sub_fields\";a:3:{i:0;a:13:{s:3:\"key\";s:19:\"field_578d981dec213\";s:5:\"label\";s:14:\"about_group_bg\";s:4:\"name\";s:14:\"about_group_bg\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:0;}i:1;a:13:{s:3:\"key\";s:19:\"field_578d982bec214\";s:5:\"label\";s:17:\"about_group_title\";s:4:\"name\";s:17:\"about_group_title\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:1;}i:2;a:13:{s:3:\"key\";s:19:\"field_578d9835ec215\";s:5:\"label\";s:16:\"about_group_link\";s:4:\"name\";s:16:\"about_group_link\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:2;}}s:7:\"row_min\";s:1:\"0\";s:9:\"row_limit\";s:1:\"3\";s:6:\"layout\";s:5:\"table\";s:12:\"button_label\";s:7:\"Add Row\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:2;}');
INSERT INTO `wp_postmeta` VALUES ('788', '72', '_wp_attached_file', '2016/07/logo-about.jpg');
INSERT INTO `wp_postmeta` VALUES ('789', '72', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:300;s:6:\"height\";i:226;s:4:\"file\";s:22:\"2016/07/logo-about.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:22:\"logo-about-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:22:\"logo-about-300x226.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:226;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('791', '73', 'about_real_and_face_logo', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/logo-about.jpg');
INSERT INTO `wp_postmeta` VALUES ('792', '73', '_about_real_and_face_logo', 'field_578d97e263117');
INSERT INTO `wp_postmeta` VALUES ('793', '73', 'about_real_and_face_text', '');
INSERT INTO `wp_postmeta` VALUES ('794', '73', '_about_real_and_face_text', 'field_578d97f963118');
INSERT INTO `wp_postmeta` VALUES ('795', '73', 'about_group', '0');
INSERT INTO `wp_postmeta` VALUES ('796', '73', '_about_group', 'field_578d980cec212');
INSERT INTO `wp_postmeta` VALUES ('797', '12', 'about_real_and_face_logo', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/logo-about.jpg');
INSERT INTO `wp_postmeta` VALUES ('798', '12', '_about_real_and_face_logo', 'field_578d97e263117');
INSERT INTO `wp_postmeta` VALUES ('799', '12', 'about_real_and_face_text', 'Most of us agree would concur that fakes are a disgrace and that we ought to stay away from them. Purchasing a fake is pretty much wrong on several levels than most consumers or consumers seem to understand. But don’t get me wrong, people who buy counterfeits usually can’t afford the real thing, so it’s not like they’re taking customers away from these brands. But on the contrary, purchasing a counterfeit is abounding with moral issues, from violating intellectual property and contributing to the loss of over 700,000 American jobs, to financially supporting crime syndicates that run human-trafficking rings.\r\n\r\nAlso, we think it pretty much affects the designer reputation in a negative way. How far can we push it? How close must a product have to look similar to the original before it is considered a counterfeit or an imitation? Every year the U.S. probably seizes billions of dollars worth of counterfeit goods and products. Fake items are for fake people. It means you care more about the outward appearance and the label than the quality of the original otherwise you would save up for it. Accordingly, we figured it was high time to become a bit more knowledgeable about how to spot a fake. What you wear is a statement and we believe it shows who you are! This blog is dedicated to safeguard you and your loved ones from ever purchasing knockoff goods or products.');
INSERT INTO `wp_postmeta` VALUES ('800', '12', '_about_real_and_face_text', 'field_578d97f963118');
INSERT INTO `wp_postmeta` VALUES ('801', '12', 'about_group', '3');
INSERT INTO `wp_postmeta` VALUES ('802', '12', '_about_group', 'field_578d980cec212');
INSERT INTO `wp_postmeta` VALUES ('803', '74', '_wp_attached_file', '2016/07/about-group1.jpg');
INSERT INTO `wp_postmeta` VALUES ('804', '74', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:360;s:6:\"height\";i:300;s:4:\"file\";s:24:\"2016/07/about-group1.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:24:\"about-group1-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:24:\"about-group1-300x250.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:250;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('805', '75', '_wp_attached_file', '2016/07/coolvalues.jpg');
INSERT INTO `wp_postmeta` VALUES ('806', '75', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:360;s:6:\"height\";i:300;s:4:\"file\";s:22:\"2016/07/coolvalues.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:22:\"coolvalues-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:22:\"coolvalues-300x250.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:250;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('807', '76', '_wp_attached_file', '2016/07/designer-brand-luxury-dinner-bags-price-clutches-bags-ladies-shoulder-bags-women-handbags-2015-new-european.jpg');
INSERT INTO `wp_postmeta` VALUES ('808', '76', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:362;s:6:\"height\";i:300;s:4:\"file\";s:119:\"2016/07/designer-brand-luxury-dinner-bags-price-clutches-bags-ladies-shoulder-bags-women-handbags-2015-new-european.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:119:\"designer-brand-luxury-dinner-bags-price-clutches-bags-ladies-shoulder-bags-women-handbags-2015-new-european-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:119:\"designer-brand-luxury-dinner-bags-price-clutches-bags-ladies-shoulder-bags-women-handbags-2015-new-european-300x249.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:249;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('809', '77', 'about_real_and_face_logo', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/logo-about.jpg');
INSERT INTO `wp_postmeta` VALUES ('810', '77', '_about_real_and_face_logo', 'field_578d97e263117');
INSERT INTO `wp_postmeta` VALUES ('811', '77', 'about_real_and_face_text', 'Most of us agree would concur that fakes are a disgrace and that we ought to stay away from them. Purchasing a fake is pretty much wrong on several levels than most consumers or consumers seem to understand. But don’t get me wrong, people who buy counterfeits usually can’t afford the real thing, so it’s not like they’re taking customers away from these brands. But on the contrary, purchasing a counterfeit is abounding with moral issues, from violating intellectual property and contributing to the loss of over 700,000 American jobs, to financially supporting crime syndicates that run human-trafficking rings.\r\n\r\nAlso, we think it pretty much affects the designer reputation in a negative way. How far can we push it? How close must a product have to look similar to the original before it is considered a counterfeit or an imitation? Every year the U.S. probably seizes billions of dollars worth of counterfeit goods and products. Fake items are for fake people. It means you care more about the outward appearance and the label than the quality of the original otherwise you would save up for it. Accordingly, we figured it was high time to become a bit more knowledgeable about how to spot a fake. What you wear is a statement and we believe it shows who you are! This blog is dedicated to safeguard you and your loved ones from ever purchasing knockoff goods or products.');
INSERT INTO `wp_postmeta` VALUES ('812', '77', '_about_real_and_face_text', 'field_578d97f963118');
INSERT INTO `wp_postmeta` VALUES ('813', '77', 'about_group_0_about_group_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/about-group1.jpg');
INSERT INTO `wp_postmeta` VALUES ('814', '77', '_about_group_0_about_group_bg', 'field_578d981dec213');
INSERT INTO `wp_postmeta` VALUES ('815', '77', 'about_group_0_about_group_title', 'Fashion Guide');
INSERT INTO `wp_postmeta` VALUES ('816', '77', '_about_group_0_about_group_title', 'field_578d982bec214');
INSERT INTO `wp_postmeta` VALUES ('817', '77', 'about_group_0_about_group_link', 'http://realvsfakeguide.local/category/fashion/');
INSERT INTO `wp_postmeta` VALUES ('818', '77', '_about_group_0_about_group_link', 'field_578d9835ec215');
INSERT INTO `wp_postmeta` VALUES ('819', '77', 'about_group_1_about_group_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/designer-brand-luxury-dinner-bags-price-clutches-bags-ladies-shoulder-bags-women-handbags-2015-new-european.jpg');
INSERT INTO `wp_postmeta` VALUES ('820', '77', '_about_group_1_about_group_bg', 'field_578d981dec213');
INSERT INTO `wp_postmeta` VALUES ('821', '77', 'about_group_1_about_group_title', 'Handbags guide');
INSERT INTO `wp_postmeta` VALUES ('822', '77', '_about_group_1_about_group_title', 'field_578d982bec214');
INSERT INTO `wp_postmeta` VALUES ('823', '77', 'about_group_1_about_group_link', 'http://realvsfakeguide.local/category/handbag/');
INSERT INTO `wp_postmeta` VALUES ('824', '77', '_about_group_1_about_group_link', 'field_578d9835ec215');
INSERT INTO `wp_postmeta` VALUES ('825', '77', 'about_group_2_about_group_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/coolvalues.jpg');
INSERT INTO `wp_postmeta` VALUES ('826', '77', '_about_group_2_about_group_bg', 'field_578d981dec213');
INSERT INTO `wp_postmeta` VALUES ('827', '77', 'about_group_2_about_group_title', 'sunglasses guide');
INSERT INTO `wp_postmeta` VALUES ('828', '77', '_about_group_2_about_group_title', 'field_578d982bec214');
INSERT INTO `wp_postmeta` VALUES ('829', '77', 'about_group_2_about_group_link', 'http://realvsfakeguide.local/category/sunglasses/');
INSERT INTO `wp_postmeta` VALUES ('830', '77', '_about_group_2_about_group_link', 'field_578d9835ec215');
INSERT INTO `wp_postmeta` VALUES ('831', '77', 'about_group', '3');
INSERT INTO `wp_postmeta` VALUES ('832', '77', '_about_group', 'field_578d980cec212');
INSERT INTO `wp_postmeta` VALUES ('833', '12', 'about_group_0_about_group_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/about-group1.jpg');
INSERT INTO `wp_postmeta` VALUES ('834', '12', '_about_group_0_about_group_bg', 'field_578d981dec213');
INSERT INTO `wp_postmeta` VALUES ('835', '12', 'about_group_0_about_group_title', 'Fashion Guide');
INSERT INTO `wp_postmeta` VALUES ('836', '12', '_about_group_0_about_group_title', 'field_578d982bec214');
INSERT INTO `wp_postmeta` VALUES ('837', '12', 'about_group_0_about_group_link', 'http://realvsfakeguide.local/category/fashion/');
INSERT INTO `wp_postmeta` VALUES ('838', '12', '_about_group_0_about_group_link', 'field_578d9835ec215');
INSERT INTO `wp_postmeta` VALUES ('839', '12', 'about_group_1_about_group_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/designer-brand-luxury-dinner-bags-price-clutches-bags-ladies-shoulder-bags-women-handbags-2015-new-european.jpg');
INSERT INTO `wp_postmeta` VALUES ('840', '12', '_about_group_1_about_group_bg', 'field_578d981dec213');
INSERT INTO `wp_postmeta` VALUES ('841', '12', 'about_group_1_about_group_title', 'Handbags guide');
INSERT INTO `wp_postmeta` VALUES ('842', '12', '_about_group_1_about_group_title', 'field_578d982bec214');
INSERT INTO `wp_postmeta` VALUES ('843', '12', 'about_group_1_about_group_link', 'http://realvsfakeguide.local/category/handbag/');
INSERT INTO `wp_postmeta` VALUES ('844', '12', '_about_group_1_about_group_link', 'field_578d9835ec215');
INSERT INTO `wp_postmeta` VALUES ('845', '12', 'about_group_2_about_group_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/coolvalues.jpg');
INSERT INTO `wp_postmeta` VALUES ('846', '12', '_about_group_2_about_group_bg', 'field_578d981dec213');
INSERT INTO `wp_postmeta` VALUES ('847', '12', 'about_group_2_about_group_title', 'sunglasses guide');
INSERT INTO `wp_postmeta` VALUES ('848', '12', '_about_group_2_about_group_title', 'field_578d982bec214');
INSERT INTO `wp_postmeta` VALUES ('849', '12', 'about_group_2_about_group_link', 'http://realvsfakeguide.local/category/sunglasses/');
INSERT INTO `wp_postmeta` VALUES ('850', '12', '_about_group_2_about_group_link', 'field_578d9835ec215');
INSERT INTO `wp_postmeta` VALUES ('851', '71', 'field_578d9b3d1f198', 'a:14:{s:3:\"key\";s:19:\"field_578d9b3d1f198\";s:5:\"label\";s:12:\"about_banner\";s:4:\"name\";s:12:\"about_banner\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:3;}');
INSERT INTO `wp_postmeta` VALUES ('853', '71', 'field_578d9b539d6dc', 'a:14:{s:3:\"key\";s:19:\"field_578d9b539d6dc\";s:5:\"label\";s:17:\"about_text_banner\";s:4:\"name\";s:17:\"about_text_banner\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:4;}');
INSERT INTO `wp_postmeta` VALUES ('855', '78', '_wp_attached_file', '2016/07/bg-about.jpg');
INSERT INTO `wp_postmeta` VALUES ('856', '78', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1360;s:6:\"height\";i:310;s:4:\"file\";s:20:\"2016/07/bg-about.jpg\";s:5:\"sizes\";a:4:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:20:\"bg-about-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:19:\"bg-about-300x68.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:68;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:20:\"bg-about-768x175.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:175;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:21:\"bg-about-1024x233.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:233;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('857', '79', 'about_real_and_face_logo', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/logo-about.jpg');
INSERT INTO `wp_postmeta` VALUES ('858', '79', '_about_real_and_face_logo', 'field_578d97e263117');
INSERT INTO `wp_postmeta` VALUES ('859', '79', 'about_real_and_face_text', 'Most of us agree would concur that fakes are a disgrace and that we ought to stay away from them. Purchasing a fake is pretty much wrong on several levels than most consumers or consumers seem to understand. But don’t get me wrong, people who buy counterfeits usually can’t afford the real thing, so it’s not like they’re taking customers away from these brands. But on the contrary, purchasing a counterfeit is abounding with moral issues, from violating intellectual property and contributing to the loss of over 700,000 American jobs, to financially supporting crime syndicates that run human-trafficking rings.\r\n\r\nAlso, we think it pretty much affects the designer reputation in a negative way. How far can we push it? How close must a product have to look similar to the original before it is considered a counterfeit or an imitation? Every year the U.S. probably seizes billions of dollars worth of counterfeit goods and products. Fake items are for fake people. It means you care more about the outward appearance and the label than the quality of the original otherwise you would save up for it. Accordingly, we figured it was high time to become a bit more knowledgeable about how to spot a fake. What you wear is a statement and we believe it shows who you are! This blog is dedicated to safeguard you and your loved ones from ever purchasing knockoff goods or products.');
INSERT INTO `wp_postmeta` VALUES ('860', '79', '_about_real_and_face_text', 'field_578d97f963118');
INSERT INTO `wp_postmeta` VALUES ('861', '79', 'about_group_0_about_group_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/about-group1.jpg');
INSERT INTO `wp_postmeta` VALUES ('862', '79', '_about_group_0_about_group_bg', 'field_578d981dec213');
INSERT INTO `wp_postmeta` VALUES ('863', '79', 'about_group_0_about_group_title', 'Fashion Guide');
INSERT INTO `wp_postmeta` VALUES ('864', '79', '_about_group_0_about_group_title', 'field_578d982bec214');
INSERT INTO `wp_postmeta` VALUES ('865', '79', 'about_group_0_about_group_link', 'http://realvsfakeguide.local/category/fashion/');
INSERT INTO `wp_postmeta` VALUES ('866', '79', '_about_group_0_about_group_link', 'field_578d9835ec215');
INSERT INTO `wp_postmeta` VALUES ('867', '79', 'about_group_1_about_group_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/designer-brand-luxury-dinner-bags-price-clutches-bags-ladies-shoulder-bags-women-handbags-2015-new-european.jpg');
INSERT INTO `wp_postmeta` VALUES ('868', '79', '_about_group_1_about_group_bg', 'field_578d981dec213');
INSERT INTO `wp_postmeta` VALUES ('869', '79', 'about_group_1_about_group_title', 'Handbags guide');
INSERT INTO `wp_postmeta` VALUES ('870', '79', '_about_group_1_about_group_title', 'field_578d982bec214');
INSERT INTO `wp_postmeta` VALUES ('871', '79', 'about_group_1_about_group_link', 'http://realvsfakeguide.local/category/handbag/');
INSERT INTO `wp_postmeta` VALUES ('872', '79', '_about_group_1_about_group_link', 'field_578d9835ec215');
INSERT INTO `wp_postmeta` VALUES ('873', '79', 'about_group_2_about_group_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/coolvalues.jpg');
INSERT INTO `wp_postmeta` VALUES ('874', '79', '_about_group_2_about_group_bg', 'field_578d981dec213');
INSERT INTO `wp_postmeta` VALUES ('875', '79', 'about_group_2_about_group_title', 'sunglasses guide');
INSERT INTO `wp_postmeta` VALUES ('876', '79', '_about_group_2_about_group_title', 'field_578d982bec214');
INSERT INTO `wp_postmeta` VALUES ('877', '79', 'about_group_2_about_group_link', 'http://realvsfakeguide.local/category/sunglasses/');
INSERT INTO `wp_postmeta` VALUES ('878', '79', '_about_group_2_about_group_link', 'field_578d9835ec215');
INSERT INTO `wp_postmeta` VALUES ('879', '79', 'about_group', '3');
INSERT INTO `wp_postmeta` VALUES ('880', '79', '_about_group', 'field_578d980cec212');
INSERT INTO `wp_postmeta` VALUES ('881', '79', 'about_banner', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-about.jpg');
INSERT INTO `wp_postmeta` VALUES ('882', '79', '_about_banner', 'field_578d9b3d1f198');
INSERT INTO `wp_postmeta` VALUES ('883', '79', 'about_text_banner', 'About us');
INSERT INTO `wp_postmeta` VALUES ('884', '79', '_about_text_banner', 'field_578d9b539d6dc');
INSERT INTO `wp_postmeta` VALUES ('885', '12', 'about_banner', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-about.jpg');
INSERT INTO `wp_postmeta` VALUES ('886', '12', '_about_banner', 'field_578d9b3d1f198');
INSERT INTO `wp_postmeta` VALUES ('887', '12', 'about_text_banner', 'About us');
INSERT INTO `wp_postmeta` VALUES ('888', '12', '_about_text_banner', 'field_578d9b539d6dc');
INSERT INTO `wp_postmeta` VALUES ('889', '80', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('890', '80', 'field_578daf13472f5', 'a:14:{s:3:\"key\";s:19:\"field_578daf13472f5\";s:5:\"label\";s:20:\"category_news_banner\";s:4:\"name\";s:20:\"category_news_banner\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('892', '80', 'position', 'normal');
INSERT INTO `wp_postmeta` VALUES ('893', '80', 'layout', 'default');
INSERT INTO `wp_postmeta` VALUES ('894', '80', 'hide_on_screen', '');
INSERT INTO `wp_postmeta` VALUES ('895', '80', '_edit_lock', '1469073923:1');
INSERT INTO `wp_postmeta` VALUES ('896', '80', 'field_578daf28850b0', 'a:14:{s:3:\"key\";s:19:\"field_578daf28850b0\";s:5:\"label\";s:24:\"fashion_news_text_banner\";s:4:\"name\";s:24:\"fashion_news_text_banner\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}');
INSERT INTO `wp_postmeta` VALUES ('897', '80', 'rule', 'a:5:{s:5:\"param\";s:13:\"post_category\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:1:\"2\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('898', '81', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('899', '81', '_edit_lock', '1469689634:1');
INSERT INTO `wp_postmeta` VALUES ('902', '83', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('903', '83', '_edit_lock', '1469689588:1');
INSERT INTO `wp_postmeta` VALUES ('906', '85', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('907', '85', '_edit_lock', '1469691613:1');
INSERT INTO `wp_postmeta` VALUES ('910', '86', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('911', '86', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('912', '86', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('913', '86', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('914', '85', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('915', '85', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('916', '85', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('917', '85', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('919', '87', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('920', '87', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('921', '87', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('922', '87', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('923', '88', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('924', '88', '_edit_lock', '1469689458:1');
INSERT INTO `wp_postmeta` VALUES ('925', '88', '_thumbnail_id', '64');
INSERT INTO `wp_postmeta` VALUES ('927', '89', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('928', '89', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('929', '89', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('930', '89', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('931', '88', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('932', '88', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('933', '88', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('934', '88', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('935', '90', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('936', '90', '_edit_lock', '1469689439:1');
INSERT INTO `wp_postmeta` VALUES ('937', '90', '_thumbnail_id', '61');
INSERT INTO `wp_postmeta` VALUES ('939', '91', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('940', '91', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('941', '91', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('942', '91', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('943', '90', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('944', '90', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('945', '90', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('946', '90', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('947', '92', '_wp_attached_file', '2016/07/contact-icon-mail.png');
INSERT INTO `wp_postmeta` VALUES ('948', '92', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:20;s:6:\"height\";i:21;s:4:\"file\";s:29:\"2016/07/contact-icon-mail.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('949', '93', '_wp_attached_file', '2016/07/contact-icon-name.png');
INSERT INTO `wp_postmeta` VALUES ('950', '93', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:16;s:6:\"height\";i:19;s:4:\"file\";s:29:\"2016/07/contact-icon-name.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('951', '94', '_wp_attached_file', '2016/07/contact-icon-phone.png');
INSERT INTO `wp_postmeta` VALUES ('952', '94', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:16;s:6:\"height\";i:19;s:4:\"file\";s:30:\"2016/07/contact-icon-phone.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('953', '71', 'rule', 'a:5:{s:5:\"param\";s:13:\"page_template\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:24:\"templates/temp-about.php\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('954', '95', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('955', '95', '_menu_item_menu_item_parent', '99');
INSERT INTO `wp_postmeta` VALUES ('956', '95', '_menu_item_object_id', '31');
INSERT INTO `wp_postmeta` VALUES ('957', '95', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('958', '95', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('959', '95', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('960', '95', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('961', '95', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('963', '96', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('964', '96', '_menu_item_menu_item_parent', '99');
INSERT INTO `wp_postmeta` VALUES ('965', '96', '_menu_item_object_id', '18');
INSERT INTO `wp_postmeta` VALUES ('966', '96', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('967', '96', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('968', '96', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('969', '96', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('970', '96', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('972', '97', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('973', '97', '_menu_item_menu_item_parent', '99');
INSERT INTO `wp_postmeta` VALUES ('974', '97', '_menu_item_object_id', '16');
INSERT INTO `wp_postmeta` VALUES ('975', '97', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('976', '97', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('977', '97', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('978', '97', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('979', '97', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('981', '98', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('982', '98', '_menu_item_menu_item_parent', '99');
INSERT INTO `wp_postmeta` VALUES ('983', '98', '_menu_item_object_id', '14');
INSERT INTO `wp_postmeta` VALUES ('984', '98', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('985', '98', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('986', '98', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('987', '98', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('988', '98', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('990', '99', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('991', '99', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('992', '99', '_menu_item_object_id', '12');
INSERT INTO `wp_postmeta` VALUES ('993', '99', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('994', '99', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('995', '99', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('996', '99', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('997', '99', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('999', '100', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('1000', '100', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('1001', '100', '_menu_item_object_id', '10');
INSERT INTO `wp_postmeta` VALUES ('1002', '100', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('1003', '100', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('1004', '100', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('1005', '100', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('1006', '100', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('1008', '101', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('1009', '101', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('1010', '101', '_menu_item_object_id', '8');
INSERT INTO `wp_postmeta` VALUES ('1011', '101', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('1012', '101', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('1013', '101', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('1014', '101', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('1015', '101', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('1017', '102', '_menu_item_type', 'post_type');
INSERT INTO `wp_postmeta` VALUES ('1018', '102', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('1019', '102', '_menu_item_object_id', '6');
INSERT INTO `wp_postmeta` VALUES ('1020', '102', '_menu_item_object', 'page');
INSERT INTO `wp_postmeta` VALUES ('1021', '102', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('1022', '102', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('1023', '102', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('1024', '102', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('1026', '103', '_menu_item_type', 'taxonomy');
INSERT INTO `wp_postmeta` VALUES ('1027', '103', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('1028', '103', '_menu_item_object_id', '2');
INSERT INTO `wp_postmeta` VALUES ('1029', '103', '_menu_item_object', 'category');
INSERT INTO `wp_postmeta` VALUES ('1030', '103', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('1031', '103', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('1032', '103', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('1033', '103', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('1035', '104', '_menu_item_type', 'taxonomy');
INSERT INTO `wp_postmeta` VALUES ('1036', '104', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('1037', '104', '_menu_item_object_id', '3');
INSERT INTO `wp_postmeta` VALUES ('1038', '104', '_menu_item_object', 'category');
INSERT INTO `wp_postmeta` VALUES ('1039', '104', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('1040', '104', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('1041', '104', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('1042', '104', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('1044', '105', '_menu_item_type', 'taxonomy');
INSERT INTO `wp_postmeta` VALUES ('1045', '105', '_menu_item_menu_item_parent', '0');
INSERT INTO `wp_postmeta` VALUES ('1046', '105', '_menu_item_object_id', '4');
INSERT INTO `wp_postmeta` VALUES ('1047', '105', '_menu_item_object', 'category');
INSERT INTO `wp_postmeta` VALUES ('1048', '105', '_menu_item_target', '');
INSERT INTO `wp_postmeta` VALUES ('1049', '105', '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES ('1050', '105', '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` VALUES ('1051', '105', '_menu_item_url', '');
INSERT INTO `wp_postmeta` VALUES ('1053', '106', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('1054', '106', '_edit_lock', '1469691605:1');
INSERT INTO `wp_postmeta` VALUES ('1057', '107', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1058', '107', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('1059', '107', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1060', '107', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('1061', '106', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1062', '106', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('1063', '106', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1064', '106', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('1065', '108', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('1066', '108', '_edit_lock', '1469689320:1');
INSERT INTO `wp_postmeta` VALUES ('1069', '109', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1070', '109', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('1071', '109', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1072', '109', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('1073', '108', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1074', '108', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('1075', '108', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1076', '108', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('1077', '110', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('1078', '110', '_edit_lock', '1469689277:1');
INSERT INTO `wp_postmeta` VALUES ('1081', '111', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1082', '111', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('1083', '111', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1084', '111', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('1085', '110', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1086', '110', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('1087', '110', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1088', '110', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('1089', '112', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('1090', '112', 'field_57904ab17b17d', 'a:14:{s:3:\"key\";s:19:\"field_57904ab17b17d\";s:5:\"label\";s:10:\"share_face\";s:4:\"name\";s:10:\"share_face\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('1091', '112', 'field_57904ac47b17e', 'a:14:{s:3:\"key\";s:19:\"field_57904ac47b17e\";s:5:\"label\";s:13:\"share_twitter\";s:4:\"name\";s:13:\"share_twitter\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}');
INSERT INTO `wp_postmeta` VALUES ('1092', '112', 'field_57904b0d7b17f', 'a:14:{s:3:\"key\";s:19:\"field_57904b0d7b17f\";s:5:\"label\";s:16:\"share_googleplus\";s:4:\"name\";s:16:\"share_googleplus\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:2;}');
INSERT INTO `wp_postmeta` VALUES ('1093', '112', 'field_57904b137b180', 'a:14:{s:3:\"key\";s:19:\"field_57904b137b180\";s:5:\"label\";s:15:\"share_pinterest\";s:4:\"name\";s:15:\"share_pinterest\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:3;}');
INSERT INTO `wp_postmeta` VALUES ('1094', '112', 'rule', 'a:5:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:4:\"post\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('1095', '112', 'position', 'normal');
INSERT INTO `wp_postmeta` VALUES ('1096', '112', 'layout', 'no_box');
INSERT INTO `wp_postmeta` VALUES ('1097', '112', 'hide_on_screen', '');
INSERT INTO `wp_postmeta` VALUES ('1098', '112', '_edit_lock', '1469074084:1');
INSERT INTO `wp_postmeta` VALUES ('1100', '113', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1101', '113', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('1102', '113', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('1103', '113', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('1104', '113', 'share_face', 'https://www.facebook.com/sharer/sharer.php?u=facebook.com');
INSERT INTO `wp_postmeta` VALUES ('1105', '113', '_share_face', 'field_57904ab17b17d');
INSERT INTO `wp_postmeta` VALUES ('1106', '113', 'share_twitter', 'https://twitter.com/home?status=Demo%20tweet');
INSERT INTO `wp_postmeta` VALUES ('1107', '113', '_share_twitter', 'field_57904ac47b17e');
INSERT INTO `wp_postmeta` VALUES ('1108', '113', 'share_googleplus', 'https://plus.google.com/share?url=realvsfakeguide');
INSERT INTO `wp_postmeta` VALUES ('1109', '113', '_share_googleplus', 'field_57904b0d7b17f');
INSERT INTO `wp_postmeta` VALUES ('1110', '113', 'share_pinterest', 'https://www.linkedin.com/shareArticle?mini=true&url=realvsfakeguide&title=&summary=&source=');
INSERT INTO `wp_postmeta` VALUES ('1111', '113', '_share_pinterest', 'field_57904b137b180');
INSERT INTO `wp_postmeta` VALUES ('1112', '110', 'share_face', 'https://www.facebook.com/sharer/sharer.php?u=facebook.com');
INSERT INTO `wp_postmeta` VALUES ('1113', '110', '_share_face', 'field_57904ab17b17d');
INSERT INTO `wp_postmeta` VALUES ('1114', '110', 'share_twitter', 'https://twitter.com/home?status=Demo%20tweet');
INSERT INTO `wp_postmeta` VALUES ('1115', '110', '_share_twitter', 'field_57904ac47b17e');
INSERT INTO `wp_postmeta` VALUES ('1116', '110', 'share_googleplus', 'https://plus.google.com/share?url=realvsfakeguide');
INSERT INTO `wp_postmeta` VALUES ('1117', '110', '_share_googleplus', 'field_57904b0d7b17f');
INSERT INTO `wp_postmeta` VALUES ('1118', '110', 'share_pinterest', 'https://www.linkedin.com/shareArticle?mini=true&url=realvsfakeguide&title=&summary=&source=');
INSERT INTO `wp_postmeta` VALUES ('1119', '110', '_share_pinterest', 'field_57904b137b180');
INSERT INTO `wp_postmeta` VALUES ('1124', '114', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('1125', '114', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1126', '114', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('1127', '114', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1128', '114', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('1129', '114', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1130', '114', 'blog_categories_0_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1131', '114', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1132', '114', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1133', '114', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1134', '114', 'blog_categories_0_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1135', '114', '_blog_categories_0_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1136', '114', 'blog_categories_0_guild_item_title2', 'post9');
INSERT INTO `wp_postmeta` VALUES ('1137', '114', '_blog_categories_0_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1138', '114', 'blog_categories_0_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1139', '114', '_blog_categories_0_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1140', '114', 'blog_categories_0_guild_item_link2', 'http://realvsfakeguide.local/post9/');
INSERT INTO `wp_postmeta` VALUES ('1141', '114', '_blog_categories_0_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1142', '114', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('1143', '114', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1144', '114', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('1145', '114', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1146', '114', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('1147', '114', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1148', '114', 'blog_categories_1_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1149', '114', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1150', '114', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1151', '114', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1152', '114', 'blog_categories_1_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1153', '114', '_blog_categories_1_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1154', '114', 'blog_categories_1_guild_item_title2', 'post8');
INSERT INTO `wp_postmeta` VALUES ('1155', '114', '_blog_categories_1_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1156', '114', 'blog_categories_1_guild_item_content2', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour');
INSERT INTO `wp_postmeta` VALUES ('1157', '114', '_blog_categories_1_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1158', '114', 'blog_categories_1_guild_item_link2', 'http://realvsfakeguide.local/post8/');
INSERT INTO `wp_postmeta` VALUES ('1159', '114', '_blog_categories_1_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1160', '114', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('1161', '114', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1162', '114', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('1163', '114', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1164', '114', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('1165', '114', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1166', '114', 'blog_categories_2_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1167', '114', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1168', '114', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1169', '114', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1170', '114', 'blog_categories_2_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1171', '114', '_blog_categories_2_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1172', '114', 'blog_categories_2_guild_item_title2', 'post7');
INSERT INTO `wp_postmeta` VALUES ('1173', '114', '_blog_categories_2_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1174', '114', 'blog_categories_2_guild_item_content2', 'Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making');
INSERT INTO `wp_postmeta` VALUES ('1175', '114', '_blog_categories_2_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1176', '114', 'blog_categories_2_guild_item_link2', 'http://realvsfakeguide.local/post7/');
INSERT INTO `wp_postmeta` VALUES ('1177', '114', '_blog_categories_2_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1178', '114', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('1179', '114', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('1180', '114', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('1181', '114', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('1182', '114', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('1183', '114', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('1184', '114', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('1185', '114', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('1186', '114', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('1187', '114', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('1188', '114', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('1189', '114', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('1190', '114', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1191', '114', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1192', '114', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1193', '114', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1194', '114', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1195', '114', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1196', '114', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1197', '114', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1198', '114', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('1199', '114', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1200', '114', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1201', '114', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1202', '114', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1203', '114', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1204', '114', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('1205', '114', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1206', '114', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1207', '114', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1208', '114', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1209', '114', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1210', '114', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1211', '114', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1212', '114', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('1213', '114', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1214', '114', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('1215', '114', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('1216', '6', 'blog_categories_0_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1217', '6', '_blog_categories_0_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1218', '6', 'blog_categories_0_guild_item_title2', 'post9');
INSERT INTO `wp_postmeta` VALUES ('1219', '6', '_blog_categories_0_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1220', '6', 'blog_categories_0_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1221', '6', '_blog_categories_0_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1222', '6', 'blog_categories_0_guild_item_link2', 'http://realvsfakeguide.local/post9/');
INSERT INTO `wp_postmeta` VALUES ('1223', '6', '_blog_categories_0_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1224', '6', 'blog_categories_1_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1225', '6', '_blog_categories_1_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1226', '6', 'blog_categories_1_guild_item_title2', 'post8');
INSERT INTO `wp_postmeta` VALUES ('1227', '6', '_blog_categories_1_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1228', '6', 'blog_categories_1_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1229', '6', '_blog_categories_1_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1230', '6', 'blog_categories_1_guild_item_link2', 'http://realvsfakeguide.local/post8/');
INSERT INTO `wp_postmeta` VALUES ('1231', '6', '_blog_categories_1_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1232', '6', 'blog_categories_2_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1233', '6', '_blog_categories_2_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1234', '6', 'blog_categories_2_guild_item_title2', 'post7');
INSERT INTO `wp_postmeta` VALUES ('1235', '6', '_blog_categories_2_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1236', '6', 'blog_categories_2_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1237', '6', '_blog_categories_2_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1238', '6', 'blog_categories_2_guild_item_link2', 'http://realvsfakeguide.local/post7/');
INSERT INTO `wp_postmeta` VALUES ('1239', '6', '_blog_categories_2_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1241', '115', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('1242', '115', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1243', '115', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('1244', '115', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1245', '115', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('1246', '115', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1247', '115', 'blog_categories_0_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1248', '115', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1249', '115', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1250', '115', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1251', '115', 'blog_categories_0_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1252', '115', '_blog_categories_0_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1253', '115', 'blog_categories_0_guild_item_title2', 'post9');
INSERT INTO `wp_postmeta` VALUES ('1254', '115', '_blog_categories_0_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1255', '115', 'blog_categories_0_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1256', '115', '_blog_categories_0_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1257', '115', 'blog_categories_0_guild_item_link2', 'http://realvsfakeguide.local/post9/');
INSERT INTO `wp_postmeta` VALUES ('1258', '115', '_blog_categories_0_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1259', '115', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('1260', '115', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1261', '115', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('1262', '115', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1263', '115', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('1264', '115', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1265', '115', 'blog_categories_1_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1266', '115', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1267', '115', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1268', '115', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1269', '115', 'blog_categories_1_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1270', '115', '_blog_categories_1_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1271', '115', 'blog_categories_1_guild_item_title2', 'post8');
INSERT INTO `wp_postmeta` VALUES ('1272', '115', '_blog_categories_1_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1273', '115', 'blog_categories_1_guild_item_content2', 'Contrary to popular belief, Lorem Ipsum is not simply random text. by injected humour');
INSERT INTO `wp_postmeta` VALUES ('1274', '115', '_blog_categories_1_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1275', '115', 'blog_categories_1_guild_item_link2', 'http://realvsfakeguide.local/post8/');
INSERT INTO `wp_postmeta` VALUES ('1276', '115', '_blog_categories_1_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1277', '115', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('1278', '115', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1279', '115', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('1280', '115', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1281', '115', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('1282', '115', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1283', '115', 'blog_categories_2_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1284', '115', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1285', '115', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1286', '115', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1287', '115', 'blog_categories_2_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1288', '115', '_blog_categories_2_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1289', '115', 'blog_categories_2_guild_item_title2', 'post7');
INSERT INTO `wp_postmeta` VALUES ('1290', '115', '_blog_categories_2_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1291', '115', 'blog_categories_2_guild_item_content2', 'Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making');
INSERT INTO `wp_postmeta` VALUES ('1292', '115', '_blog_categories_2_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1293', '115', 'blog_categories_2_guild_item_link2', 'http://realvsfakeguide.local/post7/');
INSERT INTO `wp_postmeta` VALUES ('1294', '115', '_blog_categories_2_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1295', '115', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('1296', '115', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('1297', '115', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('1298', '115', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('1299', '115', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('1300', '115', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('1301', '115', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('1302', '115', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('1303', '115', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('1304', '115', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('1305', '115', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('1306', '115', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('1307', '115', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1308', '115', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1309', '115', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1310', '115', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1311', '115', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1312', '115', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1313', '115', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1314', '115', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1315', '115', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('1316', '115', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1317', '115', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1318', '115', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1319', '115', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1320', '115', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1321', '115', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('1322', '115', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1323', '115', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1324', '115', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1325', '115', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1326', '115', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1327', '115', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1328', '115', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1329', '115', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('1330', '115', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1331', '115', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('1332', '115', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('1334', '116', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('1335', '116', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1336', '116', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('1337', '116', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1338', '116', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('1339', '116', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1340', '116', 'blog_categories_0_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1341', '116', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1342', '116', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1343', '116', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1344', '116', 'blog_categories_0_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1345', '116', '_blog_categories_0_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1346', '116', 'blog_categories_0_guild_item_title2', 'post9');
INSERT INTO `wp_postmeta` VALUES ('1347', '116', '_blog_categories_0_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1348', '116', 'blog_categories_0_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1349', '116', '_blog_categories_0_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1350', '116', 'blog_categories_0_guild_item_link2', 'http://realvsfakeguide.local/post9/');
INSERT INTO `wp_postmeta` VALUES ('1351', '116', '_blog_categories_0_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1352', '116', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('1353', '116', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1354', '116', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('1355', '116', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1356', '116', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('1357', '116', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1358', '116', 'blog_categories_1_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1359', '116', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1360', '116', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1361', '116', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1362', '116', 'blog_categories_1_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1363', '116', '_blog_categories_1_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1364', '116', 'blog_categories_1_guild_item_title2', 'post8');
INSERT INTO `wp_postmeta` VALUES ('1365', '116', '_blog_categories_1_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1366', '116', 'blog_categories_1_guild_item_content2', 'Fendi Handbags are generally c');
INSERT INTO `wp_postmeta` VALUES ('1367', '116', '_blog_categories_1_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1368', '116', 'blog_categories_1_guild_item_link2', 'http://realvsfakeguide.local/post8/');
INSERT INTO `wp_postmeta` VALUES ('1369', '116', '_blog_categories_1_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1370', '116', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('1371', '116', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1372', '116', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('1373', '116', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1374', '116', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('1375', '116', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1376', '116', 'blog_categories_2_guild_item_content', '’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1377', '116', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1378', '116', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1379', '116', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1380', '116', 'blog_categories_2_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1381', '116', '_blog_categories_2_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1382', '116', 'blog_categories_2_guild_item_title2', 'post7');
INSERT INTO `wp_postmeta` VALUES ('1383', '116', '_blog_categories_2_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1384', '116', 'blog_categories_2_guild_item_content2', 'Fendi Handbags are generally c');
INSERT INTO `wp_postmeta` VALUES ('1385', '116', '_blog_categories_2_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1386', '116', 'blog_categories_2_guild_item_link2', 'http://realvsfakeguide.local/post7/');
INSERT INTO `wp_postmeta` VALUES ('1387', '116', '_blog_categories_2_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1388', '116', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('1389', '116', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('1390', '116', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('1391', '116', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('1392', '116', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('1393', '116', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('1394', '116', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('1395', '116', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('1396', '116', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('1397', '116', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('1398', '116', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('1399', '116', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('1400', '116', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1401', '116', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1402', '116', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1403', '116', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1404', '116', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1405', '116', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1406', '116', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1407', '116', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1408', '116', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('1409', '116', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1410', '116', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1411', '116', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1412', '116', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1413', '116', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1414', '116', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('1415', '116', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1416', '116', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1417', '116', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1418', '116', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1419', '116', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1420', '116', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1421', '116', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1422', '116', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('1423', '116', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1424', '116', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('1425', '116', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('1429', '44', 'rule', 'a:5:{s:5:\"param\";s:13:\"page_template\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:18:\"templates/home.php\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('1430', '117', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('1431', '117', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1432', '117', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('1433', '117', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1434', '117', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('1435', '117', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1436', '117', 'blog_categories_0_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1437', '117', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1438', '117', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1439', '117', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1440', '117', 'blog_categories_0_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1441', '117', '_blog_categories_0_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1442', '117', 'blog_categories_0_guild_item_title2', 'post9');
INSERT INTO `wp_postmeta` VALUES ('1443', '117', '_blog_categories_0_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1444', '117', 'blog_categories_0_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1445', '117', '_blog_categories_0_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1446', '117', 'blog_categories_0_guild_item_link2', 'http://realvsfakeguide.local/post9/');
INSERT INTO `wp_postmeta` VALUES ('1447', '117', '_blog_categories_0_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1448', '117', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('1449', '117', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1450', '117', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('1451', '117', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1452', '117', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('1453', '117', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1454', '117', 'blog_categories_1_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1455', '117', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1456', '117', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1457', '117', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1458', '117', 'blog_categories_1_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1459', '117', '_blog_categories_1_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1460', '117', 'blog_categories_1_guild_item_title2', 'post8');
INSERT INTO `wp_postmeta` VALUES ('1461', '117', '_blog_categories_1_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1462', '117', 'blog_categories_1_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1463', '117', '_blog_categories_1_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1464', '117', 'blog_categories_1_guild_item_link2', 'http://realvsfakeguide.local/post8/');
INSERT INTO `wp_postmeta` VALUES ('1465', '117', '_blog_categories_1_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1466', '117', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('1467', '117', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1468', '117', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('1469', '117', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1470', '117', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('1471', '117', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1472', '117', 'blog_categories_2_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1473', '117', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1474', '117', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1475', '117', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1476', '117', 'blog_categories_2_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1477', '117', '_blog_categories_2_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1478', '117', 'blog_categories_2_guild_item_title2', 'post7');
INSERT INTO `wp_postmeta` VALUES ('1479', '117', '_blog_categories_2_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1480', '117', 'blog_categories_2_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1481', '117', '_blog_categories_2_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1482', '117', 'blog_categories_2_guild_item_link2', 'http://realvsfakeguide.local/post7/');
INSERT INTO `wp_postmeta` VALUES ('1483', '117', '_blog_categories_2_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1484', '117', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('1485', '117', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('1486', '117', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('1487', '117', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('1488', '117', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('1489', '117', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('1490', '117', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('1491', '117', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('1492', '117', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('1493', '117', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('1494', '117', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('1495', '117', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('1496', '117', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1497', '117', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1498', '117', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1499', '117', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1500', '117', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1501', '117', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1502', '117', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1503', '117', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1504', '117', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('1505', '117', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1506', '117', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1507', '117', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1508', '117', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1509', '117', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1510', '117', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('1511', '117', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1512', '117', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1513', '117', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1514', '117', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1515', '117', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1516', '117', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1517', '117', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1518', '117', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('1519', '117', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1520', '117', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('1521', '117', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('1522', '35', 'field_57908d50fbe78', 'a:13:{s:3:\"key\";s:19:\"field_57908d50fbe78\";s:5:\"label\";s:11:\"slider_post\";s:4:\"name\";s:11:\"slider_post\";s:4:\"type\";s:8:\"repeater\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:10:\"sub_fields\";a:3:{i:0;a:10:{s:3:\"key\";s:19:\"field_5792ec39f5fce\";s:5:\"label\";s:5:\"image\";s:4:\"name\";s:5:\"image\";s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:11:\"save_format\";s:6:\"object\";s:12:\"preview_size\";s:9:\"thumbnail\";s:7:\"library\";s:3:\"all\";s:8:\"order_no\";i:0;}i:1;a:13:{s:3:\"key\";s:19:\"field_5792ec42f5fcf\";s:5:\"label\";s:4:\"text\";s:4:\"name\";s:4:\"text\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:1;}i:2;a:13:{s:3:\"key\";s:19:\"field_5792ec4af5fd0\";s:5:\"label\";s:4:\"link\";s:4:\"name\";s:4:\"link\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:12:\"column_width\";s:0:\"\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:8:\"order_no\";i:2;}}s:7:\"row_min\";s:1:\"0\";s:9:\"row_limit\";s:0:\"\";s:6:\"layout\";s:3:\"row\";s:12:\"button_label\";s:7:\"Add Row\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:5;}');
INSERT INTO `wp_postmeta` VALUES ('1524', '118', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('1525', '118', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1526', '118', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('1527', '118', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1528', '118', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('1529', '118', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1530', '118', 'blog_categories_0_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1531', '118', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1532', '118', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1533', '118', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1534', '118', 'blog_categories_0_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1535', '118', '_blog_categories_0_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1536', '118', 'blog_categories_0_guild_item_title2', 'post9');
INSERT INTO `wp_postmeta` VALUES ('1537', '118', '_blog_categories_0_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1538', '118', 'blog_categories_0_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1539', '118', '_blog_categories_0_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1540', '118', 'blog_categories_0_guild_item_link2', 'http://realvsfakeguide.local/post9/');
INSERT INTO `wp_postmeta` VALUES ('1541', '118', '_blog_categories_0_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1542', '118', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('1543', '118', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1544', '118', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('1545', '118', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1546', '118', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('1547', '118', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1548', '118', 'blog_categories_1_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1549', '118', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1550', '118', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1551', '118', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1552', '118', 'blog_categories_1_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1553', '118', '_blog_categories_1_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1554', '118', 'blog_categories_1_guild_item_title2', 'post8');
INSERT INTO `wp_postmeta` VALUES ('1555', '118', '_blog_categories_1_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1556', '118', 'blog_categories_1_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1557', '118', '_blog_categories_1_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1558', '118', 'blog_categories_1_guild_item_link2', 'http://realvsfakeguide.local/post8/');
INSERT INTO `wp_postmeta` VALUES ('1559', '118', '_blog_categories_1_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1560', '118', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('1561', '118', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1562', '118', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('1563', '118', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1564', '118', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('1565', '118', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1566', '118', 'blog_categories_2_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1567', '118', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1568', '118', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1569', '118', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1570', '118', 'blog_categories_2_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1571', '118', '_blog_categories_2_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1572', '118', 'blog_categories_2_guild_item_title2', 'post7');
INSERT INTO `wp_postmeta` VALUES ('1573', '118', '_blog_categories_2_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1574', '118', 'blog_categories_2_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1575', '118', '_blog_categories_2_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1576', '118', 'blog_categories_2_guild_item_link2', 'http://realvsfakeguide.local/post7/');
INSERT INTO `wp_postmeta` VALUES ('1577', '118', '_blog_categories_2_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1578', '118', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('1579', '118', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('1580', '118', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('1581', '118', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('1582', '118', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('1583', '118', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('1584', '118', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('1585', '118', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('1586', '118', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('1587', '118', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('1588', '118', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('1589', '118', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('1590', '118', 'slider_post_0_slider_post_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1591', '118', '_slider_post_0_slider_post_link', 'field_57908d60fbe79');
INSERT INTO `wp_postmeta` VALUES ('1592', '118', 'slider_post_0_slider_post_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1593', '118', '_slider_post_0_slider_post_thumb', 'field_57908db4fbe7a');
INSERT INTO `wp_postmeta` VALUES ('1594', '118', 'slider_post_0_slider_post_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1595', '118', '_slider_post_0_slider_post_title', 'field_57908dbdfbe7b');
INSERT INTO `wp_postmeta` VALUES ('1596', '118', 'slider_post_0_slider_post_link2', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1597', '118', '_slider_post_0_slider_post_link2', 'field_57908dc5fbe7c');
INSERT INTO `wp_postmeta` VALUES ('1598', '118', 'slider_post_0_slider_post_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1599', '118', '_slider_post_0_slider_post_thumb2', 'field_57908dd2fbe7d');
INSERT INTO `wp_postmeta` VALUES ('1600', '118', 'slider_post_0_slider_post_title2', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1601', '118', '_slider_post_0_slider_post_title2', 'field_57908ddbfbe7e');
INSERT INTO `wp_postmeta` VALUES ('1602', '118', 'slider_post_0_slider_post_link3', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1603', '118', '_slider_post_0_slider_post_link3', 'field_57908de3fbe7f');
INSERT INTO `wp_postmeta` VALUES ('1604', '118', 'slider_post_0_slider_post_thumb3', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1605', '118', '_slider_post_0_slider_post_thumb3', 'field_57908debfbe80');
INSERT INTO `wp_postmeta` VALUES ('1606', '118', 'slider_post_0_slider_post_title3', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1607', '118', '_slider_post_0_slider_post_title3', 'field_57908df2fbe81');
INSERT INTO `wp_postmeta` VALUES ('1608', '118', 'slider_post_0_slider_post_link4', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1609', '118', '_slider_post_0_slider_post_link4', 'field_57908df8fbe82');
INSERT INTO `wp_postmeta` VALUES ('1610', '118', 'slider_post_0_slider_post_thumb4', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('1611', '118', '_slider_post_0_slider_post_thumb4', 'field_57908e00fbe83');
INSERT INTO `wp_postmeta` VALUES ('1612', '118', 'slider_post_0_slider_post_title4', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1613', '118', '_slider_post_0_slider_post_title4', 'field_57908e06fbe84');
INSERT INTO `wp_postmeta` VALUES ('1614', '118', 'slider_post_0_slider_post_link5', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1615', '118', '_slider_post_0_slider_post_link5', 'field_57908e0efbe85');
INSERT INTO `wp_postmeta` VALUES ('1616', '118', 'slider_post_0_slider_post_thumb5', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('1617', '118', '_slider_post_0_slider_post_thumb5', 'field_57908e15fbe86');
INSERT INTO `wp_postmeta` VALUES ('1618', '118', 'slider_post_0_slider_post_title5', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1619', '118', '_slider_post_0_slider_post_title5', 'field_57908e20fbe87');
INSERT INTO `wp_postmeta` VALUES ('1620', '118', 'slider_post', '1');
INSERT INTO `wp_postmeta` VALUES ('1621', '118', '_slider_post', 'field_57908d50fbe78');
INSERT INTO `wp_postmeta` VALUES ('1622', '118', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1623', '118', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1624', '118', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1625', '118', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1626', '118', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1627', '118', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1628', '118', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1629', '118', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1630', '118', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('1631', '118', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1632', '118', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1633', '118', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1634', '118', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1635', '118', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1636', '118', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('1637', '118', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1638', '118', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1639', '118', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1640', '118', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1641', '118', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1642', '118', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1643', '118', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1644', '118', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('1645', '118', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1646', '118', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('1647', '118', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('1648', '6', 'slider_post_0_slider_post_link', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1649', '6', '_slider_post_0_slider_post_link', 'field_57908d60fbe79');
INSERT INTO `wp_postmeta` VALUES ('1650', '6', 'slider_post_0_slider_post_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-2.jpg');
INSERT INTO `wp_postmeta` VALUES ('1651', '6', '_slider_post_0_slider_post_thumb', 'field_57908db4fbe7a');
INSERT INTO `wp_postmeta` VALUES ('1652', '6', 'slider_post_0_slider_post_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1653', '6', '_slider_post_0_slider_post_title', 'field_57908dbdfbe7b');
INSERT INTO `wp_postmeta` VALUES ('1654', '6', 'slider_post_0_slider_post_link2', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1655', '6', '_slider_post_0_slider_post_link2', 'field_57908dc5fbe7c');
INSERT INTO `wp_postmeta` VALUES ('1656', '6', 'slider_post_0_slider_post_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('1657', '6', '_slider_post_0_slider_post_thumb2', 'field_57908dd2fbe7d');
INSERT INTO `wp_postmeta` VALUES ('1658', '6', 'slider_post_0_slider_post_title2', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1659', '6', '_slider_post_0_slider_post_title2', 'field_57908ddbfbe7e');
INSERT INTO `wp_postmeta` VALUES ('1660', '6', 'slider_post_0_slider_post_link3', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-2.jpg');
INSERT INTO `wp_postmeta` VALUES ('1661', '6', '_slider_post_0_slider_post_link3', 'field_57908de3fbe7f');
INSERT INTO `wp_postmeta` VALUES ('1662', '6', 'slider_post_0_slider_post_thumb3', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1663', '6', '_slider_post_0_slider_post_thumb3', 'field_57908debfbe80');
INSERT INTO `wp_postmeta` VALUES ('1664', '6', 'slider_post_0_slider_post_title3', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1665', '6', '_slider_post_0_slider_post_title3', 'field_57908df2fbe81');
INSERT INTO `wp_postmeta` VALUES ('1666', '6', 'slider_post_0_slider_post_link4', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1667', '6', '_slider_post_0_slider_post_link4', 'field_57908df8fbe82');
INSERT INTO `wp_postmeta` VALUES ('1668', '6', 'slider_post_0_slider_post_thumb4', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('1669', '6', '_slider_post_0_slider_post_thumb4', 'field_57908e00fbe83');
INSERT INTO `wp_postmeta` VALUES ('1670', '6', 'slider_post_0_slider_post_title4', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1671', '6', '_slider_post_0_slider_post_title4', 'field_57908e06fbe84');
INSERT INTO `wp_postmeta` VALUES ('1672', '6', 'slider_post_0_slider_post_link5', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1673', '6', '_slider_post_0_slider_post_link5', 'field_57908e0efbe85');
INSERT INTO `wp_postmeta` VALUES ('1674', '6', 'slider_post_0_slider_post_thumb5', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-2.jpg');
INSERT INTO `wp_postmeta` VALUES ('1675', '6', '_slider_post_0_slider_post_thumb5', 'field_57908e15fbe86');
INSERT INTO `wp_postmeta` VALUES ('1676', '6', 'slider_post_0_slider_post_title5', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1677', '6', '_slider_post_0_slider_post_title5', 'field_57908e20fbe87');
INSERT INTO `wp_postmeta` VALUES ('1678', '6', 'slider_post', '5');
INSERT INTO `wp_postmeta` VALUES ('1679', '6', '_slider_post', 'field_57908d50fbe78');
INSERT INTO `wp_postmeta` VALUES ('1680', '119', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('1681', '119', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1682', '119', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('1683', '119', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1684', '119', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('1685', '119', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1686', '119', 'blog_categories_0_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1687', '119', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1688', '119', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1689', '119', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1690', '119', 'blog_categories_0_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1691', '119', '_blog_categories_0_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1692', '119', 'blog_categories_0_guild_item_title2', 'post9');
INSERT INTO `wp_postmeta` VALUES ('1693', '119', '_blog_categories_0_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1694', '119', 'blog_categories_0_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1695', '119', '_blog_categories_0_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1696', '119', 'blog_categories_0_guild_item_link2', 'http://realvsfakeguide.local/post9/');
INSERT INTO `wp_postmeta` VALUES ('1697', '119', '_blog_categories_0_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1698', '119', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('1699', '119', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1700', '119', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('1701', '119', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1702', '119', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('1703', '119', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1704', '119', 'blog_categories_1_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1705', '119', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1706', '119', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1707', '119', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1708', '119', 'blog_categories_1_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1709', '119', '_blog_categories_1_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1710', '119', 'blog_categories_1_guild_item_title2', 'post8');
INSERT INTO `wp_postmeta` VALUES ('1711', '119', '_blog_categories_1_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1712', '119', 'blog_categories_1_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1713', '119', '_blog_categories_1_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1714', '119', 'blog_categories_1_guild_item_link2', 'http://realvsfakeguide.local/post8/');
INSERT INTO `wp_postmeta` VALUES ('1715', '119', '_blog_categories_1_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1716', '119', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('1717', '119', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1718', '119', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('1719', '119', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1720', '119', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('1721', '119', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1722', '119', 'blog_categories_2_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1723', '119', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1724', '119', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1725', '119', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1726', '119', 'blog_categories_2_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1727', '119', '_blog_categories_2_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1728', '119', 'blog_categories_2_guild_item_title2', 'post7');
INSERT INTO `wp_postmeta` VALUES ('1729', '119', '_blog_categories_2_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1730', '119', 'blog_categories_2_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1731', '119', '_blog_categories_2_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1732', '119', 'blog_categories_2_guild_item_link2', 'http://realvsfakeguide.local/post7/');
INSERT INTO `wp_postmeta` VALUES ('1733', '119', '_blog_categories_2_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1734', '119', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('1735', '119', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('1736', '119', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('1737', '119', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('1738', '119', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('1739', '119', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('1740', '119', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('1741', '119', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('1742', '119', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('1743', '119', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('1744', '119', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('1745', '119', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('1746', '119', 'slider_post_0_slider_post_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1747', '119', '_slider_post_0_slider_post_link', 'field_57908d60fbe79');
INSERT INTO `wp_postmeta` VALUES ('1748', '119', 'slider_post_0_slider_post_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1749', '119', '_slider_post_0_slider_post_thumb', 'field_57908db4fbe7a');
INSERT INTO `wp_postmeta` VALUES ('1750', '119', 'slider_post_0_slider_post_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1751', '119', '_slider_post_0_slider_post_title', 'field_57908dbdfbe7b');
INSERT INTO `wp_postmeta` VALUES ('1752', '119', 'slider_post_0_slider_post_link2', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1753', '119', '_slider_post_0_slider_post_link2', 'field_57908dc5fbe7c');
INSERT INTO `wp_postmeta` VALUES ('1754', '119', 'slider_post_0_slider_post_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1755', '119', '_slider_post_0_slider_post_thumb2', 'field_57908dd2fbe7d');
INSERT INTO `wp_postmeta` VALUES ('1756', '119', 'slider_post_0_slider_post_title2', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1757', '119', '_slider_post_0_slider_post_title2', 'field_57908ddbfbe7e');
INSERT INTO `wp_postmeta` VALUES ('1758', '119', 'slider_post_0_slider_post_link3', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1759', '119', '_slider_post_0_slider_post_link3', 'field_57908de3fbe7f');
INSERT INTO `wp_postmeta` VALUES ('1760', '119', 'slider_post_0_slider_post_thumb3', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1761', '119', '_slider_post_0_slider_post_thumb3', 'field_57908debfbe80');
INSERT INTO `wp_postmeta` VALUES ('1762', '119', 'slider_post_0_slider_post_title3', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1763', '119', '_slider_post_0_slider_post_title3', 'field_57908df2fbe81');
INSERT INTO `wp_postmeta` VALUES ('1764', '119', 'slider_post_0_slider_post_link4', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1765', '119', '_slider_post_0_slider_post_link4', 'field_57908df8fbe82');
INSERT INTO `wp_postmeta` VALUES ('1766', '119', 'slider_post_0_slider_post_thumb4', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1767', '119', '_slider_post_0_slider_post_thumb4', 'field_57908e00fbe83');
INSERT INTO `wp_postmeta` VALUES ('1768', '119', 'slider_post_0_slider_post_title4', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1769', '119', '_slider_post_0_slider_post_title4', 'field_57908e06fbe84');
INSERT INTO `wp_postmeta` VALUES ('1770', '119', 'slider_post_0_slider_post_link5', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1771', '119', '_slider_post_0_slider_post_link5', 'field_57908e0efbe85');
INSERT INTO `wp_postmeta` VALUES ('1772', '119', 'slider_post_0_slider_post_thumb5', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('1773', '119', '_slider_post_0_slider_post_thumb5', 'field_57908e15fbe86');
INSERT INTO `wp_postmeta` VALUES ('1774', '119', 'slider_post_0_slider_post_title5', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1775', '119', '_slider_post_0_slider_post_title5', 'field_57908e20fbe87');
INSERT INTO `wp_postmeta` VALUES ('1776', '119', 'slider_post', '1');
INSERT INTO `wp_postmeta` VALUES ('1777', '119', '_slider_post', 'field_57908d50fbe78');
INSERT INTO `wp_postmeta` VALUES ('1778', '119', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1779', '119', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1780', '119', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1781', '119', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1782', '119', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1783', '119', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1784', '119', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1785', '119', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1786', '119', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('1787', '119', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1788', '119', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1789', '119', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1790', '119', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1791', '119', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1792', '119', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('1793', '119', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1794', '119', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1795', '119', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1796', '119', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1797', '119', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1798', '119', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1799', '119', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1800', '119', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('1801', '119', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1802', '119', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('1803', '119', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('1806', '120', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('1807', '120', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1808', '120', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('1809', '120', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1810', '120', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('1811', '120', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1812', '120', 'blog_categories_0_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1813', '120', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1814', '120', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1815', '120', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1816', '120', 'blog_categories_0_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1817', '120', '_blog_categories_0_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1818', '120', 'blog_categories_0_guild_item_title2', 'post9');
INSERT INTO `wp_postmeta` VALUES ('1819', '120', '_blog_categories_0_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1820', '120', 'blog_categories_0_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1821', '120', '_blog_categories_0_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1822', '120', 'blog_categories_0_guild_item_link2', 'http://realvsfakeguide.local/post9/');
INSERT INTO `wp_postmeta` VALUES ('1823', '120', '_blog_categories_0_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1824', '120', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('1825', '120', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1826', '120', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('1827', '120', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1828', '120', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('1829', '120', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1830', '120', 'blog_categories_1_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1831', '120', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1832', '120', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1833', '120', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1834', '120', 'blog_categories_1_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1835', '120', '_blog_categories_1_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1836', '120', 'blog_categories_1_guild_item_title2', 'post8');
INSERT INTO `wp_postmeta` VALUES ('1837', '120', '_blog_categories_1_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1838', '120', 'blog_categories_1_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1839', '120', '_blog_categories_1_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1840', '120', 'blog_categories_1_guild_item_link2', 'http://realvsfakeguide.local/post8/');
INSERT INTO `wp_postmeta` VALUES ('1841', '120', '_blog_categories_1_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1842', '120', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('1843', '120', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1844', '120', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('1845', '120', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1846', '120', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('1847', '120', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1848', '120', 'blog_categories_2_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1849', '120', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1850', '120', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1851', '120', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1852', '120', 'blog_categories_2_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1853', '120', '_blog_categories_2_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1854', '120', 'blog_categories_2_guild_item_title2', 'post7');
INSERT INTO `wp_postmeta` VALUES ('1855', '120', '_blog_categories_2_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1856', '120', 'blog_categories_2_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1857', '120', '_blog_categories_2_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1858', '120', 'blog_categories_2_guild_item_link2', 'http://realvsfakeguide.local/post7/');
INSERT INTO `wp_postmeta` VALUES ('1859', '120', '_blog_categories_2_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1860', '120', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('1861', '120', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('1862', '120', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('1863', '120', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('1864', '120', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('1865', '120', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('1866', '120', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('1867', '120', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('1868', '120', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('1869', '120', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('1870', '120', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('1871', '120', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('1872', '120', 'slider_post_0_slider_post_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1873', '120', '_slider_post_0_slider_post_link', 'field_57908d60fbe79');
INSERT INTO `wp_postmeta` VALUES ('1874', '120', 'slider_post_0_slider_post_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1875', '120', '_slider_post_0_slider_post_thumb', 'field_57908db4fbe7a');
INSERT INTO `wp_postmeta` VALUES ('1876', '120', 'slider_post_0_slider_post_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1877', '120', '_slider_post_0_slider_post_title', 'field_57908dbdfbe7b');
INSERT INTO `wp_postmeta` VALUES ('1878', '120', 'slider_post_0_slider_post_link2', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1879', '120', '_slider_post_0_slider_post_link2', 'field_57908dc5fbe7c');
INSERT INTO `wp_postmeta` VALUES ('1880', '120', 'slider_post_0_slider_post_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1881', '120', '_slider_post_0_slider_post_thumb2', 'field_57908dd2fbe7d');
INSERT INTO `wp_postmeta` VALUES ('1882', '120', 'slider_post_0_slider_post_title2', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1883', '120', '_slider_post_0_slider_post_title2', 'field_57908ddbfbe7e');
INSERT INTO `wp_postmeta` VALUES ('1884', '120', 'slider_post_0_slider_post_link3', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1885', '120', '_slider_post_0_slider_post_link3', 'field_57908de3fbe7f');
INSERT INTO `wp_postmeta` VALUES ('1886', '120', 'slider_post_0_slider_post_thumb3', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1887', '120', '_slider_post_0_slider_post_thumb3', 'field_57908debfbe80');
INSERT INTO `wp_postmeta` VALUES ('1888', '120', 'slider_post_0_slider_post_title3', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1889', '120', '_slider_post_0_slider_post_title3', 'field_57908df2fbe81');
INSERT INTO `wp_postmeta` VALUES ('1890', '120', 'slider_post_0_slider_post_link4', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1891', '120', '_slider_post_0_slider_post_link4', 'field_57908df8fbe82');
INSERT INTO `wp_postmeta` VALUES ('1892', '120', 'slider_post_0_slider_post_thumb4', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1893', '120', '_slider_post_0_slider_post_thumb4', 'field_57908e00fbe83');
INSERT INTO `wp_postmeta` VALUES ('1894', '120', 'slider_post_0_slider_post_title4', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1895', '120', '_slider_post_0_slider_post_title4', 'field_57908e06fbe84');
INSERT INTO `wp_postmeta` VALUES ('1896', '120', 'slider_post_0_slider_post_link5', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1897', '120', '_slider_post_0_slider_post_link5', 'field_57908e0efbe85');
INSERT INTO `wp_postmeta` VALUES ('1898', '120', 'slider_post_0_slider_post_thumb5', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('1899', '120', '_slider_post_0_slider_post_thumb5', 'field_57908e15fbe86');
INSERT INTO `wp_postmeta` VALUES ('1900', '120', 'slider_post_0_slider_post_title5', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1901', '120', '_slider_post_0_slider_post_title5', 'field_57908e20fbe87');
INSERT INTO `wp_postmeta` VALUES ('1902', '120', 'slider_post_0_slider_post_link6', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1903', '120', '_slider_post_0_slider_post_link6', 'field_57908f89125e3');
INSERT INTO `wp_postmeta` VALUES ('1904', '120', 'slider_post_0_slider_post_thumb6', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/essentials-arnette-skylight_g4.jpg');
INSERT INTO `wp_postmeta` VALUES ('1905', '120', '_slider_post_0_slider_post_thumb6', 'field_57908f92125e4');
INSERT INTO `wp_postmeta` VALUES ('1906', '120', 'slider_post_0_slider_post_title6', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1907', '120', '_slider_post_0_slider_post_title6', 'field_57908f9d125e5');
INSERT INTO `wp_postmeta` VALUES ('1908', '120', 'slider_post', '1');
INSERT INTO `wp_postmeta` VALUES ('1909', '120', '_slider_post', 'field_57908d50fbe78');
INSERT INTO `wp_postmeta` VALUES ('1910', '120', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1911', '120', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1912', '120', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1913', '120', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1914', '120', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1915', '120', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1916', '120', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1917', '120', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1918', '120', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('1919', '120', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1920', '120', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1921', '120', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1922', '120', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1923', '120', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1924', '120', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('1925', '120', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1926', '120', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1927', '120', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1928', '120', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1929', '120', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('1930', '120', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1931', '120', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('1932', '120', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('1933', '120', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('1934', '120', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('1935', '120', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('1936', '6', 'slider_post_0_slider_post_link6', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1937', '6', '_slider_post_0_slider_post_link6', 'field_57908f89125e3');
INSERT INTO `wp_postmeta` VALUES ('1938', '6', 'slider_post_0_slider_post_thumb6', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('1939', '6', '_slider_post_0_slider_post_thumb6', 'field_57908f92125e4');
INSERT INTO `wp_postmeta` VALUES ('1940', '6', 'slider_post_0_slider_post_title6', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('1941', '6', '_slider_post_0_slider_post_title6', 'field_57908f9d125e5');
INSERT INTO `wp_postmeta` VALUES ('1944', '121', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('1945', '121', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1946', '121', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('1947', '121', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1948', '121', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('1949', '121', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1950', '121', 'blog_categories_0_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1951', '121', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1952', '121', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1953', '121', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1954', '121', 'blog_categories_0_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('1955', '121', '_blog_categories_0_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1956', '121', 'blog_categories_0_guild_item_title2', 'post9');
INSERT INTO `wp_postmeta` VALUES ('1957', '121', '_blog_categories_0_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1958', '121', 'blog_categories_0_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1959', '121', '_blog_categories_0_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1960', '121', 'blog_categories_0_guild_item_link2', 'http://realvsfakeguide.local/post9/');
INSERT INTO `wp_postmeta` VALUES ('1961', '121', '_blog_categories_0_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1962', '121', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('1963', '121', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1964', '121', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('1965', '121', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1966', '121', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('1967', '121', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1968', '121', 'blog_categories_1_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1969', '121', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1970', '121', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1971', '121', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1972', '121', 'blog_categories_1_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('1973', '121', '_blog_categories_1_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1974', '121', 'blog_categories_1_guild_item_title2', 'post8');
INSERT INTO `wp_postmeta` VALUES ('1975', '121', '_blog_categories_1_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1976', '121', 'blog_categories_1_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1977', '121', '_blog_categories_1_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1978', '121', 'blog_categories_1_guild_item_link2', 'http://realvsfakeguide.local/post8/');
INSERT INTO `wp_postmeta` VALUES ('1979', '121', '_blog_categories_1_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1980', '121', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('1981', '121', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('1982', '121', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('1983', '121', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('1984', '121', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('1985', '121', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('1986', '121', 'blog_categories_2_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1987', '121', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('1988', '121', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('1989', '121', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('1990', '121', 'blog_categories_2_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('1991', '121', '_blog_categories_2_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('1992', '121', 'blog_categories_2_guild_item_title2', 'post7');
INSERT INTO `wp_postmeta` VALUES ('1993', '121', '_blog_categories_2_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('1994', '121', 'blog_categories_2_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('1995', '121', '_blog_categories_2_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('1996', '121', 'blog_categories_2_guild_item_link2', 'http://realvsfakeguide.local/post7/');
INSERT INTO `wp_postmeta` VALUES ('1997', '121', '_blog_categories_2_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('1998', '121', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('1999', '121', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('2000', '121', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('2001', '121', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('2002', '121', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('2003', '121', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('2004', '121', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('2005', '121', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('2006', '121', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('2007', '121', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('2008', '121', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('2009', '121', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('2010', '121', 'slider_post_0_slider_post_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2011', '121', '_slider_post_0_slider_post_link', 'field_57908d60fbe79');
INSERT INTO `wp_postmeta` VALUES ('2012', '121', 'slider_post_0_slider_post_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2013', '121', '_slider_post_0_slider_post_thumb', 'field_57908db4fbe7a');
INSERT INTO `wp_postmeta` VALUES ('2014', '121', 'slider_post_0_slider_post_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2015', '121', '_slider_post_0_slider_post_title', 'field_57908dbdfbe7b');
INSERT INTO `wp_postmeta` VALUES ('2016', '121', 'slider_post_0_slider_post_link2', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2017', '121', '_slider_post_0_slider_post_link2', 'field_57908dc5fbe7c');
INSERT INTO `wp_postmeta` VALUES ('2018', '121', 'slider_post_0_slider_post_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2019', '121', '_slider_post_0_slider_post_thumb2', 'field_57908dd2fbe7d');
INSERT INTO `wp_postmeta` VALUES ('2020', '121', 'slider_post_0_slider_post_title2', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2021', '121', '_slider_post_0_slider_post_title2', 'field_57908ddbfbe7e');
INSERT INTO `wp_postmeta` VALUES ('2022', '121', 'slider_post_0_slider_post_link3', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2023', '121', '_slider_post_0_slider_post_link3', 'field_57908de3fbe7f');
INSERT INTO `wp_postmeta` VALUES ('2024', '121', 'slider_post_0_slider_post_thumb3', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2025', '121', '_slider_post_0_slider_post_thumb3', 'field_57908debfbe80');
INSERT INTO `wp_postmeta` VALUES ('2026', '121', 'slider_post_0_slider_post_title3', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2027', '121', '_slider_post_0_slider_post_title3', 'field_57908df2fbe81');
INSERT INTO `wp_postmeta` VALUES ('2028', '121', 'slider_post_0_slider_post_link4', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2029', '121', '_slider_post_0_slider_post_link4', 'field_57908df8fbe82');
INSERT INTO `wp_postmeta` VALUES ('2030', '121', 'slider_post_0_slider_post_thumb4', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('2031', '121', '_slider_post_0_slider_post_thumb4', 'field_57908e00fbe83');
INSERT INTO `wp_postmeta` VALUES ('2032', '121', 'slider_post_0_slider_post_title4', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2033', '121', '_slider_post_0_slider_post_title4', 'field_57908e06fbe84');
INSERT INTO `wp_postmeta` VALUES ('2034', '121', 'slider_post_0_slider_post_link5', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2035', '121', '_slider_post_0_slider_post_link5', 'field_57908e0efbe85');
INSERT INTO `wp_postmeta` VALUES ('2036', '121', 'slider_post_0_slider_post_thumb5', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('2037', '121', '_slider_post_0_slider_post_thumb5', 'field_57908e15fbe86');
INSERT INTO `wp_postmeta` VALUES ('2038', '121', 'slider_post_0_slider_post_title5', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2039', '121', '_slider_post_0_slider_post_title5', 'field_57908e20fbe87');
INSERT INTO `wp_postmeta` VALUES ('2040', '121', 'slider_post_0_slider_post_link6', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2041', '121', '_slider_post_0_slider_post_link6', 'field_57908f89125e3');
INSERT INTO `wp_postmeta` VALUES ('2042', '121', 'slider_post_0_slider_post_thumb6', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/essentials-arnette-skylight_g4.jpg');
INSERT INTO `wp_postmeta` VALUES ('2043', '121', '_slider_post_0_slider_post_thumb6', 'field_57908f92125e4');
INSERT INTO `wp_postmeta` VALUES ('2044', '121', 'slider_post_0_slider_post_title6', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2045', '121', '_slider_post_0_slider_post_title6', 'field_57908f9d125e5');
INSERT INTO `wp_postmeta` VALUES ('2046', '121', 'slider_post', '1');
INSERT INTO `wp_postmeta` VALUES ('2047', '121', '_slider_post', 'field_57908d50fbe78');
INSERT INTO `wp_postmeta` VALUES ('2048', '121', 'slider_post2_0_slider_post_link1', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2049', '121', '_slider_post2_0_slider_post_link1', 'field_579090e6b8208');
INSERT INTO `wp_postmeta` VALUES ('2050', '121', 'slider_post2_0_slider_post_thumb1', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2051', '121', '_slider_post2_0_slider_post_thumb1', 'field_579090eeb8209');
INSERT INTO `wp_postmeta` VALUES ('2052', '121', 'slider_post2_0_slider_post_title1', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2053', '121', '_slider_post2_0_slider_post_title1', 'field_579090f9b820a');
INSERT INTO `wp_postmeta` VALUES ('2054', '121', 'slider_post2_1_slider_post_link1', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2055', '121', '_slider_post2_1_slider_post_link1', 'field_579090e6b8208');
INSERT INTO `wp_postmeta` VALUES ('2056', '121', 'slider_post2_1_slider_post_thumb1', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('2057', '121', '_slider_post2_1_slider_post_thumb1', 'field_579090eeb8209');
INSERT INTO `wp_postmeta` VALUES ('2058', '121', 'slider_post2_1_slider_post_title1', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2059', '121', '_slider_post2_1_slider_post_title1', 'field_579090f9b820a');
INSERT INTO `wp_postmeta` VALUES ('2060', '121', 'slider_post2_2_slider_post_link1', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2061', '121', '_slider_post2_2_slider_post_link1', 'field_579090e6b8208');
INSERT INTO `wp_postmeta` VALUES ('2062', '121', 'slider_post2_2_slider_post_thumb1', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2063', '121', '_slider_post2_2_slider_post_thumb1', 'field_579090eeb8209');
INSERT INTO `wp_postmeta` VALUES ('2064', '121', 'slider_post2_2_slider_post_title1', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2065', '121', '_slider_post2_2_slider_post_title1', 'field_579090f9b820a');
INSERT INTO `wp_postmeta` VALUES ('2066', '121', 'slider_post2_3_slider_post_link1', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2067', '121', '_slider_post2_3_slider_post_link1', 'field_579090e6b8208');
INSERT INTO `wp_postmeta` VALUES ('2068', '121', 'slider_post2_3_slider_post_thumb1', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('2069', '121', '_slider_post2_3_slider_post_thumb1', 'field_579090eeb8209');
INSERT INTO `wp_postmeta` VALUES ('2070', '121', 'slider_post2_3_slider_post_title1', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2071', '121', '_slider_post2_3_slider_post_title1', 'field_579090f9b820a');
INSERT INTO `wp_postmeta` VALUES ('2072', '121', 'slider_post2_4_slider_post_link1', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2073', '121', '_slider_post2_4_slider_post_link1', 'field_579090e6b8208');
INSERT INTO `wp_postmeta` VALUES ('2074', '121', 'slider_post2_4_slider_post_thumb1', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('2075', '121', '_slider_post2_4_slider_post_thumb1', 'field_579090eeb8209');
INSERT INTO `wp_postmeta` VALUES ('2076', '121', 'slider_post2_4_slider_post_title1', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2077', '121', '_slider_post2_4_slider_post_title1', 'field_579090f9b820a');
INSERT INTO `wp_postmeta` VALUES ('2078', '121', 'slider_post2_5_slider_post_link1', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2079', '121', '_slider_post2_5_slider_post_link1', 'field_579090e6b8208');
INSERT INTO `wp_postmeta` VALUES ('2080', '121', 'slider_post2_5_slider_post_thumb1', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('2081', '121', '_slider_post2_5_slider_post_thumb1', 'field_579090eeb8209');
INSERT INTO `wp_postmeta` VALUES ('2082', '121', 'slider_post2_5_slider_post_title1', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2083', '121', '_slider_post2_5_slider_post_title1', 'field_579090f9b820a');
INSERT INTO `wp_postmeta` VALUES ('2084', '121', 'slider_post2', '6');
INSERT INTO `wp_postmeta` VALUES ('2085', '121', '_slider_post2', 'field_579090d9b8207');
INSERT INTO `wp_postmeta` VALUES ('2086', '121', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2087', '121', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2088', '121', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2089', '121', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2090', '121', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('2091', '121', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2092', '121', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2093', '121', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2094', '121', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('2095', '121', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2096', '121', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('2097', '121', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2098', '121', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2099', '121', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2100', '121', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('2101', '121', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2102', '121', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2103', '121', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2104', '121', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2105', '121', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2106', '121', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2107', '121', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2108', '121', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('2109', '121', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2110', '121', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('2111', '121', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('2112', '6', 'slider_post2_0_slider_post_link1', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2113', '6', '_slider_post2_0_slider_post_link1', 'field_579090e6b8208');
INSERT INTO `wp_postmeta` VALUES ('2114', '6', 'slider_post2_0_slider_post_thumb1', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2115', '6', '_slider_post2_0_slider_post_thumb1', 'field_579090eeb8209');
INSERT INTO `wp_postmeta` VALUES ('2116', '6', 'slider_post2_0_slider_post_title1', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2117', '6', '_slider_post2_0_slider_post_title1', 'field_579090f9b820a');
INSERT INTO `wp_postmeta` VALUES ('2118', '6', 'slider_post2_1_slider_post_link1', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2119', '6', '_slider_post2_1_slider_post_link1', 'field_579090e6b8208');
INSERT INTO `wp_postmeta` VALUES ('2120', '6', 'slider_post2_1_slider_post_thumb1', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('2121', '6', '_slider_post2_1_slider_post_thumb1', 'field_579090eeb8209');
INSERT INTO `wp_postmeta` VALUES ('2122', '6', 'slider_post2_1_slider_post_title1', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2123', '6', '_slider_post2_1_slider_post_title1', 'field_579090f9b820a');
INSERT INTO `wp_postmeta` VALUES ('2124', '6', 'slider_post2_2_slider_post_link1', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2125', '6', '_slider_post2_2_slider_post_link1', 'field_579090e6b8208');
INSERT INTO `wp_postmeta` VALUES ('2126', '6', 'slider_post2_2_slider_post_thumb1', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2127', '6', '_slider_post2_2_slider_post_thumb1', 'field_579090eeb8209');
INSERT INTO `wp_postmeta` VALUES ('2128', '6', 'slider_post2_2_slider_post_title1', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2129', '6', '_slider_post2_2_slider_post_title1', 'field_579090f9b820a');
INSERT INTO `wp_postmeta` VALUES ('2130', '6', 'slider_post2_3_slider_post_link1', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2131', '6', '_slider_post2_3_slider_post_link1', 'field_579090e6b8208');
INSERT INTO `wp_postmeta` VALUES ('2132', '6', 'slider_post2_3_slider_post_thumb1', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('2133', '6', '_slider_post2_3_slider_post_thumb1', 'field_579090eeb8209');
INSERT INTO `wp_postmeta` VALUES ('2134', '6', 'slider_post2_3_slider_post_title1', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2135', '6', '_slider_post2_3_slider_post_title1', 'field_579090f9b820a');
INSERT INTO `wp_postmeta` VALUES ('2136', '6', 'slider_post2_4_slider_post_link1', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2137', '6', '_slider_post2_4_slider_post_link1', 'field_579090e6b8208');
INSERT INTO `wp_postmeta` VALUES ('2138', '6', 'slider_post2_4_slider_post_thumb1', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('2139', '6', '_slider_post2_4_slider_post_thumb1', 'field_579090eeb8209');
INSERT INTO `wp_postmeta` VALUES ('2140', '6', 'slider_post2_4_slider_post_title1', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2141', '6', '_slider_post2_4_slider_post_title1', 'field_579090f9b820a');
INSERT INTO `wp_postmeta` VALUES ('2142', '6', 'slider_post2_5_slider_post_link1', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2143', '6', '_slider_post2_5_slider_post_link1', 'field_579090e6b8208');
INSERT INTO `wp_postmeta` VALUES ('2144', '6', 'slider_post2_5_slider_post_thumb1', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('2145', '6', '_slider_post2_5_slider_post_thumb1', 'field_579090eeb8209');
INSERT INTO `wp_postmeta` VALUES ('2146', '6', 'slider_post2_5_slider_post_title1', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2147', '6', '_slider_post2_5_slider_post_title1', 'field_579090f9b820a');
INSERT INTO `wp_postmeta` VALUES ('2148', '6', 'slider_post2', '6');
INSERT INTO `wp_postmeta` VALUES ('2149', '6', '_slider_post2', 'field_579090d9b8207');
INSERT INTO `wp_postmeta` VALUES ('2151', '122', '_wp_attached_file', '2016/07/link-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('2152', '122', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:262;s:6:\"height\";i:220;s:4:\"file\";s:18:\"2016/07/link-1.jpg\";s:5:\"sizes\";a:1:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:18:\"link-1-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('2153', '123', '_wp_attached_file', '2016/07/link-2.jpg');
INSERT INTO `wp_postmeta` VALUES ('2154', '123', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:262;s:6:\"height\";i:220;s:4:\"file\";s:18:\"2016/07/link-2.jpg\";s:5:\"sizes\";a:1:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:18:\"link-2-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('2155', '124', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('2156', '124', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('2157', '124', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('2158', '124', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('2159', '124', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('2160', '124', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('2161', '124', 'blog_categories_0_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2162', '124', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('2163', '124', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2164', '124', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('2165', '124', 'blog_categories_0_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('2166', '124', '_blog_categories_0_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('2167', '124', 'blog_categories_0_guild_item_title2', 'post9');
INSERT INTO `wp_postmeta` VALUES ('2168', '124', '_blog_categories_0_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('2169', '124', 'blog_categories_0_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2170', '124', '_blog_categories_0_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('2171', '124', 'blog_categories_0_guild_item_link2', 'http://realvsfakeguide.local/post9/');
INSERT INTO `wp_postmeta` VALUES ('2172', '124', '_blog_categories_0_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('2173', '124', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('2174', '124', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('2175', '124', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('2176', '124', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('2177', '124', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('2178', '124', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('2179', '124', 'blog_categories_1_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2180', '124', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('2181', '124', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2182', '124', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('2183', '124', 'blog_categories_1_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2184', '124', '_blog_categories_1_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('2185', '124', 'blog_categories_1_guild_item_title2', 'post8');
INSERT INTO `wp_postmeta` VALUES ('2186', '124', '_blog_categories_1_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('2187', '124', 'blog_categories_1_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2188', '124', '_blog_categories_1_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('2189', '124', 'blog_categories_1_guild_item_link2', 'http://realvsfakeguide.local/post8/');
INSERT INTO `wp_postmeta` VALUES ('2190', '124', '_blog_categories_1_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('2191', '124', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('2192', '124', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('2193', '124', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('2194', '124', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('2195', '124', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('2196', '124', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('2197', '124', 'blog_categories_2_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2198', '124', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('2199', '124', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2200', '124', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('2201', '124', 'blog_categories_2_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('2202', '124', '_blog_categories_2_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('2203', '124', 'blog_categories_2_guild_item_title2', 'post7');
INSERT INTO `wp_postmeta` VALUES ('2204', '124', '_blog_categories_2_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('2205', '124', 'blog_categories_2_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2206', '124', '_blog_categories_2_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('2207', '124', 'blog_categories_2_guild_item_link2', 'http://realvsfakeguide.local/post7/');
INSERT INTO `wp_postmeta` VALUES ('2208', '124', '_blog_categories_2_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('2209', '124', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('2210', '124', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('2211', '124', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('2212', '124', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('2213', '124', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('2214', '124', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('2215', '124', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('2216', '124', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('2217', '124', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('2218', '124', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('2219', '124', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('2220', '124', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('2221', '124', 'slider_post_0_slider_post_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2222', '124', '_slider_post_0_slider_post_link', 'field_57908d60fbe79');
INSERT INTO `wp_postmeta` VALUES ('2223', '124', 'slider_post_0_slider_post_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-2.jpg');
INSERT INTO `wp_postmeta` VALUES ('2224', '124', '_slider_post_0_slider_post_thumb', 'field_57908db4fbe7a');
INSERT INTO `wp_postmeta` VALUES ('2225', '124', 'slider_post_0_slider_post_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2226', '124', '_slider_post_0_slider_post_title', 'field_57908dbdfbe7b');
INSERT INTO `wp_postmeta` VALUES ('2227', '124', 'slider_post_0_slider_post_link2', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2228', '124', '_slider_post_0_slider_post_link2', 'field_57908dc5fbe7c');
INSERT INTO `wp_postmeta` VALUES ('2229', '124', 'slider_post_0_slider_post_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('2230', '124', '_slider_post_0_slider_post_thumb2', 'field_57908dd2fbe7d');
INSERT INTO `wp_postmeta` VALUES ('2231', '124', 'slider_post_0_slider_post_title2', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2232', '124', '_slider_post_0_slider_post_title2', 'field_57908ddbfbe7e');
INSERT INTO `wp_postmeta` VALUES ('2233', '124', 'slider_post_0_slider_post_link3', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-2.jpg');
INSERT INTO `wp_postmeta` VALUES ('2234', '124', '_slider_post_0_slider_post_link3', 'field_57908de3fbe7f');
INSERT INTO `wp_postmeta` VALUES ('2235', '124', 'slider_post_0_slider_post_thumb3', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2236', '124', '_slider_post_0_slider_post_thumb3', 'field_57908debfbe80');
INSERT INTO `wp_postmeta` VALUES ('2237', '124', 'slider_post_0_slider_post_title3', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2238', '124', '_slider_post_0_slider_post_title3', 'field_57908df2fbe81');
INSERT INTO `wp_postmeta` VALUES ('2239', '124', 'slider_post_0_slider_post_link4', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2240', '124', '_slider_post_0_slider_post_link4', 'field_57908df8fbe82');
INSERT INTO `wp_postmeta` VALUES ('2241', '124', 'slider_post_0_slider_post_thumb4', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('2242', '124', '_slider_post_0_slider_post_thumb4', 'field_57908e00fbe83');
INSERT INTO `wp_postmeta` VALUES ('2243', '124', 'slider_post_0_slider_post_title4', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2244', '124', '_slider_post_0_slider_post_title4', 'field_57908e06fbe84');
INSERT INTO `wp_postmeta` VALUES ('2245', '124', 'slider_post_0_slider_post_link5', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2246', '124', '_slider_post_0_slider_post_link5', 'field_57908e0efbe85');
INSERT INTO `wp_postmeta` VALUES ('2247', '124', 'slider_post_0_slider_post_thumb5', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-2.jpg');
INSERT INTO `wp_postmeta` VALUES ('2248', '124', '_slider_post_0_slider_post_thumb5', 'field_57908e15fbe86');
INSERT INTO `wp_postmeta` VALUES ('2249', '124', 'slider_post_0_slider_post_title5', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2250', '124', '_slider_post_0_slider_post_title5', 'field_57908e20fbe87');
INSERT INTO `wp_postmeta` VALUES ('2251', '124', 'slider_post_0_slider_post_link6', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2252', '124', '_slider_post_0_slider_post_link6', 'field_57908f89125e3');
INSERT INTO `wp_postmeta` VALUES ('2253', '124', 'slider_post_0_slider_post_thumb6', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('2254', '124', '_slider_post_0_slider_post_thumb6', 'field_57908f92125e4');
INSERT INTO `wp_postmeta` VALUES ('2255', '124', 'slider_post_0_slider_post_title6', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2256', '124', '_slider_post_0_slider_post_title6', 'field_57908f9d125e5');
INSERT INTO `wp_postmeta` VALUES ('2257', '124', 'slider_post', '1');
INSERT INTO `wp_postmeta` VALUES ('2258', '124', '_slider_post', 'field_57908d50fbe78');
INSERT INTO `wp_postmeta` VALUES ('2259', '124', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2260', '124', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2261', '124', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2262', '124', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2263', '124', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('2264', '124', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2265', '124', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2266', '124', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2267', '124', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('2268', '124', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2269', '124', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('2270', '124', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2271', '124', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2272', '124', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2273', '124', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('2274', '124', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2275', '124', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2276', '124', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2277', '124', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2278', '124', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2279', '124', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2280', '124', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2281', '124', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('2282', '124', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2283', '124', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('2284', '124', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('2285', '125', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('2286', '125', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('2287', '125', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('2288', '125', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('2289', '125', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('2290', '125', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('2291', '125', 'blog_categories_0_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2292', '125', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('2293', '125', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2294', '125', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('2295', '125', 'blog_categories_0_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('2296', '125', '_blog_categories_0_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('2297', '125', 'blog_categories_0_guild_item_title2', 'post9');
INSERT INTO `wp_postmeta` VALUES ('2298', '125', '_blog_categories_0_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('2299', '125', 'blog_categories_0_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2300', '125', '_blog_categories_0_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('2301', '125', 'blog_categories_0_guild_item_link2', 'http://realvsfakeguide.local/post9/');
INSERT INTO `wp_postmeta` VALUES ('2302', '125', '_blog_categories_0_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('2303', '125', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('2304', '125', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('2305', '125', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('2306', '125', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('2307', '125', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('2308', '125', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('2309', '125', 'blog_categories_1_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2310', '125', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('2311', '125', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2312', '125', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('2313', '125', 'blog_categories_1_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2314', '125', '_blog_categories_1_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('2315', '125', 'blog_categories_1_guild_item_title2', 'post8');
INSERT INTO `wp_postmeta` VALUES ('2316', '125', '_blog_categories_1_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('2317', '125', 'blog_categories_1_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2318', '125', '_blog_categories_1_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('2319', '125', 'blog_categories_1_guild_item_link2', 'http://realvsfakeguide.local/post8/');
INSERT INTO `wp_postmeta` VALUES ('2320', '125', '_blog_categories_1_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('2321', '125', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('2322', '125', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('2323', '125', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('2324', '125', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('2325', '125', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('2326', '125', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('2327', '125', 'blog_categories_2_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2328', '125', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('2329', '125', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2330', '125', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('2331', '125', 'blog_categories_2_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('2332', '125', '_blog_categories_2_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('2333', '125', 'blog_categories_2_guild_item_title2', 'post7');
INSERT INTO `wp_postmeta` VALUES ('2334', '125', '_blog_categories_2_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('2335', '125', 'blog_categories_2_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2336', '125', '_blog_categories_2_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('2337', '125', 'blog_categories_2_guild_item_link2', 'http://realvsfakeguide.local/post7/');
INSERT INTO `wp_postmeta` VALUES ('2338', '125', '_blog_categories_2_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('2339', '125', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('2340', '125', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('2341', '125', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('2342', '125', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('2343', '125', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('2344', '125', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('2345', '125', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('2346', '125', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('2347', '125', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('2348', '125', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('2349', '125', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('2350', '125', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('2351', '125', 'slider_post_0_slider_post_link', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('2352', '125', '_slider_post_0_slider_post_link', 'field_57908d60fbe79');
INSERT INTO `wp_postmeta` VALUES ('2353', '125', 'slider_post_0_slider_post_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-2.jpg');
INSERT INTO `wp_postmeta` VALUES ('2354', '125', '_slider_post_0_slider_post_thumb', 'field_57908db4fbe7a');
INSERT INTO `wp_postmeta` VALUES ('2355', '125', 'slider_post_0_slider_post_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2356', '125', '_slider_post_0_slider_post_title', 'field_57908dbdfbe7b');
INSERT INTO `wp_postmeta` VALUES ('2357', '125', 'slider_post_0_slider_post_link2', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2358', '125', '_slider_post_0_slider_post_link2', 'field_57908dc5fbe7c');
INSERT INTO `wp_postmeta` VALUES ('2359', '125', 'slider_post_0_slider_post_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('2360', '125', '_slider_post_0_slider_post_thumb2', 'field_57908dd2fbe7d');
INSERT INTO `wp_postmeta` VALUES ('2361', '125', 'slider_post_0_slider_post_title2', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2362', '125', '_slider_post_0_slider_post_title2', 'field_57908ddbfbe7e');
INSERT INTO `wp_postmeta` VALUES ('2363', '125', 'slider_post_0_slider_post_link3', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-2.jpg');
INSERT INTO `wp_postmeta` VALUES ('2364', '125', '_slider_post_0_slider_post_link3', 'field_57908de3fbe7f');
INSERT INTO `wp_postmeta` VALUES ('2365', '125', 'slider_post_0_slider_post_thumb3', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2366', '125', '_slider_post_0_slider_post_thumb3', 'field_57908debfbe80');
INSERT INTO `wp_postmeta` VALUES ('2367', '125', 'slider_post_0_slider_post_title3', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2368', '125', '_slider_post_0_slider_post_title3', 'field_57908df2fbe81');
INSERT INTO `wp_postmeta` VALUES ('2369', '125', 'slider_post_0_slider_post_link4', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2370', '125', '_slider_post_0_slider_post_link4', 'field_57908df8fbe82');
INSERT INTO `wp_postmeta` VALUES ('2371', '125', 'slider_post_0_slider_post_thumb4', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('2372', '125', '_slider_post_0_slider_post_thumb4', 'field_57908e00fbe83');
INSERT INTO `wp_postmeta` VALUES ('2373', '125', 'slider_post_0_slider_post_title4', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2374', '125', '_slider_post_0_slider_post_title4', 'field_57908e06fbe84');
INSERT INTO `wp_postmeta` VALUES ('2375', '125', 'slider_post_0_slider_post_link5', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2376', '125', '_slider_post_0_slider_post_link5', 'field_57908e0efbe85');
INSERT INTO `wp_postmeta` VALUES ('2377', '125', 'slider_post_0_slider_post_thumb5', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-2.jpg');
INSERT INTO `wp_postmeta` VALUES ('2378', '125', '_slider_post_0_slider_post_thumb5', 'field_57908e15fbe86');
INSERT INTO `wp_postmeta` VALUES ('2379', '125', 'slider_post_0_slider_post_title5', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2380', '125', '_slider_post_0_slider_post_title5', 'field_57908e20fbe87');
INSERT INTO `wp_postmeta` VALUES ('2381', '125', 'slider_post_0_slider_post_link6', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2382', '125', '_slider_post_0_slider_post_link6', 'field_57908f89125e3');
INSERT INTO `wp_postmeta` VALUES ('2383', '125', 'slider_post_0_slider_post_thumb6', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('2384', '125', '_slider_post_0_slider_post_thumb6', 'field_57908f92125e4');
INSERT INTO `wp_postmeta` VALUES ('2385', '125', 'slider_post_0_slider_post_title6', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2386', '125', '_slider_post_0_slider_post_title6', 'field_57908f9d125e5');
INSERT INTO `wp_postmeta` VALUES ('2387', '125', 'slider_post', '1');
INSERT INTO `wp_postmeta` VALUES ('2388', '125', '_slider_post', 'field_57908d50fbe78');
INSERT INTO `wp_postmeta` VALUES ('2389', '125', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2390', '125', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2391', '125', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2392', '125', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2393', '125', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('2394', '125', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2395', '125', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2396', '125', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2397', '125', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('2398', '125', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2399', '125', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('2400', '125', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2401', '125', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2402', '125', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2403', '125', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('2404', '125', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2405', '125', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2406', '125', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2407', '125', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2408', '125', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2409', '125', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2410', '125', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2411', '125', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('2412', '125', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2413', '125', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('2414', '125', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('2415', '126', '_wp_attached_file', '2016/07/left-icon.png');
INSERT INTO `wp_postmeta` VALUES ('2416', '126', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:22;s:6:\"height\";i:43;s:4:\"file\";s:21:\"2016/07/left-icon.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('2417', '127', '_wp_attached_file', '2016/07/right-icon.png');
INSERT INTO `wp_postmeta` VALUES ('2418', '127', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:22;s:6:\"height\";i:43;s:4:\"file\";s:22:\"2016/07/right-icon.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('2420', '128', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('2421', '128', 'field_57918f9a6c0d9', 'a:14:{s:3:\"key\";s:19:\"field_57918f9a6c0d9\";s:5:\"label\";s:7:\"page_bg\";s:4:\"name\";s:7:\"page_bg\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('2422', '128', 'field_57918fa16c0da', 'a:14:{s:3:\"key\";s:19:\"field_57918fa16c0da\";s:5:\"label\";s:10:\"page_title\";s:4:\"name\";s:10:\"page_title\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}');
INSERT INTO `wp_postmeta` VALUES ('2424', '128', 'position', 'normal');
INSERT INTO `wp_postmeta` VALUES ('2425', '128', 'layout', 'default');
INSERT INTO `wp_postmeta` VALUES ('2426', '128', 'hide_on_screen', '');
INSERT INTO `wp_postmeta` VALUES ('2427', '128', '_edit_lock', '1469157261:1');
INSERT INTO `wp_postmeta` VALUES ('2428', '129', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('2429', '129', 'field_57918fb55869c', 'a:14:{s:3:\"key\";s:19:\"field_57918fb55869c\";s:5:\"label\";s:7:\"page_bg\";s:4:\"name\";s:7:\"page_bg\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('2430', '129', 'field_57918fc15869d', 'a:14:{s:3:\"key\";s:19:\"field_57918fc15869d\";s:5:\"label\";s:10:\"page_title\";s:4:\"name\";s:10:\"page_title\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:2:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}');
INSERT INTO `wp_postmeta` VALUES ('2431', '129', 'rule', 'a:5:{s:5:\"param\";s:4:\"page\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:2:\"16\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('2432', '129', 'position', 'normal');
INSERT INTO `wp_postmeta` VALUES ('2433', '129', 'layout', 'default');
INSERT INTO `wp_postmeta` VALUES ('2434', '129', 'hide_on_screen', '');
INSERT INTO `wp_postmeta` VALUES ('2435', '129', '_edit_lock', '1469157184:1');
INSERT INTO `wp_postmeta` VALUES ('2436', '130', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('2437', '130', 'field_57918fe13084b', 'a:14:{s:3:\"key\";s:19:\"field_57918fe13084b\";s:5:\"label\";s:7:\"page_bg\";s:4:\"name\";s:7:\"page_bg\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('2438', '130', 'field_57918fe73084c', 'a:14:{s:3:\"key\";s:19:\"field_57918fe73084c\";s:5:\"label\";s:10:\"page_title\";s:4:\"name\";s:10:\"page_title\";s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";s:1:\"0\";s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:10:\"formatting\";s:4:\"html\";s:9:\"maxlength\";s:0:\"\";s:17:\"conditional_logic\";a:3:{s:6:\"status\";s:1:\"0\";s:5:\"rules\";a:1:{i:0;a:3:{s:5:\"field\";s:4:\"null\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:0:\"\";}}s:8:\"allorany\";s:3:\"all\";}s:8:\"order_no\";i:1;}');
INSERT INTO `wp_postmeta` VALUES ('2440', '130', 'position', 'normal');
INSERT INTO `wp_postmeta` VALUES ('2441', '130', 'layout', 'default');
INSERT INTO `wp_postmeta` VALUES ('2442', '130', 'hide_on_screen', '');
INSERT INTO `wp_postmeta` VALUES ('2443', '130', '_edit_lock', '1469157245:1');
INSERT INTO `wp_postmeta` VALUES ('2444', '130', 'rule', 'a:5:{s:5:\"param\";s:4:\"page\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:2:\"14\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('2445', '128', 'rule', 'a:5:{s:5:\"param\";s:4:\"page\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:2:\"10\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('2446', '132', '_wp_attached_file', '2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2447', '132', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1360;s:6:\"height\";i:310;s:4:\"file\";s:22:\"2016/07/bg-contact.jpg\";s:5:\"sizes\";a:4:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:22:\"bg-contact-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:21:\"bg-contact-300x68.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:68;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:22:\"bg-contact-768x175.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:175;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:23:\"bg-contact-1024x233.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:233;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('2448', '133', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2449', '133', '_page_bg', 'field_57918f9a6c0d9');
INSERT INTO `wp_postmeta` VALUES ('2450', '133', 'page_title', 'Write For Us');
INSERT INTO `wp_postmeta` VALUES ('2451', '133', '_page_title', 'field_57918fa16c0da');
INSERT INTO `wp_postmeta` VALUES ('2452', '10', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2453', '10', '_page_bg', 'field_57918f9a6c0d9');
INSERT INTO `wp_postmeta` VALUES ('2454', '10', 'page_title', 'Write For Us');
INSERT INTO `wp_postmeta` VALUES ('2455', '10', '_page_title', 'field_57918fa16c0da');
INSERT INTO `wp_postmeta` VALUES ('2456', '134', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2457', '134', '_page_bg', 'field_57918fb55869c');
INSERT INTO `wp_postmeta` VALUES ('2458', '134', 'page_title', 'Disclaimer');
INSERT INTO `wp_postmeta` VALUES ('2459', '134', '_page_title', 'field_57918fc15869d');
INSERT INTO `wp_postmeta` VALUES ('2460', '16', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2461', '16', '_page_bg', 'field_57918fb55869c');
INSERT INTO `wp_postmeta` VALUES ('2462', '16', 'page_title', 'Disclaimer');
INSERT INTO `wp_postmeta` VALUES ('2463', '16', '_page_title', 'field_57918fc15869d');
INSERT INTO `wp_postmeta` VALUES ('2464', '135', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2465', '135', '_page_bg', 'field_57918fe13084b');
INSERT INTO `wp_postmeta` VALUES ('2466', '135', 'page_title', 'Privacy policy');
INSERT INTO `wp_postmeta` VALUES ('2467', '135', '_page_title', 'field_57918fe73084c');
INSERT INTO `wp_postmeta` VALUES ('2468', '14', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2469', '14', '_page_bg', 'field_57918fe13084b');
INSERT INTO `wp_postmeta` VALUES ('2470', '14', 'page_title', 'Privacy policy');
INSERT INTO `wp_postmeta` VALUES ('2471', '14', '_page_title', 'field_57918fe73084c');
INSERT INTO `wp_postmeta` VALUES ('2472', '136', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2473', '136', '_page_bg', 'field_57918fe13084b');
INSERT INTO `wp_postmeta` VALUES ('2474', '136', 'page_title', 'Privacy policy');
INSERT INTO `wp_postmeta` VALUES ('2475', '136', '_page_title', 'field_57918fe73084c');
INSERT INTO `wp_postmeta` VALUES ('2476', '137', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2477', '137', '_page_bg', 'field_57918fe13084b');
INSERT INTO `wp_postmeta` VALUES ('2478', '137', 'page_title', 'Privacy policy');
INSERT INTO `wp_postmeta` VALUES ('2479', '137', '_page_title', 'field_57918fe73084c');
INSERT INTO `wp_postmeta` VALUES ('2480', '139', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2481', '139', '_page_bg', 'field_57918fe13084b');
INSERT INTO `wp_postmeta` VALUES ('2482', '139', 'page_title', 'Privacy policy');
INSERT INTO `wp_postmeta` VALUES ('2483', '139', '_page_title', 'field_57918fe73084c');
INSERT INTO `wp_postmeta` VALUES ('2484', '141', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2485', '141', '_page_bg', 'field_57918f9a6c0d9');
INSERT INTO `wp_postmeta` VALUES ('2486', '141', 'page_title', 'Write For Us');
INSERT INTO `wp_postmeta` VALUES ('2487', '141', '_page_title', 'field_57918fa16c0da');
INSERT INTO `wp_postmeta` VALUES ('2488', '142', '_wp_attached_file', '2016/07/disclaimer_images_left.png');
INSERT INTO `wp_postmeta` VALUES ('2489', '142', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:164;s:6:\"height\";i:206;s:4:\"file\";s:34:\"2016/07/disclaimer_images_left.png\";s:5:\"sizes\";a:1:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:34:\"disclaimer_images_left-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('2490', '144', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2491', '144', '_page_bg', 'field_57918fb55869c');
INSERT INTO `wp_postmeta` VALUES ('2492', '144', 'page_title', 'Disclaimer');
INSERT INTO `wp_postmeta` VALUES ('2493', '144', '_page_title', 'field_57918fc15869d');
INSERT INTO `wp_postmeta` VALUES ('2494', '145', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2495', '145', '_page_bg', 'field_57918fb55869c');
INSERT INTO `wp_postmeta` VALUES ('2496', '145', 'page_title', 'Disclaimer');
INSERT INTO `wp_postmeta` VALUES ('2497', '145', '_page_title', 'field_57918fc15869d');
INSERT INTO `wp_postmeta` VALUES ('2498', '146', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2499', '146', '_page_bg', 'field_57918fb55869c');
INSERT INTO `wp_postmeta` VALUES ('2500', '146', 'page_title', 'Disclaimer');
INSERT INTO `wp_postmeta` VALUES ('2501', '146', '_page_title', 'field_57918fc15869d');
INSERT INTO `wp_postmeta` VALUES ('2502', '147', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2503', '147', '_page_bg', 'field_57918fb55869c');
INSERT INTO `wp_postmeta` VALUES ('2504', '147', 'page_title', 'Disclaimer');
INSERT INTO `wp_postmeta` VALUES ('2505', '147', '_page_title', 'field_57918fc15869d');
INSERT INTO `wp_postmeta` VALUES ('2506', '148', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2507', '148', '_page_bg', 'field_57918fb55869c');
INSERT INTO `wp_postmeta` VALUES ('2508', '148', 'page_title', 'Disclaimer');
INSERT INTO `wp_postmeta` VALUES ('2509', '148', '_page_title', 'field_57918fc15869d');
INSERT INTO `wp_postmeta` VALUES ('2510', '149', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2511', '149', '_page_bg', 'field_57918fb55869c');
INSERT INTO `wp_postmeta` VALUES ('2512', '149', 'page_title', 'Disclaimer');
INSERT INTO `wp_postmeta` VALUES ('2513', '149', '_page_title', 'field_57918fc15869d');
INSERT INTO `wp_postmeta` VALUES ('2514', '150', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2515', '150', '_page_bg', 'field_57918fb55869c');
INSERT INTO `wp_postmeta` VALUES ('2516', '150', 'page_title', 'Disclaimer');
INSERT INTO `wp_postmeta` VALUES ('2517', '150', '_page_title', 'field_57918fc15869d');
INSERT INTO `wp_postmeta` VALUES ('2518', '151', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2519', '151', '_page_bg', 'field_57918fb55869c');
INSERT INTO `wp_postmeta` VALUES ('2520', '151', 'page_title', 'Disclaimer');
INSERT INTO `wp_postmeta` VALUES ('2521', '151', '_page_title', 'field_57918fc15869d');
INSERT INTO `wp_postmeta` VALUES ('2522', '152', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('2523', '152', '_edit_lock', '1469241460:1');
INSERT INTO `wp_postmeta` VALUES ('2525', '153', 'share_face', '');
INSERT INTO `wp_postmeta` VALUES ('2526', '153', '_share_face', 'field_57904ab17b17d');
INSERT INTO `wp_postmeta` VALUES ('2527', '153', 'share_twitter', '');
INSERT INTO `wp_postmeta` VALUES ('2528', '153', '_share_twitter', 'field_57904ac47b17e');
INSERT INTO `wp_postmeta` VALUES ('2529', '153', 'share_googleplus', '');
INSERT INTO `wp_postmeta` VALUES ('2530', '153', '_share_googleplus', 'field_57904b0d7b17f');
INSERT INTO `wp_postmeta` VALUES ('2531', '153', 'share_pinterest', '');
INSERT INTO `wp_postmeta` VALUES ('2532', '153', '_share_pinterest', 'field_57904b137b180');
INSERT INTO `wp_postmeta` VALUES ('2533', '152', 'share_face', '');
INSERT INTO `wp_postmeta` VALUES ('2534', '152', '_share_face', 'field_57904ab17b17d');
INSERT INTO `wp_postmeta` VALUES ('2535', '152', 'share_twitter', '');
INSERT INTO `wp_postmeta` VALUES ('2536', '152', '_share_twitter', 'field_57904ac47b17e');
INSERT INTO `wp_postmeta` VALUES ('2537', '152', 'share_googleplus', '');
INSERT INTO `wp_postmeta` VALUES ('2538', '152', '_share_googleplus', 'field_57904b0d7b17f');
INSERT INTO `wp_postmeta` VALUES ('2539', '152', 'share_pinterest', '');
INSERT INTO `wp_postmeta` VALUES ('2540', '152', '_share_pinterest', 'field_57904b137b180');
INSERT INTO `wp_postmeta` VALUES ('2541', '152', '_thumbnail_id', '75');
INSERT INTO `wp_postmeta` VALUES ('2543', '154', '_form', '<img class=\"icon-name\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-name.png\">[text text-299 placeholder \"Your Name\"] </p>\n\n<img class=\"icon-mail\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-mail.png\">[email email-529 placeholder \"Your Email\"] </p>\n\n[textarea textarea-217 placeholder \"Message\"]</p>\n\n<p class=\"btn_submit_contact\">[submit \"SUBMIT\"]</p>');
INSERT INTO `wp_postmeta` VALUES ('2544', '154', '_mail', 'a:8:{s:7:\"subject\";s:35:\"Real Vs Fake Guide \"[your-subject]\"\";s:6:\"sender\";s:45:\"[your-name] <wordpress@realvsfakeguide.local>\";s:4:\"body\";s:184:\"From: [your-name] <[your-email]>\nSubject: [your-subject]\n\nMessage Body:\n[your-message]\n\n--\nThis e-mail was sent from a contact form on Real Vs Fake Guide (http://realvsfakeguide.local)\";s:9:\"recipient\";s:19:\"labkuroky@gmail.com\";s:18:\"additional_headers\";s:22:\"Reply-To: [your-email]\";s:11:\"attachments\";s:0:\"\";s:8:\"use_html\";b:0;s:13:\"exclude_blank\";b:0;}');
INSERT INTO `wp_postmeta` VALUES ('2545', '154', '_mail_2', 'a:9:{s:6:\"active\";b:0;s:7:\"subject\";s:35:\"Real Vs Fake Guide \"[your-subject]\"\";s:6:\"sender\";s:52:\"Real Vs Fake Guide <wordpress@realvsfakeguide.local>\";s:4:\"body\";s:126:\"Message Body:\n[your-message]\n\n--\nThis e-mail was sent from a contact form on Real Vs Fake Guide (http://realvsfakeguide.local)\";s:9:\"recipient\";s:12:\"[your-email]\";s:18:\"additional_headers\";s:29:\"Reply-To: labkuroky@gmail.com\";s:11:\"attachments\";s:0:\"\";s:8:\"use_html\";b:0;s:13:\"exclude_blank\";b:0;}');
INSERT INTO `wp_postmeta` VALUES ('2546', '154', '_messages', 'a:23:{s:12:\"mail_sent_ok\";s:45:\"Thank you for your message. It has been sent.\";s:12:\"mail_sent_ng\";s:71:\"There was an error trying to send your message. Please try again later.\";s:16:\"validation_error\";s:61:\"One or more fields have an error. Please check and try again.\";s:4:\"spam\";s:71:\"There was an error trying to send your message. Please try again later.\";s:12:\"accept_terms\";s:69:\"You must accept the terms and conditions before sending your message.\";s:16:\"invalid_required\";s:22:\"The field is required.\";s:16:\"invalid_too_long\";s:22:\"The field is too long.\";s:17:\"invalid_too_short\";s:23:\"The field is too short.\";s:12:\"invalid_date\";s:29:\"The date format is incorrect.\";s:14:\"date_too_early\";s:44:\"The date is before the earliest one allowed.\";s:13:\"date_too_late\";s:41:\"The date is after the latest one allowed.\";s:13:\"upload_failed\";s:46:\"There was an unknown error uploading the file.\";s:24:\"upload_file_type_invalid\";s:49:\"You are not allowed to upload files of this type.\";s:21:\"upload_file_too_large\";s:20:\"The file is too big.\";s:23:\"upload_failed_php_error\";s:38:\"There was an error uploading the file.\";s:14:\"invalid_number\";s:29:\"The number format is invalid.\";s:16:\"number_too_small\";s:47:\"The number is smaller than the minimum allowed.\";s:16:\"number_too_large\";s:46:\"The number is larger than the maximum allowed.\";s:23:\"quiz_answer_not_correct\";s:36:\"The answer to the quiz is incorrect.\";s:17:\"captcha_not_match\";s:31:\"Your entered code is incorrect.\";s:13:\"invalid_email\";s:38:\"The e-mail address entered is invalid.\";s:11:\"invalid_url\";s:19:\"The URL is invalid.\";s:11:\"invalid_tel\";s:32:\"The telephone number is invalid.\";}');
INSERT INTO `wp_postmeta` VALUES ('2547', '154', '_additional_settings', '');
INSERT INTO `wp_postmeta` VALUES ('2548', '154', '_locale', 'en_US');
INSERT INTO `wp_postmeta` VALUES ('2549', '155', '_form', '<p><img class=\"icon-name\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-name.png\">[text text-288 placeholder \"Your Name\"]</p>\n\n<p><img class=\"icon-mail\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-mail.png\">[email email-110 placeholder \"Your email\"]</p>\n\n<p><img class=\"icon-phone\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-phone.png\">[tel tel-970 placeholder \"Phone number\"]</p>\n\n<p>[textarea textarea-791 placeholder \"Message\"]</p>\n\n<p class=\"btn_send_write_for_us\">[submit \"SEND\"]</p>');
INSERT INTO `wp_postmeta` VALUES ('2550', '155', '_mail', 'a:8:{s:7:\"subject\";s:35:\"Real Vs Fake Guide \"[your-subject]\"\";s:6:\"sender\";s:45:\"[your-name] <wordpress@realvsfakeguide.local>\";s:4:\"body\";s:184:\"From: [your-name] <[your-email]>\nSubject: [your-subject]\n\nMessage Body:\n[your-message]\n\n--\nThis e-mail was sent from a contact form on Real Vs Fake Guide (http://realvsfakeguide.local)\";s:9:\"recipient\";s:19:\"labkuroky@gmail.com\";s:18:\"additional_headers\";s:22:\"Reply-To: [your-email]\";s:11:\"attachments\";s:0:\"\";s:8:\"use_html\";b:0;s:13:\"exclude_blank\";b:0;}');
INSERT INTO `wp_postmeta` VALUES ('2551', '155', '_mail_2', 'a:9:{s:6:\"active\";b:0;s:7:\"subject\";s:35:\"Real Vs Fake Guide \"[your-subject]\"\";s:6:\"sender\";s:52:\"Real Vs Fake Guide <wordpress@realvsfakeguide.local>\";s:4:\"body\";s:126:\"Message Body:\n[your-message]\n\n--\nThis e-mail was sent from a contact form on Real Vs Fake Guide (http://realvsfakeguide.local)\";s:9:\"recipient\";s:12:\"[your-email]\";s:18:\"additional_headers\";s:29:\"Reply-To: labkuroky@gmail.com\";s:11:\"attachments\";s:0:\"\";s:8:\"use_html\";b:0;s:13:\"exclude_blank\";b:0;}');
INSERT INTO `wp_postmeta` VALUES ('2552', '155', '_messages', 'a:23:{s:12:\"mail_sent_ok\";s:45:\"Thank you for your message. It has been sent.\";s:12:\"mail_sent_ng\";s:71:\"There was an error trying to send your message. Please try again later.\";s:16:\"validation_error\";s:61:\"One or more fields have an error. Please check and try again.\";s:4:\"spam\";s:71:\"There was an error trying to send your message. Please try again later.\";s:12:\"accept_terms\";s:69:\"You must accept the terms and conditions before sending your message.\";s:16:\"invalid_required\";s:22:\"The field is required.\";s:16:\"invalid_too_long\";s:22:\"The field is too long.\";s:17:\"invalid_too_short\";s:23:\"The field is too short.\";s:12:\"invalid_date\";s:29:\"The date format is incorrect.\";s:14:\"date_too_early\";s:44:\"The date is before the earliest one allowed.\";s:13:\"date_too_late\";s:41:\"The date is after the latest one allowed.\";s:13:\"upload_failed\";s:46:\"There was an unknown error uploading the file.\";s:24:\"upload_file_type_invalid\";s:49:\"You are not allowed to upload files of this type.\";s:21:\"upload_file_too_large\";s:20:\"The file is too big.\";s:23:\"upload_failed_php_error\";s:38:\"There was an error uploading the file.\";s:14:\"invalid_number\";s:29:\"The number format is invalid.\";s:16:\"number_too_small\";s:47:\"The number is smaller than the minimum allowed.\";s:16:\"number_too_large\";s:46:\"The number is larger than the maximum allowed.\";s:23:\"quiz_answer_not_correct\";s:36:\"The answer to the quiz is incorrect.\";s:17:\"captcha_not_match\";s:31:\"Your entered code is incorrect.\";s:13:\"invalid_email\";s:38:\"The e-mail address entered is invalid.\";s:11:\"invalid_url\";s:19:\"The URL is invalid.\";s:11:\"invalid_tel\";s:32:\"The telephone number is invalid.\";}');
INSERT INTO `wp_postmeta` VALUES ('2553', '155', '_additional_settings', '');
INSERT INTO `wp_postmeta` VALUES ('2554', '155', '_locale', 'en_US');
INSERT INTO `wp_postmeta` VALUES ('2555', '156', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2556', '156', '_page_bg', 'field_57918f9a6c0d9');
INSERT INTO `wp_postmeta` VALUES ('2557', '156', 'page_title', 'Write For Us');
INSERT INTO `wp_postmeta` VALUES ('2558', '156', '_page_title', 'field_57918fa16c0da');
INSERT INTO `wp_postmeta` VALUES ('2571', '154', '_config_errors', 'a:1:{s:23:\"mail.additional_headers\";i:102;}');
INSERT INTO `wp_postmeta` VALUES ('2574', '155', '_config_errors', 'a:1:{s:23:\"mail.additional_headers\";i:102;}');
INSERT INTO `wp_postmeta` VALUES ('2576', '158', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2577', '158', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('2578', '158', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2579', '158', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('2580', '158', 'share_face', 'https://www.facebook.com/sharer/sharer.php?u=facebook.com');
INSERT INTO `wp_postmeta` VALUES ('2581', '158', '_share_face', 'field_57904ab17b17d');
INSERT INTO `wp_postmeta` VALUES ('2582', '158', 'share_twitter', 'https://twitter.com/home?status=Demo%20tweet');
INSERT INTO `wp_postmeta` VALUES ('2583', '158', '_share_twitter', 'field_57904ac47b17e');
INSERT INTO `wp_postmeta` VALUES ('2584', '158', 'share_googleplus', 'https://plus.google.com/share?url=realvsfakeguide');
INSERT INTO `wp_postmeta` VALUES ('2585', '158', '_share_googleplus', 'field_57904b0d7b17f');
INSERT INTO `wp_postmeta` VALUES ('2586', '158', 'share_pinterest', 'https://www.linkedin.com/shareArticle?mini=true&url=realvsfakeguide&title=&summary=&source=');
INSERT INTO `wp_postmeta` VALUES ('2587', '158', '_share_pinterest', 'field_57904b137b180');
INSERT INTO `wp_postmeta` VALUES ('2588', '35', 'rule', 'a:5:{s:5:\"param\";s:13:\"page_template\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:18:\"templates/home.php\";s:8:\"order_no\";i:0;s:8:\"group_no\";i:0;}');
INSERT INTO `wp_postmeta` VALUES ('2589', '159', 'blog_categories_0_category', '2');
INSERT INTO `wp_postmeta` VALUES ('2590', '159', '_blog_categories_0_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('2591', '159', 'blog_categories_0_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('2592', '159', '_blog_categories_0_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('2593', '159', 'blog_categories_0_guild_item_title', 'Post1');
INSERT INTO `wp_postmeta` VALUES ('2594', '159', '_blog_categories_0_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('2595', '159', 'blog_categories_0_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2596', '159', '_blog_categories_0_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('2597', '159', 'blog_categories_0_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2598', '159', '_blog_categories_0_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('2599', '159', 'blog_categories_0_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('2600', '159', '_blog_categories_0_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('2601', '159', 'blog_categories_0_guild_item_title2', 'post9');
INSERT INTO `wp_postmeta` VALUES ('2602', '159', '_blog_categories_0_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('2603', '159', 'blog_categories_0_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2604', '159', '_blog_categories_0_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('2605', '159', 'blog_categories_0_guild_item_link2', 'http://realvsfakeguide.local/post9/');
INSERT INTO `wp_postmeta` VALUES ('2606', '159', '_blog_categories_0_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('2607', '159', 'blog_categories_1_category', '3');
INSERT INTO `wp_postmeta` VALUES ('2608', '159', '_blog_categories_1_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('2609', '159', 'blog_categories_1_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg');
INSERT INTO `wp_postmeta` VALUES ('2610', '159', '_blog_categories_1_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('2611', '159', 'blog_categories_1_guild_item_title', 'Post2');
INSERT INTO `wp_postmeta` VALUES ('2612', '159', '_blog_categories_1_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('2613', '159', 'blog_categories_1_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2614', '159', '_blog_categories_1_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('2615', '159', 'blog_categories_1_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2616', '159', '_blog_categories_1_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('2617', '159', 'blog_categories_1_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2618', '159', '_blog_categories_1_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('2619', '159', 'blog_categories_1_guild_item_title2', 'post8');
INSERT INTO `wp_postmeta` VALUES ('2620', '159', '_blog_categories_1_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('2621', '159', 'blog_categories_1_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2622', '159', '_blog_categories_1_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('2623', '159', 'blog_categories_1_guild_item_link2', 'http://realvsfakeguide.local/post8/');
INSERT INTO `wp_postmeta` VALUES ('2624', '159', '_blog_categories_1_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('2625', '159', 'blog_categories_2_category', '4');
INSERT INTO `wp_postmeta` VALUES ('2626', '159', '_blog_categories_2_category', 'field_578c93a41eae9');
INSERT INTO `wp_postmeta` VALUES ('2627', '159', 'blog_categories_2_guild_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg');
INSERT INTO `wp_postmeta` VALUES ('2628', '159', '_blog_categories_2_guild_item_thumb', 'field_578d82fae3ed5');
INSERT INTO `wp_postmeta` VALUES ('2629', '159', 'blog_categories_2_guild_item_title', 'Post3');
INSERT INTO `wp_postmeta` VALUES ('2630', '159', '_blog_categories_2_guild_item_title', 'field_578d8368e3ed6');
INSERT INTO `wp_postmeta` VALUES ('2631', '159', 'blog_categories_2_guild_item_content', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2632', '159', '_blog_categories_2_guild_item_content', 'field_578d8376e3ed7');
INSERT INTO `wp_postmeta` VALUES ('2633', '159', 'blog_categories_2_guild_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2634', '159', '_blog_categories_2_guild_item_link', 'field_578d8381e3ed8');
INSERT INTO `wp_postmeta` VALUES ('2635', '159', 'blog_categories_2_guild_item_thumb2', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('2636', '159', '_blog_categories_2_guild_item_thumb2', 'field_57907900d06a0');
INSERT INTO `wp_postmeta` VALUES ('2637', '159', 'blog_categories_2_guild_item_title2', 'post7');
INSERT INTO `wp_postmeta` VALUES ('2638', '159', '_blog_categories_2_guild_item_title2', 'field_5790790ad06a1');
INSERT INTO `wp_postmeta` VALUES ('2639', '159', 'blog_categories_2_guild_item_content2', 'Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...');
INSERT INTO `wp_postmeta` VALUES ('2640', '159', '_blog_categories_2_guild_item_content2', 'field_57907918d06a2');
INSERT INTO `wp_postmeta` VALUES ('2641', '159', 'blog_categories_2_guild_item_link2', 'http://realvsfakeguide.local/post7/');
INSERT INTO `wp_postmeta` VALUES ('2642', '159', '_blog_categories_2_guild_item_link2', 'field_57907923d06a3');
INSERT INTO `wp_postmeta` VALUES ('2643', '159', 'blog_categories', '3');
INSERT INTO `wp_postmeta` VALUES ('2644', '159', '_blog_categories', 'field_578c921429399');
INSERT INTO `wp_postmeta` VALUES ('2645', '159', 'banner_text', 'The concerns over counterfeit merchandise go beyond what is and what is not fashionable. They do not only hurt the designer- but multiple people along the way. They are associated with child labor, drugs and even terrorism.');
INSERT INTO `wp_postmeta` VALUES ('2646', '159', '_banner_text', 'field_578c3df7c3b92');
INSERT INTO `wp_postmeta` VALUES ('2647', '159', 'banner_title', 'HOW TO TELL IF A DESIGNERHANDBAG IS FAKE');
INSERT INTO `wp_postmeta` VALUES ('2648', '159', '_banner_title', 'field_578c3e1a96117');
INSERT INTO `wp_postmeta` VALUES ('2649', '159', 'bar_write_for_us_title', 'IF YOU KNOW HOW TO SPOT A REAL AND FAKE PRODUCT!');
INSERT INTO `wp_postmeta` VALUES ('2650', '159', '_bar_write_for_us_title', 'field_578cab33b0485');
INSERT INTO `wp_postmeta` VALUES ('2651', '159', 'bar_write_for_us_text', 'Write for us! You will be paid to do so!');
INSERT INTO `wp_postmeta` VALUES ('2652', '159', '_bar_write_for_us_text', 'field_578cab39e272e');
INSERT INTO `wp_postmeta` VALUES ('2653', '159', 'bar_write_for_us_link', 'http://realvsfakeguide.local/write-for-us/');
INSERT INTO `wp_postmeta` VALUES ('2654', '159', '_bar_write_for_us_link', 'field_578cab4b108c1');
INSERT INTO `wp_postmeta` VALUES ('2655', '159', 'slider_post_0_image', '123');
INSERT INTO `wp_postmeta` VALUES ('2656', '159', '_slider_post_0_image', 'field_5792ec39f5fce');
INSERT INTO `wp_postmeta` VALUES ('2657', '159', 'slider_post_0_text', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2658', '159', '_slider_post_0_text', 'field_5792ec42f5fcf');
INSERT INTO `wp_postmeta` VALUES ('2659', '159', 'slider_post_0_link', '#');
INSERT INTO `wp_postmeta` VALUES ('2660', '159', '_slider_post_0_link', 'field_5792ec4af5fd0');
INSERT INTO `wp_postmeta` VALUES ('2661', '159', 'slider_post_1_image', '123');
INSERT INTO `wp_postmeta` VALUES ('2662', '159', '_slider_post_1_image', 'field_5792ec39f5fce');
INSERT INTO `wp_postmeta` VALUES ('2663', '159', 'slider_post_1_text', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2664', '159', '_slider_post_1_text', 'field_5792ec42f5fcf');
INSERT INTO `wp_postmeta` VALUES ('2665', '159', 'slider_post_1_link', '#');
INSERT INTO `wp_postmeta` VALUES ('2666', '159', '_slider_post_1_link', 'field_5792ec4af5fd0');
INSERT INTO `wp_postmeta` VALUES ('2667', '159', 'slider_post_2_image', '123');
INSERT INTO `wp_postmeta` VALUES ('2668', '159', '_slider_post_2_image', 'field_5792ec39f5fce');
INSERT INTO `wp_postmeta` VALUES ('2669', '159', 'slider_post_2_text', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2670', '159', '_slider_post_2_text', 'field_5792ec42f5fcf');
INSERT INTO `wp_postmeta` VALUES ('2671', '159', 'slider_post_2_link', '#');
INSERT INTO `wp_postmeta` VALUES ('2672', '159', '_slider_post_2_link', 'field_5792ec4af5fd0');
INSERT INTO `wp_postmeta` VALUES ('2673', '159', 'slider_post_3_image', '122');
INSERT INTO `wp_postmeta` VALUES ('2674', '159', '_slider_post_3_image', 'field_5792ec39f5fce');
INSERT INTO `wp_postmeta` VALUES ('2675', '159', 'slider_post_3_text', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2676', '159', '_slider_post_3_text', 'field_5792ec42f5fcf');
INSERT INTO `wp_postmeta` VALUES ('2677', '159', 'slider_post_3_link', '#');
INSERT INTO `wp_postmeta` VALUES ('2678', '159', '_slider_post_3_link', 'field_5792ec4af5fd0');
INSERT INTO `wp_postmeta` VALUES ('2679', '159', 'slider_post_4_image', '64');
INSERT INTO `wp_postmeta` VALUES ('2680', '159', '_slider_post_4_image', 'field_5792ec39f5fce');
INSERT INTO `wp_postmeta` VALUES ('2681', '159', 'slider_post_4_text', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2682', '159', '_slider_post_4_text', 'field_5792ec42f5fcf');
INSERT INTO `wp_postmeta` VALUES ('2683', '159', 'slider_post_4_link', '#');
INSERT INTO `wp_postmeta` VALUES ('2684', '159', '_slider_post_4_link', 'field_5792ec4af5fd0');
INSERT INTO `wp_postmeta` VALUES ('2685', '159', 'slider_post', '5');
INSERT INTO `wp_postmeta` VALUES ('2686', '159', '_slider_post', 'field_57908d50fbe78');
INSERT INTO `wp_postmeta` VALUES ('2687', '159', 'lastest_news_0_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2688', '159', '_lastest_news_0_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2689', '159', 'lastest_news_0_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2690', '159', '_lastest_news_0_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2691', '159', 'lastest_news_0_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png');
INSERT INTO `wp_postmeta` VALUES ('2692', '159', '_lastest_news_0_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2693', '159', 'lastest_news_1_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2694', '159', '_lastest_news_1_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2695', '159', 'lastest_news_1_lastest_news_item_title', 'PELLENTESQUE HABITANT ');
INSERT INTO `wp_postmeta` VALUES ('2696', '159', '_lastest_news_1_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2697', '159', 'lastest_news_1_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png');
INSERT INTO `wp_postmeta` VALUES ('2698', '159', '_lastest_news_1_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2699', '159', 'lastest_news_2_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2700', '159', '_lastest_news_2_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2701', '159', 'lastest_news_2_lastest_news_item_title', 'PELLENTESQUE HABITANT MORBI ');
INSERT INTO `wp_postmeta` VALUES ('2702', '159', '_lastest_news_2_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2703', '159', 'lastest_news_2_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2704', '159', '_lastest_news_2_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2705', '159', 'lastest_news_3_lastest_news_item_link', 'http://realvsfakeguide.local/post1/');
INSERT INTO `wp_postmeta` VALUES ('2706', '159', '_lastest_news_3_lastest_news_item_link', 'field_578d8efd7ca0d');
INSERT INTO `wp_postmeta` VALUES ('2707', '159', 'lastest_news_3_lastest_news_item_title', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2708', '159', '_lastest_news_3_lastest_news_item_title', 'field_578d8f0c7ca0e');
INSERT INTO `wp_postmeta` VALUES ('2709', '159', 'lastest_news_3_lastest_news_item_thumb', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png');
INSERT INTO `wp_postmeta` VALUES ('2710', '159', '_lastest_news_3_lastest_news_item_thumb', 'field_578d8f1e7ca0f');
INSERT INTO `wp_postmeta` VALUES ('2711', '159', 'lastest_news', '4');
INSERT INTO `wp_postmeta` VALUES ('2712', '159', '_lastest_news', 'field_578d8e7eb0199');
INSERT INTO `wp_postmeta` VALUES ('2713', '6', 'slider_post_0_image', '123');
INSERT INTO `wp_postmeta` VALUES ('2714', '6', '_slider_post_0_image', 'field_5792ec39f5fce');
INSERT INTO `wp_postmeta` VALUES ('2715', '6', 'slider_post_0_text', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2716', '6', '_slider_post_0_text', 'field_5792ec42f5fcf');
INSERT INTO `wp_postmeta` VALUES ('2717', '6', 'slider_post_0_link', '#');
INSERT INTO `wp_postmeta` VALUES ('2718', '6', '_slider_post_0_link', 'field_5792ec4af5fd0');
INSERT INTO `wp_postmeta` VALUES ('2719', '6', 'slider_post_1_image', '123');
INSERT INTO `wp_postmeta` VALUES ('2720', '6', '_slider_post_1_image', 'field_5792ec39f5fce');
INSERT INTO `wp_postmeta` VALUES ('2721', '6', 'slider_post_1_text', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2722', '6', '_slider_post_1_text', 'field_5792ec42f5fcf');
INSERT INTO `wp_postmeta` VALUES ('2723', '6', 'slider_post_1_link', '#');
INSERT INTO `wp_postmeta` VALUES ('2724', '6', '_slider_post_1_link', 'field_5792ec4af5fd0');
INSERT INTO `wp_postmeta` VALUES ('2725', '6', 'slider_post_2_image', '123');
INSERT INTO `wp_postmeta` VALUES ('2726', '6', '_slider_post_2_image', 'field_5792ec39f5fce');
INSERT INTO `wp_postmeta` VALUES ('2727', '6', 'slider_post_2_text', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2728', '6', '_slider_post_2_text', 'field_5792ec42f5fcf');
INSERT INTO `wp_postmeta` VALUES ('2729', '6', 'slider_post_2_link', '#');
INSERT INTO `wp_postmeta` VALUES ('2730', '6', '_slider_post_2_link', 'field_5792ec4af5fd0');
INSERT INTO `wp_postmeta` VALUES ('2731', '6', 'slider_post_3_image', '122');
INSERT INTO `wp_postmeta` VALUES ('2732', '6', '_slider_post_3_image', 'field_5792ec39f5fce');
INSERT INTO `wp_postmeta` VALUES ('2733', '6', 'slider_post_3_text', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2734', '6', '_slider_post_3_text', 'field_5792ec42f5fcf');
INSERT INTO `wp_postmeta` VALUES ('2735', '6', 'slider_post_3_link', '#');
INSERT INTO `wp_postmeta` VALUES ('2736', '6', '_slider_post_3_link', 'field_5792ec4af5fd0');
INSERT INTO `wp_postmeta` VALUES ('2737', '6', 'slider_post_4_image', '64');
INSERT INTO `wp_postmeta` VALUES ('2738', '6', '_slider_post_4_image', 'field_5792ec39f5fce');
INSERT INTO `wp_postmeta` VALUES ('2739', '6', 'slider_post_4_text', 'HABITANT MORBI TRISTIQUE SENECTUS');
INSERT INTO `wp_postmeta` VALUES ('2740', '6', '_slider_post_4_text', 'field_5792ec42f5fcf');
INSERT INTO `wp_postmeta` VALUES ('2741', '6', 'slider_post_4_link', '#');
INSERT INTO `wp_postmeta` VALUES ('2742', '6', '_slider_post_4_link', 'field_5792ec4af5fd0');
INSERT INTO `wp_postmeta` VALUES ('2745', '161', '_wp_attached_file', '2016/07/Desert.jpg');
INSERT INTO `wp_postmeta` VALUES ('2746', '161', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1024;s:6:\"height\";i:768;s:4:\"file\";s:18:\"2016/07/Desert.jpg\";s:5:\"sizes\";a:4:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:18:\"Desert-205x205.jpg\";s:5:\"width\";i:205;s:6:\"height\";i:205;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:18:\"Desert-300x225.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:225;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:18:\"Desert-768x576.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:576;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:19:\"Desert-1024x768.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:768;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:7:\"???????\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:10:\"1205503166\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('2749', '162', 'page_bg', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg');
INSERT INTO `wp_postmeta` VALUES ('2750', '162', '_page_bg', 'field_57918f9a6c0d9');
INSERT INTO `wp_postmeta` VALUES ('2751', '162', 'page_title', 'Write For Us');
INSERT INTO `wp_postmeta` VALUES ('2752', '162', '_page_title', 'field_57918fa16c0da');
INSERT INTO `wp_postmeta` VALUES ('2753', '163', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('2754', '163', 'wpuf_form_settings', 'a:24:{s:9:\"post_type\";s:4:\"post\";s:11:\"post_status\";s:7:\"publish\";s:11:\"post_format\";s:1:\"0\";s:11:\"default_cat\";s:2:\"-1\";s:10:\"guest_post\";s:5:\"false\";s:13:\"guest_details\";s:4:\"true\";s:10:\"name_label\";s:4:\"Name\";s:11:\"email_label\";s:5:\"Email\";s:16:\"message_restrict\";s:68:\"This page is restricted. Please Log in / Register to view this page.\";s:11:\"redirect_to\";s:4:\"post\";s:7:\"message\";s:10:\"Post saved\";s:7:\"page_id\";s:2:\"31\";s:3:\"url\";s:0:\"\";s:14:\"comment_status\";s:4:\"open\";s:11:\"submit_text\";s:6:\"Submit\";s:10:\"draft_post\";s:5:\"false\";s:16:\"edit_post_status\";s:7:\"publish\";s:16:\"edit_redirect_to\";s:4:\"same\";s:14:\"update_message\";s:25:\"Post updated successfully\";s:12:\"edit_page_id\";s:2:\"31\";s:8:\"edit_url\";s:0:\"\";s:12:\"subscription\";s:10:\"- Select -\";s:11:\"update_text\";s:6:\"Update\";s:12:\"notification\";a:5:{s:3:\"new\";s:2:\"on\";s:6:\"new_to\";s:19:\"labkuroky@gmail.com\";s:11:\"new_subject\";s:16:\"New post created\";s:8:\"new_body\";s:213:\"Hi Admin,\r\nA new post has been created in your site %sitename% (%siteurl%).\r\n\r\nHere is the details:\r\nPost Title: %post_title%\r\nContent: %post_content%\r\nAuthor: %author%\r\nPost URL: %permalink%\r\nEdit URL: %editlink%\";s:4:\"edit\";s:3:\"off\";}}');
INSERT INTO `wp_postmeta` VALUES ('2755', '163', '_edit_lock', '1469419866:1');
INSERT INTO `wp_postmeta` VALUES ('2776', '174', '_wp_attached_file', '2016/07/avatar_author.jpg');
INSERT INTO `wp_postmeta` VALUES ('2777', '174', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:70;s:6:\"height\";i:70;s:4:\"file\";s:25:\"2016/07/avatar_author.jpg\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('2788', '112', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('2789', '112', '_wp_trash_meta_time', '1469431466');
INSERT INTO `wp_postmeta` VALUES ('2790', '112', '_wp_desired_post_slug', 'acf_post-share');
INSERT INTO `wp_postmeta` VALUES ('2796', '178', '_wp_attached_file', '2016/07/gall2.png');
INSERT INTO `wp_postmeta` VALUES ('2797', '178', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:85;s:6:\"height\";i:85;s:4:\"file\";s:17:\"2016/07/gall2.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('2816', '183', '_wp_attached_file', '2016/07/about-group1-1.jpg');
INSERT INTO `wp_postmeta` VALUES ('2817', '183', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:360;s:6:\"height\";i:300;s:4:\"file\";s:26:\"2016/07/about-group1-1.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:26:\"about-group1-1-205x205.jpg\";s:5:\"width\";i:205;s:6:\"height\";i:205;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:26:\"about-group1-1-300x250.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:250;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('2827', '186', '_wp_attached_file', '2016/07/ca3-1.png');
INSERT INTO `wp_postmeta` VALUES ('2828', '186', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:213;s:6:\"height\";i:208;s:4:\"file\";s:17:\"2016/07/ca3-1.png\";s:5:\"sizes\";a:1:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:17:\"ca3-1-205x205.png\";s:5:\"width\";i:205;s:6:\"height\";i:205;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('2838', '189', '_wp_attached_file', '2016/07/about-group1-2.jpg');
INSERT INTO `wp_postmeta` VALUES ('2839', '189', '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:360;s:6:\"height\";i:300;s:4:\"file\";s:26:\"2016/07/about-group1-2.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:26:\"about-group1-2-205x205.jpg\";s:5:\"width\";i:205;s:6:\"height\";i:205;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:26:\"about-group1-2-300x250.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:250;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}');
INSERT INTO `wp_postmeta` VALUES ('2872', '198', '_edit_lock', '1469436486:1');
INSERT INTO `wp_postmeta` VALUES ('2873', '198', '_edit_last', '1');
INSERT INTO `wp_postmeta` VALUES ('2874', '198', '_wp_page_template', 'templates/register-contributor.php');
INSERT INTO `wp_postmeta` VALUES ('2886', '190', '_wp_trash_meta_status', 'auto-draft');
INSERT INTO `wp_postmeta` VALUES ('2887', '190', '_wp_trash_meta_time', '1469438063');
INSERT INTO `wp_postmeta` VALUES ('2888', '190', '_wp_desired_post_slug', '');
INSERT INTO `wp_postmeta` VALUES ('2892', '44', '_wp_trash_meta_status', 'publish');
INSERT INTO `wp_postmeta` VALUES ('2893', '44', '_wp_trash_meta_time', '1469615589');
INSERT INTO `wp_postmeta` VALUES ('2894', '44', '_wp_desired_post_slug', 'acf_home-categories');
INSERT INTO `wp_postmeta` VALUES ('2897', '110', '_thumbnail_id', '53');
INSERT INTO `wp_postmeta` VALUES ('2900', '205', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2901', '205', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('2902', '205', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2903', '205', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('2904', '108', '_thumbnail_id', '61');
INSERT INTO `wp_postmeta` VALUES ('2907', '206', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2908', '206', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('2909', '206', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2910', '206', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('2911', '106', '_thumbnail_id', '62');
INSERT INTO `wp_postmeta` VALUES ('2914', '207', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2915', '207', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('2916', '207', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2917', '207', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('2920', '208', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2921', '208', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('2922', '208', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2923', '208', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('2926', '209', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2927', '209', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('2928', '209', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2929', '209', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('2932', '210', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2933', '210', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('2934', '210', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2935', '210', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('2936', '85', '_thumbnail_id', '62');
INSERT INTO `wp_postmeta` VALUES ('2939', '83', '_thumbnail_id', '64');
INSERT INTO `wp_postmeta` VALUES ('2942', '81', '_thumbnail_id', '61');
INSERT INTO `wp_postmeta` VALUES ('2945', '55', '_thumbnail_id', '53');
INSERT INTO `wp_postmeta` VALUES ('2948', '213', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2949', '213', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('2950', '213', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2951', '213', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('2952', '55', 'category_news_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2953', '55', '_category_news_banner', 'field_578daf13472f5');
INSERT INTO `wp_postmeta` VALUES ('2954', '55', 'fashion_news_text_banner', '');
INSERT INTO `wp_postmeta` VALUES ('2955', '55', '_fashion_news_text_banner', 'field_578daf28850b0');
INSERT INTO `wp_postmeta` VALUES ('2958', '85', '_pingme', '1');
INSERT INTO `wp_postmeta` VALUES ('2959', '85', '_encloseme', '1');

-- ----------------------------
-- Table structure for `wp_posts`
-- ----------------------------
DROP TABLE IF EXISTS `wp_posts`;
CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_posts
-- ----------------------------
INSERT INTO `wp_posts` VALUES ('2', '1', '2016-07-18 01:46:34', '2016-07-18 01:46:34', 'This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href=\"http://realvsfakeguide.local/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'trash', 'closed', 'open', '', 'sample-page__trashed', '', '', '2016-07-18 01:50:09', '2016-07-18 01:50:09', '', '0', 'http://realvsfakeguide.local/?page_id=2', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('5', '1', '2016-07-18 01:50:09', '2016-07-18 01:50:09', 'This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href=\"http://realvsfakeguide.local/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2016-07-18 01:50:09', '2016-07-18 01:50:09', '', '2', 'http://realvsfakeguide.local/2016/07/18/2-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('6', '1', '2016-07-18 02:02:53', '2016-07-18 02:02:53', '', 'Home', '', 'publish', 'open', 'open', '', 'home', '', '', '2016-07-27 10:26:31', '2016-07-27 10:26:31', '', '0', 'http://realvsfakeguide.local/?page_id=6', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('7', '1', '2016-07-18 02:02:53', '2016-07-18 02:02:53', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-18 02:02:53', '2016-07-18 02:02:53', '', '6', 'http://realvsfakeguide.local/2016/07/18/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('8', '1', '2016-07-18 02:04:35', '2016-07-18 02:04:35', '', 'Tip & Trick', '', 'publish', 'closed', 'closed', '', 'tip-and-trick', '', '', '2016-07-19 07:31:28', '2016-07-19 07:31:28', '', '0', 'http://realvsfakeguide.local/?page_id=8', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('9', '1', '2016-07-18 02:04:35', '2016-07-18 02:04:35', '', 'Tip & Trick', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2016-07-18 02:04:35', '2016-07-18 02:04:35', '', '8', 'http://realvsfakeguide.local/8-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('10', '1', '2016-07-18 02:04:58', '2016-07-18 02:04:58', '', 'Write For Us', '', 'publish', 'closed', 'closed', '', 'write-for-us', '', '', '2016-07-25 03:39:21', '2016-07-25 03:39:21', '', '0', 'http://realvsfakeguide.local/?page_id=10', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('11', '1', '2016-07-18 02:04:58', '2016-07-18 02:04:58', '', 'Write For Us', '', 'inherit', 'closed', 'closed', '', '10-revision-v1', '', '', '2016-07-18 02:04:58', '2016-07-18 02:04:58', '', '10', 'http://realvsfakeguide.local/10-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('12', '1', '2016-07-18 02:05:10', '2016-07-18 02:05:10', '', 'About', '', 'publish', 'closed', 'closed', '', 'about', '', '', '2016-07-22 07:15:06', '2016-07-22 07:15:06', '', '0', 'http://realvsfakeguide.local/?page_id=12', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('13', '1', '2016-07-18 02:05:10', '2016-07-18 02:05:10', '', 'About', '', 'inherit', 'closed', 'closed', '', '12-revision-v1', '', '', '2016-07-18 02:05:10', '2016-07-18 02:05:10', '', '12', 'http://realvsfakeguide.local/12-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('14', '1', '2016-07-18 02:05:53', '2016-07-18 02:05:53', '<h3>Privacy Policy for www.realvsfakeguide.com</h3>\r\n&nbsp;\r\n\r\nIf you require any more information or have any questions about our privacy policy, please feel free to contact us by email at info@realvsfakeguide.com. At www.realvsfakeguide.com, the privacy of our visitors is of extreme importance to us. This privacy policy document outlines the types of personal information is received and collected by www.realvsfakeguide.com and how it is used.\r\n<h3></h3>\r\n<h3>Log Files</h3>\r\n&nbsp;\r\n\r\nLike many other Web sites, www.realvsfakeguide.com makes use of log files. The information inside the log files includes internet protocol ( IP ) addresses, type of browser, Internet Service Provider ( ISP ), date/time stamp, referring/exit pages, and number of clicks to analyze trends, administer the site, track user’s movement around the site, and gather demographic information. IP addresses, and other such information are not linked to any information that is personally identifiable.\r\n<h3></h3>\r\n<h3>Cookies and Web Beacons</h3>\r\n&nbsp;\r\n\r\nwww.realvsfakeguide.com does use cookies to store information about visitors preferences, record user-specific information on which pages the user access or visit, customize Web page content based on visitors browser type or other information that the visitor sends via their browser.\r\n<h3></h3>\r\n<h3>DoubleClick DART Cookie</h3>\r\n&nbsp;\r\n\r\n:: Google, as a third party vendor, uses cookies to serve ads on www.realvsfakeguide.com.\r\n:: Google’s use of the DART cookie enables it to serve ads to users based on their visit to www.realvsfakeguide.com and other sites on the Internet.\r\n:: Users may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy at the following URL – http://www.google.com/privacy_ads.html Some of our advertising partners may use cookies and web beacons on our site. Our advertising partners include ….\r\n<h3></h3>\r\n<h3>Google Adsense</h3>\r\n&nbsp;\r\n\r\nThese third-party ad servers or ad networks use technology to the advertisements and links that appear on www.realvsfakeguide.com send directly to your browsers. They automatically receive your IP address when this occurs. Other technologies ( such as cookies, JavaScript, or Web Beacons ) may also be used by the third-party ad networks to measure the effectiveness of their advertisements and / or to personalize the advertising content that you see. www.realvsfakeguide.com has no access to or control over these cookies that are used by third-party advertisers. You should consult the respective privacy policies of these third-party ad servers for more detailed information on their practices as well as for instructions about how to opt-out of certain practices. www.realvsfakeguide.com’s privacy policy does not apply to, and we cannot control the activities of, such other advertisers or web sites. If you wish to disable cookies, you may do so through your individual browser options. More detailed information about cookie management with specific web browsers can be found at the browsers’ respective websites.', 'Privacy Policy', '', 'publish', 'closed', 'closed', '', 'privacy-policy', '', '', '2016-07-22 06:37:33', '2016-07-22 06:37:33', '', '0', 'http://realvsfakeguide.local/?page_id=14', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('15', '1', '2016-07-18 02:05:53', '2016-07-18 02:05:53', '', 'Privacy Policy', '', 'inherit', 'closed', 'closed', '', '14-revision-v1', '', '', '2016-07-18 02:05:53', '2016-07-18 02:05:53', '', '14', 'http://realvsfakeguide.local/14-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('16', '1', '2016-07-18 02:06:21', '2016-07-18 02:06:21', '<h2><img class=\"size-full wp-image-142 alignleft\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/disclaimer_images_left.png\" alt=\"disclaimer_images_left\" width=\"164\" height=\"206\" /></h2>\r\n<h2>DISCLAIMER</h2>\r\n&nbsp;\r\n<p style=\"padding-left: 90px;\">All data and information provided on this site is for informational purposes only. realvsfakeguide.com makes no representations as to accuracy, completeness, currentness, suitability, or validity of any information on this site and will not be liable for any errors, omissions, or delays in this information or any losses, injuries, or damages arising from its display or use. All information is provided on an as-is basis.</p>', 'Disclaimer', '', 'publish', 'closed', 'closed', '', 'disclaimer', '', '', '2016-07-22 08:00:32', '2016-07-22 08:00:32', '', '0', 'http://realvsfakeguide.local/?page_id=16', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('17', '1', '2016-07-18 02:06:21', '2016-07-18 02:06:21', '', 'Disclaimer', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2016-07-18 02:06:21', '2016-07-18 02:06:21', '', '16', 'http://realvsfakeguide.local/16-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('18', '1', '2016-07-18 02:06:40', '2016-07-18 02:06:40', '[contact-form-7 id=\"154\" title=\"Contact form 1\"]', 'Contact Us', '', 'publish', 'closed', 'closed', '', 'contact-us', '', '', '2016-07-23 01:44:56', '2016-07-23 01:44:56', '', '0', 'http://realvsfakeguide.local/?page_id=18', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('19', '1', '2016-07-18 02:06:40', '2016-07-18 02:06:40', '', 'Contact Us', '', 'inherit', 'closed', 'closed', '', '18-revision-v1', '', '', '2016-07-18 02:06:40', '2016-07-18 02:06:40', '', '18', 'http://realvsfakeguide.local/18-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('21', '1', '2016-07-18 02:09:24', '2016-07-18 02:09:24', ' ', '', '', 'publish', 'closed', 'closed', '', '21', '', '', '2016-07-18 05:22:22', '2016-07-18 05:22:22', '', '0', 'http://realvsfakeguide.local/?p=21', '11', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('22', '1', '2016-07-18 02:09:23', '2016-07-18 02:09:23', ' ', '', '', 'publish', 'closed', 'closed', '', '22', '', '', '2016-07-18 05:22:22', '2016-07-18 05:22:22', '', '0', 'http://realvsfakeguide.local/?p=22', '10', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('23', '1', '2016-07-18 02:09:23', '2016-07-18 02:09:23', ' ', '', '', 'publish', 'closed', 'closed', '', '23', '', '', '2016-07-18 05:22:22', '2016-07-18 05:22:22', '', '0', 'http://realvsfakeguide.local/?p=23', '9', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('24', '1', '2016-07-18 02:09:23', '2016-07-18 02:09:23', ' ', '', '', 'publish', 'closed', 'closed', '', '24', '', '', '2016-07-18 05:22:22', '2016-07-18 05:22:22', '', '0', 'http://realvsfakeguide.local/?p=24', '7', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('25', '1', '2016-07-18 02:09:23', '2016-07-18 02:09:23', ' ', '', '', 'publish', 'closed', 'closed', '', '25', '', '', '2016-07-18 05:22:22', '2016-07-18 05:22:22', '', '0', 'http://realvsfakeguide.local/?p=25', '6', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('26', '1', '2016-07-18 02:09:23', '2016-07-18 02:09:23', ' ', '', '', 'publish', 'closed', 'closed', '', '26', '', '', '2016-07-18 05:22:22', '2016-07-18 05:22:22', '', '0', 'http://realvsfakeguide.local/?p=26', '5', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('27', '1', '2016-07-18 02:09:23', '2016-07-18 02:09:23', ' ', '', '', 'publish', 'closed', 'closed', '', '27', '', '', '2016-07-18 05:22:22', '2016-07-18 05:22:22', '', '0', 'http://realvsfakeguide.local/?p=27', '1', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('28', '1', '2016-07-18 02:09:23', '2016-07-18 02:09:23', ' ', '', '', 'publish', 'closed', 'closed', '', '28', '', '', '2016-07-18 05:22:22', '2016-07-18 05:22:22', '', '0', 'http://realvsfakeguide.local/?p=28', '2', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('29', '1', '2016-07-18 02:09:23', '2016-07-18 02:09:23', ' ', '', '', 'publish', 'closed', 'closed', '', '29', '', '', '2016-07-18 05:22:22', '2016-07-18 05:22:22', '', '0', 'http://realvsfakeguide.local/?p=29', '3', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('30', '1', '2016-07-18 02:09:23', '2016-07-18 02:09:23', ' ', '', '', 'publish', 'closed', 'closed', '', '30', '', '', '2016-07-18 05:22:22', '2016-07-18 05:22:22', '', '0', 'http://realvsfakeguide.local/?p=30', '4', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('31', '1', '2016-07-18 02:09:37', '2016-07-18 02:09:37', '', 'New', '', 'publish', 'closed', 'closed', '', 'new', '', '', '2016-07-22 08:05:01', '2016-07-22 08:05:01', '', '0', 'http://realvsfakeguide.local/?page_id=31', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('32', '1', '2016-07-18 02:09:37', '2016-07-18 02:09:37', '', 'New', '', 'inherit', 'closed', 'closed', '', '31-revision-v1', '', '', '2016-07-18 02:09:37', '2016-07-18 02:09:37', '', '31', 'http://realvsfakeguide.local/31-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('33', '1', '2016-07-18 02:10:29', '2016-07-18 02:10:29', ' ', '', '', 'publish', 'closed', 'closed', '', '33', '', '', '2016-07-18 05:22:22', '2016-07-18 05:22:22', '', '0', 'http://realvsfakeguide.local/?p=33', '8', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('35', '1', '2016-07-18 02:25:28', '2016-07-18 02:25:28', '', 'Home custom field', '', 'publish', 'closed', 'closed', '', 'acf_home-custom-field', '', '', '2016-07-23 04:02:26', '2016-07-23 04:02:26', '', '0', 'http://realvsfakeguide.local/?post_type=acf&#038;p=35', '0', 'acf', '', '0');
INSERT INTO `wp_posts` VALUES ('44', '1', '2016-07-18 08:24:18', '2016-07-18 08:24:18', '', 'Home categories', '', 'trash', 'closed', 'closed', '', 'acf_home-categories__trashed', '', '', '2016-07-27 10:33:09', '2016-07-27 10:33:09', '', '0', 'http://realvsfakeguide.local/?post_type=acf&#038;p=44', '0', 'acf', '', '0');
INSERT INTO `wp_posts` VALUES ('48', '1', '2016-07-18 08:37:19', '2016-07-18 08:37:19', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-18 08:37:19', '2016-07-18 08:37:19', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('49', '1', '2016-07-18 09:50:07', '2016-07-18 09:50:07', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-18 09:50:07', '2016-07-18 09:50:07', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('50', '1', '2016-07-18 09:50:21', '2016-07-18 09:50:21', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-18 09:50:21', '2016-07-18 09:50:21', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('51', '1', '2016-07-18 10:13:05', '2016-07-18 10:13:05', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-18 10:13:05', '2016-07-18 10:13:05', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('52', '1', '2016-07-19 01:35:25', '2016-07-19 01:35:25', '', 'layer20', '', 'inherit', 'open', 'closed', '', 'layer20', '', '', '2016-07-19 01:35:25', '2016-07-19 01:35:25', '', '6', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/layer20.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('53', '1', '2016-07-19 01:35:58', '2016-07-19 01:35:58', '', 'guild-1', '', 'inherit', 'open', 'closed', '', 'guild-1', '', '', '2016-07-19 01:35:58', '2016-07-19 01:35:58', '', '6', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/guild-1.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('54', '1', '2016-07-19 01:36:11', '2016-07-19 01:36:11', '', 'blog3', '', 'inherit', 'open', 'closed', '', 'blog3', '', '', '2016-07-19 01:36:11', '2016-07-19 01:36:11', '', '6', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog3-1.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('55', '1', '2016-07-19 01:38:02', '2016-07-19 01:38:02', '&nbsp;\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'publish', 'open', 'open', '', 'post1', '', '', '2016-07-28 07:10:00', '2016-07-28 07:10:00', '', '0', 'http://realvsfakeguide.local/?p=55', '0', 'post', '', '0');
INSERT INTO `wp_posts` VALUES ('56', '1', '2016-07-19 01:38:02', '2016-07-19 01:38:02', '&nbsp;\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...', 'Post1', '', 'inherit', 'closed', 'closed', '', '55-revision-v1', '', '', '2016-07-19 01:38:02', '2016-07-19 01:38:02', '', '55', 'http://realvsfakeguide.local/55-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('57', '1', '2016-07-19 01:38:34', '2016-07-19 01:38:34', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-19 01:38:34', '2016-07-19 01:38:34', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('58', '1', '2016-07-19 01:43:17', '2016-07-19 01:43:17', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-19 01:43:17', '2016-07-19 01:43:17', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('59', '1', '2016-07-19 01:44:41', '2016-07-19 01:44:41', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-19 01:44:41', '2016-07-19 01:44:41', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('60', '1', '2016-07-19 01:45:23', '2016-07-19 01:45:23', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-19 01:45:23', '2016-07-19 01:45:23', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('61', '1', '2016-07-19 01:49:45', '2016-07-19 01:49:45', '', 'essentials-arnette-skylight_g4', '', 'inherit', 'open', 'closed', '', 'essentials-arnette-skylight_g4', '', '', '2016-07-19 01:49:45', '2016-07-19 01:49:45', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/essentials-arnette-skylight_g4.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('62', '1', '2016-07-19 01:49:46', '2016-07-19 01:49:46', '', 'popular-adidas-sunglasses-284811', '', 'inherit', 'open', 'closed', '', 'popular-adidas-sunglasses-284811', '', '', '2016-07-19 01:49:46', '2016-07-19 01:49:46', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/popular-adidas-sunglasses-284811.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('63', '1', '2016-07-19 01:50:23', '2016-07-19 01:50:23', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-19 01:50:23', '2016-07-19 01:50:23', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('64', '1', '2016-07-19 01:52:25', '2016-07-19 01:52:25', '', 'img_3641', '', 'inherit', 'open', 'closed', '', 'img_3641', '', '', '2016-07-19 01:52:25', '2016-07-19 01:52:25', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/img_3641.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('65', '1', '2016-07-19 01:52:39', '2016-07-19 01:52:39', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-19 01:52:39', '2016-07-19 01:52:39', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('66', '1', '2016-07-19 02:20:42', '2016-07-19 02:20:42', '', 'Home lastest news', '', 'publish', 'closed', 'closed', '', 'acf_home-lastest-news', '', '', '2016-07-19 02:24:45', '2016-07-19 02:24:45', '', '0', 'http://realvsfakeguide.local/?post_type=acf&#038;p=66', '0', 'acf', '', '0');
INSERT INTO `wp_posts` VALUES ('67', '1', '2016-07-19 02:26:36', '2016-07-19 02:26:36', '', 'blog2', '', 'inherit', 'open', 'closed', '', 'blog2', '', '', '2016-07-19 02:26:36', '2016-07-19 02:26:36', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog2-1.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('68', '1', '2016-07-19 02:26:37', '2016-07-19 02:26:37', '', 'blog4', '', 'inherit', 'open', 'closed', '', 'blog4', '', '', '2016-07-19 02:26:37', '2016-07-19 02:26:37', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/blog4-1.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('69', '1', '2016-07-19 02:27:19', '2016-07-19 02:27:19', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-19 02:27:19', '2016-07-19 02:27:19', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('70', '1', '2016-07-19 02:27:49', '2016-07-19 02:27:49', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-19 02:27:49', '2016-07-19 02:27:49', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('71', '1', '2016-07-19 03:01:29', '2016-07-19 03:01:29', '', 'About custom field', '', 'publish', 'closed', 'closed', '', 'acf_about-custom-field', '', '', '2016-07-19 10:44:19', '2016-07-19 10:44:19', '', '0', 'http://realvsfakeguide.local/?post_type=acf&#038;p=71', '0', 'acf', '', '0');
INSERT INTO `wp_posts` VALUES ('72', '1', '2016-07-19 03:05:04', '2016-07-19 03:05:04', '', 'logo-about', '', 'inherit', 'open', 'closed', '', 'logo-about', '', '', '2016-07-19 03:05:04', '2016-07-19 03:05:04', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/logo-about.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('73', '1', '2016-07-19 03:05:51', '2016-07-19 03:05:51', '', 'About', '', 'inherit', 'closed', 'closed', '', '12-revision-v1', '', '', '2016-07-19 03:05:51', '2016-07-19 03:05:51', '', '12', 'http://realvsfakeguide.local/12-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('74', '1', '2016-07-19 03:08:28', '2016-07-19 03:08:28', '', 'about-group1', '', 'inherit', 'open', 'closed', '', 'about-group1', '', '', '2016-07-19 03:08:28', '2016-07-19 03:08:28', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/about-group1.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('75', '1', '2016-07-19 03:08:48', '2016-07-19 03:08:48', '', 'coolvalues', '', 'inherit', 'open', 'closed', '', 'coolvalues', '', '', '2016-07-19 03:08:48', '2016-07-19 03:08:48', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/coolvalues.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('76', '1', '2016-07-19 03:08:49', '2016-07-19 03:08:49', '', 'designer-brand-luxury-dinner-bags-price-clutches-bags-ladies-shoulder-bags-women-handbags-2015-new-european', '', 'inherit', 'open', 'closed', '', 'designer-brand-luxury-dinner-bags-price-clutches-bags-ladies-shoulder-bags-women-handbags-2015-new-european', '', '', '2016-07-19 03:08:49', '2016-07-19 03:08:49', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/designer-brand-luxury-dinner-bags-price-clutches-bags-ladies-shoulder-bags-women-handbags-2015-new-european.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('77', '1', '2016-07-19 03:10:03', '2016-07-19 03:10:03', '', 'About', '', 'inherit', 'closed', 'closed', '', '12-revision-v1', '', '', '2016-07-19 03:10:03', '2016-07-19 03:10:03', '', '12', 'http://realvsfakeguide.local/12-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('78', '1', '2016-07-19 03:16:28', '2016-07-19 03:16:28', '', 'bg-about', '', 'inherit', 'open', 'closed', '', 'bg-about', '', '', '2016-07-19 03:16:28', '2016-07-19 03:16:28', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-about.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('79', '1', '2016-07-19 03:16:47', '2016-07-19 03:16:47', '', 'About', '', 'inherit', 'closed', 'closed', '', '12-revision-v1', '', '', '2016-07-19 03:16:47', '2016-07-19 03:16:47', '', '12', 'http://realvsfakeguide.local/12-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('80', '1', '2016-07-19 04:40:04', '2016-07-19 04:40:04', '', 'Post Category', '', 'publish', 'closed', 'closed', '', 'acf_post-category', '', '', '2016-07-19 04:40:21', '2016-07-19 04:40:21', '', '0', 'http://realvsfakeguide.local/?post_type=acf&#038;p=80', '0', 'acf', '', '0');
INSERT INTO `wp_posts` VALUES ('81', '1', '2016-07-19 06:39:19', '2016-07-19 06:39:19', 'As a fashion writer and personal wardrobe stylist, I\'ll show you in this guide how to make sure you are buying an authentic Fendi Handbag. It is a highly appreciate purse brand that designed ones..\r\n<div class=\"entry\">\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most\r\n\r\nAs a fashion writer and personal wardrobe stylist, I\'ll show you in this guide how to make sure you are buying an authentic Fendi Handbag. It is a highly appreciate purse brand that designed ones..\r\n<div class=\"entry\">\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most\r\n\r\n</div>\r\n</div>', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'publish', 'open', 'open', '', 'post2', '', '', '2016-07-28 07:09:33', '2016-07-28 07:09:33', '', '0', 'http://realvsfakeguide.local/?p=81', '0', 'post', '', '0');
INSERT INTO `wp_posts` VALUES ('82', '1', '2016-07-19 06:39:19', '2016-07-19 06:39:19', 'As a fashion writer and personal wardrobe stylist, I�ll show you in this guide how to make sure you�re buying an authentic Fendi Handbag. It is a highly appreciate purse brand that designed ones..\r\n<div class=\"entry\">\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most\r\n\r\nAs a fashion writer and personal wardrobe stylist, I�ll show you in this guide how to make sure you�re buying an authentic Fendi Handbag. It is a highly appreciate purse brand that designed ones..\r\n<div class=\"entry\">\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most\r\n\r\n</div>\r\n</div>', 'Post2', '', 'inherit', 'closed', 'closed', '', '81-revision-v1', '', '', '2016-07-19 06:39:19', '2016-07-19 06:39:19', '', '81', 'http://realvsfakeguide.local/81-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('83', '1', '2016-07-19 06:40:10', '2016-07-19 06:40:10', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'publish', 'open', 'open', '', 'post3', '', '', '2016-07-28 07:08:45', '2016-07-28 07:08:45', '', '0', 'http://realvsfakeguide.local/?p=83', '0', 'post', '', '0');
INSERT INTO `wp_posts` VALUES ('84', '1', '2016-07-19 06:40:10', '2016-07-19 06:40:10', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Post3', '', 'inherit', 'closed', 'closed', '', '83-revision-v1', '', '', '2016-07-19 06:40:10', '2016-07-19 06:40:10', '', '83', 'http://realvsfakeguide.local/83-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('85', '1', '2016-07-19 06:40:53', '2016-07-19 06:40:53', 'Where does it come from?\r\n<div>\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\n</div>', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'publish', 'open', 'open', '', 'post4', '', '', '2016-07-28 07:40:12', '2016-07-28 07:40:12', '', '0', 'http://realvsfakeguide.local/?p=85', '0', 'post', '', '0');
INSERT INTO `wp_posts` VALUES ('86', '1', '2016-07-19 06:40:53', '2016-07-19 06:40:53', '', 'Post4', '', 'inherit', 'closed', 'closed', '', '85-revision-v1', '', '', '2016-07-19 06:40:53', '2016-07-19 06:40:53', '', '85', 'http://realvsfakeguide.local/85-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('87', '1', '2016-07-19 06:41:18', '2016-07-19 06:41:18', 'Where does it come from?\r\n<div>\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\n</div>', 'Post4', '', 'inherit', 'closed', 'closed', '', '85-revision-v1', '', '', '2016-07-19 06:41:18', '2016-07-19 06:41:18', '', '85', 'http://realvsfakeguide.local/85-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('88', '1', '2016-07-19 06:42:32', '2016-07-19 06:42:32', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE', '', 'publish', 'open', 'open', '', 'post5', '', '', '2016-07-28 07:06:36', '2016-07-28 07:06:36', '', '0', 'http://realvsfakeguide.local/?p=88', '0', 'post', '', '0');
INSERT INTO `wp_posts` VALUES ('89', '1', '2016-07-19 06:42:32', '2016-07-19 06:42:32', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Post5', '', 'inherit', 'closed', 'closed', '', '88-revision-v1', '', '', '2016-07-19 06:42:32', '2016-07-19 06:42:32', '', '88', 'http://realvsfakeguide.local/88-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('90', '1', '2016-07-19 06:43:12', '2016-07-19 06:43:12', 'Where does it come from?\r\n<div>\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\n</div>', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'publish', 'open', 'open', '', 'post6', '', '', '2016-07-28 07:06:18', '2016-07-28 07:06:18', '', '0', 'http://realvsfakeguide.local/?p=90', '0', 'post', '', '1');
INSERT INTO `wp_posts` VALUES ('91', '1', '2016-07-19 06:43:12', '2016-07-19 06:43:12', 'Where does it come from?\r\n<div>\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\n</div>', 'Post6', '', 'inherit', 'closed', 'closed', '', '90-revision-v1', '', '', '2016-07-19 06:43:12', '2016-07-19 06:43:12', '', '90', 'http://realvsfakeguide.local/90-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('92', '1', '2016-07-19 08:58:13', '2016-07-19 08:58:13', '', 'contact-icon-mail', '', 'inherit', 'open', 'closed', '', 'contact-icon-mail', '', '', '2016-07-19 08:58:13', '2016-07-19 08:58:13', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-mail.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('93', '1', '2016-07-19 08:58:13', '2016-07-19 08:58:13', '', 'contact-icon-name', '', 'inherit', 'open', 'closed', '', 'contact-icon-name', '', '', '2016-07-19 08:58:13', '2016-07-19 08:58:13', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-name.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('94', '1', '2016-07-19 08:58:14', '2016-07-19 08:58:14', '', 'contact-icon-phone', '', 'inherit', 'open', 'closed', '', 'contact-icon-phone', '', '', '2016-07-19 08:58:14', '2016-07-19 08:58:14', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-phone.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('95', '1', '2016-07-21 01:40:29', '2016-07-21 01:40:29', ' ', '', '', 'publish', 'closed', 'closed', '', '95', '', '', '2016-07-21 01:40:29', '2016-07-21 01:40:29', '', '0', 'http://realvsfakeguide.local/?p=95', '8', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('96', '1', '2016-07-21 01:40:29', '2016-07-21 01:40:29', ' ', '', '', 'publish', 'closed', 'closed', '', '96', '', '', '2016-07-21 01:40:29', '2016-07-21 01:40:29', '', '0', 'http://realvsfakeguide.local/?p=96', '9', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('97', '1', '2016-07-21 01:40:29', '2016-07-21 01:40:29', ' ', '', '', 'publish', 'closed', 'closed', '', '97', '', '', '2016-07-21 01:40:29', '2016-07-21 01:40:29', '', '0', 'http://realvsfakeguide.local/?p=97', '10', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('98', '1', '2016-07-21 01:40:29', '2016-07-21 01:40:29', ' ', '', '', 'publish', 'closed', 'closed', '', '98', '', '', '2016-07-21 01:40:29', '2016-07-21 01:40:29', '', '0', 'http://realvsfakeguide.local/?p=98', '11', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('99', '1', '2016-07-21 01:40:29', '2016-07-21 01:40:29', ' ', '', '', 'publish', 'closed', 'closed', '', '99', '', '', '2016-07-21 01:40:29', '2016-07-21 01:40:29', '', '0', 'http://realvsfakeguide.local/?p=99', '7', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('100', '1', '2016-07-21 01:40:29', '2016-07-21 01:40:29', ' ', '', '', 'publish', 'closed', 'closed', '', '100', '', '', '2016-07-21 01:40:29', '2016-07-21 01:40:29', '', '0', 'http://realvsfakeguide.local/?p=100', '6', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('101', '1', '2016-07-21 01:40:28', '2016-07-21 01:40:28', ' ', '', '', 'publish', 'closed', 'closed', '', '101', '', '', '2016-07-21 01:40:28', '2016-07-21 01:40:28', '', '0', 'http://realvsfakeguide.local/?p=101', '5', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('102', '1', '2016-07-21 01:40:28', '2016-07-21 01:40:28', ' ', '', '', 'publish', 'closed', 'closed', '', '102', '', '', '2016-07-21 01:40:28', '2016-07-21 01:40:28', '', '0', 'http://realvsfakeguide.local/?p=102', '1', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('103', '1', '2016-07-21 01:40:28', '2016-07-21 01:40:28', ' ', '', '', 'publish', 'closed', 'closed', '', '103', '', '', '2016-07-21 01:40:28', '2016-07-21 01:40:28', '', '0', 'http://realvsfakeguide.local/?p=103', '2', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('104', '1', '2016-07-21 01:40:28', '2016-07-21 01:40:28', ' ', '', '', 'publish', 'closed', 'closed', '', '104', '', '', '2016-07-21 01:40:28', '2016-07-21 01:40:28', '', '0', 'http://realvsfakeguide.local/?p=104', '3', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('105', '1', '2016-07-21 01:40:28', '2016-07-21 01:40:28', ' ', '', '', 'publish', 'closed', 'closed', '', '105', '', '', '2016-07-21 01:40:28', '2016-07-21 01:40:28', '', '0', 'http://realvsfakeguide.local/?p=105', '4', 'nav_menu_item', '', '0');
INSERT INTO `wp_posts` VALUES ('106', '1', '2016-07-21 02:07:51', '2016-07-21 02:07:51', 'Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, makingWhere does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making […]\r\n\r\nWhere does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making […]\r\n\r\nWhere does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making […]\r\n\r\nWhere does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making […]', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'publish', 'open', 'open', '', 'post7', '', '', '2016-07-28 07:40:04', '2016-07-28 07:40:04', '', '0', 'http://realvsfakeguide.local/?p=106', '0', 'post', '', '0');
INSERT INTO `wp_posts` VALUES ('107', '1', '2016-07-21 02:07:51', '2016-07-21 02:07:51', 'Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, makingWhere does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making […]\r\n\r\nWhere does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making […]\r\n\r\nWhere does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making […]\r\n\r\nWhere does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making […]', 'Post7', '', 'inherit', 'closed', 'closed', '', '106-revision-v1', '', '', '2016-07-21 02:07:51', '2016-07-21 02:07:51', '', '106', 'http://realvsfakeguide.local/106-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('108', '1', '2016-07-21 02:08:28', '2016-07-21 02:08:28', 'Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'publish', 'open', 'open', '', 'post8', '', '', '2016-07-28 07:04:16', '2016-07-28 07:04:16', '', '0', 'http://realvsfakeguide.local/?p=108', '0', 'post', '', '1');
INSERT INTO `wp_posts` VALUES ('109', '1', '2016-07-21 02:08:28', '2016-07-21 02:08:28', 'Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly', 'Post8', '', 'inherit', 'closed', 'closed', '', '108-revision-v1', '', '', '2016-07-21 02:08:28', '2016-07-21 02:08:28', '', '108', 'http://realvsfakeguide.local/108-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('110', '1', '2016-07-21 02:09:05', '2016-07-21 02:09:05', '<h2> Lorem Ipsum</h2>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightlyThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightlyThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'publish', 'open', 'open', '', 'post9', '', '', '2016-07-28 07:03:35', '2016-07-28 07:03:35', '', '0', 'http://realvsfakeguide.local/?p=110', '0', 'post', '', '2');
INSERT INTO `wp_posts` VALUES ('111', '1', '2016-07-21 02:09:05', '2016-07-21 02:09:05', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightlyThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightlyThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly', 'Post9', '', 'inherit', 'closed', 'closed', '', '110-revision-v1', '', '', '2016-07-21 02:09:05', '2016-07-21 02:09:05', '', '110', 'http://realvsfakeguide.local/110-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('112', '1', '2016-07-21 04:10:06', '2016-07-21 04:10:06', '', 'post-share', '', 'trash', 'closed', 'closed', '', 'acf_post-share__trashed', '', '', '2016-07-25 07:24:26', '2016-07-25 07:24:26', '', '0', 'http://realvsfakeguide.local/?post_type=acf&#038;p=112', '0', 'acf', '', '0');
INSERT INTO `wp_posts` VALUES ('113', '1', '2016-07-21 04:12:33', '2016-07-21 04:12:33', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightlyThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightlyThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly', 'Post9', '', 'inherit', 'closed', 'closed', '', '110-revision-v1', '', '', '2016-07-21 04:12:33', '2016-07-21 04:12:33', '', '110', 'http://realvsfakeguide.local/110-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('114', '1', '2016-07-21 07:29:36', '2016-07-21 07:29:36', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-21 07:29:36', '2016-07-21 07:29:36', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('115', '1', '2016-07-21 07:31:33', '2016-07-21 07:31:33', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-21 07:31:33', '2016-07-21 07:31:33', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('116', '1', '2016-07-21 07:33:12', '2016-07-21 07:33:12', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-21 07:33:12', '2016-07-21 07:33:12', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('117', '1', '2016-07-21 07:39:01', '2016-07-21 07:39:01', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-21 07:39:01', '2016-07-21 07:39:01', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('118', '1', '2016-07-21 08:58:27', '2016-07-21 08:58:27', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-21 08:58:27', '2016-07-21 08:58:27', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('119', '1', '2016-07-21 09:00:29', '2016-07-21 09:00:29', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-21 09:00:29', '2016-07-21 09:00:29', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('120', '1', '2016-07-21 09:05:11', '2016-07-21 09:05:11', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-21 09:05:11', '2016-07-21 09:05:11', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('121', '1', '2016-07-21 09:09:37', '2016-07-21 09:09:37', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-21 09:09:37', '2016-07-21 09:09:37', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('122', '1', '2016-07-21 09:20:49', '2016-07-21 09:20:49', '', 'link-1', '', 'inherit', 'open', 'closed', '', 'link-1', '', '', '2016-07-21 09:20:49', '2016-07-21 09:20:49', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-1.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('123', '1', '2016-07-21 09:20:50', '2016-07-21 09:20:50', '', 'link-2', '', 'inherit', 'open', 'closed', '', 'link-2', '', '', '2016-07-22 07:06:16', '2016-07-22 07:06:16', '', '12', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/link-2.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('124', '1', '2016-07-21 09:21:50', '2016-07-21 09:21:50', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-21 09:21:50', '2016-07-21 09:21:50', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('125', '1', '2016-07-21 09:26:15', '2016-07-21 09:26:15', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-21 09:26:15', '2016-07-21 09:26:15', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('126', '1', '2016-07-21 09:49:48', '2016-07-21 09:49:48', '', 'left-icon', '', 'inherit', 'open', 'closed', '', 'left-icon', '', '', '2016-07-21 09:49:48', '2016-07-21 09:49:48', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/left-icon.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('127', '1', '2016-07-21 09:49:48', '2016-07-21 09:49:48', '', 'right-icon', '', 'inherit', 'open', 'closed', '', 'right-icon', '', '', '2016-07-21 09:49:48', '2016-07-21 09:49:48', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/right-icon.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('128', '1', '2016-07-22 03:14:47', '2016-07-22 03:14:47', '', 'Page Write For Us', '', 'publish', 'closed', 'closed', '', 'acf_page-write-for-us', '', '', '2016-07-22 03:16:39', '2016-07-22 03:16:39', '', '0', 'http://realvsfakeguide.local/?post_type=acf&#038;p=128', '0', 'acf', '', '0');
INSERT INTO `wp_posts` VALUES ('129', '1', '2016-07-22 03:15:26', '2016-07-22 03:15:26', '', 'Page Disclaimer', '', 'publish', 'closed', 'closed', '', 'acf_page-disclaimer', '', '', '2016-07-22 03:15:26', '2016-07-22 03:15:26', '', '0', 'http://realvsfakeguide.local/?post_type=acf&#038;p=129', '0', 'acf', '', '0');
INSERT INTO `wp_posts` VALUES ('130', '1', '2016-07-22 03:16:06', '2016-07-22 03:16:06', '', 'Page privacy policy', '', 'publish', 'closed', 'closed', '', 'acf_page-privacy-policy', '', '', '2016-07-22 03:16:27', '2016-07-22 03:16:27', '', '0', 'http://realvsfakeguide.local/?post_type=acf&#038;p=130', '0', 'acf', '', '0');
INSERT INTO `wp_posts` VALUES ('131', '1', '2016-07-22 03:18:16', '2016-07-22 03:18:16', '<h3>Write for us! You will be paid to do so!</h3>\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.', 'Write For Us', '', 'inherit', 'closed', 'closed', '', '10-autosave-v1', '', '', '2016-07-22 03:18:16', '2016-07-22 03:18:16', '', '10', 'http://realvsfakeguide.local/10-autosave-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('132', '1', '2016-07-22 03:18:31', '2016-07-22 03:18:31', '', 'bg-contact', '', 'inherit', 'open', 'closed', '', 'bg-contact', '', '', '2016-07-22 07:06:04', '2016-07-22 07:06:04', '', '12', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/bg-contact.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('133', '1', '2016-07-22 03:18:39', '2016-07-22 03:18:39', '<h3>Write for us! You will be paid to do so!</h3>\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.', 'Write For Us', '', 'inherit', 'closed', 'closed', '', '10-revision-v1', '', '', '2016-07-22 03:18:39', '2016-07-22 03:18:39', '', '10', 'http://realvsfakeguide.local/10-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('134', '1', '2016-07-22 03:54:58', '2016-07-22 03:54:58', 'All data and information provided on this site is for informational purposes only. realvsfakeguide.com makes no representations as to accuracy, completeness, currentness, suitability, or validity of any information on this site and will not be liable for any errors, omissions, or delays in this information or any losses, injuries, or damages arising from its display or use. All information is provided on an as-is basis.', 'Disclaimer', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2016-07-22 03:54:58', '2016-07-22 03:54:58', '', '16', 'http://realvsfakeguide.local/16-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('135', '1', '2016-07-22 03:55:49', '2016-07-22 03:55:49', '<h4>Privacy Policy for www.realvsfakeguide.com</h4>\r\nIf you require any more information or have any questions about our privacy policy, please feel free to contact us by email at info@realvsfakeguide.com. At www.realvsfakeguide.com, the privacy of our visitors is of extreme importance to us. This privacy policy document outlines the types of personal information is received and collected by www.realvsfakeguide.com and how it is used.\r\n<h4>Log Files</h4>\r\nLike many other Web sites, www.realvsfakeguide.com makes use of log files. The information inside the log files includes internet protocol ( IP ) addresses, type of browser, Internet Service Provider ( ISP ), date/time stamp, referring/exit pages, and number of clicks to analyze trends, administer the site, track user’s movement around the site, and gather demographic information. IP addresses, and other such information are not linked to any information that is personally identifiable.\r\n<h4>Cookies and Web Beacons</h4>\r\nwww.realvsfakeguide.com does use cookies to store information about visitors preferences, record user-specific information on which pages the user access or visit, customize Web page content based on visitors browser type or other information that the visitor sends via their browser.\r\n<h4>DoubleClick DART Cookie</h4>\r\n:: Google, as a third party vendor, uses cookies to serve ads on www.realvsfakeguide.com.\r\n:: Google’s use of the DART cookie enables it to serve ads to users based on their visit to www.realvsfakeguide.com and other sites on the Internet.\r\n:: Users may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy at the following URL – http://www.google.com/privacy_ads.html Some of our advertising partners may use cookies and web beacons on our site. Our advertising partners include ….\r\n<h4>Google Adsense</h4>\r\nThese third-party ad servers or ad networks use technology to the advertisements and links that appear on www.realvsfakeguide.com send directly to your browsers. They automatically receive your IP address when this occurs. Other technologies ( such as cookies, JavaScript, or Web Beacons ) may also be used by the third-party ad networks to measure the effectiveness of their advertisements and / or to personalize the advertising content that you see. www.realvsfakeguide.com has no access to or control over these cookies that are used by third-party advertisers. You should consult the respective privacy policies of these third-party ad servers for more detailed information on their practices as well as for instructions about how to opt-out of certain practices. www.realvsfakeguide.com’s privacy policy does not apply to, and we cannot control the activities of, such other advertisers or web sites. If you wish to disable cookies, you may do so through your individual browser options. More detailed information about cookie management with specific web browsers can be found at the browsers’ respective websites.', 'Privacy Policy', '', 'inherit', 'closed', 'closed', '', '14-revision-v1', '', '', '2016-07-22 03:55:49', '2016-07-22 03:55:49', '', '14', 'http://realvsfakeguide.local/14-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('136', '1', '2016-07-22 06:35:22', '2016-07-22 06:35:22', '<h2>Privacy Policy for www.realvsfakeguide.com</h2>\r\n<em>If you require any more information or have any questions about our privacy policy, please feel free to contact us by email at info@realvsfakeguide.com. At www.realvsfakeguide.com, the privacy of our visitors is of extreme importance to us. This privacy policy document outlines the types of personal information is received and collected by www.realvsfakeguide.com and how it is used.</em>\r\n<h4>Log Files</h4>\r\nLike many other Web sites, www.realvsfakeguide.com makes use of log files. The information inside the log files includes internet protocol ( IP ) addresses, type of browser, Internet Service Provider ( ISP ), date/time stamp, referring/exit pages, and number of clicks to analyze trends, administer the site, track user’s movement around the site, and gather demographic information. IP addresses, and other such information are not linked to any information that is personally identifiable.\r\n<h4>Cookies and Web Beacons</h4>\r\nwww.realvsfakeguide.com does use cookies to store information about visitors preferences, record user-specific information on which pages the user access or visit, customize Web page content based on visitors browser type or other information that the visitor sends via their browser.\r\n<h4>DoubleClick DART Cookie</h4>\r\n:: Google, as a third party vendor, uses cookies to serve ads on www.realvsfakeguide.com.\r\n:: Google’s use of the DART cookie enables it to serve ads to users based on their visit to www.realvsfakeguide.com and other sites on the Internet.\r\n:: Users may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy at the following URL – http://www.google.com/privacy_ads.html Some of our advertising partners may use cookies and web beacons on our site. Our advertising partners include ….\r\n<h4>Google Adsense</h4>\r\nThese third-party ad servers or ad networks use technology to the advertisements and links that appear on www.realvsfakeguide.com send directly to your browsers. They automatically receive your IP address when this occurs. Other technologies ( such as cookies, JavaScript, or Web Beacons ) may also be used by the third-party ad networks to measure the effectiveness of their advertisements and / or to personalize the advertising content that you see. www.realvsfakeguide.com has no access to or control over these cookies that are used by third-party advertisers. You should consult the respective privacy policies of these third-party ad servers for more detailed information on their practices as well as for instructions about how to opt-out of certain practices. www.realvsfakeguide.com’s privacy policy does not apply to, and we cannot control the activities of, such other advertisers or web sites. If you wish to disable cookies, you may do so through your individual browser options. More detailed information about cookie management with specific web browsers can be found at the browsers’ respective websites.', 'Privacy Policy', '', 'inherit', 'closed', 'closed', '', '14-revision-v1', '', '', '2016-07-22 06:35:22', '2016-07-22 06:35:22', '', '14', 'http://realvsfakeguide.local/14-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('137', '1', '2016-07-22 06:36:07', '2016-07-22 06:36:07', '<h3>Privacy Policy for www.realvsfakeguide.com</h3>\r\nIf you require any more information or have any questions about our privacy policy, please feel free to contact us by email at info@realvsfakeguide.com. At www.realvsfakeguide.com, the privacy of our visitors is of extreme importance to us. This privacy policy document outlines the types of personal information is received and collected by www.realvsfakeguide.com and how it is used.\r\n<h3>Log Files</h3>\r\nLike many other Web sites, www.realvsfakeguide.com makes use of log files. The information inside the log files includes internet protocol ( IP ) addresses, type of browser, Internet Service Provider ( ISP ), date/time stamp, referring/exit pages, and number of clicks to analyze trends, administer the site, track user’s movement around the site, and gather demographic information. IP addresses, and other such information are not linked to any information that is personally identifiable.\r\n<h3>Cookies and Web Beacons</h3>\r\nwww.realvsfakeguide.com does use cookies to store information about visitors preferences, record user-specific information on which pages the user access or visit, customize Web page content based on visitors browser type or other information that the visitor sends via their browser.\r\n<h3>DoubleClick DART Cookie</h3>\r\n:: Google, as a third party vendor, uses cookies to serve ads on www.realvsfakeguide.com.\r\n:: Google’s use of the DART cookie enables it to serve ads to users based on their visit to www.realvsfakeguide.com and other sites on the Internet.\r\n:: Users may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy at the following URL – http://www.google.com/privacy_ads.html Some of our advertising partners may use cookies and web beacons on our site. Our advertising partners include ….\r\n<h3>Google Adsense</h3>\r\nThese third-party ad servers or ad networks use technology to the advertisements and links that appear on www.realvsfakeguide.com send directly to your browsers. They automatically receive your IP address when this occurs. Other technologies ( such as cookies, JavaScript, or Web Beacons ) may also be used by the third-party ad networks to measure the effectiveness of their advertisements and / or to personalize the advertising content that you see. www.realvsfakeguide.com has no access to or control over these cookies that are used by third-party advertisers. You should consult the respective privacy policies of these third-party ad servers for more detailed information on their practices as well as for instructions about how to opt-out of certain practices. www.realvsfakeguide.com’s privacy policy does not apply to, and we cannot control the activities of, such other advertisers or web sites. If you wish to disable cookies, you may do so through your individual browser options. More detailed information about cookie management with specific web browsers can be found at the browsers’ respective websites.', 'Privacy Policy', '', 'inherit', 'closed', 'closed', '', '14-revision-v1', '', '', '2016-07-22 06:36:07', '2016-07-22 06:36:07', '', '14', 'http://realvsfakeguide.local/14-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('138', '1', '2016-07-22 06:36:58', '2016-07-22 06:36:58', '<h3>Privacy Policy for www.realvsfakeguide.com</h3>\n&nbsp;\n\nIf you require any more information or have any questions about our privacy policy, please feel free to contact us by email at info@realvsfakeguide.com. At www.realvsfakeguide.com, the privacy of our visitors is of extreme importance to us. This privacy policy document outlines the types of personal information is received and collected by www.realvsfakeguide.com and how it is used.\n<h3>Log Files</h3>\nLike many other Web sites, www.realvsfakeguide.com makes use of log files. The information inside the log files includes internet protocol ( IP ) addresses, type of browser, Internet Service Provider ( ISP ), date/time stamp, referring/exit pages, and number of clicks to analyze trends, administer the site, track user’s movement around the site, and gather demographic information. IP addresses, and other such information are not linked to any information that is personally identifiable.\n<h3>Cookies and Web Beacons</h3>\nwww.realvsfakeguide.com does use cookies to store information about visitors preferences, record user-specific information on which pages the user access or visit, customize Web page content based on visitors browser type or other information that the visitor sends via their browser.\n<h3>DoubleClick DART Cookie</h3>\n:: Google, as a third party vendor, uses cookies to serve ads on www.realvsfakeguide.com.\n:: Google’s use of the DART cookie enables it to serve ads to users based on their visit to www.realvsfakeguide.com and other sites on the Internet.\n:: Users may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy at the following URL – http://www.google.com/privacy_ads.html Some of our advertising partners may use cookies and web beacons on our site. Our advertising partners include ….\n<h3>Google Adsense</h3>\nThese third-party ad servers or ad networks use technology to the advertisements and links that appear on www.realvsfakeguide.com send directly to your browsers. They automatically receive your IP address when this occurs. Other technologies ( such as cookies, JavaScript, or Web Beacons ) may also be used by the third-party ad networks to measure the effectiveness of their advertisements and / or to personalize the advertising content that you see. www.realvsfakeguide.com has no access to or control over these cookies that are used by third-party advertisers. You should consult the respective privacy policies of these third-party ad servers for more detailed information on their practices as well as for instructions about how to opt-out of certain practices. www.realvsfakeguide.com’s privacy policy does not apply to, and we cannot control the activities of, such other advertisers or web sites. If you wish to disable cookies, you may do so through your individual browser options. More detailed information about cookie management with specific web browsers can be found at the browsers’ respective websites.', 'Privacy Policy', '', 'inherit', 'closed', 'closed', '', '14-autosave-v1', '', '', '2016-07-22 06:36:58', '2016-07-22 06:36:58', '', '14', 'http://realvsfakeguide.local/14-autosave-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('139', '1', '2016-07-22 06:37:13', '2016-07-22 06:37:13', '<h3>Privacy Policy for www.realvsfakeguide.com</h3>\r\n&nbsp;\r\n\r\nIf you require any more information or have any questions about our privacy policy, please feel free to contact us by email at info@realvsfakeguide.com. At www.realvsfakeguide.com, the privacy of our visitors is of extreme importance to us. This privacy policy document outlines the types of personal information is received and collected by www.realvsfakeguide.com and how it is used.\r\n<h3></h3>\r\n<h3>Log Files</h3>\r\n&nbsp;\r\n\r\nLike many other Web sites, www.realvsfakeguide.com makes use of log files. The information inside the log files includes internet protocol ( IP ) addresses, type of browser, Internet Service Provider ( ISP ), date/time stamp, referring/exit pages, and number of clicks to analyze trends, administer the site, track user’s movement around the site, and gather demographic information. IP addresses, and other such information are not linked to any information that is personally identifiable.\r\n<h3></h3>\r\n<h3>Cookies and Web Beacons</h3>\r\n&nbsp;\r\n\r\nwww.realvsfakeguide.com does use cookies to store information about visitors preferences, record user-specific information on which pages the user access or visit, customize Web page content based on visitors browser type or other information that the visitor sends via their browser.\r\n<h3></h3>\r\n<h3>DoubleClick DART Cookie</h3>\r\n&nbsp;\r\n\r\n:: Google, as a third party vendor, uses cookies to serve ads on www.realvsfakeguide.com.\r\n:: Google’s use of the DART cookie enables it to serve ads to users based on their visit to www.realvsfakeguide.com and other sites on the Internet.\r\n:: Users may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy at the following URL – http://www.google.com/privacy_ads.html Some of our advertising partners may use cookies and web beacons on our site. Our advertising partners include ….\r\n<h3></h3>\r\n<h3>Google Adsense</h3>\r\n&nbsp;\r\n\r\nThese third-party ad servers or ad networks use technology to the advertisements and links that appear on www.realvsfakeguide.com send directly to your browsers. They automatically receive your IP address when this occurs. Other technologies ( such as cookies, JavaScript, or Web Beacons ) may also be used by the third-party ad networks to measure the effectiveness of their advertisements and / or to personalize the advertising content that you see. www.realvsfakeguide.com has no access to or control over these cookies that are used by third-party advertisers. You should consult the respective privacy policies of these third-party ad servers for more detailed information on their practices as well as for instructions about how to opt-out of certain practices. www.realvsfakeguide.com’s privacy policy does not apply to, and we cannot control the activities of, such other advertisers or web sites. If you wish to disable cookies, you may do so through your individual browser options. More detailed information about cookie management with specific web browsers can be found at the browsers’ respective websites.', 'Privacy Policy', '', 'inherit', 'closed', 'closed', '', '14-revision-v1', '', '', '2016-07-22 06:37:13', '2016-07-22 06:37:13', '', '14', 'http://realvsfakeguide.local/14-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('140', '1', '2016-07-22 07:07:59', '2016-07-22 07:07:59', '<img class=\"size-full wp-image-123 alignleft\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/link-2.jpg\" alt=\"link-2\" width=\"262\" height=\"220\" />', 'About', '', 'inherit', 'closed', 'closed', '', '12-autosave-v1', '', '', '2016-07-22 07:07:59', '2016-07-22 07:07:59', '', '12', 'http://realvsfakeguide.local/12-autosave-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('141', '1', '2016-07-22 07:15:31', '2016-07-22 07:15:31', '', 'Write For Us', '', 'inherit', 'closed', 'closed', '', '10-revision-v1', '', '', '2016-07-22 07:15:31', '2016-07-22 07:15:31', '', '10', 'http://realvsfakeguide.local/10-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('142', '1', '2016-07-22 07:26:02', '2016-07-22 07:26:02', '', 'disclaimer_images_left', '', 'inherit', 'open', 'closed', '', 'disclaimer_images_left', '', '', '2016-07-22 07:26:02', '2016-07-22 07:26:02', '', '16', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/disclaimer_images_left.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('143', '1', '2016-07-22 07:59:55', '2016-07-22 07:59:55', '<h2><img class=\"size-full wp-image-142 alignleft\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/disclaimer_images_left.png\" alt=\"disclaimer_images_left\" width=\"164\" height=\"206\" /></h2>\n<h2>DISCLAIMER</h2>\n<p style=\"padding-left: 90px;\">All data and information provided on this site is for informational purposes only. realvsfakeguide.com makes no representations as to accuracy, completeness, currentness, suitability, or validity of any information on this site and will not be liable for any errors, omissions, or delays in this information or any losses, injuries, or damages arising from its display or use. All information is provided on an as-is basis.</p>', 'Disclaimer', '', 'inherit', 'closed', 'closed', '', '16-autosave-v1', '', '', '2016-07-22 07:59:55', '2016-07-22 07:59:55', '', '16', 'http://realvsfakeguide.local/16-autosave-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('144', '1', '2016-07-22 07:27:50', '2016-07-22 07:27:50', '<h2>DISCLAIMER</h2>\r\nAll data and information provided on this site is for informational purposes only. realvsfakeguide.com makes no representations as to accuracy, completeness, currentness, suitability, or validity of any information on this site and will not be liable for any errors, omissions, or delays in this information or any losses, injuries, or damages arising from its display or use. All information is provided on an as-is basis.\r\n\r\n<img class=\"size-full wp-image-142 alignnone\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/disclaimer_images_left.png\" alt=\"disclaimer_images_left\" width=\"164\" height=\"206\" />', 'Disclaimer', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2016-07-22 07:27:50', '2016-07-22 07:27:50', '', '16', 'http://realvsfakeguide.local/16-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('145', '1', '2016-07-22 07:28:57', '2016-07-22 07:28:57', '<h2>DISCLAIMER</h2>\r\nAll data and information provided on this site is for informational purposes only. realvsfakeguide.com makes no representations as to accuracy, completeness, currentness, suitability, or validity of any information on this site and will not be liable for any errors, omissions, or delays in this information or any losses, injuries, or damages arising from its display or use. All information is provided on an as-is basis.\r\n\r\n&nbsp;\r\n\r\n<img class=\"size-full wp-image-142 alignnone\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/disclaimer_images_left.png\" alt=\"disclaimer_images_left\" width=\"164\" height=\"206\" />', 'Disclaimer', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2016-07-22 07:28:57', '2016-07-22 07:28:57', '', '16', 'http://realvsfakeguide.local/16-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('146', '1', '2016-07-22 07:32:15', '2016-07-22 07:32:15', '<h2></h2>\r\n<img class=\"size-full wp-image-142 alignnone\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/disclaimer_images_left.png\" alt=\"disclaimer_images_left\" width=\"164\" height=\"206\" />\r\n<h2>DISCLAIMER</h2>\r\nAll data and information provided on this site is for informational purposes only. realvsfakeguide.com makes no representations as to accuracy, completeness, currentness, suitability, or validity of any information on this site and will not be liable for any errors, omissions, or delays in this information or any losses, injuries, or damages arising from its display or use. All information is provided on an as-is basis.', 'Disclaimer', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2016-07-22 07:32:15', '2016-07-22 07:32:15', '', '16', 'http://realvsfakeguide.local/16-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('147', '1', '2016-07-22 07:32:22', '2016-07-22 07:32:22', '<h2> <img class=\"size-full wp-image-142 alignnone\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/disclaimer_images_left.png\" alt=\"disclaimer_images_left\" width=\"164\" height=\"206\" /></h2>\r\n&nbsp;\r\n<h2>DISCLAIMER</h2>\r\nAll data and information provided on this site is for informational purposes only. realvsfakeguide.com makes no representations as to accuracy, completeness, currentness, suitability, or validity of any information on this site and will not be liable for any errors, omissions, or delays in this information or any losses, injuries, or damages arising from its display or use. All information is provided on an as-is basis.', 'Disclaimer', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2016-07-22 07:32:22', '2016-07-22 07:32:22', '', '16', 'http://realvsfakeguide.local/16-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('148', '1', '2016-07-22 07:32:32', '2016-07-22 07:32:32', '<h2> <img class=\"size-full wp-image-142 alignleft\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/disclaimer_images_left.png\" alt=\"disclaimer_images_left\" width=\"164\" height=\"206\" /></h2>\r\n&nbsp;\r\n<h2>DISCLAIMER</h2>\r\nAll data and information provided on this site is for informational purposes only. realvsfakeguide.com makes no representations as to accuracy, completeness, currentness, suitability, or validity of any information on this site and will not be liable for any errors, omissions, or delays in this information or any losses, injuries, or damages arising from its display or use. All information is provided on an as-is basis.', 'Disclaimer', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2016-07-22 07:32:32', '2016-07-22 07:32:32', '', '16', 'http://realvsfakeguide.local/16-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('149', '1', '2016-07-22 07:49:56', '2016-07-22 07:49:56', '<h2><img class=\"size-full wp-image-142 alignleft\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/disclaimer_images_left.png\" alt=\"disclaimer_images_left\" width=\"164\" height=\"206\" /></h2>\r\n<h2>DISCLAIMER</h2>\r\nAll data and information provided on this site is for informational purposes only. realvsfakeguide.com makes no representations as to accuracy, completeness, currentness, suitability, or validity of any information on this site and will not be liable for any errors, omissions, or delays in this information or any losses, injuries, or damages arising from its display or use. All information is provided on an as-is basis.', 'Disclaimer', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2016-07-22 07:49:56', '2016-07-22 07:49:56', '', '16', 'http://realvsfakeguide.local/16-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('150', '1', '2016-07-22 08:00:21', '2016-07-22 08:00:21', '<h2><img class=\"size-full wp-image-142 alignleft\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/disclaimer_images_left.png\" alt=\"disclaimer_images_left\" width=\"164\" height=\"206\" /></h2>\r\n<h2>DISCLAIMER</h2>\r\n<p style=\"padding-left: 90px;\">All data and information provided on this site is for informational purposes only. realvsfakeguide.com makes no representations as to accuracy, completeness, currentness, suitability, or validity of any information on this site and will not be liable for any errors, omissions, or delays in this information or any losses, injuries, or damages arising from its display or use. All information is provided on an as-is basis.</p>', 'Disclaimer', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2016-07-22 08:00:21', '2016-07-22 08:00:21', '', '16', 'http://realvsfakeguide.local/16-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('151', '1', '2016-07-22 08:00:32', '2016-07-22 08:00:32', '<h2><img class=\"size-full wp-image-142 alignleft\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/disclaimer_images_left.png\" alt=\"disclaimer_images_left\" width=\"164\" height=\"206\" /></h2>\r\n<h2>DISCLAIMER</h2>\r\n&nbsp;\r\n<p style=\"padding-left: 90px;\">All data and information provided on this site is for informational purposes only. realvsfakeguide.com makes no representations as to accuracy, completeness, currentness, suitability, or validity of any information on this site and will not be liable for any errors, omissions, or delays in this information or any losses, injuries, or damages arising from its display or use. All information is provided on an as-is basis.</p>', 'Disclaimer', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2016-07-22 08:00:32', '2016-07-22 08:00:32', '', '16', 'http://realvsfakeguide.local/16-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('152', '1', '2016-07-22 09:05:06', '2016-07-22 09:05:06', 'll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally consid\r\n\r\n&nbsp;', 'Post demo category', '', 'publish', 'open', 'open', '', 'post-demo-category', '', '', '2016-07-22 09:05:19', '2016-07-22 09:05:19', '', '0', 'http://realvsfakeguide.local/?p=152', '0', 'post', '', '0');
INSERT INTO `wp_posts` VALUES ('153', '1', '2016-07-22 09:05:06', '2016-07-22 09:05:06', 'll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally consid\r\n\r\n&nbsp;', 'Post demo category', '', 'inherit', 'closed', 'closed', '', '152-revision-v1', '', '', '2016-07-22 09:05:06', '2016-07-22 09:05:06', '', '152', 'http://realvsfakeguide.local/152-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('154', '1', '2016-07-22 10:43:17', '2016-07-22 10:43:17', '<img class=\"icon-name\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-name.png\">[text text-299 placeholder \"Your Name\"] </p>\r\n\r\n<img class=\"icon-mail\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-mail.png\">[email email-529 placeholder \"Your Email\"] </p>\r\n\r\n[textarea textarea-217 placeholder \"Message\"]</p>\r\n\r\n<p class=\"btn_submit_contact\">[submit \"SUBMIT\"]</p>\nReal Vs Fake Guide \"[your-subject]\"\n[your-name] <wordpress@realvsfakeguide.local>\nFrom: [your-name] <[your-email]>\r\nSubject: [your-subject]\r\n\r\nMessage Body:\r\n[your-message]\r\n\r\n--\r\nThis e-mail was sent from a contact form on Real Vs Fake Guide (http://realvsfakeguide.local)\nlabkuroky@gmail.com\nReply-To: [your-email]\n\n\n\n\nReal Vs Fake Guide \"[your-subject]\"\nReal Vs Fake Guide <wordpress@realvsfakeguide.local>\nMessage Body:\r\n[your-message]\r\n\r\n--\r\nThis e-mail was sent from a contact form on Real Vs Fake Guide (http://realvsfakeguide.local)\n[your-email]\nReply-To: labkuroky@gmail.com\n\n\n\nThank you for your message. It has been sent.\nThere was an error trying to send your message. Please try again later.\nOne or more fields have an error. Please check and try again.\nThere was an error trying to send your message. Please try again later.\nYou must accept the terms and conditions before sending your message.\nThe field is required.\nThe field is too long.\nThe field is too short.\nThe date format is incorrect.\nThe date is before the earliest one allowed.\nThe date is after the latest one allowed.\nThere was an unknown error uploading the file.\nYou are not allowed to upload files of this type.\nThe file is too big.\nThere was an error uploading the file.\nThe number format is invalid.\nThe number is smaller than the minimum allowed.\nThe number is larger than the maximum allowed.\nThe answer to the quiz is incorrect.\nYour entered code is incorrect.\nThe e-mail address entered is invalid.\nThe URL is invalid.\nThe telephone number is invalid.', 'Contact form 1', '', 'publish', 'closed', 'closed', '', 'contact-form-1', '', '', '2016-07-23 02:11:33', '2016-07-23 02:11:33', '', '0', 'http://realvsfakeguide.local/?post_type=wpcf7_contact_form&#038;p=154', '0', 'wpcf7_contact_form', '', '0');
INSERT INTO `wp_posts` VALUES ('155', '1', '2016-07-22 10:45:44', '2016-07-22 10:45:44', '<p><img class=\"icon-name\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-name.png\">[text text-288 placeholder \"Your Name\"]</p>\r\n\r\n<p><img class=\"icon-mail\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-mail.png\">[email email-110 placeholder \"Your email\"]</p>\r\n\r\n<p><img class=\"icon-phone\" src=\"http://realvsfakeguide.local/wp-content/uploads/2016/07/contact-icon-phone.png\">[tel tel-970 placeholder \"Phone number\"]</p>\r\n\r\n<p>[textarea textarea-791 placeholder \"Message\"]</p>\r\n\r\n<p class=\"btn_send_write_for_us\">[submit \"SEND\"]</p>\nReal Vs Fake Guide \"[your-subject]\"\n[your-name] <wordpress@realvsfakeguide.local>\nFrom: [your-name] <[your-email]>\r\nSubject: [your-subject]\r\n\r\nMessage Body:\r\n[your-message]\r\n\r\n--\r\nThis e-mail was sent from a contact form on Real Vs Fake Guide (http://realvsfakeguide.local)\nlabkuroky@gmail.com\nReply-To: [your-email]\n\n\n\n\nReal Vs Fake Guide \"[your-subject]\"\nReal Vs Fake Guide <wordpress@realvsfakeguide.local>\nMessage Body:\r\n[your-message]\r\n\r\n--\r\nThis e-mail was sent from a contact form on Real Vs Fake Guide (http://realvsfakeguide.local)\n[your-email]\nReply-To: labkuroky@gmail.com\n\n\n\nThank you for your message. It has been sent.\nThere was an error trying to send your message. Please try again later.\nOne or more fields have an error. Please check and try again.\nThere was an error trying to send your message. Please try again later.\nYou must accept the terms and conditions before sending your message.\nThe field is required.\nThe field is too long.\nThe field is too short.\nThe date format is incorrect.\nThe date is before the earliest one allowed.\nThe date is after the latest one allowed.\nThere was an unknown error uploading the file.\nYou are not allowed to upload files of this type.\nThe file is too big.\nThere was an error uploading the file.\nThe number format is invalid.\nThe number is smaller than the minimum allowed.\nThe number is larger than the maximum allowed.\nThe answer to the quiz is incorrect.\nYour entered code is incorrect.\nThe e-mail address entered is invalid.\nThe URL is invalid.\nThe telephone number is invalid.', 'Form Write For Us', '', 'publish', 'closed', 'closed', '', 'form-write-for-us', '', '', '2016-07-23 02:17:35', '2016-07-23 02:17:35', '', '0', 'http://realvsfakeguide.local/?post_type=wpcf7_contact_form&#038;p=155', '0', 'wpcf7_contact_form', '', '0');
INSERT INTO `wp_posts` VALUES ('156', '1', '2016-07-22 10:46:15', '2016-07-22 10:46:15', '[contact-form-7 id=\"155\" title=\"Form Write For Us\"]', 'Write For Us', '', 'inherit', 'closed', 'closed', '', '10-revision-v1', '', '', '2016-07-22 10:46:15', '2016-07-22 10:46:15', '', '10', 'http://realvsfakeguide.local/10-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('157', '1', '2016-07-22 10:48:54', '2016-07-22 10:48:54', '[contact-form-7 id=\"154\" title=\"Contact form 1\"]', 'Contact Us', '', 'inherit', 'closed', 'closed', '', '18-revision-v1', '', '', '2016-07-22 10:48:54', '2016-07-22 10:48:54', '', '18', 'http://realvsfakeguide.local/18-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('158', '1', '2016-07-23 03:05:33', '2016-07-23 03:05:33', '<h2> Lorem Ipsum</h2>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightlyThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightlyThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly', 'Post9', '', 'inherit', 'closed', 'closed', '', '110-revision-v1', '', '', '2016-07-23 03:05:33', '2016-07-23 03:05:33', '', '110', 'http://realvsfakeguide.local/110-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('159', '1', '2016-07-23 04:03:36', '2016-07-23 04:03:36', '', 'Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2016-07-23 04:03:36', '2016-07-23 04:03:36', '', '6', 'http://realvsfakeguide.local/6-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('160', '1', '2016-07-25 02:27:09', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2016-07-25 02:27:09', '0000-00-00 00:00:00', '', '0', 'http://realvsfakeguide.local/?p=160', '0', 'post', '', '0');
INSERT INTO `wp_posts` VALUES ('161', '1', '2016-07-25 02:39:16', '2016-07-25 02:39:16', '', 'Desert', '', 'inherit', 'open', 'closed', '', 'desert', '', '', '2016-07-25 02:39:16', '2016-07-25 02:39:16', '', '110', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/Desert.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('162', '1', '2016-07-25 03:39:21', '2016-07-25 03:39:21', '', 'Write For Us', '', 'inherit', 'closed', 'closed', '', '10-revision-v1', '', '', '2016-07-25 03:39:21', '2016-07-25 03:39:21', '', '10', 'http://realvsfakeguide.local/10-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('163', '1', '2016-07-25 04:12:02', '2016-07-25 04:12:02', '', '', '', 'publish', 'closed', 'closed', '', '163', '', '', '2016-07-25 04:12:02', '2016-07-25 04:12:02', '', '0', 'http://realvsfakeguide.local/?post_type=wpuf_forms&#038;p=163', '0', 'wpuf_forms', '', '0');
INSERT INTO `wp_posts` VALUES ('164', '1', '2016-07-25 04:12:02', '2016-07-25 04:12:02', 'a:13:{s:2:\"id\";s:0:\"\";s:10:\"input_type\";s:4:\"text\";s:8:\"template\";s:10:\"text_field\";s:8:\"required\";s:3:\"yes\";s:5:\"label\";s:0:\"\";s:4:\"name\";s:0:\"\";s:7:\"is_meta\";s:3:\"yes\";s:4:\"help\";s:0:\"\";s:3:\"css\";s:22:\"form_write_for_us_name\";s:11:\"placeholder\";s:9:\"Your name\";s:7:\"default\";s:0:\"\";s:4:\"size\";s:2:\"40\";s:9:\"wpuf_cond\";N;}', '', '', 'publish', 'closed', 'closed', '', '164', '', '', '2016-07-25 04:12:02', '2016-07-25 04:12:02', '', '163', 'http://realvsfakeguide.local/wpuf_input/164/', '0', 'wpuf_input', '', '0');
INSERT INTO `wp_posts` VALUES ('165', '1', '2016-07-25 04:12:02', '2016-07-25 04:12:02', 'a:13:{s:2:\"id\";s:0:\"\";s:10:\"input_type\";s:5:\"email\";s:8:\"template\";s:13:\"email_address\";s:8:\"required\";s:3:\"yes\";s:5:\"label\";s:0:\"\";s:4:\"name\";s:0:\"\";s:7:\"is_meta\";s:3:\"yes\";s:4:\"help\";s:0:\"\";s:3:\"css\";s:22:\"form_write_for_us_mail\";s:11:\"placeholder\";s:10:\"Your email\";s:7:\"default\";s:0:\"\";s:4:\"size\";s:2:\"40\";s:9:\"wpuf_cond\";N;}', '', '', 'publish', 'closed', 'closed', '', '165', '', '', '2016-07-25 04:12:02', '2016-07-25 04:12:02', '', '163', 'http://realvsfakeguide.local/wpuf_input/165/', '1', 'wpuf_input', '', '0');
INSERT INTO `wp_posts` VALUES ('166', '1', '2016-07-25 04:12:02', '2016-07-25 04:12:02', 'a:13:{s:2:\"id\";s:0:\"\";s:10:\"input_type\";s:4:\"text\";s:8:\"template\";s:10:\"text_field\";s:8:\"required\";s:3:\"yes\";s:5:\"label\";s:0:\"\";s:4:\"name\";s:0:\"\";s:7:\"is_meta\";s:3:\"yes\";s:4:\"help\";s:0:\"\";s:3:\"css\";s:23:\"form_write_for_us_phone\";s:11:\"placeholder\";s:12:\"Phone number\";s:7:\"default\";s:0:\"\";s:4:\"size\";s:2:\"40\";s:9:\"wpuf_cond\";N;}', '', '', 'publish', 'closed', 'closed', '', '166', '', '', '2016-07-25 04:12:02', '2016-07-25 04:12:02', '', '163', 'http://realvsfakeguide.local/wpuf_input/166/', '2', 'wpuf_input', '', '0');
INSERT INTO `wp_posts` VALUES ('167', '1', '2016-07-25 04:12:02', '2016-07-25 04:12:02', 'a:16:{s:2:\"id\";s:0:\"\";s:10:\"input_type\";s:8:\"textarea\";s:8:\"template\";s:14:\"textarea_field\";s:8:\"required\";s:3:\"yes\";s:5:\"label\";s:0:\"\";s:4:\"name\";s:0:\"\";s:7:\"is_meta\";s:3:\"yes\";s:4:\"help\";s:0:\"\";s:3:\"css\";s:0:\"\";s:4:\"rows\";s:1:\"5\";s:4:\"cols\";s:2:\"25\";s:11:\"placeholder\";s:10:\"Write here\";s:7:\"default\";s:0:\"\";s:4:\"rich\";s:2:\"no\";s:16:\"word_restriction\";s:0:\"\";s:9:\"wpuf_cond\";N;}', '', '', 'publish', 'closed', 'closed', '', '167', '', '', '2016-07-25 04:12:02', '2016-07-25 04:12:02', '', '163', 'http://realvsfakeguide.local/wpuf_input/167/', '3', 'wpuf_input', '', '0');
INSERT INTO `wp_posts` VALUES ('174', '1', '2016-07-25 04:35:33', '2016-07-25 04:35:33', '', 'avatar_author', '', 'inherit', 'open', 'closed', '', 'avatar_author', '', '', '2016-07-25 04:35:33', '2016-07-25 04:35:33', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/avatar_author.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('178', '0', '2016-07-25 08:17:23', '2016-07-25 08:17:23', '', 'gall2', '', 'inherit', 'open', 'closed', '', 'gall2', '', '', '2016-07-25 08:17:23', '2016-07-25 08:17:23', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/gall2.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('183', '1', '2016-07-25 08:22:42', '2016-07-25 08:22:42', '', 'about-group1', '', 'inherit', 'open', 'closed', '', 'about-group1-2', '', '', '2016-07-25 08:22:42', '2016-07-25 08:22:42', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/about-group1-1.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('186', '0', '2016-07-25 08:24:31', '2016-07-25 08:24:31', '', 'ca3-1', '', 'inherit', 'open', 'closed', '', 'ca3-1', '', '', '2016-07-25 08:24:31', '2016-07-25 08:24:31', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/ca3-1.png', '0', 'attachment', 'image/png', '0');
INSERT INTO `wp_posts` VALUES ('189', '1', '2016-07-25 08:25:46', '2016-07-25 08:25:46', '', 'about-group1', '', 'inherit', 'open', 'closed', '', 'about-group1-3', '', '', '2016-07-25 08:25:46', '2016-07-25 08:25:46', '', '0', 'http://realvsfakeguide.local/wp-content/uploads/2016/07/about-group1-2.jpg', '0', 'attachment', 'image/jpeg', '0');
INSERT INTO `wp_posts` VALUES ('190', '2', '2016-07-25 08:28:30', '2016-07-25 08:28:30', '', 'Auto Draft', '', 'trash', 'open', 'open', '', '__trashed', '', '', '2016-07-25 09:14:23', '2016-07-25 09:14:23', '', '0', 'http://realvsfakeguide.local/?p=190', '0', 'post', '', '0');
INSERT INTO `wp_posts` VALUES ('198', '1', '2016-07-25 08:46:32', '2016-07-25 08:46:32', '', 'Register', '', 'publish', 'closed', 'closed', '', 'register', '', '', '2016-07-25 08:46:32', '2016-07-25 08:46:32', '', '0', 'http://realvsfakeguide.local/?page_id=198', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('199', '1', '2016-07-25 08:46:32', '2016-07-25 08:46:32', '', 'Register', '', 'inherit', 'closed', 'closed', '', '198-revision-v1', '', '', '2016-07-25 08:46:32', '2016-07-25 08:46:32', '', '198', 'http://realvsfakeguide.local/198-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('203', '1', '2016-07-25 09:14:23', '2016-07-25 09:14:23', '', 'Auto Draft', '', 'inherit', 'closed', 'closed', '', '190-revision-v1', '', '', '2016-07-25 09:14:23', '2016-07-25 09:14:23', '', '190', 'http://realvsfakeguide.local/190-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('204', '1', '2016-07-28 06:56:45', '2016-07-28 06:56:45', 'As a fashion writer and personal wardrobe stylist, I\'ll show you in this guide how to make sure you are buying an authentic Fendi Handbag. It is a highly appreciate purse brand that designed ones..\r\n<div class=\"entry\">\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most\r\n\r\nAs a fashion writer and personal wardrobe stylist, I\'ll show you in this guide how to make sure you are buying an authentic Fendi Handbag. It is a highly appreciate purse brand that designed ones..\r\n<div class=\"entry\">\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most\r\n\r\n</div>\r\n</div>', 'Post2', '', 'inherit', 'closed', 'closed', '', '81-revision-v1', '', '', '2016-07-28 06:56:45', '2016-07-28 06:56:45', '', '81', 'http://realvsfakeguide.local/81-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('205', '1', '2016-07-28 07:03:35', '2016-07-28 07:03:35', '<h2> Lorem Ipsum</h2>\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightlyThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightlyThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'inherit', 'closed', 'closed', '', '110-revision-v1', '', '', '2016-07-28 07:03:35', '2016-07-28 07:03:35', '', '110', 'http://realvsfakeguide.local/110-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('206', '1', '2016-07-28 07:04:16', '2016-07-28 07:04:16', 'Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'inherit', 'closed', 'closed', '', '108-revision-v1', '', '', '2016-07-28 07:04:16', '2016-07-28 07:04:16', '', '108', 'http://realvsfakeguide.local/108-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('207', '1', '2016-07-28 07:04:53', '2016-07-28 07:04:53', 'Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, makingWhere does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making […]\r\n\r\nWhere does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making […]\r\n\r\nWhere does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making […]\r\n\r\nWhere does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making […]', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'inherit', 'closed', 'closed', '', '106-revision-v1', '', '', '2016-07-28 07:04:53', '2016-07-28 07:04:53', '', '106', 'http://realvsfakeguide.local/106-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('208', '1', '2016-07-28 07:06:18', '2016-07-28 07:06:18', 'Where does it come from?\r\n<div>\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\n</div>', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'inherit', 'closed', 'closed', '', '90-revision-v1', '', '', '2016-07-28 07:06:18', '2016-07-28 07:06:18', '', '90', 'http://realvsfakeguide.local/90-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('209', '1', '2016-07-28 07:06:36', '2016-07-28 07:06:36', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE', '', 'inherit', 'closed', 'closed', '', '88-revision-v1', '', '', '2016-07-28 07:06:36', '2016-07-28 07:06:36', '', '88', 'http://realvsfakeguide.local/88-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('210', '1', '2016-07-28 07:06:51', '2016-07-28 07:06:51', 'Where does it come from?\r\n<div>\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\n</div>', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'inherit', 'closed', 'closed', '', '85-revision-v1', '', '', '2016-07-28 07:06:51', '2016-07-28 07:06:51', '', '85', 'http://realvsfakeguide.local/85-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('211', '1', '2016-07-28 07:08:45', '2016-07-28 07:08:45', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'inherit', 'closed', 'closed', '', '83-revision-v1', '', '', '2016-07-28 07:08:45', '2016-07-28 07:08:45', '', '83', 'http://realvsfakeguide.local/83-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('212', '1', '2016-07-28 07:09:33', '2016-07-28 07:09:33', 'As a fashion writer and personal wardrobe stylist, I\'ll show you in this guide how to make sure you are buying an authentic Fendi Handbag. It is a highly appreciate purse brand that designed ones..\r\n<div class=\"entry\">\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most\r\n\r\nAs a fashion writer and personal wardrobe stylist, I\'ll show you in this guide how to make sure you are buying an authentic Fendi Handbag. It is a highly appreciate purse brand that designed ones..\r\n<div class=\"entry\">\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most\r\n\r\n</div>\r\n</div>', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'inherit', 'closed', 'closed', '', '81-revision-v1', '', '', '2016-07-28 07:09:33', '2016-07-28 07:09:33', '', '81', 'http://realvsfakeguide.local/81-revision-v1/', '0', 'revision', '', '0');
INSERT INTO `wp_posts` VALUES ('213', '1', '2016-07-28 07:10:00', '2016-07-28 07:10:00', '&nbsp;\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...\r\n\r\n’ll show you in this guide how to make sure you’re buying an authentic Fendi Handbag. Fendi Handbags are generally considered to be one of the most counterfeited bags in the market today...', 'HOW TO TELL IF ARNETTE SKYLIGHT GOGGLES ARE FAKE OR AUTHENTIC', '', 'inherit', 'closed', 'closed', '', '55-revision-v1', '', '', '2016-07-28 07:10:00', '2016-07-28 07:10:00', '', '55', 'http://realvsfakeguide.local/55-revision-v1/', '0', 'revision', '', '0');

-- ----------------------------
-- Table structure for `wp_termmeta`
-- ----------------------------
DROP TABLE IF EXISTS `wp_termmeta`;
CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_termmeta
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_terms`
-- ----------------------------
DROP TABLE IF EXISTS `wp_terms`;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_terms
-- ----------------------------
INSERT INTO `wp_terms` VALUES ('1', 'Uncategorized', 'uncategorized', '0');
INSERT INTO `wp_terms` VALUES ('2', 'Fashion', 'fashion', '0');
INSERT INTO `wp_terms` VALUES ('3', 'Handbags', 'handbags', '0');
INSERT INTO `wp_terms` VALUES ('4', 'Sunglasses', 'sunglasses', '0');
INSERT INTO `wp_terms` VALUES ('5', 'Main menu', 'main-menu', '0');
INSERT INTO `wp_terms` VALUES ('6', 'Mobie menu', 'mobie-menu', '0');
INSERT INTO `wp_terms` VALUES ('7', 'Demo', 'demo', '0');
INSERT INTO `wp_terms` VALUES ('8', 'Demo 2', 'demo-2', '0');

-- ----------------------------
-- Table structure for `wp_term_relationships`
-- ----------------------------
DROP TABLE IF EXISTS `wp_term_relationships`;
CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_term_relationships
-- ----------------------------
INSERT INTO `wp_term_relationships` VALUES ('21', '5', '0');
INSERT INTO `wp_term_relationships` VALUES ('22', '5', '0');
INSERT INTO `wp_term_relationships` VALUES ('23', '5', '0');
INSERT INTO `wp_term_relationships` VALUES ('24', '5', '0');
INSERT INTO `wp_term_relationships` VALUES ('25', '5', '0');
INSERT INTO `wp_term_relationships` VALUES ('26', '5', '0');
INSERT INTO `wp_term_relationships` VALUES ('27', '5', '0');
INSERT INTO `wp_term_relationships` VALUES ('28', '5', '0');
INSERT INTO `wp_term_relationships` VALUES ('29', '5', '0');
INSERT INTO `wp_term_relationships` VALUES ('30', '5', '0');
INSERT INTO `wp_term_relationships` VALUES ('33', '5', '0');
INSERT INTO `wp_term_relationships` VALUES ('55', '2', '0');
INSERT INTO `wp_term_relationships` VALUES ('81', '3', '0');
INSERT INTO `wp_term_relationships` VALUES ('83', '4', '0');
INSERT INTO `wp_term_relationships` VALUES ('85', '4', '0');
INSERT INTO `wp_term_relationships` VALUES ('88', '2', '0');
INSERT INTO `wp_term_relationships` VALUES ('90', '2', '0');
INSERT INTO `wp_term_relationships` VALUES ('95', '6', '0');
INSERT INTO `wp_term_relationships` VALUES ('96', '6', '0');
INSERT INTO `wp_term_relationships` VALUES ('97', '6', '0');
INSERT INTO `wp_term_relationships` VALUES ('98', '6', '0');
INSERT INTO `wp_term_relationships` VALUES ('99', '6', '0');
INSERT INTO `wp_term_relationships` VALUES ('100', '6', '0');
INSERT INTO `wp_term_relationships` VALUES ('101', '6', '0');
INSERT INTO `wp_term_relationships` VALUES ('102', '6', '0');
INSERT INTO `wp_term_relationships` VALUES ('103', '6', '0');
INSERT INTO `wp_term_relationships` VALUES ('104', '6', '0');
INSERT INTO `wp_term_relationships` VALUES ('105', '6', '0');
INSERT INTO `wp_term_relationships` VALUES ('106', '3', '0');
INSERT INTO `wp_term_relationships` VALUES ('108', '2', '0');
INSERT INTO `wp_term_relationships` VALUES ('110', '2', '0');
INSERT INTO `wp_term_relationships` VALUES ('152', '7', '0');
INSERT INTO `wp_term_relationships` VALUES ('190', '1', '0');

-- ----------------------------
-- Table structure for `wp_term_taxonomy`
-- ----------------------------
DROP TABLE IF EXISTS `wp_term_taxonomy`;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_term_taxonomy
-- ----------------------------
INSERT INTO `wp_term_taxonomy` VALUES ('1', '1', 'category', '', '0', '0');
INSERT INTO `wp_term_taxonomy` VALUES ('2', '2', 'category', '', '0', '5');
INSERT INTO `wp_term_taxonomy` VALUES ('3', '3', 'category', '', '0', '2');
INSERT INTO `wp_term_taxonomy` VALUES ('4', '4', 'category', '', '0', '2');
INSERT INTO `wp_term_taxonomy` VALUES ('5', '5', 'nav_menu', '', '0', '11');
INSERT INTO `wp_term_taxonomy` VALUES ('6', '6', 'nav_menu', '', '0', '11');
INSERT INTO `wp_term_taxonomy` VALUES ('7', '7', 'category', '', '0', '1');
INSERT INTO `wp_term_taxonomy` VALUES ('8', '8', 'category', '', '0', '0');

-- ----------------------------
-- Table structure for `wp_usermeta`
-- ----------------------------
DROP TABLE IF EXISTS `wp_usermeta`;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_usermeta
-- ----------------------------
INSERT INTO `wp_usermeta` VALUES ('1', '1', 'nickname', 'admin');
INSERT INTO `wp_usermeta` VALUES ('2', '1', 'first_name', '');
INSERT INTO `wp_usermeta` VALUES ('3', '1', 'last_name', '');
INSERT INTO `wp_usermeta` VALUES ('4', '1', 'description', '');
INSERT INTO `wp_usermeta` VALUES ('5', '1', 'rich_editing', 'true');
INSERT INTO `wp_usermeta` VALUES ('6', '1', 'comment_shortcuts', 'false');
INSERT INTO `wp_usermeta` VALUES ('7', '1', 'admin_color', 'fresh');
INSERT INTO `wp_usermeta` VALUES ('8', '1', 'use_ssl', '0');
INSERT INTO `wp_usermeta` VALUES ('9', '1', 'show_admin_bar_front', 'true');
INSERT INTO `wp_usermeta` VALUES ('10', '1', 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}');
INSERT INTO `wp_usermeta` VALUES ('11', '1', 'wp_user_level', '10');
INSERT INTO `wp_usermeta` VALUES ('12', '1', 'dismissed_wp_pointers', '');
INSERT INTO `wp_usermeta` VALUES ('13', '1', 'show_welcome_panel', '1');
INSERT INTO `wp_usermeta` VALUES ('14', '1', 'session_tokens', 'a:4:{s:64:\"e10e8e1f501ea2d993d9452569b740c20059b959a7817c3a73a52a53cad16148\";a:4:{s:10:\"expiration\";i:1470016009;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:108:\"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36\";s:5:\"login\";i:1468806409;}s:64:\"7d5b0a8d6ce53d55a61979f94735f2be9f311504f0bbb62828ea357f9af62816\";a:4:{s:10:\"expiration\";i:1470024647;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:108:\"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36\";s:5:\"login\";i:1468815047;}s:64:\"0e3b96319e6ea7959d015d27c534d32a63f5f5e7b8ca1a3b30af4fb9313b7039\";a:4:{s:10:\"expiration\";i:1469785567;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:109:\"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36\";s:5:\"login\";i:1469612767;}s:64:\"c2fede60b0a7aa9b59d95e77827fa5bb2ae44658b6c50b5953d43358ff616bcf\";a:4:{s:10:\"expiration\";i:1469861732;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:109:\"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36\";s:5:\"login\";i:1469688932;}}');
INSERT INTO `wp_usermeta` VALUES ('15', '1', 'wp_dashboard_quick_press_last_post_id', '160');
INSERT INTO `wp_usermeta` VALUES ('16', '1', 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}');
INSERT INTO `wp_usermeta` VALUES ('17', '1', 'metaboxhidden_nav-menus', 'a:1:{i:0;s:12:\"add-post_tag\";}');
INSERT INTO `wp_usermeta` VALUES ('18', '1', 'nav_menu_recently_edited', '6');
INSERT INTO `wp_usermeta` VALUES ('19', '1', 'closedpostboxes_page', 'a:1:{i:0;s:12:\"revisionsdiv\";}');
INSERT INTO `wp_usermeta` VALUES ('20', '1', 'metaboxhidden_page', 'a:9:{i:0;s:6:\"acf_71\";i:1;s:7:\"acf_129\";i:2;s:7:\"acf_130\";i:3;s:7:\"acf_128\";i:4;s:6:\"acf_80\";i:5;s:10:\"postcustom\";i:6;s:11:\"commentsdiv\";i:7;s:7:\"slugdiv\";i:8;s:9:\"authordiv\";}');
INSERT INTO `wp_usermeta` VALUES ('21', '1', 'wp_user-settings', 'libraryContent=browse&hidetb=1&editor=tinymce');
INSERT INTO `wp_usermeta` VALUES ('22', '1', 'wp_user-settings-time', '1469171727');
INSERT INTO `wp_usermeta` VALUES ('23', '1', 'subscribe_ignore_notice', 'true');
INSERT INTO `wp_usermeta` VALUES ('24', '1', 'closedpostboxes_post', 'a:0:{}');
INSERT INTO `wp_usermeta` VALUES ('25', '1', 'metaboxhidden_post', 'a:12:{i:0;s:6:\"acf_71\";i:1;s:6:\"acf_44\";i:2;s:6:\"acf_35\";i:3;s:6:\"acf_66\";i:4;s:7:\"acf_129\";i:5;s:7:\"acf_130\";i:6;s:7:\"acf_128\";i:7;s:11:\"postexcerpt\";i:8;s:13:\"trackbacksdiv\";i:9;s:10:\"postcustom\";i:10;s:7:\"slugdiv\";i:11;s:9:\"authordiv\";}');

-- ----------------------------
-- Table structure for `wp_users`
-- ----------------------------
DROP TABLE IF EXISTS `wp_users`;
CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_users
-- ----------------------------
INSERT INTO `wp_users` VALUES ('1', 'admin', '$P$BKjbbUZn35vvZuQzAvg0yLIFjTe.Qy0', 'admin', 'labkuroky@gmail.com', '', '2016-07-18 01:46:33', '', '0', 'admin');

-- ----------------------------
-- Table structure for `wp_wpuf_transaction`
-- ----------------------------
DROP TABLE IF EXISTS `wp_wpuf_transaction`;
CREATE TABLE `wp_wpuf_transaction` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending_payment',
  `cost` varchar(255) DEFAULT '',
  `post_id` varchar(20) DEFAULT NULL,
  `pack_id` bigint(20) DEFAULT NULL,
  `payer_first_name` longtext,
  `payer_last_name` longtext,
  `payer_email` longtext,
  `payment_type` longtext,
  `payer_address` longtext,
  `transaction_id` longtext,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_wpuf_transaction
-- ----------------------------
