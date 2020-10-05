<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio12</title>
  <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
<?php 
    if(isset($_POST['enviar']) && 
                               strlen($_POST['nombre']) > 0 &&
                               isset($_POST['comidas']) &&
                               isset($_POST['motivo'])
                               ) {

      $nombre = $_POST['nombre'];
      $comidas = $_POST['comidas'];
      $motivo = $_POST['motivo'];
  
      print("Nombre: " . $nombre . "<br/>");
      print("Comidas preferentes: " . implode(", ", $comidas) . "<br/>");

      echo "Motivo del viaje: <br/>";
      echo $motivo . "<br/>";
    }
    else {
  ?>
  <div class="container">
    <h1>Nasa</h1>
    <form action="" method="post">

      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" placeholder="Escriba su nombre" 
        value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre']?>">
        <?php  
          if (isset($_POST['enviar']) && empty($_POST['nombre'])) {
            echo"<span style='color:red;'> Debe introducir un nombre!</span>";
          }
        ?>
      <br/>

      <label for="comidas">Comidas preferentes:</label>

      <label for="carne">Carne</label>
      <input type="checkbox" name="comidas[]" id="carne" value="Carne" 
      <?php 
        if ($_POST['comidas']) 
          if (in_array('Carne', $_POST['comidas'])) echo 'checked'  
      ?>>

      <label for="verdura">Verdura</label>
      <input type="checkbox" name="comidas[]" id="verdura" value="Verdura" 
      <?php 
        if ($_POST['comidas']) 
          if (in_array('Verdura', $_POST['comidas'])) echo 'checked'  
      ?>>

      <label for="legumbres">Legumbres</label>
      <input type="checkbox" name="comidas[]" value="Legumbres"
      <?php 
        if ($_POST['comidas']) 
          if (in_array('Legumbres', $_POST['comidas'])) echo 'checked'  
      ?>><br/>
      <?php 

        if (isset($_POST['enviar']) && empty($_POST['comidas'])) {
          echo"<span style='color:red;'>Debe marcar alguna opción!<br/></span>";
        }
      
      ?>

      <label for="motivo">¿Por que le gustaría viajar a Marte?</label><br>
      <textarea name="motivo" cols="30" rows="5" placeholder="Explique el motivo...">
        <?php 
          if(strlen(trim($_POST['motivo']))) {
            echo $_POST['motivo'];
          } 
        ?>
      </textarea>
      <?php 
        if (isset($_POST['enviar']) && !strlen(trim($_POST['motivo']))) {
          echo"<span style='color:red;'> Debe introducir un motivo!</span>";
        }
      ?>
      <br>

      <div class="boton">
        <input name="enviar" type="submit" value="Enviar">
      </div>
    </form>
  </div>
  <?php 
    }
  ?>
</body>
</html>