<?php 

  class Lib {

    public static function printButacas($butacas) {
      
      $saltoFila = 9;
      for ($i = 0; $i < strlen($butacas); $i++) {
        $butaca = $butacas{$i};
        if ($butacas{$i} === '1') {
          $src = './img/butaca_amarilla.png';
        }
        else {
          $src = './img/butaca_roja.png';
        }
        echo "<img src='$src' onclick='filaSeleccionada($i)'>";
        if ($i === $saltoFila) {
          $saltoFila += 10;
          echo '<br>';
        }
      }
    }
  }

?>