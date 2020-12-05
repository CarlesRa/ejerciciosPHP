<?php 

  require_once ("./db/db_access.php");

  if (isset($_GET['fila']) && isset($_GET['columna']) && 
      isset($_GET['pelicula']) ) {

      $fila = $_GET['fila'];
      $columna = $_GET['columna'];
      $pelicula = $_GET['pelicula'];
      $butacas = DbAccess::getButacasByPelicula($pelicula)["butacas"];
      $src = "http://localhost/ejerciciosPHP/PDFs/ud07ejer02/cinepagina.php?pelicula=$pelicula";
      $position = $fila * (NUM_BUTACAS_FILA - 1) + $columna  + $fila;

      $butacas[$position] = '2';
      DbAccess::setButacas($pelicula, $butacas);
  
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
      <p>Adquirida entrada para <big><?php echo $pelicula ?></big>. si desea descargarla, haga click
       <?php 
        echo "<a href='./cinepdfentrada.php?fila=$fila&butaca=$columna&pelicula=$pelicula'>¡Aqui!</a></p>";
       ?>
    </div>
    <div class="button">

      <a href=<?php echo $src ?>>
        <img src="./img/botonSeguir.png" alt="Botón Seguir Comprando">
      </a>
    </div>
  </div>
</body>
</html>

<?php 
  }
  else {
    header("Location: ./cinepagina.php");
  }
?>