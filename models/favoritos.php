<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/configs/conexao.php';

class Favorito
{
    public $id_livro_favorito;
    public $id_usuario;
    public $id_livro;

    public function cadastrarLivroFavorito()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'INSERT INTO favoritos (id_usuario, id_livro) VALUES (:id_usuario, :id_livro)';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id_usuario', $this->id_usuario);
            $stmt->bindValue(':id_livro', $this->id_livro);

            $stmt->execute();

            return $conn->lastInsertId();
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public static function listarLivroFavorito($id_usuario)
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM livros l INNER JOIN favoritos f ON l.id_livro = f.id_livro WHERE f.id_usuario = :id_usuario';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->execute();

            $resultado = $stmt->fetchAll();
            return ($resultado);
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}
