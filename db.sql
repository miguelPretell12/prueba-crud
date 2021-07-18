create database users;

use users;

CREATE TABLE usuarios (
    id int auto_increment PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    dni VARCHAR(50),
    correo VARCHAR(150),
    pass VARCHAR(50)
)