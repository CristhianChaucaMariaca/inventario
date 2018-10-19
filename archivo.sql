-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: inventario
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `buys`
--

DROP TABLE IF EXISTS `buys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `cuantity` int(11) NOT NULL,
  `unitary` double(15,8) NOT NULL,
  `status` enum('PENDING','FINISHED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buys`
--

LOCK TABLES `buys` WRITE;
/*!40000 ALTER TABLE `buys` DISABLE KEYS */;
INSERT INTO `buys` VALUES (1,11,1,1,500,5.00000000,'FINISHED','2018-10-11 11:35:55','2018-10-11 11:35:55'),(2,11,1,2,450,2.00000000,'FINISHED','2018-10-16 13:10:00','2018-10-16 13:10:00');
/*!40000 ALTER TABLE `buys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drivers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` int(11) NOT NULL,
  `license` int(11) NOT NULL,
  `status` enum('FREE','OCCUPIED','OUT') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OUT',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `drivers_user_id_foreign` (`user_id`),
  CONSTRAINT `drivers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES (1,11,'Ramiro','Quispe','72087907','Villa Fatima',9099512,9599512,'FREE','2018-10-11 11:42:43','2018-10-11 11:42:43');
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ins`
--

DROP TABLE IF EXISTS `ins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kardex_id` int(10) unsigned NOT NULL,
  `cuantity` int(10) unsigned NOT NULL,
  `value` double(15,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ins_kardex_id_foreign` (`kardex_id`),
  CONSTRAINT `ins_kardex_id_foreign` FOREIGN KEY (`kardex_id`) REFERENCES `kardexes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins`
--

LOCK TABLES `ins` WRITE;
/*!40000 ALTER TABLE `ins` DISABLE KEYS */;
INSERT INTO `ins` VALUES (1,1,500,2500.00000000,'2018-10-11 11:35:55','2018-10-11 11:35:55'),(2,5,450,900.00000000,'2018-10-16 13:10:00','2018-10-16 13:10:00');
/*!40000 ALTER TABLE `ins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kardexes`
--

DROP TABLE IF EXISTS `kardexes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kardexes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `sale_id` int(10) unsigned DEFAULT NULL,
  `buy_id` int(10) unsigned DEFAULT NULL,
  `balance` int(10) unsigned NOT NULL,
  `value` double(15,8) NOT NULL,
  `type` enum('INPUT','OUTPUT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kardexes_user_id_foreign` (`user_id`),
  KEY `kardexes_product_id_foreign` (`product_id`),
  KEY `kardexes_sale_id_foreign` (`sale_id`),
  KEY `kardexes_buy_id_foreign` (`buy_id`),
  CONSTRAINT `kardexes_buy_id_foreign` FOREIGN KEY (`buy_id`) REFERENCES `buys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kardexes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kardexes_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kardexes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kardexes`
--

LOCK TABLES `kardexes` WRITE;
/*!40000 ALTER TABLE `kardexes` DISABLE KEYS */;
INSERT INTO `kardexes` VALUES (1,11,1,NULL,1,500,2500.00000000,'INPUT','2018-10-11 11:35:55','2018-10-11 11:35:55'),(2,11,1,1,NULL,480,2400.00000000,'OUTPUT','2018-10-11 11:43:14','2018-10-11 11:43:14'),(3,11,1,1,NULL,460,2300.00000000,'OUTPUT','2018-10-11 11:43:35','2018-10-11 11:43:35'),(4,11,1,2,NULL,410,2200.00000000,'OUTPUT','2018-10-11 11:44:09','2018-10-11 11:44:09'),(5,11,2,NULL,2,450,900.00000000,'INPUT','2018-10-16 13:10:00','2018-10-16 13:10:00'),(6,11,2,3,NULL,420,750.00000000,'OUTPUT','2018-10-16 13:10:55','2018-10-16 13:10:55');
/*!40000 ALTER TABLE `kardexes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=318 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (301,'2014_10_12_000000_create_users_table',1),(302,'2014_10_12_100000_create_password_resets_table',1),(303,'2015_01_20_084450_create_roles_table',1),(304,'2015_01_20_084525_create_role_user_table',1),(305,'2015_01_24_080208_create_permissions_table',1),(306,'2015_01_24_080433_create_permission_role_table',1),(307,'2015_12_04_003040_add_special_role_column',1),(308,'2017_10_17_170735_create_permission_user_table',1),(309,'2018_09_22_232925_create_types_table',1),(310,'2018_09_22_233010_create_products_table',1),(311,'2018_09_23_030140_create_providers_table',1),(312,'2018_09_23_040246_create_buys_table',1),(313,'2018_09_23_130519_create_drivers_table',1),(314,'2018_09_23_142541_create_sales_table',1),(315,'2018_09_23_153630_create_kardexes_table',1),(316,'2018_09_23_202841_create_outs_table',1),(317,'2018_09_23_202853_create_ins_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outs`
--

DROP TABLE IF EXISTS `outs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kardex_id` int(10) unsigned NOT NULL,
  `cuantity` int(10) unsigned NOT NULL,
  `value` double(15,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `outs_kardex_id_foreign` (`kardex_id`),
  CONSTRAINT `outs_kardex_id_foreign` FOREIGN KEY (`kardex_id`) REFERENCES `kardexes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outs`
--

LOCK TABLES `outs` WRITE;
/*!40000 ALTER TABLE `outs` DISABLE KEYS */;
INSERT INTO `outs` VALUES (1,3,20,100.00000000,'2018-10-11 11:43:35','2018-10-11 11:43:35'),(2,4,50,100.00000000,'2018-10-11 11:44:09','2018-10-11 11:44:09'),(3,6,30,150.00000000,'2018-10-16 13:10:56','2018-10-16 13:10:56');
/*!40000 ALTER TABLE `outs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_user`
--

LOCK TABLES `permission_user` WRITE;
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Navegar Usuarios','users.index','Listado de todos los usuarios del sistema','2018-10-11 11:33:37','2018-10-11 11:33:37'),(2,'Ver detalle de usuario','users.show','Ver en detalle cada usuario del sistema','2018-10-11 11:33:37','2018-10-11 11:33:37'),(3,'Edición de usuarios','users.edit','Editar caulquier dato de un usuario del sistema','2018-10-11 11:33:37','2018-10-11 11:33:37'),(4,'Eliminar Usuario','users.destroy','Eliminar cualquier usuario del sistema','2018-10-11 11:33:37','2018-10-11 11:33:37'),(5,'Navegar productos','products.index','Listado de todos los productos del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(6,'Ver detalle de producto','products.show','Ver en detalle cada producto del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(7,'Edición de productos','products.edit','Editar caulquier dato de un producto del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(8,'Crear productos','products.create','crear productos en el sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(9,'Eliminar productos','products.destroy','Eliminar cualquier producto del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(10,'Navegar conductores','drivers.index','Listado de todos los conductores del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(11,'Ver detalle de conductor','drivers.show','Ver en detalle cada conductor del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(12,'Edición de conductores','drivers.edit','Editar caulquier dato de un conductor del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(13,'Crear conductores','drivers.create','crear conductores en el sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(14,'Eliminar conduntores','drivers.destroy','Eliminar cualquier conductor del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(15,'Navegar proveedores','providers.index','Listado de todos los proveedores del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(16,'Ver detalle de proveedor','providers.show','Ver en detalle cada proveedor del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(17,'Edición de proveedores','providers.edit','Editar caulquier dato de un proveedor del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(18,'Crear proveedores','providers.create','crear proveedores en el sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(19,'Eliminar proveedores','providers.destroy','Eliminar cualquier proveedor del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(20,'Navegar compras','buys.index','Listado de todos los compras del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(21,'Ver detalle de compra','buys.show','Ver en detalle cada compra del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(22,'Edición de compras','buys.edit','Editar caulquier dato de un compra del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(23,'Crear compras','buys.create','crear compras en el sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(24,'Eliminar compras','buys.destroy','Eliminar cualquier compra del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(25,'Navegar exportaciones','sales.index','Listado de todos los exportaciones del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(26,'Ver detalle de exportacion','sales.show','Ver en detalle cada exportacion del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(27,'Edición de exportaciones','sales.edit','Editar caulquier dato de un exportacion del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(28,'Crear exportaciones','sales.create','crear exportaciones en el sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(29,'Eliminar exportaciones','sales.destroy','Eliminar cualquier exportacion del sistema','2018-10-11 11:33:38','2018-10-11 11:33:38'),(30,'Navegar tipos de producto','types.index','Listado de todos los tipos de producto del sistema','2018-10-11 11:33:39','2018-10-11 11:33:39'),(31,'Ver detalle de tipo de producto','types.show','Ver en detalle cada tipo de producto del sistema','2018-10-11 11:33:39','2018-10-11 11:33:39'),(32,'Edición de tipos de producto','types.edit','Editar caulquier dato de un tipo de producto del sistema','2018-10-11 11:33:39','2018-10-11 11:33:39'),(33,'Crear tipos de producto','types.create','crear tipos de producto en el sistema','2018-10-11 11:33:39','2018-10-11 11:33:39'),(34,'Eliminar tipos de producto','types.destroy','Eliminar cualquier tipo de producto del sistema','2018-10-11 11:33:39','2018-10-11 11:33:39'),(35,'Navegar kardex','kardexes.index','Listado de todos los kardex del sistema','2018-10-11 11:33:39','2018-10-11 11:33:39'),(36,'Ver detalle de kardex','kardexes.show','Ver en detalle cada kardex del sistema','2018-10-11 11:33:39','2018-10-11 11:33:39'),(37,'Edición de kardex','kardexes.edit','Editar caulquier dato de kardex del sistema','2018-10-11 11:33:39','2018-10-11 11:33:39'),(38,'Crear kardex','kardexes.create','crear kardex en el sistema','2018-10-11 11:33:39','2018-10-11 11:33:39'),(39,'Eliminar kardex','kardexes.destroy','Eliminar cualquier kardex del sistema','2018-10-11 11:33:39','2018-10-11 11:33:39');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min` int(11) NOT NULL,
  `status` enum('PUBLIC','PRIVATE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PUBLIC',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  KEY `products_type_id_foreign` (`type_id`),
  CONSTRAINT `products_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'Mara','Pie cuadrado',5,'PUBLIC','2018-10-11 11:35:21','2018-10-11 11:35:21'),(2,1,'Cedro','Pie cuadrado',10,'PUBLIC','2018-10-16 13:09:22','2018-10-16 13:09:22');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `providers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `providers_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` VALUES (1,'CMC','vila copacabana',2253076,'2018-10-11 11:35:35','2018-10-11 11:35:35');
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,11,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','admin',NULL,'2018-10-11 11:33:40','2018-10-11 11:33:40','all-access');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `driver_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `cuantity` int(11) NOT NULL,
  `unitary` double(15,8) NOT NULL,
  `status` enum('PENDING','FINISHED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_user_id_foreign` (`user_id`),
  KEY `sales_driver_id_foreign` (`driver_id`),
  KEY `sales_product_id_foreign` (`product_id`),
  CONSTRAINT `sales_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,11,1,1,20,5.00000000,'FINISHED','2018-10-11 11:43:14','2018-10-11 11:43:14'),(2,11,1,1,50,2.00000000,'FINISHED','2018-10-11 11:44:08','2018-10-11 11:44:08'),(3,11,1,2,30,5.00000000,'FINISHED','2018-10-16 13:10:55','2018-10-16 13:10:55');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `types_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Madera','2018-10-11 11:34:56','2018-10-11 11:34:56');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Gwendolyn Rowe PhD','immanuel14@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','cVSAyL1OFY','2018-10-11 11:33:39','2018-10-11 11:33:39'),(2,'Mr. Samir Treutel Sr.','bergnaum.jeremy@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','BWu3EN5V6U','2018-10-11 11:33:40','2018-10-11 11:33:40'),(3,'Mrs. Karen Marvin','shields.ismael@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','QEzAiN3ebJ','2018-10-11 11:33:40','2018-10-11 11:33:40'),(4,'Randall Abbott','marcel.kilback@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','VVrQoeR8kG','2018-10-11 11:33:40','2018-10-11 11:33:40'),(5,'Mara Effertz','enid93@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','773FDlLP9L','2018-10-11 11:33:40','2018-10-11 11:33:40'),(6,'Freeda Cremin','jaida12@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','L8Pt5D7G8K','2018-10-11 11:33:40','2018-10-11 11:33:40'),(7,'Crawford O\'Conner MD','xwilliamson@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','HBkzYr8BQM','2018-10-11 11:33:40','2018-10-11 11:33:40'),(8,'Jennings Larkin','kelvin89@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','6hjQux6TNu','2018-10-11 11:33:40','2018-10-11 11:33:40'),(9,'Prof. Halle Walker IV','vito.flatley@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','YXXsIWAX3k','2018-10-11 11:33:40','2018-10-11 11:33:40'),(10,'Hollis Pfeffer II','abigayle.pagac@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','8TBnNUTLTm','2018-10-11 11:33:40','2018-10-11 11:33:40'),(11,'Cristhian','cristhian@gmail.com','$2y$10$upVoNwvON6aWo282uGdZPe1pS/4MwvvrvyOrR/MOzg9LZRUY91upO','G5aHY9LyNyxWiyJvsHf75pJyimFlCbAYgLLOoqofNrtzHNsU6ExCiU4jlMC1','2018-10-11 11:33:40','2018-10-11 11:33:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-16  5:23:27
