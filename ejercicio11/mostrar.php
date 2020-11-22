<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado Formulario</title>
</head>
<body>
  <h1>Resultado del formulario</h1>
  <?php 

    $nombre = $_GET['nombre'];
    $gustar = $_GET['gustar'];
    $recomendar = $_GET['recomendar'];

    print("Nombre: " . $nombre . "<br/>");
    print("Como le ha parecido: " . $gustar . "<br/>");
    print("Recomndaría el espectáculo: " . $recomendar);

  ?>
</body>
</html>