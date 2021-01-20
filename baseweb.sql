CREATE DATABASE pruebas;
use pruebas;
create table productos (
cod varchar(100) primary key not null,
descripcion varchar(100),
precio int not null,
stock int not null);

create table clientes (
nombre varchar (100) not null,
apellidos varchar(100) not null,
dni varchar(9) primary key not null,
email varchar(100) not null,
fecha date not null);
