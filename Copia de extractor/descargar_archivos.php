<?php
set_time_limit(40000);

$carpeta="archivos/";
$archivo_r = file_get_contents("lista_archivos.txt");
$enlaces_split= explode("\n", $archivo_r);

if (!file_exists($carpeta)) 
{
	mkdir($carpeta);
	// code...
}

for($i0=0;$i0<count($enlaces_split);$i0++)
{
	if($i0<count($enlaces_split))
	{
		$datos = explode("----",$enlaces_split[$i0]);
		$url = $datos[0];
		$nombre_archivo=$datos[1];
		$direccion_final =$carpeta.$nombre_archivo.".zip";

		$mi_curl = curl_init ($url);
		$fs_archivo = fopen ($direccion_final, "w");
		curl_setopt ($mi_curl, CURLOPT_FILE, $fs_archivo);
		curl_setopt ($mi_curl, CURLOPT_HEADER, 0);
		curl_exec ($mi_curl);
		curl_close ($mi_curl);
		fclose ($fs_archivo);
	}
}




?>