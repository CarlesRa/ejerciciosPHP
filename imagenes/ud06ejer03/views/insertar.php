<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 03</title>
  <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php 

  require_once ("../controller/db_access.php");
  require_once ("../utils/lib.php");
  require_once ("../model/libro.php");

  if (isset($_POST['enviar'])) {
    insertarLibro();
  }

?>

<div class="container">

    
    <h1>Insertar Libros</h1>

    <form action="" method="post" enctype="multipart/form-data">
      
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

      <div>
        <label for="imagen">Imagen</label>
        <input type="file" name="imagen">
        
      </div>

      <div class="boton text-center">
        <input type="submit" value="Introducir Libro" name="enviar" id="enviar">
      </div>
    </form>

    <?php 

      if (($books = DbAccess::getAllBooks())) {
        echo Lib::printBooks($books);
      }
      else {
        echo 'No hay libros que mostrar';
      }

      function insertarLibro() {

        if (empty($_POST['titulo']) || empty($_POST['autor']) ||
            empty($_POST['paginas'])) {

          return false ;
          
        }
        else {

          $titulo = $_POST['titulo'];
          $autor = $_POST['autor'];
          $paginas = $_POST['paginas'];

          

          if (!empty($_FILES['imagen']['tmp_name'])) {

            $book = 
            [
            ':titulo' => $titulo,
            ':autor' => $autor, ':paginas' => $paginas
            ];

            if ((DbAccess::insertBook($book))) {

              $id = DbAccess::getLastIndex();
              if ($path = comprobarImagen($id)) {
                              
                $book = [];
                $book = 
                  [
                  ':titulo' => $titulo,
                  ':autor' => $autor, ':paginas' => $paginas,
                  ':imagen' => $path
                  ];
                DbAccess::updateBook($book, $id);
                $_POST = array();

                return true;
              }
              else {
                return false;
              }
              
            }
            else {
              return false;
            }
          }
          else {
            $book = 
            [
            ':titulo' => $titulo,
            ':autor' => $autor, ':paginas' => $paginas,
            ];

            if ((DbAccess::insertBook($book, false))) {
              $_POST = array();
              return true;
            }
            else {
              return false;
            }
          }
        }
      }

      function comprobarImagen($bookId) {

        error_log('entra comprobar imagen', 0);
        if (isset($_POST['enviar'])) {
          if (isset($_FILES['imagen'])) {
            if ($_FILES['imagen']['error'] != UPLOAD_ERR_OK) { 
              
              switch($_FILES['imagen']['error']) { 
                case UPLOAD_ERR_INI_SIZE: 
                case UPLOAD_ERR_FORM_SIZE: 
                  showAlert('El fichero es demasiado grande'); 
                  error_log('error tamaño', 0);
                  return false;
                  break; 
                case UPLOAD_ERR_PARTIAL: 
                  showAlert('El fichero no se ha podido subir entero'); 
                  error_log('error al subir', 0);
                  return false;
                  break; 
                case UPLOAD_ERR_NO_FILE: 
                  showAlert('Debe seleccionar un fichero');
                  error_log('error no seleccionado', 0);
                  return false;
                  break; 
                default: 
                  showAlert('Error indeterminado'); 
                  error_log('error indeterminado', 0);
                  return false;
              }
            }
            else if ($_FILES['imagen']['type'] == 'image/gif' || 
                     $_FILES['imagen']['type'] == 'image/jpg' ||
                     $_FILES['imagen']['type'] == 'image/jpeg' ||
                     $_FILES['imagen']['type'] == 'image/png' ) {
    
              if (is_uploaded_file($_FILES['imagen']['tmp_name']) === true){
                error_log('entra uploaded_file imagen', 0);
                $mime = $_FILES['imagen']['type'];
                $extension = explode('/', $mime)[1];
                
                $path = '../imagenes/' . $bookId . '.' . $extension;
                error_log('path resultante: ' . $path, 0);
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path)) {
                  error_log('se ha guardado el path', 0);
                  return $path;
                }
                else {
                  showAlert('error al mover el archivo a su destino');
                  error_log('error al mover', 0);
                  return false;
                }
              }
              else 
                showAlert('Error: Posible ataque, file: ' . $_FILES['imagen']['name']);
                error_log('error ataque', 0);
                return false;
            }
            else {
              showAlert('Solo se aceptan (.jpg, .jpeg, .gif, .png');
              DbAccess::deleteBook($bookId);
              error_log('error formato', 0);
              return false;
            }
            
          }
        }
      }

      function showAlert($message) {
        echo '<script language="javascript">';
        echo 'alert("' . $message . '")';
        echo '</script>';
      }
    ?>
  </div>
  
</body>
</html>