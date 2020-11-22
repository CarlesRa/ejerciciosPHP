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
    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }

    public function setTelefono($telefono) {
      $this->telefono = $telefono;
    }

    public function getId() {
      return $this->id;
    }

    public function getNombre() {
      return $this->nombre;
    }

    public function getTelefono() {
      return $this->telefono;
    }

    public function __toString() {
      return "<p>ID: " . $this->id . " <br/>" 
        . "Nombre: " . $this->nombre . "<br/>"
        . "Teléfono: (" . $this->telefono . ")</p>";
    }
  }
?>