<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 04</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>

    <div class="container">

      <div class="nuevos">
        <div class="titulo">
          <h1>Dar de alta ARTÍCULOS NUEVOS</h1>
        </div>
        <form action="resultadoinsertar.php" method="post">
            <p>
                Sección del Artículo
                <input type="text" name="seccion">
            </p>

            <p>
                Nombre del Artículo
                <input type="text" name="articulo">
            </p>

            <p>
                Precio del Artículo
                <input type="number" name="precio">
            </p>

            <p>
                País Origen Artículo
                <input type="text" name="pais">
            </p>
            <p>
                <input type="submit" value="INSERTAR!!">
            </p>
        </form>
    </div>

    <div class="paises">
        <div class="titulo">
            <a href="formulariobusqueda.php">Buscar Artículos por pais</a>
        </div>
    </div>
</div>

</body>

</html>