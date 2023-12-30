/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.28-MariaDB : Database - proyectend
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyectend` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `proyectend`;

/*Table structure for table `contratos` */

DROP TABLE IF EXISTS `contratos`;

CREATE TABLE `contratos` (
  `idcontrato` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `iddetalle` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `idplan` int(11) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `observaciones` varchar(60) DEFAULT NULL,
  `restriccionpublicidad` varchar(30) NOT NULL,
  PRIMARY KEY (`idcontrato`),
  KEY `fk_idusuario_usu` (`idusuario`),
  KEY `fk_iddetalle_deta` (`iddetalle`),
  KEY `fk_idservicio_servi` (`idservicio`),
  KEY `fk_idplan_plan` (`idplan`),
  CONSTRAINT `fk_iddetalle_deta` FOREIGN KEY (`iddetalle`) REFERENCES `detalledeempresa` (`iddetalle`),
  CONSTRAINT `fk_idplan_plan` FOREIGN KEY (`idplan`) REFERENCES `planes` (`idplan`),
  CONSTRAINT `fk_idservicio_servi` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`),
  CONSTRAINT `fk_idusuario_usu` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `contratos` */

insert  into `contratos`(`idcontrato`,`idusuario`,`iddetalle`,`idservicio`,`idplan`,`fechainicio`,`fechafin`,`observaciones`,`restriccionpublicidad`) values 
(11,6,1,1,3,'2024-01-02','2024-01-12','','Todo público'),
(81,55,37,1,1,'2024-01-01','2024-01-31','PUBLICIDAD POR UN MES','Todo público');

/*Table structure for table `detallecontratos` */

DROP TABLE IF EXISTS `detallecontratos`;

