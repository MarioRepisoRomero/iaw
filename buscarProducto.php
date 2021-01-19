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
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("ERROR: " . $conn->connect_error);
}

$opcion=$_GET["opcion"];

$texto=$_GET["texto"];

$sql = "SELECT * FROM productos where";

if ($_GET["opcion"]=="codigo") 
{

	$sql = $sql." codigo like '%$texto%'";

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
	        echo "<br> codigo: ". $row["codigo"]. " - descripcion: ". $row["descripcion"].. " - Precio: ". $row["precio"]. " - stock: ". $row["stock"]. "<br>";
	    }
	} else {
	    echo "0 resultados";
	}

	$conn->close();
?>
?>
