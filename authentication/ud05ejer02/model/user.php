<?php 

  class User {

    public $login;
    public $password;
    public $nombre;
    public $lectura;
    public $escritura;
    public $administracion;

    public function __construct($nombre, $password) {

      $this->login = $nombre;
      $this->password = SHA1($password);
  
    } 

    public function __set($name, $value) {
      switch ($name) {
        case 'LOGIN' :
          $this->login = $value;
          break;
        case 'NOMBRE' :
          $this->nombre = $value;
          break;
        case 'LECTURA' :
          $this->lectura = $value;
          break;
        case 'ESCRITURA' :
          $this->escritura = $value;
          break;
        case 'ADMINISTRACION' :
          $this->administracion = $value;
          break;
      }
    }

    public function __get($name) {

      $response;
      
      switch ($name) {
        case 'LOGIN' :
          $response = $this->login;
          break;
        case 'PASSWORD' :
          $response = $this->encriptPassword;
        case 'NOMBRE' :
          $response = $this->nombre;
          break;
        case 'LECTURA' :
          $response = $this->lectura;
          break;
        case 'ESCRITURA' :
          $response = $this->escritura;
          break;
        case 'ADMINISTRACION' :
          $response = $this->administracion;
          break;
      }
      return $response;
    }

    public function getObjectArray() {
      
    }
  }

?>