-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2016 at 06:02 AM
-- Server version: 5.5.38
-- PHP Version: 5.4.4-14+deb7u12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c1pom`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `PRC_ADD_UPDATE_PURCHASE_ORDER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_ADD_UPDATE_PURCHASE_ORDER`(IN `po_id` INT(11), IN `account_id` INT(11), IN `customer_id` INT(11), IN `shipper_id` INT(11), IN `status_id` INT(11), IN `po_creation_date` VARCHAR(20), IN `po_date` VARCHAR(20), IN `po_product_pn` VARCHAR(50), IN `po_product_name` VARCHAR(100), IN `po_product_type` VARCHAR(20), IN `po_product_qty` VARCHAR(10), IN `po_product_value` DECIMAL(10,2), IN `po_currency` VARCHAR(10), IN `po_gross_weight` DECIMAL(10,2), IN `po_cbm_volume` VARCHAR(100), IN `po_packing_type_one` VARCHAR(50), IN `po_packing_type_two` VARCHAR(50), IN `po_nbr_one` VARCHAR(50), IN `po_nbr_two` VARCHAR(50), IN `created_by` INT(11), IN `updated_by` INT(11), IN `deleted_by` INT(11), IN `created_at` DATETIME, IN `updated_at` DATETIME, IN `deleted_at` DATETIME, IN `is_active` INT(2))
    NO SQL
INSERT INTO `tbl_tran_purchase_order`(`PO_ID`, `ACCOUNT_ID`, `CUSTOMER_ID`, `SHIPPER_ID`, `STATUS_ID`, `PO_CREATION_DATE`, `PO_DATE`, `PO_PRODUCT_PN`, `PO_PRODUCT_NAME`, `PO_PRODUCT_TYPE`, `PO_PRODUCT_QTY`, `PO_PRODUCT_VALUE`, `PO_CURRENCY`, `PO_GROSS_WEIGHT`, `PO_CBM_VOLUME`, `PO_PACKING_TYPE1`, `PO_PACKING_TYPE2`, `PO_NBR1`, `PO_NBR2`, `CREATED_BY`, `UPDATED_BY`, `DELETED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`, `IS_ACTIVE`) VALUES (NULL,account_id,customer_id,shipper_id,status_id,po_creation_date,po_date,po_product_pn,po_product_name,po_product_type,po_product_qty,po_product_value,po_currency,po_gross_weight,po_cbm_volume,po_packing_type_one,po_packing_type_two,po_nbr_one,po_nbr_two,created_by,updated_by,deleted_by,Now(),Now(),Now(),1)$$

DROP PROCEDURE IF EXISTS `PRC_FETCH_MAST_CUSTOMER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_FETCH_MAST_CUSTOMER`()
BEGIN
 SELECT * FROM `tbl_mast_customer`
    JOIN `tbl_mast_country` ON `tbl_mast_country`.`CNT_ID` = `tbl_mast_customer`.`CUSTOMER_COUNTRY`
    ORDER BY `CUSTOMER_ID` DESC;
END$$

DROP PROCEDURE IF EXISTS `PRC_FETCH_MAST_FORWARDER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_FETCH_MAST_FORWARDER`()
BEGIN
 SELECT * FROM `tbl_mast_forwarder`
    JOIN `tbl_mast_country` ON `tbl_mast_country`.`CNT_ID` = `tbl_mast_forwarder`.`FWDR_COUNTRY`
    ORDER BY `FWDR_ID` DESC;
END$$

DROP PROCEDURE IF EXISTS `PRC_GET_ALL_FORWARDER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_GET_ALL_FORWARDER`()
BEGIN
SELECT F.*,C.CNT_NAME FROM `tbl_mast_forwarder` AS F JOIN `tbl_mast_country` AS C ON F.FWDR_COUNTRY=C.CNT_ID; 
END$$

DROP PROCEDURE IF EXISTS `PRC_GET_CUSTOMER_NAME`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_GET_CUSTOMER_NAME`()
    NO SQL
SELECT `CUSTOMER_NAME` FROM `tbl_mast_customer`$$

DROP PROCEDURE IF EXISTS `PRC_GET_FORWARDER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_GET_FORWARDER`()
BEGIN
SELECT * FROM `tbl_mast_forwarder`;
END$$

DROP PROCEDURE IF EXISTS `PRC_INSERT_CUSTOMER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_INSERT_CUSTOMER`(IN `CUST_NAME` VARCHAR(100), IN `CUST_COMP_NAME` VARCHAR(100), IN `CUST_COUNTRY` VARCHAR(5), IN `CUST_EMAIL_ID` VARCHAR(100), IN `CUST_ADDRESS` TEXT, IN `CUST_ZIP` VARCHAR(10), IN `ACCOUNTID` INT(11), OUT `INSERT_ID` INT)
BEGIN
	INSERT INTO tbl_mast_customer (ACCOUNT_ID,CUSTOMER_NAME,CUSTOMER_COMPANY_NAME,
                                       CUSTOMER_COUNTRY,CUSTOMER_EMAIL,CUSTOMER_ADDRESS,
                                       CUSTOMER_ZIP) 
    VALUES (ACCOUNTID,CUST_NAME,CUST_COMP_NAME,CUST_COUNTRY,CUST_EMAIL_ID,CUST_ADDRESS,CUST_ZIP);
    SET INSERT_ID = LAST_INSERT_ID();
END$$

DROP PROCEDURE IF EXISTS `PRC_INSERT_FORWARDER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_INSERT_FORWARDER`(IN `FORWARDER_NAME` VARCHAR(100), IN `FORWARDER_EMAIL` VARCHAR(100), IN `FORWARDER_COMPANY_NAME` VARCHAR(100), IN `FORWARDER_ADDRESS` VARCHAR(5), IN `FORWARDER_COUNTRY` TEXT, IN `FORWARDER_ZIP` VARCHAR(10), OUT `INSERT_ID` INT)
BEGIN
INSERT INTO tbl_mast_forwarder (FWDR_NAME,FWDR_EMAIL,FWDR_COMPANY_NAME,FWDR_ADDRESS,FWDR_COUNTRY,FWDR_ZIP)
	VALUES (FORWARDER_NAME,FORWARDER_EMAIL,FORWARDER_COMPANY_NAME,FORWARDER_ADDRESS,FORWARDER_COUNTRY,FORWARDER_ZIP);
        SET INSERT_ID = LAST_INSERT_ID();
    SELECT INSERT_ID;
END$$

DROP PROCEDURE IF EXISTS `PRC_INSERT_MENU_MAPPING`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_INSERT_MENU_MAPPING`(IN `ACCOUNTID` INT(11), IN `USERID` INT(11), IN `MENUID` INT(11))
BEGIN
 INSERT INTO `tbl_cfg_mast_user_role_menu_mapping` (`ACCOUNT_ID`,`USER_ID`,`MENU_ID`)
    VALUES (ACCOUNTID,USERID,MENUID);
END$$

DROP PROCEDURE IF EXISTS `PRC_MAST_MENU`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_MAST_MENU`(IN `P_MENU_ID` INT(10), IN `A_TYPE_ID` BIGINT(20))
BEGIN
	SELECT * FROM tbl_cfg_mast_menu WHERE PARENT_MENU_ID = P_MENU_ID AND ACCOUNT_TYPE_ID = A_TYPE_ID;
END$$

DROP PROCEDURE IF EXISTS `PRC_SELECT_FORWARDER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_SELECT_FORWARDER`(IN `ID` INT)
BEGIN
SELECT F.*,C.CNT_NAME FROM `tbl_mast_forwarder` AS F JOIN `tbl_mast_country` AS C ON F.FWDR_COUNTRY=C.CNT_ID WHERE F.FWDR_ID = ID;  
END$$

DROP PROCEDURE IF EXISTS `PRC_SHOW_PURCHASE_ORDER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_SHOW_PURCHASE_ORDER`()
    NO SQL
SELECT * FROM tbl_tran_purchase_order WHERE IS_ACTIVE = 1$$

DROP PROCEDURE IF EXISTS `PRC_SUSPEND_CUSTOMER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_SUSPEND_CUSTOMER`(IN ID INT(11))
BEGIN
 UPDATE `TBL_MAST_CUSTOMER` SET `ISACTIVE` = 0 WHERE `CUSTOMER_ID` = ID;
END$$

DROP PROCEDURE IF EXISTS `PRC_TBL_MAST_COUNTRY`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_TBL_MAST_COUNTRY`()
BEGIN
 SELECT CNT_ID,CNT_NAME FROM tbl_mast_country;
END$$

DROP PROCEDURE IF EXISTS `PRC_UPDATE_FORWARDER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRC_UPDATE_FORWARDER`(IN ID INT(11),
	IN NAME VARCHAR (100),
	IN EMAIL VARCHAR (100),
        IN COMPANY VARCHAR (100),
        IN ADDRESS TEXT,
        IN COUNTRY VARCHAR(5),
        IN ZIP VARCHAR (10)
)
BEGIN
UPDATE tbl_mast_forwarder 
	SET FWDR_NAME=NAME, FWDR_EMAIL=EMAIL, FWDR_COMPANY_NAME=COMPANY,FWDR_ADDRESS=ADDRESS, FWDR_COUNTRY=COUNTRY, FWDR_ZIP=ZIP
WHERE FWDR_ID=ID;
END$$

DROP PROCEDURE IF EXISTS `PRO_GET_ACCOUNT_TYPE_ID`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRO_GET_ACCOUNT_TYPE_ID`(IN `ACCOUNT_TYPE_NAMES` VARCHAR(100) CHARSET utf8, OUT `ACCOUNT_TYPE_IDS` INT)
SELECT ACCOUNT_TYPE_ID as ACCOUNT_TYPE_IDS FROM tbl_cfg_mast_account_type WHERE ACCOUNT_TYPE_NAME=ACCOUNT_TYPE_NAMES$$

DROP PROCEDURE IF EXISTS `PRO_GET_SUPPLIER_ACTIVE_PEIVILAGES`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRO_GET_SUPPLIER_ACTIVE_PEIVILAGES`(IN `ACCOUNT_IDS` INT)
SELECT * FROM tbl_cfg_mast_user_role_menu_mapping WHERE ACCOUNT_ID = ACCOUNT_IDS$$

DROP PROCEDURE IF EXISTS `PRO_GET_SUPPLIER_LIST`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRO_GET_SUPPLIER_LIST`()
SELECT * FROM tbl_mast_supplier ORDER BY SUPPLIER_ID DESC$$

DROP PROCEDURE IF EXISTS `PRO_GET_SUPPLIER_LIST_BY_ACCOUNT_ID`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRO_GET_SUPPLIER_LIST_BY_ACCOUNT_ID`(IN `ACCOUNT_IDS` INT)
SELECT * FROM tbl_mast_supplier WHERE ACCOUNT_ID = ACCOUNT_IDS$$

DROP PROCEDURE IF EXISTS `PRO_GET_SUPPLIER_PEIVILAGES`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRO_GET_SUPPLIER_PEIVILAGES`(IN `ACCOUNT_TYPE_NAMES` VARCHAR(100) CHARSET utf8)
    DETERMINISTIC
