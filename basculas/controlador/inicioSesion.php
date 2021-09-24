<?php
	include_once("../modelo/consulta.php");
	$correo = $_POST['correo'];
	$contrasena = $_POST['contrasena'];
	
	$modelo = new Consultas();
	$respuesta = $modelo -> inicioSesion($correo, $contrasena);
	echo $respuesta;

?>