<?php
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

$sql = "INSERT INTO usuarios (username, correo, password, telefono)
VALUES ('JulioCesar43','john@example.com', 'tralala', '618544522')";

if ($conn->query($sql) === TRUE) {
  echo "OLE OLE LO CARACOLE";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>