BEGIN
SELECT tbl_cfg_mast_menu.* FROM tbl_cfg_mast_menu INNER JOIN tbl_cfg_mast_account_type ON tbl_cfg_mast_menu.ACCOUNT_TYPE_ID = tbl_cfg_mast_account_type.ACCOUNT_TYPE_ID WHERE tbl_cfg_mast_account_type.ACCOUNT_TYPE_NAME = ACCOUNT_TYPE_NAMES;
END$$

DROP PROCEDURE IF EXISTS `PRO_GET_USER_TYPE_ID`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRO_GET_USER_TYPE_ID`(IN `USER_TYPE_NAMES` VARCHAR(100) CHARSET utf8, OUT `USER_TYPE_IDS` INT)
BEGIN
SELECT USER_TYPE_ID as USER_TYPE_IDS FROM tbl_cfg_mast_user_type WHERE USER_TYPE_NAME = USER_TYPE_NAMES;
END$$

DROP PROCEDURE IF EXISTS `PRO_SAVE_EDIT_USER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRO_SAVE_EDIT_USER`(IN `ACCOUNT_ID` INT(11), IN `NAME` VARCHAR(100) CHARSET utf8, IN `EMAIL` VARCHAR(100) CHARSET utf8, IN `COMPANY_NAME` VARCHAR(100) CHARSET utf8, IN `ADDRESS` TEXT CHARSET utf8, IN `COUNTRY` VARCHAR(5) CHARSET utf8, IN `ZIP` VARCHAR(10) CHARSET utf8, IN `PRIVILAGE` TEXT CHARSET utf8, IN `U_STATUS` VARCHAR(11) CHARSET utf8, IN `CREATED_BY` VARCHAR(11) CHARSET utf8, IN `UPDATED_BY` VARCHAR(11) CHARSET utf8, IN `DELETED_BY` VARCHAR(11) CHARSET utf8, IN `CREATED_AT` DATETIME, IN `UPDATED_AT` DATETIME, IN `DELETED_AT` DATETIME, IN `ISACTVE` ENUM('0','1','2') CHARSET utf8, IN `USER_TYPE_IDS` INT, IN `SAVE_EDIT_MODE` VARCHAR(100) CHARSET utf8, IN `ACCOUNT_TYPE_NAME` VARCHAR(100) CHARSET utf8)
BEGIN
IF SAVE_EDIT_MODE = "SAVE" THEN
INSERT INTO TBL_MAST_APP_USER (ACCOUNT_ID, USER_TYPE_ID, USER_NAME, USER_EMAIL, USER_COMPANY_NAME, USER_ADDRESS, USER_COUNTRY, USER_ZIP, USER_PRIVILAGE, USER_STATUS, CREATED_BY, UPDATED_BY, DELETED_BY, CREATED_AT, UPDATED_AT, DELETED_AT, ISACTVE) VALUES (ACCOUNT_ID, USER_TYPE_IDS, NAME, EMAIL, COMPANY_NAME, ADDRESS, COUNTRY, ZIP, PRIVILAGE, U_STATUS, CREATED_BY, UPDATED_BY, DELETED_BY, CREATED_AT, UPDATED_AT, DELETED_AT, ISACTVE);

IF ACCOUNT_TYPE_NAME = "SUPPLIER" THEN
INSERT INTO TBL_MAST_SUPPLIER (ACCOUNT_ID, USER_TYPE_ID, SUPPLIER_NAME, SUPPLIER_EMAIL, SUPPLIER_COMPANY_NAME, SUPPLIER_ADDRESS, SUPPLIER_COUNTRY, SUPPLIER_ZIP, SUPPLIER_PRIVILAGE, SUPPLIER_STATUS, CREATED_BY, UPDATED_BY, DELETED_BY, CREATED_AT, UPDATED_AT, DELETED_AT, ISACTVE) VALUES (ACCOUNT_ID, USER_TYPE_IDS, NAME, EMAIL, COMPANY_NAME, ADDRESS, COUNTRY, ZIP, PRIVILAGE, U_STATUS, CREATED_BY, UPDATED_BY, DELETED_BY, CREATED_AT, UPDATED_AT, DELETED_AT, ISACTVE);
ELSEIF  ACCOUNT_TYPE_NAME = "CUSTOMER" THEN
INSERT INTO TBL_MAST_CUSTOMER (ACCOUNT_ID, USER_TYPE_ID, CUSTOMER_NAME, CUSTOMER_EMAIL, CUSTOMER_COMPANY_NAME, CUSTOMER_ADDRESS, CUSTOMER_COUNTRY, CUSTOMER_ZIP, CUSTOMER_PRIVILAGE, CUSTOMER_STATUS, CREATED_BY, UPDATED_BY, DELETED_BY, CREATED_AT, UPDATED_AT, DELETED_AT, ISACTVE) VALUES (ACCOUNT_ID, USER_TYPE_IDS, NAME, EMAIL, COMPANY_NAME, ADDRESS, COUNTRY, ZIP, PRIVILAGE, U_STATUS, CREATED_BY, UPDATED_BY, DELETED_BY, CREATED_AT, UPDATED_AT, DELETED_AT, ISACTVE);
ELSEIF  ACCOUNT_TYPE_NAME = "FOEWARDER" THEN
INSERT INTO TBL_MAST_FORWARDER (ACCOUNT_ID, FWDR_NAME, FWDR_EMAIL, FWDR_COMPANY_NAME, FWDR_ADDRESS, FWDR_COUNTRY, FWDR_ZIP, FWDR_PRIVILAGE, FWDR_STATUS, CREATED_BY, UPDATED_BY, DELETED_BY, CREATED_AT, UPDATED_AT, DELETED_AT, ISACTVE) VALUES (ACCOUNT_ID, USER_TYPE_IDS, NAME, EMAIL, COMPANY_NAME, ADDRESS, COUNTRY, ZIP, PRIVILAGE, U_STATUS, CREATED_BY, UPDATED_BY, DELETED_BY, CREATED_AT, UPDATED_AT, DELETED_AT, ISACTVE);
END IF;

ELSEIF SAVE_EDIT_MODE = "EDIT" THEN

UPDATE TBL_MAST_APP_USER SET USER_NAME = NAME, USER_EMAIL = EMAIL, USER_COMPANY_NAME = COMPANY_NAME, USER_ADDRESS = ADDRESS, USER_COUNTRY = COUNTRY, USER_ZIP = ZIP, USER_STATUS = U_STATUS, UPDATED_BY = UPDATED_BY, UPDATED_AT = UPDATED_AT, ISACTVE=ISACTVE WHERE ACCOUNT_ID = ACCOUNT_ID; 

 IF ACCOUNT_TYPE_NAME = "SUPPLIER" THEN
     
        UPDATE TBL_MAST_SUPPLIER SET SUPPLIER_NAME = NAME, SUPPLIER_EMAIL = EMAIL, SUPPLIER_COMPANY_NAME = COMPANY_NAME, SUPPLIER_ADDRESS = ADDRESS, SUPPLIER_COUNTRY = COUNTRY, SUPPLIER_ZIP = ZIP, SUPPLIER_PRIVILAGE = PRIVILAGE, SUPPLIER_STATUS = U_STATUS, UPDATED_BY = UPDATED_BY, UPDATED_AT=UPDATED_AT, ISACTVE=ISACTVE WHERE ACCOUNT_ID = ACCOUNT_ID;
        
    ELSEIF ACCOUNT_TYPE_NAME = "CUSTOMER" THEN
    
     UPDATE TBL_MAST_CUSTOMER SET CUSTOMER_NAME = NAME, CUSTOMER_EMAIL = EMAIL, CUSTOMER_COMPANY_NAME = COMPANY_NAME, CUSTOMER_ADDRESS = ADDRESS, CUSTOMER_COUNTRY = COUNTRY, CUSTOMER_ZIP = ZIP, CUSTOMER_PRIVILAGE = PRIVILAGE, CUSTOMER_STATUS = U_STATUS, UPDATED_BY = UPDATED_BY, UPDATED_AT = UPDATED_AT, ISACTVE=ISACTVE   WHERE ACCOUNT_ID = ACCOUNT_ID;
    
    ELSEIF ACCOUNT_TYPE_NAME = "FOEWARDER" THEN
    
    UPDATE TBL_MAST_FORWARDER SET FWDR_NAME = NAME, FWDR_EMAIL = EMAIL, FWDR_COMPANY_NAME = COMPANY_NAME, FWDR_ADDRESS = ADDRESS, FWDR_COUNTRY = COUNTRY, FWDR_ZIP = ZIP, FWDR_PRIVILAGE = PRIVILAGE, FWDR_STATUS = U_STATUS, UPDATED_BY = UPDATED_BY, UPDATED_AT = UPDATED_AT, ISACTVE=ISACTVE WHERE ACCOUNT_ID = ACCOUNT_ID;
    
    END IF;

END IF;
END$$

DROP PROCEDURE IF EXISTS `PRO_SAVE_SUPPLIER`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRO_SAVE_SUPPLIER`(IN `ACCOUNT_ID` INT(11) UNSIGNED, IN `NAME` VARCHAR(100) CHARSET utf8, IN `EMAIL` VARCHAR(100) CHARSET utf8, IN `COMPANY_NAME` VARCHAR(100) CHARSET utf8, IN `ADDRESS` TEXT CHARSET utf8, IN `COUNTRY` VARCHAR(5) CHARSET utf8, IN `ZIP` VARCHAR(10) CHARSET utf8, IN `PRIVILAGE` TEXT CHARSET utf8, IN `SUPPLIER_STATUS` VARCHAR(11) CHARSET utf8, IN `CREATED_BY` VARCHAR(11) CHARSET utf8, IN `UPDATED_BY` VARCHAR(11) CHARSET utf8, IN `DELETED_BY` VARCHAR(11) CHARSET utf8, IN `CREATED_AT` DATETIME, IN `UPDATED_AT` DATETIME, IN `DELETED_AT` DATETIME, IN `ISACTVE` ENUM('0','1','2') CHARSET utf8, OUT `LAST_INSERT_ID` INT(0) UNSIGNED, IN `USER_TYPE_IDS` INT(11))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
INSERT INTO po_management.tbl_mast_app_user (ACCOUNT_ID, USER_TYPE_ID, USER_NAME, USER_EMAIL, USER_COMPANY_NAME, USER_ADDRESS, USER_COUNTRY, USER_ZIP, USER_PRIVILAGE, USER_STATUS, CREATED_BY, UPDATED_BY, DELETED_BY, CREATED_AT, UPDATED_AT, DELETED_AT, ISACTVE) VALUES (ACCOUNT_ID, USER_TYPE_IDS, NAME, EMAIL, COMPANY_NAME, ADDRESS, COUNTRY, ZIP, PRIVILAGE, SUPPLIER_STATUS, CREATED_BY, UPDATED_BY, DELETED_BY, CREATED_AT, UPDATED_AT, DELETED_AT, ISACTVE);
INSERT INTO tbl_mast_supplier (ACCOUNT_ID, USER_TYPE_ID, SUPPLIER_NAME, SUPPLIER_EMAIL, SUPPLIER_COMPANY_NAME, SUPPLIER_ADDRESS, SUPPLIER_COUNTRY, SUPPLIER_ZIP, SUPPLIER_PRIVILAGE, SUPPLIER_STATUS, CREATED_BY, UPDATED_BY, DELETED_BY, CREATED_AT, UPDATED_AT, DELETED_AT, ISACTVE) VALUES (ACCOUNT_ID, USER_TYPE_IDS, NAME, EMAIL, COMPANY_NAME, ADDRESS, COUNTRY, ZIP, PRIVILAGE, SUPPLIER_STATUS, CREATED_BY, UPDATED_BY, DELETED_BY, CREATED_AT, UPDATED_AT, DELETED_AT, ISACTVE);
SELECT MAX(SUPPLIER_ID) as LAST_INSERT_ID FROM tbl_mast_supplier;
END$$

