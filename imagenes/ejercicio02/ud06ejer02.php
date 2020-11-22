<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 

		if (isset($_POST['enviar'])) {

			if (validarImagen()) {
				header('Location: subida.php');
			}
			else {
				echo 'esta mal';
			}
		}
	?>
	<form action="" method="post" enctype="multipart/form-data">

		<p>
			<label for="imagen">Seleccione una imagen a subir</label>
		</p>
		
		<p>
			<input type="file" name="imagen" id="imagen">
		</p>

		<p>
			<input type="submit" value="subir">
		</p>
		
	</form>
	<?php 

		function validarImagen() {
			return true;
		}
	?>
</body>
</html>