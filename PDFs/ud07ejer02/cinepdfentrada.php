<?php 
  require_once ("./pdf.php");

  if (isset($_GET['fila']) && isset($_GET['butaca']) && isset($_GET['pelicula'])) {

        $fila = $_GET['fila'] + 1;
        $butaca = $_GET['butaca'] + 1;
        $pelicula = $_GET['pelicula'];

        $html = "<!DOCTYPE html>
        <html lang='es'>
        <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Document</title>
        </head>
          <style>

          div {
          }
          table {
            border: 2px solid black;
          }
          tr {
            border: 1px solid black;
            padding: 10px;
          }
          td {
            border: 1px solid black;
          }
        
          </style>
        
          <div class='container'>
            <img src='../img/logo.png' alt='logo'>
            <table>
                <tr>
                  <td><b>PELÍCULA</b></td>
                  <td>$pelicula</td>
                </tr>
                <tr>
                  <td><b>FILA</b></td>
                  <td>$fila</td>
                </tr>
                <tr>
                  <td><b>BUTACA</b></td>
                  <td>$butaca</td>
                </tr>
                <tr>
                  <td>Presente esta entrada en taquilla</td>
                </tr>
            </table>
          </div>
        </html>";

      printEntrada($html);
    }

  function printEntrada($html) {

    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Cines Ramos');
    $pdf->SetTitle('Entrada');
    $pdf->SetSubject('Entrada de cine');
    $pdf->AddPage();
    $pdf->Ln(100);
    $pdf->SetDisplayMode(600, 'Single');

    $pdf->Multicell( 200, 200, $html, $borde = 0, $alineación = 'C', 
                           $fondo = false, $salto_de_linea= 1, $x = '0', $y = '', 
                           $reseth= true, $ajuste_horizontal= 0, $ishtml= true, 
                           $autopadding= true, $maxh= 0, $alineacion_vertical= 'T',
                           $fitcell= false);
    $pdf->Output('ticket.pdf', 'D');
  }