DROP PROCEDURE IF EXISTS `PRO_SAVE_SUPPLIER_ACCOUNT_TYPE`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRO_SAVE_SUPPLIER_ACCOUNT_TYPE`(IN `ACCOUNT_TYPE_NAMES` VARCHAR(80) CHARSET utf8, IN `ACCOUNT_TYPE_IDS` INT, OUT `ACCOUNT_IDS` INT)
BEGIN
INSERT INTO po_management.tbl_cfg_mast_app_account(ACCOUNT_TYPE_ID, ACCOUNT_TYPE_NAME) VALUES (ACCOUNT_TYPE_IDS,ACCOUNT_TYPE_NAMES);
SELECT MAX(ACCOUNT_ID) AS ACCOUNT_IDS FROM tbl_cfg_mast_app_account;
END$$

DROP PROCEDURE IF EXISTS `PRO_SAVE_SUPPLIER_PRIVILEGE`$$
CREATE DEFINER=`c1scanner`@`localhost` PROCEDURE `PRO_SAVE_SUPPLIER_PRIVILEGE`(IN `ACCOUNT_IDS` INT, IN `USER_IDS` INT, IN `MENU_IDS` INT)
INSERT INTO tbl_cfg_mast_user_role_menu_mapping (ACCOUNT_ID, USER_ID, MENU_ID) VALUES (ACCOUNT_IDS, USER_IDS, MENU_IDS)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `table_mast_consine`
--

DROP TABLE IF EXISTS `table_mast_consine`;
CREATE TABLE IF NOT EXISTS `table_mast_consine` (
  `CONSINE_ID` int(20) NOT NULL AUTO_INCREMENT,
  `CONSINE_NAME` varchar(100) NOT NULL,
  `CONSINE_ADDRESS` varchar(100) NOT NULL,
  `CONSINE_COUNTRY` varchar(100) NOT NULL,
  `CONSINE_EMAIL` varchar(100) NOT NULL,
  `IS_ACTIVE` int(2) DEFAULT '1',
  `CONSINE_TYPE` enum('1','2','3') NOT NULL COMMENT '1=>on location,=>third party agent,3=>Others',
  `ACCOUNT_ID` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `DELETED_AT` datetime NOT NULL,
  PRIMARY KEY (`CONSINE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `table_mast_consine`
--

