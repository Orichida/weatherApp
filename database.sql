DROP DATABASE IF EXISTS meteo;

CREATE DATABASE meteo CHARACTER SET utf8 COLLATE utf8_general_ci;

USE meteo;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    login VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
) ENGINE=InnoDB;
CREATE TABLE warnings (
    idWarning INT PRIMARY KEY AUTO_INCREMENT,
	id INT REFERENCES users(id),
    nbr INT,
    banDate DATETIME
) ENGINE=InnoDB;

CREATE TABLE history (
    idPlace INT,
	idUser INT REFERENCES users(id),
    flag VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    admin1 VARCHAR(50) NOT NULL,
    lat NUMERIC(5, 3) NOT NULL,
    longi NUMERIC(5, 3) NOT NULL,
    PRIMARY KEY(idPlace,idUser)
) ENGINE=InnoDB;

INSERT INTO users VALUES (null,'Yahyaoui','Chahine','orichida',md5('12345'));

SELECT * FROM users;
SELECT * FROM history;
