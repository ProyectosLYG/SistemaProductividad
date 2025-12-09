CREATE DATABASE desemp;

USE desemp;

CREATE TABLE users (
	id VARCHAR(50) NOT NULL PRIMARY KEY,
	username varchar(50) NOT NULL,
	email varchar(100) NOT NULL UNIQUE, 
	emailVer BOOLEAN,
	pwd varchar(255) NOT NULL,
	created DATETIME DEFAULT CURRENT_TIMESTAMP,
	updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE user_verification (
	userId VARCHAR(50) PRIMARY KEY,
	code VARCHAR(10),
	FOREIGN KEY ( userId ) REFERENCES users( id ) ON DELETE CASCADE
);

CREATE TABLE user_roles (
	UserId VARCHAR(50) NOT NULL PRIMARY KEY,
	role ENUM('admin','researcher','student','leadership') default 'student',
	FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE user_profile (
	userId VARCHAR(50) NOT NULL PRIMARY KEY,
	firstName VARCHAR(50),
    lastName VARCHAR(50),
    area VARCHAR(50),
    bio TEXT,
    avatarUrl VARCHAR(255),
    FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE
);

#limbo
CREATE TABLE user_sessions (
	userId VARCHAR(50) PRIMARY KEY,
	session_token VARCHAR(255),
	last_login DATETIME,
	FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE	
);


CREATE TABLE chap_book(
	idLibro int PRIMARY KEY AUTO_INCREMENT,
	userId int NOT NULL,
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
	fechaAdicion DATETIME DEFAULT CURRENT_TIMESTAMP,
	evidencia VARCHAR(255) NOT NULL,
	evidencia2 VARCHAR(255),
	evidencia3 VARCHAR(255),
	FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE articulos (
	idArticulo INT AUTO_INCREMENT PRIMARY KEY,
	userId INT NOT NULL,
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
    FOREIGN KEY (userId) REFERENCES users(id)
);

CREATE TABLE tesis (
	idTesis INT PRIMARY KEY AUTO_INCREMENT,
	userId INT NOT NULL,
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
	FOREIGN KEY (userId) REFERENCES users(id)
);

CREATE TABLE congreso (
	userId int not null,
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
	FOREIGN KEY (userId) REFERENCES users(id)
);




