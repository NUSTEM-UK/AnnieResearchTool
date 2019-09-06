CREATE TABLE careers(
	id CHAR(12) PRIMARY KEY,
	unknown SET'ac','as','al','au','bk','cs','de','do','en','ep','ea','fa','ff','gt','hd','ju','la','li','me','nu','pi','pt','sk','so','su','te','tc','tp','ve','zo',
	liked SET('ac','as','al','au','bk','cs','de','do','en','ep','ea','fa','ff','gt','hd','ju','la','li','me','nu','pi','pt','sk','so','su','te','tc','tp','ve','zo'),
	disliked SET('ac','as','al','au','bk','cs','de','do','en','ep','ea','fa','ff','gt','hd','ju','la','li','me','nu','pi','pt','sk','so','su','te','tc','tp','ve','zo'),
	unsure SET('ac','as','al','au','bk','cs','de','do','en','ep','ea','fa','ff','gt','hd','ju','la','li','me','nu','pi','pt','sk','so','su','te','tc','tp','ve','zo'),
	timestamp DATETIME
);

CREATE TABLE attrib(
	id CHAR(12) PRIMARY KEY,
	meclever TINYINT UNSIGNED NOT NULL,
	mecreative TINYINT UNSIGNED NOT NULL,
	mesensible TINYINT UNSIGNED NOT NULL,
	mestrange TINYINT UNSIGNED NOT NULL,
	mekind TINYINT UNSIGNED NOT NULL,
	mefun TINYINT UNSIGNED NOT NULL,
	mefriendly TINYINT UNSIGNED NOT NULL,
	mecool TINYINT UNSIGNED NOT NULL,
	mehardworking TINYINT UNSIGNED NOT NULL,
	sciclever TINYINT UNSIGNED NOT NULL,
	scicreative TINYINT UNSIGNED NOT NULL,
	scisensible TINYINT UNSIGNED NOT NULL,
	scistrange TINYINT UNSIGNED NOT NULL,
	scikind TINYINT UNSIGNED NOT NULL,
	scifun TINYINT UNSIGNED NOT NULL,
	scifriendly TINYINT UNSIGNED NOT NULL,
	scicool TINYINT UNSIGNED NOT NULL,
	scihardworking TINYINT UNSIGNED NOT NULL,
	timestamp DATETIME
);

CREATE TABLE scientistasp(id CHAR(12) PRIMARY KEY, scientist VARCHAR(40) NOT NULL);

CREATE TABLE careers_list(id VARCHAR(2) PRIMARY KEY, careers VARCHAR(20) NOT NULL);

CREATE TABLE attrib_list(id VARCHAR(20) PRIMARY KEY);

-- TODO: What did these two lines ever do?
-- TODO: Without them, the attrib_feedback table isn't needed. careers_feedback isn't used anyway.
-- SELECT max(id) FROM careers_feedback;
-- SELECT max(id) FROM attrib_feedback;

-- TODO: Are these lines leftover testing code?!
INSERT INTO careers(id, unknown, liked, disliked, unsure) VALUES(:id, :unknown, :liked, :disliked, :unsure);

INSERT INTO attrib(id, meclever, mecreative, mesensible, mestrange, mekind, mefun, mefriendly, mecool, mehardworking, sciclever, scicreative, scisensible, scistrange, scikind, scifun, scifriendly, scicool, scihardworking) 
	VALUES(:id, :meclever, :mecreative, :mesensible, :mestrange, :mekind, :mefun, :mefriendly, :mecool, :mehardworking, :sciclever, :scicreative, :scisensible, :scistrange, :scikind, :scifun, :scifriendly, :scicool, :scihardworking);

-- TODO: This doesn't appear to do anything useful either
-- SELECT id, unknown, CONCAT(liked, disliked, unsure) AS known, liked, disliked, unsure FROM careers_feedback;

CREATE TRIGGER add_datetime_careers BEFORE INSERT ON careers
	FOR EACH ROW SET NEW.timestamp = now();

CREATE TRIGGER add_datetime_attrib BEFORE INSERT ON attrib
	FOR EACH ROW SET NEW.timestamp = now();