<?php
	class Conexion
	{
		public function conectar()
		{
			$usuario="root";
			$password="root";
			$host="localhost";
			$db="datos_catastrales";

			$conexion= new PDO("mysql:host=$host;dbname=$db;charset=utf8", $usuario, 
				$password);
			 
			return $conexion;
		}
	}

?>