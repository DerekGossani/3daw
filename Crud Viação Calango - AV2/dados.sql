CREATE DATABASE sistema_gerenciamento DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

USE sistema_gerenciamento;

CREATE TABLE onibus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT(10) NOT NULL,
    estado VARCHAR(100) NOT NULL
);

CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    codigo INT(10) NOT NULL,
    funcao VARCHAR(300) NOT NULL
);

CREATE TABLE passagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_titular VARCHAR(100) NOT NULL,
    numero_cartao VARCHAR(16) NOT NULL,
    data_validade DATE NOT NULL,
    cvv VARCHAR(3) NOT NULL,
    endereco_cobranca VARCHAR(255) NOT NULL,
    partida VARCHAR(100),
    destino VARCHAR(100),
    data_ida DATE,
    preco DECIMAL(10, 2),
    tipo_assento VARCHAR(50),
    status_pagamento ENUM('PENDENTE', 'CONCLUIDO') DEFAULT 'PENDENTE'
);

INSERT INTO onibus (numero, estado)
VALUES
('123', 'Novo'),
('567', 'Semi-novo'),
('891', 'Com muita rotatividade');

INSERT INTO funcionarios (nome, codigo, funcao)
VALUES
('Bruno Gomes', '123', 'Motorista'),
('Roberto Silva', '432', 'Motorista'),
('Samara Conceição', '567', 'Atendente');