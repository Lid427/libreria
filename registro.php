<?php
require_once 'controlador/librocontroller.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center p-3">Registrar Nuevo Libro</h1>
    <div class="container-fluid row">
        <form class="col-6 mx-auto" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del libro</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" name="autor" required>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <input type="text" class="form-control" name="genero" required>
            </div>
            <div class="mb-3">
                <label for="estatus" class="form-label">Estatus</label>
                <input type="text" class="form-control" name="estatus" required>
            </div>
            <div class="mb-3">
                <label for="archivo" class="form-label">Subir archivo PDF</label>
                <input type="file" class="form-control" name="archivo" required>
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar libro</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
