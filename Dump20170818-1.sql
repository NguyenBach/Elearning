-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: elearning
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.17.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,1502201868,'dangian1','$2y$10$SIo2zZZzifk8pdjH2QGfKOmm9wxkB75YGHPk80wy9GqdHv5IYlwdi','2017-08-08 07:17:48','2017-08-08 07:17:48');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_type`
--

DROP TABLE IF EXISTS `activity_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_type`
--

LOCK TABLES `activity_type` WRITE;
/*!40000 ALTER TABLE `activity_type` DISABLE KEYS */;
INSERT INTO `activity_type` VALUES (1,'Text','hello text','template1',1,'2017-07-28 20:07:19',NULL);
/*!40000 ALTER TABLE `activity_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `course_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_lessons` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `visiblea` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'hellowworld21','hwdfdfd','asdfasdfasdfasdfasdf','featureimage/1_1501295579_congratulations-png-15.png','2017-07-31','1',10,1,1,'2017-07-24 07:06:32','2017-08-18 01:35:46'),(2,'hasdfa1','asd','asdfasdfasdfasdf','featureimage/2_1501295650_soxo.jpg','2017-07-30','1',20,1,1,'2017-07-28 06:37:20','2017-08-15 19:48:41'),(3,'deee','q','qwerqwe',' ','2017-07-31','1',10,1,1,'2017-07-28 06:41:17','2017-07-28 06:41:17'),(4,'course test','adf','asdfasdfa asdfadf asdf asdaasdfsa',' ','2017-07-31','1',10,1,1,'2017-07-28 08:57:42','2017-07-28 08:57:42'),(5,'asdfasdfasdfasdf','asdfas','asd asdfa sdfasdf as',' ','2017-07-30','1',8,1,1,'2017-07-28 08:59:41','2017-07-28 08:59:41'),(6,'rtwe','rtwertw','rtwertwertw','featureimage/6_1501294360_19490_Logo-Mother-Teresa-1-628x628.png.png','2017-07-31','1',1,1,1,'2017-07-28 19:12:40','2017-07-28 19:12:40'),(7,'dfsdf','dfsdfsdfa','dfasddfas','featureimage/7_1502350506_92049754.jpg','2017-07-31','1',10,1,1,'2017-08-10 00:35:06','2017-08-10 00:35:06');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_teacher`
--

DROP TABLE IF EXISTS `course_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_teacher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_teacher`
--

LOCK TABLES `course_teacher` WRITE;
/*!40000 ALTER TABLE `course_teacher` DISABLE KEYS */;
INSERT INTO `course_teacher` VALUES (1,1,1502201868,'2017-08-14 17:00:00',NULL),(2,2,1502201868,'2017-08-14 17:00:00',NULL);
/*!40000 ALTER TABLE `course_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson`
--

LOCK TABLES `lesson` WRITE;
/*!40000 ALTER TABLE `lesson` DISABLE KEYS */;
INSERT INTO `lesson` VALUES (1,1,'Let\'s Start111','hello worlda adsfasdfasd','1','2017-07-25 17:00:00','2017-08-09 20:36:12'),(1,5,'asdf','asdfasdfasdfasdfasd','1','2017-07-28 08:59:46','2017-08-09 20:36:12'),(2,1,'asdf','asdfasdfasdfasdfasdf','1','2017-07-28 08:34:50','2017-08-09 20:36:13'),(2,5,'asdf','dfasdfasdf','1','2017-07-28 08:59:48','2017-08-09 20:36:13'),(3,5,'asdfasd','asdfadfasdf','1','2017-07-28 08:59:51','2017-07-28 08:59:51'),(4,5,'asdfas','dfasdf','1','2017-07-28 08:59:56','2017-07-28 08:59:56'),(5,5,'asdfasd','asdfasdfasdf','1','2017-07-28 09:00:00','2017-07-28 09:00:00'),(6,5,'asdfasd','asdfasdf','1','2017-07-28 09:00:03','2017-07-28 09:00:03'),(7,5,'asdfasdfasdfasdf','asdfasdf','1','2017-07-28 09:00:07','2017-07-28 09:00:07'),(8,5,'asdfasd','asdfasdfa','1','2017-07-28 09:00:10','2017-07-28 09:01:55');
/*!40000 ALTER TABLE `lesson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson_activity`
--

DROP TABLE IF EXISTS `lesson_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson_activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `activity_instance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_activity`
--

