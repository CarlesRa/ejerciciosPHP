<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio06</title>

  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <?php 

    require_once ('models/Base.php');
    require_once ('models/Escolta.php');
    require_once ('models/Alero.php');
    require_once ('models/Pivot.php');
    require_once ('models/Alapivot.php');
    require_once ('models/Equipo.php');

    $quinteto = [
      'Base' => new Base([
        'dorsal' => '1',
        'nombre' => "Juan",
        'estatura' => 1.81,
        'asistencias' => 0
      ]),
      'Escolta' => new Escolta([
        'dorsal' => '2',
        'nombre' => 'Manolo',
        'estatura' => 1.90,
        'robos' => 0
      ]),
      'Alero' => new Alero([
        'dorsal' => '3',
        'nombre' => 'Pedro',
        'estatura' => 1.96,
        'puntos' => 0
      ]),
      'Alapivot' => new Alapivot([
        'dorsal' => '4',
        'nombre' => 'Carlos',
        'estatura' => 2,
        'tapones' => 0
      ]),
      'Pivot' => new Pivot([
        'dorsal' => '5',
        'nombre' => 'Dueñas',
        'estatura' => 2.10,
        'rebotes' => 0
      ]),
    ];
  
    $equipo = new Equipo([
      'nombre' => 'Regal Barcelona',
      'quinteto' => $quinteto
    ])
  ?>

  <div class="container">
    <header class="title">
      <h1>Información de Equipo</h1>
    </header>
      <section class="section">
    <?php 

      $table = '<table border=1><tr><th>Equipo</th><th>Jugadores</th>' .
              '<th>Altura media</th><th>Jugador más alto</th></tr><tr><td>' . 
              $equipo->NOMBRE . '</td><td>';

      $table .= '<table border=1><tr><th>Posición</th><th>Jugador</th></tr>';

      foreach ($equipo->QUINTETO as $posicion => $juagador) {
        $table .= '<tr><td>' . $posicion . '</td><td>' . $juagador . '</td></tr>';
      }

      $table .= '</table>';
      $table .= '<td>' .  round($equipo->estaturaMedia($equipo->QUINTETO), 2, PHP_ROUND_HALF_UP) .
                ' m.</td>';
      $table .= '<td>' . $equipo->estaturaMaxima($equipo->QUINTETO) .
                '</td></table>';

      echo $table;
    ?>
    </section>
  </div>

</body>
</html>