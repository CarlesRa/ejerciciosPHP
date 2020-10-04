<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio07</title>
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
  <div class="container">
  <table>
    <?php
      foreach($_SERVER as $key => $value) {
        echo "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
      }
    ?>
  </table>
  </div>
</body>
</html>


