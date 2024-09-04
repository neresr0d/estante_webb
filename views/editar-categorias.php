<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/models/categoria.php';

$id_categoria = $_GET['id_categoria'];

$categoria = new Categoria($id_categoria);
?>

<main id="conteudo-categoria">
  <div id="modal-categorias">
    <div id="btn-categorias">
      <h1>Editar Categorias</h1>
      <a class="btn-back" href="/estante_webb/banco/views/categorias.php"><img src="/estante_webb/banco/imgs/back-icon.svg" alt="" /></a>
    </div>

    <form action="/estante_webb/banco/controllers/edit_categoria_controller.php" method="post" id="form-editCategorias">
      <input type="hidden" name="id_categoria" value="<?= $categoria->id_categoria ?>">
      <div id="input-add">
        <input
          type="text"
          name="input-edit-categorias"
          id="input-edit-categorias"
          value="<?= $categoria->nome_categoria ?>" />
        <button id="btn-edit-categoria" type="submit">Atualizar</button>
      </div>
    </form>
  </div>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_rodape.php';
?>
</body>

</html>