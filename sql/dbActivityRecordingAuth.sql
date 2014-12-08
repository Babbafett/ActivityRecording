drop database dbactivityrecordingauth;

create database dbActivityRecordingAuth;

use dbActivityRecordingAuth;

create table if not exists t_login
(
	l_id int not null auto_increment,
	email varchar(50) not null,
	pw varchar(30),
	primary key(l_id, email)
) engine = innodb;