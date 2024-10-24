<?php
require_once 'C:\xampp\htdocs\Libreria\modelo\Libro.php';
require_once 'C:\xampp\htdocs\Libreria\DAOlibrosclas\DAOlibrosclas.php';
require_once 'C:\xampp\htdocs\Libreria\CQRS\CQRS_libro.php';
require_once 'C:\xampp\htdocs\Libreria\CQRS\CQRS_modificar.php';
class LibroController {
    private $libroDAO;

    public function __construct() {
        $this->libroDAO = new LibroDAO();
    }

    public function listarLibros() {
        return $this->libroDAO->listarLibros();
    }

    public function obtenerLibroPorId($id) {
        return $this->libroDAO->obtenerLibroPorId($id);
    }

    public function insertarLibro($nombre, $autor, $genero, $estatus, $archivo) {
        $libro = new Libro(null, $nombre, $autor, $genero, $estatus, $archivo);
        $this->libroDAO->insertarLibro($libro);
    }

    public function actualizarLibro($id, $nombre, $autor, $genero, $estatus, $archivo) {
        $libro = new Libro($id, $nombre, $autor, $genero, $estatus, $archivo);
        $this->libroDAO->actualizarLibro($libro);
    }

    public function eliminarLibro($id) {
        $this->libroDAO->eliminarLibro($id);
    }
}
?>
