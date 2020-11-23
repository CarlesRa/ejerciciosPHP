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
          $result .= '<td><img src="' . $book['imagen'] . '" height=70 width=70></td></tr>';
        }
        else 
          $result .= '<td><img src="../imagenes/no_image.png" height=70 width=70></td></tr>';
      }

      $result .= '</table>';

      return $result;

    }
  }

?>