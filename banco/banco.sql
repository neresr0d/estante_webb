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

-- seeds 

INSERT INTO categoria (nome_categoria) VALUES ('Mistério'), ('Horror'), ('Fantasia'), ('Romance'), ('Auto Ajuda'), ('Saúde e Bem-Estar');

CREATE TABLE livros (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    sinopse TEXT NOT NULL,
    capa LONGBLOB,
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);

--seeds

INSERT INTO livro (nome_livro, autor, sinopse, foto_livro, id_categoria) VALUES 
 ('Harry Potter e a Pedra Filosofal', 'J.K. Rowling', 'Um jovem bruxo descobre um mundo mágico.', '', '3'),

 ('O Código Da Vinci', 'Dan Brown', 'O professor Robert Langdon e a criptóloga Sophie Neveu investigam o assassinato de um curador do Louvre, descobrindo uma série de pistas que revelam um segredo histórico escondido em obras de arte.', '', '1'),

 ('O Iluminado', 'Stephen King', 'Jack Torrance, um escritor em busca de uma recomeço, aceita um emprego como zelador de um hotel isolado nas montanhas. Com a chegada do inverno, forças sobrenaturais começam a afetar sua sanidade e a segurança de sua família.', '', '2'),

('Pride and Prejudice" (Orgulho e Preconceito)', 'Jane Austen', 'Elizabeth Bennet enfrenta dilemas sociais e românticos enquanto lida com o orgulhoso Sr. Darcy e outros personagens em uma sociedade regida por normas rígidas.', '', '4'),

('O Poder do Agora', 'Eckhart Tolle', 'Tolle ensina como viver plenamente no presente, abordando como superar a dor emocional e a ansiedade através da consciência e do desapego do ego.', '', '5'),

('A Dieta dos 5 Ingredientes', 'Rachael Ray', 'Ray oferece receitas simples e saudáveis utilizando apenas cinco ingredientes, visando facilitar a alimentação saudável sem comprometer o sabor ou a praticidade.', '', '6');


CREATE TABLE favoritos (
    id_livro_favorito INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_livro  INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_livro) REFERENCES livros (id_livro) ON DELETE CASCADE
);