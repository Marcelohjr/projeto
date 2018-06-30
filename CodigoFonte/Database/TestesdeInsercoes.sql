use sublimeStore;
drop database sublimeStore;
show engines;
insert into Categorias(nome, sexo) values('Langerie', 'Feminino');
drop table Categorias;
select * from Categorias;
select * from Produtos;
update Produtos set descricaoResumida = 'aaaaaaaaaaaaaaaaaa' where idProduto = 7;
INSERT INTO Produtos(nomeProduto, descricaoResumida, marca, valorCusto, percentualLucro, desconto, categoria, quantidade,datadecadastro, qntvendas, genero) 
VALUES('calça jeans lisa', 'assldkaksskdakssjdkjaksjdjaskdkas', 'morena Rosa', 70.50, 30, 0.00, 6, 2, now(), 0, 1);
drop table Produtos;
INSERT INTO Enderecos(cidade, bairro, estado, cep, complemento, logradouro, endereco, numero, referencia)
values('Januária', 'Centro', 'MG', '39.480-000', 'Casa', 'Rua', 'Coronel Serrão', 680, 'proximo à rodoviária');
select * from Enderecos;
INSERT INTO Pessoas(nome, endereco, privilegio, telefone, email, pessoaImagem, dataNascimento, senha, sexo, cpf)
VALUES('João Victor Melo Lima', 1, 1, 997314982, 'victormelocr2@outlook.com', 'joao.jpg', '1998-07-21', '!@#$%', 'Masculino', '137.097.246-60');
select count(*) from Pessoas;
update Pessoas set dataNascimento = '1998-07-21' where idPessoa = 1;

drop table Enderecos;

select * from Enderecos;
select * from Comentarios;
