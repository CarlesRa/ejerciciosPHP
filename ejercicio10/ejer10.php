<title>Ejercicio10</title>

<?php 

print("<h1>Ejercicio 10</h1>\n");
print("\ta)\n");

$nombres = array("Paco", "Maria", "Juan", "Juana", "Bartolo", "Marga", "Anastasio", "Frozen", "Mulan", "Esperanza");
$apellidos = array("Suarez", "Martinez", "Fernandez", "Ramos", "Guardiola", "Federico", "Moll", "Fabio", "De los Santos", "Pastor");
$alumni = [];
for ($i = 0; $i < 100; $i++) {
  $alumni[] = $nombres[rand(0, count($nombres) - 1)] . " " . $apellidos[rand(0, count($apellidos) - 1)] ;
}

print("<h3>El array alumni es el siguiente:</h3>");
print(implode(", ", $alumni) . "<br/>");

print("<br/>b)\n<h3>Tiene un total de: \n" . count($alumni) . " elementos.</h3><br/>");

print("c)<br/>El array es el siguiente: <br/>" . implode(", ", $alumni) . "<br/>");

print("<br/>d)<br/> Array ordenado: <br/>");

$alumniOrdenado = $alumni;
asort($alumniOrdenado);

print_r($alumniOrdenado);

?>