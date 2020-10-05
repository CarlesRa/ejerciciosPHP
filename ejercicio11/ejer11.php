<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio11</title>
  <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
  <div class="container">
    <h1>Cirque du Soleil</h1>
    <form action="mostrar.php" method="get">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre"> <br>

      <label for="gustar">¿Que le ha parecido el espectáculo?</label>
      <select name="gustar" id="">
        <option value="Bueno">Bueno</option>
        <option value="Regular">Regular</option>
        <option value="Malo">Malo</option>
      </select> <br>

      <label for="recomendar">¿Recomendaría el espectáculo?</label>
      <label for="si">Sí</label>
      <input type="radio" name="recomendar" value="Si" id="si">
      <label for="no">No</label>
      <input type="radio" name="recomendar" value="No" id="no"><br>

      <div class="boton">
        <input type="submit" id="enviar" value="Enviar">
      </div>

    </form>
  </div>
</body>
</html>