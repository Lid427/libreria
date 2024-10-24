<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<body>
   <div class="container-fluid row"></div>
   <form method="post" class="col-5 mx-auto">
   <h2 class="animate__animated animate__backInLeft" class="text-center p-3">Sistema de login</h2>
   <?php
   include "modelo/conexion.php";
   include "controlador/validar.php";
   ?>
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuario</label>
    <input type="text" placeholder="Ingrese su nombre"  class="form-control" name="nombre">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Contraseña</label>
    <input type="text" placeholder="Ingrese su contraseña" class="form-control" name="contraseña">
  </div>

  <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar libro</button>

   
   

   </form> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>