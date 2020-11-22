<?php
  date_default_timezone_set('UTC');
  
  function fechaCastellano() {

    define("DIAS", array('Lunes', 'Martes', 'Miercoles',
    'Jueves','Viernes', 'Sabado', 'Domingo'));
    

    $dia = DIAS[date('N') - 1];
    $mes = traducirMes(date('F'));;
    

    return $dia.", ".date('d').' de '.$mes.' de '.date('Y');


  }

  function factorial($numero) {

      $factorial = 1;
      $resultado = $numero."! = ".$numero;

      for ($i = 1; $i <= $numero; $i++) {
          $factorial *= $i;
          $resultado = $resultado ." x ".$i." ";
      }

      $resultado = $resultado . " = ".$factorial;

      return $resultado;
  }

  function traducirMes($nombreMes) {

    switch ($nombreMes) {
      case 'January' :
        $nombreMes = "Enero";
        break;
        

      case 'February' :
        $nombreMes = "Febrero";
        break;
        

      case 'March' :
        $nombreMes = "Marzo";
        break;
        

      case 'April' :
        $nombreMes = "April";
        break;
        

      case 'May' :
        $nombreMes = "Mayo";
        break;
        

      case 'June' :
        $nombreMes = "Junio";
        break;
        

      case 'July' :
        $nombreMes = "Julio";
        break;
        

      case 'August' :
        $nombreMes = "Agosto";
        break;
        

      case 'September' :
        $nombreMes = "Septiembre";
        break;
        

      case 'October' :
        return "Octubre";
        

      case 'November' :
        $nombreMes = "Noviembre";
        break;
        

      case 'December' :
        $nombreMes = "Diciembre";
        break;
        
    }

    return $nombreMes;
  }

?>