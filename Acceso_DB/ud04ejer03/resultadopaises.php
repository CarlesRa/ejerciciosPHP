<!doctype html> 
<htmllang="en"
><head>
 <meta charset="utf-8">
 <title>Paises</title>
</head>
  <body>
    <?php 
      require("datosconexion.php");
      $conexion = mysqli_connect($db_host, $db_usuario, $db_contrasena);
      if(mysqli_connect_errno()){
        echo "Houston, tenemos un problema...";
        exit();
      }
      mysqli_select_db($conexion, $db_nombre) or die("NO encuentro la base de datos.");
      mysqli_set_charset($conexion, "utf8");
      $sql= "SELECT codigo, seccion, precio, paisorigen FROM productos WHERE paisorigen= ? ";
      $resultado = mysqli_prepare($conexion, $sql);
      $pais= $_GET["pais"]; 
      mysqli_stmt_bind_param($resultado, "s",$pais);
      $ok = mysqli_stmt_execute($resultado);
      if(!$ok){
        echo"Error al ejecutar la consulta";
      }else{
        mysqli_stmt_bind_result($resultado,$micodigo, $miseccion, $miprecio, $mipais);
        echo"Artículos Encontrados: <br><br>";
        while(mysqli_stmt_fetch($resultado)){
          echo$micodigo." ". $miseccion." ". $miprecio." ". $mipais."<br>"; 
        }
        echo '<br><a href="formulariointroduccion.php">Volver a insertar</a>';
        $resultadomysqli_stmt_close($resultado);
      }
      mysqli_close($conexion);
    ?>

  </body>
</html>