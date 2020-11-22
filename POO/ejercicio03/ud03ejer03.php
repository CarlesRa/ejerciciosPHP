<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio03</title>
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
  <h2>Muestro el segundo Contacto con __get() ya incorporado</h2>
  <?php 
  
    echo $agenda->getContactos()[1];
  
  ?>

  <h2>Elimino el segundo contacto y muestro la agenda</h2>
  <?php 
  
    $agenda->removeContacto(2);
    echo $agenda;
  
  ?>

  <h2>Clono la agenda</h2>
  <?php 
  
    $agendaClone = clone $agenda;

  ?>

  <h2>Muestro las 2 agendas</h2>
  <h3>Original</h3>

  <?php 
  
    echo $agenda;
  ?>

  <h3>Copia</h3>
  <?php 
  
    echo $agendaClone;
  ?>

  <h2>Modifico el atributo nombre a Paco del primer contacto
     de la agenda clonada y muestro ambas agendas</h2>
  <?php 
  
    $agendaClone->getContactos()[0]->NOMBRE = "Paco";
    
  ?>

  <h3>Original</h3>
  <?php 
  
    echo $agenda;
  ?>

  <h3>Copia</h3>
  <?php 
  
    echo $agendaClone;
  ?>
</body>
</html>