CREATE TABLE modulos(
	id_modulo INT NOT NULL AUTO_INCREMENT,
	modulo varchar(50) NOT NULL,
	link varchar(50) NOT NULL,
	primary key(id_modulo)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE cuestionarios(
	id_cuestionario INT NOT NULL AUTO_INCREMENT,
	id_modulo INT NOT NULL,
	cuestionario varchar(140) NOT NULL,
	posicion int NOT NULL,
	primary key(id_cuestionario)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE preguntas(
	id_pregunta INT NOT NULL AUTO_INCREMENT,
	id_cuestionario INT NOT NULL,
	pregunta varchar(400) NOT NULL,
	opcion_a varchar(400) NOT NULL,
	opcion_b varchar(400) NOT NULL,
	opcion_c varchar(400) NOT NULL,
	opcion_d varchar(400) NOT NULL,
	opcion_e varchar(400) NOT NULL,
	correcto varchar(1) NOT NULL
	primary key(id_pregunta)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;