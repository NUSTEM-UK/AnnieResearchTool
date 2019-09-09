SET NAMES utf8mb4;

DROP TABLE IF EXISTS `attrib`;

CREATE TABLE `attrib`(
	`uniqueID` INT AUTO_INCREMENT,
	`id` CHAR(12) NOT NULL,
	`meclever` TINYINT(3) UNSIGNED NOT NULL,
	`mecreative` TINYINT(3) UNSIGNED NOT NULL,
	`mesensible` TINYINT(3) UNSIGNED NOT NULL,
	`mestrange` TINYINT(3) UNSIGNED NOT NULL,
	`mekind` TINYINT(3) UNSIGNED NOT NULL,
	`mefun` TINYINT(3) UNSIGNED NOT NULL,
	`mefriendly` TINYINT(3) UNSIGNED NOT NULL,
	`mecool` TINYINT(3) UNSIGNED NOT NULL,
	`mehardworking` TINYINT(3) UNSIGNED NOT NULL,
	`sciclever` TINYINT(3) UNSIGNED NOT NULL,
	`scicreative` TINYINT(3) UNSIGNED NOT NULL,
	`scisensible` TINYINT(3) UNSIGNED NOT NULL,
	`scistrange` TINYINT(3) UNSIGNED NOT NULL,
	`scikind` TINYINT(3) UNSIGNED NOT NULL,
	`scifun` TINYINT(3) UNSIGNED NOT NULL,
	`scifriendly` TINYINT(3) UNSIGNED NOT NULL,
	`scicool` TINYINT(3) UNSIGNED NOT NULL,
	`scihardworking` TINYINT(3) UNSIGNED NOT NULL,
	`timestamp` DATETIME NOT NULL,
	PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `careers`;

CREATE TABLE `careers`(
	`uniqueID` INT AUTO_INCREMENT,
	`id` CHAR(12),
	`unknown` SET('ac','as','al','au','bk','cs','de','do','en','ep','ea','fa','ff','gt','hd','ju','la','li','me','nu','pi','pt','sk','so','su','te','tc','tp','ve','zo'),
	`liked` SET('ac','as','al','au','bk','cs','de','do','en','ep','ea','fa','ff','gt','hd','ju','la','li','me','nu','pi','pt','sk','so','su','te','tc','tp','ve','zo'),
	`disliked` SET('ac','as','al','au','bk','cs','de','do','en','ep','ea','fa','ff','gt','hd','ju','la','li','me','nu','pi','pt','sk','so','su','te','tc','tp','ve','zo'),
	`unsure` SET('ac','as','al','au','bk','cs','de','do','en','ep','ea','fa','ff','gt','hd','ju','la','li','me','nu','pi','pt','sk','so','su','te','tc','tp','ve','zo'),
	`timestamp` DATETIME NOT NULL,
	PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `scientistasp`;

CREATE TABLE `scientistasp`(id CHAR(12) PRIMARY KEY, scientist VARCHAR(40) NOT NULL);

DROP TABLE IF EXISTS `careers_list`;

CREATE TABLE `careers_list`(id VARCHAR(2) PRIMARY KEY, careers VARCHAR(20) NOT NULL);

DROP TABLE IF EXISTS `attrib_list`;

CREATE TABLE `attrib_list`(id VARCHAR(20) PRIMARY KEY);

INSERT INTO `attrib_list` (`id`)
VALUES
	('Clever'),
	('Creative'),
	('Sensible'),
	('Strange'),
	('Kind'),
	('Fun'),
	('Friendly'),
	('Cool'),
	('Hardworking');

-- TODO: What did these two lines ever do?
-- TODO: Without them, the attrib_feedback table isn't needed. careers_feedback isn't used anyway.
-- SELECT max(id) FROM careers_feedback;
-- SELECT max(id) FROM attrib_feedback;

-- TODO: Are these lines leftover testing code?!
-- INSERT INTO careers(id, unknown, liked, disliked, unsure) VALUES(:id, :unknown, :liked, :disliked, :unsure);

-- INSERT INTO attrib(id, meclever, mecreative, mesensible, mestrange, mekind, mefun, mefriendly, mecool, mehardworking, sciclever, scicreative, scisensible, scistrange, scikind, scifun, scifriendly, scicool, scihardworking) 
	-- VALUES(:id, :meclever, :mecreative, :mesensible, :mestrange, :mekind, :mefun, :mefriendly, :mecool, :mehardworking, :sciclever, :scicreative, :scisensible, :scistrange, :scikind, :scifun, :scifriendly, :scicool, :scihardworking);

-- TODO: This doesn't appear to do anything useful either
-- SELECT id, unknown, CONCAT(liked, disliked, unsure) AS known, liked, disliked, unsure FROM careers_feedback;

DROP TRIGGER IF EXISTS add_datetime_careers;
CREATE TRIGGER add_datetime_careers BEFORE INSERT ON careers
	FOR EACH ROW SET NEW.timestamp = now();

DROP TRIGGER IF EXISTS add_datetime_attrib;
CREATE TRIGGER add_datetime_attrib BEFORE INSERT ON attrib
	FOR EACH ROW SET NEW.timestamp = now();