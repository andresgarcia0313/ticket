drop database if exists ticket;
CREATE database IF NOT EXISTS ticket DEFAULT CHARACTER SET utf8;
USE ticket;
drop table if exists Usuario;
CREATE TABLE IF NOT EXISTS `Usuario` (
  `correo` VARCHAR(100) NOT NULL,
  `clave` VARCHAR(100) NOT null,
  PRIMARY KEY (`correo`)
);
drop table if exists Ticket;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `central` varchar(100) NOT NULL,
  `tipo_ticket` varchar(100) NOT NULL,
  `solicitud` varchar(200) NOT NULL,
  `descripsion` varchar(4000) NOT NULL,
  `archivo` longblob DEFAULT NULL,
  `creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `cierre` datetime DEFAULT NULL,
  `medidor` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `ext` varchar(5) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);
commit;
describe usuario;