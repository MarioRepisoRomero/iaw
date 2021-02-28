<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SalarioTest
 *
 * @author -andrés
 */

require 'vendor/autoload.php';
require 'ClassProducto.php';

class ProductoTest extends \PHPUnit\Framework\TestCase
{


    public function testinsertarProducto()
    {

        $servername = "localhost";
        $username = "php";
        $password = "1234";
        $dbname = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }


        //Primera tanda
        //Primero calculo cuantas lineas hay en la tabla
        $sqlPrueba = "select * from productos;";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $productosAntes = $resultado->num_rows;
		

        $productoNuevo = new producto("123", "123", "123", "123");

        $productoNuevo->insertarProducto($conn);

        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $productosDespues = $resultado->num_rows;


        $this->assertEquals($productosAntes + 1, $productosDespues, "El producto se ha insertado correctamente");

        //Segunda tanda
        $sqlPrueba = "select * from productos where cod like '123';";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $numeroFilas = $resultado->num_rows;

        $this->assertEquals(1, $numeroFilas, "El producto se ha insertado correctamente, 2a prueba, y no se repiten filas");

        $conn->close();


    }


    public function testBuscarProducto()
    {

        $servername = "localhost";
        $username = "php";
        $password = "1234";
        $dbname = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        //primero inserto 5 filas en la tabla

        //creo un objeto Cliente, y le pongo valores al azar como en el código real


        $buscador = new producto("234","234","234","234");



        //lanzo una peticion cliente->buscar("Ped","onom",$conn) que tiene que ser resultado == 1
        $resultado = $buscador->buscar("Pedro","onom",$conn);

        $this->assertEquals(2,$resultado,"Hemos buscado a Pedro y no estaba???");

    }
}
?>	
