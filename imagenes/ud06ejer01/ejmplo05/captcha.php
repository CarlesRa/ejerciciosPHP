<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejemplo 05</title>
</head>
<body>
  
  <?php 
    

    //remover posibles encabezados existentes
    /* foreach (getallheaders() as $name => $value) {
      header_remove($name);
    } */

    //Limpio los encabezados
    //ob_get_contents();
    ob_end_clean();
    
    $img_width = 100;
    $img_height = 50;

    //Creo cadena aleatoria con mktime(marca de tiemo unix)
    $crypt = md5(mktime() * rand());

    //Selecciono solo 5 caracteres.
    $string = substr($crypt, 0, 5);

    //Cambio el tamaño del texto
    $string = wordwrap($string, (500));

    //Creo una imagen partiendo de una de fondo
    $captcha = imagecreatefrompng("captcha.png");

    //Cambio el tamaño
    $imageReescalada = imagescale($captcha, $img_width, $img_height, IMG_BICUBIC_FIXED);
    

    //Colores lineas (RGB)
    $brown = imagecolorallocate($imageReescalada, 80, 70, 30);
    $pink = imagecolorallocate($imageReescalada, 165, 84, 168);

    //Añado lineas a la imagen
    imageline($imageReescalada, 0, 0, 39, 29, $brown);
    imageline($imageReescalada, 40, 0, 64, 29, $brown);
		imageline($imageReescalada, 60, 12, 64, 29, $brown);
		imageline($imageReescalada, 65, 18, 50, 20, $brown);
    imageline($imageReescalada, 78, 45, 74, 29, $brown);

    //Introduzco la cadena aleatoria en la imagen
    imagestring($imageReescalada, 5, 30, 10, $string, $pink);

    //Encripto y almaceno el valor en una variable session
    $_SESSION['key'] = md5($string);

    //Pinto la imagen
    header("Content-type: image/png");
    imagepng($imageReescalada);

    //Libero la memoria
    imagedestroy($captcha);
    imagedestroy($imageReescalada);

  ?>
</body>
</html>