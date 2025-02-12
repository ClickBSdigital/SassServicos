<?php
include '../Ativ_CRUD/App/DB/database.php';
include '../Ativ_CRUD/App/Classes/Cliente.php';

$cliente = new Cliente();
$clientes = $cliente->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Pages/Css/estilo_index.css">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <a href="adicionar_cliente.php">Adicionar Novo Cliente</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Observações</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente_data) { ?>
                <tr>
                    <td><?php echo $cliente_data['id']; ?></td>
                    <td><?php echo $cliente_data['nome']; ?></td>
                    <td><?php echo $cliente_data['email']; ?></td>
                    <td><?php echo $cliente_data['telefone']; ?></td>
                    <td><?php echo $cliente_data['observacoes']; ?></td>
                    <td>
                        <a href="editar_cliente.php?id=<?php echo $cliente_data['id']; ?>">Editar</a> |
                        <a href="deletar_cliente.php?id=<?php echo $cliente_data['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>