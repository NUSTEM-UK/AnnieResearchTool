SET NAMES utf8mb4;


DROP TABLE IF EXISTS `careers`;

CREATE TABLE `careers`(
	`uniqueID` INT AUTO_INCREMENT,
	`id` CHAR(12),
	`unknown` SET('ac','ar','at','au','ba','bu','cw','ch','cp','dd','do','en','fw','fd','hd','la','ma','me','nu','ow','pi','po','sc','sa','sw','sp','te','tc','ve','wa'),
	`liked` SET('ac','ar','at','au','ba','bu','cw','ch','cp','dd','do','en','fw','fd','hd','la','ma','me','nu','ow','pi','po','sc','sa','sw','sp','te','tc','ve','wa'),
	`disliked` SET('ac','ar','at','au','ba','bu','cw','ch','cp','dd','do','en','fw','fd','hd','la','ma','me','nu','ow','pi','po','sc','sa','sw','sp','te','tc','ve','wa'),
	`unsure` SET('ac','ar','at','au','ba','bu','cw','ch','cp','dd','do','en','fw','fd','hd','la','ma','me','nu','ow','pi','po','sc','sa','sw','sp','te','tc','ve','wa'),
	`timestamp` DATETIME NOT NULL,
	`gender` CHAR(1),
	`yeargroup` TINYINT(3) UNSIGNED NOT NULL,
	`likesci` TINYINT(3) UNSIGNED NOT NULL,
	`goodsci` TINYINT(3) UNSIGNED NOT NULL,
	PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `careers_list`;

CREATE TABLE `careers_list`(id VARCHAR(2) PRIMARY KEY, careers VARCHAR(20) NOT NULL);


DROP TRIGGER IF EXISTS add_datetime_careers;
CREATE TRIGGER add_datetime_careers BEFORE INSERT ON careers
	FOR EACH ROW SET NEW.timestamp = now();

