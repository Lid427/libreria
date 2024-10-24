<?php
require_once 'modelo/conexion.php';
require_once 'controlador/librocontroller.php';

class LibroDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConexion();
    }

    public function listarLibros() {
        $sql = "SELECT * FROM libreria";
        $result = $this->conexion->query($sql);
        $libros = [];

        while ($row = $result->fetch_assoc()) {
            $libro = new Libro($row['id'], $row['nombreLibro'], $row['Autor'], $row['Genero'], $row['Estatus'], $row['Archivo']);
            $libros[] = $libro;
        }

        return $libros;
    }

    public function obtenerLibroPorId($id) {
        $sql = "SELECT * FROM libreria WHERE id = $id";
        $result = $this->conexion->query($sql);
    
        if ($result && $row = $result->fetch_assoc()) {
            return new Libro($row['id'], $row['nombreLibro'], $row['Autor'], $row['Genero'], $row['Estatus'], $row['Archivo']);
        } else {
            return null;
        }
    }
    

    public function insertarLibro(Libro $libro) {
        $sql = "INSERT INTO libreria (nombreLibro, Autor, Genero, Estatus, Archivo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("sssss", 
            $libro->getNombreLibro(),
            $libro->getAutor(),
            $libro->getGenero(),
            $libro->getEstatus(),
            $libro->getArchivo()
        );
        $stmt->execute();
    }

    public function actualizarLibro(Libro $libro) {
        $sql = "UPDATE libreria SET nombreLibro = ?, Autor = ?, Genero = ?, Estatus = ?, Archivo = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("sssssi", 
            $libro->getNombreLibro(),
            $libro->getAutor(),
            $libro->getGenero(),
            $libro->getEstatus(),
            $libro->getArchivo(),
            $libro->getId()
        );
        $stmt->execute();
    }

    public function eliminarLibro($id) {
        $sql = "DELETE FROM libreria WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id); 
        $stmt->execute();
    }
    
}
?>

