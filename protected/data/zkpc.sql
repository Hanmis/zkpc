create database zkpc;

create table zkpc_user(
	uid integer not null primary key auto_increment,
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
