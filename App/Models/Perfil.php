<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <h1>Perfil de <?php echo $this->usuario->nome; ?></h1>
    <p>Email: <?php echo $this->usuario->email; ?></p>
    <p>Perfil: <?php echo $this->usuario->perfil; ?></p>
    <a href="editar_perfil.php">Editar Perfil</a>
</body>
</html>
