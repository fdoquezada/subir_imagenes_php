<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $no_guia = $_POST['no_guia'];
    $fecha = $_POST['fecha'];
    $litros = $_POST['litros'];
    $precio_litro = $_POST['precio_litro'];
    $total = $_POST['total'];
    $imagen = $_FILES['imagen']['name'];
    $target = "uploads/" . basename($imagen);

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target)) {
        $sql = "INSERT INTO tiques (user_id, no_guia, fecha, litros, precio_litro, total, imagen) VALUES ('$user_id', '$no_guia', '$fecha', '$litros', '$precio_litro', '$total', '$imagen')";

        if ($conn->query($sql) === TRUE) {
            echo "Tique subido exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error al subir la imagen";
    }
}
?>

<form method="post" action="upload_ticket.php" enctype="multipart/form-data">
    <input type="text" name="no_guia" placeholder="No. Guía" required>
    <input type="date" name="fecha" placeholder="Fecha" required>
    <input type="number" step="0.01" name="litros" placeholder="Litros" required>
    <input type="number" step="0.01" name="precio_litro" placeholder="Precio por Litro" required>
    <input type="number" step="0.01" name="total" placeholder="Total" required>
    <input type="file" name="imagen" required>
    <button type="submit">Subir Tique</button>
</form>