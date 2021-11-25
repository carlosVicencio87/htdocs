<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// date_default_timezone_set('America/Mexico_City');
    class Servidor
    {
        public function conectar()
        {
            $usuario="root";
            // $password="Soluciones_33!";
            $password="";
            $host="localhost";
            $db="datos_catastrales";
            $conexion= new PDO("mysql:host=$host;dbname=$db;charset=utf8", $usuario, $password);
            return $conexion;
        }
    }
?>