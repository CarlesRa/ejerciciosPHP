<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejemplo 03</title>
</head>
<body>
  <?php 
  
    //Limpio los encabezados
    ob_end_clean();
  
    //estampa y foto para aplicar marca de agua.
    $estampa = imagecreatefrompng('estampa.png');
    $img = imagecreatefromjpeg('osito.jpg');

    //Establezco margenes para la estampa
    $margen_dcho = 10;
    $margen_inf = 10;

    //obtener ancho alto de la imagen de la estampa
    $sx = imagesx($estampa);
    $sy = imagesy($estampa);

    /*
      Copiar loa imagen de la estampa sobre la foto usando los indices
      de margen y el ancho de la foto para calcular la posición de la estampa.
    */
    imagecopy($img, $estampa, 
      imagesx($img) - $sx - $margen_dcho, imagesy($img) - $sy - $margen_inf,
              0, 0, imagesx($estampa), imagesy($estampa));

    //Pinto la imagen
    header('Content-type: image/png');
    imagepng($img);

    //La guardo en un archivo nuevo
    imagepng($img, 'osito_registrado.jpg');

    // Libero la memoria
    imagedestroy($img);

  ?>
</body>
</html>