<?php
    $letra="contrasena";
    $cifrado = sha1($letra);
    $cifrado = sha1($cifrado);
    echo $cifrado;
?>