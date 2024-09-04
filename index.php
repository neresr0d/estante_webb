<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/models/livro.php';

$listagem_livro = Livro::listarLivro();
?>
<main id="conteudo-principal">
  <?php foreach ($listagem_livro as $livro): ?>
    <div class="card-livro">
      <img src="data:image; base64, <?= base64_encode($livro['capa']) ?>" alt="" class="capa_livro">
      <h1><?= $livro['titulo'] ?></h1>
      <span class="favorito-livro-icon">
        <form action="/estante_webb/banco/controllers/fav_livro_controller.php" method="post">
          <input type="hidden" name="id_livro" value="<?= $livro['id_livro'] ?>">
          <input type="hidden" name="id_usuario" value="<?= $_SESSION['id_usuario'] ?>">
          <button type="submit"><img src="/estante_webb/banco/imgs/bookmark-regular.svg" alt=""></button>
        </form>
      </span>
    </div>
  <?php endforeach; ?>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_rodape.php';
?>
</body>

</html>