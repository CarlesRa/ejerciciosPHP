<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado Insertar</title>
  <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
  <div class="contenido">
  
    <?php 
      require("datosconexion.php");

      $seccion = $_POST["seccion"];
      $articulo = $_POST["articulo"];
      $precio =  $_POST["precio"];
      $pais = $_POST["pais"];

      $conexion = new mysqli($db_host, $db_usuario, $db_contrasena, $db_nombre);

      if ($conexion->connect_errno) {
        echo 'Houston, tenemos un problema...';
      }

      $sql = "INSERT INTO productos (seccion, articulo, precio, paisorigen) VALUES (?, ?, ?, ?)";

      if ($resultado = $conexion->prepare($sql)) {

        $resultado->bind_param('ssis', $seccion, $articulo, $precio, $pais);

        if (($resultado->execute())) {
          echo '<p>Artículo insertado...</p>';
          echo '<p><a href="formulariointroduccion.php">Insertar un Artículo NUEVO</a></p>';
        }
        else {
          echo 'Error al insertar los valores';
        }
      }
      else {
        echo 'No se pudo insertar....';
        exit();
      }
    
      mysqli_stmt_close($resultado);
    ?>
  
  </div>
  
</body>
</html>