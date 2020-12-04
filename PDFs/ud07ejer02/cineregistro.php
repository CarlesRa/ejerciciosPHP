<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>

  <link rel="stylesheet" href="./styles/style.css">
</head>
<body>

  <?php 
    $rutaUser = $_SERVER['DOCUMENT_ROOT'] . '/ejerciciosPHP/authentication/ud05ejer02/model/user.php';
    include_once ('db/db_access.php');


    if(isset($_POST['registrar'])) {

      if(!empty($_POST['usuario']) &&
        !empty($_POST['pass']) &&
        !empty($_POST['rpass'])) {
        
        $user = $_POST['usuario'];
        $pass =  $_POST['pass'];
        $rpass = $_POST['rpass'];

        if ($pass === $rpass) {

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
            header('Location:./cinelogin.php');
          }
        }
        else {
          echo '<script language="javascript">alert("Las password no coinciden");</script>';
          $_POST['rpass'] = null;
        }
        
      }
    }

  ?>

  <div class="container">
  
    <div class="logo">
      <img src="./img/logo.png" alt="Logo Super Cines">
    </div>

    <div class="formulario">

      <div class="titulo">
        <h1>Registrarme</h1>
      </div>
      <form action="" method="post">
      
        <p>
          <label for="usuario">Usuario</label>
          <input type="text" name="usuario" id="usuario"
            value="<?php if(isset($_POST['registrar']) && 
                  isset($_POST['usuario'])) echo $_POST['usuario'] ?>">
          <?php 
            if (isset($_POST['registrar']) && empty($_POST['usuario'])) {
              echo"<br><span style='color:red;'> Debe introducir un Nombre!</span><br/>";
            }
          ?>
        </p>

        <p>
          <label for="pass">Password</label>
          <input type="password" name="pass" id="pass"
            value="<?php if(isset($_POST['registrar']) && 
                  isset($_POST['registrar'])) echo $_POST['pass'] ?>">
          <?php 
            if (isset($_POST['registrar']) && empty($_POST['pass'])) {
              echo"<br><span style='color:red;'> Debe introducir un password!</span><br/>";
            }
          ?>
        </p>

        <p>
          <label for="rpass">Password</label>
          <input type="password" name="rpass" id="rpass"
            value="<?php if(isset($_POST['registrar']) && 
                  isset($_POST['registrar'])) echo $_POST['rpass'] ?>">
          <?php 
            if (isset($_POST['registrar']) && empty($_POST['rpass'])) {
              echo"<br><span style='color:red;'> Debe introducir un password!</span><br/>";
            }
          ?>
        </p>

        <div class="center">
          <p>
            <input class="text-mid pointer p-5" type="submit" value="Registrarme" name="registrar">
          </p>
        </div>
        
      </form>
    </div>
  
  </div>
</body>
</html>