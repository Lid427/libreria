<?php
include "modelo/conexion.php";

if (!empty($_POST["btnregistrar"])) {
    if (empty($_POST["nombre"]) || empty($_POST["contraseña"])) {
        echo '<div class="alert alert-danger">Ingresa los datos correspondientes</div>';
    } else {
        $nombre = $_POST["nombre"];
        $contraseña = $_POST["contraseña"];

        $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND contraseña = '$contraseña'";
        $resultado = $conexion->query($sql);
        
        if ($datos = $resultado->fetch_object()) {
            header("Location: index.php");
            exit(); 
        } else {
            echo '<div class="alert alert-danger">Datos incorrectos</div>';
        }
    }
}
?>
