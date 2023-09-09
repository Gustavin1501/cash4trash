DROP DATABASE IF EXISTS ifsp;
CREATE DATABASE ifsp;
USE ifsp;

CREATE TABLE Usuario(
  id_usuario INT AUTO_INCREMENT,
  email  VARCHAR(140) NOT NULL,
  senha  VARCHAR(16) NOT NULL,
  nome VARCHAR(150) NOT NULL,
  PRIMARY KEY (id_usuario)
);

INSERT INTO 
  Usuario (email, senha)
VALUES
  ("teste@teste.com", "teste");