<?php
require 'config/Database.php';
require 'classes/Usuario.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);

if ($_POST) {
    $usuario->id = $_POST['id'];
    $usuario->nome_completo = $_POST['nome_completo'];
    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];

    if ($usuario->update()) {
        echo "Usuário atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar usuário.";
    }
} else {
    $usuario->id = isset($_GET['id']) ? $_GET['id'] : die('ID não encontrado.');
    $stmt = $usuario->read();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $usuario->nome_completo = $row['nome_completo'];
    $usuario->email = $row['email'];
}

?>

<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
    Nome Completo: <input type="text" name="nome_completo" value="<?php echo $usuario->nome_completo; ?>"><br>
    Email: <input type="email" name="email" value="<?php echo $usuario->email; ?>"><br>
    Senha: <input type="password" name="senha"><br>
    <input type="submit" value="Atualizar">
</form>
