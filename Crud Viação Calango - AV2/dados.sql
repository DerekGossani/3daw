CREATE DATABASE sistema_gerenciamento;

USE sistema_gerenciamento;

CREATE TABLE onibus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(10) NOT NULL,
    estado_atual VARCHAR(255) NOT NULL
);

CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    codigo VARCHAR(10) NOT NULL,
    funcao VARCHAR(255) NOT NULL
);

INSERT INTO onibus (numero, estado_atual)
VALUES
('123', 'Novo'),
('567', 'Semi-novo'),
('891', 'Com muita rotatividade');

INSERT INTO funcionarios (nome, codigo, funcao)
VALUES
('Bruno Gomes', '123', 'Motorista'),
('Roberto Silva', '432', 'Motorista'),
('Samara Conceição', '567', 'Atendente');
