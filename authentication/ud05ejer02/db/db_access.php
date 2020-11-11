<?php 

  $ruta = $_SERVER['DOCUMENT_ROOT'] . '/ejerciciosPHP/authentication/ud05ejer02/constants/constants.php';
  $rutaUser = $_SERVER['DOCUMENT_ROOT'] . '/ejerciciosPHP/authentication/ud05ejer02/model/user.php';

  include ('db_connection.php');
  include ($ruta);
  include_once ($rutaUser);

  class DbAccess {

    private const ERROR_MESSAGE = "Error al conectar con la base de datos";

    static public function getAllUsers() {

      try {

        $connection = DbConnection::getConnection();
        $query = "SELECT * FROM usuariosb";
        $result = $connection->prepare($query);
        $result->execute();

        while ($fila = $result->fetch()) {
          $rows[] = $fila;
        }
        
        DbConnection::stopConnection();

        return $rows;

      } catch (PDOException $e) {
        return false;
      }
    }

    static function getUserById($userId) {

      try {

        $connection = DbConnection::getConnection();
        $query = "SELECT * FROM usuariosb WHERE usuario = " . $userId;
        
        $result = $connection->prepare($query);
        $result->execute();

        while ($fila = $result->fetch()) {
          $rows[] = $fila;
        }
        
        DbConnection::stopConnection();

        return $rows;

      } catch (PDOException $e) {
        return false;
      }
    }

    static function userExists($user, $pass) {

      try {
        $rows = [];
        $encriptedPass = SHA1($pass);
        $connection = DbConnection::getConnection();
        $query = "SELECT * FROM usuariosb WHERE login ='" . $user . "' AND password='" . $encriptedPass . "'" ;

        $result = $connection->prepare($query);
        $result->execute();

        while ($fila = $result->fetch()) {
          $rows[] = $fila; 
        }

        if (count($rows) > 0) {
          return $rows;
        }
        else {

          return false;
        }

      } catch (PDOExcemption $e) {
        return false;
      }
      
    }

    static function insertUser($usuario, $contrasena) {

      try {

        $connection = DbConnection::getConnection();
        $encriptedPass = SHA1($contrasena);

        $params = [
          'login'=>$usuario,
          'password'=>$encriptedPass
        ];
        $query = "INSERT INTO usuariosb (login, password)
                  VALUES (:login, :password)";
        
        $result = $connection->prepare($query);
        
        if ($result->execute($params)) {

          return OK;
        }
        else {
          error_log('entra el false del metodo insertar ', 0);
          
          return ERROR_NOMBRE_EXISTE;
        }
        
        DbConnection::stopConnection();

      } catch (PDOException $e) {
        error_log('entra el catch de insertar', 0);
        return ERROR_CONEXION_DB;
      }
    }

    static function getAllBooks() {

      try {
        $connection = DbConnection::getConnection();

        $rows = null;
        $sql = "SELECT * FROM libros";
        $result = $connection->prepare($sql);
        $result->execute();
    
        while ($fila = $result->fetch()) {
    
          $rows[] = $fila;
        }
    
        DbConnection::stopConnection();
    
        return $rows;

      } catch (PDOException $e) {
        return false;
      }
      
    }

    static function deleteBook($bookId) {
      try {
        $connection = DbConnection::getConnection();
        $sql = "DELETE FROM libros WHERE id=$bookId";
        $result = $connection->prepare($sql);
    
        if ($result->execute($params)) {
          return true;
        }
        else {
         return false;
        }
    
        DbConnection::stopConnection();
      } catch (PDOException $e) {
        return false;
      }
    }

    static function insertBook($params) {

      try {
        $connection = DbConnection::getConnection();
        $sql = "INSERT INTO libros (titulo, autor, paginas) 
                VALUES (:titulo, :autor, :paginas)";
        $result = $connection->prepare($sql);
    
        if ($result->execute($params)) {
          return true;
        }
        else {
         return false;
        }
    
        DbConnection::stopConnection();
      } catch (PDOException $e) {
        return false;
      }
    }
  }


?>