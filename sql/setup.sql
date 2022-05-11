drop database if exists contacts_app;

create database contacts_app;

use contacts_app;

create table contacts (
    id int auto_increment primary key,
    name varchar(255),
    user_id INT NOT NULL,
    phone_number varchar(255),

    FOREIGN KEY (user_id) REFERENCES users(id)
);
create Table users (
    id int auto_increment PRIMARY KEY,
    name varchar (255),
    email varchar (255),
    password varchar(255)
);



