CREATE DATABASE IF NOT EXISTS FORMULARIO;
USE FORMULARIO;

create table if not exists formulario (
	id_formulario int unique auto_increment,
	email varchar(50),
    nombre varchar(50),
    fechareg date,
    primary key (id_formulario)
);

select * from formulario


