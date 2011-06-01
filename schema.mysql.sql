drop database snar;
create database snar;
use snar;
drop table if exists tbl_lookup;
CREATE TABLE tbl_lookup
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(128) NOT NULL,
	code INTEGER NOT NULL,
	type VARCHAR(128) NOT NULL,
	position INTEGER NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

drop table if exists tbl_user;
CREATE TABLE tbl_user
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	gender INTEGER NOT NULL,
	username VARCHAR(128) NOT NULL,
	password VARCHAR(128) NOT NULL,
	salt VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
	profile TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


drop table if exists tbl_group;
CREATE TABLE tbl_group
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	groupname VARCHAR(128) NOT NULL,
	maillist VARCHAR(128) NOT NULL,
	admin_id INTEGER NOT NULL,
	CONSTRAINT FK_group_admin FOREIGN KEY (admin_id)
		REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

drop table if exists tbl_snar;
CREATE TABLE tbl_snar
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(128) NOT NULL,
	description TEXT,
	weight INTEGER,
	status INTEGER NOT NULL,
	owner_id INTEGER NOT NULL,
	CONSTRAINT FK_snar_owner FOREIGN KEY (owner_id)
		REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

drop table if exists tbl_user_group_reference;
CREATE TABLE tbl_user_group_reference
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	group_id INTEGER NOT NULL,
	user_id INTEGER NOT NULL,
	user_status INTEGER NOT NULL,
	user_role VARCHAR(128) NOT NULL,
	FOREIGN KEY (user_id)
		REFERENCES tbl_user (id) ON DELETE CASCADE,
	FOREIGN KEY (group_id)
		REFERENCES tbl_group (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

drop table if exists tbl_snar_group_reference;
CREATE TABLE tbl_snar_group_reference
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	group_id INTEGER NOT NULL,
	snar_id INTEGER NOT NULL,
	snar_status INTEGER NOT NULL,
	carrier_id INTEGER,
	FOREIGN KEY (snar_id)
		REFERENCES tbl_snar (id) ON DELETE CASCADE,
	FOREIGN KEY (group_id)
		REFERENCES tbl_group (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




INSERT INTO tbl_lookup (name, type, code, position) VALUES ('В поход - общественное', 'SnarStatus', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('В поход - личное', 'SnarStatus', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Запасное', 'SnarStatus', 3, 3);

INSERT INTO tbl_user (username, password, salt, email) VALUES ('demo','2e5c7db760a33498023813489cfadc0b','28b206548469ce62182048fd9cf91760','webmaster@example.com');


