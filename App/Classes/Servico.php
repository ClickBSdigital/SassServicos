<?php
class Servico {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Método para criar um perfil de servicos
    public function criar($nome, $descricao, $preco, $segmento_id, $usuario_id) {
        $sql = "INSERT INTO servicos (nome, descricao, preco, segmento_id, usuario_id) VALUES (?, ?, ?, ?)";
        return $this->db->insert($sql, [$nome, $descricao, $preco, $segmento_id, $usuario_id]);
    }

    // Método para listar todos os servicos
    public function listar() {
        $sql = "SELECT * FROM servicos";
        return $this->db->select($sql);
    }

    // Método para buscar um servicos por ID
    public function buscar($id) {
        $sql = "SELECT * FROM servicos WHERE id = ?";
        $clientes = $this->db->select($sql, [$id]);
        return $clientes ? $clientes[0] : null;
    }

    // Método para atualizar um servicos
    public function atualizar($nome, $descricao, $preco, $segmento_id, $usuario_id) {
        $sql = "UPDATE servicos SET nome = ?, descricao = ?, preco = ?, segmento_id = ?, usuario_id WHERE id = ?";
        return $this->db->update($sql, [$nome, $descricao, $preco, $segmento_id, $usuario_id]);
    }

    // Método para deletar um servicos
    public function deletar($id) {
        $sql = "DELETE FROM servicos WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
}
?>