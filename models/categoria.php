<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/configs/conexao.php';

class Categoria
{
    public $id_categoria;
    public $nome_categoria;

    public function __construct($id_categoria = false)
    {
        if ($id_categoria) {
            $this->id_categoria = $id_categoria;
            $this->carregarCategoria();
        }
    }

    public function carregarCategoria()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM categorias WHERE id_categoria = :id_categoria';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id_categoria', $this->id_categoria);
            $stmt->execute();
            $resultado = $stmt->fetch();

            $this->nome_categoria = $resultado['nome'];
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function cadastrarCategoria()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'INSERT INTO categorias (nome) VALUES (:nome)';

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':nome', $this->nome_categoria);
            $stmt->execute();
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function atualizarCategoria()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'UPDATE categorias SET nome  = :nome WHERE id_categoria = :id_categoria';

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id_categoria', $this->id_categoria);
            $stmt->bindValue(':nome', $this->nome_categoria);

            $stmt->execute();
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public static function listarCategoria()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM categorias';
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetchAll();
            return ($resultado);
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function deletarCategoria()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'DELETE FROM categorias WHERE id_categoria = :id_categoria';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id_categoria', $this->id_categoria);
            $stmt->execute();
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}
