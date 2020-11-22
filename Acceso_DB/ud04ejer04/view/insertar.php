<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 04</title>
  <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php 

  require_once ("../controller/db_access.php");
  require_once ("../utils/lib.php");
  require_once ("../model/libro.php");

  if ($_GET['id']) {
    eliminarLibro($_GET['id']);
  }

?>
<div class="container">

    <h1>Insertar Libros</h1>

    <form action="" method="post" onsubmit= <?php enviarFormulario() ?>>
      
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

      <div class="boton text-center">
        <input type="submit" value="Introducir Libro" name="enviar" id="enviar">
        <a href="./main.php">Volver a página principal</a>
      </div>
    </form>

    <?php 

      if (($books = DbAccess::getAllBooks())) {
        echo Lib::printBooks($books);
      }
      else {
        echo 'No hay libros que mostrar';
      }

      function enviarFormulario() {

        if (empty($_POST['titulo']) || empty($_POST['autor']) ||
            empty($_POST['paginas'])) {

          return false ;
          
        }
        else {

          $titulo = $_POST['titulo'];
          $autor = $_POST['autor'];
          $paginas = $_POST['paginas'];
          $book = 
            [
            ':titulo' => $titulo,
            ':autor' => $autor, ':paginas' => $paginas
            ];

          if ((DbAccess::insertBook($book))) {
            $_POST = array();
            return true;
          }
          else {
            return false;
          }
          
        }
      }

      function eliminarLibro($bookId) {

        DbAccess::deleteBook($bookId);
        $_GET = array();
      }
    ?>
  </div>
  
</body>
</html>