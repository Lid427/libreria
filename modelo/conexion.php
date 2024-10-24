<?php
class Conexion {
    private static $conexion = null;

    private function __construct() {
        // Constructor privado para evitar que se instancie
    }

    public static function getConexion() {
        if (self::$conexion == null) {
            
            $host = 'localhost'; 
            $dbname = 'rol'; 
            $user = 'root'; 
            $password = ''; 

           
            self::$conexion = new mysqli($host, $user, $password, $dbname);

            
            if (self::$conexion->connect_error) {
                die("Error de conexión: " . self::$conexion->connect_error);
            }
        }

        return self::$conexion;
    }

    
}
?>