INSERT INTO `table_mast_consine` (`CONSINE_ID`, `CONSINE_NAME`, `CONSINE_ADDRESS`, `CONSINE_COUNTRY`, `CONSINE_EMAIL`, `IS_ACTIVE`, `CONSINE_TYPE`, `ACCOUNT_ID`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 'consine name', 'KOLKATA', 'INDIA', 'ABC@GMAIL.COM', 1, '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'new consine name ', 'asdsad', 'China', 'mm@gmail.com', 1, '1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cfg_mast_account_type`
--

DROP TABLE IF EXISTS `tbl_cfg_mast_account_type`;
CREATE TABLE IF NOT EXISTS `tbl_cfg_mast_account_type` (
  `ACCOUNT_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_TYPE_NAME` varchar(80) NOT NULL,
  PRIMARY KEY (`ACCOUNT_TYPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_cfg_mast_account_type`
--

INSERT INTO `tbl_cfg_mast_account_type` (`ACCOUNT_TYPE_ID`, `ACCOUNT_TYPE_NAME`) VALUES
(1, 'SYSTEM'),
(2, 'FORWARDER'),
(3, 'CUSTOMER'),
(4, 'SUPPLIER'),
(5, 'QC AGENT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cfg_mast_app_account`
--

DROP TABLE IF EXISTS `tbl_cfg_mast_app_account`;
CREATE TABLE IF NOT EXISTS `tbl_cfg_mast_app_account` (
  `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_TYPE_ID` int(11) NOT NULL,
  `ACCOUNT_TYPE_NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`ACCOUNT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_cfg_mast_app_account`
--

INSERT INTO `tbl_cfg_mast_app_account` (`ACCOUNT_ID`, `ACCOUNT_TYPE_ID`, `ACCOUNT_TYPE_NAME`) VALUES
(2, 2, 'FORWARDER ADMIN'),
(3, 2, 'FORWARDER ADMIN'),
(4, 3, 'Customer ADMIN'),
(5, 3, 'Customer ADMIN'),
(6, 3, 'QCAGENT ADMIN'),
(7, 4, 'SUPPLIER ADMIN'),
(8, 4, 'SUPPLIER ADMIN'),
(9, 1, 'SITE SUPER ADMIN'),
(17, 2, 'FORWARDER ADMIN'),
(18, 3, 'Customer ADMIN'),
(19, 3, 'QCAGENT ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cfg_mast_incoterm_origin`
--

DROP TABLE IF EXISTS `tbl_cfg_mast_incoterm_origin`;
CREATE TABLE IF NOT EXISTS `tbl_cfg_mast_incoterm_origin` (
  `INCOTERM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INCOTERM_NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`INCOTERM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cfg_mast_menu`
--

DROP TABLE IF EXISTS `tbl_cfg_mast_menu`;
CREATE TABLE IF NOT EXISTS `tbl_cfg_mast_menu` (
  `MENU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PARENT_MENU_ID` int(11) NOT NULL,
  `MENU_NAME` varchar(100) NOT NULL,
  `DEFAULT_MENU` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=> YES, 1=> NO',
  `MENU_SEQUENCE` int(11) DEFAULT NULL,
  PRIMARY KEY (`MENU_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `tbl_cfg_mast_menu`
--

INSERT INTO `tbl_cfg_mast_menu` (`MENU_ID`, `PARENT_MENU_ID`, `MENU_NAME`, `DEFAULT_MENU`, `MENU_SEQUENCE`) VALUES
(1, 0, 'Receive new purchase Order details', '1', 4),
(2, 0, 'Generate Invoice', '1', 100),
(3, 0, 'Manage Customers', '1', 100),
(4, 0, '[House] Create bill of lading', '1', 100),
(5, 0, 'Ancillary cost control', '1', 100),
(6, 0, 'Help', '1', 100),
(7, 0, 'Create Origin of Booking', '1', 9),
(8, 0, 'PO/Booking/Shipment Control and approval', '1', 11),
(9, 0, 'Create / View supplier', '1', 100),
(10, 0, 'Confirm Arrival', '1', 100),
(11, 0, 'Generate Instruction Process', '1', 100),
(12, 0, 'Landed Cost Modeling', '1', 100),
(13, 0, 'Create new purchase order', '1', 2),
(14, 0, 'View Financial Status', '1', 100),
(15, 0, 'E-Bill Generation', '1', 100),
(16, 0, 'Manage warehouse', '1', 100),
(17, 0, 'Dispute resolution', '1', 100),
(18, 0, 'Messaging section / news', '1', 100),
(19, 0, 'Update Shipment status', '1', 15),
(20, 0, 'CFS visibility', '1', 100),
(21, 0, 'Create / View Customer', '1', 100),
(22, 0, 'Close Shipment', '1', 100),
(23, 0, 'Custom Clearance Module', '1', 100),
(24, 0, 'Document Management', '1', 100),
(25, 0, 'PO Overview', '1', 3),
(26, 0, 'Manage Supplier', '1', 100),
(27, 0, 'Generate Letter of Credit (LOC)', '1', 100),
(28, 0, 'Carrier freight cost control', '1', 100),
(29, 0, 'Contact help desk', '1', 100),
(30, 0, 'View Feedback', '1', 100),
(31, 0, 'Scheduled Shipment', '1', 14),
(32, 0, 'Create / View QC Agent', '1', 100),
(33, 0, 'ASN EDI-856 Integration', '1', 100),
(34, 0, 'Dispatch Shipment', '1', 18),
(35, 0, 'DC Booking / Intake', '1', 100),
(37, 0, 'PO Receipt and Validation', '1', 4),
(38, 0, 'Track Shipment', '1', 100),
(39, 0, 'Create suppliers / view list', '1', 100),
(40, 0, 'E-Bill', '1', 100),
(41, 0, 'Set Booking Order Priority and Calculate', '1', 10),
(42, 0, 'Purchase Order Management', '1', 1),
(43, 0, 'Create sub-user with roles', '1', 100),
(44, 0, 'Payment History', '1', 100),
(45, 0, 'Post Feedback', '1', 100),
(46, 0, 'View Booking and Shipment Status', '1', 16),
(47, 0, 'Booking Management', '1', 8),
(48, 0, 'Create / View Forwarders', '1', 100),
(49, 0, 'Receive Invoice', '1', 100),
(50, 0, 'Make Payment', '1', 100),
(51, 0, 'View QC list', '1', 100),
(52, 0, 'View quality control variables', '1', 100),
(53, 0, 'Enter QC values', '1', 100),
(54, 0, 'Create Warehouse Branch', '1', 100),
(55, 0, 'Manage Inventory', '1', 100),
(56, 0, 'Item Scheduling', '1', 17),
(57, 0, 'Create Sub-admin', '1', 100),
(58, 0, 'Generate Purchase Requisition', '1', 100),
(59, 0, 'Manage warehouse items', '1', 100),
(60, 0, 'Manage Receiving Status', '1', 100),
(61, 0, 'Manage Damaged Material Status', '1', 100),
(62, 0, 'Manage Employee', '1', 100),
(63, 0, 'Manage Equipment', '1', 100),
(64, 0, 'Fleet Management / Fleet Scheduling', '1', 100),
(65, 0, 'Manage Payment', '1', 100),
(66, 0, 'Data Backup', '1', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cfg_mast_shipping_mode`
--

DROP TABLE IF EXISTS `tbl_cfg_mast_shipping_mode`;
CREATE TABLE IF NOT EXISTS `tbl_cfg_mast_shipping_mode` (
  `SHIPPING_MODE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SHIPPING_MODE_NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`SHIPPING_MODE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_cfg_mast_shipping_mode`
--

INSERT INTO `tbl_cfg_mast_shipping_mode` (`SHIPPING_MODE_ID`, `SHIPPING_MODE_NAME`) VALUES
(1, 'FCL'),
(2, 'LCL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cfg_mast_transport_mode`
--

DROP TABLE IF EXISTS `tbl_cfg_mast_transport_mode`;
CREATE TABLE IF NOT EXISTS `tbl_cfg_mast_transport_mode` (
  `TRANSPORT_MODE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRANSPORT_MODE_NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`TRANSPORT_MODE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_cfg_mast_transport_mode`
--

INSERT INTO `tbl_cfg_mast_transport_mode` (`TRANSPORT_MODE_ID`, `TRANSPORT_MODE_NAME`) VALUES
(1, 'SEA'),
(2, 'AIR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cfg_mast_user_type`
--

DROP TABLE IF EXISTS `tbl_cfg_mast_user_type`;
CREATE TABLE IF NOT EXISTS `tbl_cfg_mast_user_type` (
  `USER_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_TYPE_NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`USER_TYPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_cfg_mast_user_type`
--

INSERT INTO `tbl_cfg_mast_user_type` (`USER_TYPE_ID`, `USER_TYPE_NAME`) VALUES
(1, 'SITE_ADMIN'),
(2, 'SITE_USER'),
(3, 'ACCOUNT_ADMIN'),
(4, 'ACCOUNT_USER'),
(5, 'SUB_ACCOUNT_ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cfg_workflow_status`
--

DROP TABLE IF EXISTS `tbl_cfg_workflow_status`;
CREATE TABLE IF NOT EXISTS `tbl_cfg_workflow_status` (
  `STATUS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS_NAME` varchar(100) NOT NULL,
  `APPLICABLE_TO` varchar(100) NOT NULL,
  `STATUS_SEQUENCE` int(11) NOT NULL,
  `MODULE_NAME` varchar(20) NOT NULL,
  `SHOW_CHECKBOX` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`STATUS_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_cfg_workflow_status`
--

INSERT INTO `tbl_cfg_workflow_status` (`STATUS_ID`, `STATUS_NAME`, `APPLICABLE_TO`, `STATUS_SEQUENCE`, `MODULE_NAME`, `SHOW_CHECKBOX`) VALUES
(1, 'PO Added', 'on_po_insert', 1, 'PO', 1),
(2, 'Approval Awaiting', 'on_send_for_conformation', 2, 'PO', 1),
(3, 'PO Approved', 'on_po_approval', 3, 'PO', 1),
(4, 'Rejected', 'on-po-reject', 4, 'PO', 1),
(5, 'PO Review', 'on-po-review', 5, 'PO', 1),
(6, 'Booked', 'on_po_bookig', 6, 'PO', 1),
(7, 'Confirmed', 'on_booking_confirm', 7, 'PO', 0),
(8, 'Recived', 'on_shipment_recived', 9, 'PO', 0),
(9, 'Scheduled', 'on_shipment_scheduled', 8, 'PO', 0),
(10, 'Shipped', 'on_shipment_shipped', 10, 'PO', 0),
(11, 'Delivered Air/Port', 'on_shipment_deliver ', 11, 'PO', 0),
(12, 'Despatched', 'on_shipment_despatched', 12, 'PO', 0),
(13, 'Delivered', 'on_shipment_deliverd', 13, 'PO', 0),
(14, 'Closed', 'on_shipment_closed', 14, 'PO', 0),
(15, 'Booking in Process', 'on_booking_create', 15, 'Booking', 0),
(16, 'Booking Confirmed', 'on_booking_confirmed', 18, 'Booking', 0),
(17, 'Scheduled', 'on_booking_scheduled', 17, 'Shipping', 0),
(18, 'Received', 'on_booking_received', 18, 'Shipping', 0),
(19, 'Shipped', 'on_booking_shipped', 19, 'Shipping', 0),
(20, 'Delivered Air/Port\r\n', 'on_shipment_deliver', 20, 'Shipping', 0),
(21, 'Despatched', 'on_shipment_despatched\n', 21, 'Shipping', 0),
(22, 'Delivered\r\n', 'on_shipment_deliverd', 22, 'Shipping', 0),
(23, 'Closed\r\n', 'on_shipment_closed', 23, 'Shipping', 0),
(24, 'Approval Awaiting', 'on_send_for_conformation\r\n', 16, 'Booking', 0),
(26, 'Booking Review', 'on-booking-review', 17, 'Booking', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_app_user`
--

DROP TABLE IF EXISTS `tbl_mast_app_user`;
CREATE TABLE IF NOT EXISTS `tbl_mast_app_user` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `USER_NAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `USER_TYPE` enum('2','3','4','5','1') NOT NULL COMMENT '1=>Forwarder,2=>Customer,3=>Supplier,5=>Qc Agent',
  `USER_EMAIL` varchar(100) NOT NULL,
  `USER_COMPANY_NAME` varchar(100) NOT NULL,
  `USER_ADDRESS` text NOT NULL,
  `USER_COUNTRY` varchar(5) NOT NULL,
  `USER_ZIP` varchar(10) NOT NULL,
  `USER_STATUS` varchar(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `DELETED_BY` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `DELETED_AT` datetime NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tbl_mast_app_user`
--

INSERT INTO `tbl_mast_app_user` (`USER_ID`, `ACCOUNT_ID`, `USER_NAME`, `PASSWORD`, `USER_TYPE`, `USER_EMAIL`, `USER_COMPANY_NAME`, `USER_ADDRESS`, `USER_COUNTRY`, `USER_ZIP`, `USER_STATUS`, `CREATED_BY`, `UPDATED_BY`, `DELETED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`, `remember_token`) VALUES
(1, 0, 'superinder', '12345', '1', '', '', '', '', '', '', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(34, 2, 'ff1_user', '12345', '3', 'ff1@gmail.com', 'DDH', 'USA', '1', '123456', '', 0, 0, 0, '2016-02-07 08:02:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(35, 3, 'ff2_user', '12345', '3', 'ff2@gmail.com', 'KKL', 'UK', '225', '123456', '', 0, 0, 0, '2016-02-07 08:02:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(36, 4, 'cust1_user', '12345', '3', 'cust1@gmail.com', 'HKL', 'SA', '179', '123456', '', 0, 0, 0, '2016-02-07 10:02:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(37, 5, 'cust2_user', '12345', '3', 'cust2@gmail.com', 'OKM', 'UK', '223', '123456', '', 0, 0, 0, '2016-02-07 10:02:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(38, 6, 'qc agent', '12345', '3', 'qcagent@gmail.com', 'OKSL', 'BAS', '227', '123456', '', 0, 0, 0, '2016-02-07 10:02:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(39, 7, 'Supplier', '12345', '3', 'sup@gmail.com', 'UHSA', 'DKLA', '224', '123456', '', 0, 0, 0, '2016-02-07 10:02:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(40, 8, 'Supplier2', '12345', '3', 'sup32@gmail.com', 'com', 'sd', '15', '123456', '', 0, 0, 0, '2016-02-07 10:02:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(41, 2, 'ff1_mgr', '12345', '4', 'ffi_manager1@gmail.com', '', 'OKM', '56', '123456', '', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(42, 2, 'ff1_srmgr', '12345', '4', 'ff1_sr_manager@gmail.com', '', 'SDS', '12', '123456', '', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(43, 17, 'Malay Dhar', '12345', '3', 'malaydhar.greymatter@gmail.com', 'GMW', 'kolkata', '99', '700032', '', 0, 0, 0, '2016-02-17 01:02:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(44, 18, 'Malay Dhar', '12345', '3', 'themdhar@gmail.com', 'GMW', 'kolkata', '99', '700032', '', 0, 0, 0, '2016-02-17 01:02:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(45, 19, 'Malay Dhar', '12345', '3', 'md@gmail.com', 'GMW', 'kolkata', '99', '700032', '', 0, 0, 0, '2016-02-17 01:02:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_country`
--

DROP TABLE IF EXISTS `tbl_mast_country`;
CREATE TABLE IF NOT EXISTS `tbl_mast_country` (
  `CNT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CNT_ISO` char(2) NOT NULL,
  `CNT_NAME` varchar(80) NOT NULL,
  `CNT_NICENAME` varchar(80) NOT NULL,
  `CNT_ISO3` char(3) NOT NULL,
  `CNT_NUMCODE` smallint(6) NOT NULL,
  `CNT_PHONECODE` int(5) NOT NULL,
  PRIMARY KEY (`CNT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=254 ;

--
-- Dumping data for table `tbl_mast_country`
--

INSERT INTO `tbl_mast_country` (`CNT_ID`, `CNT_ISO`, `CNT_NAME`, `CNT_NICENAME`, `CNT_ISO3`, `CNT_NUMCODE`, `CNT_PHONECODE`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', '', 0, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', '', 0, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', '', 0, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', '', 0, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', '', 0, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', '', 0, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', '', 0, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', '', 0, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', '', 0, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', '', 0, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', '', 0, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'SVERIGE', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', '', 0, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', '', 0, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263),
(240, 'RS', 'SERBIA', 'Serbia', 'SRB', 688, 381),
(241, 'AP', 'ASIA PACIFIC REGION', 'Asia / Pacific Region', '0', 0, 0),
(242, 'ME', 'MONTENEGRO', 'Montenegro', 'MNE', 499, 382),
(243, 'AX', 'ALAND ISLANDS', 'Aland Islands', 'ALA', 248, 358),
(244, 'BQ', 'BONAIRE, SINT EUSTATIUS AND SABA', 'Bonaire, Sint Eustatius and Saba', 'BES', 535, 599),
(245, 'CW', 'CURACAO', 'Curacao', 'CUW', 531, 599),
(246, 'GG', 'GUERNSEY', 'Guernsey', 'GGY', 831, 44),
(247, 'IM', 'ISLE OF MAN', 'Isle of Man', 'IMN', 833, 44),
(248, 'JE', 'JERSEY', 'Jersey', 'JEY', 832, 44),
(249, 'XK', 'KOSOVO', 'Kosovo', '---', 0, 381),
(250, 'BL', 'SAINT BARTHELEMY', 'Saint Barthelemy', 'BLM', 652, 590),
(251, 'MF', 'SAINT MARTIN', 'Saint Martin', 'MAF', 663, 590),
(252, 'SX', 'SINT MAARTEN', 'Sint Maarten', 'SXM', 534, 1),
(253, 'SS', 'SOUTH SUDAN', 'South Sudan', 'SSD', 728, 211);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_customer`
--

DROP TABLE IF EXISTS `tbl_mast_customer`;
CREATE TABLE IF NOT EXISTS `tbl_mast_customer` (
  `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `CUSTOMER_NAME` varchar(100) NOT NULL,
  `CUSTOMER_EMAIL` varchar(100) NOT NULL,
  `CUSTOMER_COMPANY_NAME` varchar(100) NOT NULL,
  `CUSTOMER_ADDRESS` text NOT NULL,
  `CUSTOMER_COUNTRY` varchar(5) NOT NULL,
  `CUSTOMER_ZIP` varchar(10) NOT NULL,
  `CUSTOMER_PRIVILAGE` text NOT NULL,
  `CUSTOMER_STATUS` varchar(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `DELETED_BY` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `DELETED_AT` datetime NOT NULL,
  `IS_ACTIVE` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CUSTOMER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_mast_customer`
--

INSERT INTO `tbl_mast_customer` (`CUSTOMER_ID`, `ACCOUNT_ID`, `CUSTOMER_NAME`, `CUSTOMER_EMAIL`, `CUSTOMER_COMPANY_NAME`, `CUSTOMER_ADDRESS`, `CUSTOMER_COUNTRY`, `CUSTOMER_ZIP`, `CUSTOMER_PRIVILAGE`, `CUSTOMER_STATUS`, `CREATED_BY`, `UPDATED_BY`, `DELETED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`, `IS_ACTIVE`) VALUES
(1, 4, 'customer 1', 'cust1@gmail.com', 'HKL', 'SA', '179', '123456', '', '', 0, 0, 0, '2016-02-07 10:02:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 5, 'customer 2', 'cust2@gmail.com', 'OKML', 'UKL', '213', '123457', '', '', 0, 0, 0, '2016-02-07 10:02:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 18, 'Malay Dhar', 'themdhar@gmail.com', 'GMW', 'kolkata', '80', '700032', '', '', 0, 0, 0, '2016-02-17 01:02:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_customer_account_map`
--

DROP TABLE IF EXISTS `tbl_mast_customer_account_map`;
CREATE TABLE IF NOT EXISTS `tbl_mast_customer_account_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_mast_customer_account_map`
--

INSERT INTO `tbl_mast_customer_account_map` (`id`, `ACCOUNT_ID`, `CUSTOMER_ID`, `CREATED_ON`) VALUES
(1, 2, 1, '0000-00-00 00:00:00'),
(2, 3, 1, '0000-00-00 00:00:00'),
(3, 2, 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_forwarder`
--

DROP TABLE IF EXISTS `tbl_mast_forwarder`;
CREATE TABLE IF NOT EXISTS `tbl_mast_forwarder` (
  `FWDR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `FWDR_NAME` varchar(100) NOT NULL,
  `FWDR_EMAIL` varchar(100) NOT NULL,
  `FWDR_COMPANY_NAME` varchar(100) NOT NULL,
  `FWDR_ADDRESS` text NOT NULL,
  `FWDR_COUNTRY` varchar(5) NOT NULL,
  `FWDR_ZIP` varchar(10) NOT NULL,
  `FWDR_STATUS` varchar(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `DELETED_BY` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `DELETED_AT` datetime NOT NULL,
  `IS_ACTIVE` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`FWDR_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_mast_forwarder`
--

INSERT INTO `tbl_mast_forwarder` (`FWDR_ID`, `ACCOUNT_ID`, `FWDR_NAME`, `FWDR_EMAIL`, `FWDR_COMPANY_NAME`, `FWDR_ADDRESS`, `FWDR_COUNTRY`, `FWDR_ZIP`, `FWDR_STATUS`, `CREATED_BY`, `UPDATED_BY`, `DELETED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`, `IS_ACTIVE`) VALUES
(1, 2, 'forwarder1', 'ff1@gmail.com', 'DDH', 'USA', '169', '123456', '', 0, 0, 0, '2016-02-07 08:02:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 3, 'forwarder2', 'ff2@gmail.com', 'KKL', 'UK', '225', '123456', '', 0, 0, 0, '2016-02-07 08:02:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 17, 'Malay Dhar', 'malaydhar.greymatter@gmail.com', 'GMW', 'kolkata', '99', '700032', '', 0, 0, 0, '2016-02-17 01:02:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_forwarder_account_map`
--

DROP TABLE IF EXISTS `tbl_mast_forwarder_account_map`;
CREATE TABLE IF NOT EXISTS `tbl_mast_forwarder_account_map` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `FWDR_ID` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_mast_forwarder_account_map`
--

INSERT INTO `tbl_mast_forwarder_account_map` (`ID`, `ACCOUNT_ID`, `FWDR_ID`, `CREATED_ON`) VALUES
(1, 4, 1, '0000-00-00 00:00:00'),
(2, 4, 2, '0000-00-00 00:00:00'),
(3, 5, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_incoterm`
--

DROP TABLE IF EXISTS `tbl_mast_incoterm`;
CREATE TABLE IF NOT EXISTS `tbl_mast_incoterm` (
  `INCOTERM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INCOTERM_NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`INCOTERM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_mast_incoterm`
--

INSERT INTO `tbl_mast_incoterm` (`INCOTERM_ID`, `INCOTERM_NAME`) VALUES
(1, 'EXW'),
(2, 'FCA'),
(3, 'CPT'),
(4, 'CIP'),
(5, 'DAT'),
(6, 'DAP'),
(7, 'DDP'),
(8, 'FOB'),
(9, 'CFR'),
(10, 'CIF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_qcagent`
--

DROP TABLE IF EXISTS `tbl_mast_qcagent`;
CREATE TABLE IF NOT EXISTS `tbl_mast_qcagent` (
  `QCAGENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `QCAGENT_NAME` varchar(100) NOT NULL,
  `QCAGENT_EMAIL` varchar(100) NOT NULL,
  `QCAGENT_COMPANY_NAME` varchar(100) NOT NULL,
  `QCAGENT_ADDRESS` text NOT NULL,
  `QCAGENT_COUNTRY` varchar(5) NOT NULL,
  `QCAGENT_ZIP` varchar(10) NOT NULL,
  `QCAGENT_PRIVILAGE` text NOT NULL,
  `QCAGENT_STATUS` varchar(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `DELETED_BY` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `DELETED_AT` datetime NOT NULL,
  `IS_ACTIVE` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`QCAGENT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_mast_qcagent`
--

INSERT INTO `tbl_mast_qcagent` (`QCAGENT_ID`, `ACCOUNT_ID`, `QCAGENT_NAME`, `QCAGENT_EMAIL`, `QCAGENT_COMPANY_NAME`, `QCAGENT_ADDRESS`, `QCAGENT_COUNTRY`, `QCAGENT_ZIP`, `QCAGENT_PRIVILAGE`, `QCAGENT_STATUS`, `CREATED_BY`, `UPDATED_BY`, `DELETED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`, `IS_ACTIVE`) VALUES
(1, 6, 'qc agent', 'qcagent@gmail.com', 'OKSL', 'BAS', '227', '123456', '', '', 0, 0, 0, '2016-02-07 10:02:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 19, 'Malay Dhar', 'md@gmail.com', 'GMW', 'kolkata', '99', '700032', '', '', 0, 0, 0, '2016-02-17 01:02:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_role`
--

DROP TABLE IF EXISTS `tbl_mast_role`;
CREATE TABLE IF NOT EXISTS `tbl_mast_role` (
  `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_TYPE_ID` int(11) NOT NULL,
  `ACCOUNT_ID` int(11) NOT NULL,
  `USER_ROLE_NAME` varchar(100) NOT NULL,
  `IS_SYS_ROLE` int(11) NOT NULL COMMENT '1=>YES,2=>NO',
  PRIMARY KEY (`ROLE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `tbl_mast_role`
--

INSERT INTO `tbl_mast_role` (`ROLE_ID`, `USER_TYPE_ID`, `ACCOUNT_ID`, `USER_ROLE_NAME`, `IS_SYS_ROLE`) VALUES
(1, 3, 0, 'sys_forwarder_role', 1),
(2, 3, 0, 'sys_customer_role', 1),
(3, 3, 0, 'sys_qc_agent_role', 1),
(4, 3, 0, 'sys_supplier_role', 1),
(43, 3, 2, 'forwarder_admin_role_2', 0),
(44, 3, 3, 'forwarder_admin_role_3', 0),
(45, 3, 4, 'customer_admin_role_4', 0),
(46, 3, 5, 'customer_admin_role_5', 0),
(47, 3, 6, 'QC_admin_role_6', 0),
(48, 3, 7, 'supplier_admin_role_7', 0),
(49, 3, 8, 'supplier_admin_role_8', 0),
(50, 4, 2, 'manager', 0),
(51, 4, 2, 'sr. manager ', 0),
(52, 3, 17, 'forwarder_admin_role_17', 0),
(53, 3, 18, 'customer_admin_role_18', 0),
(54, 3, 19, 'QC_admin_role_19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_role_menu_map`
--

DROP TABLE IF EXISTS `tbl_mast_role_menu_map`;
CREATE TABLE IF NOT EXISTS `tbl_mast_role_menu_map` (
  `ROLE_MENU_MAP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ROLE_ID` int(11) NOT NULL,
  `MENU_ID` int(11) NOT NULL,
  PRIMARY KEY (`ROLE_MENU_MAP_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=887 ;

--
-- Dumping data for table `tbl_mast_role_menu_map`
--

INSERT INTO `tbl_mast_role_menu_map` (`ROLE_MENU_MAP_ID`, `USER_ROLE_ID`, `MENU_ID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 1, 27),
(28, 1, 28),
(29, 1, 29),
(30, 1, 30),
(31, 1, 31),
(32, 1, 32),
(33, 1, 33),
(34, 1, 34),
(35, 1, 35),
(100, 2, 36),
(101, 2, 37),
(102, 2, 38),
(103, 2, 39),
(104, 2, 40),
(105, 2, 41),
(106, 2, 42),
(107, 2, 43),
(108, 2, 44),
(109, 2, 45),
(110, 2, 46),
(111, 2, 47),
(112, 2, 48),
(113, 2, 49),
(114, 2, 50),
(115, 2, 13),
(116, 2, 17),
(117, 2, 4),
(118, 2, 24),
(119, 2, 18),
(120, 2, 29),
(121, 4, 13),
(122, 4, 18),
(123, 4, 38),
(124, 3, 51),
(125, 3, 52),
(126, 3, 53),
(127, 3, 17),
(128, 3, 18),
(129, 3, 29),
(130, 3, 6),
(596, 1, 42),
(597, 1, 47),
(598, 1, 41),
(599, 1, 46),
(600, 1, 56),
(643, 44, 9),
(644, 44, 11),
(645, 44, 15),
(646, 44, 17),
(647, 44, 21),
(648, 44, 23),
(649, 44, 27),
(650, 44, 29),
(651, 44, 33),
(652, 44, 35),
(653, 44, 2),
(654, 44, 4),
(655, 44, 6),
(656, 44, 10),
(657, 44, 12),
(658, 44, 14),
(659, 44, 16),
(660, 44, 18),
(661, 44, 20),
(662, 44, 22),
(663, 44, 24),
(664, 44, 26),
(665, 44, 28),
(666, 44, 30),
(667, 44, 32),
(668, 45, 42),
(669, 45, 13),
(670, 45, 37),
(671, 45, 47),
(672, 45, 41),
(673, 45, 46),
(674, 45, 39),
(675, 45, 43),
(676, 45, 45),
(677, 45, 49),
(678, 45, 4),
(679, 45, 18),
(680, 45, 38),
(681, 45, 40),
(694, 46, 13),
(695, 46, 46),
(696, 46, 44),
(697, 46, 17),
(698, 46, 24),
(699, 46, 29),
(700, 46, 39),
(701, 46, 43),
(702, 46, 45),
(703, 46, 49),
(704, 46, 4),
(705, 46, 18),
(708, 47, 17),
(710, 48, 38),
(711, 48, 18),
(712, 49, 13),
(713, 49, 38),
(714, 49, 18),
(740, 43, 42),
(741, 43, 13),
(742, 43, 25),
(743, 43, 1),
(744, 43, 47),
(745, 43, 7),
(746, 43, 41),
(747, 43, 8),
(748, 43, 31),
(749, 43, 19),
(750, 43, 46),
(751, 43, 56),
(752, 43, 5),
(753, 43, 15),
(754, 43, 17),
(755, 43, 23),
(756, 43, 33),
(757, 43, 2),
(758, 43, 12),
(759, 43, 22),
(760, 43, 24),
(761, 43, 28),
(762, 43, 30),
(802, 52, 42),
(803, 52, 13),
(804, 52, 25),
(805, 52, 1),
(806, 52, 47),
(807, 52, 7),
(808, 52, 41),
(809, 52, 8),
(810, 52, 31),
(811, 52, 19),
(812, 52, 46),
(813, 52, 56),
(814, 52, 34),
(815, 52, 3),
(816, 52, 5),
(817, 52, 9),
(818, 52, 11),
(819, 52, 15),
(820, 52, 17),
(821, 52, 21),
(822, 52, 23),
(823, 52, 29),
(824, 52, 33),
(825, 52, 2),
(826, 52, 4),
(827, 52, 10),
(828, 52, 12),
(829, 52, 14),
(830, 52, 16),
(831, 52, 18),
(832, 52, 20),
(833, 52, 22),
(834, 52, 24),
(835, 52, 26),
(836, 52, 28),
(837, 52, 30),
(838, 52, 32),
(858, 53, 42),
(859, 53, 13),
(860, 53, 37),
(861, 53, 47),
(862, 53, 41),
(863, 53, 46),
(864, 53, 39),
(865, 53, 43),
(866, 53, 45),
(867, 53, 49),
(868, 53, 4),
(869, 53, 18),
(870, 53, 38),
(871, 53, 40),
(872, 53, 44),
(873, 53, 48),
(874, 53, 50),
(875, 53, 17),
(876, 53, 24),
(882, 54, 51),
(883, 54, 53),
(884, 54, 18),
(885, 54, 6),
(886, 54, 52);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_shipper`
--

DROP TABLE IF EXISTS `tbl_mast_shipper`;
CREATE TABLE IF NOT EXISTS `tbl_mast_shipper` (
  `SHIPPER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `SHIPPER_NAME` varchar(100) NOT NULL,
  `SHIPPER_EMAIL` varchar(100) NOT NULL,
  `SHIPPER_COMPANY_NAME` varchar(100) NOT NULL,
  `SHIPPER_ADDRESS` text NOT NULL,
  `SHIPPER_COUNTRY` varchar(5) NOT NULL,
  `SHIPPER_ZIP` varchar(10) NOT NULL,
  `SHIPPER_PRIVILAGE` text NOT NULL,
  `SHIPPER_STATUS` varchar(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `DELETED_BY` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `DELETED_AT` datetime NOT NULL,
  PRIMARY KEY (`SHIPPER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_mast_shipper`
--

INSERT INTO `tbl_mast_shipper` (`SHIPPER_ID`, `ACCOUNT_ID`, `SHIPPER_NAME`, `SHIPPER_EMAIL`, `SHIPPER_COMPANY_NAME`, `SHIPPER_ADDRESS`, `SHIPPER_COUNTRY`, `SHIPPER_ZIP`, `SHIPPER_PRIVILAGE`, `SHIPPER_STATUS`, `CREATED_BY`, `UPDATED_BY`, `DELETED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 0, 'test shipper name', '', '', '', '', '', '', '', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 0, 'shipper name two', '', '', '', '', '', '', '', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 'shipper name two', '', '', '', '', '', '', '', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_supplier`
--

DROP TABLE IF EXISTS `tbl_mast_supplier`;
CREATE TABLE IF NOT EXISTS `tbl_mast_supplier` (
  `SUPPLIER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `SUPPLIER_NAME` varchar(100) NOT NULL,
  `SUPPLIER_EMAIL` varchar(100) NOT NULL,
  `SUPPLIER_COMPANY_NAME` varchar(100) NOT NULL,
  `SUPPLIER_ADDRESS` text NOT NULL,
  `SUPPLIER_COUNTRY` varchar(5) NOT NULL,
  `SUPPLIER_ZIP` varchar(10) NOT NULL,
  `SUPPLIER_PRIVILAGE` text NOT NULL,
  `SUPPLIER_STATUS` varchar(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `DELETED_BY` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `DELETED_AT` datetime NOT NULL,
  `IS_ACTIVE` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`SUPPLIER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_mast_supplier`
--

INSERT INTO `tbl_mast_supplier` (`SUPPLIER_ID`, `ACCOUNT_ID`, `SUPPLIER_NAME`, `SUPPLIER_EMAIL`, `SUPPLIER_COMPANY_NAME`, `SUPPLIER_ADDRESS`, `SUPPLIER_COUNTRY`, `SUPPLIER_ZIP`, `SUPPLIER_PRIVILAGE`, `SUPPLIER_STATUS`, `CREATED_BY`, `UPDATED_BY`, `DELETED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`, `IS_ACTIVE`) VALUES
(1, 7, 'Supplier', 'sup@gmail.com', 'UHSA', 'DKLA', '224', '123456', '', '', 0, 0, 0, '2016-02-07 10:02:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 8, 'Supplier 2', 'sup32@gmail.com', 'com', 'sd', '15', '123456', '', '', 0, 0, 0, '2016-02-07 10:02:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_user_role_map`
--

DROP TABLE IF EXISTS `tbl_mast_user_role_map`;
CREATE TABLE IF NOT EXISTS `tbl_mast_user_role_map` (
  `USER_ROLE_MAP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `APPLICABLE_FROM` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `APPLICABLE_TO` datetime NOT NULL,
  PRIMARY KEY (`USER_ROLE_MAP_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_mast_user_role_map`
--

INSERT INTO `tbl_mast_user_role_map` (`USER_ROLE_MAP_ID`, `USER_ID`, `ROLE_ID`, `APPLICABLE_FROM`, `APPLICABLE_TO`) VALUES
(1, 34, 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 35, 44, '2016-02-07 07:55:32', '0000-00-00 00:00:00'),
(3, 36, 45, '2016-02-07 09:00:49', '0000-00-00 00:00:00'),
(4, 37, 46, '2016-02-07 09:02:01', '0000-00-00 00:00:00'),
(5, 38, 47, '2016-02-07 09:04:23', '0000-00-00 00:00:00'),
(6, 39, 48, '2016-02-07 09:05:57', '0000-00-00 00:00:00'),
(7, 40, 49, '2016-02-07 09:07:19', '0000-00-00 00:00:00'),
(8, 41, 50, '2016-02-07 12:01:06', '0000-00-00 00:00:00'),
(9, 42, 51, '2016-02-07 12:01:06', '0000-00-00 00:00:00'),
(10, 43, 52, '2016-02-17 13:34:40', '0000-00-00 00:00:00'),
(11, 44, 53, '2016-02-17 13:47:47', '0000-00-00 00:00:00'),
(12, 45, 54, '2016-02-17 13:50:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mast_warehouse`
--

DROP TABLE IF EXISTS `tbl_mast_warehouse`;
CREATE TABLE IF NOT EXISTS `tbl_mast_warehouse` (
  `WAREHOUSE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `WAREHOUSE_NAME` varchar(100) NOT NULL,
  `WAREHOUSE_EMAIL` varchar(100) NOT NULL,
  `WAREHOUSE_COMPANY_NAME` varchar(100) NOT NULL,
  `WAREHOUSE_ADDRESS` text NOT NULL,
  `WAREHOUSE_COUNTRY` varchar(5) NOT NULL,
  `WAREHOUSE_ZIP` varchar(10) NOT NULL,
  `WAREHOUSE_PRIVILAGE` text NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `DELETED_BY` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `DELETED_AT` datetime NOT NULL,
  PRIMARY KEY (`WAREHOUSE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tran_booking`
--

DROP TABLE IF EXISTS `tbl_tran_booking`;
CREATE TABLE IF NOT EXISTS `tbl_tran_booking` (
  `BOOKING_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `STATUS_ID` int(11) NOT NULL,
  `TRANSPORT_MODE_ID` int(11) NOT NULL,
  `SHIPPING_MODE_ID` int(11) NOT NULL,
  `INCOTERM_ID` int(11) NOT NULL,
  `BOOKING_PICK_UP_PLACE` varchar(100) NOT NULL,
  `BOOKING_POL` varchar(100) NOT NULL,
  `BOOKING_POD` varchar(100) NOT NULL,
  `BOOKING_DELEVERY_PLACE` varchar(100) NOT NULL,
  `BOOKING_REQUESTED_SIPPING_DATE` date NOT NULL,
  `BOOKING_REQUESTED_DELIVERY_DATE` date NOT NULL,
  `BOOKING_CARGO_RECEIVE_DATE` date NOT NULL,
  `BOOKING_MBL` varchar(100) NOT NULL,
  `BOOKING_HBL` varchar(100) NOT NULL,
  `BOOKING_CONTAINER` varchar(100) NOT NULL,
  `BOOKING_COMPANY` varchar(100) NOT NULL,
  `BOOKING_FLIGHT` varchar(100) NOT NULL,
  `BOOKING_CLOSING_DATE` date NOT NULL,
  `BOOKING_ETD` date NOT NULL,
  `BOOKING_ETA` date NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `DELETED_BY` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `DELETED_AT` datetime NOT NULL,
  PRIMARY KEY (`BOOKING_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_tran_booking`
--

INSERT INTO `tbl_tran_booking` (`BOOKING_ID`, `ACCOUNT_ID`, `STATUS_ID`, `TRANSPORT_MODE_ID`, `SHIPPING_MODE_ID`, `INCOTERM_ID`, `BOOKING_PICK_UP_PLACE`, `BOOKING_POL`, `BOOKING_POD`, `BOOKING_DELEVERY_PLACE`, `BOOKING_REQUESTED_SIPPING_DATE`, `BOOKING_REQUESTED_DELIVERY_DATE`, `BOOKING_CARGO_RECEIVE_DATE`, `BOOKING_MBL`, `BOOKING_HBL`, `BOOKING_CONTAINER`, `BOOKING_COMPANY`, `BOOKING_FLIGHT`, `BOOKING_CLOSING_DATE`, `BOOKING_ETD`, `BOOKING_ETA`, `CREATED_BY`, `UPDATED_BY`, `DELETED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(2, 2, 22, 1, 1, 3, 'SDSD', 'SFDSD', 'SDADS', 'SAD', '2016-02-22', '2016-02-28', '2016-02-22', 'MBL', 'HBL', 'CONTINER', 'COMPANY', 'FLIGHT', '2016-02-28', '2016-02-29', '2016-02-25', 0, 0, 0, '2016-02-07 18:08:41', '2016-02-07 18:08:41', '0000-00-00 00:00:00'),
(4, 2, 23, 2, 1, 2, 'SDS', 'SD', 'SD', 'SD', '2016-02-29', '2016-02-29', '2016-02-29', 'sdf', 'HBL', 'CONTINER', 'COMPANY', 'VESSEL', '2016-02-28', '2016-02-29', '2016-02-29', 0, 0, 0, '2016-02-07 19:43:00', '2016-02-07 19:43:00', '0000-00-00 00:00:00'),
(5, 2, 22, 1, 1, 3, 'asdasd', 'asdas', 'asdasd', 'sadf', '2016-02-29', '2016-02-28', '2016-02-28', 'asd', 'asd', 'asd', 'asd', 'asd', '2016-02-02', '2016-02-10', '2016-02-17', 0, 0, 0, '2016-02-07 20:42:45', '2016-02-07 20:42:45', '0000-00-00 00:00:00'),
(6, 2, 22, 1, 1, 3, 'sdfasdf', 'asdfasd', 'asdfsadf', 'asdfasdf', '2016-02-12', '2016-02-11', '2016-02-24', '55', '55', '55', '55', '55', '2016-02-18', '2016-02-25', '2016-02-26', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2, 18, 1, 1, 4, 'sdfasdf', 'asdfasd', 'asdfsadf', 'asdfasdf', '2016-02-17', '2016-02-17', '2016-02-19', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 22, 1, 1, 3, 'CHINA', 'POL', 'UPDATE pol', 'delhi', '2016-02-04', '2016-02-23', '2016-02-19', 'MBL', 'HBL', 'CONTINER', 'MVC', 'TRUCK', '2016-02-17', '2016-02-23', '2016-02-29', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 20, 1, 1, 8, 'SHANGHAI', 'SHANGHAI', 'LE HAVRE', 'MARSEILLE', '2016-02-02', '2016-02-29', '2016-02-17', '55', '55', '55', '55', '55', '2016-02-17', '2016-02-19', '2016-02-20', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 2, 16, 1, 1, 5, 'china', '123', 'POD', 'kolkata', '2016-01-26', '2016-02-11', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 2, 16, 1, 1, 2, 'Kolkata', '123', 'UPDATE pol', 'kolkata', '2016-01-26', '2016-02-03', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tran_booking_po_map`
--

DROP TABLE IF EXISTS `tbl_tran_booking_po_map`;
CREATE TABLE IF NOT EXISTS `tbl_tran_booking_po_map` (
  `BOOKING_PO_MAP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BOOKING_ID` int(11) NOT NULL,
  `PO_ID` int(11) NOT NULL,
  PRIMARY KEY (`BOOKING_PO_MAP_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_tran_booking_po_map`
--

INSERT INTO `tbl_tran_booking_po_map` (`BOOKING_PO_MAP_ID`, `BOOKING_ID`, `PO_ID`) VALUES
(3, 2, 1),
(4, 2, 5),
(8, 4, 2),
(9, 4, 3),
(10, 4, 4),
(11, 5, 6),
(12, 5, 7),
(13, 6, 10),
(14, 6, 9),
(15, 7, 11),
(16, 7, 12),
(17, 8, 14),
(20, 9, 15),
(21, 9, 16),
(22, 9, 17),
(23, 10, 18),
(24, 11, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tran_booking_shipping`
--

DROP TABLE IF EXISTS `tbl_tran_booking_shipping`;
CREATE TABLE IF NOT EXISTS `tbl_tran_booking_shipping` (
  `SHIPPING_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SHIPPING_WH` enum('0','1') NOT NULL COMMENT '0=> YES, 1=> NO',
  `SHIPPING_WH_PLACE` varchar(100) NOT NULL,
  `SHIPPING_ARRIVAL_AT_WH` date NOT NULL,
  `SHIPPING_DEPARTURE_FROM_WH` date NOT NULL,
  `SHIPPING_DELIVERY_PLACE` varchar(100) NOT NULL,
  `SHIPPING_APPOINTMENT` varchar(100) NOT NULL,
  `SHIPPING_APPOINTMENT_DATE` date NOT NULL,
  `SHIPPING_APPOINTMENT_TIME` time NOT NULL,
  `SHIPPING_DELIVERY_DATE` date NOT NULL,
  `SHIPPING_DELIVERY_TIME` time NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `DELETED_BY` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `DELETED_AT` datetime NOT NULL,
  PRIMARY KEY (`SHIPPING_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tran_despatch`
--

DROP TABLE IF EXISTS `tbl_tran_despatch`;
CREATE TABLE IF NOT EXISTS `tbl_tran_despatch` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BOOKING_ID` int(11) NOT NULL,
  `FORWARDER_WAREHOUSE` varchar(5) NOT NULL,
  `FORWARDER_WAREHOUSE_PLACE` varchar(255) NOT NULL,
  `ARRIVAL_AT_FORWARDER_WAREHOUSE` date NOT NULL,
  `DEPARTURE_FROM_FORWARDER_WAREHOUSE` date NOT NULL,
  `FINAL_DELIVARY_PLACE` varchar(255) NOT NULL,
  `APPOINTMENT` varchar(5) NOT NULL,
  `APPOINTMENT_DATE` date NOT NULL,
  `APPOINTMENT_TIME` time NOT NULL,
  `FINAL_DELIVARY_DATE` date NOT NULL,
  `FINAL_DELIVARY_TIME` time NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_tran_despatch`
--

INSERT INTO `tbl_tran_despatch` (`ID`, `BOOKING_ID`, `FORWARDER_WAREHOUSE`, `FORWARDER_WAREHOUSE_PLACE`, `ARRIVAL_AT_FORWARDER_WAREHOUSE`, `DEPARTURE_FROM_FORWARDER_WAREHOUSE`, `FINAL_DELIVARY_PLACE`, `APPOINTMENT`, `APPOINTMENT_DATE`, `APPOINTMENT_TIME`, `FINAL_DELIVARY_DATE`, `FINAL_DELIVARY_TIME`) VALUES
(1, 2, 'Yes', 'kolkata', '2016-01-27', '2016-02-18', 'Solapur ', 'Yes', '2016-02-29', '09:10:00', '2016-02-29', '09:10:00'),
(2, 5, 'No', 'asd', '2016-02-23', '2016-02-29', 'asd', 'Yes', '2016-01-28', '06:12:00', '2016-01-25', '14:52:00'),
(3, 6, 'Yes', 'sdsd', '2016-02-24', '2016-02-29', 'sdsd', 'Yes', '2016-02-23', '12:30:00', '2016-02-29', '12:30:00'),
(4, 8, 'Yes', 'fwdr warehouse place', '2016-02-11', '2016-02-24', 'Solapur ', 'Yes', '2016-02-28', '09:10:00', '2016-02-23', '09:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tran_purchase_order`
--

DROP TABLE IF EXISTS `tbl_tran_purchase_order`;
CREATE TABLE IF NOT EXISTS `tbl_tran_purchase_order` (
  `PO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `FORWARDER_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `SHIPPER_ID` int(11) NOT NULL,
  `STATUS_ID` int(11) NOT NULL,
  `CONSINE_ID` int(11) NOT NULL,
  `PO_CREATION_DATE` date NOT NULL,
  `PO_DATE` date NOT NULL,
  `PO_PRODUCT_PN` varchar(50) NOT NULL,
  `PO_PRODUCT_NAME` varchar(100) NOT NULL,
  `PO_PRODUCT_TYPE` varchar(20) NOT NULL,
  `PO_PRODUCT_QTY` varchar(10) NOT NULL,
  `PO_PRODUCT_VALUE` decimal(10,2) NOT NULL,
  `PO_CURRENCY` varchar(10) NOT NULL DEFAULT 'USD',
  `PO_GROSS_WEIGHT` decimal(10,2) NOT NULL,
  `PO_CBM_VOLUME` varchar(100) NOT NULL,
  `PO_NUMBER` varchar(25) NOT NULL,
  `PO_PACKING_TYPE1` varchar(50) NOT NULL,
  `PO_PACKING_TYPE2` varchar(50) NOT NULL,
  `PO_NBR1` varchar(50) NOT NULL,
  `PO_NBR2` varchar(50) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `DELETED_BY` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `DELETED_AT` datetime NOT NULL,
  `IS_ACTIVE` int(2) DEFAULT '1',
  PRIMARY KEY (`PO_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_tran_purchase_order`
--

INSERT INTO `tbl_tran_purchase_order` (`PO_ID`, `ACCOUNT_ID`, `FORWARDER_ID`, `CUSTOMER_ID`, `SHIPPER_ID`, `STATUS_ID`, `CONSINE_ID`, `PO_CREATION_DATE`, `PO_DATE`, `PO_PRODUCT_PN`, `PO_PRODUCT_NAME`, `PO_PRODUCT_TYPE`, `PO_PRODUCT_QTY`, `PO_PRODUCT_VALUE`, `PO_CURRENCY`, `PO_GROSS_WEIGHT`, `PO_CBM_VOLUME`, `PO_NUMBER`, `PO_PACKING_TYPE1`, `PO_PACKING_TYPE2`, `PO_NBR1`, `PO_NBR2`, `CREATED_BY`, `UPDATED_BY`, `DELETED_BY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`, `IS_ACTIVE`) VALUES
(1, 2, 1, 1, 1, 13, 1, '2016-02-07', '2016-02-08', '45435', 'Skullcandy ', 'Headphone', '34', 5434.00, 'USD', 32432.00, '4543', '43545', '545', '23', '5434', '4543', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 2, 1, 1, 1, 14, 1, '2016-02-07', '2016-02-09', 'POKS', 'SASDX', 'OKLSDS', '234234', 4512.00, 'USD', 2312.00, '123215', 'FF1-10001', '458252', '454612', '10001', '1002', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 2, 1, 1, 2, 14, 1, '2016-01-30', '2016-01-20', 'SASDS', 'FSSD', '45213', '213123', 45223.00, 'USD', 45521.00, '32423', 'FF1-10002', '87752', '13212', '23234', '23234', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 2, 1, 2, 1, 14, 1, '2016-02-02', '2016-02-02', '655', 'SDSA', '67', '23434', 345.00, 'USD', 345.00, '454', 'FF1-10003', '345', '345', '43232', '456456', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 2, 1, 2, 3, 12, 2, '2016-02-09', '2016-02-18', '234', 'SEDASD', '4234', '23423', 600.00, 'USD', 234.00, '234', 'FF1-10004', '234', '234', '234', '234', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 2, 1, 1, 2, 13, 2, '2016-02-09', '2016-02-01', '345', 'SDSD', '345', '343', 345.00, 'USD', 54.00, '342', 'FFWR 11', '56', '546', '234', '234', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 2, 1, 1, 2, 13, 2, '2016-01-13', '2016-01-26', 'asdasd', 'Skullcandy S2DUDZ-003 In-Ear Headphone (Black)', '3254345', '233', 3456345.00, 'USD', 456456.00, '324234', 'FFWR 12', '456', '456', '234324', '234234', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 3, 2, 1, 2, 3, 1, '2016-02-07', '2016-02-07', 'product pn', 'name of product 89654', 'type of product 666', '20', 230000.00, 'USD', 9999999.00, '22222', 'FF2100054', '22', '33', '33', '33', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 2, 1, 2, 1, 13, 1, '2016-02-11', '2016-02-11', 'product pn555uuu', 'name of product 5555', 'type of product 5555', '555', 5555.00, 'USD', 5555.00, '555', '500001', '55', '55', '33', '33', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 2, 1, 1, 2, 13, 2, '2016-02-11', '2016-02-11', 'product pn555666', 'name of product 555566', 'type of product 5555', '666655', 230000.00, 'USD', 555566.00, '555', 'FF2100054666', '55', '55', '33', '33', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 2, 1, 1, 1, 8, 2, '2016-02-16', '2016-02-16', 'product pn555666', 'name of product 548888', 'type of product 5555', '548888', 548888.00, 'USD', 548888.00, '548888', 'FF21000548888', 'box', '55', '33', '33', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(12, 2, 1, 1, 1, 8, 2, '2016-02-16', '2016-02-16', 'product pn548889', 'name of product 548889', 'type of product 5555', '548889', 548889.00, 'USD', 548889.00, '548889', 'FF21000548889', '548889', '548889', '548889', '548889', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(14, 2, 1, 1, 2, 13, 2, '2016-02-17', '2016-02-12', '12313', 'HNLK', '12311', '4521', 465564.00, 'USD', 49846.00, '1212', '2123', '4654', '132132', '145151', '12131', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(15, 2, 1, 1, 1, 11, 1, '2016-02-01', '2016-02-02', '25', 'garnments', 'ok', '1000', 10000.00, 'USD', 1500.00, '10', '45252', 'pol', 'pod', '100', '10', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(16, 2, 1, 1, 2, 11, 1, '2016-01-13', '2016-02-27', '213', 'SGDSf', '456', '2423', 45.00, 'USD', 165.00, '41651', '546', '30', '654654641', '231', '132', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(17, 2, 1, 1, 3, 11, 2, '2016-02-25', '2016-02-03', '1616', 'GGD ital SLR Camera', '564', '233', 131321.00, 'USD', 6546.00, '2347', '46984', '46565635', '165', '46', '4', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(18, 2, 1, 2, 3, 7, 1, '2016-02-16', '2016-02-11', '123245', 'POJ', '645456', '4864', 46842132.00, 'USD', 46212.00, '654', '564', '4654', '465', '4165', '465', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(19, 2, 1, 1, 1, 7, 1, '2016-02-01', '2016-02-01', '10', 'PHONE', 'HHH', '125', 1250.00, 'USD', 1000.00, '10', '4589', '1', '1', '1', '1', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mast_currency`
--

DROP TABLE IF EXISTS `tb_mast_currency`;
CREATE TABLE IF NOT EXISTS `tb_mast_currency` (
  `CURRENCY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CURRENCY_NAME` varchar(20) NOT NULL,
  PRIMARY KEY (`CURRENCY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_mast_currency`
--

INSERT INTO `tb_mast_currency` (`CURRENCY_ID`, `CURRENCY_NAME`) VALUES
(1, 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `wf_booking_approval`
--

DROP TABLE IF EXISTS `wf_booking_approval`;
CREATE TABLE IF NOT EXISTS `wf_booking_approval` (
  `BOOKING_ID` int(11) NOT NULL,
  `TO_ROLE_ID` int(11) NOT NULL,
  `SEND_ON` datetime NOT NULL,
  `APPROVED_ON` datetime NOT NULL,
  `APPROVED_BY` int(11) NOT NULL,
  `APPROVAL_STATUS` int(11) NOT NULL,
  `APPROVAL_COMMENT` varchar(255) NOT NULL,
  `FROM_USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wf_booking_approval`
--

INSERT INTO `wf_booking_approval` (`BOOKING_ID`, `TO_ROLE_ID`, `SEND_ON`, `APPROVED_ON`, `APPROVED_BY`, `APPROVAL_STATUS`, `APPROVAL_COMMENT`, `FROM_USER_ID`) VALUES
(4, 50, '2016-02-07 02:02:06', '2016-02-07 02:02:11', 41, 16, '', 41),
(5, 50, '2016-02-07 03:02:04', '2016-02-07 03:02:12', 41, 16, '', 41),
(6, 50, '2016-02-11 05:02:13', '2016-02-11 05:02:15', 41, 16, '', 34),
(8, 50, '2016-02-17 10:02:46', '2016-02-17 12:02:50', 41, 16, '', 42),
(8, 51, '2016-02-17 10:02:46', '2016-02-17 12:02:50', 41, 16, '', 42),
(7, 50, '2016-02-17 12:02:35', '2016-02-17 12:02:02', 41, 16, '', 34),
(7, 51, '2016-02-17 12:02:35', '2016-02-17 12:02:02', 41, 16, '', 34),
(9, 50, '2016-02-17 01:02:41', '2016-02-17 02:02:27', 34, 16, '', 34),
(9, 51, '2016-02-17 01:02:41', '2016-02-17 02:02:27', 34, 16, '', 34),
(10, 50, '2016-02-17 02:02:33', '2016-02-17 02:02:48', 41, 16, '', 41),
(10, 51, '2016-02-17 02:02:33', '2016-02-17 02:02:48', 41, 16, '', 41),
(11, 50, '2016-02-17 03:02:30', '2016-02-17 03:02:40', 41, 16, '', 41),
(11, 51, '2016-02-17 03:02:30', '2016-02-17 03:02:40', 41, 16, '', 41);

-- --------------------------------------------------------

--
-- Table structure for table `wf_po_approval`
--

DROP TABLE IF EXISTS `wf_po_approval`;
CREATE TABLE IF NOT EXISTS `wf_po_approval` (
  `PO_ID` int(11) NOT NULL,
  `TO_ACCOUNT_ID` int(11) NOT NULL,
  `FROM_ACCOUNT_ID` int(11) NOT NULL,
  `SEND_ON` datetime NOT NULL,
  `APPROVED_ON` datetime NOT NULL,
  `APPROVED_BY` int(11) NOT NULL,
  `APPROVAL_STATUS` int(11) NOT NULL,
  `APPROVAL_COMMENT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wf_po_approval`
--

INSERT INTO `wf_po_approval` (`PO_ID`, `TO_ACCOUNT_ID`, `FROM_ACCOUNT_ID`, `SEND_ON`, `APPROVED_ON`, `APPROVED_BY`, `APPROVAL_STATUS`, `APPROVAL_COMMENT`) VALUES
(1, 4, 2, '0000-00-00 00:00:00', '2016-02-07 10:02:02', 36, 5, ' review comment test '),
(1, 4, 2, '2016-02-07 10:02:14', '2016-02-07 10:02:51', 36, 5, ' test comment 2 '),
(1, 4, 2, '2016-02-07 10:02:05', '2016-02-07 10:02:44', 36, 5, ' Request for review comment  ... '),
(1, 4, 2, '2016-02-07 11:02:54', '2016-02-07 11:02:56', 36, 3, ''),
(2, 4, 2, '0000-00-00 00:00:00', '2016-02-07 01:02:52', 36, 3, ''),
(3, 4, 2, '0000-00-00 00:00:00', '2016-02-07 01:02:56', 36, 3, ''),
(5, 5, 2, '0000-00-00 00:00:00', '2016-02-07 12:02:13', 37, 5, 've centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing '),
(5, 5, 2, '2016-02-07 12:02:33', '2016-02-07 12:02:03', 37, 3, ''),
(4, 5, 2, '2016-02-07 01:02:22', '2016-02-07 01:02:36', 37, 3, ''),
(6, 4, 2, '0000-00-00 00:00:00', '2016-02-07 03:02:10', 36, 3, ''),
(7, 4, 2, '0000-00-00 00:00:00', '2016-02-07 03:02:14', 36, 3, ''),
(8, 4, 3, '0000-00-00 00:00:00', '2016-02-07 06:02:54', 36, 3, ''),
(9, 5, 2, '2016-02-11 04:02:15', '2016-02-11 04:02:11', 37, 3, ' '),
(10, 4, 2, '0000-00-00 00:00:00', '2016-02-11 04:02:48', 36, 3, ''),
(11, 4, 2, '2016-02-16 06:02:32', '2016-02-16 06:02:06', 36, 3, ' '),
(12, 4, 2, '2016-02-16 06:02:13', '2016-02-16 06:02:27', 36, 3, ' '),
(14, 4, 2, '0000-00-00 00:00:00', '2016-02-17 09:02:45', 36, 3, ''),
(15, 4, 2, '0000-00-00 00:00:00', '2016-02-17 12:02:26', 36, 3, ''),
(16, 4, 2, '0000-00-00 00:00:00', '2016-02-17 12:02:56', 36, 3, ''),
(17, 4, 2, '0000-00-00 00:00:00', '2016-02-17 12:02:02', 36, 3, ''),
(18, 5, 2, '0000-00-00 00:00:00', '2016-02-17 01:02:00', 37, 5, ' industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electroni'),
(18, 5, 2, '2016-02-17 01:02:51', '2016-02-17 01:02:46', 37, 3, ''),
(19, 4, 2, '0000-00-00 00:00:00', '2016-02-17 01:02:20', 36, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `wf_setting`
--

DROP TABLE IF EXISTS `wf_setting`;
CREATE TABLE IF NOT EXISTS `wf_setting` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `WF_FUNCTION` varchar(50) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wf_setting`
--

INSERT INTO `wf_setting` (`ID`, `ACCOUNT_ID`, `WF_FUNCTION`, `ROLE_ID`, `CREATED_ON`) VALUES
(1, 2, 'on_send_booking_approve', 50, '2016-02-07 12:02:41'),
(2, 2, 'on_send_booking_approve', 51, '2016-02-07 12:02:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
