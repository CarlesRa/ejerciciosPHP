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
    include ("../controller/db_access.php");
    include ("../utils/lib.php");

    if ($_GET['id']) {
      eliminarLibro($_GET['id']);
    }
  
  ?>
<div class="container">

  <div class="titulo">
    <h1 class="text-center">Lista de Libros</h1> 
  </div>
  <div class="content">
    <div class="inputs">
      <div>
        <form action="" method="post" onsubmit=<?php validar() ?>>
          <input type="text" name="titulo" placeholder="Introduce el titulo">
          <input type="submit" value="BUSCAR" name="buscar">
          <?php 
            if (isset($_POST['buscar']) && empty($_POST['titulo'])) {
                echo"<span style='color:red;'> Debe introducir un título!</span><br/>";
            }
          ?>
        </form>
      </div>
      <div>
        <form action="../view/insertar.php" method="post">
          <input type="submit" value="Insertar Más Libros">
        </form>
      </div>
    </div>
    
    <div>
      <?php 
        if (($titulo = $_POST['titulo'])) {
          if (($books = DbAccess::getBooksbyTitle($titulo))) {
            echo Lib::printBooks($books);
            $_POST = array();
          }
          else {
            echo 'No hay libros con ese Título';
          }
        }
        else {
          if (($books = DbAccess::getAllBooks())) {
            echo Lib::printBooks($books);
          }
          else {
            echo 'No hay libros que mostrar';
          }
        }
      ?>
    </div>
  </div>

  

</div>  

  <?php 

    function validar() {
      if(empty($_POST['titulo'])) {
        return false;
      }
    }

    function eliminarLibro($bookId) {

      DbAccess::deleteBook($bookId);
      $_GET = array();
    }
  ?>
  
</body>
</html>