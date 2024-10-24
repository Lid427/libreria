<?php 
require_once 'controlador/librocontroller.php';

$libroController = new LibroController();
$libros = $libroController->listarLibros();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center p-3">Modificar libros</h1>
    <div class="container-fluid row"></div>
    <form class="col-5 mx-auto" method="POST" enctype="multipart/form-data">
        <?php
        include_once "modelo/conexion.php";

        // Obtener el libro por ID
        $id = $_GET["id"];
        $libro = $libroController->obtenerLibroPorId($id); // Obtén el libro por ID
        ?>
        <input type="hidden" name="id" value="<?= $libro->getId() ?>">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del libro</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $libro->getNombreLibro(); ?>" required>
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" name="autor" value="<?php echo $libro->getAutor(); ?>" required>
        </div>
        <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
            <input type="text" class="form-control" name="genero" value="<?php echo $libro->getGenero(); ?>" required>
        </div>
        <div class="mb-3">
            <label for="estatus" class="form-label">Estatus</label>
            <input type="text" class="form-control" name="estatus" value="<?php echo $libro->getEstatus(); ?>" required>
        </div>
        <div class="mb-3">
            <label>Archivo actual: <a href="controlador/ver_pdf.php?id=<?= $libro->getId() ?>" target="_blank">Ver PDF</a></label>
            <br>
            <label for="archivo" class="form-label">Modificar archivo PDF</label>
            <input type="file" class="form-control" name="archivo">
        </div>

        <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Actualizar Libro</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
