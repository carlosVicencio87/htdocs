<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("acciones.php");

$datos_limp=file_get_contents("datos_limpios.txt");
$datos_limp=explode ("\n",$datos_limp);
//print_r ($datos_limp);
$linea_nombre="";
$linea_castro="";
$cuenta=0;
$nombre_colonia="";
$colonia_catastral="";
$modelo= new Acciones();
foreach($datos_limp as $linea){
    //echo $linea.PHP_EOL;
    if(trim($linea)!=""){
        //echo $cuenta." ".$linea."<br>";
        if($cuenta==0){
            //$nombre_alcadia= $nombre_alcadia.$linea.PHP_EOL;
            $linea_nombre=$linea;
            $nombre_colonia= $nombre_colonia.$linea."<br>";
            $cuenta++;

            
        }
        elseif($cuenta==1){
            //$clave_catastral= $clave_catastral.$linea.PHP_EOL;
            $linea_castro=$linea;
            $colonia_catastral= $colonia_catastral.$linea."<br>";
            $cuenta=0;
            $respuesta=$modelo->insertar_datos_castro($linea_nombre,$linea_castro);
            print_r($respuesta);
        }
        //echo $cuenta." ".$linea."<br>";
    }
  
}


//echo  $nombre_alcadia;    
//echo  "pito";   
?>