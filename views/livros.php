<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/models/livro.php';

$listagem_livro = Livro::listarLivro();
?>

<main id="conteudo-livros">
    <div id="modal-livros">
        <div id="btn-livros">
            <h1>Getenciar Livros</h1>
            <a id="add-livros" href="adicionar-livro.php">Adicionar</a>
            <a class="btn-back" href="/estante_webb/banco/views/perfil.php"><img src="/estante_webb/banco/imgs/back-icon.svg" alt=""></a>
        </div>
        <div id="tabela-livros">
            <?php foreach ($listagem_livro as $livro): ?>
                <div class="livro">
                    <img src="data:image; base64, <?= base64_encode($livro['capa']) ?>" alt="">
                    <span class="del-livro-icon">
                        <form action="/estante_webb/banco/controllers/del_livro_controller.php" method="post" onsubmit="return confirm('Você tem certeza que quer deletar este Livro ??')">
                            <input type="hidden" name="id_livro" value="<?= $livro['id_livro'] ?>">
                            <button type="submit"><img src="/estante_webb/banco/imgs/delete-icon.svg" alt=""></button>
                        </form>
                    </span>
                    <span class="edit-livro-icon"><a href="/estante_webb/banco/views/editar-livro.php?id_livro=<?= $livro['id_livro'] ?>"><img src="/estante_webb/banco/imgs/edit-icon.svg" alt=""></a></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
</main>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_rodape.php';
?>
</body>

</html>