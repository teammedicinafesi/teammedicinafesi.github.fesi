CREATE TABLE sistemas(
	id_sistema INT NOT NULL AUTO_INCREMENT,
	sistema varchar(100) NOT NULL,
	slug_sistema varchar(120) NOT NULL,
	primary key(id_sistema)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE especialidades(
	id_especialidad INT NOT NULL AUTO_INCREMENT,
	especialidad varchar(100) NOT NULL,
	slug_especialidad varchar(120) NOT NULL,
	primary key(id_especialidad)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE usuarios(
	id_usuario INT NOT NULL AUTO_INCREMENT,
	nombre varchar(100) NOT NULL,
	correo varchar(120) NOT NULL,
	password varchar(20) NOT NULL,
	primary key(id_usuario)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE nombres_padecimientos(
	id_nombre_padecimiento INT NOT NULL AUTO_INCREMENT,
	id_codigo INT NOT NULL,
	id_usuario INT NOT NULL,
	padecimiento varchar(200) NOT NULL,
	fecha_registro datetime NOT NULL,
	primary key(id_nombre_padecimiento)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE codigos_padecimientos(
	id_codigo INT NOT NULL AUTO_INCREMENT,
	codigo varchar (100) NOT NULL,
	id_usuario INT NOT NULL,
	fecha_registro datetime NOT NULL,
	primary key(id_codigo)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;