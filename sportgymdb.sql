<<<<<<< Updated upstream
/*
TeSP_PSI_1819_CDBD
SportGym Ginásios
Gonçalo Manuel Ferreria Oliveira, - nº2180654
Ricardo Fernandes Marques, - nº2180604
Samuel Jorge Perdigão Martins, - nº2180641
*/


create database SportGymDB;

use SportGymDB;

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
dtaplano date not null,
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
=======
USE sportgymdb;
-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 20-Nov-2019 às 12:18
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportgymdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adesoes`
--

DROP TABLE IF EXISTS `adesoes`;
CREATE TABLE IF NOT EXISTS `adesoes` (
  `IDadesao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dtaInicio` date NOT NULL,
  `dtaFim` date DEFAULT NULL,
  `IDginasio` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`IDadesao`),
  KEY `fk_adesoes_IDginasio` (`IDginasio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE IF NOT EXISTS `aulas` (
  `IDaula` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `dtaInicio` datetime NOT NULL,
  `duracao` time NOT NULL,
  `IDperfil` int(11) DEFAULT NULL,
  `IDginasio` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`IDaula`),
  KEY `fk_aulas_IDperfil` (`IDperfil`),
  KEY `fk_aulas_IDginasio` (`IDginasio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ginasios`
--

DROP TABLE IF EXISTS `ginasios`;
CREATE TABLE IF NOT EXISTS `ginasios` (
  `IDginasio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contacto` varchar(15) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `localidade` varchar(255) NOT NULL,
  `cp` varchar(15) NOT NULL,
  PRIMARY KEY (`IDginasio`),
  UNIQUE KEY `contacto` (`contacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhavendas`
--

DROP TABLE IF EXISTS `linhavendas`;
CREATE TABLE IF NOT EXISTS `linhavendas` (
  `IDlinhaVenda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `subTotal` float NOT NULL,
  `IDvenda` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`IDlinhaVenda`),
  KEY `fk_linhaVendas_IDvenda` (`IDvenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1574252200),
('m130524_201442_init', 1574252203),
('m190124_110200_add_verification_token_column_to_user_table', 1574252203),
('m140506_102106_rbac_init', 1574252258),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1574252258),
('m180523_151638_rbac_updates_indexes_without_prefix', 1574252258);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

DROP TABLE IF EXISTS `perfis`;
CREATE TABLE IF NOT EXISTS `perfis` (
  `IDperfil` int(11) NOT NULL,
  `nSocio` int(10) UNSIGNED NOT NULL,
  `foto` blob,
  `primeiroNome` varchar(50) NOT NULL,
  `apelido` varchar(30) NOT NULL,
  `genero` enum('M','F') NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `dtaNascimento` date NOT NULL,
  `rua` varchar(15) NOT NULL,
  `localidade` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `nif` varchar(15) NOT NULL,
  `peso` double DEFAULT NULL,
  `altura` double DEFAULT NULL,
  PRIMARY KEY (`IDperfil`),
  UNIQUE KEY `nSocio` (`nSocio`),
  UNIQUE KEY `telefone` (`telefone`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfisaulas`
--

DROP TABLE IF EXISTS `perfisaulas`;
CREATE TABLE IF NOT EXISTS `perfisaulas` (
  `IDperfil` int(11) NOT NULL,
  `IDaula` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`IDperfil`,`IDaula`),
  KEY `fk_perfisAulas_IDaula` (`IDaula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfisplanos`
--

DROP TABLE IF EXISTS `perfisplanos`;
CREATE TABLE IF NOT EXISTS `perfisplanos` (
  `IDperfil` int(11) NOT NULL,
  `IDplano` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`IDperfil`,`IDplano`),
  KEY `fk_perfisPlanos_IDplano` (`IDplano`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

DROP TABLE IF EXISTS `planos`;
CREATE TABLE IF NOT EXISTS `planos` (
  `IDplano` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `nutricao` tinyint(1) NOT NULL,
  `treino` tinyint(1) NOT NULL,
  `descricao` varchar(5000) DEFAULT NULL,
  `dtaplano` date NOT NULL,
  `IDperfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDplano`),
  KEY `fk_planos_IDperfil` (`IDperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `IDproduto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `fotoProduto` blob NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `precoProduto` double NOT NULL,
  `IDlinhaVenda` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`IDproduto`),
  KEY `fk_produtos_IDlinhaVenda` (`IDlinhaVenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `IDvenda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado` tinyint(1) NOT NULL,
  `dataVenda` date NOT NULL,
  `total` float NOT NULL,
  `IDperfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDvenda`),
  KEY `fk_vendas_IDperfil` (`IDperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `adesoes`
--
ALTER TABLE `adesoes`
  ADD CONSTRAINT `fk_adesoes_IDginasio` FOREIGN KEY (`IDginasio`) REFERENCES `ginasios` (`IDginasio`);

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_aulas_IDginasio` FOREIGN KEY (`IDginasio`) REFERENCES `ginasios` (`IDginasio`),
  ADD CONSTRAINT `fk_aulas_IDperfil` FOREIGN KEY (`IDperfil`) REFERENCES `perfis` (`IDperfil`);

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `linhavendas`
--
ALTER TABLE `linhavendas`
  ADD CONSTRAINT `fk_linhaVendas_IDvenda` FOREIGN KEY (`IDvenda`) REFERENCES `vendas` (`IDvenda`);

--
-- Limitadores para a tabela `perfis`
--
ALTER TABLE `perfis`
  ADD CONSTRAINT `fk_perfis_IDperfil` FOREIGN KEY (`IDperfil`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `perfisaulas`
--
ALTER TABLE `perfisaulas`
  ADD CONSTRAINT `fk_perfisAulas_IDaula` FOREIGN KEY (`IDaula`) REFERENCES `aulas` (`IDaula`),
  ADD CONSTRAINT `fk_perfisAulas_IDperfil` FOREIGN KEY (`IDperfil`) REFERENCES `perfis` (`IDperfil`);

--
-- Limitadores para a tabela `perfisplanos`
--
ALTER TABLE `perfisplanos`
  ADD CONSTRAINT `fk_perfisPlanos_IDperfil` FOREIGN KEY (`IDperfil`) REFERENCES `perfis` (`IDperfil`),
  ADD CONSTRAINT `fk_perfisPlanos_IDplano` FOREIGN KEY (`IDplano`) REFERENCES `planos` (`IDplano`);

--
-- Limitadores para a tabela `planos`
--
ALTER TABLE `planos`
  ADD CONSTRAINT `fk_planos_IDperfil` FOREIGN KEY (`IDperfil`) REFERENCES `perfis` (`IDperfil`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_IDlinhaVenda` FOREIGN KEY (`IDlinhaVenda`) REFERENCES `linhavendas` (`IDlinhaVenda`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_IDperfil` FOREIGN KEY (`IDperfil`) REFERENCES `perfis` (`IDperfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
>>>>>>> Stashed changes
