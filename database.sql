/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.1.33-community : Database - db_meli2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_meli2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_meli2`;

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ci_sessions` */

/*Table structure for table `mbranch` */

DROP TABLE IF EXISTS `mbranch`;

CREATE TABLE `mbranch` (
  `cBranchID` varchar(12) NOT NULL DEFAULT '',
  `cBranchDesc` varchar(100) NOT NULL DEFAULT '',
  `cBranchADDR` varchar(100) NOT NULL DEFAULT '',
  `dStock` date NOT NULL,
  `cHP` varchar(20) NOT NULL,
  `cPhone` varchar(20) NOT NULL,
  `cMap` text NOT NULL,
  `cDesc` varchar(250) NOT NULL,
  `cUserID` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`cBranchID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mbranch` */

insert  into `mbranch`(`cBranchID`,`cBranchDesc`,`cBranchADDR`,`dStock`,`cHP`,`cPhone`,`cMap`,`cDesc`,`cUserID`) values ('01','TOKO SURYA MAJU','-','2023-09-01','-','-','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.9297545927743!2d105.376125!3d-5.2736434999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40c18e160f1723%3A0x528e62b929430f53!2sToko%20Baju%20Surya%20Maju!5e0!3m2!1sid!2sid!4v1695025074383!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;width: 100%\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>','','ADMIN');

/*Table structure for table `mgood` */

DROP TABLE IF EXISTS `mgood`;

CREATE TABLE `mgood` (
  `cGoodID` varchar(12) NOT NULL DEFAULT '',
  `cGoodGrpID` varchar(12) NOT NULL,
  `cGoodDesc` varchar(100) NOT NULL DEFAULT '',
  `cUnit` varchar(5) NOT NULL DEFAULT '',
  `cFoto` text NOT NULL,
  `cDesc` text NOT NULL,
  `cUserID` varchar(5) NOT NULL DEFAULT '',
  `nPrice` double NOT NULL,
  `nDisc` double NOT NULL,
  `cStatus` varchar(12) NOT NULL,
  `nStock` double NOT NULL,
  PRIMARY KEY (`cGoodID`),
  KEY `FK_Good1` (`cGoodGrpID`),
  CONSTRAINT `FK_Good1` FOREIGN KEY (`cGoodGrpID`) REFERENCES `mgoodgrp` (`cGoodGrpID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mgood` */

insert  into `mgood`(`cGoodID`,`cGoodGrpID`,`cGoodDesc`,`cUnit`,`cFoto`,`cDesc`,`cUserID`,`nPrice`,`nDisc`,`cStatus`,`nStock`) values ('001','01','PRODUCK 00','SAK','','TEST','ADMIN',0,0,'',0),('002','01','PRODUK 1','BH','','','',0,0,'0',0);

/*Table structure for table `mgoodgrp` */

DROP TABLE IF EXISTS `mgoodgrp`;

CREATE TABLE `mgoodgrp` (
  `cGoodGrpID` varchar(12) NOT NULL,
  `cGoodGrpDesc` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cUserID` varchar(5) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`cGoodGrpID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mgoodgrp` */

insert  into `mgoodgrp`(`cGoodGrpID`,`cGoodGrpDesc`,`cUserID`) values ('01','MINYAK','ADMIN'),('02','BERAS','ADMIN');

/*Table structure for table `mkonsumen` */

DROP TABLE IF EXISTS `mkonsumen`;

CREATE TABLE `mkonsumen` (
  `cKonID` varchar(12) NOT NULL,
  `cKonDesc` varchar(150) DEFAULT NULL,
  `cAlamat` varchar(100) DEFAULT NULL,
  `cHP` varchar(20) DEFAULT NULL,
  `cUserID` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`cKonID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mkonsumen` */

/*Table structure for table `mmenu` */

DROP TABLE IF EXISTS `mmenu`;

CREATE TABLE `mmenu` (
  `cMenuID` varchar(5) NOT NULL DEFAULT '',
  `cMenuDesc` varchar(100) NOT NULL DEFAULT '',
  `cUserID` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`cMenuID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mmenu` */

/*Table structure for table `mranting` */

DROP TABLE IF EXISTS `mranting`;

CREATE TABLE `mranting` (
  `cUserID` varchar(20) NOT NULL,
  `cStockID` varchar(12) NOT NULL,
  `cRanting` double NOT NULL,
  `dDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `mranting` */

/*Table structure for table `mstock` */

DROP TABLE IF EXISTS `mstock`;

CREATE TABLE `mstock` (
  `dStock` date NOT NULL,
  `cStockID` varchar(12) NOT NULL,
  `cGoodID` varchar(12) NOT NULL,
  `nBegQty` double NOT NULL DEFAULT '0',
  `nBegCost` double NOT NULL DEFAULT '0',
  `nCurQty` double NOT NULL DEFAULT '0',
  `nCurCost` double NOT NULL DEFAULT '0',
  `nSale` double NOT NULL DEFAULT '0',
  `cUserID` varchar(5) NOT NULL DEFAULT '',
  `cAktif` varchar(12) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`dStock`,`cStockID`,`cGoodID`),
  KEY `cGoodID` (`cGoodID`),
  CONSTRAINT `mstock_ibfk_1` FOREIGN KEY (`cGoodID`) REFERENCES `mgood` (`cGoodID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mstock` */

insert  into `mstock`(`dStock`,`cStockID`,`cGoodID`,`nBegQty`,`nBegCost`,`nCurQty`,`nCurCost`,`nSale`,`cUserID`,`cAktif`) values ('2022-10-01','STCK001','001',0,0,24,620000,0,'ADMIN','Y'),('2022-10-01','STCK002','002',0,0,24,620000,0,'','Y'),('2022-11-01','STCK001','001',24,620000,69,1940000,0,'ADMIN','Y'),('2022-11-01','STCK002','002',30,450000,69,1940000,0,'ADMIN','Y'),('2022-12-01','STCK001','001',69,1940000,79,2940000,0,'ADMIN','Y'),('2022-12-01','STCK002','002',82,25490000,79,2940000,0,'ADMIN','Y'),('2023-05-01','STCK001','001',79,2940000,79,2940000,0,'','Y'),('2023-05-01','STCK002','002',86,25970000,79,2940000,0,'','Y'),('2023-07-01','STCK001','001',79,2940000,89,3170000,0,'ADMIN','Y'),('2023-07-01','STCK002','002',86,25970000,89,3170000,0,'ADMIN','Y'),('2023-08-01','STCK001','001',89,3170000,89,3170000,0,'','Y'),('2023-08-01','STCK002','002',226,26838000,89,3170000,0,'ADMIN','Y'),('2023-09-01','STCK001','001',89,3170000,109,3570000,0,'ADMIN','Y'),('2023-09-01','STCK002','002',236,27939110,256,28139110,0,'ADMIN','Y');

/*Table structure for table `msupplier` */

DROP TABLE IF EXISTS `msupplier`;

CREATE TABLE `msupplier` (
  `cSupID` varchar(12) NOT NULL DEFAULT '',
  `cSupDesc` varchar(100) NOT NULL DEFAULT '',
  `cAddress` varchar(100) NOT NULL DEFAULT '',
  `cPhone` varchar(20) NOT NULL DEFAULT '',
  `cHP` varchar(20) NOT NULL,
  `cFax` varchar(20) NOT NULL,
  `cUserID` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`cSupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `msupplier` */

insert  into `msupplier`(`cSupID`,`cSupDesc`,`cAddress`,`cPhone`,`cHP`,`cFax`,`cUserID`) values ('001','TOKO JAYA JAYA','FASFAS','34534','345435','345345','ADMIN'),('S001','SUMBER JAYA MAKMUR','BANDAR LAMPUNG','089834098','080983489','07421779','ALDI'),('we','WETFWEF','SDVSDV','SDVSD','SVDSDV','SDVSD','ADMIN');

/*Table structure for table `mulasan` */

DROP TABLE IF EXISTS `mulasan`;

CREATE TABLE `mulasan` (
  `dTgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cStockID` varchar(12) NOT NULL,
  `cDesc` text NOT NULL,
  `cUserID` varchar(20) NOT NULL,
  PRIMARY KEY (`dTgl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `mulasan` */

/*Table structure for table `muser` */

DROP TABLE IF EXISTS `muser`;

CREATE TABLE `muser` (
  `cEmailID` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cPassword` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cName` varchar(30) NOT NULL DEFAULT '',
  `cAddress` varchar(250) NOT NULL,
  `cPhone` varchar(12) NOT NULL,
  `cHP` varchar(12) NOT NULL,
  `cUserGrpID` varchar(5) NOT NULL DEFAULT '',
  `cBranchID` varchar(12) NOT NULL,
  `cTanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cFoto` varchar(250) NOT NULL,
  PRIMARY KEY (`cEmailID`),
  KEY `cBranchID` (`cBranchID`),
  KEY `fk_muser2` (`cUserGrpID`),
  CONSTRAINT `fk_muser1` FOREIGN KEY (`cBranchID`) REFERENCES `mbranch` (`cBranchID`) ON UPDATE CASCADE,
  CONSTRAINT `fk_muser2` FOREIGN KEY (`cUserGrpID`) REFERENCES `musergrp1` (`cUserGrpID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `muser` */

insert  into `muser`(`cEmailID`,`cPassword`,`cName`,`cAddress`,`cPhone`,`cHP`,`cUserGrpID`,`cBranchID`,`cTanggal`,`cFoto`) values ('admin','admin','ALDI NUGROHO','','','','01','01','2022-10-06 11:37:25',''),('kasir','kasir','MICAHEL','','','','03','01','2022-10-11 12:39:30',''),('UMUM','123','UMUM','','','','02','01','2022-10-07 20:58:15','');

/*Table structure for table `musergrp1` */

DROP TABLE IF EXISTS `musergrp1`;

CREATE TABLE `musergrp1` (
  `cUserGrpID` varchar(5) NOT NULL DEFAULT '',
  `cUserGrpDesc` varchar(100) NOT NULL DEFAULT '',
  `cUserID` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`cUserGrpID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `musergrp1` */

insert  into `musergrp1`(`cUserGrpID`,`cUserGrpDesc`,`cUserID`) values ('01','ADMIN','admin'),('02','tem_konsumen','admin'),('03','Kasir','admin');

/*Table structure for table `t_mstock` */

DROP TABLE IF EXISTS `t_mstock`;

CREATE TABLE `t_mstock` (
  `dStock` date NOT NULL,
  `cGoodID` varchar(12) NOT NULL,
  `nBegQty` double NOT NULL DEFAULT '0',
  `nBegCost` double NOT NULL DEFAULT '0',
  `nCurQty` double NOT NULL DEFAULT '0',
  `nCurCost` double NOT NULL DEFAULT '0',
  `nCurAvg` double NOT NULL,
  `nBegAvg` double NOT NULL,
  `cPost` varchar(1) NOT NULL DEFAULT 'T',
  `cUserID` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`dStock`,`cGoodID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_mstock` */

insert  into `t_mstock`(`dStock`,`cGoodID`,`nBegQty`,`nBegCost`,`nCurQty`,`nCurCost`,`nCurAvg`,`nBegAvg`,`cPost`,`cUserID`) values ('2023-09-01','001',89,3170000,89,3170000,0,0,'T',''),('2023-09-01','002',236,27939110,236,27939110,0,0,'T','');

/*Table structure for table `t_mstock2` */

DROP TABLE IF EXISTS `t_mstock2`;

CREATE TABLE `t_mstock2` (
  `cCounterNo` varchar(2) NOT NULL,
  `dStock` date NOT NULL,
  `cGoodID` varchar(12) NOT NULL,
  `nBegQty` double NOT NULL DEFAULT '0',
  `nBegCost` double NOT NULL DEFAULT '0',
  `nCurQty` double NOT NULL DEFAULT '0',
  `nCurCost` double NOT NULL DEFAULT '0',
  `cNoTrx` varchar(12) NOT NULL,
  `cDesc` varchar(100) NOT NULL DEFAULT '',
  `nQtyD` double NOT NULL DEFAULT '0',
  `nQtyK` double NOT NULL DEFAULT '0',
  `nCostD` double NOT NULL DEFAULT '0',
  `nCostK` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_mstock2` */

insert  into `t_mstock2`(`cCounterNo`,`dStock`,`cGoodID`,`nBegQty`,`nBegCost`,`nCurQty`,`nCurCost`,`cNoTrx`,`cDesc`,`nQtyD`,`nQtyK`,`nCostD`,`nCostK`) values ('01','2023-07-01','001',79,2940000,79,2940000,'000000000000','SALDO AWAL',0,0,0,0),('02','2023-07-12','001',0,0,0,0,'2023070002','SUMBER JAYA MAKMUR',10,0,230000,0),('07','2023-07-12','001',0,0,0,0,'2023070001','PENGELUARAN -',0,9,0,320561.82),('07','2023-07-12','002',0,0,0,0,'2023070001','PENGELUARAN -',0,30,0,3562566.3),('07','2023-07-13','002',0,0,0,0,'2023070002','PENGELUARAN -',0,20,0,2375044.2);

/*Table structure for table `t_tbkb2` */

DROP TABLE IF EXISTS `t_tbkb2`;

CREATE TABLE `t_tbkb2` (
  `cUserID` varchar(20) NOT NULL,
  `cStockID` varchar(12) NOT NULL,
  `cSizeID` varchar(12) NOT NULL,
  `nQty` double NOT NULL,
  `nHpp` double NOT NULL,
  `nPrice` double NOT NULL,
  `nCost` double NOT NULL,
  `nCost2` double NOT NULL,
  PRIMARY KEY (`cUserID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_tbkb2` */

/*Table structure for table `tadjstock1` */

DROP TABLE IF EXISTS `tadjstock1`;

CREATE TABLE `tadjstock1` (
  `cAdjStockNo` varchar(12) NOT NULL,
  `cAdjDesc` varchar(100) NOT NULL DEFAULT '',
  `cWhdID` varchar(12) NOT NULL,
  `cCorrID` varchar(12) NOT NULL,
  `nTotQty` double NOT NULL DEFAULT '0',
  `nTotAdj` double NOT NULL DEFAULT '0',
  `dTrx` date NOT NULL,
  `cDK` varchar(1) NOT NULL DEFAULT '',
  `cPost` varchar(1) NOT NULL DEFAULT 'T',
  `cDesc` varchar(100) NOT NULL,
  `cClose` varchar(1) NOT NULL DEFAULT 'T',
  `cUserID` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`cAdjStockNo`),
  KEY `cCorrID` (`cCorrID`),
  CONSTRAINT `tadjstock1_ibfk_1` FOREIGN KEY (`cCorrID`) REFERENCES `mcorrection` (`cCorrID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tadjstock1` */

/*Table structure for table `tadjstock2` */

DROP TABLE IF EXISTS `tadjstock2`;

CREATE TABLE `tadjstock2` (
  `cAdjStockNo` varchar(12) NOT NULL,
  `nNo` decimal(3,0) NOT NULL DEFAULT '0',
  `cGoodID` varchar(12) NOT NULL,
  `nQty` double NOT NULL DEFAULT '0',
  `nPrice` double NOT NULL DEFAULT '0',
  `nAdj` double NOT NULL DEFAULT '0',
  `cDesc` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`cAdjStockNo`,`nNo`,`cGoodID`),
  KEY `cGoodID` (`cGoodID`),
  CONSTRAINT `adj2_fk1` FOREIGN KEY (`cAdjStockNo`) REFERENCES `tadjstock1` (`cAdjStockNo`) ON UPDATE CASCADE,
  CONSTRAINT `adj2_fk2` FOREIGN KEY (`cGoodID`) REFERENCES `mgood` (`cGoodID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tadjstock2` */

/*Table structure for table `tbkb1` */

DROP TABLE IF EXISTS `tbkb1`;

CREATE TABLE `tbkb1` (
  `cBKBNo` varchar(12) NOT NULL,
  `dTrx` date NOT NULL,
  `cKonID` varchar(20) NOT NULL DEFAULT '0',
  `cStatus` varchar(20) NOT NULL,
  `nOA` double NOT NULL,
  `cClose` varchar(1) NOT NULL DEFAULT 'T',
  `cBayar` varchar(20) NOT NULL,
  `cGambar` text NOT NULL,
  `cDesc` varchar(100) NOT NULL,
  `cUserID` varchar(12) NOT NULL DEFAULT '',
  PRIMARY KEY (`cBKBNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbkb1` */

insert  into `tbkb1`(`cBKBNo`,`dTrx`,`cKonID`,`cStatus`,`nOA`,`cClose`,`cBayar`,`cGambar`,`cDesc`,`cUserID`) values ('2022100001','2022-10-07','UMUM','Tunggu',0,'T','BELUM','','','ADMIN'),('2022100002','2022-10-07','UMUM','Setuju',100000,'Y','SUDAH','','TEST','ADMIN'),('2022120001','2022-12-13','UMUM','Setuju',1000,'T','BELUM','','','ADMIN'),('2023070001','2023-07-12','UMUM','Setuju',10000,'Y','SUDAH','','-','ADMIN'),('2023070002','2023-07-13','UMUM','Setuju',0,'T','SUDAH','','-','KASIR');

/*Table structure for table `tbkb2` */

DROP TABLE IF EXISTS `tbkb2`;

CREATE TABLE `tbkb2` (
  `cBKBNo` varchar(12) NOT NULL,
  `nNo` decimal(3,0) NOT NULL DEFAULT '0',
  `cStockID` varchar(12) NOT NULL,
  `nQty` double NOT NULL DEFAULT '0',
  `nHpp` double NOT NULL,
  `nPrice` double NOT NULL DEFAULT '0',
  `nCost` double NOT NULL DEFAULT '0',
  `nCost2` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`cBKBNo`,`nNo`,`cStockID`),
  CONSTRAINT `bkb_fk1` FOREIGN KEY (`cBKBNo`) REFERENCES `tbkb1` (`cBKBNo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbkb2` */

insert  into `tbkb2`(`cBKBNo`,`nNo`,`cStockID`,`nQty`,`nHpp`,`nPrice`,`nCost`,`nCost2`) values ('2022100001',1,'STCK001',2,25000,30000,60000,50000),('2022100002',1,'STCK001',2,25909.09,31090.8,62181.6,51818.18),('2022120001',1,'STCK002',1,301976.74,362372.4,362372.4,301976.74),('2023070001',1,'STCK001',9,35617.98,42741.6,384674.4,320561.82),('2023070001',2,'STCK002',30,118752.21,142502.4,4275072,3562566.3),('2023070002',1,'STCK002',20,118752.21,142502.4,2850048,2375044.2);

/*Table structure for table `tbmb1` */

DROP TABLE IF EXISTS `tbmb1`;

CREATE TABLE `tbmb1` (
  `cBMBNo` varchar(12) NOT NULL,
  `dTrx` date NOT NULL,
  `cSupID` varchar(12) NOT NULL,
  `cDesc` varchar(250) NOT NULL,
  `cClose` varchar(12) NOT NULL DEFAULT 'T',
  `cUserID` varchar(5) NOT NULL,
  PRIMARY KEY (`cBMBNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbmb1` */

insert  into `tbmb1`(`cBMBNo`,`dTrx`,`cSupID`,`cDesc`,`cClose`,`cUserID`) values ('2022100001','2022-10-07','001','TEST','T','ADMIN'),('2022100002','2022-10-07','001','','Y','KASIR'),('2022110001','2022-11-05','001','','Y','ADMIN'),('2022110002','2022-11-05','S001','TEST123','Y','ADMIN'),('2022120001','2022-12-13','S001','','T','ADMIN'),('2023070001','2023-07-12','we','-','T','ADMIN'),('2023070002','2023-07-12','S001','','Y','ADMIN'),('2023080001','2023-08-11','001','TEST','Y','ADMIN'),('2023090001','2023-09-18','001','-','Y','ADMIN');

/*Table structure for table `tbmb2` */

DROP TABLE IF EXISTS `tbmb2`;

CREATE TABLE `tbmb2` (
  `cBMBNo` varchar(12) NOT NULL,
  `nNo` int(11) NOT NULL,
  `cGoodID` varchar(12) NOT NULL,
  `nQty` double NOT NULL,
  `nPrice` double NOT NULL,
  `nCost` double NOT NULL,
  PRIMARY KEY (`cBMBNo`,`nNo`,`cGoodID`),
  CONSTRAINT `tbmb2_ibfk_1` FOREIGN KEY (`cBMBNo`) REFERENCES `tbmb1` (`cBMBNo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbmb2` */

insert  into `tbmb2`(`cBMBNo`,`nNo`,`cGoodID`,`nQty`,`nPrice`,`nCost`) values ('2022100001',1,'001',20,25000,500000),('2022100001',2,'002',30,15000,450000),('2022100002',1,'001',4,30000,120000),('2022110001',1,'002',50,500000,25000000),('2022110001',2,'001',40,18000,720000),('2022110002',1,'002',2,20000,40000),('2022110002',2,'001',5,120000,600000),('2022120001',1,'001',10,100000,1000000),('2022120001',2,'002',4,120000,480000),('2023070001',1,'002',20,29000,580000),('2023070002',1,'001',10,23000,230000),('2023070002',2,'002',120,2400,288000),('2023080001',1,'002',10,110111,1101110),('2023090001',1,'001',20,20000,400000),('2023090001',2,'002',20,10000,200000);

/* Trigger structure for table `tbkb2` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `bkb_i` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `bkb_i` AFTER INSERT ON `tbkb2` FOR EACH ROW BEGIN
	DECLARE dStok DATE;
	DECLARE UserID VARCHAR(5);
    
	SET dStok = (SELECT DATE_FORMAT(dTrx,'%Y-%m-01') FROM `tbkb1` WHERE `cBKBNo` = NEW.cBKBNo),
	UserID = (SELECT cUserID FROM tbkb1 WHERE cBKBNo = NEW.cBKBNo);
	
	
	UPDATE mstock SET nCurQty = nCurQty - NEW.nQty, nCurCost = nCurCost - NEW.nCost2
	WHERE cStockID = NEW.cStockID AND dStock = dStok;
	
	
    END */$$


DELIMITER ;

/* Trigger structure for table `tbkb2` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `bkb_U` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `bkb_U` AFTER UPDATE ON `tbkb2` FOR EACH ROW BEGIN
	DECLARE dStok DATE;
	DECLARE dStok2 DATE;
	DECLARE UserID VARCHAR(5);
    
	SET dStok = (SELECT DATE_FORMAT(dTrx,'%Y-%m-01') FROM `tbkb1` WHERE `cBKBNo` = OLD.cBKBNo),
	UserID = (SELECT cUserID FROM tbkb1 WHERE cBKBNo = OLD.cBKBNo);
	SET dStok2 = (SELECT DATE_FORMAT(dTrx,'%Y-%m-01') FROM `tbkb1` WHERE `cBKBNo` = NEW.cBKBNo);
	
	
	UPDATE mstock SET nCurQty = nCurQty + OLD.nQty, nCurCost = nCurCost + OLD.nCost2
	WHERE cStockID = OLD.cStockID AND dStock = dStok;
	
	UPDATE mstock SET nCurQty = nCurQty - NEW.nQty, nCurCost = nCurCost - NEW.nCost2
	WHERE cStockID = NEW.cStockID AND dStock = dStok2;
	
	
    END */$$


DELIMITER ;

/* Trigger structure for table `tbkb2` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `bkb_d` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `bkb_d` AFTER DELETE ON `tbkb2` FOR EACH ROW BEGIN
	DECLARE dStok DATE;
	DECLARE UserID VARCHAR(5);
    
	SET dStok = (SELECT DATE_FORMAT(dTrx,'%Y-%m-01') FROM `tbkb1` WHERE `cBKBNo` = OLD.cBKBNo),
	UserID = (SELECT cUserID FROM tbkb1 WHERE cBKBNo = OLD.cBKBNo);
	
	UPDATE mstock SET nCurQty = nCurQty + OLD.nQty, nCurCost = nCurCost + OLD.nCost2
	WHERE cStockID = OLD.cStockID AND dStock = dStok;
	
	
    END */$$


DELIMITER ;

/* Trigger structure for table `tbmb2` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `bmb_i` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `bmb_i` AFTER INSERT ON `tbmb2` FOR EACH ROW BEGIN
	DECLARE STOCKID varchar(20);
	DECLARE dStok DATE;
	DECLARE UserID VARCHAR(5);
    
	set STOCKID = CONCAT("STCK",NEW.cGoodID);
	SET dStok = (SELECT DATE_FORMAT(dTrx,'%Y-%m-01') FROM tbmb1 WHERE cBMBNo = NEW.cBMBNo),
	UserID = (SELECT cUserID FROM tbmb1 WHERE cBMBNo = NEW.cBMBNo);
	
	
	IF EXISTS (SELECT cGoodID FROM mstock WHERE cGoodID = NEW.cGoodID AND dStock = dStok) THEN
		UPDATE mstock SET nCurQty = nCurQty + NEW.nQty, nCurCost = nCurCost + NEW.nCost, cUserID = UserID 
			WHERE cGoodID = NEW.cGoodID AND dStock = dStok;
	 ELSE
		-- INSERT INTO mstock VALUES (dStok,cWhdID1,NEW.cGoodID,0,0,NEW.nQty,NEW.nCost,'T',UserID);
		INSERT INTO mstock VALUES (dStok,STOCKID,NEW.cGoodID,0,0,NEW.nQty,NEW.nCost,0,"",'Y');
	END IF;
	
    END */$$


DELIMITER ;

/* Trigger structure for table `tbmb2` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `bmb_u` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `bmb_u` AFTER UPDATE ON `tbmb2` FOR EACH ROW BEGIN
	DECLARE STOCKID varchar(20);
	DECLARE STOCKID2 VARCHAR(20);
	DECLARE dStok DATE;
	DECLARE UserID VARCHAR(5);
	
	set STOCKID = CONCAT("STCK",NEW.cGoodID);
	SET STOCKID2 = CONCAT("STCK",OLD.cGoodID);
	SET dStok = (SELECT DATE_FORMAT(dTrx,'%Y-%m-01') FROM tbmb1 WHERE cBMBNo = OLD.cBMBNo),
	UserID = (SELECT cUserID FROM tbmb1 WHERE cBMBNo = OLD.cBMBNo);
	
	UPDATE mstock SET nCurQty = nCurQty - OLD.nQty, nCurCost = nCurCost - OLD.nCost
	WHERE cStockID = STOCKID2 AND dStock = dStok;
	
	UPDATE mstock SET nCurQty = nCurQty + NEW.nQty, nCurCost = nCurCost + NEW.nCost
	WHERE cStockID = STOCKID AND dStock = dStok;
	
	
    END */$$


DELIMITER ;

/* Trigger structure for table `tbmb2` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `bmb_d` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `bmb_d` AFTER DELETE ON `tbmb2` FOR EACH ROW BEGIN
	DECLARE STOCKID VARCHAR(20);
	DECLARE dStok DATE;
	DECLARE UserID VARCHAR(5);
    
	SET STOCKID = CONCAT("STCK",OLD.cGoodID);
	SET dStok = (SELECT DATE_FORMAT(dTrx,'%Y-%m-01') FROM tbmb1 WHERE cBMBNo = OLD.cBMBNo),
	UserID = (SELECT cUserID FROM tbmb1 WHERE cBMBNo = OLD.cBMBNo);
	
	IF EXISTS (SELECT `cStockID` FROM mstock WHERE cStockID = STOCKID) THEN
	UPDATE mstock SET nCurQty = nCurQty - OLD.nQty, nCurCost = nCurCost - OLD.nCost
	WHERE cStockID = STOCKID AND dStock = dStok;
--	ELSE
--	INSERT INTO mstock VALUES (format(NOW(),'%Y-%m-01'),STOCKID,OLD.cGoodID,0,0,OLD.nQty,OLD.nCost,0,"",'Y');
	END IF;
	
    END */$$


DELIMITER ;

/* Procedure structure for procedure `card_stock_monthly` */

/*!50003 DROP PROCEDURE IF EXISTS  `card_stock_monthly` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `card_stock_monthly`(dReport INT, GoodID1 INT, GoodID2 INT)
BEGIN
	DECLARE NoTrx VARCHAR(12);
	declare GOODCOT varchar(12);
	set GOODCOT = CONCAT('STCK',GoodID1);
	DELETE FROM t_mstock2;
	
	
	INSERT INTO t_mstock2 (dStock,cGoodID,nBegQty,nBegCost,cCounterNo,cNoTrx,cDesc) 
	SELECT dStock,cGoodID,nBegQty,nBegCost,'01','000000000000','SALDO AWAL' FROM mstock 
	WHERE DATE_FORMAT(dStock,'%Y%m') = dReport AND cGoodID = GoodID1;
	
	UPDATE t_mstock2 SET nCurQty = nBegQty, nCurCost = nBegCost 
	WHERE cCounterNo = '01' AND DATE_FORMAT(dStock,'%Y%m') = dReport;
	
	
	INSERT INTO t_mstock2 (dStock,cGoodID,nQtyD,nCostD,cNoTrx,cDesc,cCounterNo) 
	SELECT tbmb1.dTrx,tbmb2.cGoodID,tbmb2.nQty,tbmb2.nCost,tbmb2.cBMBNo,msupplier.cSupDesc,'02' FROM tbmb2 JOIN tbmb1 ON(tbmb2.cBMBNo = tbmb1.cBMBNo) JOIN msupplier ON(tbmb1.cSupID = msupplier.cSupID)
	WHERE DATE_FORMAT(tbmb1.dTrx,'%Y%m') = dReport AND tbmb2.cGoodID = GoodID1;
	
	
	INSERT INTO t_mstock2 (dStock,cGoodID,nQtyK,nCostK,cNoTrx,cDesc,cCounterNo) 
	SELECT tbkb1.dTrx,SUBSTR(tbkb2.`cStockID`,5),tbkb2.nQty,tbkb2.nCost2,tbkb2.cBKBNo,CONCAT('PENGELUARAN ',`tbkb1`.`cDesc`),'07' FROM tbkb2 JOIN tbkb1 ON(tbkb2.cBKBNo = tbkb1.cBKBNo)
	WHERE DATE_FORMAT(tbkb1.dTrx,'%Y%m') = dReport AND tbkb2.`cStockID` = GoodID2;
	
	SELECT t_mstock2.dStock, t_mstock2.cNoTrx, t_mstock2.cDesc, t_mstock2.cGoodID, mgood.cGoodDesc, mgood.cUnit, t_mstock2.nQtyD,(t_mstock2.nCostD/t_mstock2.nQtyD) AS nRataD,t_mstock2.nCostD, t_mstock2.nQtyK, (t_mstock2.nCostK/t_mstock2.nQtyK) AS nRataK, t_mstock2.nCostK, t_mstock2.nCurQty, t_mstock2.nCurCost,
	CASE WHEN t_mstock2.cNoTrx='000000000000' THEN @saldo1:=t_mstock2.nCurQty + t_mstock2.nQtyD - t_mstock2.nQtyK 
	ELSE ROUND(@saldo1:=@saldo1 + t_mstock2.nQtyD - t_mstock2.nQtyK,2) END saldo1,
	CASE WHEN t_mstock2.cNoTrx='000000000000' THEN @saldo2:=t_mstock2.nCurCost + t_mstock2.nCostD - t_mstock2.nCostK 
	ELSE @saldo2:=@saldo2+t_mstock2.nCostD - t_mstock2.nCostK END saldo2,
	(@saldo2/ROUND(@saldo1,2)) AS nRataS	
	FROM t_mstock2 JOIN mgood ON(t_mstock2.cGoodID = mgood.cGoodID) JOIN (SELECT @saldo1:= 0,@saldo2:= 0) a 
	WHERE DATE_FORMAT(t_mstock2.dStock,'%Y%m') = dReport AND t_mstock2.cGoodID = GoodID1 ORDER BY t_mstock2.dStock,t_mstock2.cCounterNo,t_mstock2.cNoTrx ASC;
	
	
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `grafik` */

/*!50003 DROP PROCEDURE IF EXISTS  `grafik` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `grafik`(StockID varchar(12),tahun varchar(12))
BEGIN
     
SELECT
IFNULL((SELECT IFNULL(SUM(nQty),0) FROM tbkb2 
JOIN tbkb1 ON(`tbkb1`.`cBKBNo` = `tbkb2`.`cBKBNo`)
WHERE cStockID = StockID AND YEAR(`tbkb1`.`dTrx`)= tahun AND MONTH(`tbkb1`.`dTrx`)="01"),0) AS Jan,
IFNULL((SELECT IFNULL(SUM(nQty),0) FROM tbkb2 
JOIN tbkb1 ON(`tbkb1`.`cBKBNo` = `tbkb2`.`cBKBNo`)
WHERE cStockID = StockID AND YEAR(`tbkb1`.`dTrx`)= tahun AND MONTH(`tbkb1`.`dTrx`)="02"),0) AS Feb,
IFNULL((SELECT IFNULL(SUM(nQty),0) FROM tbkb2 
JOIN tbkb1 ON(`tbkb1`.`cBKBNo` = `tbkb2`.`cBKBNo`)
WHERE cStockID = StockID AND YEAR(`tbkb1`.`dTrx`)= tahun AND MONTH(`tbkb1`.`dTrx`)="03"),0) AS Mart,
IFNULL((SELECT IFNULL(SUM(nQty),0) FROM tbkb2 
JOIN tbkb1 ON(`tbkb1`.`cBKBNo` = `tbkb2`.`cBKBNo`)
WHERE cStockID = StockID AND YEAR(`tbkb1`.`dTrx`)= tahun AND MONTH(`tbkb1`.`dTrx`)="04"),0) AS Apr,
IFNULL((SELECT IFNULL(SUM(nQty),0) FROM tbkb2 
JOIN tbkb1 ON(`tbkb1`.`cBKBNo` = `tbkb2`.`cBKBNo`)
WHERE cStockID = StockID AND YEAR(`tbkb1`.`dTrx`)= tahun AND MONTH(`tbkb1`.`dTrx`)="05"),0) AS Mei,
IFNULL((SELECT IFNULL(SUM(nQty),0) FROM tbkb2 
JOIN tbkb1 ON(`tbkb1`.`cBKBNo` = `tbkb2`.`cBKBNo`)
WHERE cStockID = StockID AND YEAR(`tbkb1`.`dTrx`)= tahun AND MONTH(`tbkb1`.`dTrx`)="06"),0) AS Jun,
IFNULL((SELECT IFNULL(SUM(nQty),0) FROM tbkb2 
JOIN tbkb1 ON(`tbkb1`.`cBKBNo` = `tbkb2`.`cBKBNo`)
WHERE cStockID = StockID AND YEAR(`tbkb1`.`dTrx`)= tahun AND MONTH(`tbkb1`.`dTrx`)="07"),0) AS Jul,
IFNULL((SELECT IFNULL(SUM(nQty),0) FROM tbkb2 
JOIN tbkb1 ON(`tbkb1`.`cBKBNo` = `tbkb2`.`cBKBNo`)
WHERE cStockID = StockID AND YEAR(`tbkb1`.`dTrx`)= tahun AND MONTH(`tbkb1`.`dTrx`)="08"),0) AS Ags,
IFNULL((SELECT IFNULL(SUM(nQty),0) FROM tbkb2 
JOIN tbkb1 ON(`tbkb1`.`cBKBNo` = `tbkb2`.`cBKBNo`)
WHERE cStockID = StockID AND YEAR(`tbkb1`.`dTrx`)= tahun AND MONTH(`tbkb1`.`dTrx`)="09"),0) AS Sep,
IFNULL((SELECT IFNULL(SUM(nQty),0) FROM tbkb2 
JOIN tbkb1 ON(`tbkb1`.`cBKBNo` = `tbkb2`.`cBKBNo`)
WHERE cStockID = StockID AND YEAR(`tbkb1`.`dTrx`)= tahun AND MONTH(`tbkb1`.`dTrx`)="10"),0) AS Okt,
IFNULL((SELECT IFNULL(SUM(nQty),0) FROM tbkb2 
JOIN tbkb1 ON(`tbkb1`.`cBKBNo` = `tbkb2`.`cBKBNo`)
WHERE cStockID = StockID AND YEAR(`tbkb1`.`dTrx`)= tahun AND MONTH(`tbkb1`.`dTrx`)="11"),0) AS Nov,
IFNULL((SELECT IFNULL(SUM(nQty),0) FROM tbkb2 
JOIN tbkb1 ON(`tbkb1`.`cBKBNo` = `tbkb2`.`cBKBNo`)
WHERE cStockID = StockID AND YEAR(`tbkb1`.`dTrx`)= tahun AND MONTH(`tbkb1`.`dTrx`)="12"),0) AS Des;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `laporan1` */

/*!50003 DROP PROCEDURE IF EXISTS  `laporan1` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `laporan1`(report1 varchar(12),report2 VARCHAR(12))
BEGIN
	select * from `v_pembelian` where dTrx >= report1 AND  dTrx <= report2;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `laporan2` */

/*!50003 DROP PROCEDURE IF EXISTS  `laporan2` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `laporan2`(report1 varchar(12),report2 VARCHAR(12))
BEGIN
	select * from `v_penjualan` where dTrx >= report1 AND  dTrx <= report2;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `proc_stok` */

/*!50003 DROP PROCEDURE IF EXISTS  `proc_stok` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_stok`(
	IN `dSys2` DATE,
	IN `BranchID` VARCHAR(12)
    )
BEGIN
	SET @date_branch := (SELECT DATE_FORMAT(dStock,'%Y%m') FROM mbranch WHERE cBranchID = BranchID);
	
	DELETE FROM t_mstock;
	
	INSERT INTO t_mstock (dStock,cGoodID,`nBegQty`,nBegCost,`nCurQty`,nCurCost) 
	SELECT dStock,cGoodID,`nBegQty`,nBegCost,`nCurQty`,nCurCost FROM mstock
	WHERE DATE_FORMAT(dStock,'%Y%m') = @date_branch;
	
	UPDATE t_mstock SET nCurCost = nBegCost,`nCurQty` = `nBegQty` WHERE DATE_FORMAT(dStock,'%Y%m') = @date_branch;
	
	
	-- ==================================update QTY & PRICE FROM BMB=======================================================
	UPDATE t_mstock SET nCurQty = nCurQty + IFNULL((SELECT SUM(nQty) FROM tbmb2 JOIN tbmb1 ON(tbmb2.cBMBNo = tbmb1.cBMBNo)
	WHERE tbmb2.cGoodID = t_mstock.cGoodID AND DATE_FORMAT(tbmb1.dTrx,'%Y%m') = @date_branch 
		GROUP BY tbmb2.cGoodID),0), 
	nCurCost = nCurCost + IFNULL((SELECT SUM(nCost) FROM tbmb2 JOIN tbmb1 ON(tbmb2.cBMBNo = tbmb1.cBMBNo) 
	WHERE tbmb2.cGoodID = t_mstock.cGoodID AND DATE_FORMAT(tbmb1.dTrx,'%Y%m') = @date_branch 
		GROUP BY tbmb2.cGoodID),0);
		
	
	-- ====================================pengeluaran BKB====================================	
	UPDATE t_mstock2 SET nCurQty = nCurQty + IFNULL((SELECT SUM(nQty) FROM tbkb2 JOIN tbkb1 ON(tbkb2.cBKBNo = tbkb1.cBKBNo)
	WHERE SUBSTRING(tbkb2.cStockID,5) = t_mstock2.cGoodID AND DATE_FORMAT(tbkb1.dTrx,'%Y%m') = @date_branch 
		GROUP BY SUBSTRING(tbkb2.cStockID,5)),0), 
	nCurCost = nCurCost + IFNULL((SELECT SUM(nCost) FROM tbkb2 JOIN tbkb1 ON(tbkb2.cBKBNo = tbkb1.cBKBNo) 
	WHERE SUBSTRING(tbkb2.`cStockID`,5) = t_mstock2.cGoodID AND DATE_FORMAT(tbkb1.dTrx,'%Y%m') = @date_branch 
		GROUP BY SUBSTRING(tbkb2.cStockID,5)),0);
		
	
	
	-- ================================ hitung ulang saldo mstock akhir bulan bersajalan===========================
	UPDATE mstock JOIN t_mstock ON(mstock.`dStock`=t_mstock.`dStock`) 
	SET mstock.nCurCost = t_mstock.nCurCost,mstock.`nCurQty` = t_mstock.nCurQty
	WHERE DATE_FORMAT(mstock.dStock,'%Y%m') = @date_branch;
	
	-- t_mstock temporary ubah tanggal dan create saldo awal untuk bulan selanjutnya
	UPDATE t_mstock SET nBegCost = nCurCost, `nBegQty` = nCurQty, dStock = dSys2 
	WHERE DATE_FORMAT(dStock,'%Y%m') = @date_branch;
	
	-- insert ke mstck untuk buat saldo awal
	INSERT INTO mstock (dStock,`cStockID`,`cGoodID`,`nBegQty`,nBegCost,`nCurQty`,nCurCost) 
	SELECT dStock,CONCAT("STCK",cGoodID),`cGoodID`,`nBegQty`,nBegCost,`nCurQty`,nCurCost FROM t_mstock;
		
	
	UPDATE mbranch SET dStock = DATE_FORMAT(dSys2,'%Y-%m-01') WHERE cBranchID = BranchID;
	
	UPDATE mstock SET dStock = (SELECT DATE_FORMAT(dStock,'%Y-%m-01') FROM mbranch WHERE cBranchID = BranchID) 
	WHERE DATE_FORMAT(dStock,'%Y%m') = (SELECT DATE_FORMAT(dStock,'%Y%m') FROM mbranch WHERE cBranchID = BranchID);
	
	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `stock_monthly` */

/*!50003 DROP PROCEDURE IF EXISTS  `stock_monthly` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `stock_monthly`(
	IN `dReport` INT
)
BEGIN
SELECT RTRIM(mstock.cGoodID) AS Kode, SUM(mstock.nBegQty) AS Saldo_Awal_Qty, SUM(mstock.nBegCost) AS Saldo_Awal_Cost, SUM(mstock.nCurQty), SUM(mstock.nCurCost) AS SaldoAkhirCost,
IFNULL(SUM(mstock.nBegCost) / SUM(mstock.nBegQty),0) AS RATA2_SALDO_AWAL_RP, 
IFNULL(SUM(mstock.nCurCost) / SUM(mstock.nCurQty),0) AS RATA2_SALDO_AKHIR_RP,
IFNULL((SELECT cGoodDesc FROM mgood 
WHERE mgood.cGoodID = mstock.cGoodID),'') AS Nama_Barang,
IFNULL((SELECT cUnit FROM mgood 
WHERE mgood.cGoodID = mstock.cGoodID),'') AS Satuan,
IFNULL((SELECT SUM(tbmb2.nQty) FROM tbmb2 JOIN tbmb1 ON(tbmb2.cBMBNo = tbmb1.cBMBNo)
WHERE tbmb2.cGoodID = mstock.cGoodID AND DATE_FORMAT(tbmb1.dTrx,'%Y%m') = dReport GROUP BY tbmb2.cGoodID),0) AS BMB_P,
IFNULL((SELECT SUM(tbmb2.nCost) FROM tbmb2 JOIN tbmb1 ON(tbmb2.cBMBNo = tbmb1.cBMBNo) 
WHERE tbmb2.cGoodID = mstock.cGoodID AND DATE_FORMAT(tbmb1.dTrx,'%Y%m') = dReport GROUP BY tbmb2.cGoodID),0) AS TOT_BMB_P,
IFNULL((SELECT SUM(tbmb2.nCost) / SUM(tbmb2.nQty) FROM tbmb2 JOIN tbmb1 ON(tbmb2.cBMBNo = tbmb1.cBMBNo) 
WHERE tbmb2.cGoodID = mstock.cGoodID AND DATE_FORMAT(tbmb1.dTrx,'%Y%m') = dReport GROUP BY tbmb2.cGoodID),0) AS RATA2_BMB_P,
IFNULL((SELECT SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'D' AND tadjstock1.cCorrID = '11' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS RET_PAKAI,
IFNULL((SELECT SUM(tadjstock2.nAdj) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'D' AND tadjstock1.cCorrID = '11' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS TOT_RET_PAKAI,
IFNULL((SELECT SUM(tadjstock2.nAdj) / SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'D' AND tadjstock1.cCorrID = '11' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS RATA2_RET_PAKAI,
IFNULL((SELECT SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'D' AND tadjstock1.cCorrID = '21' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS DLL_D,
IFNULL((SELECT SUM(tadjstock2.nAdj) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'D' AND tadjstock1.cCorrID = '21' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS TOT_DLL_D,
IFNULL((SELECT SUM(tadjstock2.nAdj) / SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'D' AND tadjstock1.cCorrID = '21' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS RATA2_DLL_D,
IFNULL((SELECT SUM(tbkb2.nQty) FROM tbkb2 JOIN tbkb1 ON(tbkb2.cBKBNo = tbkb1.cBKBNo) 
WHERE tbkb2.`cStockID` = CONCAT('STCK',mstock.cGoodID)  AND DATE_FORMAT(tbkb1.dTrx,'%Y%m') = dReport GROUP BY `tbkb2`.`cStockID`),0) AS BKB_I,
IFNULL((SELECT SUM(tbkb2.nCost) FROM tbkb2 JOIN tbkb1 ON(tbkb2.cBKBNo = tbkb1.cBKBNo) 
WHERE tbkb2.`cStockID` = CONCAT('STCK',mstock.cGoodID) AND DATE_FORMAT(tbkb1.dTrx,'%Y%m') = dReport GROUP BY tbkb2.`cStockID`),0) AS TOT_BKB_I,
IFNULL((SELECT SUM(tbkb2.nCost) / SUM(tbkb2.nQty) FROM tbkb2 JOIN tbkb1 ON(tbkb2.cBKBNo = tbkb1.cBKBNo) 
WHERE tbkb2.`cStockID` = CONCAT('STCK',mstock.cGoodID) AND DATE_FORMAT(tbkb1.dTrx,'%Y%m') = dReport GROUP BY tbkb2.`cStockID`),0) AS RATA2_BKB_I,
IFNULL((SELECT SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND tadjstock1.cCorrID = '01' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS RET_BELI,
IFNULL((SELECT SUM(tadjstock2.nPrice) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND tadjstock1.cCorrID = '01' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS HARGA_RET_BELI,
IFNULL((SELECT SUM(tadjstock2.nAdj) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND tadjstock1.cCorrID = '01' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS TOT_RET_BELI,
IFNULL((SELECT SUM(tadjstock2.nAdj) / SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND tadjstock1.cCorrID = '01' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS RATA2_RET_BELI,
IFNULL((SELECT SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND tadjstock1.cCorrID = '21' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS DLL_K,
IFNULL((SELECT SUM(tadjstock2.nPrice) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND tadjstock1.cCorrID = '21' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS HARGA_DLL_K,
IFNULL((SELECT SUM(tadjstock2.nAdj) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND tadjstock1.cCorrID = '21' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS TOT_DLL_K,
IFNULL((SELECT SUM(tadjstock2.nAdj) / SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND tadjstock1.cCorrID = '21' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) AS RATA2_DLL_K,
SUM(mstock.nBegQty) + 
IFNULL((SELECT SUM(tbmb2.nQty) FROM tbmb2 JOIN tbmb1 ON(tbmb2.cBMBNo = tbmb1.cBMBNo) 
WHERE tbmb2.cGoodID = mstock.cGoodID AND DATE_FORMAT(tbmb1.dTrx,'%Y%m') = dReport GROUP BY tbmb2.cGoodID),0) +
IFNULL((SELECT SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'D' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) -
IFNULL((SELECT SUM(tbkb2.nQty) FROM tbkb2 JOIN tbkb1 ON(tbkb2.cBKBNo = tbkb1.cBKBNo) 
WHERE tbkb2.`cStockID` = CONCAT('STCK',mstock.cGoodID) AND DATE_FORMAT(tbkb1.dTrx,'%Y%m') = dReport GROUP BY tbkb2.`cStockID`),0) -
IFNULL((SELECT SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0)
AS Saldo_Akhir_Qty,
SUM(mstock.nBegCost) +
IFNULL((SELECT SUM(tbmb2.nCost) FROM tbmb2 JOIN tbmb1 ON(tbmb2.cBMBNo = tbmb1.cBMBNo) 
WHERE tbmb2.cGoodID = mstock.cGoodID AND DATE_FORMAT(tbmb1.dTrx,'%Y%m') = dReport GROUP BY tbmb2.cGoodID),0) +
IFNULL((SELECT SUM(tadjstock2.nAdj) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'D' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0) -
IFNULL((SELECT SUM(tbkb2.nCost) FROM tbkb2 JOIN tbkb1 ON(tbkb2.cBKBNo = tbkb1.cBKBNo) 
WHERE tbkb2.`cStockID` = CONCAT('STCK',mstock.cGoodID) AND DATE_FORMAT(tbkb1.dTrx,'%Y%m') = dReport GROUP BY tbkb2.`cStockID`),0) -
IFNULL((SELECT SUM(tadjstock2.nAdj) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0)
AS Saldo_Akhir_Cost,
IFNULL((SELECT SUM(tbmb2.nQty) FROM tbmb2 JOIN tbmb1 ON(tbmb2.cBMBNo = tbmb1.cBMBNo) 
WHERE tbmb2.cGoodID = mstock.cGoodID AND DATE_FORMAT(tbmb1.dTrx,'%Y%m') = dReport GROUP BY tbmb2.cGoodID),0) +
IFNULL((SELECT SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'D' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0)
AS TOT_DEBET,
IFNULL((IFNULL((SELECT SUM(tbmb2.nCost) FROM tbmb2 JOIN tbmb1 ON(tbmb2.cBMBNo = tbmb1.cBMBNo) 
WHERE tbmb2.cGoodID = mstock.cGoodID AND DATE_FORMAT(tbmb1.dTrx,'%Y%m') = dReport GROUP BY tbmb2.cGoodID),0) +
IFNULL((SELECT SUM(tadjstock2.nAdj) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'D' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0))
/
(IFNULL((SELECT SUM(tbmb2.nQty) FROM tbmb2 JOIN tbmb1 ON(tbmb2.cBMBNo = tbmb1.cBMBNo) 
WHERE tbmb2.cGoodID = mstock.cGoodID AND DATE_FORMAT(tbmb1.dTrx,'%Y%m') = dReport GROUP BY tbmb2.cGoodID),0) +
IFNULL((SELECT SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'D' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0)),0) 
AS RATA2_TOT_DEBET,
IFNULL((SELECT SUM(tbmb2.nCost) FROM tbmb2 JOIN tbmb1 ON(tbmb2.cBMBNo = tbmb1.cBMBNo) 
WHERE tbmb2.cGoodID = mstock.cGoodID AND DATE_FORMAT(tbmb1.dTrx,'%Y%m') = dReport GROUP BY tbmb2.cGoodID),0) +
IFNULL((SELECT SUM(tadjstock2.nAdj) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'D' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0)
AS TOT_RP_DEBET,
IFNULL((SELECT SUM(tbkb2.nQty) FROM tbkb2 JOIN tbkb1 ON(tbkb2.cBKBNo = tbkb1.cBKBNo) 
WHERE tbkb2.`cStockID` = CONCAT('STCK',mstock.cGoodID) AND DATE_FORMAT(tbkb1.dTrx,'%Y%m') = dReport GROUP BY tbkb2.`cStockID`),0) +
IFNULL((SELECT SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0)
AS TOT_KREDIT,
IFNULL((IFNULL((SELECT SUM(tbkb2.nCost) FROM tbkb2 JOIN tbkb1 ON(tbkb2.cBKBNo = tbkb1.cBKBNo) 
WHERE tbkb2.`cStockID` = CONCAT('STCK',mstock.cGoodID) AND DATE_FORMAT(tbkb1.dTrx,'%Y%m') = dReport GROUP BY tbkb2.`cStockID`),0) +
IFNULL((SELECT SUM(tadjstock2.nAdj) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0))
/ 
(IFNULL((SELECT SUM(tbkb2.nQty) FROM tbkb2 JOIN tbkb1 ON(tbkb2.cBKBNo = tbkb1.cBKBNo) 
WHERE tbkb2.`cStockID` = CONCAT('STCK',mstock.cGoodID) AND DATE_FORMAT(tbkb1.dTrx,'%Y%m') = dReport GROUP BY tbkb2.`cStockID`),0) +
IFNULL((SELECT SUM(tadjstock2.nQty) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0)),0) 
AS RATA2_TOT_KREDIT,
IFNULL((SELECT SUM(tbkb2.nCost) FROM tbkb2 JOIN tbkb1 ON(tbkb2.cBKBNo = tbkb1.cBKBNo) 
WHERE tbkb2.`cStockID` = CONCAT('STCK',mstock.cGoodID) AND DATE_FORMAT(tbkb1.dTrx,'%Y%m') = dReport GROUP BY tbkb2.`cStockID`),0) +
IFNULL((SELECT SUM(tadjstock2.nAdj) FROM tadjstock2 JOIN tadjstock1 ON(tadjstock2.cAdjStockNo = tadjstock1.cAdjStockNo) 
WHERE tadjstock2.cGoodID = mstock.cGoodID AND tadjstock1.cDK = 'K' AND DATE_FORMAT(tadjstock1.dTrx,'%Y%m') = dReport GROUP BY tadjstock2.cGoodID),0)
AS TOT_RP_KREDIT
FROM mstock 
WHERE DATE_FORMAT(mstock.dStock,'%Y%m') = dReport GROUP BY mstock.cGoodID;
	
END */$$
DELIMITER ;

/*Table structure for table `dasbor` */

DROP TABLE IF EXISTS `dasbor`;

/*!50001 DROP VIEW IF EXISTS `dasbor` */;
/*!50001 DROP TABLE IF EXISTS `dasbor` */;

/*!50001 CREATE TABLE  `dasbor`(
 `cTotUser` bigint(21) ,
 `cTotSupp` bigint(21) ,
 `cTotBarang` bigint(21) ,
 `trx_penjualan` bigint(21) ,
 `trx_pembelian` bigint(21) ,
 `cTotStock` double ,
 `cTotBeli` double ,
 `cTotJual` double 
)*/;

/*Table structure for table `dasbor2` */

DROP TABLE IF EXISTS `dasbor2`;

/*!50001 DROP VIEW IF EXISTS `dasbor2` */;
/*!50001 DROP TABLE IF EXISTS `dasbor2` */;

/*!50001 CREATE TABLE  `dasbor2`(
 `cGoodID` varchar(12) ,
 `cGoodGrpID` varchar(12) ,
 `cGoodGrpDesc` varchar(100) ,
 `cGoodDesc` varchar(100) ,
 `cUnit` varchar(5) ,
 `cFoto` text ,
 `cDesc` text ,
 `cUserID` varchar(5) ,
 `nPrice` double ,
 `nDisc` double ,
 `cStatus` varchar(12) ,
 `nStock` double 
)*/;

/*Table structure for table `g_pembelian` */

DROP TABLE IF EXISTS `g_pembelian`;

/*!50001 DROP VIEW IF EXISTS `g_pembelian` */;
/*!50001 DROP TABLE IF EXISTS `g_pembelian` */;

/*!50001 CREATE TABLE  `g_pembelian`(
 `jan` bigint(21) ,
 `feb` bigint(21) ,
 `mar` bigint(21) ,
 `apr` bigint(21) ,
 `mei` bigint(21) ,
 `juni` bigint(21) ,
 `juli` bigint(21) ,
 `agt` bigint(21) ,
 `sep` bigint(21) ,
 `okt` bigint(21) ,
 `nov` bigint(21) ,
 `des` bigint(21) 
)*/;

/*Table structure for table `g_penjualan` */

DROP TABLE IF EXISTS `g_penjualan`;

/*!50001 DROP VIEW IF EXISTS `g_penjualan` */;
/*!50001 DROP TABLE IF EXISTS `g_penjualan` */;

/*!50001 CREATE TABLE  `g_penjualan`(
 `jan` bigint(21) ,
 `feb` bigint(21) ,
 `mar` bigint(21) ,
 `apr` bigint(21) ,
 `mei` bigint(21) ,
 `juni` bigint(21) ,
 `juli` bigint(21) ,
 `agt` bigint(21) ,
 `sep` bigint(21) ,
 `okt` bigint(21) ,
 `nov` bigint(21) ,
 `des` bigint(21) 
)*/;

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

/*!50001 DROP VIEW IF EXISTS `keranjang` */;
/*!50001 DROP TABLE IF EXISTS `keranjang` */;

/*!50001 CREATE TABLE  `keranjang`(
 `cUserID` varchar(20) ,
 `nQty` double 
)*/;

/*Table structure for table `v_analisa_penjualan` */

DROP TABLE IF EXISTS `v_analisa_penjualan`;

/*!50001 DROP VIEW IF EXISTS `v_analisa_penjualan` */;
/*!50001 DROP TABLE IF EXISTS `v_analisa_penjualan` */;

/*!50001 CREATE TABLE  `v_analisa_penjualan`(
 `cStockID` varchar(12) ,
 `cGoodID` varchar(12) ,
 `cGoodDesc` varchar(100) ,
 `jum` bigint(21) 
)*/;

/*Table structure for table `v_bkb1` */

DROP TABLE IF EXISTS `v_bkb1`;

/*!50001 DROP VIEW IF EXISTS `v_bkb1` */;
/*!50001 DROP TABLE IF EXISTS `v_bkb1` */;

/*!50001 CREATE TABLE  `v_bkb1`(
 `cBKBNo` varchar(12) ,
 `dTrx` date ,
 `cKonID` varchar(20) ,
 `cStatus` varchar(20) ,
 `cClose` varchar(1) ,
 `nOA` double ,
 `cBayar` varchar(20) ,
 `cGambar` text ,
 `cDesc` varchar(100) ,
 `cUserID` varchar(12) ,
 `cPassword` varchar(50) ,
 `cName` varchar(30) ,
 `cAddress` varchar(250) ,
 `cPhone` varchar(12) ,
 `cHP` varchar(12) ,
 `cUserGrpID` varchar(5) ,
 `cBranchID` varchar(12) ,
 `cFoto` varchar(250) 
)*/;

/*Table structure for table `v_dasboard` */

DROP TABLE IF EXISTS `v_dasboard`;

/*!50001 DROP VIEW IF EXISTS `v_dasboard` */;
/*!50001 DROP TABLE IF EXISTS `v_dasboard` */;

/*!50001 CREATE TABLE  `v_dasboard`(
 `data_barang` bigint(21) ,
 `data_supplier` bigint(21) ,
 `data_user` bigint(21) ,
 `data_kat_barang` bigint(21) ,
 `data_pemasukan` bigint(21) ,
 `data_pengeluaran` bigint(21) 
)*/;

/*Table structure for table `v_mstock2` */

DROP TABLE IF EXISTS `v_mstock2`;

/*!50001 DROP VIEW IF EXISTS `v_mstock2` */;
/*!50001 DROP TABLE IF EXISTS `v_mstock2` */;

/*!50001 CREATE TABLE  `v_mstock2`(
 `dStock` date ,
 `cGoodID` varchar(12) ,
 `cStockID` varchar(12) ,
 `cGoodDesc` varchar(100) ,
 `nBegQty` double ,
 `nBegCost` double ,
 `nCurQty` double ,
 `nCurCost` double ,
 `average` double(22,0) ,
 `nSale` double(18,1) 
)*/;

/*Table structure for table `v_pembelian` */

DROP TABLE IF EXISTS `v_pembelian`;

/*!50001 DROP VIEW IF EXISTS `v_pembelian` */;
/*!50001 DROP TABLE IF EXISTS `v_pembelian` */;

/*!50001 CREATE TABLE  `v_pembelian`(
 `cBMBNo` varchar(12) ,
 `dTrx` date ,
 `cSupID` varchar(12) ,
 `cSupDesc` varchar(100) ,
 `cGoodID` varchar(12) ,
 `nQty` double ,
 `nPrice` double ,
 `nCost` double ,
 `cGoodDesc` varchar(100) ,
 `cUnit` varchar(5) 
)*/;

/*Table structure for table `v_penjualan` */

DROP TABLE IF EXISTS `v_penjualan`;

/*!50001 DROP VIEW IF EXISTS `v_penjualan` */;
/*!50001 DROP TABLE IF EXISTS `v_penjualan` */;

/*!50001 CREATE TABLE  `v_penjualan`(
 `cBKBNo` varchar(12) ,
 `dTrx` date ,
 `cKonID` varchar(20) ,
 `cStatus` varchar(20) ,
 `nOA` double ,
 `cClose` varchar(1) ,
 `cBayar` varchar(20) ,
 `cGambar` text ,
 `cDesc` varchar(100) ,
 `nNo` decimal(3,0) ,
 `cStockID` varchar(12) ,
 `cGoodDesc` varchar(100) ,
 `cUnit` varchar(5) ,
 `cGoodGrpID` varchar(12) ,
 `cGoodGrpDesc` varchar(100) ,
 `nQty` double ,
 `nHpp` double ,
 `nPrice` double ,
 `nCost` double ,
 `nCost2` double 
)*/;

/*Table structure for table `v_st_jual` */

DROP TABLE IF EXISTS `v_st_jual`;

/*!50001 DROP VIEW IF EXISTS `v_st_jual` */;
/*!50001 DROP TABLE IF EXISTS `v_st_jual` */;

/*!50001 CREATE TABLE  `v_st_jual`(
 `dStock` date ,
 `cStockID` varchar(12) ,
 `cGoodID` varchar(12) ,
 `cGoodDesc` varchar(100) ,
 `nCurQty` double ,
 `nCurCost` double ,
 `nSale` double 
)*/;

/*Table structure for table `v_stock_jual` */

DROP TABLE IF EXISTS `v_stock_jual`;

/*!50001 DROP VIEW IF EXISTS `v_stock_jual` */;
/*!50001 DROP TABLE IF EXISTS `v_stock_jual` */;

/*!50001 CREATE TABLE  `v_stock_jual`(
 `dStock` date ,
 `cStockID` varchar(12) ,
 `cGoodID` varchar(12) ,
 `cGoodDesc` varchar(100) ,
 `cUnit` varchar(5) ,
 `nBegQty` double ,
 `nBegCost` double ,
 `nCurQty` double ,
 `nCurCost` double ,
 `nHpp` double ,
 `nSale` double(18,1) 
)*/;

/*Table structure for table `v_sum_bkb` */

DROP TABLE IF EXISTS `v_sum_bkb`;

/*!50001 DROP VIEW IF EXISTS `v_sum_bkb` */;
/*!50001 DROP TABLE IF EXISTS `v_sum_bkb` */;

/*!50001 CREATE TABLE  `v_sum_bkb`(
 `cBKBNo` varchar(12) ,
 `total` double(23,0) 
)*/;

/*Table structure for table `v_sum_bmb` */

DROP TABLE IF EXISTS `v_sum_bmb`;

/*!50001 DROP VIEW IF EXISTS `v_sum_bmb` */;
/*!50001 DROP TABLE IF EXISTS `v_sum_bmb` */;

/*!50001 CREATE TABLE  `v_sum_bmb`(
 `cBMBNo` varchar(12) ,
 `total` double 
)*/;

/*Table structure for table `v_tbkb2` */

DROP TABLE IF EXISTS `v_tbkb2`;

/*!50001 DROP VIEW IF EXISTS `v_tbkb2` */;
/*!50001 DROP TABLE IF EXISTS `v_tbkb2` */;

/*!50001 CREATE TABLE  `v_tbkb2`(
 `cBKBNo` varchar(12) ,
 `nNo` decimal(3,0) ,
 `cStockID` varchar(12) ,
 `nQty` double ,
 `nHpp` double ,
 `nPrice` double ,
 `nCost` double ,
 `nCost2` double ,
 `dStock` date ,
 `cGoodID` varchar(12) ,
 `cGoodGrpID` varchar(12) ,
 `cGoodDesc` varchar(100) ,
 `cUnit` varchar(5) ,
 `cFoto` text ,
 `cDesc` text ,
 `cGoodGrpDesc` varchar(100) 
)*/;

/*Table structure for table `v_ulasan` */

DROP TABLE IF EXISTS `v_ulasan`;

/*!50001 DROP VIEW IF EXISTS `v_ulasan` */;
/*!50001 DROP TABLE IF EXISTS `v_ulasan` */;

/*!50001 CREATE TABLE  `v_ulasan`(
 `dTgl` timestamp ,
 `cStockID` varchar(12) ,
 `cDesc` text ,
 `cUserID` varchar(20) ,
 `cName` varchar(30) 
)*/;

/*View structure for view dasbor */

/*!50001 DROP TABLE IF EXISTS `dasbor` */;
/*!50001 DROP VIEW IF EXISTS `dasbor` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dasbor` AS select (select count(`muser`.`cEmailID`) AS `cTotUser` from `muser`) AS `cTotUser`,(select count(`msupplier`.`cSupID`) AS `cTotSupp` from `msupplier`) AS `cTotSupp`,(select count(`mgood`.`cGoodID`) AS `cTotBarang` from `mgood`) AS `cTotBarang`,(select count(`tbkb1`.`cBKBNo`) AS `trx_penjualan` from `tbkb1`) AS `trx_penjualan`,(select count(`tbmb1`.`cBMBNo`) AS `trx_pembelian` from `tbmb1`) AS `trx_pembelian`,(select sum(`mstock`.`nCurQty`) AS `cTotStock` from `mstock`) AS `cTotStock`,(select sum(`tbmb2`.`nQty`) AS `pembelian` from `tbmb2`) AS `cTotBeli`,(select sum(`tbkb2`.`nQty`) AS `terjual` from `tbkb2`) AS `cTotJual` */;

/*View structure for view dasbor2 */

/*!50001 DROP TABLE IF EXISTS `dasbor2` */;
/*!50001 DROP VIEW IF EXISTS `dasbor2` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dasbor2` AS select `mgood`.`cGoodID` AS `cGoodID`,`mgood`.`cGoodGrpID` AS `cGoodGrpID`,`mgoodgrp`.`cGoodGrpDesc` AS `cGoodGrpDesc`,`mgood`.`cGoodDesc` AS `cGoodDesc`,`mgood`.`cUnit` AS `cUnit`,`mgood`.`cFoto` AS `cFoto`,`mgood`.`cDesc` AS `cDesc`,`mgood`.`cUserID` AS `cUserID`,`mgood`.`nPrice` AS `nPrice`,`mgood`.`nDisc` AS `nDisc`,`mgood`.`cStatus` AS `cStatus`,`mgood`.`nStock` AS `nStock` from (`mgood` join `mgoodgrp` on((`mgood`.`cGoodGrpID` = `mgoodgrp`.`cGoodGrpID`))) */;

/*View structure for view g_pembelian */

/*!50001 DROP TABLE IF EXISTS `g_pembelian` */;
/*!50001 DROP VIEW IF EXISTS `g_pembelian` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `g_pembelian` AS (select ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``tbmb1``.``cBMBNo``)` from `tbmb1` where ((date_format(`tbmb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbmb1`.`dTrx`,'%m') = '01'))),0) AS `jan`,ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``tbmb1``.``cBMBNo``)` from `tbmb1` where ((date_format(`tbmb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbmb1`.`dTrx`,'%m') = '02'))),0) AS `feb`,ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``tbmb1``.``cBMBNo``)` from `tbmb1` where ((date_format(`tbmb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbmb1`.`dTrx`,'%m') = '03'))),0) AS `mar`,ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``tbmb1``.``cBMBNo``)` from `tbmb1` where ((date_format(`tbmb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbmb1`.`dTrx`,'%m') = '04'))),0) AS `apr`,ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``tbmb1``.``cBMBNo``)` from `tbmb1` where ((date_format(`tbmb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbmb1`.`dTrx`,'%m') = '05'))),0) AS `mei`,ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``tbmb1``.``cBMBNo``)` from `tbmb1` where ((date_format(`tbmb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbmb1`.`dTrx`,'%m') = '06'))),0) AS `juni`,ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``tbmb1``.``cBMBNo``)` from `tbmb1` where ((date_format(`tbmb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbmb1`.`dTrx`,'%m') = '07'))),0) AS `juli`,ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``tbmb1``.``cBMBNo``)` from `tbmb1` where ((date_format(`tbmb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbmb1`.`dTrx`,'%m') = '08'))),0) AS `agt`,ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``tbmb1``.``cBMBNo``)` from `tbmb1` where ((date_format(`tbmb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbmb1`.`dTrx`,'%m') = '09'))),0) AS `sep`,ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``tbmb1``.``cBMBNo``)` from `tbmb1` where ((date_format(`tbmb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbmb1`.`dTrx`,'%m') = '10'))),0) AS `okt`,ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``tbmb1``.``cBMBNo``)` from `tbmb1` where ((date_format(`tbmb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbmb1`.`dTrx`,'%m') = '11'))),0) AS `nov`,ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``tbmb1``.``cBMBNo``)` from `tbmb1` where ((date_format(`tbmb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbmb1`.`dTrx`,'%m') = '12'))),0) AS `des`) */;

/*View structure for view g_penjualan */

/*!50001 DROP TABLE IF EXISTS `g_penjualan` */;
/*!50001 DROP VIEW IF EXISTS `g_penjualan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `g_penjualan` AS (select ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``tbkb1``.``cBKBNo``)` from `tbkb1` where ((date_format(`tbkb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbkb1`.`dTrx`,'%m') = '01'))),0) AS `jan`,ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``tbkb1``.``cBKBNo``)` from `tbkb1` where ((date_format(`tbkb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbkb1`.`dTrx`,'%m') = '02'))),0) AS `feb`,ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``tbkb1``.``cBKBNo``)` from `tbkb1` where ((date_format(`tbkb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbkb1`.`dTrx`,'%m') = '03'))),0) AS `mar`,ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``tbkb1``.``cBKBNo``)` from `tbkb1` where ((date_format(`tbkb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbkb1`.`dTrx`,'%m') = '04'))),0) AS `apr`,ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``tbkb1``.``cBKBNo``)` from `tbkb1` where ((date_format(`tbkb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbkb1`.`dTrx`,'%m') = '05'))),0) AS `mei`,ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``tbkb1``.``cBKBNo``)` from `tbkb1` where ((date_format(`tbkb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbkb1`.`dTrx`,'%m') = '06'))),0) AS `juni`,ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``tbkb1``.``cBKBNo``)` from `tbkb1` where ((date_format(`tbkb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbkb1`.`dTrx`,'%m') = '07'))),0) AS `juli`,ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``tbkb1``.``cBKBNo``)` from `tbkb1` where ((date_format(`tbkb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbkb1`.`dTrx`,'%m') = '08'))),0) AS `agt`,ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``tbkb1``.``cBKBNo``)` from `tbkb1` where ((date_format(`tbkb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbkb1`.`dTrx`,'%m') = '09'))),0) AS `sep`,ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``tbkb1``.``cBKBNo``)` from `tbkb1` where ((date_format(`tbkb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbkb1`.`dTrx`,'%m') = '10'))),0) AS `okt`,ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``tbkb1``.``cBKBNo``)` from `tbkb1` where ((date_format(`tbkb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbkb1`.`dTrx`,'%m') = '11'))),0) AS `nov`,ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``tbkb1``.``cBKBNo``)` from `tbkb1` where ((date_format(`tbkb1`.`dTrx`,'%Y') = date_format(now(),'%Y')) and (date_format(`tbkb1`.`dTrx`,'%m') = '12'))),0) AS `des`) */;

/*View structure for view keranjang */

/*!50001 DROP TABLE IF EXISTS `keranjang` */;
/*!50001 DROP VIEW IF EXISTS `keranjang` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `keranjang` AS select `t_tbkb2`.`cUserID` AS `cUserID`,sum(`t_tbkb2`.`nQty`) AS `nQty` from `t_tbkb2` group by `t_tbkb2`.`cUserID` */;

/*View structure for view v_analisa_penjualan */

/*!50001 DROP TABLE IF EXISTS `v_analisa_penjualan` */;
/*!50001 DROP VIEW IF EXISTS `v_analisa_penjualan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_analisa_penjualan` AS (select `v_tbkb2`.`cStockID` AS `cStockID`,`v_tbkb2`.`cGoodID` AS `cGoodID`,`v_tbkb2`.`cGoodDesc` AS `cGoodDesc`,count(`v_tbkb2`.`cStockID`) AS `jum` from `v_tbkb2` group by `v_tbkb2`.`cStockID` order by count(`v_tbkb2`.`cStockID`) desc) */;

/*View structure for view v_bkb1 */

/*!50001 DROP TABLE IF EXISTS `v_bkb1` */;
/*!50001 DROP VIEW IF EXISTS `v_bkb1` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_bkb1` AS select `tbkb1`.`cBKBNo` AS `cBKBNo`,`tbkb1`.`dTrx` AS `dTrx`,`tbkb1`.`cKonID` AS `cKonID`,`tbkb1`.`cStatus` AS `cStatus`,`tbkb1`.`cClose` AS `cClose`,`tbkb1`.`nOA` AS `nOA`,`tbkb1`.`cBayar` AS `cBayar`,`tbkb1`.`cGambar` AS `cGambar`,`tbkb1`.`cDesc` AS `cDesc`,`tbkb1`.`cUserID` AS `cUserID`,`muser`.`cPassword` AS `cPassword`,`muser`.`cName` AS `cName`,`muser`.`cAddress` AS `cAddress`,`muser`.`cPhone` AS `cPhone`,`muser`.`cHP` AS `cHP`,`muser`.`cUserGrpID` AS `cUserGrpID`,`muser`.`cBranchID` AS `cBranchID`,`muser`.`cFoto` AS `cFoto` from (`tbkb1` join `muser` on((convert(`tbkb1`.`cKonID` using utf8) = `muser`.`cEmailID`))) */;

/*View structure for view v_dasboard */

/*!50001 DROP TABLE IF EXISTS `v_dasboard` */;
/*!50001 DROP VIEW IF EXISTS `v_dasboard` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_dasboard` AS (select ifnull((select count(`mgood`.`cGoodID`) AS `COUNT(cGoodID)` from `mgood`),0) AS `data_barang`,ifnull((select count(`msupplier`.`cSupID`) AS `COUNT(cSupID)` from `msupplier`),0) AS `data_supplier`,ifnull((select count(`muser`.`cEmailID`) AS `COUNT(cEmailID)` from `muser`),0) AS `data_user`,ifnull((select count(`mgoodgrp`.`cGoodGrpID`) AS `COUNT(cGoodGrpID)` from `mgoodgrp`),0) AS `data_kat_barang`,ifnull((select count(`tbmb1`.`cBMBNo`) AS `COUNT(``cBMBNo``)` from `tbmb1` where (date_format(`tbmb1`.`dTrx`,'%Y-%m') = date_format(now(),'%Y-%m'))),0) AS `data_pemasukan`,ifnull((select count(`tbkb1`.`cBKBNo`) AS `COUNT(``cBKBNo``)` from `tbkb1` where (date_format(`tbkb1`.`dTrx`,'%Y-%m') = date_format(now(),'%Y-%m'))),0) AS `data_pengeluaran`) */;

/*View structure for view v_mstock2 */

/*!50001 DROP TABLE IF EXISTS `v_mstock2` */;
/*!50001 DROP VIEW IF EXISTS `v_mstock2` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mstock2` AS (select `mstock`.`dStock` AS `dStock`,`mstock`.`cGoodID` AS `cGoodID`,`mstock`.`cStockID` AS `cStockID`,`mgood`.`cGoodDesc` AS `cGoodDesc`,`mstock`.`nBegQty` AS `nBegQty`,`mstock`.`nBegCost` AS `nBegCost`,`mstock`.`nCurQty` AS `nCurQty`,`mstock`.`nCurCost` AS `nCurCost`,round((`mstock`.`nCurCost` / `mstock`.`nCurQty`),0) AS `average`,(round((`mstock`.`nCurCost` / `mstock`.`nCurQty`),0) + (round((`mstock`.`nCurCost` / `mstock`.`nCurQty`),0) * 0.2)) AS `nSale` from (`mstock` join `mgood` on((`mgood`.`cGoodID` = `mstock`.`cGoodID`)))) */;

/*View structure for view v_pembelian */

/*!50001 DROP TABLE IF EXISTS `v_pembelian` */;
/*!50001 DROP VIEW IF EXISTS `v_pembelian` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pembelian` AS select `tbmb1`.`cBMBNo` AS `cBMBNo`,`tbmb1`.`dTrx` AS `dTrx`,`tbmb1`.`cSupID` AS `cSupID`,`msupplier`.`cSupDesc` AS `cSupDesc`,`tbmb2`.`cGoodID` AS `cGoodID`,`tbmb2`.`nQty` AS `nQty`,`tbmb2`.`nPrice` AS `nPrice`,`tbmb2`.`nCost` AS `nCost`,`mgood`.`cGoodDesc` AS `cGoodDesc`,`mgood`.`cUnit` AS `cUnit` from (((`tbmb2` join `tbmb1` on((`tbmb2`.`cBMBNo` = `tbmb1`.`cBMBNo`))) join `msupplier` on((`tbmb1`.`cSupID` = `msupplier`.`cSupID`))) join `mgood` on((`tbmb2`.`cGoodID` = `mgood`.`cGoodID`))) */;

/*View structure for view v_penjualan */

/*!50001 DROP TABLE IF EXISTS `v_penjualan` */;
/*!50001 DROP VIEW IF EXISTS `v_penjualan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penjualan` AS select `tbkb1`.`cBKBNo` AS `cBKBNo`,`tbkb1`.`dTrx` AS `dTrx`,`tbkb1`.`cKonID` AS `cKonID`,`tbkb1`.`cStatus` AS `cStatus`,`tbkb1`.`nOA` AS `nOA`,`tbkb1`.`cClose` AS `cClose`,`tbkb1`.`cBayar` AS `cBayar`,`tbkb1`.`cGambar` AS `cGambar`,`tbkb1`.`cDesc` AS `cDesc`,`tbkb2`.`nNo` AS `nNo`,`tbkb2`.`cStockID` AS `cStockID`,`mgood`.`cGoodDesc` AS `cGoodDesc`,`mgood`.`cUnit` AS `cUnit`,`mgood`.`cGoodGrpID` AS `cGoodGrpID`,`mgoodgrp`.`cGoodGrpDesc` AS `cGoodGrpDesc`,`tbkb2`.`nQty` AS `nQty`,`tbkb2`.`nHpp` AS `nHpp`,`tbkb2`.`nPrice` AS `nPrice`,`tbkb2`.`nCost` AS `nCost`,`tbkb2`.`nCost2` AS `nCost2` from (((`tbkb2` join `tbkb1` on((`tbkb2`.`cBKBNo` = `tbkb1`.`cBKBNo`))) join `mgood` on((substr(`tbkb2`.`cStockID`,5) = `mgood`.`cGoodID`))) join `mgoodgrp` on((`mgood`.`cGoodGrpID` = `mgoodgrp`.`cGoodGrpID`))) */;

/*View structure for view v_st_jual */

/*!50001 DROP TABLE IF EXISTS `v_st_jual` */;
/*!50001 DROP VIEW IF EXISTS `v_st_jual` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_st_jual` AS select `mstock`.`dStock` AS `dStock`,`mstock`.`cStockID` AS `cStockID`,`mstock`.`cGoodID` AS `cGoodID`,`mgood`.`cGoodDesc` AS `cGoodDesc`,`mstock`.`nCurQty` AS `nCurQty`,`mstock`.`nCurCost` AS `nCurCost`,`mstock`.`nSale` AS `nSale` from (`mstock` join `mgood` on((`mstock`.`cGoodID` = `mgood`.`cGoodID`))) */;

/*View structure for view v_stock_jual */

/*!50001 DROP TABLE IF EXISTS `v_stock_jual` */;
/*!50001 DROP VIEW IF EXISTS `v_stock_jual` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_jual` AS select `mstock`.`dStock` AS `dStock`,`mstock`.`cStockID` AS `cStockID`,`mstock`.`cGoodID` AS `cGoodID`,`mgood`.`cGoodDesc` AS `cGoodDesc`,`mgood`.`cUnit` AS `cUnit`,`mstock`.`nBegQty` AS `nBegQty`,`mstock`.`nBegCost` AS `nBegCost`,`mstock`.`nCurQty` AS `nCurQty`,`mstock`.`nCurCost` AS `nCurCost`,ifnull((`mstock`.`nCurCost` / `mstock`.`nCurQty`),0) AS `nHpp`,(round((`mstock`.`nCurCost` / `mstock`.`nCurQty`),0) + (round((`mstock`.`nCurCost` / `mstock`.`nCurQty`),0) * 0.2)) AS `nSale` from (`mstock` join `mgood` on((`mstock`.`cGoodID` = `mgood`.`cGoodID`))) */;

/*View structure for view v_sum_bkb */

/*!50001 DROP TABLE IF EXISTS `v_sum_bkb` */;
/*!50001 DROP VIEW IF EXISTS `v_sum_bkb` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sum_bkb` AS (select `tbkb2`.`cBKBNo` AS `cBKBNo`,round(sum(`tbkb2`.`nCost`),0) AS `total` from `tbkb2` group by `tbkb2`.`cBKBNo`) */;

/*View structure for view v_sum_bmb */

/*!50001 DROP TABLE IF EXISTS `v_sum_bmb` */;
/*!50001 DROP VIEW IF EXISTS `v_sum_bmb` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sum_bmb` AS (select `tbmb2`.`cBMBNo` AS `cBMBNo`,sum(`tbmb2`.`nCost`) AS `total` from `tbmb2` group by `tbmb2`.`cBMBNo`) */;

/*View structure for view v_tbkb2 */

/*!50001 DROP TABLE IF EXISTS `v_tbkb2` */;
/*!50001 DROP VIEW IF EXISTS `v_tbkb2` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tbkb2` AS select `tbkb2`.`cBKBNo` AS `cBKBNo`,`tbkb2`.`nNo` AS `nNo`,`tbkb2`.`cStockID` AS `cStockID`,`tbkb2`.`nQty` AS `nQty`,`tbkb2`.`nHpp` AS `nHpp`,`tbkb2`.`nPrice` AS `nPrice`,`tbkb2`.`nCost` AS `nCost`,`tbkb2`.`nCost2` AS `nCost2`,`mstock`.`dStock` AS `dStock`,`mstock`.`cGoodID` AS `cGoodID`,`mgood`.`cGoodGrpID` AS `cGoodGrpID`,`mgood`.`cGoodDesc` AS `cGoodDesc`,`mgood`.`cUnit` AS `cUnit`,`mgood`.`cFoto` AS `cFoto`,`mgood`.`cDesc` AS `cDesc`,`mgoodgrp`.`cGoodGrpDesc` AS `cGoodGrpDesc` from (((`tbkb2` join `mstock` on((`tbkb2`.`cStockID` = `mstock`.`cStockID`))) join `mgood` on((`mstock`.`cGoodID` = `mgood`.`cGoodID`))) join `mgoodgrp` on((`mgood`.`cGoodGrpID` = `mgoodgrp`.`cGoodGrpID`))) group by `tbkb2`.`cBKBNo`,`tbkb2`.`cStockID` */;

/*View structure for view v_ulasan */

/*!50001 DROP TABLE IF EXISTS `v_ulasan` */;
/*!50001 DROP VIEW IF EXISTS `v_ulasan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ulasan` AS select `mulasan`.`dTgl` AS `dTgl`,`mulasan`.`cStockID` AS `cStockID`,`mulasan`.`cDesc` AS `cDesc`,`mulasan`.`cUserID` AS `cUserID`,`muser`.`cName` AS `cName` from (`mulasan` join `muser` on((convert(`mulasan`.`cUserID` using utf8) = `muser`.`cEmailID`))) order by `mulasan`.`dTgl` desc */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
