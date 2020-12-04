<?php 
  require_once ("../controller/db_access.php");

  /**
   * ENCARGADO DE MOSTRAR LA IMAGEN DESDE BLOB SIN ÉXITO..
   */

  if(!empty($_GET['id'])) {

    $id = $_GET['id'];
    if ($book = DbAccess::getBookById($id)) {
      header("Content-type: image/jpeg");

      echo  $book['imagen'];
    }
  }

?>