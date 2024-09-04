<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/configs/conexao.php';

class Livro
{
    public $id_livro;
    public $id_categoria;
    public $titulo;
    public $autor;
    public $sinopse;
    public $capa;

    public function __construct($id_livro = false)
    {
        if ($id_livro) {
            $this->id_livro = $id_livro;
            $this->carregarLivro();
        }
    }

    public function carregarLivro()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM livros WHERE id_livro = :id_livro';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id_livro', $this->id_livro);
            $stmt->execute();
            $resultado = $stmt->fetch();

            $this->id_categoria = $resultado['id_categoria'];
            $this->titulo = $resultado['titulo'];
            $this->autor = $resultado['autor'];
            $this->sinopse = $resultado['sinopse'];
            $this->capa = $resultado['capa'];
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function cadastrarLivro()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'INSERT INTO livros (titulo, autor, sinopse, capa, id_categoria) VALUES (:titulo, :autor, :sinopse, :capa, :id_categoria)';

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':titulo', $this->titulo);
            $stmt->bindValue(':autor', $this->autor);
            $stmt->bindValue(':sinopse', $this->sinopse);
            $stmt->bindValue(':capa', $this->capa);
            $stmt->bindValue(':id_categoria', $this->id_categoria);

            $stmt->execute();

            return $conn->lastInsertId();
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function atualizarLivro()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'UPDATE livros SET titulo = :titulo, autor = :autor, sinopse = :sinopse, capa = :capa, id_categoria = :id_categoria WHERE id_livro = :id_livro';

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id_livro', $this->id_livro);
            $stmt->bindValue(':titulo', $this->titulo);
            $stmt->bindValue(':autor', $this->autor);
            $stmt->bindValue(':sinopse', $this->sinopse);
            $stmt->bindValue(':capa', $this->capa);
            $stmt->bindValue(':id_categoria', $this->id_categoria);

            $stmt->execute();
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public static function listarLivro()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM livros';
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetchAll();
            return ($resultado);
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function deletarLivro()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'DELETE FROM livros WHERE id_livro = :id_livro';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id_livro', $this->id_livro);
            $stmt->execute();
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}
