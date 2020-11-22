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
        if ($this->contactos[$i]->ID == $idContacto) {
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
          $result .= '<tr> <td>' . $value->ID . '</td><td>' .
            $value->NOMBRE . '</td><td>' . $value->TELEFONO . '</td></tr>';
        }
      }
      $result .= '</table>';
      return $result;
    }

   public function __clone() {
     foreach ($this->contactos as $key => $contacto) {
      $this->contactos[$key] = clone $contacto;
     }
   }

  }
?>