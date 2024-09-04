<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_cabecalho.php';
?>
    <main id="conteudo-login">
      <div id="div-login">
        <div id="modal-login">
          <h1>Acesse sua conta</h1>
          <form action="/estante_webb/banco/controllers/login_controller.php" method="post" id="form-login">
            <div class="input-login">
              <label for="email-login">E-mail:</label>
              <input
                type="email"
                name="email-login"
                id="email-login"
                required
              />
            </div>

            <div class="input-login">
              <label for="senha-login">Senha:</label>
              <input
                type="password"
                name="senha-login"
                id="senha-login"
                required
              />
            </div>
            <button type="submit">ENTRAR</button>
            <p><a href="#">Esqueceu sua senha?</a></p>
          </form>
        </div>
        <div id="criar-conta">
          <p>Ainda não é cadastrado ?</p>
          <p><a href="/estante_webb/banco/views/cadastro.php">Crie sua conta</a></p>
        </div>
      </div>
    </main>

    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_rodape.php';
    ?>
  </body>
</html>
