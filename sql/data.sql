use dbactivityrecording;

delete from t_sub_project where sp_id between 0 and 1000;
delete from t_project where p_id between 0 and 1000;
delete from t_customer where k_id between 0 and 1000;

insert into t_customer (k_id,name) values (1,'huelsta'),(2,'ATOS'),(3, 'Google');
insert into t_project (p_id, k_id, description) values (1,1,'Möbel bauen'),(2,1,'Möbel verkaufen'),(3,2,'ERP-Migration'),(4,2,'Kunden betrügen'),(5,3,'Alles über dich herausfinden');
insert into t_sub_project (sp_id, p_id, position, description) values (1,1,100,'Holz bestellen'),(2,1,200,'Platten sägen'),(3,1,300,'lackieren');

insert into t_employer (pernr,email, pw, forname, lastname) values (1234,'julianbeisert@gmx.de', 'passwort','Peter', 'Schmidt');