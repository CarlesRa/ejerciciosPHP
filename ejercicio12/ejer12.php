<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
<?php 
    if(isset($_POST['enviar']) && isset($_POST['comidas']) && isset($_POST['motivo'])) {
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
      <input type="checkbox" name="comidas[]" id="carne">
      <label for="verdura">Verdura</label>
      <input type="checkbox" name="comidas[]" id="verdura" value="Verdura">
      <label for="legumbres">Legumbres</label>
      <input type="checkbox" name="comidas[]" id="legumbres" value="Legumbres"><br/>

      <label for="motivo">¿Por que le gustaría viajar a Marte?</label><br>
      <textarea name="motivo" cols="30" rows="5" placeholder="Explique el motivo..."
        value="<?php if(isset($_POST['motivo'])) echo $_POST['motivo']?>">
      </textarea>
      <?php 
           if (isset($_POST['enviar']) && empty($_POST['motivo'])) {
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