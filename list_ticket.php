<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tiques WHERE user_id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>No. Guía: " . $row['no_guia'] . "</h2>";
        echo "<p>Fecha: " . $row['fecha'] . "</p>";
        echo "<p>Litros: " . $row['litros'] . "</p>";
        echo "<p>Precio por Litro: " . $row['precio_litro'] . "</p>";
        echo "<p>Total: " . $row['total'] . "</p>";
        echo "<img src='uploads/" . $row['imagen'] . "' alt='Imagen del Tique'>";
        echo "<a href='edit_ticket.php?id=" . $row['id'] . "'>Editar</a>";
        echo "<a href='delete_ticket.php?id=" . $row['id'] . "'>Eliminar</a>";
        echo "</div>";
    }
} else {
    echo "No se encontraron tiques";
}
?>