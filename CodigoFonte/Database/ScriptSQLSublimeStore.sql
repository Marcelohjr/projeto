create database sublimeStore;
use sublimeStore;
create table Enderecos(
	idEndereco int not null auto_increment,
	cidade varchar(100),
    bairro varchar(100),
    estado varchar(50),
    cep varchar(10),
    complemento varchar(20),
    logradouro varchar(50),
    endereco varchar(100), /*Nome da "rua"*/
    numero int,
    referencia text,
    primary key(idEndereco)
);
create table Pessoas(
	idPessoa int not null auto_increment,
    nome varchar(100),
    endereco int,
    privilegio boolean, /*Privilégio Administrador, 1 possui privilegio e 0 não possui */
    email varchar(100),
    telefone varchar(30),
    pessoaImagem text,
    dataNascimento date,
    senha varchar(50),
    sexo varchar(20),
    cpf varchar(15),
    primary key(idPessoa),
    foreign key(endereco) references Enderecos(idEndereco)
);
create table Categorias(
	idCategoria int not null auto_increment,
    nome varchar(100),
    sexo varchar(10),
    primary key(idCategoria)
);
create table Produtos(
	idProduto int not null auto_increment,
    nomeProduto varchar(200),
    descricaoResumida varchar(100),
    descricao text,
    marca varchar(100),
    valorCusto numeric(8,2),
    percentualLucro tinyint,
    desconto numeric(8,2),
    categoria int,
    quantidade int,
    datadecadastro datetime,
    qntvendas int,
    genero tinyint, 	/*o genêro é 1 para Feminino e 2 para Masculino e 3 para unissex*/
    primary key(idProduto),
    foreign key(categoria) references Categorias(idCategoria)
);
create table ProdutoImagens(
	idProdutoImagem int not null auto_increment,
    produto int, /*Referencia imagens referente a este produto*/
    enderecoImagem text,
    primary key(idProdutoImagem),
    foreign key(produto) references Produtos(idProduto)
);
create table Vendas(
	idVenda int not null auto_increment,
    cliente int,
    totalVenda numeric(8,2),
    primary key(idVenda),
    foreign key(cliente) references Pessoas(idPessoa)
);
create table ItemVenda(
	idItemVenda int not null auto_increment,
    fkVenda int not null,
    fkProduto int not null,
    primary key(idItemVenda),
    foreign key(fkVenda) references Vendas(idVenda),
	foreign key(fkProduto) references Produtos(idProduto)
);