<?php
require_once '../../clases/Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();

$evento = $_POST["evento"];
$vendedor = $_POST["vendedor"];

$sql = "SELECT sum(neto) as balance FROM ventas WHERE evento = '$evento' and vendedor = '$vendedor'";
$result = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($result);

if ($evento!=="A"){
  if ($row['balance'] > 0) {
    echo $row["balance"];
  } else {
    echo 0;
  }
}else{
  echo "Debe seleccionar un evento en el recuadro anterior!";
}

$conexion->close();
?>
