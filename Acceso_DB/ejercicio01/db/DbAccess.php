<?php 

  class DbAccess {
    
    private static  $instance = null;
    private static $connection;

    private function __construct() {

      self::$connection = new mysqli('localhost', 'root', 'carles', 'bdlibros');
    }

    public static function getInstance() {

      if (self::$instance == null) {
        self::$instance = new DbAccess();
      }

      return self::$connection;
    }
  }

?>