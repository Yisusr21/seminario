CREATE DATABASE if not exists Hospital;

use hospital;

create table if not exists unidad (
	id_unidad int not null unique auto_increment,
	nombre_unidad varchar(10) not null unique,
    planta varchar(3) not null unique,
    id_medico int not null,
    #precio decimal(20, 2) not null,
    primary key(id_unidad),
    FOREIGN KEY (id_medico) REFERENCES medico(id_medico)
);
    
create table if not exists medico (
	id_medico int not null unique auto_increment,
    nombre varchar(11) not null,
    apellido varchar(11) not null,
    domicilio varchar(11) not null,
    primary key(id_medico));
    
    create table if not exists medico_telef(
    id_medico int not null unique,
    telefono int null unique,
    primary key(id_medico,telefono),
    foreign key(id_medico) references medico(id_medico));

    
	create table if not exists especialidad(
	id_especialidad int not null unique auto_increment,
	descripcion int(11) not null, 
    primary key(id_especialidad));
    
create table if not exists intervencion(
	id_intervencion int not null unique auto_increment,
	descripcion varchar(22) not null unique,
    costo decimal(10,2) not null unique,
    primary key(id_intervencion));
    
    create table if not exists medico_especialidad(
    id_medico int not null unique,
    id_especialidad int not null unique,
    primary key(id_medico,id_especialidad),
    foreign key(id_medico) references medico(id_medico),
    foreign key(id_especialidad) references especialidad(id_especialidad));
    
create table if not exists sintoma(
	id_sintoma int not null unique auto_increment,
	descripcion_sinto varchar(22) not null unique,
    primary key(id_sintoma));
    
create table if not exists tratamiento(
	id_tratamiento int not null unique auto_increment,
	descripcion_trata varchar(22) not null unique,
    costo decimal(10,2) not null unique,
    primary key(id_tratamiento));

create table if not exists historia_clinica (
	id_historia int not null unique auto_increment,
    id_intervencion int not null unique,
    fecha_intervencion date,
    id_unidad int not null unique,
    id_medico int not null unique,
    id_paciente int not null unique,
    id_sintoma int not null unique,
    id_tratamiento int not null unique,
    primary key(id_historia, id_intervencion, fecha_intervencion),
    foreign key(id_unidad) references unidad(id_unidad),
    foreign key(id_medico) references medico(id_medico),
    foreign key(id_sintoma) references sintoma(id_sintoma),
    foreign key(id_paciente) references paciente(id_paciente),
    foreign key(id_tratamiento) references tratamiento(id_tratamiento),
    foreign key(id_intervencion) references intervencion(id_intervencion));
    
    
create table if not exists obra_social_plan(
	id_obra_social int not null unique,
    id_plan int not null unique,
    descripcion varchar(33) not null,
    cobertura_internacion int(2) not null,
    cobertura_practica_medica int(2) not null,
    cobertura_farmacia int(2) not null,
    primary key(id_obra_social, id_plan),
    foreign key(id_obra_social) references obra_social(id_obra_social));
    
    create table if not exists obra_social(
    id_obra_social int not null unique auto_increment,
    descripcion varchar(20),
    primary key(id_obra_social));
    
    create table if not exists paciente(
    id_paciente int not null unique auto_increment,
    dni int not null unique,
    nombre varchar(20),
    apellido varchar(20),
    domicilio varchar(20),
    fecha_nacimiento date,
    id_obra_social int not null,
    id_plan int not null,
	primary key(id_paciente),
    foreign key(id_obra_social) references obra_social(id_obra_social),
    foreign key(id_plan) references obra_social_plan(id_plan));
    
    
    
    
    
