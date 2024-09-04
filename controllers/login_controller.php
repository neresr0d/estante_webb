<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/estante_webb/banco/auth/auth.php';

    $email_login = $_POST['email-login'];
    $senha_login = $_POST['senha-login'];

    Auth::login($email_login, $senha_login);
?>