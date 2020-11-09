<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio UD05ejer01</title>
  <link rel="stylesheet" href="./styles/style.css">
  <script src="./scripts/alerts.js"></script>
</head>
<body>
  <?php 
  
    include 'db/db_access.php';

    if(array_key_exists("user",$_POST) &&
       array_key_exists("pass",$_POST)) {
      

      $user = $_POST['user'];
      $pass =  $_POST['pass'];
      $result = DbAccess::insertUser($user, $pass);

      if ($result == ERROR_NOMBRE_EXISTE) {

        echo '<script language="javascript">alert("El nombre existe...");</script>';
      }
      else if($result == ERROR_CONEXION_DB) {
          
        echo '<script language="javascript">alert("Error al conectar...");</script>';
      }
      else if($result = OK) {
        echo '<script language="javascript">alert("Insertado correctamente");</script>';
        $_POST = [];
      }
    }
  ?>

  <div class="container">

    <div class="titulo">
      <h1>Login</h1>
    </div>
    
    <div class="form">
    
      <form action="" method="post">
        <p>
          <label for="user">Usuario</label>
          <input require type="text" name="user" id="user" value="<?php if(isset($_POST['user'])) echo $_POST['user'] ?>">
          <?php 
            if (isset($_POST['enviar']) && empty($_POST['user'])) {
              echo"<br><span style='color:red;'> Debe introducir un Nombre!</span><br/>";
            }
          ?>
        </p>
        <p>
          <label for="pass">Contraseña</label>
          <input require type="password" name="pass" id="pass" value="<?php if(isset($_POST['pass'])) echo $_POST['pass'] ?>">
          <?php 
            if (isset($_POST['enviar']) && empty($_POST['pass'])) {
              echo"<br><span style='color:red;'> Debe introducir una contraseña!</span><br/>";
            }
          ?>
        </p>
        <div class="boton">
          <p>
            <input type="submit" value="Entrar" name="enviar">
          </p>
        </div>
      </form>
    </div>
  </div>
</body>
</html>