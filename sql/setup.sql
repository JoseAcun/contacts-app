drop database if exists contacts_app;

create database contacts_app;

use contacts_app

create table contacts (
    id int auto_increment primary key
    name varchar(255)
    phone_number varchar(255)
);
create Table users (
    id int auto_increment PRIMARY KEY,
    name varchar (255),
    email varchar (255),
    password varchar(255)
);

insert into contacts (name, phone_number) values ("pepe", "3123214124");


