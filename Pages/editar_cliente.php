<?php
include '../Ativ_CRUD/App/DB/database.php'; // Inclua a classe Database
include '../Ativ_CRUD/App/Classes/Cliente.php';  // Inclua a classe Cliente

// Verifica se o ID do cliente foi passado na URL
if (!isset($_GET['id'])) {
    die('Cliente não encontrado.');
}

$id_cliente = $_GET['id'];

// Cria uma instância da classe Cliente e busca os dados do cliente
$cliente = new Cliente();
$cliente_data = $cliente->buscar($id_cliente);

if (!$cliente_data) {
    die('Cliente não encontrado.');
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Atualiza os dados do cliente
    $cliente->atualizar($id_cliente, $nome, $email, $telefone);

    // Redireciona de volta para a página de clientes
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Pages/Css/estilo_editar.css">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form action="editar_cliente.php?id=<?php echo $id_cliente; ?>" method="POST">
        Nome: <input type="text" name="nome" value="<?php echo $cliente_data['nome']; ?>" required><br>
        E-mail: <input type="email" name="email" value="<?php echo $cliente_data['email']; ?>" required><br>
        Telefone: <input type="text" name="telefone" value="<?php echo $cliente_data['telefone']; ?>"><br>
        Observações: <input type="text" name="observacoes" value="<?php echo $cliente_data['observacoes']; ?>"><br>
        <button type="submit">Atualizar Cliente</button>
    </form>
    <br>
    <a href="index.php">Voltar para a lista de clientes</a>
</body>
</html>
