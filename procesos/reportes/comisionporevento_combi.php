<?php
require_once '../../clases/Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();

$evento = $_POST["evento"];
$fecha_ini = $_POST["fecha_ini"];
$fecha_fin = $_POST["fecha_fin"];
$vendedor = $_POST["vendedor"];

$sql = "SELECT sum(comision) as comision FROM ventas WHERE fecha_compra BETWEEN '$fecha_ini' AND '$fecha_fin' AND evento = '$evento' AND vendedor = '$vendedor'";
$result = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($result);

if ($row['comision'] > 0) {
  echo $row["comision"];
} else {
  echo 0;
}

$conexion->close();
?>
