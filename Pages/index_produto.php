<?php
include '../Ativ_CRUD/App/DB/database.php';
include '../Ativ_CRUD/App/Classes/Produto.php';

$produto = new Produto();
$produtos = $produto->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Pages/Css/estilo_index.css">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <a href="adicionar_produto.php">Adicionar Novo Produto</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto_data) { ?>
                <tr>
                    <td><?php echo $produto_data['id']; ?></td>
                    <td><?php echo $produto_data['nome']; ?></td>
                    <td><?php echo $produto_data['preco']; ?></td>
                    <td><?php echo $produto_data['estoque']; ?></td>
                    <td>
                        <a href="editar_produto.php?id=<?php echo $produto_data['id']; ?>">Editar</a> |
                        <a href="deletar_produto.php?id=<?php echo $produto_data['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>