CREATE TABLE `detallecontratos` (
  `iddetallecontrato` int(11) NOT NULL AUTO_INCREMENT,
  `idcontrato` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `idplan` varchar(20) NOT NULL,
  `horainicio` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `observaciones` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`iddetallecontrato`),
  KEY `fk_idcontrato_detcom` (`idcontrato`),
  CONSTRAINT `fk_idcontrato_detcom` FOREIGN KEY (`idcontrato`) REFERENCES `contratos` (`idcontrato`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `detallecontratos` */

insert  into `detallecontratos`(`iddetallecontrato`,`idcontrato`,`dia`,`idplan`,`horainicio`,`fecha`,`observaciones`) values 
(17,11,'Lunes','45 segundos','22:15:00','2023-12-21',''),
(18,11,'Martes','50 segundos','01:11:00','2023-12-21',''),
(19,11,'Miércoles','50 segundos','22:20:00','2023-12-28',''),
(24,11,'Jueves','50 segundos','22:28:00','2023-12-22',''),
(25,11,'Viernes','50 segundos','22:30:00','2023-12-29',''),
(26,11,'Sábado','50 segundos','02:30:00','2023-12-28',''),
(27,11,'Domingo','50 segundos','03:26:00','2023-12-21','');

/*Table structure for table `detalledeempresa` */

DROP TABLE IF EXISTS `detalledeempresa`;

CREATE TABLE `detalledeempresa` (
  `iddetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) DEFAULT NULL,
  `idempresa` int(11) DEFAULT NULL,
  `inactive_at` date NOT NULL,
  PRIMARY KEY (`iddetalle`),
  KEY `fk_idpersona_perso` (`idpersona`),
  KEY `fk_idempresa_empr` (`idempresa`),
  CONSTRAINT `fk_idempresa_empr` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`idempresa`),
  CONSTRAINT `fk_idpersona_perso` FOREIGN KEY (`idpersona`) REFERENCES `personas` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `detalledeempresa` */

insert  into `detalledeempresa`(`iddetalle`,`idpersona`,`idempresa`,`inactive_at`) values 
(1,1,1,'0000-00-00'),
(2,2,2,'2023-12-11'),
(3,2,2,'2023-12-11'),
(4,1,2,'2023-12-13'),
(5,2,5,'0000-00-00'),
(7,1,2,'2023-12-20'),
(8,1,2,'2023-12-20'),
(9,1,2,'2023-12-20'),
(10,1,2,'2023-12-20'),
(11,1,3,'2023-12-20'),
(12,1,2,'2023-12-20'),
(13,1,2,'2023-12-20'),
(14,1,2,'2023-12-20'),
(15,1,3,'2023-12-20'),
(16,18,3,'2023-12-23'),
(17,20,3,'2023-12-21'),
(18,20,5,'2023-12-21'),
(19,2,3,'2023-12-21'),
(20,1,5,'2023-12-21'),
(21,21,3,'2023-12-21'),
(22,2,3,'2023-12-21'),
(23,2,3,'2023-12-21'),
(24,2,1,'2023-12-21'),
(25,19,2,'2023-12-23'),
(26,2,2,'2023-12-23'),
(27,2,2,'2023-12-23'),
(29,19,3,'2023-12-23'),
(30,28,3,'2023-12-23'),
(31,33,3,'2023-12-23'),
(32,33,3,'2023-12-23'),
(33,28,5,'2023-12-23'),
(34,28,5,'2023-12-23'),
(35,18,5,'2023-12-23'),
(36,18,3,'2023-12-23'),
(37,48,30,'0000-00-00'),
(40,18,3,'2023-12-26'),
(41,18,3,'2023-12-26'),
(48,19,3,'2023-12-26'),
(49,19,3,'2023-12-26'),
(55,18,2,'2023-12-26'),
(56,18,30,'2023-12-26'),
(57,2,30,'2023-12-26'),
(58,19,3,'2023-12-26'),
(59,2,30,'2023-12-26'),
(60,28,5,'2023-12-27');

/*Table structure for table `empresas` */

DROP TABLE IF EXISTS `empresas`;

CREATE TABLE `empresas` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `razonsocial` varchar(50) NOT NULL,
  `ruc` char(11) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL,
  `inactive_at` date NOT NULL,
  PRIMARY KEY (`idempresa`),
  UNIQUE KEY `uk_ruc_ru` (`ruc`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `empresas` */

insert  into `empresas`(`idempresa`,`razonsocial`,`ruc`,`direccion`,`create_at`,`update_at`,`inactive_at`) values 
(1,'Restaurante \"Los Patitos\" ','15975395141','Calle San Francisco 952','2023-12-08 16:55:27','0000-00-00 00:00:00','0000-00-00'),
(2,'Restaurante Lorena ','89562374155','Call San Juan 967','2023-12-08 16:55:27','0000-00-00 00:00:00','0000-00-00'),
(3,'Restaurante \"De Florcita\" ','78451296328','Calle Juan XXIII 110','2023-12-08 16:55:27','0000-00-00 00:00:00','0000-00-00'),
(4,'Restaurante \"LoSDAPatitos\" ','15975395111','Calle San FrancSDco 952','2023-12-11 16:53:15','0000-00-00 00:00:00','2023-12-11'),
(5,'no tiene','00000000000','','2023-12-13 13:05:39','0000-00-00 00:00:00','0000-00-00'),
(6,'','20','','2023-12-18 13:39:49','0000-00-00 00:00:00','2023-12-18'),
(12,'dsadasd','20dasdasdas','sdasd','2023-12-18 13:46:01','0000-00-00 00:00:00','2023-12-18'),
(14,'dsadsad','20897765776','','2023-12-18 13:48:45','0000-00-00 00:00:00','2023-12-18'),
(18,'dasdasd','20767657567','','2023-12-18 13:51:10','0000-00-00 00:00:00','2023-12-18'),
(21,'asdasd','202323','','2023-12-18 13:52:08','0000-00-00 00:00:00','2023-12-18'),
(22,'dasdadsa','202342343','','2023-12-18 13:52:19','0000-00-00 00:00:00','2023-12-18'),
(23,'ASDASDA','20343432423','','2023-12-20 11:48:14','0000-00-00 00:00:00','2023-12-20'),
(24,'DASDASD','20423423423','','2023-12-20 11:48:25','0000-00-00 00:00:00','2023-12-20'),
(25,'DSDSD','20324242342','','2023-12-20 11:48:56','0000-00-00 00:00:00','2023-12-20'),
(27,'asdasd','20213123123','','2023-12-20 13:22:03','0000-00-00 00:00:00','2023-12-20'),
(28,'fgdgdf','204534534','sd','2023-12-20 13:56:26','0000-00-00 00:00:00','2023-12-20'),
(29,'4324234','20342342342','','2023-12-23 15:21:32','0000-00-00 00:00:00','2023-12-23'),
(30,'TORRES PRODUCCIONES','10700514043','AV ARGENTINA CONDORILLO','2023-12-26 22:39:31','0000-00-00 00:00:00','0000-00-00'),
(32,'tienda','20543545345','','2023-12-26 23:32:29','0000-00-00 00:00:00','2023-12-26'),
(33,'tienda','20424234234','','2023-12-26 23:32:52','0000-00-00 00:00:00','2023-12-26');

/*Table structure for table `pagoscontrato` */

DROP TABLE IF EXISTS `pagoscontrato`;

CREATE TABLE `pagoscontrato` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `idcontrato` int(11) NOT NULL,
  `tipopago` varchar(40) NOT NULL,
  `idplan` decimal(10,2) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `amortizacion` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `fechapago` date NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`idpago`),
  KEY `fk_idcontrato_pago` (`idcontrato`),
  CONSTRAINT `fk_idcontrato_pago` FOREIGN KEY (`idcontrato`) REFERENCES `contratos` (`idcontrato`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pagoscontrato` */

insert  into `pagoscontrato`(`idpago`,`idcontrato`,`tipopago`,`idplan`,`monto`,`amortizacion`,`saldo`,`fechapago`,`descripcion`,`estado`) values 
(49,11,'Plin',1200.00,400.00,500.00,700.00,'2023-12-23','','Pendiente'),
(50,81,'Efectivo',500.00,200.00,200.00,300.00,'2023-12-26','INICIAL','Pendiente'),
(55,11,'Yape',1200.00,100.00,500.00,700.00,'2023-12-27','','Pendiente');

/*Table structure for table `personas` */

DROP TABLE IF EXISTS `personas`;

CREATE TABLE `personas` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `tipodocumento` char(1) NOT NULL DEFAULT 'D',
  `nrodocumento` char(8) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `telefono` char(9) DEFAULT NULL,
  `inactive_at` date NOT NULL,
  PRIMARY KEY (`idpersona`),
  UNIQUE KEY `uk_nrodocumento_est` (`tipodocumento`,`nrodocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `personas` */

insert  into `personas`(`idpersona`,`apellidos`,`nombres`,`tipodocumento`,`nrodocumento`,`direccion`,`telefono`,`inactive_at`) values 
(1,'Del Olmo Sanchez','Carla Emma','C','43535348','Calle Montones','','0000-00-00'),
(2,'Ramos Paredes','Marc Manuel','C','78451297','','985563207','0000-00-00'),
(3,'Plan Premiun','1200','5','60 dias','20','Plan prem','2023-12-11'),
(4,'dasdas','sada','D','dasdas','dasda','asdas','2023-12-18'),
(5,'fdsfsd','dfsf','D','sdfsdf','','','2023-12-18'),
(6,'fsdfsd','fsdf','C','sdfsdf','sdfsdf','','2023-12-18'),
(7,'RAMOS','Osis','D','98768678','','','2023-12-20'),
(8,'dasdas','asdasd','C','22234233','','','2023-12-20'),
(9,'dasdas','asdsd','D','54345453','sadasd','','2023-12-20'),
(10,'dasdsd','z<z<zx<zx','D','43434234','','','2023-12-20'),
(11,'asdsa','asdas','D','13123123','asdasd','','2023-12-20'),
(12,'sdfasdfasd','sdfasdfasdfdas','D','12334235','adasdasdfasd','','2023-12-20'),
(13,'asdsad','asdasd','D','123123','','545','2023-12-20'),
(14,'asdsa','asd','D','12123123','','','2023-12-20'),
(15,'asd','sdfdsf','D','23423432','','','2023-12-20'),
(16,'dasdasd','asdasdas','C','76575675','asdasd','','2023-12-20'),
(17,'dsfdsaf','sdsad','C','1212','sdad','','2023-12-20'),
(18,'Arellano Sotelo','Manuel Alonso','D','42344565','','','0000-00-00'),
(19,'Flores Minaya','Carlos','C','23422324','','','0000-00-00'),
(20,'2342','234','C','42342','','','2023-12-23'),
(21,'234234','2342','D','23424','','','2023-12-23'),
(23,'4234','234','C','234234','','','2023-12-23'),
(24,'234234','4234','D','4234','','','2023-12-23'),
(26,'4234234','4234','D','23423423','','','2023-12-23'),
(27,'4363','4535','C','43534534','','','2023-12-23'),
(28,'Martinez','Alberto','D','45454585','','','0000-00-00'),
(29,'445645','546546','C','5456','','','2023-12-23'),
(30,'4235','45545','C','4354535','','','2023-12-23'),
(31,'435345','345345','C','435345','345','','2023-12-23'),
(32,'dasdas','123123','C','213123','','','2023-12-23'),
(33,'ewe','qweqwe','C','23123','','','2023-12-24'),
(34,'23123','12313','C','3123123','','','2023-12-23'),
(35,'fdrseres','rewresr','C','53454543','','','2023-12-23'),
(36,'mara','aedaweawe','D','35345345','','','2023-12-23'),
(37,'muero','4324234','D','43534534','','','2023-12-23'),
(38,'fdfdf','sdfdfsdfsdf','D','45345345','','','2023-12-23'),
(39,'sdfdfsdfs','dsfsdfsdfsdh','D','56456767','','','2023-12-23'),
(40,'reerser','423423423','C','34534534','','','2023-12-23'),
(41,'yata','asda','D','54534545','','','2023-12-23'),
(42,'nose','piel','C','67564564','','','2023-12-23'),
(43,'nombre','ra','D','76575756','adsasd','','2023-12-23'),
(44,'maltrato','infantil','D','87686786','','','2023-12-23'),
(45,'asdasd','asdasd','D','65464564','','','2023-12-24'),
(46,'fdsaf','asdasd','D','42345342','','','2023-12-24'),
(47,'Ramirez','Josue','C','87678987','','','0000-00-00'),
(48,'TORRES','MAGALALNES','D','70051404','AV ARGENTINA CONDORILLO','958675104','0000-00-00'),
(49,'','','','','','','2023-12-27');

/*Table structure for table `planes` */

DROP TABLE IF EXISTS `planes`;

CREATE TABLE `planes` (
  `idplan` int(11) NOT NULL AUTO_INCREMENT,
  `nombreplan` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `duracionspot` varchar(20) NOT NULL,
  `duracionplan` varchar(20) NOT NULL,
  `cantanunciosdia` int(11) NOT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idplan`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `planes` */

insert  into `planes`(`idplan`,`nombreplan`,`precio`,`duracionspot`,`duracionplan`,`cantanunciosdia`,`descripcion`) values 
(1,'Plan Básico',500.00,'45 segundos','40 dias',10,''),
(2,'Plan Estándar',800.00,'50 segundos','30 dias',12,'Plan estándar con anuncios premium'),
(3,'Plan Premiun',1200.00,'50 segundos','60 dias',15,'Plan premiun con anuncios de alta calidad');

/*Table structure for table `servicios` */

DROP TABLE IF EXISTS `servicios`;

CREATE TABLE `servicios` (
  `idservicio` int(11) NOT NULL AUTO_INCREMENT,
  `servicio` varchar(30) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL,
  `inactive_at` datetime NOT NULL,
  PRIMARY KEY (`idservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `servicios` */

insert  into `servicios`(`idservicio`,`servicio`,`create_at`,`update_at`,`inactive_at`) values 
(1,'Publicidad','2023-12-08 16:46:34','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,'Reportaje','2023-12-08 16:46:34','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreusuario` varchar(50) NOT NULL,
  `claveacceso` varchar(90) NOT NULL,
  `nivelacceso` char(20) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL,
  `inactive_at` datetime NOT NULL,
  `imagenperfil` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `uk_nombreusuario_usu` (`nombreusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`idusuario`,`nombreusuario`,`claveacceso`,`nivelacceso`,`create_at`,`update_at`,`inactive_at`,`imagenperfil`) values 
(1,'BudaGautama','$2y$10$EauxzNplzGb1A4I4jjtXAeo/fMlk3Zvm4dp70TDBBX29Tt51tZyBG','PER','2023-12-13 14:06:58','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(2,'Carlaaa01','$2y$10$EauxzNplzGb1A4I4jjtXAeo/fMlk3Zvm4dp70TDBBX29Tt51tZyBG','ADM','2023-12-13 14:06:58','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(5,'dasd','$2y$10$EauxzNplzGb1A4I4jjtXAeo/fMlk3Zvm4dp70TDBBX29Tt51tZyBG','Administrador','2023-12-13 17:11:29','2023-12-13 17:11:29','2023-12-13 17:11:29',NULL),
(6,'Josue','$2y$10$JAwSERBxv1uIN7Z8mzCJm.gRbC0i6mC9oFRPf/IjqS9JZPdchNJk.','Gerente','2023-12-13 18:04:54','2023-12-13 18:04:54','2023-12-13 18:04:54',NULL),
(7,'carmen','$2y$10$veCgFWZpEdWnsFjBg818uOIaSPM0Gku10tP//53yhKnsxAYCe27Eq','Administrador','2023-12-13 18:05:24','2023-12-13 18:05:24','2023-12-13 18:05:24',NULL),
(8,'BudaGa','$2y$10$JlkmSgDd5fDmg5F.RlQtn.SGg.HRxQ10p4EaEbk.YKu5lnn7v00q6','Administrador','2023-12-14 09:45:01','2023-12-14 09:45:01','2023-12-14 09:45:01',NULL),
(9,'Navidad','$2y$10$pQGe3BYIftxaUQHHX4Q.LOfjFjib041wX32Q8xm35bf14z5YNENg.','Administrador','2023-12-14 09:54:34','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(10,'Buda','$2y$10$1X4O3Sb.Pj2R9wpa15/r5eLVnDyn./utjQeSHD1/21kM8vCJLLr5W','1','2023-12-14 11:26:48','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(11,'BudaF','$2y$10$.87tIFiwh2gdXEvEaKqEG.cjALuRbz0z6s34TjyA2Kx6BqNRs3wiC','Administrador','2023-12-14 11:27:51','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(12,'daf','123456','Administrador','2023-12-18 15:20:43','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(13,'nada','$2y$10$K9gjp5Qunb96KNs/urEQiOLqg2dPYj2pUEq5ny3unHEdyyj4xf4pe','Administrador','2023-12-18 15:23:23','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(14,'todo','$2y$10$SZPqHozJOtUBbEbdaUStMOWcJz/joaoDdwsZ9gsXvx0pHyiXsYQv.','Administrador','2023-12-18 15:24:11','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(15,'medio','$2y$10$sddEUHUMCzebuG14895/OOo3JDJYSiZCDUi6yNbspuqZSqdBBAheK','Administrador','2023-12-18 15:25:49','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(16,'triste','$2y$10$c4xtyEybsAoontxwgPcJ1O39S95e3xwf67dKtYFDgaI8MIbj5K2cm','Administrador','2023-12-18 15:29:53','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(17,'rata','$2y$10$K.yIBiDdft.iHhL/6rEzTOBtf675jsIZdzpIjgJ3O7KULO.fIA.cW','Administrador','2023-12-18 15:31:42','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(18,'debo','$2y$10$Jk16vVyW4bkYLr/HmW66E.K.sy9pk7WnRBKu6LztM.GU3NZPxkqJO','Administrador','2023-12-18 15:33:31','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(19,'Admin','','Gerente','2023-12-23 15:01:20','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(20,'persona1','$2y$10$npq8IXVJH.25LO8rNdGv6unc9EQYqV0.Gz3uMo4uwAWyZgpHzLIzK','Gerente','2023-12-23 16:28:28','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(21,'jtb','$2y$10$nyyEDHinL9hEY9V6ttQqlusL0tfipCTRLhn3x2aTxA7NfirYYxfAC','Administrador','2023-12-23 16:37:01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(22,'eds','$2y$10$NJRHXxQPlCB63I6OJGHt2.sgUgTo2qQYDR38U..2xi0BGzQ40nynq','Administrador','2023-12-23 16:40:26','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(23,'ad','$2y$10$gt18FXN9z0Wxx/OvPXX0Z.DPeAFgfw8e5JHza5O0aXsiBhIJJeDt.','Administrador','2023-12-23 16:42:55','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(24,'RAMIRO','$2y$10$sjgy.NAsJGnClPcxml8ZguWZs9hkli3qe.6WUVIVdrNeEnFxxKFCi','Administrador','2023-12-23 16:59:44','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(25,'niño','$2y$10$pGRxDEPg33kOpLf9QttmDeD/CkJIVelQUs1xmzbqBOwTsCQrf5.gi','Administrador','2023-12-23 17:07:46','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(26,'arsene','$2y$10$GisnRP1ydy37KHmLEI93Ye8.D/tqtR2a/9lvUNEOnAA09v4gRzPYy','Administrador','2023-12-23 17:10:56','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(27,'pe','','Administrador','2023-12-24 08:48:20','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(28,'v','$2y$10$VBmBLIjufb1qrK9wInNa/.ZpJW8rGApbUX/xscWhrzcRHG2ko4kx2','Administrador','2023-12-24 08:50:11','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(29,'zASDASD','','Administrador','2023-12-24 08:59:51','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(30,'za','$2y$10$QuAbZ53qPkWezbzUNB.14eAl/JD0op/VdRrDdNW9B2nBLKIHs2QCa','Administrador','2023-12-24 09:00:08','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(31,'buey','$2y$10$DSB3BHZCs79vtwbuXL6AXOE2HR4lOCXIr3fNAnMwhWMSrZxgEKBdO','Administrador','2023-12-24 09:01:58','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(32,'cabdasdasd','','Administrador','2023-12-24 09:02:20','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(33,'pu','$2y$10$qGFwUZAXG3bcz4ulH7LhBOHSWzIQwnLkYMNKklDW.RPhd5MTg5S0m','Administrador','2023-12-24 09:04:59','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(34,'o','$2y$10$sVeoTsbOCX4AfLjFHiK2ROJQSkLdg.JLYdcIDxNeOsu..3cM3Dt/i','Administrador','2023-12-24 09:09:08','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(35,'corazorane','$2y$10$LnvDg0N55FGX63Nso1f/hePzsnwIscNNuL7tjL3lwY3iZ5jaD5goq','Administrador','2023-12-24 21:21:34','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(36,'descorazorane','','Administrador','2023-12-24 21:30:07','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(37,'mañana','$2y$10$LGG0z0ILstEcJhY7A8IJ2e6.qDvI.obUdCnuJ9Ia0MI7fd0N4Y65O','Administrador','2023-12-24 21:35:18','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(38,'leelo','$2y$10$GjYCBs61f99rTPhMTg4dhuURLPtljn6RwArqi9kxNo9ebQH1iqDCy','Administrador','2023-12-24 21:37:49','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(39,'icabook','$2y$10$nhvZTpxurTOkPBl38RIhSOsX.vXBEph2ia/j45JwxzTtACMgOY/Ki','Administrador','2023-12-24 21:40:21','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(40,'icabok','$2y$10$0HAXEyo8W5M6cFXbEtBcjem0BNAdTXfCU8xZ4QaRb9cO.nNHBZR62','Administrador','2023-12-24 21:41:29','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(41,'descorasorane','$2y$10$DODrLU8uou.M5zVtLx32BeScrD9OOvhC7yQChYF1TIQth3TXHrCf6','Administrador','2023-12-24 21:44:18','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(42,'descoracorane','$2y$10$R5I3AeMIBBtnDUNvw/yWAeQUrpVU/bMQGcdgG5hnUGCkJzqnoxxgi','Administrador','2023-12-24 21:46:08','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(43,'descorassorane','$2y$10$NiktwdRls4qrWQOdwRNoBOkfArDzwAk8/3o3gyuBZkXJFCcsmS0my','Administrador','2023-12-24 21:47:19','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(44,'descorazzorane','$2y$10$nZ4V2FjkKmgoVnuDC33AWuUC6fKihHOS4i2Qu6klOwovoRATDp.VC','Administrador','2023-12-24 21:49:01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(45,'descorrazorane','$2y$10$GwslmFJOBionUt0x1V1hU.oQ5b/sYx2Xvv3yftweDvuNy1PPhpzYy','Administrador','2023-12-24 21:49:31','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(46,'descoracortane','$2y$10$iU.ORuMI1YWvQYENpG0ABeWArEc4frcBwQaSXep0/z7KQcMj4Tf7u','Administrador','2023-12-24 22:02:41','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(47,'descorazora','','Administrador','2023-12-24 22:03:05','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(48,'desscorazorane','','Administrador','2023-12-24 22:03:58','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(49,'deescorazorane','','Administrador','2023-12-24 22:08:21','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(50,'ddescorazone','','Administrador','2023-12-24 22:09:11','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(51,'Ca','$2y$10$EauxzNplzGb1A4I4jjtXAeo/fMlk3Zvm4dp70TDBBX29Tt51tZyBG','Administrador','2023-12-25 10:40:44','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(52,'navideña','','Administrador','2023-12-26 13:31:22','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(53,'navideño','','Administrador','2023-12-26 13:35:04','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(54,'navidades','','Administrador','2023-12-26 13:42:24','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(55,'usuario','$2y$10$6fDqg.k/akhg.I8oFMCBoOQSUBGd70HW8kZKueBDRAjE4b7doYz.S','Gerente','2023-12-26 20:21:40','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
(56,'da','123456','Administrador','2023-12-27 10:33:39','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);

/* Procedure structure for procedure `ActualizarContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `ActualizarContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarContrato`(
    IN p_idcontrato INT,
    IN p_idusuario INT,
    IN p_idservicio INT,
    IN p_idplan INT,
    IN p_fechainicio DATE,
    IN p_fechafin DATE,
    IN p_observaciones VARCHAR(60),
    IN p_restriccionpublicidad VARCHAR(30)
)
BEGIN
    UPDATE contratos
    SET
        idusuario = p_idusuario,
        idservicio = p_idservicio,
        idplan = p_idplan,
        fechainicio = p_fechainicio,
        fechafin = p_fechafin,
        observaciones = p_observaciones,
        restriccionpublicidad = p_restriccionpublicidad
    WHERE
        idcontrato = p_idcontrato;
END */$$
DELIMITER ;

/* Procedure structure for procedure `ActualizarDetalleContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `ActualizarDetalleContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarDetalleContrato`(
    IN p_iddetallecontrato INT,
    IN p_idcontrato INT,
    IN p_dia VARCHAR(20),
    IN p_idplan VARCHAR(20), -- Cambiado de p_duracion a p_idplan
    IN p_horainicio TIME,
    IN p_fecha DATE,
    IN p_observaciones VARCHAR(80)
    
)
BEGIN
    UPDATE detallecontratos
    SET
        idcontrato = p_idcontrato,
        dia = p_dia,
        idplan = p_idplan, -- Cambiado de duracion a idplan
        horainicio = p_horainicio,
        fecha = p_fecha,
        observaciones = p_observaciones
    WHERE
        iddetallecontrato = p_iddetallecontrato;
END */$$
DELIMITER ;

/* Procedure structure for procedure `ActualizarPagosContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `ActualizarPagosContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarPagosContrato`(
    IN p_idpago INT,
    IN p_tipopago VARCHAR(40),
    IN p_monto DECIMAL(10, 2),
    IN p_descripcion VARCHAR(60),
    IN p_estado VARCHAR(15)
)
BEGIN
    DECLARE p_precio_plan DECIMAL(10, 2);
    DECLARE p_amortizacion DECIMAL(10, 2);
    DECLARE p_saldo DECIMAL(10, 2);
    DECLARE p_error BOOLEAN DEFAULT FALSE;

    -- Obtener el precio del plan del contrato
    SELECT precio INTO p_precio_plan FROM planes
    WHERE idplan = (SELECT idplan FROM contratos WHERE idcontrato = (SELECT idcontrato FROM pagoscontrato WHERE idpago = p_idpago));

    -- Calcular la amortización acumulativa excluyendo el monto actual
    SELECT COALESCE(SUM(monto), 0) INTO p_amortizacion FROM pagoscontrato 
    WHERE idcontrato = (SELECT idcontrato FROM pagoscontrato WHERE idpago = p_idpago) AND idpago <> p_idpago;

    -- Calcular el saldo con la resta del precio del plan, la amortización y el nuevo monto
    SET p_saldo = p_precio_plan - (p_amortizacion + p_monto);

    -- Verificar si el monto del nuevo pago supera la deuda restante
    IF p_saldo < 0 THEN
        SET p_error = TRUE;
    ELSE
        SET p_error = FALSE;

        -- Establecer el estado
        IF p_saldo > 0 THEN
            SET p_estado = 'Pendiente';
        ELSE
            SET p_estado = 'Completado';
        END IF;

        -- Actualizar el pago con los nuevos valores
        UPDATE pagoscontrato
        SET 
            tipopago = p_tipopago,
            idplan = p_precio_plan,
            monto = p_monto,
            amortizacion = p_amortizacion + p_monto,
            saldo = p_saldo,
            descripcion = p_descripcion,
            estado = p_estado
        WHERE idpago = p_idpago;
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `CrearUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `CrearUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearUsuario`(
    IN p_nombreusuario VARCHAR(50),
    IN p_claveacceso VARCHAR(90),
    IN p_nivelacceso CHAR(20)
)
BEGIN
    DECLARE v_usuario_existente INT;

    -- Verificar si el nombre de usuario ya existe
    SELECT COUNT(*) INTO v_usuario_existente
    FROM usuarios
    WHERE nombreusuario = p_nombreusuario;

    -- Si el usuario no existe, insertarlo
    IF v_usuario_existente = 0 THEN
        INSERT INTO usuarios (nombreusuario, claveacceso, nivelacceso)
        VALUES (p_nombreusuario, p_claveacceso, p_nivelacceso);

        SELECT 'Usuario creado exitosamente' AS mensaje;
    ELSE
        SELECT 'El nombre de usuario ya está en uso. Por favor, elija otro.' AS mensaje;
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `EliminarContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `EliminarContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarContrato`(IN p_idcontrato INT)
BEGIN
    DELETE FROM contratos WHERE idcontrato = p_idcontrato;
END */$$
DELIMITER ;

/* Procedure structure for procedure `EliminarDetalleContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `EliminarDetalleContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarDetalleContrato`(IN p_iddetallecontrato INT)
BEGIN
    DELETE FROM detallecontratos WHERE iddetallecontrato = p_iddetallecontrato;
END */$$
DELIMITER ;

/* Procedure structure for procedure `EliminarDetalledeEmpresa` */

/*!50003 DROP PROCEDURE IF EXISTS  `EliminarDetalledeEmpresa` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarDetalledeEmpresa`(IN p_iddetalle INT)
BEGIN
    UPDATE detalledeempresa SET inactive_at = NOW() WHERE iddetalle = p_iddetalle;
END */$$
DELIMITER ;

/* Procedure structure for procedure `EliminarPagoContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `EliminarPagoContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarPagoContrato`(IN p_idpago INT)
BEGIN
    DELETE FROM pagoscontrato WHERE idpago = p_idpago;
END */$$
DELIMITER ;

/* Procedure structure for procedure `EliminarPlan` */

/*!50003 DROP PROCEDURE IF EXISTS  `EliminarPlan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarPlan`(IN p_idplan INT)
BEGIN
    DELETE FROM planes WHERE idplan = p_idplan;
END */$$
DELIMITER ;

/* Procedure structure for procedure `GetContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `GetContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `GetContrato`(IN p_idcontrato INT)
BEGIN
    SELECT 
        C.*,
        CONCAT(P.apellidos, ', ', P.nombres) AS nombre_persona,
        E.razonsocial AS nombre_empresa
    FROM contratos C
    INNER JOIN usuarios U ON C.idusuario = U.idusuario
    INNER JOIN detalledeempresa DE ON C.iddetalle = DE.iddetalle
    INNER JOIN personas P ON DE.idpersona = P.idpersona
    INNER JOIN empresas E ON DE.idempresa = E.idempresa
    WHERE C.idcontrato = p_idcontrato;
END */$$
DELIMITER ;

/* Procedure structure for procedure `GetDetalleContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `GetDetalleContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `GetDetalleContrato`(IN p_iddetallecontrato INT)
BEGIN
    SELECT * FROM detallecontratos WHERE iddetallecontrato = p_iddetallecontrato;
END */$$
DELIMITER ;

/* Procedure structure for procedure `GetEmpresa` */

/*!50003 DROP PROCEDURE IF EXISTS  `GetEmpresa` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `GetEmpresa`(IN p_idempresa INT)
BEGIN
    SELECT * FROM empresas WHERE idempresa = p_idempresa;
END */$$
DELIMITER ;

/* Procedure structure for procedure `GetPagosContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `GetPagosContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `GetPagosContrato`(IN p_idpago INT)
BEGIN
    SELECT * FROM pagoscontrato WHERE idpago = p_idpago;
END */$$
DELIMITER ;

/* Procedure structure for procedure `GetPersona` */

/*!50003 DROP PROCEDURE IF EXISTS  `GetPersona` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `GetPersona`(IN p_idpersona INT)
BEGIN
    SELECT * FROM personas WHERE idpersona = p_idpersona;
END */$$
DELIMITER ;

/* Procedure structure for procedure `GetPlan` */

/*!50003 DROP PROCEDURE IF EXISTS  `GetPlan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `GetPlan`(IN p_idplan INT)
BEGIN
    SELECT * FROM planes WHERE idplan = p_idplan;
END */$$
DELIMITER ;

/* Procedure structure for procedure `ListarContratos` */

/*!50003 DROP PROCEDURE IF EXISTS  `ListarContratos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarContratos`()
BEGIN
    SELECT 
        C.idcontrato,
        U.nombreusuario AS usuario,
        CONCAT(P.apellidos, ', ', P.nombres) AS persona,
        E.razonsocial AS empresa,
        S.servicio AS servicio,
        PL.nombreplan AS plan,
        PL.precio AS precio,
        PL.duracionspot AS duracionspot,
        C.fechainicio,
        C.fechafin,
        C.observaciones,
        C.restriccionpublicidad,
        DE.idpersona,
        DE.idempresa
    FROM contratos C
    INNER JOIN usuarios U ON C.idusuario = U.idusuario
    INNER JOIN detalledeempresa DE ON C.iddetalle = DE.iddetalle
    INNER JOIN personas P ON DE.idpersona = P.idpersona
    INNER JOIN empresas E ON DE.idempresa = E.idempresa
    INNER JOIN servicios S ON C.idservicio = S.idservicio
    INNER JOIN planes PL ON C.idplan = PL.idplan;
END */$$
DELIMITER ;

/* Procedure structure for procedure `ListarContratosR` */

/*!50003 DROP PROCEDURE IF EXISTS  `ListarContratosR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarContratosR`(IN idcontrato INT)
BEGIN
    SELECT 
        C.idcontrato,
        U.nombreusuario AS usuario,
        CONCAT(P.apellidos, ', ', P.nombres) AS persona,
        CASE 
            WHEN E.razonsocial = 'NO TIENE' THEN '______'
            ELSE E.razonsocial
        END AS empresa,
        S.servicio AS servicio,
        PL.nombreplan AS plan,
        PL.precio AS precio,
        PL.duracionspot AS duracionspot,
        PL.cantanunciosdia,
        C.fechainicio,
        C.fechafin,
        C.observaciones,
        C.restriccionpublicidad,
        P.nrodocumento,
        DE.idpersona,
        DE.idempresa
    FROM contratos C
    INNER JOIN usuarios U ON C.idusuario = U.idusuario
    INNER JOIN detalledeempresa DE ON C.iddetalle = DE.iddetalle
    INNER JOIN personas P ON DE.idpersona = P.idpersona
    INNER JOIN empresas E ON DE.idempresa = E.idempresa
    INNER JOIN servicios S ON C.idservicio = S.idservicio
    INNER JOIN planes PL ON C.idplan = PL.idplan
    WHERE C.idcontrato = idcontrato;
END */$$
DELIMITER ;

/* Procedure structure for procedure `ListarDetalleContratos` */

/*!50003 DROP PROCEDURE IF EXISTS  `ListarDetalleContratos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarDetalleContratos`(IN p_contrato INT)
BEGIN
    SELECT 
        D.iddetallecontrato,
      CONCAT(Per.apellidos, ', ', Per.nombres) AS persona,
        Emp.razonsocial AS empresa,
        D.dia,
        D.idplan,
        D.horainicio,
        D.fecha,
        D.observaciones
    FROM detallecontratos D
       INNER JOIN contratos C ON D.idcontrato = C.idcontrato
    INNER JOIN detalledeempresa DE ON C.iddetalle = DE.iddetalle
    INNER JOIN personas Per ON DE.idpersona = Per.idpersona
    INNER JOIN empresas Emp ON DE.idempresa = Emp.idempresa
    WHERE D.idcontrato = p_contrato;
END */$$
DELIMITER ;

/* Procedure structure for procedure `ListarDetalledeEmpresa` */

/*!50003 DROP PROCEDURE IF EXISTS  `ListarDetalledeEmpresa` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarDetalledeEmpresa`()
BEGIN
    SELECT d.iddetalle, CONCAT(p.nombres, ' ', p.apellidos) AS nombre_persona, e.razonsocial AS nombre_empresa
    FROM detalledeempresa d
    LEFT JOIN personas p ON d.idpersona = p.idpersona
    LEFT JOIN empresas e ON d.idempresa = e.idempresa
    WHERE d.inactive_at = '0000-00-00';
END */$$
DELIMITER ;

/* Procedure structure for procedure `ListarEmpresas` */

/*!50003 DROP PROCEDURE IF EXISTS  `ListarEmpresas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarEmpresas`()
BEGIN
    SELECT * FROM empresas WHERE inactive_at = '0000-00-00';
END */$$
DELIMITER ;

/* Procedure structure for procedure `ListarPagosContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `ListarPagosContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarPagosContrato`(IN p_contrato INT)
BEGIN
    SELECT 
        P.idpago,
        CONCAT(Per.apellidos, ', ', Per.nombres) AS persona,
        Emp.razonsocial AS empresa,
        P.tipopago,
        P.idplan,
        P.monto,
        P.amortizacion,
        P.saldo,
        P.fechapago,
        P.descripcion,
        P.estado
    FROM pagoscontrato P
    INNER JOIN contratos C ON P.idcontrato = C.idcontrato
    INNER JOIN detalledeempresa DE ON C.iddetalle = DE.iddetalle
    INNER JOIN personas Per ON DE.idpersona = Per.idpersona
    INNER JOIN empresas Emp ON DE.idempresa = Emp.idempresa
    WHERE P.idcontrato = p_contrato;
END */$$
DELIMITER ;

/* Procedure structure for procedure `ListarPagosContratoR` */

/*!50003 DROP PROCEDURE IF EXISTS  `ListarPagosContratoR` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarPagosContratoR`(IN p_contrato INT, IN p_pago INT)
BEGIN
    SELECT 
        P.idpago,
        CONCAT(Per.apellidos, ', ', Per.nombres) AS persona,
        Emp.razonsocial AS empresa,
        P.tipopago,
        P.idplan,
        P.monto,
        P.amortizacion,
        P.saldo,
        P.fechapago,
        P.descripcion,
        P.estado
    FROM pagoscontrato P
    INNER JOIN contratos C ON P.idcontrato = C.idcontrato
    INNER JOIN detalledeempresa DE ON C.iddetalle = DE.iddetalle
    INNER JOIN personas Per ON DE.idpersona = Per.idpersona
    INNER JOIN empresas Emp ON DE.idempresa = Emp.idempresa
    WHERE P.idcontrato = p_contrato AND P.idpago = p_pago;
END */$$
DELIMITER ;

/* Procedure structure for procedure `ListarPersonas` */

/*!50003 DROP PROCEDURE IF EXISTS  `ListarPersonas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarPersonas`()
BEGIN
    SELECT * FROM personas WHERE inactive_at = '0000-00-00';
END */$$
DELIMITER ;

/* Procedure structure for procedure `ListarPlanes` */

/*!50003 DROP PROCEDURE IF EXISTS  `ListarPlanes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarPlanes`()
BEGIN
    SELECT * FROM planes;
END */$$
DELIMITER ;

/* Procedure structure for procedure `ObtenerEmpresas` */

/*!50003 DROP PROCEDURE IF EXISTS  `ObtenerEmpresas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerEmpresas`()
BEGIN
    SELECT e.idempresa, e.razonsocial AS nombre_empresa
    FROM empresas e
    WHERE e.inactive_at = '0000-00-00';
END */$$
DELIMITER ;

/* Procedure structure for procedure `ObtenerEmpresasPorPersona` */

/*!50003 DROP PROCEDURE IF EXISTS  `ObtenerEmpresasPorPersona` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerEmpresasPorPersona`(IN p_idpersona INT)
BEGIN
    SELECT de.iddetalle, p.idpersona, p.apellidos, p.nombres, e.idempresa, e.razonsocial AS nombre_empresa
    FROM personas p
    INNER JOIN detalledeempresa de ON p.idpersona = de.idpersona
    INNER JOIN empresas e ON de.idempresa = e.idempresa
    WHERE p.idpersona = p_idpersona AND de.inactive_at = '0000-00-00';
END */$$
DELIMITER ;

/* Procedure structure for procedure `ObtenerPersonas` */

/*!50003 DROP PROCEDURE IF EXISTS  `ObtenerPersonas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerPersonas`()
BEGIN
    SELECT p.idpersona, CONCAT(p.apellidos, ', ', p.nombres) AS nombre
    FROM personas p
    WHERE p.inactive_at = '0000-00-00';
END */$$
DELIMITER ;

/* Procedure structure for procedure `ObtenerPlanes` */

/*!50003 DROP PROCEDURE IF EXISTS  `ObtenerPlanes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerPlanes`()
BEGIN
    SELECT idplan, nombreplan AS plane
    FROM planes;
END */$$
DELIMITER ;

/* Procedure structure for procedure `RegistrarContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `RegistrarContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarContrato`(
    IN p_usuario INT,
    IN p_detalle INT,
    IN p_servicio INT,
    IN p_plan INT,
    IN p_fechainicio DATE,
    IN p_fechafin DATE,
    IN p_observaciones VARCHAR(60),
    IN p_restriccionpublicidad VARCHAR(30)
)
BEGIN
    INSERT INTO contratos (idusuario, iddetalle, idservicio, idplan, fechainicio, fechafin, observaciones, restriccionpublicidad)
    VALUES (p_usuario, p_detalle, p_servicio, p_plan, p_fechainicio, p_fechafin, p_observaciones, p_restriccionpublicidad);
END */$$
DELIMITER ;

/* Procedure structure for procedure `RegistrarDetalleContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `RegistrarDetalleContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarDetalleContrato`(
    IN p_contrato INT,
    IN p_dia VARCHAR(20),
    IN p_horainicio TIME,
    IN p_fecha DATE,
    IN p_observaciones VARCHAR(80)
)
BEGIN
DECLARE p_duracionspot_plan VARCHAR(20);

    -- Obtener el precio del plan del contrato
    SET p_duracionspot_plan = (SELECT duracionspot FROM planes
                         WHERE idplan = (SELECT idplan FROM contratos WHERE idcontrato = p_contrato));

    INSERT INTO detallecontratos (idcontrato, dia, idplan, horainicio, fecha, observaciones)
    VALUES (p_contrato, p_dia, p_duracionspot_plan, p_horainicio, p_fecha, p_observaciones);
END */$$
DELIMITER ;

/* Procedure structure for procedure `registrardetalledeempresa` */

/*!50003 DROP PROCEDURE IF EXISTS  `registrardetalledeempresa` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `registrardetalledeempresa`(
    IN _idpersona INT,
    IN _idempresa INT
)
BEGIN
    INSERT INTO detalledeempresa(idpersona, idempresa)
    VALUES (_idpersona, _idempresa);
END */$$
DELIMITER ;

/* Procedure structure for procedure `RegistrarPagoContrato` */

/*!50003 DROP PROCEDURE IF EXISTS  `RegistrarPagoContrato` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarPagoContrato`(
    IN p_contrato INT,
    IN p_tipopago VARCHAR(40),
    IN p_monto DECIMAL(10, 2),
    IN p_descripcion VARCHAR(60),
    IN p_estado VARCHAR(15)
)
BEGIN
    DECLARE p_precio_plan DECIMAL(10, 2);
    DECLARE p_amortizacion DECIMAL(10, 2);
    DECLARE p_saldo DECIMAL(10, 2);
    DECLARE p_error BOOLEAN DEFAULT FALSE;

    -- Obtener el precio del plan del contrato
    SET p_precio_plan = (SELECT precio FROM planes
                         WHERE idplan = (SELECT idplan FROM contratos WHERE idcontrato = p_contrato));

    -- Calcular la amortización acumulativa
    SET p_amortizacion = (SELECT COALESCE(SUM(monto), 0) FROM pagoscontrato WHERE idcontrato = p_contrato);
    
    -- Inicializar el saldo con la resta del precio del plan y la amortización
    SET p_saldo = p_precio_plan - (p_amortizacion + p_monto);
    
   

    -- Verificar si el monto del nuevo pago supera la deuda restante
    IF p_saldo < 0 THEN
    SET p_error = TRUE;
    ELSE
      
    -- Establecer el estado
    IF p_saldo > 0 THEN
        SET p_estado = 'Pendiente';
    ELSE
        SET p_estado = 'Completado';
    END IF;


    -- Insertar el nuevo pago con la fecha actual usando CURDATE()
    INSERT INTO pagoscontrato (idcontrato, tipopago, idplan, monto, amortizacion, saldo, fechapago, descripcion, estado)
    VALUES (p_contrato, p_tipopago, p_precio_plan, p_monto, p_amortizacion + p_monto, p_saldo, CURDATE(), p_descripcion, p_estado);
     END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_actualizar_empresas` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_actualizar_empresas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_actualizar_empresas`(
    IN _idempresa       INT,
    IN _razonsocial       VARCHAR(50),
    IN _ruc         CHAR(11),
    IN _direccion   VARCHAR(60)
)
BEGIN 
    UPDATE empresas
    SET 
        razonsocial = _razonsocial,
        ruc = _ruc,
        direccion = _direccion
    WHERE
        idempresa = _idempresa;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_actualizar_personas` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_actualizar_personas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_actualizar_personas`(
    IN _idpersona       INT,
    IN _apellidos       VARCHAR(50),
    IN _nombres         VARCHAR(60),
    IN _tipodocumento   CHAR(1),
    IN _nrodocumento    CHAR(8),
    IN _direccion       VARCHAR(70),
    IN _telefono        CHAR(9)
)
BEGIN 
    UPDATE personas 
    SET 
        apellidos = _apellidos,
        nombres = _nombres,
        tipodocumento = _tipodocumento,
        nrodocumento = _nrodocumento,
        direccion = _direccion,
        telefono = _telefono
    WHERE
        idpersona = _idpersona;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_actualizar_planes` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_actualizar_planes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_actualizar_planes`(
    IN _idplan       INT,
    IN _nombreplan       VARCHAR(50),
    IN _precio         DECIMAL(10, 2),
    IN _duracionspot   VARCHAR(20),
    IN _duracionplan    VARCHAR(20),
    IN _cantanunciosdia       INT,
    IN _descripcion        VARCHAR(80)
)
BEGIN 
    UPDATE planes 
    SET 
        nombreplan = _nombreplan,
        precio = _precio,
        duracionspot = _duracionspot,
        duracionplan = _duracionplan,
        cantanunciosdia = _cantanunciosdia,
        descripcion = _descripcion
    WHERE
        idplan = _idplan;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_eliminar_empresas` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_eliminar_empresas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_eliminar_empresas`(IN p_idempresa INT)
BEGIN
    UPDATE empresas SET inactive_at = NOW() WHERE idempresa = p_idempresa;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_eliminar_personas` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_eliminar_personas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_eliminar_personas`(IN p_idpersona INT)
BEGIN
    UPDATE personas SET inactive_at = NOW() WHERE idpersona = p_idpersona;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_registrar_empresas` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_registrar_empresas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_registrar_empresas`(
    IN _razonsocial VARCHAR(50),
    IN _ruc CHAR(11),
    IN _direccion VARCHAR(60)
)
BEGIN
    INSERT INTO empresas(razonsocial, ruc, direccion)
    VALUES (_razonsocial, _ruc, _direccion);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_registrar_personas` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_registrar_personas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_registrar_personas`(
    IN _apellidos VARCHAR(50),
    IN _nombres VARCHAR(60),
    IN _tipodocumento CHAR(1),
    IN _nrodocumento CHAR(8),
    IN _direccion VARCHAR(70),
    IN _telefono CHAR(9)
)
BEGIN
    INSERT INTO personas(apellidos, nombres, tipodocumento, nrodocumento, direccion, telefono)
    VALUES (_apellidos, _nombres, _tipodocumento, _nrodocumento, _direccion, _telefono);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_registrar_planes` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_registrar_planes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_registrar_planes`(
    IN _nombreplan VARCHAR(50),
    IN _precio DECIMAL(10, 2),
    IN _duracionspot VARCHAR(20),
    IN _duracionplan VARCHAR(20),
    IN _cantanunciosdia INT,
    IN _descripcion VARCHAR(80)
)
BEGIN
    INSERT INTO planes(nombreplan, precio, duracionspot, duracionplan, cantanunciosdia, descripcion)
    VALUES (_nombreplan, _precio, _duracionspot, _duracionplan, _cantanunciosdia, _descripcion);
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_actualizar_clave` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_actualizar_clave` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_actualizar_clave`(
    IN _idusuario INT,
    IN _nombreusuario VARCHAR(50),
    IN _nuevaClave VARCHAR(90)
)
BEGIN
    -- Actualizar solo nombre de usuario
    UPDATE usuarios
    SET nombreusuario = _nombreusuario
    WHERE idusuario = _idusuario;

    -- Actualizar la contraseña si se proporciona
    IF _nuevaClave IS NOT NULL THEN
        UPDATE usuarios
        SET claveacceso = _nuevaClave
        WHERE idusuario = _idusuario;
    END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_usuarios_login` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_usuarios_login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_usuarios_login`(IN _nombreusuario VARCHAR(30))
BEGIN
    SELECT idusuario, nombreusuario, claveacceso, nivelacceso
    FROM usuarios
    WHERE nombreusuario = _nombreusuario;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
