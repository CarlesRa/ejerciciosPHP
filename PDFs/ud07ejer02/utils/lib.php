<?php 

  class Lib {

    public static function printButacas($butacas, $pelicula) {

      $butacasString = $butacas['butacas'];
      $saltoFila = 9;
      for ($i = 0; $i < strlen($butacasString); $i++) {
        if ($butacasString[$i] === '1') {
          $src = './img/butaca_amarilla.png';
          echo "<a href='./cinecomprada.php?position=$i&butacas=$butacasString&pelicula=$pelicula'><img src='$src'></a>";
        }
        else {
          $src = './img/butaca_roja.png';
          echo "<img src='$src'>";
        }
        
        
        if ($i === $saltoFila) {
          $saltoFila += 10;
          echo '<br>';
        }
      }
    }
  }

?>