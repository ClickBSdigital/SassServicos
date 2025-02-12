<?php
class Produto {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Adicionar produto
    public function criar($nome, $preco, $estoque) {
        $sql = "INSERT INTO produtos (nome, preco, estoque) VALUES (?, ?, ?)";
        return $this->db->insert($sql, [$nome, $preco, $estoque]);
    }

    // Listar todos os produtos
    public function listar() {
        $sql = "SELECT * FROM produtos";
        return $this->db->select($sql);
    }

    // Atualizar produto
    public function atualizar($id, $nome, $preco, $estoque) {
        $sql = "UPDATE produtos SET nome = ?, preco = ?, estoque = ? WHERE id = ?";
        return $this->db->update($sql, [$nome, $preco, $estoque, $id]);
    }

    // Deletar produto
    public function deletar($id) {
        $sql = "DELETE FROM produtos WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }

    // Buscar produto por ID
    public function buscarPorId($id) {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        return $this->db->select($sql, [$id]);
    }
}
?>