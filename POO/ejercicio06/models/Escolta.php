<?php 

  require_once('models/Jugador.php');

  class Escolta extends Jugador {

    private $robos;

    public function __construct($data) {

      parent ::__construct($data);
      $this->robos = $data['robos'];
    }

    public function __get($name) {

      $response = parent ::__get($name);
      switch ($name) {

        case 'ROBOS' :
          $response = $this->robos;   
          break;
      }

      return $response;
    }

    public function __set($name, $value) {

      parent ::__set($name, $value);

      switch ($name) {

        case 'ROBOS' :
          $this->robos = $value;
      }
    }

    public function __toString() {
      
      return sprintf("%s, Robos: %s",
              parent ::__toString(), $this->robos);
    }
  }

?>