<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Bienvenido a la Gestión de Tiques</h1>
        <p class="lead">Por favor, inicia sesión o regístrate para continuar.</p>
        <a href="login.php" class="btn btn-primary">Iniciar Sesión</a>
        <a href="register.php" class="btn btn-secondary">Registrarse</a>
    </div>
</body>
</html>