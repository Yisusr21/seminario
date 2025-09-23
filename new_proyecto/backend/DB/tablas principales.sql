CREATE DATABASE diario;
use diario;

create table if not exists revista(
    cod_revista INT NOT NULL UNIQUE AUTO_INCREMENT,
    numero int not null,
    titulo_revista varchar(50) not null,
    fecha_publicacion DATE,

    PRIMARY KEY(cod_revista, numero)
);

create table if not exists articulo(
    id_articulo int not null unique AUTO_INCREMENT,
    titulo_articulo varchar(50) not null unique,
    pagina_inicio INT,
    pagina_fin INT,
    PRIMARY key (id_articulo)
);

create table if not exists revista_articulo(
    cod_revista int not null,
    numero int not null,
    id_articulo int not null,
    primary key (cod_revista, numero, id_articulo),
    Foreign Key (cod_revista, numero) REFERENCES revista(cod_revista, numero),
    Foreign Key (id_articulo) REFERENCES articulo(id_articulo)
);

create table if not exists autor(
    cod_autor int not null unique AUTO_INCREMENT,
    nombre_autor varchar(100) not null,
    correo_electronico varchar(50) not null,
    cod_nacionalidad int not null unique,
    primary key (cod_autor),
    Foreign Key (cod_nacionalidad) REFERENCES nacionalidad(cod_nacionalidad)
);

create table if not exists nacionalidad(
    cod_nacionalidad int not null unique AUTO_INCREMENT,
    desc_nacionlidad varchar(50) not null,
    primary key (cod_nacionalidad)
);

create table if not exists articulo_autor(
    cod_autor int not null,
    id_articulo int not null,
    posicion_autor int not null,
    primary key (cod_autor, id_articulo),
    Foreign Key (id_articulo) REFERENCES articulo(id_articulo),
    Foreign Key (cod_autor) REFERENCES autor(cod_autor)
);

