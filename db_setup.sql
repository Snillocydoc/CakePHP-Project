USE cnc34db;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS messages;

CREATE TABLE users(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50),
	password TEXT,
	created DATETIME,
	modified DATETIME
);

CREATE TABLE reviews(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id INT UNSIGNED,
	title VARCHAR(50),
	body TEXT,
	rating INT UNSIGNED,
	media TEXT,
	created DATETIME,
	modified DATETIME
);

CREATE TABLE comments(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id INT UNSIGNED,
	review_id INT UNSIGNED,
	title VARCHAR(50),
	body TEXT,
	username VARCHAR(50),
	created DATETIME,
	modified DATETIME
);

CREATE TABLE messages(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id INT UNSIGNED,
	from_user INT UNSIGNED,
	title VARCHAR(50),
	body TEXT,
	created DATETIME,
	modified DATETIME
);

SHOW TABLES;

DESCRIBE users;
DESCRIBE reviews;
DESCRIBE comments;
DESCRIBE messages;

TRUNCATE users;
TRUNCATE reviews;
TRUNCATE comments;
TRUNCATE messages;