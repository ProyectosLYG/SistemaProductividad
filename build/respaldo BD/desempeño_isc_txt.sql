CREATE DATABASE desemp;

USE desemp;

CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username varchar(50) NOT NULL,
	email varchar(100) NOT NULL UNIQUE, 
	email_ver BOOLEAN,
	pwd varchar(255) NOT NULL,
	created DATETIME DEFAULT CURRENT_TIMESTAMP,
	updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE user_verification (
	id_user int not null,
	code varchar(10),
	FOREIGN KEY ( id_user ) REFERENCES users( id ) ON DELETE CASCADE
);

CREATE TABLE user_roles (
	user_id INT NOT NULL PRIMARY KEY,
	role ENUM('admin','researcher','student','leadership') default 'student',
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE user_profile (
	user_id INT NOT NULL PRIMARY KEY,
	first_name VARCHAR(50),
    last_name VARCHAR(50),
    area VARCHAR(50),
    bio TEXT,
    avatar_url VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE user_sessions (
	id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
	session_token VARCHAR(255) UNIQUE,
	last_login DATETIME,
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE	
);


CREATE TABLE chap_book(
	idLibro int PRIMARY KEY AUTO_INCREMENT,
	id_res int,
	tituloCapitulo varchar(150) NOT NULL,
	resumen VARCHAR(850) NOT NULL,
	autores VARCHAR(150) NOT NULL,
	posicionAuto INT,
	paginas VARCHAR(9) NOT NULL,
	
	sectorEstrategico VARCHAR(50) NOT NULL, 
	areaConocimiento VARCHAR(50) NOT NULL,	

	tituloLibro VARCHAR(150) NOT NULL,
	edicion VARCHAR(5) NOT NULL,
	casaEditorial VARCHAR(60) NOT NULL,
	fechaPublicacion DATE NOT NULL,
	isbn VARCHAR(26) NOT NULL,
	editorial VARCHAR(60) NOT NULL,
	evidencia VARCHAR(255) NOT NULL,
	evidencia2 VARCHAR(255),
	evidencia3 VARCHAR(255),
	FOREIGN KEY (id_res) REFERENCES users(id) ON DELETE CASCADE
);

drop table chap_book;

CREATE TABLE articulos (
	idArticulo INT AUTO_INCREMENT PRIMARY KEY,
	id_res INT NOT NULL,
    tituloArticulo VARCHAR(150),
    nombreRevista VARCHAR(150),
    autoresArticulo VARCHAR(150),
    propositoAutor VARCHAR(50),
    resumen VARCHAR(850),
    estadoArticulo VARCHAR(50),
    fechaArticulo DATE ,
    casaEditorial VARCHAR(50),
    sectorArticulo VARCHAR(50),
    areaConocimiento VARCHAR(50),
    tipoArticulo VARCHAR(50),
    rangoPaginas VARCHAR(10),
    indiceRegistro VARCHAR(30),
    issn VARCHAR(25),
    FOREIGN KEY (id_res) REFERENCES users(id)
);

CREATE TABLE tesis (
	id_res INT NOT NULL,
	idTesis INT PRIMARY KEY AUTO_INCREMENT,
	tituloTesis VARCHAR(100),
	grado VARCHAR(50),
	proposito VARCHAR(50),
	autores VARCHAR(100),
	estado VARCHAR(35),
	fecha DATE,
	descripcion VARCHAR(350),
	sector VARCHAR(35),
	area VARCHAR(40),
	evidencia1 VARCHAR(200),
	evidencia2 VARCHAR(200),
	evidencia3 VARCHAR(200),
	FOREIGN KEY (id_res) REFERENCES users(id)
);

CREATE TABLE congreso (
	id_res int not null,
	idCongreso int primary key not null auto_increment,
	nombreCongreso VARCHAR(100),
	acronimo VARCHAR(100),
	intisucion VARCHAR(100),
	pais VARCHAR(75),
	ciudad VARCHAR(50),
	modo VARCHAR(50),
	area VARCHAR(50),
	nivel VARCHAR(50),
	fecha DATE,
	rol VARCHAR(50),
	tituloProyecto VARCHAR(100),
	tipo VARCHAR(50),
	FOREIGN KEY (id_res) REFERENCES users(id)
);






