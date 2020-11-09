<?php 

  include ('db_connection.php');
  include ('./constants/constants.php');

  class DbAccess {

    private const ERROR_MESSAGE = "Error al conectar con la base de datos";

    static public function getAllUsers() {

      try {

        $connection = DbConnection::getConnection();
        $query = "SELECT * FROM usuarios";
        $result = $connection->prepare($query);
        $result->execute();

        while ($fila = $result->fetch()) {
          $rows[] = $fila;
        }
        
        DbConnection::stopConnection();

        return $resultado;

      } catch (PDOException $e) {
        return false;
      }
    }

    static function getUserById($userId) {

      try {

        $connection = DbConnection::getConnection();
        $query = "SELECT * FROM usuarios WHERE usuario = " . $userId;
        
        $result = $connection->prepare($query);
        $result->execute();

        while ($fila = $result->fetch()) {
          $rows[] = $fila;
        }
        
        DbConnection::stopConnection();

        return $resultado;

      } catch (PDOException $e) {
        return false;
      }
    }

    static function insertUser($usuario, $contrasena) {

      try {

        $connection = DbConnection::getConnection();
        $encriptedPass = SHA1($contrasena);

        $params = [
          'usuario'=>$usuario,
          'contrasena'=>$encriptedPass
        ];
        $query = "INSERT INTO usuarios (usuario, contrasena)
                  VALUES (:usuario, :contrasena)";
        
        $result = $connection->prepare($query);
        
        if ($result->execute($params)) {
          return OK;
        }
        else {
          error_log('entra el false del metodo insertar', 0);
          
          return ERROR_NOMBRE_EXISTE;
        }
        
        DbConnection::stopConnection();

      } catch (PDOException $e) {
        error_log('entra el catch de insertar', 0);
        return ERROR_CONEXION_DB;
      }
    }
  }

?>