<?php 
require_once 'controlador/librocontroller.php';

class ModificarCommando {
    public $idl;
    public $nombreL;
    public $autorL;
    public $generoL;
    public $estatusL;
    public $archivoL;

    public function __construct($id, $nombre, $autor, $genero, $estatus, $archivo) {
        if (strlen($genero) < 5 || strlen($genero) > 100) {
            throw new Exception("EL GÉNERO DEBE DE TENER ENTRE 5 Y 100 CARACTERES.");
        }

        $this->idl = $id;
        $this->nombreL = $nombre;
        $this->autorL = $autor;
        $this->generoL = $genero;
        $this->estatusL = $estatus;
        $this->archivoL = $archivo;
    }
}

class ModificarHandler {
    private $libroController;

    public function __construct() {
        $this->libroController = new LibroController();
    }

    public function handle(ModificarCommando $command) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $autor = $_POST['autor'];
            $genero = $_POST['genero'];
            $estatus = $_POST['estatus'];
            
            $archivo = null; 
            if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
                $archivo = $_FILES['archivo']['name'];
                move_uploaded_file($_FILES['archivo']['tmp_name'], 'ruta/a/tu/directorio/' . $archivo); 
            }}
        $this->libroController->actualizarLibro(
            $command->idl,
            $command->nombreL,
            $command->autorL,
            $command->generoL,
            $command->estatusL,
            $command->archivoL
        );
    }
}

if (isset($_POST['btnmodificar'])) {
    try {
        if (empty($_POST['nombre']) || empty($_POST['autor']) || empty($_POST['genero']) || empty($_POST['estatus'])) {
            throw new Exception("Todos los campos son obligatorios.");
        }

        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Error al subir el archivo. Inténtalo de nuevo.");
        }

        $genero = trim($_POST['genero']);
        error_log("Género recibido: " . $genero); 

        $command = new ModificarCommando(
            $_POST['idl'],
            $_POST['nombre'],
            $_POST['autor'],
            $genero,  
            $_POST['estatus'],
            $_FILES['archivo']
        );

        $handler = new ModificarHandler();
        $handler->handle($command);

        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        echo "<script>alert('" . addslashes($e->getMessage()) . "');</script>";
    }
}