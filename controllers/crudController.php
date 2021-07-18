<?php

namespace Controllers;

use Model\User;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class crudController {
    public static function admin(Router $router) {
        $errores = [];
        $usuarios = User::all();

        $router->renderCrud('crud/index',[
            'usuarios'=>$usuarios
        ]);
    }
    public static function crear(Router $router){
        $usuario = new User();
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           

            /** Crear una nueva instancia  */
            $usuario = new User($_POST['user']);

            $errores = $usuario->validacionForm();
            if(empty($errores)){
                $resultado = $usuario->crear();
                if($resultado){
                    header('location: /admin');
                }
            }
        }

        $router->renderCrud('crud/crear',[
            'errores' => $errores,
            'usuario' => $usuario
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD']==='POST'){

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                $usuario = User::find($id);
                $usuario->eliminar();
                
            }
        }
    }

    public static function actualizar(Router $router ){
        $id = $_GET['id'];
        $id = filter_var($id,FILTER_VALIDATE_INT);

        $errores = [];
        $usuario = User::find($id);
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['user'];
            $usuario->sincronizar($args);

            $errores = $usuario->validacionForm();
            if(empty($errores)){
                $resultado = $usuario->actualizar();

                if($resultado){
                    header("location: /admin");
                }
            }
        }

        $router->renderCrud('crud/actualizar',[
            'errores'=> $errores,
            'usuario'=> $usuario
        ]);
    }
}