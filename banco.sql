create database pratica1_dani;
use pratica1_dani;

create table cliente(
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    telefone VARCHAR(13) NOT NULL
);

create table colaborador(
    id_colaborador INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    telefone VARCHAR(13) NOT NULL 
);

create table chamado(
    id_chamado INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    descricao_problema TEXT NOT NULL,
    criticidade ENUM('baixa', 'média', 'alta'),
    status ENUM('aberto', 'em andamento', 'resolvido') DEFAULT 'aberto',
    data_abertura DATE NOT NULL,
    id_colaborador INT
);