create database if not exists Fincapp;
use Fincapp;

###  tabla email
create table email(
id int primary key,
correo varchar(50),
dominio varchar(50)
);

### tabla telefonos
create table telefono(
id int primary key ,
prefijo int,
numero bigint
);

### tabla persona 

Create table persona(
id int primary key,
tipo_persona  varchar(50),
nom1 varchar(50),
nom2 varchar(50),
ap1 varchar(50),
ap2 varchar(50),
id_email int,
id_telefono int,
foreign key (id_email) references email(id),
foreign key (id_telefono) references telefono(id)
);

### tabla trabajador
create table trabajador(
id int primary key,
sueldo float,
id_persona int,
foreign key (id_persona) references persona(id)
);

### tabla metodo de pago

create table metodopago(
id int primary key,
metodo_pago varchar(50)
);

###  tabla pago

create table pago(
id int primary key,
id_metodopago int,
foreign key (id_metodopago) references metodopago(id)
);

### tabla categorias

create table categoria(
id int primary key,
nom_cat varchar(50),
icono blob
);

### tabla producto

create table producto(
id int primary key,
nombre varchar(50),
valor_unit float,
descripcion text,
id_categoria int,
foreign key (id_categoria) references categoria(id)
);

### tabla administrador
create table administrador(
id int primary key,
usuario varchar(25),
contraseña varchar(25),
id_persona int,
foreign key (id_persona) references persona(id)
);

###  tabla moviemiuento
create table movimiento(
cantidad int,
fecha date,
descripcion_movimiento text,
id_persona int,
id_pago int,
id_producto int,
foreign key (id_producto) references producto(id),
foreign key (id_pago) references pago(id),
foreign key (id_persona) references persona(id)
);

### drop table persona;
##drop database Fincapp;
