CREATE DATABASE erp;
USE erp;

CREATE TABLE produto (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);


	CREATE TABLE variacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto_id INT,
    nome_variacao VARCHAR (255) NOT NULL,
    FOREIGN KEY (produto_id) REFERENCES produto(id)
    ON DELETE CASCADE
    );
    
    CREATE TABLE estoque (
	id INT AUTO_INCREMENT PRIMARY KEY,
    produto_id INT NOT NULL,
    variacao_id INT DEFAULT NULL,
    quantidade INT NOT NULL,
    FOREIGN KEY (produto_id) REFERENCES produto(id) 
    ON DELETE CASCADE,
    FOREIGN KEY (variacao_id) REFERENCES variacoes(id) 
    ON DELETE SET NULL
    );
    
INSERT INTO produtos (nome, preco) VALUES
('Caneta', 1.99),
('Caderno', 15.90),
('Lápis', 0.99);