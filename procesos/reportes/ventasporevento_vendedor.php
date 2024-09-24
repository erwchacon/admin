<?php
require_once '../../clases/Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();

$evento = $_POST["evento"];
$vendedor = $_POST["vendedor"];

$sql = "SELECT sum(total_us) as total FROM ventas WHERE evento = '$evento' and vendedor = '$vendedor'";
$result = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($result);

if ($evento!=="A"){
  if ($row['total'] > 0) {
    echo $row["total"];
  } else {
    echo "No hay ventas para este vendedor!";
  }
}else{
  echo "Debe seleccionar un evento!";
}

$conexion->close();
?>
