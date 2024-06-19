<?php
require 'config/Database.php';
require 'classes/Usuario.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);

$usuario->id = isset($_GET['id']) ? $_GET['id'] : die('ID não encontrado.');

if ($usuario->delete()) {
    echo "Usuário excluído com sucesso!";
} else {
    echo "Erro ao excluir usuário.";
}
?>
