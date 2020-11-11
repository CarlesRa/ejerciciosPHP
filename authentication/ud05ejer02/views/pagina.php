<?php 
  session_start();
  if (!$_SESSION['loged']) {
    header('Location:../login.php');
  }

  include ('../db/db_access.php');
  include ('../utils/lib.php');

  $textoBienvenida;
  $ultimoLog;

  if (isset($_GET['id'])) {
    DbAccess::deleteBook($_GET['id']);
  }

  echo '<p>¡¡Bienvenido ' . $_SESSION['nombre'] . 
       '!! En esta página pudes: ' . (($_SESSION['lectura'] == 1) ? "(ver) " : "") . 
       (($_SESSION['escritura'] == 1) ? "(añadir) " : "") . 
       (($_SESSION['administracion'] == 1) ? "(eliminar)" : "") .
       '. **<a href="../logout.php">[Logout]</a>**</p>';
  
  if (isset($_COOKIE['last-log'])) {
    $ultimoLog = $_COOKIE['last-log'];
  }
  else {
    setcookie('last-log', time(), time()+60*60*24*365);
    $ultimoLog = $_COOKIE['last-log'];
  }

  echo '<p>Tu última conexión fué el ' . date('d/m/Y h:m', $ultimoLog);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
  
  <div class="container">
    <div class="titulo"><h1 style="font-size:4rem">Lista Libros</h1></div>
    <?php 
    
      if ($_SESSION['escritura'] == 1) {
    ?>
        <h1>Insertar Libros</h1>

        <form action="" method="post" onsubmit= <?php enviarFormulario() ?>>
          
          <p>
            <label for="titulo">Título*</label>
            <input type="text" name="titulo"
                  value="<?php if(isset($_POST['titulo'])) echo $_POST['titulo']?>">
            <?php 
              if (isset($_POST['enviar']) && empty($_POST['titulo'])) {
                echo"<span style='color:red;'> Debe introducir un título!</span><br/>";
              }
            ?>
          </p>
          

          <p>
            <label for="autor">Autor*</label>
            <input type="text" name="autor"
                  value="<?php if(isset($_POST['autor'])) echo $_POST['autor']?>">
            <?php 
              if (isset($_POST['enviar']) && empty($_POST['autor'])) {
                echo"<span style='color:red;'> Debe introducir un autor!</span><br/>";
              }
            ?>
          </p>
          
          <p>
            <label for="paginas">Páginas*</label>
            <input type="number" name="paginas"
                  value="<?php if(isset($_POST['paginas'])) echo $_POST['paginas']?>">
            <?php 
              if (isset($_POST['enviar']) && empty($_POST['paginas'])) {
                echo"<span style='color:red;'> Debe introducir la cantidad de paginas!</span><br/>";
              }
            ?>
          </p>

          <p class="center">
          <p>
            <input type="submit" value="Introducir Libro" name="enviar" id="enviar">
          </p>
            
          </p>
        </form>
    <?php
      }
      if ($_SESSION['administracion'] == 1) {
        
        $books = DbAccess::getAllBooks();
        echo Lib::printBooksWithDelete($books);

        
      }
      else {
        $books = DbAccess::getAllBooks();
        echo Lib::printBooks($books);
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

    ?>
  </div>
</body>
</html>