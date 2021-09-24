<?php 
	session_start();
	include_once("conexion.php");
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	class Consultas
	{
		public function registro($nombres,$apellido_1,$apellido_2,
		$telefono,$correo,$contra)
		{
			$modelo = new Conexion();
			$conexion = $modelo->conectar();
			$strVacio=" ";	
			$activo=0;
			$cifrado=sha1($contra);
			$cifrado=sha1($cifrado);
			$fecha_de_ingreso=date("d-m-y");
			$sql = "SELECT * FROM usuarios WHERE correo=:correo";
			$parametros = $conexion->prepare($sql);
			$parametros->bindParam(":correo",$correo);
			$parametros->execute();
			$filas = $parametros->rowCount();
			if ($filas==0)
			{
				$sql2 = "INSERT INTO usuarios(nombres,apellido_1,apellido_2,telefono,correo,contra,activo,id_sesion,fecha_de_ingreso,altitud,longitud,ultima_fecha_de_conexion,ultima_alt,ultima_long) values(:nombres,:apellido_1,:apellido_2,:telefono,:correo,:contra,:activo,:id_sesion,:fecha_de_ingreso,:altitud,:longitud,:ultima_fecha_de_conexion,:ultima_alt,:ultima_long)";
				$parametros2 = $conexion->prepare($sql2);
				$parametros2 ->bindParam(":nombres",$nombres);
				$parametros2 ->bindParam(":apellido_1",$apellido_1);
				$parametros2 ->bindParam(":apellido_2",$apellido_2);
				$parametros2 ->bindParam(":telefono",$telefono);
				$parametros2 ->bindParam(":correo",$correo);
				$parametros2 ->bindParam(":contra",$cifrado);
				$parametros2 ->bindParam(":activo",$activo);
				$parametros2 ->bindParam(":id_sesion",$strVacio);
				$parametros2 ->bindParam(":fecha_de_ingreso",$fecha_de_ingreso);
				$parametros2 ->bindParam(":altitud",$activo);
				$parametros2 ->bindParam(":longitud",$activo);
				$parametros2 ->bindParam(":ultima_fecha_de_conexion",$strVacio);
				$parametros2 ->bindParam(":ultima_alt",$activo);
				$parametros2 ->bindParam(":ultima_long",$activo);

				if($parametros2 ->execute()) 
				{
				return "listo";
				}
				else
				{
					return $parametros2 ->errorInfo();
				}
			}
			else
			{
				return "existe";
			}
		}
		public function inicioSesion($correo, $contrasena)
		{
			$modelo = new Conexion();
			$conexion = $modelo->conectar();
			$fechaRegistro=  date("d-m-y H:i:s");
			$inicio_sesion=date("d-m-y H:i:s");
			$activo=1;
			$strVacio=" ";
			$cifrado=sha1($contrasena);
			$cifrado=sha1($cifrado);
			$correo=trim($correo);//para quitar espacios
			$cifrado=trim($cifrado);
			$sesion=sha1($correo.$fechaRegistro.rand(1000,9999));
			//return $cifrado." -- ".$correo;
			$sql="SELECT * FROM usuarios WHERE correo=:correo 
			AND contrasena=:contrasena";
			$parametros = $conexion->prepare($sql);
			$parametros->bindParam(":correo",$correo);
			$parametros->bindParam(":contrasena",$cifrado);
			$parametros->execute();
			/*if($parametros->execute()){
				return "hecho";
			}
			else{
				return $parametros->errorInfo();
			}*/
			$filas=$parametros->rowCount();
			//return $filas;
			//return $cifrado." -- ".$correo." -- ".$filas;
			if($filas!=0)
			{
				
				$sql2 = "UPDATE usuarios SET activo=:activo, 
				id_sesion=:id_sesion, fecha_de_ingreso=:inicio_sesion 
				WHERE correo=:correo AND contrasena=:contrasena";
				$parametros2 = $conexion->prepare($sql2);
				$parametros2 ->bindParam(":activo",$activo);
				$parametros2 ->bindParam(":id_sesion",$sesion);
				$parametros2 ->bindParam(":inicio_sesion",$inicio_sesion);
				$parametros2 ->bindParam(":correo",$correo);
				$parametros2 ->bindParam(":contrasena",$cifrado);
				$parametros2 ->execute();
				
				$sql3 = "SELECT * FROM usuarios WHERE correo=:correo 
				AND contrasena=:contrasena";
				$parametros3 =$conexion->prepare($sql3);
				$parametros3->bindParam(":correo",$correo);
				$parametros3->bindParam(":contrasena",$cifrado);
				if ($parametros3->execute()) 
				{
					$datos=$parametros3->fetchAll(PDO::FETCH_ASSOC);
					$_SESSION['correo'] = $datos[0]["correo"];
					return json_encode($datos);
				}
				else{
					return "error";
				}
			}
			else
			{
				return "no_existe";
			}

		}
		public function cerrarSesion($correo)
		{
			$modelo = new Conexion();
			$conexion = $modelo->conectar();
			$activo=0;
			$strVacio=" ";
			$sql="UPDATE usuarios SET activo=:activo, id_sesion=:id_sesion
			 WHERE correo=:correo";
			$parametros = $conexion->prepare($sql);
			$parametros ->bindParam(":activo",$activo);
			$parametros ->bindParam(":id_sesion",$strVacio);
			$parametros ->bindParam(":correo",$correo);
			if ($parametros ->execute())
			{
				session_destroy();
				return "sesion cerrada";
			}
		}

		public function check_sesion($id, $id_sesion)
		{

		}	
}