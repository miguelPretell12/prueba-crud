<?php 

namespace Controllers;

use Model\User;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        $errores = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new User($_POST);
            $errores = $auth->validarLogin();
            if(empty($errores)){
                 //Verificar si el usuario existe
                 $resultado = $auth->existeUsuario();
                 if(!$resultado){
                     //Verificar si el usuario existe o no(mensaje de errores)
                     $errores[] ='el usuario no existe';
                 } else {
                     //Verificar el password
                     $autenticado = $auth->comprobarPassword($resultado);
                     if($autenticado){
                         //Autenticar el usuario
                         $auth->autenticar();
                     }else {
                         $errores[] ='El password es Incorrecto';
                     }
                 }
            }
        }
        $router->render('auth/login',[
            'errores'=> $errores
        ]);
    }   

    public static function logout(){
        session_start();
        $_SESSION = [];
        header('location: /');
    }
}