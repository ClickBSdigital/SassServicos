<?php
include '../Ativ_CRUD/App/DB/database.php'; // Inclua a classe Database
include '../Ativ_CRUD/App/Classes/Cliente.php';  // Inclua a classe Cliente

// Verifica se o ID foi passado na URL
if (!isset($_GET['id'])) {
    die('Cliente não encontrado.');
}

$id_cliente = $_GET['id'];

// Cria uma instância da classe Cliente e deleta o cliente
$cliente = new Cliente();
$cliente->deletar($id_cliente);

// Redireciona de volta para a lista de clientes
header('Location: index.php');
exit();
?>