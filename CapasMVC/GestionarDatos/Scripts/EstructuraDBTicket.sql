-- -----------------------------------------------------
-- Schema ticket
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ticket` ;
-- -----------------------------------------------------
-- Schema ticket
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ticket` DEFAULT CHARACTER SET utf8 ;
USE `ticket` ;
-- -----------------------------------------------------
-- Table `TipoDeContacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TipoDeContacto` (
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `Contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Contacto` (
  `valor` VARCHAR(100) NOT NULL,
  `ext` VARCHAR(45) NULL,
  `TipoDeContacto_nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`valor`),
  CONSTRAINT `fk_contacto_TipoDeContacto1` FOREIGN KEY (`TipoDeContacto_nombre`) REFERENCES `TipoDeContacto` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
CREATE INDEX `fk_contacto_TipoDeContacto1_idx` ON `Contacto` (`TipoDeContacto_nombre` ASC);
-- -----------------------------------------------------
-- Table `Central`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Central` (
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Usuario` (
  `correo` VARCHAR(100) NOT NULL,
  `clave` VARCHAR(100) NOT NULL,
  `Central_nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`correo`, `Central_nombre`),
  CONSTRAINT `fk_Usuario_Contacto1`
    FOREIGN KEY (`correo`)
    REFERENCES `Contacto` (`valor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_Central1`
    FOREIGN KEY (`Central_nombre`)
    REFERENCES `Central` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
CREATE INDEX `fk_Usuario_Contacto1_idx` ON `Usuario` (`correo` ASC) ;
CREATE INDEX `fk_Usuario_Central1_idx` ON `Usuario` (`Central_nombre` ASC) ;
-- -----------------------------------------------------
-- Table `Dispositivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Dispositivo` (
  `nombre` VARCHAR(100) NOT NULL,
  `Central_nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`nombre`),
  CONSTRAINT `fk_Dispositivo_Central1`
    FOREIGN KEY (`Central_nombre`)
    REFERENCES `Central` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
CREATE UNIQUE INDEX `name_UNIQUE` ON `Dispositivo` (`nombre` ASC) ;
CREATE INDEX `fk_Dispositivo_Central1_idx` ON `Dispositivo` (`Central_nombre` ASC) ;
-- -----------------------------------------------------
-- Table `Rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rol` (
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;
CREATE UNIQUE INDEX `rol_UNIQUE` ON `Rol` (`nombre` ASC);
-- -----------------------------------------------------
-- Table `Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Persona` (
  `nombres` VARCHAR(200) NOT NULL,
  `apellidos` VARCHAR(200) NOT NULL,
  `Rol_nombre` VARCHAR(100) NOT NULL,
  `Central_nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`apellidos`, `nombres`),
  CONSTRAINT `fk_Persona_Rol1`
    FOREIGN KEY (`Rol_nombre`)
    REFERENCES `Rol` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Persona_Central1`
    FOREIGN KEY (`Central_nombre`)
    REFERENCES `Central` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
CREATE INDEX `fk_Persona_Rol1_idx` ON `Persona` (`Rol_nombre` ASC) ;
CREATE INDEX `fk_Persona_Central1_idx` ON `Persona` (`Central_nombre` ASC);
-- -----------------------------------------------------
-- Table `Ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ticket` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `TipoDeTicket_nombre` VARCHAR(100) NOT NULL,
  `solicitud` VARCHAR(200) NOT NULL,
  `descripsion` VARCHAR(4000) NOT NULL,
  `archivo` LONGBLOB NOT NULL,
  `creacion` DATETIME NOT NULL,
  `cierre` DATETIME NOT NULL,
  `Dispositivo_nombre` VARCHAR(100) NOT NULL,
  `EstadoDelTicket_nombre` VARCHAR(100) NOT NULL,
  `Persona_nombres` VARCHAR(200) NOT NULL,
  `Persona_apellidos` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Ticket_Dispositivo1`
    FOREIGN KEY (`Dispositivo_nombre`)
    REFERENCES `Dispositivo` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ticket_Persona1`
    FOREIGN KEY (`Persona_apellidos` , `Persona_nombres`)
    REFERENCES `Persona` (`apellidos` , `nombres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
CREATE INDEX `fk_Ticket_Dispositivo1_idx` ON `Ticket` (`Dispositivo_nombre` ASC) ;
CREATE INDEX `fk_Ticket_Persona1_idx` ON `Ticket` (`Persona_apellidos` ASC, `Persona_nombres` ASC) ;
-- -----------------------------------------------------
-- Table `Rol_tiene_funcionalidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rol_tiene_funcionalidad` (
  `Rol_nombre` VARCHAR(100) NOT NULL,
  `funcionalidad` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Rol_nombre`, `funcionalidad`),
  CONSTRAINT `fk_Rol_tiene_Funcion_Rol1`
    FOREIGN KEY (`Rol_nombre`)
    REFERENCES `Rol` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
CREATE INDEX `fk_Rol_tiene_Funcion_Rol1_idx` ON `Rol_tiene_funcionalidad` (`Rol_nombre` ASC);

-- -----------------------------------------------------
-- Table `Actvidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Actvidad` (
  `Ticket_id` INT NOT NULL,
  `tiempo` DATETIME NOT NULL,
  `titulo` VARCHAR(100) NOT NULL,
  `archivo` LONGBLOB NOT NULL,
  `descripsion` VARCHAR(4000) NOT NULL,
  `TipoDeActividad_nombre` VARCHAR(100) NOT NULL,
  `observaciones` VARCHAR(4000) NOT NULL,
  PRIMARY KEY (`Ticket_id`, `tiempo`),
  CONSTRAINT `fk_Seguimiento_Ticket1`
    FOREIGN KEY (`Ticket_id`)
    REFERENCES `Ticket` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
CREATE INDEX `fk_Seguimiento_Ticket1_idx` ON `Actvidad` (`Ticket_id` ASC);
-- -----------------------------------------------------
-- Table `Persona_tiene_Contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Persona_tiene_Contacto` (
  `Persona_apellidos` VARCHAR(200) NOT NULL,
  `Persona_nombres` VARCHAR(200) NOT NULL,
  `Contacto_valor` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Persona_apellidos`, `Persona_nombres`, `Contacto_valor`),
  CONSTRAINT `fk_Persona_tiene_Contacto_Persona1`
    FOREIGN KEY (`Persona_apellidos` , `Persona_nombres`)
    REFERENCES `Persona` (`apellidos` , `nombres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Persona_tiene_Contacto_Contacto1`
    FOREIGN KEY (`Contacto_valor`)
    REFERENCES `Contacto` (`valor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
CREATE INDEX `fk_Persona_tiene_Contacto_Contacto1_idx` ON `Persona_tiene_Contacto` (`Contacto_valor` ASC);
CREATE INDEX `fk_Persona_tiene_Contacto_Persona1_idx` ON `Persona_tiene_Contacto` (`Persona_apellidos` ASC, `Persona_nombres` ASC);