<?php
require 'config/Database.php';
require 'classes/Usuario.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);
$stmt = $usuario->read();

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nome Completo</th><th>Email</th><th>Ações</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$nome_completo}</td>";
    echo "<td>{$email}</td>";
    echo "<td>
        <a href='update.php?id={$id}'>Editar</a> | 
        <a href='delete.php?id={$id}'>Excluir</a>
    </td>";
    echo "</tr>";
}

echo "</table>";
?>
