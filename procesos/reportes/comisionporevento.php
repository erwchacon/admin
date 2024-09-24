<?php
require_once '../../clases/Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();

$evento = $_POST["evento"];

$sql = "SELECT sum(comision) as comision FROM ventas WHERE evento = '$evento'";
$result = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($result);

if ($row['comision'] > 0) {
  echo $row["comision"];
} else {
  echo 0;
}

$conexion->close();
?>
