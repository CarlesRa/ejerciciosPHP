<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio02</title>
</head>
<body>
  <h2>Creo la Agenda y añado 3 contactos</h2>
  <?php 
    require_once 'model/Agenda.php';
    require_once 'model/Contacto.php';
    
    $agenda = new Agenda();
    $agenda->addContacto(new Contacto(1, 'Manolo', '965782558'));
    $agenda->addContacto(new Contacto(2, 'Juana', '686686766'));
    $agenda->addContacto(new Contacto(3, 'Maria', '965784546'));

    echo $agenda;
  ?>
  <h2>Muestro el segundo Contacto</h2>
  <?php 
  
    echo $agenda->getContactos()[1];
  
  ?>

  <h2>Elimino el segundo contacto y muestro la agenda</h2>
  <?php 
  
    $agenda->removeContacto(2);
    echo $agenda;
  
  ?>
</body>
</html>