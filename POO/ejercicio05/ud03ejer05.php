<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ud03ejer05</title>
</head>
<body>
  <h1>Ejercicio 05 POO</h1>

  <?php 
  
    require_once 'model/Agenda.php';
    require_once 'model/PContacto.php';
    require_once 'model/EContacto.php';

    $agenda = new Agenda();

    $contacto1 = new EContacto([
      'id' => '1000',
      'nombre' => 'Paco',
      'telefono' => '915782453',
      'email' => 'paco@gmail.com',
      'url' => 'www.paco.com'
    ]);
    echo '<h2>EContacto1</h2>' . $contacto1 . '<br/>';

    $contacto2 = new EContacto([
      'id' => '1001',
      'nombre' => 'Manolo',
      'telefono' => '965786775',
      'email' => 'manolo@gmail.com',
      'url' => 'www.manolo.com'
    ]);
    echo '<h2>EContacto2</h2>' . $contacto2 . '<br/>';

    $contacto3 = new EContacto([
      'id' => '1002',
      'nombre' => 'Maria',
      'telefono' => '965676775',
      'email' => 'maria@gmail.com',
      'url' => 'www.maria.com'
    ]);
    echo '<h2>EContacto3</h2>' . $contacto3 . '<br/>';

    $contacto4 = new PContacto([
      'id' => '1003',
      'nombre' => 'Agustina',
      'telefono' => '966423546',
      'direccion' => 'Sard 8',
      'ciudad' => 'Denia',
      'provincia' => 'Alicante'
    ]);
    echo '<h2>PContacto4</h2>' . $contacto4 . '<br/>';

    $contacto5 = new PContacto([
      'id' => '1004',
      'nombre' => 'Fermin',
      'telefono' => '93565577',
      'direccion' => 'Sants 676',
      'ciudad' => 'Barcelona',
      'provincia' => 'Barcelona'
    ]);
    echo '<h2>PContacto5</h2>' . $contacto5 . '<br/>';

    $contacto6 = new PContacto([
      'id' => '1005',
      'nombre' => 'Persimon',
      'telefono' => '913454554',
      'direccion' => 'Sol 34',
      'ciudad' => 'Madrid',
      'provincia' => 'Madrid'
    ]);
    echo '<h2>PContacto6</h2>' . $contacto6 . '<br/>';

    $agenda->addContacto($contacto1);
    $agenda->addContacto($contacto2);
    $agenda->addContacto($contacto3);
    $agenda->addContacto($contacto4);
    $agenda->addContacto($contacto5);
    $agenda->addContacto($contacto6);
    
    echo '<h2>Añado los contactos y muestro la agenda</h2>';

    echo $agenda;

  ?>
</body>
</html>