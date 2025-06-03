CREATE DATABASE diario;
use diario;

create table if not exists revista(
    cod_revista INT NOT NULL UNIQUE AUTO_INCREMENT,
    numero int not null,
    titulo varchar(50) not null,
    fecha_publicacion DATE,

    PRIMARY KEY(cod_revista, numero)
);

create table if not exists articulo(
    id_articulo int not null unique AUTO_INCREMENT,
    titulo varchar(50) not null unique,
    pagina_inicio INT,
    pagina_fin INT,
    PRIMARY key (id_articulo)
);

