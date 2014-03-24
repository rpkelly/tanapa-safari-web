CREATE TABLE user
(
	id				INTEGER(20) NOT NULL auto_increment,
	PRIMARY KEY(id)
);

CREATE TABLE user_log
(
	id				INTEGER(30) NOT NULL auto_increment,
	user_id			INTEGER(20) NOT NULL,
	latitude		DECIMAL(8,6) NOT NULL,
	longitude		DECIMAL(9,6) NOT NULL,
	time			TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id),
	Foreign Key (user_id) references user(id)
);

CREATE TABLE media
(
	id				INTEGER(30) NOT NULL auto_increment,
	type			VARCHAR(20) NOT NULL,
	url				VARCHAR(50) NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE report_type
(
	id				INTEGER(20) NOT NULL auto_increment,
	name			VARCHAR(80) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE report
(
	id				INTEGER(20) NOT NULL auto_increment,
	report_type_id	INTEGER(20) NOT NULL,
	content			TEXT,
	time			timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	latitude		DECIMAL(8,6) NOT NULL,
	longitude		DECIMAL(9,6) NOT NULL,
	user_id			INTEGER(20) NOT NULL,
	report_media_id	INTEGER(30),
	PRIMARY KEY(id),
	Foreign Key(report_type_id) references report_type(id),
	Foreign Key(user_id) references user(id),
	Foreign Key(report_media_id) references media(id)
);

CREATE TABLE safari
(
	id				INTEGER(11) NOT NULL auto_increment,
	name			VARCHAR(80) NOT NULL,
	description		TEXT,
	header_media_id	INTEGER(30),
	footer_media_id	INTEGER(30),
	PRIMARY KEY (id),
	Foreign Key (header_media_id) references media(id),
	Foreign Key (footer_media_id) references media(id)
);

CREATE TABLE safari_waypoints
(
	id				INTEGER(15) NOT NULL auto_increment,
	sequence		INTEGER(15) NOT NULL,
	latitude		DECIMAL(8,6) NOT NULL,
	longitude		DECIMAL(9,6) NOT NULL,
	safari_id		INTEGER(11) NOT NULL,
	PRIMARY KEY (id),
	Foreign Key (safari_id) references safari(id)
);

CREATE TABLE safari_points_of_interest
(
	id				INTEGER(20) NOT NULL auto_increment,
	name			VARCHAR(80) NOT NULL,
	safari_id		INTEGER(255) NOT NULL,
	latitude		DECIMAL(8,6) NOT NULL,
	longitude		DECIMAL(9,6) NOT NULL,
	radius			INTEGER(11) NOT NULL,
	PRIMARY KEY (id),
	Foreign Key(safari_id) references safari(id)
);
