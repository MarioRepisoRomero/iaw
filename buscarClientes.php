<?php
$servername = "localhost";
$database = "pruebas";
$username = "php";
$password = "1234";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("ERROR: " . $conn->connect_error);
}

$op=$_GET["opcion"];

$texto=$_GET["search"];

$sql = "SELECT * FROM clientes where";

if ($_GET["opcion"]=="nombre") 
{

	$sql = $sql." nombre like '%$texto%'";

}
elseif ($_GET["opcion"]=="apellido")
{

	$sql = $sql." apellidos like '%$texto%'";

}
elseif ($_GET["opcion"]=="dni")
{

	$sql = $sql." dni like '%$texto%'";

}

elseif ($_GET["opcion"]=="email")
{

	$sql = $sql." email like '%$texto%'";

}

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "<br> Nombre: ". $row["nombre"]. " - Apellidos: ". $row["apellidos"]. " - DNI: " . $row["dni"]. " - Email: ". $row["email"] . "<br>";
	    }
	} else {
	    echo "No hay resultados";
	}

	$conn->close();
?>
