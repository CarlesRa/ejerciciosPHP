<?php 

  abstract class Jugador {

    protected $dorsal;
    protected $nombre;
    protected $estatura;

    public function __construct($data) {
      
      $this->dorsal = $data['dorsal'];
      $this->nombre = $data['nombre'];
      $this->estatura = $data['estatura'];

    }

    public function __get($name) {
      $response;

      switch ($name) {
        case 'DORSAL' :
          $response = $this->dorsal;
          break;
        case 'NOMBRE' :
          $response = $this->nombre;
          break;
        case 'ESTATURA' :
          $response = $this->estatura;
          break;
      }
      return $response;
    }

    public function __set($name, $value) {

      switch ($name) {
        case 'DORSAL' :
          $this->dorsal = $value;
          break;
        case 'NOMBRE' :
          $this->nombre = $value;
          break;
        case 'ESTATURA' :
          $this->estatura = $value;
          break;
      }
    }

    public function __toString() {
      return  sprintf("Dorsal: %s, Nombre: %s, Estatura: %.2f" ,
                $this->dorsal, $this->nombre, $this->estatura);
    }
  }

?>