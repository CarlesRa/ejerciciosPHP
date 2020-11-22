<?php 


  session_start();

  if ($_SESSION['loged']) {
    session_unset();
    header('Location:login.php');
  }


?>