<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio07</title>
  <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
  <div class="container">
  <table border=1>
    <?php
      foreach($_SERVER as $key => $value) {
        echo "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
      }
    ?>
  </table>
  <?php 
  
    echo "<p><br/>¿SERVER es un array númerico o asociativo?";
    echo "<br/>Es un array asociativo porque esta formado por pares clave-valor.";
    echo "<br/>¿Podríamos haberlo recorrido con un for de toda la vida?";
    echo "<br/>No, porque no podriamos haber extraido el valor de la clave, ya que la función key(). imprimiria el primer valor solo al no mover el puntero</p>";
  ?>
  </div>
</body>
</html>

