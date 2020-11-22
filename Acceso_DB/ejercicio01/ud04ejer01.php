<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UD 4 Ejercicio 1</title>
</head>
<body>
  
  <?php 
    require_once ('db/DbAccess.php');
    require_once ('models/Libro.php');

    //CREO EL ARRAY DE LIBROS A INSERTAR
    $libros = [
      new Libro(
        [
        'id' => 1, 'titulo' => 'Jarry Choped y la Hierba filosafal',
        'autor' => 'JK Bowling', 'paginas' => 301
        ]
      ),
      new Libro(
        [
        'id' => 2, 'titulo' => 'El Señor de los Palillos',
        'autor' => 'JRR TolQuien', 'paginas' => 550
        ]
      ),
      new Libro(
        [
        'id' => 3, 'titulo' => 'Jarry Choped y la Sabana Secreta',
        'autor' => 'JK Bowling', 'paginas' => 302
        ]
      ),
      new Libro(
        [
        'id' => 4, 'titulo' => 'Los Polares de la Tierra',
        'autor' => 'Ken Follonet', 'paginas' => 400
        ]
      ),
      new Libro(
        [
        'id' => 5, 'titulo' => 'Jarry Choped y el peluquero de Azkaban',
        'autor' => 'JK Bowling', 'paginas' => 303
        ]
      ),
      new Libro(
        [
        'id' => 6, 'titulo' => 'Los Juegos de Enjambre',
        'autor' => 'Suzzanne Collonins', 'paginas' => 450
        ]
      ),
      new Libro(
        [
        'id' => 7, 'titulo' => 'Jarry Choped y le lapiz de fuego',
        'autor' => 'JK Bowling', 'paginas' => 304
        ]
      ),
      new Libro(
        [
        'id' => 8, 'titulo' => 'El Bolido da Vinci',
        'autor' => 'Dan Black', 'paginas' => 500
        ]
      ),
    ];
    
  ?>

  <h1>Ejercicio 01: <small>Acceso a bases de datos</small></h1>
  <h2>Creo los libros y los muestro en la tabla:</h2>
  <table border>
    <th>ID</th>
    <th>TITULO</th>
    <th>AUTOR</th>
    <th>PÁGINAS</th>

  <?php 

    //Creo la conexión con Mysql
    $conexion = DbAccess::getInstance();

    if ($conexion->connect_errno) {
      echo"Error conectando con MySQL: ". $conexion->connect_error;
      exit();   
    }

    //INSERTO LOS LIBROS
    foreach ($libros as $libro) {

      $sql02 = 'INSERT INTO libros (id,titulo,autor,paginas) 
        VALUES ("' . $libro->ID . '", "'. $libro->TITULO .'", "' . $libro->AUTOR. '", "' .
                $libro->PAGINAS .'")';

      $conexion->query($sql02);
    }

    $query = 'SELECT * FROM libros';
    if ($consulta = $conexion->query($query)) {

      while ($object = $consulta->fetch_object()) {
        echo '<tr><td>' . $object->id . '</td>' . '<td>' . $object->titulo . '</td>' .
        '<td>' . $object->autor . '</td>' . '<td>' . $object->paginas . '</td></tr>';
      }
    }
  ?>
  </table>
  <h2>Muestro solo el titulo y las páginas</h2>

  <table border>
    <th>TITULO</th>
    <th>PÁGINAS</th>
    
  <?php 
  
    $query = 'SELECT titulo, paginas FROM libros';
    if ($consulta = $conexion->query($query)) {

      while ($object = $consulta->fetch_object()) {
        echo '<tr><td>' . $object->titulo . '</td>' .
             '<td>' . $object->paginas . '</td></tr>';
      }
    }
  ?>

  <table border>
    <th>ID</th>
    <th>TITULO</th>
    <th>AUTOR</th>
    <th>PÁGINAS</th>
  
  <?php 

    echo '<h2>Elimino los libros de JK Bowling, digo cuantos y muestro la tabla</h2>';
  
    $query = 'DELETE FROM libros WHERE autor="JK Bowling"';

    if ($consulta = $conexion->query($query)) {
      echo '<p>Libros eliminados: ' . $conexion->affected_rows . '</p>';
    }

    $query = 'SELECT * FROM libros';

    if ($consulta = $conexion->query($query)) {

      while ($object = $consulta->fetch_object()) {
        echo '<tr><td>' . $object->id . '</td>' . '<td>' . $object->titulo . '</td>' .
        '<td>' . $object->autor . '</td>' . '<td>' . $object->paginas . '</td></tr>';
      }
    }
  ?>

  </table>

  <table border>
    <th>ID</th>
    <th>TITULO</th>
    <th>AUTOR</th>
    <th>PÁGINAS</th>
    
  <?php 
  
    echo '<h2>Cambio el título del libro con ID=8 y los muestro todos</h2>';

    $query =  'UPDATE libros SET titulo="El Morbido Da Vinci" WHERE id=8';
    
    if ($consulta = $conexion->query($query)) {

      $query = "SELECT * FROM libros";
      
      if ($consulta = $conexion->query($query)) {

        while ($object = $consulta->fetch_object()) {
          echo '<tr><td>' . $object->id . '</td>' . '<td>' . $object->titulo . '</td>' .
          '<td>' . $object->autor . '</td>' . '<td>' . $object->paginas . '</td></tr>';
        }
      }
      
    }
    
    //Cierro la conexión
    $conexion->close();
  ?>
  </table>
</body>
</html>