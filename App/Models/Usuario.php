<?php

class Usuario {
    private $conn;
    private $table = "usuarios";

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $perfil;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para criar um novo usuário
    public function create() {
        $query = "INSERT INTO " . $this->table . " (nome, email, senha, perfil) VALUES (:nome, :email, :senha, :perfil)";

        $stmt = $this->conn->prepare($query);
        
        // Limpar dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));
        $this->perfil = htmlspecialchars(strip_tags($this->perfil));

        // Vincular dados
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":perfil", $this->perfil);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para fazer login (autenticação)
    public function login() {
        $query = "SELECT id, nome, email, perfil FROM " . $this->table . " WHERE email = :email AND senha = :senha";

        $stmt = $this->conn->prepare($query);
        
        // Limpar dados
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        // Vincular dados
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);

        $stmt->execute();

        // Verificar se encontrou um usuário
        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->nome = $row['nome'];
            $this->email = $row['email'];
            $this->perfil = $row['perfil'];

            return true;
        }

        return false;
    }
}

// Método para atualizar o perfil do usuário
public function update() {
    $query = "UPDATE " . $this->table . " SET nome = :nome, email = :email, senha = :senha WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    // Limpar dados
    $this->nome = htmlspecialchars(strip_tags($this->nome));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->senha = htmlspecialchars(strip_tags($this->senha));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Vincular dados
    $stmt->bindParam(":nome", $this->nome);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":senha", $this->senha);
    $stmt->bindParam(":id", $this->id);

    if ($stmt->execute()) {
        return true;
    }

    return false;
}
