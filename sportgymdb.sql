/*
TeSP_PSI_1819_CDBD
SportGym Ginásios
Gonçalo Manuel Ferreria Oliveira, - nº2180654
Ricardo Fernandes Marques, - nº2180604
Samuel Jorge Perdigão Martins, - nº2180641
*/

create database if not exists sportgymdb;

use SportGymDB;

ALTER TABLE planos
DROP COLUMN dtaPlano;

ALTER TABLE perfisPlanos
ADD dtaplano date not null;

create table if not exists ginasios(
IDginasio int unsigned auto_increment,
contacto varchar(15) not null unique,
rua  varchar(255) not null,
localidade varchar (255) not null,
cp  varchar(15) not null,
constraint pk_ginasios_IDginasio primary key (IDginasio)
)ENGINE=InnoDB ;
select *from ginasios;


create table if not exists perfis
(
IDperfil int ,
nSocio int  unsigned unique not null,
foto blob null ,
primeiroNome varchar(50) not null,
apelido varchar(30) not null,
genero enum('M','F') not null,
telefone varchar(15) unique not null,
dtaNascimento date not null,
rua  varchar(15) not null,
localidade varchar(255) not null,
cp varchar(255) not null,
nif  varchar(15) unique not null,
peso double null,
altura double null,
constraint pk_perfis_IDperfil primary key (IDperfil),
constraint fk_perfis_IDperfil foreign key (IDperfil) references  sportgymdb.user(id)
)ENGINE=InnoDB ;
select *from perfis;


create table if not exists adesoes(
IDadesao int unsigned auto_increment,
dtaInicio date not null,
dtaFim date null,
IDginasio int unsigned, 
constraint pk_adesoes_IDadesao primary key (IDadesao),
constraint fk_adesoes_IDginasio foreign key (IDginasio) references ginasios(IDginasio)
)Engine=InnoDB;
select *from adesoes;


create table if not exists aulas(
IDaula int unsigned auto_increment,
tipo varchar(20) not null, 
dtaInicio datetime not null,
duracao time not null,
IDperfil int ,
IDginasio int unsigned,
constraint pk_aulas_IDaula primary key (IDaula),
constraint fk_aulas_IDperfil foreign key (IDperfil) references perfis(IDperfil),
constraint fk_aulas_IDginasio foreign key (IDginasio) references ginasios(IDginasio)
)engine=InnoDB;
select *from aulas;


create table if not exists planos(
IDplano int unsigned auto_increment,
nome varchar(100) not null, 
nutricao boolean not null,
treino boolean not null,
descricao varchar(5000),
IDperfil int,
constraint pk_planos_IDplano primary key (IDplano),
constraint fk_planos_IDperfil foreign key (IDperfil) references perfis(IDperfil)
)engine=InnoDB;
select *from planos;


create table if not exists vendas(
IDvenda int unsigned auto_increment,
estado boolean not null,
dataVenda date not null, 
total float not null,
IDperfil int ,
constraint pk_vendas_IDvenda primary key (IDvenda),
constraint fk_vendas_IDperfil foreign key (IDperfil) references perfis(IDperfil)
)engine=InnoDB;
select *from vendas;

create table if not exists linhaVendas(
IDlinhaVenda int unsigned auto_increment,
quantidade int not null,
subTotal float not null, 
IDvenda int unsigned ,
constraint pk_linhaVendas_IDlinhaVenda primary key (IDlinhaVenda),
constraint fk_linhaVendas_IDvenda foreign key (IDvenda) references vendas(IDvenda)
)engine=InnoDB;
select *from linhaVendas;


create table if not exists produtos(
IDproduto int unsigned auto_increment,
nome varchar(50) not null,
fotoProduto blob not null, 
descricao varchar(500) not null,
precoProduto double not null,
IDlinhaVenda int unsigned ,
constraint pk_produtos_IDproduto primary key (IDproduto),
constraint fk_produtos_IDlinhaVenda foreign key (IDlinhaVenda) references linhaVendas (IDlinhaVenda)
)engine=InnoDB;
select *from produtos;


create table if not exists perfisPlanos(
IDperfil int,
IDplano int unsigned,
constraint pk_perfisPlanos_IDperfilPlano primary key (IDperfil, IDplano),
constraint fk_perfisPlanos_IDperfil foreign key (IDperfil) references perfis (IDperfil),
constraint fk_perfisPlanos_IDplano foreign key (IDplano) references planos(IDplano)
)engine=InnoDB;
select *from perfisPlanos;

create table if not exists perfisAulas(
IDperfil int,
IDaula int unsigned,
constraint pk_perfisAulas_IDperfilAula primary key (IDperfil, IDaula),
constraint fk_perfisAulas_IDperfil foreign key (IDperfil) references perfis (IDperfil),
constraint fk_perfisAulas_IDaula foreign key (IDaula) references aulas(IDaula)
)engine=InnoDB;
select *from PerfisAulas;
