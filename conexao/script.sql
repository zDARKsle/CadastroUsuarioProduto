create database loja;

use loja;

create table produtos(
	id int not null auto_increment primary key,
    descricao varchar(100) not null,
    custo decimal(12,2) not null,
    fornecedor varchar(100) not null,
    foto varchar(50)
);

create table usuarios(
	id int not null auto_increment primary key,
    nome varchar(100)not null,
    email varchar(100)not null,
    senha int not null,
    foto varchar(50)not null
);
select * from produtos;
select * from usuarios;