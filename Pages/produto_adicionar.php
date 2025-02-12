<?php
require_once '../Ativ_CRUD/App/Classes/Produto.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $produto = new Produto();
    $produto->criar($nome, $preco, $estoque);
    
    echo "Produto adicionado com sucesso!";
}
?>

<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Preço: <input type="number" step="0.01" name="preco" required><br>
    Estoque: <input type="number" name="estoque" required><br>
    <input type="submit" value="Adicionar Produto">
</form>