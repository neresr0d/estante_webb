<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/models/favoritos.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/models/categoria.php';

$listagem_categoria = Categoria::listarCategoria();

$listagem_favorito = Favorito::listarLivroFavorito($_SESSION['id_usuario']);

?>
<main id="main-favoritos">
  <div id="container-favoritos">
    <aside>
      <div id="categorias-livros">
        <?php foreach ($listagem_categoria as $categoria) : ?>
          <a href="#" class="livro-categoria"><?= $categoria['nome'] ?></a>
        <?php endforeach; ?>
      </div>
    </aside>

    <div id="livros-favoritos">
      <?php foreach ($listagem_favorito as $favorito) : ?>
        <div class="livro-favorito">
          <img src="data:image; base64, <?= base64_encode($favorito['capa']) ?>" alt="" />
          <h1><?= $favorito['titulo'] ?></h1>
          <span class="coracao-icon"><img src="/estante_webb/banco/imgs/bookmark-icon.svg" alt="" /></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_rodape.php';
?>
</body>

</html>