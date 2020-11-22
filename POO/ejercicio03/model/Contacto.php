<?php 

  class Contacto {

    private $id;
    private $nombre;
    private $telefono;

    public function __construct($id, $nombre, $telefono) {

      $this->id = $id;
      $this->nombre = $nombre;
      $this->telefono = $telefono;
    }
    
    public function __get($name) {

      switch ($name) {
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