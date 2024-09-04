CREATE DATABASE estante_web;

USE estante_web;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    foto_perfil LONGBLOB NOT NULL,
    e_admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE livros (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    sinopse TEXT NOT NULL,
    capa LONGBLOB,
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);


CREATE TABLE favoritos (
    id_livro_favorito INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_livro  INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_livro) REFERENCES livros (id_livro) ON DELETE CASCADE
);