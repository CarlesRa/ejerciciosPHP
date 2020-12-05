<?php 

  //define("NUM_BUTACAS_FILA", 10) ;
  //define("NUM_FILAS", 5);
  include_once ("./constants/constants.php");

  class Lib {

    public static function printButacas($butacas, $pelicula) {

     $butacasString = $butacas['butacas'];
      $contador = 0;
      for ($i = 0; $i < NUM_FILAS; $i++) {

        echo '<br>';

        for ($z = 0; $z < NUM_BUTACAS_FILA; $z++) {

          if ($butacasString[$contador] === '1') {
            $src = './img/butaca_amarilla.png';
            echo "<a href='./cinecomprada.php?fila=$i&columna=$z&pelicula=$pelicula'><img src='$src'></a>";
          }
          else {
            $src = './img/butaca_roja.png';
            echo "<img src='$src'>";
          }
          $contador++;
        }
      }
    }
  }

?>