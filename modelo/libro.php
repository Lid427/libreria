<?php
class Libro {
    private $id;
    private $nombreLibro;
    private $autor;
    private $genero;
    private $estatus;
    private $archivo;

    public function __construct($id, $nombreLibro, $autor, $genero, $estatus, $archivo) {
        $this->id = $id;
        $this->nombreLibro = $nombreLibro;
        $this->autor = $autor;
        $this->genero = $genero;
        $this->estatus = $estatus;
        $this->archivo = $archivo;
    }

   
    public function getId() { return $this->id; }
    public function getNombreLibro() { return $this->nombreLibro; }
    public function getAutor() { return $this->autor; }
    public function getGenero() { return $this->genero; }
    public function getEstatus() { return $this->estatus; }
    public function getArchivo() { return $this->archivo; }

    public function setNombreLibro($nombreLibro) { $this->nombreLibro = $nombreLibro; }
    public function setAutor($autor) { $this->autor = $autor; }
    public function setGenero($genero) { $this->genero = $genero; }
    public function setEstatus($estatus) { $this->estatus = $estatus; }
    public function setArchivo($archivo) { $this->archivo = $archivo; }
}
?>
