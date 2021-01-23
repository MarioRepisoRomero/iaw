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
  die("ERROR: " . $conn->connect_error);
}

$opcion=$_GET["opcion"];

$texto=$_GET["search"];

$sql = "SELECT * FROM productos where";

if ($_GET["opcion"]=="codigo") 
{

	$sql = $sql." cod like '%$texto%'";

}
elseif ($_GET["opcion"]=="descripcion")
{

	$sql = $sql." descripcion like '%$texto%'";

}
elseif ($_GET["opcion"]=="precio")
{

	$sql = $sql." precio like '%$texto%'";

}
elseif ($_GET["opcion"]=="stock")
{

	$sql = $sql." stock like '%$texto%'";
}
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "<br> codigo: ". $row["cod"]. " - descripcion: ". $row["descripcion"]. " - Precio: ". $row["precio"]. " - stock: ". $row["stock"]. "<br>";
	    }
	} else {
	    echo "No hay resultados";
	}

	$conn->close();
?>
