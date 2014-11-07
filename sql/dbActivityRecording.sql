drop database dbActivityRecording;

create database dbActivityRecording;

use dbActivityRecording;

create table if not exists t_employer
(
    pernr int(4) not null,
    forname varchar(20),
    lastname varchar(40),
    Primary Key(pernr)
) engine = Innodb;

create table if not exists t_customer
(
    k_id int(5) not null auto_increment,
    name varchar(30),
    Primary Key(k_id)
) engine = Innodb;

create table if not exists t_project
(
    p_id int(4) not null,
    k_id int(5),
    description varchar(30),
    Foreign Key(k_id) references t_customer(k_id) on update cascade on delete restrict,
    Primary Key(p_id)
) engine = Innodb;

create table if not exists t_sub_project
(
    sp_id int not null auto_increment,
    p_id int(4),
    position int(3),
    description varchar(30),
    Foreign Key(p_id) references t_project(p_id) on update cascade on delete restrict,
    Primary Key(sp_id)
) engine = Innodb;

create table if not exists t_entry
(
    e_id int not null auto_increment,
    pernr int(4),
    commentary varchar(40),
    sp_id int,
    Date long,
    hours double,
    cost_type varchar(3),
    Foreign Key(sp_id) references t_sub_project(sp_id) on update cascade on delete restrict,
    Foreign Key(pernr) references t_employer(pernr) on update cascade on delete restrict,
    Primary Key(e_id)
) engine = Innodb;