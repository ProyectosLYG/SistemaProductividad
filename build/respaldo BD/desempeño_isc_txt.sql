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

CREATE TABLE user_roles (
	user_id INT NOT NULL PRIMARY KEY,
	role ENUM('admin','researcher','student') default 'student',
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE user_profile (
	user_id INT NOT NULL PRIMARY KEY,
	first_name VARCHAR(50),
    last_name VARCHAR(50),
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
	FOREIGN KEY (id_res) REFERENCES users(id)
);

drop table chap_book;













