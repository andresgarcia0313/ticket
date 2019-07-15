CREATE TABLE ticket.Usuario (
	correo varchar(100) NOT NULL,
	clave varchar(100) NOT NULL,
	CONSTRAINT Usuario_PK PRIMARY KEY (correo)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci
COMMENT='La tabla usuario almacenara la información de los individuos a loguearse se debe tener claro que un individuo puede ser una central con varias personas que utilizan el mismo correo para loguearse dentro del sistema';
