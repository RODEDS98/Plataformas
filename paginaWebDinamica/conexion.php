<?php
$host = "localhost";
$user = "root";  // Usuario por defecto de XAMPP
$password = "";  // Sin contraseña por defecto en XAMPP
$db = "cv_database";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
