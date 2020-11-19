<title>Ejercicio06</title>

<?php
  
  echo "La compra de 90€ ha quedado en: " . comprobarDescuento(90) . "€<br/>";
  echo "La compra de 101€ ha quedado en: " . comprobarDescuento(101) . "€<br/>";
  echo "La compra de 560€ ha quedado en: " . comprobarDescuento(560) . "€<br/>";
  
  function comprobarDescuento($cantidadDinero) {
    
    $resultado;

    if ($cantidadDinero < 100) {
        $resultado = $cantidadDinero;
    } 
    else if ($cantidadDinero >= 100 && $cantidadDinero <= 500) {
        $resultado = $cantidadDinero - ($cantidadDinero * 0.1);
    }
    else {
        $resultado = $cantidadDinero - ($cantidadDinero * 0.15);
    }

    return $resultado;
  }

?>