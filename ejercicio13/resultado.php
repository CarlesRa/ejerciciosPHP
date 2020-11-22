<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado formulario</title>
</head>
<body>
  <h1>Datos del formulario</h1>

  <?php 
  
    $nombre = $_POST['nombre'];
    $estilos = $_POST['estilos'];
    $ip = getIPCliente();
    $hostname = gethostbyaddr(getIPCliente());
    $fecha = getdate();

    echo date('m/d/Y h:m:s') . "<br/>";
    echo "Nombre: " . $nombre . "<br/>";
    echo "Gustos musicales: " . implode(", ", $estilos)  . ".<br/>";
    echo "ip: " . $ip . "<br/>";
    echo "Nombre máquina cliente: " . $hostname . "<br/>";
    echo "<a href='ejer13.php'>Volver a formulario</a>";
    
    function getIPCliente() {

      if (isset($_SERVER['HTTP_CLIENT_IP']))        
        $ip= $_SERVER['HTTP_CLIENT_IP'];  

      elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']))        
        $ip= $_SERVER['HTTP_X_FORWARDED_FOR'];  

      elseif(isset($_SERVER['HTTP_X_FORWARDED']))        
        $ip= $_SERVER['HTTP_X_FORWARDED'];  

      elseif(isset($_SERVER['HTTP_FORWARDED_FOR']))        
        $ip= $_SERVER['HTTP_FORWARDED_FOR'];   

      elseif(isset($_SERVER['HTTP_FORWARDED']))        
        $ip= $_SERVER['HTTP_FORWARDED']; 

      elseif(isset($_SERVER['REMOTE_ADDR']))        
        $ip= $_SERVER['REMOTE_ADDR']; 

      else $ip= 'Origen desconocido.';
      
      return$ip;
    }

  ?>
</body>
</html>