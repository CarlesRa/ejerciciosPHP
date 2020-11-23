<?php 
  include ("../model/db.php");

  class DbAccess {

    static function getAllBooks() {

      try {
        $connection = Db::getInstance();

        $rows = null;
        $sql = "SELECT * FROM libros";
        $result = $connection->prepare($sql);
        $result->execute();
    
        while ($fila = $result->fetch()) {
    
          $rows[] = $fila;
        }
    
        Db::stopConnection();
    
        return $rows;

      } catch (PDOException $e) {
        return false;
      }
      
    }

    static function getBooksbyTitle($title) {

      try {
        $connection = Db::getInstance();

        $rows = null;
        $sql = "SELECT * FROM libros WHERE titulo LIKE '%$title%'";
        $result = $connection->prepare($sql);
        $result->execute([$title]);
    
        while ($fila = $result->fetch()) {
    
          $rows[] = $fila;
        }
    
        Db::stopConnection();
    
        return $rows;

      } catch (PDOException $e) {
        return false;
      }
      
    }
  
    static function getBookById($bookId) {

      try {
        $connection = Db::getInstance();
        $row = null;
        $sql = "SELECT * FROM libros WHERE id=$bookId";
        $result = $connection->prepare($sql);
        $result->execute();
    
        while ($fila = $result->fetch()) {
    
          $row[] = $fila;
        }
    
        Db::stopConnection();
        return $row[0];
      } catch (PDOException $e) {
        return false;
      }    
    }
  
    static function insertBook($params) {

      try {
        $connection = Db::getInstance();
        $sql = "INSERT INTO libros (titulo, autor, paginas) 
        VALUES (:titulo, :autor, :paginas)";

        $result = $connection->prepare($sql);
    
        if ($result->execute($params)) {
          return true;
        }
        else {
         return false;
        }
    
        Db::stopConnection();
      } catch (PDOException $e) {
        return false;
      }
    }

    static function updateBook($params, $id) {
      try {
        $connection = Db::getInstance();
        $sql = "UPDATE libros SET titulo=:titulo, autor=:autor, paginas=:paginas, imagen=:imagen WHERE id=$id";
        $result = $connection->prepare($sql);
    
        if ($result->execute($params)) {
          return true;
        }
        else {
         return false;
        }
    
        Db::stopConnection();
      } catch (PDOException $e) {
        return false;
      }
    }

    static function deleteBook($bookId) {
      try {
        $connection = Db::getInstance();
        $sql = "DELETE FROM libros WHERE id=$bookId";
        $result = $connection->prepare($sql);
    
        if ($result->execute()) {
          return true;
        }
        else {
         return false;
        }
    
        Db::stopConnection();
      } catch (PDOException $e) {
        return false;
      }
    }

    static function getLastIndex() {
      try {
        $connection = Db::getInstance();
        $row = null;
        $sql = "SELECT * FROM libros ORDER BY id DESC LIMIT 1
        ";
        $result = $connection->prepare($sql);
    
        $result->execute();
        
        while ($fila = $result->fetch()) {
    
          $row[] = $fila;
        }
    
        return $row[0]['id'];
        Db::stopConnection();
      } catch (PDOException $e) {
        return false;
      }
    }
  }

?>