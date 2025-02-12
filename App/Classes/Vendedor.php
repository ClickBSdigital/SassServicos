<?php
class Vendedor {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Método para criar um perfil de vendedores
    public function criar($nome, $email) {
        $sql = "INSERT INTO vendedores (nome, email) VALUES (?)";
        return $this->db->insert($sql, [$nome, $email]);
    }

    // Método para listar todos os vendedores
    public function listar() {
        $sql = "SELECT * FROM vendedores";
        return $this->db->select($sql);
    }

    // Método para buscar um vendedores por ID
    public function buscar($id) {
        $sql = "SELECT * FROM vendedores WHERE id = ?";
        $clientes = $this->db->select($sql, [$id]);
        return $clientes ? $clientes[0] : null;
    }

    // Método para atualizar um vendedores
    public function atualizar($id, $nome, $email) {
        $sql = "UPDATE vendedores SET nome = ?, email = ? WHERE id = ?";
        return $this->db->update($sql, [$nome, $email]);
    }

    // Método para deletar um vendedores
    public function deletar($id) {
        $sql = "DELETE FROM vendedores WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
}
?>