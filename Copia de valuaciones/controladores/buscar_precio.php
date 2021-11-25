<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("../modelo/acciones.php");
$nombre_colonia=$_POST['nombre_colonia'];
$nombre_alcaldia = $_POST['nombre_alcaldia'];



$modelo= new Acciones();
$respuesta=$modelo->buscar_precio($nombre_colonia,$nombre_alcaldia);
//var_dump($respuesta);
print_r($respuesta);
?>
