<?php 

  class Lib {

    static function printBooks($books) {

      $result = '<table border>
                 <th>ID</th>
                 <th>TITULO</th>
                 <th>AUTOR</th>
                 <th>PÁGINAS</th>';

      foreach ($books as $book) {
        $result .= '<tr><td>' . $book["id"] . '</td>' . '<td>' . $book["titulo"] . '</td>' .
        '<td>' . $book["autor"] . '</td>' . '<td>' . $book["paginas"] . 
        '</td><td><a href="./actualizar.php?id=' . $book["id"] . '&titulo=' . $book["titulo"] .
        '&autor=' . $book["autor"] . '&paginas=' . $book["paginas"] .
        '">Actualizar</a></td>' . '</td><td><a href="?id=' . $book["id"] .
        '">Eliminar</a></td></tr>';
      }

      $result .= '</table>';

      return $result;

    }
  }

?>