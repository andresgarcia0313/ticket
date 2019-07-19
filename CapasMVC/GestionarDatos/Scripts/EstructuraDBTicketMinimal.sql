-- -----------------------------------------------------
-- Schema ticket
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ticket` DEFAULT CHARACTER SET utf8 ;
USE `ticket` ;
-- -----------------------------------------------------
-- Table `Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Usuario` (
  `correo` VARCHAR(100) NOT NULL,
  `clave` VARCHAR(100) NOT NULL,
  `central` VARCHAR(100),
  PRIMARY KEY (`correo`, `central`))
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `Ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ticket` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `central` VARCHAR(100) NOT NULL,
  `tipo_ticket` VARCHAR(100) NOT NULL,
  `solicitud` VARCHAR(200) NOT NULL,
  `descripsion` VARCHAR(4000) NOT NULL,
  `archivo` LONGBLOB NOT NULL,
  `creacion` DATETIME NOT NULL,
  `cierre` DATETIME NOT NULL,
  `medidor` VARCHAR(100) NOT NULL,
  `estado` VARCHAR(100) NOT NULL,
  `nombres` VARCHAR(200) NOT NULL,
  `apellidos` VARCHAR(200) NOT NULL,
  `telefono` VARCHAR(20) NOT NULL,
  `ext` VARCHAR(5) NOT NULL,
  `celular` VARCHAR(20) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;