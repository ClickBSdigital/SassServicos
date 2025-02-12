<?php
require_once '../Ativ_CRUD/App/Classes/Venda.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $venda = new Venda();
    $venda->deletar($id);
    
    echo "Venda excluída com sucesso!";
}
?>