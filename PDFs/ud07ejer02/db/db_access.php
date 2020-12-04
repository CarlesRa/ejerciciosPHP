<?php 

  $ruta = $_SERVER['DOCUMENT_ROOT'] . '/ejerciciosPHP/authentication/ud05ejer02/constants/constants.php';
  $rutaUser = $_SERVER['DOCUMENT_ROOT'] . '/ejerciciosPHP/authentication/ud05ejer02/model/user.php';

  include ('db_connection.php');
  include ($ruta);
  include_once ($rutaUser);

  class DbAccess {

    private const ERROR_MESSAGE = "Error al conectar con la base de datos";

    static function getButacasByPelicula($pelicula) {

      try {

        $connection = DbConnection::getConnection();
        $query = "SELECT butacas FROM peliculas WHERE titulo = '" . $pelicula . "'";
        
        $result = $connection->prepare($query);
        $result->execute();
        $rows = null;

        while ($fila = $result->fetch()) {
          $rows[] = $fila;
        }
        
        DbConnection::stopConnection();
        return $rows[0];

      } catch (PDOException $e) {
        return false;
      }
    }

    static function userExists($user, $pass) {

      try {
        $rows = [];
        $encriptedPass = SHA1($pass);
        $connection = DbConnection::getConnection();
        $query = "SELECT * FROM usuarios WHERE usuario ='" . $user . "' AND contrasena='" . $encriptedPass . "'" ;

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
        $query = "INSERT INTO usuarios (usuario, contrasena)
                  VALUES (:login, :password)";
        
        $result = $connection->prepare($query);
        
        if ($result->execute($params)) {

          return OK;
        }
        else {
          
          return ERROR_NOMBRE_EXISTE;
        }
        
        DbConnection::stopConnection();

      } catch (PDOException $e) {

        return ERROR_CONEXION_DB;
      }
    }

    static function setButacas($pelicula, $butacas) {

      try {

        $connection = DbConnection::getConnection();
        $query = "UPDATE peliculas SET butacas=$butacas WHERE titulo = '" . $pelicula . "'";
        
        $result = $connection->prepare($query);
        
        if ($result->execute()) {
          return true;
        }
        else return false;

      } catch (PDOException $e) {
        return false;
      }
    }
  }

?>