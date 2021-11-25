<?php
 error_reporting(E_ALL);
ini_set('display_err    ors', '1');
require_once("conexion.php");


class Acciones {


    /*public function buscar_precio($nombre_colonia,$nombre_alcaldia)
    {   
        //return $alcaldia.$colonia;
        //die();
        $modelo = new Conexion();
        $conexion = $modelo->conectar();
        $activo=1;
        $strVacio=" ";
        
        $sql = "SELECT * from alcaldias WHERE nombre_colonia=:nombre_colonia AND nombre_alcaldia=:nombre_alcaldia"; 
        
        $parametros = $conexion->prepare($sql);
        $parametros->bindParam(":nombre_colonia", $nombre_colonia);
        $parametros->bindParam(":nombre_alcaldia", $nombre_alcaldia);
        $parametros->execute();
        $columnas=$parametros->rowCount();
        //return $columnas;
        $cadena ="";
        if ($columnas==0) 
        {   
            $vacio="El domicilio no existe";
            return $vacio;
        }
        
            else
            { 
                $datos= $parametros->fetchAll(PDO::FETCH_ASSOC);
                return json_encode($datos);
               /* $sql3= "SELECT from valuaciones SET valor=:valor WHERE direccion=:nombre_colonia 
                AND direccion=:colonia_catastral AND direccion=:alcaldia ";

                $parametros3 = $conexion->prepare($sql3);
                $parametros3->bindParam(":nombre_colonia", $direccion);
                $parametros3->bindParam(":colonia_catastral", $direccion);
                $parametros3->bindParam(":alcaldia", $direccion);
                $parametros3->execute();
                // return $arreglo[2].' Bienvenido';
                    
                    return $response;
     

            }
            
 
   
   
        }*/
    


    public function insertar_datos_castro ($linea_nombre,$linea_castro){
    
        $modelo = new Conexion();
        $conexion = $modelo->conectar();
        $activo=1;
        $strVacio=" ";
        $cero=0;
        $sql = "INSERT INTO ALCALDIAS(alcaldia,nombre_alcaldia,colonia_catastral,nombre_colonia,region,manzana,valor) values(:alcaldia,:nombre_alcaldia,:colonia_catastral,:nombre_colonia,:region,:manzana,:valor)";
        $parametros = $conexion->prepare($sql);
        $parametros->bindParam(":alcaldia", $cero);
        $parametros->bindParam(":nombre_alcaldia", $strVacio);
        $parametros->bindParam(":colonia_catastral", $linea_castro);
        $parametros->bindParam(":nombre_colonia", $linea_nombre);
        $parametros->bindParam(":region",$cero );
        $parametros->bindParam(":manzana", $cero);
        $parametros->bindParam(":valor", $cero);
        $parametros->execute();
        $response="success";
        if(  $parametros->execute()){
            return $response;
        }
        else{
            return $parametros->errorInfo();
        }
    
}    
    
        
}

?>