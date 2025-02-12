<?php
class Cliente {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Método para criar um perfil de cliente
    public function criar($nome, $email, $endereco, $telefone, $observacoes, $usuario_id) {
        $sql = "INSERT INTO clientes (nome, email,endereco, telefone, observacoes, usuario_id) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->db->insert($sql, [$nome, $email, $endereco, $telefone, $observacoes, $usuario_id]);
    }

    // Método para listar todos os clientes
    public function listar() {
        $sql = "SELECT * FROM clientes";
        return $this->db->select($sql);
    }

    // Método para buscar um cliente por ID
    public function buscar($id) {
        $sql = "SELECT * FROM clientes WHERE id = ?";
        $clientes = $this->db->select($sql, [$id]);
        return $clientes ? $clientes[0] : null;
    }

    // Método para atualizar um cliente
    public function atualizar($id, $nome, $email, $endereco, $telefone, $observacoes, $usuario_id) {
        $sql = "UPDATE clientes SET nome = ?, email = ?, endereco = ?, telefone = ?, observacoes = ?, usuario_id = ? WHERE id = ?";
        return $this->db->update($sql, [$nome, $email, $endereco, $telefone, $observacoes, $usuario_id]);
    }

    // Método para deletar um cliente
    public function deletar($id) {
        $sql = "DELETE FROM clientes WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
}
?>