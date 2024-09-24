<?php
require_once '../../clases/Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();

$evento = $_POST["evento"];

$sql = "SELECT sum(total_us) as total FROM ventas WHERE evento = '$evento'";
$result = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] > 0) {
  echo $row["total"];
} else {
  echo "No hay ventas para este evento!";
}

$conexion->close();
?>
