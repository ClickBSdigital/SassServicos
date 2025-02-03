<?php

require_once '../DB/database.php';
require_once '../app/Controllers/UsuarioController.php';

// Criar a conexão com o banco de dados
$database = new Database();
$db = $database->connect();

// Criar o controlador de Usuário
$usuarioController = new UsuarioController($db);

// Exibir o perfil do usuário
$usuarioController->perfil();
