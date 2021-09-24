<?php
	include_once("../modelo/consulta.php");
	// $correo = $_POST['correo'];
	$correo=$_SESSION['correo'];
	$modelo = new Consultas();
	$cerrarSesion = $modelo -> cerrarSesion($correo);
	// echo "<pre>";
	// var_dump($correo);
	// echo "</pre>";
	echo $cerrarSesion;
?>