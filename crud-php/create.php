<?php
require 'config/Database.php';
require 'classes/Usuario.php';

$database = new Database();
$database->createTables();
$db = $database->getConnection();

if ($_POST) {
    $usuario = new Usuario($db);

    $usuario->nome_completo = $_POST['nome_completo'];
    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];

    if ($usuario->create()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário.";
    }
}
?>

<form action="create.php" method="post">
    Nome Completo: <input type="text" name="nome_completo"><br>
    Email: <input type="email" name="email"><br>
    Senha: <input type="password" name="senha"><br>
    <input type="submit" value="Cadastrar">
</form>
