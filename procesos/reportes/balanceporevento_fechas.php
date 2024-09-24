<?php
require_once '../../clases/Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();

$evento = $_POST["evento"];
$fecha_ini = $_POST["fecha_ini"];
$fecha_fin = $_POST["fecha_fin"];

$sql = "SELECT sum(neto) as balance FROM ventas WHERE fecha_compra BETWEEN '$fecha_ini' AND '$fecha_fin' AND evento = '$evento'";
$result = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($result);

if ($row['balance'] > 0) {
  echo $row["balance"];
} else {
  echo 0;
}

$conexion->close();
?>
