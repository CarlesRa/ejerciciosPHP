<?php 

  require_once('models/Jugador.php');

  class Base extends Jugador {

    private $asistencias;

    public function __construct($data) {

      parent:: __construct($data);
      $this->asistencias = $data['asistencias'];
    }

    public function __get($name) {

      $response = parent:: __get($name);
      switch ($name) {

        case 'ASISTENCIAS' :
          $response = $this->asistencias;   
          break;
      }

      return $response;
    }

    public function __set($name, $value) {

      parent:: __set($name, $value);

      switch ($name) {

        case 'ASISTENCIAS' :
          $this->asistencias = $value;
      }
    }

    public function __toString() {

      return sprintf("%s, Asistencias: %s",
              parent:: __toString(), $this->asistencias);
    }
  }

?>