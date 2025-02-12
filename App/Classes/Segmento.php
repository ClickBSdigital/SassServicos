<?php
class Segmento {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Método para criar um perfil de segmentos
    public function criar($nome) {
        $sql = "INSERT INTO segmentos (nome) VALUES (?)";
        return $this->db->insert($sql, [$nome]);
    }

    // Método para listar todos os segmentos
    public function listar() {
        $sql = "SELECT * FROM segmentos";
        return $this->db->select($sql);
    }

    // Método para buscar um segmentos por ID
    public function buscar($id) {
        $sql = "SELECT * FROM segmentos WHERE id = ?";
        $clientes = $this->db->select($sql, [$id]);
        return $clientes ? $clientes[0] : null;
    }

    // Método para atualizar um segmentos
    public function atualizar($id, $nome) {
        $sql = "UPDATE segmentos SET nome = ?, WHERE id = ?";
        return $this->db->update($sql, [$nome]);
    }

    // Método para deletar um segmentos
    public function deletar($id) {
        $sql = "DELETE FROM segmentos WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
}
?>