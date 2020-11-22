<?php 

  class Lib {

    static function printBooksWithDelete($books) {

      $result = '<table border>
                 <th>ID</th>
                 <th>TITULO</th>
                 <th>AUTOR</th>
                 <th>PÁGINAS</th>';

      foreach ($books as $book) {
        $result .= '<tr><td>' . $book["id"] . '</td>' . '<td>' . $book["titulo"] . '</td>' .
        '<td>' . $book["autor"] . '</td>' . '<td>' . $book["paginas"] . 
        '</td><td>' . '</td><td><a href="?id=' . $book["id"] .
        '">Eliminar</a></td></tr>';
      }

      $result .= '</table>';

      return $result;

    }

    static function printBooks($books) {
      error_log('Entra print books',0);
      $result = '<table border>
                 <th>ID</th>
                 <th>TITULO</th>
                 <th>AUTOR</th>
                 <th>PÁGINAS</th>';

      foreach ($books as $book) {
        $result .= '<tr><td>' . $book["id"] . '</td>' . '<td>' . $book["titulo"] . '</td>' .
        '<td>' . $book["autor"] . '</td>' . '<td>' . $book["paginas"] . 
        '</td></tr>';
      }

      $result .= '</table>';

      return $result;

    }
  }

?>