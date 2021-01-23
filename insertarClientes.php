<?php
$servername = "localhost";
$database = "pruebas";
$username = "php";
$password = "1234";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("ERROR CONECTANDO: " . mysqli_connect_error());
}

$nombre=$_GET["Nombre"];
$apellidos=$_GET["Apellidos"];
$dni=$_GET["DNI"];
$email=$_GET["Email"];
$fechadenacimiento=$_GET["fecha"];


$sql = "INSERT INTO clientes (nombre, apellidos, dni, email, fechadenacimiento) VALUES ('$nombre','$apellidos', '$dni', '$email', '$fechadenacimiento')";
if (mysqli_query($conn, $sql)) {
      echo "El nuevo campo ha sido añadido.";
} else {
      echo "ERROR INSERTANDO: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>