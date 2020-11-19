<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index.php 05</title>
</head>
<body>
  <?php 
    //require_once "includes/recaptchalib.php";
    session_start();

    if ($_POST['captcha'] != $_SESSION['captcha'] && $_POST['enviar']) {
      die ('Error: No has introducido el código correcto');
    }
    else if ($_POST['enviar']){
      echo 'Correcto, parece que eres humano';
    }

  ?>
  <form action="" method="post">

    <p>
      <label for="captcha">Introduzca los caracteres de la imagen:</label>
    </p>
    <p>
      <img src="captcha.php" alt="Captcha"  width="120" height="30" border=1>   
    </p>
    <p>
      <input type="number" name="captcha" id="captcha">
    </p>

  </form>
  
</body>
</html>