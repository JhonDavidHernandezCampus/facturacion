#CREATE DATABASE Ferrer;


USE HavertzZ;

USE daniela;

SHOW TABLES;

SELECT * FROM persons;

USE Ferrer;

CREATE TABLE ft_personas(
    cc INT(11) NOT NULL,
    nombre VARCHAR(70) NOT NULL COMMENT 'se almacena el nombre de la persona completo',
    edad INTEGER(3) NOT NULL COMMENT 'se almacena la edad de la persona como entero',
    PRIMARY KEY(cc) COMMENT 'establecemos el campo cc como llave rpimario de la tabla'
);
