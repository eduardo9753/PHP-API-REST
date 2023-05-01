# API REST PHP-MVC-PDO
Aplicativo Web para el consumo de datos (CLIENTE-SERVIDOR).
------------

HERRAMIENTAS :
- Base de Datos: MySQL.
- Estilos: CSS3 y Bootstrap 4.
- Lenguaje : Lenguaje PHP.

## Arquitectura MVC
1. MODELO: representación de los datos que maneja el sistema, su lógica de negocio, y sus mecanismos de persistencia.
2. VISTA: Información que se envía al cliente y los mecanismos interacción con éste.
3. CONTROLADOR: intermediario entre el Modelo y la Vista, gestionando el flujo de información entre ellos y las transformaciones para adaptar los datos a las necesidades de cada uno.

## Imagenes
POSTMAN:
- 1
![1](https://user-images.githubusercontent.com/68178186/235515380-f716e22b-d8e4-40a3-a0b9-69bfdcc8586e.PNG)
- 2
![2](https://user-images.githubusercontent.com/68178186/235515398-0da8f48f-f3c3-4ffc-9655-6afbb294f511.PNG)
- 3
![3](https://user-images.githubusercontent.com/68178186/235515406-7365b340-2252-47e7-82ac-58a40dba76de.PNG)
- 4
![4](https://user-images.githubusercontent.com/68178186/235515417-12ac8c94-ce3c-425d-9c51-2845bffb9b99.PNG)



### SCRIPT DE LA BASE DE DATOS
````sql
CREATE DATABASE Zapatosphp DEFAULT CHARACTER SET UTF8;
SET default_storage_engine = INNODB;

USE Zapatosphp;


#TABLE USUARIOS 
create table dboUsuarios(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(40) NOT NULL,
    email VARCHAR(200) NOT NULL,
    pass VARCHAR(255)  NOT NULL
)ENGINE=InnoDB default charset=UTF8MB4;

 
#TABLE TALLA
create table dbotalla(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    talla VARCHAR(45)  NOT NULL
)ENGINE=InnoDB default charset=utf8mb4;


#TABLE STYLES
create table dboestilo(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    estilo VARCHAR(45) NOT NULL
)ENGINE=InnoDB default charset=utf8mb4;


#TABLE GENERO
create table dbogenero(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    genero VARCHAR(45) NOT NULL
)ENGINE=InnoDB default charset=utf8mb4;


create table dbozapato(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    foto VARCHAR(50)  NOT NULL, #originalname
    precio DOUBLE     NOT NULL,
    color VARCHAR(45) NOT NULL,
    cantidad INT      NOT NULL, 
    id_dboUsuarios INT(11) NULL, #foreing key dboUsuarios
  
    dboestilo_id INT NOT NULL, #foreign key tables
    dbotalla_id  INT NOT NULL, #foreign key tables
    dbogenero_id INT NOT NULL, #foreign key tables
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB default charset=utf8mb4;



#----------------------------------------------------------------------
#LLAVES UNICAS
#----------------------------------------------------------------------
ALTER TABLE dboUsuarios
ADD CONSTRAINT UK_idUsuario UNIQUE KEY(id);

ALTER TABLE dbotalla
ADD CONSTRAINT UK_idtalla UNIQUE KEY(id);

ALTER TABLE dboestilo
ADD CONSTRAINT UK_idestilo UNIQUE KEY(id);

ALTER TABLE dbogenero
ADD CONSTRAINT UK_idgenero UNIQUE KEY(id);

ALTER TABLE dbozapato
ADD CONSTRAINT UK_id_zapato UNIQUE KEY(id);



#----------------------------------------------------------------------
#LLAVES FORANEAS
#----------------------------------------------------------------------
 ALTER TABLE dbozapato
 ADD CONSTRAINT FK_dboestilo_idestilo FOREIGN KEY (dboestilo_id) 
 REFERENCES `dboestilo`(id);

 ALTER TABLE dbozapato
 ADD CONSTRAINT FK_dbotalla_idtalla FOREIGN KEY (dbotalla_id) 
 REFERENCES `dbotalla`(id);

 ALTER TABLE dbozapato
 ADD CONSTRAINT FK_dbogenero_idgenero FOREIGN KEY (dbogenero_id)
 REFERENCES `dbogenero`(id);

 ALTER TABLE dbozapato
 ADD CONSTRAINT FK_idUser FOREIGN KEY (id_dboUsuarios)
 REFERENCES `dboUsuarios`(id);
#----------------------------------------------------------------------

````

