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

  /**
   * NO HE PODIDO MOSTRAR LA IMAGEN TRAIDA EN BLOB
   * POR LO QUE HE DEJADO EL CAMPO IMAGEN EN VARCHAR PARA 
   * ALMACENAR EL PATH DONDE LA GUARDO EN EL SERVIDOR.
   * HE DEJADO COMENTADO POR EL CÓDIGO EL INTENTO.
   */

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

      //Compruebo si hay libros en la DB y los imprimo
      if (($books = DbAccess::getAllBooks())) {
        echo Lib::printBooks($books);
      }
      else {
        echo 'No hay libros que mostrar';
      }

      /**
       * Función que comprueba si el formulario es correcto
       * e inserta el libro en caso afirmativo.
       */
      function insertarLibro() {

        //Compruebo si los campos obligatorios estan llenos.
        if (empty($_POST['titulo']) || empty($_POST['autor']) ||
            empty($_POST['paginas'])) {

          return false ;
          
        }
        else {

          $titulo = $_POST['titulo'];
          $autor = $_POST['autor'];
          $paginas = $_POST['paginas'];

          
          //Compruebo si se ha seleccionado un fichero
          if (!empty($_FILES['imagen']['tmp_name'])) {

            //Compruebo si el fichero es del tipo esperado
            if ($_FILES['imagen']['type'] == 'image/gif' || 
                $_FILES['imagen']['type'] == 'image/jpg' ||
                $_FILES['imagen']['type'] == 'image/jpeg' ||
                $_FILES['imagen']['type'] == 'image/png' ) {

              $book = 
              [
              ':titulo' => $titulo, ':autor' => $autor, 
              ':paginas' => $paginas
              ];
              //inserto el libro
              if ((DbAccess::insertBook($book))) {
          
                //Obtengo el id del libro que he insertado
                $id = DbAccess::getLastId();
                //llamo al metodo comprobarImagen para obtener el path
                if ($path = comprobarImagen($id)) {
                  //$imagenDb = addslashes(file_get_contents($path)); INTENTO PARA INSERTAR EL BLOB SIN ÉXITO
                  $book = [];
                  $book = 
                    [
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
                showAlert('Error al insertar...');
                return false;
              }
            }
            else {
              showAlert('Solo se aceptan (.gif, .jpeg, .jpg, .png');
              return false;
            }
          }
          //En caso de $_FILES null, se trata de un libro sin imagen
          else {

            $book = 
            [
            ':titulo' => $titulo, ':autor' => $autor,
            ':paginas' => $paginas
            ];

            if ((DbAccess::insertBook($book))) {
              error_log('entra insertBook', 0);
              $_POST = array();
              return true;
            }
            else {
              showAlert('Error al insertar...');
              return false;
            }
          }
        }
      }

      /**
       * Comprueba que la imagen sea correcta, en caso 
       * afirmativo devuelve el path de la imagen
       * que será su id + su extensión
       */
      function comprobarImagen($bookId) {

        error_log('entra comprobar imagen', 0);
        if (isset($_POST['enviar'])) {
          if (isset($_FILES['imagen'])) {
            if ($_FILES['imagen']['error'] != UPLOAD_ERR_OK) { 
              
              switch($_FILES['imagen']['error']) { 
                case UPLOAD_ERR_INI_SIZE: 
                case UPLOAD_ERR_FORM_SIZE: 
                  showAlert('El fichero es demasiado grande'); 
                  return false;
                  break; 
                case UPLOAD_ERR_PARTIAL: 
                  showAlert('El fichero no se ha podido subir entero'); 
                  return false;
                  break; 
                case UPLOAD_ERR_NO_FILE: 
                  showAlert('Debe seleccionar un fichero');
                  return false;
                  break; 
                default: 
                  showAlert('Error indeterminado'); 
                  return false;
              }
            }
            if (is_uploaded_file($_FILES['imagen']['tmp_name']) === true){

              $mime = $_FILES['imagen']['type'];
              $img = $_FILES['imagen']['tmp_name'];

              $extension = explode('/', $mime)[1];
                
              $path = '../imagenes/' . $bookId . '.' . $extension;
              $anchoAlto = 90;
              $thumb = imagecreatetruecolor($anchoAlto, $anchoAlto);

              if ($extension == 'jpg' || $extension == 'jpeg') $source = imagecreatefromjpeg($img);
		          else if ($extension == 'gif') $source = imagecreatefromgif($img);
		          else if ($extension == 'png') $source = imagecreatefrompng($img);

              $originalWidth = imagesx($source);
              $originalHeight = imagesy($source);

              imagecopyresampled($thumb, $source, 0,0,0,0, $anchoAlto, $anchoAlto, 
                                 $originalWidth, $originalHeight);


              if($extension=="jpg"||$extension=="jpeg"){
                imagejpeg($thumb,$path, 90);
                return $path;
                //return $img; INTENTO PARA INSERTAR EL BLOB SIN ÉXITO
              } 
              elseif($extension=="png") {
                imagepng($thumb,$path);
                return $path;
                //return $img; INTENTO PARA INSERTAR EL BLOB SIN ÉXITO
              }
              elseif($extension=="gif") {
                imagegif($thumb,$path);
                return $path;
                //return $img; INTENTO PARA INSERTAR EL BLOB SIN ÉXITO
              }
            }
            else {
              showAlert('Error: Posible ataque, file: ' . $_FILES['imagen']['name']);

              return false;
            } 
          }
        }
      }

      /**
       * Función para mostrar una alerta con
       * el mensaje que le paso
       */
      function showAlert($message) {
        echo '<script language="javascript">';
        echo 'alert("' . $message . '")';
        echo '</script>';
      }

    ?>
  </div>
  
</body>
</html>