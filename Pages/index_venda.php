<?php
include '../Ativ_CRUD/App/DB/database.php';
include '../Ativ_CRUD/App/Classes/Venda.php';

$venda = new Venda();
$vendas = $venda->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Pages/Css/estilo_index.css">
    <title>Lista de Vendas</title>
</head>
<body>
    <h1>Lista de Vendas</h1>
    <a href="adicionar_venda.php">Adicionar Nova Venda</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Cliente</th>
                <th>ID Vendedor</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendas as $venda_data) { ?>
                <tr>
                    <td><?php echo $venda_data['id']; ?></td>
                    <td><?php echo $venda_data['id_cliente']; ?></td>
                    <td><?php echo $venda_data['id_vendedor']; ?></td>
                    <td><?php echo $venda_data['data_venda']; ?></td>
                    <td>
                        <a href="editar_venda.php?id=<?php echo $venda_data['id']; ?>">Editar</a> |
                        <a href="deletar_venda.php?id=<?php echo $venda_data['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>