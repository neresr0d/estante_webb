<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_cabecalho.php';

// echo '<pre>';
// print_r($_SESSION['foto_perfil']);
// echo '</pre>';
?>

<main id="conteudo-perfil">
    <div id="edit-perfil">
        <div id="modal-perfil">
            <div id="perfil">
                <h1>MEU PERFIL</h1>
                <div class="foto">
                    <!--<img src="data:image; base64, ?= base64_encode($_SESSION['foto_perfil']) ?>" alt="">-->
                </div>
                <div id="btn-perfil">
                    <button><a href="categorias.php">Categorias</a></button>
                    <button><a href="livros.php">Livros</a></button>
                </div>
            </div>
            <div id="div-perfil">
                <div class="input-perfil">
                    <h2>Nome:</h2>
                    <p><?= $_SESSION['nome'] ?></p>
                </div>

                <div class="input-perfil">
                    <h2>E-mail:</h2>
                    <p><?= $_SESSION['email'] ?></p>
                </div>
                <button type="submit">GRAVAR</button>
            </div>
        </div>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_rodape.php';
?>

</body>

</html>