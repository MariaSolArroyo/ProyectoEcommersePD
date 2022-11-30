<?php
  $usuario = $_POST["u"];
  $contrasenia = $_POST["p"];

  session_start();
  $_SESSION["usuario"] = $usuario;

$checkuser = "sollarroyo";
$checkpass = "170888";

if (($usuario == $checkuser)&&($contrasenia == $checkpass)){
  header("location:./productosadmin.php");
} else {
  header("location:./error.html");
}

 ?>
