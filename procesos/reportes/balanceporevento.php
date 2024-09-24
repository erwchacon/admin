<?php
require_once '../../clases/Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();

$evento = $_POST["evento"];

$sql = "SELECT sum(neto) as balance FROM ventas WHERE evento = '$evento'";
$result = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($result);

if ($row['balance'] > 0) {
  echo $row["balance"];
} else {
  echo 0;
}

$conexion->close();
?>
