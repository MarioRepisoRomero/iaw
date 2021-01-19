<html>
<body>

<?php
$servername = "localhost";
$username = "php";
$password = "1234";
$dbname = "pruebas";
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

$sql = "INSERT INTO productos (cod, descripcion, precio, stock)
VALUES ('$codigo', '$descripcion', '$precio', '$stock')";

if ($conn->query($sql) === TRUE) {
  echo "creado correctamente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</body>
</html>