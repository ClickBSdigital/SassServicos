<?php
class Venda {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Registrar uma venda
    public function registrar($id_cliente, $id_vendedor) {
        $sql = "INSERT INTO vendas (id_cliente, id_vendedor) VALUES (?, ?)";
        return $this->db->insert($sql, [$id_cliente, $id_vendedor]);
    }

    // Listar todas as vendas
    public function listar() {
        $sql = "SELECT v.id, c.nome AS cliente, ve.nome AS vendedor, v.data_venda
                FROM vendas v
                JOIN clientes c ON v.id_cliente = c.id
                JOIN vendedores ve ON v.id_vendedor = ve.id";
        return $this->db->select($sql);
    }

    // Deletar venda
    public function deletar($id) {
        $sql = "DELETE FROM vendas WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }

    // Buscar venda por ID
    public function buscarPorId($id) {
        $sql = "SELECT v.id, c.nome AS cliente, ve.nome AS vendedor, v.data_venda
                FROM vendas v
                JOIN clientes c ON v.id_cliente = c.id
                JOIN vendedores ve ON v.id_vendedor = ve.id
                WHERE v.id = ?";
        return $this->db->select($sql, [$id]);
    }
}
?>