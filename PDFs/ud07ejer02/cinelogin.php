<?php 

  session_start();

  if (isset($_SESSION['loged'])) {
    header('Location: views/pagina.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
  <?php 
    include ('db/db_access.php');

    $authError = false;

    if (isset($_POST['entrar'])) {
      //lo de comprobar la base de datoss
      if (!empty($_POST['usuario']) && !empty($_POST['pass'])) {
        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];

        if ($user = DbAccess::userExists($usuario, $pass)) {
          
          $_SESSION['loged'] = 'si';
          $_SESSION['nombre'] = $user[0]['usuario'];
          //setcookie('last-log', time(), time()+60*60*24*365);
          header('Location: cinepagina.php');
        }
        else {
         
          $authError = true;
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
        <p class="text-blue">Introduce tus credenciales para entrar</p>
      </div>
      <form action="" method="post">
        <?php 

          if ($authError) {
        
            echo '<span style="color:red;">Datos incorrectors Prueba de nuevo' .
                 '<br>o <a href="cineregistro.php">Registrate!!</a></span>';
          }
        
        ?>
        <p>
          <label for="usuario">Usuario</label>
          <input type="text" name="usuario" id="usuario"
                 value="<?php if (isset($_POST['entrar']) &&
                                  isset($_POST['usuario'])) echo $_POST['usuario'] ?>">
          <?php 
            if (isset($_POST['entrar']) && empty($_POST['usuario'])) {
              echo '<br><span style="color:red;">El campo usuario es obligatorio';
            }
          ?>
        </p>
        <p>
          <label for="pass">Contraseña</label>
          <input type="password" name="pass" id="pass"
          value="<?php if (isset($_POST['entrar']) &&
                           isset($_POST['pass'])) echo $_POST['pass'] ?>">
          <?php 
            if (isset($_POST['enviar']) && empty($_POST['pass'])) {
              echo '<br><span style="color:red;">El campo contraseña es obligatorio';
            }
          ?>
        </p>
        <div class="center">
          <p>
            <input class="text-mid pointer p-5" type="submit" value="Entrar" name="entrar">
          </p>
        </div>
        <p>
            Si no tienes cuenta
            <a href="cineregistro.php">¡¡Registrate!!</a>
          </p>
      </form>
    </div>
  </div>
</body>
</html>