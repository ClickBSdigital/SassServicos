<?php
require_once '../Ativ_CRUD/App/Classes/Venda.php';

$venda = new Venda();
$vendas = $venda->listar();

echo "<h3>Lista de Vendas</h3>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Vendedor</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>";

foreach ($vendas as $v) {
    echo "<tr>
            <td>{$v['id']}</td>
            <td>{$v['cliente']}</td>
            <td>{$v['vendedor']}</td>
            <td>{$v['data_venda']}</td>
            <td>
                <a href='venda_excluir.php?id={$v['id']}'>Excluir</a>
            </td>
          </tr>";
}

echo "</table>";
?>