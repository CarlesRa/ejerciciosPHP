<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio13</title>
  <link rel="stylesheet" href="./styles/style.css">
</head>
<body>

  <div class="container">

    <h1>Formulario</h1>

    <form action=<?php sendForm() ?> method="post">

      <label for="nombre">Nombre*</label>  
      <input type="text" name="nombre" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre']?>"><br>
      <?php  
          if (isset($_POST['enviar']) && empty($_POST['nombre'])) {
            echo"<span style='color:red;'> Debe introducir un nombre!</span><br/>";
          }
      ?>
      <div class="container-stilos">
      <label for="estilos">Gustos musicales: </label> <br>
        <div class="estilos">
        <label for="estilos">Acústica</label>
        <input type="checkbox" name="estilos[]" value="Acústica" 
          <?php 
            if ($_POST['estilos']) 
              if (in_array('Acústica', $_POST['estilos'])) echo 'checked'  
          ?>><br>

        <label for="estilos">BSO</label>
        <input type="checkbox" name="estilos[]" value="BSO" 
          <?php 
            if ($_POST['estilos']) 
              if (in_array('BSO', $_POST['estilos'])) echo 'checked'  
          ?>><br>

        <label for="estilos">R&B</label>
        <input type="checkbox" name="estilos[]" value="R&B"
          <?php 
            if ($_POST['estilos']) 
              if (in_array('R&B', $_POST['estilos'])) echo 'checked'  
          ?>><br/>

        <label for="estilos">Electrónica</label>
        <input type="checkbox" name="estilos[]" value="Electrónica"
          <?php 
            if ($_POST['estilos']) 
              if (in_array('Electrónica', $_POST['estilos'])) echo 'checked'  
          ?>><br/>

        <label for="estilos">Folk</label>
        <input type="checkbox" name="estilos[]" value="Folk"
          <?php 
            if ($_POST['estilos']) 
              if (in_array('Folk', $_POST['estilos'])) echo 'checked'  
          ?>><br/>

        <label for="estilos">Jazz</label>
        <input type="checkbox" name="estilos[]" value="Jazz"
          <?php 
            if ($_POST['estilos']) 
              if (in_array('Jazz', $_POST['estilos'])) echo 'checked'  
          ?>><br/>

        <label for="estilos">Pop</label>
        <input type="checkbox" name="estilos[]" value="Pop"
          <?php 
            if ($_POST['estilos']) 
              if (in_array('Pop', $_POST['estilos'])) echo 'checked'  
          ?>><br/>

        <label for="estilos">Rock</label>
        <input type="checkbox" name="estilos[]" value="Rock"
          <?php 
            if ($_POST['estilos']) 
              if (in_array('Rock', $_POST['estilos'])) echo 'checked'  
          ?>><br/>

        <?php 

          if (isset($_POST['enviar']) && empty($_POST['estilos'])) {
            echo"<span style='color:red;'>Debe marcar alguna opción!<br/></span>";
          }

        ?>
      </div>
      

      <div class="boton">
        <input type="submit" name="enviar" value="Enviar" id="enviar">
      </div>
      
    </form>

    <?php 
      function sendForm() {
        if (empty($_POST['nombre']) || empty($_POST['estilos'])) {
          echo 'ejer13.php';
        }
        else { 
          echo 'resultado.php';
        }
      }
    ?>
      
  </div>
      </div>
      
</body>
</html>