<?php 
  require_once 'model/Contacto.php';

  class PContacto extends Contacto {

    private $direccion;
    private $ciudad;
    private $provincia;

    public function __construct($data) {

      parent:: __construct($data);
      $this->direccion = $data['direccion'];
      $this->ciudad = $data['ciudad'];
      $this->provincia = $data['provincia'];

    }

    public function __get($data) {

      $response = parent::__get($data);
      switch ($data) {

        case 'DIRECCION':
          $response = $this->direccion;
          break;
        case 'CIUDAD': 
          $response = $this->ciudad;
          break;
        case 'PROVINCIA':
          $response = $this->provincia;
          break;
      }
      if ($response == null) 
        return 'n/a';
        
      return $response;
    }

    public function __set($name, $value) {

      parent::__set($name, $value);
      switch ($name) {

        case 'DIRECCION':
          $this->direccion = $value;
          break;
        case 'CIUDAD': 
          $this->ciudad = $value;
          break;
        case 'PROVINCIA':
          $this->provincia = $value;
          break;
      }

    }

    public function __toString() {
      return sprintf("ID: %s, Nombre: %s, Teléfono: %s, Dirección: %s, Ciudad: %s, Provincia: %s", 
                      $this->id, $this->nombre,$this->telefono, $this->direccion, $this->ciudad,
                      $this->provincia);
    }


  }

?>