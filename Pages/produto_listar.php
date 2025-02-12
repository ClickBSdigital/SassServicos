<?php
require_once '../Ativ_CRUD/App/Classes/Produto.php';

$produto = new Produto();
$produtos = $produto->listar();

echo "<h3>Lista de Produtos</h3>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>";

foreach ($produtos as $prod) {
    echo "<tr>
            <td>{$prod['id']}</td>
            <td>{$prod['nome']}</td>
            <td>{$prod['preco']}</td>
            <td>{$prod['estoque']}</td>
            <td>
                <a href='produto_editar.php?id={$prod['id']}'>Editar</a> | 
                <a href='produto_excluir.php?id={$prod['id']}'>Excluir</a>
            </td>
          </tr>";
}

echo "</table>";
?>