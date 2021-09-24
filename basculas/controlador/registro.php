<?php
	include_once("../modelo/consulta.php");
	$nombres = $_POST['nombres'];
	$apellido_1 = $_POST['apellido_1'];
	$apellido_2 = $_POST['apellido_2'];
	$correo = $_POST['correo'];
	$contra = $_POST['contra'];
	//echo $contra." ---".$correo;
	$modelo = new Consultas();
	$respuesta = $modelo -> registro($nombres,$apellido_1,$apellido_2,$correo,$contra);
	echo $respuesta;
?>