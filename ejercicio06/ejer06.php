<title>Ejercicio06</title>

<?php
  
  echo "La compra de 90€ a quedado en: " . comprobarDescuento(90) . "€<br/>";
  echo "La compra de 101€ a quedado en: " . comprobarDescuento(101) . "€<br/>";
  echo "La compra de 560€ a quedado en: " . comprobarDescuento(560) . "€<br/>";
  
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