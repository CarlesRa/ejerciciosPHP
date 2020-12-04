<?php 


  if (isset($_GET['position']) && isset($_GET['butacas']) && 
      isset($_GET['pelicula'])) {

    require_once ("./db/db_access.php");

    $position = $_GET['position'];
    $butacas = $_GET['butacas'];
    $pelicula = $_GET['pelicula'];
    $butacas[$position] = '2';
    $src = "http://localhost/ejerciciosPHP/PDFs/ud07ejer02/cinepagina.php?pelicula=$pelicula";
    DbAccess::setButacas($pelicula, $butacas);
    //header("Location: http://localhost/ejerciciosPHP/PDFs/ud07ejer02/cinepagina.php?pelicula=$pelicula");
  }


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comprando</title>

  <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
  <div class="container">
    <div class="log">
      <img src="./img/logo.png" alt="Logo Super Cines">
    </div>
    <div class="titulo ml-10">
      <h1>¡Enhorabuena!</h1>
      <p>Adquirida entrada para <big><?php echo $pelicula ?></big>. si desea descargarla, haga click <a href="#"> AQUÍ</a></p>
    </div>
    <div class="button">

      <a href=<?php echo $src ?>>
        <img src="./img/botonSeguir.png" alt="Botón Seguir Comprando">
      </a>
    </div>
  </div>
</body>
</html>