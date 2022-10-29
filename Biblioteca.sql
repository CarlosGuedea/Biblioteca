create database Biblioteca;
use Biblioteca;
create table Login(
No_cuenta varchar(8) primary key not null,
contrasena varchar(200) not null
);
create table Libros(
nombre varchar(50),
autor varchar(50),
editorial varchar(50),
stock int
);
Insert into Libros (nombre,autor,editorial,stock) values('El principito','Antoine','Pearson',4),
('La divina comedia','Dante','McGraw-Hill',5);