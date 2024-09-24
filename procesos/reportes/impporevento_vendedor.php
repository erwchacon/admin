<?php
require_once '../../clases/Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();

$evento = $_POST["evento"];
$vendedor = $_POST["vendedor"];

$sql = "SELECT sum(imp_plataforma) as imp FROM ventas WHERE evento = '$evento' and vendedor = '$vendedor'";
$result = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($result);

if ($row['imp'] > 0) {
  echo $row["imp"];
} else {
  echo 0;
}

$conexion->close();
?>
