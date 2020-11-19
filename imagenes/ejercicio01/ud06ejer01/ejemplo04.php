<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejemplo 04</title>
</head>
<body>

  <?php 

    //Limpio los encabezados
    ob_end_clean();

    //Creo imagen estampa y la foto donde va estampada
    $estampa = imagecreatetruecolor(200, 80);
    $img = imagecreatefromjpeg('osito.jpg');

    //Establezco margenes para la estampa
    $margen_dcho = 10;
    $margen_inf = 10;

    //obtener ancho alto de la imagen de la estampa
    $sx = imagesx($estampa);
    $sy = imagesy($estampa);

    // dibujo un rectangulo con relleno
    imagefilledrectangle($estampa, 0, 0, 200, 80, 0x0000FF);
    imagefilledrectangle($estampa, 9, 9, 190, 70, 0xFFFFFF);

    //dibujo un texto horizontal
    $texto1 = 'NO COPIAR!!';
    $texto2 = 'PELIGRO DE MUERTE';
    imagestring($estampa, 5, 20, 20, $texto1, 0x0000FF);
    imagestring($estampa, 10, 20, 40, $texto2, 0x0000FF);
  
    //Fusionamos la estampa con la foto con una opacidad de 50
    imagecopymerge($img, $estampa,
                   imagesx($img) - $sx - $margen_dcho, imagesy($img) - $sy - $margen_inf,
                  0, 0, imagesx($estampa), imagesy($estampa), 50);

                  //Pinto la imagen
    header('Content-type: image/png');
    imagepng($img);

    // Libero la memoria
    imagedestroy($img);
  
  ?>
</body>
</html>