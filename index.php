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
    <title>Libreria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="estilos/fontawesome-free-6.0.0-web/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <h1 class="text-center p-3">Biblioteca</h1>
    <div class="row d-flex justify-content-center">
    <div class="col-8">
   <?php 
   
   $nombreLibro = "";
$error = "";

    if (isset($_GET['buscar_id'])) {
    $id = $_GET['buscar_id']; 
    $libro = $libroController->obtenerLibroPorId($id); 
    if ($libro) {
        $nombreLibro = $libro->getNombreLibro(); 
    } else {
        $error = "No se encontró ningún libro con ese ID."; 
    }
    }
    ?>
    <form method="GET" action="index.php">
    <div class="mb-3">
        <label for="buscar_id" class="form-label">Buscar libro por ID:</label>
        <input type="number" class="form-control" name="buscar_id" required>
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>
<?php if (!empty($nombreLibro)): ?>
    <div class="alert alert-success mt-3">
        Libro encontrado: <?php echo $nombreLibro; ?>
    </div>
<?php elseif (!empty($error)): ?>
    <div class="alert alert-danger mt-3">
        <?php echo $error; ?>
    </div>
<?php endif; ?>
    <table class="table">
  <thead class="bg-info">
    <tr>
      <th scope="col">Nombre del libro</th>
      <th scope="col">Autor</th>
      <th scope="col">Genero</th>
      <th scope="col">Estatus</th>
      <th scope="col">Archivo</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($libros as $libro): ?>

    
                <td><?php echo $libro->getNombreLibro(); ?></td>
                <td><?php echo $libro->getAutor(); ?></td>
                <td><?php echo $libro->getGenero(); ?></td>
                <td><?php echo $libro->getEstatus(); ?></td>
      <?php if ($libro->getEstatus() == 'Disponible') { ?>
        <td><a href="controlador/ver_pdf.php?id=<?php echo $libro->getId(); ?>" target="_blank">Ver PDF</a></td>

            <?php } else { ?>
                <td> Archivo No Disponible </td>
            <?php } ?>

            <td><a class="btn btn-small btn-warning" href="modificar.php?id=<?php echo $libro->getId();?>"><i class="fas fa-edit"></i></a></td>
            <?php if (isset($_GET['eliminar'])) {
             $id = $_GET['eliminar']; 
             $libroController->eliminarLibro($id); 
             header("Location: index.php?success=1");
             exit();
              }
              ?>
            <td><a class="btn btn-small btn-danger" href="index.php?eliminar=<?php echo $libro->getId(); ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este libro?');"><i class="fas fa-trash"></i></a></td>
            
    </tr>
    
   
    <tr>
      
  </tbody>
  <?php endforeach; ?>
</table>
<button type="button" class="btn btn-success" onclick="window.location.href='registro.php'">Registrar libro</button>

    </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>       