<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/models/livro.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/models/categoria.php';

$id_livro = $_GET['id_livro'];
$livro = new Livro($id_livro);

$listagem_categoria = Categoria::listarCategoria();
$categoria_atual = $livro->id_categoria;
// echo '<pre>';
// var_dump($livro);
// echo '</pre>';
?>

<main id="conteudo-livros">
  <div id="modal-livros">
    <div id="btn-livros">
      <h1>Editar Livros</h1>
      <a class="btn-back" href="/estante_webb/banco/views/livros.php"><img src="/estante_webb/banco/imgs/back-icon.svg" alt="" /></a>
    </div>

    <form action="/estante_webb/banco/controllers/edit_livro_controller.php" method="post" enctype="multipart/form-data" id="form-editLivros">
      <input type="hidden" name="id_livro" value="<?= $livro->id_livro ?>">

      <div id="input-edit-livro">
        <div id="editCapaLivro">
          <img src="data:image; base64, <?= base64_encode($livro->capa) ?>" alt="" class="edit_capa_img">
        </div>
        <input type="file" name="edit-capa-livro" id="edit-capa-livro" required />

        <div id="descricoes-livros">
          <input type="text" name="edit-title-livro" id="edit-title-livro" placeholder="Digite o Titulo" class="input-descricaoLivro" value="<?= $livro->titulo ?>" />

          <input type="text" name="edit-autor-livro" id="edit-autor-livro" placeholder="Digite o Autor" class="input-descricaoLivro" value="<?= $livro->autor ?>" />

          <select name="edit-categoria-livro" id="edit-categoria-livro" class="input-descricaoLivro">
            <option value="" disabled selected>Selecione uma categoria</option>
            <?php foreach ($listagem_categoria as $categoria): ?>
              <option value="<?= $categoria['id_categoria'] ?>"
                <?= ($categoria['id_categoria'] == $categoria_atual) ? 'selected' : '' ?>>
                <?= $categoria['nome'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <textarea name="edit-sinopse-livro" id="edit-sinopse-livro" placeholder="Digite a Sinopse" class="input-descricaoLivro"><?= $livro->sinopse ?></textarea>
      </div>
      <button type="submit">Atualizar</button>
      <button type="reset">Apagar</button>
    </form>
  </div>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_rodape.php';
?>
</body>

</html>