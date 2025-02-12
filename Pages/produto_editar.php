<?php
require_once '../Ativ_CRUD/App/Classes/Produto.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $produto = new Produto();
    $produto->atualizar($id, $nome, $preco, $estoque);
    
    echo "Produto atualizado com sucesso!";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $produto = new Produto();
    $produtoData = $produto->buscarPorId($id);
    $produtoData = $produtoData[0];
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $produtoData['id']; ?>"><br>
    Nome: <input type="text" name="nome" value="<?php echo $produtoData['nome']; ?>" required><br>
    Preço: <input type="number" step="0.01" name="preco" value="<?php echo $produtoData['preco']; ?>" required><br>
    Estoque: <input type="number" name="estoque" value="<?php echo $produtoData['estoque']; ?>" required><br>
    <input type="submit" value="Atualizar Produto">
</form>
