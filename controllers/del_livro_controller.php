<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/models/livro.php';
$id_livro = $_POST['id_livro'];

$livro = new Livro($id_livro);
$livro->deletarLivro();

header('location: /estante_webb/banco/views/livros.php');
exit();
