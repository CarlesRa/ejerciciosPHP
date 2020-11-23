<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 02</title>
</head>
<body>
	<?php 
		
		if (!comprobarImagen()) {

	?>

	<form method="post" enctype="multipart/form-data">

		<p>
			<label for="imagen">Seleccione una imagen a subir:</label>
		</p>
		
		<p>
			<input type="file" name="imagen" id="imagen">
		</p>

		<p>
			<input type="submit" value="subir" name="subir">
		</p>
		
	</form>
	<?php 
		}
		else {
			
			if (isset($_POST['path'])) {
				$nombre = $_POST['path'];
				$nombreSize = strlen($nombre);
				$nombreDef = substr($nombre, 2, $nombreSize);
				$nombreSplit = explode('.', $nombreDef);
				$nuevoNombre120 = $nombreSplit[0] . '_120.' . $nombreSplit[1]; 
				$nuevoNombre200 = $nombreSplit[0] . '_200.' . $nombreSplit[1]; 
			}
	?>

	<!--aqui va mostrar la imatge -->
			<img src=<?php echo mostrarMiniatura($nombreDef, $nuevoNombre120, 120, 120); ?> alt="noesta"> 
			<img src=<?php echo mostrarMiniatura($nombreDef, $nuevoNombre200, 200, 200); ?> alt="noesta"> 
	<?php 

		
		}
	?>
</body>
</html>

<?php 


	function comprobarImagen() {
		if (isset($_POST['subir'])) {
			if (isset($_FILES['imagen'])) {
				if ($_FILES['imagen']['error'] != UPLOAD_ERR_OK) { 
					
					switch($_FILES['imagen']['error']) { 
						case UPLOAD_ERR_INI_SIZE: 
						case UPLOAD_ERR_FORM_SIZE: 
							showAlert('El fichero es demasiado grande'); 
							return false;
							break; 
						case UPLOAD_ERR_PARTIAL: 
							showAlert('El fichero no se ha podido subir entero'); 
							return false;
							break; 
						case UPLOAD_ERR_NO_FILE: 
							showAlert('Debe seleccionar un fichero');
							return false;
							break; 
						default: 
							showAlert('Error indeterminado'); 
							return false;
					}
				}
				else if ($_FILES['imagen']['type'] == 'image/gif' || 
								 $_FILES['imagen']['type'] == 'image/jpg' ||
								 $_FILES['imagen']['type'] == 'image/jpeg' ||
								 $_FILES['imagen']['type'] == 'image/png' ) {

					if (is_uploaded_file($_FILES['imagen']['tmp_name']) === true){
	
						$path = './subidas/' . $_FILES['imagen']['name'];
		
						if (is_file($path) === true) {
							$pathSplit = explode('.', $_FILES['imagen']['name']);
							$path = './subidas/' . $pathSplit[0] . '_' . time() . '.' . $pathSplit[1];
						}
						if (move_uploaded_file($_FILES['imagen']['tmp_name'], $path)) {
		
							$_POST['path'] = [];
							$_POST['path'] = $path;
							return true;
						}
						else {
							showAlert('error al mover el archivo a su destino');
							return false;
						}
					}
					else 
						showAlert('Error: Posible ataque, file: ' . $_FILES['imagen']['name']);
						return false;
				}
				else {
					showAlert('Solo se aceptan (.jpg, .jpeg, .gif, .png');
					return false;
				}
				
			}
		}
		
	}


	function showAlert($message) {
		echo '<script language="javascript">';
		echo 'alert("' . $message . '")';
		echo '</script>';
	}

	function mostrarMiniatura($name_org, $name_dst, $ancho, $alto) {
		$arrNombre = explode(".", $name_dst);
		$nombre = $arrNombre[0];
		$extension = $arrNombre[1];

		if ($extension == 'jpg' || $extension == 'jpeg') $source = imagecreatefromjpeg($name_org);
		else if ($extension == 'gif') $source = imagecreatefromgif($name_org);
		else if ($extension == 'png') $source = imagecreatefrompng($name_org);

		$thumb = imagecreatetruecolor($ancho, $alto);
		$ancho_orig = imagesx($source);
		$alto_orig = imagesy($source);

		imagecopyresampled($thumb, $source, 0,0,0,0, $ancho, $alto, $ancho_orig, $alto_orig);

		if($extension=="jpg"||$extension=="jpeg"){
			imagejpeg($thumb,$name_dst, 90);
			return $name_dst;
		} 
		elseif($extension=="png") {
			imagepng($thumb,$name_dst);
			return $name_dst;
		}
		elseif($extension=="gif") {
			imagegif($thumb,$name_dst);
			return $name_dst;
		}
	}

?>