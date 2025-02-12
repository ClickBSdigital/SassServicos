<?php
class Usuario {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Método para criar um perfil de segmentos
    public function criar($nome, $email, $senha, $perfil) {
        $sql = "INSERT INTO usuarios (nome, email, senha, perfil) VALUES (?, ?, ?, ?)";
        return $this->db->insert($sql, [$nome, $email, $senha, $perfil]);
    }

    // Método para listar todos os usuarios
    public function listar() {
        $sql = "SELECT * FROM usuarios";
        return $this->db->select($sql);
    }

    // Método para buscar um usuarios por ID
    public function buscar($id) {
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $clientes = $this->db->select($sql, [$id]);
        return $clientes ? $clientes[0] : null;
    }

    // Método para atualizar um usuarios
    public function atualizar($id, $nome, $email, $senha, $perfil) {
        $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ?, perfil = ?, WHERE id = ?";
        return $this->db->update($sql, [$nome, $email, $senha, $perfil]);
    }

    // Método para deletar um usuarios
    public function deletar($id) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
}
?>