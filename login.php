<?php 
session_start();
require 'config.php';
require 'classes/usuarios.class.php';

if (!empty($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars(md5($_POST['senha']));

    $usuarios = new Usuarios($pdo);

    if ($usuarios->fazerLogin($email, $senha)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Usuário ou senha errados!";
    }
}

?>
<h3>Login:</h3>
<form action="" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" />
    <label for="senha">Senha:</label>
    <input type="password" name="senha" />
    <input type="submit" value="Entrar" />
</form>