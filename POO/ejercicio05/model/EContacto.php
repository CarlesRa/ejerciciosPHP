<?php 

  require_once 'model/Contacto.php';

  class EContacto extends Contacto {

    private $email;
    private $url;

    public function __construct($data) {

      parent:: __construct($data);
      $this->email = $data['email'];
      $this->url = $data['url'];

    }

    public function __get($data) {

 //     $response;
      $response = parent:: __get($data);
      switch($data) {

        case 'EMAIL':
          $response = $this->email;
          break;
        case 'URL': 
          $response = $this->url;
          break;
      }
      if ($response == null) 
        return 'n/a';
      return $response;
    }

    public function __set($name, $value) {

      parent:: __set($name, $value);
      switch($data) {

        case 'EMAIL':
          $this->email = $value;
          break;
        case 'URL': 
          $this->url = $value;
          break;
      }

    }

    public function __toString() {
      return sprintf("ID: %s, Nombre: %s, Teléfono: %s, Email: %s, Url: %s", 
                      $this->id, $this->nombre, $this->telefono, $this->email,
                      $this->url);
    }
  }

?>