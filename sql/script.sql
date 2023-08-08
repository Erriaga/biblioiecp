CREATE DATABASE IF NOT EXISTS dbbi;
USE dbbi;

CREATE TABLE livro(
id_livro INT(4) NOT NULL AUTO_INCREMENT,
nome_livro VARCHAR(1000) NOT NULL,
autor_livro VARCHAR(1000) NOT NULL,
var_livro VARCHAR(2500) NOT NULL,
editora_livro VARCHAR(1000) NOT NULL,
genero_livro VARCHAR(50) NOT NULL,
prateleira_livro CHAR(2) NOT NULL,
edicao_livro INT(4) NOT NULL,
ano_livro INT(4) NOT NULL,
vol_livro INT(3) NOT NULL,
desc_livro VARCHAR(2000) NOT NULL,
foto_livro VARCHAR(45) NOT NULL,
PRIMARY KEY (id_livro));

CREATE TABLE usuario(
id_usuario INT(4) NOT NULL AUTO_INCREMENT,
nick_usuario VARCHAR(50) NOT NULL,
full_usuario VARCHAR(1000) NOT NULL,
idade_usuario VARCHAR(10) NOT NULL,
desde_usuario INT(4) NOT NULL,
cpf_usuario VARCHAR(14) NOT NULL,
telefone_usuario VARCHAR(13) NOT NULL,
end_usuario VARCHAR(75) NOT NULL,
num_usuario INT(5) NOT NULL,
bairro_usuario VARCHAR(75) NOT NULL,
cidade_usuario VARCHAR(75) NOT NULL,
cargo_usuario VARCHAR(11) NOT NULL,
var_usuario VARCHAR(160) NOT NULL,
foto_usuario VARCHAR(45) NOT NULL,
livro_alugado BOOLEAN DEFAULT FALSE,
PRIMARY KEY (id_usuario));

CREATE TABLE pedido(
id_pedido INT(4) NOT NULL AUTO_INCREMENT,
id_usuario INT(4) NOT NULL,
id_livro INT(4) NOT NULL,
emprestimo_pedido DATE,
devolucao_pedido DATE,
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
FOREIGN KEY (id_livro) REFERENCES livro(id_livro),
PRIMARY KEY (id_pedido));

CREATE TABLE fila(
id_fila INT(4) NOT NULL AUTO_INCREMENT,
id_usuario INT(4) NOT NULL,
id_livro INT(4) NOT NULL,
emprestimo_fila DATE,
devolucao_fila DATE,
FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
FOREIGN KEY (id_livro) REFERENCES livro(id_livro),
PRIMARY KEY (id_fila));