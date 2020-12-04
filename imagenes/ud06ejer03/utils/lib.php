<?php 

  class Lib {

    static function printBooks($books) {

      $result = '<table border>
                 <th>ID</th>
                 <th>TITULO</th>
                 <th>AUTOR</th>
                 <th>PÁGINAS</th>
                 <th>IMAGEN</th>';

      foreach ($books as $book) {
        $result .= '<tr><td>' . $book["id"] . '</td>' . '<td>' . $book["titulo"] . '</td>' .
        '<td>' . $book["autor"] . '</td>' . '<td>' . $book["paginas"] . 
        '</td>' ;
        
        if (($path = $book['imagen']) != null) {
          $result .= '<td><img src="' . $book['imagen'] . '"></td></tr>';
          //$result .= '<td><img src="imagen.php?id=' . $book['id'] .'"/></td></tr>'; INTENTO PARA MOSTRAR EL BLOB SIN ÉXITO
        }
        else 
          $result .= '</tr>';
      }

      $result .= '</table>';

      return $result;

    }
  }

?>