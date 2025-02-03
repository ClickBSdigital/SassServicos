<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="editar-perfil-container">
        <h1>Editar Perfil</h1>
        <form action="" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $this->usuario->nome; ?>" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $this->usuario->email; ?>" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
