<?php 

  require_once('models/Jugador.php');

  class Alero extends Jugador {

    private $puntos;

    public function __construct($data) {

      parent ::__construct($data);
      $this->puntos = $data['puntos'];
    }

    public function __get($name) {

      $response = parent ::__get($name);
      switch ($name) {

        case 'PUNTOS' :
          $response = $this->puntos;   
          break;
      }

      return $response;
    }

    public function __set($name, $value) {

      parent ::__set($name, $value);

      switch ($name) {

        case 'PUNTOS' :
          $this->puntos = $value;
      }
    }

    public function __toString() {
      
      return sprintf("%s, Puntos: %s",
              parent ::__toString(), $this->puntos);
    }
  }

?>