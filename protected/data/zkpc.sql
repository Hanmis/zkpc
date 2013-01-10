create database zkpc;

create table zkpc_user(
	uid integer not null primary key auto_increment,
	username varchar(64) not null,
	email varchar(128) not null,
	name varchar(64) not null,
	avatar_file_name varchar(128),
	verified int(1) default 0 not null,
	state int(1) default 1 not null,
	website varchar(128),
	created_at datetime,
	updated_at datetime,
	pwd varchar(128) not null,
	pwd_salt varchar(128) not null,
	signature varchar(128),
	p_Intro text,
	persistence_token varchar(128),
	login_count integer,
	failed_login_count integer,
	last_login_at datetime,
	current_login_ip varchar(64),
	last_login_ip varchar(64),
	notes_count integer
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table zkpc_section(
	sid integer not null primary key auto_increment,
	name varchar(16) not null,
	state int(1) default 1 not null,
	sort integer default 0 not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table zkpc_node(
	nid integer not null primary key auto_increment,
	name varchar(16) not null,
	state int(1) default 1 not null,
	sort integer default 0 not null,
	topics_count integer default 0 not null,
	summary varchar(128),
	section_id integer
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table zkpc_topic(
	tid integer not null primary key auto_increment;
	title varchar(64) not null,
	content text,
	state int(1) default 1 not null,
	replies_count integer,
	last_reply_user_id integer,
	replied_at datetime,
	source varchar(64),
	created_at datetime,
	updated_at datetime,
	node_id integer,
	user_id integer
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table zkpc_replie(
	rid integer not null primary key auto_increment;
	content text not null,
	state int(1) default 1 not null,
	source varchar(64),
	created_at datetime,
	updated_at datetime,
	topic_id integer,
	user_id integer
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE zkpc_node ADD CONSTRAINT FK_node_section
FOREIGN KEY (section_id) REFERENCES zkpc_section (sid)
ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE zkpc_topic ADD CONSTRAINT FK_topic_user
FOREIGN KEY (user_id) REFERENCES zkpc_user (uid)
ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE zkpc_topic ADD CONSTRAINT Fk_topic_node
FOREIGN KEY  (node_id) REFERENCES zkpc_node (nid)
ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE zkpc_reply ADD CONSTRAINT FK_reply_user
FOREIGN KEY (user_id) REFERENCES zkpc_user (uid)
ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE zkpc_reply ADD CONSTRAINT FK_reply_topic
FOREIGN KEY (topic_id) REFERENCES zkpc_topic (tid)
ON DELETE CASCADE ON UPDATE RESTRICT;


create table zkpc_coolsite_type(
	ctid integer not null primary key auto_increment,
	name varchar(20) not null,
	state int(1) default 1 not null,
	sort integer default 0 not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table zkpc_coolsite(
	cid integer not null primary key auto_increment,
	name varchar(32) not null,
	favicon varchar(64),
	url varchar(64) not null,
	state int(1) default 1 not null,
	sort integer default 0 not null,
	user_id integer,
	ct_id integer
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE zkpc_coolsite ADD CONSTRAINT FK_upload_user
FOREIGN KEY (user_id) REFERENCES zkpc_user (uid)
ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE zkpc_coolsite ADD CONSTRAINT FK_coolsite_type
FOREIGN KEY (ct_id) REFERENCES zkpc_coolsite_type (ctid)
ON DELETE CASCADE ON UPDATE RESTRICT;

