<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_cabecalho.php';
?>
    <main>
      <div id="contatos">
        <div class="container-contato">
          <a href="http://instagram.com" target="_blank" class="icon-contato">
            <div class="div-contato">
              <img src="/estante_webb/banco/imgs/instagram_icon.svg" alt="" />
            </div>
            @estante_web
          </a>
        </div>

        <div class="container-contato">
          <a href="http://facebook.com" target="_blank" class="icon-contato">
            <div class="div-contato">
              <img src="/estante_webb/banco/imgs/facebook_icon.svg" alt="" />
            </div>
            @estante_web
          </a>
        </div>

        <div class="container-contato">
          <a href="tel:+559832000032" class="icon-contato">
            <div class="div-contato">
              <img src="/estante_webb/banco/imgs/telefone-icon.svg" alt="" />
            </div>
            (98) 3200-0032
          </a>
        </div>
      </div>
    </main>

    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/views/_rodape.php';
    ?>
  </body>
</html>
