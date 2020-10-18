<?php 

  require_once('models/Jugador.php');

  class pivot extends Jugador {

    private $rebotes;

    public function __construct($data) {

      parent ::__construct($data);
      $this->rebotes = $data['rebotes'];
    }

    public function __get($name) {

      $response = parent ::__get($name);
      switch ($name) {

        case 'REBOTES' :
          $response = $this->rebotes;   
          break;
      }

      return $response;
    }

    public function __set($name, $value) {

      parent ::__set($name, $value);

      switch ($name) {

        case 'REBOTES' :
          $this->rebotes = $value;
      }
    }

    public function __toString() {
      
      return sprintf("%s, Rebotes: %s",
              parent ::__toString(), $this->rebotes);
    }
  }

?>