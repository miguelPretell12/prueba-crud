<?php 

function conectarDB(){
    $db = new mysqli('localhost','root','123456','users');

    if(!$db){
        echo 'no se conecto';
        exit;
    }

    return $db;
}