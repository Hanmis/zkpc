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
	sid integer not null primary key auto_increament,
	name varchar(16) not null,
	state int(1) default 1 not null,
	sort integer default 0 not null,	
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table zkpc_node(
	nid integer not null primary key auto_increament,
	name varchar(16) not null,
	state int(1) default 1 not null,
	sort integer default 0 not null,
	topics_count integer default 0 not null,
	summary varchar(128),
	section_id integer,	
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table zkpc_topic(
	tid integer not null primary key auto_increament;
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
	user_id integer,		
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table zkpc_replie(
	rid integer not null primary key auto_increament;
	content text not null,
	state int(1) default 1 not null,
	source varchar(64),
	created_at datetime,
	updated_at datetime,
	topic_id integer,
	user_id integer
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `zkpc_node` ADD CONSTRAINT `FK_node_section`
FOREIGN KEY (`section_id`) REFERENCES `zkpc_section` (`sid`)
ON DELETE CASCADE ON UPDATE RESTRICT;
 
alter table 'zkpc_topic' add constraint 'FK_topic_user','Fk_topic_node'
foreign key ('user_id', 'node_id') references 'zkpc_user' ('uid'), 'zkpc_node' ('nid')
on delete cascade on update restrict;

alter table 'zkpc_replie' add constraint 'FK_replie_user', 'FK_replie_topic'
foreign key ('user_id', 'topic_id') references 'zkpc_user' ('uid'), 'zkpc_topic' ('tid')
on delete cascade on update restrict;








