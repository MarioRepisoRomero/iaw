<?php
$servername = "localhost";
$username = "php";
$password = "1234";
$database = "pruebas";

$codigo = $_GET['codigo'];
$descripcion = $_GET['descripcion'];
$precio = $_GET['precio'];
$stock = $_GET['stock'];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

$sql = "INSERT INTO productos (cod, descripcion, precio, stock)
VALUES ('$codigo', '$descripcion', '$precio', '$stock')";

if ($conn->query($sql) === TRUE) {
  echo "El nuevo campo ha sido añadido.";
} else {
  echo "ERROR INSERTANDO: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>