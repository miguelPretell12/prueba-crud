<?php 

namespace Model;

class ActiveRecord {
    //Base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';
    //Errores
    protected static $errores = [];

    //Definir la conexion a la BD
    public static function setDB($database){
        self::$db = $database;
    }


    public function guardar() {
        if(!is_null($this->id)){
            //actualizar
            $this->actualizar();
        }else{
            //Creando un nuevo registro
            $this->crear();
        }
    }

    public function crear(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $string = join(',',array_keys($atributos));
        $string1 = join("','",array_values($atributos));
        //Insertar en la base de datos
        $query = "insert into ". static::$tabla ." ($string) 
            values( ' $string1 ')";

        return self::$db->query($query);
    }

    //Eliminar un registro
    public function eliminar(){ 
        //Eliminar el archivo
        $query = "DELETE FROM ". static::$tabla ." WHERE id = ".self::$db->escape_string($this->id). " LIMIT 1 ";
        $resultado = self::$db->query($query);
        
        if($resultado){
            $this->borrarImagen();
            header('location: /admin');
        }
    }

    public function actualizar(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE ". static::$tabla ." SET ";
        $query.= join(', ', $valores);
        $query .= " WHERE id ='".self::$db->escape_string($this->id)."'";
        $query .= " LIMIT 1";
        
        $resultado = self::$db->query($query);
        
        if($resultado){
            //Redireccionar al usuario
            header('location:/admin');
        }
    }

    //Identificar y unir los atributos de la BD
    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    public function setImagen($imagen){
        //Elimina la imagen previa
        if(!is_null($this->id)){
            $this->borrarImagen();
        }
        //Asignar al atributo de imagen el nombre de la imagen
        if($imagen){
            $this->imagen= $imagen;
        }
    }

    //eliminar el archivo
    public function borrarImagen(){
        //Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES.$this->imagen);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES.$this->imagen);
        }
    }

    //validacion
    public static function getErrores (){
        static::$errores = [];
        return self::$errores;
    }

    public function validar(){
        static::$errores = [];
        return static::$errores;
    }

    public static function all() {
        $query="SELECT * FROM ".static::$tabla;

        $resultado = static::consultarSQL($query);

        return $resultado;
    }

    //Obtiene determinado numero de registros
    public static function get($cantidad){
        $query="SELECT * FROM ".static::$tabla." LIMIT ".$cantidad;
        $resultado = static::consultarSQL($query);

        return $resultado;
    }

    //Busca un registro por su id
    public static function find($id){
        $query = "select * from ". static::$tabla ." where id = ${id}";
        $resultado = static::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        //Consultar la base de datos
        $resultado = self::$db->query($query);
        //Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }
        //Liberar la memoria
        $resultado->free();

        //Retornar los resultados
        return $array;
    }


    protected static function crearObjeto($registro){
        $objeto = new static;
        foreach($registro as $key=> $value){
            if(property_exists($objeto,$key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincronizar el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
        foreach($args as $key=>$value){
            if(property_exists($this,$key) && !is_null($value) ){
                $this->$key = $value;
            }
        }
    }
}
