<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $no_guia = $_POST['no_guia'];
    $fecha = $_POST['fecha'];
    $litros = $_POST['litros'];
    $precio_litro = $_POST['precio_litro'];
    $total = $_POST['total'];

    $sql = "UPDATE tiques SET no_guia='$no_guia', fecha='$fecha', litros='$litros', precio_litro='$precio_litro', total='$total' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Tique actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tiques WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<form method="post" action="edit_ticket.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="text" name="no_guia" value="<?php echo $row['no_guia']; ?>" required>
    <input type="date" name="fecha" value="<?php echo $row['fecha']; ?>" required>
    <input type="number" step="0.01" name="litros" value="<?php echo $row['litros']; ?>" required>
    <input type="number" step="0.01" name="precio_litro" value="<?php echo $row['precio_litro']; ?>" required>
    <input type="number" step="0.01" name="total" value="<?php echo $row['total']; ?>" required>
    <button type="submit">Actualizar Tique</button>
</form>