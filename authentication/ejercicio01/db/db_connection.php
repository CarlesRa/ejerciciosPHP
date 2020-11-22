<?php 

  class DbConnection {

    private static $instance = null;
    private static $connection;
    private $host = 'localhost';
    private $db = 'bdlibros';
    private $user = 'root';
    private $pass = 'carles';

    private function __construct() {

      self::$connection = 
            new PDO("mysql:host=$this->host;dbname=$this->db",
                    $this->user, $this->pass);
    }

    public static function getConnection() {

      if (self::$instance == null) {
        self::$instance = new DbConnection();
      }
      return self::$connection;
    }

    public static function stopConnection() {

      self::$connection = null;
    }
  }

?>