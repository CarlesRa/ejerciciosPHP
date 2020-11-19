<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ud06ejer01</title>
</head>
<body>
  <?php 
    /*remover posibles encabezados existentes
    foreach (getallheaders() as $name => $value) {
      header_remove($name);
    }*/

    //Comprobamos que no se haya generado ningun encabezado
    ob_end_clean();

    //Creación de la imagen
    $alto = 400;
    $ancho = 400;
    $imagen = imagecreatetruecolor($ancho, $alto);
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $azul = imagecolorallocate($imagen, 0, 0, 164);

    //Dibujo la imagen
    $textoImagen1 = 'Que pasa mami';
    $textoImagen2 = 'Dime papi';
    imagefill($imagen, 0, 0, $azul);
    imageline($imagen, 0, 0, $ancho, $alto, $blanco);
    imagestring($imagen, 4, 40, 150, $textoImagen1, $blanco);
    imagestring($imagen, 4, 250, 200, $textoImagen2, $blanco);

    //Generación de la imagen
    header('content-type: image/png');
    imagepng($imagen);

    //Libero la imagen de memoria
    imagedestroy($imagen);

    
  
  ?>
</body>
</html>