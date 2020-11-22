<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UD 4 Ejercicio 2</title>

  <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
  <?php 
    require_once ('models/Libro.php');
    require_once ('db/DbAccess.php');
    //<?=$_SERVER['PHP_SELF'];
  ?>
  <div class="container">
    <h1>Insertar Libros</h1>

    <form action="" method="post" onsubmit=<?php enviarFormulario() ?>>

      <div>
      <label for="id">Id*</label>
        <input type="number" name="id" 
               value="<?php if(isset($_POST['id'])) echo $_POST['id']?>">
        <?php 
          if (isset($_POST['enviar']) && empty($_POST['id'])) {
            echo"<span style='color:red;'> Debe introducir un id!</span><br/>";
          }
        ?>
      </div>
      
      <div>
        <label for="titulo">Título*</label>
        <input type="text" name="titulo"
               value="<?php if(isset($_POST['titulo'])) echo $_POST['titulo']?>">
        <?php 
          if (isset($_POST['enviar']) && empty($_POST['titulo'])) {
            echo"<span style='color:red;'> Debe introducir un título!</span><br/>";
          }
        ?>
      </div>
      

      <div>
        <label for="autor">Autor*</label>
        <input type="text" name="autor"
               value="<?php if(isset($_POST['autor'])) echo $_POST['autor']?>">
        <?php 
          if (isset($_POST['enviar']) && empty($_POST['autor'])) {
            echo"<span style='color:red;'> Debe introducir un autor!</span><br/>";
          }
        ?>
      </div>
      
      <div>
        <label for="paginas">Páginas*</label>
        <input type="number" name="paginas"
               value="<?php if(isset($_POST['paginas'])) echo $_POST['paginas']?>">
        <?php 
          if (isset($_POST['enviar']) && empty($_POST['paginas'])) {
            echo"<span style='color:red;'> Debe introducir la cantidad de paginas!</span><br/>";
          }
        ?>
      </div>

      <div class="boton">
        <input type="submit" value="Introducir Libro" name="enviar" id="enviar">
      </div>

      
    </form>
    <table border>
        <th>ID</th>
        <th>TITULO</th>
        <th>AUTOR</th>
        <th>PÁGINAS</th>

    <?php 

      //Creo la conexión con Mysql
      $conexion = DbAccess::getInstance();

      if ($conexion->connect_errno) {
        echo"Error conectando con MySQL: ". $conexion->connect_error;
        exit();   
      }

      $query = 'SELECT * FROM libros';
      if ($consulta = $conexion->query($query)) {

        while ($object = $consulta->fetch_object()) {
          echo '<tr><td>' . $object->id . '</td>' . '<td>' . $object->titulo . '</td>' .
          '<td>' . $object->autor . '</td>' . '<td>' . $object->paginas . '</td></tr>';
        }
      }
      $conexion->close();

      function enviarFormulario() {

        $conexion = DbAccess::getInstance();

        if ($conexion->connect_errno) {
          echo"Error conectando con MySQL: ". $conexion->connect_error;
          exit();   
        }

        if (empty($_POST['id']) || empty($_POST['titulo']) ||
        empty($_POST['autor']) || empty($_POST['paginas'])) {

          return false ;
          
        }
        else {

          $libro = new Libro(
            [
            'id' => $_POST['id'], 'titulo' => $_POST['titulo'],
            'autor' => $_POST['autor'], 'paginas' => $_POST['paginas']
            ]
            );
          
          $sql = 'INSERT INTO libros (id,titulo,autor,paginas) 
          VALUES ("' . $libro->ID . '", "'. $libro->TITULO .'", "' . $libro->AUTOR. '", "' .
                $libro->PAGINAS .'")';

          $conexion->query($sql);

          $_POST = array();
        }
      }
    
    ?>
    </table>
  </div>

</body>
</html>