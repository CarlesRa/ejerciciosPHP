<title>Ejercicio08</title>

<?php 

  $m = array( array(1,3,0,8), array(13,5,2), array(18,4,1,9,87), array(6,9) );
  $contador = 0;
  $posicion;

  for ($i = 0; $i < count($m); $i++) {
      if ($contador < count($m[$i])) {
        $contador = count($m[$i]);
        $posicion = $i;
      }
  }
  

  echo "Dada la matriz: <br/>";
  print_r($m);
  echo "<br/>El array con mas elementos es:<br/>";
  print_r($m[$posicion]);
?>