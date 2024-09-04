<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/auth/auth.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Estante Web</title>
  <link rel="stylesheet" href="/estante_webb/banco/css/style.css">
  <script src="/estante_webb/banco/script/scripit.js" defer></script>
</head>

<body>
  <header id="cabecalho">
    <div id="logo-busca">
      <div id="logo-menu">
        <img
          src="/estante_webb/banco/imgs/menu-icon.svg"
          alt=""
          id="btn-menu"
          height="50px"
          width="50px" />
        <h1 id="logo">Estante Web</h1>
      </div>
      <form action="" id="form-busca">
        <img src="/estante_webb/banco/imgs/search_icon.svg" alt="" id="icon-busca">
        <input type="search" name="busca" id="busca">
        <button id="icon-mic"><img src="/estante_webb/banco/imgs/mic_icon.svg" alt=""></button>
      </form>
    </div>
    </div>
    <nav id="menu-nav">
      <a href="/estante_webb/banco/index.php">Início</a>
      <a href="/estante_webb/banco/views/quem_somos.php">Quem Somos</a>
      <a href="/estante_webb/banco/views/contatos.php">Contatos</a>
      <?php if (Auth::estarLogado()) : ?>
        <a href="/estante_webb/banco/views/favoritos.php" class="alinhar">
          <img src="/estante_webb/banco/imgs/star_icon.svg" alt="" />Favoritos
        </a>
        <div class="drop-down">
          <p>Olá, <span><?= $_SESSION['nome'] ?></span></p>
          <div class="drop-content">
            <a href="/estante_webb/banco/views/perfil.php">Perfil</a>
            <a href="/estante_webb/banco/controllers/logout_controller.php">Encerrar Sessão</a>
          </div>
        </div>
      <?php else : ?>
        <a href="/estante_webb/banco/views/login.php">Login</a>
      <?php endif; ?>
    </nav>
  </header>