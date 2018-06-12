create database sublimeStore;
use sublimeStore;
create table Enderecos(
	idEndereco int not null auto_increment,
	cidade varchar(100),
    bairro varchar(100),
    estado varchar(50),
    cep varchar(10),
    logradouro varchar(50),
    endereco varchar(100),
    numero tinyint,
    referencia text,
    primary key(idEndereco)
);
create table Pessoas(
	idPessoa int not null auto_increment,
    nome varchar(100),
    endereco int,
    email varchar(100),
    telefone varchar(30),
    dataNascimento date,
    senha varchar(50),
    cpf varchar(15),
    primary key(idPessoa),
    foreign key(endereco) references Enderecos(idEndereco)
);
create table Produtos(
	idProduto int not null auto_increment,
    nomeProduto varchar(200),
    valorCusto numeric(8,2),
    percentualLucro
);
create table Vendas(
	idVenda int not null auto_increment,
);
create table ItemVenda(
	idItemVenda int not null auto_increment,
    fkVenda int not null,
    fkProduto int not null,
    primary key(idItemVenda),
    foreign key(fkVenda) references Vendas(idVenda),
	foreign key(fkProduto) references Vendas(idProduto)
);