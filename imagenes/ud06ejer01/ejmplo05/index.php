<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index.php 05</title>
</head>
<body>
  <?php 
    session_start();

		if (isset($_POST['enviar'])) {
			if (md5($_POST['text']) != $_SESSION['key'] && $_POST['enviar']) {
				die ('Error: No has introducido el código correcto');
			}
			else {
				echo 'Correcto, parece que eres humano';
			}
		}
		else {
			?>
		
    
  
			<form action="" method="post">

				<p>
					<label for="captcha">Introduzca los caracteres de la imagen:</label>
				</p>
				<p>
					<img src="captcha.php" alt="Captcha"  width="120" height="30" border=1>   
				</p>
				<p>
					<input type="text" name="text" id="captcha">
				</p>

				<p>
					<input type="submit" value="Comprobar" name="enviar">
				</p>

			</form>
		<?php } ?>
  
</body>
</html>