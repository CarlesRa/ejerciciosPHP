<?php 
  require_once ('models/Jugador.php');

  class Equipo {

    private $nombre;
    private $quinteto;

    public function __construct($data) {

      $this->nombre = $data['nombre'];
      $this->quinteto = $data['quinteto'];
    }

    public function __get($name) {
      $response;
      switch ($name) {

        case 'NOMBRE' :
          $response = $this->nombre;
          break;
        case 'QUINTETO' :
          $response = $this->quinteto;
          break;
      }
      return $response;
    }

    public function estaturaMedia(array $quinteto) {

      $result = 0;
      foreach ($quinteto as $jugador) {
        $result += $jugador->ESTATURA;
      }
      
      return $result /= count($quinteto);
    }

    public function estaturaMaxima(array $quinteto) {
      $jugadorMasAlto;
      $alturaMaxima = 0 ;

      foreach ($quinteto as $jugador) {
        if ($jugador->ESTATURA > $alturaMaxima) {
          $alturaMaxima = $jugador->ESTATURA;
          $jugadorMasAlto = $jugador;
        }
      }

      return $jugadorMasAlto;
    }

  }

?>