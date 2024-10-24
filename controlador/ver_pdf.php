<?php

require_once '../modelo/conexion.php'; 

// Obtener la conexión a la base de datos
$conexion = Conexion::getConexion(); // Usar el método estático

// Obtener el ID del libro desde la URL
$id = $_GET['id'];

// Preparar la consulta
$sql = $conexion->prepare("SELECT Archivo, nombreLibro FROM libreria WHERE id = ?");
$sql->bind_param("i", $id);
$sql->execute();
$sql->bind_result($archivo, $nombreArchivo);
$sql->fetch();
$sql->close();

// Mostrar el archivo
if ($archivo) {
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=\"$nombreArchivo\"");
    header("X-Content-Type-Options: nosniff");
    echo $archivo;
} else {
    echo "No se encontró el archivo.";
}
?>

