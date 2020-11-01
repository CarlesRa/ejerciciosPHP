<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../styles/style.css">
</head>
  <body>

    <?php 
      include ("../controller/db_access.php");
    ?>

    <div class="container">

      <div class="titulo">
        <h1 class="text-center">Actualizar Libro</h1> 
      </div>

      <div class="content">

        <div class="inputs">
        <form action="" method="post" onsubmit= <?php actualizar() ?>>

        <div>
            <label for="id">Id*</label>
            <input type="text" name="id"
                  value="<?php echo $_GET["id"]?>" disabled>
          </div>
          
          <div>
            <label for="titulo">Título*</label>
            <input type="text" name="titulo"
                  value="<?php echo $_GET["titulo"]?>">
            <?php 
              if (isset($_POST['enviar']) && empty($_POST['titulo'])) {
                echo"<span style='color:red;'> Debe introducir un título!</span><br/>";
              }
              
            ?>
          </div>
          

          <div>
            <label for="autor">Autor*</label>
            <input type="text" name="autor"
                  value="<?php echo $_GET["autor"]?>">
            <?php 
              if (isset($_POST['enviar']) && empty($_POST['autor'])) {
                echo"<span style='color:red;'> Debe introducir un autor!</span><br/>";
              }
            ?>
          </div>
          
          <div>
            <label for="paginas">Páginas*</label>
            <input type="number" name="paginas"
                  value="<?php echo $_GET['paginas']?>">
            <?php 
              if (isset($_POST['enviar']) && empty($_POST['paginas'])) {
                echo"<span style='color:red;'> Debe introducir la cantidad de paginas!</span><br/>";
              }
            ?>
          </div>

          <div class="boton text-center">
            <input type="submit" value="Actualizar" name="enviar" id="enviar">
            <a href="./main.php">Volver a página principal</a>
          </div>
        </form>
            
        </div>

      </div>
    </div>  

    <?php 
    
      function actualizar() {

        if (empty($_POST['titulo']) ||
        empty($_POST['autor']) || empty($_POST['paginas'])) {

          //$_GET = array();
          return false ;
          
        }
        else {

          $id = $_GET['id'];
          $titulo = $_POST['titulo'];
          $autor = $_POST['autor'];
          $paginas = $_POST['paginas'];

          $book = 
            [
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':paginas' => $paginas,
            ':id' => $id
            ];

            

            if ((DbAccess::updateBook($book))) {

              $_POST = array();
              $_GET = array();

              header("Location: ./main.php");
            }
            else {
              //$_GET = array();
              return false;
            }
          
          
        }
      }
    
    ?>
  </body>
</html>