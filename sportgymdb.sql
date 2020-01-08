/*
TeSP_PSI_1819_CDBD
SportGym Ginásios
Gonçalo Manuel Ferreria Oliveira, - nº2180654
Ricardo Fernandes Marques, - nº2180604
Samuel Jorge Perdigão Martins, - nº2180641
*/

create database if not exists sportgymdb;

use sportgymdb_test;

ALTER TABLE plano
ADD tipo boolean not null;

drop table ginasio;
create table if not exists ginasio(
IDginasio int unsigned auto_increment,
rua  varchar(255) not null,
localidade varchar (255) not null,
cp  varchar(15) not null,
telefone varchar(15) unique not null,
email varchar(200) unique not null,
constraint pk_ginasio_IDginasio primary key (IDginasio)
)ENGINE=InnoDB ;

drop table perfil;
create table if not exists perfil
(
IDperfil int ,
nSocio int  unsigned unique not null,
foto varchar(500) null ,
primeiroNome varchar(50) not null,
apelido varchar(30) not null,
genero enum('M','F') not null,
telefone varchar(15) unique not null,
dtaNascimento date not null,
rua  varchar(500) not null,
localidade varchar(255) not null,
cp varchar(255) not null,
nif  varchar(15) unique not null,
peso double null,
altura double null,
constraint pk_perfil_IDperfil primary key (IDperfil),
constraint fk_perfil_IDperfil foreign key (IDperfil) references  sportgymdb.user(id)
)ENGINE=InnoDB ;

drop table adesao;
create table if not exists adesao(
IDadesao int unsigned auto_increment,
dtaInicio date not null,
dtaFim date null,
IDginasio int unsigned, 
IDperfil int,
constraint pk_adesao_IDadesao primary key (IDadesao),
constraint fk_adesao_IDginasio foreign key (IDginasio) references ginasio(IDginasio),
constraint fk_adesao_IDperfil foreign key (IDperfil) references perfil(IDperfil)
)Engine=InnoDB;

drop table aula;
create table if not exists aula(
IDaula int unsigned auto_increment,
tipo varchar(100) not null, 
duracao time not null,
constraint pk_aula_IDaula primary key (IDaula)
)engine=InnoDB;

drop table plano;
create table if not exists plano(
IDplano int unsigned auto_increment,
nome varchar(100) not null, 
tipo boolean not null,
descricao varchar(5000),
constraint pk_plano_IDplano primary key (IDplano)
)engine=InnoDB;

drop table venda;
create table if not exists venda(
IDvenda int unsigned auto_increment,
estado boolean not null,
dataVenda datetime null, 
total float not null,
IDperfil int ,
constraint pk_venda_IDvenda primary key (IDvenda),
constraint fk_venda_IDperfil foreign key (IDperfil) references perfil(IDperfil)
)engine=InnoDB;

drop table linhaVenda;
create table if not exists linhaVenda(
IDlinhaVenda int unsigned auto_increment,
quantidade int not null,
subTotal float not null, 
IDvenda int unsigned ,
IDproduto int unsigned ,
constraint pk_linhaVenda_IDlinhaVenda primary key (IDlinhaVenda),
constraint fk_linhaVenda_IDvenda foreign key (IDvenda) references venda(IDvenda),
constraint fk_linhaVenda_IDproduto foreign key (IDproduto) references produto (IDproduto)
)engine=InnoDB;

drop table produto;
create table if not exists produto(
IDproduto int unsigned auto_increment,
nome varchar(100) null, 
fotoProduto varchar(500) null, 
descricao varchar(500) not null,
estado boolean not null,
precoProduto double not null,
constraint pk_produto_IDproduto primary key (IDproduto)
)engine=InnoDB;

drop table perfilPlano;
create table if not exists perfilPlano(
IDperfil int,
IDplano int unsigned,
dtaplano date not null,
constraint pk_perfilPlano_IDperfilPlano primary key (IDperfil, IDplano),
constraint fk_perfilPlano_IDperfil foreign key (IDperfil) references perfil (IDperfil),
constraint fk_perfilPlano_IDplano foreign key (IDplano) references plano(IDplano)
)engine=InnoDB;

drop table perfilAula;
create table if not exists perfilAula(
IDperfil int,
IDaula int unsigned,
constraint pk_perfilAula_IDperfilAula primary key (IDperfil, IDaula),
constraint fk_perfilAula_IDperfil foreign key (IDperfil) references perfil (IDperfil),
constraint fk_perfilAula_IDaula foreign key (IDaula) references aula(IDaula)
)engine=InnoDB;

drop table ginasioAula;
create table if not exists ginasioAula(
IDginasio int unsigned,
IDaula int unsigned,
constraint pk_ginasioAula_IDginasioAula primary key (IDginasio, IDaula),
 constraint fk_ginasioAula_IDginasio foreign key (IDginasio) references ginasio (IDginasio),
constraint fk_ginasioAula_IDaula foreign key (IDaula) references aula (IDaula)
)engine=InnoDB;

drop database sportgymdb;
