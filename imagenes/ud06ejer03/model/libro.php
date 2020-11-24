<?php 

  class Libro {
    private $id;
    private $titulo;
    private $autor;
    private $paginas;
    
    public function __construct($data) {
      $this->id = $data['id'];
      $this->titulo = $data['titulo'];
      $this->autor = $data['autor'];
      $this->paginas = $data['paginas'];
    } 

    public function __set($name, $value) {
      switch ($name) {
        case 'ID' :
          $this->id = $value;
          break;
        case 'TITULO' :
          $this->titulo = $value;
          break;
        case 'AUTOR' :
          $this->autor = $value;
          break;
        case 'PAGINAS' :
          $this->paginas = $value;
          break;
      }
    }

    public function __get($name) {

      $response = null;
      
      switch ($name) {
        case 'ID' :
          $response = $this->id;
          break;
        case 'TITULO' :
          $response = $this->titulo;
          break;
        case 'AUTOR' :
          $response = $this->autor;
          break;
        case 'PAGINAS' :
          $response = $this->paginas;
          break;
      }
      return $response;
    }

    public function __toString() {
      return $this->id . ', ' . $this->titulo . ', ' . $this->autor . ', ' . $this->paginas;
    }
  }

?>