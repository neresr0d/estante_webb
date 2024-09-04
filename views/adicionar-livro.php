<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/models/categoria.php';

$listagem_categoria = Categoria::listarCategoria();
?>
<main id="conteudo-livros">
  <div id="modal-livros">
    <div id="btn-livros">
      <h1>Adicionar Livros</h1>
      <a class="btn-back" href="/estante_webb/banco/views/livros.php"><img src="/estante_webb/banco/imgs/back-icon.svg" alt="" /></a>
    </div>

    <form action="/estante_webb/banco/controllers/cadastrar_livro_controller.php" method="post" enctype="multipart/form-data" id="form-addLivros">
      <div id="input-add-livro">

        <div id="capaLivro">
          <img src="/estante_webb/banco/imgs/livro01-quarta-capa.jpg" alt="" class="capa_img">
        </div>
        <input type="file" name="capa-livro" id="capa-livro" required />

        <div id="descricoes-livros">
          <input
            type="text"
            name="title-livro"
            id="title-livro"
            placeholder="Digite o Titulo"
            class="input-descricaoLivro"
            required />

          <input
            type="text"
            name="autor-livro"
            id="autor-livro"
            placeholder="Digite o Autor"
            class="input-descricaoLivro" />

          <div class="input-descricaoLivro">
            <div class="div-foreach">
              <select name="categoria-livro" id="categoria-livro" class="input-descricaoLivro">
                <option value="" disabled selected>Selecione uma categoria</option>
                <?php foreach ($listagem_categoria as $categoria): ?>
                  <option value="<?= $categoria['id_categoria'] ?>">
                    <?= $categoria['nome'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <textarea
          name="sinopse-livro"
          id="sinopse-livro"
          placeholder="Digite a Sinopse"
          class="input-descricaoLivro"
          required></textarea>
      </div>

      <button type="submit">Salvar</button>
      <button type="reset">Apagar</button>
    </form>
  </div>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_rodape.php';
?>

</body>

</html>