<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM tiques WHERE id='$id'";