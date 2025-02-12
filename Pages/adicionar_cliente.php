<?php
include '../Ativ_CRUD/App/DB/database.php'; // Inclua a classe Database
include '../Ativ_CRUD/App/Classes/Cliente.php';  // Inclua a classe Cliente

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $observacoes = $_POST['observacoes'];

    // Cria uma instância da classe Cliente
    $cliente = new Cliente();
    $cliente->criar($nome, $email, $telefone, $observacoes); // Chama o método para adicionar o cliente

    // Redireciona para a lista de clientes
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Pages/Css/estilo_adicionar.css">
    <title>Adicionar Cliente</title>
</head>
<body>
    <h1>Adicionar Cliente</h1>
    <form action="adicionar_cliente.php" method="POST">
        Nome: <input type="text" name="nome" required><br>
        E-mail: <input type="email" name="email" required><br>
        Telefone: <input type="text" name="telefone"><br>
        Observações: <input type="text" name="observacoes"><br>
        <button type="submit">Adicionar Cliente</button>
    </form>
    <br>
    <a href="index.php">Voltar para a lista de clientes</a>
</body>
</html>