LOCK TABLES `lesson_activity` WRITE;
/*!40000 ALTER TABLE `lesson_activity` DISABLE KEYS */;
INSERT INTO `lesson_activity` VALUES (1,1,1,'Text Test','test text activity',1,1,'2017-08-16 17:00:00',NULL),(4,1,1,'text2','sdgasdfasdfasdfa',1,NULL,'2017-08-17 22:06:01','2017-08-17 22:06:01'),(5,1,1,'text 3','asdfasdsadfas',1,2,'2017-08-17 22:06:37','2017-08-17 22:07:47'),(6,1,1,'rrr','rrr',1,3,'2017-08-18 00:36:52','2017-08-18 00:37:05'),(7,1,1,'rt','tqwret',1,4,'2017-08-18 01:28:14','2017-08-18 01:28:29'),(8,1,1,'fadfa','fasdfas',1,NULL,'2017-08-18 01:28:57','2017-08-18 01:28:57');
/*!40000 ALTER TABLE `lesson_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson_template`
--

DROP TABLE IF EXISTS `lesson_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson_template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `template_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_template`
--

LOCK TABLES `lesson_template` WRITE;
/*!40000 ALTER TABLE `lesson_template` DISABLE KEYS */;
/*!40000 ALTER TABLE `lesson_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017_07_20_1_ActivityInstance',1),(2,'2017_07_20_1_ActivityType',1),(3,'2017_07_20_1_course',1),(4,'2017_07_20_1_lesson',1),(5,'2017_07_20_1_lessontemplate',1),(6,'2017_07_20_2_course',2),(7,'2017_07_24_1_Question',3),(8,'2017_07_24_1_QuestionBank',3),(9,'2017_07_29_1_TextContent',4),(10,'2017_08_07_1_Account',5),(11,'2017_08_07_1_Permission',5),(12,'2017_08_07_1_User',5),(13,'2017_08_09_1_CourseTeacher',6),(14,'2017_08_14_2_QuestionActivity',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (1,1502201868,'teacher','2017-08-08 07:17:48','2017-08-08 07:17:48');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_0` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,1,'sdfgdg','er','rtwe','wertw','wert',0,'2017-08-07 08:08:20','2017-08-07 08:08:20');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_activity`
--

DROP TABLE IF EXISTS `question_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_activity`
--

LOCK TABLES `question_activity` WRITE;
/*!40000 ALTER TABLE `question_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `question_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_bank`
--

DROP TABLE IF EXISTS `question_bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_bank` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `difficulty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_bank`
--

LOCK TABLES `question_bank` WRITE;
/*!40000 ALTER TABLE `question_bank` DISABLE KEYS */;
INSERT INTO `question_bank` VALUES (1,'asdf','asdfa',0,'2017-08-07 08:08:00','2017-08-07 08:08:00');
/*!40000 ALTER TABLE `question_bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `text_content`
--

DROP TABLE IF EXISTS `text_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `text_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `lesson_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `text_content`
--

LOCK TABLES `text_content` WRITE;
/*!40000 ALTER TABLE `text_content` DISABLE KEYS */;
INSERT INTO `text_content` VALUES (1,1,'1','Hello world','Vừa qua, ASUS đã ra mắt hàng loạt dòng điện thoại ZenFone 4 mới tài Đài Loan, bao gồm ZenFone 4, ZenFone 4 Max và ZenFone 4 Selfie. Mỗi dòng đều có phiên bản thông thường và phiên bản Pro với những nâng cấp nhỏ về cấu hình cũng như kiểu dáng. Dự kiến, dòng ZenFone 4 Max và ZenFone 4 Max Pro sẽ được bán ra đầu tiên tại thị trường Việt Nam. Sau đây là một số hình ảnh về chiếc ZenFone 4 Max Pro này.','2017-08-16 17:00:00',NULL),(2,1,'1','asdfasdfasdfasdf','asdfasdfasdfasdfasdfa','2017-08-17 22:07:46','2017-08-17 22:07:46'),(3,1,'1','fff','fff','2017-08-18 00:37:05','2017-08-18 00:37:05'),(4,1,'1','awef','wefw','2017-08-18 01:28:28','2017-08-18 01:28:28');
/*!40000 ALTER TABLE `text_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1502201868,'bách nguyễn quang','2017-04-21','bachnq214@gmail.com','2017-08-08 07:17:48','2017-08-08 07:17:48');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-18 16:26:01
