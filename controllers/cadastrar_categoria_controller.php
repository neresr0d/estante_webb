<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/models/categoria.php';

$nome = $_POST['input-categorias'];

$categoria = new Categoria();
$categoria->nome_categoria = $nome;

$id_categoria = $categoria->cadastrarCategoria();

header('Location: /estante_webb/banco/views/categorias.php');
exit();
