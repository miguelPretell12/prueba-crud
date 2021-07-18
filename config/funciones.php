<?php
define('TEMPLATES_URL',__DIR__.'/includes');
define('FUNCIONES_URL',__DIR__.'funciones.php');
define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'].'/imagenes/');

function incluirTemplate(string $nombre,bool $inicio= false){
    include TEMPLATES_URL."/${nombre}.php";
}

function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}