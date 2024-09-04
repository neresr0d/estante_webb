<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/models/livro.php';

$titulo = $_POST['title-livro'];
$autor = $_POST['autor-livro'];
$sinopse = $_POST['sinopse-livro'];
$id_categoria = $_POST['id_categoria'];
if (!empty($_FILES['capa-livro']['tmp_name'])) {
    $capa = file_get_contents($_FILES['capa-livro']['tmp_name']);
};

$livro = new Livro();
$livro->titulo = $titulo;
$livro->autor = $autor;
$livro->sinopse = $sinopse;
$livro->id_categoria = $id_categoria;
if (isset($capa)) {
    $livro->capa = $capa;
} else {
    $livro->capa = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/imgs/perfil_icon.svg');
}

$id_livro = $livro->cadastrarLivro();

header('Location: /estante_webb/banco/views/livros.php');
exit();
