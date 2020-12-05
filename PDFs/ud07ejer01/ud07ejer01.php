<?php 
  include_once ("./pdf.php");

  define("FROZEN", 23);
  define("ALADIN", 12);
  define("MULAN", 35);
  define("YOUTUBER", 75);


  if (isset($_POST['enviar']) && !empty($_POST['nombre']) && !empty($_POST['direccion']) &&
      !empty($_POST['frozen']) || !empty($_POST['aladin']) || !empty($_POST['mulan']) ||
      !empty($_POST['youtuber'])) {

        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        $productos = array();

        if (!empty($_POST['frozen'])) {
          $productos[] = array("quant" => $_POST['frozen'], "descr" => "Muñeca Frozen", "price" => FROZEN);
        }
        if (!empty($_POST['aladin'])) {
          $productos[] = array("quant" => $_POST['aladin'], "descr" => "Muñeco Aladin", "price" => ALADIN);
        }
        if (!empty($_POST['mulan'])) {
          $productos[] = array("quant" => $_POST['mulan'], "descr" => "Muñeca Mulan", "price" => MULAN);
        }
        if (!empty($_POST['youtuber'])) {
          $productos[] = array("quant" => $_POST['youtuber'], "descr" => "Muñeco Youtuber", "price" => YOUTUBER);
        }

        $_POST = array();
        printFactura($nombre, $direccion, $telefono, $productos);
        
  }
  else {


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 01 PDF</title>

  <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
  <div class="container">

    <div class="title">
      <img class="img-logo" src="./img/logo.png" alt="Logo Tienda">
      <h1>FORMULARIO DE COMPRA</h1>
    </div>

    <div class="formulario">
      <form action="" method="post">
        <p>
          <h3>Cliente</h3>
        </p>
        <p>
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nomber" value="<?php if(isset($_POST['enviar']) && !empty($_POST['nombre'])) echo  $_POST['nombre'] ?>">
          <?php 
            if (isset($_POST['enviar']) && empty($_POST['nombre'])) {
              echo '<span style="color:red">El nombre es obligatorio</span>';
            }
          ?>
        </p>
        <p>
          <label for="direccion">Dirección</label>
          <input type="text" name="direccion" id="direccion" value="<?php if(isset($_POST['enviar']) && !empty($_POST['direccion'])) echo  $_POST['direccion'] ?>">
          <?php 
            if (isset($_POST['enviar']) && empty($_POST['direccion'])) {
              echo '<span style="color:red">La dirección es obligatoria</span>';
            }
          ?>
        </p>
        <p>
          <label for="telefono">telefono</label>
          <input type="number" name="telefono" id="telefono" 
            value="<?php if(isset($_POST['enviar']) && !empty($_POST['telefono'])) echo  $_POST['telefono'] ?>">
          <?php 
            if (isset($_POST['enviar']) && empty($_POST['telefono'])) {
              echo '<span style="color:red">El teléfono es obligatorio</span>';
            }
          ?>
        </p>
        <p>
          <h3>Productos</h3>
          <?php 
            if (isset($_POST['enviar']) && empty($_POST['frozen']) && empty($_POST['aladin']) && empty($_POST['mulan']) && 
                empty($_POST['fortnite']) && empty($_POST['youtuber'])) {
              echo '<span style="color:red">Debe seleccionar almenos un artículo</span>';
            }
          ?>
        </p>
        <p>
          <label for="frozen">Muñeca Frozen:</label>
          <label for="frozen">
            <input type="number" name="frozen" id="frozen" placeholder="cantidad" 
                value="<?php if(isset($_POST['enviar']) && !empty($_POST['frozen'])) echo  $_POST['frozen'] ?>"> <big>23€</big>
          </label>
        </p>
        <p>
          <label for="aladin">Muñeca Aladin:</label>
          <label for="frozaladinealadinn">
            <input type="number" name="aladin" id="aladin" placeholder="cantidad"
              value="<?php if(isset($_POST['enviar']) && !empty($_POST['aladin'])) echo  $_POST['aladin'] ?>"> <big>12€</big>
          </label>
        </p>
        <p>
          <label for="mulan">Muñeca Mulan:</label>
          <label for="mulan">
            <input type="number" name="mulan" id="mulan" placeholder="cantidad"
              value="<?php if(isset($_POST['enviar']) && !empty($_POST['mulan'])) echo  $_POST['mulan'] ?>"> <big>35€</big>
            
          </label>
        </p>
        <p>
          <label for="youtuber">Muñeca Youtuber:</label>
          <label for="youtuber">
            <input type="number" name="youtuber" id="youtuber" placeholder="cantidad"
              value="<?php if(isset($_POST['enviar']) && !empty($_POST['youtuber'])) echo  $_POST['youtuber'] ?>"> <big>75€</big>
          </label>
        </p>
        <p class="center">
          <input class="button-large" type="submit" value="¡VENDER!" name='enviar'>
          <input type="reset" value="Nueva Venta">
        </p>
      </form>
      
    </div>
  </div>
</body>
</html>
<?php 
  }
