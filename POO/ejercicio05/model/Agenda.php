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
                  <th>Email</th>
                  <th>Url</th>
                  <th>Dirección</th>
                  <th>Ciudad</th>
                  <th>Provincia</th>
                  </tr>';

      
      foreach ($this->contactos as $contacto) {
        $result .= '<tr> <td>' . $contacto->ID . '</td><td>' .
          $contacto->NOMBRE . '</td><td>' . $contacto->TELEFONO . '</td><td>' .
          $contacto->EMAIL . '</td><td>' . $contacto->URL . '</td><td>' . $contacto->DIRECCION .
          '</td><td>' . $contacto->CIUDAD  . '</td><td>' . $contacto->PROVINCIA .'</td></tr>';
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