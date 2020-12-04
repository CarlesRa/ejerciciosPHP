<?php 
  session_start();

  if (!$_SESSION['loged']) {
    header('Location:../login.php');
  }

  include_once ('./db/db_access.php');
  include_once ('./utils/lib.php');
  $nombre = $_SESSION['nombre'];
  echo '<script> console.log("hola amigo"); </script>';

  $peliculaSeleccionada = 'Alien';

  if (isset($_POST['seleccionar'])) {
  if (!empty($_POST['pelicula'])) {
      $peliculaSeleccionada = $_POST['pelicula'];
    }
  }
  else {
    if (isset($_GET['pelicula'])) {
      $peliculaSeleccionada = $_GET['pelicula'];
    }
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Super Cines</title>

  <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="./img/logo.png" alt="Logo Super Cines">
    </div>
    <p class="text-mid saludo">¡¡Hola <?php echo $nombre ?>!!
       '. **<a href="./logout.php">[Logout]</a>**</p>

    <div class="formulario">

      <div class="titulo">
        <h1>Comprar entradas</h1>
        <h2>Película: <?php echo $peliculaSeleccionada ?></h2>
      </div>
      <div class="pantalla">
        <img src="./img/pant.png" alt="Pantalla cine">
      </div>
      <div class="butacas">
        <?php 

          $butacas = DbAccess::getButacasByPelicula($peliculaSeleccionada);

          echo Lib::printButacas($butacas, $peliculaSeleccionada);

        ?>
      </div>
      <div class="inputs" style="margin-top:10px">
        <form action="" method="post">
          <select name="pelicula" id="pelicula">
            <option class="text-mid" value="Alien" 
              <?php if($peliculaSeleccionada === 'Alien') {
                    echo 'selected'; 
                  }
                  else {
                    echo '';
                  }
                  ?>>Alien</option>
            <option class="text-mid" value="Batman"
              <?php if($peliculaSeleccionada === 'Batman'){
                echo 'selected';
              }
              else {
                echo '';
              }  ?>>Batman</option>
            <option class="text-mid" value="Titanic"
              <?php if($peliculaSeleccionada === 'Titanic'){
                echo 'selected';
              }
              else {
                echo '';
              }  ?>>Titanic</option>
          </select>
          <input class="ml-10 text-mid" type="submit" name="seleccionar" value="Seleccionar película">
        </form>  
      </div>
    </div>
  </div>

  <?php 
  
    function printButacas($butacas) {
        
      $saltoFila = 9;
      for ($i = 0; $i < strlen($butacas); $i++) {
        $butaca = $butacas{$i};
        if ($butacas{$i} === '1') {
          $src = './img/butaca_amarilla.png';
        }
        else {
          $src = './img/butaca_roja.png';
        }
        echo "<input onclick=" . imprimir() . " src='$src'>";
        
        if ($i === $saltoFila) {
          $saltoFila += 10;
          echo '<br>';
        }
      }
    }
  
  ?>
 <script>
   function filaSeleccionada(numFila) {
    console.log(numFila);
   }
 </script>
</body>
</html>