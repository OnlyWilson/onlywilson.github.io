<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";


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
//echo "Connected successfully";

// Hashear la contraseña
// $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Recibir datos del formulario
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$telefono = $_POST['telefono'];

// Insertar datos
$sql = "INSERT INTO usuarios (username, correo, password, telefono) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $username, $email, $password, $telefono);


if ($stmt->execute()) {
  // Si el registro es exitoso, redirigir a la página de inicio.
  echo "<script>
  localStorage.setItem('registroExitoso', 'true');
  window.location.href = 'login.html';
  </script>";
} else {
  echo "Error al registrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>