<?php

require_once 'app/Models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct($db) {
        $this->usuario = new Usuario($db);
    }

    // Método para exibir o perfil do usuário
    public function perfil() {
        session_start();
        
        if (isset($_SESSION['usuario_id'])) {
            $usuario_id = $_SESSION['usuario_id'];
            // Buscar as informações do usuário no banco de dados e exibir o perfil
            $this->usuario->id = $usuario_id;
            $this->usuario->getById();
            require_once 'app/Views/perfil.php';
        } else {
            header("Location: login.php");
        }
    }

    // Método para autenticar o usuário
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuario->email = $_POST['email'];
            $this->usuario->senha = $_POST['senha'];

            if ($this->usuario->login()) {
                $_SESSION['usuario_id'] = $this->usuario->id;
                header("Location: perfil.php");
            } else {
                echo "Login falhou!";
            }
        }

        require_once 'app/Views/login.php';
    }

    // Método para criar um novo usuário
    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->senha = $_POST['senha'];
            $this->usuario->perfil = 'cliente'; // Ou 'admin' se for administrador

            if ($this->usuario->create()) {
                echo "Usuário criado com sucesso!";
            } else {
                echo "Erro ao criar o usuário!";
            }
        }

        require_once 'app/Views/cadastro.php';
    }
}

// Método para editar o perfil do usuário
public function editar() {
    session_start();

    if (isset($_SESSION['usuario_id'])) {
        $usuario_id = $_SESSION['usuario_id'];

        // Verificando se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->usuario->id = $usuario_id;
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->senha = $_POST['senha'] ? $_POST['senha'] : $this->usuario->senha; // Se senha não for fornecida, mantém a original

            if ($this->usuario->update()) {
                echo "Perfil atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o perfil.";
            }
        }

        $this->usuario->id = $usuario_id;
        $this->usuario->getById(); // Buscar as informações do usuário

        require_once 'app/Views/editar_perfil.php';
    } else {
        header("Location: login.php");
    }
}
