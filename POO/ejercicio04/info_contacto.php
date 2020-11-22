<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <?php 
    $id = $_GET['id'];
    $nombre = $_GET['nombre'];
    $telefono = $_GET['telefono'];

  ?>

  <h1>Detalle Contacto</h1>
  <hr>
  <?php 
  
    echo '<h2>Id: ' . $id . '</h2>';
    echo '<h2>Nombre: ' . $nombre . '</h2>';
    echo '<h2>Teléfono: ' . $telefono . '</h2>';
  ?>
  
</body>
</html>

