<?php
  class Agenda {
    private $contactos;
    
    public function __construct() {
      $this->contactos = [];
    }

    public function addContacto(Contacto $contacto) {
      $this->contactos[] = $contacto;
    }

    public function removeContacto($idContacto) {
      for ($i=0; $i<count($this->contactos); $i++) {
        if ($this->contactos[$i]->getId() == $idContacto) {
          unset($this->contactos[$i]);
        }
      }
    }

    public function getContactos() {
      return $this->contactos;
    }

    public function __toString() {
      $result = '<table border="1"><tr>
                  <th>IdRegistro</th>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  </tr>';

      if (is_array($this->contactos)) {
        foreach ($this->contactos as $value) {
          $result = $result . '<tr> <td>' . $value->getId() . '</td><td>' .
            $value->getNombre() . '</td><td>' . $value->getTelefono() . '</td></tr>';
        }
      }
      $result .= '</table>';
      return $result;
    }

   

  }
?>