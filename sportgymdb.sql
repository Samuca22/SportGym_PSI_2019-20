/*
TeSP_PSI_1819_CDBD
SportGym Ginásios
Gonçalo Manuel Ferreria Oliveira, - nº2180654
Ricardo Fernandes Marques, - nº2180604
Samuel Jorge Perdigão Martins, - nº2180641
*/

create database if not exists sportgymdb;

use SportGymDB;

create table if not exists ginasio(
IDginasio int unsigned auto_increment,
rua  varchar(255) not null,
localidade varchar (255) not null,
cp  varchar(15) not null,
telefone varchar(15) unique not null,
email varchar(200) unique not null,
constraint pk_ginasio_IDginasio primary key (IDginasio)
)ENGINE=InnoDB ;



create table if not exists perfil
(
IDperfil int ,
nSocio int  unsigned unique not null,
foto varchar(500) null,
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
constraint pk_perfil_IDperfil primary key (IDperfil),
constraint fk_perfil_IDperfil foreign key (IDperfil) references  sportgymdb.user(id)
)ENGINE=InnoDB ;



create table if not exists adesao(
IDadesao int unsigned auto_increment,
dtaInicio date not null,
dtaFim date null,
IDginasio int unsigned, 
constraint pk_adesao_IDadesao primary key (IDadesao),
constraint fk_adesao_IDginasio foreign key (IDginasio) references ginasio(IDginasio)
)Engine=InnoDB;



create table if not exists aula(
IDaula int unsigned auto_increment,
tipo varchar(20) not null, 
dtaInicio datetime not null,
duracao time not null,
IDperfil int ,
IDginasio int unsigned,
constraint pk_aula_IDaula primary key (IDaula),
constraint fk_aula_IDperfil foreign key (IDperfil) references perfil(IDperfil),
constraint fk_aula_IDginasio foreign key (IDginasio) references ginasio(IDginasio)
)engine=InnoDB;



create table if not exists plano(
IDplano int unsigned auto_increment,
nome varchar(100) not null, 
nutricao boolean not null,
treino boolean not null,
descricao varchar(5000),
IDperfil int,
constraint pk_plano_IDplano primary key (IDplano),
constraint fk_plano_IDperfil foreign key (IDperfil) references perfil(IDperfil)
)engine=InnoDB;



create table if not exists venda(
IDvenda int unsigned auto_increment,
estado boolean not null,
dataVenda date not null, 
total float not null,
IDperfil int ,
constraint pk_venda_IDvenda primary key (IDvenda),
constraint fk_venda_IDperfil foreign key (IDperfil) references perfil(IDperfil)
)engine=InnoDB;


create table if not exists linhaVenda(
IDlinhaVenda int unsigned auto_increment,
quantidade int not null,
subTotal float not null, 
IDvenda int unsigned ,
constraint pk_linhaVenda_IDlinhaVenda primary key (IDlinhaVenda),
constraint fk_linhaVenda_IDvenda foreign key (IDvenda) references venda(IDvenda)
)engine=InnoDB;



create table if not exists produto(
IDproduto int unsigned auto_increment,
nome varchar(500) null,
fotoProduto varchar(500) not null, 
descricao varchar(500) not null,
estado boolean not null,
precoProduto double not null,
IDlinhaVenda int unsigned ,
constraint pk_produto_IDproduto primary key (IDproduto),
constraint fk_produto_IDlinhaVenda foreign key (IDlinhaVenda) references linhaVenda (IDlinhaVenda)
)engine=InnoDB;



create table if not exists perfilPlano(
IDperfil int,
IDplano int unsigned,
dtaplano date not null,
constraint pk_perfilPlano_IDperfilPlano primary key (IDperfil, IDplano),
constraint fk_perfilPlano_IDperfil foreign key (IDperfil) references perfil (IDperfil),
constraint fk_perfilPlano_IDplano foreign key (IDplano) references plano(IDplano)
)engine=InnoDB;


create table if not exists perfilAula(
IDperfil int,
IDaula int unsigned,
constraint pk_perfilAula_IDperfilAula primary key (IDperfil, IDaula),
constraint fk_perfilAula_IDperfil foreign key (IDperfil) references perfil (IDperfil),
constraint fk_perfilAula_IDaula foreign key (IDaula) references aula(IDaula)
)engine=InnoDB;
