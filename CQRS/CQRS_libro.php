<?php
require_once 'modelo/conexion.php';
require_once 'controlador/librocontroller.php';

class RegistroCommando {
    public $nombreL;
    public $autorL;
    public $generoL;
    public $estatusL;
    public $archivoL;

    public function __construct($RegistroL, $autor, $genero, $estatus, $archivo) {
        if (strlen($RegistroL) < 5 || strlen($RegistroL) > 100) {
            throw new Exception("EL NOMBRE DEL LIBRO DEBE DE TENER ENTRE 5 Y 100 CARACTERES.");
        }
        $this->nombreL = $RegistroL;
        $this->autorL = $autor;
        $this->generoL = $genero;
        $this->estatusL = $estatus;
        $this->archivoL = $archivo;
    }
}

class RegistroHandler {
    private $libroController;

    public function __construct() {
        $this->libroController = new LibroController();
    }

    public function handle(RegistroCommando $command) {
        $this->libroController->insertarLibro(
            $command->nombreL,
            $command->autorL,
            $command->generoL,
            $command->estatusL,
            $command->archivoL
        );
    }
}

if (isset($_POST['btnregistrar'])) {
    try {
       
        $command = new RegistroCommando(
            $_POST['nombre'],
            $_POST['autor'],
            $_POST['genero'],
            $_POST['estatus'],
            $_FILES['archivo']
            
        );

       
        $handler = new RegistroHandler();
        $handler->handle($command);

     
        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        echo "<script>alert('" . $e->getMessage() . "');</script>";
    }
}
?>

