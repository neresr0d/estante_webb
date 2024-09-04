<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/configs/conexao.php';

class Usuario
{
    public $id_usuario;
    public $nome;
    public $email;
    public $senha;
    public $foto_perfil;

    public function __construct($id_usuario = false)
    {
        if ($id_usuario) {
            $this->id_usuario = $id_usuario;
            $this->carregarUsuario();
        }
    }

    public function carregarUsuario()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM usuarios WHERE id_usuario = :id_usuario';
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id_usuario', $this->id_usuario);
            $stmt->execute();

            $resultado = $stmt->fetch();

            $this->nome = $resultado['nome'];
            $this->email = $resultado['email'];
            $this->senha = $resultado['senha'];
            $this->foto_perfil = $resultado['foto_perfil'];
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function atualizarUsuario()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'UPDATE usuarios SET nome = :nome, email = :email, foto_perfil = :foto_perfil  WHERE id_usuario = :id_usuario';
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id_usuario', $this->id_usuario);
            $stmt->bindValue(':nome', $this->nome);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':foto_perfil', $this->foto_perfil);

            $stmt->execute();
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function cadastrarUsuario()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'INSERT INTO usuarios (nome, email, senha, foto_perfil) VALUES (:nome, :email, :senha, :foto_perfil)';

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':nome', $this->nome);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':senha', $this->senha);
            $stmt->bindValue(':foto_perfil', $this->foto_perfil);

            $stmt->execute();

            return $conn->lastInsertId();
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}
