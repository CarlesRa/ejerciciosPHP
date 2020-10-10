<?php 
    include "model/Contacto.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POO ejercicio01</title>
</head>
<body>
  <h1>Ejercicio 01 POO</h1>
  <hr>
  <h2>Creación del objeto Contacto con id 25, nombre Manolo y teléfono el 965782558</h2>

  <h3>Imprimo el nombre con getNombre()</h3>
  <?php 
    $contacto = new Contacto('25', 'Manolo', '965782558');
    echo $contacto->getNombre();
  ?>

  <h3>Imprimo con getTelefono()</h3>
  <?php 
    echo $contacto->getTelefono();
  ?>

  <h3>Imprimo el objeto entero</h3>
  <?php 
    echo $contacto;
  ?>

  <h3>Cambio el nombre a Lola</h3>
  <?php 
    $contacto->setNombre('Lola');
    echo $contacto->getNombre();
  ?>

<h3>Cambio el teléfono a 666666666</h3>
  <?php 
    $contacto->setTelefono('666666666');
    echo $contacto->getTelefono();
  ?>

<h3>Imprimo de nuevo el objeto entero con los cambios.</h3>

<?php 
  echo $contacto;
?>
  
</body>
</html>