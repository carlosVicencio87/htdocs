<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$datos_limp=file_get_contents("datos_limpios.txt");
$datos_limp=explode ("\n",$datos_limp);
//print_r ($datos_limp);

$cuenta=0;
$nombre_alcadia="2pitos";
$clave_catastral="valor";

foreach($datos_limp as $linea){
    //echo $linea.PHP_EOL;
    if(trim($linea)!=""){
        //echo $cuenta." ".$linea."<br>";
        if($cuenta==0){
            $nombre_alcadia= $nombre_alcadia.$linea.PHP_EOL;
            $cuenta++;
        }
        elseif($cuenta==1){
            $clave_catastral= $clave_catastral.$linea.PHP_EOL;
            $cuenta++;
        // }
        // elseif($cuenta==2){
        //     $cuenta=0;
        // }
        //echo $cuenta." ".$linea."<br>";
    }
  
}
echo  $nombre_alcadia;
//echo  "pito";   
?>