CREATE DATABASE if not exists ejemplo1;

use ejemplo1;

create table if not exists articulo (
	id_articulo int not null unique auto_increment,
    codigo varchar(20) not null unique,
    descripcion varchar(60) not null,
    precio decimal(20, 2) not null,
    primary key(id_articulo));
    
create table if not exists cliente (
	id_cliente int not null unique auto_increment,
    nombre varchar(85) not null);
    
    create table if not exists venta (
    id_venta int not null unique auto_increment, 
    id_cliente int not null,
    id_articulo int not null, 
    precio_unitario decimal(20,2) not null, 
    cantidad decimal (5,2) not null, 
    total decimal(20,2) not null, 
    primary key (id_venta), 
    foreign key (id_cliente)references cliente(id_cliente), 
    foreign key (id_articulo)references articulo(id_articulo)
    );
    
SELECT * FROM cliente
