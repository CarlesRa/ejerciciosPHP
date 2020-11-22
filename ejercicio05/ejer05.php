<title>Ejercicio05</title>

<?php
  date_default_timezone_set('UTC');

  $numero = 7;

  echo "La tabla de multiplicar del " . $numero . " es:<br/>";
  for ($i = 0; $i < 10; $i++) {
      echo($numero . " x " . ($i + 1) . " = " . ($numero * ($i + 1)) . "<br/>");
  }

?>