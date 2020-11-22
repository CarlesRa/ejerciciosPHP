<?php 

  require_once('models/Jugador.php');

  class Alapivot extends Jugador {

    private $tapones;

    public function __construct($data) {

      parent ::__construct($data);
      $this->tapones = $data['tapones'];
    }

    public function __get($name) {

      $response = parent ::__get($name);
      switch ($name) {

        case 'TAPONES' :
          $response = $this->tapones;   
          break;
      }

      return $response;
    }

    public function __set($name, $value) {

      parent ::__set($name, $value);

      switch ($name) {

        case 'TAPONES' :
          $this->tapones = $value;
      }
    }

    public function __toString() {
      
      return sprintf("%s, Tapones: %s",
              parent ::__toString(), $this->tapones);
    }
  }

?>