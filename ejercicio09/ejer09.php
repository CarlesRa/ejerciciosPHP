
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio09</title>
  <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
  <div class="container">
  <table border=1>
    <?php
      while ($key = key($_SERVER)) {
        echo "<tr><td>" . $key . "</td><td>" . current($_SERVER) . "</td></tr>";
        next($_SERVER);
      }
    ?>
  </table>
  </div>
</body>
</html>