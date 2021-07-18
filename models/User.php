<?php 

namespace Model;

class User extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','nombre','apellido','dni','correo','pass'];

    public $id;
    public $nombre;
    public $apellido;
    public $dni;
    public $correo;
    public $pass;
    public $img;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->dni = $args['dni'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->pass = $args['pass'] ?? '';
    }

    public function validacionForm(){
        if(!$this->nombre){
            self::$errores[]= "el nombre es obligatorio";
        }
        if(!$this->apellido){
            self::$errores[]= "el apellido es obligatorio";
        }
        if(!$this->dni){
            self::$errores[]= "El dni es obligatorio";
        }
        if(!$this->correo){
            self::$errores[]= "El correo es obligatorio";
        }
        if(!$this->pass){
            self::$errores[]= "La contraseña es obligatorio";
        }
        return self::$errores;
    }

    public function validarLogin(){
        if(!$this->correo){
            self::$errores[]= "El correo es obligatorio";
        }
        if(!$this->pass){
            self::$errores[]= "La contraseña es obligatorio";
        }
        return self::$errores;
    }

    public function existeUsuario(){
        //Revisar si un usuario existe o no
        $query = "SELECT * FROM ".self::$tabla." WHERE correo= '".$this->correo."' LIMIT 1";

        $resultado = self::$db->query($query);

        if(!$resultado->num_rows){
            self::$errores[] = 'el usuario no existe'; 
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();
        $autenticado =$this->password === $usuario->password? true: false;
        if(!$autenticado){
            self::$errores[] = 'El password es Incorrecto';
            return;
        }

        return $autenticado;
    }

    public function autenticar(){
        session_start();

        //Llenar el arreglo de session
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('location: /admin');
    }
}