<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fct";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Recibir datos del formulario
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Consulta para buscar al usuario y su contraseña (en texto plano)
$sql = "SELECT password FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

// Verificar contraseña (sin hash)
if ($password === $row['password']) {
    header("Location: home.html");
    exit;
} else {
    echo "❌ Contraseña incorrecta.";
 }
} else {
    echo "❌ Usuario no encontrado.";
}

$stmt->close();
$conn->close();
?>
