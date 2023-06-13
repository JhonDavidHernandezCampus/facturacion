#CREATE DATABASE Ferrer;


USE HavertzZ;

USE daniela;

SHOW TABLES;

SELECT * FROM persons;

USE Maria;
DROP DATABASE Ferrer;
#de aqui para abajo esta el codigo 
CREATE DATABASE db_hunter_facture_jhon_ferrer;
USE db_hunter_facture_jhon_ferrer;


CREATE TABLE tb_bill(
    n_bill VARCHAR(25)NOT NULL PRIMARY KEY COMMENT 'Numero de factura',
    bill_date_bill DATETIME NOT NULL DEFAULT NOW() UNIQUE COMMENT 'Fecha de la Factura'
    );

CREATE TABLE tb_client(
    identificacion_client INT(25) NOT NULL PRIMARY KEY COMMENT 'número de identificacion unico cliente',
    full_name_client VARCHAR (50) NOT NULL  COMMENT 'nombre completo de cliente ',
    email_client VARCHAR(50) NOT NULL COMMENT 'email del cliente',
    address_client VARCHAR (70) NOT NULL COMMENT 'direccion del cliente',
    phone_client VARCHAR (11) NOT NULL COMMENT 'telefono del cliente'
);

CREATE TABLE tb_product(
    id_product INT(25) NOT NULL PRIMARY KEY COMMENT 'número del producto unico',
    name_product VARCHAR(15) NOT NULL  COMMENT 'nombre del producto',
    amount_product INT(3) NOT NULL COMMENT 'cantidad de productos',
    value_prodcut FLOAT(6) NOT NULL COMMENT 'valor del producto'
);

CREATE TABLE tb_seller(
    id_seller INTEGER(11) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT'Numero del vendedor',
    seller VARCHAR(60) NOT NULL COMMENT 'Nombre del vendedor'
);
#aqui estoy agregando las llaves foraneas y las relaciones
ALTER TABLE tb_bill ADD fk_id_client INT(25) NOT NULL COMMENT'Relacion de la tabla tb_client';
ALTER TABLE tb_bill ADD fk_id_seller INTEGER(11) NOT NULL COMMENT'Relacion con la tabla tb_seller';
ALTER TABLE tb_bill ADD fk_id_product INT(25) NOT NULL COMMENT 'Relacion con la tabla tb_product';

#AQUI ESTABLEVEMOS LOS CAMPOS COMO LAS LLAVES FORANEAS
ALTER TABLE tb_bill ADD CONSTRAINT fk_client FOREIGN KEY(fk_id_client) REFERENCES tb_client(identificacion_client); 
ALTER TABLE tb_bill ADD CONSTRAINT fk_id_seller FOREIGN KEY(fk_id_seller) REFERENCES tb_seller(id_seller);
ALTER TABLE tb_bill ADD CONSTRAINT fk_id_product FOREIGN KEY(fk_id_product) REFERENCES tb_product(id_product);

/* CREATE TABLE ft_personas(
    cc INT(11) NOT NULL,
    nombre VARCHAR(70) NOT NULL COMMENT 'se almacena el nombre de la persona completo',
    edad INTEGER(3) NOT NULL COMMENT 'se almacena la edad de la persona como entero',
    PRIMARY KEY(cc) COMMENT 'establecemos el campo cc como llave rpimario de la tabla'
);
 */