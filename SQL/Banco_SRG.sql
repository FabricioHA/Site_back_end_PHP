create database banco_srg;

use banco_srg;

create table tb_formulario
(
  id_form int not null unique auto_increment,
  nome_form varchar (45) not null,
  email_form varchar (45) not null,
  assunto_form varchar (40) not null,
  texto_form varchar (200) not null,
  resp_contato text,
  primary key (id_form)
);

create table tb_login_admin
(
  id_admin int not null unique auto_increment,
  usuario_admin varchar (64) not null unique,
  senha_admin varchar (20) not null,
  primary key (id_admin)
);

describe tb_login_admin;

insert into tb_login_admin (usuario_admin, senha_admin) values
("teste1@gmail.com", "teste123");

alter table tb_login_admin modify column usuario_admin varchar (64);