?>

<?php 

  function printFactura($nombre, $direccion, $telefono, $productos) {

    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Carles Ramos');
    $pdf->SetTitle('Factura');
    $pdf->SetSubject('Albaran de compra');
    $pdf->SetKeywords('TCPDF, PDF, example, factura');
  
    $pdf->AddPage();
  
    $pdf->CreateTextBox('Datos del Cliente', 0, 40, 80, 10, 10, 'B');
    $pdf->CreateTextBox($nombre, 0, 45, 80, 10, 10);
    $pdf->CreateTextBox($telefono, 0, 50, 80, 10, 10);
    $pdf->CreateTextBox($direccion, 0, 55, 80, 10, 10);
  
    $pdf->CreateTextBox('Fecha: '.date('d-m-Y'), 0, 60, 0, 10, 10, 'B', 'R');
  
    $pdf->CreateTextBox('Cantidad', 0, 70, 20, 10, 10, 'B', 'C');
    $pdf->CreateTextBox('Producto', 20, 70, 90, 10, 10, 'B');
    $pdf->CreateTextBox('Precio', 110, 70, 30, 10, 10, 'B', 'R');
    $pdf->CreateTextBox('Total', 140, 70, 30, 10, 10, 'B', 'R');
     
    //Imprimo una línea
    $pdf->Line(20, 80, 195, 80);
    //margin-left, margin-top-left, largo, margin-top-right
  
    // some example data
    $orders[] = array('quant' => 5, 'descr' => '.com domain registration', 'price' => 9.95);
    $orders[] = array('quant' => 3, 'descr' => '.net domain name renewal', 'price' => 11.95);
    $orders[] = array('quant' => 1, 'descr' => 'SSL certificate 256-Byte encryption', 'price' => 99.95);
    $orders[] = array('quant' => 1, 'descr' => '25GB VPS Hosting, 200GB Bandwidth', 'price' => 19.95);
    
    $currY = 80; //Variable para almacenar la posición -Y- que nos interesa
    $total = 0;
    foreach ($productos as $row) {
            $pdf->CreateTextBox($row['quant'], 0, $currY, 20, 10, 10, '', 'C');
            $pdf->CreateTextBox($row['descr'], 20, $currY, 90, 10, 10, '');
            $pdf->CreateTextBox('$'.$row['price'], 110, $currY, 30, 10, 10, '', 'R');
            $amount = $row['quant']*$row['price'];
            $pdf->CreateTextBox('$'.$amount, 140, $currY, 30, 10, 10, '', 'R');
            $currY = $currY+5;
            $total = $total+$amount;
    }
    $pdf->Line(20, $currY+4, 195, $currY+4);
  
    // Linea de total
    $pdf->CreateTextBox('Total', 20, $currY+5, 135, 10, 10, 'B', 'R');
    $pdf->CreateTextBox('$'.number_format($total, 2, '.', ''), 140, $currY+5, 30, 10, 10, 'B', 'R');
    
    // Información leyenda factura
    $pdf->setXY(20, $currY+30);
    $pdf->SetFont(PDF_FONT_NAME_MAIN, '', 10);
  
    //Creo una Celda
    $pdf->MultiCell(175, 10, 
      '¡¡Gracias por comprar en Toys Shop, le deseamos una feliz navidad y un próspero año nuevo sin coronavirus!!', 
      0, 'L', 0, 1, '', '', true, null, true);
    
    //Close and output PDF document
    $pdf->Output($nombre . '.pdf', 'D');
  }

?>