<?php 

  abstract class Contacto {

    protected $id;
    protected $nombre;
    protected $telefono;

    protected function __construct($data) {

      $this->id = $data['id'];
      $this->nombre = $data['nombre'];
      $this->telefono = $data['telefono'];
    }
    
    public function __get($data) {
      $response;
      
      switch ($data) {

        case 'ID':
          $response = $this->id;
          break;
        case 'NOMBRE':
          $response = $this->nombre;
          break;
        case 'TELEFONO': 
          $response = $this->telefono;
          break;
      }
      return $response;
    }

    public function __set($name, $value) {

      switch ($name) {
        case 'ID':
         $this->id = $value;
          break;
        case 'NOMBRE':
          $this->nombre = $value;
          break;
        case 'TELEFONO': 
          $this->telefono = $value;
          break;
      }
    }

    public function __toString() {
      return "<p>ID: " . $this->id . " <br/>" 
        . "Nombre: " . $this->nombre . "<br/>"
        . "Teléfono: (" . $this->telefono . ")</p>";
    }
  }
?>