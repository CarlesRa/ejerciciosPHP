<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejemplo 02</title>
</head>
<body>
  <?php 

    //Limpio los encabezados
    ob_end_clean();

    $srcGif = 'ahwg.gif';
  
    //Creo la imagen cargando el gif
    $img_org = imagecreatefromgif($srcGif);
    
    if ($img_org !== false) {
      //Obtengo la mitad de las dimensiones de la imagen origen
      $ancho_dst = intval(imagesx($img_org / 2));
      $alto_dst = intval(imagesy($img_org / 2));

      //Creo el lienzo con las dimensiones calculadas previamente
      $img_dst = imagecreatetruecolor($ancho_dst, $alto_dst);

      //Escalo la imagen origen sobre la destino especificando punos inicio y final
      imagecopyresampled($img_dst, $img_org, 0, 0, 0, 0, $ancho_dst, $alto_dst, 
                          imagesx($img_org), imagesy($img_org));

      imagecopyresampled($img_dst, $img_org, 0, 0, 0, 0, $ancho_dst, $alto_dst,
       imagesx($img_org), imagesy($img_org));

      //Pintamos la imagen cambiando el formato a png
      header('Content-type: image/png');
      imagepng($img_dst);

      imagedestroy($img_org);
      imagedestroy($img_dst);
    }
    else {
      echo 'Fallo en la carga de la imagen';
    }
    
      
  ?>
</body>
</html>