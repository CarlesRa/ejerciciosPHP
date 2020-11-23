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
          return $this->id;
          break;
        case 'NOMBRE':
          return $this->nombre;
          break;
        case 'TELEFONO': 
          return $this->telefono;
          break;
      }
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