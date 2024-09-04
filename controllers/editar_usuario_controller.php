<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/models/usuario.php';

session_start();

$id_usuario = $_POST['id_usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$foto_perfil = $_POST['foto_perfil'];

$usuario = new Usuario($id_usuario);
$usuario->nome = $nome;
$usuario->email = $email;
$usuario->foto_perfil = $foto_perfil;

$usuario->atualizarUsuario();

header('Location: /estante_webb/banco/views/perfil.php');
exit();
