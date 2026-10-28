CREATE DATABASE IF NOT EXISTS inventarioHardware
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE inventario_hardware;

CREATE TABLE usuarios (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL UNIQUE,
  senha_hash VARCHAR(255) NOT NULL
);

CREATE TABLE equipamentos (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  cliente VARCHAR(100) NOT NULL,
  imagem VARCHAR(255) NULL,
  equipamento VARCHAR(100) NOT NULL,
  problema VARCHAR(255) NOT NULL,
  status ENUM('Recebido', 'Em conserto', 'Pronto', 'Entregue') NOT NULL DEFAULT 'Recebido',
  data_entrada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);